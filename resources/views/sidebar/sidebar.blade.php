
          {{-- Have Sound With Animated Sidebar Menu --}}

{{-- <div class="sidebar" id="sidebar">
    <!-- Multi-Layer Animated Background -->
    <div class="sidebar-bg-particles"></div>
    <div class="sidebar-bg-glow"></div>
    <div class="sidebar-bg-gif"></div>
    <div class="sidebar-bg-gradient"></div>

    <!-- Floating Elements -->
    <div class="floating-shapes">
        <div class="shape circle"></div>
        <div class="shape triangle"></div>
        <div class="shape square"></div>
    </div>

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @foreach ($menus as $menu)
                    <li class="submenu {{ set_active($menu->active_routes) }}
                        {{ (isset($menu->pattern) && request()->is($menu->pattern)) ? 'active' : '' }}">
                        <a href="{{ $menu->route ? route($menu->route) : '#' }}"
                           data-sound="hover"
                           data-menu-title="{{ $menu->title }}"
                           data-speak="{{ $menu->title }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span>{{ $menu->title }}</span>
                            @if ($menu->children->count())
                                <span class="menu-arrow"></span>
                            @endif
                            <div class="menu-highlight"></div>
                        </a>
                        @if ($menu->children->count())
                            <ul>
                                @foreach ($menu->children as $child)
                                    <li>
                                        <a href="{{ $child->route ? route($child->route) : '#' }}"
                                           class="{{ set_active($child->active_routes) }}
                                                  {{ (isset($child->pattern) && request()->is($child->pattern)) ? 'active' : '' }}"
                                           data-sound="click"
                                           data-parent-title="{{ $menu->title }}">
                                            {{ $child->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Visual Effects -->
    <canvas id="sidebar-confetti"></canvas>
    <div id="emoji-rain"></div>
    <div id="particle-network"></div>
    <div id="holographic-effect"></div>

    <!-- Audio Elements -->
    <audio id="hover-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3" preload="auto"></audio>
    <audio id="click-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3" preload="auto"></audio>
    <audio id="celebration-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3" preload="auto"></audio>
</div>
<style>
    /* Base Sidebar Styling */
    .sidebar {
        width: 280px;
        background: linear-gradient(152deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        position: fixed;
        height: 100%;
        box-shadow: 8px 0 40px rgba(0, 0, 0, 0.6);
        z-index: 1001;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        backdrop-filter: blur(8px);
        border-right: 1px solid rgba(255, 255, 255, 0.15);
    }

    .sidebar:hover {
        box-shadow: 10px 0 50px rgba(0, 0, 0, 0.8);
        transform: translateX(5px);
    }

    /* Multi-Layer Background Effects */
    .sidebar-bg-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.2)"/><circle cx="150" cy="30" r="1.5" fill="rgba(255,255,255,0.15)"/><circle cx="100" cy="150" r="2" fill="rgba(255,255,255,0.25)"/><circle cx="20" cy="180" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="180" cy="100" r="1.2" fill="rgba(255,255,255,0.18)"/></svg>');
        background-size: 180px 180px;
        opacity: 0.5;
        animation: particleMove 70s linear infinite;
    }

    .sidebar-bg-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 30% 50%, rgba(0, 219, 222, 0.25), transparent 70%);
        opacity: 0.6;
        animation: glowPulse 9s ease-in-out infinite;
    }

    .sidebar-bg-gif {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://i.gifer.com/7plQ.gif') center/cover;
        opacity: 0.08;
        mix-blend-mode: overlay;
        pointer-events: none;
        animation: gifFade 15s ease-in-out infinite;
    }

    .sidebar-bg-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(59, 130, 246, 0.1) 0%,
            rgba(0, 219, 222, 0.1) 50%,
            rgba(252, 0, 255, 0.1) 100%);
        animation: gradientShift 25s ease infinite alternate;
    }

    /* Floating Shapes */
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.15;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .shape.circle {
        width: 180px;
        height: 180px;
        border-radius: 50%;
        border: 3px dashed rgba(0, 219, 222, 0.6);
        top: 15%;
        left: -60px;
        animation: float 30s infinite alternate;
    }

    .shape.triangle {
        width: 0;
        height: 0;
        border-left: 90px solid transparent;
        border-right: 90px solid transparent;
        border-bottom: 155px solid rgba(255, 105, 180, 0.35);
        bottom: 5%;
        right: -40px;
        animation: float 35s infinite alternate-reverse;
    }

    .shape.square {
        width: 120px;
        height: 120px;
        background: rgba(255, 215, 0, 0.25);
        transform: rotate(45deg);
        top: 65%;
        left: -30px;
        animation: float 25s infinite alternate;
    }

    /* Menu Items Styling */
    .sidebar-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-title {
        padding: 18px 25px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 3px;
        position: relative;
        text-shadow: 0 0 20px rgba(0, 180, 255, 0.5);
        font-weight: 600;
        backdrop-filter: blur(5px);
    }

    .menu-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 25px;
        right: 25px;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(0, 180, 219, 0.5), transparent);
    }

    .submenu > a {
        display: flex;
        align-items: center;
        padding: 16px 25px;
        color: rgba(255, 255, 255, 0.97);
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(5px);
        margin: 8px 15px;
        border-radius: 10px;
        z-index: 1;
    }

    .submenu > a:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, #00dbde, #3b82f6);
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .submenu > a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0.05) 0%, rgba(255,255,255,0) 100%);
        transform: translateX(-100%);
        transition: transform 0.8s ease;
    }

    .menu-highlight {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at center, rgba(0, 219, 222, 0.3), transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: -1;
    }

    .submenu > a:hover {
        background: rgba(59, 130, 246, 0.15);
        padding-left: 30px;
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
        transform: translateX(8px);
    }

    .submenu > a:hover:before {
        transform: scaleY(1);
    }

    .submenu > a:hover:after {
        transform: translateX(100%);
    }

    .submenu > a:hover .menu-highlight {
        opacity: 1;
    }

    .submenu > a i {
        margin-right: 15px;
        font-size: 22px;
        transition: all 0.5s ease;
        min-width: 26px;
        text-align: center;
    }

    .submenu > a:hover i {
        transform: rotate(20deg) scale(1.4);
        color: #00dbde;
        filter: drop-shadow(0 0 12px rgba(0, 219, 222, 0.8));
    }

    /* Active State */
    .submenu.active > a {
        background: rgba(59, 130, 246, 0.2);
        padding-left: 30px;
        box-shadow: 0 0 25px rgba(59, 130, 246, 0.4);
    }

    .submenu.active > a:before {
        transform: scaleY(1);
    }

    .submenu.active > a i {
        color: #00dbde;
        filter: drop-shadow(0 0 12px rgba(0, 219, 222, 0.8));
    }

    /* Submenu Animation */
    .submenu ul {
        background: rgba(0, 0, 0, 0.25);
        display: none;
        animation: slideDown 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-left: 3px solid rgba(59, 130, 246, 0.4);
        margin: 0 15px 10px;
        border-radius: 0 0 10px 10px;
        overflow: hidden;
    }

    .submenu.active ul {
        display: block;
    }

    .submenu ul li a {
        display: block;
        padding: 15px 25px 15px 70px;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        transition: all 0.5s ease;
        position: relative;
        font-size: 15px;
    }

    .submenu ul li a:before {
        content: '';
        position: absolute;
        left: 45px;
        top: 50%;
        transform: translateY(-50%);
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(0, 219, 222, 0.6);
        transition: all 0.4s ease;
    }

    .submenu ul li a:hover {
        background: rgba(255, 255, 255, 0.1);
        padding-left: 75px;
        color: #ffffff;
    }

    .submenu ul li a:hover:before {
        background: #00dbde;
        box-shadow: 0 0 15px #00dbde;
        transform: translateY(-50%) scale(1.4);
    }

    /* Confetti Canvas */
    #sidebar-confetti {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    /* Emoji Rain */
    #emoji-rain {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
        z-index: -1;
    }

    .emoji {
        position: absolute;
        font-size: 30px;
        animation: emojiFall linear forwards;
        user-select: none;
        text-shadow: 0 0 15px currentColor;
        opacity: 0.9;
    }

    /* Particle Network */
    #particle-network {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
    }

    .particle-line {
        position: absolute;
        height: 1px;
        background: rgba(255, 255, 255, 0.2);
        transform-origin: left center;
    }

    /* Holographic Effect */
    #holographic-effect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(0, 219, 222, 0.08) 0%,
            rgba(252, 0, 255, 0.08) 50%,
            rgba(255, 105, 180, 0.08) 100%);
        opacity: 0.4;
        pointer-events: none;
        z-index: -1;
        animation: holographicPulse 20s ease infinite alternate;
    }

    /* Ripple Effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.6);
        transform: scale(0);
        animation: ripple 0.9s linear;
        pointer-events: none;
    }

    /* Sparkle Effect */
    .sparkle {
        position: absolute;
        width: 10px;
        height: 10px;
        background: radial-gradient(circle, #ffffff, #3b82f6);
        border-radius: 50%;
        animation: sparkle 0.6s ease-out;
        pointer-events: none;
        filter: blur(1px);
    }

    /* Animations */
    @keyframes particleMove {
        0% { background-position: 0 0; }
        100% { background-position: 180px 180px; }
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.4; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.15); }
    }

    @keyframes gifFade {
        0%, 100% { opacity: 0.05; }
        50% { opacity: 0.12; }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }

    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(8deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes emojiFall {
        0% { opacity: 1; transform: translateY(-100%) rotate(0deg); }
        100% { opacity: 0.2; transform: translateY(100vh) rotate(360deg); }
    }

    @keyframes emojiFall2 {
        0% { opacity: 1; transform: translateY(-100%) scale(1); }
        100% { opacity: 0; transform: translateY(100vh) scale(1.8); }
    }

    @keyframes ripple {
        to { transform: scale(6); opacity: 0; }
    }

    @keyframes sparkle {
        0% { opacity: 0; transform: scale(0); filter: blur(0); }
        50% { opacity: 1; transform: scale(1.5); filter: blur(2px); }
        100% { opacity: 0; transform: scale(0); filter: blur(0); }
    }

    @keyframes holographicPulse {
        0% { background-position: 0% 0%; filter: hue-rotate(0deg); }
        100% { background-position: 100% 100%; filter: hue-rotate(360deg); }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const confettiCanvas = document.getElementById('sidebar-confetti');
        const emojiRain = document.getElementById('emoji-rain');
        const particleNetwork = document.getElementById('particle-network');
        const emojis = ['🎉', '✨', '🌟', '💎', '🔥', '🚀', '🌈', '🎊', '💫', '☄️', '🎈', '🥳', '⚡', '🎇', '🌠'];

        // Initialize sounds with Howler
        const sounds = {
            hover: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3'], volume: 0.4 }),
            click: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3'], volume: 0.5 }),
            celebration: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3'], volume: 0.7 })
        };

        // Initialize speech synthesis
        const synth = window.speechSynthesis;
        let isSpeaking = false;

        // Initialize confetti
        confettiCanvas.width = sidebar.offsetWidth;
        confettiCanvas.height = sidebar.offsetHeight;

        // Create particle network
        createParticleNetwork();

        // Enhanced hover and click effects
        const menuItems = document.querySelectorAll('.submenu > a, .submenu ul li a');

        menuItems.forEach((item, index) => {
            // Staggered animation delay
            item.style.transitionDelay = `${index * 0.07}s`;

            // Hover effects
            item.addEventListener('mouseenter', function(e) {
                if (this.dataset.sound === 'hover') {
                    sounds.hover.play();
                }
                createSparkle(this);

                // Special celebration for important items
                if (this.textContent.match(/Dashboard|Success|Achievement|Premium/i)) {
                    triggerConfetti();
                    triggerEmojiRain();
                    sounds.celebration.play();

                    // Enhanced animation
                    gsap.to(this, {
                        scale: 1.08,
                        rotate: 3,
                        duration: 0.6,
                        yoyo: true,
                        repeat: 1,
                        ease: "elastic.out(1, 0.5)"
                    });
                }
            });

            // Click effects
            item.addEventListener('click', function(e) {
                const parentLi = this.parentElement;
                const hasSubmenu = parentLi.classList.contains('submenu') && parentLi.querySelector('ul');
                const href = this.getAttribute('href');

                // Play click sound
                if (this.dataset.sound === 'click') {
                    sounds.click.play();
                    // Check if the parent menu is "Students" and trigger speech
                    if (this.dataset.parentTitle === 'Students') {
                        speakMenuTitle('Student');
                    }
                }

                // Speak main menu title if available
                if (this.dataset.speak && !isSpeaking) {
                    speakMenuTitle(this.dataset.speak);
                }

                // Create ripple effect
                createRipple(e, this);

                // If the item has a submenu, toggle its visibility and prevent navigation
                if (hasSubmenu) {
                    e.preventDefault(); // Prevent navigation to allow submenu toggle
                    const isActive = parentLi.classList.contains('active');
                    // Close other open submenus
                    document.querySelectorAll('.submenu.active').forEach(submenu => {
                        if (submenu !== parentLi) {
                            submenu.classList.remove('active');
                        }
                    });
                    // Toggle current submenu
                    parentLi.classList.toggle('active', !isActive);
                } else {
                    // If no submenu, allow navigation if href is valid
                    if (href && href !== '#') {
                        // Navigation will proceed naturally via the href
                        // Optionally, you can add a smooth transition effect before navigating
                        gsap.to(this, {
                            scale: 0.95,
                            duration: 0.2,
                            onComplete: () => {
                                window.location.href = href; // Ensure navigation occurs
                            }
                        });
                    } else {
                        e.preventDefault(); // Prevent default if href is '#' or invalid
                    }
                }
            });
        });

        // Continuous background animations
        gsap.to('.sidebar-bg-particles', {
            backgroundPosition: '180px 180px',
            duration: 70,
            repeat: -1,
            ease: "none"
        });

        gsap.to('.sidebar-bg-glow', {
            scale: 1.2,
            opacity: 0.8,
            duration: 9,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Floating shapes animation
        gsap.to('.shape.circle', {
            rotation: 360,
            duration: 60,
            repeat: -1,
            ease: "none",
        });

        // Window resize handler
        window.addEventListener('resize', function() {
            confettiCanvas.width = sidebar.offsetWidth;
            confettiCanvas.height = sidebar.offsetHeight;
        });

        function createRipple(event, element) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');

            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x - size/2}px`;
            ripple.style.top = `${y - size/2}px`;

            element.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 900);
        }

        function createSparkle(element) {
            for (let i = 0; i < 3; i++) {
                const sparkle = document.createElement('span');
                sparkle.classList.add('sparkle');

                const rect = element.getBoundingClientRect();
                const x = Math.random() * rect.width;
                const y = Math.random() * rect.height;

                sparkle.style.left = `${x}px`;
                sparkle.style.top = `${y}px`;
                sparkle.style.animationDelay = `${i * 0.1}s`;

                element.appendChild(sparkle);

                setTimeout(() => {
                    sparkle.remove();
                }, 600);
            }
        }

        function speakMenuTitle(text) {
            if (synth.speaking) {
                synth.cancel();
            }

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.volume = 0.9;
            utterance.rate = 1;
            utterance.pitch = 1.1;

            isSpeaking = true;
            utterance.onend = function() {
                isSpeaking = false;
            };

            synth.speak(utterance);
        }

        function triggerConfetti() {
            const confetti = window.confetti.create(confettiCanvas, {
                resize: true,
                useWorker: true
            });

            confetti({
                particleCount: 250,
                spread: 100,
                origin: { x: Math.random(), y: 0.3 },
                colors: ['#3b82f6', '#00ddeb', '#ffcc00', '#ff4d4d', '#ffffff', '#7b2ff7'],
                shapes: ['circle', 'square', 'star', 'triangle'],
                scalar: 1,
                gravity: 0.7,
                drift: Math.random() * 2 - 1
            });

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 60,
                    spread: 65,
                    origin: { x: 0, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 300);

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 120,
                    spread: 65,
                    origin: { x: 1, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 600);
        }

        function triggerEmojiRain() {
            emojiRain.innerHTML = '';

            for (let i = 0; i < 50; i++) {
                const emoji = document.createElement('div');
                emoji.classList.add('emoji');
                emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];

                const leftPos = Math.random() * 100;
                const animationDuration = 3 + Math.random() * 6;
                const delay = Math.random() * 4;
                const fontSize = 20 + Math.random() * 30;
                const color = `hsl(${Math.random() * 360}, 100%, 75%)`;

                emoji.style.left = `${leftPos}%`;
                emoji.style.fontSize = `${fontSize}px`;
                emoji.style.color = color;
                emoji.style.animationDuration = `${animationDuration}s`;
                emoji.style.animationDelay = `${delay}s`;
                emoji.style.top = `-${fontSize}px`;

                const animationType = Math.random() > 0.5 ? 'emojiFall' : 'emojiFall2';
                emoji.style.animationName = animationType;

                emojiRain.appendChild(emoji);

                setTimeout(() => {
                    emoji.remove();
                }, (animationDuration + delay) * 1000);
            }
        }

        function createParticleNetwork() {
            const particles = [];
            const particleCount = 80;
            const maxDistance = 150;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                const size = 1 + Math.random() * 3;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                particle.style.opacity = 0.4 + Math.random() * 0.6;

                particleNetwork.appendChild(particle);

                particles.push({
                    element: particle,
                    x: Math.random() * sidebar.offsetWidth,
                    y: Math.random() * sidebar.offsetHeight,
                    vx: Math.random() * 0.5 - 0.25,
                    vy: Math.random() * 0.5 - 0.25
                });
            }

            function animateParticles() {
                document.querySelectorAll('.particle-line').forEach(line => line.remove());

                particles.forEach(particle => {
                    particle.x += particle.vx;
                    particle.y += particle.vy;

                    if (particle.x < 0 || particle.x > sidebar.offsetWidth) particle.vx *= -1;
                    if (particle.y < 0 || particle.y > sidebar.offsetHeight) particle.vy *= -1;

                    particle.element.style.left = `${particle.x}px`;
                    particle.element.style.top = `${particle.y}px`;
                });

                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const p1 = particles[i];
                        const p2 = particles[j];
                        const dx = p1.x - p2.x;
                        const dy = p1.y - p2.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < maxDistance) {
                            const line = document.createElement('div');
                            line.classList.add('particle-line');

                            line.style.left = `${p1.x}px`;
                            line.style.top = `${p1.y}px`;
                            line.style.width = `${distance}px`;
                            line.style.opacity = 1 - (distance / maxDistance);

                            const angle = Math.atan2(dy, dx);
                            line.style.transform = `rotate(${angle}rad)`;

                            particleNetwork.appendChild(line);
                        }
                    }
                }

                requestAnimationFrame(animateParticles);
            }

            animateParticles();
        }

        // Initial animations
        gsap.from('.sidebar', {
            x: -300,
            opacity: 0,
            duration: 1.2,
            ease: "power4.out"
        });

        gsap.from('.sidebar-menu li', {
            opacity: 0,
            y: 40,
            duration: 1.2,
            stagger: 0.15,
            delay: 0.5,
            ease: "back.out(2.5)"
        });

        gsap.from('.menu-title', {
            opacity: 0,
            x: -60,
            duration: 1,
            ease: "elastic.out(1, 0.5)"
        });
    });
</script> --}}

         {{-- not Sound With Animated Sidebar Menu --}}

{{-- <div class="sidebar" id="sidebar">
    <!-- Multi-Layer Animated Background -->
    <div class="sidebar-bg-particles"></div>
    <div class="sidebar-bg-glow"></div>
    <div class="sidebar-bg-gif"></div>
    <div class="sidebar-bg-gradient"></div>

    <!-- Floating Elements -->
    <div class="floating-shapes">
        <div class="shape circle"></div>
        <div class="shape triangle"></div>
        <div class="shape square"></div>
    </div>

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @foreach ($menus as $menu)
                    <li class="submenu {{ set_active($menu->active_routes) }}
                        {{ (isset($menu->pattern) && request()->is($menu->pattern)) ? 'active' : '' }}">
                        <a href="{{ $menu->route ? route($menu->route) : '#' }}"
                           data-sound="hover"
                           data-menu-title="{{ $menu->title }}"
                           data-speak="{{ $menu->title }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span>{{ $menu->title }}</span>
                            @if ($menu->children->count())
                                <span class="menu-arrow"></span>
                            @endif
                            <div class="menu-highlight"></div>
                        </a>
                        @if ($menu->children->count())
                            <ul>
                                @foreach ($menu->children as $child)
                                    <li>
                                        <a href="{{ $child->route ? route($child->route) : '#' }}"
                                           class="{{ set_active($child->active_routes) }}
                                                  {{ (isset($child->pattern) && request()->is($child->pattern)) ? 'active' : '' }}"
                                           data-sound="click"
                                           data-parent-title="{{ $menu->title }}">
                                            {{ $child->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Visual Effects -->
    <canvas id="sidebar-confetti"></canvas>
    <div id="emoji-rain"></div>
    <div id="particle-network"></div>
    <div id="holographic-effect"></div>

    <!-- Audio Elements -->
    <audio id="hover-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3" preload="auto"></audio>
    <audio id="click-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3" preload="auto"></audio>
    <audio id="celebration-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3" preload="auto"></audio>
</div>
<style>
    /* Base Sidebar Styling */
    .sidebar {
        width: 280px;
        background: linear-gradient(145deg, rgba(15, 12, 41, 0.9) 0%, rgba(48, 43, 99, 0.9) 50%, rgba(36, 36, 62, 0.9) 100%);
        position: fixed;
        height: 100%;
        box-shadow: 8px 0 40px rgba(0, 0, 0, 0.6);
        z-index: 1001;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        backdrop-filter: blur(12px);
        border-right: 2px solid rgba(0, 219, 222, 0.3);
        animation: borderGlow 5s infinite alternate;
    }

    .sidebar:hover {
        box-shadow: 12px 0 60px rgba(0, 0, 0, 0.9);
        transform: translateX(5px);
        border-right: 2px solid rgba(0, 219, 222, 0.8);
    }

    /* Multi-Layer Background Effects */
    .sidebar-bg-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.3)"/><circle cx="150" cy="30" r="1.5" fill="rgba(255,255,255,0.2)"/><circle cx="100" cy="150" r="2" fill="rgba(255,255,255,0.35)"/><circle cx="20" cy="180" r="1" fill="rgba(255,255,255,0.15)"/><circle cx="180" cy="100" r="1.2" fill="rgba(255,255,255,0.25)"/></svg>');
        background-size: 200px 200px;
        opacity: 0.6;
        animation: particleMove 60s linear infinite;
    }

    .sidebar-bg-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 40%, rgba(0, 219, 222, 0.3), transparent 60%);
        opacity: 0.7;
        animation: glowPulse 8s ease-in-out infinite;
    }

    .sidebar-bg-gif {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://i.gifer.com/7plQ.gif') center/cover;
        opacity: 0.1;
        mix-blend-mode: overlay;
        pointer-events: none;
        animation: gifFade 12s ease-in-out infinite;
    }

    .sidebar-bg-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(59, 130, 246, 0.15) 0%,
            rgba(0, 219, 222, 0.15) 50%,
            rgba(252, 0, 255, 0.15) 100%);
        animation: gradientShift 20s ease infinite alternate;
        mix-blend-mode: soft-light;
    }

    /* Aurora Effect */
    .sidebar:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(0, 219, 222, 0.1), rgba(252, 0, 255, 0.1), rgba(59, 130, 246, 0.1));
        opacity: 0.5;
        animation: auroraShift 15s ease infinite;
        pointer-events: none;
        z-index: -1;
    }

    /* Floating Shapes */
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.2;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }

    .shape.circle {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 3px dashed rgba(0, 219, 222, 0.7);
        top: 10%;
        left: -70px;
        animation: float 25s infinite alternate;
    }

    .shape.triangle {
        width: 0;
        height: 0;
        border-left: 100px solid transparent;
        border-right: 100px solid transparent;
        border-bottom: 170px solid rgba(252, 0, 255, 0.4);
        bottom: 8%;
        right: -50px;
        animation: float 30s infinite alternate-reverse;
    }

    .shape.square {
        width: 140px;
        height: 140px;
        background: rgba(255, 215, 0, 0.3);
        transform: rotate(45deg);
        top: 60%;
        left: -40px;
        animation: float 20s infinite alternate;
    }

    /* Menu Items Styling */
    .sidebar-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-title {
        padding: 20px 25px;
        color: rgba(255, 255, 255, 0.95);
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 4px;
        position: relative;
        text-shadow: 0 0 25px rgba(0, 180, 255, 0.7);
        font-weight: 700;
        backdrop-filter: blur(6px);
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        margin: 0 15px;
    }

    .menu-title:after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 25px;
        right: 25px;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(0, 219, 222, 0.7), transparent);
        animation: pulseLine 3s infinite;
    }

    .submenu > a {
        display: flex;
        align-items: center;
        padding: 16px 25px;
        color: rgba(255, 255, 255, 0.98);
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(6px);
        margin: 8px 15px;
        border-radius: 12px;
        z-index: 1;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transform: perspective(600px) rotateX(0deg) rotateY(0deg);
    }

    .submenu > a:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, #00dbde, #3b82f6);
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .submenu > a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
        transform: translateX(-100%);
        transition: transform 0.8s ease;
    }

    .menu-highlight {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at center, rgba(0, 219, 222, 0.4), transparent 60%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: -1;
    }

    .submenu > a:hover {
        background: rgba(59, 130, 246, 0.2);
        padding-left: 30px;
        text-shadow: 0 0 25px rgba(255, 255, 255, 1);
        transform: perspective(600px) rotateX(5deg) rotateY(-5deg);
        box-shadow: 0 8px 25px rgba(0, 219, 222, 0.5);
    }

    .submenu > a:hover:before {
        transform: scaleY(1);
    }

    .submenu > a:hover:after {
        transform: translateX(100%);
    }

    .submenu > a:hover .menu-highlight {
        opacity: 1;
    }

    .submenu > a i {
        margin-right: 15px;
        font-size: 24px;
        transition: all 0.5s ease;
        min-width: 28px;
        text-align: center;
    }

    .submenu > a:hover i {
        transform: rotate(20deg) scale(1.5);
        color: #00dbde;
        filter: drop-shadow(0 0 15px rgba(0, 219, 222, 1));
    }

    /* Active State */
    .submenu.active > a {
        background: rgba(59, 130, 246, 0.3);
        padding-left: 30px;
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.6);
        position: relative;
        overflow: hidden;
    }

    .submenu.active > a:before {
        transform: scaleY(1);
    }

    .submenu.active > a i {
        color: #00dbde;
        filter: drop-shadow(0 0 15px rgba(0, 219, 222, 1));
    }

    .submenu.active > a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(0, 219, 222, 0.2), transparent);
        animation: waveEffect 3s infinite;
    }

    /* Submenu Animation */
    .submenu ul {
        background: rgba(0, 0, 0, 0.3);
        display: none;
        animation: slideDown 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-left: 4px solid rgba(252, 0, 255, 0.5);
        margin: 0 15px 10px;
        border-radius: 0 0 12px 12px;
        overflow: hidden;
        box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .submenu.active ul {
        display: block;
    }

    .submenu ul li a {
        display: block;
        padding: 15px 25px 15px 70px;
        color: rgba(255, 255, 255, 0.95);
        text-decoration: none;
        transition: all 0.5s ease;
        position: relative;
        font-size: 15px;
        background: linear-gradient(90deg, rgba(252, 0, 255, 0.1), transparent);
    }

    .submenu ul li a:before {
        content: '';
        position: absolute;
        left: 45px;
        top: 50%;
        transform: translateY(-50%);
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(252, 0, 255, 0.7);
        transition: all 0.4s ease;
    }

    .submenu ul li a:hover {
        background: linear-gradient(90deg, rgba(252, 0, 255, 0.3), transparent);
        padding-left: 75px;
        color: #ffffff;
        text-shadow: 0 0 15px rgba(252, 0客厅255, 0.8);
    }

    .submenu ul li a:hover:before {
        background: #ff00ff;
        box-shadow: 0 0 20px #ff00ff;
        transform: translateY(-50%) scale(1.5);
    }

    /* Confetti Canvas */
    #sidebar-confetti {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    /* Emoji Rain */
    #emoji-rain {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
        z-index: -1;
    }

    .emoji {
        position: absolute;
        font-size: 30px;
        animation: emojiFall linear forwards;
        user-select: none;
        text-shadow: 0 0 15px currentColor;
        opacity: 0.9;
    }

    /* Particle Network */
    #particle-network {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    .particle-line {
        position: absolute;
        height: 1px;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0));
        transform-origin: left center;
    }

    /* Holographic Effect */
    #holographic-effect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(0, 219, 222, 0.1) 0%,
            rgba(252, 0, 255, 0.1) 50%,
            rgba(255, 105, 180, 0.1) 100%);
        opacity: 0.5;
        pointer-events: none;
        z-index: -1;
        animation: holographicPulse 18s ease infinite alternate;
    }

    /* Ripple Effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.7);
        transform: scale(0);
        animation: ripple 0.9s linear;
        pointer-events: none;
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }

    /* Sparkle Effect */
    .sparkle {
        position: absolute;
        width: 12px;
        height: 12px;
        background: radial-gradient(circle, #ffffff, #3b82f6);
        border-radius: 50%;
        animation: sparkle 0.6s ease-out;
        pointer-events: none;
        filter: blur(1.5px);
    }

    /* New Animations */
    @keyframes borderGlow {
        0% { border-right-color: rgba(0, 219, 222, 0.3); }
        50% { border-right-color: rgba(0, 219, 222, 0.8); }
        100% { border-right-color: rgba(0, 219, 222, 0.3); }
    }

    @keyframes auroraShift {
        0% { background-position: 0% 0%; filter: hue-rotate(0deg); }
        50% { background-position: 100% 100%; filter: hue-rotate(180deg); }
        100% { background-position: 0% 0%; filter: hue-rotate(360deg); }
    }

    @keyframes pulseLine {
        0% { transform: scaleX(0.8); opacity: 0.5; }
        50% { transform: scaleX(1); opacity: 1; }
        100% { transform: scaleX(0.8); opacity: 0.5; }
    }

    @keyframes waveEffect {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    @keyframes particleMove {
        0% { background-position: 0 0; }
        100% { background-position: 200px 200px; }
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 0.9; transform: scale(1.2); }
    }

    @keyframes gifFade {
        0%, 100% { opacity: 0.07; }
        50% { opacity: 0.15; }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }

    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-40px) rotate(10deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes emojiFall {
        0% { opacity: 1; transform: translateY(-100%) rotate(0deg); }
        100% { opacity: 0.2; transform: translateY(100vh) rotate(360deg); }
    }

    @keyframes emojiFall2 {
        0% { opacity: 1; transform: translateY(-100%) scale(1); }
        100% { opacity: 0; transform: translateY(100vh) scale(1.8); }
    }

    @keyframes ripple {
        to { transform: scale(6); opacity: 0; }
    }

    @keyframes sparkle {
        0% { opacity: 0; transform: scale(0); filter: blur(0); }
        50% { opacity: 1; transform: scale(1.5); filter: blur(2px); }
        100% { opacity: 0; transform: scale(0); filter: blur(0); }
    }

    @keyframes holographicPulse {
        0% { background-position: 0% 0%; filter: hue-rotate(0deg); }
        100% { background-position: 100% 100%; filter: hue-rotate(360deg); }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const confettiCanvas = document.getElementById('sidebar-confetti');
        const emojiRain = document.getElementById('emoji-rain');
        const particleNetwork = document.getElementById('particle-network');
        const emojis = ['🎉', '✨', '🌟', '💎', '🔥', '🚀', '🌈', '🎊', '💫', '☄️', '🎈', '🥳', '⚡', '🎇', '🌠'];

        // Initialize sounds with Howler
        const sounds = {
            hover: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3'], volume: 0.4 }),
            click: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3'], volume: 0.5 }),
            celebration: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3'], volume: 0.7 })
        };

        // Initialize speech synthesis
        const synth = window.speechSynthesis;
        let isSpeaking = false;

        // Initialize confetti
        confettiCanvas.width = sidebar.offsetWidth;
        confettiCanvas.height = sidebar.offsetHeight;

        // Create particle network
        createParticleNetwork();

        // Enhanced hover and click effects
        const menuItems = document.querySelectorAll('.submenu > a, .submenu ul li a');

        menuItems.forEach((item, index) => {
            // Staggered animation delay
            item.style.transitionDelay = `${index * 0.07}s`;

            // Hover effects
            item.addEventListener('mouseenter', function(e) {
                if (this.dataset.sound === 'hover') {
                    sounds.hover.play();
                }
                createSparkle(this);

                // Special celebration for important items
                if (this.textContent.match(/Dashboard|Success|Achievement|Premium/i)) {
                    triggerConfetti();
                    triggerEmojiRain();
                    sounds.celebration.play();

                    // Enhanced animation
                    gsap.to(this, {
                        scale: 1.08,
                        rotate: 3,
                        duration: 0.6,
                        yoyo: true,
                        repeat: 1,
                        ease: "elastic.out(1, 0.5)"
                    });
                }
            });

            // Click effects
            item.addEventListener('click', function(e) {
                const parentLi = this.parentElement;
                const hasSubmenu = parentLi.classList.contains('submenu') && parentLi.querySelector('ul');
                const href = this.getAttribute('href');

                // Play click sound
                if (this.dataset.sound === 'click') {
                    sounds.click.play();
                    // Check if the parent menu is "Students" and trigger speech
                    if (this.dataset on this.dataset.parentTitle === 'Students') {
                        speakMenuTitle('Student');
                    }
                }

                // Speak main menu title if available
                if (this.dataset.speak && !isSpeaking) {
                    speakMenuTitle(this.dataset.speak);
                }

                // Create ripple effect
                createRipple(e, this);

                // If the item has a submenu, toggle its visibility and prevent navigation
                if (hasSubmenu) {
                    e.preventDefault(); // Prevent navigation to allow submenu toggle
                    const isActive = parentLi.classList.contains('active');
                    // Close other open submenus
                    document.querySelectorAll('.submenu.active').forEach(submenu => {
                        if (submenu !== parentLi) {
                            submenu.classList.remove('active');
                        }
                    });
                    // Toggle current submenu
                    parentLi.classList.toggle('active', !isActive);
                } else {
                    // If no submenu, allow navigation if href is valid
                    if (href && href !== '#') {
                        // Navigation will proceed naturally via the href
                        // Optionally, you can add a smooth transition effect before navigating
                        gsap.to(this, {
                            scale: 0.95,
                            duration: 0.2,
                            onComplete: () => {
                                window.location.href = href; // Ensure navigation occurs
                            }
                        });
                    } else {
                        e.preventDefault(); // Prevent default if href is '#' or invalid
                    }
                }
            });
        });

        // Continuous background animations
        gsap.to('.sidebar-bg-particles', {
            backgroundPosition: '200px 200px',
            duration: 60,
            repeat: -1,
            ease: "none"
        });

        gsap.to('.sidebar-bg-glow', {
            scale: 1.2,
            opacity: 0.9,
            duration: 8,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Floating shapes animation
        gsap.to('.shape.circle', {
            rotation: 360,
            duration: 60,
            repeat: -1,
            ease: "none",
        });

        // Window resize handler
        window.addEventListener('resize', function() {
            confettiCanvas.width = sidebar.offsetWidth;
            confettiCanvas.height = sidebar.offsetHeight;
        });

        function createRipple(event, element) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');

            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x - size/2}px`;
            ripple.style.top = `${y - size/2}px`;

            element.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 900);
        }

        function createSparkle(element) {
            for (let i = 0; i < 3; i++) {
                const sparkle = document.createElement('span');
                sparkle.classList.add('sparkle');

                const rect = element.getBoundingClientRect();
                const x = Math.random() * rect.width;
                const y = Math.random() * rect.height;

                sparkle.style.left = `${x}px`;
                sparkle.style.top = `${y}px`;
                sparkle.style.animationDelay = `${i * 0.1}s`;

                element.appendChild(sparkle);

                setTimeout(() => {
                    sparkle.remove();
                }, 600);
            }
        }

        function speakMenuTitle(text) {
            if (synth.speaking) {
                synth.cancel();
            }

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.volume = 0.9;
            utterance.rate = 1;
            utterance.pitch = 1.1;

            isSpeaking = true;
            utterance.onend = function() {
                isSpeaking = false;
            };

            synth.speak(utterance);
        }

        function triggerConfetti() {
            const confetti = window.confetti.create(confettiCanvas, {
                resize: true,
                useWorker: true
            });

            confetti({
                particleCount: 250,
                spread: 100,
                origin: { x: Math.random(), y: 0.3 },
                colors: ['#3b82f6', '#00ddeb', '#ffcc00', '#ff4d4d', '#ffffff', '#7b2ff7'],
                shapes: ['circle', 'square', 'star', 'triangle'],
                scalar: 1,
                gravity: 0.7,
                drift: Math.random() * 2 - 1
            });

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 60,
                    spread: 65,
                    origin: { x: 0, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 300);

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 120,
                    spread: 65,
                    origin: { x: 1, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 600);
        }

        function triggerEmojiRain() {
            emojiRain.innerHTML = '';

            for (let i = 0; i < 50; i++) {
                const emoji = document.createElement('div');
                emoji.classList.add('emoji');
                emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];

                const leftPos = Math.random() * 100;
                const animationDuration = 3 + Math.random() * 6;
                const delay = Math.random() * 4;
                const fontSize = 20 + Math.random() * 30;
                const color = `hsl(${Math.random() * 360}, 100%, 75%)`;

                emoji.style.left = `${leftPos}%`;
                emoji.style.fontSize = `${fontSize}px`;
                emoji.style.color = color;
                emoji.style.animationDuration = `${animationDuration}s`;
                emoji.style.animationDelay = `${delay}s`;
                emoji.style.top = `-${fontSize}px`;

                const animationType = Math.random() > 0.5 ? 'emojiFall' : 'emojiFall2';
                emoji.style.animationName = animationType;

                emojiRain.appendChild(emoji);

                setTimeout(() => {
                    emoji.remove();
                }, (animationDuration + delay) * 1000);
            }
        }

        function createParticleNetwork() {
            const particles = [];
            const particleCount = 80;
            const maxDistance = 150;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                const size = 1 + Math.random() * 3;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                particle.style.opacity = 0.4 + Math.random() * 0.6;

                particleNetwork.appendChild(particle);

                particles.push({
                    element: particle,
                    x: Math.random() * sidebar.offsetWidth,
                    y: Math.random() * sidebar.offsetHeight,
                    vx: Math.random() * 0.5 - 0.25,
                    vy: Math.random() * 0.5 - 0.25
                });
            }

            function animateParticles() {
                document.querySelectorAll('.particle-line').forEach(line => line.remove());

                particles.forEach(particle => {
                    particle.x += particle.vx;
                    particle.y += particle.vy;

                    if (particle.x < 0 || particle.x > sidebar.offsetWidth) particle.vx *= -1;
                    if (particle.y < 0 || particle.y > sidebar.offsetHeight) particle.vy *= -1;

                    particle.element.style.left = `${particle.x}px`;
                    particle.element.style.top = `${particle.y}px`;
                });

                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const p1 = particles[i];
                        const p2 = particles[j];
                        const dx = p1.x - p2.x;
                        const dy = p1.y - p2.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < maxDistance) {
                            const line = document.createElement('div');
                            line.classList.add('particle-line');

                            line.style.left = `${p1.x}px`;
                            line.style.top = `${p1.y}px`;
                            line.style.width = `${distance}px`;
                            line.style.opacity = 1 - (distance / maxDistance);

                            const angle = Math.atan2(dy, dx);
                            line.style.transform = `rotate(${angle}rad)`;

                            particleNetwork.appendChild(line);
                        }
                    }
                }

                requestAnimationFrame(animateParticles);
            }

            animateParticles();
        }

        // Initial animations
        gsap.from('.sidebar', {
            x: -300,
            opacity: 0,
            duration: 1.2,
            ease: "power4.out"
        });

        gsap.from('.sidebar-menu li', {
            opacity: 0,
            y: 40,
            duration: 1.2,
            stagger: 0.15,
            delay: 0.5,
            ease: "back.out(2.5)"
        });

        gsap.from('.menu-title', {
            opacity: 0,
            x: -60,
            duration: 1,
            ease: "elastic.out(1, 0.5)"
        });
    });
