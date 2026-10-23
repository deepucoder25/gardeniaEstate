<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$services = [
    [
        'title_part1' => 'Home',
        'title_part2' => 'Shifting',
        'image' => 'home-shifting-services.webp',
        'desc' => 'Professional home shifting services to carefully transport all your household belongings with care and precision.',
        'link' => 'home-shifting'
    ],
    [
        'title_part1' => 'Office',
        'title_part2' => 'Relocation',
        'image' => 'office-relocation-services.webp',
        'desc' => 'Seamless office relocation services designed to minimize disruption and ensure a smooth business transition.',
        'link' => 'office-relocation'
    ],
    [
        'title_part1' => 'Car',
        'title_part2' => 'Transportation',
        'image' => 'car-transportation-services.webp',
        'desc' => 'Safe and reliable car transportation services to ensure your vehicle reaches its destination without hassle.',
        'link' => 'car-transportation'
    ],
    [
        'title_part1' => 'Bike',
        'title_part2' => 'Transportation',
        'image' => 'bike-transportation-services.webp',
        'desc' => 'Efficient bike transportation services tailored to ensure your bike reaches its destination safely and on time.',
        'link' => 'bike-transportation'
    ],
    [
        'title_part1' => 'Warehouse',
        'title_part2' => '& Storage',
        'image' => 'warehouse-storage-services.webp',
        'desc' => 'Safe and spacious warehouse and storage solutions to store your goods for short or long-term durations.',
        'link' => 'warehouse-and-storage'
    ],
    [
        'title_part1' => 'Domestic',
        'title_part2' => 'Relocation',
        'image' => 'domestic-relocation-services.webp',
        'desc' => 'Comprehensive domestic relocation services to make moving within the country seamless and stress-free.',
        'link' => 'domestic-relocation'
    ],
    [
        'title_part1' => 'International',
        'title_part2' => 'Shifting',
        'image' => 'international-shifting-services.webp',
        'desc' => 'Expert international shifting services for smooth and stress-free cross-border relocations worldwide.',
        'link' => 'international-shifting'
    ],
    [
        'title_part1' => 'Corporate',
        'title_part2' => 'Shifting',
        'image' => 'corporate-shifting-services.webp',
        'desc' => 'Efficient corporate shifting solutions designed to minimize downtime and ensure smooth business transitions.',
        'link' => 'corporate-shifting'
    ],
    [
        'title_part1' => 'Intercity',
        'title_part2' => 'Shifting',
        'image' => 'intercity-shifting-services.webp',
        'desc' => 'Reliable intercity shifting services to move your goods securely between different cities with ease.',
        'link' => 'intercity-shifting'
    ],
    [
        'title_part1' => 'Local',
        'title_part2' => 'Shifting',
        'image' => 'local-shifting-services.webp',
        'desc' => 'Quick and efficient local shifting services to transport your belongings within the city, hassle-free.',
        'link' => 'local-shifting'
    ],
    [
        'title_part1' => 'Logistic',
        'title_part2' => 'Services',
        'image' => 'logistic-services.webp',
        'desc' => 'Comprehensive logistic services to handle all your transportation and supply chain needs with efficiency.',
        'link' => 'logistic-services'
    ],
    [
        'title_part1' => 'Pet',
        'title_part2' => 'Relocation',
        'image' => 'pet-relocation-services.webp',
        'desc' => 'Caring and secure pet relocation services to ensure your pets travel comfortably and safely to any destination.',
        'link' => 'pet-relocation'
    ],
];
?>

<section class="services-section py-5">
    <!-- Background Decor Elements -->
    <div class="services-decor decor-top-left"></div>
    <div class="services-decor decor-top-right"></div>
    <div class="services-decor decor-bottom-right"></div>

    <div class="container position-relative home-service-widget-container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <div class="header-title-wrap d-flex align-items-center justify-content-center">
                <span class="header-line left-line"></span>
                <span class="header-dot left-dot"></span>
                <h2 class="section-title mx-3">OUR SERVICES</h2>
                <span class="header-dot right-dot"></span>
                <span class="header-line right-line"></span>
            </div>
            <div class="header-truck-wrap">
                <div class="truck-icon-container">
                    <span class="speed-line line-1"></span>
                    <span class="speed-line line-2"></span>
                    <span class="speed-line line-3"></span>
                    <i class="bi bi-truck truck-icon"></i>
                </div>
            </div>
        </div>

        <!-- Grid of Services -->
        <div class="row g-4 mt-2">
            <?php foreach ($services as $service): ?>
                <div class="col-lg-3 col-md-6 col-12 d-flex">
                    <div class="srv-card w-100 d-flex flex-column">
                        <div class="srv-icon-wrap">
                            <img src="<?= base_url('assets/images/services_modules/' . $service['image']) ?>" alt="<?= htmlspecialchars($service['title_part1'] . ' ' . $service['title_part2']) ?> - The Gardenia Estate Services" class="img-fluid" loading="lazy" onerror="this.src='<?= base_url('assets/images/about/packers_movers.jpg') ?>'">
                        </div>
                        <div class="srv-title"><?= htmlspecialchars($service['title_part1']) ?> <?= htmlspecialchars($service['title_part2']) ?></div>
                        <div class="srv-desc flex-grow-1"><?= htmlspecialchars($service['desc']) ?></div>
                        <a href="<?= site_url($service['link']) ?>" class="srv-link">Read more <?= strtolower($service['title_part1']) ?>..</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


