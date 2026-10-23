<style>
    .timer-panel {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        border: 1px solid #eef2f5;
        margin-bottom: 24px;
    }
    .timer-panel .panel-heading {
        background: #f8fafc;
        border-bottom: 1px solid #eef2f5;
        padding: 16px 20px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .timer-panel .panel-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #1f2d3d;
    }
    .timer-panel .panel-body {
        padding: 24px;
    }
    .timer-form-group {
        margin-bottom: 20px;
    }
    .timer-label {
        font-size: 12px;
        font-weight: 600;
        color: #5f6f7f;
        margin-bottom: 8px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .timer-input {
        box-shadow: none;
        border-radius: 4px;
        border: 1px solid #cfd8e3;
        transition: all 0.2s;
        height: 38px;
    }
    .timer-input:focus {
        border-color: #0f3d5e;
        box-shadow: 0 0 0 2px rgba(15, 61, 94, 0.1);
    }
    .timer-help {
        font-size: 11px;
        color: #8c9fb1;
        margin-top: 6px;
    }
    .btn-timer-save {
        padding: 10px 24px;
        font-weight: 600;
        letter-spacing: 0.5px;
        border-radius: 4px;
        background-color: #094B32;
        border-color: #094B32;
        color: #ffffff;
    }
    .btn-timer-save:hover {
        background-color: #A88A4A;
        border-color: #A88A4A;
        color: #ffffff;
    }
    .preview-box {
        background: #fafaf7;
        border: 1px solid #e5e9eb;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
    }
    .preview-heading {
        color: #094B32;
        font-weight: 700;
        font-size: 18px;
    }
    .preview-tagline {
        color: #e52521;
        font-weight: 700;
        text-decoration: underline;
        font-size: 16px;
    }
</style>

<div class="col-sm-12">
    <div class="timer-panel">
        <div class="panel-heading d-flex justify-content-between align-items-center">
            <h3 class="panel-title"><i class="fa fa-clock-o" style="margin-right:8px;color:#094B32;"></i> Countdown Timer &amp; Pre-Launch Manager</h3>
        </div>
        <div class="panel-body">
            
            <?php
            $timer_conf = [
                'target_date' => '2026-09-15T23:59', 
                'heading' => 'Schedule a Site-Visit to The Gardenia Estate STRR Devanahalli', 
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

            <form name="timer_form" id="timer_form">
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="timer-form-group">
                            <label class="timer-label">Target Date &amp; Time (Countdown End)</label>
                            <input type="datetime-local" id="timer_target_date" name="timer_target_date" class="form-control timer-input" value="<?= htmlspecialchars($timer_conf['target_date']) ?>" required>
                            <div class="timer-help">Set the target expiration date &amp; time for the pre-launch offer timer.</div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="timer-form-group">
                            <label class="timer-label">Main Heading Title</label>
                            <input type="text" id="timer_heading" name="timer_heading" class="form-control timer-input" value="<?= htmlspecialchars($timer_conf['heading']) ?>" required>
                            <div class="timer-help">Main title displayed above the timer.</div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="timer-form-group">
                            <label class="timer-label">Red Tagline (Underlined)</label>
                            <input type="text" id="timer_tagline" name="timer_tagline" class="form-control timer-input" value="<?= htmlspecialchars($timer_conf['tagline']) ?>" required>
                            <div class="timer-help">Red highlighted tagline (e.g. Hurry Up! Enquire Now).</div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="timer-form-group">
                            <label class="timer-label">Subheading Text</label>
                            <input type="text" id="timer_subheading" name="timer_subheading" class="form-control timer-input" value="<?= htmlspecialchars($timer_conf['subheading']) ?>" required>
                            <div class="timer-help">Secondary description below the red tagline.</div>
                        </div>
                    </div>

                </div>

                <!-- Live Preview Section -->
                <div class="row mt-3 mb-4">
                    <div class="col-sm-12">
                        <label class="timer-label">Live Frontend Preview</label>
                        <div class="preview-box">
                            <div class="preview-heading mb-1"><?= htmlspecialchars($timer_conf['heading']) ?></div>
                            <div class="preview-tagline mb-1"><?= htmlspecialchars($timer_conf['tagline']) ?></div>
                            <div class="preview-sub text-dark small mb-3"><?= htmlspecialchars($timer_conf['subheading']) ?></div>
                            <div class="d-flex justify-content-center gap-3">
                                <span class="badge bg-dark p-2 fs-6" id="admCdDays">-- Days</span>
                                <span class="badge bg-dark p-2 fs-6" id="admCdHours">-- Hours</span>
                                <span class="badge bg-dark p-2 fs-6" id="admCdMins">-- Mins</span>
                                <span class="badge bg-dark p-2 fs-6" id="admCdSecs">-- Secs</span>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                (function() {
                    function updateAdminPreviewTimer() {
                        var dateEl = document.getElementById('timer_target_date');
                        if (!dateEl || !dateEl.value) return;
                        var targetMs = new Date(dateEl.value).getTime();
                        var nowMs = new Date().getTime();
                        var distance = targetMs - nowMs;
                        if (isNaN(distance) || distance < 0) distance = 0;

                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var secs = Math.floor((distance % (1000 * 60)) / 1000);

                        var dStr = String(days).padStart(2, '0') + " Days";
                        var hStr = String(hours).padStart(2, '0') + " Hours";
                        var mStr = String(mins).padStart(2, '0') + " Mins";
                        var sStr = String(secs).padStart(2, '0') + " Secs";

                        if (document.getElementById('admCdDays')) document.getElementById('admCdDays').innerText = dStr;
                        if (document.getElementById('admCdHours')) document.getElementById('admCdHours').innerText = hStr;
                        if (document.getElementById('admCdMins')) document.getElementById('admCdMins').innerText = mStr;
                        if (document.getElementById('admCdSecs')) document.getElementById('admCdSecs').innerText = sStr;
                    }

                    setInterval(updateAdminPreviewTimer, 1000);
                    setTimeout(updateAdminPreviewTimer, 200);

                    var dateEl = document.getElementById('timer_target_date');
                    if (dateEl) dateEl.addEventListener('change', updateAdminPreviewTimer);

                    var hEl = document.getElementById('timer_heading');
                    if (hEl) hEl.addEventListener('input', function() {
                        var pEl = document.querySelector('.preview-heading');
                        if (pEl) pEl.innerText = this.value;
                    });

                    var tEl = document.getElementById('timer_tagline');
                    if (tEl) tEl.addEventListener('input', function() {
                        var pEl = document.querySelector('.preview-tagline');
                        if (pEl) pEl.innerText = this.value;
                    });

                    var sEl = document.getElementById('timer_subheading');
                    if (sEl) sEl.addEventListener('input', function() {
                        var pEl = document.querySelector('.preview-sub');
                        if (pEl) pEl.innerText = this.value;
                    });
                })();
                </script>

                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-timer-save" id="btnsubmit_timer" ng-click="save_timer()">
                            <i class="fa fa-save" style="margin-right:6px;"></i> Save Timer Settings
                        </button>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div id="timer_result"></div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
