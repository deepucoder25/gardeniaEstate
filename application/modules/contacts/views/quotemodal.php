<div class="modal fade" id="qteModal" tabindex="-1" aria-labelledby="qteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
      
      <!-- Modal Header (Compact Dark Green Estate Background with Gold Accent) -->
      <div class="modal-header bg-dark-estate text-white p-3 px-4 border-0 position-relative d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
          <div class="bg-warning-subtle text-gold rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 icon-box-size-40 me-1">
            <i class="bi bi-flower2 text-gold fs-5"></i>
          </div>
          <div class="ps-1">
            <h5 class="modal-title fs-5 fw-bold text-white mb-0" id="qteModalLabel">The Gardenia Estate</h5>
            <p class="extra-small text-white-50 mb-0">Plots Pricing, Cost Sheet &amp; Free Site Visit Booking</p>
          </div>
        </div>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Compact Modal Body Form (2 Fields Per Row) -->
      <div class="modal-body p-3 p-md-4 bg-white">
        <form id="quotemodal" action="<?= site_url('contacts/booking') ?>" method="POST" onsubmit="submitQuoteForm(event, this)">
          
          <div class="row g-3">
            
            <!-- Row 1 - Col 1: Full Name -->
            <div class="col-6">
              <label class="form-label extra-small fw-bold text-dark mb-1">Full Name <span class="text-danger">*</span></label>
              <div class="input-group input-group-sm rounded-3 overflow-hidden estate-form-group">
                <span class="input-group-text border-0 px-3"><i class="bi bi-person-fill text-primary fs-6"></i></span>
                <input type="text" class="form-control border-0 bg-light py-2 text-dark font-sans" name="name" placeholder="Full Name" required>
              </div>
            </div>

            <!-- Row 1 - Col 2: Mobile Number -->
            <div class="col-6">
              <label class="form-label extra-small fw-bold text-dark mb-1">Mobile Number <span class="text-danger">*</span></label>
              <div class="input-group input-group-sm rounded-3 overflow-hidden estate-form-group">
                <span class="input-group-text border-0 px-3"><i class="bi bi-telephone-fill text-success fs-6"></i></span>
                <input type="tel" class="form-control border-0 bg-light py-2 text-dark font-sans" name="phone" placeholder="10 Digit Mobile" maxlength="10" required>
              </div>
            </div>

            <!-- Row 2 - Col 1: Preferred Plot Size / Variant Dropdown -->
            <div class="col-6">
              <label class="form-label extra-small fw-bold text-dark mb-1">Plot Variant</label>
              <div class="input-group input-group-sm rounded-3 overflow-hidden estate-form-group">
                <span class="input-group-text border-0 px-3"><i class="bi bi-house-door-fill text-warning fs-6"></i></span>
                <select class="form-select border-0 bg-light py-2 text-dark font-sans estate-select-field" name="mfrom">
                  <option value="">-- Plot Size --</option>
                  <option value="1200 Sq.Ft (30x40)">1200 Sq.Ft (30'x40')</option>
                  <option value="1500 Sq.Ft (30x50)">1500 Sq.Ft (30'x50')</option>
                  <option value="2400 Sq.Ft (40x60)">2400 Sq.Ft (40'x60')</option>
                  <option value="Custom Plot">Custom Plot</option>
                </select>
              </div>
            </div>

            <!-- Row 2 - Col 2: Site Visit Date / Query Notes -->
            <div class="col-6">
              <label class="form-label extra-small fw-bold text-dark mb-1">Visit Date / Notes</label>
              <div class="input-group input-group-sm rounded-3 overflow-hidden estate-form-group">
                <span class="input-group-text border-0 px-3"><i class="bi bi-calendar-event-fill text-info fs-6"></i></span>
                <input type="text" name="message" class="form-control border-0 bg-light py-2 text-dark font-sans" placeholder="Preferred Visit Date">
              </div>
            </div>

          </div>

          <!-- Action Buttons with Proper Icon Gaps -->
          <div class="d-flex align-items-center justify-content-center gap-3 mt-3 pt-1">
            <button id="submitbquotemodal" type="submit" class="btn btn-dark-estate rounded-pill px-4 py-2 fw-bold shadow-sm d-inline-flex align-items-center justify-content-center gap-2 small">
              <span>SUBMIT ENQUIRY</span>
              <i class="bi bi-send-fill text-gold fs-7 ms-2"></i>
            </button>
            <button type="reset" onclick="document.getElementById('resultquotemodal').innerHTML = '';" class="btn btn-outline-secondary rounded-pill px-3 py-2 small fw-semibold">
              Reset
            </button>
          </div>

          <!-- Result Alert Box -->
          <div id="resultquotemodal" class="mt-2"></div>

        </form>
      </div>

    </div>
  </div>
</div>

<script>
function submitQuoteForm(e, form) {
  e.preventDefault();
  var resultBox = document.getElementById('resultquotemodal');
  if (resultBox) {
    resultBox.innerHTML = '<div class="text-success small fw-semibold mt-1"><i class="bi bi-hourglass-split me-1"></i> Submitting...</div>';
  }
  var formData = new FormData(form);
  fetch(form.action, {
    method: 'POST',
    body: formData
  })
  .then(function(res) { return res.text(); })
  .then(function(data) {
    if (resultBox) {
      resultBox.innerHTML = '<div class="alert alert-success border-0 shadow-sm rounded-3 py-2 px-3 mt-2 text-success bg-success-subtle d-flex align-items-center gap-2">' +
        '<i class="bi bi-check-circle-fill text-success flex-shrink-0 fs-6"></i>' +
        '<span class="fw-bold extra-small text-success">Thank you! Your request has been submitted successfully.</span>' +
        '</div>';
    }
    form.reset();
  })
  .catch(function(err) {
    if (resultBox) {
      resultBox.innerHTML = '<div class="text-danger small fw-semibold mt-1">Something went wrong! Please try again.</div>';
    }
  });
}
</script>