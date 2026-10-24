<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$amenities_file = FCPATH . 'assets/amenities_master.json';
$amenities = [];
if (file_exists($amenities_file)) {
    $amenities = json_decode(file_get_contents($amenities_file), true);
    if (!is_array($amenities)) $amenities = [];
}
?>

<!-- Breadcrumbs Section (Only shown on dedicated page) -->
<?php if (isset($show_breadcrumbs) && $show_breadcrumbs): ?>
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Township Amenities - Plots & Bungalows',
    'bc_desc' => 'Designed for health, recreation, wellness, and serene family living in Bagdogra, Siliguri.',
    'breadcrumbs' => [
        ['name' => 'Amenities']
    ]
]);
?>
<?php endif; ?>

<!-- LUXURY AMENITIES SECTION (100% ADMIN DYNAMIC - ZERO HARDCODED FALLBACKS) -->
<?php if (!empty($amenities)): ?>
<section class="py-5 bg-white position-relative" id="amenitiesSection">
  <div class="container py-4">
    
    <!-- Top Pill Badge Header -->
    <div class="text-center mb-2">
      <span class="badge bg-success-subtle text-success fw-bold px-4 py-2 rounded-pill text-uppercase">
        WORLD CLASS LIFESTYLE
      </span>
    </div>

    <!-- Section Main Title -->
    <h2 class="display-5 text-dark fw-bold text-center mb-2">Master Amenities</h2>
    <p class="text-secondary fs-6 text-center mb-5 max-w-600 mx-auto">
      Modern infrastructure &amp; lifestyle features designed for plot and luxury bungalow owners in <?= htmlspecialchars($addressRegion) ?>.
    </p>

    <!-- Amenities Grid -->
    <div class="row g-4 justify-content-center mb-4">
      <?php foreach ($amenities as $am): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-light text-center">
            <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mx-auto mb-3 p-3 icon-box-60">
              <i class="bi bi-check-circle-fill fs-2"></i>
            </div>
            <h3 class="fs-6 text-dark fw-bold mb-0"><?= htmlspecialchars($am['name']) ?></h3>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>
