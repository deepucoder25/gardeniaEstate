document.addEventListener("DOMContentLoaded", function () {
    // Inject custom validation styles
    if (!document.getElementById("validation-custom-styles")) {
        const style = document.createElement("style");
        style.id = "validation-custom-styles";
        style.innerHTML = `
            .input-error-highlight {
                border: 2px solid #ff3333 !important;
                box-shadow: 0 0 10px rgba(255, 51, 51, 0.5) !important;
                transition: all 0.3s ease-in-out !important;
            }
            .field-error-msg {
                color: #ff3333 !important;
                font-size: 0.75rem !important;
                font-weight: bold !important;
                margin-top: 5px !important;
                margin-bottom: 5px !important;
                text-align: left !important;
                padding-left: 10px !important;
                display: flex !important;
                align-items: center !important;
                gap: 5px !important;
                animation: fieldErrorFadeIn 0.3s ease-out !important;
            }
            .field-wrap .field-ico {
                top: 14px !important;
            }
            .field-wrap.top-ico .field-ico {
                top: 14px !important;
            }
            @keyframes fieldErrorFadeIn {
                from { opacity: 0; transform: translateY(-5px); }
                to { opacity: 1; transform: translateY(0); }
            }
        `;
        document.head.appendChild(style);
    }

    // Attach submit handler to ALL forms with class .ajax-form
    document.querySelectorAll(".ajax-form").forEach(form => {

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            // Clear previous errors and highlights
            form.querySelectorAll(".input-error-highlight").forEach(el => el.classList.remove("input-error-highlight"));
            form.querySelectorAll(".field-error-msg").forEach(el => el.remove());

            const url = this.getAttribute("data-url");
            const resultBoxId = this.getAttribute("data-result");
            const resultBox = document.getElementById(resultBoxId);
            
            // Get fields
            const nameInput = form.querySelector('input[name="name"]');
            const phoneInput = form.querySelector('input[name="phone"]');

            let hasErrors = false;

            // Helper to show field error
            function showError(inputEl, message) {
                if (!inputEl) return;
                inputEl.classList.add("input-error-highlight");
                
                const errorDiv = document.createElement("div");
                errorDiv.className = "field-error-msg";
                errorDiv.innerHTML = `<i class="bi bi-exclamation-circle-fill"></i> ${message}`;
                
                // Find the wrapper (either .field-wrap, .form-group, or parent)
                const wrapper = inputEl.closest(".field-wrap") || inputEl.closest(".form-group") || inputEl.parentElement;
                
                // Force wrap if wrapper is a flex container
                const computedStyle = window.getComputedStyle(wrapper);
                if (computedStyle.display === "flex") {
                    wrapper.style.flexWrap = "wrap";
                }
                
                // Append inside the wrapper
                wrapper.appendChild(errorDiv);
            }

            // Validate Name
            if (nameInput) {
                const val = nameInput.value.trim();
                if (!val) {
                    showError(nameInput, "The Name field is required.");
                    hasErrors = true;
                }
            }

            // Validate Phone
            if (phoneInput) {
                const val = phoneInput.value.trim();
                if (!val) {
                    showError(phoneInput, "The Mobile field is required.");
                    hasErrors = true;
                } else if (!/^\d+$/.test(val)) {
                    showError(phoneInput, "The Mobile field must contain only numbers.");
                    hasErrors = true;
                } else if (val.length !== 10) {
                    showError(phoneInput, "The Mobile field must be exactly 10 digits.");
                    hasErrors = true;
                }
            }

            if (hasErrors) {
                if (resultBox) {
                    resultBox.innerHTML = ""; // Clear loader/previous messages
                }
                return; // Stop form submission
            }

            const formData = new FormData(this);

            // Show loader
            if (resultBox) {
                resultBox.innerHTML = "<p style='color:orange; font-weight:bold; font-size:0.9rem; padding: 10px;'>Please wait...</p>";
            }

            fetch(url, {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(data => {

                if (data.trim() === "1") {
                    data = `
                        <div class="alert alert-success border-0 shadow-sm rounded-3 py-2 px-3 mt-2 text-success bg-success-subtle d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill text-success flex-shrink-0"></i>
                            <span class="fw-bold extra-small text-success">Thank you! Your request has been submitted successfully.</span>
                        </div>
                    `;
                    form.reset();
                }

                if (resultBox) {
                    resultBox.innerHTML = data;
                    setTimeout(() => resultBox.innerHTML = "", 8000);
                }
            })
            .catch(err => {
                if (resultBox) {
                    resultBox.innerHTML = "<p style='color:red; font-weight:bold;'>Something went wrong!</p>";
                }
            });

        });

    });

});
