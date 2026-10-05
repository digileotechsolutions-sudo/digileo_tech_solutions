// DOM Ready helper
const domReady = (fn) => {
  if (document.readyState !== 'loading') { fn(); }
  else { document.addEventListener('DOMContentLoaded', fn); }
};

// Defer-init Swiper until after load
let swiperInstance = null;
function initSwiper() {
  const el = document.querySelector('.testimonial-swiper');
  if (!el || typeof Swiper === 'undefined') return;
  swiperInstance = new Swiper(el, {
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    slidesPerView: 1,
    spaceBetween: 24,
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
  });
}

if (document.readyState === 'complete') {
  initSwiper();
} else {
  window.addEventListener('load', initSwiper);
}

// Mobile Navigation
domReady(() => {
  const hamburger = document.querySelector('.hamburger');
  const nav = document.querySelector('.nav');

  hamburger?.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    nav?.classList.toggle('open');
    document.body.classList.toggle('nav-open');
  });

  document.querySelector('.nav-close')?.addEventListener('click', () => {
    hamburger?.classList.remove('active');
    nav?.classList.remove('open');
    document.body.classList.remove('nav-open');
  });

  document.querySelector('.nav')?.addEventListener('click', (e) => {
    if (e.target.tagName === 'A') {
      hamburger?.classList.remove('active');
      nav?.classList.remove('open');
      document.body.classList.remove('nav-open');
    }
  });
});

