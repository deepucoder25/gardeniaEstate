<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$plots_file = FCPATH . 'assets/plots_master.json';
$plots = [];
if (file_exists($plots_file)) {
    $plots = json_decode(file_get_contents($plots_file), true);
    if (!is_array($plots)) $plots = [];
}

// Dynamically extract active cities/locations from plots_master.json
$active_cities = [];
if (!empty($plots)) {
    foreach ($plots as $p) {
        if (isset($p['status']) && strtolower($p['status']) === 'inactive') continue;
        
        $addr = isset($p['address']) ? $p['address'] : '';
        if (!empty($addr)) {
            $parts = explode(',', $addr);
            foreach ($parts as $part) {
                $city = trim($part);
                if (!empty($city) && strlen($city) > 2) {
                    if (!in_array($city, $active_cities)) {
                        $active_cities[] = $city;
                    }
                }
            }
        }
    }
}
?>

<?php if (!empty($active_cities)): ?>
<!-- CITIES WHERE WE HAVE PLOTS (100% DYNAMIC FROM ADMIN PLOTS DATA) -->
<section class="py-5 bg-light border-top border-bottom" id="citiesSection">
  <div class="container py-3">
    <div class="text-center mb-4">
      <h2 class="fs-3 fw-bold text-dark mb-2">Cities Where We Have Plots</h2>
      <p class="text-secondary small max-w-600 mx-auto">
        Explore active plot locations configured live in the admin panel.
      </p>
    </div>

    <div class="row g-3 justify-content-center">
      <?php foreach ($active_cities as $c_name): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card border-0 rounded-4 shadow-sm p-3 bg-white text-center h-100">
            <a href="<?= site_url() ?>#plotsPricingSection" class="text-decoration-none text-dark fw-bold d-flex align-items-center justify-content-center gap-2">
              <i class="bi bi-geo-alt-fill text-danger fs-6"></i>
              <span><?= htmlspecialchars($c_name) ?></span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
