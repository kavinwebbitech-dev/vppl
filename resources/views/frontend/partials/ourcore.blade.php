<div class="main-bg">
    <div class="wave-bg-container">
        <svg class="wave-svg" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
            <path fill="#0ea5e9" fill-opacity="0.1"
                d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,144C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
            <path fill="#2563eb" fill-opacity="0.05"
                d="M0,192L48,186.7C96,181,192,171,288,186.7C384,203,480,245,576,234.7C672,224,768,160,864,138.7C960,117,1056,139,1152,160C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- <canvas id="cursor-canvas"></canvas> -->

    <section class="aq-hero-section">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 order-2 order-lg-2 overflow-hidden">
                    <div class="image-stack">
                        <div class="stats-pill" id="float-pill">
                            <span class="fw-bold "><i class="fas fa-shield-halved me-2"></i>Industrial
                                Grade</span>
                        </div>
                        <div class="liquid-frame frame-sub" id="blob-sub">
                            <img src="{{ asset('asset/images/banner/water1.jp') }}g" alt="Tech">
                        </div>
                        <div class="liquid-frame frame-main" id="blob-main">
                            <img src="{{ asset('asset/images/banner/water2.jpg') }}" alt="Water Engineering">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 order-1 order-lg-1">
                    <div class="pe-lg-5 text-center text-lg-start">
                        <span class="reveal-item text-accent fw-bold small text-uppercase mb-2 d-block">
                            <i class="fas fa-droplet me-2"></i>Innovating for Purity
                        </span>

                        <h1 class="display-text mb-4">
                            <span class="reveal-wrapper"><span class="reveal-item">Engineering</span></span>
                            <span class="reveal-wrapper"><span class="reveal-item accent-gradient">Sustainable
                                    Water</span></span>
                            <span class="reveal-wrapper"><span class="reveal-item">Solutions</span></span>
                        </h1>

                        <p class="text-muted fs-5 mb-5 mx-auto mx-lg-0" style="max-width: 600px;">
                            VPPL is a technology-driven engineering powerhouse delivering high-performance
                            industrial solutions for a cleaner, greener tomorrow.
                        </p>

                        <div class="feature-card mb-5 text-start">
                            <div class="icon-box"
                                style="min-width: 50px; height: 50px; background: #e0f2fe; color: #0ea5e9; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-microchip"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1 c-dark">Modular Architecture</h5>
                                <p class="text-muted small mb-0">Smart, compact designs optimized for seamless
                                    installation.</p>
                            </div>
                        </div>

                        <a href="{{ route('service-single') }}" class="btn-main">
                            Explore Solutions <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Animations kept exactly as original
    window.addEventListener('load', () => {
        const tl = gsap.timeline({
            defaults: {
                ease: "power4.out"
            }
        });
        tl.from(".reveal-item", {
                y: 100,
                opacity: 0,
                duration: 1.2,
                stagger: 0.15
            })
            .from(".liquid-frame", {
                scale: 0.8,
                opacity: 0,
                duration: 1.5,
                stagger: 0.2
            }, "-=1");
    });

    function createMorph(element) {
        const r = () => Math.floor(Math.random() * 30 + 35);
        gsap.to(element, {
            borderRadius: `${r()}% ${r()}% ${r()}% ${r()}% / ${r()}% ${r()}% ${r()}% ${r()}%`,
            duration: 4,
            ease: "sine.inOut",
            onComplete: () => createMorph(element)
        });
    }
    createMorph("#blob-main");
    createMorph("#blob-sub");

    const particleCanvas = document.getElementById('cursor-canvas');

    if (particleCanvas) {

        const ctx = particleCanvas.getContext('2d');
        let particles = [];

        const resize = () => {
            particleCanvas.width = window.innerWidth;
            particleCanvas.height = window.innerHeight;
        };

        window.addEventListener('resize', resize);
        resize();

        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.size = Math.random() * 5 + 2;
                this.alpha = 1;
                this.vX = (Math.random() - 0.5) * 1;
                this.vY = (Math.random() - 0.5) * 1;
            }

            update() {
                this.x += this.vX;
                this.y += this.vY;
                this.alpha -= 0.01;
            }

            draw() {
                ctx.globalAlpha = this.alpha;
                ctx.fillStyle = '#0ea5e9';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
            }
        }

        window.addEventListener('mousemove', (e) => {
            for (let i = 0; i < 2; i++) {
                particles.push(new Particle(e.clientX, e.clientY));
            }
        });

        function anim() {
            ctx.clearRect(0, 0, particleCanvas.width, particleCanvas.height);

            particles = particles.filter(p => p.alpha > 0);

            particles.forEach(p => {
                p.update();
                p.draw();
            });

            requestAnimationFrame(anim);
        }

        anim();
    }
</script>
