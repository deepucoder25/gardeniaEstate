<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Client Testimonials',
    'bc_desc' => "Discover what our plot buyers and investors say about their experience with The Gardenia Estate.",
    'breadcrumbs' => [
        ['name' => 'Testimonials']
    ]
]);
?>

<!-- DEDICATED TESTIMONIALS SECTION -->
<section class="py-5 bg-light position-relative">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="text-center mb-5 max-w-800 mx-auto">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">CLIENT TESTIMONIALS</span>
      <h2 class="display-6 fw-bold text-dark mb-2">What Our Plot Buyers Say</h2>
      <p class="text-secondary fs-6 mb-0">Read authentic stories and experiences from plot owners, villa builders, and real estate investors at The Gardenia Estate.</p>
    </div>

    <!-- Testimonial Cards Grid (6 Cards Per Page, 2 Columns on Desktop, 1 on Mobile) -->
    <div class="row g-4 mb-4">
      <?php if (!empty($testimonials)): ?>
        <?php foreach ($testimonials as $t): ?>
          <div class="col-12 col-md-6">
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 h-100 d-flex flex-column justify-content-between">
              <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                  <div class="text-warning fs-6">
                    <?php for ($i = 0; $i < $t['stars']; $i++): ?>
                      <i class="bi bi-star-fill"></i>
                    <?php endfor; ?>
                  </div>
                  <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1 extra-small fw-bold">Verified Buyer</span>
                </div>
                <p class="text-secondary leading-relaxed mb-4">
                  &ldquo;<?= htmlspecialchars($t['desc']) ?>&rdquo;
                </p>
              </div>
              <div class="d-flex align-items-center gap-3 border-top pt-3">
                <div class="<?= !empty($t['bg']) ? $t['bg'] : 'bg-success' ?> text-white rounded-circle d-flex align-items-center justify-content-center fw-bold fs-6 flex-shrink-0 icon-box-44">
                  <?= htmlspecialchars($t['initials']) ?>
                </div>
                <div>
                  <h5 class="fs-6 fw-bold text-dark mb-0"><?= htmlspecialchars($t['name']) ?></h5>
                  <div class="extra-small text-muted"><i class="bi bi-geo-alt-fill me-1 text-success"></i> <?= htmlspecialchars($t['city']) ?> &bull; <?= htmlspecialchars($t['plot']) ?></div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Pagination Controls (After 6 Cards) -->
    <?php if (isset($total_pages) && $total_pages > 1): ?>
      <nav aria-label="Testimonials Pagination" class="pt-3">
        <ul class="pagination justify-content-center gap-2">
          <!-- Previous Button -->
          <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link rounded-circle d-flex align-items-center justify-content-center border <?= ($current_page <= 1) ? 'bg-light text-muted' : 'text-success bg-white shadow-sm' ?> icon-box-40" href="<?= site_url('testimonials') ?>?page=<?= max(1, $current_page - 1) ?>" aria-label="Previous">&laquo;</a>
          </li>

          <!-- Page Number Buttons -->
          <?php for ($p = 1; $p <= $total_pages; $p++): ?>
            <li class="page-item <?= ($p == $current_page) ? 'active' : '' ?>">
              <a class="page-link rounded-circle d-flex align-items-center justify-content-center <?= ($p == $current_page) ? 'bg-success border-success text-white' : 'text-success bg-white border shadow-sm' ?> icon-box-40" href="<?= site_url('testimonials') ?>?page=<?= $p ?>"><?= $p ?></a>
            </li>
          <?php endfor; ?>

          <!-- Next Button -->
          <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
            <a class="page-link rounded-circle d-flex align-items-center justify-content-center border <?= ($current_page >= $total_pages) ? 'bg-light text-muted' : 'text-success bg-white shadow-sm' ?> icon-box-40" href="<?= site_url('testimonials') ?>?page=<?= min($total_pages, $current_page + 1) ?>" aria-label="Next">&raquo;</a>
          </li>
        </ul>
      </nav>
    <?php endif; ?>

  </div>
</section>