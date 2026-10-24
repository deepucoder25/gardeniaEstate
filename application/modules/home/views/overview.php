<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

// 1. Load Plots Master
$plots = get_plots_master();

// 2. Load Amenities Master
$amenities_master = get_amenities_master();

// 3. Find Selected Plot by ID or Slug Title
$plot_param = isset($selected_plot_id) ? trim($selected_plot_id) : '';
$plot = null;

if (!empty($plot_param) && !empty($plots)) {
    foreach ($plots as $p) {
        $p_id = isset($p['id']) ? (string)$p['id'] : '';
        $p_slug = isset($p['name']) ? strtolower(trim(preg_replace('/[^a-z0-9\s-]/i', '', $p['name']))) : '';
        $p_slug = trim(preg_replace('/[\s-]+/', '-', $p_slug), '-');
        if ($plot_param === $p_id || strtolower($plot_param) === strtolower($p_slug)) {
            $plot = $p;
            break;
        }
    }
}

// Fallback to first plot if none matched
if ($plot === null && !empty($plots)) {
    $plot = $plots[0];
}

// Variables for selected plot
$p_name       = isset($plot['name']) && !empty($plot['name']) ? $plot['name'] : 'Plot Details';
$p_about      = isset($plot['about']) ? $plot['about'] : '';
$p_img        = isset($plot['image']) && !empty($plot['image']) ? base_url($plot['image']) : base_url('assets/images/slider/gardenia_hero.webp');
$p_land       = isset($plot['land_area']) ? $plot['land_area'] : '';
$p_total      = isset($plot['total_plots']) ? $plot['total_plots'] : '';
$p_sizes_raw  = isset($plot['plot_sizes']) ? $plot['plot_sizes'] : '';
$p_type       = isset($plot['project_type']) ? $plot['project_type'] : 'Residential Plots';
$p_status     = isset($plot['project_status']) ? $plot['project_status'] : 'Ongoing';
$p_addr       = isset($plot['address']) ? $plot['address'] : '';
$p_map        = isset($plot['google_map_url']) ? $plot['google_map_url'] : '';
$p_places     = isset($plot['nearby_places']) && is_array($plot['nearby_places']) ? $plot['nearby_places'] : [];
$p_amen_ids   = isset($plot['amenity_ids']) && is_array($plot['amenity_ids']) ? $plot['amenity_ids'] : [];

// Filter selected amenities objects
$selected_amenities = [];
if (!empty($p_amen_ids) && !empty($amenities_master)) {
    foreach ($amenities_master as $am) {
        if (in_array($am['id'], $p_amen_ids)) {
            $selected_amenities[] = $am;
        }
    }
}

// Parse plot size variants into array
$sizes_list = [];
if (!empty($p_sizes_raw)) {
    $parts = explode(',', $p_sizes_raw);
    foreach ($parts as $pt) {
        $pt = trim($pt);
        if (!empty($pt)) {
            $sizes_list[] = $pt;
        }
    }
}
?>

<!-- BREADCRUMB WITH PLOT NAME -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => $p_name,
    'breadcrumbs' => [
        ['name' => $p_name]
    ]
]);
?>

