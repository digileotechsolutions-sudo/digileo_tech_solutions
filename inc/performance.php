<?php
/**
 * Performance Optimization Engine
 * Handles OPcache, DB optimization, output buffering, image optimization,
 * CSS/JS minification, and Core Web Vitals improvements.
 */

// --- OUTPUT BUFFERING WITH IMAGE OPTIMIZATION ---

/**
 * Start output buffering with automatic image optimization.
 * Transforms <img> tags to add WebP <picture> wrappers and lazy loading.
 * Call this at the start of header.php before any output.
 */
function startPerformanceBuffer()
{
    if (!defined('PERFORMANCE_BUFFER_STARTED')) {
        define('PERFORMANCE_BUFFER_STARTED', true);
        ob_start('processHtmlOutput');
    }
}

/**
 * Process HTML output: optimize images, minify, etc.
 */
function processHtmlOutput($html)
{
    $html = optimizeImagesInHtml($html);
    $html = addDeferredStylesheet($html);
    if (defined('PERF_MINIFY_HTML') && PERF_MINIFY_HTML) {
        $html = minifyHtml($html);
    }
    return $html;
}

/**
 * Transform <img> tags to add WebP <picture> wrapper and lazy loading.
 * Preserves eager loading and skips images marked skip-optimize and inline SVGs.
 */
function optimizeImagesInHtml($html)
{
    $callback = function ($match) {
        $imgTag = $match[0];
        $isEager = preg_match('/loading\s*=\s*["\']eager["\']/', $imgTag);
        if (preg_match('/class\s*=\s*["\'][^"\']*skip-optimize[^"\']*["\']/', $imgTag)) {
            return $imgTag;
        }
        if (!preg_match('/src\s*=\s*["\']([^"\']+)["\']/', $imgTag, $srcMatch)) {
            return $imgTag;
        }
        $src = $srcMatch[1];
        if (preg_match('/\.(svg|gif)(\?.*)?$/i', $src)) {
            return $imgTag;
        }
        if (!$isEager && !preg_match('/loading\s*=\s*["\']lazy["\']/', $imgTag)) {
            $imgTag = preg_replace('/<img\s/', '<img loading="lazy" decoding="async" ', $imgTag, 1);
        }
        $webpSrc = preg_replace('/\.(jpg|jpeg|png)(\?.*)?$/i', '.webp', $src);
        $srcPath = parse_url($src, PHP_URL_PATH);
        $documentRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
        if (
            $webpSrc === $src ||
            !$srcPath ||
            strpos($srcPath, '//') === 0 ||
            parse_url($src, PHP_URL_SCHEME) !== null ||
            parse_url($src, PHP_URL_HOST) !== null ||
            !$documentRoot
        ) {
            return $imgTag;
        }
        $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
        $urlPath = $srcPath[0] === '/' ? $srcPath : rtrim($scriptDir, '/') . '/' . $srcPath;
        $segments = [];
        foreach (explode('/', rawurldecode($urlPath)) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            if ($segment === '..') {
                array_pop($segments);
                continue;
            }
            $segments[] = $segment;
        }
        $relativePath = implode(DIRECTORY_SEPARATOR, $segments);
        $relativeWebpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $relativePath);
        $webpPath = realpath($documentRoot . DIRECTORY_SEPARATOR . $relativeWebpPath);
        $extensionWebpPath = realpath($documentRoot . DIRECTORY_SEPARATOR . $relativePath . '.webp');
        $documentRootPrefix = rtrim($documentRoot, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        if (
            $extensionWebpPath &&
            strpos($extensionWebpPath, $documentRootPrefix) === 0
        ) {
            $webpPath = $extensionWebpPath;
            $webpSrc = preg_replace('/(\.(jpg|jpeg|png))(?=[?#]|$)/i', '$1.webp', $src);
        }
        if (
            !$webpPath ||
            strpos($webpPath, $documentRootPrefix) !== 0
        ) {
            return $imgTag;
        }
        $alt = '';
        if (preg_match('/alt\s*=\s*["\']([^"\']*)["\']/', $imgTag, $altMatch)) {
            $alt = $altMatch[1];
        }
        return '<picture>' .
            '<source srcset="' . htmlspecialchars($webpSrc, ENT_QUOTES, 'UTF-8') . '" type="image/webp">' .
            $imgTag .
            '</picture>';
    };
    return preg_replace_callback('/<img[^>]+>/i', $callback, $html);
}

