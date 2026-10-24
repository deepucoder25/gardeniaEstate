<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$plots_file = FCPATH . 'assets/plots_master.json';
$plots = [];
if (file_exists($plots_file)) {
    $plots = json_decode(file_get_contents($plots_file), true);
    if (!is_array($plots)) $plots = [];
}
?>

<!-- DYNAMIC BREADCRUMB HEADER -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Plots & Bungalows For Sale',
    'bc_desc' => 'Explore transparent plot sizes, bungalow specs, RERA approval status, and available listings at ' . $company3 . '.',
    'breadcrumbs' => [
        ['name' => 'Plots & Bungalows']
    ]
]);
?>

<!-- ALL PLOTS & BUNGALOWS INVENTORY SECTION -->
<section class="py-5 bg-light position-relative" id="allPlotsInventorySection">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="mb-4 text-center max-w-800 mx-auto">
      <span class="badge bg-success-subtle text-success px-4 py-2 rounded-pill uppercase fw-bold extra-small mb-2 tracking-wide">
        DIRECT DEVELOPER INVENTORY
      </span>
      <h2 class="display-6 fw-bold text-dark mb-2">
        Available Plots &amp; Luxury Bungalows For Sale
      </h2>
      <p class="text-secondary fs-6 mb-0">Explore our complete portfolio of residential plots and luxury bungalows for sale loaded live from our master admin inventory.</p>
    </div>

    <!-- 3-Column Grid Cards -->
    <?php if (!empty($plots)): ?>
      <div class="row g-4 mb-4" id="plotsGrid">
        <?php foreach ($plots as $p): 
            if (isset($p['status']) && strtolower($p['status']) == 'inactive') continue;

            $st_badge = 'bg-danger text-white';
            if (isset($p['project_status'])) {
                $st = strtolower($p['project_status']);
                if ($st == 'ongoing' || $st == 'active' || $st == 'available') $st_badge = 'bg-success text-white';
                elseif ($st == 'pre-launching') $st_badge = 'bg-warning text-dark';
                elseif ($st == 'completed') $st_badge = 'bg-info text-white';
            }
            $p_img = !empty($p['image']) ? base_url($p['image']) : base_url('assets/images/slider/gardenia_hero.webp');

            $p_slug = isset($p['name']) ? strtolower(trim(preg_replace('/[^a-z0-9\s-]/i', '', $p['name']))) : '';
            $p_slug = trim(preg_replace('/[\s-]+/', '-', $p_slug), '-');
            if (empty($p_slug)) $p_slug = $p['id'];
        ?>
          <div class="col-lg-4 col-md-6">
            <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden bg-white border">
              
              <!-- Card Thumbnail & Status Badges -->
              <div class="position-relative bg-light">
                <div class="ratio ratio-16x9">
                  <img src="<?= $p_img ?>" alt="<?= htmlspecialchars($p['name']) ?> - <?= htmlspecialchars($company3) ?> Plot Project" class="img-fluid object-fit-cover" loading="lazy">
                </div>

                <div class="position-absolute top-0 start-0 m-3 d-flex gap-2 z-index-2">
                  <span class="badge <?= $st_badge ?> px-3 py-1.5 rounded-pill text-uppercase fw-bold extra-small shadow-sm">
                    <?= htmlspecialchars($p['project_status']) ?>
                  </span>
                  <span class="badge bg-dark bg-opacity-75 text-white px-3 py-1.5 rounded-pill text-uppercase fw-bold extra-small shadow-sm">
                    <?= !empty($p['project_type']) ? htmlspecialchars($p['project_type']) : 'PLOT' ?>
                  </span>
                </div>
              </div>

              <!-- Card Content -->
              <div class="card-body p-4 d-flex flex-column justify-content-between">
                <div>
                  <h3 class="fs-5 fw-bold text-dark mb-2">
                    <a href="<?= site_url('plot/' . $p_slug) ?>" class="text-dark text-decoration-none hover-success">
                      <?= htmlspecialchars($p['name']) ?>
                    </a>
                  </h3>
                  
                  <?php if (!empty($p['address'])): ?>
                    <p class="small text-secondary mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($p['address']) ?></p>
                  <?php endif; ?>

                  <!-- Specifications Box -->
                  <div class="bg-light p-3 rounded-4 mb-3 border">
                    <?php if (!empty($p['land_area'])): ?>
                      <div class="d-flex align-items-center justify-content-between small text-dark mb-2">
                        <span class="text-muted"><i class="bi bi-bounding-box-circles text-primary me-1.5"></i> Land Area:</span>
                        <strong class="text-dark fw-bold"><?= htmlspecialchars($p['land_area']) ?></strong>
                      </div>
                    <?php endif; ?>

                    <?php if (!empty($p['total_plots'])): ?>
                      <div class="d-flex align-items-center justify-content-between small text-dark mb-2">
                        <span class="text-muted"><i class="bi bi-grid-3x3-gap text-success me-1.5"></i> Total Plots:</span>
                        <strong class="text-dark fw-bold"><?= htmlspecialchars($p['total_plots']) ?></strong>
                      </div>
                    <?php endif; ?>

                    <?php if (!empty($p['plot_sizes'])): ?>
                      <div class="d-flex align-items-start justify-content-between extra-small text-dark pt-1 border-top">
                        <span class="text-muted"><i class="bi bi-aspect-ratio text-info me-1.5"></i> Available Sizes:</span>
                        <strong class="text-dark fw-bold text-end ps-2"><?= htmlspecialchars($p['plot_sizes']) ?></strong>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

                <!-- Action Buttons (View Details & Inquire Price) -->
                <div class="d-flex gap-2 mt-2">
                  <a href="<?= site_url('plot/' . $p_slug) ?>" class="btn btn-success text-white rounded-pill px-3 py-2.5 flex-fill small fw-bold d-flex align-items-center justify-content-center gap-1.5 shadow-sm">
                    <span>View Details</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                  <button class="btn btn-outline-success rounded-pill px-3 py-2.5 flex-fill small fw-bold d-flex align-items-center justify-content-center gap-1.5 shadow-sm" data-bs-toggle="modal" data-bs-target="#qteModal">
                    <i class="bi bi-tag-fill text-success"></i>
                    <span>Inquire Price</span>
                  </button>
                </div>

              </div>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="text-center py-5">
        <p class="text-secondary fs-5">No plot projects listed currently.</p>
      </div>
    <?php endif; ?>

  </div>
</section>
