@extends('frontend.layouts.app')

@section('title', 'Effluent Treatment Plant')

@section('content')


    <style>
        :root {
            --vppl-primary: #22a4d4;
            --vppl-secondary: #0a2d4d;
            --vppl-accent: #03e9f4;
            --vppl-white: #ffffff;
            --vppl-border: #e2e8f0;
            --grad-accent: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
            --transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        body {
            background-color: var(--vppl-white);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* --- Hero Styling --- */
        .vppl-hero {
            height: 50vh;
            min-height: 400px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            color: #fff;
            clip-path: ellipse(150% 100% at 50% 0%);
            overflow: hidden;
        }

        .vppl-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.85) 20%, rgba(10, 45, 77, 0.2));
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
            text-transform: uppercase;
            letter-spacing: -1.5px;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- Gallery Grid --- */
        .gallery-section {
            padding: 90px 0;
        }

        .gallery-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            background: #000;
            border: 1px solid var(--vppl-border);
            opacity: 0;
            transform: translateY(40px);
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10, 45, 77, 0.9) 0%, rgba(10, 45, 77, 0) 60%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 30px;
            opacity: 0;
            transition: var(--transition);
            z-index: 2;
        }

        .view-btn {
            width: 50px;
            height: 50px;
            background: var(--vppl-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            transform: translateY(20px);
            transition: var(--transition);
        }

        /* --- Hovers --- */
        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
            opacity: 0.7;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-item:hover .view-btn {
            transform: translateY(0);
        }

        .gallery-caption {
            color: #fff;
            transform: translateY(10px);
            transition: var(--transition);
            transition-delay: 0.1s;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .gallery-section {
                padding: 50px 0;
            }

            .vppl-hero {
                height: 40vh;
                min-height: 350px;
            }
        }
    </style>
    <div id="wrapper">
        <section class="vppl-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
            <div class="vppl-hero-overlay"></div>
            <div class="container position-relative" style="z-index: 10;">
                <div class="vppl-hero-content">
                    <ul class="vppl-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Visual Gallery</li>
                    </ul>
                    <h1 class="vppl-hero-title">Our Projects <span class='vppl-gradient-text'>In Action</span></h1>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <div class="container">
                <div class="row g-4" id="vppl-gallery">

                    <?php 
                       $images = [
                                ['src' => asset('asset/images/about-img-1.webp'), 'title' => 'Industrial RO System'],
                                ['src' => asset('asset/images/wat1.jpg'), 'title' => 'ETP Implementation'],
                                ['src' => asset('asset/images/wat2.jpg'), 'title' => 'Zero Liquid Discharge'],
                                ['src' => asset('asset/images/wat3.jpg'), 'title' => 'Ultra Filtration Plant'],
                                ['src' => asset('asset/images/wat4.jpg'), 'title' => 'Chemical Dosing Unit'],
                                ['src' => asset('asset/images/wat5.jpg'), 'title' => 'Process Water Recovery'],
                            ];
                        foreach ($images as $img): ?>
                    <div class="col-lg-4 col-md-6">
                        <a href="<?php echo $img['src']; ?>" data-pswp-width="1200" data-pswp-height="800" target="_blank"
                            class="gallery-link">
                            <div class="gallery-item gsap-reveal">
                                <img src="<?php echo $img['src']; ?>" class="gallery-image" alt="<?php echo $img['title']; ?>">
                                <div class="gallery-overlay">
                                    <div class="view-btn">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white"
                                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <div class="gallery-caption">
                                        <h5 class="fw-bold mb-0"><?php echo $img['title']; ?></h5>
                                        <small class="opacity-75">Project Infrastructure</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>

    </div>

    <!-- PhotoSwipe CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.min.css" />

    <script type="module">
        import PhotoSwipeLightbox from "https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe-lightbox.esm.min.js";

        const lightbox = new PhotoSwipeLightbox({
            gallery: '#vppl-gallery',
            children: 'a.gallery-link',

            pswpModule: () =>
                import('https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.4.2/photoswipe.esm.min.js')
        });

        lightbox.init();
    </script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Hero Animation
        gsap.to(".vppl-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out"
        });

        // Staggered Gallery Reveal
        gsap.utils.toArray('.gsap-reveal').forEach((item, i) => {
            gsap.to(item, {
                scrollTrigger: {
                    trigger: item,
                    start: "top 90%",
                },
                opacity: 1,
                y: 0,
                duration: 0.8,
                delay: (i % 3) * 0.15,
                ease: "power2.out"
            });
        });
    </script>

@endsection
