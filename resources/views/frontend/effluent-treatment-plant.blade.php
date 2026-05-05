@extends('frontend.layouts.app')

@section('title', 'Effluent Treatment Plant')

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
                            <li class="active"><span class="mx-2">/</span> Effluent Treatment Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Effluent <span class='vppl-gradient-text'>Treatment</span> Plant</h1>
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
                                    <h2 class="fw-bold mb-4">Industrial <span class="vppl-gradient-text">Waste
                                            Solutions</span></h2>
                                    <p class="lead text-dark">Engineered to treat high-load industrial wastewater and
                                        meet PCB norms.</p>
                                    <p>Effluent Treatment Plants (ETP) are critical for industries like Textiles,
                                        Chemicals, and Food Processing. VPPL provides advanced chemical and biological
                                        treatment systems designed to remove toxic substances, heavy metals, and high
                                        COD/BOD levels, ensuring environmentally safe discharge or reuse.</p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/water-treatment-plant.webp') }}" class="img-fluid serv-img"
                                        alt="Effluent Treatment Plant">
                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">ETP Technical Highlights</h3>
                                </div>
                                <?php
                                $advantages = [
                                    "Effective COD & BOD reduction",
                                    "Heavy Metal removal system",
                                    "Chemical Coagulation process",
                                    "Sludge Dewatering solutions",
                                    "Color & Odor elimination",
                                    "Corrosion resistant components",
                                    "Customized chemical dosing",
                                    "Fully automatic PLC control",
                                    "Zero Liquid Discharge (ZLD) ready"
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
                                <h4 class="fw-bold">Ensuring Regulatory Compliance</h4>
                                <p>Our ETP systems are designed according to Central and State Pollution Control Board
                                    guidelines. We prioritize water recovery, allowing industries to reuse treated water
                                    for secondary applications, thereby reducing operational costs and environmental
                                    footprint.</p>
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