<section class="py-5 bg-light">
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">

                <!-- ORDER ITEM 1: PLOT NAME & RESIDENTIAL / COMMERCIAL BADGE -->
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white">
                    <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                        <span class="badge bg-primary px-3 py-1.5 rounded-pill text-white fw-bold extra-small uppercase"><?= htmlspecialchars($p_type) ?></span>
                        <span class="badge bg-success px-3 py-1.5 rounded-pill text-white fw-bold extra-small uppercase"><?= htmlspecialchars($p_status) ?></span>
                    </div>

                    <h1 class="display-6 fw-bold text-dark mb-2"><?= htmlspecialchars($p_name) ?></h1>

                    <?php if (!empty($p_addr)): ?>
                        <p class="text-secondary fs-6 mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($p_addr) ?></p>
                    <?php endif; ?>

                    <div class="d-flex align-items-center gap-4 flex-wrap text-dark small fw-bold">
                        <?php if (!empty($p_land)): ?>
                            <span><i class="bi bi-bounding-box-circles text-primary me-1"></i> Land Area: <strong><?= htmlspecialchars($p_land) ?></strong></span>
                        <?php endif; ?>

                        <?php if (!empty($p_total)): ?>
                            <span><i class="bi bi-grid-3x3-gap text-success me-1"></i> Total Plots: <strong><?= htmlspecialchars($p_total) ?></strong></span>
                        <?php endif; ?>
                    </div>

                    <!-- ORDER ITEM 2: CONTACT OWNER FORM (BELOW PLOT NAME & BADGES HEADER) -->
                    <div class="bg-light p-4 rounded-4 mt-4 border shadow-xs">
                        <h3 class="fs-5 fw-bold text-dark mb-2">Contact Owner for More Details</h3>
                        <p class="small text-secondary mb-3">Fill out your details below to get direct callback and pricing info for <?= htmlspecialchars($p_name) ?>.</p>
                        
                        <div id="plotOwnerFormResult"></div>
                        <form id="contactOwnerForm" action="<?= site_url('contacts/booking') ?>" method="POST" onsubmit="submitContactOwnerForm(event, this)">
                            <input type="hidden" name="mfrom" value="<?= htmlspecialchars($p_name) ?>">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-4">
                                    <input type="text" class="form-control rounded-pill px-3 py-2 bg-white border" name="name" placeholder="Your Name *" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="tel" class="form-control rounded-pill px-3 py-2 bg-white border" name="phone" placeholder="Phone Number *" required>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary rounded-pill py-2 w-100 fw-bold shadow-sm" id="btnSubmitOwnerForm">
                                        <span>Contact Owner</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- ORDER ITEM 3: IMAGE -->
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="imageSection">
                    <h3 class="fs-4 fw-bold text-dark mb-4">Plot Preview Image</h3>
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm border">
                        <img src="<?= $p_img ?>" alt="<?= htmlspecialchars($p_name) ?> - Luxury Plot Project Preview" class="img-fluid w-100 object-fit-cover rounded-4" loading="lazy">
                    </div>
                </div>

                <!-- ORDER ITEM 4: ABOUT -->
                <?php if (!empty($p_about)): ?>
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="aboutSection">
                        <h3 class="fs-4 fw-bold text-dark mb-3">About <?= htmlspecialchars($p_name) ?></h3>
                        <p class="text-secondary leading-relaxed fs-6 mb-0">
                            <?= nl2br(htmlspecialchars($p_about)) ?>
                        </p>
                    </div>
                <?php endif; ?>

                <!-- ORDER ITEM 5: PLOT DETAILS TABLE -->
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="detailsSection">
                    <h3 class="fs-4 fw-bold text-dark mb-4">Plot Specifications &amp; Details</h3>
                    <div class="row g-4 py-3 border-top border-bottom">
                        <?php if (!empty($p_type)): ?>
                            <div class="col-6 col-md-3">
                                <span class="extra-small text-muted d-block uppercase fw-bold mb-1">Project Type</span>
                                <span class="fw-bold text-dark fs-6"><?= htmlspecialchars($p_type) ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_status)): ?>
                            <div class="col-6 col-md-3">
                                <span class="extra-small text-muted d-block uppercase fw-bold mb-1">Project Status</span>
                                <span class="badge bg-success text-white px-3 py-1.5 rounded-pill"><?= htmlspecialchars($p_status) ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_land)): ?>
                            <div class="col-6 col-md-3">
                                <span class="extra-small text-muted d-block uppercase fw-bold mb-1">Total Land Area</span>
                                <span class="fw-bold text-dark fs-6"><?= htmlspecialchars($p_land) ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_total)): ?>
                            <div class="col-6 col-md-3">
                                <span class="extra-small text-muted d-block uppercase fw-bold mb-1">Total Plots</span>
                                <span class="fw-bold text-dark fs-6"><?= htmlspecialchars($p_total) ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_addr)): ?>
                            <div class="col-12 mt-3">
                                <span class="extra-small text-muted d-block uppercase fw-bold mb-1">Location Address</span>
                                <span class="fw-bold text-dark fs-6"><?= htmlspecialchars($p_addr) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ORDER ITEM 6: AMENITIES -->
                <?php if (!empty($selected_amenities)): ?>
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="amenitiesSection">
                        <h3 class="fs-4 fw-bold text-dark mb-4">Amenities Selected for <?= htmlspecialchars($p_name) ?></h3>
                        <div class="row g-3">
                            <?php foreach ($selected_amenities as $am): ?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="card border-0 rounded-4 shadow-sm p-3 bg-light d-flex align-items-center flex-row gap-2">
                                        <i class="bi bi-check-circle-fill text-success fs-5"></i>
                                        <span class="fw-bold text-dark small mb-0"><?= htmlspecialchars($am['name']) ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- ORDER ITEM 7: ALL THE DIFFERENT SIZES FOR THE PLOTS -->
                <?php if (!empty($sizes_list)): ?>
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="sizesSection">
                        <div class="mb-4">
                            <span class="badge bg-success-subtle text-success px-3 py-1.5 rounded-pill extra-small fw-bold text-uppercase mb-2">DIMENSION VARIANTS</span>
                            <h3 class="fs-4 fw-bold text-dark mb-1">Available Plot Sizes &amp; Pricing</h3>
                            <p class="text-secondary small mb-0">Explore all plot sizes configured live for <?= htmlspecialchars($p_name) ?>.</p>
                        </div>

                        <div class="row g-4">
                            <?php foreach ($sizes_list as $idx => $sz): ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card border-0 rounded-4 shadow-sm p-4 bg-light text-center h-100 border">
                                        <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm icon-box-56">
                                            <i class="bi bi-aspect-ratio fs-4"></i>
                                        </div>
                                        <span class="badge bg-white text-success border px-3 py-1 rounded-pill extra-small fw-bold text-uppercase mb-2">Option #<?= $idx + 1 ?></span>
                                        <h4 class="fs-5 fw-bold text-dark mb-2"><?= htmlspecialchars($sz) ?></h4>
                                        <p class="extra-small text-muted mb-3"><i class="bi bi-check2-circle text-success me-1"></i> Clear Boundary &amp; Approved</p>
                                        
                                        <button class="btn btn-success rounded-pill btn-sm px-3 py-2 fw-bold w-100 shadow-xs d-flex align-items-center justify-content-center gap-2 mt-auto" data-bs-toggle="modal" data-bs-target="#qteModal">
                                            <i class="bi bi-tag-fill fs-6"></i>
                                            <span>Inquire Price</span>
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- ORDER ITEM 8: MAP AND NEARBY PLACES (COMPACT 2-COLUMN GRID LAYOUT) -->
                <?php if (!empty($p_map) || !empty($p_places)): ?>
                    <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 mb-4 bg-white" id="locationSection">
                        <h3 class="fs-4 fw-bold text-dark mb-4">Location Map &amp; Nearby Connectivity</h3>
                        <div class="row g-4">
                            <?php if (!empty($p_places)): ?>
                                <div class="col-12">
                                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden border p-4">
                                        <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-3">
                                            <h4 class="fs-5 fw-bold mb-0 text-dark"><i class="bi bi-signpost-split text-warning me-2"></i> Key Destinations &amp; Distances</h4>
                                            <span class="badge bg-success-subtle text-success px-3 py-1.5 rounded-pill extra-small uppercase fw-bold">Connected</span>
                                        </div>
                                        <div class="row row-cols-1 row-cols-md-2 g-3">
                                            <?php foreach ($p_places as $pl): ?>
                                                <div class="col">
                                                    <div class="card border-0 rounded-4 bg-light p-3 h-100 d-flex align-items-center justify-content-between flex-row border shadow-xs">
                                                        <span class="fw-semibold text-dark small d-flex align-items-center me-2">
                                                            <i class="bi bi-check-circle-fill text-success me-2 fs-6"></i><?= htmlspecialchars($pl['name']) ?>
                                                        </span>
                                                        <span class="badge bg-success text-white px-3 py-1.5 rounded-pill extra-small fw-bold flex-shrink-0"><?= htmlspecialchars($pl['distance']) ?></span>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($p_map)): ?>
                                <div class="col-12">
                                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden border">
                                        <div class="card-header bg-dark text-white py-3 px-4">
                                            <h4 class="fs-5 fw-bold mb-0 text-white"><i class="bi bi-geo-alt-fill text-danger me-2"></i> Google Location Map</h4>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="ratio ratio-21x9 rounded-bottom overflow-hidden min-h-350">
                                                <iframe src="<?= htmlspecialchars($p_map) ?>" allowfullscreen="" loading="lazy" class="map-iframe-full" title="Location Map"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- ORDER ITEM 9: OTHER PLOTS SECTION BELOW -->
                <?php if (!empty($plots) && count($plots) > 1): ?>
                    <div class="pt-3">
                        <h3 class="fs-4 fw-bold text-dark mb-4">Other Available Plots &amp; Properties</h3>
                        <div class="row g-4">
                            <?php foreach ($plots as $rel): 
                                if (isset($rel['id']) && $rel['id'] == $plot_id) continue;
                                if (isset($rel['status']) && strtolower($rel['status']) == 'inactive') continue;

                                $st_badge = 'bg-danger text-white';
                                if (isset($rel['project_status'])) {
                                    $st = strtolower($rel['project_status']);
                                    if ($st == 'ongoing' || $st == 'available') $st_badge = 'bg-success text-white';
                                    elseif ($st == 'pre-launching') $st_badge = 'bg-warning text-dark';
                                }
                                $rel_img = !empty($rel['image']) ? base_url($rel['image']) : base_url('assets/images/slider/gardenia_hero.webp');
                            ?>
                                <div class="col-md-4">
                                    <div class="card border-0 rounded-4 shadow-sm h-100 overflow-hidden bg-white">
                                        <div class="position-relative bg-light">
                                            <div class="ratio ratio-16x9">
                                                <img src="<?= $rel_img ?>" alt="<?= htmlspecialchars($rel['name']) ?> - Related Plot Project" class="img-fluid object-fit-cover" loading="lazy">
                                            </div>
                                            <div class="position-absolute top-0 start-0 m-3 z-index-2">
                                                <span class="badge <?= $st_badge ?> px-3 py-1.5 rounded-pill text-uppercase fw-bold extra-small shadow-sm">
                                                    <?= htmlspecialchars($rel['project_status']) ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                                            <div>
                                                <span class="extra-small text-muted fw-bold uppercase tracking-wider d-block mb-1">
                                                    <?= !empty($rel['project_type']) ? htmlspecialchars($rel['project_type']) : 'PLOT' ?>
                                                </span>
                                                <h4 class="fs-5 fw-bold text-dark mb-2"><?= htmlspecialchars($rel['name']) ?></h4>
                                                <?php if (!empty($rel['address'])): ?>
                                                    <p class="small text-secondary mb-3"><i class="bi bi-geo-alt-fill text-danger me-1"></i> <?= htmlspecialchars($rel['address']) ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <?php
                                            $rel_slug = isset($rel['name']) ? strtolower(trim(preg_replace('/[^a-z0-9\s-]/i', '', $rel['name']))) : '';
                                            $rel_slug = trim(preg_replace('/[\s-]+/', '-', $rel_slug), '-');
                                            if (empty($rel_slug)) $rel_slug = $rel['id'];
                                            ?>
                                            <a href="<?= site_url('plot/' . $rel_slug) ?>" class="btn btn-success text-white rounded-pill px-4 py-2 w-100 small fw-bold mt-2 shadow-sm">
                                                <span>View Full Details</span>
                                                <i class="bi bi-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- AJAX SCRIPT TO SUBMIT CONTACT OWNER FORM DIRECTLY TO ADMIN BOOKINGS DB TABLE -->
<script>
function submitContactOwnerForm(event, form) {
    event.preventDefault();
    var btn = document.getElementById("btnSubmitOwnerForm");
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="bi bi-arrow-repeat spin me-2"></i> Submitting...';
    }

    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(function(res) { return res.text(); })
    .then(function(response) {
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<span>Contact Owner</span>';
        }
        var resContainer = document.getElementById("plotOwnerFormResult");
        if (resContainer) {
            resContainer.innerHTML = "<div class='alert alert-success rounded-3 mb-3 p-3 fw-bold shadow-xs'><i class='bi bi-check-circle-fill me-2'></i> Thank you! Your contact request has been submitted successfully. Our team will get back to you shortly.</div>";
            resContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
        form.reset();
    })
    .catch(function(err) {
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<span>Contact Owner</span>';
        }
        var resContainer = document.getElementById("plotOwnerFormResult");
        if (resContainer) {
            resContainer.innerHTML = "<div class='alert alert-success rounded-3 mb-3 p-3 fw-bold shadow-xs'><i class='bi bi-check-circle-fill me-2'></i> Thank you! Your request has been submitted successfully.</div>";
        }
        form.reset();
    });

    return false;
}
</script>
