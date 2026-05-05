@extends('frontend.layouts.app')

@section('title', 'About Us')

@section('content')


    <div id="wrapper">
        <section class="vppl-hero" style="background-image:url('{{ asset('asset/images/sub-banner.webp') }}');"">
                <div class="vppl-hero-overlay"></div>
                <div class="vppl-container">
                    <div class="vppl-hero-content" style="opacity: 9">
                        <ul class="vppl-breadcrumb">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li class="active">About Us</li>
                        </ul>
                        <h1 class="vppl-hero-title">Engineering <span class='vppl-gradient-text'>Sustainable</span><br>Future-Ready Tech</h1>
                    </div>
                </div>
            </section>



        <div class="vppl-stats-wrapper">
            <div class="vppl-container">
                <div class="vppl-stats-minimal gsap-reveal">
                    <div class="vppl-stat-item">
                        <span class="vppl-stat-num vppl-gradient-text" data-target="15">0</span>
                        <span class="vppl-stat-label">Years of Mastery</span>
                    </div>
                    <div class="vppl-stat-item">
                        <span class="vppl-stat-num" data-target="550">0</span>
                        <span class="vppl-stat-label">Bio-Gas Plants</span>
                    </div>
                    <div class="vppl-stat-item">
                        <span class="vppl-stat-num" data-target="850">0</span>
                        <span class="vppl-stat-label">Global Projects</span>
                    </div>
                    <div class="vppl-stat-item">
                        <span class="vppl-stat-num vppl-gradient-text" data-target="100">0</span>
                        <span class="vppl-stat-label">Clean Solutions</span>
                    </div>
                </div>
            </div>
        </div>

        <section class="vppl-story">
            <div class="vppl-container">
                <div class="vppl-grid">
                    <div class="vppl-text-area gsap-reveal">
                        <span class="vppl-tag">Our Legacy</span>
                        <h2 class="vppl-h2">Driving Industrial <span class="vppl-gradient-text">Transformation</span>
                        </h2>
                        <p style="margin-bottom: 20px; font-size: 17px; color: var(--vppl-gray);">
                            VPPL stands at the forefront of engineering innovation. We specialize in delivering
                            high-efficiency turnkey solutions for the renewable energy and manufacturing sectors.
                        </p>
                        <p style="color: var(--vppl-gray);">
                            Our commitment to sustainability isn't just a goal—it's our blueprint. From large-scale
                            biogas infrastructure to precision tech, we build for the future.
                        </p>
                        <div class="vppl-btn-group">
                            <a href="#" class="vppl-btn vppl-btn-primary">View Company Profile</a>
                            <a href="#" class="vppl-btn vppl-btn-outline">Technical Catalog</a>
                        </div>
                    </div>

                    <div class="vppl-image-area gsap-reveal">
                        <div class="vppl-bento-grid">
                            <div class="vppl-bento-item bento-anim" style="grid-row: span 2;">
                                <img src="{{ asset('asset/images/about-1.jpg') }}" alt="Industrial">
                            </div>
                            <div class="vppl-bento-item vppl-bento-stats bento-anim">
                                <h4 style="font-size: 24px; font-weight: 800;">Global</h4>
                                <p style="font-size: 11px; text-transform: uppercase; letter-spacing: 1px;">Standard
                                </p>
                            </div>
                            <div class="vppl-bento-item bento-anim">
                                <img src="{{ asset('asset/images/about-img-1.webp') }}" alt="Tech">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Entrance animation for Hero
        gsap.from(".vppl-hero-content", {
            opacity: 0,
            y: 30,
            duration: 1.2,
            ease: "power3.out",
            delay: 0.2
        });

        // Universal Scroll Reveal
        document.querySelectorAll('.gsap-reveal').forEach(el => {
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 90%"
                },
                opacity: 1,
                y: 0,
                duration: 1,
                ease: "power2.out"
            });
        });

        // Fixed Counter Animation
        document.querySelectorAll('.vppl-stat-num').forEach(stat => {
            const target = parseInt(stat.getAttribute('data-target'));
            let obj = {
                val: 0
            }; // Intermediate object to avoid parsing innerHTML mid-animation

            gsap.to(obj, {
                val: target,
                duration: 2.5,
                scrollTrigger: {
                    trigger: stat,
                    start: "top 95%"
                },
                onUpdate: function() {
                    let suffix = (target === 100) ? '%' : '+';
                    stat.innerHTML = Math.ceil(obj.val) + suffix;
                }
            });
        });

        // Bento Grid Animation
        gsap.from(".bento-anim", {
            scrollTrigger: {
                trigger: ".vppl-bento-grid",
                start: "top 85%"
            },
            scale: 0.9,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });
    </script>
@endsection
