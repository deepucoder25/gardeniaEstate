<?php
$locations = [
  

    // Added from screenshot
    ["city" => "Aurangabad", "state" => "maharashtra"],
    ["city" => "Chandigarh", "state" => "chandigarh"],
    ["city" => "Dhanbad", "state" => "jharkhand"],
    ["city" => "Gwalior", "state" => "madhya-pradesh"],
    ["city" => "Hyderabad", "state" => "telangana"],
    ["city" => "Jodhpur", "state" => "rajasthan"],
    ["city" => "Kota", "state" => "rajasthan"],
    ["city" => "Meerut", "state" => "uttar-pradesh"],
    ["city" => "Navi Mumbai", "state" => "maharashtra"],
    ["city" => "Rajkot", "state" => "gujarat"],
    ["city" => "Siliguri", "state" => "west-bengal"],
    ["city" => "Vijayawada", "state" => "andhra-pradesh"],

    ["city" => "Ahmedabad", "state" => "gujarat"],
    ["city" => "Bangalore", "state" => "karnataka"],
    ["city" => "Chennai", "state" => "tamil-nadu"],
    ["city" => "Faridabad", "state" => "haryana"],
    ["city" => "Gurugram", "state" => "haryana"],
    ["city" => "Indore", "state" => "madhya-pradesh"],
    ["city" => "Jamshedpur", "state" => "jharkhand"],
    ["city" => "Mumbai", "state" => "maharashtra"],
    ["city" => "Ranchi", "state" => "jharkhand"],
    ["city" => "Surat", "state" => "gujarat"],
    ["city" => "Visakhapatnam", "state" => "andhra-pradesh"],

    ["city" => "Allahabad", "state" => "uttar-pradesh"],
    ["city" => "Bareilly", "state" => "uttar-pradesh"],
    ["city" => "Coimbatore", "state" => "tamil-nadu"],
    ["city" => "Ghaziabad", "state" => "uttar-pradesh"],
    ["city" => "Howrah", "state" => "west-bengal"],
    ["city" => "Jabalpur", "state" => "madhya-pradesh"],
    ["city" => "Ludhiana", "state" => "punjab"],
    ["city" => "Nagpur", "state" => "maharashtra"],
    ["city" => "Pune", "state" => "maharashtra"],
    ["city" => "Solapur", "state" => "maharashtra"],
    ["city" => "Vadodara", "state" => "gujarat"],

    ["city" => "Amritsar", "state" => "punjab"],
    ["city" => "Bhopal", "state" => "madhya-pradesh"],
    ["city" => "Delhi", "state" => "delhi"],
    ["city" => "Hubli-Dharwad", "state" => "karnataka"],
    ["city" => "Jaipur", "state" => "rajasthan"],
    ["city" => "Kolkata", "state" => "west-bengal"],
    ["city" => "Madurai", "state" => "tamil-nadu"],
    ["city" => "Nashik", "state" => "maharashtra"],
    ["city" => "Raipur", "state" => "chhattisgarh"],
    ["city" => "Srinagar", "state" => "jammu-and-kashmir"],
];
?>

<section class="search-location-section py-5">
    <div class="container">

        <div class="location-heading mb-4">
            <h2 class="h5 fw-bold mb-0">Search By Location</h2>
        </div>

        <div class="row g-3">
            <?php foreach ($locations as $location): 
                $citySlug = strtolower(str_replace(' ', '-', $location['city']));
                $link = $citySlug . "-packers-movers-" . $location['state'];
            ?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <ul class="location-list mb-0">
                        <li>
                            <a href="<?= site_url($link) ?>" aria-label="Packers and Movers in <?= $location['city'] ?>">
                                Packers &amp; Movers <?= $location['city'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
