<?php $pageTitle = 'Our Blog'; $currentPage = 'blog'; include 'inc/header.php'; ?>

<section class="page-banner">
  <div class="container">
    <div class="breadcrumb"><a href="index.php">Home</a> <span>/</span> <span>Blog</span></div>
    <h1>Our Blog</h1>
    <p>Insights, tips, and trends in technology, design, and business growth.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="blog-grid">
      <div class="blog-posts">
        <article class="fade-in">
          <img src="https://images.unsplash.com/photo-1559028012-481c04fa702d?w=800&h=400&fit=crop" alt="Blog" loading="lazy">
          <div class="content">
            <div class="meta">
              <span><i class="far fa-calendar-alt"></i> June 1, 2025</span>
              <span class="category"><i class="fas fa-tag"></i> Technology</span>
              <span><i class="far fa-user"></i> John Doe</span>
            </div>
            <h3>The Future of Web Development: Trends to Watch in 2025</h3>
            <p>Explore the latest trends shaping web development, from AI-powered interfaces to progressive web apps and beyond.</p>
            <div class="blog-links">
              <a href="https://www.youtube.com/watch?v=oS0yjg-kyRY" target="_blank" rel="noopener" class="btn btn-sm btn-youtube"><i class="fab fa-youtube"></i> Watch on YouTube</a>
            </div>
          </div>
        </article>
        <article class="fade-in">
          <img src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=800&h=400&fit=crop" alt="Blog" loading="lazy">
          <div class="content">
            <div class="meta">
              <span><i class="far fa-calendar-alt"></i> May 25, 2025</span>
              <span class="category"><i class="fas fa-tag"></i> Design</span>
              <span><i class="far fa-user"></i> Jane Smith</span>
            </div>
            <h3>10 Graphic Design Trends That Will Dominate 2025</h3>
            <p>From minimalist branding to bold typography, discover the design trends that are defining modern brand identities.</p>
            <div class="blog-links">
              <a href="https://www.youtube.com/watch?v=NkQlmPCQfgY" target="_blank" rel="noopener" class="btn btn-sm btn-youtube"><i class="fab fa-youtube"></i> Watch on YouTube</a>
            </div>
          </div>
        </article>
        <article class="fade-in">
          <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=800&h=400&fit=crop" alt="Blog" loading="lazy">
          <div class="content">
            <div class="meta">
              <span><i class="far fa-calendar-alt"></i> May 18, 2025</span>
              <span class="category"><i class="fas fa-tag"></i> Business</span>
              <span><i class="far fa-user"></i> Mike Johnson</span>
            </div>
            <h3>How Digital Transformation Drives Business Growth</h3>
            <p>Learn how businesses are leveraging technology to streamline operations, reduce costs, and accelerate growth.</p>
            <div class="blog-links">
              <a href="https://www.youtube.com/watch?v=bbdP6FKO1ZI" target="_blank" rel="noopener" class="btn btn-sm btn-youtube"><i class="fab fa-youtube"></i> Watch on YouTube</a>
            </div>
          </div>
        </article>
        <article class="fade-in">
          <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=400&fit=crop" alt="Blog" loading="lazy">
          <div class="content">
            <div class="meta">
              <span><i class="far fa-calendar-alt"></i> May 10, 2025</span>
              <span class="category"><i class="fas fa-tag"></i> E-commerce</span>
              <span><i class="far fa-user"></i> Sarah Williams</span>
            </div>
            <h3>Building a Successful E-Commerce Website: A Complete Guide</h3>
            <p>A step-by-step guide to creating an online store that converts visitors into loyal customers.</p>
            <div class="blog-links">
              <a href="https://www.youtube.com/watch?v=QeSQqC1sSeY" target="_blank" rel="noopener" class="btn btn-sm btn-youtube"><i class="fab fa-youtube"></i> Watch on YouTube</a>
            </div>
          </div>
        </article>
      </div>
      <aside class="blog-sidebar">
        <div class="widget fade-in">
          <h3>Search</h3>
          <form class="search-form">
            <input type="text" placeholder="Search articles..." aria-label="Search">
            <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <div class="widget fade-in">
          <h3>Categories</h3>
          <ul class="categories-list">
            <li><a href="#">Technology</a> <span>12</span></li>
            <li><a href="#">Design Tips</a> <span>8</span></li>
            <li><a href="#">Business Growth</a> <span>10</span></li>
            <li><a href="#">Web Development</a> <span>7</span></li>
            <li><a href="#">Printing</a> <span>4</span></li>
          </ul>
        </div>
        <div class="widget fade-in">
          <h3>Tags</h3>
          <div class="tag-cloud">
            <a href="#">Web Design</a>
            <a href="#">Graphic Design</a>
            <a href="#">SEO</a>
            <a href="#">E-commerce</a>
            <a href="#">Branding</a>
            <a href="#">Cybersecurity</a>
            <a href="#">Automation</a>
            <a href="#">Digital Marketing</a>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
