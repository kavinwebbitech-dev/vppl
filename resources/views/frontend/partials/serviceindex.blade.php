
<style>
    :root {
        --vppl-primary: #2293c4;
        --vppl-dark: #0f172a;
        --vppl-muted: #64748b;
        --vppl-card-bg: linear-gradient(135deg, #2293c4 0%, #1a749c 100%);
        --white: #ffffff;
    }

    /* Essential for Smooth Scroll (Lenis) */
    html.lenis {
        height: auto;
    }

    .lenis-smooth {
        scroll-behavior: auto !important;
    }

    .lenis-smooth [data-lenis-prevent] {
        overscroll-behavior: contain;
    }

    .lenis-stopped {
        overflow: hidden;
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--white);
        color: var(--vppl-dark);
        overflow-x: hidden;
        line-height: 1.6;
    }

    .vppl-dark {
        color: var(--vppl-dark);
    }

    .vppl-nexus-portal {
        padding: 100px 0;
        background: radial-gradient(circle at 50% 50%, rgba(34, 147, 196, 0.03) 0%, rgba(255, 255, 255, 0) 70%);
    }

    /* --- Image Section --- */
    .image-mask {
        position: relative;
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0 40px 80px rgba(34, 147, 196, 0.2);
        z-index: 5;
        background: #f8fafc;
    }

    .main-eng-img {
        width: 100%;
        height: 650px;
        object-fit: cover;
        display: block;
    }

    .nexus-head-color {
        color: var(--vppl-primary);
    }

    /* --- Feature Cards --- */
    .nexus-card {
        background: var(--vppl-card-bg);
        border-radius: 20px;
        padding: 25px;
        margin-bottom: 24px;
        display: flex;
        align-items: flex-start;
        gap: 20px;
        text-decoration: none !important;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        position: relative;
    }

    .nexus-card:hover {
        transform: translateY(-5px);
        background: var(--white);
        border-color: var(--vppl-primary);
        box-shadow: 0 15px 40px rgba(34, 147, 196, 0.15);
    }

    .nexus-icon-box {
        min-width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        color: var(--white);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .nexus-card:hover .nexus-icon-box {
        background: #eef9ff;
        color: var(--vppl-primary);
    }

    .nexus-card h4 {
        color: var(--white);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 6px;
        transition: color 0.3s;
    }

    .nexus-card p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.85rem;
        margin: 0;
        transition: color 0.3s;
    }

    .nexus-card:hover h4 {
        color: var(--vppl-dark);
    }

    .nexus-card:hover p {
        color: var(--vppl-muted);
    }

    /* --- Floating UI --- */
    .floating-badge {
        position: absolute;
        top: 30px;
        left: -20px;
        background: var(--white);
        padding: 12px 24px;
        border-radius: 50px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 10;
    }

    .water-bubble {
        position: absolute;
        background: rgba(255, 255, 255, 0.4);
        border-radius: 50%;
        bottom: -20px;
        pointer-events: none;
        z-index: 6;
    }

    @media (max-width: 991px) {
        .main-eng-img {
            height: 450px;
        }

        .vppl-nexus-portal {
            padding: 60px 0;
        }

        .floating-badge {
            left: 10px;
            top: 10px;
        }
    }

    .normal-cursor {
        cursor: default !important;
    }
</style>

