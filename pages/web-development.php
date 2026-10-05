<?php $pageTitle = 'Web Development Services'; $currentPage = 'web-development'; include '../inc/header.php'; ?>

<section class="wdv-banner">
  <div class="container">
    <div class="breadcrumb" style="text-align:center;"><a href="../index.php">Home</a> <span>/</span> <span>Web Development</span></div>
    <h1 style="text-align:center;">Web Development Services</h1>
    <p style="text-align:center;">Powerful, scalable websites and web applications built with modern technology.</p>
  </div>
</section>

<section class="section wdv-section">
  <div class="container">
    <div class="service-detail-grid">
      <div>
        <div class="wdv-section-title" style="text-align:center;">
          <h2>Custom Web <span>Development</span></h2>
          <p>We build robust, scalable web solutions using cutting-edge technologies.</p>
        </div>
        <p style="margin: 20px 0 30px; text-align:center; color: rgba(255,255,255,0.6);">From e-commerce platforms to custom web applications, our development team delivers excellence at every stage.</p>
        <div class="wdv-services-grid">
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-store"></i></div>
            <h3>E-commerce Websites</h3>
            <p>Full-featured online stores with payment gateways, inventory management, secure checkout, and admin dashboards.</p>
          </div>
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-building"></i></div>
            <h3>Business Websites</h3>
            <p>Professional dynamic websites with content management systems, scalable architecture, and modern design.</p>
          </div>
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-home"></i></div>
            <h3>Real Estate Websites</h3>
            <p>Property listing platforms with advanced search, filtering, virtual tours, and agent management systems.</p>
          </div>
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-school"></i></div>
            <h3>School Management Systems</h3>
            <p>Complete student and admin portals with attendance tracking, grades management, reporting, and parent communication.</p>
          </div>
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-cogs"></i></div>
            <h3>Custom Web Applications</h3>
            <p>Tailor-made applications designed to solve specific business challenges with scalable and maintainable code.</p>
          </div>
          <div class="wdv-service-card fade-in">
            <div class="wdv-icon"><i class="fas fa-plug"></i></div>
            <h3>API Integrations</h3>
            <p>Seamless integration with third-party services, payment gateways, CRMs, and external APIs.</p>
          </div>
        </div>
        <div style="margin-top:30px;">
          <h3 style="margin-bottom:16px;color:var(--dev-pink);font-size:1.05rem;">Technologies We Use</h3>
          <div class="wdv-tools">
            <span>PHP</span><span>Laravel</span><span>React</span><span>Vue.js</span><span>Node.js</span>
            <span>MySQL</span><span>PostgreSQL</span><span>Python</span><span>WordPress</span>
            <span>Shopify</span><span>REST APIs</span><span>GraphQL</span>
          </div>
        </div>
      </div>
      <aside class="quote-sidebar">
        <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px;border:1px solid var(--dev-border);margin-bottom:24px;">
          <h3 style="color:var(--dev-pink);font-size:1.1rem;font-weight:700;margin-bottom:18px;">Request a Quote</h3>
          <form class="contact-form" method="POST" action="../process-form.php">
            <input type="hidden" name="form_type" value="contact">
            <div class="form-group">
              <label style="color:rgba(255,255,255,0.7);">Your Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" style="background:var(--dev-surface);border-color:var(--dev-border);color:var(--white);" required>
            </div>
            <div class="form-group">
              <label style="color:rgba(255,255,255,0.7);">Email <span class="required">*</span></label>
              <input type="email" name="email" class="form-control" style="background:var(--dev-surface);border-color:var(--dev-border);color:var(--white);" required>
            </div>
            <div class="form-group">
              <label style="color:rgba(255,255,255,0.7);">Project Type</label>
              <select name="subject" class="form-control" style="background:var(--dev-surface);border-color:var(--dev-border);color:var(--white);">
                <option>Business Website</option>
                <option>E-commerce</option>
                <option>Web Application</option>
                <option>API Integration</option>
                <option>Other</option>
              </select>
            </div>
            <div class="form-group">
              <label style="color:rgba(255,255,255,0.7);">Message</label>
              <textarea name="message" class="form-control" rows="4" style="background:var(--dev-surface);border-color:var(--dev-border);color:var(--white);" placeholder="Describe your project..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;background:var(--dev-green);color:var(--dev-bg);"><i class="fas fa-paper-plane"></i> Send Request</button>
          </form>
        </div>
        <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px;border:1px solid var(--dev-border);">
          <h3 style="color:var(--dev-pink);font-size:1.1rem;font-weight:700;margin-bottom:18px;">Get in Touch</h3>
          <div style="display:flex;gap:12px;margin-bottom:12px;font-size:0.9rem;color:rgba(255,255,255,0.6);"><i class="fab fa-whatsapp" style="color:var(--dev-green);width:18px;margin-top:4px;"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener" style="color:inherit;">+254 705 359 471</a></div>
          <div style="display:flex;gap:12px;margin-bottom:12px;font-size:0.9rem;color:rgba(255,255,255,0.6);"><i class="fas fa-envelope" style="color:var(--dev-green);width:18px;margin-top:4px;"></i> <a href="mailto:digileotechsolutions@gmail.com" style="color:inherit;">digileotechsolutions@gmail.com</a></div>
          <div style="display:flex;gap:12px;font-size:0.9rem;color:rgba(255,255,255,0.6);"><i class="fas fa-clock" style="color:var(--dev-green);width:18px;margin-top:4px;"></i> Mon - Fri: 8AM - 6PM</div>
        </div>
      </aside>
    </div>
  </div>
