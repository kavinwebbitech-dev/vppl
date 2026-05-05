@extends('frontend.layouts.app')

@section('title', 'Contact Us')

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
            background-color: var(--vppl-white);
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
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.9) 20%, rgba(10, 45, 77, 0.3));
            z-index: 1;
            overflow: hidden;

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
            letter-spacing: -1.5px;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- Contact Content Styling --- */
        .contact-section {
            padding: 90px 0;
        }

        .contact-info-card {
            background: #f8fafc;
            border-radius: 20px;
            padding: 40px;
            height: max-content;
            border: 1px solid var(--vppl-border);
            transition: var(--transition);
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .icon-box {
            width: 50px;
            height: 50px;
            background: var(--grad-primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            color: #fff;
            font-size: 20px;
        }

        .contact-label {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--vppl-primary);
            margin-bottom: 10px;
            display: block;
        }

        .contact-detail {
            font-size: 18px;
            font-weight: 600;
            color: var(--vppl-secondary);
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }

        .contact-detail:hover {
            color: var(--vppl-primary);
        }

        /* --- Form Styling --- */
        .vppl-form-wrapper {
            background: #fff;
            padding: 50px;
            border-radius: 24px;
            border: 1px solid var(--vppl-border);
            box-shadow: 0 30px 60px rgba(10, 45, 77, 0.05);
        }

        .vppl-input-group {
            margin-bottom: 20px;
        }

        .vppl-field {
            width: 100%;
            padding: 15px 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #fcfdfe;
            transition: var(--transition);
        }

        .vppl-field:focus {
            outline: none;
            border-color: var(--vppl-primary);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(34, 164, 212, 0.1);
        }

        .btn-vppl-send {
            background: var(--grad-primary);
            color: #fff;
            border: none;
            padding: 16px 40px;
            border-radius: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: var(--transition);
        }

        .btn-vppl-send:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(10, 45, 77, 0.2);
        }

        .gsap-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        @media (max-width: 991px) {
            .contact-section {
                padding: 60px 0;
            }

            .vppl-form-wrapper {
                padding: 30px;
                margin-top: 30px;
            }
        }
    </style>

    <div id="wrapper">
        <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
            <div class="vppl-hero-overlay"></div>
            <div class="container relative z-index-1000">
                <div class="vppl-hero-content">
                    <ul class="vppl-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                    <h1 class="vppl-hero-title">Get In <span class='vppl-gradient-text'>Touch</span> With Us</h1>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-5 gsap-reveal">
                        <h2 class="fw-black text-uppercase mb-4" style="letter-spacing: -1px;">Let's discuss your
                            <br><span class="vppl-gradient-text">water solutions.</span>
                        </h2>
                        <p class="text-secondary mb-5">Our experts are ready to assist you with technical enquiries,
                            project recovery systems, and industrial compliance needs.</p>

                        <div class="contact-info-card">
                            <div class="mb-4">
                                <span class="contact-label">Corporate Office</span>
                                <p class="contact-detail" style="font-size: 16px;">No.2, Flat 3, Gflr, Janakaraj Street,
                                    Devaraj Nagar, Saligramam, Chennai - 600093.</p>
                            </div>

                            <div class="mb-4">
                                <span class="contact-label">Direct Line</span>
                                <a href="tel:+919843514600" class="contact-detail">+91 98435 14600</a>
                                <a href="tel:+919943835148" class="contact-detail">+91 99438 35148</a>
                            </div>

                            <div>
                                <span class="contact-label">Email Support</span>
                                <a href="mailto:venkadavanprojectschennai@gmail.com" class="contact-detail"
                                    style="font-size: 15px;">venkadavanprojectschennai@gmail.com</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 gsap-reveal">
                        <div class="vppl-form-wrapper">
                            <form id="contact_form" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="Contact">
                                <div class="row">
                                    <div class="col-md-6 vppl-input-group">
                                        <input type="text" name="name" class="vppl-field" placeholder="Full Name">
                                        <span class="name_error text-danger"></span>
                                    </div>

                                    <div class="col-md-6 vppl-input-group">
                                        <input type="email" name="email" class="vppl-field" placeholder="Email Address">
                                        <span class="email_error text-danger"></span>
                                    </div>
                                </div>

                                <div class="vppl-input-group">
                                    <input type="text" name="phone" class="vppl-field" placeholder="Phone Number">
                                    <span class="phone_error text-danger"></span>
                                </div>

                                <div class="vppl-input-group">
                                    <select name="subject" class="vppl-field">
                                        <option value="">Select Subject</option>
                                        <option>General Enquiry</option>
                                        <option>Technical Support</option>
                                        <option>Project Quotation</option>
                                        <option>Career Inquiry</option>
                                    </select>
                                </div>

                                <div class="vppl-input-group">
                                    <textarea name="message" class="vppl-field" rows="5" placeholder="How can we help you?"></textarea>
                                    <span class="message_error text-danger"></span>
                                </div>

                                <div class="vppl-input-group">

                                    <div class="d-flex flex-wrap align-items-center gap-2">

                                        <!-- Input -->
                                        <input type="number" name="captcha" class="vppl-field flex-grow-1"
                                            placeholder="Enter Answer" style="width:150px;">

                                        <!-- Question -->
                                        <input type="text" id="math-question" class="vppl-field" readonly
                                            style="width:120px;">

                                        <!-- Refresh -->
                                        <button type="button" class="btn-danger p-1 " onclick="loadCaptcha()">↻</button>

                                        <!-- ✅ ERROR FULL WIDTH -->
                                        <span class="captcha_error text-danger w-100"></span>

                                    </div>

                                </div>


                                <button type="submit" id="submitBtn" class="btn-vppl-send">Send Message</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="no-top">
            <div class="container-fluid p-0">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.855169550702!2d80.1983!3d13.0519!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDAzJzA2LjgiTiA4MMKwMTEnNTMuOSJF!5e0!3m2!1sen!2sin!4v1710000000000!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0; filter: grayscale(1) invert(0.9);" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function loadCaptcha() {
            $.get("{{ url('/math-captcha') }}", function(data) {
                $('#math-question').val(data.question);
            });
        }

        function refreshCaptcha() {
            loadCaptcha();
        }

        $(document).ready(function() {
            loadCaptcha();

            // Clear errors on input
            $('input, select, textarea').on('input change', function() {
                let name = $(this).attr('name');
                if ($(this).val().trim() !== '') {
                    $("." + name + "_error").html('');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            // ✅ FIELD VALIDATION FUNCTION
            function validateField(name, value) {
                let error = "";

                switch (name) {

                    case "name":
                        if (!value.trim()) {
                            error = "Name is required";
                        } else if (!/^[A-Za-z\s]+$/.test(value)) {
                            error = "Only letters allowed";
                        }
                        break;

                    case "email":
                        if (!value.trim()) {
                            error = "Email is required";
                        } else if (!/^\S+@\S+\.\S+$/.test(value)) {
                            error = "Invalid email format";
                        }
                        break;

                    case "phone":
                        if (!value.trim()) {
                            error = "Phone is required";
                        } else if (!/^\d{10}$/.test(value)) {
                            error = "Phone must be exactly 10 digits";
                        }
                        break;

                    case "subject":
                        if (!value) {
                            error = "Please select subject";
                        }
                        break;

                    case "message":
                        if (!value.trim()) {
                            error = "Message is required";
                        } else if (value.length < 5) {
                            error = "Minimum 5 characters required";
                        }
                        break;

                    case "captcha":
                        if (!value) {
                            error = "Captcha is required";
                        }
                        break;
                }

                $("." + name + "_error").html(error);
                return error === "";
            }

            // ✅ LIVE VALIDATION (on typing)
            $('input, textarea, select').on('input change', function() {
                let name = $(this).attr('name');
                let value = $(this).val();

                if (name) {
                    validateField(name, value);
                }
            });

            // ✅ SUBMIT VALIDATION
            $("#contact_form").submit(function(e) {
                e.preventDefault();

                let isValid = true;

                $('#contact_form').find('input, textarea, select').each(function() {
                    let name = $(this).attr('name');
                    let value = $(this).val();

                    if (name) {
                        if (!validateField(name, value)) {
                            isValid = false;
                        }
                    }
                });

                if (!isValid) return; // ❌ STOP if errors

                // ✅ AJAX CALL
                let formData = new FormData(this);

                $("#submitBtn").prop("disabled", true).text("Sending...");

                $.ajax({
                    url: "{{ route('enquiry.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function(response) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });

                        $('#contact_form')[0].reset();
                        loadCaptcha();

                        $("#submitBtn").prop("disabled", false).text("Send Message");
                    },

                    error: function(xhr) {

                        $("#submitBtn").prop("disabled", false).text("Send Message");

                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;

                            $.each(errors, function(field, messages) {
                                $("." + field + "_error").html(messages[0]);
                            });
                        }
                    }
                });

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
            ease: "power3.out"
        });

        // Content Reveal
        gsap.utils.toArray('.gsap-reveal').forEach((el) => {
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 85%",
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
