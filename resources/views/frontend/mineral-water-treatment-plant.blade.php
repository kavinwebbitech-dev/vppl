@extends('frontend.layouts.app')

@section('title', 'Mineral Water Treatment Plant')

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
                            <li class="active"><span class="mx-2">/</span>Mineral Water Treatment Plant</li>
                        </ul>
                        <h1 class="vppl-hero-title">Mineral <span class='vppl-gradient-text'>Water Treatment</span> Plant
                        </h1>
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
                                    <h2 class="fw-bold mb-4">Mineral Water <span class="vppl-gradient-text">Purity
                                            Standards</span></h2>
                                    <p class="lead text-dark">VPPL offers premium Mineral Water Treatment Plant
                                        solutions designed for bottled drinking water production and high-quality
                                        potable applications.</p>
                                    <p>Our systems are engineered to consistently produce pure water that meets strict
                                        quality standards, ensuring safety, taste, and compliance for both commercial
                                        and industrial use.</p>
                                </div>
                                <div class="col-lg-5">
                                    <img src="{{ asset('asset/images/mineral-water-treatment-plant.webp') }}"
                                        class="img-fluid serv-img" alt="Mineral Water Plant">
                                </div>
                            </div>

                            <hr class="opacity-10 my-5">

                            <div class="row mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold">Process Overview</h3>
                                    <p class="mt-3">A Mineral Water Treatment Plant treats raw water through staged
                                        purification processes—removing suspended solids, contaminants, and
                                        microorganisms—while maintaining essential mineral balance where required for
                                        taste and health standards.</p>


                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">Advanced Treatment Stages</h3>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Multi-stage
                                                filtration (Suspended Solids Removal)</span></li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Coagulation
                                                and clarification tanks</span></li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Pressure sand
                                                filters with quartz media</span></li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Activated
                                                carbon (Odor & Taste removal)</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i>
                                            <span>Ultrafiltration (UF) membrane modules</span>
                                        </li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>UV
                                                (Ultraviolet) disinfection systems</span></li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Conductivity &
                                                ORP monitoring</span></li>
                                        <li class="mb-3 d-flex align-items-start"><i
                                                class="fa fa-check-circle text-info me-3 mt-1"></i> <span>Automated
                                                High-pressure pump controls</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <h3 class="fw-bold mb-4">Ideal For</h3>
                                </div>
                                <div class="col-md-4">
                                    <div class="ideal-card">
                                        <h5 class="fw-bold">Bottling Units</h5>
                                        <p class="small mb-0">Production of packaged drinking water bottles and jars.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="ideal-card">
                                        <h5 class="fw-bold">Hospitals & Labs</h5>
                                        <p class="small mb-0">Healthcare facilities requiring high-purity potable water.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="ideal-card">
                                        <h5 class="fw-bold">Hotels & Resorts</h5>
                                        <p class="small mb-0">Large scale hospitality services with consistent water
                                            quality needs.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 rounded-3 shadow-sm border" style="background: var(--vppl-light-bg);">
                                <h4 class="fw-bold">Compliance & Support</h4>
                                <p class="mb-0">VPPL provides full support for legal documentation and statutory
                                    compliance required for mineral water plants, alongside operator training to ensure
                                    100% operational uptime.</p>
                            </div>
                        </div>

                    </div>
                </div>
   
        </div>


    </div>


    <script>
        // Hero Content GSAP Animation
        window.addEventListener('DOMContentLoaded', () => {
            gsap.to(".vppl-hero-content", {
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power3.out",
                delay: 0.2
            });
        });
    </script>

@endsection
