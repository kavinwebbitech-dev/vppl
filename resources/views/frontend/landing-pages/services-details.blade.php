@extends('frontend.landing-pages.layouts.app')

@section('meta_title', $page->meta_title ?? 'Catogory-Details')
@section('meta_description', $page->meta_description ?? '')
@section('meta_keyword', $page->meta_keyword ?? '')

@section('content')

    <style>
        /* ── Category Detail Section ── */
        .category-detail {
            padding: 60px 0 80px;
            background: #ffffff;
        }

        .category-detail .sec-title {
            margin-bottom: 40px;
        }

        .category-detail .sec-title h2 {
            font-size: 30px;
            font-weight: 700;
            color: #1a1a2e;
            position: relative;
            display: inline-block;
            padding-bottom: 14px;
        }

        .category-detail .sec-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 55px;
            height: 3px;
            background: #0d6efd;
            border-radius: 2px;
        }

        /* ── Cards ── */
        .category-branch-card {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e6e9f0;
            padding: 28px 20px;
            margin-bottom: 24px;
            height: calc(100% - 24px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: all 0.35s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            cursor: pointer;
        }

        .category-branch-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: #0d6efd;
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.35s ease;
            border-radius: 0 2px 2px 0;
        }

        .category-branch-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            opacity: 0;
            transition: opacity 0.35s ease;
            border-radius: 12px;
            z-index: 0;
        }

        .category-branch-card:hover {
            border-color: #0d6efd;
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(13, 110, 253, 0.18);
        }

        .category-branch-card:hover::before {
            transform: scaleY(1);
        }

        .category-branch-card:hover::after {
            opacity: 1;
        }

        .category-branch-card .card-inner {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .category-branch-card .card-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 50%;
            background: #e8f0fe;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.35s ease;
        }

        .category-branch-card .card-icon i {
            font-size: 15px;
            color: #0d6efd;
            transition: color 0.35s ease;
        }

        .category-branch-card:hover .card-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .category-branch-card:hover .card-icon i {
            color: #fff;
        }

        .category-branch-card h4 {
            font-size: 15px;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }

        .category-branch-card h4 a {
            color: #2c2c2c;
            text-decoration: none;
            transition: color 0.35s ease;
            display: block;
        }

        .category-branch-card:hover h4 a {
            color: #ffffff;
        }

        /* ── Empty State ── */
        .empty-state {
            color: #999;
            font-size: 16px;
            padding: 60px 0;
        }

        /* ── Large Container ── */
        .large-container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section hero-50 d-flex justify-content-center align-items-center" id="section_1">

        <div class="section-overlay"></div>

        <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#f6f6f6" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0"></path>
            <path fill="#f6f6f6" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0"></path>
            <path fill="#f6f6f6" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0">
            </path>
            <path fill="#f6f6f6" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0">
            </path>
            <path fill="#f6f6f6" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z"
                stroke-width="0"></path>
            <path fill="#f6f6f6" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z"
                stroke-width="0"></path>
            <path fill="#f6f6f6" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z"
                stroke-width="0"></path>
        </svg>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="text-white mb-3">{{ $service->name }}</h1>

                </div>
            </div>
        </div>

        <svg viewBox="0 0 1962 178" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path fill="#ffffff" d="M 0 114 C 118.5 114 118.5 167 237 167 L 237 167 L 237 0 L 0 0 Z" stroke-width="0">
            </path>
            <path fill="#ffffff" d="M 236 167 C 373 167 373 128 510 128 L 510 128 L 510 0 L 236 0 Z" stroke-width="0">
            </path>
            <path fill="#ffffff" d="M 509 128 C 607 128 607 153 705 153 L 705 153 L 705 0 L 509 0 Z" stroke-width="0">
            </path>
            <path fill="#ffffff" d="M 704 153 C 812 153 812 113 920 113 L 920 113 L 920 0 L 704 0 Z" stroke-width="0">
            </path>
            <path fill="#ffffff" d="M 919 113 C 1048.5 113 1048.5 148 1178 148 L 1178 148 L 1178 0 L 919 0 Z"
                stroke-width="0"></path>
            <path fill="#ffffff" d="M 1177 148 C 1359.5 148 1359.5 129 1542 129 L 1542 129 L 1542 0 L 1177 0 Z"
                stroke-width="0"></path>
            <path fill="#ffffff" d="M 1541 129 C 1751.5 129 1751.5 138 1962 138 L 1962 138 L 1962 0 L 1541 0 Z"
                stroke-width="0"></path>
        </svg>

    </section>

    <!-- Cards Section -->
    <section class="category-detail">
        <div class="large-container">
            <div class="sec-title text-center">
                <h2>{{ $service->name }} Listings</h2>
            </div>

            <div class="category-places">
                <div class="row">
                    @forelse($pages as $page)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="category-branch-card">
                                <a href="{{ url($page->url_slug) }}">
                                    <div class="card-inner">
                                        <div class="card-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <h4>
                                            <a href="{{ url($page->url_slug) }}">
                                                {{ $page->name ?? $page->category }}
                                            </a>
                                        </h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p class="empty-state">No related projects found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
