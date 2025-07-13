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
</script>
@endpush