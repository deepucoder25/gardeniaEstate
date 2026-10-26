<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$new_projects = get_newly_launched_projects(true); // Active projects only
$CI =& get_instance();
$controller_phone = !empty($CI->comp['phone']) ? $CI->comp['phone'] : (!empty($phone) ? $phone : '+91 91080 34519');
?>

<?php if (!empty($new_projects)): ?>
<!-- ============================================================
     NEWLY LAUNCHED PROJECTS - SINGLE ROW SLIDER CAROUSEL
     ============================================================ -->
<style>
.nl-portal-section {
    background: #F8FAFC;
    position: relative;
    padding-top: 4.5rem;
    padding-bottom: 5rem;
}

/* Slider Track & Wrapper */
.nl-slider-container {
    position: relative;
    width: 100%;
    padding: 10px 0 0 0;
}

.nl-slider-track {
    display: flex;
    flex-wrap: nowrap;
    gap: 24px;
    overflow-x: auto;
    scroll-behavior: smooth;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */
    padding: 12px 6px 18px 6px;
    cursor: grab;
}

.nl-slider-track::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

.nl-slider-track.is-dragging {
    cursor: grabbing;
    user-select: none;
    scroll-behavior: auto;
}

/* Slide Cards: EXACTLY ONE ROW */
.nl-slide-card {
    flex: 0 0 calc(50% - 12px);
    width: calc(50% - 12px);
    max-width: calc(50% - 12px);
    scroll-snap-align: start;
    display: flex;
    flex-direction: column;
}

@media (max-width: 991px) {
    .nl-slide-card {
        flex: 0 0 calc(100% - 6px);
        width: calc(100% - 6px);
        max-width: calc(100% - 6px);
    }
}

/* If only 1 card exists */
.nl-slider-track.single-card .nl-slide-card {
    flex: 0 0 100%;
    max-width: 620px;
    margin: 0 auto;
}

/* Card Container */
.portal-card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #E2E8F0;
    box-shadow: 0 2px 10px rgba(15, 23, 42, 0.05);
    padding: 22px 20px 16px 20px;
    position: relative;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

.portal-card:hover {
    border-color: #CBD5E1;
    box-shadow: 0 10px 25px -4px rgba(15, 23, 42, 0.1);
    transform: translateY(-3px);
}

/* Top Notched Ribbon */
.portal-ribbon {
    position: absolute;
    top: 0;
    left: 0;
    background: #FEF3C7;
    color: #92400E;
    font-size: 10.5px;
    font-weight: 800;
    letter-spacing: 0.6px;
    text-transform: uppercase;
    padding: 3px 14px 3px 12px;
    border-bottom-right-radius: 3px;
    clip-path: polygon(0 0, 100% 0, calc(100% - 7px) 50%, 100% 100%, 0 100%);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
    z-index: 2;
}

/* Main Top Row: Left Square Thumbnail + Right Details */
.portal-main-row {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    margin-top: 10px;
}

/* Square Thumbnail with RERA Badge */
.portal-thumb-box {
    position: relative;
    width: 130px;
    height: 110px;
    flex-shrink: 0;
}

.portal-thumb-img {
    width: 130px;
    height: 110px;
    border-radius: 10px;
    object-fit: cover;
    border: 1px solid #E2E8F0;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    background: #E2E8F0;
    display: block;
}

.portal-rera-pill {
    position: absolute;
    bottom: 6px;
    left: 6px;
    background: rgba(15, 23, 42, 0.92);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    color: #38BDF8;
    font-size: 9.5px;
    font-weight: 800;
    padding: 2.5px 7px;
    border-radius: 5px;
    display: inline-flex;
    align-items: center;
    gap: 3px;
    letter-spacing: 0.4px;
    white-space: nowrap;
    border: 1px solid rgba(56, 189, 248, 0.35);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    line-height: 1.2;
}

.portal-rera-pill i {
    color: #38BDF8;
    font-size: 9.5px;
}

@media (max-width: 576px) {
    .portal-thumb-box, .portal-thumb-img {
        width: 110px;
        height: 95px;
    }
}

/* Right Content Info */
.portal-info-col {
    flex: 1;
    min-width: 0;
}

.portal-title {
    font-size: 17px;
    font-weight: 800;
    color: #111827;
    margin: 0 0 2px 0;
    line-height: 1.3;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    letter-spacing: -0.01em;
}

.portal-location {
    font-size: 13px;
    color: #4B5563;
    margin: 0 0 6px 0;
    line-height: 1.35;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 500;
}

.portal-price-row {
    font-size: 13.5px;
    margin-bottom: 4px;
    line-height: 1.3;
    display: flex;
    align-items: baseline;
    flex-wrap: wrap;
    gap: 6px;
}

