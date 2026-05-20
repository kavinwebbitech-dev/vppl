<canvas id="fluid-canvas"></canvas>

<section class="aqua-eng-section">
    <div class="aqua-container">
        <div class="aqua-header">
            <span class="aqua-badge">Excellence in Engineering</span>
            <h2 class="aqua-main-title">Water Solutions</h2>
            <p class="aqua-desc">Advanced engineering for high-purity water treatment and sustainable industrial
                systems.</p>
        </div>

        <div class="aqua-grid">
            <?php
            $items = [
                ['title' => 'Water Treatment Plant', 'sub' => 'WTP Systems', 'text' => 'High-capacity physical and chemical purification for community and industry.', 'tag' => 'Potable', 'url' => 'service-single'],
                ['title' => 'Reverse Osmosis', 'sub' => 'RO Membrane', 'text' => 'Advanced desalination removing salts and microscopic impurities with precision.', 'tag' => 'Ultra Pure', 'url' => 'reverse-osmosis-plant'],
                ['title' => 'Water Softening', 'sub' => 'Ion-Exchange', 'text' => 'Removing calcium and magnesium to prevent scaling in pipelines and boilers.', 'tag' => 'Scale-Free', 'url' => 'water-softening-plant'],
                ['title' => 'Ultra Filtration', 'sub' => 'UF Systems', 'text' => 'Pressure-driven membrane process to remove suspended solids and bacteria.', 'tag' => '0.01 Micron', 'url' => 'ultra-filtration-plant'],
                ['title' => 'Iron Removal Plant', 'sub' => 'Oxidation', 'text' => 'Specialized media filters to eliminate iron and manganese from borewell water.', 'tag' => 'Clear Water', 'url' => 'iron-removal-plant'],
                ['title' => 'Mineral Water Plant', 'sub' => 'Turnkey', 'text' => 'Automatic production lines for bottled water with ozonation systems.', 'tag' => 'Commercial', 'url' => 'mineral-water-treatment-plant'],

                // Extra Items (Hidden by default)
                ['title' => 'Demineralization', 'sub' => 'DM Units', 'text' => 'Dual-bed and mixed-bed ion exchange for high-purity industrial process water.', 'tag' => 'Deionized', 'url' => 'demineralization-plant'],
                ['title' => 'Hydro Pneumatic', 'sub' => 'Pump Systems', 'text' => 'Energy-efficient pressure boosting systems for constant water supply.', 'tag' => 'Constant PSI', 'url' => 'hydro-pneumatic-system-pumps']
            ];

            foreach ($items as $index => $item):
                $isHidden = ($index >= 6) ? 'aqua-card-extra d-none' : '';
                ?>
                <div class="aqua-card <?= $isHidden ?>">
                    <div class="aqua-card-body">
                        <span class="aqua-card-sub"><?= $item['sub'] ?></span>
                        <h3 class="aqua-card-title"><?= $item['title'] ?></h3>
                        <p class="aqua-card-text"><?= $item['text'] ?></p>
                    </div>

                    <div class="aqua-card-footer">
                        <span class="aqua-tag"><?= $item['tag'] ?></span>
                        <a href="<?= $item['url'] ?>" class="aqua-btn">
                            Details
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14m-7-7 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (count($items) > 6): ?>
            <div class="aqua-actions">
                <a href="{{ route('service-single') }}" id="view-more-btn" class="aqua-view-more">
                    View More Systems
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="ms-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    const canvas = document.getElementById('fluid-canvas');
    const ctx = canvas.getContext('2d');
    let particles = [];
    let mouse = { x: null, y: null };

    window.addEventListener('mousemove', (e) => {
        mouse.x = e.x;
        mouse.y = e.y;
    });

    function resize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    window.addEventListener('resize', resize);
    resize();

    class Bubble {
        constructor() {
            this.init();
        }
        init() {
            this.x = Math.random() * canvas.width;
            this.y = canvas.height + Math.random() * 100;
            this.size = Math.random() * 15 + 2;
            this.speed = Math.random() * 1 + 0.4;
            this.opacity = Math.random() * 0.3 + 0.1;
            this.wobble = Math.random() * 10;
        }
        update() {
            this.y -= this.speed;
            this.x += Math.sin(this.y / 30 + this.wobble) * 0.5;

            // Mouse Repel
            if (mouse.x) {
                let dx = this.x - mouse.x;
                let dy = this.y - mouse.y;
                let dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 120) {
                    this.x += dx / 20;
                    this.y += dy / 20;
                }
            }

            if (this.y < -50) this.init();
        }
        draw() {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(34, 147, 196, ${this.opacity})`;
            ctx.fill();
            // Reflection highlight on bubble
            ctx.beginPath();
            ctx.arc(this.x - this.size * 0.3, this.y - this.size * 0.3, this.size * 0.2, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity + 0.2})`;
            ctx.fill();
        }
    }

    function init() {
        particles = [];
        for (let i = 0; i < 40; i++) {
            particles.push(new Bubble());
        }
    }

    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Drawing a very subtle "water wave" at the bottom
        ctx.beginPath();
        ctx.moveTo(0, canvas.height);
        for (let i = 0; i <= canvas.width; i += 20) {
            ctx.lineTo(i, canvas.height - 20 + Math.sin(i * 0.01 + Date.now() * 0.002) * 10);
        }
        ctx.lineTo(canvas.width, canvas.height);
        ctx.fillStyle = 'rgba(34, 147, 196, 0.03)';
        ctx.fill();

        particles.forEach(p => {
            p.update();
            p.draw();
        });
        requestAnimationFrame(animate);
    }

    init();
    animate();
</script>