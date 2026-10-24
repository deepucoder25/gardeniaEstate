<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php 
$this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Photo Gallery - Plots & Bungalows',
    'bc_desc' => 'Explore visual renders, aerial estate views, layout developments, and luxury bungalows for sale.',
    'breadcrumbs' => [
        ['name' => 'Gallery']
    ]
]); 
?>

<!-- DYNAMIC PHOTO GALLERY SECTION (PURELY ADMIN PANEL DATA) -->
<section class="py-5 bg-white">
    <div class="container py-3">
        
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">Visual Showcase</span>
            <h2 class="display-6 fw-bold text-dark mb-2"><?= htmlspecialchars($company3) ?> &ndash; Photo Gallery</h2>
            <p class="text-muted">Take a visual tour of our 50+ acre luxury residential plots and bungalows for sale in <?= htmlspecialchars($addressRegion) ?>.</p>
        </div>

        <div class="row g-4">
            <?php if (!empty($photos)): ?>
                <?php foreach ($photos as $photo): ?>
                    <?php 
                    $img_name = !empty($photo->image) ? $photo->image : (!empty($photo->img) ? $photo->img : (!empty($photo->file) ? $photo->file : ''));
                    if (empty($img_name)) continue;
                    
                    $img_url = (strpos($img_name, 'http') === 0) ? $img_name : base_url('assets/uploads/gallery/' . $img_name);
                    $title = !empty($photo->title) ? $photo->title : $company3;
                    $subtitle = !empty($photo->album_name) ? $photo->album_name : 'Visual Render';
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 rounded-4 shadow-sm overflow-hidden h-100">
                            <div class="ratio ratio-4x3">
                                <img src="<?= $img_url ?>" alt="<?= htmlspecialchars($title) ?> - <?= htmlspecialchars($company3) ?> Visual Showcase" class="object-fit-cover" loading="lazy">
                            </div>
                            <div class="card-body p-3">
                                <span class="badge bg-success-subtle text-success mb-2"><?= htmlspecialchars($subtitle) ?></span>
                                <h5 class="fw-bold fs-6 mb-0"><?= htmlspecialchars($title) ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5 mb-0">No gallery images uploaded yet. Upload images from the Admin Panel to display here.</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>
