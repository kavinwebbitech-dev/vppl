@extends('frontend.landing-pages.layouts.app')

@section('meta_title', $page->meta_title ?? 'landing page')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keyword', $page->meta_keyword ?? '')

@section('content')
    <style>
        .vppl-has-dropdown {
            position: relative;
            display: inline-block;
        }

        .vppl-dropdown-box {
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            min-width: 260px;
            display: none;
            padding: 10px 0;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .vppl-dropdown-box li {
            list-style: none;
        }

        .vppl-dropdown-box li a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
        }

        .vppl-dropdown-box li a:hover {
            background: #f5f5f5;
        }

        .vppl-has-dropdown:hover .vppl-dropdown-box {
            display: block;
        }
    </style>
    <div class="lnd-pg-wrap" id="lnd-pg-root">

        <!-- Scroll progress -->
        <div class="lnd-pg-scroll-bar" id="lnd-pg-progress"></div>

        <!-- ========== HEADER ========== -->
        <header class="lnd-pg-header" id="lnd-pg-header">
            <div class="lnd-pg-container">
                <div class="lnd-pg-header-inner">

                    <div class="lnd-pg-logo">
                        <a href="{{ route('home') }}" class="lnd-pg-logo">
                            <img src="{{ asset('asset/images/vppl.svg') }}" alt="VPPL"
                                onerror="this.style.display='none'">
                            <span class="lnd-pg-logo-name">VPPL</span>
                        </a>
                    </div>

                    <nav class="lnd-pg-nav-desktop">

                        <a href="#lnd-pg-home" class="lnd-pg-nav-link">Home</a>

                        <a class="lnd-pg-nav-link" href="{{ route('about') }}">
                            About Us
                        </a>

                        <!-- Projects Dropdown -->
                        <li class="vppl-has-dropdown" style="list-style: none; position: relative;">
                            <a class="lnd-pg-nav-link" href="javascript:void(0);">
                                Services
                                <i class="fa fa-chevron-down ms-1 dropdown-icon"></i>
                            </a>

                            <ul class="vppl-dropdown-box">
                                <li>
                                    <a href="{{ route('service-single') }}">
                                        Water Treatment Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('sewage-treatment-plant') }}">
                                        Sewage Treatment Plant (STP)
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('effluent-treatment-plant') }}">
                                        Effluent Treatment Plant (ETP)
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('reverse-osmosis-plant') }}">
                                        Reverse Osmosis Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('water-softening-plant') }}">
                                        Water Softening Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('ultra-filtration-plant') }}">
                                        Ultra Filtration Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('iron-removal-plant') }}">
                                        Iron Removal Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('mineral-water-treatment-plant') }}">
                                        Mineral Water Treatment
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('demineralization-plant') }}">
                                        Demineralization Plant
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('hydro-pneumatic-system-pumps') }}">
                                        Hydro Pneumatic Pumps
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('core-products') }}">
                                        Core Products
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <a href="#lnd-pg-faq" class="lnd-pg-nav-link">FAQ</a>

                        <a class="lnd-pg-nav-link" href="{{ route('news-event') }}">
                            News & Events
                        </a>

                        <a class="lnd-pg-nav-link" href="{{ route('gallery') }}">
                            Gallery
                        </a>

                        <a class="lnd-pg-nav-link" href="{{ route('careers') }}">
                            Career
                        </a>

                        <a class="lnd-pg-nav-link" href="{{ route('contact') }}">
                            Contact
                        </a>

                    </nav>

                    <div style="display:flex;align-items:center;gap:1rem;z-index:50;">
                        <a href="{{ route('contact') }}" class="lnd-pg-btn-cta">
                            <span>Get a Quote <i data-lucide="arrow-right"></i></span>
                        </a>
                        <button class="lnd-pg-mob-toggle" id="lnd-pg-mob-btn" aria-label="Open Menu">
                            <i data-lucide="menu"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <!-- Mobile menu -->
        <div class="lnd-pg-mob-menu" id="lnd-pg-mob-menu">
            <button class="lnd-pg-mob-close" id="lnd-pg-mob-close" aria-label="Close Menu">
                <i data-lucide="x"></i>
            </button>
            <nav class="lnd-pg-mob-links">
                <a href="#lnd-pg-home" class="lnd-pg-mob-link">Home <i data-lucide="chevron-right"></i></a>
                <a href="#lnd-pg-content" class="lnd-pg-mob-link">Services<i data-lucide="chevron-right"></i></a>
                <a href="#lnd-pg-faq" class="lnd-pg-mob-link">FAQ <i data-lucide="chevron-right"></i></a>
            </nav>
            <div class="lnd-pg-mob-cta-wrap">
                <a href="{{ route('contact') }}" class="lnd-pg-btn-mob-cta" id="lnd-pg-mob-cta">
                    <span>Get a Free Quote <i data-lucide="arrow-right"></i></span>
                </a>
            </div>
        </div>

        <main>

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
                                <p class="lnd-pg-form-sub">Enter your details — our Coimbatore experts will contact you
                                    shortly.</p>

                                <form id="contactForm" class="lnd-pg-form" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="Landing">

                                    <!-- Name -->
                                    <div class="lnd-pg-field">
                                        <label class="lnd-pg-label">Full Name</label>
                                        <div class="lnd-pg-input-wrap">
                                            <div class="lnd-pg-input-ico"><i data-lucide="user"></i></div>
                                            <input type="text" name="name" class="lnd-pg-input"
                                                placeholder="John Doe">
                                        </div>
                                        <span class="error name_error text-danger"></span>
                                    </div>

                                    <div class="lnd-pg-field">
                                        <label class="lnd-pg-label">Email Address</label>
                                        <div class="lnd-pg-input-wrap">
                                            <div class="lnd-pg-input-ico"><i data-lucide="mail"></i></div>
                                            <input type="email" name="email" class="lnd-pg-input"
                                                placeholder="john.doe@example.com">
                                        </div>
                                        <span class="error email_error text-danger"></span>
                                    </div>

                                    <!-- Phone -->
                                    <div class="lnd-pg-field">
                                        <label class="lnd-pg-label">Phone Number</label>
                                        <div class="lnd-pg-input-wrap">
                                            <div class="lnd-pg-input-ico"><i data-lucide="phone"></i></div>
                                            <input type="tel" name="phone" class="lnd-pg-input"
                                                placeholder="+91 98XXX XXXXX">
                                        </div>
                                        <span class="error phone_error text-danger"></span>
                                    </div>

                                    <!-- Service -->
                                    <div class="lnd-pg-field">
                                        <label class="lnd-pg-label">Service Required</label>
                                        <div class="lnd-pg-input-wrap">
                                            <div class="lnd-pg-input-ico"><i data-lucide="settings-2"></i></div>
                                            <select name="service" class="lnd-pg-input">
                                                <option value="">Select Service</option>
                                                <option>Residential RO Installation</option>
                                                <option>Commercial RO Plant</option>
                                                <option>System Maintenance / Repair</option>
                                                <option>Industrial Water Treatment</option>
                                            </select>
                                        </div>
                                        <span class="error service_error text-danger"></span>
                                    </div>

                                    <!-- CAPTCHA -->
                                    {{-- <div class="vppl-input-group">
                                        <div class="d-flex flex-wrap align-items-center gap-2">

                                            <!-- Answer Input -->
                                            <input type="number" name="captcha" class="vppl-field flex-grow-1"
                                                placeholder="Enter Answer" style="min-width:150px;">

                                            <!-- Question -->
                                            <input type="text" id="math-question" class="vppl-field text-center"
                                                readonly style="width:120px; font-weight:600;">

                                            <!-- Refresh Button -->
                                            <button type="button"
                                                class="btn btn-sm btn-outline-danger d-flex align-items-center justify-content-center"
                                                onclick="loadCaptcha()" title="Refresh Captcha"
                                                style="width:40px; height:40px; border-radius:8px;">

                                                <i data-lucide="refresh-cw"></i>
                                            </button>

                                            <!-- Error -->
                                            <span class="captcha_error text-danger w-100"></span>

                                        </div>
                                    </div> --}}
                                    <div class="vppl-input-group mt-3">
                                        <div class="d-flex flex-wrap align-items-center gap-2">
                                            <!-- Answer Input -->
                                            <input type="number" name="captcha" id="captcha-answer"
                                                class="vppl-field flex-grow-1" placeholder="Enter Answer">

                                            <!-- Question Box -->
                                            <input type="text" id="math-question"
                                                class="vppl-field text-center math-box" readonly value="7 + 10 = ?">

                                            <!-- Refresh Button -->
                                            <button type="button" class="btn-refresh" onclick="loadCaptcha()"
                                                title="Refresh Captcha">
                                                <i data-lucide="refresh-cw"></i>
                                            </button>

                                            <!-- Error Message Container -->
                                            <span class="captcha_error text-danger" style=""></span>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit" class="lnd-pg-submit">
                                        <span>Claim Your Quote <i data-lucide="arrow-right"></i></span>
                                    </button>

                                    <!-- Success Message -->
                                    <div class="lnd-pg-form-note d-none success-box" id="successMsg">
                                        Your request has been submitted successfully.
                                    </div>
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

                            <div class="lnd-pg-stats-row lnd-pg-reveal lnd-pg-d100">
                                <div class="lnd-pg-stat-card">
                                    <div class="lnd-pg-stat-num">500+</div>
                                    <div class="lnd-pg-stat-label">Projects Done</div>
                                </div>
                                <div class="lnd-pg-stat-card">
                                    <div class="lnd-pg-stat-num">15+</div>
                                    <div class="lnd-pg-stat-label">Years Experience</div>
                                </div>
                                <div class="lnd-pg-stat-card">
                                    <div class="lnd-pg-stat-num">98%</div>
                                    <div class="lnd-pg-stat-label">Satisfaction Rate</div>
                                </div>
                                <div class="lnd-pg-stat-card">
                                    <div class="lnd-pg-stat-num">24/7</div>
                                    <div class="lnd-pg-stat-label">Support Available</div>
                                </div>
                            </div>

                        </div>

                        {{-- <aside class="lnd-pg-sidebar-col">
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

                                                <i
                                                    data-lucide="{{ $loop->first ? 'check-circle-2' : 'chevron-right' }}"></i>

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
                                            <a href="{{ route('contact') }}" class="lnd-pg-sidebar-cta-btn">
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
                                        <div class="lnd-pg-sidebar-title-ico"><i data-lucide="layers"></i></div>
                                        Our Solutions
                                    </h4>
                                    <nav class="lnd-pg-sidebar-nav">
                                        <a href="{{ route('sewage-treatment-plant') }}"
                                            class="lnd-pg-sidebar-link lnd-pg-active">
                                            <i data-lucide="check-circle-2"></i> Sewage Treatment Plant (STP)
                                        </a>
                                        <a href="{{ route('reverse-osmosis-plant') }}" class="lnd-pg-sidebar-link ">
                                            <i data-lucide="chevron-right"></i> Reverse Osmosis System
                                        </a>
                                        <a href="{{ route('effluent-treatment-plant') }}" class="lnd-pg-sidebar-link">
                                            <i data-lucide="chevron-right"></i> Effluent Treatment Plant (ETP)
                                        </a>
                                        <a href="{{ route('service-single') }}" class="lnd-pg-sidebar-link">
                                            <i data-lucide="chevron-right"></i> Water Treatment Plant
                                        </a>
                                        <a href="{{ route('water-softening-plant') }}" class="lnd-pg-sidebar-link">
                                            <i data-lucide="chevron-right"></i> Water Softening Plant
                                        </a>
                                        <a href="{{ route('ultra-filtration-plant') }}" class="lnd-pg-sidebar-link">
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
                                            <a href="{{ route('contact') }}" class="lnd-pg-sidebar-cta-btn">
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

                    {{-- Header --}}
                    <div class="lnd-pg-faq-header lnd-pg-reveal">
                        <div class="lnd-pg-faq-header-ico">
                            <i data-lucide="help-circle"></i>
                        </div>
                        <h2>Frequently Asked Questions</h2>
                        <p>Everything you need to know about our water treatment services.</p>
                    </div>

                    {{-- FAQ LIST --}}
                    @php
                        $faqs = json_decode($page->faqs ?? '[]', true);
                    @endphp

                    @if (is_array($faqs) && count($faqs))
                        <div class="lnd-pg-faq-list">

                            @foreach ($faqs as $faq)
                                <div class="lnd-pg-faq-item {{ $loop->first ? 'lnd-pg-open' : '' }} lnd-pg-reveal">

                                    {{-- Question --}}
                                    <div class="lnd-pg-faq-q">
                                        <h4>
                                            {{ $loop->iteration }}. {{ $faq['question'] ?? '' }}
                                        </h4>

                                        <div class="lnd-pg-faq-ico">
                                            <i data-lucide="chevron-down"></i>
                                        </div>
                                    </div>

                                    {{-- Answer --}}
                                    <div class="lnd-pg-faq-body">
                                        <div class="lnd-pg-faq-inner">
                                            <div class="lnd-pg-faq-text">
                                                {!! $faq['answer'] ?? '' !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    @else
                        {{-- Optional fallback --}}
                        <p>No FAQs available.</p>
                    @endif

                </div>
            </section>

            <!-- ========== FOOTER ========== -->
            <footer class="lnd-pg-footer">
                <div class="lnd-pg-footer-anim-bg"></div>
                <div class="lnd-pg-footer-wave-deco"></div>

                <div class="lnd-pg-container position-relative pt-5 pb-5">
                    <div class="row gx-5">

                        <!-- Brand -->
                        <div class="col-lg-4 col-md-12">
                            <div class="lnd-pg-ft-brand">
                                <a href="{{ route('home') }}" class="lnd-pg-ft-logo-link">
                                    <img src="{{ asset('asset/images/vppl.svg') }}" class="lnd-pg-ft-logo"
                                        alt="VPPL Logo" onerror="this.src='';this.alt='VPPL'">
                                </a>
                                <p class="lnd-pg-ft-desc">
                                    Transform your water and wastewater systems with VPPL's expert treatment solutions.
                                    Reliable, efficient, and sustainable — tailored to your industry requirements.
                                </p>
                                <div class="lnd-pg-ft-socials">
                                    <a href="#" class="lnd-pg-ft-social"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                    <a href="#" class="lnd-pg-ft-social"><i class="fa-brands fa-x-twitter"></i></a>
                                    <a href="#" class="lnd-pg-ft-social"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#" class="lnd-pg-ft-social"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="#" class="lnd-pg-ft-social"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Links -->
                        <div class="col-lg-4 col-md-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="lnd-pg-ft-widget">
                                        <h5 class="lnd-pg-ft-widget-title">Company</h5>
                                        <ul class="lnd-pg-ft-link-list">
                                            <li><a href="{{ route('home') }}">Home</a></li>
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('careers') }}">Career</a></li>
                                            <li><a href="{{ route('news-event') }}">News &amp; Events</a></li>
                                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="lnd-pg-ft-widget">
                                        <h5 class="lnd-pg-ft-widget-title">Solutions</h5>
                                        <ul class="lnd-pg-ft-link-list">
                                            <li><a href="{{ route('mineral-water-treatment-plant') }}">RO Plant</a></li>
                                            <li><a href="{{ route('water-softening-plant') }}">Water Softening</a></li>
                                            <li><a href="{{ route('ultra-filtration-plant') }}">Ultra Filtration</a></li>
                                            <li><a href="{{ route('iron-removal-plant') }}">Iron Removal</a></li>
                                            <li><a href="{{ route('demineralization-plant') }}">DM Plant</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="col-lg-4 col-md-12">
                            <div class="lnd-pg-ft-contact">
                                <div class="lnd-pg-ft-contact-row">
                                    <div class="lnd-pg-ft-contact-ico">
                                        <i class="fa-solid fa-location-dot" style="color:#fff"></i>
                                    </div>
                                    <div>
                                        <div class="lnd-pg-ft-contact-label">Location</div>
                                        <p class="lnd-pg-ft-contact-text">No.2, Flat 3, Saligramam,<br>Chennai –
                                            600093.</p>
                                    </div>
                                </div>

                                <div class="lnd-pg-ft-contact-row">
                                    <div class="lnd-pg-ft-contact-ico">
                                        <i class="fa-solid fa-phone-volume" style="color:#fff"></i>
                                    </div>
                                    <div>
                                        <div class="lnd-pg-ft-contact-label">Quick Connect</div>
                                        <a href="tel:+919843514600" class="lnd-pg-ft-contact-link">+91 98435 14600</a>
                                    </div>
                                </div>

                                <div class="lnd-pg-ft-contact-row">
                                    <div class="lnd-pg-ft-contact-ico">
                                        <i class="fa-solid fa-envelope-open-text" style="color:#fff"></i>
                                    </div>
                                    <div>
                                        <div class="lnd-pg-ft-contact-label">Email Us</div>
                                        <a href="mailto:support@vppl.com"
                                            class="lnd-pg-ft-contact-link">support@vppl.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Bottom bar -->
                <div class="lnd-pg-ft-bottom">
                    <div class="lnd-pg-container">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-start">
                                <p class="lnd-pg-ft-copy mb-0">
                                    &copy; 2026 <strong>VPPL</strong>. All Rights Reserved.
                                </p>
                            </div>
                            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                                <ul class="lnd-pg-ft-legal justify-content-center justify-content-md-end">
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </main>

        <!-- WhatsApp FAB -->
        <a href="https://wa.me/919843514600" target="_blank" rel="noopener noreferrer" class="lnd-pg-wa-btn"
            aria-label="Chat on WhatsApp">
            <div class="lnd-pg-wa-ping"></div>
            <i class="fab fa-whatsapp fs-2"></i>
        </a>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        lucide.createIcons();

        const root = document.getElementById('lnd-pg-root');
        const header = document.getElementById('lnd-pg-header');
        const mobBtn = document.getElementById('lnd-pg-mob-btn');
        const mobMenu = document.getElementById('lnd-pg-mob-menu');
        const mobClose = document.getElementById('lnd-pg-mob-close');
        const mobCta = document.getElementById('lnd-pg-mob-cta');
        const progress = document.getElementById('lnd-pg-progress');

        /* ------ Header scroll ------ */
        window.addEventListener('scroll', () => {
            header.classList.toggle('lnd-pg-scrolled', window.scrollY > 10);
            const h = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            progress.style.width = ((window.scrollY / h) * 100) + '%';
        }, {
            passive: true
        });

        /* ------ Mobile menu ------ */
        function toggleMob() {
            mobMenu.classList.toggle('lnd-pg-open');
            root.classList.toggle('lnd-pg-nav-open');
        }
        mobBtn.addEventListener('click', toggleMob);
        mobClose.addEventListener('click', toggleMob);
        mobCta.addEventListener('click', toggleMob);
        document.querySelectorAll('.lnd-pg-mob-link').forEach(l => l.addEventListener('click', toggleMob));

        /* ------ Scroll reveal ------ */
        const revealObs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('lnd-pg-visible');
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -40px 0px'
        });
        document.querySelectorAll('.lnd-pg-reveal').forEach(el => revealObs.observe(el));

        /* ------ FAQ ------ */
        document.querySelectorAll('.lnd-pg-faq-item').forEach(item => {
            item.querySelector('.lnd-pg-faq-q').addEventListener('click', () => {
                const wasOpen = item.classList.contains('lnd-pg-open');
                document.querySelectorAll('.lnd-pg-faq-item').forEach(i => i.classList.remove(
                    'lnd-pg-open'));
                if (!wasOpen) item.classList.add('lnd-pg-open');
            });
        });

        /* ------ Bubbles + particles ------ */
        const bubbleContainer = document.getElementById('lnd-pg-bubbles');

        function spawnWaterFx() {
            const mobile = window.innerWidth < 768;
            const prob = mobile ? .65 : .38;

            if (Math.random() > prob) {
                const b = document.createElement('div');
                b.className = 'lnd-pg-bubble' + (Math.random() > .5 ? ' lnd-pg-blur' : '');
                const sz = Math.random() * (mobile ? 14 : 22) + 7;
                const dur = Math.random() * 5 + 5;
                b.style.cssText = `width:${sz}px;height:${sz}px;left:${Math.random()*100}%;animation-duration:${dur}s;`;
                bubbleContainer.appendChild(b);
                setTimeout(() => b.remove(), dur * 1000);
            }
            if (Math.random() > prob) {
                const p = document.createElement('div');
                p.className = 'lnd-pg-particle';
                const sz = Math.random() * 3 + 1;
                const dur = Math.random() * 14 + 11;
                p.style.cssText =
                    `width:${sz}px;height:${sz}px;left:${Math.random()*100}%;bottom:-10px;animation:lnd-pg-float-slow ${dur}s linear forwards;`;
                bubbleContainer.appendChild(p);
                setTimeout(() => p.remove(), dur * 1000);
            }
        }
        setInterval(spawnWaterFx, window.innerWidth < 768 ? 420 : 200);
        for (let i = 0; i < (window.innerWidth < 768 ? 12 : 28); i++) setTimeout(spawnWaterFx, i * 65);

        /* ------ Ripple on submit ------ */
        document.querySelectorAll('.lnd-pg-rpl').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const rect = this.getBoundingClientRect();
                const d = Math.max(rect.width, rect.height);
                const span = document.createElement('span');
                span.className = 'lnd-pg-ripple-dot';
                span.style.cssText =
                    `width:${d}px;height:${d}px;left:${e.clientX-rect.left}px;top:${e.clientY-rect.top}px;transform:translate(-50%,-50%) scale(0);`;
                this.appendChild(span);
                setTimeout(() => span.remove(), 620);
            });
        });
    </script>
    <script>
        function loadCaptcha() {
            $.get("{{ url('/math-captcha') }}", function(data) {
                $('#math-question').val(data.question);
            });
        }

        $(document).ready(function() {

            // load captcha on page load
            loadCaptcha();

            // Only numbers (phone)
            $('input[name="phone"]').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);
            });

            // Clear errors on typing
            $('input, select').on('input change', function() {
                let name = $(this).attr('name');
                $("." + name + "_error").html('');
            });

            $('#contactForm').submit(function(e) {
                e.preventDefault();

                let isValid = true;

                let name = $('input[name="name"]').val().trim();
                let phone = $('input[name="phone"]').val().trim();
                let email = $('input[name="email"]').val().trim();
                let service = $('select[name="service"]').val();
                let captcha = $('input[name="captcha"]').val().trim();

                $('.name_error, .phone_error, .email_error, .service_error, .captcha_error').html('');

                if (!name) {
                    $('.name_error').html('Name is required');
                    isValid = false;
                } else if (!/^[a-zA-Z\s]{3,}$/.test(name)) {
                    $('.name_error').html('Only letters allowed (min 3 characters)');
                    isValid = false;
                }

                if (!phone) {
                    $('.phone_error').html('Phone is required');
                    isValid = false;
                } else if (!/^[0-9]{10}$/.test(phone)) {
                    $('.phone_error').html('Enter valid 10-digit number');
                    isValid = false;
                }

                if (!service) {
                    $('.service_error').html('Please select service');
                    isValid = false;
                }
                if (!email) {
                    $('.email_error').html('Email is required');
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $('.email_error').html('Enter a valid email');
                    isValid = false;
                }

                if (!captcha) {
                    $('.captcha_error').html('Captcha is required');
                    isValid = false;
                }

                if (!isValid) return;

                let formData = new FormData(this);

                let btn = $(this).find('button[type="submit"]');
                btn.prop('disabled', true).text('Sending...');

                $.ajax({
                    url: "{{ route('enquiry2.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: function(res) {
                        $('#successMsg').removeClass('d-none').hide().fadeIn(300);
                        $('#contactForm')[0].reset();
                        loadCaptcha();

                        setTimeout(function() {
                            $('#successMsg').fadeOut(300, function() {
                                $(this).addClass('d-none').show();
                            });
                        }, 5000);
                    },

                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(field, msg) {
                                $("." + field + "_error").html(msg[0]);
                            });
                        }
                    },

                    complete: function() {
                        btn.prop('disabled', false).text('Claim Your Quote');
                    }
                });

            });

        });
    </script>
@endsection