</section>

<section class="section wdv-section-alt">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Why Expert <span>Development Matters</span></h2>
      <p style="margin:0 auto;">Professional web development is the foundation of a successful online presence.</p>
    </div>
    <div class="why-grid" style="margin-top:40px;">
      <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px 25px;text-align:center;border:1px solid var(--dev-border);transition:var(--transition);">
        <div style="font-size:2rem;color:var(--dev-green);margin-bottom:14px;"><i class="fas fa-rocket"></i></div>
        <h4 style="color:var(--dev-pink);font-size:1.05rem;font-weight:700;margin-bottom:8px;">Performance & Speed</h4>
        <p style="color:var(--dev-comment);font-size:0.88rem;">Optimized code and modern architecture ensure lightning-fast load times and improved user satisfaction.</p>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px 25px;text-align:center;border:1px solid var(--dev-border);transition:var(--transition);">
        <div style="font-size:2rem;color:var(--dev-purple);margin-bottom:14px;"><i class="fas fa-lock"></i></div>
        <h4 style="color:var(--dev-pink);font-size:1.05rem;font-weight:700;margin-bottom:8px;">Security First</h4>
        <p style="color:var(--dev-comment);font-size:0.88rem;">Robust security measures including encryption, secure authentication, and regular vulnerability assessments.</p>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px 25px;text-align:center;border:1px solid var(--dev-border);transition:var(--transition);">
        <div style="font-size:2rem;color:var(--dev-cyan);margin-bottom:14px;"><i class="fas fa-expand-arrows-alt"></i></div>
        <h4 style="color:var(--dev-pink);font-size:1.05rem;font-weight:700;margin-bottom:8px;">Scalability</h4>
        <p style="color:var(--dev-comment);font-size:0.88rem;">Our solutions grow with your business, handling increased traffic and feature requirements seamlessly.</p>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);padding:30px 25px;text-align:center;border:1px solid var(--dev-border);transition:var(--transition);">
        <div style="font-size:2rem;color:var(--dev-orange);margin-bottom:14px;"><i class="fas fa-headset"></i></div>
        <h4 style="color:var(--dev-pink);font-size:1.05rem;font-weight:700;margin-bottom:8px;">Reliable Support</h4>
        <p style="color:var(--dev-comment);font-size:0.88rem;">Ongoing maintenance, updates, and technical support keep your application running smoothly.</p>
      </div>
    </div>
  </div>
</section>

