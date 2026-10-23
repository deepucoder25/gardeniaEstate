<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Build Schema.org JSON-LD for Breadcrumbs
$schema_items = [];
$schema_items[] = [
    '@type' => 'ListItem',
    'position' => 1,
    'name' => 'Home',
    'item' => site_url()
];

$position = 2;
if (isset($breadcrumbs) && is_array($breadcrumbs) && !empty($breadcrumbs)) {
    foreach ($breadcrumbs as $crumb) {
        $name = isset($crumb['name']) ? $crumb['name'] : (isset($crumb['title']) ? $crumb['title'] : '');
        $url = (isset($crumb['url']) && !empty($crumb['url']) && $crumb['url'] !== 'javascript:void(0)') ? $crumb['url'] : null;

        $item = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $name
        ];
        if ($url) {
            $item['item'] = $url;
        }
        $schema_items[] = $item;
        $position++;
    }
} else if (isset($bc_current) && !empty($bc_current)) {
    $schema_items[] = [
        '@type' => 'ListItem',
        'position' => $position,
        'name' => $bc_current
    ];
}

$schema_json = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $schema_items
];
?>

<script type="application/ld+json">
<?= json_encode($schema_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>

<!-- Clean Centered Breadcrumb Hero Banner (Bootstrap 5) -->
<section class="breadcrumb-bg position-relative overflow-hidden py-4 py-lg-5 text-white border-bottom border-warning border-3 shadow text-center">
    <div class="container position-relative z-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                
                <h1 class="display-6 fw-bold mb-3 text-white text-capitalize">
                    <?= isset($bc_h1) && !empty($bc_h1) ? $bc_h1 : (isset($bc_current) ? $bc_current : 'Gardenia Estate') ?>
                </h1>

                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb mb-0 bg-dark bg-opacity-75 px-4 py-2 rounded-pill d-inline-flex align-items-center border border-warning border-opacity-50 shadow-sm">
                        <li class="breadcrumb-item">
                            <a href="<?= site_url() ?>" class="link-light text-decoration-none fw-medium d-inline-flex align-items-center me-1">
                                <i class="bi bi-house-door-fill text-warning me-1"></i> Home
                            </a>
                        </li>
                        <?php if (isset($breadcrumbs) && is_array($breadcrumbs) && !empty($breadcrumbs)): ?>
                            <?php foreach ($breadcrumbs as $crumb): ?>
                                <?php
                                $name = isset($crumb['name']) ? $crumb['name'] : (isset($crumb['title']) ? $crumb['title'] : '');
                                $url = (isset($crumb['url']) && !empty($crumb['url']) && $crumb['url'] !== 'javascript:void(0)') ? $crumb['url'] : null;
                                ?>
                                <?php if ($url): ?>
                                    <li class="breadcrumb-item">
                                        <a href="<?= $url ?>" class="link-light text-decoration-none fw-medium me-1"><?= $name ?></a>
                                    </li>
                                <?php else: ?>
                                    <li class="breadcrumb-item active text-warning fw-bold" aria-current="page"><?= $name ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php elseif (isset($bc_current) && !empty($bc_current)): ?>
                            <li class="breadcrumb-item active text-warning fw-bold" aria-current="page"><?= $bc_current ?></li>
                        <?php endif; ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>