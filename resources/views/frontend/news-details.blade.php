@extends('frontend.layouts.app')

@section('title', 'News Details')

@section('content')

    <style>
        /* --- VPPL PREMIUM MINIMAL DESIGN SYSTEM (SCOPED) --- */
        
        /* Scoped root variables to prevent global overrides */
        .vppl-nd-page-wrapper {
            --vppl-nd-primary: #22a4d4;
            --vppl-nd-secondary: #0a2d4d;
            --vppl-nd-accent: #03e9f4;
            --vppl-nd-white: #ffffff;
            --vppl-nd-gray: #5a6268;
            --vppl-nd-text-dark: #334155;
            --vppl-nd-border: #e2e8f0;
            --vppl-nd-bg-light: #f8fafc;
            --vppl-nd-grad-accent: linear-gradient(135deg, #22a4d4 0%, #03e9f4 100%);
            --vppl-nd-grad-primary: linear-gradient(135deg, #0a2d4d 0%, #22a4d4 100%);
            --vppl-nd-container-width: 1200px;
            --vppl-nd-r-custom: 20px;
            --vppl-nd-transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);

            /* Adhering to the white background preference & scoping body styles */
            background-color: var(--vppl-nd-white);
            color: var(--vppl-nd-secondary);
            line-height: 1.6;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            
            /* CRITICAL FIX FOR STICKY: Use 'clip' instead of 'hidden'. 
               'hidden' establishes a scroll container that breaks position: sticky */
            overflow-x: clip; 
            overflow-y: visible;
        }

        .vppl-nd-page-wrapper * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .vppl-nd-container {
            width: 100%;
            max-width: var(--vppl-nd-container-width);
            margin: 0 auto;
            padding: 0 25px;
        }

        /* --- Reveal States --- */
        .vppl-nd-reveal {
            opacity: 0;
            transform: translateY(30px);
        }

        /* --- Hero Section --- */
        .vppl-nd-hero {
            height: 55vh;
            min-height: 400px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            color: var(--vppl-nd-white);
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .vppl-nd-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.95) 10%, rgba(10, 45, 77, 0.4));
            z-index: 1;
        }

        .vppl-nd-hero-content {
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(30px);
            max-width: 900px;
        }

        .vppl-nd-breadcrumb {
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

        .vppl-nd-breadcrumb li a {
            color: #fff;
            text-decoration: none;
            opacity: 0.7;
            transition: var(--vppl-nd-transition);
        }

        .vppl-nd-breadcrumb li a:hover {
            opacity: 1;
            color: var(--vppl-nd-accent);
        }

        .vppl-nd-breadcrumb li.active {
            padding-left: 12px;
            margin-left: 12px;
            border-left: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--vppl-nd-accent);
            font-weight: 600;
        }

        .vppl-nd-hero-title {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 900;
            line-height: 1.2;
            letter-spacing: -1px;
            margin-bottom: 20px;
        }

        .vppl-nd-gradient-text {
            background: var(--vppl-nd-grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .vppl-nd-meta-header {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            opacity: 0.9;
            flex-wrap: wrap;
        }

        .vppl-nd-meta-header span {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .vppl-nd-meta-header svg {
            width: 16px;
            height: 16px;
            fill: var(--vppl-nd-accent);
        }

        /* --- Article Layout --- */
        .vppl-nd-article-section {
            padding: 80px 0;
        }

        .vppl-nd-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 50px;
            align-items: start; /* CRITICAL FOR STICKY */
            overflow: visible !important; /* Safety measure */
        }

        /* --- Main Content --- */
        .vppl-nd-main-content {
            background: var(--vppl-nd-white);
            min-width: 0;
        }

        .vppl-nd-featured-img {
            width: 100%;
            height: auto;
            border-radius: var(--vppl-nd-r-custom);
            margin-bottom: 40px;
            box-shadow: 0 20px 40px rgba(10, 45, 77, 0.06);
            object-fit: cover;
            max-height: 500px;
        }

        .vppl-nd-article-body {
            font-size: 17px;
            color: var(--vppl-nd-text-dark);
            line-height: 1.8;
        }

        .vppl-nd-article-body p {
            margin-bottom: 25px;
        }

        .vppl-nd-article-body h2 {
            font-size: 28px;
            color: var(--vppl-nd-secondary);
            font-weight: 800;
            margin: 40px 0 20px;
            line-height: 1.3;
        }

        .vppl-nd-article-body h3 {
            font-size: 22px;
            color: var(--vppl-nd-secondary);
            font-weight: 700;
            margin: 30px 0 15px;
        }

        .vppl-nd-article-body blockquote {
            background: var(--vppl-nd-bg-light);
            border-left: 4px solid var(--vppl-nd-primary);
            padding: 30px;
            border-radius: 0 var(--vppl-nd-r-custom) var(--vppl-nd-r-custom) 0;
            font-size: 20px;
            font-style: italic;
            color: var(--vppl-nd-secondary);
            margin: 40px 0;
            position: relative;
        }

        .vppl-nd-article-body blockquote::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 60px;
            color: rgba(34, 164, 212, 0.1);
            font-family: serif;
            line-height: 1;
        }

        .vppl-nd-article-body ul {
            margin: 0 0 25px 20px;
            padding: 0;
        }

        .vppl-nd-article-body li {
            margin-bottom: 10px;
            position: relative;
            list-style: none;
            padding-left: 25px;
        }

        .vppl-nd-article-body li::before {
            content: '•';
            color: var(--vppl-nd-primary);
            font-size: 24px;
            position: absolute;
            left: 0;
            top: -5px;
        }

        /* Share Tags & Footer */
        .vppl-nd-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--vppl-nd-border);
            border-bottom: 1px solid var(--vppl-nd-border);
            padding: 25px 0;
            margin-top: 50px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .vppl-nd-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .vppl-nd-tags strong {
            color: var(--vppl-nd-secondary);
            font-size: 14px;
        }

        .vppl-nd-tag {
            display: inline-block;
            background: rgba(34, 164, 212, 0.1);
            color: var(--vppl-nd-primary);
            padding: 6px 16px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            border-left: 3px solid var(--vppl-nd-primary);
            text-decoration: none;
            transition: var(--vppl-nd-transition);
        }

        .vppl-nd-tag:hover {
            background: var(--vppl-nd-primary);
            color: #fff;
        }

        .vppl-nd-share {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .vppl-nd-share strong {
            font-size: 14px;
        }

        .vppl-nd-share-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--vppl-nd-bg-light);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--vppl-nd-secondary);
            text-decoration: none;
            border: 1px solid var(--vppl-nd-border);
            transition: var(--vppl-nd-transition);
        }

        .vppl-nd-share-btn:hover {
            background: var(--vppl-nd-primary);
            color: #fff;
            border-color: var(--vppl-nd-primary);
            transform: translateY(-3px);
        }

        /* --- Sticky Sidebar --- */
        .vppl-nd-sidebar {
            position: -webkit-sticky !important; /* Safari support */
            position: sticky !important;
            top: 120px !important;
            align-self: flex-start !important; /* Critical: prevents height stretching */
            height: max-content !important; /* Critical: stops it from inheriting grid height */
            z-index: 10;
        }

        .vppl-nd-widget {
            background: #fff;
            border: 1px solid var(--vppl-nd-border);
            border-radius: var(--vppl-nd-r-custom);
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
        }

        .vppl-nd-widget-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--vppl-nd-secondary);
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .vppl-nd-widget-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background: var(--vppl-nd-grad-accent);
            border-radius: 2px;
        }

        .vppl-nd-recent-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .vppl-nd-recent-item {
            display: flex;
            gap: 15px;
            align-items: center;
            text-decoration: none;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid transparent;
            transition: var(--vppl-nd-transition);
            background: var(--vppl-nd-white);
        }

        .vppl-nd-recent-item:hover {
            border-color: var(--vppl-nd-border);
            box-shadow: 0 10px 20px rgba(10, 45, 77, 0.05);
            background: var(--vppl-nd-bg-light);
            transform: translateX(5px);
        }

        .vppl-nd-recent-img {
            width: 75px;
            height: 75px;
            border-radius: 10px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .vppl-nd-recent-text h4 {
            font-size: 14px;
            color: var(--vppl-nd-secondary);
            font-weight: 700;
            line-height: 1.4;
            transition: var(--vppl-nd-transition);
            margin-bottom: 5px;
        }

        .vppl-nd-recent-item:hover .vppl-nd-recent-text h4 {
            color: var(--vppl-nd-primary);
        }

        .vppl-nd-recent-text span {
            font-size: 12px;
            color: var(--vppl-nd-gray);
            font-weight: 500;
        }

        /* --- Related News Grid --- */
        .vppl-nd-related-section {
            padding: 60px 0 100px;
            background: var(--vppl-nd-bg-light);
            border-top: 1px solid var(--vppl-nd-border);
        }

        .vppl-nd-section-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .vppl-nd-section-header h2 {
            font-size: 36px;
            font-weight: 900;
            color: var(--vppl-nd-secondary);
        }

        .vppl-nd-news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .vppl-nd-news-card {
            background: #fff;
            border-radius: var(--vppl-nd-r-custom);
            overflow: hidden;
            border: 1px solid var(--vppl-nd-border);
            transition: var(--vppl-nd-transition);
            display: flex;
            flex-direction: column;
        }

        .vppl-nd-news-card:hover {
            transform: translateY(-8px);
            border-color: var(--vppl-nd-primary);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .vppl-nd-card-img-wrapper {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .vppl-nd-card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .vppl-nd-news-card:hover .vppl-nd-card-img-wrapper img {
            transform: scale(1.05);
        }

        .vppl-nd-card-date {
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

        .vppl-nd-card-date b {
            display: block;
            font-size: 18px;
            color: var(--vppl-nd-secondary);
            line-height: 1;
        }

        .vppl-nd-card-date span {
            font-size: 9px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--vppl-nd-primary);
        }

        .vppl-nd-card-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .vppl-nd-card-content h3 {
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 12px;
            color: var(--vppl-nd-secondary);
            line-height: 1.4;
        }

        .vppl-nd-card-content p {
            font-size: 14px;
            color: var(--vppl-nd-gray);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .vppl-nd-btn-link {
            margin-top: auto;
            color: var(--vppl-nd-secondary);
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

        .vppl-nd-btn-link:hover {
            color: var(--vppl-nd-primary);
            gap: 10px;
        }

        /* --- Responsive Fixes --- */
        @media (max-width: 991px) {
            .vppl-nd-grid {
                grid-template-columns: 1fr;
            }

            .vppl-nd-news-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .vppl-nd-hero {
                height: auto;
                padding: 120px 0 80px;
            }

            .vppl-nd-sidebar {
                margin-top: 20px;
                position: relative !important; /* Disable sticky on tablet/mobile */
                top: 0 !important;
            }
        }

        @media (max-width: 600px) {
            .vppl-nd-news-grid {
                grid-template-columns: 1fr;
            }

            .vppl-nd-hero-title {
                font-size: 28px;
            }

            .vppl-nd-meta-header {
                gap: 10px;
                flex-direction: column;
                align-items: flex-start;
            }

            .vppl-nd-article-body {
                font-size: 16px;
            }
        }
    </style>

    <div id="wrapper" class="vppl-nd-page-wrapper">

        <!-- Hero Section -->
        <section class="vppl-nd-hero" style="background-image: url('{{ asset('asset/images/sub-banner.webp') }}');">
            <div class="vppl-nd-hero-overlay"></div>
            <div class="vppl-nd-container">
                <div class="vppl-nd-hero-content">
                    <ul class="vppl-nd-breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('news-event') }}">News & Events</a></li>
                        <li class="active">News Details</li>
                    </ul>
                    <h1 class="vppl-nd-hero-title">Pioneering Zero Liquid Discharge <br><span class='vppl-nd-gradient-text'>(ZLD)
                            Systems</span></h1>

                    <div class="vppl-nd-meta-header">
                        <span>
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V10h14v10zm0-12H5V6h14v2z" />
                            </svg>
                            Jan 15, 2026
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                            By Technical Team
                        </span>
                        <span>
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M21.41 11.58l-9-9C12.05 2.22 11.55 2 11 2H4c-1.1 0-2 .9-2 2v7c0 .55.22 1.05.59 1.41l9 9c.36.36.86.58 1.41.58.55 0 1.05-.22 1.41-.59l7-7c.37-.36.59-.86.59-1.41 0-.55-.23-1.06-.59-1.41zM5.5 7C4.67 7 4 6.33 4 5.5S4.67 4 5.5 4 7 4.67 7 5.5 6.33 7 5.5 7z" />
                            </svg>
                            Case Study
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Article Layout -->
        <section class="vppl-nd-article-section">
            <div class="vppl-nd-container">
                <div class="vppl-nd-grid">

                    <!-- Left Column: Article Content -->
                    <div class="vppl-nd-main-content">
                        <img src="{{ asset('asset/images/about-1.jpg') }}" alt="ZLD Tech"
                            class="vppl-nd-featured-img vppl-nd-reveal">

                        <div class="vppl-nd-article-body vppl-nd-reveal">
                            <p>The industrial landscape is undergoing a monumental shift towards sustainable water
                                management. At VPPL, we are leading this transformation through the implementation of our
                                cutting-edge Zero Liquid Discharge (ZLD) systems. This technology represents a paradigm
                                shift from traditional wastewater treatment to comprehensive resource recovery.</p>

                            <h2>The Challenge in Industrial Hubs</h2>
                            <p>Major industrial hubs generate massive volumes of complex wastewater laden with heavy metals,
                                high total dissolved solids (TDS), and organic compounds. Traditional effluent treatment
                                plants (ETPs) often fall short in complying with increasingly stringent environmental
                                regulations, leaving industries vulnerable to operational halts and ecological fines.</p>

                            <blockquote>
                                "Zero Liquid Discharge is no longer an environmental luxury; it is an economic and
                                operational necessity for modern industries aiming for sustainable growth."
                            </blockquote>

                            <h3>How VPPL's ZLD System Works</h3>
                            <p>Our proprietary ZLD architecture is designed for maximum efficiency and minimum footprint.
                                The process involves a multi-stage approach:</p>
                            <ul>
                                <li><strong>Pre-treatment:</strong> Removal of suspended solids and organics using advanced
                                    coagulation and ultrafiltration.</li>
                                <li><strong>Reverse Osmosis (RO):</strong> High-recovery RO membranes concentrate the
                                    dissolved solids while recovering up to 80% of pure water.</li>
                                <li><strong>Evaporation & Crystallization:</strong> Thermal evaporators process the RO
                                    reject, converting the remaining liquid into solid salt crystals, achieving complete
                                    zero liquid discharge.</li>
                            </ul>

                            <p>By implementing this 95% process water recovery system, our clients have not only reduced
                                their environmental footprint but also significantly lowered their operational costs
                                associated with fresh water procurement and effluent discharge penalties. The recovered
                                water is recycled back into the industrial process, creating a truly circular water economy.
                            </p>
                        </div>

                        <!-- Share & Tags Footer -->
                        <div class="vppl-nd-footer vppl-nd-reveal">
                            <div class="vppl-nd-tags">
                                <strong>Tags:</strong>
                                <a href="#" class="vppl-nd-tag mt-2">Sustainability</a>
                                <a href="#" class="vppl-nd-tag mt-2">ZLD System</a>
                                <a href="#" class="vppl-nd-tag mt-2">Innovation</a>
                            </div>
                            <div class="vppl-nd-share">
                                <strong>Share:</strong>
                                <a href="#" class="vppl-nd-share-btn" title="Share on LinkedIn"><svg width="16"
                                        height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg></a>
                                <a href="#" class="vppl-nd-share-btn" title="Share on Twitter"><svg width="16"
                                        height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg></a>
                                <a href="#" class="vppl-nd-share-btn" title="Share on Facebook"><svg width="16"
                                        height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path
                                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Sticky Sidebar -->
                    <aside class="vppl-nd-sidebar">

                        <!-- Recent News Widget Only -->
                        <div class="vppl-nd-widget vppl-nd-reveal">
                            <h3 class="vppl-nd-widget-title">Recent Posts</h3>
                            <div class="vppl-nd-recent-list">
                                <a href="#" class="vppl-nd-recent-item">
                                    <img src="{{ asset('asset/images/about-img-1.webp') }}" alt="News"
                                        class="vppl-nd-recent-img">
                                    <div class="vppl-nd-recent-text">
                                        <h4>ChemTech Global Expo 2026 Participation</h4>
                                        <span>Jan 12, 2026</span>
                                    </div>
                                </a>
                                <a href="#" class="vppl-nd-recent-item">
                                    <img src="{{ asset('asset/images/about-img-2.webp') }}" alt="News"
                                        class="vppl-nd-recent-img">
                                    <div class="vppl-nd-recent-text">
                                        <h4>VPPL wins Excellence in Innovation Award</h4>
                                        <span>Jan 05, 2026</span>
                                    </div>
                                </a>
                                <a href="#" class="vppl-nd-recent-item">
                                    <img src="{{ asset('asset/images/wat5.jpg') }}" alt="News" class="vppl-nd-recent-img">
                                    <div class="vppl-nd-recent-text">
                                        <h4>Ahmedabad Textile Hub Smart Water Recovery</h4>
                                        <span>Dec 28, 2025</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </section>

        <!-- Related News Grid -->
        <section class="vppl-nd-related-section">
            <div class="vppl-nd-container">
                <div class="vppl-nd-section-header vppl-nd-reveal">
                    <h2>Related <span class="vppl-nd-gradient-text">Articles</span></h2>
                </div>

                <div class="vppl-nd-news-grid">

                    <div class="vppl-nd-news-card vppl-nd-reveal">
                        <div class="vppl-nd-card-img-wrapper">
                            <div class="vppl-nd-card-date"><b>12</b><span>Jan</span></div>
                            <img src="{{ asset('asset/images/about-img-1.webp') }}" alt="Expo">
                        </div>
                        <div class="vppl-nd-card-content">
                            <span class="vppl-nd-tag">Event</span>
                            <h3>ChemTech Global Expo 2026</h3>
                            <p>Join VPPL as we unveil our latest ultra-filtration technology lineup.</p>
                            <a href="{{ route('news-details') }}" class="vppl-nd-btn-link">Details →</a>
                        </div>
                    </div>

                    <div class="vppl-nd-news-card vppl-nd-reveal">
                        <div class="vppl-nd-card-img-wrapper">
                            <div class="vppl-nd-card-date"><b>05</b><span>Jan</span></div>
                            <img src="{{ asset('asset/images/about-img-2.webp') }}" alt="Award">
                        </div>
                        <div class="vppl-nd-card-content">
                            <span class="vppl-nd-tag">Award</span>
                            <h3>Excellence in Innovation</h3>
                            <p>Recognized for breakthrough in ceramic membrane technology cycles.</p>
                            <a href="{{ route('news-details') }}" class="vppl-nd-btn-link">Read More →</a>
                        </div>
                    </div>

                    <div class="vppl-nd-news-card vppl-nd-reveal">
                        <div class="vppl-nd-card-img-wrapper">
                            <div class="vppl-nd-card-date"><b>28</b><span>Dec</span></div>
                            <img src="{{ asset('asset/images/wat5.jpg') }}" alt="Project">
                        </div>
                        <div class="vppl-nd-card-content">
                            <span class="vppl-nd-tag">Project</span>
                            <h3>Ahmedabad Textile Hub</h3>
                            <p>Commissioning of a smart-water recovery system for high-volume units.</p>
                            <a href="{{ route('news-details') }}" class="vppl-nd-btn-link">Technical →</a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Hero Content Entrance
        gsap.to(".vppl-nd-hero-content", {
            opacity: 1,
            y: 0,
            duration: 1.2,
            ease: "power3.out",
            delay: 0.2
        });

        // Universal Staggered Reveal for main content, sidebar elements, and related grid
        gsap.utils.toArray('.vppl-nd-reveal').forEach((el, i) => {
            gsap.to(el, {
                scrollTrigger: {
                    trigger: el,
                    start: "top 90%",
                },
                opacity: 1,
                y: 0,
                duration: 0.8,
                ease: "power2.out",
                // Stagger differently depending on if it's in a grid or a vertical list
                delay: el.closest('.vppl-nd-news-grid') ? (i % 3) * 0.15 : 0.1
            });
        });

        // ---------------------------------------------------------------------------------
        // BULLETPROOF STICKY FIX:
        // This ensures that if the parent `frontend.layouts.app` wrapper has an accidental 
        // `overflow: hidden`, it safely patches it just for this page so sticky always works.
        // ---------------------------------------------------------------------------------
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.vppl-nd-sidebar');
            if(sidebar) {
                let parent = sidebar.parentElement;
                while (parent && parent !== document.documentElement) {
                    const style = window.getComputedStyle(parent);
                    if (style.overflow === 'hidden' || style.overflowX === 'hidden' || style.overflowY === 'hidden') {
                        parent.style.overflow = 'visible'; 
                        parent.style.overflowX = 'clip'; // clip fixes the horizontal scroll without breaking sticky
                    }
                    parent = parent.parentElement;
                }
            }
        });
    </script>
@endsection