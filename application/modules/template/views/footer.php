<!-- FOOTER SECTION (Clean White Background with Theme Outline) -->
<?php
$floatingPhoneNumber = preg_replace('/\D+/', '', (string) $phone);
$floatingWhatsappLink = !empty($whatsapphtml)
  ? $whatsapphtml
  : (!empty($floatingPhoneNumber) ? 'https://wa.me/' . $floatingPhoneNumber : '#');
?>
<footer class="footer-section bg-white pt-5 pb-4">
  <div class="container">
    
    <!-- 4 COLUMNS MAIN ROW -->
    <div class="row g-4 g-lg-5 mb-5">

      <!-- Column 1: Logo & Brand Description -->
      <div class="col-lg-3 col-md-6 border-end-lg">
        <div class="text-center text-md-start pe-lg-3">
          
          <!-- Larger Brand Logo -->
          <a href="<?= site_url() ?>" class="d-inline-block mb-3 text-decoration-none">
            <img src="<?= base_url('assets/images/logo/logo.webp') ?>" alt="<?= htmlspecialchars($company3) ?> Logo - Luxury Plotted Township Bagdogra Siliguri" class="footer-logo img-fluid" loading="lazy">
          </a>

          <div class="footer-heading-leaf justify-content-center justify-content-md-start mb-3">
            <i class="bi bi-flower2"></i>
          </div>

          <p class="small text-muted mb-4 leading-relaxed">
            <?= htmlspecialchars($company3) ?> is a 50+ Acre luxury township offering premium residential plots and luxury bungalows for sale situated along Airport Road &amp; Asian Highway 2, <?= htmlspecialchars($addressRegion) ?>. Featuring 40% open green spaces &amp; 30+ world class amenities.
          </p>

          <!-- RERA & Bank Loan Badges (Fit Cleanly Inside Footer Column Without Overflowing) -->
          <div class="d-flex align-items-center gap-2 gap-sm-3 mb-3 flex-wrap flex-xl-nowrap max-w-100">
            <span class="badge bg-light text-success border border-success-subtle rounded-pill  gap-2 py-2 px-2.5 shadow-xs fw-bold d-inline-flex align-items-center text-nowrap extra-small">
              <i class="bi bi-patch-check-fill text-success fs-6  me-1.5"></i><span>RERA Approved</span>
            </span>
            <span class="badge bg-light text-warning-emphasis border border-warning-subtle rounded-pill gap-2 py-2 px-2.5 shadow-xs fw-bold d-inline-flex align-items-center text-nowrap extra-small">
              <i class="bi bi-bank2 text-warning fs-6 me-1.5"></i><span>Bank Loan Approved</span>
            </span>
          </div>

        </div>
      </div>

      <!-- Column 2: QUICK LINKS (2 Sub-Columns with Generous Gaps) -->
      <div class="col-lg-3 col-md-6 border-end-lg">
        <div class="text-center mb-3">
          <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">QUICK LINKS</h6>
          <div class="footer-heading-leaf"><i class="bi bi-flower2"></i></div>
        </div>

        <div class="row g-3">
          <div class="col-6">
            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
              <li>
                <a href="<?= site_url() ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Home
                </a>
              </li>
              <li>
                <a href="<?= site_url('about-project') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> About Project
                </a>
              </li>
              <li>
                <a href="<?= site_url('plots') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Plots &amp; Bungalows
                </a>
              </li>
              <li>
                <a href="<?= site_url('reviews') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Customer Reviews
                </a>
              </li>
              <li>
                <a href="<?= site_url('testimonials') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Testimonials
                </a>
              </li>
            </ul>
          </div>
          <div class="col-6">
            <ul class="list-unstyled mb-0 d-flex flex-column gap-3">
              <li>
                <a href="<?= site_url('faqs') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> FAQ's
                </a>
              </li>
              <li>
                <a href="<?= site_url('blogs') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Blog
                </a>
              </li>
              <li>
                <a href="<?= site_url('gallery') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Photo Gallery
                </a>
              </li>
              <li>
                <a href="<?= site_url('video-gallery') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Video Gallery
                </a>
              </li>
              <li>
                <a href="<?= site_url('contact-us') ?>" class="footer-nav-link gap-2">
                  <i class="bi bi-chevron-right text-warning fs-7"></i> Contact Us
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Column 3: CONTACT DETAILS (Spacious Spacing) -->
      <div class="col-lg-3 col-md-6 border-end-lg">
        <div class="text-center mb-3">
          <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">CONTACT DETAILS</h6>
          <div class="footer-heading-leaf"><i class="bi bi-flower2"></i></div>
        </div>

        <div class="d-flex flex-column gap-3 pt-1">
          <!-- Phone -->
          <a <?= $phonehtml ?> class="footer-contact-item d-flex align-items-center gap-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-telephone-fill fs-6"></i>
            </div>
            <span class="fw-semibold text-break"><?= $phone ?></span>
          </a>

          <!-- Email -->
          <a href="<?= $mailhtml ?>" class="footer-contact-item d-flex align-items-center gap-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-envelope-fill fs-6"></i>
            </div>
            <span class="fw-semibold text-break"><?= $mail ?></span>
          </a>

          <!-- Address -->
          <div class="footer-contact-item d-flex align-items-start gap-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1">
              <i class="bi bi-geo-alt-fill fs-6"></i>
            </div>
            <span class="small lh-base"><?= $address ?></span>
          </div>

          <!-- Timing -->
          <div class="footer-contact-item d-flex align-items-center gap-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-clock-fill fs-6"></i>
            </div>
            <span class="small fw-semibold">Mon - Sat: 10:00 AM - 6:00 PM</span>
          </div>
        </div>
      </div>

      <!-- Column 4: NEWSLETTER & COLORFUL FOLLOW US -->
      <div class="col-lg-3 col-md-6">
        <div class="text-center mb-3">
          <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">NEWSLETTER</h6>
          <div class="footer-heading-leaf"><i class="bi bi-flower2"></i></div>
        </div>

        <p class="small text-muted text-center mb-3 leading-relaxed">
          Subscribe to get latest updates, exclusive offers and news.
        </p>

        <!-- Newsletter Input Box -->
        <form action="<?= site_url('contacts/quote_send') ?>" method="POST" class="mb-3" onsubmit="submitNewsletterForm(event, this)">
          <div class="input-group shadow-xs rounded-3 overflow-hidden">
            <input type="email" name="email" class="form-control form-control-sm bg-light border-end-0 px-3 py-2" placeholder="Enter your email" required>
            <button class="btn btn-success btn-sm px-3" type="submit">
              <i class="bi bi-send-fill"></i>
            </button>
          </div>
          <div id="newsletterResultBox" class="mt-2"></div>
        </form>

        <!-- Follow Us Section (Colorful Social Icons with Gaps) -->
        <div class="text-center mb-2">
          <h6 class="text-uppercase fw-bold text-success tracking-wide mb-1">FOLLOW US</h6>
          <div class="footer-heading-leaf"><i class="bi bi-flower2"></i></div>
        </div>

        <div class="d-flex align-items-center justify-content-center gap-3 pt-2">
          <a href="<?= $facebookhtml ?>" class="social-circle-btn social-facebook" title="Facebook" aria-label="Facebook"><i class="bi bi-facebook fs-6"></i></a>
          <a href="<?= $instagramhtml ?>" class="social-circle-btn social-instagram" title="Instagram" aria-label="Instagram"><i class="bi bi-instagram fs-6"></i></a>
          <a href="<?= $youtubehtml ?>" class="social-circle-btn social-youtube" title="YouTube" aria-label="YouTube"><i class="bi bi-youtube fs-6"></i></a>
          <a href="<?= $linkedinhtml ?>" class="social-circle-btn social-linkedin" title="LinkedIn" aria-label="LinkedIn"><i class="bi bi-linkedin fs-6"></i></a>
        </div>

      </div>

    </div>

    <!-- 5-FEATURE HORIZONTAL STRIP (5 in 1 Row on Desktop, 2 in 1 Row on Mobile) -->
    <div class="card border-0 rounded-4 shadow-sm p-3 p-md-4 bg-light mb-5">
      <div class="row g-3 g-md-4 align-items-center justify-content-center text-center">
        
        <div class="col-lg col-md-4 col-6">
          <div class="d-flex align-items-center justify-content-center gap-2 gap-md-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-shield-check fs-5"></i>
            </div>
            <div class="text-start">
              <div class="fw-bold text-dark extra-small text-md-small lh-sm">Secure Investment</div>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-4 col-6">
          <div class="d-flex align-items-center justify-content-center gap-2 gap-md-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-file-earmark-check fs-5"></i>
            </div>
            <div class="text-start">
              <div class="fw-bold text-dark extra-small text-md-small lh-sm">Clear Legality</div>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-4 col-6">
          <div class="d-flex align-items-center justify-content-center gap-2 gap-md-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-tree-fill fs-5"></i>
            </div>
            <div class="text-start">
              <div class="fw-bold text-dark extra-small text-md-small lh-sm">Premium Amenities</div>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-4 col-6">
          <div class="d-flex align-items-center justify-content-center gap-2 gap-md-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-patch-check-fill fs-5"></i>
            </div>
            <div class="text-start">
              <div class="fw-bold text-dark extra-small text-md-small lh-sm">50+ Acres Township</div>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-4 col-6">
          <div class="d-flex align-items-center justify-content-center gap-2 gap-md-3">
            <div class="footer-icon-circle rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
              <i class="bi bi-graph-up-arrow fs-5"></i>
            </div>
            <div class="text-start">
              <div class="fw-bold text-dark extra-small text-md-small lh-sm">High Return ROI</div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- REAL ESTATE DISCLAIMER & COPYRIGHT BAR (Compact Width & Generous Bottom Space for Floating Buttons) -->
    <div class="pt-4 border-top">
      <div class="container px-0">
        <h6 class="fw-bold text-success text-uppercase small mb-2 d-flex align-items-center gap-2">
          <i class="bi bi-exclamation-triangle-fill text-warning"></i> REAL ESTATE DISCLAIMER
        </h6>
        <p class="small text-muted mb-4 leading-relaxed text-justify">
          <strong>Disclaimer :</strong> The information and visuals presented on this website are intended exclusively for general informational and marketing purposes and do not constitute a legal offer, binding contract, or warranty. All layouts, plot dimensions, floor plans, specifications, artistic renderings, and amenity details are indicative and subject to change or revision without prior notice as required by competent authorities or under the provisions of the West Bengal Real Estate Regulatory Authority (WBRERA). Pricing and unit availability are dynamic and subject to confirmation at the time of booking. Prospective buyers are advised to verify all project approvals, sanction plans, title deeds, and terms directly with our official sales office before entering into any transaction. <strong>WBRERA Project Registration No: WBRERA/P/DAR/2024/000188</strong>. All Rights Reserved.
        </p>

        <!-- BOTTOM BAR: COPYRIGHT & LEGAL LINKS (Tight & Compact Spacing) -->
        <div class="pt-3 pb-3 mb-1 border-top d-flex justify-content-between align-items-center flex-column flex-md-row gap-3 text-center text-md-start">
          <div class="small text-muted">
            &copy; <?= date('Y') ?> <strong class="text-success"><?= htmlspecialchars($company3) ?></strong>. All Rights Reserved.
          </div>

          <div class="d-flex flex-wrap justify-content-center gap-3 small">
            <a href="<?= site_url('privacy-policy') ?>" class="footer-policy-link">Privacy Policy</a>
            <span class="text-muted">|</span>
            <a href="<?= site_url('terms-and-conditions') ?>" class="footer-policy-link">Terms &amp; Conditions</a>
            <span class="text-muted">|</span>
            <a href="<?= site_url('legal-disclaimer') ?>" class="footer-policy-link">Legal Disclaimer</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</footer>