.portal-price {
    font-weight: 800;
    color: #111827;
    font-size: 14.5px;
}

.portal-pipe {
    color: #D1D5DB;
    font-weight: 300;
    font-size: 13px;
}

.portal-sizes {
    color: #4B5563;
    font-size: 12.5px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.portal-trend-text {
    font-size: 12px;
    font-weight: 600;
    color: #059669;
    margin: 0;
    line-height: 1.35;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: flex;
    align-items: center;
    gap: 4px;
}

.portal-trend-text i {
    font-size: 12px;
    flex-shrink: 0;
}

/* Dotted Divider */
.portal-dashed-divider {
    border-top: 1px dashed #E2E8F0;
    margin: 16px -20px 14px -20px;
}

/* Bottom Action Row */
.portal-bottom-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.portal-left-offer {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    line-height: 1.25;
    min-width: 0;
}

.portal-tag-icon {
    color: #0284C7;
    font-size: 13px;
    flex-shrink: 0;
}

.portal-offer-text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Direct Call Phone Action Button */
.btn-portal-action {
    background: #0066CC;
    color: #ffffff !important;
    font-size: 13px;
    font-weight: 700;
    padding: 8px 15px;
    border-radius: 7px;
    border: none;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    white-space: nowrap;
    transition: all 0.2s ease;
    cursor: pointer;
    box-shadow: 0 1px 3px rgba(0, 102, 204, 0.2);
    flex-shrink: 0;
}

.btn-portal-action:hover {
    background: #0052A3;
    color: #ffffff !important;
    box-shadow: 0 3px 8px rgba(0, 102, 204, 0.35);
    transform: translateY(-1px);
}

.nl-slider-controls-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 22px;
    margin-top: 28px;
}

.nl-slide-ctrl-btn {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #0F382C;
    color: #0F382C;
    box-shadow: 0 4px 14px rgba(15, 56, 44, 0.16);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    font-size: 19px;
    font-weight: 700;
    padding: 0;
    flex-shrink: 0;
}

.nl-slide-ctrl-btn i {
    font-size: 19px;
    font-weight: 800;
    line-height: 1;
    -webkit-text-stroke: 0.7px currentColor;
}

.nl-slide-ctrl-btn:hover:not(:disabled) {
    background: #0F382C;
    color: #ffffff;
    border-color: #0F382C;
    box-shadow: 0 6px 20px rgba(15, 56, 44, 0.3);
    transform: scale(1.08);
}

.nl-slide-ctrl-btn:disabled, .nl-slide-ctrl-btn.disabled {
    opacity: 0.55;
    cursor: not-allowed;
    pointer-events: none;
    background: #F1F5F9;
    border: 2px solid #CBD5E1;
    color: #64748B;
    box-shadow: none;
}

/* Dots Navigation */
.nl-slider-dots-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin: 0;
}

.nl-slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #94A3B8;
    border: 2px solid #E2E8F0;
    padding: 0;
    cursor: pointer;
    transition: all 0.25s ease;
}

.nl-slider-dot:hover {
    background: #475569;
    transform: scale(1.15);
}

.nl-slider-dot.active {
    width: 36px;
    height: 12px;
    border-radius: 6px;
    background: #0F382C;
    border-color: #0F382C;
    box-shadow: 0 2px 8px rgba(15, 56, 44, 0.35);
}
</style>

