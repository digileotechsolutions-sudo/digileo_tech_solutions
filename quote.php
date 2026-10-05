<?php $pageTitle = 'Request a Quote'; $currentPage = 'quote'; include 'inc/header.php'; ?>

<section class="page-banner">
  <div class="container">
    <div class="breadcrumb"><a href="index.php">Home</a> <span>/</span> <span>Request a Quote</span></div>
    <h1>Request a Quote</h1>
    <p>Tell us about your project and we'll provide a tailored solution.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-grid">
      <div class="fade-in">
        <div class="section-title" style="text-align:left; margin-bottom: 30px;">
          <div class="title-bar" style="margin:0 0 16px 0;"></div>
          <h2>Tell Us About Your <span>Project</span></h2>
        </div>
        <p style="margin-bottom: 30px;">Fill out the form below and our team will get back to you within 24 hours with a customized quote.</p>
        <form class="quote-form form" method="POST" action="process-form.php">
          <input type="hidden" name="form_type" value="quote">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrfToken()) ?>">
          <div class="form-row">
            <div class="form-group">
              <label>Full Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Company Name</label>
              <input type="text" name="company" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Email <span class="required">*</span></label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone <span class="required">*</span></label>
              <input type="tel" name="phone" class="form-control" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Service Category <span class="required">*</span></label>
              <select name="service" class="form-control" required>
                <option value="">Select a service...</option>
                <option value="graphic-design">Graphic Design</option>
                <option value="web-design">Web Design</option>
                <option value="web-development">Web Development</option>
                <option value="software-hardware">Software & Hardware</option>
                <option value="printing">Printing Services</option>
                <option value="consultancy">IT Consultancy</option>
                <option value="multiple">Multiple Services</option>
              </select>
            </div>
            <div class="form-group">
              <label>Budget Range</label>
              <select name="budget" class="form-control">
                <option value="">Select budget...</option>
                <option value="under-10000">Under KSh 10,000</option>
                <option value="10000-30000">KSh 10,000 - 30,000</option>
                <option value="30000-50000">KSh 30,000 - 50,000</option>
                <option value="50000-100000">KSh 50,000 - 100,000</option>
                <option value="100000-500000">KSh 100,000 - 500,000</option>
                <option value="above-500000">Above KSh 500,000</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Timeline</label>
              <select name="timeline" class="form-control">
                <option value="">Select timeline...</option>
                <option value="asap">ASAP</option>
                <option value="1-week">Within 1 week</option>
                <option value="2-weeks">Within 2 weeks</option>
                <option value="1-month">Within 1 month</option>
                <option value="flexible">Flexible</option>
              </select>
            </div>
            <div class="form-group">
              <label>File Upload (optional)</label>
              <div class="form-file">
                <input type="file" name="attachment" accept=".pdf,.doc,.docx,.jpg,.png,.zip">
                <div class="form-file-label">
                  <i class="fas fa-cloud-upload-alt"></i>
                  <span>Upload brief or reference files</span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Project Description <span class="required">*</span></label>
            <textarea name="description" class="form-control" rows="5" required placeholder="Describe your project in detail..."></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="justify-content:center;width:100%;padding:16px;"><i class="fas fa-paper-plane"></i> Submit Quote Request</button>
        </form>
      </div>
      <div class="fade-in">
        <div class="contact-info-grid">
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-phone-alt"></i></div>
            <h4>Call Us</h4>
            <p><i class="fab fa-whatsapp" style="color:#25D366;"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener">+254 705 359 471</a></p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <h4>Email Us</h4>
            <p><i class="fas fa-envelope"></i> <a href="mailto:digileotechsolutions@gmail.com">digileotechsolutions@gmail.com</a></p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-clock"></i></div>
            <h4>Business Hours</h4>
            <p>Open 24/7 Online Support</p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-comment"></i></div>
            <h4>Live Chat</h4>
            <p>Chat on WhatsApp</p>
          </div>
        </div>
        <div class="sidebar-card" style="margin-top:20px;">
          <h3>Why Choose Us?</h3>
          <ul class="service-list-items" style="grid-template-columns:1fr;">
            <li><i class="fas fa-check-circle"></i> Free consultation & quotes</li>
            <li><i class="fas fa-check-circle"></i> Transparent pricing</li>
            <li><i class="fas fa-check-circle"></i> 100% satisfaction guarantee</li>
            <li><i class="fas fa-check-circle"></i> Fast turnaround times</li>
            <li><i class="fas fa-check-circle"></i> Dedicated project manager</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
