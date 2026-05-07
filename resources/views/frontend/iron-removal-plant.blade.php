@extends('frontend.layouts.app')

@section('title', 'Effluent Treatment Plant')

@section('content')
    <style>
        /* --- VPPL DYNAMIC DESIGN SYSTEM --- */
        :root {
            --vppl-primary: #22a4d4;
            --vppl-secondary: #0a2d4d;
            --vppl-accent: #03e9f4;
            --vppl-grad: linear-gradient(135deg, #0a2d4d 0%, #22a4d4 100%);
            --vppl-text-grad: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
        }

        /* Responsive Dynamic Hero */
        .vppl-dynamic-hero {
            position: relative;
            min-height: 55vh;
            display: flex;
            align-items: center;
            padding: 100px 0;
            background: url('{{ asset('asset/images/sub-banner.webp') }}') center/cover no-repeat;
            overflow: hidden;
            clip-path: ellipse(160% 100% at 50% 0%);
        }

        .vppl-dynamic-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            overflow: hidden;
            background: linear-gradient(90deg, rgba(10, 45, 77, 0.95) 0%, rgba(10, 45, 77, 0.7) 50%, rgba(10, 45, 77, 0.2) 100%);
            z-index: 1;
        }

        .hero-content-wrapper {
            position: relative;
            z-index: 10;
            opacity: 0;
            /* Animated by GSAP */
            transform: translateY(30px);
        }

        /* Modern Breadcrumb */
        .vppl-breadcrumb-pills {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 100px;
            list-style: none;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .vppl-breadcrumb-pills li {
            font-size: 14px;
            color: #fff;
        }

        .vppl-breadcrumb-pills li a {
            color: var(--vppl-accent);
            text-decoration: none;
            font-weight: 500;
        }

        .vppl-breadcrumb-pills li .separator {
            margin: 0 10px;
            opacity: 0.5;
        }

        /* Typography */
        .vppl-hero-h1 {
            font-size: clamp(32px, 5vw, 56px);
            font-weight: 800;
            line-height: 1.1;
            color: #fff;
            text-transform: uppercase;
        }

        .vppl-highlight {
            background: var(--vppl-text-grad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Sidebar & Content */
        .service-nav-container {
            position: sticky;
            top: 110px;
        }

        .service-nav-item {
            display: block;
            padding: 15px 25px;
            margin-bottom: 10px;
            background: #f8fafc;
            border-radius: 12px;
            color: var(--vppl-secondary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .service-nav-item:hover,
        .service-nav-item.active {
            background: var(--vppl-grad);
            color: #fff;
            border-left: 4px solid var(--vppl-accent);
            transform: translateX(8px);
        }

        .vppl-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            background: #fff;
        }

        .vppl-check-list li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            list-style: none;
        }

        .vppl-check-list li::before {
            content: '\f058';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--vppl-primary);
        }

        @media (max-width: 768px) {
            .vppl-dynamic-hero {
                text-align: center;
                min-height: 45vh;
                clip-path: none;
            }

            .vppl-breadcrumb-pills {
                justify-content: center;
            }

            .mobile-order-change {
                flex-direction: column-reverse;
            }
        }


        /* --- Action Section --- */
        .vppl-cta-box {
            background: var(--vppl-secondary);
            border-radius: 15px;
            padding: 30px;
            color: #fff;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }

        .vppl-cta-box::after {
            content: '';
            position: absolute;
            right: -20px;
            bottom: -20px;
            width: 100px;
            height: 100px;
            background: var(--vppl-primary);
            border-radius: 50%;
            opacity: 0.1;
        }
    </style>

    <div id="wrapper">
        <div class="no-bottom no-top" id="content">

            <section class="vppl-dynamic-hero">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="hero-content-wrapper" id="hero-animate">
                                <ul class="vppl-breadcrumb-pills">
                                    <li><a href="{{ route('home') }}">Home</a> <span class="separator">/</span></li>
                                    <li>Projects <span class="separator">/</span></li>
                                    <li class="active">Iron Removal Plant</li>
                                </ul>
                                <h1 class="vppl-hero-h1">
                                    High-Performance<br>
                                    <span class="vppl-highlight">Iron Removal</span> Solutions
                                </h1>
                                <p class="lead text-white-50 mt-3 col-lg-10">
                                    {{-- <?php echo $hero_tagline; ?> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5">
                <div class="container">
                    <div class="row g-5 mobile-order-change">

                        <div class="col-lg-3">
                            <div class="service-nav-card">

                                @php
                                    $menu = [
                                        ['url' => 'sewage-treatment-plant', 'label' => 'Sewage Treatment Plant (STP)'],
                                        [
                                            'url' => 'effluent-treatment-plant',
                                            'label' => 'Effluent Treatment Plant (ETP)',
                                        ],
                                        ['url' => 'core-products', 'label' => 'Core Products'],
                                        ['url' => 'service-single', 'label' => 'Water Treatment Plant'],
                                        ['url' => 'reverse-osmosis-plant', 'label' => 'Reverse Osmosis Plant'],
                                        ['url' => 'water-softening-plant', 'label' => 'Water Softening Plant'],
                                        ['url' => 'ultra-filtration-plant', 'label' => 'Ultra Filtration Plant'],
                                        ['url' => 'iron-removal-plant', 'label' => 'Iron Removal Plant'],
                                        ['url' => 'mineral-water-treatment-plant', 'label' => 'Mineral Water Plant'],
                                        ['url' => 'demineralization-plant', 'label' => 'Demineralization Plant'],
                                        ['url' => 'hydro-pneumatic-system-pumps', 'label' => 'Hydro Pneumatic Pumps'],
                                    ];
                                @endphp

                                @foreach ($menu as $item)
                                    <a href="{{ url($item['url']) }}"
                                        class="service-link {{ request()->segment(1) == $item['url'] ? 'active' : '' }}">
                                        {{ $item['label'] }}
                                    </a>
                                @endforeach

                                <!-- CTA -->
                                <div class="vppl-cta-box mt-4">
                                    <h6>NEED HELP?</h6>
                                    <p>Contact our technical team for custom plant design.</p>
                                    <a href="{{ route('contact') }}" class="btn-main w-100">Enquire Now</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-6">
                                    <h2 class="fw-bold text-uppercase">Iron <span class="vppl-highlight">Filtration</span>
                                        Tech</h2>
                                    <p>Our Iron Removal Plants are engineered to tackle high concentrations of dissolved
                                        iron often found in borewell water. This iron, if left untreated, oxidizes upon
                                        contact with air, resulting in the characteristic rusty-red color and metallic
                                        taste.</p>
                                    <p>We use high-grade catalytic media that acts as an oxidizing agent, instantly
                                        precipitating iron into solid particles for easy mechanical filtration.</p>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('asset/images/iron-removal-plant.webp') }}" class="img-fluid rounded-20px shadow-lg"
                                        alt="Industrial Iron Removal">
                                </div>
                            </div>



                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <div class="vppl-card p-4 h-100 bg-light">
                                        <h4 class="fw-bold"><i class="fa fa-star  me-2"></i>Key Benefits</h4>
                                        <ul class="vppl-check-list mt-3">
                                            <li>Crystal Clear Odorless Water</li>
                                            <li>Zero Staining on Laundry & Fixtures</li>
                                            <li>Protects Industrial Boilers & RO Membranes</li>
                                            <li>Low Maintenance Cost</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="vppl-card p-4 h-100 bg-light">
                                        <h4 class="fw-bold"><i class="fa fa-cog  me-2"></i>Key Features</h4>
                                        <ul class="vppl-check-list mt-3">
                                            <li>Auto-Backwash Multiport Valves</li>
                                            <li>Heavy Duty FRP Pressure Vessels</li>
                                            <li>Advanced Catalytic Oxidation Media</li>
                                            <li>Custom Flow Rates (0.5 to 50 m³/hr)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 rounded-20px text-center"
                                style="background: #f1f5f9; border: 2px dashed #cbd5e1;">
                                <h3 class="fw-bold">Ready to solve your water problems?</h3>
                                <p class="pb-3">We provide free site visits and water testing analysis.</p>
                                <a href="contact.php" class="px-5 py-3 rounded-pill fw-bold text-white mt-2"
                                    style="background: var(--vppl-grad); border:none; text-decoration: none;">Get A Free
                                    Quote</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>


    </div>



    <script>
        // Smooth entrance animation for the Hero content
        window.addEventListener('load', function() {
            gsap.to("#hero-animate", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power4.out"
            });
        });
    </script>

@endsection
