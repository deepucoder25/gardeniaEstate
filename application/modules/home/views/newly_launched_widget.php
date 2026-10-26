<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

$new_projects = get_newly_launched_projects(true); // Active projects only
$CI =& get_instance();
$controller_phone = !empty($CI->comp['phone']) ? $CI->comp['phone'] : (!empty($phone) ? $phone : '+91 91080 34519');
?>

<?php if (!empty($new_projects)): ?>
<!-- ============================================================
     NEWLY LAUNCHED PROJECTS - SINGLE ROW SLIDER CAROUSEL
     ============================================================ -->
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
                                    <i class="bi bi-telephone-fill"></i>
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
