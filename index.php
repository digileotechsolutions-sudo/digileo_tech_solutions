<?php $pageTitle = 'Home'; $currentPage = 'home'; include 'inc/header.php'; ?>

<!-- Hero Section -->
<section class="hero">
  <div class="container hero-content">
    <div class="hero-text fade-in">
      <div class="hero-badge"><i class="fas fa-rocket"></i> Trusted by 500+ Businesses</div>
      <h1>Complete Digital Solutions for <span>Modern Businesses</span></h1>
      <p>From Graphic Design and Web Development to Printing Services and IT Consultancy, we help businesses grow through innovative technology solutions.</p>
      <div class="hero-buttons">
        <a href="quote.php" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Get a Quote</a>
        <a href="portfolio.php" class="btn btn-outline"><i class="fas fa-eye"></i> View Portfolio</a>
      </div>
    </div>
    <div class="hero-image fade-in">
      <img src="images/about%20image.jpg" alt="Digital Solutions" width="600" height="400" fetchpriority="high" loading="eager" decoding="async">
    </div>
  </div>
</section>

<!-- Featured Services -->
<section class="section" id="services">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Our <span>Services</span></h2>
      <p>Comprehensive solutions to power your business growth and digital transformation.</p>
    </div>
    <div class="services-grid">
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-paint-brush"></i></div>
        <h3>Graphic Design</h3>
        <p>Logo design, brand identity, social media graphics, and marketing materials that make your brand stand out.</p>
        <a href="pages/graphic-design.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-laptop-code"></i></div>
        <h3>Web Design</h3>
        <p>Responsive, user-friendly websites designed to captivate your audience and drive engagement.</p>
        <a href="pages/web-design.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-code"></i></div>
        <h3>Web Development</h3>
        <p>Custom websites, e-commerce platforms, web applications, and API integrations built with modern technologies.</p>
        <a href="pages/web-development.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-microchip"></i></div>
        <h3>Software & Hardware</h3>
        <p>Computer repair, hardware upgrades, networking, CCTV installation, and IT support services.</p>
        <a href="pages/software-hardware.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-print"></i></div>
        <h3>Printing Services</h3>
        <p>Banner printing, business cards, brochures, stickers, t-shirts, and all corporate branding materials.</p>
        <a href="pages/printing.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card fade-in">
        <div class="icon"><i class="fas fa-handshake"></i></div>
        <h3>IT Consultancy</h3>
        <p>Digital transformation, business automation, cybersecurity guidance, and technology planning.</p>
        <a href="pages/consultancy.php" class="learn-more">Learn More <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="section section-alt">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Why Choose <span>Digileo Tech</span></h2>
      <p>What sets us apart from the competition.</p>
    </div>
    <div class="why-grid">
      <div class="why-card fade-in">
        <div class="icon"><i class="fas fa-medal"></i></div>
        <h4>Expert Team</h4>
        <p>Skilled professionals with years of industry experience.</p>
      </div>
      <div class="why-card fade-in">
        <div class="icon"><i class="fas fa-clock"></i></div>
        <h4>Timely Delivery</h4>
        <p>We respect deadlines and deliver on time, every time.</p>
      </div>
      <div class="why-card fade-in">
        <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
        <h4>Affordable Pricing</h4>
        <p>Competitive rates without compromising on quality.</p>
      </div>
      <div class="why-card fade-in">
        <div class="icon"><i class="fas fa-headset"></i></div>
        <h4>24/7 Support</h4>
        <p>Round-the-clock support to keep your business running.</p>
      </div>
    </div>
  </div>
</section>

<!-- Stats Counter -->
<section class="stats">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-item fade-in">
        <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
        <h3 data-count="500">0+</h3>
        <p>Projects Completed</p>
      </div>
      <div class="stat-item fade-in">
        <div class="stat-icon"><i class="fas fa-smile"></i></div>
        <h3 data-count="300">0+</h3>
        <p>Happy Clients</p>
      </div>
      <div class="stat-item fade-in">
        <div class="stat-icon"><i class="fas fa-users"></i></div>
        <h3 data-count="25">0+</h3>
        <p>Team Members</p>
      </div>
      <div class="stat-item fade-in">
        <div class="stat-icon"><i class="fas fa-trophy"></i></div>
        <h3 data-count="8">0+</h3>
        <p>Years Experience</p>
      </div>
    </div>
  </div>
