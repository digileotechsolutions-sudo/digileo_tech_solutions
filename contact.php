<?php $pageTitle = 'Contact Us'; $currentPage = 'contact'; include 'inc/header.php'; ?>

<section class="page-banner">
  <div class="container">
    <div class="breadcrumb"><a href="index.php">Home</a> <span>/</span> <span>Contact</span></div>
    <h1>Contact Us</h1>
    <p>We'd love to hear from you. Get in touch with our team.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="contact-grid">
      <div class="fade-in">
        <div class="section-title" style="text-align:left; margin-bottom: 30px;">
          <div class="title-bar" style="margin:0 0 16px 0;"></div>
          <h2>Get In <span>Touch</span></h2>
        </div>
        <div class="contact-info-grid">
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-phone-alt"></i></div>
            <h4>Phone / WhatsApp</h4>
            <p><i class="fab fa-whatsapp" style="color:#25D366;"></i> <a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener">+254 705 359 471</a></p>
            <p><i class="fas fa-phone-alt"></i> <a href="tel:+254799591373">+254 799 591 373</a></p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-envelope"></i></div>
            <h4>Email</h4>
            <p><i class="fas fa-envelope"></i> <a href="mailto:digileotechsolutions@gmail.com">digileotechsolutions@gmail.com</a></p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
            <h4>Location</h4>
            <p>Nairobi, Kenya</p>
          </div>
          <div class="contact-info-item">
            <div class="icon"><i class="fas fa-clock"></i></div>
            <h4>Business Hours</h4>
            <p>Open 24/7 Online Support</p>
          </div>
        </div>
        <div class="social-links" style="margin: 20px 0; gap:12px;">
          <a href="#" aria-label="Facebook" style="background:var(--light-gray);color:var(--dark);width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter" style="background:var(--light-gray);color:var(--dark);width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="Instagram" style="background:var(--light-gray);color:var(--dark);width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="LinkedIn" style="background:var(--light-gray);color:var(--dark);width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="YouTube" style="background:var(--light-gray);color:var(--dark);width:48px;height:48px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.3rem;"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="fade-in">
        <form class="contact-form form" method="POST" action="process-form.php">
          <input type="hidden" name="form_type" value="contact">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrfToken()) ?>">
          <h3 style="font-size:1.3rem;font-weight:700;margin-bottom:20px;">Send Us a Message</h3>
          <div class="form-row">
            <div class="form-group">
              <label>Full Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email <span class="required">*</span></label>
              <input type="email" name="email" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" class="form-control">
          </div>
          <div class="form-group">
            <label>Message <span class="required">*</span></label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="justify-content:center;width:100%;padding:16px;"><i class="fas fa-paper-plane"></i> Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt" style="padding-bottom:0;">
  <div class="container">
    <div class="section-title fade-in">
      <div class="title-bar"></div>
      <h2>Our <span>Location</span></h2>
      <p>Visit us at our office in Nairobi.</p>
    </div>
    <div class="map-container fade-in">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8462962765176!2d36.821946!3d-1.292066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f173c8f0b0e0d%3A0x1e0e5b5e5b5e5b5e!2sNairobi!5e0!3m2!1sen!2ske!4v1" allowfullscreen loading="lazy" title="Office Location"></iframe>
    </div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
