<header class="vppl-navbar">
    <div class="container">
        <div class="vppl-nav-flex">

            <div class="vppl-logo-wrap">
                <a href="index.php">
                    <img src="{{ asset('asset/images/vppl.svg') }}" alt="VPPL Logo">
                </a>
            </div>

            <nav>
                <ul class="vppl-menu-list" id="vppl-mainmenu">
                    <li class="vppl-mobile-header d-lg-none">
                        <span>VPPL</span>
                        <div id="vppl-close-btn" style="font-size: 24px; cursor: pointer;">&times;</div>
                    </li>

                    <li><a class="vppl-menu-link" href="{{ route('home') }}">Home</a></li>
                    <li><a class="vppl-menu-link" href="{{ route('about') }}">About Us</a></li>

                    <li class="vppl-has-dropdown">
                        <a class="vppl-menu-link" href="javascript:void(0);">Projects <i
                                class="fa fa-chevron-down ms-1 dropdown-icon"></i></a>
                        <ul class="vppl-dropdown-box">
                            <li><a href="{{ route('service-single') }}">Water Treatment Plant</a></li>
                            <li><a href="{{ route('sewage-treatment-plant') }}">Sewage Treatment Plant (STP)</a></li>
                            <li><a href="{{ route('effluent-treatment-plant') }}">Effluent Treatment Plant (ETP)</a></li>
                            <li><a href="{{ route('reverse-osmosis-plant') }}">Reverse Osmosis Plant</a></li>
                            <li><a href="{{ route('water-softening-plant') }}">Water Softening Plant</a></li>
                            <li><a href="{{ route('ultra-filtration-plant') }}">Ultra Filtration Plant</a></li>
                            <li><a href="{{ route('iron-removal-plant') }}">Iron Removal Plant</a></li>
                            <li><a href="{{ route('mineral-water-treatment-plant') }}">Mineral Water Treatment</a></li>
                            <li><a href="{{ route('demineralization-plant') }}">Demineralization Plant</a></li>
                            <li><a href="{{ route('hydro-pneumatic-system-pumps') }}">Hydro Pneumatic Pumps</a></li>
                            <li><a href="{{ route('core-products') }}">Core Products</a></li>
                        </ul>
                    </li>
                    <li><a class="vppl-menu-link" href="{{ route('news-event') }}">News & Events</a></li>
                    <li><a class="vppl-menu-link" href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a class="vppl-menu-link" href="{{ route('careers') }}">Career</a></li>
                    <li><a class="vppl-menu-link" href="{{ route('contact') }}">Contact</a></li>

                    <li class="vppl-mobile-footer d-lg-none">
                        <span class="d-block mb-2" style="color: #64748b; font-size: 14px;">Have questions?</span>
                        <a href="tel:+919843514600" class="mobile-cta-btn">Get a Quote</a>
                    </li>
                </ul>
            </nav>

            <div class="d-flex align-items-center">
                <a href="tel:+919843514600" class="vppl-contact-pill d-none d-xl-flex">
                    <i class="fas fa-phone-alt"></i>
                    <div class="vppl-contact-num ms-2">
                        <span>Get a Quote</span>
                    </div>
                </a>

                <div class="vppl-mobile-btn d-lg-none" id="vppl-mobile-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="vppl-overlay" id="vppl-overlay"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const vpplHeader = document.querySelector(".vppl-navbar");
        const vpplMobileToggle = document.getElementById("vppl-mobile-toggle");
        const vpplCloseBtn = document.getElementById("vppl-close-btn");
        const vpplMenu = document.getElementById("vppl-mainmenu");
        const vpplOverlay = document.getElementById("vppl-overlay");
        const vpplDropdownLinks = document.querySelectorAll(".vppl-has-dropdown > a");

        function toggleMenu() {
            const isOpen = vpplMenu.classList.toggle("vppl-open");
            vpplMobileToggle.classList.toggle("vppl-active");
            vpplOverlay.classList.toggle("active");

            // Disable body scroll when open
            document.body.style.overflow = isOpen ? "hidden" : "";
        }

        vpplMobileToggle.addEventListener("click", toggleMenu);
        vpplOverlay.addEventListener("click", toggleMenu);
        if (vpplCloseBtn) vpplCloseBtn.addEventListener("click", toggleMenu);

        // Mobile Dropdown Logic
        vpplDropdownLinks.forEach(link => {
            link.addEventListener("click", function (e) {
                if (window.innerWidth <= 992) {
                    e.preventDefault();
                    const parent = this.parentElement;
                    parent.classList.toggle("vppl-active");

                    // Close other submenus if one is opened (Accordion style)
                    document.querySelectorAll('.vppl-has-dropdown').forEach(item => {
                        if (item !== parent) item.classList.remove('vppl-active');
                    });
                }
            });
        });

        // Close menu on resize if moving to desktop
        window.addEventListener("resize", function () {
            if (window.innerWidth > 992 && vpplMenu.classList.contains("vppl-open")) {
                toggleMenu();
            }
        });
    });
</script>