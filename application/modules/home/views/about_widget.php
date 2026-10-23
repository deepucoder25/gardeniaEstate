<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$company_file = FCPATH . 'assets/company_info_settings.json';
$company_info = [];
if (file_exists($company_file)) {
    $company_info = json_decode(file_get_contents($company_file), true);
}

$c_name  = !empty($company_info['company_name']) ? $company_info['company_name'] : '';
$c_desc  = !empty($company_info['description']) ? $company_info['description'] : '';
$c_loc   = !empty($company_info['location']) ? $company_info['location'] : '';
$c_phone = !empty($company_info['phone']) ? $company_info['phone'] : '';
$c_email = !empty($company_info['email']) ? $company_info['email'] : '';
$c_img   = !empty($company_info['image']) ? base_url($company_info['image']) : base_url('assets/images/slider/gardenia_hero.webp');
?>

<!-- HOME PAGE ABOUT & BRANDING SECTION (2-COLUMN PREMIUM LAYOUT) -->
<section class="py-5 bg-white position-relative" id="companyAboutSection">
  <div class="container py-4">
    <div class="row align-items-center g-4 g-lg-5">
      
      <!-- LEFT COLUMN: Admin Text Content & Contact Info -->
      <div class="col-lg-6">
        <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-3 text-uppercase">
          WELCOME TO <?= htmlspecialchars($c_name) ?>
        </span>

        <h2 class="display-5 fw-bold text-dark mb-3 lh-sm">
          <?= htmlspecialchars($c_name) ?>
        </h2>

        <p class="text-secondary leading-relaxed fs-6 mb-4">
          <?= nl2br(htmlspecialchars($c_desc)) ?>
        </p>

        <!-- Company Contact Details Pills (2 per Row for Phone & Email) -->
        <div class="mb-4">
          <?php if (!empty($c_loc)): ?>
            <div class="card border-0 rounded-4 shadow-sm px-3 py-2 bg-light d-inline-flex align-items-center flex-row gap-2 mb-2 max-w-100">
              <i class="bi bi-geo-alt-fill text-danger fs-6 flex-shrink-0"></i>
              <span class="fw-bold text-dark extra-small text-truncate"><?= htmlspecialchars($c_loc) ?></span>
            </div>
          <?php endif; ?>

          <div class="row g-2">
            <?php if (!empty($c_phone)): ?>
              <div class="col-6">
                <a href="tel:<?= preg_replace('/\D+/', '', $c_phone) ?>" class="card border-0 rounded-4 shadow-sm px-2.5 py-2 bg-light text-decoration-none d-flex align-items-center justify-content-center flex-row gap-2 h-100">
                  <i class="bi bi-telephone-fill text-success fs-6 flex-shrink-0"></i>
                  <span class="fw-bold text-dark extra-small text-truncate"><?= htmlspecialchars($c_phone) ?></span>
                </a>
              </div>
            <?php endif; ?>

            <?php if (!empty($c_email)): ?>
              <div class="col-6">
                <a href="mailto:<?= htmlspecialchars($c_email) ?>" class="card border-0 rounded-4 shadow-sm px-2.5 py-2 bg-light text-decoration-none d-flex align-items-center justify-content-center flex-row gap-2 h-100">
                  <i class="bi bi-envelope-fill text-primary fs-6 flex-shrink-0"></i>
                  <span class="fw-bold text-dark extra-small text-truncate"><?= htmlspecialchars($c_email) ?></span>
                </a>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <a href="<?= site_url('about-project') ?>" class="btn btn-success rounded-pill px-4 py-2.5 fw-bold shadow-sm d-inline-flex align-items-center gap-2">
          <span>About Project</span>
          <i class="bi bi-arrow-right"></i>
        </a>
      </div>

      <!-- RIGHT COLUMN: Admin Uploaded Company Image -->
      <div class="col-lg-6">
        <div class="position-relative">
          <div class="ratio ratio-4x3 rounded-4 overflow-hidden shadow-lg border">
            <img src="<?= $c_img ?>" alt="<?= htmlspecialchars($c_name) ?> - Luxury Plotted Township Devanahalli" class="img-fluid w-100 object-fit-cover" loading="lazy">
          </div>
          <!-- Floating Feature Badge -->
          <div class="position-absolute bottom-0 start-0 m-4 bg-white rounded-4 shadow-lg p-3 d-flex align-items-center gap-3 border max-w-260">
            <div class="bg-success text-white rounded-circle p-2.5 d-flex align-items-center justify-content-center flex-shrink-0 icon-box-48">
              <i class="bi bi-shield-check fs-4"></i>
            </div>
            <div>
              <div class="fw-bold text-dark small">RERA &amp; Approved</div>
              <div class="extra-small text-muted">100% Clear Land Titles</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
