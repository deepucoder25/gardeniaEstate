<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white border">
  <div class="border-bottom pb-3 mb-4">
    <span class="badge bg-success-subtle text-success fw-bold px-3 py-1.5 rounded-pill mb-2 text-uppercase">GET YOUR BEST QUOTE</span>
    <h3 class="fw-bold text-dark mb-1">Request Cost Sheet &amp; Site Visit</h3>
    <p class="text-secondary small mb-0">Submit your details below to receive layout plans, pricing sheets, and immediate callback.</p>
  </div>

  <form id="quoteform" action="<?= site_url('contacts/booking') ?>" method="POST" onsubmit="handleMainQuoteSubmit(event, this)">
    <div class="row g-3">
      
      <!-- Full Name -->
      <div class="col-md-6">
        <label class="form-label small fw-bold text-dark mb-1">Your Full Name <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-fill text-primary"></i></span>
          <input type="text" name="name" class="form-control bg-light border-start-0 py-2.5 px-3" placeholder="e.g. Rahul Sharma" required>
        </div>
      </div>

      <!-- Phone Number -->
      <div class="col-md-6">
        <label class="form-label small fw-bold text-dark mb-1">Phone Number <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone-fill text-success"></i></span>
          <input type="tel" name="phone" class="form-control bg-light border-start-0 py-2.5 px-3" placeholder="10-digit mobile number" required pattern="[0-9]{10}">
        </div>
      </div>

      <!-- Preferred Property Type / Size -->
      <div class="col-md-6">
        <label class="form-label small fw-bold text-dark mb-1">Plot / Bungalow Type</label>
        <div class="input-group">
          <span class="input-group-text bg-light border-end-0"><i class="bi bi-house-door-fill text-warning"></i></span>
          <select name="mfrom" class="form-select bg-light border-start-0 py-2.5 px-3 text-secondary">
            <option value="">-- Select Plot or Bungalow --</option>
            <option value="Residential Plot (1200 Sq.Ft)">Residential Plot - 1200 Sq.Ft (30 ft x 40 ft)</option>
            <option value="Residential Plot (1500 Sq.Ft)">Residential Plot - 1500 Sq.Ft (30 ft x 50 ft)</option>
            <option value="Residential Plot (2400 Sq.Ft)">Residential Plot - 2400 Sq.Ft (40 ft x 60 ft)</option>
            <option value="Commercial Plot (AH2 Corridor)">Commercial Plot (Asian Highway Corridor)</option>
            <option value="Luxury Bungalow (For Sale)">Luxury Bungalow (For Sale)</option>
            <option value="Custom Villa Plot">Custom Villa Plot</option>
          </select>
        </div>
      </div>

      <!-- Preferred Visit Date / Requirements -->
      <div class="col-12">
        <label class="form-label small fw-bold text-dark mb-1">Visit Date / Requirements</label>
        <textarea name="message" class="form-control bg-light py-2.5 px-3 text-dark" rows="3" placeholder="Tell us about your preferred site visit date or investment plans..."></textarea>
      </div>

      <!-- Result Box -->
      <div class="col-12" id="quoteFormResultBox"></div>

      <!-- Submit Button (Proportional & Normal Size on Mobile & Desktop) -->
      <div class="col-12">
        <button type="submit" class="btn btn-success rounded-pill w-100 py-2.5 py-md-3 px-4 fw-bold shadow-sm d-flex align-items-center justify-content-center gap-2 small">
          <i class="bi bi-send-fill fs-6"></i>
          <span>Get Instant Quote &amp; Cost Sheet</span>
        </button>
      </div>

    </div>
  </form>
</div>

<script>
function handleMainQuoteSubmit(e, form) {
  e.preventDefault();
  var box = document.getElementById('quoteFormResultBox');
  if (box) {
    box.innerHTML = '<div class="alert alert-info py-2 px-3 small text-info bg-info-subtle border-0 rounded-3 mb-3"><i class="bi bi-hourglass-split me-1"></i> Submitting your request...</div>';
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
        '<span class="fw-semibold small">Thank you! Your quote request has been submitted successfully. Our sales team will connect with you shortly.</span>' +
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