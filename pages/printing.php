<?php $pageTitle = 'Printing Services'; $currentPage = 'printing'; include '../inc/header.php'; ?>

<section class="pr-banner">
  <div class="container">
    <div class="breadcrumb" style="text-align:center;"><a href="../index.php">Home</a> <span>/</span> <span>Printing Services</span></div>
    <h1 style="text-align:center;">Printing Services</h1>
    <p style="text-align:center;">High-quality printing solutions for all your business needs.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="service-detail-grid">
      <div>
        <div class="pr-section-title" style="text-align:center;">
          <div class="pr-bar" style="margin:0 auto 14px;"></div>
          <h2>Professional Printing <span>Services</span></h2>
        </div>
        <p style="margin-bottom: 30px; text-align:center;">From business cards to large format banners, we deliver premium quality print materials that make your brand shine. Fast turnaround, competitive prices, and exceptional quality guaranteed.</p>
        <div class="pr-swatch">
          <span></span><span></span><span></span><span></span>
        </div>
        <div class="pr-stats" style="margin-bottom:30px;">
          <div class="pr-stat"><div class="num">10K+</div><div class="label">Orders Fulfilled</div></div>
          <div class="pr-stat"><div class="num">99%</div><div class="label">On-Time Delivery</div></div>
          <div class="pr-stat"><div class="num">4.9</div><div class="label">Customer Rating</div></div>
          <div class="pr-stat"><div class="num">24hr</div><div class="label">Rush Available</div></div>
        </div>
        <div class="pr-services-grid">
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-flag"></i></div>
            <h3>Banner Printing</h3>
            <p>Large format banners for indoor and outdoor use, weather-resistant with vibrant full-color printing.</p>
          </div>
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-id-card"></i></div>
            <h3>Business Cards</h3>
            <p>Premium business cards on high-quality 350gsm paper with glossy or matte laminate finish options.</p>
          </div>
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-book"></i></div>
            <h3>Brochures & Flyers</h3>
            <p>Tri-fold brochures, flyers, and leaflets in various sizes for effective marketing and promotions.</p>
          </div>
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-tag"></i></div>
            <h3>Stickers & Labels</h3>
            <p>Custom stickers and labels in any size, shape, and material including waterproof and vinyl options.</p>
          </div>
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-tshirt"></i></div>
            <h3>T-Shirt Printing</h3>
            <p>Custom t-shirt printing using screen printing and DTG technology for vibrant, long-lasting designs.</p>
          </div>
          <div class="pr-service-card fade-in">
            <div class="pr-icon"><i class="fas fa-arrows-alt"></i></div>
            <h3>Large Format Printing</h3>
            <p>Posters, signage, vehicle wraps, exhibition displays, and corporate branding materials of any size.</p>
          </div>
        </div>
      </div>
      <aside class="quote-sidebar">
        <div class="sidebar-card">
          <h3>Place an Order</h3>
          <form class="contact-form" method="POST" action="../process-form.php">
            <input type="hidden" name="form_type" value="contact">
            <div class="form-group">
              <label>Your Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone <span class="required">*</span></label>
              <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Print Product</label>
              <select name="subject" class="form-control">
                <option>Business Cards</option>
                <option>Banners</option>
                <option>Brochures</option>
                <option>Stickers</option>
                <option>T-Shirts</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="number" name="quantity" class="form-control" min="1" value="100">
            </div>
            <div class="form-group">
              <label>Details</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Describe your print requirements..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-paper-plane"></i> Submit Order</button>
          </form>
        </div>
        <div class="sidebar-card contact-sidebar">
          <h3>Print Shop</h3>
          <div class="contact-item"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener" style="color:inherit;">+254 705 359 471</a></div>
          <div class="contact-item"><i class="fas fa-envelope"></i> <a href="mailto:digileotechsolutions@gmail.com" style="color:inherit;">digileotechsolutions@gmail.com</a></div>
          <div class="contact-item"><i class="fas fa-clock"></i> Mon - Fri: 8AM - 6PM</div>
        </div>
      </aside>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Why Quality <span>Printing Matters</span></h2>
      <p style="margin:0 auto;">Professional print materials leave lasting impressions and build brand credibility.</p>
    </div>
    <div class="why-grid" style="margin-top:40px;">
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-bottom:3px solid var(--pr-cyan);">
        <div style="font-size:2rem;color:var(--pr-cyan);margin-bottom:14px;"><i class="fas fa-hand-pointer"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Tangible Branding</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Physical print materials create lasting tactile impressions that digital media cannot replicate.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-bottom:3px solid var(--pr-magenta);">
        <div style="font-size:2rem;color:var(--pr-magenta);margin-bottom:14px;"><i class="fas fa-chart-bar"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Higher Engagement</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Printed marketing has 70% higher recall than digital ads and is kept 17 days longer on average.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-bottom:3px solid #f9a825;">
        <div style="font-size:2rem;color:#f9a825;margin-bottom:14px;"><i class="fas fa-check-circle"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Professional Credibility</h4>
        <p style="font-size:0.9rem;color:var(--gray);">High-quality business cards, brochures, and materials signal professionalism and build trust.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-bottom:3px solid var(--pr-black);">
        <div style="font-size:2rem;color:var(--pr-black);margin-bottom:14px;"><i class="fas fa-leaf"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Eco-Friendly Options</h4>
        <p style="font-size:0.9rem;color:var(--gray);">We offer sustainable printing with recycled paper, soy-based inks, and responsible processes.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Printing <span>Capabilities</span></h2>
      <p style="margin:0 auto;">State-of-the-art equipment for exceptional print quality.</p>
    </div>
    <div class="pr-tools" style="margin-top:40px;">
      <span>Digital Printing</span><span>Offset Printing</span><span>Screen Printing</span>
      <span>Laser Cutting</span><span>UV Printing</span><span>Binding & Finishing</span>
      <span>Large Format</span><span>Embossing</span>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Printing <span>Process</span></h2>
      <p style="margin:0 auto;">How we deliver high-quality print materials.</p>
    </div>
    <div class="pr-process" style="margin-top:40px;">
      <div class="pr-process-step fade-in">
        <div class="pr-step-num">01</div>
        <h4>Submit & Quote</h4>
        <p>Send us your design or requirements and we'll provide a competitive quote within hours.</p>
      </div>
      <div class="pr-process-step fade-in">
        <div class="pr-step-num">02</div>
        <h4>Artwork Review</h4>
        <p>Our prepress team checks your files for print readiness and suggests adjustments if needed.</p>
      </div>
      <div class="pr-process-step fade-in">
        <div class="pr-step-num">03</div>
        <h4>Production</h4>
        <p>Using state-of-the-art equipment, we print with precise color management and quality control.</p>
      </div>
      <div class="pr-process-step fade-in">
        <div class="pr-step-num">04</div>
        <h4>Delivery</h4>
        <p>Your order is quality-checked, packed carefully, and delivered on time.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Print <span>Pricing</span></h2>
      <p style="margin:0 auto;">Affordable rates for premium print quality.</p>
    </div>
    <div class="pricing-grid" style="margin-top:40px;">
      <div class="pr-pricing-card fade-in">
        <h3>Business Cards</h3>
        <div class="pr-price">KSh 5,000</div>
        <div class="pr-duration">per 100 pcs</div>
        <ul>
          <li><i class="fas fa-check"></i> Double-sided</li>
          <li><i class="fas fa-check"></i> Full Color</li>
          <li><i class="fas fa-check"></i> 350gsm Paper</li>
          <li><i class="fas fa-check"></i> Glossy or Matte</li>
          <li><i class="fas fa-check"></i> 3 Days Delivery</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Order Now</a>
      </div>
      <div class="pr-pricing-card featured fade-in">
        <div class="pr-badge">Popular</div>
        <h3>Banners</h3>
        <div class="pr-price">KSh 1,000</div>
        <div class="pr-duration">per sq meter</div>
        <ul>
          <li><i class="fas fa-check"></i> Weather Resistant</li>
          <li><i class="fas fa-check"></i> High Resolution</li>
          <li><i class="fas fa-check"></i> Grommets Included</li>
          <li><i class="fas fa-check"></i> UV Protected</li>
          <li><i class="fas fa-check"></i> 2 Days Delivery</li>
        </ul>
        <a href="../quote.php" class="btn btn-primary" style="width:100%;justify-content:center;">Order Now</a>
      </div>
      <div class="pr-pricing-card fade-in">
        <h3>Brochures</h3>
        <div class="pr-price">KSh 5,500</div>
        <div class="pr-duration">per 50 pcs</div>
        <ul>
          <li><i class="fas fa-check"></i> Full Color Both Sides</li>
          <li><i class="fas fa-check"></i> A4 Size</li>
          <li><i class="fas fa-check"></i> 150gsm Art Paper</li>
          <li><i class="fas fa-check"></i> Folding Included</li>
          <li><i class="fas fa-check"></i> Design Assistance</li>
          <li><i class="fas fa-check"></i> 5 Days Delivery</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Order Now</a>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Print Products <span>Gallery</span></h2>
      <p style="margin:0 auto;">See samples of our printing work across different categories.</p>
    </div>
    <div class="pr-gallery-wrapper" style="margin-top:40px;">
      <div class="pr-gallery-track">