<section class="vppl-nexus-portal">
    <div class="container">
        <div class="text-center mb-5" id="headerContent" style="opacity: 0;">
            <h6 class=" fw-bold text-uppercase nexus-head-color mb-2" style="letter-spacing: 3px;">Technical Prowess
            </h6>
            <h2 class="fw-bold display-5 text-black mb-3 vppl-dark">Our Core <span
                    class="nexus-head-color">Capabilities</span></h2>
            <p class="text-muted fs-5">Engineering tailored high-performance water and waste management solutions.
            </p>
        </div>

        <div class="row align-items-center g-4">
            <div class="col-lg-4 order-2 order-lg-1">
                <div class="reveal-left ">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-faucet-drip"></i></div>
                        <div>
                            <h4>Water Treatment Plant</h4>
                            <p>Specializing in home hard water solutions and potable water techniques.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-left  ">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-droplet-slash"></i></div>
                        <div>
                            <h4>Waste Water Treatment</h4>
                            <p>Cost-effective sewage, salinity, and Zero Liquid Discharge (ZLD) systems.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-left  ">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-recycle"></i></div>
                        <div>
                            <h4>Solid Waste Management</h4>
                            <p>Comprehensive organic waste composting for residential and corporate sectors.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-left  ">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-filter"></i></div>
                        <div>
                            <h4>Iron Removal Solutions</h4>
                            <p>Effective treatment for dissolved and suspended iron in groundwater.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 order-1 order-lg-2">
                <div class="position-relative" id="imageContainer" style="opacity: 0;">
                    <div class="floating-badge">
                        <i class="fas fa-certificate "></i>
                        <span class="fw-bold vppl-dark">ISO Certified Excellence</span>
                    </div>
                    <div class="image-mask" id="tiltImg">
                        <img src="{{ asset('asset/images/banner/banners2.jpg') }}" alt="Water Engineering" class="main-eng-img">
                        <div id="bubbleContainer"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 order-3">
                <div class="reveal-right">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                        <div>
                            <h4>Operation & Maintenance</h4>
                            <p>Preventive maintenance and AMC to ensure long system life and efficiency.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-right">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-flask-vial"></i></div>
                        <div>
                            <h4>Chemical Solutions</h4>
                            <p>Supplying specialized ETP chemicals for cyanide and chromium extraction.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-right">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-industry"></i></div>
                        <div>
                            <h4>Demineralization Plant</h4>
                            <p>Removing dissolved salts and ions for high-purity industrial process water.</p>
                        </div>
                    </a>
                </div>
                <div class="reveal-right">
                    <a href="javascript:void(0);" class="nexus-card normal-cursor">
                        <div class="nexus-icon-box"><i class="fa-solid fa-gauge-high"></i></div>
                        <div>
                            <h4>Hydro Pneumatic Systems</h4>
                            <p>Optimizing water distribution and pressure across industrial complexes.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>

<script>
    // 1. Smooth Scroll (Lenis) Initialization
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // 2. GSAP Animations
    gsap.registerPlugin(ScrollTrigger);

    document.addEventListener("DOMContentLoaded", () => {

        // Create Bubbles
        const container = document.getElementById('bubbleContainer');
        for (let i = 0; i < 15; i++) {
            const bubble = document.createElement('div');
            bubble.className = 'water-bubble';
            const size = Math.random() * 15 + 5;
            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;
            bubble.style.left = `${Math.random() * 100}%`;
            container.appendChild(bubble);

            gsap.to(bubble, {
                y: -600,
                opacity: 0,
                duration: Math.random() * 3 + 2,
                repeat: -1,
                delay: Math.random() * 5,
                ease: "power1.in"
            });
        }

        // Main Animation Timeline
        const mainTl = gsap.timeline({
            scrollTrigger: {
                trigger: ".vppl-nexus-portal",
                start: "top 80%",
            }
        });

        mainTl.to("#headerContent", {
                opacity: 1,
                y: 0,
                duration: 0.8
            })
            .to("#imageContainer", {
                opacity: 1,
                scale: 1,
                duration: 1,
                ease: "back.out(1.2)"
            }, "-=0.4")
            .from(".reveal-left  ", {
                x: -50,
                opacity: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power3.out"
            }, "-=0.8")
            .from(".reveal-right", {
                x: 50,
                opacity: 0,
                stagger: 0.15,
                duration: 0.8,
                ease: "power3.out"
            }, "-=1")
            .from(".floating-badge", {
                scale: 0,
                opacity: 0,
                duration: 0.5
            }, "-=0.5");

        // 3. 3D Tilt Effect
        if (window.innerWidth > 991) {
            const tiltImg = document.querySelector("#tiltImg");
            window.addEventListener("mousemove", (e) => {
                const {
                    clientX,
                    clientY
                } = e;
                const {
                    innerWidth,
                    innerHeight
                } = window;

                const rotateY = ((clientX / innerWidth) - 0.5) * 20;
                const rotateX = ((clientY / innerHeight) - 0.5) * -20;

                gsap.to(tiltImg, {
                    rotateY: rotateY,
                    rotateX: rotateX,
                    transformPerspective: 1000,
                    duration: 1,
                    ease: "power2.out"
                });
            });
        }
    });
</script>
