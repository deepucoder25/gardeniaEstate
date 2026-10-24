<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php
// Dynamic DB Fetch directly from Admin Panel Gallery Table
$CI =& get_instance();
$CI->load->database();
$gallery_items = [];

try {
    $db_photos = $CI->db->order_by('auto_id', 'DESC')->get('gallery')->result();
    if (!empty($db_photos)) {
        foreach ($db_photos as $photo) {
            // Check status if set
            if (isset($photo->status) && $photo->status == 0) {
                continue;
            }
            
            $img_name = !empty($photo->image) ? $photo->image : (!empty($photo->img) ? $photo->img : (!empty($photo->file) ? $photo->file : ''));
            if ($img_name) {
                if (strpos($img_name, 'http') === 0) {
                    $img_url = $img_name;
                } else {
                    $img_url = base_url('assets/uploads/gallery/' . $img_name);
                }
                
                $title = !empty($photo->title) ? $photo->title : $company3;
                $subtitle = !empty($photo->album_name) ? $photo->album_name : 'Estate Gallery';
                
                $gallery_items[] = [
                    'img' => $img_url,
                    'title' => $title,
                    'subtitle' => $subtitle
                ];
            }
        }
    }
} catch (Exception $e) {
    // Silent catch
}
?>

<?php if (!empty($gallery_items)): ?>
<!-- 3D COVERFLOW GALLERY SHOWCASE SECTION (DYNAMIC ADMIN PANEL DATA ONLY) -->
<section class="gallery-preview-section py-5 position-relative overflow-hidden bg-white" id="galleryPreviewSection">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="text-center mb-4">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">Visual Showcase</span>
      <h2 class="display-6 fw-bold text-dark mb-1" id="coverflowActiveTitle"><?= htmlspecialchars($gallery_items[0]['title']) ?></h2>
      <p class="text-muted small mb-0" id="coverflowActiveSubtitle"><?= htmlspecialchars($gallery_items[0]['subtitle']) ?></p>
    </div>

    <!-- 3D Coverflow Container -->
    <div class="coverflow-stage position-relative mx-auto my-4 d-flex align-items-center justify-content-center">
      <div class="coverflow-track position-relative w-100 h-100 d-flex align-items-center justify-content-center">
        
        <?php foreach ($gallery_items as $index => $item): ?>
        <!-- Card <?= $index + 1 ?> -->
        <div class="coverflow-card position-absolute rounded-4 overflow-hidden shadow-lg cursor-pointer" 
             data-index="<?= $index ?>" 
             data-title="<?= htmlspecialchars($item['title']) ?>" 
             data-subtitle="<?= htmlspecialchars($item['subtitle']) ?>">
          <img src="<?= $item['img'] ?>" alt="<?= htmlspecialchars($item['title']) ?> - <?= htmlspecialchars($company3) ?> Gallery Showcase" class="w-100 h-100 object-fit-cover" loading="lazy">
          <div class="coverflow-overlay position-absolute bottom-0 start-0 w-100 p-3 bg-dark-gradient text-white">
            <span class="fw-bold small d-block"><?= htmlspecialchars($item['title']) ?></span>
            <span class="extra-small text-white-50"><?= htmlspecialchars($item['subtitle']) ?></span>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <?php if (count($gallery_items) > 1): ?>
    <!-- Navigation Arrow Controls -->
    <div class="d-flex align-items-center justify-content-center gap-3 mt-4 pt-2">
      <button class="btn btn-outline-success rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center coverflow-btn-prev" id="coverflowPrevBtn" aria-label="Previous Image">
        <i class="bi bi-arrow-left fs-5"></i>
      </button>
      <button class="btn btn-success text-white rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center coverflow-btn-next" id="coverflowNextBtn" aria-label="Next Image">
        <i class="bi bi-arrow-right fs-5"></i>
      </button>
    </div>
    <?php endif; ?>

    <!-- View Full Gallery CTA -->
    <div class="text-center mt-4">
      <a href="<?= site_url('gallery') ?>" class="btn btn-outline-success rounded-pill px-4 py-2.5 fw-bold shadow-sm">
        View Complete Gallery <i class="bi bi-arrow-right ms-1"></i>
      </a>
    </div>

  </div>
</section>

<!-- 3D COVERFLOW JAVASCRIPT CONTROLLER -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('#galleryPreviewSection .coverflow-card');
  const titleElem = document.getElementById('coverflowActiveTitle');
  const subtitleElem = document.getElementById('coverflowActiveSubtitle');
  const prevBtn = document.getElementById('coverflowPrevBtn');
  const nextBtn = document.getElementById('coverflowNextBtn');
  
  if (!cards.length) return;
  
  let currentIndex = 0;
  const totalCards = cards.length;

  function updateCoverflow() {
    cards.forEach((card, index) => {
      if (totalCards === 1) {
        card.classList.add('active');
        return;
      }

      // Calculate wrapped relative offset (-2, -1, 0, 1, 2, ...)
      let offset = (index - currentIndex + totalCards) % totalCards;
      if (offset > Math.floor(totalCards / 2)) {
        offset -= totalCards;
      }

      card.classList.remove('active', 'side-left', 'side-right', 'far-left', 'far-right', 'hidden-card');

      if (offset === 0) {
        card.classList.add('active');
        if (titleElem && card.dataset.title) {
          titleElem.textContent = card.dataset.title;
        }
        if (subtitleElem && card.dataset.subtitle) {
          subtitleElem.textContent = card.dataset.subtitle;
        }
      } else if (offset === -1) {
        card.classList.add('side-left');
      } else if (offset === 1) {
        card.classList.add('side-right');
      } else if (offset === -2) {
        card.classList.add('far-left');
      } else if (offset === 2) {
        card.classList.add('far-right');
      } else {
        card.classList.add('hidden-card');
      }
    });
  }

  function nextSlide() {
    if (totalCards <= 1) return;
    currentIndex = (currentIndex + 1) % totalCards;
    updateCoverflow();
  }

  function prevSlide() {
    if (totalCards <= 1) return;
    currentIndex = (currentIndex - 1 + totalCards) % totalCards;
    updateCoverflow();
  }

  if (nextBtn) nextBtn.addEventListener('click', nextSlide);
  if (prevBtn) prevBtn.addEventListener('click', prevSlide);

  cards.forEach((card, index) => {
    card.addEventListener('click', function () {
      if (currentIndex !== index) {
        currentIndex = index;
        updateCoverflow();
      }
    });
  });

  // Touch Swipe support
  let touchStartX = 0;
  const stage = document.querySelector('#galleryPreviewSection .coverflow-stage');
  if (stage) {
    stage.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    stage.addEventListener('touchend', (e) => {
      let touchEndX = e.changedTouches[0].screenX;
      if (touchEndX < touchStartX - 30) nextSlide();
      if (touchEndX > touchStartX + 30) prevSlide();
    }, { passive: true });
  }

  // Initialize
  updateCoverflow();
});
</script>
<?php endif; ?>
