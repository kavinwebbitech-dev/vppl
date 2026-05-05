<!-- Sidebar -->
<div class="sidebar">
    <h2 class="text-center mb-4">
        <img src="{{ asset('asset/images/vppl.svg') }}" class="vpp-ft-logo" alt="VPPL Logo">
        {{-- Aqua --}}
    </h2>

    <a href="{{ route('admin.index') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
    </a>

    <a href="{{ route('pages.index') }}" class="{{ request()->is('admin/pages*') ? 'active' : '' }}">
        <i class="fa-solid fa-pen-nib"></i> Landing Pages
    </a>

    <a href="{{ route('sitemap.sitemap-robots.index') }}" class="{{ request()->is('admin/sitemap*') ? 'active' : '' }}">
        <i class="fa-solid fa-sitemap"></i> Sitemap & Robots
    </a>

    <a href="{{ route('enquiry.index') }}" class="{{ request()->is('admin/enquiry*') ? 'active' : '' }}">
        <i class="fa-solid fa-envelope-open-text"></i> Enquiries List
    </a>

    <a href="{{ route('service.index') }}" class="{{ request()->is('admin/service*') ? 'active' : '' }}">
        <i class="fa-solid fa-users"></i> Categories
    </a>


    <style>
        .menu-item {
            width: 100%;
        }

        .menu-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .submenu {
            display: none;
            padding-left: 22px;
        }

        .menu-item.active .submenu {
            display: block;
        }

        .submenu a {
            display: block;
            padding: 6px 0;
            font-size: 14px;
        }

        .submenu a.active {
            font-weight: 600;
        }

        .arrow {
            transition: transform 0.3s ease;
        }

        .menu-item.active .arrow {
            transform: rotate(180deg);
        }
    </style>
    {{-- EXPAND MENU --}}
    @php
        $manageActive = request()->is('admin/blog*') || request()->is('admin/jobs*') || request()->is('admin/careers*') || request()->is('admin/testimonial*') || request()->is('admin/faq*');
    @endphp

    <div class="menu-item {{ $manageActive ? 'active' : '' }}">
        <a href="javascript:void(0)" class="menu-toggle" onclick="toggleMenu(this)">
            <div>
                <i class="fa-solid fa-globe"></i> Web Setup
            </div>
            <i class="fa-solid fa-angle-down arrow"></i>
        </a>

        <div class="submenu">

            <a href="{{ route('jobs.index') }}" class="{{ request()->is('admin/jobs*') ? 'active' : '' }}">
                - Jobs
            </a>
           

        </div>
    </div>

    <a href="{{ route('setting.index') }}" class="{{ request()->is('admin/setting*') ? 'active' : '' }}">
        <i class="fa-solid fa-gear"></i> Profile
    </a>

    <a href="{{ route('notification.index') }}" class="{{ request()->is('admin/notification*') ? 'active' : '' }}">
        <i class="fa-solid fa-bell"></i> Notifications
        @if ($notifications->count() > 0)
            <span class="badge bg-danger">{{ $notifications->count() }}</span>
        @endif
    </a>
    <script>
        function toggleMenu(element) {
            element.parentElement.classList.toggle('active');
        }
    </script>

</div>
