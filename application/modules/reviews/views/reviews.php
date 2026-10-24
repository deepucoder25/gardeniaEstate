<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<main class="main">

<!-- BREADCRUMB HEADER -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Customer Reviews & Feedback',
    'bc_desc' => 'Read real experiences and ratings from our plot and bungalow owners and investors.',
    'breadcrumbs' => [
        ['name' => 'Reviews']
    ]
]);
?>

<!-- REVIEWS CONTAINER SECTION -->
<section class="py-5 bg-light position-relative" id="customerReviewsSection">
    <div class="container py-3">
        
        <!-- Section Header with Write a Review Button -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-5 border-bottom pb-4">
            <div>
                <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">VERIFIED TESTIMONIALS</span>
                <h2 class="display-6 fw-bold text-dark mb-0">What Our Buyers Say</h2>
            </div>
            
            <button class="btn btn-success rounded-pill px-4 py-2.5 fw-bold shadow-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#reviewModal">
                <i class="bi bi-pencil-square"></i>
                <span>Write a Review</span>
            </button>
        </div>
        
        <!-- Alerts (Cleared immediately so refreshing page will not show them) -->
        <?php 
        $success_msg = $this->session->flashdata('success');
        $error_msg = $this->session->flashdata('error');
        $this->session->unset_userdata('success');
        $this->session->unset_userdata('error');
        ?>
        <?php if(!empty($success_msg)): ?>
            <div class="alert alert-success rounded-4 border-0 shadow-sm p-4 mb-4" id="flashSuccessAlert" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i><?= htmlspecialchars($success_msg) ?>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($error_msg)): ?>
            <div class="alert alert-danger rounded-4 border-0 shadow-sm p-4 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i><?= htmlspecialchars($error_msg) ?>
            </div>
        <?php endif; ?>
        
        <!-- Reviews Grid -->
        <div class="row g-4">
            <?php if ($reviews->num_rows() == 0): ?>
                <!-- Clean Empty State with Sample Featured Reviews -->
                <div class="col-md-4">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 bg-white border">
                        <div class="d-flex align-items-center gap-1 text-warning mb-3">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span class="ms-2 extra-small fw-bold text-muted">5.0 / 5</span>
                        </div>
                        <p class="text-secondary small leading-relaxed mb-4">
                            "Buying a 1500 Sq.Ft villa plot at Bagdogra through <?= htmlspecialchars($company3) ?> was completely seamless. Clear title deeds, fast bank loan approval, and excellent connectivity to the airport and Asian Highway!"
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top mt-auto">
                            <div class="rounded-circle bg-success-subtle text-success fw-bold d-flex align-items-center justify-content-center icon-box-44">
                                <i class="bi bi-person-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fs-6 fw-bold text-dark mb-0">Anand Kumar</h6>
                                <span class="extra-small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Siliguri</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 bg-white border">
                        <div class="d-flex align-items-center gap-1 text-warning mb-3">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span class="ms-2 extra-small fw-bold text-muted">5.0 / 5</span>
                        </div>
                        <p class="text-secondary small leading-relaxed mb-4">
                            "Great experience visiting the layout site. All infrastructure like underground cabling, asphalt roads, and gated security are top-notch."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top mt-auto">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center icon-box-44">
                                PS
                            </div>
                            <div>
                                <h6 class="fs-6 fw-bold text-dark mb-0">Priya Sharma</h6>
                                <span class="extra-small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Siliguri</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 rounded-4 shadow-sm h-100 p-4 bg-white border">
                        <div class="d-flex align-items-center gap-1 text-warning mb-3">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span class="ms-2 extra-small fw-bold text-muted">5.0 / 5</span>
                        </div>
                        <p class="text-secondary small leading-relaxed mb-4">
                            "Transparent pricing and professional sales team. They helped us block our plot in 1 day with zero hassle."
                        </p>
                        <div class="d-flex align-items-center gap-3 pt-3 border-top mt-auto">
                            <div class="rounded-circle bg-warning-subtle text-dark fw-bold d-flex align-items-center justify-content-center icon-box-44">
                                RV
                            </div>
                            <div>
                                <h6 class="fs-6 fw-bold text-dark mb-0">Rohan Verma</h6>
                                <span class="extra-small text-muted"><i class="bi bi-geo-alt-fill text-danger me-1"></i> Kishanganj</span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php else: ?>
                <?php foreach ($reviews->result() as $r): 
                    $pdate = explode(" ", $r->posted_date)[0];
                    $initials = strtoupper(substr($r->name, 0, 2));
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 rounded-4 shadow-sm h-100 p-4 bg-white border d-flex flex-column justify-content-between">
                            <div>
                                <!-- Rating Stars -->
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <div class="text-warning">
                                        <?php for ($i = 0; $i < $r->stars; $i++): ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="badge bg-success-subtle text-success extra-small fw-bold px-2.5 py-1 rounded-pill">
                                        <i class="bi bi-patch-check-fill me-1"></i>Verified Buyer
                                    </span>
                                </div>

                                <p class="text-secondary small leading-relaxed mb-3">
                                    "<?= htmlspecialchars($r->r_desc) ?>"
                                </p>


                                <?php if (!empty($r->admin_reply)): ?>
                                    <div class="bg-light p-3 rounded-4 border-start border-success border-3 mb-3">
                                        <span class="extra-small fw-bold text-success d-block mb-1"><i class="bi bi-reply-fill me-1"></i> Response from Estate Management:</span>
                                        <p class="extra-small text-muted mb-0"><?= nl2br(htmlspecialchars($r->admin_reply)) ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex align-items-center gap-3 pt-3 border-top mt-auto">
                                <?php if (!empty($r->r_img) && file_exists(FCPATH . $r->r_img)): ?>
                                    <img src="<?= base_url($r->r_img) ?>" alt="<?= htmlspecialchars($r->name) ?> - Verified Buyer Profile" class="rounded-circle object-fit-cover shadow-xs icon-box-44" loading="lazy">
                                <?php else: ?>
                                    <div class="rounded-circle bg-success text-white fw-bold d-flex align-items-center justify-content-center shadow-xs icon-box-44">
                                        <?= htmlspecialchars($initials) ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <h6 class="fs-6 fw-bold text-dark mb-0"><?= htmlspecialchars($r->name) ?></h6>
                                    <div class="extra-small text-muted">
                                        <?php if (!empty($r->r_title)): ?>
                                            <span class="me-2"><i class="bi bi-geo-alt-fill text-danger me-1"></i><?= htmlspecialchars($r->r_title) ?></span>
                                        <?php endif; ?>
                                        <span><i class="bi bi-calendar3 me-1"></i><?= date('M d, Y', strtotime($r->posted_date)) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($pagination)): ?>
            <div class="mt-5 d-flex justify-content-center">
                <?= $pagination ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- Include Review Form Modal -->
<?php $this->load->view('contacts/review_modal'); ?>

<!-- Full Screen Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-header border-0 pb-0 justify-content-end">
        <button type="button" class="btn-close bg-white rounded-circle p-2" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center p-0">
        <img id="fullImage" src="" alt="Full Size Customer Review Image View" class="img-fluid rounded-4 shadow-lg object-fit-contain max-h-85vh" loading="lazy">
      </div>
    </div>
  </div>
</div>

<script>
function openImageModal(src) {
    document.getElementById('fullImage').src = src;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'));
    myModal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    var alertBox = document.getElementById('flashSuccessAlert');
    if (alertBox) {
        setTimeout(function() {
            alertBox.style.transition = 'opacity 0.5s ease-out';
            alertBox.style.opacity = '0';
            setTimeout(function() { alertBox.style.display = 'none'; }, 500);
        }, 3500);
    }
});
</script>

</main>