// Blog search and topic filters
domReady(() => {
  const search = document.querySelector('[data-blog-search]');
  const filters = document.querySelectorAll('[data-blog-filter]');
  const cards = document.querySelectorAll('[data-blog-card]');
  const emptyState = document.querySelector('[data-blog-empty]');
  const resultsCount = document.querySelector('[data-blog-results]');

  if (!search || !filters.length || !cards.length) return;

  const allFilter = document.querySelector('[data-blog-filter="all"]');
  const normalizeTag = value => (value || '').trim().toLowerCase();
  const setActiveFilter = tag => {
    const normalizedTag = normalizeTag(tag);
    const selectedFilter = Array.from(filters).find(filter =>
      normalizeTag(filter.dataset.blogFilter) === normalizedTag
    ) || allFilter;

    filters.forEach(filter => {
      const isActive = filter === selectedFilter;
      filter.classList.toggle('active', isActive);
      filter.setAttribute('aria-pressed', String(isActive));
    });

    return selectedFilter?.dataset.blogFilter || 'all';
  };
  let activeTag = setActiveFilter(new URLSearchParams(window.location.search).get('tag'));

  const updateResults = () => {
    const query = search.value.trim().toLowerCase();
    let visibleCount = 0;

    cards.forEach(card => {
      const cardTags = (card.dataset.tags || '').split('|');
      const matchesTag = activeTag === 'all' || cardTags.includes(activeTag);
      const matchesSearch = !query || card.dataset.title.includes(query);
      const isVisible = matchesTag && matchesSearch;
      card.hidden = !isVisible;
      if (isVisible) visibleCount++;
    });

    if (emptyState) emptyState.hidden = visibleCount > 0;
    if (resultsCount) {
      resultsCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'article' : 'articles'}`;
    }
  };

  search.addEventListener('input', updateResults);
  filters.forEach(filter => {
    filter.addEventListener('click', () => {
      activeTag = setActiveFilter(filter.dataset.blogFilter);
      const url = new URL(window.location.href);
      if (activeTag === 'all') {
        url.searchParams.delete('tag');
      } else {
        url.searchParams.set('tag', filter.querySelector('span').textContent.trim());
      }
      window.history.pushState({}, '', url);
      updateResults();
    });
  });

  window.addEventListener('popstate', () => {
    activeTag = setActiveFilter(new URLSearchParams(window.location.search).get('tag'));
    updateResults();
  });
  updateResults();
});

// Back to Top
const backToTop = document.querySelector('.back-to-top');
window.addEventListener('scroll', () => {
  if (backToTop) {
    backToTop.classList.toggle('visible', window.scrollY > 400);
  }
}, { passive: true });
backToTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

// Scroll Animation (Intersection Observer)
const observerOptions = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    }
  });
}, observerOptions);

domReady(() => {
  document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
});

// Counter Animation
function animateCounters() {
  document.querySelectorAll('.stat-item h3').forEach(counter => {
    const target = parseInt(counter.getAttribute('data-count'));
    if (!target || counter.dataset.animated) return;
    counter.dataset.animated = 'true';
    const increment = Math.ceil(target / (2000 / 16));
    let current = 0;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        counter.textContent = target + '+';
        clearInterval(timer);
      } else {
        counter.textContent = current + '+';
      }
    }, 16);
  });
}

const statsObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      animateCounters();
      statsObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });

domReady(() => {
  document.querySelectorAll('.stats').forEach(el => statsObserver.observe(el));
});

// Portfolio Filter
function initFilter(containerSelector, itemSelector, filterNavSelector) {
  const container = document.querySelector(containerSelector);
  const items = container?.querySelectorAll(itemSelector);
  const buttons = document.querySelectorAll(`${filterNavSelector} button`);

  buttons.forEach(button => {
    button.addEventListener('click', () => {
      buttons.forEach(b => b.classList.remove('active'));
      button.classList.add('active');
      const filter = button.getAttribute('data-filter');
      items?.forEach(item => {
        item.style.display = 'none';
        if (filter === 'all' || item.getAttribute('data-category') === filter) {
          setTimeout(() => { item.style.display = 'block'; }, 100);
        }
      });
    });
  });

  const activeBtn = document.querySelector(`${filterNavSelector} button.active`);
  if (activeBtn) activeBtn.click();
}

domReady(() => {
  initFilter('.portfolio-grid', '.portfolio-item', '.filter-nav');
});

// Gallery View Toggle
document.querySelectorAll('.gd-view-all').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const section = this.closest('.gd-portfolio-section');
    const wrapper = section.querySelector('.gd-gallery-wrapper');
    let grid = section.querySelector('.gd-grid-view');

    if (!grid) {
      grid = document.createElement('div');
      grid.className = 'gd-grid-view fade-in';
      const track = section.querySelector('.gd-gallery-track');
      const items = track.querySelectorAll('.gd-gallery-item');
      const half = Math.floor(items.length / 2);
      for (let i = 0; i < half; i++) {
        const clone = items[i].cloneNode(true);
        clone.classList.remove('fade-in');
        grid.appendChild(clone);
      }
      wrapper.after(grid);
      setTimeout(() => grid.classList.add('visible'), 50);
    }

    const isGrid = grid.classList.contains('gd-visible');
    wrapper.classList.toggle('gd-hidden', !isGrid);
    grid.classList.toggle('gd-visible', !isGrid);
    this.innerHTML = isGrid
      ? 'View All <i class="fas fa-arrow-right"></i>'
      : '<i class="fas fa-arrow-left"></i> Show Carousel';
  });
});

// FAQ Accordion
document.querySelectorAll('.gd-faq-question').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.gd-faq-item');
    const isActive = item.classList.contains('active');
    item.closest('.gd-faq')?.querySelectorAll('.gd-faq-item.active').forEach(i => i.classList.remove('active'));
    if (!isActive) item.classList.add('active');
  });
});

// Button Ripple (delegated)
document.addEventListener('click', function(e) {
  const btn = e.target.closest('.btn-primary, .btn-secondary, .pricing-card .btn');
  if (!btn) return;
  const rect = btn.getBoundingClientRect();
  const ripple = document.createElement('span');
  ripple.className = 'ripple';
  const size = Math.max(rect.width, rect.height);
  ripple.style.cssText = `width:${size}px;height:${size}px;left:${e.clientX - rect.left - size / 2}px;top:${e.clientY - rect.top - size / 2}px;`;
  btn.appendChild(ripple);
  ripple.addEventListener('animationend', () => ripple.remove());
});

// Newsletter form handling
function getCsrfToken() {
  const meta = document.querySelector('meta[name="csrf-token"]');
  return meta ? meta.getAttribute('content') : '';
}

function handleFormSubmit(form, successMsg) {
  const btn = form.querySelector('button[type="submit"]');
  const originalText = btn?.textContent || 'Submit';
  if (btn) { btn.textContent = 'Sending...'; btn.disabled = true; }

  const formData = new FormData(form);
  if (!formData.has('csrf_token')) {
    formData.append('csrf_token', getCsrfToken());
  }

  fetch(form.getAttribute('action') || 'process-form.php', {
    method: form.getAttribute('method') || 'POST',
    body: formData,
  })
  .then(response => response.json())
  .then(data => {
    if (btn) { btn.textContent = originalText; btn.disabled = false; }
    const existing = form.querySelector('.form-success, .form-error');
    if (existing) existing.remove();
    const msg = document.createElement('div');
    if (data.success) {
      msg.className = 'form-success';
      msg.style.cssText = 'background:#d4edda;color:#155724;padding:15px;border-radius:6px;margin-top:16px;text-align:center;font-weight:600;';
      msg.textContent = data.message || successMsg || 'Thank you!';
      form.appendChild(msg);
      form.reset();
    } else {
      msg.className = 'form-error';
      msg.style.cssText = 'background:#f8d7da;color:#721c24;padding:15px;border-radius:6px;margin-top:16px;text-align:center;font-weight:600;';
      msg.textContent = data.message || 'Something went wrong.';
      form.appendChild(msg);
    }
    setTimeout(() => msg.remove(), 5000);
  })
  .catch(() => {
    if (btn) { btn.textContent = originalText; btn.disabled = false; }
  });
}

domReady(() => {
  document.querySelectorAll('.newsletter-form').forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      handleFormSubmit(form, 'Subscribed!');
    });
  });

  document.querySelectorAll('.contact-form, .quote-form, .order-form, .consultation-form').forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      handleFormSubmit(form, 'Thank you! Your message has been received.');
    });
  });
});

// Lightbox
const lightbox = document.createElement('div');
lightbox.className = 'gd-lightbox';
const lightboxImg = document.createElement('img');
const lightboxClose = document.createElement('button');
lightboxClose.className = 'gd-lightbox-close';
lightboxClose.innerHTML = '&times;';
lightbox.appendChild(lightboxImg);
lightbox.appendChild(lightboxClose);
document.body.appendChild(lightbox);

lightboxClose.addEventListener('click', () => lightbox.classList.remove('active'));
lightbox.addEventListener('click', (e) => { if (e.target === lightbox) lightbox.classList.remove('active'); });
document.addEventListener('keydown', (e) => { if (e.key === 'Escape') lightbox.classList.remove('active'); });

document.addEventListener('click', (e) => {
  if (e.target.tagName !== 'IMG') return;
  const item = e.target.closest('.gd-gallery-item, .sh-port-item, .pr-gallery-item, .wd-port-item, .wdv-port-item');
  if (item) {
    lightboxImg.src = e.target.src;
    lightboxImg.alt = e.target.alt;
    lightbox.classList.add('active');
    e.preventDefault();
  }
});

// Current Year in Footer
document.querySelectorAll('.current-year').forEach(el => {
  el.textContent = new Date().getFullYear();
});

// Active nav link
domReady(() => {
  const currentPath = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav a').forEach(a => {
    const href = a.getAttribute('href');
    if (href === currentPath || (currentPath === '' && href === 'index.html')) {
      a.classList.add('active');
    }
  });
});
