<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Contact Us',
    'bc_desc' => 'Get in touch with our expert estate advisory team for plots and bungalows for sale, pricing sheets, and site visit booking.',
    'breadcrumbs' => [
        ['name' => 'Contact Us']
    ]
]);
?>

<!-- MAIN CONTACT US SECTION -->
<section class="py-5 bg-light position-relative">
  <div class="container py-2">
    
    <!-- 3 QUICK CONTACT INFO CARDS STRIP (1 Row - 3 Columns on Desktop) -->
    <div class="row g-3 mb-5">
      
      <!-- Card 1: Phone -->
      <div class="col-lg-4 col-sm-6">
        <a <?= $phonehtml ?> class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-white text-decoration-none contact-info-card border">
          <div class="d-flex align-items-center gap-3">
            <div class="contact-icon-circle flex-shrink-0">
              <i class="bi bi-telephone-fill fs-4"></i>
            </div>
            <div>
              <span class="extra-small text-muted fw-semibold text-uppercase d-block mb-1">Call Sales Team</span>
              <h6 class="fw-bold text-dark mb-0 fs-6"><?= $phone ?></h6>
            </div>
          </div>
        </a>
      </div>

      <!-- Card 2: Email -->
      <div class="col-lg-4 col-sm-6">
        <a href="<?= $mailhtml ?>" class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-white text-decoration-none contact-info-card border">
          <div class="d-flex align-items-center gap-3">
            <div class="contact-icon-circle flex-shrink-0">
              <i class="bi bi-envelope-fill fs-4"></i>
            </div>
            <div>
              <span class="extra-small text-muted fw-semibold text-uppercase d-block mb-1">Email Enquiries</span>
              <h6 class="fw-bold text-dark mb-0 fs-6 text-break"><?= $mail ?></h6>
            </div>
          </div>
        </a>
      </div>

      <!-- Card 3: Location -->
      <div class="col-lg-4 col-sm-12">
        <div class="card border-0 rounded-4 shadow-sm p-4 h-100 bg-white contact-info-card border">
          <div class="d-flex align-items-center gap-3">
            <div class="contact-icon-circle flex-shrink-0">
              <i class="bi bi-geo-alt-fill fs-4"></i>
            </div>
            <div>
              <span class="extra-small text-muted fw-semibold text-uppercase d-block mb-1">Project Site</span>
              <h6 class="fw-bold text-dark mb-0 small lh-sm"><?= $address ?></h6>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- MAIN FORM & INFO 2-COLUMN GRID -->
    <div class="row g-4 mb-5">
      
      <!-- LEFT COLUMN: Contact / Quote Form View Include -->
      <div class="col-lg-7">
        <?php $this->load->view('contacts/quoteform'); ?>
      </div>

      <!-- RIGHT COLUMN: Site Visit & Assistance Info Card -->
      <div class="col-lg-5">
        <div class="d-flex flex-column gap-4 h-100">
          
          <!-- Free Site Visit Card -->
          <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border">
            <div class="d-flex align-items-center gap-3 mb-3 border-bottom pb-3">
              <div class="bg-success-subtle text-success rounded-circle p-2.5 d-flex align-items-center justify-content-center icon-box-46">
                <i class="bi bi-car-front-fill fs-4"></i>
              </div>
              <div>
                <h5 class="fw-bold text-dark mb-0 fs-6">Free Site Visit Assistance</h5>
                <span class="extra-small text-muted">Complimentary Pickup &amp; Drop Facility</span>
              </div>
            </div>
            <p class="small text-secondary leading-relaxed mb-3">
              Schedule a free cab pickup from anywhere in Siliguri or Bagdogra Airport for an exclusive guided walkthrough of the 50+ acre township, layout infrastructure, and available plots and luxury bungalows for sale.
            </p>
            <div class="d-flex gap-2">
              <a <?= $phonehtml ?> class="btn btn-outline-success bg-success text-white btn-sm rounded-pill flex-fill fw-bold py-2">
                <i class="bi bi-telephone-fill me-1"></i> Call Advisor
              </a>
              <a href="<?= $whatsapphtml ?>" target="_blank" rel="noopener" class="btn btn-success btn-sm rounded-pill flex-fill fw-bold py-2">
                <i class="bi bi-whatsapp me-1"></i> WhatsApp Us
              </a>
            </div>
          </div>

          <!-- Office Timing & Regulatory Info -->
          <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border">
            <h5 class="fw-bold text-dark mb-3 fs-6 d-flex align-items-center gap-2">
              <i class="bi bi-clock-history text-success fs-5"></i> Working Hours &amp; Visits
            </h5>
            <ul class="list-unstyled mb-4 d-flex flex-column gap-2 text-secondary small">
              <li class="d-flex justify-content-between pb-2 border-bottom">
                <span>Monday - Saturday:</span>
                <strong class="text-dark">10:00 AM - 6:00 PM</strong>
              </li>
              <li class="d-flex justify-content-between pb-2 border-bottom">
                <span>Sunday &amp; Public Holidays:</span>
                <strong class="text-success">Site Visits Open (10 AM - 5 PM)</strong>
              </li>
              <li class="d-flex justify-content-between pt-1">
                <span>WBRERA Registration:</span>
                <strong class="text-dark extra-small">WBRERA/P/DAR/2024/000188</strong>
              </li>
            </ul>

            <div class="p-3 bg-light rounded-3 border-start border-4 border-success">
              <span class="extra-small text-muted d-block leading-relaxed">
                <i class="bi bi-shield-lock-fill text-success me-1"></i> <strong>Official Sales Office:</strong> <?= htmlspecialchars($company3) ?>. Direct developer pricing with 100% clear legal titles and zero brokerage fees.
              </span>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- BOTTOM LOCATION MAP CARD -->
    <div class="card border-0 rounded-4 shadow-sm overflow-hidden bg-white border">
      <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
        <h5 class="fw-bold text-dark mb-0 fs-6 d-flex align-items-center gap-2">
          <i class="bi bi-map-fill text-success fs-5"></i> Project Site Map &amp; Directions
        </h5>
        <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1 extra-small fw-bold"><?= htmlspecialchars($addressRegion) ?></span>
      </div>
      <div class="card-body p-0">
        <div class="ratio ratio-21x9 overflow-hidden min-h-380">
            <iframe 
            src="<?= htmlspecialchars($gmap) ?>" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade" 
            title="Office Location Map"
            class="map-iframe-full">
            </iframe>
        </div>
      </div>
    </div>

  </div>
</section>

<script>
function handleContactSubmit(e, form) {
  e.preventDefault();
  var box = document.getElementById('contactResultBox');
  if (box) {
    box.innerHTML = '<div class="alert alert-info py-2 px-3 small text-info bg-info-subtle border-0 rounded-3 mb-3"><i class="bi bi-hourglass-split me-1"></i> Submitting your inquiry...</div>';
  }
  var formData = new FormData(form);
  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  .then(function(res) { return res.text(); })
  .then(function(data) {
    if (box) {
      box.innerHTML = '<div class="alert alert-success py-2.5 px-3 text-success bg-success-subtle border-0 rounded-3 mb-3 d-flex align-items-center gap-2">' +
        '<i class="bi bi-check-circle-fill fs-5 flex-shrink-0"></i>' +
        '<span class="fw-semibold small">Thank you! Your inquiry has been submitted successfully. Our sales team will call you shortly.</span>' +
        '</div>';
    }
    form.reset();
  })
  .catch(function(err) {
    if (box) {
      box.innerHTML = '<div class="alert alert-danger py-2 px-3 small text-danger bg-danger-subtle border-0 rounded-3 mb-3">Something went wrong. Please try again.</div>';
    }
  });
}
</script>