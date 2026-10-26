<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- FAQ SECTION (2-Column Layout with Image on Left & Accordion FAQs on Right) -->
<style>
.faq-img-card {
  min-height: 380px;
  position: relative;
}

.faq-img-card::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.05) 0%, rgba(5, 20, 15, 0.35) 40%, rgba(4, 18, 13, 0.92) 80%, #03120C 100%);
  pointer-events: none;
  border-radius: inherit;
}

.faq-promo-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 2.25rem 1.75rem 1.75rem 1.75rem;
  z-index: 3;
}

.faq-promo-title {
  color: #ffffff !important;
  font-size: 1.45rem;
  font-weight: 800;
  letter-spacing: -0.3px;
  margin-bottom: 0.4rem;
  text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9);
}

.faq-promo-desc {
  color: #F8FAFC !important;
  font-size: 0.95rem;
  font-weight: 500;
  line-height: 1.55;
  margin-bottom: 1.25rem;
  text-shadow: 0 1px 6px rgba(0, 0, 0, 0.9);
}

.faq-promo-btn {
  background: #F59E0B !important;
  color: #0F172A !important;
  font-weight: 700 !important;
  font-size: 0.9rem;
  padding: 0.55rem 1.25rem;
  border-radius: 50rem;
  border: none;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.35);
  transition: all 0.25s ease;
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  text-decoration: none;
}

.faq-promo-btn:hover {
  background: #D97706 !important;
  color: #ffffff !important;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.45);
}
</style>

