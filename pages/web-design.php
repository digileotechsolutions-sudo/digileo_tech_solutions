<?php $pageTitle = 'Web Design Services'; $currentPage = 'web-design'; include '../inc/header.php'; ?>

<section class="wd-banner">
  <div class="container">
    <div class="breadcrumb" style="text-align:center;"><a href="../index.php">Home</a> <span>/</span> <span>Web Design</span></div>
    <h1 style="text-align:center;">Web Design Services</h1>
    <p style="text-align:center;">Beautiful, responsive websites that captivate your audience and drive results.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="service-detail-grid">
      <div>
        <div class="wd-section-title" style="text-align:center;">
          <div class="wd-bar" style="margin:0 auto 14px;"></div>
          <h2>Professional Web <span>Design</span></h2>
        </div>
        <p style="margin-bottom: 30px; text-align:center;">We design user-centric websites that combine aesthetic appeal with seamless functionality. Every pixel is crafted to deliver an exceptional user experience that drives engagement and conversions.</p>
        <div class="wd-stats" style="margin-bottom:30px;">
          <div class="wd-stat"><div class="num">150+</div><div class="label">Websites Launched</div></div>
          <div class="wd-stat"><div class="num">97%</div><div class="label">Client Satisfaction</div></div>
          <div class="wd-stat"><div class="num">40%</div><div class="label">Avg. Conversion Lift</div></div>
          <div class="wd-stat"><div class="num">2wk</div><div class="label">Avg. Delivery Time</div></div>
        </div>
        <div class="wd-services-grid">
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-globe"></i></div>
            <h3>Responsive Web Design</h3>
            <p>Websites that look stunning on every device — desktop, tablet, and mobile — with fluid layouts and touch-friendly navigation.</p>
          </div>
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-paint-brush"></i></div>
            <h3>UI/UX Design</h3>
            <p>Intuitive interfaces and delightful user experiences that keep visitors engaged and guide them seamlessly toward conversion.</p>
          </div>
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-bullseye"></i></div>
            <h3>Landing Pages</h3>
            <p>High-converting landing pages optimized for campaigns, lead generation, and specific call-to-action goals.</p>
          </div>
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-building"></i></div>
            <h3>Corporate Websites</h3>
            <p>Professional business websites that establish credibility, showcase your brand, and communicate your value proposition effectively.</p>
          </div>
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-sync-alt"></i></div>
            <h3>Website Redesign</h3>
            <p>Modern redesigns that breathe new life into existing websites, improving performance, aesthetics, and user engagement.</p>
          </div>
          <div class="wd-service-card fade-in">
            <div class="wd-icon"><i class="fas fa-shopping-cart"></i></div>
            <h3>E-commerce Design</h3>
            <p>Beautiful online stores designed for maximum conversions, easy navigation, and seamless checkout experiences.</p>
          </div>
        </div>
      </div>
      <aside class="quote-sidebar">
        <div class="sidebar-card">
          <h3>Request a Quote</h3>
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
              <label>Website Type</label>
              <select name="subject" class="form-control">
                <option>Corporate Website</option>
                <option>Landing Page</option>
                <option>E-commerce</option>
                <option>Blog</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Tell us about your project..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-paper-plane"></i> Send Request</button>
          </form>
        </div>
        <div class="sidebar-card contact-sidebar">
          <h3>Get in Touch</h3>
          <div class="contact-item"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener" style="color:inherit;">+254 705 359 471</a></div>
          <div class="contact-item"><i class="fas fa-envelope"></i> <a href="mailto:digileotechsolutions@gmail.com" style="color:inherit;">digileotechsolutions@gmail.com</a></div>
          <div class="contact-item"><i class="fas fa-clock"></i> Mon - Fri: 8AM - 6PM</div>
        </div>
      </aside>
    </div>
    <p style="text-align:center;margin-top:24px;font-size:0.95rem;color:var(--gray);">Click to view website</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="wd-section-title fade-in" style="text-align:center;">
      <div class="wd-bar" style="margin:0 auto 14px;"></div>
      <h2>Design Tools <span>& Software</span></h2>
      <p style="margin:0 auto;">We use industry-leading tools to create pixel-perfect web designs.</p>
    </div>
    <div class="wd-tools">
      <span>Figma</span><span>Adobe XD</span><span>Photoshop</span><span>Illustrator</span>
      <span>WordPress</span><span>Elementor</span><span>VS Code</span><span>Bootstrap</span>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="wd-section-title fade-in" style="text-align:center;">
      <div class="wd-bar" style="margin:0 auto 14px;"></div>
      <h2>Our Design <span>Workflow</span></h2>
      <p style="margin:0 auto;">How we bring your website vision to life.</p>
    </div>
    <div class="wd-process">
      <div class="wd-process-step active fade-in">
        <div class="wd-step-circle">01</div>
        <h4>Discovery</h4>
        <p>We analyze your brand, audience, competitors, and goals to establish a solid design foundation.</p>
      </div>
      <div class="wd-process-step fade-in">
        <div class="wd-step-circle">02</div>
        <h4>Wireframing</h4>
        <p>We create layout blueprints and user flow maps that define the structure and navigation.</p>
      </div>
      <div class="wd-process-step fade-in">
        <div class="wd-step-circle">03</div>
        <h4>Visual Design</h4>
        <p>High-fidelity mockups with your brand identity, color palette, typography, and imagery.</p>
      </div>
      <div class="wd-process-step fade-in">
        <div class="wd-step-circle">04</div>
        <h4>Launch</h4>
        <p>Deploy your live site with ongoing performance monitoring and SEO optimization.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="wd-section-title fade-in" style="text-align:center;">
      <div class="wd-bar" style="margin:0 auto 14px;"></div>
      <h2>Web Design <span>Plans</span></h2>
      <p style="margin:0 auto;">Choose the package that fits your business needs.</p>
    </div>
    <div class="pricing-grid">
      <div class="wd-pricing-card fade-in">
        <h3>Starter</h3>
        <div class="wd-price">KSh 15,000</div>
        <div class="wd-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> 5 Pages</li>
          <li><i class="fas fa-check"></i> Responsive Design</li>
          <li><i class="fas fa-check"></i> Contact Form</li>
          <li><i class="fas fa-check"></i> 2 Revisions</li>
          <li><i class="fas fa-times"></i> CMS Integration</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Get Started</a>
      </div>
      <div class="wd-pricing-card featured fade-in">
        <div class="wd-price-badge">Popular</div>
        <h3>Business</h3>
        <div class="wd-price">KSh 55,000</div>
        <div class="wd-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> 10 Pages</li>
          <li><i class="fas fa-check"></i> Responsive Design</li>
          <li><i class="fas fa-check"></i> CMS Integration</li>
          <li><i class="fas fa-check"></i> SEO Optimization</li>
          <li><i class="fas fa-check"></i> 5 Revisions</li>
        </ul>
        <a href="../quote.php" class="btn btn-primary" style="width:100%;justify-content:center;">Get Started</a>
      </div>
      <div class="wd-pricing-card fade-in">
        <h3>Premium</h3>
        <div class="wd-price">KSh 95,000</div>
        <div class="wd-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> Unlimited Pages</li>
          <li><i class="fas fa-check"></i> Custom Animations</li>
          <li><i class="fas fa-check"></i> E-commerce Ready</li>
          <li><i class="fas fa-check"></i> Priority Support</li>
          <li><i class="fas fa-check"></i> Unlimited Revisions</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Get Started</a>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="wd-section-title fade-in" style="text-align:center;">
      <div class="wd-bar" style="margin:0 auto 14px;"></div>
      <h2>Website <span>Showcase</span></h2>
      <p style="margin:0 auto;">Recent website designs we're proud of.</p>
    </div>
    <div class="wd-portfolio">
