<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- BREADCRUMBS FOR DEDICATED FAQ PAGE -->
<?php if (isset($show_breadcrumbs) && $show_breadcrumbs): ?>
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Frequently Asked Questions',
    'bc_desc' => 'Find quick answers to common queries about plot sizes, pricing, possession, and booking.',
    'breadcrumbs' => [
        ['name' => 'FAQ']
    ]
]);
?>
<?php endif; ?>

<!-- DEDICATED FAQ ACCORDION SECTION -->
<section class="py-5 bg-light position-relative" id="dedicatedFaqSection">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="text-center mb-5 max-w-800 mx-auto">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">GOT QUESTIONS?</span>
      <h2 class="display-6 fw-bold text-dark mb-2">Frequently Asked Questions</h2>
      <p class="text-secondary fs-6 mb-0">Browse answers to common queries regarding plot investments, RERA approvals, and payment options.</p>
    </div>

    <!-- 2 ACCORDION COLUMNS ON DESKTOP (col-md-6) & 1 ON MOBILE (col-12) -->
    <div class="row g-4">
      
      <!-- Column 1 Accordions -->
      <div class="col-12 col-md-6">
        <div class="accordion custom-accordion-list" id="faqAccordionCol1">
          
          <!-- FAQ 1 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading1">
              <button class="accordion-button fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse1" aria-expanded="true" aria-controls="faqPageCollapse1">
                <i class="bi bi-question-circle-fill text-success me-3 fs-5 flex-shrink-0"></i>
                <span>What plot sizes are available at The Gardenia Estate?</span>
              </button>
            </h3>
            <div id="faqPageCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqPageHeading1" data-bs-parent="#faqAccordionCol1">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                The Gardenia Estate offers multiple plot dimensions:
                <ul class="mt-2 mb-0 ps-3">
                  <li><strong>1200 Sq.Ft</strong> (30 ft x 40 ft)</li>
                  <li><strong>1500 Sq.Ft</strong> (30 ft x 50 ft)</li>
                  <li><strong>2400 Sq.Ft</strong> (40 ft x 60 ft)</li>
                  <li>Custom odd dimensions and corner plot options.</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- FAQ 2 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading2">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse2" aria-expanded="false" aria-controls="faqPageCollapse2">
                <i class="bi bi-geo-alt-fill text-success me-3 fs-5 flex-shrink-0"></i>
                <span>Where is The Gardenia Estate located?</span>
              </button>
            </h3>
            <div id="faqPageCollapse2" class="accordion-collapse collapse" aria-labelledby="faqPageHeading2" data-bs-parent="#faqAccordionCol1">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                The project is strategically located along the <strong>Satellite Town Ring Road (STRR) in Devanahalli, Bengaluru</strong>. It is just 15 minutes drive from Kempegowda International Airport (KIAB) and 10 minutes from major IT/Aerospace hubs.
              </div>
            </div>
          </div>

          <!-- FAQ 3 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-0 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading3">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse3" aria-expanded="false" aria-controls="faqPageCollapse3">
                <i class="bi bi-file-earmark-check-fill text-success me-3 fs-5 flex-shrink-0"></i>
                <span>What is the booking process for a plot?</span>
              </button>
            </h3>
            <div id="faqPageCollapse3" class="accordion-collapse collapse" aria-labelledby="faqPageHeading3" data-bs-parent="#faqAccordionCol1">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                The booking process is seamless:
                <ol class="mt-2 mb-0 ps-3">
                  <li>Schedule a free site visit using our contact form or phone call.</li>
                  <li>Select your preferred plot number and orientation on the master layout map.</li>
                  <li>Pay an initial booking amount to block your plot.</li>
                  <li>Complete bank loan processing and execute plot registration.</li>
                </ol>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Column 2 Accordions -->
      <div class="col-12 col-md-6">
        <div class="accordion custom-accordion-list" id="faqAccordionCol2">
          
          <!-- FAQ 4 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading4">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse4" aria-expanded="false" aria-controls="faqPageCollapse4">
                <i class="bi bi-cash-stack text-success me-3 fs-5 flex-shrink-0"></i>
                <span>What is the starting price for residential plots?</span>
              </button>
            </h3>
            <div id="faqPageCollapse4" class="accordion-collapse collapse" aria-labelledby="faqPageHeading4" data-bs-parent="#faqAccordionCol2">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                Pre-launch prices start at competitive rates for 1200 Sq.Ft plots. Special launch discounts and easy EMI financing options (up to 80% bank loan approval from leading banks like HDFC, ICICI, and SBI) are currently available for early bookings.
              </div>
            </div>
          </div>

          <!-- FAQ 5 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading5">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse5" aria-expanded="false" aria-controls="faqPageCollapse5">
                <i class="bi bi-key-fill text-success me-3 fs-5 flex-shrink-0"></i>
                <span>What is the possession status of the plots?</span>
              </button>
            </h3>
            <div id="faqPageCollapse5" class="accordion-collapse collapse" aria-labelledby="faqPageHeading5" data-bs-parent="#faqAccordionCol2">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                The project is fully RERA approved with completed layout infrastructure (roads, underground power, water lines). Plots are <strong>ready for immediate registration and villa construction</strong>.
              </div>
            </div>
          </div>

          <!-- FAQ 6 -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-0 overflow-hidden bg-white">
            <h3 class="accordion-header" id="faqPageHeading6">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#faqPageCollapse6" aria-expanded="false" aria-controls="faqPageCollapse6">
                <i class="bi bi-shield-check text-success me-3 fs-5 flex-shrink-0"></i>
                <span>Is the project RERA approved and bank loan eligible?</span>
              </button>
            </h3>
            <div id="faqPageCollapse6" class="accordion-collapse collapse" aria-labelledby="faqPageHeading6" data-bs-parent="#faqAccordionCol2">
              <div class="accordion-body px-4 pb-4 pt-0 text-secondary small leading-relaxed">
                Yes, The Gardenia Estate is 100% RERA approved with 100% clear title. Home loans up to 80% are pre-approved by leading nationalized and private banks including SBI, HDFC, ICICI, and Axis Bank.
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>

