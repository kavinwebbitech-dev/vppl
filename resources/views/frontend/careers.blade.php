@extends('frontend.layouts.app')

@section('title', 'Careers')

@section('content')
    <style>
        /* --- VPPL PREMIUM DESIGN SYSTEM --- */
        :root {
            --vppl-primary: #22a4d4;
            --vppl-secondary: #0a2d4d;
            --vppl-accent: #03e9f4;
            --vppl-white: #ffffff;
            --vppl-gray: #64748b;
            --vppl-border: #e2e8f0;
            --grad-accent: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
            --grad-primary: linear-gradient(135deg, #0a2d4d 0%, #22a4d4 100%);
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            background-color: #fff;
            font-family: 'Inter', sans-serif;
            color: var(--vppl-secondary);
            overflow-x: hidden;
        }

        /* --- Dynamic Hero Styling --- */
        .vppl-hero {
            height: 50vh;
            min-height: 400px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            color: #fff;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .vppl-hero-overlay {
            overflow: hidden;
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.9) 20%, rgba(10, 45, 77, 0.3));
            z-index: 1;
        }

        .vppl-hero-content {
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(30px);
        }

        .vppl-breadcrumb {
            display: inline-flex;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 100px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 25px;
            list-style: none;
            font-size: 13px;
        }

        .vppl-breadcrumb li a {
            color: #fff;
            text-decoration: none;
            opacity: 0.7;
        }

        .vppl-breadcrumb li.active {
            padding-left: 12px;
            margin-left: 12px;
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--vppl-accent);
            font-weight: 600;
        }

        .vppl-hero-title {
            font-size: clamp(32px, 5vw, 56px);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -1px;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- Main Content Layout --- */
        .careers-container {
            padding: 80px 0;
        }

        .vppl-main-wrapper {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--vppl-border);
            box-shadow: 0 40px 100px rgba(10, 45, 77, 0.08) !important;
        }

        /* --- Left Column: Info --- */
        .vppl-info-column {
            padding: 60px;
            background: #fcfdfe;
        }

        .vppl-brand-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 25px;
            color: var(--vppl-secondary);
        }

        .vppl-feature-image {
            width: 100%;
            border-radius: 16px;
            margin-bottom: 30px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .opening-tag {
            background: #fff;
            padding: 12px 20px;
            border-radius: 12px;
            border: 1px solid var(--vppl-border);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.3s;
        }

        .opening-tag:hover {
            border-color: var(--vppl-primary);
            transform: translateX(5px);
        }

        .dot {
            width: 8px;
            height: 8px;
            background: var(--vppl-primary);
            border-radius: 50%;
        }

        /* --- Right Column: Form --- */
        .vppl-form-column {
            padding: 60px;
            background: #fff;
        }

        .vppl-input-group {
            margin-bottom: 20px;
        }

        .vppl-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--vppl-gray);
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .vppl-field {
            width: 100%;
            padding: 14px 18px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            font-size: 15px;
            transition: var(--transition);
        }

        .vppl-field:focus {
            outline: none;
            border-color: var(--vppl-primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(34, 164, 212, 0.1);
        }

        .vppl-submit-btn {
            width: 100%;
            background: var(--grad-primary);
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 10px;
        }

        .vppl-submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(10, 45, 77, 0.2);
        }

        /* --- Reveal States --- */
        .gsap-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        /* Responsive */
        @media (max-width: 991px) {

            .vppl-info-column,
            .vppl-form-column {
                padding: 40px;
            }
        }
    </style>
    <div id="wrapper">
        <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
            <div class="vppl-hero-overlay"></div>
            <div class="vppl-container container">
                <div class="vppl-hero-content">
                    <ul class="vppl-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Careers</li>
                    </ul>
                    <h1 class="vppl-hero-title">Join Our <span class='vppl-gradient-text'>Visionary</span> Team</h1>
                </div>
            </div>
        </section>

        <section class="careers-container">
            <div class="container">
                <div class="vppl-main-wrapper gsap-reveal">
                    <div class="row g-0">

                        <div class="col-lg-6 vppl-info-column">
                            <h2 class="vppl-brand-title">Grow with <span class="vppl-gradient-text">VPPL</span></h2>
                            <img src="{{ asset('asset/images/about-img-1.webp') }}" class="vppl-feature-image"
                                alt="Our Team">

                            <p class="text-secondary mb-5" style="font-size: 16px; line-height: 1.8;">
                                Be part of a team that is redefining industrial water treatment. We value
                                innovation, integrity, and the drive to solve the world's most complex liquid
                                discharge challenges.
                            </p>

                            <h5 class="fw-bold mb-3 text-uppercase" style="font-size: 13px; letter-spacing: 1px;">
                                Hot Roles:</h5>
                            <div class="opening-tag">
                                <div class="dot"></div>
                                <div>
                                    <div class="fw-bold small">Senior Process Engineer</div>
                                    <div class="text-muted" style="font-size: 11px;">Experience: 5+ Years</div>
                                </div>
                            </div>
                            <div class="opening-tag">
                                <div class="dot"></div>
                                <div>
                                    <div class="fw-bold small">Project Manager (ETP)</div>
                                    <div class="text-muted" style="font-size: 11px;">Location: Ahmedabad / Remote
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 vppl-form-column">
                            <div class="mb-4">
                                <h4 class="fw-bold mb-1">Submit Application</h4>
                                <p class="text-muted small">Our HR team will review and contact you within 48 hours.
                                </p>
                            </div>

                            {{-- <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="vppl-input-group">
                                    <label class="vppl-label">Full Name</label>
                                    <input type="text" class="vppl-field" placeholder="John Doe" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 vppl-input-group">
                                        <label class="vppl-label">Email Address</label>
                                        <input type="email" class="vppl-field" placeholder="name@company.com" required>
                                    </div>
                                    <div class="col-md-6 vppl-input-group">
                                        <label class="vppl-label">Phone Number</label>
                                        <input type="tel" class="vppl-field" placeholder="+91 00000 00000" required>
                                    </div>
                                </div>

                                <div class="vppl-input-group">
                                    <label class="vppl-label">Target Department</label>
                                    <select class="vppl-field">
                                        <option>Engineering & Design</option>
                                        <option>Operations & Maintenance</option>
                                        <option>Sales & Business Development</option>
                                        <option>Research & Development</option>
                                    </select>
                                </div>

                                <div class="vppl-input-group">
                                    <label class="vppl-label">Resume / Portfolio (PDF)</label>
                                    <input type="file" class="vppl-field">
                                </div>

                                <div class="vppl-input-group mb-4">
                                    <label class="vppl-label">Cover Note (Optional)</label>
                                    <textarea class="vppl-field" rows="3" placeholder="Briefly describe your expertise..."></textarea>
                                </div>

                                <button type="submit" class="vppl-submit-btn">SEND APPLICATION</button>
                            </form> --}}

                            <form id="jobApplyForm" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="success-message mb-3"></div>

                                <div class="vppl-input-group">
                                    <label class="vppl-label">Full Name</label>
                                    <input type="text" name="name" class="vppl-field only-text"
                                        placeholder="John Doe">
                                    <span class="name_error text-danger"></span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 vppl-input-group">
                                        <label class="vppl-label">Email Address</label>
                                        <input type="email" name="email" class="vppl-field"
                                            placeholder="name@company.com">
                                        <span class="email_error text-danger"></span>
                                    </div>

                                    <div class="col-md-6 vppl-input-group">
                                        <label class="vppl-label">Phone Number</label>
                                        <input type="tel" name="phone" class="vppl-field only-number"
                                            placeholder="+91 00000 00000">
                                        <span class="phone_error text-danger"></span>
                                    </div>
                                </div>

                                <div class="vppl-input-group">
                                    <label class="vppl-label">Target Department</label>
                                    <select name="subject" class="vppl-field">
                                        <option value="">Select Department</option>
                                        <option>Engineering & Design</option>
                                        <option>Operations & Maintenance</option>
                                        <option>Sales & Business Development</option>
                                        <option>Research & Development</option>
                                    </select>
                                    <span class="subject_error text-danger"></span>
                                </div>

                                <div class="vppl-input-group">
                                    <label class="vppl-label">Resume / Portfolio (Max 5MB)</label>
                                    <input type="file" name="resume" class="vppl-field" accept=".pdf,.doc,.docx">
                                    <span class="resume_error text-danger"></span>
                                </div>

                                <div class="vppl-input-group mb-4">
                                    <label class="vppl-label">Cover Note (Optional)</label>
                                    <textarea name="message" class="vppl-field" rows="3"></textarea>
                                </div>

                                <button type="submit" id="submitBtn" class="vppl-submit-btn">
                                    Submit Application
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {

                // ✅ Only text (name)
                $('.only-text').on('input', function() {
                    this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
                });

                // ✅ Only numbers (phone)
                $('.only-number').on('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
                });

                $('input, select, textarea').on('input change', function() {
                    let name = $(this).attr('name');
                    if ($(this).val().trim() !== '') {
                        $("." + name + "_error").html('');
                    }
                });

                // ✅ FIX: Clear resume error when file selected
                $('input[name="resume"]').on('change', function() {
                    if (this.files.length > 0) {
                        $(".resume_error").html('');
                    }
                });

            });
        </script>

        <script>
            gsap.registerPlugin(ScrollTrigger);

            // Hero Entrance
            gsap.to(".vppl-hero-content", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power3.out",
                delay: 0.2
            });

            // Form Section Reveal
            gsap.to(".gsap-reveal", {
                scrollTrigger: {
                    trigger: ".vppl-main-wrapper",
                    start: "top 85%",
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#jobApplyForm").submit(function(e) {

                    e.preventDefault();

                    $(".error").html(""); // clear old errors



                    let fileInput = $('input[name="resume"]')[0];
                    let file = fileInput.files[0];

                    // ✅ 5MB validation
                    if (file) {
                        let maxSize = 5 * 1024 * 1024;

                        if (file.size > maxSize) {
                            $(".resume_error").html("Resume must be less than 5MB");
                            return;
                        }
                    }

                    let formData = new FormData(this);

                    $("#submitBtn").prop("disabled", true).text("Submitting...");

                    $.ajax({
                        url: "{{ route('job.apply') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function(response) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Application Submitted',
                                text: response.message,
                                confirmButtonColor: '#22a4d4'
                            }).then(() => {
                                location.reload(); // reload AFTER user clicks OK
                            });

                        },

                        error: function(xhr) {

                            $("#submitBtn").prop("disabled", false).text("Submit Application");

                            $(".error").html("");

                            // ✅ SAFE ERROR HANDLING
                            if (xhr.responseJSON && xhr.responseJSON.errors) {

                                let errors = xhr.responseJSON.errors;

                                $.each(errors, function(field, messages) {
                                    $("." + field + "_error").html(messages[0]);
                                });

                            } else {
                                console.log(xhr.responseText); // DEBUG
                                alert("Something went wrong. Check console.");
                            }
                        }
                    });

                });

            });
        </script>
    @endpush
@endsection