<?php
$wsFiles = glob("../images/Website Showcase/*.{png,jpg,jpeg}", GLOB_BRACE);
$wsLinks = ['https://havenedgerealtors.com/', 'https://bosrenadventures.co.ke/'];
$wsIdx = 0;
foreach ($wsFiles as $wsFile):
  $wsName = pathinfo($wsFile, PATHINFO_FILENAME);
  $wsEncoded = rawurlencode(basename($wsFile));
  $wsLink = $wsLinks[$wsIdx] ?? '#';
  $wsIdx++;
?>
      <div class="wd-port-item fade-in">
        <a href="<?= $wsLink ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:inherit;">
          <img src="../images/Website Showcase/<?= $wsEncoded ?>" alt="<?= htmlspecialchars($wsName) ?>" loading="lazy">
          <div class="wd-port-overlay"><h4><?= htmlspecialchars($wsName) ?></h4><span>Web Design</span></div>
        </a>
      </div>
<?php endforeach; ?>
    </div>
    <p style="text-align:center;margin-top:24px;font-size:0.95rem;color:var(--accent);font-weight:600;">Click to view website</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="wd-section-title fade-in" style="text-align:center;">
      <div class="wd-bar" style="margin:0 auto 14px;"></div>
      <h2>Frequently Asked <span>Questions</span></h2>
      <p style="margin:0 auto;">Everything you need to know about our web design services.</p>
    </div>
    <div class="gd-faq">
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">How long does it take to design a website? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Our standard website design takes 2-4 weeks depending on complexity. A simple landing page can be done in 1 week, while a full corporate website takes 3-4 weeks.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Will my website be mobile-friendly? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Absolutely! Every website we design is fully responsive and looks great on all devices — desktops, tablets, and smartphones.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Do you provide hosting services? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Yes, we offer reliable hosting packages with 99.9% uptime, daily backups, SSL certificates, and 24/7 support.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Can I update the website myself after launch? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Yes! We build websites on user-friendly CMS platforms like WordPress so you can easily update content without technical knowledge.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What information do you need to get started? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>We'll need your brand assets, content, any reference websites you like, and your goals for the project. We guide you through everything.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="wd-cta">
  <div class="container">
    <h2 class="fade-in">Ready to Build Your Dream Website?</h2>
    <p class="fade-in">Let's create a stunning, high-performing website that elevates your brand and drives results.</p>
    <a href="../quote.php" class="btn btn-secondary btn-lg fade-in"><i class="fas fa-paper-plane"></i> Start Your Project</a>
  </div>
</section>

<?php include '../inc/footer.php'; ?>
