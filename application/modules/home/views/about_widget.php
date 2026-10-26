<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- HOME PAGE ABOUT & BRANDING SECTION -->
<section class="gardenia-about-section py-5" id="companyAboutSection">
  <div class="container py-3">
    <div class="row align-items-center g-4 g-lg-5">
      
      <!-- LEFT COLUMN: Balanced, Clean Content Area -->
      <div class="col-lg-6">
        
        <!-- Eyebrow Badge -->
        <div class="mb-3">
          <span class="gardenia-eyebrow-pill">
            <i class="bi bi-patch-check-fill text-success"></i>
            WELCOME TO <?= $company3 ?>
          </span>
        </div>

        <!-- Main Title -->
        <h2 class="gardenia-heading mb-3">
          <?= $company3 ?><span class="d-none d-sm-inline"> – </span><br class="d-none d-md-inline">Luxury Gated Plotted Community
        </h2>

        <!-- Description Paragraph -->
        <p class="gardenia-paragraph mb-3">
         A premier 50+ Acre luxury township offering residential plots and luxury bungalows for sale along Airport Road & Asian Highway 2, Bagdogra, Siliguri featuring 40% open green space, 30+ world-class amenities, and immediate RERA-approved registration.
        </p>

        <!-- 4 Key Township Highlights Checklist -->
        <div class="row g-2 mb-3.5">
          <div class="col-6">
            <div class="gardenia-highlight-item">
              <i class="bi bi-check-circle-fill text-success fs-6 flex-shrink-0"></i>
              <span>40% Green Open Space</span>
            </div>
          </div>
          <div class="col-6">
            <div class="gardenia-highlight-item">
              <i class="bi bi-check-circle-fill text-success fs-6 flex-shrink-0"></i>
              <span>100% Clear Land Titles</span>
            </div>
          </div>
          <div class="col-6">
            <div class="gardenia-highlight-item">
              <i class="bi bi-check-circle-fill text-success fs-6 flex-shrink-0"></i>
              <span>5 Mins to IXB Airport</span>
            </div>
          </div>
          <div class="col-6">
            <div class="gardenia-highlight-item">
              <i class="bi bi-check-circle-fill text-success fs-6 flex-shrink-0"></i>
              <span>30+ Luxury Amenities</span>
            </div>
          </div>
        </div>

        <!-- Location Pill (Full Address Visible, No Truncation) -->
        <?php if (!empty($address)): ?>
          <div class="mb-2 mt-3">
            <div class="gardenia-address-pill">
              <i class="bi bi-geo-alt-fill text-danger flex-shrink-0 fs-6"></i>
              <span><?= htmlspecialchars($address) ?></span>
            </div>
          </div>
        <?php endif; ?>

        <!-- Phone & Email Pills (Side-by-Side Flex, Full Text Visible, No Truncation) -->
        <div class="d-flex align-items-center gap-2 mb-4 flex-wrap">
          <?php if (!empty($phone)): ?>
            <a <?= $phonehtml ?> class="gardenia-contact-pill">
              <i class="bi bi-telephone-fill text-success flex-shrink-0"></i>
              <span><?= htmlspecialchars($phone) ?></span>
            </a>
          <?php endif; ?>

          <?php if (!empty($mail)): ?>
            <a href="<?= $mailhtml ?>" class="gardenia-contact-pill">
              <i class="bi bi-envelope-fill text-primary flex-shrink-0"></i>
              <span><?= htmlspecialchars($mail) ?></span>
            </a>
          <?php endif; ?>
        </div>

        <!-- Action Buttons with clean gap -->
        <div class="d-flex align-items-center gap-3 flex-wrap">
          <a href="<?= site_url('about-project') ?>" class="btn-gardenia-main">
            <span>About Project</span>
            <i class="bi bi-arrow-right"></i>
          </a>
          <a href="<?= site_url('plots') ?>" class="btn-gardenia-outline">
            <span>Explore Plots</span>
          </a>
        </div>

      </div>

      <!-- RIGHT COLUMN: Layered Architectural Visual Showcase -->
      <div class="col-lg-6">
        <div class="gardenia-image-wrapper">
          
          <!-- Decorative Gold Offset Border Behind -->
          <div class="gardenia-gold-backdrop"></div>

          <!-- Main Master Drone Image Frame -->
          <div class="gardenia-main-img-box">
            <div class="ratio ratio-4x3">
              <img src="<?= base_url('assets/images/reviews/bagdogra_plots_bungalows.webp') ?>" alt="<?= $company3 ?> - Luxury Plots &amp; Bungalows in Bagdogra Siliguri" class="w-100 h-100 object-fit-cover" loading="lazy">
            </div>
            
            <!-- Top-Right Floating Proximity Badge -->
            <div class="gardenia-pill-badge">
              <span>✈️</span>
              <span>5 Mins to IXB Airport</span>
            </div>
          </div>

          <!-- Secondary Overlapping Inset: Gardens & Luxury Bungalows -->
          <div class="gardenia-inset-box">
            <img src="<?= base_url('assets/images/reviews/gardenia_bungalow_villa.webp') ?>" alt="<?= $company3 ?> - Landscaped Gardens &amp; Luxury Bungalow Living" loading="lazy">
            <div class="gardenia-inset-tag">
              <i class="bi bi-house-door-fill text-success"></i>
              <span>Luxury Bungalows</span>
            </div>
          </div>

          <!-- Floating RERA Approval Badge -->
          <div class="gardenia-rera-float">
            <div class="rera-icon-box">
              <i class="bi bi-shield-check"></i>
            </div>
            <div>
              <div class="fw-bold text-dark small lh-1">RERA &amp; Approved</div>
              <div class="extra-small text-muted mt-1">100% Clear Land Titles</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
