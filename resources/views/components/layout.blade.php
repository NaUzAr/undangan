<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Pernikahan Ahya & Eko</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-abu-teks antialiased bg-gray-200 overflow-x-hidden">
    <!-- Mobile Container -->
    <div class="max-w-md mx-auto min-h-screen bg-beige-bg relative shadow-2xl overflow-hidden pb-20">
        {{ $slot }}

        <!-- Music Control (FAB) -->
        <button id="music-btn"
            class="fixed bottom-6 right-4 z-50 w-12 h-12 rounded-full bg-merah-tua text-white shadow-lg flex items-center justify-center animate-spin-slow"
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