</script> --}}

               {{-- Have Sound With Animated Sidebar Menu --}}


<div class="sidebar" id="sidebar">
    <!-- Multi-Layer Animated Background -->
    <div class="sidebar-bg-particles"></div>
    <div class="sidebar-bg-glow"></div>
    <div class="sidebar-bg-gif"></div>
    <div class="sidebar-bg-gradient"></div>

    <!-- Floating Elements -->
    <div class="floating-shapes">
        <div class="shape circle"></div>
        <div class="shape triangle"></div>
        <div class="shape square"></div>
    </div>

    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @foreach ($menus as $menu)
                    <li class="submenu {{ set_active($menu->active_routes) }}
                        {{ (isset($menu->pattern) && request()->is($menu->pattern)) ? 'active' : '' }}">
                        <a href="{{ $menu->route ? route($menu->route) : '#' }}"
                           data-sound="hover"
                           data-sound="click"
                           data-menu-title="{{ $menu->title }}"
                           data-speak="{{ $menu->title }}">
                            <i class="{{ $menu->icon }}"></i>
                            <span>{{ $menu->title }}</span>
                            @if ($menu->children->count())
                                <span class="menu-arrow"></span>
                            @endif
                            <div class="menu-highlight"></div>
                        </a>
                        @if ($menu->children->count())
                            <ul>
                                @foreach ($menu->children as $child)
                                    <li>
                                        <a href="{{ $child->route ? route($child->route) : '#' }}"
                                           class="{{ set_active($child->active_routes) }}
                                                  {{ (isset($child->pattern) && request()->is($child->pattern)) ? 'active' : '' }}"
                                           data-sound="hover"
                                           data-sound="click"
                                           data-parent-title="{{ $menu->title }}">
                                            {{ $child->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Visual Effects -->
    <canvas id="sidebar-confetti"></canvas>
    <div id="emoji-rain"></div>
    <div id="particle-network"></div>
    <div id="holographic-effect"></div>

    <!-- Audio Elements -->
    <audio id="hover-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3" preload="auto"></audio>
    <audio id="click-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3" preload="auto"></audio>
    <audio id="celebration-sound" src="https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3" preload="auto"></audio>
</div>
<style>
    /* Base Sidebar Styling */
    .sidebar {
        width: 280px;
        background: linear-gradient(145deg, rgba(15, 12, 41, 0.9) 0%, rgba(48, 43, 99, 0.9) 50%, rgba(36, 36, 62, 0.9) 100%);
        position: fixed;
        height: 100%;
        box-shadow: 8px 0 40px rgba(0, 0, 0, 0.6);
        z-index: 1001;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        backdrop-filter: blur(12px);
        border-right: 2px solid rgba(0, 219, 222, 0.3);
        animation: borderGlow 5s infinite alternate;
    }

    .sidebar:hover {
        box-shadow: 12px 0 60px rgba(0, 0, 0, 0.9);
        transform: translateX(5px);
        border-right: 2px solid rgba(0, 219, 222, 0.8);
    }

    /* Multi-Layer Background Effects */
    .sidebar-bg-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.3)"/><circle cx="150" cy="30" r="1.5" fill="rgba(255,255,255,0.2)"/><circle cx="100" cy="150" r="2" fill="rgba(255,255,255,0.35)"/><circle cx="20" cy="180" r="1" fill="rgba(255,255,255,0.15)"/><circle cx="180" cy="100" r="1.2" fill="rgba(255,255,255,0.25)"/></svg>');
        background-size: 200px 200px;
        opacity: 0.6;
        animation: particleMove 60s linear infinite;
    }

    .sidebar-bg-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 20% 40%, rgba(37, 0, 250, 0.3), transparent 60%);
        opacity: 0.7;
        animation: glowPulse 8s ease-in-out infinite;
    }

    .sidebar-bg-gif {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('https://i.gifer.com/7plQ.gif') center/cover;
        opacity: 0.1;
        mix-blend-mode: overlay;
        pointer-events: none;
        animation: gifFade 12s ease-in-out infinite;
    }

    .sidebar-bg-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(59, 130, 246, 0.15) 0%,
            rgba(0, 219, 222, 0.15) 50%,
            rgba(252, 0, 255, 0.15) 100%);
        animation: gradientShift 20s ease infinite alternate;
        mix-blend-mode: soft-light;
    }

    /* Aurora Effect */
    .sidebar:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(0, 219, 222, 0.1), rgba(252, 0, 255, 0.1), rgba(59, 130, 246, 0.1));
        opacity: 0.5;
        animation: auroraShift 15s ease infinite;
        pointer-events: none;
        z-index: -1;
    }

    /* Floating Shapes */
    .floating-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .shape {
        position: absolute;
        opacity: 0.2;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.5));
    }

    .shape.circle {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 3px dashed rgba(0, 219, 222, 0.7);
        top: 10%;
        left: -70px;
        animation: float 25s infinite alternate;
    }

    .shape.triangle {
        width: 0;
        height: 0;
        border-left: 100px solid transparent;
        border-right: 100px solid transparent;
        border-bottom: 170px solid rgba(252, 0, 255, 0.4);
        bottom: 8%;
        right: -50px;
        animation: float 30s infinite alternate-reverse;
    }

    .shape.square {
        width: 140px;
        height: 140px;
        background: rgba(255, 215, 0, 0.3);
        transform: rotate(45deg);
        top: 60%;
        left: -40px;
        animation: float 20s infinite alternate;
    }

    /* Menu Items Styling */
    .sidebar-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-title {
        padding: 20px 25px;
        color: rgba(255, 255, 255, 0.95);
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 4px;
        position: relative;
        text-shadow: 0 0 25px rgba(0, 180, 255, 0.7);
        font-weight: 700;
        backdrop-filter: blur(6px);
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        margin: 0 15px;
    }

    .menu-title:after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 25px;
        right: 25px;
        height: 2px;
        background: linear-gradient(90deg, transparent, rgba(0, 219, 222, 0.7), transparent);
        animation: pulseLine 3s infinite;
    }

    .submenu > a {
        display: flex;
        align-items: center;
        padding: 16px 25px;
        color: rgba(255, 255, 255, 0.98);
        text-decoration: none;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(6px);
        margin: 8px 15px;
        border-radius: 12px;
        z-index: 1;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transform: perspective(600px) rotateX(0deg) rotateY(0deg);
    }

    .submenu > a:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(to bottom, #00dbde, #3b82f6);
        transform: scaleY(0);
        transform-origin: bottom;
        transition: transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .submenu > a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
        transform: translateX(-100%);
        transition: transform 0.8s ease;
    }

    .menu-highlight {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at center, rgba(0, 219, 222, 0.4), transparent 60%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: -1;
    }

    .submenu > a:hover {
        background: rgba(59, 130, 246, 0.2);
        padding-left: 30px;
        text-shadow: 0 0 25px rgba(255, 255, 255, 1);
        transform: perspective(600px) rotateX(5deg) rotateY(-5deg);
        box-shadow: 0 8px 25px rgba(0, 219, 222, 0.5);
    }

    .submenu > a:hover:before {
        transform: scaleY(1);
    }

    .submenu > a:hover:after {
        transform: translateX(100%);
    }

    .submenu > a:hover .menu-highlight {
        opacity: 1;
    }

    .submenu > a i {
        margin-right: 15px;
        font-size: 24px;
        transition: all 0.5s ease;
        min-width: 28px;
        text-align: center;
    }

    .submenu > a:hover i {
        transform: rotate(20deg) scale(1.5);
        color: #00dbde;
        filter: drop-shadow(0 0 15px rgba(0, 219, 222, 1));
    }

    /* Active State */
    .submenu.active > a {
        background: rgba(59, 130, 246, 0.3);
        padding-left: 30px;
        box-shadow: 0 0 30px rgba(59, 130, 246, 0.6);
        position: relative;
        overflow: hidden;
    }

    .submenu.active > a:before {
        transform: scaleY(1);
    }

    .submenu.active > a i {
        color: #00dbde;
        filter: drop-shadow(0 0 15px rgba(0, 219, 222, 1));
    }

    .submenu.active > a:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(0, 219, 222, 0.2), transparent);
        animation: waveEffect 3s infinite;
    }

    /* Submenu Animation */
    .submenu ul {
        background: rgba(0, 0, 0, 0.3);
        display: none;
        animation: slideDown 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-left: 4px solid rgba(252, 0, 255, 0.5);
        margin: 0 15px 10px;
        border-radius: 0 0 12px 12px;
        overflow: hidden;
        box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .submenu.active ul {
        display: block;
    }

    .submenu ul li a {
        display: block;
        padding: 15px 25px 15px 70px;
        color: rgba(240, 0, 0, 0.95);
        text-decoration: none;
        transition: all 0.5s ease;
        position: relative;
        font-size: 15px;
        background: linear-gradient(90deg, rgba(252, 0, 255, 0.1), transparent);
    }

    .submenu ul li a:before {
        content: '';
        position: absolute;
        left: 45px;
        top: 50%;
        transform: translateY(-50%);
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(252, 0, 255, 0.7);
        transition: all 0.4s ease;
    }

    .submenu ul li a:hover {
        background: linear-gradient(90deg, rgba(252, 0, 255, 0.3), transparent);
        padding-left: 75px;
        color: #ffffff;
        text-shadow: 0 0 15px rgba(252, 0, 255, 0.8);
    }

    .submenu ul li a:hover:before {
        background: #ff00ff;
        box-shadow: 0 0 20px #ff00ff;
        transform: translateY(-50%) scale(1.5);
    }

    /* Confetti Canvas */
    #sidebar-confetti {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    /* Emoji Rain */
    #emoji-rain {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
        z-index: -1;
    }

    .emoji {
        position: absolute;
        font-size: 30px;
        animation: emojiFall linear forwards;
        user-select: none;
        text-shadow: 0 0 15px currentColor;
        opacity: 0.9;
    }

    /* Particle Network */
    #particle-network {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }

    .particle-line {
        position: absolute;
        height: 1px;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0));
        transform-origin: left center;
    }

    /* Holographic Effect */
    #holographic-effect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg,
            rgba(0, 219, 222, 0.1) 0%,
            rgba(252, 0, 255, 0.1) 50%,
            rgba(255, 105, 180, 0.1) 100%);
        opacity: 0.5;
        pointer-events: none;
        z-index: -1;
        animation: holographicPulse 18s ease infinite alternate;
    }

    /* Ripple Effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(59, 130, 246, 0.7);
        transform: scale(0);
        animation: ripple 0.9s linear;
        pointer-events: none;
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }

    /* Sparkle Effect */
    .sparkle {
        position: absolute;
        width: 12px;
        height: 12px;
        background: radial-gradient(circle, #ffffff, #3b82f6);
        border-radius: 50%;
        animation: sparkle 0.6s ease-out;
        pointer-events: none;
        filter: blur(1.5px);
    }

    /* New Animations */
    @keyframes borderGlow {
        0% { border-right-color: rgba(0, 219, 222, 0.3); }
        50% { border-right-color: rgba(0, 219, 222, 0.8); }
        100% { border-right-color: rgba(0, 219, 222, 0.3); }
    }

    @keyframes auroraShift {
        0% { background-position: 0% 0%; filter: hue-rotate(0deg); }
        50% { background-position: 100% 100%; filter: hue-rotate(180deg); }
        100% { background-position: 0% 0%; filter: hue-rotate(360deg); }
    }

    @keyframes pulseLine {
        0% { transform: scaleX(0.8); opacity: 0.5; }
        50% { transform: scaleX(1); opacity: 1; }
        100% { transform: scaleX(0.8); opacity: 0.5; }
    }

    @keyframes waveEffect {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    @keyframes particleMove {
        0% { background-position: 0 0; }
        100% { background-position: 200px 200px; }
    }

    @keyframes glowPulse {
        0%, 100% { opacity: 0.5; transform: scale(1); }
        50% { opacity: 0.9; transform: scale(1.2); }
    }

    @keyframes gifFade {
        0%, 100% { opacity: 0.07; }
        50% { opacity: 0.15; }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 0%; }
        100% { background-position: 100% 100%; }
    }

    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-40px) rotate(10deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes emojiFall {
        0% { opacity: 1; transform: translateY(-100%) rotate(0deg); }
        100% { opacity: 0.2; transform: translateY(100vh) rotate(360deg); }
    }

    @keyframes emojiFall2 {
        0% { opacity: 1; transform: translateY(-100%) scale(1); }
        100% { opacity: 0; transform: translateY(100vh) scale(1.8); }
    }

    @keyframes ripple {
        to { transform: scale(6); opacity: 0; }
    }

    @keyframes sparkle {
        0% { opacity: 0; transform: scale(0); filter: blur(0); }
        50% { opacity: 1; transform: scale(1.5); filter: blur(2px); }
        100% { opacity: 0; transform: scale(0); filter: blur(0); }
    }

    @keyframes holographicPulse {
        0% { background-position: 0% 0%; filter: hue-rotate(0deg); }
        100% { background-position: 100% 100%; filter: hue-rotate(360deg); }
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const confettiCanvas = document.getElementById('sidebar-confetti');
        const emojiRain = document.getElementById('emoji-rain');
        const particleNetwork = document.getElementById('particle-network');
        const emojis = ['🎉', '✨', '🌟', '💎', '🔥', '🚀', '🌈', '🎊', '💫', '☄️', '🎈', '🥳', '⚡', '🎇', '🌠'];

        // Initialize sounds with Howler
        const sounds = {
            hover: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-hover-click-notification-911.mp3'], volume: 0.4 }),
            click: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-positive-interface-beep-221.mp3'], volume: 0.5 }),
            celebration: new Howl({ src: ['https://assets.mixkit.co/sfx/preview/mixkit-achievement-bell-600.mp3'], volume: 0.7 })
        };

        // Initialize speech synthesis
        const synth = window.speechSynthesis;
        let isSpeaking = false;

        // Initialize confetti
        confettiCanvas.width = sidebar.offsetWidth;
        confettiCanvas.height = sidebar.offsetHeight;

        // Create particle network
        createParticleNetwork();

        // Enhanced hover and click effects
        const menuItems = document.querySelectorAll('.submenu > a, .submenu ul li a');

        menuItems.forEach((item, index) => {
            // Staggered animation delay
            item.style.transitionDelay = `${index * 0.07}s`;

            // Hover effects
            item.addEventListener('mouseenter', function(e) {
                sounds.hover.play(); // Play hover sound for all menu items
                createSparkle(this);

                // Special celebration for important items
                if (this.textContent.match(/Dashboard|Success|Achievement|Premium/i)) {
                    triggerConfetti();
                    triggerEmojiRain();
                    sounds.celebration.play();

                    // Enhanced animation
                    gsap.to(this, {
                        scale: 1.08,
                        rotate: 3,
                        duration: 0.6,
                        yoyo: true,
                        repeat: 1,
                        ease: "elastic.out(1, 0.5)"
                    });
                }
            });

            // Click effects
            item.addEventListener('click', function(e) {
                const parentLi = this.parentElement;
                const hasSubmenu = parentLi.classList.contains('submenu') && parentLi.querySelector('ul');
                const href = this.getAttribute('href');

                // Play click sound for all menu items
                sounds.click.play();

                // Speak main menu title if available
                if (this.dataset.speak && !isSpeaking) {
                    speakMenuTitle(this.dataset.speak);
                }

                // Create ripple effect
                createRipple(e, this);

                // If the item has a submenu, toggle its visibility and prevent navigation
                if (hasSubmenu) {
                    e.preventDefault(); // Prevent navigation to allow submenu toggle
                    const isActive = parentLi.classList.contains('active');
                    // Close other open submenus
                    document.querySelectorAll('.submenu.active').forEach(submenu => {
                        if (submenu !== parentLi) {
                            submenu.classList.remove('active');
                        }
                    });
                    // Toggle current submenu
                    parentLi.classList.toggle('active', !isActive);
                } else {
                    // If no submenu, allow navigation if href is valid
                    if (href && href !== '#') {
                        // Navigation will proceed naturally via the href
                        // Optionally, add a smooth transition effect before navigating
                        gsap.to(this, {
                            scale: 0.95,
                            duration: 0.2,
                            onComplete: () => {
                                window.location.href = href; // Ensure navigation occurs
                            }
                        });
                    } else {
                        e.preventDefault(); // Prevent default if href is '#' or invalid
                    }
                }
            });
        });

        // Continuous background animations
        gsap.to('.sidebar-bg-particles', {
            backgroundPosition: '200px 200px',
            duration: 60,
            repeat: -1,
            ease: "none"
        });

        gsap.to('.sidebar-bg-glow', {
            scale: 1.2,
            opacity: 0.9,
            duration: 8,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut"
        });

        // Floating shapes animation
        gsap.to('.shape.circle', {
            rotation: 360,
            duration: 60,
            repeat: -1,
            ease: "none",
        });

        // Window resize handler
        window.addEventListener('resize', function() {
            confettiCanvas.width = sidebar.offsetWidth;
            confettiCanvas.height = sidebar.offsetHeight;
        });

        function createRipple(event, element) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');

            const rect = element.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${x - size/2}px`;
            ripple.style.top = `${y - size/2}px`;

            element.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 900);
        }

        function createSparkle(element) {
            for (let i = 0; i < 3; i++) {
                const sparkle = document.createElement('span');
                sparkle.classList.add('sparkle');

                const rect = element.getBoundingClientRect();
                const x = Math.random() * rect.width;
                const y = Math.random() * rect.height;

                sparkle.style.left = `${x}px`;
                sparkle.style.top = `${y}px`;
                sparkle.style.animationDelay = `${i * 0.1}s`;

                element.appendChild(sparkle);

                setTimeout(() => {
                    sparkle.remove();
                }, 600);
            }
        }

        function speakMenuTitle(text) {
            if (synth.speaking) {
                synth.cancel();
            }

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.volume = 0.9;
            utterance.rate = 1;
            utterance.pitch = 1.1;

            isSpeaking = true;
            utterance.onend = function() {
                isSpeaking = false;
            };

            synth.speak(utterance);
        }

        function triggerConfetti() {
            const confetti = window.confetti.create(confettiCanvas, {
                resize: true,
                useWorker: true
            });

            confetti({
                particleCount: 250,
                spread: 100,
                origin: { x: Math.random(), y: 0.3 },
                colors: ['#3b82f6', '#00ddeb', '#ffcc00', '#ff4d4d', '#ffffff', '#7b2ff7'],
                shapes: ['circle', 'square', 'star', 'triangle'],
                scalar: 1,
                gravity: 0.7,
                drift: Math.random() * 2 - 1
            });

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 60,
                    spread: 65,
                    origin: { x: 0, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 300);

            setTimeout(() => {
                confetti({
                    particleCount: 150,
                    angle: 120,
                    spread: 65,
                    origin: { x: 1, y: 0.6 },
                    colors: ['#00ddeb', '#3b82f6']
                });
            }, 600);
        }

        function triggerEmojiRain() {
            emojiRain.innerHTML = '';

            for (let i = 0; i < 50; i++) {
                const emoji = document.createElement('div');
                emoji.classList.add('emoji');
                emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];

                const leftPos = Math.random() * 100;
                const animationDuration = 3 + Math.random() * 6;
                const delay = Math.random() * 4;
                const fontSize = 20 + Math.random() * 30;
                const color = `hsl(${Math.random() * 360}, 100%, 75%)`;

                emoji.style.left = `${leftPos}%`;
                emoji.style.fontSize = `${fontSize}px`;
                emoji.style.color = color;
                emoji.style.animationDuration = `${animationDuration}s`;
                emoji.style.animationDelay = `${delay}s`;
                emoji.style.top = `-${fontSize}px`;

                const animationType = Math.random() > 0.5 ? 'emojiFall' : 'emojiFall2';
                emoji.style.animationName = animationType;

                emojiRain.appendChild(emoji);

                setTimeout(() => {
                    emoji.remove();
                }, (animationDuration + delay) * 1000);
            }
        }

        function createParticleNetwork() {
            const particles = [];
            const particleCount = 80;
            const maxDistance = 150;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');

                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;

                const size = 1 + Math.random() * 3;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;

                particle.style.opacity = 0.4 + Math.random() * 0.6;

                particleNetwork.appendChild(particle);

                particles.push({
                    element: particle,
                    x: Math.random() * sidebar.offsetWidth,
                    y: Math.random() * sidebar.offsetHeight,
                    vx: Math.random() * 0.5 - 0.25,
                    vy: Math.random() * 0.5 - 0.25
                });
            }

            function animateParticles() {
                document.querySelectorAll('.particle-line').forEach(line => line.remove());

                particles.forEach(particle => {
                    particle.x += particle.vx;
                    particle.y += particle.vy;

                    if (particle.x < 0 || particle.x > sidebar.offsetWidth) particle.vx *= -1;
                    if (particle.y < 0 || particle.y > sidebar.offsetHeight) particle.vy *= -1;

                    particle.element.style.left = `${particle.x}px`;
                    particle.element.style.top = `${particle.y}px`;
                });

                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const p1 = particles[i];
                        const p2 = particles[j];
                        const dx = p1.x - p2.x;
                        const dy = p1.y - p2.y;
                        const distance = Math.sqrt(dx * dx + dy * dy);

                        if (distance < maxDistance) {
                            const line = document.createElement('div');
                            line.classList.add('particle-line');

                            line.style.left = `${p1.x}px`;
                            line.style.top = `${p1.y}px`;
                            line.style.width = `${distance}px`;
                            line.style.opacity = 1 - (distance / maxDistance);

                            const angle = Math.atan2(dy, dx);
                            line.style.transform = `rotate(${angle}rad)`;

                            particleNetwork.appendChild(line);
                        }
                    }
                }

                requestAnimationFrame(animateParticles);
            }

            animateParticles();
        }

        // Initial animations
        gsap.from('.sidebar', {
            x: -300,
            opacity: 0,
            duration: 1.2,
            ease: "power4.out"
        });

        gsap.from('.sidebar-menu li', {
            opacity: 0,
            y: 40,
            duration: 1.2,
            stagger: 0.15,
            delay: 0.5,
            ease: "back.out(2.5)"
        });

        gsap.from('.menu-title', {
            opacity: 0,
            x: -60,
            duration: 1,
            ease: "elastic.out(1, 0.5)"
        });
    });
</script>


