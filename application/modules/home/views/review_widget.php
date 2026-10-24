<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$CI =& get_instance();
$CI->load->database();
$db_reviews = [];
try {
    $db_reviews = $CI->db->order_by('r_id', 'DESC')->get_where('reviews', ['status' => 1])->result();
} catch (Exception $e) {}
?>

<section class="reviews-section py-5">
    <!-- Background Decor Elements -->
    <div class="reviews-decor decor-top-left"></div>
    <div class="reviews-decor decor-bottom-right"></div>

    <div class="container position-relative about-z2">
        
        <!-- Header -->
        <div class="reviews-header-wrap text-center mb-4">
            
            <!-- Pill Badge -->
            <div class="reviews-badge-container d-flex align-items-center justify-content-center mb-2">
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill text-uppercase">VERIFIED TESTIMONIALS</span>
            </div>

            <!-- Title & Subtitle -->
            <h2 class="display-6 fw-bold text-dark mb-2">What Our Plot Buyers Say</h2>
            <p class="text-muted small mb-4 leading-relaxed mx-auto max-w-650">
                Read authentic stories, reviews, and site visit experiences from real estate investors and plot owners at The Gardenia Estate.
            </p>
        </div>

        <!-- Slider Section -->
        <div class="reviews-slider-container position-relative mb-4">
            
            <!-- Left Arrow Button -->
            <button class="slider-arrow prev-arrow" id="rev-prev-btn" aria-label="Previous review">
                <i class="bi bi-chevron-left"></i>
            </button>

            <!-- Slider Viewport -->
            <div class="reviews-slider-viewport">
                <div class="reviews-slider-track" id="rev-slider-track">
                    
                    <?php if (!empty($db_reviews)): ?>
                        <?php foreach ($db_reviews as $rev): 
                            $avatar_src = (!empty($rev->r_img) && file_exists(FCPATH . $rev->r_img))
                                ? base_url($rev->r_img) 
                                : base_url('assets/images/slider/gardenia_hero.webp');
                            $city_label = !empty($rev->city) ? $rev->city : 'Siliguri';
                            $title_label = !empty($rev->r_title) ? $rev->r_title : 'Verified Buyer';
                            $stars = isset($rev->stars) ? intval($rev->stars) : 5;
                        ?>
                        <!-- Dynamic Card -->
                        <div class="review-card">
                            <!-- Top quote decoration -->
                            <span class="quote-decor top-quote"><i class="bi bi-quote"></i></span>
                            
                            <!-- Stars -->
                            <div class="review-stars mb-3">
                                <?php for($i=0; $i<$stars; $i++): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php endfor; ?>
                            </div>

                            <!-- User Profile Info -->
                            <div class="review-user-row d-flex align-items-center mb-3 gap-3">
                                <img src="<?= $avatar_src ?>" 
                                     alt="<?= htmlspecialchars($rev->name) ?> - Verified Plot Buyer Reviewer" 
                                     class="review-avatar img-fluid rounded-circle object-fit-cover icon-box-54"
                                     loading="lazy">
                                <div class="review-user-details">
                                    <h3 class="review-username fs-6 fw-bold text-dark mb-0">
                                        <?= htmlspecialchars($rev->name) ?> <i class="bi bi-patch-check-fill text-success ms-1"></i>
                                    </h3>
                                    <span class="review-location extra-small text-muted">
                                        <i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($city_label) ?> &bull; <?= htmlspecialchars($title_label) ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Content -->
                            <p class="review-text text-secondary small leading-relaxed">
                                "<?= htmlspecialchars($rev->r_desc) ?>"
                            </p>

                            <!-- Bottom quote decoration -->
                            <span class="quote-decor bottom-quote"><i class="bi bi-quote"></i></span>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>

            <!-- Right Arrow Button -->
            <button class="slider-arrow next-arrow" id="rev-next-btn" aria-label="Next review">
                <i class="bi bi-chevron-right"></i>
            </button>

        </div>

        <!-- Bottom Trust/Rating Bar -->
        <div class="reviews-trust-bar mx-auto">
            <div class="row align-items-center g-3 text-center text-md-start">
                
                <!-- Stat 1 -->
                <div class="col-lg-3 col-md-6 col-6 d-flex justify-content-center justify-content-md-start">
                    <div class="trust-stat-item d-flex align-items-center">
                        <div class="trust-icon-box box-star shadow-sm">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="trust-text-box">
                            <h4 class="trust-value">4.9/5</h4>
                            <span class="trust-label">Average Rating</span>
                        </div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="col-lg-3 col-md-6 col-6 d-flex justify-content-center justify-content-md-start">
                    <div class="trust-stat-item d-flex align-items-center">
                        <div class="trust-icon-box box-users shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div class="trust-text-box">
                            <h4 class="trust-value">10,000+</h4>
                            <span class="trust-label">Hiappy Customers</span>
                        </div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="col-lg-3 col-md-6 col-6 d-flex justify-content-center justify-content-md-start">
                    <div class="trust-stat-item d-flex align-items-center">
                        <div class="trust-icon-box box-shield shadow-sm">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                        <div class="trust-text-box">
                            <h4 class="trust-value">100%</h4>
                            <span class="trust-label">Veritied-Reviews.</span>
                        </div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="col-lg-3 col-md-6 col-6 d-flex justify-content-center justify-content-md-start">
                    <div class="trust-stat-item d-flex align-items-center">
                        <div class="trust-icon-box box-recommend shadow-sm">
                            <i class="bi bi-chat-right-quote-fill"></i>
                        </div>
                        <div class="trust-text-box">
                            <h4 class="trust-value">98%</h4>
                            <span class="trust-label">Woud Recomand Us</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Inline JavaScript for Touch & Click Slide Actions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('rev-slider-track');
    const prevBtn = document.getElementById('rev-prev-btn');
    const nextBtn = document.getElementById('rev-next-btn');
    let currentIndex = 0;
    const cardCount = track.children.length;
    
    function updateSlider(index) {
        if (index < 0) index = 0;
        if (index >= cardCount) index = cardCount - 1;
        
        currentIndex = index;
        
        // Calculate sliding position based on dynamic element widths
        const cardWidth = track.children[0].offsetWidth;
        const gap = 20; // Matches grid gap
        track.style.transform = `translateX(-${currentIndex * (cardWidth + gap)}px)`;
        
        // Arrow opacities
        prevBtn.style.opacity = currentIndex === 0 ? '0.35' : '1';
        nextBtn.style.opacity = currentIndex === cardCount - 1 ? '0.35' : '1';
    }
    
    if (prevBtn && nextBtn && track) {
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) updateSlider(currentIndex - 1);
        });
        
        nextBtn.addEventListener('click', () => {
            if (currentIndex < cardCount - 1) updateSlider(currentIndex + 1);
        });
        
        // Reset translation on window resizing for desktop static display
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 992) {
                track.style.transform = 'none';
            } else {
                updateSlider(currentIndex);
            }
        });
        
        // Initialize
        if (window.innerWidth < 992) {
            updateSlider(0);
        }
    }
});
</script>
