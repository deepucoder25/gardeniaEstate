<section class="hero-slider-section position-relative overflow-hidden" style="background-image: url('<?= base_url('assets/images/slider/gardenia_hero.webp?v=' . time()) ?>');" itemscope itemtype="https://schema.org/WPHeader">
  <div class="hero-overlay"></div>
  <div class="container position-relative z-index-2 py-4 py-lg-5">
    
    <!-- Top Headline Section -->
    <div class="row justify-content-center text-center mb-3 mb-md-4">
      <div class="col-lg-10 col-xl-9">
        <div class="hero-badge-wrap mb-2">
          <span class="badge bg-dark bg-opacity-50 text-white px-3 py-2 rounded-pill fw-semibold border border-light border-opacity-25 text-uppercase letter-spacing-1">
            <i class="bi bi-geo-alt-fill text-warning me-1"></i> Bagdogra, Siliguri &bull; Luxury Plotted Township
          </span>
        </div>
        <h1 class="hero-main-title text-white fw-bold mb-2 text-uppercase tracking-wider" itemprop="name">
          <?= strtoupper(htmlspecialchars($company3)) ?>
        </h1>
        <p class="hero-subtitle text-white text-opacity-90 fs-5 fw-medium mb-0" itemprop="description">
          Luxury Residential Plots &amp; Bungalows For Sale in <strong><?= htmlspecialchars($addressRegion) ?></strong>
        </p>
      </div>
    </div>

    <!-- Sleek Horizontal Form Bar (Compact Row) -->
    <div class="row justify-content-center">
      <div class="col-xl-11 col-lg-12">
        <div class="card border-0 shadow-lg rounded-4 hero-form-bar">
          <div class="card-body p-3 p-md-4">
            
            <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2 px-1">
              <div class="d-flex align-items-center gap-2">
                <span class="hero-form-icon-wrap">
                  <i class="bi bi-file-earmark-pdf-fill fs-5 text-white"></i>
                </span>
                <div>
                  <h2 class="card-title-main fs-5 fw-bold mb-0 text-uppercase">
                    Download <?= htmlspecialchars($company3) ?> Brochure
                  </h2>
                  <p class="text-muted extra-small mb-0">Get verified master layout, price sheet &amp; unit availability</p>
                </div>
              </div>
              <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill small fw-semibold d-none d-sm-inline-block">
                <i class="bi bi-lightning-charge-fill me-1"></i> Instant PDF Download
              </span>
            </div>

            <form id="heroQuoteForm" class="ajax-form" data-url="<?= site_url('contacts/booking') ?>" data-result="heroFormResults" onsubmit="return false;">
              <div class="row g-2 g-md-3 align-items-center">
                <!-- Name Field -->
                <div class="col-lg-3 col-md-6">
                  <div class="input-group custom-input-group">
                    <span class="input-group-text bg-white border-end-0 ps-3">
                      <i class="bi bi-person-fill text-muted"></i>
                    </span>
                    <input type="text" name="name" class="form-control border-start-0 fs-6" placeholder="Full Name *" required>
                  </div>
                </div>

                <!-- Phone Field -->
                <div class="col-lg-3 col-md-6">
                  <div class="input-group custom-input-group">
                    <span class="input-group-text bg-white border-end-0 ps-3">
                      <i class="bi bi-telephone-fill text-muted"></i>
                    </span>
                    <input type="tel" name="phone" class="form-control border-start-0 fs-6" placeholder="Mobile Number *" required pattern="[0-9]{10}">
                  </div>
                </div>

                <!-- Email Field -->
                <div class="col-lg-3 col-md-6">
                  <div class="input-group custom-input-group">
                    <span class="input-group-text bg-white border-end-0 ps-3">
                      <i class="bi bi-envelope-fill text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control border-start-0 fs-6" placeholder="Email Address *" required>
                  </div>
                </div>

                <!-- CTA Submit Button -->
                <div class="col-lg-3 col-md-6">
                  <button type="submit" class="btn btn-theme-cta text-white fw-bold px-3 w-100 rounded-3 text-uppercase fs-6 d-flex align-items-center justify-content-center gap-2 shadow-sm">
                    <i class="bi bi-download fs-5"></i>
                    <span>DOWNLOAD BROCHURE</span>
                  </button>
                </div>
              </div>

              <div id="heroFormResults" class="mt-2 text-start"></div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>
