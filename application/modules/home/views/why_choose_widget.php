<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- WHY CHOOSE US SECTION -->
<section class="why-choose-section py-5 position-relative" id="whyChooseSection">
  <div class="container py-4 position-relative z-1">
    
    <!-- Section Header -->
    <div class="text-center mb-5">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase"><?= htmlspecialchars($company3) ?> Advantage</span>
      <h2 class="display-6 text-dark fw-bold mb-2">Why Choose <?= htmlspecialchars($company3) ?>?</h2>
      <div class="divider-line-gold mx-auto"></div>
    </div>

    <!-- 4 Feature Cards Row -->
    <div class="row g-3 g-xl-4">
      
      <!-- Card 1: Prime Location -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-geo-alt-fill fs-5"></i>
            </div>
            <h5 class="why-choose-title">Prime Strategic Location</h5>
          </div>
          <p class="small text-muted mb-0 why-choose-desc">Situated directly along Asian Highway 2 &amp; Airport Road in <?= htmlspecialchars($addressRegion) ?>, offering effortless connectivity to daily essentials and transit hubs.</p>
        </div>
      </div>

      <!-- Card 2: 100% Clear Titles -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-shield-check fs-5"></i>
            </div>
            <h5 class="why-choose-title">100% Clear Titles</h5>
          </div>
          <p class="small text-muted mb-0 why-choose-desc">Verified clear freehold land titles and instant registration available for immediate residential plot possession and custom home construction.</p>
        </div>
      </div>

      <!-- Card 3: 250 Bigha Green Township -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-tree-fill fs-5"></i>
            </div>
            <h5 class="why-choose-title">250 Bigha Green Township</h5>
          </div>
          <p class="small text-muted mb-0 why-choose-desc">Master-planned gated community featuring 40% open green landscapes, lush parks, wide asphalt roads, and underground electrical utilities.</p>
        </div>
      </div>

      <!-- Card 4: 30+ Modern Amenities & Peaceful Living -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-house-heart-fill fs-5"></i>
            </div>
            <h5 class="why-choose-title">30+ Modern Amenities</h5>
          </div>
          <p class="small text-muted mb-0 why-choose-desc">Designed for serene family living with 24/7 gated security, grand clubhouse, kids play zone, landscaped parks, and nature-friendly surroundings.</p>
        </div>
      </div>

    </div>

  </div>
</section>