<section class="nl-portal-section py-5" id="newlyLaunchedSection">
    <div class="container py-3 position-relative">

        <!-- Section Header -->
        <div class="text-center mb-4">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">New Arrivals</span>
            <h2 class="display-6 fw-bold text-dark mb-2">Newly Launched Projects</h2>
            <div class="divider-line-gold mx-auto mb-2"></div>
            <p class="text-muted fs-6 mb-0">Explore verified newly launched residential plotted developments with direct developer pricing and zero brokerage.</p>
        </div>

        <!-- Slider Container (Guaranteed Single Row) -->
        <div class="nl-slider-container">
            
            <!-- Slider Track Viewport -->
            <div class="nl-slider-track <?= count($new_projects) == 1 ? 'single-card' : '' ?>" id="nlSliderTrack">
                <?php foreach ($new_projects as $p): 
                    $p_img = !empty($p['image']) ? (base_url($p['image']) . '?v=3') : base_url('assets/images/slider/gardenia_hero.webp');
                    $badge_text = !empty($p['badge']) ? $p['badge'] : 'NEW ARRIVAL';
                    $price_display = !empty($p['price']) ? $p['price'] : 'Price On Request';
                    $plot_sizes = !empty($p['plot_sizes']) ? $p['plot_sizes'] : 'Plots Available';
                    $location_text = !empty($p['location']) ? $p['location'] : 'Prime Location';

                    // First highlight or custom appreciation line
                    $trend_text = '14.2% price increase in last 1 year in this area';
                    if (!empty($p['highlights_list']) && count($p['highlights_list']) > 0) {
                        $trend_text = $p['highlights_list'][0];
                    } elseif (!empty($p['highlights'])) {
                        $trend_text = is_string($p['highlights']) ? $p['highlights'] : 'Immediate Registry & Mutation';
                    }
                    // Offer tag at bottom
                    $offer_text = !empty($p['tagline']) ? $p['tagline'] : 'Get preferred options @zero brokerage';

                    // Direct Phone Number: Use admin custom phone if provided, otherwise Controller.php default phone
                    $admin_phone = !empty($p['enquiry_link']) ? trim($p['enquiry_link']) : '';
                    $display_phone = !empty($admin_phone) ? $admin_phone : $controller_phone;
                    $clean_tel = preg_replace('/[^0-9+]/', '', $display_phone);
                ?>
                    <div class="nl-slide-card">
                        <div class="portal-card">
                            
                            <!-- Top Ribbon Tag (NEW ARRIVAL) -->
                            <div class="portal-ribbon">
                                <?= htmlspecialchars(strtoupper($badge_text)) ?>
                            </div>

                            <!-- Main Top Content Row -->
                            <div class="portal-main-row">
                                
                                <!-- Left: Square Thumbnail with RERA Badge -->
                                <div class="portal-thumb-box">
                                    <img src="<?= $p_img ?>" alt="<?= htmlspecialchars($p['name']) ?> thumbnail" class="portal-thumb-img" loading="lazy">
                                    <div class="portal-rera-pill">
                                        <i class="bi bi-shield-fill-check"></i>
                                        <span>RERA</span>
                                    </div>
                                </div>

                                <!-- Right: Project Title, Location, Price & Trend -->
                                <div class="portal-info-col">
                                    <!-- Project Name -->
                                    <h3 class="portal-title" title="<?= htmlspecialchars($p['name']) ?>">
                                        <?= htmlspecialchars($p['name']) ?>
                                    </h3>

                                    <!-- Location -->
                                    <p class="portal-location" title="<?= htmlspecialchars($location_text) ?>">
                                        <?= htmlspecialchars($location_text) ?>
                                    </p>

                                    <!-- Price | Sizes -->
                                    <div class="portal-price-row">
                                        <span class="portal-price"><?= htmlspecialchars($price_display) ?></span>
                                        <span class="portal-pipe">|</span>
                                        <span class="portal-sizes"><?= htmlspecialchars($plot_sizes) ?></span>
                                    </div>

                                    <!-- Growth Trend / Highlight line in green -->
                                    <p class="portal-trend-text" title="<?= htmlspecialchars($trend_text) ?>">
                                        <i class="bi bi-graph-up-arrow"></i>
                                        <span><?= htmlspecialchars($trend_text) ?></span>
                                    </p>
                                </div>

                            </div>

                            <!-- Dashed Divider Line -->
                            <div class="portal-dashed-divider"></div>

                            <!-- Bottom Footer Row -->
                            <div class="portal-bottom-row">
                                <!-- Left: Tag Offer -->
                                <div class="portal-left-offer">
                                    <i class="bi bi-tag-fill portal-tag-icon"></i>
                                    <span class="portal-offer-text"><?= htmlspecialchars($offer_text) ?></span>
                                </div>

                                <!-- Right: Direct Phone Button -->
                                <a href="tel:<?= $clean_tel ?>" 
                                   class="btn-portal-action" 
                                   title="Call <?= htmlspecialchars($display_phone) ?>">
                                    <i class="bi bi-telephone-fill" style="font-size:12px;"></i>
                                    <span class="btn-text"><?= htmlspecialchars($display_phone) ?></span>
                                </a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Slider Bottom Controls: [ < ]  ● ▬ ●  [ > ] -->
        <div class="nl-slider-controls-wrap" id="nlSliderControlsWrap">
            <!-- Previous Button -->
            <button type="button" class="nl-slide-ctrl-btn" id="nlPrevBtn" aria-label="Previous slide" onclick="nlSlideCards('prev')">
                <i class="bi bi-chevron-left"></i>
            </button>

            <!-- Dots Indicator in the center -->
            <div class="nl-slider-dots-wrap" id="nlSliderDots"></div>

            <!-- Next Button -->
            <button type="button" class="nl-slide-ctrl-btn" id="nlNextBtn" aria-label="Next slide" onclick="nlSlideCards('next')">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>

    </div>
</section>

<script>
function getSlideStep() {
    var track = document.getElementById('nlSliderTrack');
    if (!track) return 300;
    var firstSlide = track.querySelector('.nl-slide-card');
    if (!firstSlide) return 300;
    return firstSlide.offsetWidth + 24; // Width + gap
}

