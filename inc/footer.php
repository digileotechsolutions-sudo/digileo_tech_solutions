<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-about">
        <a href="<?= $basePath ?>index.php" class="logo">
          <img src="<?= $basePath ?>images/DIGILEO%20LOGO.webp?v=2" alt="Digileo Tech Solutions" loading="lazy" decoding="async" width="1920" height="625">
        </a>
        <p>Digileo Tech Solutions is a full-service technology and creative agency. We help businesses grow through innovative digital solutions, creative design, and reliable IT services.</p>
        <div class="social-links">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div>
        <h4>Quick Links</h4>
        <ul class="footer-links">
          <li><a href="<?= $basePath ?>index.php"><i class="fas fa-chevron-right"></i>Home</a></li>
          <li><a href="<?= $basePath ?>about.php"><i class="fas fa-chevron-right"></i>About Us</a></li>
          <li><a href="<?= $basePath ?>portfolio.php"><i class="fas fa-chevron-right"></i>Portfolio</a></li>
          <li><a href="<?= $basePath ?>blog.php"><i class="fas fa-chevron-right"></i>Blog</a></li>
          <li><a href="<?= $basePath ?>quote.php"><i class="fas fa-chevron-right"></i>Request a Quote</a></li>
          <li><a href="<?= $basePath ?>contact.php"><i class="fas fa-chevron-right"></i>Contact</a></li>
        </ul>
      </div>
      <div>
        <h4>Services</h4>
        <ul class="footer-links">
          <li><a href="<?= $servicePrefix ?>graphic-design.php"><i class="fas fa-chevron-right"></i>Graphic Design</a></li>
          <li><a href="<?= $servicePrefix ?>web-design.php"><i class="fas fa-chevron-right"></i>Web Design</a></li>
          <li><a href="<?= $servicePrefix ?>web-development.php"><i class="fas fa-chevron-right"></i>Web Development</a></li>
          <li><a href="<?= $servicePrefix ?>software-hardware.php"><i class="fas fa-chevron-right"></i>Software & Hardware</a></li>
          <li><a href="<?= $servicePrefix ?>printing.php"><i class="fas fa-chevron-right"></i>Printing Services</a></li>
          <li><a href="<?= $servicePrefix ?>consultancy.php"><i class="fas fa-chevron-right"></i>IT Consultancy</a></li>
        </ul>
      </div>
      <div>
        <h4>Contact Info</h4>
        <ul class="footer-contact">
          <li><i class="fab fa-whatsapp"></i><a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" rel="noopener" style="color:#9ca3af;">+254 705 359 471</a></li>
          <li><i class="fas fa-phone-alt"></i><a href="tel:+254799591373" style="color:#9ca3af;">+254 799 591 373</a></li>
          <li><i class="fas fa-envelope"></i><a href="mailto:digileotechsolutions@gmail.com" style="color:#9ca3af;">digileotechsolutions@gmail.com</a></li>
          <li><i class="fas fa-clock"></i>Open 24/7 Online Support</li>
        </ul>
        <div class="footer-newsletter">
          <h4>Newsletter</h4>
          <form class="newsletter-form" method="POST" action="<?= $basePath ?>process-form.php">
            <input type="hidden" name="form_type" value="newsletter">
            <input type="email" name="email" placeholder="Your email address" required aria-label="Email for newsletter">
            <button type="submit" aria-label="Subscribe"><i class="fas fa-paper-plane"></i></button>
          </form>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <span class="current-year"></span> Digileo Tech Solutions. All Rights Reserved.</p>
      <p>Designed with <i class="fas fa-heart" style="color: var(--accent);"></i> by Digileo Tech</p>
    </div>
  </div>
</footer>

<!-- WhatsApp Float -->
<a href="https://wa.me/254705359471?text=Hello%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" class="whatsapp-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <i class="fab fa-whatsapp"></i>
</a>

<!-- Back to Top -->
<button class="back-to-top" aria-label="Back to top">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Swiper JS (deferred) -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<!-- Main Script (deferred) -->
<script src="<?= $basePath ?>js/script.js?v=2.3" defer></script>
</body>
</html>
