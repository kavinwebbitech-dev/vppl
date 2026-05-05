<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', 'VPPL')</title>
    <meta name="description" content="@yield('meta_description', 'Default description')">
    <meta name="keywords" content="@yield('meta_keyword', 'default,keywords')">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/images/fav-icon.png') }}">
    
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('asset/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/newstyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    @stack('styles')

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
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--vppl-white);
            font-family: 'Plus Jakarta Sans', sans-serif;
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
            height: 45vh;
            min-height: 350px;
            background-position: center;
            background-size: cover;
            position: relative;
            display: flex;
            align-items: center;
            color: var(--vppl-white);
            clip-path: ellipse(150% 100% at 50% 0%);
        }

        .vppl-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(10, 45, 77, 0.95) 20%, rgba(10, 45, 77, 0.4));
            z-index: 1;
        }

        .vppl-hero-content {
            position: relative;
            z-index: 10;
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
            font-size: clamp(32px, 6vw, 64px);
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
        }

        .vppl-gradient-text {
            background: var(--grad-accent);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- STATS WRAPPER --- */
        .vppl-stats-wrapper {
            padding: 60px 0;
            background: var(--vppl-white);
            border-bottom: 1px solid var(--vppl-border);
        }

        .vppl-stats-minimal {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .vppl-stat-item {
            position: relative;
            padding: 0 10px;
            text-align: center;
        }

        .vppl-stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background: #e2e8f0;
        }

        .vppl-stat-num {
            font-size: clamp(28px, 4vw, 48px);
            font-weight: 800;
            display: block;
            color: var(--vppl-secondary);
            line-height: 1;
            margin-bottom: 10px;
        }

        .vppl-stat-label {
            font-size: clamp(10px, 2vw, 12px);
            font-weight: 700;
            text-transform: uppercase;
            color: var(--vppl-gray);
            letter-spacing: 1px;
        }

        /* --- Story Section --- */
        .vppl-story {
            padding: 80px 0;
        }

        .vppl-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 60px;
            align-items: center;
        }

        .vppl-text-area {
            grid-column: span 7;
        }

        .vppl-image-area {
            grid-column: span 5;
        }

        .vppl-tag {
            display: inline-block;
            background: rgba(34, 164, 212, 0.1);
            color: var(--vppl-primary);
            padding: 6px 18px;
            border-radius: 4px;
            font-weight: 800;
            font-size: 11px;
            margin-bottom: 20px;
            border-left: 4px solid var(--vppl-primary);
            text-transform: uppercase;
        }

        .vppl-h2 {
            font-size: clamp(28px, 5vw, 44px);
            font-weight: 800;
            color: var(--vppl-secondary);
            margin-bottom: 25px;
            line-height: 1.2;
        }

        /* --- Buttons --- */
        .vppl-btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 35px;
        }

        .vppl-btn {
            padding: 16px 32px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
            text-align: center;
        }

        .vppl-btn-primary {
            background: var(--vppl-secondary);
            color: white;
        }

        .vppl-btn-primary:hover {
            background: var(--vppl-primary);
            transform: translateY(-3px);
        }

        .vppl-btn-outline {
            border: 1px solid var(--vppl-border);
            color: var(--vppl-secondary);
        }

        /* --- Bento Grid --- */
        .vppl-bento-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .vppl-bento-item {
            border-radius: var(--r-custom);
            overflow: hidden;
            background: #f8fafc;
        }

        .vppl-bento-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .vppl-bento-stats {
            background: var(--grad-primary);
            color: white;
            padding: 30px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* --- RESPONSIVE FIXES --- */
        @media (max-width: 991px) {
            .vppl-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .vppl-text-area,
            .vppl-image-area {
                grid-column: span 1;
            }

            .vppl-hero {
                clip-path: none;
                height: auto;
                padding: 100px 0 60px;
            }
        }

        @media (max-width: 768px) {
            .vppl-stats-minimal {
                grid-template-columns: repeat(2, 1fr);
                row-gap: 40px;
            }

            .vppl-stat-item:nth-child(2)::after {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .vppl-btn {
                width: 100%;
            }

            .vppl-stat-item::after {
                display: none;
            }

            .vppl-story {
                padding: 40px 0;
            }
        }
    </style>
</head>

<body>


    @include('frontend.partials.header')


    @yield('content')


    @include('frontend.partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.7/swiper-bundle.min.js"></script>

    @stack('scripts')

    <script src="{{ asset('asset/js/plugins.js') }}"></script>
    <script src="{{ asset('asset/js/designesia.js') }}"></script>
    <script src="{{ asset('asset/js/custom-marquee.js') }}"></script>


</body>

</html>
