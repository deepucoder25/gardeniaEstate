<?php
// Load admin-configured timer settings
$timer_conf = [
  'target_date' => '2026-09-15T23:59',
  'heading' => 'Schedule a Site-Visit to The Gardenia Estate Bagdogra Siliguri',
  'tagline' => 'Hurry Up! Enquire Now',
  'subheading' => 'Pre Launch Prices Applicable On 1st Few Units.'
];

if (file_exists('./assets/timer_settings.json')) {
  $saved_t = json_decode(file_get_contents('./assets/timer_settings.json'), true);
  if ($saved_t && is_array($saved_t)) {
    $timer_conf = array_merge($timer_conf, array_filter($saved_t));
  }
}
?>

<!-- COUNTDOWN & SITE-VISIT CTA SECTION -->
<section class="site-visit-countdown-section py-5 position-relative overflow-hidden">
  <div class="container text-center">
    
    <!-- Top Title Header -->
    <h2 class="site-visit-main-title text-primary display-6 fw-bold mb-3">
      <?= htmlspecialchars($timer_conf['heading']) ?>
    </h2>

    <!-- Red Underlined Tagline & Sub-title -->
    <div class="mb-4">
      <div class="hurry-title-red display-5 fw-bold text-danger text-decoration-underline mb-2">
        <?= htmlspecialchars($timer_conf['tagline']) ?>
      </div>
      <p class="prelaunch-subtitle text-dark fs-5 fw-semibold mb-0">
        <?= htmlspecialchars($timer_conf['subheading']) ?>
      </p>
    </div>

    <!-- Compact Digit Countdown Timer Columns (1 Single Row on Mobile, Large Bold Digits on Desktop) -->
    <div class="d-flex justify-content-center align-items-center gap-1.5 gap-sm-3 gap-md-5 mb-5 flex-nowrap py-1">
      
      <!-- Days Column -->
      <div class="countdown-digit-col text-center flex-shrink-0 px-1 px-md-3">
        <div class="countdown-digits fs-5 fs-sm-4 fs-md-1 fw-bold text-dark mb-1" id="cdDays">0&nbsp;0</div>
        <div class="countdown-divider-line mb-1"></div>
        <div class="countdown-label-blue extra-small text-md-small fw-semibold">Days</div>
      </div>

      <!-- Hours Column -->
      <div class="countdown-digit-col text-center flex-shrink-0 px-1 px-md-3">
        <div class="countdown-digits fs-5 fs-sm-4 fs-md-1 fw-bold text-dark mb-1" id="cdHours">0&nbsp;7</div>
        <div class="countdown-divider-line mb-1"></div>
        <div class="countdown-label-blue extra-small text-md-small fw-semibold">Hours</div>
      </div>

      <!-- Minutes Column -->
      <div class="countdown-digit-col text-center flex-shrink-0 px-1 px-md-3">
        <div class="countdown-digits fs-5 fs-sm-4 fs-md-1 fw-bold text-dark mb-1" id="cdMinutes">3&nbsp;5</div>
        <div class="countdown-divider-line mb-1"></div>
        <div class="countdown-label-blue extra-small text-md-small fw-semibold">Minutes</div>
      </div>

      <!-- Seconds Column -->
      <div class="countdown-digit-col text-center flex-shrink-0 px-1 px-md-3">
        <div class="countdown-digits fs-5 fs-sm-4 fs-md-1 fw-bold text-dark mb-1" id="cdSeconds">1&nbsp;7</div>
        <div class="countdown-divider-line mb-1"></div>
        <div class="countdown-label-blue extra-small text-md-small fw-semibold">Seconds</div>
      </div>

    </div>

    <!-- CTA Button -->
    <div class="pt-1">
      <button class="btn btn-countdown-cta btn-lg px-5 py-3 rounded-4 fw-bold text-uppercase shadow-lg text-white fs-5 d-inline-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#qteModal">
        <i class="bi bi-bell-fill fs-4"></i>
        <span>I'M INTERESTED!</span>
      </button>
    </div>

  </div>
</section>

<!-- Realtime Admin-Configured Countdown Timer JS Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const adminTargetStr = "<?= htmlspecialchars($timer_conf['target_date']) ?>";
  let targetDate = new Date(adminTargetStr).getTime();

  // Fallback if target date is invalid or past
  if (isNaN(targetDate) || targetDate <= new Date().getTime()) {
    targetDate = new Date().getTime() + (7 * 24 * 60 * 60 * 1000);
  }

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = targetDate - now;

    if (distance < 0) {
      targetDate = new Date().getTime() + (7 * 24 * 60 * 60 * 1000);
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    const formatDigits = (num) => {
      const str = String(num).padStart(2, '0');
      return str.charAt(0) + '&nbsp;' + str.charAt(1);
    };

    const elDays = document.getElementById('cdDays');
    const elHours = document.getElementById('cdHours');
    const elMinutes = document.getElementById('cdMinutes');
    const elSeconds = document.getElementById('cdSeconds');

    if (elDays) elDays.innerHTML = formatDigits(days);
    if (elHours) elHours.innerHTML = formatDigits(hours);
    if (elMinutes) elMinutes.innerHTML = formatDigits(minutes);
    if (elSeconds) elSeconds.innerHTML = formatDigits(seconds);
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);
});
</script>
