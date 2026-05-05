@extends('frontend.layouts.app')

@section('title', 'reverse-osmosis-plant')

@section('content')

    <div id="wrapper">
        <div id="content" class="no-bottom no-top">
            <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
                <div class="vppl-hero-overlay"></div>
                <div class="container relative">
                    <div class="vppl-hero-content">
                        <ul class="vppl-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><span class="mx-2">/</span>Projects</li>
                            <li class="active"><span class="mx-2">/</span> Reverse Osmosis Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Reverse <span class='vppl-gradient-text'>Osmosis</span> Plant</h1>
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
                            <div class="row g-4 mb-5 align-items-center">
                                <div class="col-lg-7">
                                    <h2 class="fw-bold mb-4">Precision Filtration with <span class="vppl-gradient-text">RO
                                            Technology</span></h2>
                                    <p>VPPL is a premier manufacturer of high-performance Reverse Osmosis (RO) plants.
                                        For over 15 years, we have engineered compact and efficient RO systems for
                                        homes, apartments, institutions, and industrial organizations.</p>
                                    <p>Our RO plants utilize high-pressure pumps and semi-permeable membranes to remove
                                        dissolved impurities, ensuring that even the most brackish groundwater is
                                        converted into pure, safe water.</p>
                                </div>

                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/reverse-osmosis-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Reverse Osmosis Plant">
                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold">Why Choose Our RO Systems?</h3>
                                    <hr style="width: 50px; border-top: 3px solid var(--vppl-primary);">
                                </div>

                                <?php
                                $advantages = [
                                    "97% Removal of Dissolved Solids",
                                    "Chemical-Free Bio-nitrification",
                                    "Advanced Oxidation Process",
                                    "Biological Phosphorus Removal",
                                    "Efficient Solid-Liquid Separation",
                                    "Total Organic Matter Elimination",
                                    "Highly Cost-Effective Operation",
                                    "Low Maintenance Design",
                                    "Fully Independent Modular System"
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

                            <div class="p-4 p-md-5 rounded-20px"
                                style="background: var(--vppl-light-bg); border: 1px solid #e2e8f0;">
                                <h4 class="fw-bold">Water Solutions in Coimbatore</h4>
                                <p>Whether you need a Domestic Hard Water Treatment plant for a single villa or a
                                    massive Industrial RO setup, VPPL delivers excellence. We focus on seamless
                                    integration, high-quality water recovery, and cost-effective management to ensure
                                    100% client satisfaction.</p>
                            </div>
                        </div>

                    </div>
                </div>

        </div>

    </div>


    <script>
        // Hero Entrance Animation
        gsap.to(".vppl-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power2.out"
        });
    </script>
@endsection
