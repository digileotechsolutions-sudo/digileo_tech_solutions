<?php
$pageTitle = 'Our Blog';
$currentPage = 'blog';
include 'inc/header.php';

$articles = [
  [
    'image' => 'photo-1559028012-481c04fa702d',
    'date' => 'June 1, 2025',
    'category' => 'Technology',
    'author' => 'John Doe',
    'title' => 'The Future of Web Development: Trends to Watch in 2025',
    'summary' => 'Explore the latest trends shaping web development, from AI-powered interfaces to progressive web apps and beyond.',
    'tags' => ['software development', 'business technology', 'web development'],
    'video' => 'https://www.youtube.com/watch?v=oS0yjg-kyRY',
  ],
  [
    'image' => 'photo-1561070791-2526d30994b5',
    'date' => 'May 25, 2025',
    'category' => 'Design',
    'author' => 'Jane Smith',
    'title' => '10 Graphic Design Trends That Will Dominate 2025',
    'summary' => 'From minimalist branding to bold typography, discover the design trends that are defining modern brand identities.',
    'tags' => ['web design', 'business website'],
    'video' => 'https://www.youtube.com/watch?v=NkQlmPCQfgY',
  ],
  [
    'image' => 'photo-1558494949-ef010cbdcc31',
    'date' => 'May 18, 2025',
    'category' => 'Business',
    'author' => 'Mike Johnson',
    'title' => 'How Digital Transformation Drives Business Growth',
    'summary' => 'Learn how businesses are leveraging technology to streamline operations, reduce costs, and accelerate growth.',
    'tags' => ['choosing a vendor', 'business technology', 'IT partner'],
    'video' => 'https://www.youtube.com/watch?v=bbdP6FKO1ZI',
  ],
  [
    'image' => 'photo-1556742049-0cfed4f6a45d',
    'date' => 'May 10, 2025',
    'category' => 'E-commerce',
    'author' => 'Sarah Williams',
    'title' => 'Building a Successful E-Commerce Website: A Complete Guide',
    'summary' => 'A step-by-step guide to creating an online store that converts visitors into loyal customers.',
    'tags' => ['M-Pesa integration', 'online payments', 'invoicing', 'cash flow'],
    'video' => 'https://www.youtube.com/watch?v=QeSQqC1sSeY',
  ],
];
$blogTags = [
  'software development',
  'choosing a vendor',
  'business technology',
  'IT partner',
  'M-Pesa integration',
  'online payments',
  'invoicing',
  'cash flow',
  'web hosting',
  'domain names',
  'SSL certificate',
  'website infrastructure',
  'web design',
  'web development',
  'SEO',
  'business website',
  'Reatech360',
  'ERP software',
  'business management platform',
  'voice assistant',
  'ISP billing',
  'WiFi hotspot',
  'MikroTik',
  'PPPoE',
  'call centre software',
  'IVR',
  'customer support',
  'business phone system',
  'HR software',
  'payroll',
  'employee management',
];
?>

<main class="blog-page">
  <div class="container">
    <div class="blog-eyebrow"><i class="fas fa-newspaper" aria-hidden="true"></i> Blog</div>
    <section class="blog-intro" aria-labelledby="blog-title">
      <div>
        <h1 id="blog-title">Ideas, updates and what we’re building.</h1>
        <p>Notes on technology, design and the digital tools that help businesses grow.</p>
      </div>
      <p class="blog-intro-note">Practical insights from Digileo Tech on websites, branding and business technology.</p>
    </section>

    <div class="blog-layout">
      <aside class="blog-sidebar" aria-label="Find articles">
        <label class="blog-search">
          <i class="fas fa-search" aria-hidden="true"></i>
          <span class="visually-hidden">Search articles</span>
          <input type="search" placeholder="Search articles..." data-blog-search>
        </label>

        <nav class="blog-filters" aria-label="Filter articles by topic">
          <span class="blog-filter-heading">Filter by topic</span>
          <button class="blog-filter active" type="button" data-blog-filter="all" aria-pressed="true">
            <span>All posts</span>
          </button>
<?php foreach ($blogTags as $tag): ?>
          <button class="blog-filter" type="button" data-blog-filter="<?= htmlspecialchars(strtolower($tag), ENT_QUOTES, 'UTF-8') ?>" aria-pressed="false">
            <span><?= htmlspecialchars($tag) ?></span>
          </button>
<?php endforeach; ?>
        </nav>
      </aside>

      <section class="blog-results" aria-label="Blog articles">
        <p class="blog-results-count" data-blog-results aria-live="polite"><?= count($articles) ?> articles</p>
        <div class="blog-posts">
<?php foreach ($articles as $article):
  $articleTags = array_map('strtolower', $article['tags']);
  $searchText = strtolower($article['title'] . ' ' . $article['summary'] . ' ' . $article['category'] . ' ' . implode(' ', $article['tags']));
  $imageUrl = 'https://images.unsplash.com/' . $article['image'] . '?auto=format&fit=crop&w=900&q=75';
?>
          <article class="blog-card" data-blog-card data-tags="<?= htmlspecialchars(implode('|', $articleTags), ENT_QUOTES, 'UTF-8') ?>" data-title="<?= htmlspecialchars($searchText, ENT_QUOTES, 'UTF-8') ?>">
            <a class="blog-card-image" href="<?= htmlspecialchars($article['video'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer" aria-label="Watch: <?= htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8') ?>">
              <img src="<?= htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8') ?>" width="900" height="500" loading="lazy" decoding="async">
            </a>
            <div class="blog-card-content">
              <span class="blog-category"><?= htmlspecialchars($article['category']) ?></span>
              <h2><?= htmlspecialchars($article['title']) ?></h2>
              <p><?= htmlspecialchars($article['summary']) ?></p>
              <div class="blog-card-meta">
                <span><?= htmlspecialchars($article['author']) ?></span>
                <span aria-hidden="true">·</span>
                <time><?= htmlspecialchars($article['date']) ?></time>
              </div>
              <a class="blog-card-link" href="<?= htmlspecialchars($article['video'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer">
                Watch on YouTube <i class="fas fa-arrow-up-right-from-square" aria-hidden="true"></i>
              </a>
            </div>
          </article>
<?php endforeach; ?>
        </div>
        <p class="blog-empty" data-blog-empty hidden>No articles match your search. Try another keyword or topic.</p>
      </section>
    </div>
  </div>
</main>

<?php include 'inc/footer.php'; ?>
