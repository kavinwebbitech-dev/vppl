@extends('frontend.layouts.app')

@section('title', 'reverse-osmosis-plant')

@section('content')
    <style>
        /* --- VPPL DESIGN SYSTEM --- */
        :root {
            --vppl-primary: #22a4d4;
            --vppl-secondary: #0a2d4d;
            --vppl-accent: #03e9f4;
            --vppl-white: #ffffff;
            --vppl-light-bg: #f8fafc;
            --grad-accent: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
            --grad-primary: linear-gradient(135deg, #0a2d4d 0%, #22a4d4 100%);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            background-color: var(--vppl-white);
            color: var(--vppl-secondary);
        }

        .vppl-hero {
            height: 45vh;
            min-height: 350px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .vppl-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.9), rgba(10, 45, 77, 0.4));
            z-index: 1;
        }

        .vppl-hero-content {
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(20px);
        }

        .vppl-breadcrumb {
            display: inline-flex;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            padding: 6px 18px;
            border-radius: 50px;
            list-style: none;
            font-size: 13px;
            color: #fff;
        }

        .vppl-breadcrumb li a {
            color: #fff;
            text-decoration: none;
            opacity: 0.8;
        }

        .vppl-breadcrumb li.active {
            color: var(--vppl-accent);
            font-weight: 600;
            margin-left: 10px;
            padding-left: 10px;
            border-left: 1px solid rgba(255, 255, 255, 0.3);
        }

        .vppl-hero-title {
            font-size: clamp(28px, 4vw, 48px);
            font-weight: 800;
            text-transform: uppercase;
            color: #fff;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .service-nav-card {
            background: var(--vppl-light-bg);
            border-radius: 15px;
            padding: 15px;
            border: 1px solid #e2e8f0;
            position: sticky;
            top: 100px;
        }

        .service-link {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            margin-bottom: 8px;
            border-radius: 10px;
            background: #fff;
            color: var(--vppl-secondary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .service-link:hover,
        .service-link.active {
            background: var(--grad-primary);
            color: #fff;
            border-left: 4px solid var(--vppl-accent);
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(10, 45, 77, 0.1);
        }

        .advantage-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            padding: 25px;
            border-radius: 12px;
            height: 100%;
            transition: var(--transition);
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .advantage-card:hover {
            border-color: var(--vppl-primary);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transform: translateY(-3px);
        }

        .advantage-card i {
            color: var(--vppl-primary);
            font-size: 20px;
            margin-top: 4px;
        }

        .advantage-card h5 {
            font-size: 14px;
            font-weight: 700;
            margin: 0;
            line-height: 1.4;
            color: var(--vppl-secondary);
        }

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


        .serv-img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        @media (max-width: 991px) {
            .mobile-reverse {
                flex-direction: column-reverse;
            }

            .service-nav-card {
                position: static;
                margin-top: 40px;
            }
        }
    </style>
    <div id="wrapper">
        <div id="content" class="no-bottom no-top">
            <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
                <div class="vppl-hero-overlay"></div>
                <div class="container relative">
                    <div class="vppl-hero-content">
                        <ul class="vppl-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span class="mx-2">/</span>Projects</li>
                            <li class="active"><span class="mx-2">/</span> Water Treatment Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Water <span class='vppl-gradient-text'>Treatment</span> Plant</h1>
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
                                    <a href="{{ route('contact') }}" class="btn-main w-100">Enquire Now</a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="row g-4 mb-5">
                                <div class="col-lg-7">
                                    <h2 class="fw-bold mb-4">Pure Water Through <span class="vppl-gradient-text">Advanced
                                            Engineering</span></h2>
                                    <p class="lead text-dark">Water treatment is essential for safe domestic,
                                        commercial, and industrial use.</p>
                                    <p>Our process involves multiple stages of physical, chemical, and biological
                                        treatment, designed to remove harmful microorganisms, dissolved salts, and
                                        chemical contaminants. VPPL offers customized solutions tailored to
                                        site-specific requirements like groundwater hardness and contamination levels.
                                    </p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/water-treatment-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Water Treatment Plant">
                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">Technical Advantages</h3>
                                </div>

                                <?php
                                $advantages = [
                                    "Removes 97% of suspended solids",
                                    "Bio-nitrification (No Chemicals)",
                                    "Accomplished oxidation",
                                    "Biological Phosphorus removal",
                                    "Liquid & Solid Separation",
                                    "Independent modular system",
                                    "Cost-effective operation",
                                    "Maintenance-free mechanicals",
                                    "Eliminates organic matter"
                                ];
                                foreach ($advantages as $adv): ?>
                                <div class="col-md-4">
                                    <div class="advantage-card">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <h5><?php echo $adv; ?></h5>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="p-5 rounded-20px"
                                style="background: var(--vppl-light-bg); border: 1px solid #e2e8f0;">
                                <h4 class="fw-bold">Industrial Solutions in Coimbatore</h4>
                                <p>Depending on your requirements, we provide RO and Water Treatment plants for
                                    commercial and home use. We specialize in cost-effective waste management and
                                    high-quality water recovery systems, striving for 100% client satisfaction through
                                    complete service customization.</p>
                            </div>
                        </div>

                    </div>
                </div>
         
        </div>
    </div>


    <script>
        // Hero Animation
        gsap.to(".vppl-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power2.out"
        });
    </script>

@endsection
