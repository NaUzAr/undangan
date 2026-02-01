<x-layout>
    <!-- Background Texture -->
    <div class="fixed inset-0 bg-noise pointer-events-none z-0 mix-blend-multiply opacity-50"></div>

    <!-- Decorative Floral Corners (Top) -->
    <div class="fixed top-0 left-0 w-32 h-32 opacity-20 pointer-events-none z-5">
        <svg viewBox="0 0 100 100" class="w-full h-full text-merah-tua fill-current">
            <path d="M0,0 Q50,20 20,50 Q-10,80 0,100 L0,0Z" opacity="0.3" />
            <circle cx="15" cy="15" r="8" opacity="0.5" />
            <circle cx="5" cy="30" r="5" opacity="0.4" />
            <circle cx="30" cy="5" r="5" opacity="0.4" />
        </svg>
    </div>
    <div class="fixed top-0 right-0 w-32 h-32 opacity-20 pointer-events-none z-5 transform scale-x-[-1]">
        <svg viewBox="0 0 100 100" class="w-full h-full text-merah-tua fill-current">
            <path d="M0,0 Q50,20 20,50 Q-10,80 0,100 L0,0Z" opacity="0.3" />
            <circle cx="15" cy="15" r="8" opacity="0.5" />
            <circle cx="5" cy="30" r="5" opacity="0.4" />
            <circle cx="30" cy="5" r="5" opacity="0.4" />
        </svg>
    </div>

    <!-- Cover Overlay -->
    <div id="cover"
        class="fixed inset-0 z-50 bg-[#F9F1E5] flex flex-col items-center justify-center text-center p-6 transition-transform duration-1000 ease-in-out overflow-hidden {{ session('skip_cover') ? 'translate-y-[-100%]' : '' }}">

        <!-- Floating Autumn Leaves Animation -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden" id="floating-leaves">
            <div class="leaf-float" style="left: 5%; animation-delay: 0s;">🍂</div>
            <div class="leaf-float" style="left: 15%; animation-delay: 1s;">🍁</div>
            <div class="leaf-float" style="left: 25%; animation-delay: 2s;">🍂</div>
            <div class="leaf-float" style="left: 35%; animation-delay: 0.5s;">🍃</div>
            <div class="leaf-float" style="left: 45%; animation-delay: 1.5s;">🍁</div>
            <div class="leaf-float" style="left: 55%; animation-delay: 2.5s;">🍂</div>
            <div class="leaf-float" style="left: 65%; animation-delay: 0.8s;">🍁</div>
            <div class="leaf-float" style="left: 75%; animation-delay: 1.8s;">🍃</div>
            <div class="leaf-float" style="left: 85%; animation-delay: 2.2s;">🍂</div>
            <div class="leaf-float" style="left: 95%; animation-delay: 0.3s;">🍁</div>
        </div>

        <style>
            .leaf-float {
                position: absolute;
                bottom: -50px;
                font-size: 28px;
                opacity: 0.7;
                animation: floatUp 8s ease-in-out infinite;
            }

            @keyframes floatUp {
                0% {
                    transform: translateY(0) rotate(0deg);
                    opacity: 0.7;
                }

                50% {
                    opacity: 0.9;
                    transform: translateY(-50vh) rotate(180deg);
                }

                100% {
                    transform: translateY(-100vh) rotate(360deg);
                    opacity: 0;
                }
            }
        </style>

        <!-- Decorative Ornament Top -->
        <div class="absolute top-8 left-1/2 -translate-x-1/2 text-[#7B4E48]/40 text-6xl">✦</div>

        <!-- Main Title Block -->
        <div class="text-center space-y-4 relative z-10 px-8">
            <!-- Decorative Lines -->
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="w-16 h-px bg-gradient-to-r from-transparent to-[#7B4E48]/40"></div>
                <span class="text-[#7B4E48] text-2xl">❦</span>
                <div class="w-16 h-px bg-gradient-to-l from-transparent to-[#7B4E48]/40"></div>
            </div>

            <p class="font-sans tracking-[0.4em] text-[#7B4E48]/80 text-xs uppercase">The Wedding of</p>

            <!-- Couple Names - Large & Elegant -->
            <h1 class="font-script text-7xl text-[#7B4E48] drop-shadow-lg leading-tight">
                Ahya<br>
                <span class="text-[#C89091] text-4xl">&</span><br>
                Eko
            </h1>

            <!-- Date Badge -->
            <div
                class="inline-block bg-[#7B4E48]/10 backdrop-blur-sm px-6 py-2 rounded-full border border-[#7B4E48]/30 mt-4">
                <p class="font-serif text-lg text-[#7B4E48]">3 Mei 2026</p>
            </div>

            <!-- Decorative Lines Bottom -->
            <div class="flex items-center justify-center gap-4 mt-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent to-[#7B4E48]/40"></div>
                <span class="text-[#7B4E48]/50 text-sm">✧ ✦ ✧</span>
                <div class="w-12 h-px bg-gradient-to-l from-transparent to-[#7B4E48]/40"></div>
            </div>
        </div>

        <p class="font-sans mb-2 tracking-widest text-sm uppercase relative z-10 text-[#7B4E48] mt-8">Kepada Yth.</p>
        <div
            class="font-bold text-lg mb-8 bg-[#7B4E48]/10 px-6 py-2 rounded-full backdrop-blur-sm border border-[#7B4E48]/30 relative z-10 text-[#7B4E48]">
            {{ $guest ? $guest->name : 'Bapak/Ibu/Saudara/i' }}
        </div>

        <button onclick="openInvitation()"
            class="group relative px-8 py-3 bg-[#7B4E48] text-white font-serif font-bold rounded-full shadow-[0_0_20px_rgba(123,78,72,0.4)] hover:bg-[#5a3a36] hover:scale-105 transition-all duration-300 z-10">
            <i class="fas fa-envelope-open mr-2"></i> Buka Undangan
        </button>
    </div>

    <!-- Main Content (Hidden Initially) -->
    <div id="main-content"
        class="relative z-10 transition-opacity duration-1000 px-6 pt-12 pb-24 space-y-20 {{ session('skip_cover') ? 'opacity-100' : 'opacity-0' }}">

        <!-- Floating Sparkles on Main Page -->
        <div class="fixed inset-0 pointer-events-none z-5 overflow-hidden" id="main-sparkles">
            <div class="sparkle-float" style="left: 10%; top: 20%;">✦</div>
            <div class="sparkle-float" style="left: 85%; top: 15%;">✧</div>
            <div class="sparkle-float" style="left: 20%; top: 50%;">✦</div>
            <div class="sparkle-float" style="left: 90%; top: 45%;">✧</div>
            <div class="sparkle-float" style="left: 5%; top: 70%;">✦</div>
            <div class="sparkle-float" style="left: 80%; top: 75%;">✧</div>
            <div class="sparkle-float" style="left: 15%; top: 85%;">✦</div>
            <div class="sparkle-float" style="left: 75%; top: 90%;">✧</div>
        </div>

        <style>
            .sparkle-float {
                position: fixed;
                font-size: 16px;
                color: #7B4E48;
                opacity: 0;
                animation: sparkleMain 4s ease-in-out infinite;
            }

            .sparkle-float:nth-child(odd) {
                animation-delay: 0s;
            }

            .sparkle-float:nth-child(even) {
                animation-delay: 2s;
            }

            @keyframes sparkleMain {

                0%,
                100% {
                    opacity: 0;
                    transform: scale(0.5) rotate(0deg);
                }

                50% {
                    opacity: 0.8;
                    transform: scale(1.2) rotate(180deg);
                }
            }
        </style>

        <!-- Section: Hero (Home) -->
        <section id="home" class="text-center pt-6 reveal-on-scroll relative">
            <!-- Subtle Sparkle Decorations -->
            <div class="absolute top-0 left-1/4 text-[#c9a87c]/60 text-lg animate-pulse" style="animation-delay: 0.5s;">
                ✦</div>
            <div class="absolute top-8 right-1/4 text-[#c9a87c]/40 text-sm animate-pulse" style="animation-delay: 1s;">✧
            </div>
            <div class="absolute top-16 left-1/3 text-[#c9a87c]/30 text-xs animate-pulse"
                style="animation-delay: 1.5s;">✦</div>

            <div class="space-y-4">
                <p class="text-[#C89091] text-sm tracking-[0.4em] uppercase font-medium">The Wedding of</p>
                <h1 class="font-script text-7xl text-[#7B4E48] drop-shadow-sm leading-tight">Ahya & Eko</h1>
                <div class="inline-block bg-[#E9D0CB]/30 px-8 py-3 rounded-full border border-[#C89091]/30">
                    <p class="font-serif text-xl text-[#7B4E48]">Minggu, 3 Mei 2026</p>
                </div>
            </div>

            <!-- Elegant Divider -->
            <div class="flex items-center justify-center gap-4 py-8">
                <div class="w-16 h-px bg-gradient-to-r from-transparent to-[#C89091]/50"></div>
                <span class="text-[#c9a87c] text-2xl">❦</span>
                <div class="w-16 h-px bg-gradient-to-l from-transparent to-[#C89091]/50"></div>
            </div>

            <!-- Quote Card -->
            <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-6 mx-2 border border-[#C89091]/20 shadow-sm">
                <p class="font-serif italic text-sm text-[#7B4E48]/80 leading-relaxed">
                    "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                    sendiri, supaya kamu cenderung dan merasa tenteram kepadanya."
                </p>
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="w-8 h-px bg-[#C89091]/40"></div>
                    <p class="text-xs font-semibold text-[#C89091] tracking-wider">QS. AR-RUM: 21</p>
                    <div class="w-8 h-px bg-[#C89091]/40"></div>
                </div>
            </div>
        </section>

        <!-- Section Divider -->
        <div class="flex justify-center items-center py-6">
            <div class="flex items-center gap-3">
                <div class="w-12 h-px bg-[#C89091]/30"></div>
                <span class="text-[#C89091]/60 text-xl">✧</span>
                <div class="w-12 h-px bg-[#C89091]/30"></div>
            </div>
        </div>

        <!-- Section: Mempelai -->
        <section id="mempelai" class="reveal-on-scroll">
            <div class="py-8 px-2 relative">
                <!-- Decorative Corner Ornaments -->
                <div class="absolute top-0 left-0 text-[#c9a87c]/40 text-2xl">❧</div>
                <div class="absolute top-0 right-0 text-[#c9a87c]/40 text-2xl rotate-90">❧</div>
                <div class="absolute bottom-0 left-0 text-[#c9a87c]/40 text-2xl -rotate-90">❧</div>
                <div class="absolute bottom-0 right-0 text-[#c9a87c]/40 text-2xl rotate-180">❧</div>

                <div class="space-y-10">
                    <!-- Bride -->
                    <div class="text-center group">
                        <div class="relative inline-block">
                            <div
                                class="w-44 h-44 mx-auto rounded-full p-1 bg-gradient-to-br from-[#c9a87c] to-[#a08050] shadow-xl">
                                <div class="w-full h-full rounded-full border-4 border-white overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1549417229-aa67d3263c09?q=80&w=200&auto=format&fit=crop"
                                        class="w-full h-full rounded-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        alt="Wanita">
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#b8927a] to-[#9a7a68] text-white text-xs font-bold px-5 py-1.5 rounded-full shadow-lg">
                                Mempelai Wanita
                            </div>
                        </div>
                        <h2 class="font-script text-5xl text-[#7B4E48] mt-6 mb-2 drop-shadow-sm">Ahya Safira</h2>
                        <p class="font-sans text-xs font-medium tracking-widest text-[#8a7060] uppercase">
                            Putri Terakhir dari Bpk. Haryanta & Ibu Ratri Dwi Wahyuni
                        </p>
                        <a href="https://instagram.com/ahyasafiraa_" target="_blank"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-[#7B4E48]/10 text-[#7B4E48] text-sm rounded-full hover:bg-[#7B4E48] hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                            @ahyasafiraa_
                        </a>
                    </div>

                    <!-- Heart Divider -->
                    <div class="flex items-center justify-center gap-4">
                        <div class="w-20 h-px bg-gradient-to-r from-transparent to-[#c9a87c]/60"></div>
                        <div class="text-4xl text-[#c9a87c] animate-pulse">♥</div>
                        <div class="w-20 h-px bg-gradient-to-l from-transparent to-[#c9a87c]/60"></div>
                    </div>

                    <!-- Groom -->
                    <div class="text-center group">
                        <div class="relative inline-block">
                            <div
                                class="w-44 h-44 mx-auto rounded-full p-1 bg-gradient-to-br from-[#c9a87c] to-[#a08050] shadow-xl">
                                <div class="w-full h-full rounded-full border-4 border-white overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1550503023-e5781abe6aee?q=80&w=200&auto=format&fit=crop"
                                        class="w-full h-full rounded-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        alt="Pria">
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#5a4a42] to-[#7B4E48] text-white text-xs font-bold px-5 py-1.5 rounded-full shadow-lg">
                                Mempelai Pria
                            </div>
                        </div>
                        <h2 class="font-script text-5xl text-[#7B4E48] mt-6 mb-2 drop-shadow-sm">Eko Prasetyo</h2>
                        <p class="font-sans text-xs font-medium tracking-widest text-[#8a7060] uppercase">
                            Putra Pertama dari Bpk. Wakidi & Ibu Suyatni
                        </p>
                        <a href="https://instagram.com/eko_prasetyo07" target="_blank"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-[#7B4E48]/10 text-[#7B4E48] text-sm rounded-full hover:bg-[#7B4E48] hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                            @eko_prasetyo07
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Countdown -->
        <section class="relative reveal-blur">
            <!-- Batik Pattern Background -->
            <div class="absolute inset-0 rounded-2xl overflow-hidden">
                <div class="absolute inset-0 bg-merah-tua"></div>
                <div class="absolute inset-0 opacity-15"
                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27%3E%3Cg fill=%27%23d4af37%27%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%2720%27 fill=%27none%27 stroke=%27%23d4af37%27 stroke-width=%271%27/%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%2710%27 fill=%27none%27 stroke=%27%23d4af37%27 stroke-width=%271%27/%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%273%27/%3E%3Ccircle cx=%2730%27 cy=%2710%27 r=%272%27/%3E%3Ccircle cx=%2730%27 cy=%2750%27 r=%272%27/%3E%3Ccircle cx=%2710%27 cy=%2730%27 r=%272%27/%3E%3Ccircle cx=%2750%27 cy=%2730%27 r=%272%27/%3E%3C/g%3E%3C/svg%3E');">
                </div>
            </div>

            <div class="relative z-10 text-white py-10 px-6 rounded-2xl shadow-2xl text-center space-y-6">
                <div class="inline-block">
                    <span class="text-emas text-sm tracking-[0.3em] uppercase">Save The Date</span>
                    <h3 class="font-serif text-3xl font-bold mt-1">Menuju Hari Bahagia</h3>
                </div>

                <div id="countdown" class="flex justify-center gap-3 flex-wrap">
                    <div class="countdown-box">
                        <div
                            class="bg-white/20 backdrop-blur-md rounded-xl p-4 min-w-[75px] border border-white/40 shadow-lg">
                            <span id="days" class="text-4xl font-bold block font-mono text-white">00</span>
                            <span class="text-[10px] uppercase tracking-widest text-white/80">Hari</span>
                        </div>
                    </div>
                    <div class="countdown-box">
                        <div
                            class="bg-white/20 backdrop-blur-md rounded-xl p-4 min-w-[75px] border border-white/40 shadow-lg">
                            <span id="hours" class="text-4xl font-bold block font-mono text-white">00</span>
                            <span class="text-[10px] uppercase tracking-widest text-white/80">Jam</span>
                        </div>
                    </div>
                    <div class="countdown-box">
                        <div
                            class="bg-white/20 backdrop-blur-md rounded-xl p-4 min-w-[75px] border border-white/40 shadow-lg">
                            <span id="minutes" class="text-4xl font-bold block font-mono text-white">00</span>
                            <span class="text-[10px] uppercase tracking-widest text-white/80">Menit</span>
                        </div>
                    </div>
                    <div class="countdown-box">
                        <div
                            class="bg-white/20 backdrop-blur-md rounded-xl p-4 min-w-[75px] border border-white/40 shadow-lg">
                            <span id="seconds" class="text-4xl font-bold block font-mono text-white">00</span>
                            <span class="text-[10px] uppercase tracking-widest text-white/80">Detik</span>
                        </div>
                    </div>
                </div>

                <p class="text-sm italic text-white/80 flex items-center justify-center gap-2">
                    <i class="fas fa-heart text-[#E9D0CB] animate-pulse"></i>
                    Mohon doa restu untuk kami
                    <i class="fas fa-heart text-[#E9D0CB] animate-pulse"></i>
                </p>
            </div>
        </section>

        <!-- Section: Acara -->
        <section id="acara" class="reveal-on-scroll">
            <!-- Elegant Header -->
            <div class="text-center mb-8">
                <p class="text-[#C89091] text-sm tracking-[0.3em] uppercase mb-2">Save The Date</p>
                <h2 class="font-script text-5xl text-[#7B4E48]">Rangkaian Acara</h2>
                <div class="flex items-center justify-center gap-3 mt-3">
                    <div class="w-12 h-px bg-[#C89091]/50"></div>
                    <span class="text-[#C89091]">❦</span>
                    <div class="w-12 h-px bg-[#C89091]/50"></div>
                </div>
            </div>

            <div class="space-y-6">
                <!-- Akad Nikah -->
                <div
                    class="bg-gradient-to-r from-[#E9D0CB]/30 to-[#DDB2B1]/20 p-6 rounded-2xl border border-[#C89091]/20 relative overflow-hidden">
                    <div class="absolute top-3 right-3 text-[#C89091]/20 text-4xl">💍</div>
                    <div class="text-center space-y-3">
                        <h3 class="font-serif text-2xl font-bold text-[#7B4E48]">Akad Nikah</h3>
                        <div class="space-y-1">
                            <p class="font-bold text-lg text-[#7B4E48]">Minggu, 3 Mei 2026</p>
                            <p class="text-[#C89091] font-semibold">Pukul 08:00 WIB - Selesai</p>
                        </div>
                        <div class="pt-2 border-t border-[#C89091]/20">
                            <p class="text-sm text-[#7B4E48]/80 leading-relaxed">
                                📍 Pendopo Rumah Dinas Bupati Sleman<br>
                                <span class="text-xs">Beran Kidul, Tridadi, Kec. Sleman, DIY</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Resepsi -->
                <div
                    class="bg-gradient-to-r from-[#DDB2B1]/20 to-[#E9D0CB]/30 p-6 rounded-2xl border border-[#C89091]/20 relative overflow-hidden">
                    <div class="absolute top-3 left-3 text-[#C89091]/20 text-4xl">🥂</div>
                    <div class="text-center space-y-3">
                        <h3 class="font-serif text-2xl font-bold text-[#7B4E48]">Resepsi</h3>
                        <div class="space-y-1">
                            <p class="font-bold text-lg text-[#7B4E48]">Minggu, 3 Mei 2026</p>
                            <p class="text-[#C89091] font-semibold">Pukul 11:00 - 12:00 WIB (Sesi 2)</p>
                        </div>
                        <div class="pt-2 border-t border-[#C89091]/20">
                            <p class="text-sm text-[#7B4E48]/80 leading-relaxed">
                                📍 Pendopo Rumah Dinas Bupati Sleman<br>
                                <span class="text-xs">Beran Kidul, Tridadi, Kec. Sleman, DIY</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Maps Button -->
            <a href="https://maps.app.goo.gl/aaZt9WmtbNTK7ubJ6" target="_blank"
                class="mt-6 flex items-center justify-center gap-2 w-full py-4 bg-gradient-to-r from-[#7B4E48] to-[#5a3a36] text-white rounded-full text-sm font-bold hover:shadow-lg transition transform hover:-translate-y-0.5">
                <i class="fas fa-map-marked-alt text-lg"></i>
                <span>Buka di Google Maps</span>
            </a>
        </section>

        <!-- Section: Gallery (Our Moment) -->
        <section id="gallery" class="reveal-on-scroll">
            <!-- Header -->
            <div class="text-center mb-6">
                <p class="text-[#C89091] text-sm tracking-[0.3em] uppercase mb-2">Gallery</p>
                <h2 class="font-script text-5xl text-[#7B4E48]">Our Moment</h2>
                <p class="text-sm text-[#7B4E48]/60 italic mt-2">"Setiap momen bersama adalah kenangan abadi"</p>
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="w-12 h-px bg-[#C89091]/40"></div>
                    <span class="text-[#C89091]">✦</span>
                    <div class="w-12 h-px bg-[#C89091]/40"></div>
                </div>
            </div>

            <!-- Masonry Gallery Grid -->
            <div class="grid grid-cols-2 gap-3">
                <!-- Row 1 -->
                <div class="rounded-xl overflow-hidden shadow-lg aspect-[3/4]">
                    <img src="https://images.unsplash.com/photo-1549417229-aa67d3263c09?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover hover:scale-110 transition duration-500" alt="Gallery 1">
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1550503023-e5781abe6aee?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover hover:scale-110 transition duration-500" alt="Gallery 2">
                </div>
                <!-- Row 2 -->
                <div class="rounded-xl overflow-hidden shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover hover:scale-110 transition duration-500" alt="Gallery 3">
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg aspect-[3/4]">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=400&auto=format&fit=crop"
                        class="w-full h-full object-cover hover:scale-110 transition duration-500" alt="Gallery 4">
                </div>
                <!-- Row 3 - Full width -->
                <div class="col-span-2 rounded-xl overflow-hidden shadow-lg aspect-video">
                    <img src="https://images.unsplash.com/photo-1591604466107-ec97de577aff?q=80&w=800&auto=format&fit=crop"
                        class="w-full h-full object-cover hover:scale-105 transition duration-500" alt="Gallery 5">
                </div>
            </div>
        </section>

        <!-- Section: RSVP & Wishes -->
        <section id="rsvp" class="space-y-8 reveal-on-scroll">
            <!-- Header -->
            <div class="text-center">
                <p class="text-[#C89091] text-sm tracking-[0.3em] uppercase mb-2">RSVP</p>
                <h2 class="font-serif text-3xl font-bold text-[#7B4E48]">Konfirmasi Kehadiran</h2>
                <div class="flex items-center justify-center gap-3 mt-3">
                    <div class="w-10 h-px bg-[#C89091]/40"></div>
                    <span class="text-[#C89091]">✦</span>
                    <div class="w-10 h-px bg-[#C89091]/40"></div>
                </div>
            </div>

            <div class="bg-merah-tua text-white p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-center text-sm mb-6 opacity-90">Partisipasi Anda sangat berarti bagi kami.</p>

                    @if(session('success'))
                        <div
                            class="bg-green-500/20 border border-green-500 text-green-100 px-4 py-3 rounded mb-4 text-sm text-center">
                            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('rsvp.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="relative">
                            <i class="fas fa-user absolute left-4 top-3.5 text-white/50"></i>
                            <input type="text" name="name" placeholder="Nama Lengkap" required
                                value="{{ $guest ? $guest->name : '' }}"
                                class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl placeholder-white/60 focus:outline-none focus:bg-white/20 transition">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative">
                                <i class="fas fa-clipboard-check absolute left-4 top-3.5 text-white/50"></i>
                                <select name="attendance"
                                    class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:bg-white/20 [&>option]:text-black appearance-none">
                                    <option value="yes">Hadir</option>
                                    <option value="no">Maaf</option>
                                    <option value="maybe">Ragu</option>
                                </select>
                            </div>
                            <div class="relative">
                                <i class="fas fa-users absolute left-4 top-3.5 text-white/50"></i>
                                <select name="guests"
                                    class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:bg-white/20 [&>option]:text-black appearance-none">
                                    <option value="1">1 Tamu</option>
                                    <option value="2">2 Tamu</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-gradient-to-r from-emas to-emas-tua text-white font-bold rounded-xl hover:shadow-[0_0_20px_rgba(212,175,55,0.6)] transition transform hover:-translate-y-1">
                            Kirim Konfirmasi
                        </button>
                    </form>
                </div>

                <!-- Decor Circles -->
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-2xl animate-pulse">
                </div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-white/5 rounded-full blur-2xl animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>

            <!-- Wishes Feed -->
            <div class="space-y-6">
                <div class="text-center">
                    <p class="text-[#C89091] text-sm tracking-[0.3em] uppercase mb-2">Wishes</p>
                    <h3 class="font-serif text-3xl font-bold text-[#7B4E48]">Ucapan & Doa</h3>
                    <div class="flex items-center justify-center gap-3 mt-3">
                        <div class="w-10 h-px bg-[#C89091]/40"></div>
                        <span class="text-[#C89091]">♥</span>
                        <div class="w-10 h-px bg-[#C89091]/40"></div>
                    </div>
                </div>

                <form action="{{ route('wishes.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 space-y-3">
                        <input type="text" name="name" placeholder="Nama Anda" required
                            value="{{ $guest ? $guest->name : '' }}"
                            class="w-full px-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-merah-tua/20 focus:border-merah-tua">
                        <textarea name="message" placeholder="Tulis ucapan & doa..." rows="3"
                            class="w-full px-4 py-3 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-merah-tua/20 focus:border-merah-tua resize-none"></textarea>

                        <!-- Video Upload -->
                        <div class="relative">
                            <input type="file" name="video" id="video-input" accept="video/*" capture="user"
                                class="hidden" onchange="previewVideo(this)">
                            <label for="video-input"
                                class="flex items-center justify-center gap-2 w-full py-3 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-merah-tua hover:bg-merah-tua/5 transition">
                                <i class="fas fa-video text-merah-tua"></i>
                                <span class="text-sm text-gray-600">Tambah Video Ucapan (Opsional)</span>
                            </label>
                            <div id="video-preview" class="hidden mt-3">
                                <video id="preview-player" controls class="w-full rounded-lg"></video>
                                <button type="button" onclick="removeVideo()"
                                    class="mt-2 text-xs text-red-500 hover:underline">
                                    <i class="fas fa-times"></i> Hapus Video
                                </button>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-merah-tua to-merah-sedang text-white font-bold rounded-lg hover:shadow-lg transition flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i> Kirim Ucapan
                        </button>
                    </div>
                </form>

                <script>
                    function previewVideo(input) {
                        if (input.files && input.files[0]) {
                            const file = input.files[0];
                            const url = URL.createObjectURL(file);
                            document.getElementById('preview-player').src = url;
                            document.getElementById('video-preview').classList.remove('hidden');
                        }
                    }
                    function removeVideo() {
                        document.getElementById('video-input').value = '';
                        document.getElementById('video-preview').classList.add('hidden');
                        document.getElementById('preview-player').src = '';
                    }
                </script>

                <div class="max-h-80 overflow-y-auto space-y-4 custom-scrollbar pr-1 pb-4">
                    @foreach($wishes as $wish)
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                            <i class="fas fa-quote-right absolute top-4 right-4 text-gray-100 text-4xl"></i>
                            <div class="flex items-center gap-3 mb-2">
                                <DIV
                                    class="w-8 h-8 rounded-full bg-merah-tua/10 flex items-center justify-center text-merah-tua font-bold text-xs">
                                    {{ substr($wish->name, 0, 1) }}
                                </DIV>
                                <div>
                                    <h4 class="font-bold text-sm text-merah-tua">{{ $wish->name }}</h4>
                                    <span class="text-[10px] text-gray-400 flex items-center gap-1">
                                        <i class="far fa-clock"></i> {{ $wish->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                            @if($wish->message)
                                <p class="text-sm text-gray-600 leading-relaxed italic">"{{ $wish->message }}"</p>
                            @endif
                            @if($wish->video_path)
                                <div class="mt-3">
                                    <video controls class="w-full rounded-lg shadow-sm" preload="metadata">
                                        <source src="{{ asset($wish->video_path) }}" type="video/mp4">
                                        Browser tidak mendukung video.
                                    </video>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section: Amplop Digital / Hadiah -->
        <section id="gift" class="reveal-on-scroll">
            <div
                class="bg-gradient-to-b from-[#E9D0CB]/40 to-[#DDB2B1]/30 py-10 px-4 rounded-3xl relative overflow-hidden border border-[#C89091]/20">
                <!-- Gold Border Frame -->
                <div class="absolute inset-3 border border-[#C89091]/30 rounded-2xl pointer-events-none"></div>

                <!-- Decorative Top Ornament -->
                <div class="text-center mb-4">
                    <div class="inline-block text-[#7B4E48]/40 text-3xl">❧</div>
                </div>

                <!-- Title -->
                <div class="text-center space-y-3 mb-8 relative z-10">
                    <h2 class="font-script text-5xl text-[#7B4E48]">Wedding Gift</h2>
                    <p class="text-sm text-[#7B4E48]/70 leading-relaxed italic max-w-xs mx-auto">
                        Tanpa mengurangi rasa hormat, bagi rekan-rekan dan sahabat yang hendak memberikan
                        tanda kasih untuk kami, dapat melalui nomor rekening di bawah ini.
                    </p>
                </div>

                <!-- Bank Accounts -->
                <div class="space-y-5 relative z-10">
                    <!-- Bank 1 -->
                    <div class="text-center space-y-1">
                        <p class="text-[#C89091] text-sm font-bold uppercase tracking-wider">Bank Mandiri</p>
                        <p class="text-[#7B4E48] text-lg font-mono tracking-wider">No. Rekening 1370018832143</p>
                        <p class="text-[#7B4E48]/70 text-sm">a.n <span class="font-bold">AHYA SAFIRA</span></p>
                        <button onclick="copyRekening('rek1')"
                            class="mt-2 inline-flex items-center gap-2 px-5 py-2 bg-[#7B4E48] text-white text-sm rounded-full hover:bg-[#5a3a36] transition shadow-md">
                            Copy Rekening <i class="fas fa-copy"></i>
                        </button>
                        <input type="hidden" id="rek1" value="1370018832143">
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center justify-center gap-4">
                        <div class="w-12 h-px bg-[#C89091]/40"></div>
                        <span class="text-[#C89091]">♥</span>
                        <div class="w-12 h-px bg-[#C89091]/40"></div>
                    </div>

                    <!-- Gift Box Icon -->
                    <div class="text-center">
                        <div class="inline-block text-[#C89091] text-4xl">🎁</div>
                    </div>

                    <!-- Physical Gift Address -->
                    <div class="text-center space-y-1">
                        <p class="text-[#C89091] text-sm font-bold uppercase tracking-wider">Kirim Kado:</p>
                        <p class="text-[#7B4E48]/80 text-sm leading-relaxed">
                            Rumah Ahya Safira<br>
                            Panggeran IX RT 03/RW 34<br>
                            Triharjo, Sleman
                        </p>
                        <button onclick="copyAlamat()"
                            class="mt-2 inline-flex items-center gap-2 px-5 py-2 bg-[#7B4E48] text-white text-sm rounded-full hover:bg-[#5a3a36] transition shadow-md">
                            Copy Alamat <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Decorative Bottom -->
                <div class="text-center mt-6">
                    <div class="inline-block text-[#7B4E48]/40 text-3xl rotate-180">❧</div>
                </div>
            </div>

            <!-- Copy notification -->
            <div id="copy-toast"
                class="fixed bottom-20 left-1/2 -translate-x-1/2 bg-green-600 text-white px-6 py-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 z-50">
                <i class="fas fa-check mr-2"></i> Berhasil disalin!
            </div>

            <script>
                function copyRekening(id) {
                    const rek = document.getElementById(id).value;
                    navigator.clipboard.writeText(rek);
                    showToast();
                }
                function copyAlamat() {
                    navigator.clipboard.writeText('Rumah Ahya Safira, Panggeran IX RT 03/RW 34, Triharjo, Sleman');
                    showToast();
                }
                function showToast() {
                    const toast = document.getElementById('copy-toast');
                    toast.classList.remove('opacity-0');
                    toast.classList.add('opacity-100');
                    setTimeout(() => {
                        toast.classList.remove('opacity-100');
                        toast.classList.add('opacity-0');
                    }, 2000);
                }
            </script>
        </section>

        <!-- Section: Thank You (Terima Kasih) -->
        <section
            class="reveal-blur -mx-6 px-6 py-16 bg-gradient-to-b from-[#7B4E48] to-[#5a3a36] text-white relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-4 left-1/2 -translate-x-1/2 text-[#E9D0CB]/30 text-6xl">✦</div>
            <div class="absolute bottom-4 left-4 text-[#DDB2B1]/20 text-4xl">✧</div>
            <div class="absolute bottom-4 right-4 text-[#DDB2B1]/20 text-4xl">✧</div>

            <div class="relative z-10 text-center space-y-6">
                <h2 class="font-script text-6xl text-white drop-shadow-lg">Thank You</h2>

                <div class="flex items-center justify-center gap-3">
                    <div class="w-16 h-px bg-gradient-to-r from-transparent to-[#E9D0CB]/50"></div>
                    <span class="text-[#E9D0CB]/60">❦</span>
                    <div class="w-16 h-px bg-gradient-to-l from-transparent to-[#E9D0CB]/50"></div>
                </div>

                <p class="font-serif text-sm uppercase tracking-[0.3em] text-[#E9D0CB]/80">The Honorable</p>

                <!-- Guest Name Box -->
                <div class="inline-block border-2 border-[#E9D0CB]/50 px-8 py-3 rounded-lg backdrop-blur-sm">
                    <p class="font-serif text-xl">{{ $guest ? $guest->name : 'Bapak/Ibu/Saudara/i' }}</p>
                </div>

                <p class="text-sm text-white/80 leading-relaxed max-w-xs mx-auto">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir
                    untuk memberikan doa restu.
                </p>

                <!-- Couple Names -->
                <div class="pt-6">
                    <p class="font-sans text-xs uppercase tracking-widest text-[#E9D0CB]/70 mb-2">Kami yang
                        berbahagia
                    </p>
                    <h3 class="font-script text-4xl text-[#E9D0CB]">Fira & Eko</h3>
                </div>

                <!-- Hearts decoration -->
                <div class="flex items-center justify-center gap-4 pt-4">
                    <span class="text-[#DDB2B1]/40">♡</span>
                    <span class="text-[#E9D0CB]/60">♥</span>
                    <span class="text-[#DDB2B1]/40">♡</span>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center pt-8 pb-4">
            <p class="font-script text-3xl text-merah-tua mb-2">Fira & Eko</p>
            <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-4">Created with Love • 2026</p>
            <div class="pt-3 border-t border-gray-200">
                <p class="text-[10px] text-gray-400">Made by</p>
                <a href="https://instagram.com/nau.zhar_" target="_blank"
                    class="inline-flex items-center gap-1 text-sm text-[#7B4E48] hover:text-[#C89091] transition">
                    <i class="fab fa-instagram"></i> @nau.zhar_
                </a>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script>
        // Opening Logic
        function openInvitation() {
            const cover = document.getElementById('cover');
            const mainContent = document.getElementById('main-content');

            cover.style.transform = 'translateY(-100%)';

            setTimeout(() => {
                mainContent.classList.remove('opacity-0');
            }, 500);

            toggleMusic();
        }

        // Countdown Logic
        const weddingDate = new Date('2026-05-03T08:00:00').getTime();
        const countdownInterval = setInterval(() => {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerText = days < 10 ? '0' + days : days;
            document.getElementById('hours').innerText = hours < 10 ? '0' + hours : hours;
            document.getElementById('minutes').innerText = minutes < 10 ? '0' + minutes : minutes;
            document.getElementById('seconds').innerText = seconds < 10 ? '0' + seconds : seconds;

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById('countdown').innerHTML = "<p class='text-2xl font-bold text-emas'>🎉 Acara Telah Dimulai! 🎉</p>";
            }
        }, 1000);

        // Scroll Animation (Intersection Observer)
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Select all elements with reveal animations
            const revealElements = document.querySelectorAll('.reveal-on-scroll, .reveal-left, .reveal-right, .reveal-scale, .reveal-rotate, .reveal-blur');
            revealElements.forEach((el, index) => {
                // Add staggered delay for sequential reveal
                el.style.transitionDelay = `${index * 0.1}s`;
                observer.observe(el);
            });
        });
    </script>
</x-layout>