/**
 * Convert blocking stylesheet links to preload + async
 */
function addDeferredStylesheet($html)
{
    return preg_replace_callback(
        '/<link\s+rel="stylesheet"\s+href="([^"]+)"[^>]*>/i',
        function ($m) {
            $full = $m[0];
            if (preg_match('/media\s*=/i', $full)) {
                return $full;
            }
            $href = $m[1];
            if (preg_match('/fonts\.googleapis|cdnjs|jsdelivr|cloudflare/', $href)) {
                return $full;
            }
            return '<link rel="preload" href="' . $href . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' .
                '<noscript><link rel="stylesheet" href="' . $href . '"></noscript>';
        },
        $html
    );
}

function minifyHtml($html)
{
    $search = [
        '/\>[^\S ]+/s',
        '/[^\S ]+\</s',
        '/(\s)+/s',
        '/<!--(.|\s)*?-->/',
    ];
    $replace = ['>', '<', '\\1', ''];
    $html = preg_replace($search, $replace, $html);
    return trim($html);
}

// --- OPcache CONFIGURATION ---

function getOpcacheRecommendations()
{
    return [
        'opcache.enable=1',
        'opcache.memory_consumption=256',
        'opcache.interned_strings_buffer=16',
        'opcache.max_accelerated_files=10000',
        'opcache.revalidate_freq=120',
        'opcache.fast_shutdown=1',
        'opcache.enable_cli=1',
        'opcache.validate_timestamps=0',
        'opcache.max_wasted_percentage=10',
        'opcache.consistency_checks=0',
    ];
}

// --- MySQL PERFORMANCE ---

function getMySqlPerformanceHints($pdo)
{
    $hints = [];
    try {
        $stmt = $pdo->query("SHOW VARIABLES LIKE 'query_cache_type'");
        $qc = $stmt->fetch();
        if ($qc && strtolower($qc['Value']) !== 'on') {
            $hints[] = 'Enable query cache: set query_cache_type=1 in my.cnf';
        }
        $stmt = $pdo->query("SELECT @@innodb_buffer_pool_size AS pool");
        $row = $stmt->fetch();
        if ($row && $row['pool'] < 134217728) {
            $hints[] = 'Increase innodb_buffer_pool_size (recommended: 512M-1G for production)';
        }
        $stmt = $pdo->query("SHOW VARIABLES LIKE 'max_connections'");
        $mc = $stmt->fetch();
        if ($mc && $mc['Value'] < 150) {
            $hints[] = 'Increase max_connections to 150+ for production';
        }
        $stmt = $pdo->query("SELECT @@session.wait_timeout AS wt");
        $wt = $stmt->fetch();
        if ($wt && $wt['wt'] > 300) {
            $hints[] = 'Reduce wait_timeout to 120-180 seconds';
        }
    } catch (Exception $e) {
        $hints[] = 'Unable to check MySQL config: ' . $e->getMessage();
    }
    return $hints;
}

function getSlowQueryLog($pdo, $minTime = 2)
{
    try {
        $pdo->exec("SET SESSION long_query_time = {$minTime}");
        $pdo->exec("SET SESSION slow_query_log = 1");
        $stmt = $pdo->query("SHOW VARIABLES LIKE 'slow_query_log_file'");
        $row = $stmt->fetch();
        return $row ? $row['Value'] : null;
    } catch (Exception $e) {
        return null;
    }
}

