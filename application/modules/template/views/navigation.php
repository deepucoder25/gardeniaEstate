<body>
  <?php
  $megaWhatsappLink = !empty($whatsapphtml) ? $whatsapphtml : '#';

  $ci =& get_instance();
  $class = strtolower($ci->router->fetch_class());
  $method = strtolower($ci->router->fetch_method());
  $segment1 = strtolower($ci->uri->segment(1) ?? '');

  // Exact active page detection
  $is_home = (empty($segment1) || $segment1 === 'home') && ($class === 'home' && in_array($method, ['index', '']));
  $is_about = in_array($segment1, ['about-project', 'about-us', 'about']) || ($class === 'about' && in_array($method, ['index', 'choose']));
  $is_plots = in_array($segment1, ['plots', 'plots-pricing', 'plots-inventory', 'properties', 'plot']) || ($class === 'about' && in_array($method, ['plots', 'plots_page', 'pricing']));
  $is_gallery = $class === 'gallery' || in_array($segment1, ['gallery', 'photo-gallery', 'video-gallery']);
  $is_reviews = $class === 'reviews' || in_array($segment1, ['reviews', 'testimonials']) || ($class === 'about' && $method === 'testimonials');
  $is_faqs = in_array($segment1, ['faqs', 'faq', 'faq-page']) || ($class === 'about' && in_array($method, ['faqs', 'faq', 'faq_page']));
  $is_contact = $class === 'contacts' || in_array($segment1, ['contact-us', 'contacts']);
  $is_blog = $class === 'blog' || in_array($segment1, ['blog', 'blogs']);
  $is_privacy = in_array($segment1, ['privacy-policy', 'privacy']) || ($class === 'about' && $method === 'privacy');
  $is_terms = in_array($segment1, ['terms-and-conditions', 'terms']) || ($class === 'about' && $method === 'terms');
  $is_disclaimer = in_array($segment1, ['legal-disclaimer', 'disclaimer']) || ($class === 'about' && $method === 'disclaimer');
  ?>

  <!-- SEO Friendly SiteNavigationElement Schema -->
  <?php
  $nav_schema = [
    "@context" => "https://schema.org",
    "@graph" => [
      ["@type" => "SiteNavigationElement", "name" => "Home", "url" => site_url()],
      ["@type" => "SiteNavigationElement", "name" => "About Project", "url" => site_url('about-project')],
      ["@type" => "SiteNavigationElement", "name" => "Project Overview", "url" => site_url('project-overview')],
      ["@type" => "SiteNavigationElement", "name" => "Plots & Pricing", "url" => site_url('plots-pricing')],
      ["@type" => "SiteNavigationElement", "name" => "Amenities", "url" => site_url('amenities')],
      ["@type" => "SiteNavigationElement", "name" => "Gallery", "url" => site_url('gallery')],
      ["@type" => "SiteNavigationElement", "name" => "Contact Us", "url" => site_url('contact-us')]
    ]
  ];
  ?>
  <script type="application/ld+json">
  <?= json_encode($nav_schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) ?>
  </script>

  <!-- Top Header Bar (Bold Text, Taller height, Email, Phone, Timings, RERA & Marquee Address) -->
  <div class="top-header-bar py-2 px-3 px-md-4  text-white shadow-xs fw-bold">
    <div class="container-fluid fs-5 container-lg d-flex align-items-center justify-content-between gap-3">
      <!-- Contact Info (Phone & Email with generous icon-text gaps) -->
      <div class="d-none d-md-flex  align-items-center gap-3.5 text-nowrap extra-small fw-bold">
        <a <?= $phonehtml ?> class="text-white text-decoration-none d-flex align-items-center fs-6 gap-2 top-bar-link" title="Call Us">
          <i class="bi bi-telephone-fill text-warning me-1.5 fs-6"></i>
          <span class="fw-bold"><?= $phone ?></span>
        </a>
        <span class="text-white-50 px-1">|</span>
        <a href="<?= $mailhtml ?>" class="text-white text-decoration-none d-flex align-items-center  fs-6 gap-2 top-bar-link" title="Email Us">
          <i class="bi bi-envelope-fill text-warning me-1.5 fs-6"></i>
          <span class="fw-bold"><?= $mail ?></span>
        </a>
      </div>

      <!-- Marquee Address & Timings -->
      <div class="flex-grow-1 overflow-hidden mx-md-2">
        <marquee behavior="scroll" direction="left" scrollamount="5" class="mb-0 text-white small fw-bold d-block">
          <span class="me-4"><i class="bi bi-geo-alt-fill text-warning me-2"></i> <?= htmlspecialchars($address) ?></span>
          <span class="me-4"><i class="bi bi-patch-check-fill text-warning me-2"></i> WBRERA Approved: WBRERA/P/DAR/2024/000188</span>
          <span class="me-4"><i class="bi bi-tree-fill text-warning me-2"></i> 50+ Acre Luxury Plots &amp; Bungalows Township</span>
          <span class="me-4"><i class="bi bi-clock-fill text-warning me-2"></i> Mon - Sat: 10:00 AM - 6:00 PM</span>
        </marquee>
      </div>

      <!-- Right Side Badges (Timings & Location) -->
      <div class="d-none d-lg-flex align-items-center gap-2 text-nowrap">
      
        <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1.5 extra-small fw-bold d-flex align-items-center gap-2">
          <i class="bi bi-geo-alt-fill text-success fs-7 me-1"></i> <?= htmlspecialchars($addressRegion) ?>
        </span>
      </div>

      <!-- Mobile Contact Quick Icons -->
      <div class="d-flex d-md-none align-items-center gap-3 extra-small text-nowrap">
        <a <?= $phonehtml ?> class="text-white text-decoration-none" title="Call Us"><i class="bi bi-telephone-fill text-warning fs-6"></i></a>
        <a href="<?= $mailhtml ?>" class="text-white text-decoration-none" title="Email Us"><i class="bi bi-envelope-fill text-warning fs-6"></i></a>
      </div>
    </div>
  </div>

  <!-- Sticky Main Navbar Header (Logo, Get Quote Button Larger on Desktop, Toggle Menu) -->
  <header class="navbar navbar-expand-lg sticky-top py-2 px-2.5 px-md-3 bg-white custom-navbar shadow-sm" id="mainHeader">
    <div class="container-fluid container-lg d-flex align-items-center justify-content-between flex-nowrap gap-2">
      
      <!-- Brand Logo -->
      <a href="<?= site_url() ?>" class="navbar-brand d-flex align-items-center m-0 p-0 flex-shrink-1">
        <img src="<?= base_url('assets/images/logo/logo.webp') ?>" alt="<?= htmlspecialchars($company3) ?> Logo - <?= htmlspecialchars($company3) ?>" class="header-logo img-fluid" loading="eager" fetchpriority="high">
      </a>

      <!-- Header Action Items: Get Quote Button & Toggle Button (With Explicit Mobile Gap) -->
      <div class="d-flex align-items-center gap-2 gap-md-3 flex-shrink-0">
        <!-- Get Quote Button -->
        <button class="btn btn-success rounded-pill px-2.5 px-md-4 py-1.5 py-md-2.5  gap-2 fw-bold d-flex align-items-center gap-1.5 gap-md-2 shadow-sm header-quote-btn text-nowrap" type="button" data-bs-toggle="modal" data-bs-target="#qteModal" title="Get Instant Quote">
          <i class="bi bi-file-earmark-text-fill fs-6"></i>
          <span class="fs-md-6">Get Quote</span>
        </button>

        <!-- Toggle Button for Top-Opening Menu (With ms-2 Margin) -->
        <button class="btn rounded-circle d-flex align-items-center justify-content-center p-1.5 p-md-2 shadow-none border-0 menu-toggle-btn ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainNavbarOffcanvas" aria-controls="mainNavbarOffcanvas" aria-label="Toggle navigation" title="Menu">
          <i class="bi bi-list fs-3 lh-1"></i>
        </button>
      </div>

    </div>
  </header>

  <!-- Offcanvas Navigation Menu Drawer (Smooth Animation) -->
  <div class="offcanvas offcanvas-top custom-offcanvas-top vh-100 min-vh-100 overflow-y-auto overflow-x-hidden border-0" tabindex="-1" id="mainNavbarOffcanvas" aria-labelledby="mainNavbarOffcanvasLabel">
    
    <!-- Drawer Header Bar (Logo aligned with main navbar logo on desktop) -->
    <div class="offcanvas-header py-3 px-3 px-md-4 border-bottom bg-white sticky-top">
      <div class="container-fluid container-lg px-0 px-lg-3 d-flex align-items-center justify-content-between w-100">
        <a href="<?= site_url() ?>" class="d-flex align-items-center text-decoration-none" id="mainNavbarOffcanvasLabel">
          <img src="<?= base_url('assets/images/logo/logo.webp') ?>" alt="<?= htmlspecialchars($company3) ?> Navigation Logo" class="offcanvas-logo img-fluid" loading="lazy">
        </a>
        <button type="button" class="btn-close text-reset shadow-none fs-4 m-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    </div>

    <!-- Drawer Body -->
    <div class="offcanvas-body p-4 bg-light overflow-x-hidden">
      <div class="container">
        
        <!-- MAIN 3-COLUMN LAYOUT -->
        <div class="row g-4 mb-4">
          
          <!-- COLUMN 1: PROJECT NAVIGATION -->
          <div class="col-lg-4 col-md-6 border-end-lg">
            <div class="text-center mb-3">
              <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">PROJECT NAVIGATION</h6>
              <div class="menu-heading-leaf"><i class="bi bi-flower2"></i></div>
            </div>

            <div class="d-flex flex-column pe-lg-2">
              
              <!-- 1. Home -->
              <a href="<?= site_url() ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_home ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-house-door-fill text-warning fs-5"></i>
                  <span>Home</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 2. About Project -->
              <a href="<?= site_url('about-project') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_about ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-info-circle-fill text-warning fs-5"></i>
                  <span>About Project</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 2.5. Plots & Bungalows -->
              <a href="<?= site_url('plots') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_plots ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-grid-3x3-gap-fill text-warning fs-5"></i>
                  <span>Plots &amp; Bungalows</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 3. Gallery -->
              <a href="<?= site_url('gallery') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_gallery ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-images text-warning fs-5"></i>
                  <span>Gallery</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 4. Customer Reviews (Connected with Admin) -->
              <a href="<?= site_url('reviews') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_reviews ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-star-fill text-warning fs-5"></i>
                  <span>Customer Reviews</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 6. FAQ's -->
              <a href="<?= site_url('faqs') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_faqs ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-question-circle-fill text-warning fs-5"></i>
                  <span>FAQ's</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>

              <!-- 7. Contact Us -->
              <a href="<?= site_url('contact-us') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_contact ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <i class="bi bi-telephone-fill text-warning fs-5"></i>
                  <span>Contact Us</span>
                </span>
                <i class="bi bi-chevron-right extra-small text-muted"></i>
              </a>
            </div>
          </div>

          <!-- COLUMN 2: RESOURCES & LEGAL -->
          <div class="col-lg-4 col-md-6 border-end-lg">
            <div class="text-center mb-3">
              <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">RESOURCES &amp; LEGAL</h6>
              <div class="menu-heading-leaf"><i class="bi bi-flower2"></i></div>
            </div>

            <div class="d-flex flex-column pe-lg-2 mb-3">
              <!-- 1. Blogs & Articles -->
              <a href="<?= site_url('blog') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_blog ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <span class="nav-icon-box bg-success text-white"><i class="bi bi-newspaper"></i></span>
                  <span>Blogs &amp; Articles</span>
                </span>
                <i class="bi bi-chevron-right fs-7"></i>
              </a>

              <!-- 2. Privacy Policy -->
              <a href="<?= site_url('privacy-policy') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_privacy ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <span class="nav-icon-box bg-primary text-white"><i class="bi bi-shield-check"></i></span>
                  <span>Privacy Policy</span>
                </span>
                <i class="bi bi-chevron-right fs-7"></i>
              </a>

              <!-- 3. Terms & Conditions -->
              <a href="<?= site_url('terms-and-conditions') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_terms ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <span class="nav-icon-box bg-warning text-dark"><i class="bi bi-file-earmark-text"></i></span>
                  <span>Terms &amp; Conditions</span>
                </span>
                <i class="bi bi-chevron-right fs-7"></i>
              </a>

              <!-- 4. Legal Disclaimer -->
              <a href="<?= site_url('legal-disclaimer') ?>" class="d-flex align-items-center justify-content-between nav-drawer-pill<?= $is_disclaimer ? ' active' : '' ?>">
                <span class="d-flex align-items-center gap-3 fw-semibold">
                  <span class="nav-icon-box bg-danger text-white"><i class="bi bi-bank"></i></span>
                  <span>Legal Disclaimer</span>
                </span>
                <i class="bi bi-chevron-right fs-7"></i>
              </a>
            </div>

            <!-- Banner Card -->
            <div class="card border-0 rounded-4 overflow-hidden shadow-sm text-center text-white position-relative menu-banner-card">
              <img src="<?= base_url('assets/images/slider/gardenia_hero.webp') ?>" alt="<?= htmlspecialchars($company3) ?> Luxury Plotted Community Banner" class="img-fluid menu-banner-img" loading="lazy">
              <div class="position-absolute top-0 start-0 w-100 h-100 menu-banner-overlay p-4 d-flex flex-column align-items-center justify-content-center">
                <p class="small fw-semibold mb-3 text-white">Exclusive Plots &amp; Luxury Bungalows for Sale Surrounded by Nature</p>
                <a href="<?= site_url('about-project') ?>" class="btn btn-outline-light rounded-pill btn-sm px-4 py-2 fw-bold tracking-wide text-uppercase">EXPLORE PROJECT</a>
              </div>
            </div>

          </div>

          <!-- COLUMN 3: NEED QUICK ASSISTANCE CARD -->
          <div class="col-lg-4 col-md-12">
            <div class="card border-0 rounded-4 p-4 shadow-sm h-100 d-flex flex-column justify-content-between bg-light">
              
              <div class="text-center mb-3">
                <div class="bg-gradient-green-gold text-white rounded-circle p-3 mx-auto mb-2 d-flex align-items-center justify-content-center shadow-sm icon-box-58">
                  <i class="bi bi-headset fs-3"></i>
                </div>
                <h5 class="fw-bold text-dark mb-1">Need Quick Assistance?</h5>
                <p class="small text-muted mb-3">Get an instant quote or connect directly with our sales team today.</p>

                <button class="btn btn-success w-100 rounded-pill py-2.5 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2 mb-3" data-bs-toggle="modal" data-bs-target="#qteModal">
                  <i class="bi bi-file-earmark-text-fill"></i> Get Instant Quote
                </button>
                <div class="menu-heading-leaf mb-2"><i class="bi bi-flower2"></i></div>
              </div>

              <!-- 2 Contact White Cards (2 per Row on Mobile & Desktop) -->
              <div class="row g-2 mb-3">
                <div class="col-6">
                  <a <?= $phonehtml ?> class="card border-0 rounded-4 p-2.5 shadow-sm text-decoration-none text-dark d-flex flex-column align-items-center text-center bg-white nav-contact-card h-100">
                    <div class="bg-success text-white rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm mb-1.5 icon-box-42">
                      <i class="bi bi-telephone-fill fs-5"></i>
                    </div>
                    <div class="text-muted extra-small fw-semibold text-uppercase tracking-wide">Call Us</div>
                    <div class="fw-bold extra-small text-dark text-truncate w-100"><?= $phone ?></div>
                  </a>
                </div>

                <div class="col-6">
                  <a href="<?= $whatsapphtml ?>" target="_blank" rel="noopener" class="card border-0 rounded-4 p-2.5 shadow-sm text-decoration-none text-dark d-flex flex-column align-items-center text-center bg-white nav-contact-card h-100">
                    <div class="bg-whatsapp-green text-white rounded-circle p-2 d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm mb-1.5 icon-box-42">
                      <i class="bi bi-whatsapp fs-5"></i>
                    </div>
                    <div class="text-muted extra-small fw-semibold text-uppercase tracking-wide">Chat WhatsApp</div>
                    <div class="fw-bold extra-small text-dark text-truncate w-100"><?= $phone ?></div>
                  </a>
                </div>
              </div>

              <!-- 4 Micro Feature Icons Strip (Generous Gap & Balanced Line Height) -->
              <div class="row g-2 text-center border-top pt-3">
                <div class="col-3 px-1">
                  <i class="bi bi-shield-check text-success fs-5 d-block mb-1"></i>
                  <div class="extra-small text-dark fw-semibold lh-sm">Secure Investment</div>
                </div>
                <div class="col-3 px-1">
                  <i class="bi bi-file-earmark-check text-success fs-5 d-block mb-1"></i>
                  <div class="extra-small text-dark fw-semibold lh-sm">Clear Legality</div>
                </div>
                <div class="col-3 px-1">
                  <i class="bi bi-tree text-success fs-5 d-block mb-1"></i>
                  <div class="extra-small text-dark fw-semibold lh-sm">Premium Amenities</div>
                </div>
                <div class="col-3 px-1">
                  <i class="bi bi-graph-up-arrow text-success fs-5 d-block mb-1"></i>
                  <div class="extra-small text-dark fw-semibold lh-sm">High Appreciation</div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- BOTTOM FULL-WIDTH FEATURE STRIP (5 Items) -->
        <div class="card border-0 rounded-4 shadow-sm p-3 bg-white">
          <div class="row g-2 align-items-center text-center">
            
            <div class="col-md col-6 border-end-md">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-patch-check-fill text-warning fs-4"></i>
                <div class="text-start">
                  <div class="fw-bold text-dark small lh-sm">RERA Approved</div>
                </div>
              </div>
            </div>

            <div class="col-md col-6 border-end-md">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-geo-alt-fill text-warning fs-4"></i>
                <div class="text-start">
                  <div class="fw-bold text-dark small lh-sm">Prime Location</div>
                </div>
              </div>
            </div>

            <div class="col-md col-6 border-end-md">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-shield-lock-fill text-warning fs-4"></i>
                <div class="text-start">
                  <div class="fw-bold text-dark small lh-sm">Gated Community</div>
                </div>
              </div>
            </div>

            <div class="col-md col-6 border-end-md">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-tree-fill text-warning fs-4"></i>
                <div class="text-start">
                  <div class="fw-bold text-dark small lh-sm">Lush Green Environment</div>
                </div>
              </div>
            </div>

            <div class="col-md col-12">
              <div class="d-flex align-items-center justify-content-center gap-2">
                <i class="bi bi-currency-rupee text-warning fs-4"></i>
                <div class="text-start">
                  <div class="fw-bold text-dark small lh-sm">High Return on Investment</div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>