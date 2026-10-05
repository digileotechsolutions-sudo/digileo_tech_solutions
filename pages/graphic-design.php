<?php $pageTitle = 'Graphic Design Services'; $currentPage = 'graphic-design'; include '../inc/header.php'; ?>

<section class="page-banner gd-banner">
  <div class="gd-banner-bg"></div>
  <div class="gd-banner-shapes">
    <span></span><span></span><span></span>
  </div>
  <div class="container">
    <div class="breadcrumb"><a href="../index.php">Home</a> <span>/</span> <span>Graphic Design</span></div>
    <h1>Graphic Design Services</h1>
    <p>Creative designs that make your brand unforgettable.</p>
  </div>
</section>

<!-- Intro + Services -->
<section class="section gd-intro">
  <div class="container">
    <div class="service-detail-grid">
      <div>
        <div class="gd-intro-tag"><i class="fas fa-paint-brush"></i> Creative Excellence</div>
        <div class="section-title" style="text-align:left; margin-bottom: 20px;">
          <div class="title-bar" style="margin:0 0 16px 0;"></div>
          <h2>Professional Graphic <span>Design Services</span></h2>
        </div>
        <p style="margin-bottom: 20px; font-size: 1.08rem;">We create visually stunning designs that communicate your brand's message effectively. From logos to complete brand identities, our designs help you stand out in a crowded marketplace.</p>
        <div class="gd-stats">
          <div class="gd-stat-item fade-in">
            <div class="num">500<span class="counter-suffix">+</span></div>
            <div class="label">Brands Designed</div>
          </div>
          <div class="gd-stat-item fade-in">
            <div class="num">98<span class="counter-suffix">%</span></div>
            <div class="label">Client Satisfaction</div>
          </div>
          <div class="gd-stat-item fade-in">
            <div class="num">7<span class="counter-suffix">+</span></div>
            <div class="label">Years Experience</div>
          </div>
          <div class="gd-stat-item fade-in">
            <div class="num">24<span class="counter-suffix">hrs</span></div>
            <div class="label">Fast Turnaround</div>
          </div>
        </div>
        <div class="gd-services-grid">
          <div class="gd-service-card fade-in">
            <span class="card-num">01</span>
            <div class="icon-wrap"><i class="fas fa-pen-fancy"></i></div>
            <h4>Logo Design</h4>
            <p>Unique, memorable logos that capture your brand essence.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">02</span>
            <div class="icon-wrap"><i class="fas fa-bezier-curve"></i></div>
            <h4>Brand Identity</h4>
            <p>Complete visual identity systems for consistent branding.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">03</span>
            <div class="icon-wrap"><i class="fas fa-file-image"></i></div>
            <h4>Posters & Flyers</h4>
            <p>Eye-catching print and digital promotional materials.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">04</span>
            <div class="icon-wrap"><i class="fas fa-hashtag"></i></div>
            <h4>Social Media Graphics</h4>
            <p>Engaging visuals optimized for every social platform.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">05</span>
            <div class="icon-wrap"><i class="fas fa-box"></i></div>
            <h4>Packaging Design</h4>
            <p>Product packaging that stands out on the shelf.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">06</span>
            <div class="icon-wrap"><i class="fas fa-id-card"></i></div>
            <h4>Business Cards</h4>
            <p>Premium business cards that make lasting impressions.</p>
          </div>
          <div class="gd-service-card fade-in">
            <span class="card-num">07</span>
            <div class="icon-wrap"><i class="fas fa-bullhorn"></i></div>
            <h4>Marketing Materials</h4>
            <p>Brochures, flyers, and catalogs for your campaigns.</p>
          </div>
        </div>
      </div>
      <aside class="quote-sidebar">
        <div class="gd-sidebar-card">
          <h3><i class="fas fa-paper-plane"></i> Request a Quote</h3>
          <form class="contact-form" method="POST" action="../process-form.php">
            <input type="hidden" name="form_type" value="contact">
            <div class="form-group">
              <label>Your Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email <span class="required">*</span></label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Service Needed</label>
              <select name="subject" class="form-control">
                <option>Logo Design</option>
                <option>Brand Identity</option>
                <option>Posters & Flyers</option>
                <option>Social Media Graphics</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Tell us about your design needs..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-paper-plane"></i> Send Request</button>
          </form>
        </div>
        <div class="gd-sidebar-card">
          <h3><i class="fas fa-phone-alt"></i> Get in Touch</h3>
          <div class="contact-item" style="display:flex;gap:12px;margin-bottom:12px;font-size:0.92rem;"><i class="fab fa-whatsapp" style="color:var(--primary);width:18px;margin-top:4px;"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener" style="color:inherit;">+254 705 359 471</a></div>
          <div class="contact-item" style="display:flex;gap:12px;margin-bottom:12px;font-size:0.92rem;"><i class="fas fa-envelope" style="color:var(--primary);width:18px;margin-top:4px;"></i> <a href="mailto:digileotechsolutions@gmail.com" style="color:inherit;">digileotechsolutions@gmail.com</a></div>
          <div class="contact-item" style="display:flex;gap:12px;font-size:0.92rem;"><i class="fas fa-clock" style="color:var(--primary);width:18px;margin-top:4px;"></i> Open 24/7 Online Support</div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- Why Design Matters -->
