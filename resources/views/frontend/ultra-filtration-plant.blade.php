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
                            <li class="active"><span class="mx-2">/</span>Ultra Filtration Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Ultra <span class='vppl-gradient-text'>Filtration</span> Plant</h1>
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
                                    <h2 class="fw-bold mb-4">Precision Filtration with <span class="vppl-gradient-text">UF
                                            Technology</span></h2>
                                    <p class="lead text-dark">VPPL offers advanced Ultra Filtration (UF) solutions
                                        designed to remove microorganisms and suspended solids with extreme efficiency.
                                    </p>
                                    <p>Ultra Filtration is a pressure-driven membrane process that removes particles in
                                        the range of $0.01$ to $0.1$ $\mu m$. Our systems act as a physical barrier
                                        against bacteria, viruses, and colloids, ensuring consistent water quality
                                        regardless of source water fluctuations.</p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/ultra-filtration-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Ultra Filtration Plant">
                                </div>
                            </div>



                            [Image of ultrafiltration membrane process diagram]


                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">Industrial Applications</h3>
                                </div>

                                <?php
                                $apps = [
                                    "Drinking Water Purification",
                                    "Industrial Process Treatment",
                                    "RO System Pre-treatment",
                                    "Wastewater Recycling",
                                    "Borewell Water Clarification",
                                    "Commercial Facility Supply"
                                ];
                                foreach ($apps as $app): ?>
                                <div class="col-md-4">
                                    <div class="advantage-card">
                                        <i class="fa-solid fa-circle-check"></i>
                                        <h5><?php echo $app; ?></h5>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="p-5 rounded-20px"
                                style="background: var(--vppl-light-bg); border: 1px solid #e2e8f0;">
                                <h4 class="fw-bold">Why Choose VPPL UF Systems?</h4>
                                <p>Our Ultra Filtration plants are built with modular designs, allowing for easy
                                    expansion and flexible installation. By utilizing low operating pressures, we help
                                    industries reduce energy consumption while maintaining a high standard of purity.
                                    Whether it's for institutional use or heavy industrial recycling, VPPL ensures a
                                    maintenance-friendly and reliable operation.</p>
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
            ease: "power2.out",
            delay: 0.3
        });
    </script>
@endsection
