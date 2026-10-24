<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Breadcrumbs Section -->
<?php $this->load->view('about/dynamic_breadcrumbs', [
    'bc_h1' => 'About ' . $company3,
    'breadcrumbs' => [
        ['name' => 'About Us']
    ]
]);
?>

<!-- ABOUT CONTENT SECTION -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-11">
                
                <h2 class="fw-bold text-dark mb-2">About <?= htmlspecialchars($company3) ?></h2>
                <h6 class="text-success fw-bold mb-4"><?= htmlspecialchars($company3) ?> - Luxury Residential Plots &amp; Bungalows For Sale in Bagdogra, Siliguri.</h6>

                <p class="text-secondary mb-4 leading-relaxed">
                    Bagdogra, a vibrant and rapidly expanding suburb in Siliguri, North Bengal, has emerged as the premier destination for real estate investments, particularly in luxury residential plots and exclusive bungalows. Its strategic location at the foothills of the Himalayas, proximity to Bagdogra International Airport, and seamless connectivity to the Asian Highway network make it an attractive choice for smart investors and homebuyers seeking bespoke plotted living and luxury bungalows.
                </p>

                <!-- Strategic Location and Connectivity -->
                <h4 class="fw-bold text-dark mb-3">Strategic Location and Connectivity</h4>
                <p class="text-secondary mb-2">Bagdogra’s prominence is largely attributed to its unmatched strategic positioning:</p>
                <ul class="text-secondary mb-4 ps-3">
                    <li class="mb-2"><strong>Proximity to Bagdogra International Airport:</strong> Located just 5 to 10 minutes away, the airport provides swift domestic and regional connectivity, making travel effortless for residents and frequent flyers.</li>
                    <li class="mb-2"><strong>Asian Highway &amp; National Highway Network:</strong> Flanked by Asian Highway 2 (AH2), NH 27, and NH 31, offering smooth 4-lane access to Siliguri city center, Darjeeling, Gangtok, Dooars, and Kolkata.</li>
                    <li class="mb-2"><strong>Railway &amp; Transit Hubs:</strong> Easy reach to Bagdogra Railway Station and New Jalpaiguri (NJP) Railway Junction, the primary rail transit lifeline connecting North Bengal and the Northeast to the rest of India.</li>
                </ul>

                <!-- Thriving Real Estate Market -->
                <h4 class="fw-bold text-dark mb-3">Thriving Real Estate Market</h4>
                <p class="text-secondary mb-2">The real estate landscape in Bagdogra &amp; Siliguri has witnessed transformative growth:</p>
                <ul class="text-secondary mb-4 ps-3">
                    <li class="mb-2"><strong>Customizable Plots &amp; Luxury Bungalows:</strong> The project offers a versatile selection of residential plots (1200, 1500, and 2400 sq.ft) and standalone luxury bungalows designed for bespoke contemporary living.</li>
                    <li class="mb-2"><strong>Rapid Capital Appreciation:</strong> As Siliguri expands westward towards the airport and university corridors, land and bungalow values in Bagdogra continue to deliver outstanding returns.</li>
                    <li class="mb-2"><strong>Lush Green Township &amp; 30+ Amenities:</strong> Designed as a 50+ acre luxury gated township featuring 40% open green landscapes, wide internal asphalt roads, underground utilities, and 24/7 security.</li>
                </ul>

                <!-- CENTERED COMPACT IMAGE IN THE MIDDLE OF CONTENT -->
                <div class="my-5 row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-7 text-center">
                        <div class="rounded-4 overflow-hidden shadow-sm">
                            <img src="<?= base_url('assets/images/slider/gardenia_hero.webp') ?>" alt="<?= htmlspecialchars($company3) ?> - Luxury Plotted Development Aerial View Bagdogra Siliguri" class="img-fluid rounded-4 w-100" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Economic and Employment Hubs -->
                <h4 class="fw-bold text-dark mb-3">Economic and Institutional Hubs</h4>
                <p class="text-secondary mb-2">Several key institutions and growth drivers anchor Bagdogra’s economic future:</p>
                <ul class="text-secondary mb-4 ps-3">
                    <li class="mb-2"><strong>University of North Bengal (NBU):</strong> Located just minutes away, providing a premier academic atmosphere and driving steady residential rental and housing demand.</li>
                    <li class="mb-2"><strong>North Bengal Medical College &amp; Hospital (NBMCH):</strong> Reputed healthcare and medical hub ensuring quality healthcare infrastructure within easy reach.</li>
                    <li class="mb-2"><strong>New International Airport Terminal:</strong> The massive upcoming terminal expansion at Bagdogra Airport is set to multiply regional passenger and logistics capacity.</li>
                </ul>

                <!-- Investment Potential -->
                <h4 class="fw-bold text-dark mb-3">Investment Potential</h4>
                <p class="text-secondary mb-2">Investing in plots and bungalows at <?= htmlspecialchars($company3) ?> in <?= htmlspecialchars($addressRegion) ?> offers clear advantages:</p>
                <ul class="text-secondary mb-4 ps-3">
                    <li class="mb-2"><strong>High Returns on Investment:</strong> Rapid infrastructure expansion, highway upgrades, and airport development guarantee strong long-term appreciation.</li>
                    <li class="mb-2"><strong>Clear Legal Titles &amp; Approvals:</strong> Complete peace of mind with verified land ownership, RERA compliance, and streamlined bank loan processing.</li>
                    <li class="mb-2"><strong>Serene Hill-Gateway Living:</strong> Enjoy clean air, panoramic tea estate views, and proximity to Darjeeling and Sikkim, making it ideal for both primary homes and luxury holiday bungalows.</li>
                </ul>

                <!-- Conclusion -->
                <h4 class="fw-bold text-dark mb-3">Conclusion</h4>
                <p class="text-secondary mb-0 leading-relaxed">
                    Bagdogra stands out as the most promising real estate destination in North Bengal. Its strategic location, robust transportation infrastructure, and scenic natural environment make it an ideal choice for investors seeking solid capital gains and homebuyers seeking a peaceful, well-connected community. Investing in plots and luxury bungalows at <?= htmlspecialchars($company3) ?> represents an exceptional opportunity for long-term prosperity.
                </p>

            </div>
        </div>

    </div>
</section>