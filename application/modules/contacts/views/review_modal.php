<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- ELEGANT REVIEW FORM MODAL MATCHING 3RD IMAGE EXACT DESIGN -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden bg-white">
            
            <!-- Modal Header (Dark Green Theme Accent with Decorative Leaves) -->
            <div class="modal-header border-0 review-modal-header p-4 position-relative">
                <div class="d-flex align-items-center gap-3">
                    <div class="review-modal-icon-circle flex-shrink-0 shadow-sm">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" stroke="#0d462b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 7L13.5 10L17 10.3L14.3 12.5 L15.1 16L12 14.1L8.9 16L9.7 12.5L7 10.3L10.5 10L12 7Z" fill="#0d462b"/>
                        </svg>
                    </div>
                    <div>
                        <span class="review-modal-subtitle">YOUR FEEDBACK</span>
                        <h3 class="modal-title h3 review-modal-heading mb-0" id="reviewModalLabel">
                            Share Your Experience
                        </h3>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white rounded-circle bg-white bg-opacity-25 p-2 shadow-none me-1" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body Form (Compact & 2 Columns per Row on Mobile) -->
            <div class="modal-body p-3 p-md-4">
                <p class="text-secondary extra-small mb-3">
                    Tell us about your experience with your plot or bungalow purchase or site visit. Your feedback helps us improve.
                </p>

                <form action="<?= site_url('reviews/submit') ?>" method="POST" enctype="multipart/form-data">
                    
                    <div class="row g-2 g-md-3 mb-3">
                        <!-- Row 1 - Col 1: Full Name (2 per Row on Mobile) -->
                        <div class="col-6">
                            <label class="form-label extra-small fw-bold text-dark mb-1">
                                <i class="bi bi-person-fill text-dark me-1"></i> Full Name <span class="text-danger">*</span>
                            </label>
                            <div class="review-input-box py-1.5 px-2.5">
                                <i class="bi bi-person text-secondary"></i>
                                <input type="text" name="name" placeholder="Rahul Sharma" required class="extra-small">
                            </div>
                        </div>

                        <!-- Row 1 - Col 2: Email (2 per Row on Mobile) -->
                        <div class="col-6">
                            <label class="form-label extra-small fw-bold text-dark mb-1">
                                <i class="bi bi-envelope-fill text-dark me-1"></i> Email <span class="text-danger">*</span>
                            </label>
                            <div class="review-input-box py-1.5 px-2.5">
                                <i class="bi bi-envelope text-secondary"></i>
                                <input type="email" name="email" placeholder="rahul@example.com" required class="extra-small">
                            </div>
                        </div>

                        <!-- Row 2 - Col 1: City (Equal Height Column) -->
                        <div class="col-6">
                            <label class="form-label extra-small fw-bold text-dark mb-1">
                                <i class="bi bi-geo-alt-fill text-dark me-1"></i> City / Location <span class="text-danger">*</span>
                            </label>
                            <div class="review-input-box py-2 px-2.5 d-flex align-items-center">
                                <i class="bi bi-geo-alt text-secondary me-2"></i>
                                <input type="text" name="city" placeholder="Siliguri" value="<?= isset($city) ? htmlspecialchars($city) : '' ?>" required class="extra-small border-0 w-100 bg-transparent shadow-none p-0">
                            </div>
                        </div>

                        <!-- Row 2 - Col 2: Upload Photo (Single-line Input matching City Height) -->
                        <div class="col-6">
                            <label class="form-label extra-small fw-bold text-dark mb-1">
                                <i class="bi bi-camera-fill text-dark me-1"></i> Upload Photo
                            </label>
                            <div class="review-input-box py-2 px-2.5 d-flex align-items-center cursor-pointer" onclick="document.getElementById('review-single-img-input').click()">
                                <i class="bi bi-image text-success me-2 flex-shrink-0"></i>
                                <span class="extra-small text-truncate text-muted fw-normal" id="upload-label-text">Choose file (JPG/PNG)</span>
                            </div>
                            <input type="file" id="review-single-img-input" name="review_images[]" class="d-none" accept="image/jpeg, image/png, image/webp" onchange="handleSingleFileSelect(this)">
                        </div>
                    </div>

                    <!-- Star Rating Line (Generous Padding & Zero Edge Overflow) -->
                    <div class="mb-3 review-rating-card p-3 px-3.5 rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center">
                            <label class="form-label extra-small fw-bold text-dark mb-0 text-nowrap">
                                <i class="bi bi-star-fill text-warning me-1"></i> Rating <span class="text-danger">*</span>
                            </label>
                        </div>
                        <div class="d-flex align-items-center gap-2 gap-sm-3 text-nowrap ms-auto me-1">
                            <div class="contact-rating-select fs-6 text-warning d-flex gap-1 cursor-pointer" id="star-rating">
                                <i class="bi bi-star-fill contact-rating-item active" data-value="1"></i>
                                <i class="bi bi-star-fill contact-rating-item active" data-value="2"></i>
                                <i class="bi bi-star-fill contact-rating-item active" data-value="3"></i>
                                <i class="bi bi-star-fill contact-rating-item active" data-value="4"></i>
                                <i class="bi bi-star-fill contact-rating-item active" data-value="5"></i>
                            </div>
                            <span class="fw-bold text-dark extra-small"><span id="rating-number">5</span>/5</span>
                            <span id="rating-badge" class="badge bg-success-subtle text-success border border-success-subtle px-2.5 py-1.5 rounded-pill fw-bold extra-small text-nowrap">
                                <span id="rating-emoji">😍</span> <span id="rating-text">Excellent</span>
                            </span>
                        </div>
                        <input type="hidden" name="rating" id="rating-input" value="5">
                    </div>

                    <!-- Feedback Textarea -->
                    <div class="mb-3">
                        <label class="form-label extra-small fw-bold text-dark mb-1">
                            <i class="bi bi-chat-left-text-fill text-dark me-1"></i> Your Review <span class="text-danger">*</span>
                        </label>
                        <div class="review-textarea-box p-2">
                            <div class="d-flex align-items-start gap-2">
                                <i class="bi bi-pencil-fill text-secondary mt-1 extra-small"></i>
                                <textarea name="review" id="review-textarea" rows="2" maxlength="500" placeholder="Share your experience about your plot or bungalow purchase or site visit..." required oninput="updateCharCount(this)" class="extra-small"></textarea>
                            </div>
                            <div class="text-end extra-small text-muted mt-1 font-size-xs-tight">Max 5 MB (JPG, PNG, WEBP)</div>
                        </div>

                        <div id="modalAlertBox"></div>

                    </div>
                    <div class="modal-footer border-0 p-4 pt-0">
                        <button type="submit" class="btn btn-success rounded-pill w-100 py-3 fw-bold shadow-sm" id="btnSubmitReview">
                            <i class="bi bi-send-fill me-2"></i> Submit My Review
                        </button>
                    </div>
                </form>

                <p class="extra-small text-muted text-center mb-0 mt-2 font-size-xs-clean">
                    <i class="bi bi-lock-fill me-1 text-secondary"></i> Your feedback will be published after verification.
                </p>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingsMap = {
        1: { emoji: '😠', label: 'Poor' },
        2: { emoji: '😞', label: 'Fair' },
        3: { emoji: '😐', label: 'Good' },
        4: { emoji: '🙂', label: 'Very Good' },
        5: { emoji: '😍', label: 'Excellent' }
    };
    
    const emojiDisplay = document.getElementById('rating-emoji');
    const textDisplay = document.getElementById('rating-text');
    const numberDisplay = document.getElementById('rating-number');
    
    document.querySelectorAll('.contact-rating-item').forEach(star => {
        star.addEventListener('click', function() {
            const value = parseInt(this.getAttribute('data-value'));
            document.getElementById('rating-input').value = value;
            if (numberDisplay) numberDisplay.textContent = value;
            if (ratingsMap[value]) {
                if (emojiDisplay) emojiDisplay.textContent = ratingsMap[value].emoji;
                if (textDisplay) textDisplay.textContent = ratingsMap[value].label;
            }
            
            document.querySelectorAll('.contact-rating-item').forEach(s => {
                const sValue = parseInt(s.getAttribute('data-value'));
                if (sValue <= value) {
                    s.classList.add('active');
                    s.classList.replace('bi-star', 'bi-star-fill');
                } else {
                    s.classList.remove('active');
                    s.classList.replace('bi-star-fill', 'bi-star');
                }
            });
        });
    });
});

function handleSingleFileSelect(input) {
    const labelText = document.getElementById('upload-label-text');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if (labelText) {
            labelText.innerHTML = '<strong>' + file.name + '</strong>';
        }
    }
}

function updateCharCount(textarea) {
    const charCount = document.getElementById('char-count');
    if (charCount) {
        charCount.textContent = textarea.value.length;
    }
}
</script>