<section class="section wdv-section">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Technologies <span>& Frameworks</span></h2>
      <p style="margin:0 auto;">We leverage the best technologies to build powerful web solutions.</p>
    </div>
    <div class="wdv-stats" style="margin-top:40px;">
      <div class="wdv-stat"><div class="num">12+</div><div class="label">Frameworks</div></div>
      <div class="wdv-stat"><div class="num">8+</div><div class="label">Databases</div></div>
      <div class="wdv-stat"><div class="num">20+</div><div class="label">API Protocols</div></div>
      <div class="wdv-stat"><div class="num">6+</div><div class="label">Cloud Platforms</div></div>
    </div>
    <div class="wdv-tools" style="margin-top:30px;">
      <span>PHP</span><span>Laravel</span><span>React</span><span>Vue.js</span><span>Node.js</span>
      <span>MySQL</span><span>PostgreSQL</span><span>Python</span><span>WordPress</span>
      <span>Shopify</span><span>REST APIs</span><span>GraphQL</span>
    </div>
  </div>
</section>

<section class="section wdv-section-alt">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Development <span>Process</span></h2>
      <p style="margin:0 auto;">Our systematic approach to building exceptional web solutions.</p>
    </div>
    <div class="wdv-process" style="margin-top:40px;">
      <div class="wdv-process-step fade-in" data-step="01">
        <div class="wdv-step-icon"><i class="fas fa-clipboard-list"></i></div>
        <h4>Planning</h4>
        <p>Requirements gathering, architecture planning, database modeling, and technology stack selection.</p>
      </div>
      <div class="wdv-process-step fade-in" data-step="02">
        <div class="wdv-step-icon"><i class="fas fa-pencil-ruler"></i></div>
        <h4>Design & Prototype</h4>
        <p>UI/UX design with interactive prototypes for stakeholder approval before development begins.</p>
      </div>
      <div class="wdv-process-step fade-in" data-step="03">
        <div class="wdv-step-icon"><i class="fas fa-code"></i></div>
        <h4>Development</h4>
        <p>Agile development with regular sprints, code reviews, and continuous integration testing.</p>
      </div>
      <div class="wdv-process-step fade-in" data-step="04">
        <div class="wdv-step-icon"><i class="fas fa-rocket"></i></div>
        <h4>Deployment</h4>
        <p>Launch with monitoring, performance optimization, and ongoing maintenance support.</p>
      </div>
    </div>
  </div>
</section>

<section class="section wdv-section">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Development <span>Plans</span></h2>
      <p style="margin:0 auto;">Choose the package that fits your project needs.</p>
    </div>
    <div class="pricing-grid" style="margin-top:40px;">
      <div class="wdv-pricing-card fade-in">
        <h3>Starter</h3>
        <div class="wdv-price">KSh 35,000</div>
        <div class="wdv-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> 5 Pages Dynamic Website</li>
          <li><i class="fas fa-check"></i> Mobile Responsive</li>
          <li><i class="fas fa-check"></i> Contact Form</li>
          <li><i class="fas fa-check"></i> 2 Revisions</li>
          <li><i class="fas fa-times"></i> Admin Dashboard</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;border-color:var(--dev-purple);color:var(--dev-purple);">Get Started</a>
      </div>
      <div class="wdv-pricing-card featured fade-in">
        <div class="wdv-price-badge">Popular</div>
        <h3>Business</h3>
        <div class="wdv-price">KSh 35,000</div>
        <div class="wdv-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> 10 Pages Dynamic Website</li>
          <li><i class="fas fa-check"></i> CMS Integration</li>
          <li><i class="fas fa-check"></i> Admin Dashboard</li>
          <li><i class="fas fa-check"></i> SEO Optimization</li>
          <li><i class="fas fa-check"></i> 5 Revisions</li>
        </ul>
        <a href="../quote.php" class="btn btn-primary" style="width:100%;justify-content:center;background:var(--dev-green);color:var(--dev-bg);">Get Started</a>
      </div>
      <div class="wdv-pricing-card fade-in">
        <h3>Premium</h3>
        <div class="wdv-price">KSh 75,000</div>
        <div class="wdv-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> Custom Web Application</li>
          <li><i class="fas fa-check"></i> API Integrations</li>
          <li><i class="fas fa-check"></i> Advanced Admin Panel</li>
          <li><i class="fas fa-check"></i> Priority Support</li>
          <li><i class="fas fa-check"></i> Unlimited Revisions</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;border-color:var(--dev-purple);color:var(--dev-purple);">Get Started</a>
      </div>
    </div>
  </div>
