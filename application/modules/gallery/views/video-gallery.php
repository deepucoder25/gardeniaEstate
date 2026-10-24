<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php
$this->load->view('about/dynamic_breadcrumbs', [
  'bc_h1' => 'Video Gallery',
  'bc_desc' => 'Explore official walkthrough videos, site tour reels, project progress, and infrastructure developments of The Gardenia Estate.',
  'breadcrumbs' => [
    ['name' => 'Video Gallery']
  ]
]);
?>

<!-- MAIN VIDEO GALLERY SECTION -->
<section class="py-5 bg-light position-relative">
  <div class="container py-2">

    <!-- Section Header -->
    <div class="text-center mb-5 max-w-800 mx-auto">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">EXCLUSIVELY FOR YOU</span>
      <h2 class="display-6 text-dark fw-bold mb-2">Project Walkthrough &amp; Video Tours</h2>
      <p class="text-secondary fs-6 mb-0">Experience the 50+ acre luxury plots &amp; bungalows township through our official video showcases, layout progress, and amenity tours.</p>
    </div>

    <!-- Video Grid -->
    <div class="row g-4 mb-5">
      <?php if (!empty($videos)): ?>
        <?php foreach ($videos as $v): ?>
          <?php
          $vurl = isset($v->video_url) ? trim($v->video_url) : '';
          if (empty($vurl)) continue;

          if (preg_match('/youtube\.com\/watch\?.*v=([^&]+)/', $vurl, $matches)) {
            $vurl = 'https://www.youtube.com/embed/' . $matches[1];
          } elseif (preg_match('/youtu\.be\/([^?]+)/', $vurl, $matches)) {
            $vurl = 'https://www.youtube.com/embed/' . $matches[1];
          }
          ?>
          <div class="col-lg-6 col-md-6">
            <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white h-100 border">
              <div class="ratio ratio-16x9 bg-dark">
                <iframe
                  src="<?= htmlspecialchars($vurl) ?>"
                  title="<?= !empty($v->title) && $v->title !== 'Video' ? htmlspecialchars($v->title) : 'The Gardenia Estate Project Video' ?>"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                  class="border-0">
                </iframe>
              </div>
              <?php if (!empty($v->title) && $v->title !== 'Video'): ?>
                <div class="card-body p-3 bg-white">
                  <h6 class="fw-bold text-dark mb-0 text-truncate"><i class="bi bi-play-circle-fill text-success me-2"></i><?= htmlspecialchars($v->title) ?></h6>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12">
          <div class="card border-0 rounded-4 shadow-sm p-5 text-center bg-white border max-w-700 mx-auto">
            <div class="bg-success-subtle text-success rounded-circle p-3.5 mx-auto mb-3 d-flex align-items-center justify-content-center icon-box-64">
              <i class="bi bi-camera-reels fs-2"></i>
            </div>
            <h4 class="fw-bold text-dark mb-2">No Videos Available</h4>
            <p class="text-secondary small mb-3">There are currently no videos uploaded in the gallery. Official project walkthrough videos added from the Admin Panel will automatically appear here.</p>
            <div>
              <button class="btn btn-success rounded-pill px-4 py-2 fw-bold small" data-bs-toggle="modal" data-bs-target="#qteModal">
                <i class="bi bi-calendar-event me-1.5"></i> Schedule Live Site Visit
              </button>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>


  </div>
</section>