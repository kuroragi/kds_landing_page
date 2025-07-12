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
</script>

@stack('scripts')