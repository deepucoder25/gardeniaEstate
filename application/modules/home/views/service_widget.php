<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$offerings = [
    [
        'title_part1' => 'Residential',
        'title_part2' => 'Plots',
        'icon' => 'bi-bounding-box-circles',
        'desc' => 'Premium RERA-approved residential plots with underground utilities, wide roads, and clear legal titles ready for immediate possession and construction in Bagdogra.',
        'link' => 'plots'
    ],
    [
        'title_part1' => 'Luxury',
        'title_part2' => 'Bungalows',
        'icon' => 'bi-house-heart-fill',
        'desc' => 'Exclusive standalone bungalows and villa homes for sale featuring private lawns, elegant modern architecture, and scenic tea garden surroundings.',
        'link' => 'plots'
    ],
    [
        'title_part1' => 'Commercial',
        'title_part2' => 'Plots',
        'icon' => 'bi-briefcase-fill',
        'desc' => 'High-potential commercial plots positioned directly along the Asian Highway 2 corridor, offering outstanding frontage, connectivity, and appreciation.',
        'link' => 'plots'
    ],
    [
        'title_part1' => 'Custom Villa',
        'title_part2' => 'Plots',
        'icon' => 'bi-tree-fill',
        'desc' => 'Spacious 2400+ sq.ft custom villa plots designed for discerning buyers who desire tailor-made luxury homes in a gated 50+ acre eco-township.',
        'link' => 'plots'
    ],
];
?>

<section class="services-section py-5 bg-white">
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">OUR PROPERTY OFFERINGS</span>
            <h2 class="display-6 fw-bold text-dark mb-2">Plots &amp; Luxury Bungalows For Sale</h2>
            <p class="text-secondary small max-w-600 mx-auto">Discover prime residential and commercial land options along with bespoke bungalows in <?= htmlspecialchars($addressRegion) ?>.</p>
        </div>

        <!-- Grid of Offerings -->
        <div class="row g-4 mt-2">
            <?php foreach ($offerings as $item): ?>
                <div class="col-lg-3 col-md-6 col-12 d-flex">
                    <div class="card border-0 rounded-4 shadow-sm p-4 w-100 d-flex flex-column bg-light border text-center">
                        <div class="bg-success text-white rounded-circle p-3 mx-auto mb-3 d-flex align-items-center justify-content-center icon-box-54">
                            <i class="bi <?= $item['icon'] ?> fs-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2"><?= htmlspecialchars($item['title_part1']) ?> <?= htmlspecialchars($item['title_part2']) ?></h5>
                        <p class="small text-secondary flex-grow-1 leading-relaxed mb-3"><?= htmlspecialchars($item['desc']) ?></p>
                        <a href="<?= site_url($item['link']) ?>" class="btn btn-outline-success btn-sm rounded-pill fw-bold py-2 mt-auto">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
