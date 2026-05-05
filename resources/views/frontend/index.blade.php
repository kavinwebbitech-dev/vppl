@extends('frontend.layouts.app')

@section('title', 'Home')

@section('content')

    <div id="wrapper">
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>

            <!-- ═══════ HERO ═══════ -->
            <section class="aq2-hero">
                <div class="swiper aq2-hero__swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide aq2-hero__slide">
                            <img src="{{ asset('asset/images/banner/slider1.jpg') }}" alt="Water Solutions" class="aq2-hero__slide-img">
                        </div>
                        <div class="swiper-slide aq2-hero__slide">
                            <img src="{{ asset('asset/images/banner/slider2.jpg') }}" alt="Engineering Solutions" class="aq2-hero__slide-img">
                        </div>
                        <div class="swiper-slide aq2-hero__slide">
                            <img src="{{ asset('asset/images/banner/banners2.jpg') }}" alt="VPPL Plants" class="aq2-hero__slide-img">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="aq2-hero__geo">
                    <div class="aq2-geo-ring"></div>
                    <div class="aq2-geo-ring"></div>
                    <div class="aq2-geo-ring"></div>
                    <div class="aq2-geo-ring"></div>
                </div>
                <div class="aq2-particles" id="aq2HeroParticles"></div>

                <div class="aq2-hero__scroll">
                    <span class="aq2-hero__scroll-text">Scroll</span>
                    <div class="aq2-hero__scroll-line"></div>
                </div>
                <div class="aq2-hero__bottom-fade"></div>
            </section>

            <!-- TICKER 1 -->
            <div class="aq2-ticker aq2-ticker--light">
                <div class="aq2-ticker__track">
                    <?php foreach (range(1, 2) as $_): ?>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Water Treatment Systems</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Wastewater Treatment
                        Plants</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Effluent Treatment
                        Solutions</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Sewage Treatment Plants</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Turnkey Engineering
                        Projects</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Zero Liquid Discharge
                        (ZLD)</span>
                    <?php endforeach; ?>
                </div>
            </div>


            @include('frontend.partials.ourcore')

            <!-- TICKER 2 -->
            <div class="aq2-ticker aq2-ticker--dark">
                <div class="aq2-ticker__track aq2-ticker__track--rev">
                    <?php foreach (range(1, 2) as $_): ?>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Water Treatment Systems</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Wastewater Treatment
                        Plants</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Zero Liquid Discharge
                        (ZLD)</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Environmental Engineering</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Effluent Treatment Plants</span>
                    <span class="aq2-ticker__item"><span class="aq2-ticker__sep"></span>Sustainable Water
                        Management</span>
                    <?php endforeach; ?>
                </div>
            </div>

            @include('frontend.partials.serviceindex')

            <!-- ═══════ CLIENTS ═══════ -->
            <section class="aq2-clients">
                <div class="aq2-clients__head">
                    <div class="aq2-label" style="justify-content:center;margin-bottom:8px;">Trusted By</div>
                    <h2 class="aq2-clients__head-title">Our Valued Clients</h2>
                    <div class="aq2-clients__head-line"></div>
                </div>
                <div class="overflow-hidden position-relative">
                    <div class="aq2-clients__track">
                        <?php
                        $clients = range(1, 39);
                        $skip = [10];
                        foreach (array_merge($clients, $clients) as $i):
                            if (in_array($i, $skip))
                                continue;
                            ?>
                        <div class="aq2-clients__logo"><img src="{{ asset('asset/images/client/client' . $i . '.png') }}" alt="Client {{ $i }}">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            @include('frontend.partials.homeproject')
            @include('frontend.partials.whychooseus')
            @include('frontend.partials.testimonial')

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <script>
        /* ══════════════════════════════════════════════
               HERO SWIPER
            ══════════════════════════════════════════════ */
        new Swiper('.aq2-hero__swiper', {
            loop: true,
            speed: 1400,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5500,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            on: {
                slideChange() {
                    document.querySelectorAll('.aq2-hero__slide-img').forEach(img => {
                        img.style.animation = 'none';
                        void img.offsetHeight;
                        img.style.animation = 'aq2Ken 9s ease-in-out forwards';
                    });
                }
            }
        });
    </script>
@endsection
