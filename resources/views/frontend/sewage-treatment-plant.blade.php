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
                            <li><span class="mx-2">/</span> Projects</li>
                            <li class="active"><span class="mx-2">/</span> Sewage Treatment Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Sewage <span class='vppl-gradient-text'>Treatment</span> Plant</h1>
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
                                    <h2 class="fw-bold mb-4">Eco-Friendly <span class="vppl-gradient-text">Sewage
                                            Management</span></h2>
                                    <p class="lead text-dark">We provide sustainable sewage treatment solutions for
                                        residential complexes, malls, and townships.</p>
                                    <p>Our Sewage Treatment Plants (STP) utilize advanced SBR (Sequential Batch Reactor)
                                        and MBR (Membrane Bioreactor) technologies to treat wastewater. This allows for
                                        safe disposal or recycling of water for gardening, flushing, and cooling towers,
                                        significantly reducing fresh water demand.</p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/water-treatment-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Sewage Treatment Plant">
                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">STP Features & Benefits</h3>
                                </div>
                                <?php
                                $advantages = [
                                    "Zero Liquid Discharge (ZLD) compatible",
                                    "Odor-free operation technology",
                                    "Compact and modular design",
                                    "Minimal sludge production",
                                    "Meets PCB discharge norms",
                                    "Fully automated PLC controls",
                                    "Low energy consumption",
                                    "Recycled water for landscaping",
                                    "Robust and long-lasting build"
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
                                <h4 class="fw-bold">Sustainable Recycling in Coimbatore</h4>
                                <p>VPPL designs STPs that are compliant with the latest environmental regulations.
                                    Whether it's for a high-rise apartment or a commercial hub, our systems ensure that
                                    wastewater is transformed into a valuable resource, protecting the local ecosystem
                                    and saving costs.</p>
                            </div>
                        </div>
                    </div>
                </div>
         
        </div>
    </div>

    <script>
        gsap.to(".vppl-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: "power2.out"
        });
    </script>
@endsection