</section>

<section class="section wdv-section-alt">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Development <span>Portfolio</span></h2>
      <p style="margin:0 auto;">Projects that showcase our technical expertise.</p>
    </div>
    <div class="wdv-portfolio" style="margin-top:40px;">
<?php
$wdvFiles = glob("../images/our portfolio/Web Development/*.{png,jpg,jpeg}", GLOB_BRACE);
$wdvLinks = ['https://havenedgerealtors.com/', 'https://bosrenadventures.co.ke/'];
$wdvIdx = 0;
foreach ($wdvFiles as $wdvFile):
  $wdvName = pathinfo($wdvFile, PATHINFO_FILENAME);
  $wdvEncoded = rawurlencode(basename($wdvFile));
  $wdvLink = $wdvLinks[$wdvIdx] ?? '#';
  $wdvIdx++;
?>
      <div class="wdv-port-item fade-in">
        <a href="<?= $wdvLink ?>" target="_blank" rel="noopener noreferrer" style="text-decoration:none;color:inherit;">
          <img src="../images/our portfolio/Web Development/<?= $wdvEncoded ?>" alt="<?= htmlspecialchars($wdvName) ?>" loading="lazy">
          <div class="wdv-port-overlay"><h4><?= htmlspecialchars($wdvName) ?></h4><span>Web Development</span></div>
        </a>
      </div>
<?php endforeach; ?>
    </div>
    <p style="text-align:center;margin-top:24px;font-size:0.95rem;color:var(--accent);font-weight:600;">Click to view website</p>
  </div>
</section>