<section class="section section-alt">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2>Why Great <span>Design Matters</span></h2>
      <p>Professional design is an investment that delivers measurable returns for your business.</p>
    </div>
    <div class="gd-benefits-grid">
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-eye"></i></div>
        <h4>First Impressions Count</h4>
        <p>94% of first impressions are design-related. Professional design builds instant credibility and trust with your audience.</p>
      </div>
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-chart-line"></i></div>
        <h4>Boost Brand Recognition</h4>
        <p>Consistent branding across all touchpoints increases revenue by up to 23% and builds lasting customer loyalty.</p>
      </div>
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-dollar-sign"></i></div>
        <h4>Higher ROI</h4>
        <p>Well-designed marketing materials can increase conversion rates by up to 200% and improve ad performance significantly.</p>
      </div>
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-hand-pointer"></i></div>
        <h4>Stand Out From Competitors</h4>
        <p>In a crowded market, unique and professional design differentiates your brand and captures attention instantly.</p>
      </div>
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-comments"></i></div>
        <h4>Communicate Your Message</h4>
        <p>Visual communication is processed 60,000x faster than text. Great design tells your story at a glance.</p>
      </div>
      <div class="gd-benefit-card fade-in">
        <div class="benefit-icon"><i class="fas fa-shield-alt"></i></div>
        <h4>Build Trust & Authority</h4>
        <p>Polished, professional design signals quality and reliability, making customers more likely to choose your brand.</p>
      </div>
    </div>
  </div>
</section>

<!-- Tools & Software -->
<section class="section gd-tools">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2><i class="fas fa-folder-open"></i> Design Tools <span>& Software</span></h2>
      <p>We use industry-leading tools to deliver pixel-perfect designs.</p>
    </div>
    <div class="gd-tools-grid">
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/Figma.svg" alt="Figma" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>Figma</h5>
        <div class="tool-level">UI/UX Design</div>
      </div>
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/Photoshop.svg" alt="Photoshop" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>Photoshop</h5>
        <div class="tool-level">Image Editing</div>
      </div>
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/Illustrator.svg" alt="Illustrator" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>Illustrator</h5>
        <div class="tool-level">Vector Graphics</div>
      </div>
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/InDesign.svg" alt="InDesign" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>InDesign</h5>
        <div class="tool-level">Print Layout</div>
      </div>
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/After%20Effects.svg" alt="After Effects" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>After Effects</h5>
        <div class="tool-level">Motion Design</div>
      </div>
      <div class="gd-tool-item fade-in">
        <div class="tool-icon"><img src="../images/Design%20Tools%20&%20Software/Canva.svg" alt="Canva" style="width:48px;height:48px;object-fit:contain;" loading="lazy"></div>
        <h5>Canva</h5>
        <div class="tool-level">Quick Designs</div>
      </div>
    </div>
  </div>
</section>

