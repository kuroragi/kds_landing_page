@extends('layouts.main')

@section('content')
<!-- Hero Carousel -->
<section class="hero-section" id="home">
    <div class="carousel-container">
        <div class="carousel-slide active hero-bg-1">
            <div class="slide-content">
                <h1>Solusi IT Terdepan untuk Masa Depan Digital</h1>
                <p>Kami menghadirkan inovasi teknologi terkini untuk mengoptimalkan bisnis Anda menuju era digital yang
                    lebih maju dan efisien.</p>
                <a href="#services" class="cta-button">Jelajahi Layanan Kami</a>
            </div>
        </div>

        <div class="carousel-slide hero-bg-2">
            <div class="slide-content">
                <h1>Transformasi Digital yang Menginspirasi</h1>
                <p>Dengan pengalaman bertahun-tahun, kami membantu perusahaan mencapai potensi maksimal melalui solusi
                    teknologi yang inovatif dan berkelanjutan.</p>
                <a href="#about" class="cta-button">Pelajari Lebih Lanjut</a>
            </div>
        </div>

        <div class="carousel-slide hero-bg-3">
            <div class="slide-content">
                <h1>Partner Terpercaya untuk Pertumbuhan Bisnis</h1>
                <p>Bergabunglah dengan ratusan klien yang telah merasakan dampak positif dari implementasi solusi IT
                    kami yang telah terbukti efektif.</p>
                <a href="#contact" class="cta-button">Hubungi Kami</a>
            </div>
        </div>
    </div>

    <button class="carousel-nav prev" onclick="changeSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="carousel-nav next" onclick="changeSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </button>

    <div class="carousel-indicators">
        <span class="indicator active" onclick="currentSlide(1)"></span>
        <span class="indicator" onclick="currentSlide(2)"></span>
        <span class="indicator" onclick="currentSlide(3)"></span>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section" id="about">
    <div class="about-container">
        <div class="about-content">
            <div class="about-text">
                <h2 class="about-title">Siapa Kami?</h2>
                <p class="about-description">
                    TechnoVision adalah perusahaan teknologi informasi terdepan yang berkomitmen untuk menghadirkan
                    solusi digital inovatif bagi bisnis modern. Dengan pengalaman lebih dari 10 tahun, kami membantu
                    perusahaan dari berbagai industri mencapai transformasi digital yang berkelanjutan dan efektif.
                </p>
                <p class="about-description">
                    Filosofi kerja kami adalah mengutamakan kualitas, inovasi, dan kepuasan klien. Setiap proyek yang
                    kami tangani didukung oleh tim ahli yang berpengalaman dan teknologi terdepan untuk memastikan hasil
                    yang optimal dan sesuai dengan kebutuhan bisnis Anda.
                </p>

                <div class="about-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Inovasi</h3>
                            <p>Selalu menghadirkan solusi teknologi terbaru dan terdepan untuk mengoptimalkan efisiensi
                                bisnis Anda.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Keamanan</h3>
                            <p>Mengutamakan keamanan data dan sistem dengan standar internasional dan protokol keamanan
                                berlapis.</p>
                        </div>
                    </div>

                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="feature-content">
                            <h3>Profesionalisme</h3>
                            <p>Berkomitmen memberikan layanan terbaik dengan pendekatan profesional dan
                                customer-centric.</p>
                        </div>
                    </div>
                </div>

                <a href="#services" class="about-cta">
                    Pelajari Lebih Lanjut
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="about-visual">
                <div class="visual-container">
                    <div class="visual-bg">
                        <div class="floating-element element-1"></div>
                        <div class="floating-element element-2"></div>
                        <div class="floating-element element-3"></div>
                        <div class="floating-element element-4"></div>
                    </div>
                    <div class="visual-content">
                        <div class="tech-illustration">
                            <div class="server-rack">
                                <div class="server-unit"></div>
                                <div class="server-unit"></div>
                                <div class="server-unit"></div>
                            </div>
                            <div class="network-nodes">
                                <div class="node node-1"></div>
                                <div class="node node-2"></div>
                                <div class="node node-3"></div>
                                <div class="connection-line line-1"></div>
                                <div class="connection-line line-2"></div>
                                <div class="connection-line line-3"></div>
                            </div>
                            <div class="data-flow">
                                <div class="data-particle"></div>
                                <div class="data-particle"></div>
                                <div class="data-particle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Solusi IT Kami</h2>
            <p class="section-description">
                Kami menyediakan solusi teknologi terdepan untuk mengakselerasi transformasi digital bisnis Anda dengan
                inovasi terpercaya.
            </p>
        </div>

        <div class="services-grid">
            <div class="service-card" data-delay="0.2">
                <div class="service-icon">💻</div>
                <h3 class="service-title">Web Development</h3>
                <p class="service-description">
                    Membangun website modern, responsif, dan berkinerja tinggi dengan teknologi terkini untuk
                    meningkatkan presence digital Anda.
                </p>
            </div>

            <div class="service-card" data-delay="0.4">
                <div class="service-icon">📱</div>
                <h3 class="service-title">Mobile App Development</h3>
                <p class="service-description">
                    Mengembangkan aplikasi mobile native dan cross-platform yang user-friendly untuk iOS dan Android.
                </p>
            </div>

            <div class="service-card" data-delay="0.6">
                <div class="service-icon">☁️</div>
                <h3 class="service-title">Cloud Solutions</h3>
                <p class="service-description">
                    Migrasi dan pengelolaan infrastruktur cloud yang aman, scalable, dan cost-effective untuk bisnis
                    Anda.
                </p>
            </div>

            <div class="service-card" data-delay="0.8">
                <div class="service-icon">🔧</div>
                <h3 class="service-title">IT Consulting</h3>
                <p class="service-description">
                    Konsultasi strategis untuk optimasi sistem IT, digital transformation, dan perencanaan teknologi
                    bisnis.
                </p>
            </div>

            <div class="service-card" data-delay="1.0">
                <div class="service-icon">🛡️</div>
                <h3 class="service-title">Cybersecurity</h3>
                <p class="service-description">
                    Perlindungan komprehensif terhadap ancaman cyber dengan sistem keamanan berlapis dan monitoring
                    24/7.
                </p>
            </div>

            <div class="service-card" data-delay="1.2">
                <div class="service-icon">📊</div>
                <h3 class="service-title">Data Analytics</h3>
                <p class="service-description">
                    Transformasi data menjadi insights bisnis yang actionable dengan teknologi AI dan machine learning.
                </p>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="#" class="cta-button">Lihat Semua Layanan</a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Carousel Functionality
        let currentSlideIndex = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.indicator');
        const totalSlides = slides.length;

        function showSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            indicators.forEach(indicator => indicator.classList.remove('active'));
            
            slides[index].classList.add('active');
            indicators[index].classList.add('active');
        }

        function changeSlide(direction) {
            currentSlideIndex += direction;
            if (currentSlideIndex >= totalSlides) currentSlideIndex = 0;
            if (currentSlideIndex < 0) currentSlideIndex = totalSlides - 1;
            showSlide(currentSlideIndex);
        }

        function currentSlide(index) {
            currentSlideIndex = index - 1;
            showSlide(currentSlideIndex);
        }

        // Auto-slide every 5 seconds
        setInterval(() => {
            changeSlide(1);
        }, 5000);

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.language-selector')) {
                languageDropdown.classList.remove('show');
            }
        });

        // Intersection Observer for About Section Animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        // Observe about section elements
        document.addEventListener('DOMContentLoaded', () => {
            const aboutElements = document.querySelectorAll('.about-text, .about-visual, .feature-item');
            aboutElements.forEach(element => {
                element.style.animationPlayState = 'paused';
                observer.observe(element);
            });
        });

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => {
                        entry.target.classList.add('animate-card');
                    }, delay * 1000);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const ctaObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-cta');
                    ctaObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.service-card');
            const cta = document.querySelector('.cta-button');
            
            cards.forEach(card => {
                observer.observe(card);
            });
            
            if (cta) {
                ctaObserver.observe(cta);
            }
        });


        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    navMenu.classList.remove('active');
                    mobileIcon.className = 'fas fa-bars';
                }
            });
        });

        
</script>
@endpush