<section class="section wdv-section">
  <div class="container">
    <div class="wdv-section-title fade-in" style="text-align:center;">
      <h2>Frequently Asked <span>Questions</span></h2>
      <p style="margin:0 auto;">Everything you need to know about our web development services.</p>
    </div>
    <div style="max-width:800px;margin:40px auto 0;">
      <div style="background:var(--dev-card);border-radius:var(--radius);margin-bottom:12px;border:1px solid var(--dev-border);overflow:hidden;">
        <button style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;cursor:pointer;font-weight:600;font-size:0.98rem;color:var(--dev-cyan);background:none;border:none;width:100%;text-align:left;font-family:var(--font);gap:16px;" onclick="this.parentElement.classList.toggle('active');this.nextElementSibling.style.maxHeight=this.parentElement.classList.contains('active')?'300px':'0';this.querySelector('i').style.transform=this.parentElement.classList.contains('active')?'rotate(180deg)':'rotate(0deg)'">How long does it take to build a custom website? <i class="fas fa-chevron-down" style="transition:var(--transition);color:var(--dev-purple);font-size:0.85rem;flex-shrink:0;"></i></button>
        <div style="max-height:0;overflow:hidden;transition:max-height 0.4s ease;padding:0 24px;"><p style="font-size:0.9rem;color:var(--dev-comment);line-height:1.8;padding-bottom:20px;">Timelines vary by project complexity. A standard business website takes 3-5 weeks, while a custom web application can take 6-12 weeks.</p></div>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);margin-bottom:12px;border:1px solid var(--dev-border);overflow:hidden;">
        <button style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;cursor:pointer;font-weight:600;font-size:0.98rem;color:var(--dev-cyan);background:none;border:none;width:100%;text-align:left;font-family:var(--font);gap:16px;" onclick="this.parentElement.classList.toggle('active');this.nextElementSibling.style.maxHeight=this.parentElement.classList.contains('active')?'300px':'0';this.querySelector('i').style.transform=this.parentElement.classList.contains('active')?'rotate(180deg)':'rotate(0deg)'">What technologies do you use? <i class="fas fa-chevron-down" style="transition:var(--transition);color:var(--dev-purple);font-size:0.85rem;flex-shrink:0;"></i></button>
        <div style="max-height:0;overflow:hidden;transition:max-height 0.4s ease;padding:0 24px;"><p style="font-size:0.9rem;color:var(--dev-comment);line-height:1.8;padding-bottom:20px;">We use PHP/Laravel, React, Vue.js, Node.js, MySQL, PostgreSQL and more. We choose the best tech stack based on your project requirements.</p></div>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);margin-bottom:12px;border:1px solid var(--dev-border);overflow:hidden;">
        <button style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;cursor:pointer;font-weight:600;font-size:0.98rem;color:var(--dev-cyan);background:none;border:none;width:100%;text-align:left;font-family:var(--font);gap:16px;" onclick="this.parentElement.classList.toggle('active');this.nextElementSibling.style.maxHeight=this.parentElement.classList.contains('active')?'300px':'0';this.querySelector('i').style.transform=this.parentElement.classList.contains('active')?'rotate(180deg)':'rotate(0deg)'">Do you provide hosting and maintenance? <i class="fas fa-chevron-down" style="transition:var(--transition);color:var(--dev-purple);font-size:0.85rem;flex-shrink:0;"></i></button>
        <div style="max-height:0;overflow:hidden;transition:max-height 0.4s ease;padding:0 24px;"><p style="font-size:0.9rem;color:var(--dev-comment);line-height:1.8;padding-bottom:20px;">Yes, we offer reliable hosting packages and maintenance plans including security updates, backups, and technical support.</p></div>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);margin-bottom:12px;border:1px solid var(--dev-border);overflow:hidden;">
        <button style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;cursor:pointer;font-weight:600;font-size:0.98rem;color:var(--dev-cyan);background:none;border:none;width:100%;text-align:left;font-family:var(--font);gap:16px;" onclick="this.parentElement.classList.toggle('active');this.nextElementSibling.style.maxHeight=this.parentElement.classList.contains('active')?'300px':'0';this.querySelector('i').style.transform=this.parentElement.classList.contains('active')?'rotate(180deg)':'rotate(0deg)'">Can you integrate with existing systems? <i class="fas fa-chevron-down" style="transition:var(--transition);color:var(--dev-purple);font-size:0.85rem;flex-shrink:0;"></i></button>
        <div style="max-height:0;overflow:hidden;transition:max-height 0.4s ease;padding:0 24px;"><p style="font-size:0.9rem;color:var(--dev-comment);line-height:1.8;padding-bottom:20px;">Absolutely. We specialize in API integrations and can connect your new website with existing CRM, ERP, or any third-party systems.</p></div>
      </div>
      <div style="background:var(--dev-card);border-radius:var(--radius);margin-bottom:12px;border:1px solid var(--dev-border);overflow:hidden;">
        <button style="display:flex;align-items:center;justify-content:space-between;padding:20px 24px;cursor:pointer;font-weight:600;font-size:0.98rem;color:var(--dev-cyan);background:none;border:none;width:100%;text-align:left;font-family:var(--font);gap:16px;" onclick="this.parentElement.classList.toggle('active');this.nextElementSibling.style.maxHeight=this.parentElement.classList.contains('active')?'300px':'0';this.querySelector('i').style.transform=this.parentElement.classList.contains('active')?'rotate(180deg)':'rotate(0deg)'">What is your development process? <i class="fas fa-chevron-down" style="transition:var(--transition);color:var(--dev-purple);font-size:0.85rem;flex-shrink:0;"></i></button>
        <div style="max-height:0;overflow:hidden;transition:max-height 0.4s ease;padding:0 24px;"><p style="font-size:0.9rem;color:var(--dev-comment);line-height:1.8;padding-bottom:20px;">We follow agile methodology with regular communication. Our process includes planning, design, development, testing, deployment, and support.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="wdv-cta">
  <div class="container">
    <h2 class="fade-in">Ready to Build Something Powerful?</h2>
    <p class="fade-in">Let's create a robust web solution that drives your business forward. Get in touch for a free consultation.</p>
    <a href="../quote.php" class="btn btn-secondary btn-lg fade-in"><i class="fas fa-paper-plane"></i> Start Your Project</a>
  </div>
</section>

<?php include '../inc/footer.php'; ?>
