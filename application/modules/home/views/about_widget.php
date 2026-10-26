<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style>
/* BALANCED LUXURY ABOUT SECTION STYLING */
.gardenia-about-section {
  background-color: #FFFFFF;
}

.gardenia-eyebrow-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(9, 75, 50, 0.08);
  border: 1px solid rgba(9, 75, 50, 0.16);
  color: #094B32;
  font-size: 0.78rem;
  font-weight: 700;
  letter-spacing: 1.2px;
  padding: 6px 16px;
  border-radius: 50px;
  text-transform: uppercase;
}

.gardenia-heading {
  color: #172B23;
  font-size: clamp(1.75rem, 2.5vw, 2.35rem);
  font-weight: 800;
  line-height: 1.25;
  letter-spacing: -0.5px;
}

.gardenia-paragraph {
  color: #556B61;
  font-size: 1.02rem;
  line-height: 1.75;
}

.gardenia-highlight-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.88rem;
  font-weight: 600;
  color: #26352F;
}

.gardenia-contact-pill {
  background: #F7FAF8;
  border: 1px solid #E4EBE6;
  border-radius: 50px;
  padding: 8px 18px;
  display: inline-flex;
  align-items: center;
  gap: 9px;
  text-decoration: none;
  font-size: 0.86rem;
  font-weight: 600;
  color: #26352F;
  transition: all 0.25s ease;
  white-space: nowrap;
}

.gardenia-contact-pill:hover {
  background: #FFFFFF;
  border-color: #094B32;
  color: #094B32;
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(9, 75, 50, 0.08);
}

.gardenia-address-pill {
  background: #F7FAF8;
  border: 1px solid #E4EBE6;
  border-radius: 50px;
  padding: 8px 18px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-size: 0.86rem;
  font-weight: 500;
  color: #26352F;
  max-width: 100%;
  line-height: 1.45;
}

@media (max-width: 767.98px) {
  .gardenia-address-pill {
    border-radius: 12px;
    align-items: flex-start;
  }
  .gardenia-address-pill i {
    margin-top: 3px;
  }
}

.btn-gardenia-main {
  background: #094B32;
  color: #FFFFFF !important;
  font-weight: 700;
  font-size: 0.95rem;
  border-radius: 50px;
  padding: 12px 28px;
  border: 1.5px solid #094B32;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  text-decoration: none;
  box-shadow: 0 6px 18px rgba(9, 75, 50, 0.22);
  transition: all 0.25s ease;
}

.btn-gardenia-main:hover {
  background: #0C5C3E;
  border-color: #0C5C3E;
  transform: translateY(-2px);
  box-shadow: 0 10px 24px rgba(9, 75, 50, 0.32);
  color: #FFFFFF !important;
}

.btn-gardenia-outline {
  background: transparent;
  color: #094B32 !important;
  font-weight: 700;
  font-size: 0.95rem;
  border-radius: 50px;
  padding: 12px 24px;
  border: 1.5px solid #094B32;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  text-decoration: none;
  transition: all 0.25s ease;
}

.btn-gardenia-outline:hover {
  background: rgba(9, 75, 50, 0.06);
  transform: translateY(-2px);
  color: #094B32 !important;
}

/* ARCHITECTURAL IMAGE COMPOSITION STYLING */
.gardenia-image-wrapper {
  position: relative;
  padding: 14px 12px 38px 20px;
}

/* Offset Gold Geometric Frame */
.gardenia-gold-backdrop {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 24px;
  left: 36px;
  border: 2px solid rgba(168, 138, 74, 0.38);
  border-radius: 30px;
  pointer-events: none;
  z-index: 0;
}

/* Main Master Drone Box */
.gardenia-main-img-box {
  position: relative;
  z-index: 1;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 45px rgba(9, 75, 50, 0.12);
  border: 4px solid #FFFFFF;
}

.gardenia-main-img-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

.gardenia-main-img-box:hover img {
  transform: scale(1.03);
}

/* Top-Right Floating Proximity Badge */
.gardenia-pill-badge {
  position: absolute;
  top: 14px;
  right: 14px;
  z-index: 2;
  background: rgba(255, 255, 255, 0.95);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 50px;
  padding: 8px 16px;
  border: 1px solid rgba(255, 255, 255, 0.9);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.8rem;
  font-weight: 700;
  color: #172B23;
}

/* Secondary Overlapping Inset: Gardens & Luxury Bungalows */
.gardenia-inset-box {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 220px;
  height: 145px;
  z-index: 3;
  border-radius: 18px;
  overflow: hidden;
  border: 4px solid #FFFFFF;
  box-shadow: 0 16px 36px rgba(0, 0, 0, 0.18);
  background: #FFFFFF;
}

.gardenia-inset-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.gardenia-inset-box:hover img {
  transform: scale(1.05);
}

.gardenia-inset-tag {
  position: absolute;
  bottom: 8px;
  left: 8px;
  right: 8px;
  background: rgba(15, 41, 30, 0.88);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
  color: #FFFFFF;
  font-size: 0.68rem;
  font-weight: 700;
  padding: 4px 8px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  gap: 5px;
}

/* Floating RERA Badge */
.gardenia-rera-float {
  position: absolute;
  bottom: 10px;
  right: 12px;
  z-index: 3;
  background: rgba(255, 255, 255, 0.96);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-radius: 16px;
  padding: 10px 16px;
  border: 1px solid rgba(255, 255, 255, 0.95);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.14);
  display: flex;
  align-items: center;
  gap: 10px;
}

.rera-icon-box {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: #094B32;
  color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  flex-shrink: 0;
}

@media (max-width: 575.98px) {
  .gardenia-image-wrapper {
    padding: 0;
  }
  .gardenia-gold-backdrop {
    display: none;
  }
  .gardenia-inset-box {
    display: none;
  }
  .gardenia-rera-float {
    position: static;
    margin-top: 14px;
    width: 100%;
    justify-content: center;
  }
}
</style>

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