function nlSlideCards(direction) {
    var track = document.getElementById('nlSliderTrack');
    if (!track) return;
    var step = getSlideStep();
    if (direction === 'prev') {
        track.scrollBy({ left: -step, behavior: 'smooth' });
    } else {
        track.scrollBy({ left: step, behavior: 'smooth' });
    }
}

function updateNlSliderControls() {
    var track = document.getElementById('nlSliderTrack');
    var controlsWrap = document.getElementById('nlSliderControlsWrap');
    var prevBtn = document.getElementById('nlPrevBtn');
    var nextBtn = document.getElementById('nlNextBtn');
    var dotsWrap = document.getElementById('nlSliderDots');
    if (!track) return;

    var maxScroll = track.scrollWidth - track.clientWidth;

    // If all cards fit without needing to scroll
    if (maxScroll <= 8) {
        if (controlsWrap) controlsWrap.style.display = 'none';
        return;
    } else {
        if (controlsWrap) controlsWrap.style.display = 'flex';
    }

    if (prevBtn) {
        if (track.scrollLeft <= 8) {
            prevBtn.classList.add('disabled');
            prevBtn.disabled = true;
        } else {
            prevBtn.classList.remove('disabled');
            prevBtn.disabled = false;
        }
    }

    if (nextBtn) {
        if (track.scrollLeft >= maxScroll - 8) {
            nextBtn.classList.add('disabled');
            nextBtn.disabled = true;
        } else {
            nextBtn.classList.remove('disabled');
            nextBtn.disabled = false;
        }
    }

    // Update active dot
    if (dotsWrap) {
        var dots = dotsWrap.querySelectorAll('.nl-slider-dot');
        if (dots.length > 0) {
            var step = getSlideStep();
            var activeIdx = Math.round(track.scrollLeft / step);
            if (activeIdx >= dots.length) activeIdx = dots.length - 1;
            if (activeIdx < 0) activeIdx = 0;
            dots.forEach(function(dot, idx) {
                if (idx === activeIdx) dot.classList.add('active');
                else dot.classList.remove('active');
            });
        }
    }
}

function initNlSliderDots() {
    var track = document.getElementById('nlSliderTrack');
    var dotsWrap = document.getElementById('nlSliderDots');
    if (!track || !dotsWrap) return;

    var slides = track.querySelectorAll('.nl-slide-card');
    if (slides.length <= 1) {
        dotsWrap.style.display = 'none';
        return;
    }

    dotsWrap.innerHTML = '';
    slides.forEach(function(slide, idx) {
        var dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'nl-slider-dot' + (idx === 0 ? ' active' : '');
        dot.setAttribute('aria-label', 'Slide ' + (idx + 1));
        dot.addEventListener('click', function() {
            var step = getSlideStep();
            track.scrollTo({ left: idx * step, behavior: 'smooth' });
        });
        dotsWrap.appendChild(dot);
    });
}

// Mouse Drag Scroll for Desktop
function initNlDragScroll() {
    var track = document.getElementById('nlSliderTrack');
    if (!track) return;

    var isDown = false;
    var startX = 0;
    var scrollLeft = 0;

    track.addEventListener('mousedown', function(e) {
        if (e.target.closest('a') || e.target.closest('button')) return;
        isDown = true;
        track.classList.add('is-dragging');
        startX = e.pageX - track.offsetLeft;
        scrollLeft = track.scrollLeft;
    });

    track.addEventListener('mouseleave', function() {
        isDown = false;
        track.classList.remove('is-dragging');
    });

    track.addEventListener('mouseup', function() {
        isDown = false;
        track.classList.remove('is-dragging');
    });

    track.addEventListener('mousemove', function(e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.pageX - track.offsetLeft;
        var walk = (x - startX) * 1.4;
        track.scrollLeft = scrollLeft - walk;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    initNlSliderDots();
    initNlDragScroll();
    updateNlSliderControls();

    var track = document.getElementById('nlSliderTrack');
    if (track) {
        track.addEventListener('scroll', function() {
            window.requestAnimationFrame(updateNlSliderControls);
        });
    }

    window.addEventListener('resize', function() {
        updateNlSliderControls();
    });
});

// Also trigger immediately in case DOM is already loaded
if (document.readyState === 'complete' || document.readyState === 'interactive') {
    setTimeout(function() {
        initNlSliderDots();
        initNlDragScroll();
        updateNlSliderControls();
        var track = document.getElementById('nlSliderTrack');
        if (track) {
            track.addEventListener('scroll', function() {
                window.requestAnimationFrame(updateNlSliderControls);
            });
        }
    }, 100);
}
</script>
<?php endif; ?>