</section>

<!-- Latest Projects -->
<section class="section" id="projects">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Latest <span>Projects</span></h2>
      <p>Explore some of our recent work across various service categories.</p>
    </div>
    <div class="projects-grid">
<?php
$homePfCats = [
  'Web Design'          => ['folder' => 'Web Design',          'tag' => 'Web Design',       'label' => 'Web Design'],
  'Graphic Design'      => ['folder' => 'Graphic Design',      'tag' => 'Graphic Design',   'label' => 'Graphic Design'],
  'Web Development'     => ['folder' => 'Web Development',     'tag' => 'Web Development',  'label' => 'Web Development'],
  'Printing'            => ['folder' => 'Printing',            'tag' => 'Printing',         'label' => 'Printing'],
  'Software & Hardware' => ['folder' => 'Software & Hardware', 'tag' => 'IT Solutions',     'label' => 'Software & Hardware'],
  'Consultancy'         => ['folder' => 'Graphic Design',      'tag' => 'Consultancy',      'label' => 'Consultancy'],
];
$homePfCount = 0;
foreach ($homePfCats as $cat):
  if ($homePfCount >= 6) break;
  $files = glob("images/our portfolio/{$cat['folder']}/*.{png,jpg,jpeg}", GLOB_BRACE);
  if (empty($files)) continue;
  shuffle($files);
  $file = $files[0];
  $name = pathinfo($file, PATHINFO_FILENAME);
  $encoded = rawurlencode(basename($file));
  $homePfCount++;
?>
      <div class="project-card fade-in">
        <img src="images/our portfolio/<?= rawurlencode($cat['folder']) ?>/<?= $encoded ?>" alt="<?= htmlspecialchars($name) ?>" loading="lazy">
        <span class="project-tag"><?= $cat['tag'] ?></span>
        <div class="project-overlay">
          <h4><?= htmlspecialchars($name) ?></h4>
          <p><?= $cat['label'] ?></p>
        </div>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="section section-alt">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>What Our <span>Clients Say</span></h2>
      <p>Hear from the businesses we've helped transform.</p>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card fade-in">
        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <blockquote>"Digileo Tech delivered an exceptional website that perfectly showcases our real estate portfolio. Professional, responsive, and a pleasure to work with."</blockquote>
        <div class="author">
          <div class="author-info">
            <h5>Havenedge Realtors</h5>
          </div>
        </div>
      </div>
      <div class="testimonial-card fade-in">
        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <blockquote>"The branding and print materials from Digileo Tech gave our delivery business a fresh, professional look. Our clients love the new identity."</blockquote>
        <div class="author">
          <div class="author-info">
            <h5>Bosren Adventures</h5>
          </div>
        </div>
      </div>
      <div class="testimonial-card fade-in">
        <div class="stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
        <blockquote>"Digileo Tech built a seamless e-commerce platform for our computer hardware business. The integration with our inventory system was flawless."</blockquote>
        <div class="author">
          <div class="author-info">
            <h5>Rentix Computers</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Partners -->
<section class="section">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Our <span>Partners</span></h2>
      <p>Trusted by leading brands and organizations.</p>
    </div>
    <div class="partners-grid fade-in">
      <div class="partner-item">TechVille</div>
      <div class="partner-item">BrightStar</div>
      <div class="partner-item">Crest Media</div>
      <div class="partner-item">DataFlow</div>
      <div class="partner-item">WebPro</div>
      <div class="partner-item">PrintMaster</div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta">
  <div class="container">
    <h2 class="fade-in">Ready to Transform Your Business?</h2>
    <p class="fade-in">Let's discuss your project and create something amazing together. Get in touch today for a free consultation.</p>
    <a href="quote.php" class="btn btn-secondary btn-lg fade-in"><i class="fas fa-paper-plane"></i> Get Started Today</a>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
