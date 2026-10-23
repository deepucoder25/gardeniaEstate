<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main class="main">
    <!-- Breadcrumbs Section -->
    <?php 
    $this->load->view('about/dynamic_breadcrumbs', [
        'bc_current' => 'Blog Details',
        'bc_title_white' => 'Blog',
        'bc_title_orange' => 'Article',
        'bc_desc' => ''
    ]); 
    ?>

    <!-- Blog Single Post Details -->
    <section class="blog-details-section py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    <article class="bg-white p-4 p-md-5 rounded-4 shadow-sm blog-article-box">
                        
                        <!-- Post Meta Header Bar (Badges removed) -->
                        <div class="mb-4">
                            <h1 class="fw-bold text-dark display-6 mb-3 lh-sm blog-article-title">
                                <?= htmlspecialchars(@$query[0]->title) ?>
                            </h1>

                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 pt-3 border-top border-bottom py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="bg-success-subtle text-success rounded-circle p-2 d-flex align-items-center justify-content-center icon-box-44">
                                        <i class="bi bi-person-fill fs-5"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark small mb-0"><?= htmlspecialchars(@$query[0]->author ?? 'Anil Kumar Rauniyar') ?></div>
                                        <div class="extra-small text-muted">Managing Director &amp; RERA Agent</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-3 text-muted small">
                                    <span class="d-flex align-items-center gap-1.5"><i class="bi bi-calendar-event text-success"></i> <?= date('M d, Y', strtotime(@$query[0]->created_at ?? date('Y-m-d'))) ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Featured Banner Image Card -->
                        <div class="mb-4 rounded-4 overflow-hidden shadow-sm position-relative">
                            <?php 
                            $img_name = @$query[0]->image;
                            $image_path1 = FCPATH . 'uploads/blogs/' . $img_name;
                            $image_path2 = FCPATH . 'assets/uploads/blog/' . $img_name;
                            if (!empty($img_name) && file_exists($image_path1)): ?>
                                <img src="<?= base_url('uploads/blogs/' . $img_name) ?>" alt="<?= htmlspecialchars(@$query[0]->title) ?> - Featured Blog Image The Gardenia Estate" class="img-fluid w-100 blog-details-img rounded-4 max-h-440 object-fit-cover" loading="lazy">
                            <?php else: ?>
                                <img src="<?= base_url('assets/uploads/blog/' . $img_name) ?>" alt="<?= htmlspecialchars(@$query[0]->title) ?> - Featured Blog Image The Gardenia Estate" class="img-fluid w-100 blog-details-img rounded-4 max-h-440 object-fit-cover" loading="lazy" onerror="this.src='<?= base_url('assets/images/slider/gardenia_hero.webp') ?>'">
                            <?php endif; ?>
                        </div>

                        <!-- Key Takeaways Highlight Box -->
                        <div class="card bg-success-subtle border-0 rounded-4 p-4 mb-4">
                            <div class="d-flex align-items-start gap-3">
                                <div class="bg-success text-white rounded-circle p-2.5 d-flex align-items-center justify-content-center flex-shrink-0 icon-box-40">
                                    <i class="bi bi-lightbulb-fill fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-success mb-1 text-uppercase tracking-wide">Key Takeaway Summary</h6>
                                    <p class="small text-dark mb-0 leading-relaxed">
                                        Investing in residential plots along the Devanahalli STRR corridor provides long-term capital appreciation, complete architectural design freedom, clear legal Khata titles, and proximity to Kempegowda International Airport.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Article Content Body -->
                        <div class="blog-content-wrapper text-secondary leading-relaxed fs-6 mb-5">
                            <?= nl2br(@$query[0]->content ?? @$query[0]->description) ?>
                        </div>

                        <!-- Styled Blockquote Accent -->
                        <blockquote class="p-4 bg-light border-start border-4 border-success rounded-3 mb-5 position-relative">
                            <i class="bi bi-quote fs-1 text-success-subtle position-absolute top-0 end-0 me-3 mt-1"></i>
                            <p class="fst-italic text-dark mb-2 fw-medium">
                                "Land is the only asset class that never depreciates. Choosing a RERA-approved plotted development ensures both security of capital and maximum return on investment."
                            </p>
                            <footer class="blockquote-footer text-success fw-bold mb-0">Anil Kumar Rauniyar</footer>
                        </blockquote>

                        <!-- Colorful Social Share Strip (Desktop 4-in-1-Row, Mobile 2-in-1-Row) -->
                        <div class="p-3 p-md-4 rounded-4 bg-light border mb-5">
                            <div class="row g-2 align-items-center">
                                <div class="col-12 mb-1">
                                    <span class="fw-bold text-dark d-flex align-items-center gap-2 small">
                                        <i class="bi bi-share-fill text-success fs-6"></i> Share this Article:
                                    </span>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>" target="_blank" class="btn btn-sm text-white px-2 py-2 gap-2 rounded-pill fw-bold share-fb d-flex align-items-center justify-content-center w-100 text-nowrap extra-small" title="Share on Facebook">
                                        <i class="bi bi-facebook  me-1.5"></i> Facebook
                                    </a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="https://api.whatsapp.com/send?text=<?= urlencode(@$query[0]->title . ' ' . current_url()) ?>" target="_blank" class="btn btn-sm text-white px-2 py-2 rounded-pill fw-bold share-wa d-flex align-items-center  gap-2 justify-content-center w-100 text-nowrap extra-small" title="Share on WhatsApp">
                                        <i class="bi bi-whatsapp me-1.5"></i> WhatsApp
                                    </a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode(@$query[0]->title) ?>" target="_blank" class="btn btn-sm text-white px-2 py-2 rounded-pill fw-bold share-tw d-flex  gap-2 align-items-center justify-content-center w-100 text-nowrap extra-small" title="Share on Twitter">
                                        <i class="bi bi-twitter-x me-1.5"></i> X / Twitter
                                    </a>
                                </div>
                                <div class="col-6 col-md-3">
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode(current_url()) ?>" target="_blank" class="btn btn-sm text-white px-2 py-2 rounded-pill fw-bold share-in d-flex align-items-center gap-2  justify-content-center w-100 text-nowrap extra-small" title="Share on LinkedIn">
                                        <i class="bi bi-linkedin me-1.5"></i> LinkedIn
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Author Profile Box (Fixed Text Overflow on Mobile) -->
                        <div class="card border-0 rounded-4 p-3 p-md-4 bg-success-subtle mb-4 overflow-hidden">
                            <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3 gap-md-4">
                                <div class="bg-success text-white rounded-circle p-2.5 d-flex align-items-center justify-content-center flex-shrink-0 icon-box-54">
                                    <i class="bi bi-person-badge fs-3"></i>
                                </div>
                                <div class="min-w-0 flex-grow-1 text-break">
                                    <h6 class="fw-bold text-dark mb-1">Written by Anil Kumar Rauniyar</h6>
                                    <p class="extra-small text-muted mb-2 text-break">RERA Registered Real Estate Consultant | Reg No: PRM/KA/RERA/1251/310/AG/170819/000018</p>
                                    <p class="small text-secondary mb-0">Specializing in premium villa plot communities and land development investments across North Bengaluru.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Navigation Buttons (Mobile Optimized) -->
                        <div class="d-flex flex-column flex-sm-row align-items-stretch align-items-sm-center justify-content-between gap-2.5 border-top pt-4">
                            <a href="<?= site_url('blogs') ?>" class="btn btn-outline-success rounded-pill px-3 px-md-4 py-2 fw-bold small text-center text-nowrap mb-1 mb-sm-0">
                                <i class="bi bi-arrow-left me-1.5"></i> Back to All Blogs
                            </a>
                           
                        </div>

                    </article>
                </div>

                <!-- Sidebar Column (Search Widget Removed) -->
                <div class="col-lg-4">
                    <aside class="blog-sidebar sticky-top blog-sidebar-sticky">

                        <!-- Recent Posts Widget -->
                        <div class="bg-white p-4 rounded-4 shadow-sm mb-4">
                            <h6 class="fw-bold text-dark mb-4 pb-2 border-bottom text-uppercase tracking-wide d-flex align-items-center justify-content-between">
                                <span><i class="bi bi-clock-history text-success me-2"></i>Recent Posts</span>
                                <span class="badge bg-success-subtle text-success extra-small">Top Picks</span>
                            </h6>
                            <div class="recent-posts-list d-flex flex-column gap-3">
                                <?php if (!empty($recent_posts)): ?>
                                    <?php foreach ($recent_posts as $post_arr): $post = (object)$post_arr; ?>
                                        <?php
                                        $image_file = $post->image;
                                        $full_path = FCPATH . 'uploads/blogs/' . $image_file;
                                        $imagePath = ($image_file && file_exists($full_path)) ? base_url('uploads/blogs/' . $image_file) : base_url('assets/images/slider/gardenia_hero.webp');
                                        $custom_slug = !empty($post->slug) ? $post->slug : rtrim(str_replace("--", "-", urlencode(str_replace(" ", "-", str_replace(",", " ", $post->title)))), "-");
                                        ?>
                                        <a href="<?= site_url('blogs/'.$custom_slug) ?>" class="d-flex align-items-center gap-3 text-decoration-none post-link-item p-2 rounded-3">
                                            <div class="flex-shrink-0 overflow-hidden rounded-3">
                                                <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($post->title) ?> Article Thumbnail" class="rounded-3 shadow-xs recent-post-thumb icon-box-65 object-fit-cover" loading="lazy">
                                            </div>
                                            <div>
                                                <h6 class="fw-bold text-dark mb-1 fs-6 lh-sm recent-title-text"><?= htmlspecialchars($post->title) ?></h6>
                                                <small class="text-muted extra-small"><i class="bi bi-calendar3 text-warning me-1"></i> <?= date('M d, Y', strtotime($post->created_at ?? date('Y-m-d'))) ?></small>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-muted small">No recent posts available.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Sticky Instant Quote Call-to-Action Card -->
                        <div class="card border-0 rounded-4 shadow-sm p-4 text-center bg-white border-top border-4 border-success mb-4">
                            <div class="bg-success-subtle text-success rounded-circle p-3 mx-auto mb-3 d-flex align-items-center justify-content-center icon-box-58">
                                <i class="bi bi-headset fs-3"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">Interested in Gardenia Plots?</h5>
                            <p class="text-muted small mb-4 leading-relaxed">
                                Get layout pricing, brochure, and instant site visit booking details straight from our sales team.
                            </p>
                            <button class="btn btn-success w-100 rounded-pill py-2.5 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#qteModal">
                                <i class="bi bi-file-earmark-text-fill"></i> Get Instant Quote
                            </button>
                        </div>

                        <!-- RERA Compliance Card -->
                        <div class="card border-0 rounded-4 shadow-sm p-3 bg-light text-center">
                            <div class="d-flex align-items-center justify-content-center gap-2 mb-2">
                                <i class="bi bi-shield-check text-success fs-4"></i>
                                <span class="fw-bold text-dark small">RERA Certified Compliance</span>
                            </div>
                            <p class="extra-small text-muted mb-0">
                                Registration No: PRM/KA/RERA/1251/310/AG/170819/000018. 100% legal title assurance.
                            </p>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </section>
</main>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?= addslashes(@$query[0]->title) ?>",
    "image": [
        "<?= @$query[0]->image ? base_url('uploads/blogs/' . @$query[0]->image) : base_url('assets/images/slider/gardenia_hero.webp') ?>"
    ],
    "datePublished": "<?= date('c', strtotime(@$query[0]->created_at)) ?>",
    "author": {
        "@type": "Person",
        "name": "<?= addslashes(@$query[0]->author ?? 'Anil Kumar Rauniyar') ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "<?= isset($company3) ? $company3 : 'The Gardenia Estate' ?>",
        "logo": {
            "@type": "ImageObject",
            "url": "<?= base_url('assets/images/logo/logo.webp') ?>"
        }
    },
    "description": "<?= addslashes(substr(strip_tags(@$query[0]->description), 0, 160)) ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?= current_url() ?>"
    }
}
</script>