<section class="hero-slider-section py-5 position-relative overflow-hidden" itemscope itemtype="https://schema.org/WPHeader">
  <div class="hero-overlay"></div>
  <div class="container position-relative z-index-2 py-lg-4">
    
    <!-- Top Headline Section -->
    <div class="row justify-content-center text-center mb-3">
      <div class="col-lg-10">
        <h1 class="hero-main-title text-white fw-bold display-5 mb-2 text-uppercase tracking-wider" itemprop="name">
          PRESTIGE GARDENIA ESTATE
        </h1>
        <p class="hero-subtitle text-white-75 fs-5 fw-medium mb-3" itemprop="description">
          Pre Launching Luxury Plotted Development in <strong>STRR-Devanahalli, North Bangalore</strong>
        </p>
        <div class="hero-chevron-wrap d-flex justify-content-center align-items-center">
          <i class="bi bi-chevron-down text-white fs-3 animate-bounce"></i>
        </div>
      </div>
    </div>

    <!-- Centered Form Overlay Card -->
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 col-sm-11">
        <div class="card border-0 shadow-lg rounded-4 hero-form-card overflow-hidden">
          <div class="card-body p-4 p-sm-5 text-center">
            
            <h2 class="card-title-sub text-dark fs-5 fw-normal mb-1">
              Download Prestige Gardenia Estate
            </h2>
            <div class="card-title-main text-dark fs-3 fw-bold mb-4 text-uppercase">
              BROCHURE Now!
            </div>

            <form id="heroQuoteForm" class="ajax-form" data-url="<?= site_url('contacts/booking') ?>" data-result="heroFormResults" onsubmit="return false;">
              
              <!-- Name Field -->
              <div class="mb-3 text-start">
                <label class="form-label extra-small uppercase fw-bold text-muted mb-1">Your Full Name <span class="text-danger">*</span></label>
                <div class="input-group custom-input-group">
                  <input type="text" name="name" class="form-control form-control-lg border-end-0 fs-6 px-3" placeholder="Enter your full name" required>
                  <span class="input-group-text bg-white border-start-0 pe-3">
                    <i class="bi bi-person-fill fs-5 text-primary"></i>
                  </span>
                </div>
              </div>

              <!-- Phone Field -->
              <div class="mb-3 text-start">
                <label class="form-label extra-small uppercase fw-bold text-muted mb-1">Mobile Phone Number <span class="text-danger">*</span></label>
                <div class="input-group custom-input-group">
                  <input type="tel" name="phone" class="form-control form-control-lg border-end-0 fs-6 px-3" placeholder="Enter 10-digit mobile number" required pattern="[0-9]{10}">
                  <span class="input-group-text bg-white border-start-0 pe-3">
                    <i class="bi bi-telephone-fill fs-5 text-success"></i>
                  </span>
                </div>
              </div>

              <!-- Email Field -->
              <div class="mb-4 text-start">
                <label class="form-label extra-small uppercase fw-bold text-muted mb-1">Email Address <span class="text-danger">*</span></label>
                <div class="input-group custom-input-group">
                  <input type="email" name="email" class="form-control form-control-lg border-end-0 fs-6 px-3" placeholder="Enter your email address" required>
                  <span class="input-group-text bg-white border-start-0 pe-3">
                    <i class="bi bi-envelope-fill fs-5 text-danger"></i>
                  </span>
                </div>
              </div>

              <!-- CTA Submit Button -->
              <button type="submit" class="btn btn-theme-cta text-white fw-bold py-3 px-4 w-100 rounded-3 text-uppercase fs-5 d-flex align-items-center justify-content-center gap-2 shadow">
                <i class="bi bi-download fs-4"></i>
                <span>DOWNLOAD BROCHURE</span>
              </button>

              <div id="heroFormResults" class="mt-3"></div>
            </form>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>
