<?php
require_once __DIR__ . '/../config/config.php';

define('OPTIMIZED_DIR', __DIR__ . '/../images/optimized');
define('WEBP_QUALITY', 85);
define('JPEG_QUALITY', 80);
define('PNG_QUALITY', 9);
define('MAX_WIDTH', 1920);
define('MAX_HEIGHT', 1080);
define('THUMB_WIDTH', 400);
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
define('MAX_UPLOAD_SIZE', 10 * 1024 * 1024);

if (!is_dir(OPTIMIZED_DIR)) {
    @mkdir(OPTIMIZED_DIR, 0755, true);
}

function getEngine() {
    if (extension_loaded('imagick')) return 'imagick';
    if (extension_loaded('gd')) return 'gd';
    return false;
}

function validateImageUpload($file) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['valid' => false, 'error' => 'Upload failed with code: ' . $file['error']];
    }
    if ($file['size'] > MAX_UPLOAD_SIZE) {
        return ['valid' => false, 'error' => 'File too large. Max: ' . (MAX_UPLOAD_SIZE / 1024 / 1024) . 'MB'];
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, ALLOWED_TYPES)) {
        return ['valid' => false, 'error' => 'Invalid file type: ' . $mime];
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        return ['valid' => false, 'error' => 'Invalid extension: ' . $ext];
    }
    if (!getimagesize($file['tmp_name'])) {
        return ['valid' => false, 'error' => 'File is not a valid image'];
    }
    return ['valid' => true];
}

function secureImageUpload($file, $destDir, $filename = null) {
    $validation = validateImageUpload($file);
    if (!$validation['valid']) {
        return ['success' => false, 'error' => $validation['error']];
    }
    if (!is_dir($destDir)) {
        @mkdir($destDir, 0755, true);
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $safeName = $filename ?: pathinfo($file['name'], PATHINFO_FILENAME);
    $safeName = preg_replace('/[^a-zA-Z0-9\-_]/', '-', $safeName);
    $safeName = trim(preg_replace('/-+/', '-', $safeName), '-');
    $destPath = $destDir . '/' . $safeName . '.' . $ext;
    $counter = 1;
    while (file_exists($destPath)) {
        $destPath = $destDir . '/' . $safeName . '-' . $counter . '.' . $ext;
        $counter++;
    }
    if (!move_uploaded_file($file['tmp_name'], $destPath)) {
        return ['success' => false, 'error' => 'Failed to save file'];
    }
    $optimized = optimizeImage($destPath);
    $webp = convertToWebp($destPath);
    return [
        'success' => true,
        'path' => $destPath,
        'webp_path' => $webp,
        'optimized' => $optimized,
    ];
}

function optimizeImage($srcPath, $maxW = MAX_WIDTH, $maxH = MAX_HEIGHT) {
    if (!file_exists($srcPath)) return false;
    $engine = getEngine();
    if (!$engine) return false;
    $ext = strtolower(pathinfo($srcPath, PATHINFO_EXTENSION));
    $origSize = filesize($srcPath);
    try {
        if ($engine === 'imagick') {
            $img = new Imagick($srcPath);
            $geo = $img->getImageGeometry();
            if ($geo['width'] > $maxW || $geo['height'] > $maxH) {
                $img->resizeImage($maxW, $maxH, Imagick::FILTER_LANCZOS, 1, true);
            }
            $img->setImageResolution(72, 72);
            $img->stripImage();
            if ($ext === 'png') {
                $img->setOption('png:compression-level', (string)PNG_QUALITY);
                if ($geo['width'] <= THUMB_WIDTH) {
                    try { $img->quantizeImage(256, Imagick::COLORSPACE_SRGB, 0, true, false); } catch (Exception $e) {}
                }
            } else {
                $img->setImageCompressionQuality(JPEG_QUALITY);
            }
            $img->writeImage($srcPath);
            $img->clear();
        } else {
            $info = getimagesize($srcPath);
            if (!$info) return false;
            switch ($info[2]) {
                case IMAGETYPE_JPEG: $srcImg = imagecreatefromjpeg($srcPath); break;
                case IMAGETYPE_PNG:  $srcImg = imagecreatefrompng($srcPath);  break;
                case IMAGETYPE_GIF:  $srcImg = imagecreatefromgif($srcPath);  break;
                case IMAGETYPE_WEBP: $srcImg = imagecreatefromwebp($srcPath); break;
                default: return false;
            }
            $origW = imagesx($srcImg);
            $origH = imagesy($srcImg);
            $ratio = min($maxW / $origW, $maxH / $origH, 1);
            if ($ratio < 1) {
                $newW = (int)round($origW * $ratio);
                $newH = (int)round($origH * $ratio);
                $dstImg = imagecreatetruecolor($newW, $newH);
                if (in_array($info[2], [IMAGETYPE_PNG, IMAGETYPE_WEBP])) {
                    imagealphablending($dstImg, false);
                    imagesavealpha($dstImg, true);
                }
                imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
                imagedestroy($srcImg);
                $srcImg = $dstImg;
            }
            switch ($info[2]) {
                case IMAGETYPE_JPEG: imagejpeg($srcImg, $srcPath, JPEG_QUALITY); break;
                case IMAGETYPE_PNG:
                    if (imageistruecolor($srcImg)) imagetruecolortopalette($srcImg, true, 256);
                    imagepng($srcImg, $srcPath, PNG_QUALITY);
                    break;
                case IMAGETYPE_GIF: imagegif($srcImg, $srcPath); break;
                case IMAGETYPE_WEBP: imagewebp($srcImg, $srcPath, WEBP_QUALITY); break;
            }
            imagedestroy($srcImg);
        }
        $newSize = filesize($srcPath);
        return ['original' => $origSize, 'optimized' => $newSize, 'saved' => $origSize - $newSize];
    } catch (Exception $e) {
        logError('Image optimization failed: ' . $e->getMessage(), ['path' => $srcPath]);
        return false;
    }
}

function convertToWebp($srcPath, $quality = WEBP_QUALITY) {
    if (!file_exists($srcPath)) return false;
    if (!function_exists('imagewebp') && !class_exists('Imagick')) return false;
    $webpPath = preg_replace('/\.(jpg|jpeg|png|gif)$/i', '.webp', $srcPath);
    if (file_exists($webpPath) && filemtime($webpPath) >= filemtime($srcPath)) {
        return $webpPath;
    }
    $engine = getEngine();
    try {
        if ($engine === 'imagick') {
            $img = new Imagick($srcPath);
            $img->setImageFormat('webp');
            $img->setOption('webp:method', '6');
            $img->setOption('webp:lossless', 'false');
            $img->setImageCompressionQuality($quality);
            $img->stripImage();
            $img->writeImage($webpPath);
            $img->clear();
        } else {
            $info = getimagesize($srcPath);
            if (!$info) return false;
            switch ($info[2]) {
                case IMAGETYPE_JPEG: $srcImg = imagecreatefromjpeg($srcPath); break;
                case IMAGETYPE_PNG:
                    $srcImg = imagecreatefrompng($srcPath);
                    imagepalettetotruecolor($srcImg);
                    break;
                case IMAGETYPE_GIF: $srcImg = imagecreatefromgif($srcPath); break;
                default: return false;
            }
            imagewebp($srcImg, $webpPath, $quality);
            imagedestroy($srcImg);
        }
        if (file_exists($webpPath)) {
            @chmod($webpPath, 0644);
            return $webpPath;
        }
        return false;
    } catch (Exception $e) {
        logError('WebP conversion failed: ' . $e->getMessage(), ['path' => $srcPath]);
        return false;
    }
}

function batchOptimizeImages($dirs = []) {
    $results = ['processed' => 0, 'skipped' => 0, 'webp' => 0, 'errors' => [], 'saved_bytes' => 0];
    $engine = getEngine();
    if (!$engine) {
        $results['errors'][] = 'No image library available (GD or Imagick required)';
        return $results;
    }
    $targets = $dirs ?: [
        __DIR__ . '/../images',
        __DIR__ . '/../uploads',
    ];
    foreach ($targets as $dir) {
        if (!is_dir($dir)) continue;
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
        );
        foreach ($iterator as $file) {
            if (!$file->isFile()) continue;
            $path = $file->getPathname();
            $ext = strtolower($file->getExtension());
            if (!in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])) continue;
            if (strpos($path, '/optimized/') !== false) continue;
            if (strpos($path, '.bak') !== false) continue;
            $result = optimizeImage($path);
            if ($result === false) {
                $results['errors'][] = $path;
                continue;
            }
            $results['processed']++;
            $results['saved_bytes'] += $result['saved'] ?? 0;
            $webp = convertToWebp($path);
            if ($webp) $results['webp']++;
        }
    }
    return $results;
}