// --- CACHING HELPERS ---

function setCacheHeader($lifetime = 31536000)
{
    if (!headers_sent()) {
        header("Cache-Control: public, max-age={$lifetime}, immutable");
        header("Expires: " . gmdate('D, d M Y H:i:s', time() + $lifetime) . ' GMT');
    }
}

function setNoCacheHeader()
{
    if (!headers_sent()) {
        header("Cache-Control: no-store, no-cache, must-revalidate, proxy-revalidate");
        header("Expires: 0");
        header("Pragma: no-cache");
    }
}

// --- FILE-BASED CACHE ---

function cacheGet($key, $ttl = 3600)
{
    $cacheDir = __DIR__ . '/../cache';
    $file = $cacheDir . '/' . md5($key) . '.cache';
    if (!file_exists($file)) return null;
    if (time() - filemtime($file) > $ttl) {
        @unlink($file);
        return null;
    }
    $data = @file_get_contents($file);
    return $data ? unserialize($data) : null;
}

function cacheSet($key, $data)
{
    $cacheDir = __DIR__ . '/../cache';
    if (!is_dir($cacheDir)) {
        @mkdir($cacheDir, 0755, true);
    }
    $file = $cacheDir . '/' . md5($key) . '.cache';
    @file_put_contents($file, serialize($data), LOCK_EX);
}

function cacheDelete($key)
{
    $cacheDir = __DIR__ . '/../cache';
    $file = $cacheDir . '/' . md5($key) . '.cache';
    if (file_exists($file)) {
        @unlink($file);
    }
}

function cacheFlush()
{
    $cacheDir = __DIR__ . '/../cache';
    if (!is_dir($cacheDir)) return;
    $files = glob($cacheDir . '/*.cache');
    foreach ($files as $file) {
        @unlink($file);
    }
}

// --- PREFETCH/PRELOAD HINTS ---

function preloadHint($url, $as = 'image', $type = '')
{
    $hint = '<link rel="preload" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" as="' . htmlspecialchars($as, ENT_QUOTES, 'UTF-8') . '"';
    if ($type) {
        $hint .= ' type="' . htmlspecialchars($type, ENT_QUOTES, 'UTF-8') . '"';
    }
    $hint .= '>';
    echo $hint;
}

function preconnectHint($url, $crossorigin = true)
{
    $hint = '<link rel="preconnect" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"';
    if ($crossorigin) {
        $hint .= ' crossorigin';
    }
    $hint .= '>';
    echo $hint;
}

function dnsPrefetch($url)
{
    echo '<link rel="dns-prefetch" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '">';
}

// --- CSS/JS MINIFICATION (SIMPLE) ---

function minifyCss($css)
{
    $css = preg_replace('/\/\*.*?\*\//s', '', $css);
    $css = preg_replace('/\s+/', ' ', $css);
    $css = preg_replace('/\s*([{};,:>])\s*/', '$1', $css);
    $css = preg_replace('/;}/', '}', $css);
    return trim($css);
}

function minifyJs($js)
{
    $js = preg_replace('/\/\/.*(?:\n|$)/', '', $js);
    $js = preg_replace('/\/\*.*?\*\//s', '', $js);
    $js = preg_replace('/\s+/', ' ', $js);
    $js = preg_replace('/\s*([{}();,:=+\-*\/%!<>|&?])\s*/', '$1', $js);
    $js = preg_replace('/;\s*}/', '}', $js);
    $js = preg_replace('/\s*;\s*;/', ';', $js);
    return trim($js);
}

// --- WEB VITALS HELPERS ---

function getLcpHint($imageUrl)
{
    return '<link rel="preload" as="image" href="' . htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') . '" fetchpriority="high">';
}

function getFcpHint()
{
    return '<link rel="preload" as="style" href="' . getBasePath() . 'css/styles.css">';
}

function inlineCriticalCss($css)
{
    echo '<style>' . minifyCss($css) . '</style>';
}
