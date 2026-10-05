<?php $pageTitle = 'IT Consultancy Services'; $currentPage = 'consultancy'; include '../inc/header.php'; ?>

<section class="cn-banner">
  <div class="container">
    <div class="breadcrumb" style="text-align:center;"><a href="../index.php">Home</a> <span>/</span> <span>IT Consultancy</span></div>
    <h1 style="text-align:center;">IT <span>Consultancy</span> Services</h1>
    <p style="text-align:center;">Strategic technology guidance to accelerate your business growth.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="service-detail-grid">
      <div>
        <div class="cn-section-title" style="text-align:center;">
          <div class="cn-bar" style="margin:0 auto 14px;"></div>
          <h2>Strategic IT <span>Consultancy</span></h2>
        </div>
        <p style="margin-bottom: 30px; text-align:center;">We help businesses leverage technology for competitive advantage. Our expert consultants provide strategic guidance on digital transformation, cybersecurity, and technology planning.</p>
        <div class="cn-stats" style="margin-bottom:30px;">
          <div class="cn-stat"><div class="num">200<span>+</span></div><div class="label">Clients Advised</div></div>
          <div class="cn-stat"><div class="num">40<span>%</span></div><div class="label">Avg. Cost Savings</div></div>
          <div class="cn-stat"><div class="num">15<span>+</span></div><div class="label">Years Experience</div></div>
          <div class="cn-stat"><div class="num">98<span>%</span></div><div class="label">Client Retention</div></div>
        </div>
        <div class="cn-services-grid">
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-chart-pie"></i></div>
            <h3>IT Strategy & Planning</h3>
            <p>Comprehensive technology roadmaps aligned with your business goals, budget, and growth objectives.</p>
          </div>
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-digital-tiling"></i></div>
            <h3>Digital Transformation</h3>
            <p>End-to-end guidance for digitizing operations, processes, and customer experiences across your organization.</p>
          </div>
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-robot"></i></div>
            <h3>Business Automation</h3>
            <p>Identify and implement automation opportunities to reduce operational costs and improve efficiency.</p>
          </div>
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-shield-alt"></i></div>
            <h3>Cybersecurity Guidance</h3>
            <p>Security audits, risk assessments, and robust cybersecurity framework implementation for your business.</p>
          </div>
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-cloud"></i></div>
            <h3>Cloud Solutions</h3>
            <p>Cloud migration strategy, implementation, and management for scalable and cost-effective infrastructure.</p>
          </div>
          <div class="cn-service-card fade-in">
            <div class="cn-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            <h3>Staff Training</h3>
            <p>Customized training programs to upskill your team on new technologies, systems, and best practices.</p>
          </div>
        </div>
      </div>
      <aside class="quote-sidebar">
        <div class="sidebar-card">
          <h3>Book a Consultation</h3>
          <form class="contact-form" method="POST" action="../process-form.php">
            <input type="hidden" name="form_type" value="contact">
            <div class="form-group">
              <label>Your Name <span class="required">*</span></label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Company</label>
              <input type="text" name="company" class="form-control">
            </div>
            <div class="form-group">
              <label>Email <span class="required">*</span></label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Consultation Area</label>
              <select name="subject" class="form-control">
                <option>Digital Transformation</option>
                <option>Business Automation</option>
                <option>Cybersecurity</option>
                <option>IT Strategy</option>
                <option>Staff Training</option>
              </select>
            </div>
            <div class="form-group">
              <label>Message</label>
              <textarea name="message" class="form-control" rows="4" placeholder="Tell us about your needs..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;"><i class="fas fa-paper-plane"></i> Book Session</button>
          </form>
        </div>
        <div class="sidebar-card contact-sidebar">
          <h3>Consultancy Team</h3>
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
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Why Strategic IT <span>Consultancy Matters</span></h2>
      <p style="margin:0 auto;">Expert guidance bridges the gap between technology and business success.</p>
    </div>
    <div class="why-grid" style="margin-top:40px;">
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-top:3px solid var(--cn-blue);">
        <div style="font-size:2rem;color:var(--cn-blue);margin-bottom:14px;"><i class="fas fa-compass"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Clear Roadmap</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Get a technology roadmap aligned with your business goals and growth trajectory.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-top:3px solid var(--cn-blue);">
        <div style="font-size:2rem;color:var(--cn-blue);margin-bottom:14px;"><i class="fas fa-dollar-sign"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Cost Optimization</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Identify inefficiencies, eliminate redundant systems, and optimize IT spending.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-top:3px solid var(--cn-blue);">
        <div style="font-size:2rem;color:var(--cn-blue);margin-bottom:14px;"><i class="fas fa-shield-alt"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Risk Mitigation</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Identify and address security vulnerabilities, compliance gaps, and operational risks.</p>
      </div>
      <div style="background:var(--white);border-radius:var(--radius);padding:30px 25px;text-align:center;box-shadow:var(--shadow);transition:var(--transition);border-top:3px solid var(--cn-gold);">
        <div style="font-size:2rem;color:var(--cn-gold);margin-bottom:14px;"><i class="fas fa-rocket"></i></div>
        <h4 style="font-size:1.05rem;font-weight:700;margin-bottom:8px;">Accelerated Growth</h4>
        <p style="font-size:0.9rem;color:var(--gray);">Leverage the right technology to streamline operations and drive revenue.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Consulting <span>Frameworks</span></h2>
      <p style="margin:0 auto;">We use proven methodologies to deliver measurable results.</p>
    </div>
    <div class="cn-tools" style="margin-top:40px;">
      <span>TOGAF</span><span>Agile / Scrum</span><span>ISO 27001</span><span>ITIL</span>
      <span>AWS</span><span>Azure</span><span>RPA Tools</span><span>Business Process Modeling</span>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Consultation <span>Process</span></h2>
      <p style="margin:0 auto;">How we deliver value through strategic IT consulting.</p>
    </div>
    <div class="cn-process" style="margin-top:40px;">
      <div class="cn-process-step fade-in">
        <div class="cn-step-num">01</div>
        <h4>Discovery</h4>
        <p>In-depth analysis of your business processes, technology stack, goals, and pain points.</p>
      </div>
      <div class="cn-process-step fade-in">
        <div class="cn-step-num">02</div>
        <h4>Strategy</h4>
        <p>Tailored technology roadmap with clear milestones, timelines, and expected outcomes.</p>
      </div>
      <div class="cn-process-step fade-in">
        <div class="cn-step-num">03</div>
        <h4>Implementation</h4>
        <p>Hands-on guidance through the implementation process alongside your team.</p>
      </div>
      <div class="cn-process-step fade-in">
        <div class="cn-step-num">04</div>
        <h4>Optimization</h4>
        <p>Continuous monitoring and refinement to ensure maximum ROI.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Consulting <span>Packages</span></h2>
      <p style="margin:0 auto;">Flexible engagement options tailored to your needs.</p>
    </div>
    <div class="pricing-grid" style="margin-top:40px;">
      <div class="cn-pricing-card fade-in">
        <h3>Assessment</h3>
        <div class="cn-price">KSh 15,000</div>
        <div class="cn-duration">one-time</div>
        <ul>
          <li><i class="fas fa-check"></i> Technology Audit</li>
          <li><i class="fas fa-check"></i> Gap Analysis</li>
          <li><i class="fas fa-check"></i> Recommendations Report</li>
          <li><i class="fas fa-check"></i> 1 Strategy Session</li>
          <li><i class="fas fa-times"></i> Implementation Support</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Book Now</a>
      </div>
      <div class="cn-pricing-card featured fade-in">
        <div class="cn-badge">Popular</div>
        <h3>Transformation</h3>
        <div class="cn-price">KSh 35,000</div>
        <div class="cn-duration">per quarter</div>
        <ul>
          <li><i class="fas fa-check"></i> Full Technology Audit</li>
          <li><i class="fas fa-check"></i> Strategic Roadmap</li>
          <li><i class="fas fa-check"></i> Implementation Support</li>
          <li><i class="fas fa-check"></i> Monthly Check-ins</li>
          <li><i class="fas fa-check"></i> Team Training</li>
        </ul>
        <a href="../quote.php" class="btn btn-primary" style="width:100%;justify-content:center;">Get Started</a>
      </div>
      <div class="cn-pricing-card fade-in">
        <h3>Retainer</h3>
        <div class="cn-price">KSh 75,000</div>
        <div class="cn-duration">per month</div>
        <ul>
          <li><i class="fas fa-check"></i> Dedicated Consultant</li>
          <li><i class="fas fa-check"></i> Unlimited Advisory</li>
          <li><i class="fas fa-check"></i> Full Strategy & Execution</li>
          <li><i class="fas fa-check"></i> Priority Response</li>
          <li><i class="fas fa-check"></i> Quarterly Reviews</li>
        </ul>
        <a href="../quote.php" class="btn btn-outline" style="width:100%;justify-content:center;">Get Started</a>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Success <span>Stories</span></h2>
      <p style="margin:0 auto;">Real results from our consultancy engagements.</p>
    </div>
    <div class="cn-portfolio" style="margin-top:40px;">
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>TechVille Ltd</h4><span>30% cost reduction, 45% productivity gain</span></div>
      </div>
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>BrightStar Finance</h4><span>100% threat detection rate</span></div>
      </div>
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>Crest Media</h4><span>60% faster project delivery</span></div>
      </div>
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>Swift Logistics</h4><span>Seamless cloud migration</span></div>
      </div>
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>Prime Manufacturing</h4><span>End-to-end ERP integration</span></div>
      </div>
      <div class="cn-port-item fade-in">
        <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=260&fit=crop" alt="Consulting" loading="lazy">
        <div class="cn-port-overlay"><h4>HealthFirst Ltd</h4><span>ISO 27001 certification</span></div>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="cn-section-title fade-in" style="text-align:center;">
      <div class="cn-bar" style="margin:0 auto 14px;"></div>
      <h2>Frequently Asked <span>Questions</span></h2>
      <p style="margin:0 auto;">Everything you need to know about our consultancy services.</p>
    </div>
    <div class="gd-faq">
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">How do I know if my business needs IT consultancy? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>If you're facing technology challenges, inefficiencies, or planning digital transformation, consultancy can provide the clarity and direction you need.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">How long does a consultancy engagement last? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Assessments take 1-2 weeks, transformation projects span 3-6 months, and retainer clients benefit from ongoing strategic guidance.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What size businesses do you work with? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>We work with businesses of all sizes, from startups to large enterprises. Our approach is tailored to your specific needs and budget.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">What is the first step? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Book a free initial consultation. We'll discuss your needs, outline our approach, and recommend the best engagement model for you.</p></div>
      </div>
      <div class="gd-faq-item fade-in">
        <button class="gd-faq-question">Do you work with specific industries? <i class="fas fa-chevron-down"></i></button>
        <div class="gd-faq-answer"><p>Our consultants have experience across finance, healthcare, manufacturing, education, retail, and professional services.</p></div>
      </div>
    </div>
  </div>
</section>

<section class="cn-cta">
  <div class="container">
    <h2 class="fade-in">Ready to Transform Your <span>Business</span>?</h2>
    <p class="fade-in">Let our expert consultants guide you through digital transformation and help you achieve your goals.</p>
    <a href="../quote.php" class="btn btn-secondary btn-lg fade-in"><i class="fas fa-paper-plane"></i> Book Free Consultation</a>
  </div>
</section>

<?php include '../inc/footer.php'; ?>
