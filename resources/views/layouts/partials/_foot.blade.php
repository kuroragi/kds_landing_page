<script>
    // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle.querySelector('i');
        let isDark = false;

        themeToggle.addEventListener('click', () => {
            isDark = !isDark;
            document.documentElement.setAttribute('data-theme', isDark ? 'dark' : 'light');
            themeIcon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        });

        // Language Selector
        const languageBtn = document.getElementById('languageBtn');
        const languageDropdown = document.getElementById('languageDropdown');
        const currentLang = document.getElementById('currentLang');

        languageBtn.addEventListener('click', () => {
            languageDropdown.classList.toggle('show');
        });

        languageDropdown.addEventListener('click', (e) => {
            if (e.target.dataset.lang) {
                currentLang.textContent = e.target.dataset.lang.toUpperCase();
                languageDropdown.classList.remove('show');
            }
        });

        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const navMenu = document.getElementById('navMenu');
        const mobileIcon = mobileMenuToggle.querySelector('i');

        mobileMenuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileIcon.className = navMenu.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
        });

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
        // const observerOptions = {
        //     threshold: 0.1,
        //     rootMargin: '0px 0px -50px 0px'
        // };

        // const observer = new IntersectionObserver((entries) => {
        //     entries.forEach(entry => {
        //         if (entry.isIntersecting) {
        //             entry.target.style.animationPlayState = 'running';
        //         }
        //     });
        // }, observerOptions);

        // // Observe about section elements
        // document.addEventListener('DOMContentLoaded', () => {
        //     const aboutElements = document.querySelectorAll('.about-text, .feature-item');
        //     aboutElements.forEach(element => {
        //         element.style.animationPlayState = 'paused';
        //         observer.observe(element);
        //     });
        // });

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

@stack('scripts')