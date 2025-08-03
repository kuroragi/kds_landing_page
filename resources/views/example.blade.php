<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuroragi Digital Studio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            /* Dark Mode Colors (Default) */
            --primary-color: #4FC3F7;
            --bg-color: #0D1117;
            --text-color: #E0E0E0;
            --accent-color: #00E5FF;
            --card-bg: rgba(255, 255, 255, 0.05);
            --glass-bg: rgba(13, 17, 23, 0.8);
            --border-color: rgba(79, 195, 247, 0.2);
        }

        [data-theme="light"] {
            --primary-color: #42A5F5;
            --bg-color: #F9FAFB;
            --text-color: #333333;
            --accent-color: #1976D2;
            --card-bg: rgba(255, 255, 255, 0.8);
            --glass-bg: rgba(249, 250, 251, 0.8);
            --border-color: rgba(66, 165, 245, 0.2);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            scroll-behavior: smooth;
            scroll-snap-type: y mandatory;
            overflow-x: hidden;
            transition: all 0.3s ease;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1rem 2rem;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .navbar.hidden {
            transform: translateY(-100%);
            opacity: 0;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .theme-toggle,
        .lang-toggle {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 1rem;
        }

        .theme-toggle:hover,
        .lang-toggle:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            scroll-snap-align: start;
        }

        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background: linear-gradient(135deg, var(--bg-color), var(--primary-color));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-content {
            text-align: center;
            z-index: 2;
            max-width: 800px;
            padding: 2rem;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .cta-button {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(79, 195, 247, 0.3);
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .hero-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.3;
        }

        .hero-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(transparent, var(--bg-color));
            z-index: 2;
        }

        /* Services Section */
        .services {
            min-height: 100vh;
            padding: 6rem 2rem 4rem;
            scroll-snap-align: start;
            display: flex;
            align-items: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .section-quote {
            text-align: center;
            font-size: 1.2rem;
            font-style: italic;
            color: var(--primary-color);
            margin-bottom: 1rem;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .section-title {
            font-size: 3rem;
            text-align: center;
            margin-bottom: 3rem;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.2s;
        }

        .section-intro {
            text-align: center;
            font-size: 1.1rem;
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease 0.4s;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .service-card {
            height: 300px;
            perspective: 1000px;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .service-card:nth-child(1) {
            transition-delay: 0.6s;
        }

        .service-card:nth-child(2) {
            transition-delay: 0.8s;
        }

        .service-card:nth-child(3) {
            transition-delay: 1s;
        }

        .service-card:nth-child(4) {
            transition-delay: 1.2s;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .service-card:hover .card-inner {
            transform: rotateY(180deg) scale(1.05);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 20px;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-color);
        }

        .card-back {
            transform: rotateY(180deg);
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .service-name {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .service-description {
            opacity: 0.8;
            line-height: 1.6;
        }

        .service-button {
            background: white;
            color: var(--primary-color);
            border: none;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .service-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        .footer {
            background: var(--bg-color);
            padding: 4rem 2rem 2rem;
            border-top: 1px solid var(--border-color);
            scroll-snap-align: start;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .footer-section p {
            line-height: 1.6;
            opacity: 0.8;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.5rem;
        }

        .footer-links a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .footer-bottom {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-bottom a {
            color: var(--text-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom a:hover {
            color: var(--primary-color);
        }

        /* Scroll to Top Button */
        .scroll-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .scroll-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .scroll-top:hover {
            background: var(--accent-color);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .navbar {
                padding: 1rem;
            }

            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .services {
                padding: 4rem 1rem 2rem;
            }

            .hero-content {
                padding: 1rem;
            }

            .service-card {
                height: 250px;
            }

            .card-front,
            .card-back {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body data-theme="dark">
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-content">
            <a href="#" class="logo">Kuroragi Digital Studio</a>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link" data-en="Home" data-id="Beranda">Home</a></li>
                <li><a href="#about" class="nav-link" data-en="About" data-id="Tentang">About</a></li>
                <li><a href="#services" class="nav-link" data-en="Service" data-id="Layanan">Service</a></li>
                <li><a href="#portfolio" class="nav-link" data-en="Portfolio" data-id="Portofolio">Portfolio</a></li>
                <li><a href="#blog" class="nav-link" data-en="Blog" data-id="Blog">Blog</a></li>
                <li><a href="#contact" class="nav-link" data-en="Contact" data-id="Kontak">Contact</a></li>
                <li>
                    <button class="theme-toggle" id="themeToggle">🌙</button>
                    <button class="lang-toggle" id="langToggle">EN</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-slide active">
            <div class="hero-content">
                <h1 class="hero-title" data-en="Digital Innovation Awaits" data-id="Inovasi Digital Menanti">Digital
                    Innovation Awaits</h1>
                <p class="hero-subtitle"
                    data-en="We craft exceptional digital experiences that drive your business forward"
                    data-id="Kami menciptakan pengalaman digital luar biasa yang mendorong bisnis Anda maju">We craft
                    exceptional digital experiences that drive your business forward</p>
                <a href="#services" class="cta-button" data-en="Explore Our Services"
                    data-id="Jelajahi Layanan Kami">Explore Our Services</a>
            </div>
        </div>

        <div class="hero-slide">
            <div class="video-container">
                <video class="hero-video" autoplay muted loop>
                    <source src="https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4" type="video/mp4">
                </video>
            </div>
            <div class="hero-content">
                <h1 class="hero-title" data-en="Future-Ready Solutions" data-id="Solusi Siap Masa Depan">Future-Ready
                    Solutions</h1>
                <p class="hero-subtitle" data-en="Building tomorrow's technology today"
                    data-id="Membangun teknologi masa depan hari ini">Building tomorrow's technology today</p>
                <a href="#contact" class="cta-button" data-en="Start Your Project" data-id="Mulai Proyek Anda">Start
                    Your Project</a>
            </div>
        </div>

        <div class="hero-slide">
            <div class="hero-content">
                <h1 class="hero-title" data-en="Creative Excellence" data-id="Keunggulan Kreatif">Creative Excellence
                </h1>
                <p class="hero-subtitle" data-en="Where creativity meets cutting-edge technology"
                    data-id="Di mana kreativitas bertemu teknologi canggih">Where creativity meets cutting-edge
                    technology</p>
                <a href="#portfolio" class="cta-button" data-en="View Our Work" data-id="Lihat Karya Kami">View Our
                    Work</a>
            </div>
        </div>

        <div class="hero-overlay"></div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <p class="section-quote" data-en="We build future-ready digital solutions"
                data-id="Kami membangun solusi digital siap masa depan">"We build future-ready digital solutions"</p>
            <h2 class="section-title" data-en="Our Services" data-id="Layanan Kami">Our Services</h2>
            <p class="section-intro"
                data-en="Transforming ideas into powerful digital experiences with cutting-edge technology and innovative design solutions."
                data-id="Mengubah ide menjadi pengalaman digital yang powerful dengan teknologi canggih dan solusi desain inovatif.">
                Transforming ideas into powerful digital experiences with cutting-edge technology and innovative design
                solutions.</p>

            <div class="services-grid">
                <div class="service-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="service-icon">💻</div>
                            <h3 class="service-name" data-en="Fullstack Development" data-id="Pengembangan Fullstack">
                                Fullstack Development</h3>
                            <p class="service-description"
                                data-en="End-to-end web applications with modern frameworks and scalable architecture."
                                data-id="Aplikasi web end-to-end dengan framework modern dan arsitektur scalable.">
                                End-to-end web applications with modern frameworks and scalable architecture.</p>
                        </div>
                        <div class="card-back">
                            <h3 class="service-name">Fullstack Development</h3>
                            <p style="margin-bottom: 2rem;">React, Node.js, Python, Cloud Infrastructure</p>
                            <button class="service-button" data-en="View More" data-id="Lihat Lebih">View More</button>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="service-icon">🎨</div>
                            <h3 class="service-name" data-en="UI/UX Design" data-id="Desain UI/UX">UI/UX Design</h3>
                            <p class="service-description"
                                data-en="User-centered design that combines aesthetics with exceptional functionality."
                                data-id="Desain yang berpusat pada pengguna yang menggabungkan estetika dengan fungsionalitas luar biasa.">
                                User-centered design that combines aesthetics with exceptional functionality.</p>
                        </div>
                        <div class="card-back">
                            <h3 class="service-name">UI/UX Design</h3>
                            <p style="margin-bottom: 2rem;">Figma, Adobe Creative Suite, Prototyping</p>
                            <button class="service-button" data-en="View More" data-id="Lihat Lebih">View More</button>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="service-icon">⚙️</div>
                            <h3 class="service-name" data-en="System Integration" data-id="Integrasi Sistem">System
                                Integration</h3>
                            <p class="service-description"
                                data-en="Seamless integration of existing systems with new digital solutions."
                                data-id="Integrasi seamless sistem yang ada dengan solusi digital baru.">Seamless
                                integration of existing systems with new digital solutions.</p>
                        </div>
                        <div class="card-back">
                            <h3 class="service-name">System Integration</h3>
                            <p style="margin-bottom: 2rem;">API Development, Database Migration, Cloud Services</p>
                            <button class="service-button" data-en="View More" data-id="Lihat Lebih">View More</button>
                        </div>
                    </div>
                </div>

                <div class="service-card">
                    <div class="card-inner">
                        <div class="card-front">
                            <div class="service-icon">💡</div>
                            <h3 class="service-name" data-en="Digital Consultation" data-id="Konsultasi Digital">Digital
                                Consultation</h3>
                            <p class="service-description"
                                data-en="Strategic guidance to help you navigate the digital transformation journey."
                                data-id="Panduan strategis untuk membantu Anda menavigasi perjalanan transformasi digital.">
                                Strategic guidance to help you navigate the digital transformation journey.</p>
                        </div>
                        <div class="card-back">
                            <h3 class="service-name">Digital Consultation</h3>
                            <p style="margin-bottom: 2rem;">Strategy Planning, Technology Assessment, Digital Roadmap
                            </p>
                            <button class="service-button" data-en="View More" data-id="Lihat Lebih">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 data-en="About Kuroragi Digital Studio" data-id="Tentang Kuroragi Digital Studio">About Kuroragi
                    Digital Studio</h3>
                <p data-en="We are a forward-thinking digital studio dedicated to creating innovative solutions that drive business growth and deliver exceptional user experiences."
                    data-id="Kami adalah studio digital yang berpikiran maju yang didedikasikan untuk menciptakan solusi inovatif yang mendorong pertumbuhan bisnis dan memberikan pengalaman pengguna yang luar biasa.">
                    We are a forward-thinking digital studio dedicated to creating innovative solutions that drive
                    business growth and deliver exceptional user experiences.</p>
            </div>

            <div class="footer-section">
                <h3 data-en="Quick Links" data-id="Tautan Cepat">Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#home" data-en="Home" data-id="Beranda">Home</a></li>
                    <li><a href="#services" data-en="Services" data-id="Layanan">Services</a></li>
                    <li><a href="#portfolio" data-en="Portfolio" data-id="Portofolio">Portfolio</a></li>
                    <li><a href="#contact" data-en="Contact" data-id="Kontak">Contact</a></li>
                    <li><a href="#blog" data-en="Blog" data-id="Blog">Blog</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3 data-en="Connect With Us" data-id="Terhubung Dengan Kami">Connect With Us</h3>
                <div class="social-icons">
                    <a href="mailto:hello@kuroragi.com" class="social-icon">✉️</a>
                    <a href="https://linkedin.com/company/kuroragi" class="social-icon">🔗</a>
                    <a href="https://twitter.com/kuroragi" class="social-icon">🐦</a>
                    <a href="https://instagram.com/kuroragi" class="social-icon">📷</a>
                    <a href="https://youtube.com/kuroragi" class="social-icon">📺</a>
                    <a href="https://wa.me/62123456789" class="social-icon">📱</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p data-en="© 2025 Kuroragi Digital Studio. All rights reserved."
                data-id="© 2025 Kuroragi Digital Studio. Semua hak dilindungi.">© 2025 Kuroragi Digital Studio. All
                rights reserved.</p>
            <div>
                <a href="#" data-en="Terms and Conditions" data-id="Syarat dan Ketentuan">Terms and Conditions</a>
                <span style="margin: 0 1rem;">|</span>
                <a href="#" data-en="Privacy Policy" data-id="Kebijakan Privasi">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">↑</button>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const body = document.body;
        
        themeToggle.addEventListener('click', () => {
            const currentTheme = body.getAttribute('data-theme');
            if (currentTheme === 'dark') {
                body.setAttribute('data-theme', 'light');
                themeToggle.textContent = '☀️';
            } else {
                body.setAttribute('data-theme', 'dark');
                themeToggle.textContent = '🌙';
            }
        });
        
        // Language Toggle
        const langToggle = document.getElementById('langToggle');
        let currentLang = 'en';
        
        langToggle.addEventListener('click', () => {
            currentLang = currentLang === 'en' ? 'id' : 'en';
            langToggle.textContent = currentLang.toUpperCase();
            
            // Update all elements with language attributes
            const elements = document.querySelectorAll('[data-en][data-id]');
            elements.forEach(element => {
                if (currentLang === 'en') {
                    element.textContent = element.getAttribute('data-en');
                } else {
                    element.textContent = element.getAttribute('data-id');
                }
            });
        });
        
        // Navbar Hide/Show on Scroll
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');
        
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Scrolling down
                navbar.classList.add('hidden');
            } else {
                // Scrolling up
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop;
            
            // Show/hide scroll to top button
            const scrollTopBtn = document.getElementById('scrollTop');
            if (scrollTop > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });
        
        // Hero Slideshow
        const slides = document.querySelectorAll('.hero-slide');
        const heroVideo = document.querySelector('.hero-video');
        let currentSlide = 0;
        let slideInterval;
        let isPaused = false;
        
        function nextSlide() {
            if (isPaused) return;
            
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }
        
        function startSlideshow() {
            slideInterval = setInterval(nextSlide, 5000);
        }
        
        function pauseSlideshow() {
            clearInterval(slideInterval);
            isPaused = true;
        }
        
        function resumeSlideshow() {
            isPaused = false;
            startSlideshow();
        }
        
        // Start slideshow
        startSlideshow();
        
        // Pause slideshow when video plays
        if (heroVideo) {
            heroVideo.addEventListener('play', pauseSlideshow);
            heroVideo.addEventListener('pause', resumeSlideshow);
            heroVideo.addEventListener('ended', resumeSlideshow);
        }
        
        // Scroll to Top Button
        document.getElementById('scrollTop').addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Smooth Scrolling for Navigation Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const navbarHeight = navbar.offsetHeight;
                    const targetPosition = target.offsetTop - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Intersection Observer for Animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('services')) {
                        // Animate services section elements
                        const elementsToAnimate = entry.target.querySelectorAll(
                            '.section-quote, .section-title, .section-intro, .service-card'
                        );
                        elementsToAnimate.forEach(el => {
                            el.classList.add('animate-in');
                        });
                    }
                }
            });
        }, observerOptions);
        
        // Observe sections for animations
        document.querySelectorAll('.services').forEach(section => {
            observer.observe(section);
        });
        
        // Service Card Click Handlers
        document.querySelectorAll('.service-button').forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                const serviceName = e.target.closest('.service-card').querySelector('.service-name').textContent;
                alert(`Learn more about ${serviceName}!\n\nThis would typically navigate to a detailed service page or open a contact form.`);
            });
        });
        
        // Enhanced Mobile Menu Toggle (for smaller screens)
        function createMobileMenu() {
            if (window.innerWidth <= 768) {
                const navMenu = document.querySelector('.nav-menu');
                const navbar = document.querySelector('.navbar-content');
                
                // Create hamburger button if it doesn't exist
                if (!document.querySelector('.mobile-menu-toggle')) {
                    const mobileToggle = document.createElement('button');
                    mobileToggle.className = 'mobile-menu-toggle';
                    mobileToggle.innerHTML = '☰';
                    mobileToggle.style.cssText = `
                        background: none;
                        border: none;
                        color: var(--text-color);
                        font-size: 1.5rem;
                        cursor: pointer;
                        display: block;
                    `;
                    
                    // Insert before nav-menu
                    navbar.insertBefore(mobileToggle, navMenu);
                    
                    // Toggle menu visibility
                    mobileToggle.addEventListener('click', () => {
                        navMenu.style.display = navMenu.style.display === 'none' ? 'flex' : 'none';
                        mobileToggle.innerHTML = navMenu.style.display === 'none' ? '☰' : '✕';
                    });
                    
                    // Initially hide menu on mobile
                    navMenu.style.display = 'none';
                }
            } else {
                // Remove mobile menu toggle on desktop
                const mobileToggle = document.querySelector('.mobile-menu-toggle');
                const navMenu = document.querySelector('.nav-menu');
                if (mobileToggle) {
                    mobileToggle.remove();
                    navMenu.style.display = 'flex';
                }
            }
        }
        
        // Initialize mobile menu
        createMobileMenu();
        
        // Re-check on window resize
        window.addEventListener('resize', createMobileMenu);
        
        // Add loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });
        
        // Enhanced scroll snap behavior
        function handleScrollSnap() {
            const sections = document.querySelectorAll('.hero, .services, .footer');
            let isScrolling = false;
            
            window.addEventListener('wheel', (e) => {
                if (isScrolling) return;
                
                const currentSection = getCurrentSection();
                const direction = e.deltaY > 0 ? 1 : -1;
                const nextSectionIndex = Math.max(0, Math.min(sections.length - 1, currentSection + direction));
                
                if (nextSectionIndex !== currentSection) {
                    isScrolling = true;
                    const targetSection = sections[nextSectionIndex];
                    const navbarHeight = navbar.offsetHeight;
                    
                    window.scrollTo({
                        top: targetSection.offsetTop - navbarHeight,
                        behavior: 'smooth'
                    });
                    
                    setTimeout(() => {
                        isScrolling = false;
                    }, 1000);
                }
            }, { passive: true });
            
            function getCurrentSection() {
                const scrollPos = window.scrollY + navbar.offsetHeight + 100;
                
                for (let i = sections.length - 1; i >= 0; i--) {
                    if (scrollPos >= sections[i].offsetTop) {
                        return i;
                    }
                }
                return 0;
            }
        }
        
        // Initialize scroll snap on desktop only
        if (window.innerWidth > 768) {
            handleScrollSnap();
        }
        
        // Add particle background effect (optional enhancement)
        function createParticles() {
            const hero = document.querySelector('.hero');
            const particlesContainer = document.createElement('div');
            particlesContainer.className = 'particles';
            particlesContainer.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: 1;
            `;
            
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.style.cssText = `
                    position: absolute;
                    width: 2px;
                    height: 2px;
                    background: var(--primary-color);
                    border-radius: 50%;
                    opacity: 0.3;
                    animation: float ${Math.random() * 10 + 5}s infinite linear;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                `;
                particlesContainer.appendChild(particle);
            }
            
            hero.appendChild(particlesContainer);
        }
        
        // Add CSS for particle animation
        const particleStyle = document.createElement('style');
        particleStyle.textContent = `
            @keyframes float {
                0% { transform: translateY(0px) rotate(0deg); opacity: 0; }
                50% { opacity: 0.3; }
                100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
            }
        `;
        document.head.appendChild(particleStyle);
        
        // Create particles effect
        createParticles();
        
        // Performance optimization: Throttle scroll events
        function throttle(func, delay) {
            let timeoutId;
            let lastExecTime = 0;
            return function (...args) {
                const currentTime = Date.now();
                
                if (currentTime - lastExecTime > delay) {
                    func.apply(this, args);
                    lastExecTime = currentTime;
                } else {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(() => {
                        func.apply(this, args);
                        lastExecTime = Date.now();
                    }, delay - (currentTime - lastExecTime));
                }
            };
        }
        
        // Apply throttling to scroll events
        const throttledScroll = throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop;
            
            const scrollTopBtn = document.getElementById('scrollTop');
            if (scrollTop > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        }, 100);
        
        // Replace the original scroll event listener with throttled version
        window.removeEventListener('scroll', () => {});
        window.addEventListener('scroll', throttledScroll);
    </script>
</body>

</html>