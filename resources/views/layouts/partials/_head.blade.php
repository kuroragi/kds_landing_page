<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
    :root {
        --primary: #2C3E50;
        --secondary: #2980B9;
        --accent: #27AE60;
        --background: #F9FAFB;
        --surface: #FFFFFF;
        --text-primary: #2C3E50;
        --text-secondary: #7F8C8D;
        --shadow: rgba(44, 62, 80, 0.1);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-theme="dark"] {
        --primary: #3498DB;
        --secondary: #9B59B6;
        --accent: #1ABC9C;
        --background: #1E1E2F;
        --surface: #2C2C3B;
        --text-primary: #ECEFF4;
        --text-secondary: #A0A5B8;
        --shadow: rgba(0, 0, 0, 0.3);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        background-color: var(--background);
        color: var(--text-primary);
        line-height: 1.6;
        transition: var(--transition);
    }

    /* Header Styles */
    .header {
        background: var(--surface);
        box-shadow: 0 2px 20px var(--shadow);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .header-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 70px;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 24px;
        font-weight: 700;
        color: var(--primary);
        text-decoration: none;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        gap: 40px;
        align-items: center;
    }

    .nav-menu a {
        color: var(--text-primary);
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
        position: relative;
    }

    .nav-menu a:hover {
        color: var(--primary);
    }

    .nav-menu a::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--primary);
        transition: var(--transition);
    }

    .nav-menu a:hover::after {
        width: 100%;
    }

    .header-controls {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .theme-toggle {
        background: none;
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 8px 12px;
        border-radius: 25px;
        cursor: pointer;
        transition: var(--transition);
        font-size: 14px;
    }

    .theme-toggle:hover {
        background: var(--primary);
        color: white;
    }

    .language-selector {
        position: relative;
    }

    .language-btn {
        background: none;
        border: none;
        color: var(--text-primary);
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 6px;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .language-btn:hover {
        background: var(--primary);
        color: white;
    }

    .language-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        background: var(--surface);
        border-radius: 8px;
        box-shadow: 0 10px 30px var(--shadow);
        min-width: 80px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: var(--transition);
    }

    .language-dropdown.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .language-dropdown a {
        display: block;
        padding: 10px 15px;
        color: var(--text-primary);
        text-decoration: none;
        transition: var(--transition);
    }

    .language-dropdown a:hover {
        background: var(--primary);
        color: white;
    }

    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        color: var(--text-primary);
        font-size: 24px;
        cursor: pointer;
    }

    /* Hero Carousel Styles */
    .hero-section {
        margin-top: 70px;
        position: relative;
        height: calc(100vh - 70px);
        overflow: hidden;
    }

    .carousel-container {
        position: relative;
        height: 100%;
        width: 100%;
    }

    .carousel-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
    }

    .carousel-slide.active {
        opacity: 1;
    }

    .carousel-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .slide-content {
        text-align: center;
        color: white;
        z-index: 2;
        max-width: 800px;
        padding: 0 20px;
    }

    .slide-content h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        line-height: 1.2;
        animation: slideInUp 1s ease-out;
    }

    .slide-content p {
        font-size: 1.3rem;
        margin-bottom: 40px;
        font-weight: 300;
        animation: slideInUp 1s ease-out 0.2s both;
    }

    .cta-button {
        display: inline-block;
        background: var(--accent);
        color: white;
        padding: 15px 40px;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: var(--transition);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        animation: slideInUp 1s ease-out 0.4s both;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    }

    .carousel-indicators {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 3;
    }

    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: var(--transition);
    }

    .indicator.active {
        background: white;
        transform: scale(1.2);
    }

    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 24px;
        padding: 15px 20px;
        cursor: pointer;
        transition: var(--transition);
        z-index: 3;
        border-radius: 50%;
    }

    .carousel-nav:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .carousel-nav.prev {
        left: 30px;
    }

    .carousel-nav.next {
        right: 30px;
    }

    .hero-bg-1 {
        background: linear-gradient(135deg, var(--primary), var(--secondary)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="tech-pattern" patternUnits="userSpaceOnUse" width="50" height="50"><circle cx="25" cy="25" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="1200" height="600" fill="url(%23tech-pattern)"/></svg>');
        background-size: cover;
        background-position: center;
    }

    .hero-bg-2 {
        background: linear-gradient(135deg, var(--secondary), var(--accent)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="circuit-pattern" patternUnits="userSpaceOnUse" width="100" height="100"><path d="M0 50h50v50h50v-50h50v50h-50v50h-50v-50h-50z" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="1200" height="600" fill="url(%23circuit-pattern)"/></svg>');
        background-size: cover;
        background-position: center;
    }

    .hero-bg-3 {
        background: linear-gradient(135deg, var(--accent), var(--primary)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><defs><pattern id="grid-pattern" patternUnits="userSpaceOnUse" width="60" height="60"><rect width="60" height="60" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="1200" height="600" fill="url(%23grid-pattern)"/></svg>');
        background-size: cover;
        background-position: center;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .nav-menu {
            position: fixed;
            top: 70px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 70px);
            background: var(--surface);
            flex-direction: column;
            justify-content: flex-start;
            padding-top: 50px;
            transition: var(--transition);
            box-shadow: 0 2px 20px var(--shadow);
        }

        .nav-menu.active {
            left: 0;
        }

        .mobile-menu-toggle {
            display: block;
        }

        .header-controls {
            gap: 10px;
        }

        .slide-content h1 {
            font-size: 2.5rem;
        }

        .slide-content p {
            font-size: 1.1rem;
        }

        .carousel-nav {
            display: none;
        }

        .carousel-indicators {
            bottom: 20px;
        }
    }

    @media (max-width: 480px) {
        .header-container {
            padding: 0 15px;
        }

        .slide-content h1 {
            font-size: 2rem;
        }

        .slide-content p {
            font-size: 1rem;
        }

        .cta-button {
            padding: 12px 30px;
            font-size: 1rem;
        }
    }

    /* About Us Section Styles */
    .about-section {
        padding: 100px 0;
        background: var(--background);
        position: relative;
        overflow: hidden;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
    }

    .about-text {
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease-out forwards;
    }

    .about-title {
        font-size: 3rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 30px;
        position: relative;
    }

    .about-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    .about-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-secondary);
        margin-bottom: 25px;
    }

    .about-features {
        margin: 50px 0;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 35px;
        opacity: 0;
        transform: translateX(-30px);
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .feature-item:nth-child(1) {
        animation-delay: 0.2s;
    }

    .feature-item:nth-child(2) {
        animation-delay: 0.4s;
    }

    .feature-item:nth-child(3) {
        animation-delay: 0.6s;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        flex-shrink: 0;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: var(--transition);
    }

    .feature-icon:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .feature-content h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-primary);
        margin-bottom: 8px;
    }

    .feature-content p {
        color: var(--text-secondary);
        line-height: 1.6;
    }

    .about-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: var(--accent);
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: var(--transition);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .about-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .about-cta i {
        transition: var(--transition);
    }

    .about-cta:hover i {
        transform: translateX(5px);
    }

    .about-visual {
        opacity: 0;
        transform: translateY(50px);
        animation: fadeInUp 1s ease-out 0.3s forwards;
    }

    .visual-container {
        position: relative;
        width: 100%;
        height: 500px;
        background: var(--surface);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px var(--shadow);
    }

    .visual-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        opacity: 0.1;
    }

    .floating-element {
        position: absolute;
        background: var(--accent);
        border-radius: 50%;
        opacity: 0.2;
        animation: float 6s ease-in-out infinite;
    }

    .element-1 {
        width: 60px;
        height: 60px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .element-2 {
        width: 40px;
        height: 40px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
    }

    .element-3 {
        width: 80px;
        height: 80px;
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .element-4 {
        width: 50px;
        height: 50px;
        top: 40%;
        right: 30%;
        animation-delay: 1s;
    }

    .visual-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    }

    .tech-illustration {
        position: relative;
        width: 300px;
        height: 300px;
    }

    .server-rack {
        position: absolute;
        left: 50px;
        top: 50px;
        width: 60px;
        height: 120px;
        background: var(--primary);
        border-radius: 8px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    }

    .server-unit {
        width: 50px;
        height: 15px;
        background: var(--accent);
        margin: 8px 5px;
        border-radius: 3px;
        position: relative;
    }

    .server-unit::after {
        content: '';
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        background: #2ecc71;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }

    .network-nodes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .node {
        position: absolute;
        width: 30px;
        height: 30px;
        background: var(--secondary);
        border-radius: 50%;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.2);
        animation: pulse 3s infinite;
    }

    .node-1 {
        top: 30px;
        right: 60px;
        animation-delay: 0s;
    }

    .node-2 {
        bottom: 80px;
        right: 30px;
        animation-delay: 1s;
    }

    .node-3 {
        bottom: 30px;
        left: 150px;
        animation-delay: 2s;
    }

    .connection-line {
        position: absolute;
        height: 2px;
        background: var(--accent);
        opacity: 0.6;
        animation: dataFlow 4s linear infinite;
    }

    .line-1 {
        top: 60px;
        left: 110px;
        width: 80px;
        transform: rotate(20deg);
    }

    .line-2 {
        bottom: 95px;
        right: 60px;
        width: 60px;
        transform: rotate(-45deg);
    }

    .line-3 {
        bottom: 45px;
        left: 110px;
        width: 70px;
        transform: rotate(15deg);
    }

    .data-flow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .data-particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: var(--accent);
        border-radius: 50%;
        animation: moveParticle 5s linear infinite;
    }

    .data-particle:nth-child(1) {
        top: 50px;
        left: 110px;
        animation-delay: 0s;
    }

    .data-particle:nth-child(2) {
        bottom: 90px;
        right: 50px;
        animation-delay: 1.5s;
    }

    .data-particle:nth-child(3) {
        bottom: 40px;
        left: 120px;
        animation-delay: 3s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.8;
        }
    }

    @keyframes dataFlow {
        0% {
            opacity: 0;
            transform: scaleX(0);
        }

        50% {
            opacity: 1;
            transform: scaleX(1);
        }

        100% {
            opacity: 0;
            transform: scaleX(0);
        }
    }

    @keyframes moveParticle {
        0% {
            opacity: 0;
            transform: translateX(0);
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateX(100px);
        }
    }

    /* Responsive Design for About Section */
    @media (max-width: 768px) {
        .about-content {
            grid-template-columns: 1fr;
            gap: 50px;
        }

        .about-title {
            font-size: 2.5rem;
        }

        .about-description {
            font-size: 1rem;
        }

        .feature-item {
            gap: 15px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }

        .visual-container {
            height: 400px;
        }

        .tech-illustration {
            width: 250px;
            height: 250px;
        }

        .about-section {
            padding: 80px 0;
        }
    }

    @media (max-width: 480px) {
        .about-title {
            font-size: 2rem;
        }

        .about-section {
            padding: 60px 0;
        }

        .about-container {
            padding: 0 15px;
        }

        .visual-container {
            height: 300px;
        }

        .tech-illustration {
            width: 200px;
            height: 200px;
        }

        .about-cta {
            padding: 12px 25px;
            font-size: 0.95rem;
        }
    }

    .services-section {
        padding: 80px 0;
        background-color: var(--background);
        position: relative;
        overflow: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 16px;
        position: relative;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        border-radius: 2px;
    }

    .section-description {
        font-size: 1.1rem;
        color: var(--text-secondary);
        max-width: 600px;
        margin: 0 auto;
        font-weight: 400;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .service-card {
        background: var(--surface);
        padding: 40px 30px;
        border-radius: 16px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px var(--shadow);
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(30px);
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .service-card:hover::before {
        transform: scaleX(1);
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px var(--hover-shadow);
        border-color: var(--accent);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 24px;
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        transition: all 0.3s ease;
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
        animation: bounce 0.6s ease;
    }

    .service-title {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 16px;
        transition: color 0.3s ease;
    }

    .service-description {
        font-size: 1rem;
        color: var(--text-secondary);
        line-height: 1.6;
    }

    .cta-button {
        display: inline-block;
        background: linear-gradient(135deg, var(--secondary), var(--accent));
        color: white;
        padding: 16px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        opacity: 0;
        transform: translateY(20px);
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .cta-button:hover::before {
        left: 100%;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
    }

    .theme-toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        background: var(--surface);
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 12px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        z-index: 1000;
        box-shadow: 0 4px 15px var(--shadow);
    }

    .theme-toggle:hover {
        background: var(--primary);
        color: var(--surface);
        transform: rotate(180deg);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {

        0%,
        20%,
        60%,
        100% {
            transform: scale(1.1) rotate(5deg);
        }

        40% {
            transform: scale(1.15) rotate(8deg);
        }

        80% {
            transform: scale(1.05) rotate(3deg);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .services-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .service-card {
            padding: 30px 20px;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .section-description {
            font-size: 1rem;
        }
    }

    /* Animation classes for scroll trigger */
    .animate-card {
        animation: fadeInUp 0.8s ease forwards;
    }

    .animate-cta {
        animation: fadeInUp 0.8s ease 0.5s forwards;
    }
</style>
@stack('styles')