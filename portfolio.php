<?php $pageTitle = 'Our Portfolio'; $currentPage = 'portfolio'; include 'inc/header.php'; ?>

<section class="page-banner">
  <div class="container">
    <div class="breadcrumb"><a href="index.php">Home</a> <span>/</span> <span>Portfolio</span></div>
    <h1>Our Portfolio</h1>
    <p>Explore our work across design, development, printing, and IT solutions.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Our <span>Portfolio</span></h2>
      <p>Explore our work across web, software, hardware, and print.</p>
    </div>

<?php
$pfCats = [
  'graphic-design'    => ['folder' => 'Graphic Design',      'icon' => 'fa-paint-brush', 'label' => 'Graphic Design',      'id' => 'pf-graphic-design',    'tags' => ['Logo Design', 'Brand Identity', 'Graphic']],
  'web-design'        => ['folder' => 'Web Design',          'icon' => 'fa-laptop',      'label' => 'Web Design',          'id' => 'pf-web-design',        'tags' => ['UI/UX', 'Website', 'Interface']],
  'web-dev'           => ['folder' => 'Web Development',     'icon' => 'fa-code',        'label' => 'Web Development',     'id' => 'pf-web-dev',           'tags' => ['Development', 'Coding', 'Backend']],
  'software-hardware' => ['folder' => 'Software & Hardware', 'icon' => 'fa-cogs',        'label' => 'Software & Hardware',  'id' => 'pf-software-hardware', 'tags' => ['Software', 'Hardware', 'IT Solutions']],
  'printing'          => ['folder' => 'Printing',            'icon' => 'fa-print',       'label' => 'Printing',            'id' => 'pf-printing',          'tags' => ['Print', 'Apparel', 'Merchandise']],
];

foreach ($pfCats as $dir => $cat):
  $files = glob("images/our portfolio/{$cat['folder']}/*.{png,jpg,jpeg}", GLOB_BRACE);
  if (empty($files) && $dir !== 'web-dev') continue;
?>
    <div class="gd-portfolio-section" id="<?= $cat['id'] ?>">
      <div class="gd-portfolio-header"><i class="fas <?= $cat['icon'] ?>"></i> <?= $cat['label'] ?> <a href="#<?= $cat['id'] ?>" class="gd-view-all">View All <i class="fas fa-arrow-right"></i></a></div>
      <div class="gd-gallery-wrapper">
        <div class="gd-gallery-track">
<?php
  $i = 0;
  foreach ($files as $file):
    $name = pathinfo($file, PATHINFO_FILENAME);
    $encoded = rawurlencode(basename($file));
    $tag = $cat['tags'][$i % count($cat['tags'])];
?>
          <div class="gd-gallery-item fade-in" data-category="<?= $dir ?>">
            <span class="gd-gallery-tag"><?= htmlspecialchars($tag) ?></span>
            <img class="gd-card-img" src="images/our portfolio/<?= rawurlencode($cat['folder']) ?>/<?= $encoded ?>" alt="<?= htmlspecialchars($name) ?>" loading="lazy">
            <div class="gd-card-info"><h4><?= htmlspecialchars($name) ?></h4><span class="gd-category"><?= $cat['label'] ?></span></div>
            <div class="gd-gallery-overlay"><h4><?= htmlspecialchars($name) ?></h4><span><?= $cat['label'] ?></span></div>
          </div>
<?php $i++; endforeach; ?>
<?php if ($dir === 'web-dev'): ?>
          <a class="gd-gallery-item fade-in" href="https://mackfastfitnesssolution.com/" target="_blank" rel="noopener noreferrer" aria-label="Visit MackFast Fitness Solution website">
            <span class="gd-gallery-tag">Fitness Website</span>
            <img class="gd-card-img" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&amp;fit=crop&amp;w=900&amp;q=80" alt="Modern fitness center with gym equipment" width="900" height="600" loading="lazy" decoding="async">
            <div class="gd-card-info"><h4>MackFast Fitness Solution</h4><span class="gd-category">Web Development · Visit Website <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i></span></div>
            <div class="gd-gallery-overlay"><h4>MackFast Fitness Solution</h4><span>Web Development · Visit Live Website</span></div>
          </a>
<?php endif; ?>
          <!-- dup -->
<?php
  $i = 0;
  foreach ($files as $file):
    $name = pathinfo($file, PATHINFO_FILENAME);
    $encoded = rawurlencode(basename($file));
    $tag = $cat['tags'][$i % count($cat['tags'])];
?>
          <div class="gd-gallery-item fade-in" data-category="<?= $dir ?>">
            <span class="gd-gallery-tag"><?= htmlspecialchars($tag) ?></span>
            <img class="gd-card-img" src="images/our portfolio/<?= rawurlencode($cat['folder']) ?>/<?= $encoded ?>" alt="<?= htmlspecialchars($name) ?>" loading="lazy">
            <div class="gd-card-info"><h4><?= htmlspecialchars($name) ?></h4><span class="gd-category"><?= $cat['label'] ?></span></div>
            <div class="gd-gallery-overlay"><h4><?= htmlspecialchars($name) ?></h4><span><?= $cat['label'] ?></span></div>
          </div>
<?php $i++; endforeach; ?>
<?php if ($dir === 'web-dev'): ?>
          <a class="gd-gallery-item fade-in" href="https://mackfastfitnesssolution.com/" target="_blank" rel="noopener noreferrer" aria-label="Visit MackFast Fitness Solution website">
            <span class="gd-gallery-tag">Fitness Website</span>
            <img class="gd-card-img" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&amp;fit=crop&amp;w=900&amp;q=80" alt="Modern fitness center with gym equipment" width="900" height="600" loading="lazy" decoding="async">
            <div class="gd-card-info"><h4>MackFast Fitness Solution</h4><span class="gd-category">Web Development · Visit Website <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i></span></div>
            <div class="gd-gallery-overlay"><h4>MackFast Fitness Solution</h4><span>Web Development · Visit Live Website</span></div>
          </a>
<?php endif; ?>
        </div>
      </div>
    </div>
<?php endforeach; ?>
  </div>
</section>

<!-- Testimonials -->
<section class="section section-alt">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Client <span>Testimonials</span></h2>
      <p>What our clients say about working with us.</p>
    </div>
    <div class="swiper testimonial-swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide testimonial-card fade-in">
          <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
          <blockquote>"Digileo Tech delivered an exceptional website that perfectly showcases our real estate portfolio. Professional, responsive, and a pleasure to work with."</blockquote>
          <div class="author">
            <div class="author-info"><h5>Havenedge Realtors</h5></div>
          </div>
        </div>
        <div class="swiper-slide testimonial-card fade-in">
          <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
          <blockquote>"The branding and print materials from Digileo Tech gave our delivery business a fresh, professional look. Our clients love the new identity."</blockquote>
          <div class="author">
            <div class="author-info"><h5>Bosren Adventures</h5></div>
          </div>
        </div>
        <div class="swiper-slide testimonial-card fade-in">
          <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
          <blockquote>"Digileo Tech built a seamless e-commerce platform for our computer hardware business. The integration with our inventory system was flawless."</blockquote>
          <div class="author">
            <div class="author-info"><h5>Rentix Computers</h5></div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
