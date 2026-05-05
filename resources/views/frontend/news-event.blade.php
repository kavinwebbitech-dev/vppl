@extends('frontend.layouts.app')

@section('title', 'Effluent Treatment Plant')

@section('content')

    <style>
        /* --- VPPL PREMIUM MINIMAL DESIGN SYSTEM --- */
        :root {
            --vppl-primary: #22a4d4;
            --vppl-secondary: #0a2d4d;
            --vppl-accent: #03e9f4;
            --vppl-white: #ffffff;
            --vppl-gray: #5a6268;
            --vppl-border: #e2e8f0;
            --grad-accent: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
            --grad-primary: linear-gradient(135deg, #0a2d4d 0%, #22a4d4 100%);
            --container-width: 1200px;
            --r-custom: 20px;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--vppl-white);
            color: var(--vppl-secondary);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .vppl-container {
            width: 100%;
            max-width: var(--container-width);
            margin: 0 auto;
            padding: 0 25px;
        }

        /* --- Reveal States --- */
        .gsap-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        /* --- Hero Section --- */
        .vppl-hero {
            height: 50vh;
            min-height: 380px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            color: var(--vppl-white);
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .vppl-hero-overlay {
            overflow: hidden;

            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.9) 20%, rgba(10, 45, 77, 0.2));
            z-index: 1;
        }

        .vppl-hero-content {
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(30px);
        }

        .vppl-breadcrumb {
            display: inline-flex;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 100px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 25px;
            list-style: none;
            font-size: 13px;
        }

        .vppl-breadcrumb li a {
            color: #fff;
            text-decoration: none;
            opacity: 0.7;
            transition: 0.3s;
        }

        .vppl-breadcrumb li.active {
            padding-left: 12px;
            margin-left: 12px;
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--vppl-accent);
            font-weight: 600;
        }

        .vppl-hero-title {
            font-size: clamp(32px, 5vw, 56px);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
            text-transform: uppercase;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- News Section Styling --- */
        .vppl-news-section {
            padding: 80px 0;
            position: relative;
        }

        /* --- COMPACT FEATURED BOX --- */
        .featured-news-box {
            border-radius: var(--r-custom);
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--vppl-border);
            display: flex;
            height: 350px;
            /* Controlled height to prevent "Too Big" issue */
            margin-bottom: 50px;
            transition: var(--transition);
        }

        .featured-news-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(10, 45, 77, 0.08);
        }

        .featured-img-area {
            width: 45%;
            flex-shrink: 0;
            overflow: hidden;
        }

        .featured-img-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .featured-news-box:hover .featured-img-area img {
            transform: scale(1.05);
        }

        .featured-text-area {
            padding: 40px;
            width: 55%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .vppl-tag {
            display: inline-block;
            background: rgba(34, 164, 212, 0.1);
            color: var(--vppl-primary);
            padding: 4px 14px;
            border-radius: 4px;
            font-weight: 800;
            font-size: 10px;
            margin-bottom: 15px;
            border-left: 3px solid var(--vppl-primary);
            text-transform: uppercase;
        }

        /* --- News Cards Grid --- */
        .vppl-news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .vppl-news-card {
            background: #fff;
            border-radius: var(--r-custom);
            overflow: hidden;
            border: 1px solid var(--vppl-border);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .vppl-news-card:hover {
            transform: translateY(-8px);
            border-color: var(--vppl-primary);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .card-img-wrapper {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .card-date-label {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 8px 12px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        .card-date-label b {
            display: block;
            font-size: 18px;
            color: var(--vppl-secondary);
            line-height: 1;
        }

        .card-date-label span {
            font-size: 9px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--vppl-primary);
        }

        .card-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-content h3 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 12px;
            color: var(--vppl-secondary);
            line-height: 1.4;
        }

        .card-content p {
            font-size: 14px;
            color: var(--vppl-gray);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn-link {
            margin-top: auto;
            color: var(--vppl-secondary);
            text-decoration: none;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: 0.3s;
        }

        .btn-link:hover {
            color: var(--vppl-primary);
            gap: 10px;
        }

        /* --- Responsive Fixes --- */
        @media (max-width: 991px) {
            .featured-news-box {
                flex-direction: column;
                height: auto;
            }

            .featured-img-area,
            .featured-text-area {
                width: 100%;
            }

            .vppl-news-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .vppl-news-grid {
                grid-template-columns: 1fr;
            }

            .vppl-hero {
                height: 40vh;
            }
        }
    </style>
    <div id="wrapper">

            <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
                <div class="vppl-hero-overlay"></div>
                <div class="vppl-container">
                    <div class="vppl-hero-content">
                        <ul class="vppl-breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">News & Events</li>
                        </ul>
                        <h1 class="vppl-hero-title">Global <span class='vppl-gradient-text'>Updates</span> & Insights</h1>
                    </div>
                </div>
            </section>

            <section class="vppl-news-section">
                <div class="vppl-container">

                    <div class="featured-news-box gsap-reveal">
                        <div class="featured-img-area">
                            <img src="{{ asset('asset/images/about-1.jpg') }}" alt="ZLD Tech">
                        </div>
                        <div class="featured-text-area">
                            <span class="vppl-tag">Top Story</span>
                            <h2 style="font-size: 26px; font-weight: 800; margin-bottom: 15px;">Pioneering Zero Liquid
                                Discharge (ZLD) Systems</h2>
                            <p>Implementation of 95% process water recovery systems across major industrial hubs, reducing
                                environmental footprint and operational costs.</p>
                            <a href="news-details.php" class="btn-link" style="margin-top: 20px;">Read Case Study →</a>
                        </div>
                    </div>

                    <div class="vppl-news-grid">

                        <div class="vppl-news-card gsap-reveal">
                            <div class="card-img-wrapper">
                                <div class="card-date-label"><b>12</b><span>Jan</span></div>
                                <img src="{{ asset('asset/images/about-img-1.webp') }}" alt="Expo">
                            </div>
                            <div class="card-content">
                                <span class="vppl-tag">Event</span>
                                <h3>ChemTech Global Expo 2026</h3>
                                <p>Join VPPL as we unveil our latest ultra-filtration technology lineup.</p>
                                <a href="javascript:void(0);" class="btn-link">Details →</a>
                            </div>
                        </div>

                        <div class="vppl-news-card gsap-reveal">
                            <div class="card-img-wrapper">
                                <div class="card-date-label"><b>05</b><span>Jan</span></div>
                                <img src="{{ asset('asset/images/about-img-2.webp') }}" alt="Award">
                            </div>
                            <div class="card-content">
                                <span class="vppl-tag">Award</span>
                                <h3>Excellence in Innovation</h3>
                                <p>Recognized for breakthrough in ceramic membrane technology cycles.</p>
                                <a href="javascript:void(0);" class="btn-link">Read More →</a>
                            </div>
                        </div>

                        <div class="vppl-news-card gsap-reveal">
                            <div class="card-img-wrapper">
                                <div class="card-date-label"><b>28</b><span>Dec</span></div>
                                <img src="{{ asset('asset/images/wat5.jpg') }}" alt="Project">
                            </div>
                            <div class="card-content">
                                <span class="vppl-tag">Project</span>
                                <h3>Ahmedabad Textile Hub</h3>
                                <p>Commissioning of a smart-water recovery system for high-volume units.</p>
                                <a href="javascript:void(0);" class="btn-link">Technical →</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

    </div>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Hero Entrance
        gsap.to(".vppl-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out",
            delay: 0.2
        });

        // Staggered Scroll Reveal for Grid
        gsap.utils.toArray('.gsap-reveal').forEach((el, i) => {
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 92%",
                },
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                delay: i % 3 * 0.1 // Creates a clean left-to-right stagger
            });
        });
    </script>

@endsection
