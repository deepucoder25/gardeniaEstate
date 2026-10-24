<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- ENQUIRY / CONTACT FORM SECTION -->
<section class="enquiry-section py-5 bg-white position-relative" id="enquiryFormSection">
  <div class="container py-3">
    
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">
        
        <div class="card border-0 rounded-4 shadow-lg overflow-hidden p-4 p-md-5">
          
          <!-- Header -->
          <div class="text-center mb-4">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">Direct Developer Enquiry</span>
            <h2 class="display-6 fw-bold text-dark mb-2">Book a Site Visit / Get Quote</h2>
            <p class="text-muted small">Fill out the form below to receive cost sheets, site visit cab booking, and pre-launch offers.</p>
          </div>

          <!-- Contact Form -->
          <form action="<?= site_url('contacts/quote_send') ?>" method="POST" id="homeEnquiryForm">
            
            <div class="row g-3">
              
              <!-- Name Field -->
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label class="form-label fw-bold text-dark small">Full Name <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-fill text-primary"></i></span>
                    <input type="text" name="name" class="form-control bg-light border-start-0" placeholder="Enter your full name" required>
                  </div>
                </div>
              </div>

              <!-- Phone Field -->
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label class="form-label fw-bold text-dark small">Phone Number <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-telephone-fill text-success"></i></span>
                    <input type="tel" name="phone" class="form-control bg-light border-start-0" placeholder="Enter 10-digit mobile no." pattern="[0-9]{10}" required>
                  </div>
                </div>
              </div>

              <!-- Email Field -->
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label class="form-label fw-bold text-dark small">Email Address <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope-fill text-danger"></i></span>
                    <input type="email" name="email" class="form-control bg-light border-start-0" placeholder="name@example.com" required>
                  </div>
                </div>
              </div>

              <!-- Interested Plot / Bungalow Dropdown -->
              <div class="col-md-6">
                <div class="form-group mb-2">
                  <label class="form-label fw-bold text-dark small">Interested Plot / Bungalow <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-bounding-box-circles text-warning"></i></span>
                    <select name="freight" class="form-select bg-light border-start-0" required>
                      <option value="" selected disabled>Select Plot or Bungalow</option>
                      <option value="Residential Plot (1200 Sq.Ft)">Residential Plot - 1200 Sq.Ft (30 x 40 Ft)</option>
                      <option value="Residential Plot (1500 Sq.Ft)">Residential Plot - 1500 Sq.Ft (30 x 50 Ft)</option>
                      <option value="Residential Plot (2400 Sq.Ft)">Residential Plot - 2400 Sq.Ft (40 x 60 Ft)</option>
                      <option value="Commercial Plot (AH2 Corridor)">Commercial Plot (Asian Highway Corridor)</option>
                      <option value="Luxury Bungalow (For Sale)">Luxury Bungalow (For Sale)</option>
                      <option value="Custom Villa Plot Dimension">Custom / Odd Plot Dimension</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Message Field -->
              <div class="col-12">
                <div class="form-group mb-3">
                  <label class="form-label fw-bold text-dark small">Your Message / Specific Requirements</label>
                  <textarea name="comment" class="form-control bg-light" rows="3" placeholder="Tell us your preferred site visit date or inquiry details..."></textarea>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="col-12 text-center pt-2">
                <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 py-3 fw-bold text-uppercase shadow-lg w-100 fs-5">
                  <i class="bi bi-send-fill me-2"></i> SUBMIT ENQUIRY
                </button>
                <div class="form-notice-text text-muted small mt-3">
                  <i class="bi bi-lock-fill text-success me-1"></i> Your information is 100% secure and will never be shared with third parties.
                </div>
              </div>

            </div>

          </form>

        </div>

      </div>
    </div>

  </div>
</section>