<?php
$prFiles = glob("../images/our portfolio/Printing/*.{png,jpg,jpeg}", GLOB_BRACE);
foreach ($prFiles as $prFile):
  $prName = pathinfo($prFile, PATHINFO_FILENAME);
  $prEncoded = rawurlencode(basename($prFile));
?>
        <div class="pr-gallery-item fade-in">
          <img src="../images/our portfolio/Printing/<?= $prEncoded ?>" alt="<?= htmlspecialchars($prName) ?>" loading="lazy">
          <div class="pr-gallery-overlay"><h4><?= htmlspecialchars($prName) ?></h4><span>Print Product</span></div>
        </div>
<?php endforeach; ?>
        <!-- dup -->
<?php
foreach ($prFiles as $prFile):
  $prName = pathinfo($prFile, PATHINFO_FILENAME);
  $prEncoded = rawurlencode(basename($prFile));
?>
        <div class="pr-gallery-item fade-in">
          <img src="../images/our portfolio/Printing/<?= $prEncoded ?>" alt="<?= htmlspecialchars($prName) ?>" loading="lazy">
          <div class="pr-gallery-overlay"><h4><?= htmlspecialchars($prName) ?></h4><span>Print Product</span></div>
        </div>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="pr-section-title fade-in" style="text-align:center;">
      <div class="pr-bar" style="margin:0 auto 14px;"></div>
      <h2>Frequently Asked <span>Questions</span></h2>
      <p style="margin:0 auto;">Everything you need to know about our printing services.</p>
    </div>
    <div class="gd-faq">
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What file formats do you accept? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>We accept PDF, AI, EPS, PSD, JPEG, and PNG. We recommend PDF with embedded fonts at 300 DPI resolution. Our team can help with file preparation.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What is the turnaround time? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Standard turnaround is 2-5 business days. Rush orders can be completed within 24 hours at an additional cost.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Do you offer design services? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Yes! Our in-house design team can create or refine your print-ready designs with unlimited revisions.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What is the minimum order? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Business cards have a 50-piece minimum, brochures start at 100, and banners have no minimum.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Do you offer delivery? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Yes, we deliver within Nairobi and surrounding areas. Orders above KSh 5,000 get free delivery.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="pr-cta">
  <div class="container">
    <h2 class="fade-in">Ready to Bring Your Designs to Life?</h2>
    <p class="fade-in">Get premium quality prints at competitive prices. Place your order today.</p>
    <a href="../quote.php" class="btn btn-secondary btn-lg fade-in"><i class="fas fa-paper-plane"></i> Place Your Order</a>
  </div>
</section>

<?php include '../inc/footer.php'; ?>