function getResponsiveImageSrc($srcPath) {
    $webpPath = preg_replace('/\.(jpg|jpeg|png|gif)$/i', '.webp', $srcPath);
    $hasWebp = file_exists($webpPath);
    $relativeSrc = str_replace('\\', '/', $srcPath);
    $relativeSrc = str_replace(realpath(__DIR__ . '/..') . '/', '', $relativeSrc);
    $relativeWebp = $hasWebp ? str_replace('\\', '/', $webpPath) : '';
    $relativeWebp = $hasWebp ? str_replace(realpath(__DIR__ . '/..') . '/', '', $relativeWebp) : '';
    return [
        'src' => '/' . $relativeSrc,
        'webp' => $hasWebp ? '/' . $relativeWebp : null,
    ];
}

function lazyImg($src, $alt = '', $attrs = []) {
    $attrStr = '';
    foreach ($attrs as $key => $val) {
        $attrStr .= ' ' . $key . '="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
    }
    $webp = preg_replace('/\.(jpg|jpeg|png|gif)(\?.*)?$/i', '.webp', $src);
    $webpPath = ltrim($webp, '/');
    $hasWebp = file_exists($webpPath);
    if ($hasWebp) {
        return '<picture>' .
            '<source srcset="' . htmlspecialchars($webp, ENT_QUOTES, 'UTF-8') . '" type="image/webp">' .
            '<img src="' . htmlspecialchars($src, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '" loading="lazy" decoding="async"' . $attrStr . '>' .
            '</picture>';
    }
    return '<img src="' . htmlspecialchars($src, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '" loading="lazy" decoding="async"' . $attrStr . '>';
}

function eagerImg($src, $alt = '', $attrs = []) {
    $attrStr = '';
    foreach ($attrs as $key => $val) {
        $attrStr .= ' ' . $key . '="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
    }
    $webp = preg_replace('/\.(jpg|jpeg|png|gif)(\?.*)?$/i', '.webp', $src);
    $webpPath = ltrim($webp, '/');
    $hasWebp = file_exists($webpPath);
    if ($hasWebp) {
        return '<picture>' .
            '<source srcset="' . htmlspecialchars($webp, ENT_QUOTES, 'UTF-8') . '" type="image/webp">' .
            '<img src="' . htmlspecialchars($src, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '" loading="eager" decoding="async" fetchpriority="high"' . $attrStr . '>' .
            '</picture>';
    }
    return '<img src="' . htmlspecialchars($src, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '" loading="eager" decoding="async" fetchpriority="high"' . $attrStr . '>';
}