<!-- Design Process -->
<section class="section section-alt gd-process">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2>Our Design <span>Process</span></h2>
      <p>A structured approach to delivering exceptional designs every time.</p>
    </div>
    <div class="gd-process-wrapper">
      <div class="gd-process-step fade-in">
        <div class="step-circle">01</div>
        <div class="step-label">Step 01</div>
        <h4>Brief & Research</h4>
        <p>We dive deep into your brand, audience, and goals through thorough consultation and market research.</p>
      </div>
      <div class="gd-process-step fade-in">
        <div class="step-circle">02</div>
        <div class="step-label">Step 02</div>
        <h4>Concept Development</h4>
        <p>Our creative team brainstorms and develops multiple design concepts and approaches.</p>
      </div>
      <div class="gd-process-step fade-in">
        <div class="step-circle">03</div>
        <div class="step-label">Step 03</div>
        <h4>Design & Refinement</h4>
        <p>We refine the chosen concept through collaborative feedback and iteration.</p>
      </div>
      <div class="gd-process-step fade-in">
        <div class="step-circle">04</div>
        <div class="step-label">Step 04</div>
        <h4>Final Delivery</h4>
        <p>High-resolution, print-ready files delivered in all required formats with brand guidelines.</p>
      </div>
    </div>
  </div>
</section>

<!-- Pricing -->
<section class="section">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2>Design <span>Packages</span></h2>
      <p>Transparent pricing with no hidden fees. Choose the plan that fits your needs.</p>
    </div>
    <div class="pricing-grid">
      <div class="gd-pricing-card fade-in">
        <div class="pricing-icon"><i class="fas fa-paper-plane"></i></div>
        <h3>Starter</h3>
        <div class="price">KSh 5,000</div>
        <div class="duration">per project</div>
        <ul>
          <li><i class="fas fa-check"></i> 1 Logo Concept</li>
          <li><i class="fas fa-check"></i> Business Card Design</li>
          <li><i class="fas fa-check"></i> 2 Revisions</li>
          <li><i class="fas fa-check"></i> Print-ready Files</li>
          <li><i class="fas fa-times"></i> Brand Guidelines</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline">Get Started</a>
      </div>
      <div class="gd-pricing-card featured fade-in">
        <div class="pricing-badge">Popular</div>
        <div class="pricing-icon"><i class="fas fa-rocket"></i></div>
        <h3>Professional</h3>
        <div class="price">KSh 15,000</div>
        <div class="duration">per project</div>
        <ul>
          <li><i class="fas fa-check"></i> 3 Logo Concepts</li>
          <li><i class="fas fa-check"></i> Full Brand Identity</li>
          <li><i class="fas fa-check"></i> 5 Revisions</li>
          <li><i class="fas fa-check"></i> Social Media Kit</li>
          <li><i class="fas fa-check"></i> Brand Guidelines</li>
        </ul>
        <a href="../quote.php" class="btn btn-primary">Get Started</a>
      </div>
      <div class="gd-pricing-card fade-in">
        <div class="pricing-icon"><i class="fas fa-crown"></i></div>
        <h3>Premium</h3>
        <div class="price">KSh 35,000</div>
        <div class="duration">per project</div>
        <ul>
          <li><i class="fas fa-check"></i> Unlimited Concepts</li>
          <li><i class="fas fa-check"></i> Complete Brand Package</li>
          <li><i class="fas fa-check"></i> Unlimited Revisions</li>
          <li><i class="fas fa-check"></i> Marketing Collateral</li>
          <li><i class="fas fa-check"></i> Priority Support</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline">Get Started</a>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Gallery with Filter -->
