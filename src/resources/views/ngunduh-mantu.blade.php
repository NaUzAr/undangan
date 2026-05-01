<x-layout-matcha>
    <div class="fixed inset-0 bg-noise pointer-events-none z-0 mix-blend-multiply opacity-20"></div>

    <div id="cover"
        class="fixed inset-0 z-50 flex flex-col items-center justify-center text-center p-6 transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] overflow-hidden {{ session('skip_cover') ? 'translate-y-[-100%] opacity-0' : '' }}"
        style="background: linear-gradient(180deg, #F0F7F0 0%, #D9EDD5 35%, #A8CFA0 70%, #6B9E6B 100%);">

        <div class="matcha-cover-ring" style="width:300px;height:300px;animation-delay:0s;"></div>
        <div class="matcha-cover-ring" style="width:450px;height:450px;animation-delay:2s;"></div>
        <div class="matcha-cover-ring" style="width:600px;height:600px;animation-delay:4s;"></div>

        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            @for($i = 0; $i < 15; $i++)
                <svg class="matcha-leaf"
                    style="left:{{ rand(2, 95) }}%;--delay:{{ $i * 0.7 }}s;--duration:{{ rand(10, 16) }}s;" width="22"
                    height="22" viewBox="0 0 22 22">
                    <ellipse cx="11" cy="11" rx="9" ry="4" fill="rgba(75,130,75,0.{{ rand(2, 5) }})"
                        transform="rotate({{ rand(0, 180) }} 11 11)" />
                    <line x1="11" y1="7" x2="11" y2="15" stroke="rgba(75,130,75,0.{{ rand(1, 3) }})" stroke-width="0.5" />
                </svg>
            @endfor
        </div>

        <div class="text-center space-y-5 relative z-10 px-8">
            <div class="matcha-section-divider mb-4">
                <span class="text-[#3A7D52] text-2xl">❦</span>
            </div>

            <p class="font-sans tracking-[0.5em] text-[#1A3A28]/70 text-[10px] uppercase">Ngunduh Mantu</p>

            <h1 class="font-script text-7xl text-[#2D5A3D] leading-tight drop-shadow-sm"
                style="text-shadow: 0 2px 20px rgba(45,90,61,0.15);">
                Eko<br>
                <span class="matcha-gold-shimmer text-4xl font-script">&</span><br>
                Ahya
            </h1>

            <div
                class="inline-block bg-white/50 backdrop-blur-sm px-8 py-2.5 rounded-full border border-[#6B9E6B]/30 shadow-sm">
                <p class="font-serif text-lg text-[#2D5A3D] tracking-wide">10 Mei 2026</p>
            </div>

            <div class="matcha-section-divider mt-4">
                <span class="text-[#3A7D52]/60 text-sm">✧ ✦ ✧</span>
            </div>
        </div>

        <p class="font-sans mb-2 tracking-[0.3em] text-xs uppercase relative z-10 text-[#1A3A28]/80 mt-10">Kepada Yth.
        </p>
        <div
            class="font-serif font-bold text-lg mb-8 matcha-glass-card px-8 py-3 rounded-full relative z-10 text-[#2D5A3D]">
            {{ $guest ? $guest->name : 'Bapak/Ibu/Saudara/i' }}
        </div>

        <button onclick="openInvitation()"
            class="envelope-icon group relative px-10 py-4 bg-gradient-to-r from-[#2D5A3D] to-[#1A3A28] text-white font-serif font-bold rounded-full shadow-[0_4px_24px_rgba(45,90,61,0.4)] hover:shadow-[0_8px_32px_rgba(45,90,61,0.6)] hover:scale-105 transition-all duration-500 z-10">
            <i class="fas fa-envelope-open mr-2 group-hover:animate-bounce"></i> Buka Undangan
        </button>
    </div>

    <div id="main-content"
        class="relative z-10 transition-opacity duration-1000 px-6 pt-12 pb-24 space-y-20 {{ session('skip_cover') ? 'opacity-100' : 'opacity-0' }}">

        <div class="fixed inset-0 pointer-events-none z-5 overflow-hidden" id="main-petals">
            @for($p = 0; $p < 12; $p++)
                <svg class="matcha-leaf"
                    style="left:{{ rand(2, 96) }}%;--delay:{{ $p * 1.2 }}s;--duration:{{ rand(11, 18) }}s;" width="16"
                    height="16" viewBox="0 0 20 20">
                    <ellipse cx="10" cy="10" rx="7" ry="3.5" fill="rgba(75,130,75,0.{{ rand(2, 4) }})"
                        transform="rotate({{ rand(0, 360) }} 10 10)" />
                </svg>
            @endfor
        </div>

        <div class="matcha-sparkle-dot" style="left:8%;top:18%;--delay:0s;--duration:4s;"></div>
        <div class="matcha-sparkle-dot" style="left:88%;top:12%;--delay:1.5s;--duration:3.5s;"></div>
        <div class="matcha-sparkle-dot" style="left:15%;top:55%;--delay:0.8s;--duration:4.5s;"></div>
        <div class="matcha-sparkle-dot" style="left:92%;top:42%;--delay:2s;--duration:3s;"></div>
        <div class="matcha-sparkle-dot" style="left:6%;top:78%;--delay:1s;--duration:5s;"></div>
        <div class="matcha-sparkle-dot" style="left:82%;top:82%;--delay:2.5s;--duration:3.8s;"></div>

        <section id="home" class="text-center pt-6 reveal-on-scroll relative">
            <div class="space-y-5">
                <p class="text-[#3A7D52] text-xs tracking-[0.5em] uppercase font-medium">Ngunduh Mantu</p>
                <h1 class="font-script text-7xl text-[#1A3A28] drop-shadow-sm leading-tight">Eko & Ahya</h1>
                <div class="inline-block matcha-glass-card px-8 py-3 rounded-full">
                    <p class="font-serif text-xl text-[#2D5A3D]">Ahad Pahing, 10 Mei 2026</p>
                </div>
            </div>

            <div class="matcha-section-divider py-8">
                <span class="text-[#3A7D52] text-2xl">❦</span>
            </div>

            <div class="matcha-glass-card rounded-2xl p-7 mx-2">
                <p class="font-serif italic text-sm text-[#2D5A3D]/80 leading-relaxed">
                    "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu isteri-isteri dari jenismu
                    sendiri, supaya kamu cenderung dan merasa tenteram kepadanya."
                </p>
                <div class="flex items-center justify-center gap-3 mt-4">
                    <div class="w-8 h-px bg-[#6B9E6B]/40"></div>
                    <p class="text-xs font-bold text-[#6B9E6B] tracking-widest uppercase">QS. AR-RUM: 21</p>
                    <div class="w-8 h-px bg-[#6B9E6B]/40"></div>
                </div>
            </div>
        </section>

        <div class="matcha-section-divider py-6">
            <span class="text-[#3A7D52]/60 text-xl">✧</span>
        </div>

        <section id="mempelai" class="reveal-on-scroll">
            <div class="py-8 px-2 relative">
                <div class="space-y-10">
                    <div class="text-center group">
                        <div class="relative inline-block">
                            <div class="matcha-photo-frame w-48 h-48 mx-auto rounded-full p-1.5">
                                <div
                                    class="w-full h-full rounded-full border-4 border-white overflow-hidden shadow-xl bg-gradient-to-br from-[#2D5A3D] to-[#6B9E6B] p-0.5">
                                    <img src="{{ asset('img/mempelai/pria.jpeg') }}"
                                        class="w-full h-full rounded-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        alt="Eko Prasetyo">
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#2D5A3D] to-[#6B9E6B] text-white text-xs font-bold px-6 py-1.5 rounded-full shadow-lg">
                                Mempelai Pria
                            </div>
                        </div>
                        <h2 class="font-script text-5xl text-[#1A3A28] mt-7 mb-2">Eko Prasetyo</h2>
                        <p class="font-sans text-xs font-medium tracking-widest text-[#2D5A3D]/80 uppercase">
                            Putra Pertama dari Bpk. Wakidi & Ibu Suyatni
                        </p>
                        <a href="https://instagram.com/eko_prasetyo07" target="_blank"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-[#2D5A3D]/10 text-[#2D5A3D] text-sm rounded-full hover:bg-[#2D5A3D] hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                            @eko_prasetyo07
                        </a>
                    </div>

                    <div class="flex items-center justify-center gap-4">
                        <div class="w-20 h-px bg-gradient-to-r from-transparent to-[#3A7D52]/60"></div>
                        <div class="text-4xl text-[#3A7D52] heart-beat">♥</div>
                        <div class="w-20 h-px bg-gradient-to-l from-transparent to-[#3A7D52]/60"></div>
                    </div>

                    <div class="text-center group">
                        <div class="relative inline-block">
                            <div class="matcha-photo-frame w-48 h-48 mx-auto rounded-full p-1.5">
                                <div
                                    class="w-full h-full rounded-full border-4 border-white overflow-hidden shadow-xl bg-gradient-to-br from-[#6B9E6B] to-[#3A7D52] p-0.5">
                                    <img src="{{ asset('img/mempelai/wanita.jpeg') }}"
                                        class="w-full h-full rounded-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        alt="Ahya Safira">
                                </div>
                            </div>
                            <div
                                class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-[#6B9E6B] to-[#3A7D52] text-white text-xs font-bold px-6 py-1.5 rounded-full shadow-lg">
                                Mempelai Wanita
                            </div>
                        </div>
                        <h2 class="font-script text-5xl text-[#1A3A28] mt-7 mb-2">Ahya Safira</h2>
                        <p class="font-sans text-xs font-medium tracking-widest text-[#2D5A3D]/80 uppercase">
                            Putri Terakhir dari Bpk. Haryanta & Ibu Ratri Dwi Wahyuni
                        </p>
                        <a href="https://instagram.com/ahyasafiraa_" target="_blank"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-[#2D5A3D]/10 text-[#2D5A3D] text-sm rounded-full hover:bg-[#2D5A3D] hover:text-white transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                            @ahyasafiraa_
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative reveal-blur">
            <div class="absolute inset-0 rounded-2xl overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#F0F7F0] to-[#D9EDD5]"></div>
                <div class="absolute inset-0 opacity-20"
                    style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2760%27 height=%2760%27 viewBox=%270 0 60 60%27%3E%3Cg fill=%27%236B9E6B%27%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%2720%27 fill=%27none%27 stroke=%27%236B9E6B%27 stroke-width=%271%27/%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%2710%27 fill=%27none%27 stroke=%27%236B9E6B%27 stroke-width=%271%27/%3E%3Ccircle cx=%2730%27 cy=%2730%27 r=%273%27/%3E%3Ccircle cx=%2730%27 cy=%2710%27 r=%272%27/%3E%3Ccircle cx=%2730%27 cy=%2750%27 r=%272%27/%3E%3Ccircle cx=%2710%27 cy=%2730%27 r=%272%27/%3E%3Ccircle cx=%2750%27 cy=%2730%27 r=%272%27/%3E%3C/g%3E%3C/svg%3E');">
                </div>
            </div>

            <div
                class="relative z-10 text-[#1A3A28] py-10 px-6 rounded-2xl shadow-sm text-center space-y-6 border border-[#6B9E6B]/20">
                <div class="inline-block">
                    <span class="text-[#3A7D52] text-sm tracking-[0.3em] uppercase font-bold">Save The Date</span>
                    <h3 class="font-serif text-3xl font-bold mt-1">Menuju Hari Bahagia</h3>
                </div>

                <div id="countdown" class="flex justify-center gap-3 flex-wrap">
                    @foreach(['days' => 'Hari', 'hours' => 'Jam', 'minutes' => 'Menit', 'seconds' => 'Detik'] as $id => $label)
                        <div class="countdown-box">
                            <div
                                class="bg-white/60 backdrop-blur-md rounded-xl p-4 min-w-[75px] border border-[#6B9E6B]/30 shadow-sm">
                                <span id="{{ $id }}" class="text-4xl font-bold block font-mono text-[#1A3A28]">00</span>
                                <span
                                    class="text-[10px] uppercase tracking-widest text-[#3A7D52] font-bold">{{ $label }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <p class="text-sm italic text-[#1A3A28]/80 flex items-center justify-center gap-2">
                    <i class="fas fa-leaf text-[#6B9E6B] animate-pulse"></i>
                    Mohon doa restu untuk kami
                    <i class="fas fa-leaf text-[#6B9E6B] animate-pulse"></i>
                </p>
            </div>
        </section>

        <section id="acara" class="reveal-on-scroll">
            <div class="text-center mb-8">
                <p class="text-[#6B9E6B] text-sm tracking-[0.3em] uppercase mb-2">Save The Date</p>
                <h2 class="font-script text-5xl text-[#2D5A3D]">Rangkaian Acara</h2>
                <div class="flex items-center justify-center gap-3 mt-3">
                    <div class="w-12 h-px bg-[#6B9E6B]/50"></div>
                    <span class="text-[#6B9E6B]">❦</span>
                    <div class="w-12 h-px bg-[#6B9E6B]/50"></div>
                </div>
            </div>

            <div class="space-y-6">
                <div
                    class="bg-gradient-to-r from-[#D4E8C8]/40 to-[#B4D8B0]/30 p-6 rounded-2xl border border-[#6B9E6B]/20 relative overflow-hidden">
                    <div class="absolute top-3 right-3 text-[#6B9E6B]/15 text-4xl">💍</div>
                    <div class="text-center space-y-3">
                        <h3 class="font-serif text-2xl font-bold text-[#2D5A3D]">Akad Nikah</h3>
                        <div class="space-y-1">
                            <p class="font-bold text-lg text-[#2D5A3D]">Ahad Kliwon, 3 Mei 2026</p>
                            <p class="text-[#3A7D52] font-semibold">Pukul 08:00 WIB - Selesai</p>
                        </div>
                        <div class="pt-2 border-t border-[#6B9E6B]/20">
                            <p class="text-sm text-[#2D5A3D]/80 leading-relaxed">
                                📍 Pendopo Rumah Dinas Bupati Sleman<br>
                                <span class="text-xs">Beran Kidul, Tridadi, Kec. Sleman, DIY</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-r from-[#B4D8B0]/30 to-[#D4E8C8]/40 p-6 rounded-2xl border border-[#6B9E6B]/20 relative overflow-hidden">
                    <div class="absolute top-3 left-3 text-[#6B9E6B]/15 text-4xl">🍵</div>
                    <div class="text-center space-y-3">
                        <h3 class="font-serif text-2xl font-bold text-[#2D5A3D]">Ngunduh Mantu</h3>
                        <div class="space-y-1">
                            <p class="font-bold text-lg text-[#2D5A3D]">Ahad Pahing, 10 Mei 2026</p>
                            <p class="text-[#3A7D52] font-semibold">Pukul 10:00 WIB - Selesai</p>
                        </div>
                        <div class="pt-2 border-t border-[#6B9E6B]/20">
                            <p class="text-sm font-medium text-[#1A3A28] leading-relaxed">
                                📍 Lokasi Tasyakur<br>
                                <span class="text-xs">Tegalan, RT 004 RW 011, Sidomoyo, Godean, Sleman</span>
                            </p>
                            <p
                                class="text-[11px] text-[#1A3A28] font-medium mt-2 bg-white/80 p-2.5 rounded-lg border border-[#6B9E6B]/30 shadow-sm">
                                <strong>Titik Kenal:</strong> Dekat Masjid Darussalam Tegalan.<br>
                                Akses melalui Jalan Sidomoyo (dari arah Perempatan Cebongan ke selatan) atau Jalan
                                Godean KM 7,5 (dari Perempatan Munggur ke utara).
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="https://maps.app.goo.gl/yT3gB7aR8jGySNgk6?g_st=iw" target="_blank"
                class="mt-6 flex items-center justify-center gap-2 w-full py-4 bg-[#2D5A3D] text-white rounded-full text-sm font-bold hover:bg-[#1A3A28] hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                <i class="fas fa-map-marked-alt text-lg"></i>
                <span>Buka di Google Maps</span>
            </a>
        </section>

        <section id="gallery" class="reveal-on-scroll">
            <div class="text-center mb-8">
                <p class="text-[#3A7D52] text-xs tracking-[0.5em] uppercase mb-2">Gallery</p>
                <h2 class="font-script text-5xl text-[#1A3A28]">Our Moment</h2>
                <p class="text-sm text-[#2D5A3D]/60 italic mt-2">"Setiap momen bersama adalah kenangan abadi"</p>
                <div class="matcha-section-divider mt-4">
                    <span class="text-[#6B9E6B]">✦</span>
                </div>
            </div>

            @php
                // 5 curated photos: 2 portrait, 1 landscape, 2 portrait
                $gallery_photos = [2, 4, 11, 8, 6];
            @endphp

            <div class="gallery-grid-212">
                <div class="gallery-row gallery-row-pair">
                    <div class="gallery-card" onclick="openLightbox(0)">
                        <img src="{{ asset('img/gallery/' . $gallery_photos[0] . '.jpeg') }}" alt="Gallery 1"
                            loading="lazy">
                    </div>
                    <div class="gallery-card" onclick="openLightbox(1)">
                        <img src="{{ asset('img/gallery/' . $gallery_photos[1] . '.jpeg') }}" alt="Gallery 2"
                            loading="lazy">
                    </div>
                </div>
                <div class="gallery-row gallery-row-single">
                    <div class="gallery-card gallery-card-wide" onclick="openLightbox(2)">
                        <img src="{{ asset('img/gallery/' . $gallery_photos[2] . '.jpeg') }}" alt="Gallery 3"
                            loading="lazy">
                    </div>
                </div>
                <div class="gallery-row gallery-row-pair">
                    <div class="gallery-card" onclick="openLightbox(3)">
                        <img src="{{ asset('img/gallery/' . $gallery_photos[3] . '.jpeg') }}" alt="Gallery 4"
                            loading="lazy">
                    </div>
                    <div class="gallery-card" onclick="openLightbox(4)">
                        <img src="{{ asset('img/gallery/' . $gallery_photos[4] . '.jpeg') }}" alt="Gallery 5"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </section>


        <div id="lightbox" class="lightbox-modal" onclick="onLightboxClick(event)">
            <div class="lightbox-backdrop"></div>
            <button class="lightbox-close" onclick="closeLightbox()">
                <i class="fas fa-times"></i>
            </button>

            <div class="lightbox-counter">
                <span id="lightbox-counter">1 / 5</span>
            </div>

            <button class="lightbox-nav lightbox-nav-prev" onclick="navigateLightbox(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="lightbox-img-container">
                <img id="lightbox-img" src="" class="lightbox-img" alt="Gallery">
            </div>

            <button class="lightbox-nav lightbox-nav-next" onclick="navigateLightbox(1)">
                <i class="fas fa-chevron-right"></i>
            </button>

            <div class="lightbox-thumbs-container">
                <div class="lightbox-thumbs-track custom-scrollbar">
                    @foreach($gallery_photos as $i => $photo)
                        <img src="{{ asset('img/gallery/' . $photo . '.jpeg') }}" class="lightbox-thumb-img"
                            onclick="goToLightbox({{ $i }})" data-index="{{ $i }}" loading="lazy">
                    @endforeach
                </div>
            </div>
        </div>

        <section id="rsvp" class="space-y-8 reveal-on-scroll">
            <div class="text-center">
                <p class="text-[#3A7D52] text-xs tracking-[0.5em] uppercase mb-2">RSVP</p>
                <h2 class="font-serif text-3xl font-bold text-[#1A3A28]">Konfirmasi Kehadiran</h2>
                <div class="matcha-section-divider mt-3">
                    <span class="text-[#6B9E6B]">✦</span>
                </div>
            </div>

            <div class="matcha-glass-card-dark text-white p-8 rounded-3xl relative overflow-hidden">
                <div class="relative z-10">
                    <p class="text-center text-sm mb-6 opacity-90">Partisipasi Anda sangat berarti bagi kami.</p>

                    @if(session('success'))
                        <div
                            class="bg-green-500/20 border border-green-400 text-green-100 px-4 py-3 rounded mb-4 text-sm text-center">
                            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('rsvp.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="event_type" value="ngunduh_mantu">
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
                            class="w-full py-4 bg-gradient-to-r from-[#6B9E6B] to-[#3A7D52] text-white font-bold rounded-xl hover:shadow-[0_0_20px_rgba(107,158,107,0.6)] transition transform hover:-translate-y-1">
                            Kirim Konfirmasi
                        </button>
                    </form>
                </div>

                <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#6B9E6B]/10 rounded-full blur-2xl animate-pulse">
                </div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#6B9E6B]/10 rounded-full blur-2xl animate-pulse"
                    style="animation-delay: 1s;"></div>
            </div>

            <div class="space-y-6">
                <div class="text-center">
                    <p class="text-[#6B9E6B] text-sm tracking-[0.3em] uppercase mb-2">Wishes</p>
                    <h3 class="font-serif text-3xl font-bold text-[#2D5A3D]">Ucapan & Doa</h3>
                    <div class="flex items-center justify-center gap-3 mt-3">
                        <div class="w-10 h-px bg-[#6B9E6B]/40"></div>
                        <span class="text-[#6B9E6B]">♥</span>
                        <div class="w-10 h-px bg-[#6B9E6B]/40"></div>
                    </div>
                </div>

                <form action="{{ route('wishes.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf
                    <input type="hidden" name="event_type" value="ngunduh_mantu">
                    <div class="bg-white p-4 rounded-xl shadow-md border border-[#B4D8B0]/30 space-y-3">
                        <input type="text" name="name" placeholder="Nama Anda" required
                            value="{{ $guest ? $guest->name : '' }}"
                            class="w-full px-4 py-3 text-sm bg-[#F0F7F0] border border-[#B4D8B0]/40 rounded-lg focus:ring-2 focus:ring-[#2D5A3D]/20 focus:border-[#2D5A3D]">
                        <textarea name="message" placeholder="Tulis ucapan & doa..." rows="3"
                            class="w-full px-4 py-3 text-sm bg-[#F0F7F0] border border-[#B4D8B0]/40 rounded-lg focus:ring-2 focus:ring-[#2D5A3D]/20 focus:border-[#2D5A3D] resize-none"></textarea>

                        <div class="relative">
                            <input type="file" name="video" id="video-input" accept="video/*" capture="user"
                                class="hidden" onchange="previewVideo(this)">
                            <label for="video-input"
                                class="flex items-center justify-center gap-2 w-full py-3 border-2 border-dashed border-[#B4D8B0] rounded-lg cursor-pointer hover:border-[#2D5A3D] hover:bg-[#2D5A3D]/5 transition">
                                <i class="fas fa-video text-[#2D5A3D]"></i>
                                <span class="text-sm text-[#4A7A4A]">Tambah Video Ucapan (Opsional)</span>
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
                            class="w-full py-3 bg-gradient-to-r from-[#2D5A3D] to-[#3A7D52] text-white font-bold rounded-lg hover:shadow-lg transition flex items-center justify-center gap-2">
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

                <div class="max-h-80 overflow-y-auto space-y-4 matcha-custom-scrollbar pr-1 pb-4">
                    @foreach($wishes as $wish)
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-[#B4D8B0]/30 relative">
                            <i class="fas fa-quote-right absolute top-4 right-4 text-[#D4E8C8] text-4xl"></i>
                            <div class="flex items-center gap-3 mb-2">
                                <div
                                    class="w-8 h-8 rounded-full bg-[#2D5A3D]/10 flex items-center justify-center text-[#2D5A3D] font-bold text-xs">
                                    {{ substr($wish->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm text-[#2D5A3D]">{{ $wish->name }}</h4>
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

        <section id="gift" class="reveal-on-scroll">
            <div
                class="bg-gradient-to-b from-[#D4E8C8]/50 to-[#B4D8B0]/40 py-10 px-4 rounded-3xl relative overflow-hidden border border-[#6B9E6B]/20">
                <div class="absolute inset-3 border border-[#6B9E6B]/25 rounded-2xl pointer-events-none"></div>

                <div class="text-center mb-4">
                    <div class="inline-block text-[#2D5A3D]/40 text-3xl">❧</div>
                </div>

                <div class="text-center space-y-3 mb-8 relative z-10">
                    <h2 class="font-script text-5xl text-[#2D5A3D]">Wedding Gift</h2>
                    <p class="text-sm text-[#2D5A3D]/70 leading-relaxed italic max-w-xs mx-auto">
                        Tanpa mengurangi rasa hormat, bagi rekan-rekan dan sahabat yang hendak memberikan
                        tanda kasih untuk kami, dapat melalui nomor rekening di bawah ini.
                    </p>
                </div>

                <div class="space-y-5 relative z-10">
                    <div class="text-center space-y-1">
                        <p class="text-[#3A7D52] text-sm font-bold uppercase tracking-wider">Bank BPD DIY</p>
                        <p class="text-[#2D5A3D] text-lg font-mono tracking-wider">No. Rekening 005221031239</p>
                        <p class="text-[#2D5A3D]/70 text-sm">a.n <span class="font-bold">EKO PRASETYO</span></p>
                        <button onclick="copyRekening('rek1')"
                            class="mt-2 inline-flex items-center gap-2 px-5 py-2 bg-[#2D5A3D] text-white text-sm rounded-full hover:bg-[#1A3A28] transition shadow-md">
                            Copy Rekening <i class="fas fa-copy"></i>
                        </button>
                        <input type="hidden" id="rek1" value="005221031239">
                    </div>

                </div>

                <div class="text-center mt-6">
                    <div class="inline-block text-[#2D5A3D]/40 text-3xl rotate-180">❧</div>
                </div>
            </div>

            <div id="copy-toast"
                class="fixed bottom-20 left-1/2 -translate-x-1/2 bg-[#2D5A3D] text-white px-6 py-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 z-50">
                <i class="fas fa-check mr-2"></i> Berhasil disalin!
            </div>

            <script>
                function copyText(text) {
                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(text).then(function() {
                            showToast();
                        }).catch(function() {
                            fallbackCopy(text);
                        });
                    } else {
                        fallbackCopy(text);
                    }
                }

                function fallbackCopy(text) {
                    var textArea = document.createElement("textarea");
                    textArea.value = text;
                    textArea.style.position = "fixed";
                    textArea.style.left = "-9999px";
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    try {
                        var successful = document.execCommand('copy');
                        if (successful) {
                            showToast();
                        } else {
                            alert("Gagal menyalin otomatis. Silakan salin manual: " + text);
                        }
                    } catch (err) {
                        alert("Gagal menyalin otomatis. Silakan salin manual: " + text);
                    }
                    document.body.removeChild(textArea);
                }

                function copyRekening(id) {
                    const rek = document.getElementById(id).value;
                    copyText(rek);
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

        <section
            class="reveal-blur -mx-6 px-6 py-16 bg-[#F0F7F0] text-[#1A3A28] relative overflow-hidden border-t border-[#6B9E6B]/10">
            <div class="absolute top-4 left-1/2 -translate-x-1/2 text-[#6B9E6B]/10 text-6xl">✦</div>
            <div class="absolute bottom-4 left-4 text-[#6B9E6B]/10 text-4xl">✧</div>
            <div class="absolute bottom-4 right-4 text-[#6B9E6B]/10 text-4xl">✧</div>

            <div class="relative z-10 text-center space-y-6">
                <h2 class="font-script text-6xl text-[#2D5A3D] drop-shadow-sm">Thank You</h2>

                <div class="flex items-center justify-center gap-3">
                    <div class="w-16 h-px bg-gradient-to-r from-transparent to-[#6B9E6B]/40"></div>
                    <span class="text-[#3A7D52]">❦</span>
                    <div class="w-16 h-px bg-gradient-to-l from-transparent to-[#6B9E6B]/40"></div>
                </div>

                <p class="font-serif text-sm uppercase tracking-[0.3em] text-[#3A7D52]">The Honorable</p>

                <div
                    class="inline-block border-2 border-[#1A3A28]/20 bg-white/50 backdrop-blur-sm px-8 py-3 rounded-lg">
                    <p class="font-serif text-xl font-bold">{{ $guest ? $guest->name : 'Bapak/Ibu/Saudara/i' }}</p>
                </div>

                <p class="text-sm text-[#1A3A28]/80 leading-relaxed max-w-xs mx-auto italic">
                    Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir
                    untuk memberikan doa restu.
                </p>

                <div class="pt-6">
                    <p class="font-sans text-xs uppercase tracking-widest text-[#3A7D52] mb-2 font-bold">Kami yang
                        berbahagia
                    </p>
                    <h3 class="font-script text-4xl text-[#1A3A28]">Eko & Ahya</h3>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <span class="text-[#6B9E6B]">♡</span>
                    <span class="text-[#2D5A3D]">♥</span>
                    <span class="text-[#6B9E6B]">♡</span>
                </div>
            </div>
        </section>

        <footer class="text-center pt-8 pb-4">
            <p class="font-script text-3xl text-[#2D5A3D] mb-2">Eko & Ahya</p>
            <p class="text-[10px] text-[#2D5A3D]/50 uppercase tracking-widest mb-4">Created with Love • 2026</p>
            <div class="pt-3 border-t border-[#6B9E6B]/20">
                <p class="text-[10px] text-[#2D5A3D]/50">Made by</p>
                <a href="https://instagram.com/nau.zhar_" target="_blank"
                    class="inline-flex items-center gap-1 text-sm text-[#2D5A3D] hover:text-[#6B9E6B] transition">
                    <i class="fab fa-instagram"></i> @nau.zhar_
                </a>
            </div>
        </footer>
    </div>

    <nav class="matcha-bottom-nav fixed bottom-0 left-1/2 -translate-x-1/2 max-w-md w-full z-40 px-2 py-2"
        id="bottom-nav" style="display:none;">
        <div class="flex justify-around items-center">
            <a href="#home" class="flex flex-col items-center gap-0.5 text-[#2D5A3D]/70 text-[10px] py-1 px-2"
                onclick="smoothScroll(event,'home')">
                <i class="fas fa-home text-base"></i>
                <span>Home</span>
            </a>
            <a href="#mempelai" class="flex flex-col items-center gap-0.5 text-[#2D5A3D]/70 text-[10px] py-1 px-2"
                onclick="smoothScroll(event,'mempelai')">
                <i class="fas fa-heart text-base"></i>
                <span>Mempelai</span>
            </a>
            <a href="#acara" class="flex flex-col items-center gap-0.5 text-[#2D5A3D]/70 text-[10px] py-1 px-2"
                onclick="smoothScroll(event,'acara')">
                <i class="fas fa-calendar-alt text-base"></i>
                <span>Acara</span>
            </a>
            <a href="#gallery" class="flex flex-col items-center gap-0.5 text-[#2D5A3D]/70 text-[10px] py-1 px-2"
                onclick="smoothScroll(event,'gallery')">
                <i class="fas fa-images text-base"></i>
                <span>Gallery</span>
            </a>
            <a href="#rsvp" class="flex flex-col items-center gap-0.5 text-[#2D5A3D]/70 text-[10px] py-1 px-2"
                onclick="smoothScroll(event,'rsvp')">
                <i class="fas fa-envelope text-base"></i>
                <span>RSVP</span>
            </a>
        </div>
    </nav>

    <script>
        // Opening Logic
        function openInvitation() {
            const cover = document.getElementById('cover');
            const mainContent = document.getElementById('main-content');
            const bottomNav = document.getElementById('bottom-nav');

            cover.style.transform = 'translateY(-100%)';
            cover.style.opacity = '0';

            setTimeout(() => {
                mainContent.classList.remove('opacity-0');
                mainContent.classList.add('opacity-100');
                if (bottomNav) bottomNav.style.display = 'block';
            }, 500);

            setTimeout(() => { cover.style.display = 'none'; }, 1200);

            toggleMusic();
        }

        // Gallery Images Array (5 curated photos)
        const galleryImages = [
            @foreach($gallery_photos as $i => $photo)
                "{{ asset('img/gallery/' . $photo . '.jpeg') }}"{{ $i < count($gallery_photos) - 1 ? ',' : '' }}
            @endforeach
        ];
        let currentLightboxIndex = 0;

        // ====== LIGHTBOX ======
        function openLightbox(index) {
            currentLightboxIndex = index;
            updateLightbox();
            const lb = document.getElementById('lightbox');
            lb.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function updateLightbox() {
            const img = document.getElementById('lightbox-img');
            img.classList.add('lightbox-img-exit');
            setTimeout(() => {
                img.src = galleryImages[currentLightboxIndex];
                img.onload = () => {
                    img.classList.remove('lightbox-img-exit');
                };
            }, 200);
            document.getElementById('lightbox-counter').textContent = `${currentLightboxIndex + 1} / ${galleryImages.length}`;
            document.querySelectorAll('.lightbox-thumb-img').forEach(thumb => {
                if (parseInt(thumb.dataset.index) === currentLightboxIndex) {
                    thumb.classList.add('active');
                    thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                } else {
                    thumb.classList.remove('active');
                }
            });
        }

        function navigateLightbox(dir) {
            currentLightboxIndex = (currentLightboxIndex + dir + galleryImages.length) % galleryImages.length;
            updateLightbox();
        }

        function goToLightbox(index) {
            currentLightboxIndex = index;
            updateLightbox();
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.remove('active');
            document.body.style.overflow = '';
        }

        function onLightboxClick(event) {
            if (event.target.classList.contains('lightbox-backdrop')) {
                closeLightbox();
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            const lb = document.getElementById('lightbox');
            if (!lb.classList.contains('active')) return;
            if (e.key === 'ArrowLeft') navigateLightbox(-1);
            if (e.key === 'ArrowRight') navigateLightbox(1);
            if (e.key === 'Escape') closeLightbox();
        });

        // Swipe support for lightbox
        let touchStartX = 0;
        document.getElementById('lightbox').addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        document.getElementById('lightbox').addEventListener('touchend', (e) => {
            const diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) {
                navigateLightbox(diff > 0 ? 1 : -1);
            }
        }, { passive: true });

        // Smooth Scroll
        function smoothScroll(e, id) {
            e.preventDefault();
            document.getElementById(id)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        // Countdown Logic with flip animation
        const weddingDate = new Date('2026-05-10T10:00:00').getTime();
        let prevValues = { days: '', hours: '', minutes: '', seconds: '' };
        const countdownInterval = setInterval(() => {
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const vals = {
                days: Math.floor(distance / (1000 * 60 * 60 * 24)),
                hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                seconds: Math.floor((distance % (1000 * 60)) / 1000)
            };

            Object.keys(vals).forEach(key => {
                const el = document.getElementById(key);
                const val = vals[key] < 10 ? '0' + vals[key] : String(vals[key]);
                if (el && val !== prevValues[key]) {
                    el.classList.add('flip');
                    el.innerText = val;
                    setTimeout(() => el.classList.remove('flip'), 600);
                    prevValues[key] = val;
                }
            });

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById('countdown').innerHTML = "<p class='text-2xl font-bold text-[#B4D8B0]'>🎉 Acara Telah Dimulai! 🎉</p>";
            }
        }, 1000);

        // Scroll Animation + Active Nav Tracking
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('reveal-visible');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            document.querySelectorAll('.reveal-on-scroll, .reveal-left, .reveal-right, .reveal-scale, .reveal-rotate, .reveal-blur').forEach((el, i) => {
                el.style.transitionDelay = `${i * 0.08}s`;
                observer.observe(el);
            });

            // Active nav tracking
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('#bottom-nav a');
            const navObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        navLinks.forEach(link => {
                            link.classList.remove('matcha-nav-active');
                            if (link.getAttribute('href') === '#' + entry.target.id) {
                                link.classList.add('matcha-nav-active');
                            }
                        });
                    }
                });
            }, { threshold: 0.3, rootMargin: '-20% 0px -50% 0px' });
            sections.forEach(sec => navObserver.observe(sec));
        });
    </script>
</x-layout-matcha>