<!-- FLOATING ACTION BUTTONS (Left & Right Layout matching Image 2) -->
<!-- Floating WhatsApp Button (Bottom Left) -->
<a href="<?= $floatingWhatsappLink ?>" class="btn rounded-circle shadow-lg position-fixed bottom-0 start-0 m-3 m-md-4 d-flex align-items-center justify-content-center border-0 text-white float-circle-btn float-btn-whatsapp-left" title="WhatsApp Us" target="_blank" rel="noopener" aria-label="Message <?= $company3 ?> on WhatsApp">
  <i class="bi bi-whatsapp fs-3"></i>
</a>

<!-- Floating Call Button (Bottom Right) -->
<a <?= $phonehtml ?> class="btn rounded-circle shadow-lg position-fixed bottom-0 end-0 m-3 m-md-4 d-flex align-items-center justify-content-center border-0 text-white float-circle-btn float-btn-call-right" title="Call Now" aria-label="Call <?= $company3 ?> now">
  <i class="bi bi-telephone-fill fs-4"></i>
</a>

<?php $thisloadview = $this->load->view('contacts/quotemodal'); ?>
<?php $thisloadview2 = $this->load->view('contacts/review_modal'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/js/form.js"></script>
<script>
function submitNewsletterForm(e, form) {
  e.preventDefault();
  var resultBox = document.getElementById('newsletterResultBox');
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
        '<span class="fw-bold extra-small text-success">Thank you! Your email has been subscribed successfully.</span>' +
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
</body>

</html>