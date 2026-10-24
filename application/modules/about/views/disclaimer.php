<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'Legal Disclaimer',
    'bc_desc' => 'Important regulatory information and legal disclaimer for website visitors and plot & bungalow buyers.',
    'breadcrumbs' => [
        ['name' => 'Legal Disclaimer']
    ]
]);
?>

<!-- LEGAL DISCLAIMER CONTENT SECTION -->
<section class="py-5 bg-light">
  <div class="container py-2">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-11">
        <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5 bg-white">
          
          <!-- Header Bar -->
          <div class="border-bottom pb-4 mb-4">
          
            <h2 class="h2 fw-bold text-dark mb-3">REAL ESTATE LEGAL DISCLAIMER</h2>
            <p class="text-secondary leading-relaxed mb-0">
              The information and materials provided on this website are intended exclusively for general informational and marketing purposes and should not be construed as a binding legal offer or contract. The Gardenia Estate is a luxury plotted and bungalow development in Bagdogra, Siliguri registered under the West Bengal Real Estate Regulatory Authority (WBRERA Reg No: <strong>WBRERA/P/DAR/2024/000188</strong>).
            </p>
          </div>

          <!-- Section 1: Official Project Representation -->
          <div class="mb-4">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-patch-check-fill text-success"></i> 1. Official Project Representation &amp; WBRERA Compliance
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              This website serves as the official digital marketing platform for <strong>The Gardenia Estate</strong>. All communications, site visit arrangements, cost sheet distribution, and booking documentation are conducted directly through our authorized sales advisory team and verified developers. All transactions, plot allocations, and bungalow sales are subject to official sale agreements and conveyance deeds executed directly with the project developers.
            </p>
          </div>

          <!-- Section 2: Informational Purpose & Accuracy -->
          <div class="mb-4">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-info-circle-fill text-success"></i> 2. Informational &amp; Non-Binding Notice
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              While we strive to ensure that all information, master plans, plot dimensions, and amenity details displayed on this website are accurate and up-to-date, users should independently verify all project details with the sales office or official RERA portal prior to making any financial commitments, plot bookings, or bungalow purchases. Neither the owner nor the website operators shall be held liable for decisions made based solely on the content published on this site.
            </p>
          </div>

          <!-- Section 3: Visual Representations & Artistic Impressions -->
          <div class="mb-4">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-eye-fill text-success"></i> 3. Artistic Impressions &amp; 3D Renderings
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              Images, 3D architectural floor plans, landscape illustrations, stock photos, and conceptual layouts featured on this website are artistic impressions meant solely for representational and illustrative purposes. Actual layout development, road widths, tree plantations, park landscaping, and physical boundary setups may vary during actual execution as governed by final approved sanction plans.
            </p>
          </div>

          <!-- Section 4: Pricing, Availability & Launch Discounts -->
          <div class="mb-4">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-tags-fill text-success"></i> 4. Plot &amp; Bungalow Pricing &amp; Availability
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              Plot and bungalow prices, pre-launch discounts, payment plans, bank EMI options, and unit availability mentioned on the site are subject to change without prior notice. Final pricing, PLC (Preferential Location Charges), statutory taxes, registration charges, and allotment numbers will be finalized strictly upon execution of formal allotment letters and booking cost sheets.
            </p>
          </div>

          <!-- Section 5: Data Privacy & Communications Consent -->
          <div class="mb-4">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-lock-fill text-success"></i> 5. Data Collection &amp; Communications Consent
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              By filling out inquiry forms, requesting callback services, or submitting phone/email details on this website, you explicitly authorize <strong>The Gardenia Estate</strong> and our authorized sales advisory team to contact you via Phone Call, SMS, Email, or WhatsApp. We may share your inquiry details with partner financial institutions (banks) for processing home loan pre-approvals and site visit coordination as requested by you.
            </p>
          </div>

          <!-- Section 6: Copyrights & Legal Ownership -->
          <div class="pt-3 border-top">
            <h3 class="h5 fw-bold text-success mb-3 text-uppercase d-flex align-items-center gap-2">
              <i class="bi bi-c-circle-fill text-success"></i> 6. Copyrights &amp; Trademarks
            </h3>
            <p class="text-secondary leading-relaxed mb-0">
              All content, logos, graphics, brand names, and page layouts are protected under applicable intellectual property laws. &copy; <?= date('Y') ?> <strong>The Gardenia Estate</strong>. All Rights Reserved.
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
