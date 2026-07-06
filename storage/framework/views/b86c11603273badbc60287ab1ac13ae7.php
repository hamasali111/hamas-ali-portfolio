<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($settings->get('name', 'Portfolio')); ?> — <?php echo e($settings->get('title', 'Full Stack Developer')); ?></title>
    <meta name="description" content="<?php echo e($settings->get('bio', '')); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <script>
        tailwind = {
            config: {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            heading: ['Space Grotesk', 'sans-serif']
                        },
                        colors: {
                            primary: '#6366f1',
                            secondary: '#06b6d4',
                            dark: '#080d1e'
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        :root {
            --primary: #6366f1;
            --secondary: #06b6d4;
            --accent: #f472b6;
            --dark: #080d1e;
            --dark2: #0d1428;
            --card: #0f1a35;
            --border: rgba(255, 255, 255, 0.08)
        }

        html {
            scroll-behavior: smooth
        }

        body {
            background: var(--dark);
            font-family: 'Inter', sans-serif;
            color: #e2e8f0;
            overflow-x: hidden
        }

        ::selection {
            background: var(--primary);
            color: #fff
        }

        ::-webkit-scrollbar {
            width: 4px
        }

        ::-webkit-scrollbar-track {
            background: var(--dark)
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px
        }

        /* Scroll Progress */
        #scrollProgress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #06b6d4, #f472b6);
            z-index: 9999;
            transition: width 0.1s
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.4s;
            padding: 1.2rem 0
        }

        .navbar.scrolled {
            background: rgba(8, 13, 30, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 2px 30px rgba(0, 0, 0, 0.4);
            padding: 0.8rem 0
        }

        .nav-link {
            position: relative;
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s;
            letter-spacing: 0.5px
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: width 0.3s
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%
        }

        /* Gradient Text */
        .grad-text {
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .grad-text-pink {
            background: linear-gradient(135deg, #6366f1, #f472b6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        /* Hero */
        #hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 20% 50%, rgba(99, 102, 241, 0.15) 0%, transparent 60%), radial-gradient(ellipse at 80% 20%, rgba(6, 182, 212, 0.1) 0%, transparent 60%), linear-gradient(to bottom, #080d1e, #0d1428)
        }

        .hero-grid {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(99, 102, 241, 0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(99, 102, 241, 0.04) 1px, transparent 1px);
            background-size: 60px 60px;
            mask-image: radial-gradient(ellipse at center, black 0%, transparent 70%)
        }

        .hero-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 6s ease-in-out infinite
        }

        .hero-orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(99, 102, 241, 0.12);
            top: -100px;
            right: -100px;
            animation-delay: 0s
        }

        .hero-orb-2 {
            width: 300px;
            height: 300px;
            background: rgba(6, 182, 212, 0.08);
            bottom: -50px;
            left: 10%;
            animation-delay: 3s
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-20px)
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.85rem;
            color: #a5b4fc;
            margin-bottom: 1.5rem
        }

        .hero-badge .dot {
            width: 8px;
            height: 8px;
            background: #6366f1;
            border-radius: 50%;
            animation: pulse-dot 2s infinite
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1)
            }

            50% {
                opacity: 0.5;
                transform: scale(0.8)
            }
        }

        .hero-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1rem
        }

        .hero-title {
            font-size: clamp(1.2rem, 3vw, 1.8rem);
            color: #94a3b8;
            margin-bottom: 1.5rem;
            min-height: 2.5rem
        }

        #typed-cursor {
            color: var(--primary)
        }

        .hero-desc {
            font-size: 1.05rem;
            color: #64748b;
            max-width: 500px;
            line-height: 1.8;
            margin-bottom: 2.5rem
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s;
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.3)
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 40px rgba(99, 102, 241, 0.5)
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(99, 102, 241, 0.4);
            color: #a5b4fc;
            padding: 0.875rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s
        }

        .btn-outline:hover {
            background: rgba(99, 102, 241, 0.1);
            border-color: #6366f1;
            color: #fff;
            transform: translateY(-2px)
        }

        /* Profile photo */
        .photo-wrap {
            position: relative;
            display: inline-block
        }

        .photo-wrap img {
            width: 320px;
            height: 320px;
            object-fit: cover;
            border-radius: 30px;
            position: relative;
            z-index: 2;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5)
        }

        .photo-ring {
            position: absolute;
            inset: -15px;
            border: 2px solid transparent;
            border-radius: 40px;
            background: linear-gradient(var(--dark), var(--dark)) padding-box, linear-gradient(135deg, #6366f1, #06b6d4) border-box;
            animation: rotate-ring 8s linear infinite;
            z-index: 1
        }

        @keyframes rotate-ring {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .photo-badge {
            position: absolute;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border-radius: 12px;
            padding: 10px 14px;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
            z-index: 3
        }

        .photo-badge.exp {
            bottom: -15px;
            left: -20px
        }

        .photo-badge.projects {
            top: -15px;
            right: -20px
        }

        /* Section */
        .section {
            padding: 100px 0
        }

        .section-tag {
            display: inline-block;
            color: var(--primary);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px
        }

        .section-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem
        }

        .section-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            border-radius: 4px;
            margin: 1rem 0 1.5rem
        }

        .section-desc {
            color: #64748b;
            font-size: 1.05rem;
            line-height: 1.8;
            max-width: 600px
        }

        /* Glass card */
        .glass-card {
            background: rgba(15, 26, 53, 0.6);
            border: 1px solid var(--border);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s
        }

        .glass-card:hover {
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3)
        }

        /* Stats */
        .stat-card {
            text-align: center;
            padding: 2rem;
            border-radius: 20px;
            background: rgba(99, 102, 241, 0.05);
            border: 1px solid rgba(99, 102, 241, 0.15)
        }

        .stat-num {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text
        }

        .stat-label {
            color: #64748b;
            font-size: 0.9rem;
            margin-top: 4px
        }

        /* Skills */
        .skill-bar-bg {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50px;
            height: 8px;
            overflow: hidden;
            margin-top: 8px
        }

        .skill-bar-fill {
            height: 100%;
            border-radius: 50px;
            background: linear-gradient(90deg, #6366f1, #06b6d4);
            width: 0;
            transition: width 1.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)
        }

        .skill-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #a5b4fc
        }

        /* Category pill */
        .cat-pill {
            cursor: pointer;
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #94a3b8;
            transition: all 0.3s
        }

        .cat-pill.active,
        .cat-pill:hover {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            color: #fff;
            border-color: transparent
        }

        /* Timeline */
        .timeline {
            position: relative
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, transparent, rgba(99, 102, 241, 0.4), transparent);
            transform: translateX(-50%)
        }

        @media(max-width:768px) {
            .timeline::before {
                left: 20px
            }
        }

        .timeline-item {
            display: flex;
            gap: 40px;
            margin-bottom: 50px;
            align-items: flex-start
        }

        .timeline-item.right {
            flex-direction: row-reverse
        }

        @media(max-width:768px) {

            .timeline-item,
            .timeline-item.right {
                flex-direction: column;
                padding-left: 50px
            }
        }

        .timeline-card {
            flex: 1;
            background: rgba(15, 26, 53, 0.7);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.3s
        }

        .timeline-card:hover {
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2)
        }

        .timeline-dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #06b6d4);
            border: 3px solid var(--dark);
            flex-shrink: 0;
            margin-top: 20px;
            position: relative;
            z-index: 1
        }

        .timeline-dot::after {
            content: '';
            position: absolute;
            inset: -5px;
            border-radius: 50%;
            border: 2px solid rgba(99, 102, 241, 0.3);
            animation: pulse-ring 2s ease-out infinite
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1
            }

            100% {
                transform: scale(1.8);
                opacity: 0
            }
        }

        .timeline-spacer {
            flex: 1
        }

        @media(max-width:768px) {

            .timeline-spacer,
            .timeline-dot {
                display: none
            }
        }

        /* Projects */
        .project-card {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            border: 1px solid var(--border);
            transition: all 0.4s;
            background: var(--card)
        }

        .project-card:hover {
            transform: translateY(-8px);
            border-color: rgba(99, 102, 241, 0.4);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4)
        }

        .project-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s
        }

        .project-card:hover .project-img {
            transform: scale(1.08)
        }

        .project-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(8, 13, 30, 0.95) 0%, rgba(8, 13, 30, 0.2) 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.4s
        }

        .project-card:hover .project-overlay {
            opacity: 1
        }

        .project-cat {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(99, 102, 241, 0.9);
            color: #fff;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700
        }

        .project-featured {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(244, 114, 182, 0.9);
            color: #fff;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700
        }

        .tech-tag {
            display: inline-block;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            color: #a5b4fc;
            padding: 3px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            margin: 2px
        }

        /* Testimonials */
        .testimonial-card {
            background: rgba(15, 26, 53, 0.8);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 2rem;
            height: 100%
        }

        .stars {
            color: #fbbf24;
            font-size: 0.95rem
        }

        .quote-icon {
            color: rgba(99, 102, 241, 0.3);
            font-size: 3rem;
            line-height: 1;
            margin-bottom: 1rem
        }

        /* Contact */
        .contact-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 0.875rem 1.25rem;
            color: #e2e8f0;
            font-size: 0.95rem;
            transition: all 0.3s;
            outline: none
        }

        .contact-input:focus {
            border-color: var(--primary);
            background: rgba(99, 102, 241, 0.05);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15)
        }

        .contact-input::placeholder {
            color: #475569
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.2rem;
            border-radius: 14px;
            background: rgba(99, 102, 241, 0.04);
            border: 1px solid rgba(99, 102, 241, 0.1);
            transition: all 0.3s
        }

        .contact-info-item:hover {
            background: rgba(99, 102, 241, 0.08);
            border-color: rgba(99, 102, 241, 0.25)
        }

        .contact-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            background: rgba(99, 102, 241, 0.1);
            border: 1px solid rgba(99, 102, 241, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a5b4fc;
            font-size: 1.1rem;
            flex-shrink: 0
        }

        /* Footer */
        footer {
            background: rgba(4, 6, 15, 0.8);
            border-top: 1px solid var(--border);
            padding: 3rem 0 2rem
        }

        .social-btn {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 1rem;
            transition: all 0.3s
        }

        .social-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            transform: translateY(-3px)
        }

        /* WhatsApp */
        .whatsapp-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: #25D366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.8rem;
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.5);
            z-index: 999;
            transition: all 0.3s;
            animation: whatsapp-pulse 3s ease-in-out infinite
        }

        .whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 40px rgba(37, 211, 102, 0.7)
        }

        @keyframes whatsapp-pulse {

            0%,
            100% {
                box-shadow: 0 8px 30px rgba(37, 211, 102, 0.5)
            }

            50% {
                box-shadow: 0 8px 50px rgba(37, 211, 102, 0.8), 0 0 0 10px rgba(37, 211, 102, 0.1)
            }
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            background: #333;
            color: #fff;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.8rem;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s
        }

        .whatsapp-btn:hover .whatsapp-tooltip {
            opacity: 1
        }

        /* Back to top */
        #backToTop {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 44px;
            height: 44px;
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a5b4fc;
            font-size: 1rem;
            cursor: pointer;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s
        }

        #backToTop.visible {
            opacity: 1;
            visibility: visible
        }

        #backToTop:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff
        }

        /* Hamburger */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 5px
        }

        .hamburger span {
            display: block;
            width: 25px;
            height: 2px;
            background: #e2e8f0;
            border-radius: 2px;
            transition: all 0.3s
        }

        .mobile-nav {
            display: none
        }

        @media(max-width:768px) {
            .hamburger {
                display: flex
            }

            .desktop-nav {
                display: none
            }

            .mobile-nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(8, 13, 30, 0.98);
                padding: 1.5rem;
                border-top: 1px solid var(--border);
                z-index: 999
            }

            .mobile-nav.open {
                display: block
            }

            .hamburger.open span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px)
            }

            .hamburger.open span:nth-child(2) {
                opacity: 0;
                transform: translateX(-10px)
            }

            .hamburger.open span:nth-child(3) {
                transform: rotate(-45deg) translate(5px, -5px)
            }
        }

        /* Misc */
        .gradient-border {
            border: 1px solid transparent;
            background: linear-gradient(var(--card), var(--card)) padding-box, linear-gradient(135deg, rgba(99, 102, 241, 0.5), rgba(6, 182, 212, 0.5)) border-box
        }

        [data-filter] {
            transition: all 0.5s
        }

        .hidden-project {
            display: none
        }

        /* AOS override */
        [data-aos] {
            opacity: 0
        }

        [data-aos].aos-animate {
            opacity: 1
        }

        /* ===== RESPONSIVE OVERRIDES ===== */
        @media(max-width:1024px) {
            .section {
                padding: 80px 0
            }

            .hero-name {
                font-size: clamp(2.2rem, 5vw, 3.5rem)
            }
        }

        @media(max-width:768px) {
            .section {
                padding: 60px 0
            }

            .hero-orb-1 {
                width: 250px;
                height: 250px;
                right: -50px;
                top: -50px
            }

            .hero-orb-2 {
                width: 180px;
                height: 180px
            }

            .photo-badge.exp {
                bottom: -10px;
                left: -5px;
                padding: 8px 10px
            }

            .photo-badge.projects {
                top: -10px;
                right: -5px;
                padding: 8px 10px
            }

            .photo-badge {
                font-size: 0.8rem
            }

            .photo-badge>div:first-child {
                font-size: 1.4rem
            }

            .stat-num {
                font-size: 2.2rem
            }
        }

        @media(max-width:640px) {
            .section {
                padding: 50px 0
            }

            .photo-wrap img {
                width: min(260px, 80vw) !important;
                height: min(260px, 80vw) !important;
                border-radius: 24px
            }

            .photo-wrap>div[style*="width:320px"] {
                width: min(260px, 80vw) !important;
                height: min(260px, 80vw) !important
            }

            .photo-ring {
                inset: -10px;
                border-radius: 30px
            }

            .photo-badge.exp {
                bottom: -8px;
                left: 0px
            }

            .photo-badge.projects {
                top: -8px;
                right: 0px
            }

            .hero-desc {
                font-size: 0.95rem;
                max-width: 100%
            }

            .btn-primary,
            .btn-outline {
                padding: 0.75rem 1.4rem;
                font-size: 0.875rem
            }

            .whatsapp-btn {
                bottom: 20px;
                right: 20px;
                width: 52px;
                height: 52px;
                font-size: 1.5rem
            }

            #backToTop {
                bottom: 85px;
                right: 20px;
                width: 40px;
                height: 40px
            }

            .stat-card {
                padding: 1.25rem 0.75rem
            }

            .stat-num {
                font-size: 2rem
            }

            .testimonial-card {
                padding: 1.5rem
            }

            footer {
                padding: 2rem 0 1.5rem
            }
        }

        @media(max-width:480px) {
            .photo-badge {
                display: none
            }

            .hero-badge {
                font-size: 0.78rem;
                padding: 5px 12px
            }

            .section-tag {
                font-size: 0.75rem
            }

            .max-w-7xl {
                padding-left: 1rem !important;
                padding-right: 1rem !important
            }
        }
    </style>
