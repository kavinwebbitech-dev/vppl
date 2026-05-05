@extends('frontend.landing-pages.layouts.app')

@section('meta_title', $page->meta_title ?? 'Intellect Aqua Private Limited Coimbatore')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keyword', $page->meta_keyword ?? '')

@section('content')

    <style>
        #contactForm4 input.form4-invalid {
            border: 1px solid #ff0000 !important;
            outline: none !important;
        }

        /* Error text shown BELOW the input-group */
        #contactForm4 .form4-error {
            color: #ff0000;
            font-size: 12px;
            margin-top: -17px;
            margin-bottom: -2px;
            display: block;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="section-overlay"></div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f6f6f6" fill-opacity="1"
                d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg>
        <div class="container">
            <div class="row align-items-center main-banner">
                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    {{-- DYNAMIC: page name --}}
                    <h2 class="text-white">{!! $page->name ?? '' !!}</h2>
                    <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                        <span>Intellect</span>
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Aqua</b>
                            <b>Aqua</b>
                            <b>Aqua</b>
                        </span>
                    </h1>

                    <div class="custom-btn-group">
                        <a href="#section_2" class="btn custom-btn smoothscroll me-3"><i class="fa-brands fa-whatsapp"></i>
                            +91 95859 75551</a>
                        <a href="#section_3" class="link smoothscroll"><i class="fa-solid fa-phone"></i> +91 95859
                            75551</a>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="enquiry-form">
                        <form id="contactForm4" action="{{ route('enquiry.store') }}" method="POST">
                            @csrf
                            <h4>Enquiry Form</h4>

                            <div id="successAlert4" class="alert alert-success d-none mb-3">
                                Your request has been sent successfully!
                            </div>

                            <div class="input-group">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" placeholder="Your Email">
                            </div>
                            <div class="input-group">
                                <input type="number" name="phone" placeholder="Your Phone Number">
                            </div>
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Subject">
                            </div>
                            <input type="hidden" name="type" value="landing">
                            <div class="input-group">
                                <button type="submit">
                                    <span class="btn-text">Send Enquiry</span>
                                    <span class="btn-loader d-none">Sending...</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </section>

    <!-- About Section -->
    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 text-start">
                    <h2 class="mb-lg-5 mb-4">About Intellect Aqua</h2>
                </div>
                <div class="col-lg-12 col-12 me-auto mb-5 mb-lg-0">

                    {!! $page->banner_content ?? '' !!}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-7 col-12">
                    {!! $page->page_content ?? '' !!}
                </div>
                <div class="col-md-5 col-12">
                    <div class="category-sidebar">
                        <h3>Category List</h3>
                        {{-- DYNAMIC: services list from DB --}}
                        <ul class="category-list">
                            @foreach ($services as $service)
                                <li class="{{ $loop->first ? 'active' : '' }}">
                                    <span>
                                        <a
                                            href="{{ route('service.detail', $service->slug ?? Str::slug($service->name)) }}">
                                            {{ $service->name }}
                                        </a>
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-bg-image" id="section_3">
        <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z" stroke-width="0">
            </path>
            <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z"
                stroke-width="0"></path>
        </svg>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="section-bg-image-block">
                        <div class="text-center mb-4">
                            <h3>Our Services</h3>
                            <p class="text-center text-dark">Comprehensive solutions for efficient water treatment,
                                maintenance, and system performance.</p>
                        </div>
                        <div>
                            <div class="swiper serviceSwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="service-card">
                                            <h4>Operations and Maintenance</h4>
                                            <p class="service-text">
                                                At Intellect Aqua, we provide comprehensive Operation and Maintenance
                                                services to ensure optimal performance of your water treatment systems.
                                                Our expert team delivers reliable maintenance solutions with a focus on
                                                efficiency, compliance, and system longevity, minimizing downtime and
                                                maximizing your return on investment.</p>
                                            <button class="read-btn">Read More</button>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="service-card">
                                            <h4>Annual Maintenance Contract</h4>
                                            <p class="service-text">
                                                At Intellect Aqua, our Annual Maintenance Contracts offer end-to-end
                                                support for water and wastewater treatment facilities. We deliver
                                                proactive maintenance strategies, technical audits, and scheduled
                                                servicing executed by certified professionals adhering to industry
                                                standards. Our scalable contracts are designed to align with your
                                                business operations, ensuring consistent performance, regulatory
                                                compliance, and peace of mind year-round.</p>
                                            <button class="read-btn">Read More</button>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="service-card">
                                            <h4>Chemical and Spares</h4>
                                            <p class="service-text">
                                                At Intellect Aqua, we provide a wide range of high-quality water
                                                treatment chemicals and spare parts.
                                                Our products ensure system efficiency, reliability, and long-term
                                                performance, with all items meeting industry standards
                                                and sourced from trusted manufacturers. From RO chemicals to filtration
                                                media and mechanical spares, we offer timely supply
                                                and expert support to keep your operations running smoothly.</p>
                                            <button class="read-btn">Read More</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="swiper-pagination"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg viewBox="0 0 1265 144" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="rgba(255, 255, 255, 1)" d="M 0 40 C 164 40 164 20 328 20 L 328 20 L 328 0 L 0 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 327 20 C 445.5 20 445.5 89 564 89 L 564 89 L 564 0 L 327 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 563 89 C 724.5 89 724.5 48 886 48 L 886 48 L 886 0 L 563 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 885 48 C 1006.5 48 1006.5 67 1128 67 L 1128 67 L 1128 0 L 885 0 Z"
                stroke-width="0"></path>
            <path fill="rgba(255, 255, 255, 1)" d="M 1127 67 C 1196 67 1196 0 1265 0 L 1265 0 L 1265 0 L 1127 0 Z"
                stroke-width="0"></path>
        </svg>
    </section>

    <!-- FAQ'S -->
    <section class="membership-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mx-auto mb-lg-3 mb-3">
                    <h2><span>FAQ's</span></h2>
                    <p class="text-center">Have Questions? We've Got the Answers </p>
                </div>

                <div class="col-12">
                    {{-- DYNAMIC: FAQs from DB --}}
                    @php
                        $faqs = json_decode($page->faqs, true);
                    @endphp

                    @if (isset($page) && !empty($page->faqs) && !empty($faqs))
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $faqIndex => $faq)
                                @php
                                    $questions = array_map('trim', explode('/ ', $faq['question'] ?? ''));
                                    $answers = array_map('trim', explode('/ ', $faq['answer'] ?? ''));
                                @endphp
                                @foreach ($questions as $index => $title)
                                    @php
                                        $collapseId = 'collapse_' . $faqIndex . '_' . $index;
                                        $isFirst = $faqIndex == 0 && $index == 0;
                                    @endphp
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{ $collapseId }}"
                                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                                aria-controls="{{ $collapseId }}">
                                                {{ strip_tags($title) }}
                                            </button>
                                        </h2>
                                        <div id="{{ $collapseId }}"
                                            class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $answers[$index] ?? '' !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {

                function validateForm() {
                    let isValid = true;

                    // Clear previous errors
                    $('#contactForm4 .form4-error').remove();
                    $('#contactForm4 input').removeClass('form4-invalid');

                    const name = $('#contactForm4 [name="name"]').val().trim();
                    const email = $('#contactForm4 [name="email"]').val().trim();
                    const phone = $('#contactForm4 [name="phone"]').val().trim();
                    const message = $('#contactForm4 [name="message"]').val().trim();

                    if (name.length < 3) {
                        showError('[name="name"]', 'Please enter your name (min 3 characters)');
                        isValid = false;
                    }

                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        showError('[name="email"]', 'Please enter a valid email');
                        isValid = false;
                    }

                    const phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(phone)) {
                        showError('[name="phone"]', 'Please enter a valid 10-digit phone number');
                        isValid = false;
                    }

                    if (message.length < 5) {
                        showError('[name="message"]', 'Please enter at least 5 characters');
                        isValid = false;
                    }

                    const htmlRegex = /<[^>]*>/g;
                    if (htmlRegex.test(name) || htmlRegex.test(message)) {
                        alert('HTML or script tags are not allowed');
                        isValid = false;
                    }

                    return isValid;
                }

                // Error on INPUT border only — span goes AFTER .input-group (not inside)
                function showError(selector, msg) {
                    const $input = $('#contactForm4 ' + selector);
                    $input.addClass('form4-invalid');
                    $input.closest('.input-group').after(
                        '<span class="form4-error">' + msg + '</span>'
                    );
                }

                // Clear on typing
                $('#contactForm4').on('input', 'input', function() {
                    $(this).removeClass('form4-invalid');
                    $(this).closest('.input-group').next('.form4-error').remove();
                });

                // Submit
                $('#contactForm4').on('submit', function(e) {
                    e.preventDefault();

                    if (!validateForm()) return;

                    const $btn = $('#contactForm4 button[type="submit"]');
                    $btn.prop('disabled', true);
                    $btn.find('.btn-text').addClass('d-none');
                    $btn.find('.btn-loader').removeClass('d-none');

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function() {
                            $('#successAlert4').removeClass('d-none').hide().fadeIn(300);
                            document.getElementById('contactForm4').reset();
                            setTimeout(function() {
                                $('#successAlert4').fadeOut(300, function() {
                                    $(this).addClass('d-none').show();
                                });
                            }, 5000);
                        },
                        error: function() {
                            alert('Something went wrong. Please try again.');
                        },
                        complete: function() {
                            $btn.prop('disabled', false);
                            $btn.find('.btn-text').removeClass('d-none');
                            $btn.find('.btn-loader').addClass('d-none');
                        }
                    });
                });

            });
        </script>
    @endpush

