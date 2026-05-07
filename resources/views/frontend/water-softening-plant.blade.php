@extends('frontend.layouts.app')

@section('title', 'reverse-osmosis-plant')

@section('content')
    <style>
        /* --- VPPL UNIFIED DESIGN SYSTEM --- */
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
            min-height: 50vh;
            display: flex;
            align-items: center;
            padding: 100px 0;
            background: url('{{ asset('asset/images/sub-banner.webp') }} ')  center/cover no-repeat;
            overflow: hidden;
            clip-path: ellipse(160% 100% at 50% 0%);
        }

        .vppl-dynamic-hero::before {
            content: '';
            overflow: hidden;
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(10, 45, 77, 0.95) 0%, rgba(10, 45, 77, 0.7) 50%, rgba(10, 45, 77, 0.2) 100%);
            z-index: 1;
        }

        .hero-content-wrapper {
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(30px);
        }

        .fa {
            color: var(--vppl-primary) !important;
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
            font-size: 12px;
            color: #fff;
        }

        .vppl-breadcrumb-pills li a {
            color: var(--vppl-accent);
            text-decoration: none;
        }

        .vppl-breadcrumb-pills li .separator {
            margin: 0 10px;
            opacity: 0.5;
        }

        .vppl-hero-h1 {
            font-size: clamp(32px, 5vw, 52px);
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

        /* Layout Utilities */
        .service-nav-container {
            position: sticky;
            top: 110px;
        }

        .service-nav-item {
            display: block;
            padding: 15px 20px;
            margin-bottom: 8px;
            background: #f8fafc;
            border-radius: 12px;
            color: var(--vppl-secondary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .service-nav-item:hover,
        .service-nav-item.active {
            background: var(--vppl-grad);
            color: #fff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(10, 45, 77, 0.1);
        }

        .serv-img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-box {
            padding: 30px;
            border-radius: 15px;
            height: 100%;
            transition: 0.3s;
            border: 1px solid #e2e8f0;
        }

        .feature-box:hover {
            transform: translateY(-5px);
            border-color: var(--vppl-primary);
        }

        @media (max-width: 991px) {
            .mobile-reverse {
                flex-direction: column-reverse;
            }

            .vppl-dynamic-hero {
                clip-path: none;
                text-align: center;
                padding: 60px 0;
            }

            .vppl-breadcrumb-pills {
                justify-content: center;
            }
        }

        .list-unstyled li>i {
            color: var(--vppl-primary);
        }

        /* --- CTA Sidebar Box --- */
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
                            <div class="hero-content-wrapper" id="hero-gsap">
                                <ul class="vppl-breadcrumb-pills">
                                    <li><a href="{{ route('home') }}">Home</a> <span class="separator">/</span></li>
                                    <li>Projects <span class="separator">/</span></li>
                                    <li class="active">Water Softening Plant</li>
                                </ul>
                                <h1 class="vppl-hero-h1">
                                    Advanced Ion<br>
                                    <span class="vppl-highlight">Exchange Softening</span>
                                </h1>
                                {{-- <p class="lead text-white-50 mt-3 col-lg-10">
                                    <?php echo $hero_tagline; ?>
                                </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

         
                <div class="container py-5">
                    <div class="row g-0 g-lg-5 mobile-reverse">

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
                                    <a href="#" class="btn-main w-100">Enquire Now</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row align-items-center mb-5">
                                <div class="col-lg-7">
                                    <h2 class="fw-bold mb-4">Say Goodbye to <span class="vppl-highlight">Hard
                                            Water</span> Issues</h2>
                                    <p class="lead">VPPL provides ion-exchange solutions designed to eliminate hardness
                                        without altering pH or alkalinity.</p>
                                    <p>Hard water (above 150 ppm) prevents detergent foaming and causes massive scale
                                        buildup in pipes. Our plants replace calcium/magnesium ions with sodium ions
                                        using high-grade resin beds, ensuring crystal clear, soft water for your home or
                                        industry.</p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/water-softening-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Softener Plant">
                                </div>
                            </div>



                            <h3 class="fw-bold mb-4">Why Softening is Essential</h3>
                            <div class="row g-4 mb-5">
                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fa fa-faucet-bubble fs-2  mb-3"></i>
                                        <h5>Plumbing Protection</h5>
                                        <p class="small mb-0">Prevents white scale deposits on taps, showers, and
                                            internal pipelines that lead to clogs.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-box">
                                        <i class="fa fa-sparkles fs-2  mb-3"></i>
                                        <h5>Lifestyle Benefits</h5>
                                        <p class="small mb-0">Reduces hair fall, dry skin, and irritation while saving
                                            up to 40% on detergent costs.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-light p-5 rounded-20px mb-5">
                                <h3 class="fw-bold">Technical Specifications</h3>
                                <ul class="list-unstyled mt-3">
                                    <li class="mb-2"><i class="fa fa-check-circle  me-2"></i> <strong>Vessel:</strong>
                                        Corrosion-resistant FRP / MSRL Tanks</li>
                                    <li class="mb-2"><i class="fa fa-check-circle  me-2"></i>
                                        <strong>Automation:</strong> Manual, Semi-Auto, or Fully Automatic Multiport
                                        Valves
                                    </li>
                                    <li class="mb-2"><i class="fa fa-check-circle  me-2"></i>
                                        <strong>Technology:</strong> High-Efficiency Cation Resin Exchange
                                    </li>
                                    <li><i class="fa fa-check-circle  me-2"></i> <strong>Regeneration:</strong> External
                                        Brine Tank for easy salt charging</li>
                                </ul>
                            </div>

                            <h3 class="fw-bold mb-4">Common Applications</h3>
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-15px">
                                        <i class="fa fa-hotel fs-3  mb-2"></i>
                                        <p class="fw-bold mb-0">Hotels & Clinics</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-15px">
                                        <i class="fa fa-industry fs-3  mb-2"></i>
                                        <p class="fw-bold mb-0">Boiler Feed Water</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-15px">
                                        <i class="fa fa-building fs-3  mb-2"></i>
                                        <p class="fw-bold mb-0">Apartment Complexes</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
  
        </div>

    </div>


    <script>
        // Hero Entrance Animation
        gsap.to("#hero-gsap", {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out"
        });
    </script>

@endsection
