<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuroragi Digital Studio</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4fc3f7;
            --primary-blue-dark: #29b6f6;
            --primary-blue-light: #81d4fa;
            --bg-dark: #0a0e1a;
            --bg-dark-secondary: #1a1d2e;
            --bg-light: #ffffff;
            --bg-light-secondary: #f8fafc;
            --text-dark: #ffffff;
            --text-dark-secondary: #b0b8d4;
            --text-light: #1a202c;
            --text-light-secondary: #4a5568;
            --glass-dark: rgba(26, 29, 46, 0.8);
            --glass-light: rgba(255, 255, 255, 0.8);
            --tech-accent: #00ff88;
            --shadow-color: rgba(79, 195, 247, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            scroll-behavior: smooth;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            opacity: 0.03;
            background-image:
                radial-gradient(circle at 25% 25%, var(--primary-blue) 1px, transparent 1px),
                radial-gradient(circle at 75% 75%, var(--primary-blue) 1px, transparent 1px);
            background-size: 50px 50px;
            background-position: 0 0, 25px 25px;
        }

        body.dark-mode {
            background: var(--bg-dark);
            color: var(--text-dark);
        }

        body.light-mode {
            background: var(--bg-light);
            color: var(--text-light);
        }

        .tech-font {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Remove all scroll snap */
        .scroll-container {
            overflow-y: auto;
            height: auto;
        }

        .snap-section {
            min-height: 100vh;
        }

        .no-snap {
            /* Remove no-snap class functionality */
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 80px;
            z-index: 1000;
            backdrop-filter: blur(20px);
            transition: transform 0.3s ease, background 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .dark-mode .navbar {
            background: var(--glass-dark);
        }

        .light-mode .navbar {
            background: var(--glass-light);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .navbar.hidden {
            transform: translateY(-100%);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-logo {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .dark-mode .nav-logo {
            background: var(--primary-blue);
            color: white;
            box-shadow: 0 0 20px var(--shadow-color);
        }

        .light-mode .nav-logo {
            background: var(--primary-blue-light);
            color: var(--text-light);
            box-shadow: 0 0 20px rgba(79, 195, 247, 0.3);
        }

        .nav-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        .dark-mode .nav-link {
            color: var(--text-dark-secondary);
        }

        .light-mode .nav-link {
            color: var(--text-light-secondary);
        }

        .nav-link:hover {
            color: var(--primary-blue);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-blue);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-controls {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .theme-toggle,
        .lang-toggle {
            background: none;
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dark-mode .theme-toggle,
        .dark-mode .lang-toggle {
            color: var(--text-dark-secondary);
            background: rgba(255, 255, 255, 0.1);
        }

        .light-mode .theme-toggle,
        .light-mode .lang-toggle {
            color: var(--text-light-secondary);
            background: rgba(0, 0, 0, 0.1);
        }

        .theme-toggle:hover,
        .lang-toggle:hover {
            transform: scale(1.1);
            color: var(--primary-blue);
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
        }

        .dark-mode .hero-background {
            background:
                linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-dark-secondary) 100%),
                radial-gradient(circle at 20% 80%, rgba(79, 195, 247, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 255, 136, 0.05) 0%, transparent 50%);
        }

        .light-mode .hero-background {
            background:
                linear-gradient(135deg, var(--bg-light) 0%, var(--bg-light-secondary) 100%),
                radial-gradient(circle at 20% 80%, rgba(79, 195, 247, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(79, 195, 247, 0.05) 0%, transparent 50%);
        }

        .hero-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            z-index: -1;
        }

        .dark-mode .hero-gradient {
            background: linear-gradient(transparent, var(--bg-dark));
        }

        .light-mode .hero-gradient {
            background: linear-gradient(transparent, var(--bg-light));
        }

        .hero-slider {
            width: 100%;
            height: 100%;
            position: relative;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 1s ease;
            padding: 2rem;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            z-index: 10;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, var(--primary-blue), var(--tech-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.8;
            margin-bottom: 2rem;
            animation: slideUp 1s ease-out 0.2s both;
        }

        .hero-terminal {
            background: var(--bg-dark-secondary);
            border-radius: 12px;
            padding: 1.5rem;
            margin: 2rem 0;
            border: 1px solid rgba(79, 195, 247, 0.2);
            box-shadow: 0 10px 40px var(--shadow-color);
            max-width: 500px;
        }

        .terminal-header {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .terminal-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .terminal-dot.red {
            background: #ff5f56;
        }

        .terminal-dot.yellow {
            background: #ffbd2e;
        }

        .terminal-dot.green {
            background: #27ca3f;
        }

        .terminal-content {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
            color: var(--tech-accent);
        }

        .terminal-line {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .terminal-prompt {
            color: var(--primary-blue);
            margin-right: 0.5rem;
        }

        .cursor {
            background: var(--tech-accent);
            width: 8px;
            height: 16px;
            display: inline-block;
            animation: blink 1s infinite;
        }

        @keyframes blink {

            0%,
            50% {
                opacity: 1;
            }

            51%,
            100% {
                opacity: 0;
            }
        }

        .hero-cta {
            display: inline-flex;
            gap: 1rem;
            animation: slideUp 1s ease-out 0.4s both;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-blue);
            color: white;
            box-shadow: 0 8px 25px var(--shadow-color);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px var(--shadow-color);
            background: var(--primary-blue-dark);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-secondary:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--shadow-color);
        }

        .hero-video {
            width: 100%;
            max-width: 600px;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        /* Services Section */
        .section {
            padding: 6rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }

        .section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100px;
            background: linear-gradient(to bottom, transparent, var(--primary-blue), transparent);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.5s ease-in-out;
        }

        .section-title.animate {
            transform: translateY(0);
            opacity: 1;
        }

        .section-quote {
            text-align: center;
            font-size: 1rem;
            opacity: 0.7;
            margin-bottom: 4rem;
            transform: translateY(30px);
            opacity: 0;
            transition: all 0.5s ease-in-out 0.2s;
            font-family: 'JetBrains Mono', monospace;
            color: var(--primary-blue);
        }

        .section-quote.animate {
            transform: translateY(0);
            opacity: 0.8;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: .5rem;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.5s ease-in-out 0.4s;
        }

        .services-grid.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .service-card {
            height: 400px;
            perspective: 1000px;
            cursor: pointer;
        }

        .service-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .service-card:hover .service-card-inner {
            transform: rotateY(180deg);
        }

        .service-card-front,
        .service-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 16px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-card-front,
        .service-card:hover .service-card-back {
            box-shadow: 0 20px 60px var(--shadow-color);
        }

        .dark-mode .service-card-front,
        .dark-mode .service-card-back {
            background: var(--bg-dark-secondary);
            border: 1px solid rgba(79, 195, 247, 0.2);
            backdrop-filter: blur(10px);
        }

        .light-mode .service-card-front,
        .light-mode .service-card-back {
            background: var(--bg-light-secondary);
            border: 1px solid rgba(79, 195, 247, 0.3);
            backdrop-filter: blur(10px);
        }

        .service-card-back {
            transform: rotateY(180deg);
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-dark));
            color: white;
            border: none;
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-blue);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1);
        }

        .service-card-back .service-icon {
            color: white;
        }

        .service-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .service-description {
            opacity: 0.8;
            line-height: 1.6;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 20px var(--shadow-color);
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px var(--shadow-color);
            background: var(--primary-blue-dark);
        }

        .footer {
            padding: 6rem 2rem 2rem;
            border-top: 1px solid rgba(79, 195, 247, 0.2);
            margin-top: 4rem;
            min-height: 400px;
            position: relative;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary-blue), transparent);
        }

        .dark-mode .footer {
            background: var(--bg-dark-secondary);
        }

        .light-mode .footer {
            background: var(--bg-light-secondary);
            border-top: 1px solid rgba(79, 195, 247, 0.3);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            margin-bottom: 1.5rem;
            color: var(--primary-blue);
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            text-decoration: none;
            opacity: 0.8;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dark-mode .footer-links a {
            color: var(--text-dark-secondary);
        }

        .light-mode .footer-links a {
            color: var(--text-light-secondary);
        }

        .footer-links a:hover {
            opacity: 1;
            color: var(--primary-blue);
            transform: translateX(5px);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dark-mode .social-icon {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-dark-secondary);
        }

        .light-mode .social-icon {
            background: rgba(0, 0, 0, 0.1);
            color: var(--text-light-secondary);
        }

        .social-icon:hover {
            background: var(--primary-blue);
            color: white;
            transform: translateY(-2px) scale(1.1);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(79, 195, 247, 0.2);
            opacity: 0.6;
        }

        .light-mode .footer-bottom {
            border-top: 1px solid rgba(79, 195, 247, 0.3);
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
        }
    </style>
</head>

<body class="dark-mode">
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <div class="nav-logo">K</div>
                <span class="nav-title">Kuroragi Digital Studio</span>
            </div>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#services" class="nav-link">Services</a></li>
                <li><a href="#portfolio" class="nav-link">Portfolio</a></li>
                <li><a href="#blog" class="nav-link">Blog</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <div class="nav-controls">
                <button class="theme-toggle" id="themeToggle">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="lang-toggle">
                    <i class="fas fa-globe"></i>
                </button>
            </div>
        </div>
    </nav>

    @include('main-example-3')

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        const themeIcon = themeToggle.querySelector('i');

        themeToggle.addEventListener('click', () => {
            if (body.classList.contains('dark-mode')) {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                themeIcon.className = 'fas fa-sun';
            } else {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                themeIcon.className = 'fas fa-moon';
            }
        });

        // Navbar Hide/Show on Scroll
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop;

            // Back to Top Button
            const backToTop = document.getElementById('backToTop');
            if (scrollTop > 500) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        // Back to Top Button
        document.getElementById('backToTop').addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Hero Slider
        const slides = document.querySelectorAll('.hero-slide');
        const videos = document.querySelectorAll('.hero-slide video');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function startSlideshow() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopSlideshow() {
            clearInterval(slideInterval);
        }

        // Pause slider when video plays
        videos.forEach(video => {
            video.addEventListener('play', stopSlideshow);
            video.addEventListener('pause', startSlideshow);
            video.addEventListener('ended', startSlideshow);
        });

        startSlideshow();

        // Intersection Observer for Animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    target.classList.add('animate');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.section-title, .section-quote, .services-grid').forEach(el => {
            observer.observe(el);
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = 80;
                    const targetPosition = target.offsetTop - navbarHeight;
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add subtle particle animation (optional enhancement)
        function createParticles() {
            const hero = document.querySelector('.hero');
            const particleCount = 50;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.width = '2px';
                particle.style.height = '2px';
                particle.style.background = 'rgba(74, 124, 154, 0.3)';
                particle.style.borderRadius = '50%';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animation = `float ${3 + Math.random() * 4}s ease-in-out infinite`;
                particle.style.animationDelay = Math.random() * 2 + 's';
                hero.appendChild(particle);
            }
        }

        // Add floating animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0.3; }
                25% { transform: translateY(-20px) translateX(10px); opacity: 0.7; }
                50% { transform: translateY(-10px) translateX(-5px); opacity: 0.5; }
                75% { transform: translateY(-30px) translateX(15px); opacity: 0.8; }
            }
        `;
        document.head.appendChild(style);

        // Initialize particles
        createParticles();

        // Service card hover sound effect (optional)
        document.querySelectorAll('.service-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                // Add subtle scale animation
                card.style.transform = 'scale(1.02)';
                card.style.transition = 'transform 0.3s ease';
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'scale(1)';
            });
        });

        // Enhanced scroll behavior for better UX
        let ticking = false;

        function updateScrollEffects() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            // Parallax effect for hero background
            const heroBackground = document.querySelector('.hero-background');
            if (heroBackground) {
                heroBackground.style.transform = `translate3d(0, ${rate}px, 0)`;
            }
            
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateScrollEffects);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick);

        // Initialize AOS-like animations on load
        window.addEventListener('load', () => {
            // Add loaded class for any additional animations
            document.body.classList.add('loaded');
            
            // Stagger animation for service cards
            const serviceCards = document.querySelectorAll('.service-card');
            serviceCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.style.animation = 'slideUp 0.8s ease-out forwards';
            });
        });

        // Mobile menu toggle (for responsive design)
        const mobileMenuToggle = document.createElement('button');
        mobileMenuToggle.className = 'mobile-menu-toggle';
        mobileMenuToggle.innerHTML = '<i class="fas fa-bars"></i>';
        mobileMenuToggle.style.display = 'none';
        
        // Add mobile styles
        const mobileStyles = document.createElement('style');
        mobileStyles.textContent = `
            @media (max-width: 768px) {
                .mobile-menu-toggle {
                    display: block !important;
                    background: none;
                    border: none;
                    color: inherit;
                    font-size: 1.2rem;
                    cursor: pointer;
                    padding: 0.5rem;
                }
                
                .nav-menu {
                    position: fixed;
                    top: 80px;
                    left: 0;
                    width: 100%;
                    background: var(--glass-dark);
                    backdrop-filter: blur(20px);
                    flex-direction: column;
                    padding: 2rem;
                    transform: translateX(-100%);
                    transition: transform 0.3s ease;
                }
                
                .light-mode .nav-menu {
                    background: var(--glass-light);
                }
                
                .nav-menu.active {
                    display: flex;
                    transform: translateX(0);
                }
                
                .nav-menu li {
                    margin: 0.5rem 0;
                }
            }
        `;
        document.head.appendChild(mobileStyles);
        
        // Add mobile menu to navbar
        document.querySelector('.nav-controls').prepend(mobileMenuToggle);
        
        mobileMenuToggle.addEventListener('click', () => {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.classList.toggle('active');
            
            const icon = mobileMenuToggle.querySelector('i');
            icon.className = navMenu.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navMenu = document.querySelector('.nav-menu');
                navMenu.classList.remove('active');
                
                const icon = mobileMenuToggle.querySelector('i');
                icon.className = 'fas fa-bars';
            });
        });

        // Enhanced button interactions
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
            
            btn.addEventListener('mousedown', function() {
                this.style.transform = 'translateY(0) scale(0.98)';
            });
            
            btn.addEventListener('mouseup', function() {
                this.style.transform = 'translateY(-2px) scale(1.02)';
            });
        });

        // Preload next hero slide images for smooth transitions
        function preloadImages() {
            const imageUrls = [
                'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600"%3E%3Cdefs%3E%3ClinearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%"%3E%3Cstop offset="0%" style="stop-color:%234a7c9a;stop-opacity:0.8" /%3E%3Cstop offset="100%" style="stop-color:%23a8c8e1;stop-opacity:0.6" /%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width="800" height="600" fill="url(%23bg)"/%3E%3C/svg%3E'
            ];
            
            imageUrls.forEach(url => {
                const img = new Image();
                img.src = url;
            });
        }

        preloadImages();
    </script>
</body>

</html>