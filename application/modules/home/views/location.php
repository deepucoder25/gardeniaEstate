<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$overview_file = FCPATH . 'assets/project_overview_settings.json';
$overview = [];
if (file_exists($overview_file)) {
    $overview = json_decode(file_get_contents($overview_file), true);
}

$google_map_url = !empty($overview['google_map_url']) ? $overview['google_map_url'] : (isset($gmap) ? $gmap : '');
$nearby_places  = isset($overview['nearby_places']) && is_array($overview['nearby_places']) ? $overview['nearby_places'] : [];
$location_name  = !empty($overview['location']) ? $overview['location'] : (isset($address) ? $address : '');
?>

<!-- Breadcrumbs Section (Only shown on dedicated page) -->
<?php if (isset($show_breadcrumbs) && $show_breadcrumbs): ?>
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Location & Strategic Connectivity',
    'bc_desc' => $location_name,
    'breadcrumbs' => [
        ['name' => 'Location']
    ]
]);
?>
<?php endif; ?>

<!-- LOCATION & CONNECTIVITY SECTION (100% ADMIN DYNAMIC) -->
<?php if (!empty($google_map_url) || !empty($nearby_places) || !empty($location_name)): ?>
<section class="py-5 bg-light position-relative" id="estateLocationSection">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="text-center mb-4 max-w-800 mx-auto">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">STRATEGIC LOCATION</span>
      <h2 class="display-6 text-dark fw-bold mb-2">Location &amp; Connectivity</h2>
      <?php if (!empty($location_name)): ?>
        <p class="text-secondary fs-6 mb-0"><i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($location_name) ?></p>
      <?php endif; ?>
    </div>

    <div class="row g-4">
      
      <?php if (!empty($nearby_places)): ?>
        <!-- ROW 1: Key Destinations & Distances (Compact 2-Column Grid Layout) -->
        <div class="col-12">
          <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white border p-4">
            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
              <h4 class="fs-5 fw-bold mb-0 text-dark"><i class="bi bi-signpost-split me-2 text-warning"></i> Key Destinations &amp; Distances</h4>
              <span class="badge bg-success-subtle text-success px-3 py-1.5 rounded-pill extra-small fw-bold text-uppercase">Connected</span>
            </div>

            <!-- 2-Column Grid for Destinations (Takes less space, looks super clean) -->
            <div class="row row-cols-1 row-cols-md-2 g-3">
              <?php foreach ($nearby_places as $pl): ?>
                <div class="col">
                  <div class="card border-0 rounded-4 bg-light p-3 h-100 d-flex align-items-center justify-content-between flex-row border shadow-xs">
                    <span class="fw-semibold text-dark small d-flex align-items-center me-2">
                      <i class="bi bi-check-circle-fill text-success me-2 fs-6"></i><?= htmlspecialchars($pl['name']) ?>
                    </span>
                    <span class="badge bg-success text-white px-3 py-1.5 rounded-pill extra-small fw-bold flex-shrink-0"><?= htmlspecialchars($pl['distance']) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if (!empty($google_map_url)): ?>
        <!-- ROW 2: Interactive Location Map (Full Width Stacked Below) -->
        <div class="col-12">
          <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white border">
            <div class="card-header bg-dark text-white py-3 px-4">
              <h4 class="fs-5 fw-bold mb-0 text-white"><i class="bi bi-map me-2 text-success"></i> Interactive Location Map</h4>
            </div>
            <div class="card-body p-0">
              <div class="ratio ratio-21x9 rounded-bottom overflow-hidden min-h-350">
                <iframe 
                  src="<?= htmlspecialchars($google_map_url) ?>" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade"
                  title="Location Map"
                  class="w-100 h-100 border-0">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>

  </div>
</section>
<?php endif; ?>