</head>

<body>

    <!-- Scroll Progress Bar -->
    <div id="scrollProgress" style="width:0"></div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
            <a href="#hero" class="text-xl font-bold font-heading">
                <span class="grad-text">{ </span><span class="text-white">Hamas Ali</span><span class="text-gray-400">
                    Dev</span><span class="grad-text"> }</span>
            </a>
            <div class="desktop-nav flex items-center gap-8">
                <a href="#about" class="nav-link">About</a>
                <a href="#skills" class="nav-link">Skills</a>
                <a href="#experience" class="nav-link">Experience</a>
                <a href="#projects" class="nav-link">Projects</a>
                <a href="#testimonials" class="nav-link">Testimonials</a>
                <a href="#contact" class="nav-link">Contact</a>
                <a href="<?php echo e(route('admin.login')); ?>" class="btn-outline !py-2 !px-5 !text-sm">Admin</a>
            </div>
            <div class="hamburger" onclick="toggleMobile()" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
        <div class="mobile-nav" id="mobileNav">
            <div class="flex flex-col gap-4">
                <a href="#about" class="text-gray-300 hover:text-white" onclick="closeMobile()">About</a>
                <a href="#skills" class="text-gray-300 hover:text-white" onclick="closeMobile()">Skills</a>
                <a href="#experience" class="text-gray-300 hover:text-white" onclick="closeMobile()">Experience</a>
                <a href="#projects" class="text-gray-300 hover:text-white" onclick="closeMobile()">Projects</a>
                <a href="#testimonials" class="text-gray-300 hover:text-white" onclick="closeMobile()">Testimonials</a>
                <a href="#contact" class="text-gray-300 hover:text-white" onclick="closeMobile()">Contact</a>
                <a href="<?php echo e(route('admin.login')); ?>" class="text-indigo-400">Admin Panel →</a>
            </div>
        </div>
    </nav>

    <!-- ================================ HERO ================================ -->
    <section id="hero">
        <div class="hero-bg"></div>
        <div class="hero-grid"></div>
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>

        <div class="max-w-7xl mx-auto px-6 w-full">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center pt-28 pb-16 lg:py-32">
                <div data-aos="fade-right" data-aos-duration="800">
                    <div class="hero-badge">
                        <span class="dot"></span>
                        Available for Work & Freelance Projects
                    </div>
                    <h1 class="hero-name">
                        Hi, I'm <br>
                        <span class="grad-text"><?php echo e($settings->get('name', 'Your Name')); ?></span>
                    </h1>
                    <div class="hero-title">
                        <span id="typed"></span>
                    </div>
                    <p class="hero-desc">
                        <?php echo e($settings->get('bio', 'Passionate developer building beautiful, performant web experiences.')); ?>

                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#projects" class="btn-primary">
                            <i class="fas fa-eye"></i> View My Work
                        </a>
                        <a href="#contact" class="btn-outline">
                            <i class="fas fa-paper-plane"></i> Get In Touch
                        </a>
                        <?php if($settings->get('resume')): ?>
                            <a href="<?php echo e(asset('storage/' . $settings->get('resume'))); ?>" download class="btn-outline">
                                <i class="fas fa-download"></i> Resume
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="flex gap-5 mt-8">
                        <?php if($settings->get('github')): ?>
                            <a href="<?php echo e($settings->get('github')); ?>" target="_blank" class="social-btn"><i
                                    class="fab fa-github"></i></a>
                        <?php endif; ?>
                        <?php if($settings->get('linkedin')): ?>
                            <a href="<?php echo e($settings->get('linkedin')); ?>" target="_blank" class="social-btn"><i
                                    class="fab fa-linkedin"></i></a>
                        <?php endif; ?>
                        <?php if($settings->get('twitter')): ?>
                            <a href="<?php echo e($settings->get('twitter')); ?>" target="_blank" class="social-btn"><i
                                    class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $settings->get('phone', '923089116512'))); ?>"
                            target="_blank" class="social-btn"
                            style="color:#25D366;border-color:rgba(37,211,102,0.3)"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="flex justify-center" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
                    <div class="photo-wrap">
                        <div class="photo-ring"></div>
                        <?php if($settings->get('photo')): ?>
                            <img src="<?php echo e(asset('storage/' . $settings->get('photo'))); ?>"
                                alt="<?php echo e($settings->get('name')); ?>" class="rounded-3xl">
                        <?php else: ?>
                            <div
                                style="width:320px;height:320px;border-radius:30px;background:linear-gradient(135deg,rgba(99,102,241,0.2),rgba(6,182,212,0.1));display:flex;align-items:center;justify-content:center;position:relative;z-index:2">
                                <i class="fas fa-user" style="font-size:6rem;color:rgba(99,102,241,0.4)"></i>
                            </div>
                        <?php endif; ?>
                        <div class="photo-badge exp">
                            <div style="font-size:1.8rem;line-height:1"><?php echo e($settings->get('years_exp', '3')); ?>+</div>
                            <div style="font-size:0.7rem;font-weight:500;opacity:0.85">Years Exp.</div>
                        </div>
                        <div class="photo-badge projects">
                            <div style="font-size:1.8rem;line-height:1"><?php echo e($settings->get('projects_done', '25')); ?>+
                            </div>
                            <div style="font-size:0.7rem;font-weight:500;opacity:0.85">Projects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2" style="animation:float 2s ease-in-out infinite">
            <a href="#about" style="color:rgba(99,102,241,0.6);font-size:1.5rem"><i
                    class="fas fa-chevron-down"></i></a>
        </div>
    </section>

    <!-- ================================ ABOUT ================================ -->
    <section id="about" class="section" style="background:linear-gradient(to bottom,var(--dark),var(--dark2))">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div data-aos="fade-right">
                    <span class="section-tag">Who I Am</span>
                    <h2 class="section-title">About <span class="grad-text">Me</span></h2>
                    <div class="section-line"></div>
                    <p class="section-desc mb-6">
                        <?php echo e($settings->get('bio', 'Passionate full stack developer with expertise in building modern web applications. I love turning complex problems into simple, beautiful, and intuitive solutions.')); ?>

                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <?php if($settings->get('email')): ?>
                            <div>
                                <div
                                    style="color:#475569;font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px">
                                    Email</div>
                                <div class="text-sm text-gray-300"><?php echo e($settings->get('email')); ?></div>
                            </div>
                        <?php endif; ?>
                        <?php if($settings->get('location')): ?>
                            <div>
                                <div
                                    style="color:#475569;font-size:0.8rem;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px">
                                    Location</div>
                                <div class="text-sm text-gray-300"><?php echo e($settings->get('location')); ?></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div data-aos="fade-left" data-aos-delay="200">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="stat-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="stat-num" data-count="<?php echo e($settings->get('years_exp', '3')); ?>">0</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="stat-num" data-count="<?php echo e($settings->get('projects_done', '25')); ?>">0</div>
                            <div class="stat-label">Projects Done</div>
                        </div>
                        <div class="stat-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="stat-num" data-count="<?php echo e($settings->get('clients_done', '15')); ?>">0</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                    </div>
                    <div class="glass-card p-6 mt-6">
                        <div class="flex items-center gap-3 mb-4">
                            <div
                                style="width:40px;height:40px;border-radius:10px;background:rgba(99,102,241,0.1);display:flex;align-items:center;justify-content:center;color:#a5b4fc">
                                <i class="fas fa-code"></i>
                            </div>
                            <span class="font-semibold text-white">What I Do Best</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <?php $services = ['Full Stack Web Development','REST API Development','Database Design & Management','UI/UX Implementation','Website Performance Optimization','Clean Code & Code Review'] ?>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center gap-2 text-sm text-gray-400">
                                    <i class="fas fa-check-circle" style="color:#6366f1"></i> <?php echo e($s); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================ SKILLS ================================ -->
    <section id="skills" class="section" style="background:var(--dark2)">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="section-tag">What I Know</span>
                <h2 class="section-title">My <span class="grad-text">Skills</span></h2>
                <div class="section-line mx-auto"></div>
                <p class="section-desc mx-auto text-center">Technologies and tools I work with to bring ideas to life
                </p>
            </div>

            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button class="cat-pill active" data-cat="all" onclick="filterSkills('all', this)">All
                    Skills</button>
                <?php $__currentLoopData = $skills->keys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="cat-pill" data-cat="<?php echo e($cat); ?>"
                        onclick="filterSkills('<?php echo e($cat); ?>', this)"><?php echo e($cat); ?></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div id="skillsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $catSkills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $catSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="glass-card p-5 skill-item" data-category="<?php echo e($category); ?>"
                            data-aos="fade-up">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="skill-icon">
                                    <?php if($skill->icon): ?>
                                        <i class="<?php echo e($skill->icon); ?>"></i>
                                    <?php else: ?>
                                        <i class="fas fa-code"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-white"><?php echo e($skill->name); ?></span>
                                        <span class="text-sm font-bold"
                                            style="color:#a5b4fc"><?php echo e($skill->level); ?>%</span>
                                    </div>
                                    <div style="font-size:0.75rem;color:#475569"><?php echo e($category); ?></div>
                                </div>
                            </div>
                            <div class="skill-bar-bg">
                                <div class="skill-bar-fill" data-level="<?php echo e($skill->level); ?>"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- ================================ EXPERIENCE ================================ -->
    <section id="experience" class="section" style="background:linear-gradient(to bottom,var(--dark2),var(--dark))">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="section-tag">My Journey</span>
                <h2 class="section-title">Work <span class="grad-text">Experience</span></h2>
                <div class="section-line mx-auto"></div>
            </div>

            <?php if($experiences->count()): ?>
                <div class="timeline max-w-4xl mx-auto">
                    <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="timeline-item <?php echo e($i % 2 === 0 ? '' : 'right'); ?>"
                            data-aos="<?php echo e($i % 2 === 0 ? 'fade-right' : 'fade-left'); ?>">
                            <?php if($i % 2 !== 0): ?>
                                <div class="timeline-spacer"></div>
                            <?php endif; ?>
                            <div class="timeline-dot"></div>
                            <?php if($i % 2 === 0): ?>
                                <div class="timeline-spacer"></div>
                            <?php endif; ?>
                            <div class="timeline-card">
                                <div class="flex items-start justify-between flex-wrap gap-2 mb-3">
                                    <div>
                                        <span
                                            style="display:inline-block;padding:3px 10px;border-radius:50px;font-size:0.75rem;font-weight:700;background:<?php echo e($exp->type === 'work' ? 'rgba(99,102,241,0.15)' : 'rgba(244,114,182,0.15)'); ?>;color:<?php echo e($exp->type === 'work' ? '#a5b4fc' : '#f9a8d4'); ?>;border:1px solid <?php echo e($exp->type === 'work' ? 'rgba(99,102,241,0.2)' : 'rgba(244,114,182,0.2)'); ?>;margin-bottom:8px">
                                            <?php echo e($exp->type === 'work' ? '💼 Work' : '🎓 Education'); ?>

                                        </span>
                                        <h3 class="text-lg font-bold text-white"><?php echo e($exp->title); ?></h3>
                                        <div class="text-indigo-400 font-semibold mt-1"><?php echo e($exp->company); ?></div>
                                    </div>
                                    <?php if($exp->is_current): ?>
                                        <span
                                            style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.3);color:#86efac;padding:3px 10px;border-radius:50px;font-size:0.75rem;font-weight:700">●
                                            Current</span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                    <span><i class="far fa-calendar-alt mr-1"></i><?php echo e($exp->date_range); ?></span>
                                    <?php if($exp->location): ?>
                                        <span><i class="fas fa-map-marker-alt mr-1"></i><?php echo e($exp->location); ?></span>
                                    <?php endif; ?>
                                </div>
                                <p class="text-sm text-gray-400 leading-relaxed"><?php echo e($exp->description); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600 py-12">
                    <i class="fas fa-briefcase text-5xl mb-4"></i>
                    <p>Experience coming soon — check back later!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ================================ PROJECTS ================================ -->
    <section id="projects" class="section" style="background:var(--dark)">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="section-tag">What I've Built</span>
                <h2 class="section-title">My <span class="grad-text">Projects</span></h2>
                <div class="section-line mx-auto"></div>
                <p class="section-desc mx-auto text-center">A selection of projects I've built — each one a story of
                    problem-solving.</p>
            </div>

            <!-- Project Filter -->
            <?php $categories = $projects->pluck('category')->unique()->filter() ?>
            <?php if($categories->count() > 1): ?>
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button class="cat-pill active" onclick="filterProjects('all', this)">All</button>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button class="cat-pill"
                            onclick="filterProjects('<?php echo e($cat); ?>', this)"><?php echo e($cat); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <?php if($projects->count()): ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="projectsGrid">
                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="project-card" data-category="<?php echo e($project->category); ?>" data-aos="fade-up">
                            <div class="relative overflow-hidden" style="height:220px">
                                <img src="<?php echo e($project->image_url); ?>" alt="<?php echo e($project->name); ?>" class="project-img"
                                    loading="lazy">
                                <div class="project-overlay"></div>
                                <span class="project-cat"><?php echo e($project->category); ?></span>
                                <?php if($project->is_featured): ?>
                                    <span class="project-featured">⭐ Featured</span>
                                <?php endif; ?>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-white mb-2"><?php echo e($project->name); ?></h3>
                                <p class="text-sm text-gray-400 leading-relaxed mb-4"
                                    style="display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden">
                                    <?php echo e($project->description); ?></p>
                                <div class="flex flex-wrap gap-1 mb-5">
                                    <?php $__currentLoopData = $project->technologies_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tech): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="tech-tag"><?php echo e($tech); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="flex gap-3">
                                    <?php if($project->url): ?>
                                        <a href="<?php echo e($project->url); ?>" target="_blank"
                                            class="btn-primary !py-2 !px-4 !text-sm flex-1 justify-center">
                                            <i class="fas fa-external-link-alt"></i> Live Demo
                                        </a>
                                    <?php endif; ?>
                                    <?php if($project->github_url): ?>
                                        <a href="<?php echo e($project->github_url); ?>" target="_blank"
                                            class="btn-outline !py-2 !px-4 !text-sm <?php echo e($project->url ? '' : 'flex-1 justify-center'); ?>">
                                            <i class="fab fa-github"></i> <?php echo e($project->url ? '' : 'View Code'); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600 py-12">
                    <i class="fas fa-folder-open text-5xl mb-4"></i>
                    <p>Projects coming soon!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ================================ TESTIMONIALS ================================ -->
    <?php if($testimonials->count()): ?>
        <section id="testimonials" class="section"
            style="background:linear-gradient(to bottom,var(--dark),var(--dark2))">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <span class="section-tag">Client Love</span>
                    <h2 class="section-title">What People <span class="grad-text">Say</span></h2>
                    <div class="section-line mx-auto"></div>
                </div>

                <div class="swiper testimonialSwiper" style="padding:10px 5px 50px">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide" style="height:auto">
                                <div class="testimonial-card">
                                    <div class="quote-icon"><i class="fas fa-quote-left"></i></div>
                                    <div class="stars mb-4">
                                        <?php for($i = 0; $i < $t->rating; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                        <?php for($i = $t->rating; $i < 5; $i++): ?>
                                            <i class="far fa-star" style="color:#475569"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <p class="text-gray-300 leading-relaxed mb-6 italic">"<?php echo e($t->content); ?>"</p>
                                    <div class="flex items-center gap-4 mt-auto">
                                        <img src="<?php echo e($t->avatar_url); ?>" alt="<?php echo e($t->name); ?>"
                                            class="w-12 h-12 rounded-full object-cover border-2"
                                            style="border-color:rgba(99,102,241,0.4)">
                                        <div>
                                            <div class="font-semibold text-white"><?php echo e($t->name); ?></div>
                                            <div class="text-sm text-indigo-400">
                                                <?php echo e($t->role); ?><?php echo e($t->company ? ' @ ' . $t->company : ''); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- ================================ CONTACT ================================ -->
    <section id="contact" class="section" style="background:var(--dark2)">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="section-tag">Let's Talk</span>
                <h2 class="section-title">Get In <span class="grad-text">Touch</span></h2>
                <div class="section-line mx-auto"></div>
                <p class="section-desc mx-auto text-center">Have a project in mind? Let's build something great
                    together.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Contact Info -->
                <div data-aos="fade-right">
                    <div class="flex flex-col gap-4 mb-8">
                        <?php if($settings->get('email')): ?>
                            <div class="contact-info-item">
                                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                                <div>
                                    <div
                                        style="font-size:0.8rem;color:#475569;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px">
                                        Email</div>
                                    <a href="mailto:<?php echo e($settings->get('email')); ?>"
                                        class="text-gray-200 hover:text-indigo-400"><?php echo e($settings->get('email')); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($settings->get('phone')): ?>
                            <div class="contact-info-item">
                                <div class="contact-icon"><i class="fab fa-whatsapp"></i></div>
                                <div>
                                    <div
                                        style="font-size:0.8rem;color:#475569;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px">
                                        WhatsApp</div>
                                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $settings->get('phone'))); ?>"
                                        target="_blank"
                                        class="text-gray-200 hover:text-green-400"><?php echo e($settings->get('phone')); ?></a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($settings->get('location')): ?>
                            <div class="contact-info-item">
                                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div>
                                    <div
                                        style="font-size:0.8rem;color:#475569;text-transform:uppercase;letter-spacing:1px;margin-bottom:2px">
                                        Location</div>
                                    <span class="text-gray-200"><?php echo e($settings->get('location')); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="glass-card p-6">
                        <h4 class="font-semibold text-white mb-2"><i
                                class="fas fa-clock mr-2 text-indigo-400"></i>Response Time</h4>
                        <p class="text-sm text-gray-400">I typically respond within 24 hours. For urgent matters, reach
                            out via WhatsApp for faster communication.</p>
                        <div class="flex gap-4 mt-4">
                            <?php if($settings->get('github')): ?>
                                <a href="<?php echo e($settings->get('github')); ?>" target="_blank"
                                    class="social-btn text-sm"><i class="fab fa-github"></i></a>
                            <?php endif; ?>
                            <?php if($settings->get('linkedin')): ?>
                                <a href="<?php echo e($settings->get('linkedin')); ?>" target="_blank"
                                    class="social-btn text-sm"><i class="fab fa-linkedin"></i></a>
                            <?php endif; ?>
                            <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $settings->get('phone', '923089116512'))); ?>"
                                target="_blank" class="social-btn"
                                style="color:#25D366;border-color:rgba(37,211,102,0.3)"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div data-aos="fade-left">
                    <?php if(session('success')): ?>
                        <div
                            style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.3);border-radius:12px;padding:1rem 1.25rem;margin-bottom:1.5rem;color:#86efac;display:flex;align-items:center;gap:10px">
                            <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('contact')); ?>" method="POST" class="glass-card p-8">
                        <?php echo csrf_field(); ?>
                        <div class="grid sm:grid-cols-2 gap-5 mb-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Your Name *</label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                                    placeholder="John Doe" class="contact-input" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-400 text-xs mt-1"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Email Address *</label>
                                <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                    placeholder="john@example.com" class="contact-input" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-400 text-xs mt-1"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="block text-sm font-medium text-gray-400 mb-2">Subject</label>
                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>"
                                placeholder="How can I help you?" class="contact-input">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-400 mb-2">Your Message *</label>
                            <textarea name="message" rows="5" placeholder="Tell me about your project..."
                                class="contact-input resize-none" required><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-400 text-xs mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ================================ FOOTER ================================ -->
    <footer>
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <div class="text-xl font-bold font-heading mb-1">
                        <span class="grad-text">{ </span><span class="text-white">Hamas Ali</span><span
                            class="text-gray-400"> Dev</span><span class="grad-text"> }</span>
                    </div>
                    <p class="text-gray-500 text-sm">Building digital experiences that matter.</p>
                </div>
                <div class="flex gap-3">
                    <?php if($settings->get('github')): ?>
                        <a href="<?php echo e($settings->get('github')); ?>" target="_blank" class="social-btn"><i
                                class="fab fa-github"></i></a>
                    <?php endif; ?>
                    <?php if($settings->get('linkedin')): ?>
                        <a href="<?php echo e($settings->get('linkedin')); ?>" target="_blank" class="social-btn"><i
                                class="fab fa-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if($settings->get('twitter')): ?>
                        <a href="<?php echo e($settings->get('twitter')); ?>" target="_blank" class="social-btn"><i
                                class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $settings->get('phone', '923089116512'))); ?>"
                        target="_blank" class="social-btn" style="color:#25D366;border-color:rgba(37,211,102,0.3)"><i
                            class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div class="border-t mt-8 pt-6 flex flex-col md:flex-row justify-between items-center gap-3"
                style="border-color:var(--border)">
                <p class="text-gray-600 text-sm">© <?php echo e(date('Y')); ?> <?php echo e($settings->get('name', 'Portfolio')); ?>. All
                    rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#about" class="text-gray-600 hover:text-gray-300 text-sm">About</a>
                    <a href="#projects" class="text-gray-600 hover:text-gray-300 text-sm">Projects</a>
                    <a href="#contact" class="text-gray-600 hover:text-gray-300 text-sm">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/<?php echo e(preg_replace('/[^0-9]/', '', $settings->get('phone', '923089116512'))); ?>" target="_blank"
        class="whatsapp-btn" title="Chat on WhatsApp">
        <span class="whatsapp-tooltip">Chat on WhatsApp</span>
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Back to Top -->
    <button id="backToTop" onclick="scrollToTop()" title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- CDN Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        // Init AOS
        AOS.init({
            duration: 700,
            easing: 'ease-out-cubic',
            once: true,
            offset: 60
        });

        // Typed.js hero title
        const typed = new Typed('#typed', {
            strings: [
                '<?php echo e($settings->get('title', 'Full Stack Developer')); ?>',
                'Laravel Expert',
                'Problem Solver',
                'Creative Coder',
                'Open Source Enthusiast'
            ],
            typeSpeed: 60,
            deleteSpeed: 35,
            backDelay: 2000,
            loop: true
        });

        // Scroll progress
        window.addEventListener('scroll', () => {
            const pct = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            document.getElementById('scrollProgress').style.width = pct + '%';
            // Navbar
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 50);
            // Back to top
            document.getElementById('backToTop').classList.toggle('visible', window.scrollY > 400);
            // Active nav
            document.querySelectorAll('.nav-link').forEach(link => {
                const sec = document.querySelector(link.getAttribute('href'));
                if (sec) {
                    const rect = sec.getBoundingClientRect();
                    link.classList.toggle('active', rect.top <= 100 && rect.bottom > 100);
                }
            });
            // Skill bars
            animateSkillBars();
        });

        // Skill bar animation
        let skillsAnimated = false;

        function animateSkillBars() {
            if (skillsAnimated) return;
            const sec = document.getElementById('skills');
            if (!sec) return;
            const rect = sec.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                skillsAnimated = true;
                document.querySelectorAll('.skill-bar-fill').forEach(bar => {
                    setTimeout(() => bar.style.width = bar.dataset.level + '%', 200);
                });
            }
        }
        animateSkillBars();

        // Counter animation
        function animateCounters() {
            document.querySelectorAll('[data-count]').forEach(el => {
                const target = parseInt(el.dataset.count);
                let current = 0;
                const step = Math.max(1, Math.floor(target / 50));
                const timer = setInterval(() => {
                    current = Math.min(current + step, target);
                    el.textContent = current + '+';
                    if (current >= target) clearInterval(timer);
                }, 30);
            });
        }
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        }, {
            threshold: 0.5
        });
        const aboutSec = document.getElementById('about');
        if (aboutSec) observer.observe(aboutSec);

        // Swiper testimonials
        new Swiper('.testimonialSwiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });

        // Filter skills
        function filterSkills(cat, btn) {
            document.querySelectorAll('.cat-pill').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.querySelectorAll('.skill-item').forEach(item => {
                const show = cat === 'all' || item.dataset.category === cat;
                item.style.display = show ? 'block' : 'none';
            });
        }

        // Filter projects
        function filterProjects(cat, btn) {
            document.querySelectorAll('.cat-pill').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.querySelectorAll('#projectsGrid > div[data-category]').forEach(item => {
                const show = cat === 'all' || item.dataset.category === cat;
                item.style.display = show ? 'block' : 'none';
            });
        }

        // Back to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Mobile menu
        function toggleMobile() {
            document.getElementById('mobileNav').classList.toggle('open');
            document.getElementById('hamburger').classList.toggle('open');
        }

        function closeMobile() {
            document.getElementById('mobileNav').classList.remove('open');
            document.getElementById('hamburger').classList.remove('open');
        }

        // Smooth hover on project cards
        document.querySelectorAll('.project-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                card.style.transform = `translateY(-8px) rotateX(${-y*4}deg) rotateY(${x*4}deg)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\PMLS\Downloads\portfolio-laravel (1)\laravel\resources\views/portfolio/index.blade.php ENDPATH**/ ?>