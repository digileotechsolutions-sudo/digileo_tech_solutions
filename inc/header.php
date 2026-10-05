<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/performance.php';

startPerformanceBuffer();

$pageTitle = $pageTitle ?? 'Complete Digital Solutions for Modern Businesses';
$currentPage = $currentPage ?? 'home';

$basePath = (strpos($_SERVER['SCRIPT_NAME'], '/pages/') !== false) ? '../' : '';
$servicePrefix = $basePath === '../' ? '' : 'pages/';
$servicePages = ['graphic-design', 'web-design', 'web-development', 'software-hardware', 'printing', 'consultancy', 'portfolio'];

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = filter_var($_SERVER['HTTP_HOST'] ?? 'localhost', FILTER_SANITIZE_URL);
$uri = filter_var($_SERVER['REQUEST_URI'] ?? '/', FILTER_SANITIZE_URL);
$canonicalUrl = $protocol . '://' . $host . $uri;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Digileo Tech Solutions - Graphic Design, Web Design, Web Development, Software & Hardware Solutions, Printing Services, and IT Consultancy.">
  <meta name="keywords" content="web design, graphic design, web development, printing services, IT consultancy, software solutions, hardware solutions">
  <meta name="author" content="Digileo Tech Solutions">
  <meta name="csrf-token" content="<?= csrfToken() ?>">
  <title><?= htmlspecialchars($pageTitle) ?> | Digileo Tech Solutions</title>

  <!-- Preconnect to critical origins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="preconnect" href="https://cdn.jsdelivr.net">
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

  <!-- Preload critical assets -->
  <link rel="preload" as="image" href="<?= $basePath ?>images/DIGILEO%20LOGO.webp" type="image/webp" fetchpriority="high">
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap">
  <link rel="preload" as="style" href="<?= $basePath ?>css/styles.css">

  <!-- Critical inline CSS for above-the-fold content -->
  <style>*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}html{scroll-behavior:smooth;font-size:16px}body{font-family:system-ui,-apple-system,sans-serif;color:#4B5563;line-height:1.7;overflow-x:hidden;-webkit-font-smoothing:antialiased;background:#F5F5F5}.container{width:100%;max-width:1200px;margin:0 auto;padding:0 20px}</style>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"></noscript>

  <!-- Font Awesome (async) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" media="print" onload="this.media='all'" crossorigin="anonymous">
  <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"></noscript>

  <!-- Swiper CSS (async) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"></noscript>

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="<?= $basePath ?>css/styles.css?v=2.2">
<?php if (in_array($currentPage, $servicePages)): ?>
  <link rel="stylesheet" href="<?= $basePath ?>css/<?= $currentPage ?>.css?v=1.0" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="<?= $basePath ?>css/<?= $currentPage ?>.css?v=1.0"></noscript>
<?php endif; ?>
  <link rel="stylesheet" href="<?= $basePath ?>whatsapp-chat/widget/widget.css?v=1.0" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="<?= $basePath ?>whatsapp-chat/widget/widget.css?v=1.0"></noscript>

  <link rel="icon" type="image/png" href="<?= $basePath ?>images/favicon.png">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?> | Digileo Tech Solutions">
  <meta property="og:description" content="From Graphic Design and Web Development to Printing Services and IT Consultancy, we help businesses grow through innovative technology solutions.">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">
</head>
<body>

<header class="header">
  <div class="container header-inner">
    <a href="<?= $basePath ?>index.php" class="logo">
      <img src="<?= $basePath ?>images/DIGILEO%20LOGO.webp" alt="Digileo Tech Solutions" width="64" height="64" fetchpriority="high" decoding="async">
    </a>
    <button class="hamburger" aria-label="Toggle navigation menu">
      <span></span><span></span><span></span>
    </button>
    <div class="nav-center">
      <nav class="nav" aria-label="Main navigation">
        <button class="nav-close" aria-label="Close menu">&times;</button>
        <a href="<?= $basePath ?>about.php" class="<?= $currentPage === 'about' ? 'active' : '' ?>"><i class="fas fa-circle-info" aria-hidden="true"></i> About</a>
        <div class="nav-dropdown">
          <a href="#" class="dropdown-trigger <?= in_array($currentPage, $servicePages) ? 'active' : '' ?>"><i class="fas fa-layer-group" aria-hidden="true"></i> Services <i class="fas fa-chevron-down" aria-hidden="true"></i></a>
          <div class="dropdown-menu">
            <a href="<?= $servicePrefix ?>graphic-design.php" class="<?= $currentPage === 'graphic-design' ? 'active' : '' ?>">Graphic Design</a>
            <a href="<?= $servicePrefix ?>web-design.php" class="<?= $currentPage === 'web-design' ? 'active' : '' ?>">Web Design</a>
            <a href="<?= $servicePrefix ?>web-development.php" class="<?= $currentPage === 'web-development' ? 'active' : '' ?>">Web Dev</a>
            <a href="<?= $servicePrefix ?>software-hardware.php" class="<?= $currentPage === 'software-hardware' ? 'active' : '' ?>">Software & Hardware</a>
            <a href="<?= $servicePrefix ?>printing.php" class="<?= $currentPage === 'printing' ? 'active' : '' ?>">Printing</a>
            <a href="<?= $servicePrefix ?>consultancy.php" class="<?= $currentPage === 'consultancy' ? 'active' : '' ?>">Consultancy</a>
          </div>
        </div>
        <a href="<?= $basePath ?>portfolio.php" class="<?= $currentPage === 'portfolio' ? 'active' : '' ?>"><i class="fas fa-images" aria-hidden="true"></i> Portfolio</a>
        <a href="<?= $basePath ?>blog.php" class="<?= $currentPage === 'blog' ? 'active' : '' ?>"><i class="fas fa-newspaper" aria-hidden="true"></i> Blog</a>
        <a href="<?= $basePath ?>contact.php" class="<?= $currentPage === 'contact' ? 'active' : '' ?>"><i class="fas fa-envelope" aria-hidden="true"></i> Contact</a>
      </nav>
    </div>
    <a href="<?= $basePath ?>quote.php" class="btn btn-primary btn-sm nav-cta">Get a Quote <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
  </div>
</header>