<section class="section section-alt">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2>Design <span>Portfolio</span></h2>
      <p>See our creative work in action. Each project tells a unique brand story.</p>
    </div>
    <!-- Branding Row -->
    <div class="gd-portfolio-section" id="gd-branding">
      <div class="gd-portfolio-header"><i class="fas fa-tag"></i> Branding <a href="#gd-branding" class="gd-view-all">View All <i class="fas fa-arrow-right"></i></a></div>
      <div class="gd-gallery-wrapper">
        <div class="gd-gallery-track">
          <?php
          $brandingImages = glob('../images/portfolio/branding/*.{jpg,png,jpeg,gif,webp}', GLOB_BRACE);
          if ($brandingImages) {
            foreach ($brandingImages as $img) {
              $filename = pathinfo($img, PATHINFO_FILENAME);
              $clean = ucwords(preg_replace('/[()]/', ' ', str_replace(['-', '_'], ' ', $filename)));
              $clean = preg_replace('/\s+/', ' ', trim($clean));
          ?>
          <div class="gd-gallery-item fade-in" data-category="branding">
            <span class="gd-gallery-tag">Brand Identity</span>
            <img class="gd-card-img" loading="lazy" src="<?= $img ?>" alt="<?= htmlspecialchars($clean) ?>">
            <div class="gd-card-info"><h4><?= htmlspecialchars($clean) ?></h4><span class="gd-category">Brand identity presentation</span></div>
            <div class="gd-gallery-overlay"><h4><?= htmlspecialchars($clean) ?></h4><span>Brand identity presentation</span></div>
          </div>
          <?php } foreach ($brandingImages as $img) {
              $filename = pathinfo($img, PATHINFO_FILENAME);
              $clean = ucwords(preg_replace('/[()]/', ' ', str_replace(['-', '_'], ' ', $filename)));
              $clean = preg_replace('/\s+/', ' ', trim($clean));
          ?>
          <div class="gd-gallery-item fade-in" data-category="branding">
            <span class="gd-gallery-tag">Brand Identity</span>
            <img class="gd-card-img" loading="lazy" src="<?= $img ?>" alt="<?= htmlspecialchars($clean) ?>">
            <div class="gd-card-info"><h4><?= htmlspecialchars($clean) ?></h4><span class="gd-category">Brand identity presentation</span></div>
            <div class="gd-gallery-overlay"><h4><?= htmlspecialchars($clean) ?></h4><span>Brand identity presentation</span></div>
          </div>
          <?php } } ?>
        </div>
      </div>
    </div>
    <!-- Digital Row -->
    <div class="gd-portfolio-section" id="gd-digital">
      <div class="gd-portfolio-header"><i class="fas fa-laptop"></i> Digital <a href="#gd-digital" class="gd-view-all">View All <i class="fas fa-arrow-right"></i></a></div>
      <div class="gd-gallery-wrapper">
        <div class="gd-gallery-track">
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/Free%20Paper%20Logo%20d.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Paper Logo Digital</h4><span class="gd-category">Digital brand presentation</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Logo Digital</h4><span>Digital brand presentation</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/RENTIX1.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Rentix Design 1</h4><span class="gd-category">Digital platform design</span></div>
            <div class="gd-gallery-overlay"><h4>Rentix Design 1</h4><span>Digital platform design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/RENTIX2.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Rentix Design 2</h4><span class="gd-category">Digital platform design</span></div>
            <div class="gd-gallery-overlay"><h4>Rentix Design 2</h4><span>Digital platform design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/account.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Account Dashboard</h4><span class="gd-category">UI/UX design</span></div>
            <div class="gd-gallery-overlay"><h4>Account Dashboard</h4><span>UI/UX design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Social Media</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/design%201.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Social Media Design</h4><span class="gd-category">Engaging digital graphics</span></div>
            <div class="gd-gallery-overlay"><h4>Social Media Design</h4><span>Engaging digital graphics</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/madaraka%20day%20webi.jpg" alt="Digital Design">
            <div class="gd-card-info"><h4>Madaraka Day Web</h4><span class="gd-category">Special event design</span></div>
            <div class="gd-gallery-overlay"><h4>Madaraka Day Web</h4><span>Special event design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/tax%26compliance.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Tax & Compliance</h4><span class="gd-category">Corporate digital design</span></div>
            <div class="gd-gallery-overlay"><h4>Tax & Compliance</h4><span>Corporate digital design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/time.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Time Dashboard</h4><span class="gd-category">UI/UX design</span></div>
            <div class="gd-gallery-overlay"><h4>Time Dashboard</h4><span>UI/UX design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/web1.png" alt="Web Design">
            <div class="gd-card-info"><h4>Website Design</h4><span class="gd-category">Modern web layouts</span></div>
            <div class="gd-gallery-overlay"><h4>Website Design</h4><span>Modern web layouts</span></div>
          </div>
          <!-- dup -->
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/Free%20Paper%20Logo%20d.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Paper Logo Digital</h4><span class="gd-category">Digital brand presentation</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Logo Digital</h4><span>Digital brand presentation</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/RENTIX1.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Rentix Design 1</h4><span class="gd-category">Digital platform design</span></div>
            <div class="gd-gallery-overlay"><h4>Rentix Design 1</h4><span>Digital platform design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/RENTIX2.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Rentix Design 2</h4><span class="gd-category">Digital platform design</span></div>
            <div class="gd-gallery-overlay"><h4>Rentix Design 2</h4><span>Digital platform design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/account.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Account Dashboard</h4><span class="gd-category">UI/UX design</span></div>
            <div class="gd-gallery-overlay"><h4>Account Dashboard</h4><span>UI/UX design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Social Media</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/design%201.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Social Media Design</h4><span class="gd-category">Engaging digital graphics</span></div>
            <div class="gd-gallery-overlay"><h4>Social Media Design</h4><span>Engaging digital graphics</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/madaraka%20day%20webi.jpg" alt="Digital Design">
            <div class="gd-card-info"><h4>Madaraka Day Web</h4><span class="gd-category">Special event design</span></div>
            <div class="gd-gallery-overlay"><h4>Madaraka Day Web</h4><span>Special event design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/tax%26compliance.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Tax & Compliance</h4><span class="gd-category">Corporate digital design</span></div>
            <div class="gd-gallery-overlay"><h4>Tax & Compliance</h4><span>Corporate digital design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/time.png" alt="Digital Design">
            <div class="gd-card-info"><h4>Time Dashboard</h4><span class="gd-category">UI/UX design</span></div>
            <div class="gd-gallery-overlay"><h4>Time Dashboard</h4><span>UI/UX design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="digital">
            <span class="gd-gallery-tag">Digital</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/digital/web1.png" alt="Web Design">
            <div class="gd-card-info"><h4>Website Design</h4><span class="gd-category">Modern web layouts</span></div>
            <div class="gd-gallery-overlay"><h4>Website Design</h4><span>Modern web layouts</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Packages Row -->
    <div class="gd-portfolio-section" id="gd-packages">
      <div class="gd-portfolio-header"><i class="fas fa-box"></i> Packages <a href="#gd-packages" class="gd-view-all">View All <i class="fas fa-arrow-right"></i></a></div>
      <div class="gd-gallery-wrapper">
        <div class="gd-gallery-track">
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/PaperBag_180x220x80_Mockup_1.jpg" alt="Packaging">
            <div class="gd-card-info"><h4>Paper Bag Mockup</h4><span class="gd-category">Custom packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Bag Mockup</h4><span>Custom packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/cup.png" alt="Packaging">
            <div class="gd-card-info"><h4>Cup Mockup</h4><span class="gd-category">Cup packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Cup Mockup</h4><span>Cup packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/mockup1.png" alt="Packaging">
            <div class="gd-card-info"><h4>Packaging Mockup</h4><span class="gd-category">Product packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Packaging Mockup</h4><span>Product packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/totebag-138-backlink.png" alt="Packaging">
            <div class="gd-card-info"><h4>Tote Bag Mockup</h4><span class="gd-category">Tote bag packaging</span></div>
            <div class="gd-gallery-overlay"><h4>Tote Bag Mockup</h4><span>Tote bag packaging</span></div>
          </div>
          <!-- dup -->
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/PaperBag_180x220x80_Mockup_1.jpg" alt="Packaging">
            <div class="gd-card-info"><h4>Paper Bag Mockup</h4><span class="gd-category">Custom packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Bag Mockup</h4><span>Custom packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/cup.png" alt="Packaging">
            <div class="gd-card-info"><h4>Cup Mockup</h4><span class="gd-category">Cup packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Cup Mockup</h4><span>Cup packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/mockup1.png" alt="Packaging">
            <div class="gd-card-info"><h4>Packaging Mockup</h4><span class="gd-category">Product packaging design</span></div>
            <div class="gd-gallery-overlay"><h4>Packaging Mockup</h4><span>Product packaging design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="packaging">
            <span class="gd-gallery-tag">Packaging</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/packeges/totebag-138-backlink.png" alt="Packaging">
            <div class="gd-card-info"><h4>Tote Bag Mockup</h4><span class="gd-category">Tote bag packaging</span></div>
            <div class="gd-gallery-overlay"><h4>Tote Bag Mockup</h4><span>Tote bag packaging</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Printing Row -->
    <div class="gd-portfolio-section" id="gd-printing">
      <div class="gd-portfolio-header"><i class="fas fa-print"></i> Printing <a href="#gd-printing" class="gd-view-all">View All <i class="fas fa-arrow-right"></i></a></div>
      <div class="gd-gallery-wrapper">
        <div class="gd-gallery-track">
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/Free%20Two%20Bucket%20Hat%20Mockups.png" alt="Print Design">
            <div class="gd-card-info"><h4>Bucket Hat Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>Bucket Hat Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/Hoodie_Mockup.png" alt="Print Design">
            <div class="gd-card-info"><h4>Hoodie Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>Hoodie Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/PaperBag_180x220x80_Mockup_1.jpg" alt="Print Design">
            <div class="gd-card-info"><h4>Paper Bag Mockup</h4><span class="gd-category">Custom print design</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Bag Mockup</h4><span>Custom print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/T-Shirt%20%26%20Tag%20Mockup.png" alt="Print Design">
            <div class="gd-card-info"><h4>T-Shirt & Tag Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>T-Shirt & Tag Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/cap%20white.png" alt="Print Design">
            <div class="gd-card-info"><h4>White Cap Mockup</h4><span class="gd-category">Cap print design</span></div>
            <div class="gd-gallery-overlay"><h4>White Cap Mockup</h4><span>Cap print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/cup.png" alt="Print Design">
            <div class="gd-card-info"><h4>Cup Mockup</h4><span class="gd-category">Mug print design</span></div>
            <div class="gd-gallery-overlay"><h4>Cup Mockup</h4><span>Mug print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/hat.png" alt="Print Design">
            <div class="gd-card-info"><h4>Hat Mockup</h4><span class="gd-category">Hat print design</span></div>
            <div class="gd-gallery-overlay"><h4>Hat Mockup</h4><span>Hat print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202604132018.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202605032203%20%281%29.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202605032238.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/logomock%20%282%29.png" alt="Print Design">
            <div class="gd-card-info"><h4>Logo Mockup</h4><span class="gd-category">Print logo presentation</span></div>
            <div class="gd-gallery-overlay"><h4>Logo Mockup</h4><span>Print logo presentation</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/totebag-138-backlink.png" alt="Print Design">
            <div class="gd-card-info"><h4>Tote Bag Mockup</h4><span class="gd-category">Tote bag print design</span></div>
            <div class="gd-gallery-overlay"><h4>Tote Bag Mockup</h4><span>Tote bag print design</span></div>
          </div>
          <!-- dup -->
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/Free%20Two%20Bucket%20Hat%20Mockups.png" alt="Print Design">
            <div class="gd-card-info"><h4>Bucket Hat Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>Bucket Hat Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/Hoodie_Mockup.png" alt="Print Design">
            <div class="gd-card-info"><h4>Hoodie Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>Hoodie Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/PaperBag_180x220x80_Mockup_1.jpg" alt="Print Design">
            <div class="gd-card-info"><h4>Paper Bag Mockup</h4><span class="gd-category">Custom print design</span></div>
            <div class="gd-gallery-overlay"><h4>Paper Bag Mockup</h4><span>Custom print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/T-Shirt%20%26%20Tag%20Mockup.png" alt="Print Design">
            <div class="gd-card-info"><h4>T-Shirt & Tag Mockup</h4><span class="gd-category">Apparel print design</span></div>
            <div class="gd-gallery-overlay"><h4>T-Shirt & Tag Mockup</h4><span>Apparel print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/cap%20white.png" alt="Print Design">
            <div class="gd-card-info"><h4>White Cap Mockup</h4><span class="gd-category">Cap print design</span></div>
            <div class="gd-gallery-overlay"><h4>White Cap Mockup</h4><span>Cap print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/cup.png" alt="Print Design">
            <div class="gd-card-info"><h4>Cup Mockup</h4><span class="gd-category">Mug print design</span></div>
            <div class="gd-gallery-overlay"><h4>Cup Mockup</h4><span>Mug print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/hat.png" alt="Print Design">
            <div class="gd-card-info"><h4>Hat Mockup</h4><span class="gd-category">Hat print design</span></div>
            <div class="gd-gallery-overlay"><h4>Hat Mockup</h4><span>Hat print design</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202604132018.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202605032203%20%281%29.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/image_Pippit_202605032238.png" alt="Print Design">
            <div class="gd-card-info"><h4>Print Design</h4><span class="gd-category">Print production</span></div>
            <div class="gd-gallery-overlay"><h4>Print Design</h4><span>Print production</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/logomock%20%282%29.png" alt="Print Design">
            <div class="gd-card-info"><h4>Logo Mockup</h4><span class="gd-category">Print logo presentation</span></div>
            <div class="gd-gallery-overlay"><h4>Logo Mockup</h4><span>Print logo presentation</span></div>
          </div>
          <div class="gd-gallery-item fade-in" data-category="print">
            <span class="gd-gallery-tag">Print</span>
            <img class="gd-card-img" loading="lazy" src="../images/portfolio/printing/totebag-138-backlink.png" alt="Print Design">
            <div class="gd-card-info"><h4>Tote Bag Mockup</h4><span class="gd-category">Tote bag print design</span></div>
            <div class="gd-gallery-overlay"><h4>Tote Bag Mockup</h4><span>Tote bag print design</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="section">
  <div class="container">
    <div class="section-title fade-in">
      <div class="gd-divider"></div>
      <h2>Frequently Asked <span>Questions</span></h2>
      <p>Everything you need to know about our graphic design services.</p>
    </div>
    <div class="gd-faq">
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What is the typical turnaround time for a logo design? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Our standard logo design process takes 5-7 business days. This includes research, concept development, revisions, and final delivery. Rush orders can be completed in 48 hours.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">How many revisions are included in each package? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Revision counts vary by package: Starter includes 2 revisions, Professional includes 5, and Premium offers unlimited revisions until you're completely satisfied.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What file formats will I receive? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>You'll receive all standard formats including AI, EPS, PDF, PNG, JPG, and SVG. We also provide brand guidelines documents with color codes and font specifications.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Do you offer printing services for the designs? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Yes! We have an in-house printing department that can handle everything from business cards and brochures to large format banners and signage. We offer a seamless design-to-print experience.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Can I get a refund if I'm not satisfied? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>We offer a 100% satisfaction guarantee. If you're not happy with the initial concepts, we'll work with you to make it right. Our revision process ensures you love the final result.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section gd-cta">
  <div class="container">
    <div class="gd-cta-content fade-in">
      <h2>Ready to Transform Your Brand?</h2>
      <p>Let's create something amazing together. Get in touch for a free consultation and discover how great design can elevate your business.</p>
      <a href="../quote.php" class="btn btn-secondary btn-lg"><i class="fas fa-paper-plane"></i> Start Your Project</a>
      <div class="gd-cta-stats">
        <div class="gd-cta-stat">
          <div class="num">500+</div>
          <div class="label">Projects Delivered</div>
        </div>
        <div class="gd-cta-stat">
          <div class="num">98%</div>
          <div class="label">Happy Clients</div>
        </div>
        <div class="gd-cta-stat">
          <div class="num">24hrs</div>
          <div class="label">Quick Turnaround</div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../inc/footer.php'; ?>
