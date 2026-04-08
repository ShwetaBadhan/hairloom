<!-- Page Contact Us Start -->
<div id="contact-us" class="page-contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Contact Form Box Start -->
                <div class="contact-form-box">
                    <!-- Contact Us Form Start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">contact us</h3>
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Get in touch <span>with us</span></h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Contact Form Start -->
                        <div class="contact-form">
                            <form id="contactForm" action="{{ route('contact.submit') }}" method="POST" class="wow fadeInUp" data-wow-delay="0.2s">
                                @csrf
                                <div class="row">                                
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="fname" class="form-control" placeholder="First name" required>
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" name="lname" class="form-control" placeholder="Last name" required>
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <!-- ✅ FIXED PHONE PATTERN: hyphen at END of character class -->
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="tel" name="phone" class="form-control" placeholder="Phone" required 
                                               pattern="[0-9+\s()\-]{7,20}"
                                               title="Enter 7-20 characters: digits, spaces, +, - or ()">
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <div class="form-group col-md-12 mb-5">
                                        <textarea name="message" class="form-control" rows="3" placeholder="Write message..." required></textarea>
                                        <div class="invalid-feedback d-block"></div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn-default" id="submitBtn">
                                            <span id="btnText">Submit Message</span>
                                            <span id="btnLoader" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form End -->
                    </div>
                    <!-- Contact Us Form End -->

                    <!-- Google Map Start -->
                    <div class="google-map-iframe">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map End -->
                </div>
                <!-- Contact Form Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Contact Us End -->

@push('scripts')
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- AJAX Form Handler -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');
    
    // ✅ Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    // Real-time phone validation
    const phoneInput = form.querySelector('input[name="phone"]');
    phoneInput.addEventListener('input', function() {
        if (this.validity.patternMismatch) {
            this.setCustomValidity('Please enter 7-20 valid characters (digits, +, -, spaces, or parentheses)');
        } else {
            this.setCustomValidity('');
        }
    });

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        setLoading(true);
        clearErrors();

        const formData = new FormData(form);
        // ❌ Do NOT append _token here when using header

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken  // ✅ Critical: token in header
                    // ❌ Do NOT set 'Content-Type' manually for FormData
                }
            });

            const result = await response.json();

            if (response.ok && result.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sent!',
                    text: result.message,
                    confirmButtonColor: '#28a745',
                    timer: 3000,
                    timerProgressBar: true
                });
                form.reset();
            } else {
                if (result.errors) {
                    Object.keys(result.errors).forEach(field => {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('is-invalid');
                            const errorDiv = input.closest('.form-group')?.querySelector('.invalid-feedback');
                            if (errorDiv) errorDiv.textContent = result.errors[field][0];
                        }
                    });
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        text: 'Please correct the highlighted fields.',
                        confirmButtonColor: '#dc3545'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: result.message || 'Something went wrong. Please try again.',
                        confirmButtonColor: '#dc3545'
                    });
                }
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Network Error',
                text: 'Unable to connect to server. Please check your connection.',
                confirmButtonColor: '#dc3545'
            });
        } finally {
            setLoading(false);
        }
    });

    function setLoading(loading) {
        submitBtn.disabled = loading;
        btnText.classList.toggle('d-none', loading);
        btnLoader.classList.toggle('d-none', !loading);
    }

    function clearErrors() {
        form.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
            const errorDiv = el.closest('.form-group')?.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '';
        });
        form.querySelectorAll('input, textarea').forEach(input => input.setCustomValidity(''));
    }

    form.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.remove('is-invalid');
            const errorDiv = this.closest('.form-group')?.querySelector('.invalid-feedback');
            if (errorDiv) errorDiv.textContent = '';
            this.setCustomValidity('');
        });
    });
});
</script>
@endpush