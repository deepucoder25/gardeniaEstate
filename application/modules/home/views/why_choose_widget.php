<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style>
.why-choose-card {
  transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
  border: 1px solid rgba(226, 232, 240, 0.8) !important;
  padding: 1.5rem 1.25rem !important;
}
.why-choose-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08) !important;
  border-color: #CBD5E1 !important;
}
.why-choose-icon {
  width: 40px;
  height: 40px;
  flex-shrink: 0;
}
.why-choose-header {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 0.75rem;
}
.why-choose-title {
  font-size: 0.93rem !important;
  font-weight: 700 !important;
  color: #111827;
  white-space: nowrap;
  margin-bottom: 0 !important;
  letter-spacing: -0.2px;
}
</style>

<!-- WHY CHOOSE US SECTION -->
<section class="why-choose-section py-5 position-relative" id="whyChooseSection">
  <div class="container py-4 position-relative z-1">
    
    <!-- Section Header -->
    <div class="text-center mb-5">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">The Gardenia Advantage</span>
      <h2 class="display-6 text-dark fw-bold mb-2">Why Invest in <?= htmlspecialchars($company3) ?>?</h2>
      <div class="divider-line-gold mx-auto"></div>
    </div>

    <!-- 4 Feature Cards Row -->
    <div class="row g-3 g-xl-4">
      
      <!-- Card 1: Prime Bagdogra Location -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-geo-alt-fill fs-5"></i>
            </div>
            <h5 class="why-choose-title">Prime Bagdogra Location</h5>
          </div>
          <p class="small text-muted mb-0" style="font-size: 0.875rem; line-height: 1.5;">Situated directly along the Asian Highway &amp; Airport corridor in Bagdogra, offering seamless connectivity to Siliguri and North Bengal's prime growth hub.</p>
        </div>
      </div>

      <!-- Card 2: 100% Legal & Approved -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-shield-check fs-5"></i>
            </div>
            <h5 class="why-choose-title">100% Clear Titles</h5>
          </div>
          <p class="small text-muted mb-0" style="font-size: 0.875rem; line-height: 1.5;">Fully RERA approved with clear land titles and instant registration available for immediate plot possession and luxury bungalow construction.</p>
        </div>
      </div>

      <!-- Card 3: World-Class Amenities -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-tree-fill fs-5"></i>
            </div>
            <h5 class="why-choose-title">40% Open Green Space</h5>
          </div>
          <p class="small text-muted mb-0" style="font-size: 0.875rem; line-height: 1.5;">Designed with lush parks, grand clubhouse, wide asphalt roads, and underground electrical utilities for a serene eco-lifestyle.</p>
        </div>
      </div>

      <!-- Card 4: High Capital Growth -->
      <div class="col-lg-3 col-md-6">
        <div class="card border-0 rounded-4 shadow-sm h-100 bg-white bg-opacity-90 why-choose-card">
          <div class="why-choose-header">
            <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center why-choose-icon">
              <i class="bi bi-graph-up-arrow fs-5"></i>
            </div>
            <h5 class="why-choose-title">High Appreciation</h5>
          </div>
          <p class="small text-muted mb-0" style="font-size: 0.875rem; line-height: 1.5;">Bagdogra-Siliguri is North Bengal's fastest-growing investment hub near the International Airport, guaranteeing explosive ROI for early investors.</p>
        </div>
      </div>

    </div>

  </div>
</section>