<section class="faqs-section py-5 bg-light position-relative" id="estateFaqSection">
  <div class="container py-3">
    
    <!-- Section Header -->
    <div class="text-center mb-5">
      <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-2 text-uppercase">Got Questions?</span>
      <h2 class="display-6 fw-bold text-dark mb-2">Frequently Asked Questions</h2>
      <p class="text-muted fs-6">Find quick answers to common queries about plot sizes, pricing, possession, and booking.</p>
    </div>

    <div class="row g-4 align-items-stretch">
      
      <!-- LEFT COLUMN: Image Card -->
      <div class="col-lg-5 col-md-12">
        <div class="card border-0 rounded-4 overflow-hidden shadow-sm h-100 faq-img-card">
          <img src="<?= base_url('assets/images/slider/gardenia_hero.webp') ?>" alt="<?= htmlspecialchars($company3) ?> FAQ &amp; Investment Guide Banner" class="img-fluid w-100 h-100 object-fit-cover" loading="lazy">
          <div class="faq-promo-overlay text-white">
            <h5 class="faq-promo-title">Have More Questions?</h5>
            <p class="faq-promo-desc">Our dedicated estate advisory team is available 24/7 to guide your investment.</p>
            <a href="<?= site_url('contact-us') ?>" class="faq-promo-btn">
              <i class="bi bi-telephone-fill"></i> Speak to Advisor
            </a>
          </div>
        </div>
      </div>

      <!-- RIGHT COLUMN: Accordion with Expanded FAQs -->
      <div class="col-lg-7 col-md-12">
        <div class="accordion custom-estate-faq" id="estateFaqAccordion">
          
          <!-- Q1: Plot sizes? -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading1">
              <button class="accordion-button fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="true" aria-controls="faqCollapse1">
                <i class="bi bi-question-circle-fill text-success me-3 fs-5"></i> What plot and bungalow options are available for sale?
              </button>
            </h3>
            <div id="faqCollapse1" class="accordion-collapse collapse show" aria-labelledby="faqHeading1" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                <?= htmlspecialchars($company3) ?> offers premium residential plots and luxury bungalows for sale:
                <ul class="mt-2 mb-0 ps-3">
                  <li><strong>Residential Plots:</strong> 1200 Sq.Ft (30x40), 1500 Sq.Ft (30x50), and 2400 Sq.Ft (40x60).</li>
                  <li><strong>Luxury Bungalows:</strong> 3 BHK and 4 BHK standalone bungalows built on 1500 to 2400 Sq.Ft plots with private gardens.</li>
                  <li><strong>Commercial Plots:</strong> High-visibility plots along the Asian Highway 2 corridor.</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Q2: Starting price? -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading2">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                <i class="bi bi-cash-stack text-success me-3 fs-5"></i> What is the starting price for plots and bungalows?
              </button>
            </h3>
            <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                Pre-launch prices start at <strong>&#8377;1.2 Cr*</strong> for 1200 Sq.Ft plots and customizable luxury bungalows. Special launch discounts and easy EMI financing options (up to 80% bank loan approval from leading banks like HDFC, ICICI, and SBI) are currently available for early bookings.
              </div>
            </div>
          </div>

          <!-- Q3: Location? -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading3">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                <i class="bi bi-geo-alt-fill text-success me-3 fs-5"></i> Where is <?= htmlspecialchars($company3) ?> located?
              </button>
            </h3>
            <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                The project is strategically located along the <strong>Asian Highway 2 &amp; Airport corridor in Bagdogra, Siliguri</strong>. It is just 5 to 10 minutes drive from Bagdogra International Airport (IXB) and conveniently connected to Siliguri city and North Bengal University.
              </div>
            </div>
          </div>

          <!-- Q4: Possession? -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading4">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse4" aria-expanded="false" aria-controls="faqCollapse4">
                <i class="bi bi-key-fill text-success me-3 fs-5"></i> What is the possession status of the plots?
              </button>
            </h3>
            <div id="faqCollapse4" class="accordion-collapse collapse" aria-labelledby="faqHeading4" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                The project is fully RERA approved with completed layout infrastructure (roads, underground power, water lines). Plots are <strong>ready for immediate registration and villa construction</strong>.
              </div>
            </div>
          </div>

          <!-- Q5: Booking process? -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading5">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse5" aria-expanded="false" aria-controls="faqCollapse5">
                <i class="bi bi-file-earmark-check-fill text-success me-3 fs-5"></i> What is the booking process for a plot or bungalow?
              </button>
            </h3>
            <div id="faqCollapse5" class="accordion-collapse collapse" aria-labelledby="faqHeading5" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                The booking process is seamless:
                <ol class="mt-2 mb-0 ps-3">
                  <li>Schedule a free site visit using our contact form or phone call.</li>
                  <li>Select your preferred plot or bungalow unit on the master layout map.</li>
                  <li>Pay an initial booking amount to block your property.</li>
                  <li>Complete bank loan processing and execute official registration.</li>
                </ol>
              </div>
            </div>
          </div>

          <!-- Q6: RERA & Bank Approval -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-3 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading6">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse6" aria-expanded="false" aria-controls="faqCollapse6">
                <i class="bi bi-shield-check text-success me-3 fs-5"></i> Is the project RERA approved and bank loan eligible?
              </button>
            </h3>
            <div id="faqCollapse6" class="accordion-collapse collapse" aria-labelledby="faqHeading6" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                Yes, <?= htmlspecialchars($company3) ?> is 100% WBRERA approved (Reg No: <strong>WBRERA/P/DAR/2024/000188</strong>) with 100% clear title. Home loans up to 80% are pre-approved by leading nationalized and private banks including SBI, HDFC, ICICI, and Axis Bank.
              </div>
            </div>
          </div>

          <!-- Q7: Infrastructure & Amenities -->
          <div class="accordion-item border-0 rounded-4 shadow-sm mb-0 overflow-hidden">
            <h3 class="accordion-header" id="faqHeading7">
              <button class="accordion-button collapsed fw-bold text-dark fs-6 py-3 px-4 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse7" aria-expanded="false" aria-controls="faqCollapse7">
                <i class="bi bi-tree-fill text-success me-3 fs-5"></i> What infrastructure &amp; amenities are included in the township?
              </button>
            </h3>
            <div id="faqCollapse7" class="accordion-collapse collapse" aria-labelledby="faqHeading7" data-bs-parent="#estateFaqAccordion">
              <div class="accordion-body px-4 pb-4 pt-0 text-muted leading-relaxed">
                The township features wide asphalt roads, underground electrical &amp; cabling, 24/7 security with CCTV surveillance, grand clubhouse, swimming pool, landscaped parks, children’s play area, and dedicated jogging tracks across 40% open green space.
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>
