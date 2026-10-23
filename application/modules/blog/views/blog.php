<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed'); ?>

<main class="main">
    <!-- Breadcrumbs Section -->
    <!-- Breadcrumbs Section -->
    <?php $this->load->view('about/dynamic_breadcrumbs', [
        'bc_h1' => 'Blog',
        'bc_desc' => '',
        'breadcrumbs' => [
            ['name' => 'Blog']
        ]
    ]);
    ?>

    <section class="blog-section py-5 bg-light">
        <div class="container">
            <!-- Section Heading -->
            <div class="text-center mb-5">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">
                    <i class="bi bi-journal-richtext me-1"></i> OUR BLOG
                </span>
                <h2 class="display-6 fw-bold text-dark mb-2">
                    Latest Real Estate <span class="text-success">Articles &amp; News</span>
                </h2>
                <p class="text-secondary fs-6 mb-0 mx-auto max-w-650">
                    Stay updated with our latest real estate market trends, plot investment guides, and township developments.
                </p>
            </div>

            <div class="row g-4">
                <?php
                $schemaData = [];
                
                if (!empty($blogs)):
                    foreach ($blogs as $b_arr):
                        $b = (object) $b_arr;
                        $custom_slug = !empty($b->slug) ? $b->slug : rtrim(str_replace("--", "-", urlencode(str_replace(" ", "-", str_replace(",", " ", $b->title)))), "-");
                        $link = site_url('blogs/' . $custom_slug);

                        $image_path1 = FCPATH . 'uploads/blogs/' . $b->image;
                        $image_path2 = FCPATH . 'assets/uploads/blog/' . $b->image;
                        if (!empty($b->image) && file_exists($image_path1)) {
                            $img = base_url("uploads/blogs/{$b->image}");
                        } else if (!empty($b->image) && file_exists($image_path2)) {
                            $img = base_url("assets/uploads/blog/{$b->image}");
                        } else {
                            $img = base_url('assets/images/slider/gardenia_hero.webp');
                        }

                        // Handle date parsing
                        $created_at = isset($b->created_at) ? $b->created_at : date('Y-m-d H:i:s');
                        $day = date('d', strtotime($created_at));
                        $month = date('M', strtotime($created_at));
                        $author = !empty($b->author) ? $b->author : 'Anil Kumar Rauniyar';

                        $schemaData[] = [
                            "@context" => "https://schema.org",
                            "@type" => "BlogPosting",
                            "headline" => $b->title,
                            "image" => $img,
                            "datePublished" => $created_at,
                            "author" => [
                                "@type" => "Person",
                                "name" => $author
                            ],
                            "publisher" => [
                                "@type" => "Organization",
                                "name" => isset($company3) ? $company3 : 'The Gardenia Estate',
                                "logo" => [
                                    "@type" => "ImageObject",
                                    "url" => base_url('assets/images/logo/logo.webp')
                                ]
                            ],
                            "description" => substr(strip_tags($b->description), 0, 160) . '...'
                        ];
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden blog-card">
                                <div class="position-relative overflow-hidden">
                                    <a href="<?= $link ?>" class="d-block text-decoration-none">
                                        <img src="<?= $img ?>" class="card-img-top blog-card-img" alt="<?= htmlspecialchars($b->title) ?> - Real Estate Article The Gardenia Estate" loading="lazy">
                                    </a>
                                    <span class="position-absolute top-0 end-0 bg-warning text-dark fw-bold px-3 py-1.5 rounded-bottom-start shadow-sm extra-small">
                                        <i class="bi bi-calendar3 me-1"></i><?= $day ?> <?= $month ?>
                                    </span>
                                    <span class="position-absolute bottom-0 start-0 bg-success text-white fw-bold px-3 py-1 rounded-top-end extra-small">
                                        <i class="bi bi-tag-fill me-1"></i>Real Estate
                                    </span>
                                </div>
                                <div class="card-body p-4 d-flex flex-column bg-white">
                                    <div class="d-flex align-items-center gap-3 mb-2 text-muted extra-small">
                                        <span class="d-flex align-items-center gap-1"><i class="bi bi-person-circle text-success"></i> <?= htmlspecialchars($author) ?></span>
                                        <span class="d-flex align-items-center gap-1"><i class="bi bi-patch-check-fill text-primary"></i> Verified</span>
                                    </div>
                                    <h5 class="card-title fw-bold mb-3 lh-sm fs-5">
                                        <a href="<?= $link ?>" class="text-dark text-decoration-none blog-title-link"><?= htmlspecialchars($b->title) ?></a>
                                    </h5>
                                    <p class="card-text text-muted small mb-4 flex-grow-1 leading-relaxed">
                                        <?= substr(strip_tags($b->description), 0, 120) ?>...
                                    </p>
                                    <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                                        <a href="<?= $link ?>" class="btn btn-sm btn-outline-success px-3.5 py-1.5 rounded-pill fw-bold blog-read-btn">
                                            Read More <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                        <span class="extra-small text-muted"><i class="bi bi-clock me-1"></i>3 min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <div class="p-5 bg-white rounded-4 shadow-sm text-muted">
                            <i class="bi bi-journal-x fs-1 text-secondary mb-3 d-block"></i>
                            <h5>No blogs published yet.</h5>
                            <p class="mb-0 small text-muted">Check back soon for new real estate news and guides!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Pagination (3 Cards per page) -->
            <div class="row mt-5">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <?= $this->pagination->create_links(); ?>
                    <span class="extra-small text-muted fw-medium mt-1">Showing 3 articles per page</span>
                </div>
            </div>
        </div>
    </section>
</main>


<script type="application/ld+json">
<?= json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>