@endsection



@extends('frontend.landing-pages.layouts.app')

@section('meta_title', $page->meta_title ?? 'Intellect Aqua Private Limited Coimbatore')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keyword', $page->meta_keyword ?? '')

@section('content')

    <style>
        #contactForm4 input.form4-invalid {
            border: 1px solid #ff0000 !important;
            outline: none !important;
        }

        /* Error text shown BELOW the input-group */
        #contactForm4 .form4-error {
            color: #ff0000;
            font-size: 12px;
            margin-top: -17px;
            margin-bottom: -2px;
            display: block;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <!-- ========== HERO ========== -->
    <section id="lnd-pg-home" class="lnd-pg-hero">
        <div class="lnd-pg-caustics"></div>
        <div class="lnd-pg-light-rays"></div>
        <div class="lnd-pg-bubbles" id="lnd-pg-bubbles"></div>
        <div class="lnd-pg-orb1"></div>
        <div class="lnd-pg-orb2"></div>

        <div class="lnd-pg-container">
            <div class="lnd-pg-hero-grid">

                <!-- Content -->
                <div class="lnd-pg-hero-content lnd-pg-reveal lnd-pg-visible">
                    <div class="lnd-pg-hero-badge">
                        <i data-lucide="droplets"></i> Top-rated Water Treatment
                    </div>
                    <h1 class="lnd-pg-hero-h1">
                        {!! $page->name ?? '' !!}
                    </h1>
                    <p class="lnd-pg-hero-desc">
                        {!! $page->banner_content ?? '' !!}
                    </p>
                    <div class="lnd-pg-trust-row">
                        <div class="lnd-pg-trust-badge"><i data-lucide="shield-check"></i> ISO Certified</div>
                        <div class="lnd-pg-trust-badge"><i data-lucide="clock"></i> 24/7 Support</div>
                        <div class="lnd-pg-trust-badge"><i data-lucide="award"></i> 15+ Years</div>
                    </div>
                </div>

                <!-- Form -->
                <div class="lnd-pg-form-wrap lnd-pg-reveal lnd-pg-d200 lnd-pg-visible" id="lnd-pg-form">
                    <div class="lnd-pg-form-glow"></div>
                    <div class="lnd-pg-glass-form">
                        <h3 class="lnd-pg-form-title">
                            <div class="lnd-pg-form-ico"><i data-lucide="waves"></i></div>
                            Get a Free Estimate
                        </h3>
                        <p class="lnd-pg-form-sub">Enter your details — our Coimbatore experts will contact you shortly.
                        </p>

                        <form onsubmit="return false;">
                            <div class="lnd-pg-field">
                                <label class="lnd-pg-label">Full Name</label>
                                <div class="lnd-pg-input-wrap">
                                    <div class="lnd-pg-input-ico"><i data-lucide="user"></i></div>
                                    <input type="text" class="lnd-pg-input" placeholder="John Doe" required>
                                </div>
                            </div>
                            <div class="lnd-pg-field">
                                <label class="lnd-pg-label">Phone Number</label>
                                <div class="lnd-pg-input-wrap">
                                    <div class="lnd-pg-input-ico"><i data-lucide="phone"></i></div>
                                    <input type="tel" class="lnd-pg-input" placeholder="+91 98XXX XXXXX" required>
                                </div>
                            </div>
                            <div class="lnd-pg-field">
                                <label class="lnd-pg-label">Service Required</label>
                                <div class="lnd-pg-input-wrap">
                                    <div class="lnd-pg-input-ico"><i data-lucide="settings-2"></i></div>
                                    <select class="lnd-pg-input">
                                        <option>Residential RO Installation</option>
                                        <option>Commercial RO Plant</option>
                                        <option>System Maintenance / Repair</option>
                                        <option>Industrial Water Treatment</option>
                                    </select>
                                    <div class="lnd-pg-select-arrow"><i data-lucide="chevron-down"></i></div>
                                </div>
                            </div>
                            <button class="lnd-pg-submit lnd-pg-rpl">
                                <span>Claim Your Quote <i data-lucide="arrow-right"></i></span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- Wave divider -->
        <div class="lnd-pg-wave-wrap">
            <svg viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="lnd-pg-gentle-wave"
                        d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="lnd-pg-parallax">
                    <use href="#lnd-pg-gentle-wave" x="48" y="0" />
                    <use href="#lnd-pg-gentle-wave" x="48" y="2" />
                    <use href="#lnd-pg-gentle-wave" x="48" y="4" />
                    <use href="#lnd-pg-gentle-wave" x="48" y="6" />
                    <use href="#lnd-pg-gentle-wave" x="48" y="8" />
                </g>
            </svg>
        </div>
    </section>

    <!-- ========== CONTENT + SIDEBAR ========== -->
    <section id="lnd-pg-content" class="lnd-pg-content-sec">
        <i data-lucide="droplets" class="lnd-pg-bg-deco"></i>

        <div class="lnd-pg-container">
            <div class="lnd-pg-content-grid">

                <!-- Main body -->
                <div class="lnd-pg-main-body">

                    {!! $page->page_content ?? '' !!}

                </div>

                <!-- Sidebar -->
                {{-- <aside class="lnd-pg-sidebar-col">
                        <div class="lnd-pg-reveal lnd-pg-d300">
                            <div class="lnd-pg-sidebar-card">
                                <div class="lnd-pg-sidebar-card-deco"></div>
                                <h4 class="lnd-pg-sidebar-title">
                                    <div class="lnd-pg-sidebar-title-ico"><i data-lucide="layers"></i></div>
                                    Our Solutions
                                </h4>
                                <nav class="lnd-pg-sidebar-nav">
                                    <a href="#" class="lnd-pg-sidebar-link">
                                        <i data-lucide="chevron-right"></i> Sewage Treatment Plant (STP)
                                    </a>
                                    <a href="#" class="lnd-pg-sidebar-link lnd-pg-active">
                                        <i data-lucide="check-circle-2"></i> Reverse Osmosis System
                                    </a>
                                    <a href="#" class="lnd-pg-sidebar-link">
                                        <i data-lucide="chevron-right"></i> Effluent Treatment Plant (ETP)
                                    </a>
                                    <a href="#" class="lnd-pg-sidebar-link">
                                        <i data-lucide="chevron-right"></i> Water Treatment Plant
                                    </a>
                                    <a href="#" class="lnd-pg-sidebar-link">
                                        <i data-lucide="chevron-right"></i> Water Softening Plant
                                    </a>
                                    <a href="#" class="lnd-pg-sidebar-link">
                                        <i data-lucide="chevron-right"></i> Ultra Filtration Plant
                                    </a>
                                </nav>

                                <div class="lnd-pg-sidebar-cta">
                                    <div class="lnd-pg-sidebar-cta-bg"></div>
                                    <div class="lnd-pg-sidebar-cta-blob"></div>
                                    <div class="lnd-pg-sidebar-cta-body">
                                        <div class="lnd-pg-sidebar-cta-ico"><i data-lucide="phone-call"></i></div>
                                        <h6>Need Help?</h6>
                                        <p>Contact our technical team for a custom plant design.</p>
                                        <a href="mailto:support@vppl.com" class="lnd-pg-sidebar-cta-btn">
                                            Enquire Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside> --}}

                <aside class="lnd-pg-sidebar-col">
                    <div class="lnd-pg-reveal lnd-pg-d300">
                        <div class="lnd-pg-sidebar-card">
                            <div class="lnd-pg-sidebar-card-deco"></div>

                            <h4 class="lnd-pg-sidebar-title">
                                <div class="lnd-pg-sidebar-title-ico">
                                    <i data-lucide="layers"></i>
                                </div>
                                Our Solutions
                            </h4>

                            <nav class="lnd-pg-sidebar-nav">
                                @foreach ($services as $service)
                                    <a href="{{ route('service.detail', $service->slug ?? \Illuminate\Support\Str::slug($service->name)) }}"
                                        class="lnd-pg-sidebar-link {{ $loop->first ? 'lnd-pg-active' : '' }}">

                                        <i data-lucide="{{ $loop->first ? 'check-circle-2' : 'chevron-right' }}"></i>

                                        {{ $service->name }}
                                    </a>
                                @endforeach
                            </nav>

                            <div class="lnd-pg-sidebar-cta">
                                <div class="lnd-pg-sidebar-cta-bg"></div>
                                <div class="lnd-pg-sidebar-cta-blob"></div>
                                <div class="lnd-pg-sidebar-cta-body">
                                    <div class="lnd-pg-sidebar-cta-ico">
                                        <i data-lucide="phone-call"></i>
                                    </div>
                                    <h6>Need Help?</h6>
                                    <p>Contact our technical team for a custom plant design.</p>
                                    <a href="mailto:support@vppl.com" class="lnd-pg-sidebar-cta-btn">
                                        Enquire Now
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </section>

    <!-- ========== FAQ ========== -->
    <section id="lnd-pg-faq" class="lnd-pg-faq-sec">
        <div class="lnd-pg-container">

            <div class="lnd-pg-faq-header lnd-pg-reveal">
                <div class="lnd-pg-faq-header-ico">
                    <i data-lucide="help-circle"></i>
                </div>
                <h2>Frequently Asked Questions</h2>
                <p>Everything you need to know about our water treatment services in Coimbatore.</p>
            </div>

            <div class="lnd-pg-faq-list">

                <div class="lnd-pg-faq-item lnd-pg-open lnd-pg-reveal lnd-pg-d100">
                    <div class="lnd-pg-faq-q">
                        <h4>1. What are the benefits of using a Reverse Osmosis System in Coimbatore?</h4>
                        <div class="lnd-pg-faq-ico"><i data-lucide="chevron-down"></i></div>
                    </div>
                    <div class="lnd-pg-faq-body">
                        <div class="lnd-pg-faq-inner">
                            <div class="lnd-pg-faq-text">
                                Using a Reverse Osmosis System in Coimbatore offers purified water, improved health, and
                                efficient water treatment. VPPL ensures quality and reliable long-term performance with
                                systems designed for the local water profile.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lnd-pg-faq-item lnd-pg-reveal lnd-pg-d200">
                    <div class="lnd-pg-faq-q">
                        <h4>2. How does VPPL maintain Reverse Osmosis Systems in Coimbatore?</h4>
                        <div class="lnd-pg-faq-ico"><i data-lucide="chevron-down"></i></div>
                    </div>
                    <div class="lnd-pg-faq-body">
                        <div class="lnd-pg-faq-inner">
                            <div class="lnd-pg-faq-text">
                                VPPL provides professional maintenance for RO systems in Coimbatore, ensuring long-term
                                reliability through scheduled filter replacements, membrane cleaning, and proactive
                                system health checks.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lnd-pg-faq-item lnd-pg-reveal lnd-pg-d300">
                    <div class="lnd-pg-faq-q">
                        <h4>3. Is the Reverse Osmosis System from VPPL efficient for local businesses?</h4>
                        <div class="lnd-pg-faq-ico"><i data-lucide="chevron-down"></i></div>
                    </div>
                    <div class="lnd-pg-faq-body">
                        <div class="lnd-pg-faq-inner">
                            <div class="lnd-pg-faq-text">
                                Yes — our commercial RO systems are engineered for high efficiency, helping local
                                businesses maintain an uninterrupted supply of pure water, reducing operational costs
                                over time.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lnd-pg-faq-item lnd-pg-reveal lnd-pg-d400">
                    <div class="lnd-pg-faq-q">
                        <h4>4. Can I customize my Reverse Osmosis System in Coimbatore?</h4>
                        <div class="lnd-pg-faq-ico"><i data-lucide="chevron-down"></i></div>
                    </div>
                    <div class="lnd-pg-faq-body">
                        <div class="lnd-pg-faq-inner">
                            <div class="lnd-pg-faq-text">
                                Absolutely! VPPL offers fully customizable reverse osmosis systems to meet any specific
                                capacity, pressure, or space constraint for residential or commercial clients across
                                Coimbatore.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {

                function validateForm() {
                    let isValid = true;

                    // Clear previous errors
                    $('#contactForm4 .form4-error').remove();
                    $('#contactForm4 input').removeClass('form4-invalid');

                    const name = $('#contactForm4 [name="name"]').val().trim();
                    const email = $('#contactForm4 [name="email"]').val().trim();
                    const phone = $('#contactForm4 [name="phone"]').val().trim();
                    const message = $('#contactForm4 [name="message"]').val().trim();

                    if (name.length < 3) {
                        showError('[name="name"]', 'Please enter your name (min 3 characters)');
                        isValid = false;
                    }

                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        showError('[name="email"]', 'Please enter a valid email');
                        isValid = false;
                    }

                    const phoneRegex = /^\d{10}$/;
                    if (!phoneRegex.test(phone)) {
                        showError('[name="phone"]', 'Please enter a valid 10-digit phone number');
                        isValid = false;
                    }

                    if (message.length < 5) {
                        showError('[name="message"]', 'Please enter at least 5 characters');
                        isValid = false;
                    }

                    const htmlRegex = /<[^>]*>/g;
                    if (htmlRegex.test(name) || htmlRegex.test(message)) {
                        alert('HTML or script tags are not allowed');
                        isValid = false;
                    }

                    return isValid;
                }

                // Error on INPUT border only — span goes AFTER .input-group (not inside)
                function showError(selector, msg) {
                    const $input = $('#contactForm4 ' + selector);
                    $input.addClass('form4-invalid');
                    $input.closest('.input-group').after(
                        '<span class="form4-error">' + msg + '</span>'
                    );
                }

                // Clear on typing
                $('#contactForm4').on('input', 'input', function() {
                    $(this).removeClass('form4-invalid');
                    $(this).closest('.input-group').next('.form4-error').remove();
                });

                // Submit
                $('#contactForm4').on('submit', function(e) {
                    e.preventDefault();

                    if (!validateForm()) return;

                    const $btn = $('#contactForm4 button[type="submit"]');
                    $btn.prop('disabled', true);
                    $btn.find('.btn-text').addClass('d-none');
                    $btn.find('.btn-loader').removeClass('d-none');

                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function() {
                            $('#successAlert4').removeClass('d-none').hide().fadeIn(300);
                            document.getElementById('contactForm4').reset();
                            setTimeout(function() {
                                $('#successAlert4').fadeOut(300, function() {
                                    $(this).addClass('d-none').show();
                                });
                            }, 5000);
                        },
                        error: function() {
                            alert('Something went wrong. Please try again.');
                        },
                        complete: function() {
                            $btn.prop('disabled', false);
                            $btn.find('.btn-text').removeClass('d-none');
                            $btn.find('.btn-loader').addClass('d-none');
                        }
                    });
                });

            });
        </script>
    @endpush

@endsection
