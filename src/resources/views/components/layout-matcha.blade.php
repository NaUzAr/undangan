<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Ngunduh Mantu Ahya & Eko</title>
    <meta name="description" content="Undangan Ngunduh Mantu Ahya Safira & Eko Prasetyo - 10 Mei 2026">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ======================================================
           MATCHA GREEN THEME — Overrides for Ngunduh Mantu page
           ====================================================== */

        /* === MATCHA BACKGROUND === */
        .matcha-bg {
            background: linear-gradient(180deg, #F0F7F0 0%, #E8F5E4 50%, #D4E8C8 100%);
        }

        /* === MATCHA GLASS CARD === */
        .matcha-glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(107, 158, 107, 0.25);
            box-shadow: 0 8px 32px rgba(45, 90, 61, 0.06);
        }

        .matcha-glass-card-dark {
            background: rgba(26, 58, 40, 0.92);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(107, 158, 107, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        /* === MATCHA GRADIENT TEXT === */
        .matcha-gradient-text {
            background: linear-gradient(135deg, #1A3A28 0%, #2D5A3D 35%, #3A7D52 65%, #2D5A3D 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .matcha-gold-shimmer {
            background: linear-gradient(90deg, #2D5A3D 0%, #6B9E6B 25%, #3A7D52 50%, #6B9E6B 75%, #2D5A3D 100%);
            background-size: 400% 100%;
            animation: gold-shimmer 4s ease-in-out infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* === MATCHA PHOTO FRAME === */
        .matcha-photo-frame {
            position: relative;
        }

        .matcha-photo-frame::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            background: conic-gradient(from 0deg, #6B9E6B, #B4D8B0, #3A7D52, #D4E8C8, #6B9E6B);
            animation: rotate-border 8s linear infinite;
            z-index: -1;
        }

        /* === MATCHA COVER RING === */
        .matcha-cover-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(107, 158, 107, 0.25);
            animation: cover-pulse 6s ease-in-out infinite;
        }

        /* === MATCHA SECTION DIVIDER === */
        .matcha-section-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            padding: 8px 0;
        }

        .matcha-section-divider::before,
        .matcha-section-divider::after {
            content: '';
            width: 60px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(107, 158, 107, 0.5), transparent);
        }

        /* === MATCHA LEAF ANIMATION === */
        @keyframes matcha-leaf-fall {
            0% {
                transform: translateY(-10vh) translateX(0) rotate(0deg) scale(1);
                opacity: 0;
            }
            8% {
                opacity: 0.8;
            }
            25% {
                transform: translateY(22vh) translateX(12px) rotate(90deg) scale(0.95);
            }
            50% {
                transform: translateY(45vh) translateX(-8px) rotate(200deg) scale(0.9);
            }
            75% {
                transform: translateY(68vh) translateX(15px) rotate(300deg) scale(0.85);
                opacity: 0.6;
            }
            100% {
                transform: translateY(105vh) translateX(-3px) rotate(400deg) scale(0.75);
                opacity: 0;
            }
        }

        .matcha-leaf {
            position: fixed;
            top: -5vh;
            pointer-events: none;
            z-index: 5;
            animation: matcha-leaf-fall var(--duration, 12s) linear infinite;
            animation-delay: var(--delay, 0s);
            opacity: 0;
            will-change: transform;
        }

        /* === MATCHA SPARKLE DOT === */
        .matcha-sparkle-dot {
            position: fixed;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(107, 158, 107, 0.8), transparent);
            pointer-events: none;
            z-index: 4;
            animation: sparkle-twinkle var(--duration, 3s) ease-in-out infinite;
            animation-delay: var(--delay, 0s);
        }

        @keyframes sparkle-twinkle {
            0%, 100% { opacity: 0; transform: scale(0); }
            50% { opacity: 1; transform: scale(1); }
        }

        /* === MATCHA BOTTOM NAV === */
        .matcha-bottom-nav {
            background: rgba(240, 247, 240, 0.96);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-top: 1px solid rgba(45, 90, 61, 0.15);
            box-shadow: 0 -4px 24px rgba(45, 90, 61, 0.12);
        }

        .matcha-bottom-nav a {
            transition: all 0.3s ease;
            position: relative;
        }

        .matcha-bottom-nav a.matcha-nav-active {
            color: #2D5A3D;
        }

        .matcha-bottom-nav a.matcha-nav-active::after {
            content: '';
            position: absolute;
            top: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 3px;
            background: linear-gradient(90deg, #6B9E6B, #2D5A3D);
            border-radius: 0 0 4px 4px;
        }

        /* === MATCHA CUSTOM SCROLLBAR === */
        .matcha-custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .matcha-custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(107, 158, 107, 0.08);
            border-radius: 10px;
        }

        .matcha-custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #6B9E6B 0%, #3A7D52 100%);
            border-radius: 10px;
        }

        /* === REUSE EXISTING KEYFRAMES === */
        @keyframes gold-shimmer {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes cover-pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.5); opacity: 0.1; }
        }

        @keyframes rotate-border {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes count-flip {
            0% { transform: rotateX(0deg); }
            50% { transform: rotateX(-90deg); opacity: 0.5; }
            100% { transform: rotateX(0deg); }
        }

        .flip {
            animation: count-flip 0.6s ease-in-out;
        }
    </style>
</head>

<body class="font-sans text-[#3A5A3A] antialiased bg-gray-200 overflow-x-hidden">
    <!-- Mobile Container -->
    <div class="max-w-md mx-auto min-h-screen relative shadow-2xl overflow-hidden pb-20 matcha-bg">
        {{ $slot }}

        <!-- Music Control (FAB) - Matcha Style -->
        <button id="music-btn"
            class="fixed bottom-6 right-4 z-50 w-12 h-12 rounded-full bg-gradient-to-br from-[#2D5A3D] to-[#3A7D52] text-white shadow-lg flex items-center justify-center animate-spin-slow"
            onclick="toggleMusic()">
            <i class="fas fa-compact-disc text-lg"></i>
        </button>
        <audio id="wedding-music" loop>
            <source src="{{ asset('music/wedding-song.mp3') }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <script>
            function toggleMusic() {
                var audio = document.getElementById("wedding-music");
                var btn = document.getElementById("music-btn");
                if (audio.paused) {
                    audio.play();
                    btn.classList.add("animate-spin-slow");
                } else {
                    audio.pause();
                    btn.classList.remove("animate-spin-slow");
                }
            }
        </script>

        <style>
            @keyframes spin-slow {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin-slow {
                animation: spin-slow 4s linear infinite;
            }
        </style>
    </div>
</body>

</html>
