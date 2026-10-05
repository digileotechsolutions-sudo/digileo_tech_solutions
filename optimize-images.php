<?php
/**
 * optimize-images.php
 * Run: php optimize-images.php
 * Compresses all site images for web: max 1200px wide, JPEG Q80, PNG quantized.
 * Requires GD or Imagick. Creates .bak originals. Safe to re-run (skips if .bak exists).
 */

set_time_limit(0);
ini_set('memory_limit', '512M');

$targetDirs = [
    __DIR__ . '/images',
    __DIR__ . '/images/our portfolio/Graphic Design',
    __DIR__ . '/images/our portfolio/Printing',
    __DIR__ . '/images/our portfolio/Software & Hardware',
    __DIR__ . '/images/our portfolio/Web Design',
    __DIR__ . '/images/our portfolio/Web Development',
    __DIR__ . '/images/our team',
    __DIR__ . '/images/portfolio/branding',
    __DIR__ . '/images/portfolio/digital',
    __DIR__ . '/images/portfolio/packeges',
    __DIR__ . '/images/portfolio/printing',
    __DIR__ . '/images/Website Showcase',
];

$maxWidth = 1200;
$jpegQuality = 80;
$stats = ['processed' => 0, 'skipped' => 0, 'savedBytes' => 0, 'errors' => []];

// Detect available library
if (extension_loaded('imagick')) {
    $engine = 'imagick';
} elseif (extension_loaded('gd')) {
    $engine = 'gd';
} else {
    die("ERROR: No image processing library found. Install php-gd or php-imagick.\n");
}
echo "Using engine: $engine\n\n";

// File type patterns to skip
$skipPatterns = ['/\.svg$/i', '/\.bak$/i', '/\.gif$/i'];
// Image files to process
$imagePatterns = ['jpg', 'jpeg', 'png'];

function shouldSkip($path) {
    global $skipPatterns;
    foreach ($skipPatterns as $p) {
        if (preg_match($p, $path)) return true;
    }
    return false;
}

function formatBytes($bytes) {
    if ($bytes >= 1073741824) return round($bytes / 1073741824, 2) . ' GB';
    if ($bytes >= 1048576) return round($bytes / 1048576, 2) . ' MB';
    if ($bytes >= 1024) return round($bytes / 1024, 1) . ' KB';
    return $bytes . ' B';
}

function processImage($srcPath, $maxWidth, $jpegQuality, $engine) {
    global $stats;

    if (shouldSkip($srcPath)) {
        $stats['skipped']++;
        return;
    }

    $ext = strtolower(pathinfo($srcPath, PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
        $stats['skipped']++;
        return;
    }

    $bakPath = $srcPath . '.bak';
    if (file_exists($bakPath)) {
        echo "  SKIP (already optimized): " . basename($srcPath) . "\n";
        $stats['skipped']++;
        return;
    }

    $originalSize = filesize($srcPath);

    try {
        if ($engine === 'imagick') {
            $img = new Imagick($srcPath);
            $geo = $img->getImageGeometry();
            if ($geo['width'] > $maxWidth) {
                $img->resizeImage($maxWidth, 0, Imagick::FILTER_LANCZOS, 1);
            }
            $img->setImageResolution(72, 72);
            $img->stripImage();

            if ($ext === 'png') {
                $img->setImageFormat('png');
                $img->setOption('png:compression-level', '9');
                // Quantize to 256 colors if reasonable
                try {
                    $img->quantizeImage(256, Imagick::COLORSPACE_SRGB, 0, true, false);
                } catch (Exception $e) {
                    // Non-truecolor PNG, skip quantization
                }
            } else {
                $img->setImageFormat('jpeg');
                $img->setImageCompression(Imagick::COMPRESSION_JPEG);
                $img->setImageCompressionQuality($jpegQuality);
            }

            rename($srcPath, $bakPath);
            $img->writeImage($srcPath);
            $img->clear();
        } else {
            // GD
            $info = getimagesize($srcPath);
            if (!$info) throw new Exception('Cannot read image info');

            switch ($info[2]) {
                case IMAGETYPE_JPEG:
                    $srcImg = imagecreatefromjpeg($srcPath);
                    break;
                case IMAGETYPE_PNG:
                    $srcImg = imagecreatefrompng($srcPath);
                    break;
                default:
                    throw new Exception('Unsupported type');
            }

            $origW = imagesx($srcImg);
            $origH = imagesy($srcImg);

            if ($origW > $maxWidth) {
                $newW = $maxWidth;
                $newH = (int)round($origH * ($maxWidth / $origW));
                $dstImg = imagecreatetruecolor($newW, $newH);
                if ($ext === 'png') {
                    imagealphablending($dstImg, false);
                    imagesavealpha($dstImg, true);
                }
                imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
                imagedestroy($srcImg);
            } else {
                $dstImg = $srcImg;
            }

            rename($srcPath, $bakPath);

            if ($ext === 'png') {
                // Convert truecolor to palette for smaller size
                if (imageistruecolor($dstImg)) {
                    imagetruecolortopalette($dstImg, true, 256);
                }
                imagepng($dstImg, $srcPath, 9);
            } else {
                imagejpeg($dstImg, $srcPath, $jpegQuality);
            }
            imagedestroy($dstImg);
        }

        $newSize = filesize($srcPath);
        $saved = $originalSize - $newSize;
        $pct = $originalSize > 0 ? round(($saved / $originalSize) * 100, 1) : 0;

        echo "  OK: " . str_pad(basename($srcPath), 40) . " " . formatBytes($originalSize) . " -> " . formatBytes($newSize) . " (-{$pct}%)\n";

        $stats['processed']++;
        $stats['savedBytes'] += $saved;

    } catch (Exception $e) {
        echo "  ERROR: " . basename($srcPath) . " - " . $e->getMessage() . "\n";
        $stats['errors'][] = $srcPath . ': ' . $e->getMessage();
        if (isset($bakPath) && file_exists($bakPath) && !file_exists($srcPath)) {
            rename($bakPath, $srcPath);
        }
    }
}

// === MAIN ===
echo "============================================\n";
echo "  Digileo Image Optimizer\n";
echo "============================================\n\n";

foreach ($targetDirs as $dir) {
    if (!is_dir($dir)) {
        echo "DIR NOT FOUND: $dir\n\n";
        continue;
    }
    echo "Scanning: $dir\n";
    $files = glob($dir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
    if (empty($files)) {
        echo "  (no image files)\n\n";
        continue;
    }
    foreach ($files as $f) {
        processImage($f, $maxWidth, $jpegQuality, $engine);
    }
    echo "\n";
}

echo "============================================\n";
echo "  SUMMARY\n";
echo "============================================\n";
echo "  Processed:  {$stats['processed']}\n";
echo "  Skipped:    {$stats['skipped']}\n";
echo "  Total saved: " . formatBytes($stats['savedBytes']) . "\n";
if (!empty($stats['errors'])) {
    echo "  Errors:     " . count($stats['errors']) . "\n";
    foreach ($stats['errors'] as $e) {
        echo "    - $e\n";
    }
}
echo "\nDone.\n";
