<!DOCTYPE html>
<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>FORMADIKSI POLINDRA – Membidik Prestasi Membangun Negeri</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Space+Grotesk:wght@700&family=Work+Sans:wght@400;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "outline-variant": "#c1c6d5",
                        "background": "#f9f9f9",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#aac7ff",
                        "inverse-surface": "#2f3131",
                        "secondary-fixed": "#ffdbcf",
                        "primary-container": "#0066cc",
                        "secondary": "#a63500",
                        "on-primary-container": "#dfe8ff",
                        "on-surface": "#1a1c1c",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#474746",
                        "on-primary-fixed": "#001b3e",
                        "primary-fixed": "#d7e3ff",
                        "on-tertiary-container": "#ebe8e7",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#515050",
                        "surface-variant": "#e2e2e2",
                        "surface-container": "#eeeeee",
                        "inverse-primary": "#aac7ff",
                        "tertiary-container": "#696868",
                        "surface-bright": "#f9f9f9",
                        "on-secondary-fixed": "#390c00",
                        "surface-tint": "#005cba",
                        "on-tertiary-fixed": "#1b1c1c",
                        "on-surface-variant": "#414753",
                        "on-error": "#ffffff",
                        "primary": "#004e9f",
                        "tertiary-fixed": "#e5e2e1",
                        "surface": "#f9f9f9",
                        "on-secondary-fixed-variant": "#822700",
                        "on-secondary-container": "#fffbff",
                        "on-error-container": "#93000a",
                        "secondary-container": "#d04400",
                        "on-primary": "#ffffff",
                        "on-secondary": "#ffffff",
                        "outline": "#727784",
                        "tertiary-fixed-dim": "#c8c6c5",
                        "surface-dim": "#dadada",
                        "inverse-on-surface": "#f1f1f1",
                        "on-background": "#1a1c1c",
                        "surface-container-highest": "#e2e2e2",
                        "surface-container-high": "#e8e8e8",
                        "surface-container-low": "#f3f3f3",
                        "secondary-fixed-dim": "#ffb59c",
                        "on-primary-fixed-variant": "#00458e",
                        "error": "#ba1a1a"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        "slant-offset": "100px",
                        "gutter": "24px",
                        "unit": "8px",
                        "margin-edge": "32px"
                    },
                    fontFamily: {
                        "body-md": ["Work Sans"],
                        "headline-xxl": ["Montserrat"],
                        "label-bold": ["Space Grotesk"],
                        "headline-lg": ["Montserrat"],
                        "display-textured": ["Montserrat"],
                        "headline-lg-mobile": ["Montserrat"]
                    },
                    fontSize: {
                        "body-md": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "headline-xxl": ["64px", {
                            "lineHeight": "1.1",
                            "letterSpacing": "-0.04em",
                            "fontWeight": "900"
                        }],
                        "label-bold": ["14px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "0.05em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["40px", {
                            "lineHeight": "1.2",
                            "fontWeight": "800"
                        }],
                        "display-textured": ["48px", {
                            "lineHeight": "1",
                            "fontWeight": "900"
                        }],
                        "headline-lg-mobile": ["32px", {
                            "lineHeight": "1.2",
                            "fontWeight": "800"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        /* ── hard shadow utility ── */
        .hard-shadow {
            box-shadow: 6px 6px 0px 0px #1a1c1c;
        }

        .hard-shadow-sm {
            box-shadow: 4px 4px 0px 0px #1a1c1c;
        }

        .hard-shadow-white {
            box-shadow: 6px 6px 0px 0px #ffffff;
        }

        /* ── slant clips ── */
        .slant-clip {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 15% 100%);
        }

        .slant-clip-inverse {
            clip-path: polygon(0 0, 85% 0, 100% 100%, 0 100%);
        }

        .slant-clip-soft {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 10% 100%);
        }

        /* ── grainy overlay ── */
        .grainy-overlay {
            position: relative;
        }

        .grainy-overlay::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/pinstriped-suit.png");
            opacity: 0.08;
            pointer-events: none;
            mix-blend-mode: multiply;
        }

        /* ── brush stroke shape ── */
        .brush-stroke {
            background: #d04400;
            clip-path: polygon(2% 15%, 95% 4%, 100% 45%, 98% 90%, 5% 98%, 0% 50%);
            padding: 0.75rem 3rem;
            display: inline-block;
        }

        /* ── marquee ── */
        .marquee-track {
            display: flex;
            animation: marqueeScroll 22s linear infinite;
            width: max-content;
        }

        .marquee-track-reverse {
            display: flex;
            animation: marqueeScrollReverse 22s linear infinite;
            width: max-content;
        }

        @keyframes marqueeScroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes marqueeScrollReverse {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        /* ── grain texture helper ── */
        .bg-grain {
            background-image: url("https://www.transparenttextures.com/patterns/pinstriped-suit.png");
            opacity: 0.06;
            pointer-events: none;
        }

        /* ── card hover ── */
        .card-hover {
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 10px 10px 0px 0px #1a1c1c;
        }

        /* ── scroll reveal ── */
        .reveal {
            transition: all 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ── button press ── */
        .btn-press:active {
            transform: translate(3px, 3px);
            box-shadow: none !important;
        }

        /* ── hero image filter ── */
        .hero-img {
            filter: brightness(0) contrast(1.2) saturate(0);
            opacity: 0.85;
        }

        /* ── responsive tweaks ── */
        @media (max-width: 768px) {
            .slant-clip {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }

            .slant-clip-soft {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }
    </style>
</head>

<body
    class="bg-background text-on-background grainy-overlay selection:bg-primary-container selection:text-on-primary-container">

    <!-- ═══ TOP APP BAR ═══ -->
    <header
        class="bg-primary text-on-primary font-label-bold text-label-bold uppercase tracking-widest sticky top-0 z-50 border-b-4 border-on-surface w-full px-margin-edge h-20 max-w-full">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center gap-3">
                <span
                    class="font-headline-lg-mobile text-headline-lg-mobile font-black text-on-primary italic tracking-tight">
                    FORMADIKSI
                </span>
                <span
                    class="text-on-primary-container/60 text-xs font-body-md tracking-wider border-l-2 border-on-primary-container/30 pl-3 hidden sm:inline">
                    EST. 2016
                </span>
            </div>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-1 absolute left-1/2 -translate-x-1/2">
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs"
                    href="#home">Home</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs"
                    href="#rumahaspirasi">Rumah Aspirasi</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs"
                    href="#artikel">Artikel</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs"
                    href="{{ url('/struktur-kepengurusan') }}">Kepengurusan</a>
            </nav>

            <div class="hidden md:flex items-center gap-1 ml-auto">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('registrasi') }}"
                            class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus:outline-none focus-visible:ring-secondary-container text-xs">
                            Register
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Mobile Hamburger -->
            <button id="mobileNavToggle" class="md:hidden flex items-center justify-center w-10 h-10 text-on-primary">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>

        <!-- Mobile Nav Panel -->
        <div id="mobileNavPanel"
            class="md:hidden hidden bg-primary border-t-2 border-on-primary-container/20 px-margin-edge py-4 flex flex-col gap-2">
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm"
                href="#home">Home</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm"
                href="#rumahaspirasi">Rumah Aspirasi</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm"
                href="#artikel">Artikel</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm"
                href="{{ url('/struktur-kepengurusan') }}">Kepengurusan</a>
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('registrasi') }}"
                        class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Register</a>
                @endif
            @endauth
        </div>
    </header>

    <main>

        <!-- ═══ HERO SECTION ═══ -->
        <section id="home"
            class="relative min-h-[90vh] grid grid-cols-1 md:grid-cols-12 overflow-hidden bg-surface-container">

            <!-- background marquee text (subtle) -->
            <div
                class="absolute inset-0 opacity-8 pointer-events-none select-none flex flex-col justify-center gap-8 overflow-hidden">
                <div
                    class="marquee-track font-headline-xxl text-[80px] text-on-surface-variant/10 italic whitespace-nowrap">
                    <span>FORMADIKSI POLINDRA · FORMADIKSI POLINDRA · FORMADIKSI POLINDRA · FORMADIKSI POLINDRA ·
                    </span>
                    <span>FORMADIKSI POLINDRA · FORMADIKSI POLINDRA · FORMADIKSI POLINDRA · FORMADIKSI POLINDRA ·
                    </span>
                </div>
                <div
                    class="-rotate-12 marquee-track-reverse font-headline-xxl text-[80px] text-on-surface-variant/10 italic whitespace-nowrap">
                    <span>MEMBIDIK PRESTASI MEMBANGUN NEGERI · MEMBIDIK PRESTASI MEMBANGUN NEGERI · MEMBIDIK PRESTASI
                        MEMBANGUN NEGERI · </span>
                    <span>MEMBIDIK PRESTASI MEMBANGUN NEGERI · MEMBIDIK PRESTASI MEMBANGUN NEGERI · MEMBIDIK PRESTASI
                        MEMBANGUN NEGERI · </span>
                </div>
            </div>

            <!-- left content -->
            <div class="md:col-span-6 flex flex-col justify-center px-margin-edge z-10 py-20 md:py-0">
                <div
                    class="inline-block bg-secondary-container text-on-secondary px-4 py-1 font-label-bold mb-6 tracking-wider text-xs">
                    EST. 2016
                </div>
                <h1 class="font-headline-xxl text-headline-xxl text-on-surface mb-4 uppercase leading-[1.05]">
                    MEMBIDIK <br />
                    PRESTASI <br />
                    <span class="text-primary">MEMBANGUN NEGERI</span>
                </h1>
                <p class="font-body-md text-body-md max-w-lg mb-10 text-on-surface-variant leading-relaxed">
                    Wadah silaturahmi dan aspirasi mahasiswa penerima beasiswa Bidikmisi dan KIP Kuliah di Politeknik
                    Negeri Indramayu. Bersinergi membangun prestasi.
                </p>
                <div>
                    <button
                        class="bg-primary text-on-primary font-label-bold py-4 px-12 hard-shadow border-2 border-on-surface hover:bg-secondary-container hover:text-on-secondary transition-all uppercase tracking-wide btn-press">
                        Explore Now
                    </button>
                </div>
            </div>

            <!-- right visual (slanted) -->
            <div class="md:col-span-6 relative min-h-[400px] md:min-h-full">
                <div class="absolute inset-0 bg-primary-container slant-clip-soft z-0"></div>
                <div class="overflow-hidden absolute inset-0 z-10 flex items-center justify-center p-0">
                    <div class="overflow-hidden relative flex items-center justify-center w-full h-full">
                        <img alt=""
                            class="absolute w-[50rem] sm:w-[60rem] lg:w-[70rem] max-w-none object-contain opacity-[0.07] grayscale mix-blend-multiply -right-[50%] top-1/2 -translate-y-1/2 pointer-events-none"
                            src="{{ asset('formadiksi.png') }}" />
                        <img alt="FORMADIKSI Logo"
                            class="w-72 sm:w-80 lg:w-96 object-contain drop-shadow-2xl relative z-10"
                            src="{{ asset('Logo_Formadiksi.png') }}" />
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ MARQUEE / RIBBON ═══ -->
        <div
            class="bg-inverse-surface text-secondary-fixed-dim py-4 border-y-4 border-primary overflow-hidden whitespace-nowrap font-label-bold uppercase tracking-wider">
            <div class="marquee-track gap-12 text-sm md:text-base">
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
            </div>
        </div>

        <!-- ═══ PROFIL SECTION ═══ -->
        <section class="py-24 px-margin-edge bg-background">
            <div class="flex flex-col items-center mb-16">
                <div class="brush-stroke mb-6">
                    <h2
                        class="font-display-textured text-display-textured text-on-secondary uppercase tracking-tighter leading-none">
                        PROFIL
                    </h2>
                </div>
                <h3 class="font-label-bold text-2xl uppercase text-center mb-4 tracking-wider">
                    FORMADIKSI POLINDRA
                </h3>
                <div class="w-20 h-1.5 bg-primary mb-8"></div>
                <p
                    class="font-body-md text-body-md text-center max-w-3xl mx-auto text-on-surface-variant leading-relaxed">
                    FORMADIKSI POLINDRA (Forum Mahasiswa Bidikmisi Politeknik Negeri Indramayu) adalah organisasi resmi
                    internal kampus yang berfungsi sebagai wadah pemersatu, jembatan komunikasi, dan penyalur aspirasi
                    bagi seluruh mahasiswa serta alumni penerima beasiswa Bidikmisi dan Kartu Indonesia Pintar Kuliah
                    (KIP Kuliah) di lingkungan Politeknik Negeri Indramayu.
                </p>
                <p
                    class="font-body-md text-body-md text-center max-w-3xl mx-auto text-on-surface-variant leading-relaxed mt-4">
                    Didirikan pada tanggal <strong>8 Juni 2016</strong> di Indramayu, FORMADIKSI POLINDRA berkomitmen
                    penuh dalam membangun karakter mahasiswa yang unggul, berintegritas, dan mandiri, serta aktif
                    berkontribusi nyata melalui kegiatan akademik maupun pengabdian masyarakat.
                </p>
            </div>
        </section>

        <!-- ═══ MARQUEE / RIBBON (RIGHT) ═══ -->
        <div
            class="bg-inverse-surface text-secondary-fixed-dim py-4 border-y-4 border-primary overflow-hidden whitespace-nowrap font-label-bold uppercase tracking-wider">
            <div class="marquee-track-reverse gap-12 text-sm md:text-base">
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
            </div>
        </div>

        <!-- ═══ VISI & MISI ═══ -->
        <section class="py-24 px-margin-edge bg-surface-container-lowest">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter max-w-5xl mx-auto">
                <!-- Visi -->
                <div class="border-2 border-on-surface bg-background p-10 flex flex-col hard-shadow card-hover">
                    <div class="w-16 h-1.5 bg-secondary-container mb-6"></div>
                    <h3
                        class="font-headline-lg-mobile text-headline-lg-mobile font-black text-on-surface uppercase mb-6 tracking-tight">
                        Visi
                    </h3>
                    <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed italic">
                        "Menjadi media pemersatu antar mahasiswa dan alumni Bidikmisi/KIP Kuliah POLINDRA, serta wadah
                        aspirasi untuk pengembangan kreativitas dan inovasi bagi generasi penerus menuju perubahan yang
                        lebih baik."
                    </p>
                </div>

                <!-- Misi -->
                <div class="border-2 border-on-surface bg-background p-10 flex flex-col hard-shadow card-hover">
                    <div class="w-16 h-1.5 bg-secondary-container mb-6"></div>
                    <h3
                        class="font-headline-lg-mobile text-headline-lg-mobile font-black text-on-surface uppercase mb-6 tracking-tight">
                        Misi
                    </h3>
                    <ul
                        class="font-body-md text-body-md text-on-surface-variant leading-relaxed space-y-4 list-disc list-inside">
                        <li><strong>Membentuk Karakter Unggul:</strong> Menjadikan seluruh anggota organisasi sebagai
                            pribadi yang kritis, kreatif, inovatif, konstruktif, dan mandiri.</li>
                        <li><strong>Kepedulian Sosial:</strong> Memberikan pandangan dan kontribusi nyata mengenai peran
                            organisasi dalam aksi sosial terhadap berbagai fenomena di dalam maupun di luar lingkungan
                            kampus.</li>
                        <li><strong>Sinergi & Kemitraan:</strong> Menjalin kerja sama yang kuat dengan organisasi
                            profesi, lembaga, serta institusi terkait, baik di jenjang perguruan tinggi maupun dunia
                            kerja.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- ═══ MARQUEE / RIBBON (LEFT) ═══ -->
        <div
            class="bg-inverse-surface text-secondary-fixed-dim py-4 border-y-4 border-primary overflow-hidden whitespace-nowrap font-label-bold uppercase tracking-wider">
            <div class="marquee-track gap-12 text-sm md:text-base">
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
                <span>BERAKSI BERDEDIKASI BERPRESTASI</span>
                <span>•</span>
            </div>
        </div>

        <!-- ═══ SIFAT & FUNGSI ═══ -->
        <section class="py-24 px-margin-edge bg-background">
            <div class="flex flex-col items-center mb-16">
                <div class="brush-stroke mb-6">
                    <h2
                        class="font-display-textured text-display-textured text-on-secondary uppercase tracking-tighter leading-none">
                        SIFAT & FUNGSI
                    </h2>
                </div>
                <h3 class="font-label-bold text-2xl uppercase text-center mb-4 tracking-wider">
                    Organisasi
                </h3>
                <div class="w-20 h-1.5 bg-primary mb-8"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter max-w-5xl mx-auto mb-12">
                <!-- Sifat -->
                <div
                    class="border-2 border-on-surface bg-surface-container-lowest flex flex-col hard-shadow card-hover">
                    <div class="bg-primary-container p-5 border-b-2 border-on-surface">
                        <h4 class="font-label-bold text-on-primary-container uppercase tracking-wide text-lg">Sifat
                            Organisasi</h4>
                    </div>
                    <div class="p-6 grow space-y-5">
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Inklusif &
                                Kekeluargaan</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Menjadi ruang interaksi,
                                komunikasi, dan silaturahmi yang hangat bagi mahasiswa aktif maupun alumni penerima
                                beasiswa.</p>
                        </div>
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Independen &
                                Non-Politik</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Organisasi ini bukan merupakan
                                organisasi sosial politik dan menegaskan diri tidak menjalankan kegiatan politik praktis
                                dalam bentuk apa pun.</p>
                        </div>
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Berlandaskan
                                Nilai Luhur</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Menjalankan roda organisasi
                                berdasarkan prinsip keilmuan, kepedulian sosial, dan pengembangan karakter mahasiswa.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Fungsi -->
                <div
                    class="border-2 border-on-surface bg-surface-container-lowest flex flex-col hard-shadow card-hover">
                    <div class="bg-primary-container p-5 border-b-2 border-on-surface">
                        <h4 class="font-label-bold text-on-primary-container uppercase tracking-wide text-lg">Fungsi
                            Utama</h4>
                    </div>
                    <div class="p-6 grow space-y-5">
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Silaturahmi
                                &
                                Jejaring</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Mempererat ikatan persaudaraan
                                dan koordinasi berkelanjutan antara mahasiswa aktif, alumni, pihak kampus, hingga
                                masyarakat luas.</p>
                        </div>
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Riset &
                                Pengembangan</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Menjadi motor penggerak dalam
                                diskusi ilmiah, kajian keilmuan, serta riset terapan yang membawa dampak positif.</p>
                        </div>
                        <div>
                            <h5 class="font-label-bold uppercase text-primary tracking-wider text-sm mb-2">Pengabdian &
                                Inovasi</h5>
                            <p class="font-body-md text-body-md text-on-surface-variant">Mendorong penerapan sistem dan
                                inovasi baru sebagai wujud nyata aplikasi ilmu pengetahuan demi kepentingan masyarakat
                                dan kelestarian lingkungan, sekaligus sarana kaderisasi bagi generasi penerus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══ SEPARATOR ═══ -->
        <div class="flex items-center justify-center gap-4 py-12 px-margin-edge bg-surface-container-lowest">
            <span class="h-px w-12 bg-primary"></span>
            <span class="material-symbols-outlined text-primary" style="font-variation-settings:'FILL'1;">forum</span>
            <span class="h-px w-12 bg-primary"></span>
        </div>

        <!-- ═══ RUMAH ASPIRASI ═══ -->
        <section id="rumahaspirasi" class="py-24 px-margin-edge bg-surface-container-lowest">
            <div class="flex flex-col items-center mb-16">
                <div class="brush-stroke mb-6">
                    <h2
                        class="font-display-textured text-display-textured text-on-secondary uppercase tracking-tighter leading-none">
                        RUMAH ASPIRASI
                    </h2>
                </div>
                <h3 class="font-label-bold text-2xl uppercase text-center mb-4 tracking-wider">
                    Sampaikan Pendapatmu
                </h3>
                <div class="w-20 h-1.5 bg-primary mb-8"></div>
                <p class="font-body-md text-body-md text-center max-w-2xl text-on-surface-variant leading-relaxed">
                    Punyai pendapat atau saran tentang formadiksi? Sampaikan saja lewat form dibawah ini!
                </p>
            </div>

            @if (session('status'))
                <div class="max-w-2xl mx-auto mb-8 bg-green-50 border-2 border-green-400 text-green-700 px-6 py-4 rounded relative font-body-md"
                    role="alert">
                    {{ session('status') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 1.697 1.697l-3.746 2.651 3.746 2.651a1.2 1.2 0 0 1 0 1.697z" />
                        </svg>
                    </span>
                </div>
            @elseif (session('error'))
                <div class="max-w-2xl mx-auto mb-8 bg-red-50 border-2 border-red-400 text-red-700 px-6 py-4 rounded relative font-body-md"
                    role="alert">
                    {{ session('error') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                        onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 1.697 1.697l-3.746 2.651 3.746 2.651a1.2 1.2 0 0 1 0 1.697z" />
                        </svg>
                    </span>
                </div>
            @endif

            <div class="max-w-2xl mx-auto">
                <div class="border-2 border-on-surface bg-background p-10 hard-shadow">
                    <form method="POST" action="{{ route('rumahaspirasi.kirim') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="nama"
                                class="font-label-bold text-sm uppercase tracking-wider text-on-surface block mb-2">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full border-2 border-on-surface bg-surface-container-lowest px-4 py-3 font-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary @error('nama') border-error @enderror"
                                placeholder="Nama kamu" maxlength="100"
                                onkeyup="document.getElementById('charCount1').innerHTML = this.value.length + '/100'">
                            @error('nama')
                                <p class="text-error font-body-md text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="text-right font-body-md text-xs text-on-surface-variant mt-1"><span
                                    id="charCount1">0/100</span> karakter</div>
                        </div>

                        <div class="mb-6">
                            <label for="isi"
                                class="font-label-bold text-sm uppercase tracking-wider text-on-surface block mb-2">Aspirasi</label>
                            <textarea id="isi" name="isi" rows="6"
                                class="w-full border-2 border-on-surface bg-surface-container-lowest px-4 py-3 font-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary @error('isi') border-error @enderror"
                                placeholder="Masukan aspirasi kamu" maxlength="1000"
                                onkeyup="document.getElementById('charCount2').innerHTML = this.value.length + '/1000'"></textarea>
                            @error('isi')
                                <p class="text-error font-body-md text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <div class="text-right font-body-md text-xs text-on-surface-variant mt-1"><span
                                    id="charCount2">0/1000</span> karakter</div>
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="bg-primary text-on-primary font-label-bold py-4 px-12 hard-shadow border-2 border-on-surface hover:bg-secondary-container hover:text-on-secondary transition-all uppercase tracking-wide btn-press inline-flex items-center gap-2">
                                <span class="material-symbols-outlined text-base">send</span>
                                Kirim!
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- ═══ BENTO STATS + CTA ═══ -->
        <section class="px-margin-edge pb-24">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter h-auto md:h-[580px]">
                <!-- main CTA block -->
                <div
                    class="md:col-span-8 bg-inverse-surface p-10 md:p-12 flex flex-col justify-end relative overflow-hidden border-2 border-on-surface hard-shadow">
                    <div class="absolute top-0 right-0 p-8">
                        <span class="material-symbols-outlined text-primary-fixed-dim text-7xl opacity-30"
                            style="font-variation-settings:'FILL'1;">
                            groups
                        </span>
                    </div>
                    <h2 class="font-headline-lg text-primary-fixed-dim uppercase mb-4 z-10 leading-tight">
                        Punya Pertanyaan?<br />Hubungi Kami
                    </h2>
                    <p class="font-body-md text-white/80 max-w-lg mb-8 z-10 leading-relaxed">
                        Ingin tahu lebih lanjut tentang FORMADIKSI POLINDRA? Jangan ragu untuk menghubungi kami melalui
                        WhatsApp atau media sosial.
                    </p>
                    <div class="z-10">
                        <a href="https://api.whatsapp.com/send?phone=6285956404789" target="_blank"
                            class="inline-block bg-secondary-container text-on-secondary font-label-bold py-4 px-12 border-2 border-on-surface hard-shadow hover:bg-white hover:text-on-surface transition-all uppercase tracking-wide btn-press">
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- subtle grain -->
                    <div class="absolute inset-0 opacity-10 bg-grain pointer-events-none"></div>
                </div>

                <!-- stats stack -->
                <div class="md:col-span-4 grid grid-rows-2 gap-gutter">
                    <div
                        class="bg-secondary-container p-8 flex flex-col justify-center border-2 border-on-surface hard-shadow">
                        <h3 class="font-headline-lg-mobile text-on-secondary uppercase leading-none mb-1 text-5xl">500+
                        </h3>
                        <p class="font-label-bold uppercase text-on-secondary/90 tracking-wider text-sm">Anggota Aktif
                        </p>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-8 flex flex-col justify-center border-2 border-on-surface hard-shadow">
                        <h3 class="font-headline-lg-mobile text-on-surface uppercase leading-none mb-1 text-5xl">20+
                        </h3>
                        <p class="font-label-bold uppercase text-on-surface-variant tracking-wider text-sm">Program
                            Kerja</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ═══ SOCIAL BAR ═══ -->
    <aside class="bg-primary-container py-5 border-y-4 border-on-surface">
        <div
            class="px-margin-edge flex flex-col md:flex-row justify-center items-center gap-8 md:gap-14 font-label-bold uppercase text-on-primary-container text-sm tracking-wider">
            <a class="flex items-center gap-2 hover:scale-105 transition-transform duration-200" href="#">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                @FORMADIKSI_POLINDRA
            </a>
            <a class="flex items-center gap-2 hover:scale-105 transition-transform duration-200" href="#">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                </svg>
                @FORMADIKSI_POLINDRA
            </a>
            <a class="flex items-center gap-2 hover:scale-105 transition-transform duration-200"
                href="mailto:formadiksipolindra@gmail.com">
                <span class="material-symbols-outlined text-base">mail</span>
                FORMADIKSI@POLINDRA.AC.ID
            </a>
        </div>
    </aside>

    <!-- ═══ FOOTER ═══ -->
    <footer
        class="bg-inverse-surface text-primary-fixed-dim w-full relative border-t-8 border-primary flex flex-col justify-between items-start gap-gutter px-margin-edge py-12">
        <div class="flex flex-col md:flex-row justify-between w-full gap-10 md:gap-gutter">
            <!-- brand -->
            <div class="max-w-sm">
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('LogoPolindra.png') }}" alt="POLINDRA" class="h-10 w-auto opacity-80" />
                    <img src="{{ asset('Logo_Formadiksi.png') }}" alt="FORMADIKSI" class="h-10 w-auto opacity-80" />
                </div>
                <div class="font-headline-lg text-headline-lg font-black text-secondary-fixed mb-3 tracking-tight">
                    FORMADIKSI
                </div>
                <p class="font-body-md text-body-md text-surface-variant/80 leading-relaxed">
                    Gedung Kemahasiswaan Lt. 2, Politeknik Negeri Indramayu. Jl. Lohbener Lama No.08, Indramayu, Jawa
                    Barat.
                </p>
            </div>

            <!-- nav -->
            <div class="flex flex-col gap-2 font-label-bold uppercase text-sm tracking-wider">
                <span
                    class="text-white mb-2 underline decoration-primary decoration-4 underline-offset-4">Navigation</span>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Home</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">About Us</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Our Team</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Events
                    Calendar</a>
            </div>

            <!-- connect -->
            <div class="flex flex-col gap-2 font-label-bold uppercase text-sm tracking-wider">
                <span
                    class="text-white mb-2 underline decoration-primary decoration-4 underline-offset-4">Connect</span>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Instagram</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">YouTube</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Contact Us</a>
            </div>
        </div>

        <!-- bottom bar -->
        <div
            class="w-full border-t border-white/10 mt-8 pt-8 flex flex-col md:flex-row justify-between font-label-bold text-xs uppercase tracking-wider text-surface-variant/60">
            <span>© 2024 FORMADIKSI POLINDRA. MEMBIDIK PRESTASI MEMBANGUN NEGERI.</span>
            <span class="mt-3 md:mt-0">BUILT FOR EXCELLENCE</span>
        </div>
    </footer>

    <!-- ═══ DEV CREDIT ═══ -->
    <div
        class="bg-inverse-surface text-center py-3 px-margin-edge font-body-md text-xs text-surface-variant/50 tracking-wider">
        <span>Tim Developer Koorprodi A-10 &mdash; <strong
                class="text-secondary-fixed-dim/70">duwipangga</strong></span>
    </div>

    <!-- ═══ MICRO-INTERACTIONS ═══ -->
    <script>
        // button press feedback
        document.querySelectorAll('.btn-press, button, a[href]').forEach(el => {
            el.addEventListener('mousedown', () => {
                el.style.transition = 'transform 0.05s';
            });
            el.addEventListener('mouseup', () => {
                el.style.transition = '';
            });
        });

        // mobile nav toggle
        document.getElementById('mobileNavToggle')?.addEventListener('click', function() {
            const panel = document.getElementById('mobileNavPanel');
            panel.classList.toggle('hidden');
        });

        // scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('section, aside').forEach(el => {
            el.classList.add('reveal', 'opacity-0', 'translate-y-10');
            observer.observe(el);
        });
    </script>

</body>

</html>
