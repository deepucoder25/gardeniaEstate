<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  if (!@$description) {
    $description = $company3 . " offers premium residential plots and luxury bungalows for sale in Bagdogra, Siliguri. Gated community with 30+ amenities and WBRERA approval.";
  }
  if (!@$city)
    $city = "$addressRegion";
  if (!@$state)
    $state = "$companystate";
  if (!@$img)
    $img = base_url('assets/images/logo/favicon.webp');
  $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url = ($url == site_url('home')) ? site_url() : strtolower($url);
  ?>
  <meta name="description" content="<?= @$description ?>" />
  <meta name="keywords" content="<?= @$keywords ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
  <link rel="canonical" href="<?= @$url ?>" />
  <meta name="author" content="<?= $company3 ?>" />
  <meta name="copyright" content="<?= $company3 ?>" />
  <meta name="reply-to" content="<?= $replyToMail ?>" />
  <meta name="og_title" property="og:title" content="<?= @$title ?>">
  <meta property="og:type" content="website">
  <meta name="og_site_name" property="og:site_name" content="<?= $company3 ?>" />
  <meta property="og:image" content="<?= $img ?>" />
  <meta name="og_url" property="og:url" content="<?= @$url ?>" />
  <meta property="og:description" content="<?= @$description ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="theme-color" content="<?= $themeColor ?>">
  <link rel="apple-touch-icon" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
  <meta name="apple-mobile-web-app-status-bar-style" content="<?= $themeColor ?>">
  <meta name="allow-search" content="yes" />
  <?php $stateCodes = ['Andhra Pradesh' => 'AP', 'Arunachal Pradesh' => 'AR', 'Assam' => 'AS', 'Bihar' => 'BR', 'Chhattisgarh' => 'CG', 'Goa' => 'GA', 'Gujarat' => 'GJ', 'Haryana' => 'HR', 'Himachal Pradesh' => 'HP', 'Jharkhand' => 'JH', 'Karnataka' => 'KA', 'Kerala' => 'KL', 'Madhya Pradesh' => 'MP', 'Maharashtra' => 'MH', 'Manipur' => 'MN', 'Meghalaya' => 'ML', 'Mizoram' => 'MZ', 'Nagaland' => 'NL', 'Odisha' => 'OR', 'Punjab' => 'PB', 'Rajasthan' => 'RJ', 'Sikkim' => 'SK', 'Tamil Nadu' => 'TN', 'Telangana' => 'TG', 'Tripura' => 'TR', 'Uttar Pradesh' => 'UP', 'Uttarakhand' => 'UK', 'West Bengal' => 'WB', 'Delhi' => 'DL', 'Jammu and Kashmir' => 'JK', 'Ladakh' => 'LA', 'Puducherry' => 'PY', 'Chandigarh' => 'CH', 'Andaman and Nicobar Islands' => 'AN', 'Lakshadweep' => 'LD', 'Dadra and Nagar Haveli and Daman and Diu' => 'DN',];
  $stateName = "$state";
  $stateShortCode = $stateCodes[$stateName] ?? $companystate;
  ?>
  <meta name="geo.region" content="IN-<?= $stateShortCode ?>">
  <meta name="geo.placename" content="<?= @$city ?>">
  <meta name="revisit-after" content="weekly" />
  <meta name="distribution" content="global" />
  <meta name="language" content="en" />
  <link rel="apple-touch-icon" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/favicon.webp') ?>">
  <link rel="apple-touch-icon" href="<?= base_url('assets/images/logo/favicon.webp') ?>">

  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "<?= $company3 ?>",
      "url": "<?= site_url() ?>",
      "logo": "<?= base_url() ?>assets/images/logo/favicon.webp"
    }
  </script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "LocalBusiness",
      "name": "<?= $company3 ?>",
      "url": "<?= site_url() ?>",
      "image": ["<?= base_url() ?>assets/images/logo/favicon.webp"],
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "  
        <?= $address1 ?>",
        "addressLocality": "<?= $address2 ?>",
        "postalCode": "<?= $postalCode ?>",
        "addressRegion": "<?= $addressRegion ?>",
        "addressCountry": "India"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?= $ratingValue ?>",
        "ratingCount": "<?= $ratingCount ?>",
        "bestRating": "5",
        "worstRating": "1"
      },
      "review": [{
        "@type": "Review",
        "datePublished": "<?= $datePublished ?>",
        "reviewBody": "<?= $reviewBody ?>",
        "author": {
          "@type": "Person",
          "name": "<?= $reviewperson ?>"
        }
      }],
      "paymentAccepted": ["Cash", "Master Card", "Visa Card", "Debit Cards", "Cheques", "Credit Card"],
      "priceRange": "500 - 40000",
      "telephone": "<?= $phone ?>",
      "email": "<?= $mail ?>"
    }
  </script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Product",
      "sku": "<?= $sku ?>",
      "mpn": "<?= $mpn ?>",
      "name": "Plots & Luxury Bungalows for Sale in <?= $city ?>",
      "image": "<?= $img ?>",
      "description": "<?= @$description ?>",
      "url": "<?= $url ?>",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?= $ratingValue ?>",
        "ratingCount": "<?= $ratingCount ?>"
      },
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "<?= $ratingValue ?>",
          "bestRating": "5"
        },
        "author": {
          "@type": "Person",
          "name": "<?= $company3 ?>"
        }
      },
      "offers": {
        "@type": "Offer",
        "price": "4500000.00",
        "priceCurrency": "INR",
        "priceValidUntil": "<?= date("Y-m-") ?>30",
        "availability": "https://schema.org/InStock",
        "url": "<?= $url ?>"
      },
      "brand": {
        "@type": "Brand",
        "name": "<?= $company3 ?>",
        "image": "<?= $img ?>"
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS and Java Script -->
  <link rel="stylesheet" href="<?= base_url("assets/css/style.css?v=" . time()) ?>">
</head>