<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Kepengurusan - FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Space+Grotesk:wght@700&family=Work+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "outline-variant": "#c1c6d5", "background": "#f9f9f9", "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#aac7ff", "inverse-surface": "#2f3131", "secondary-fixed": "#ffdbcf",
                        "primary-container": "#0066cc", "secondary": "#a63500", "on-primary-container": "#dfe8ff",
                        "on-surface": "#1a1c1c", "error-container": "#ffdad6", "on-primary-fixed": "#001b3e",
                        "primary-fixed": "#d7e3ff", "on-surface-variant": "#414753", "on-error": "#ffffff",
                        "primary": "#004e9f", "surface": "#f9f9f9", "on-secondary-fixed-variant": "#822700",
                        "on-secondary-container": "#fffbff", "on-error-container": "#93000a", "secondary-container": "#d04400",
                        "on-primary": "#ffffff", "on-secondary": "#ffffff", "outline": "#727784", "surface-dim": "#dadada",
                        "inverse-on-surface": "#f1f1f1", "on-background": "#1a1c1c", "surface-container-high": "#e8e8e8",
                        "surface-container-low": "#f3f3f3", "error": "#ba1a1a"
                    },
                    fontFamily: {
                        "body-md": ["Work Sans"], "headline-xxl": ["Montserrat"], "label-bold": ["Space Grotesk"],
                        "headline-lg": ["Montserrat"], "display-textured": ["Montserrat"],
                    },
                    fontSize: {
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "headline-xxl": ["56px", { "lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "900" }],
                        "label-bold": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "700" }],
                        "headline-lg": ["40px", { "lineHeight": "1.2", "fontWeight": "800" }],
                    },
                    spacing: { "slant-offset": "100px", "gutter": "24px", "unit": "8px", "margin-edge": "32px" },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Work Sans', sans-serif; overflow-x: hidden; }
        .hard-shadow { box-shadow: 6px 6px 0px 0px #1a1c1c; }
        .hard-shadow-sm { box-shadow: 4px 4px 0px 0px #1a1c1c; }
        .btn-press:active { transform: translate(3px, 3px); box-shadow: none !important; }
        .brush-stroke { background: #d04400; clip-path: polygon(2% 15%, 95% 4%, 100% 45%, 98% 90%, 5% 98%, 0% 50%); padding: 0.75rem 3rem; display: inline-block; }
        .grainy-overlay { position: relative; }
        .grainy-overlay::after {
            content: ""; position: absolute; inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/pinstriped-suit.png");
            opacity: 0.06; pointer-events: none; mix-blend-mode: multiply;
        }
        .card-hover { transition: transform 0.15s ease, box-shadow 0.15s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 10px 10px 0px 0px #1a1c1c; }
    </style>
</head>
<body class="bg-background text-on-background grainy-overlay selection:bg-primary-container selection:text-on-primary-container">

    <!-- ═══ TOP APP BAR ═══ -->
    <header class="bg-primary text-on-primary font-label-bold text-label-bold uppercase tracking-widest sticky top-0 z-50 border-b-4 border-on-surface w-full px-margin-edge h-20 max-w-full">
        <div class="flex justify-between items-center h-full">
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <span class="font-headline-lg-mobile text-headline-lg-mobile font-black text-on-primary italic tracking-tight">FORMADIKSI</span>
                <span class="text-on-primary-container/60 text-xs font-body-md tracking-wider border-l-2 border-on-primary-container/30 pl-3 hidden sm:inline">EST. 2016</span>
            </a>
            <nav class="hidden md:flex items-center gap-1 absolute left-1/2 -translate-x-1/2">
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs" href="{{ url('/#home') }}">Home</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs" href="{{ url('/#rumahaspirasi') }}">Rumah Aspirasi</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs" href="{{ url('/#artikel') }}">Artikel</a>
                <a class="rounded-md px-3 py-2 text-on-primary/80 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs" href="{{ route('pengurus.public') }}">Kepengurusan</a>
            </nav>
            <div class="hidden md:flex items-center gap-1 ml-auto">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('registrasi') }}" class="rounded-md px-3 py-2 text-on-primary/90 ring-1 ring-transparent transition hover:text-on-primary focus-visible:ring-secondary-container text-xs">Register</a>
                @endif
                @endauth
                @endif
            </div>
            <button id="mobileNavToggle" class="md:hidden flex items-center justify-center w-10 h-10 text-on-primary">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>
        <div id="mobileNavPanel" class="md:hidden hidden bg-primary border-t-2 border-on-primary-container/20 px-margin-edge py-4 flex flex-col gap-2">
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm" href="{{ url('/#home') }}">Home</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm" href="{{ url('/#rumahaspirasi') }}">Rumah Aspirasi</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm" href="{{ url('/#artikel') }}">Artikel</a>
            <a class="rounded-md px-3 py-2 text-on-primary/80 hover:text-on-primary transition text-sm" href="{{ route('pengurus.public') }}">Kepengurusan</a>
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('registrasi') }}" class="rounded-md px-3 py-2 text-on-primary/90 hover:text-on-primary transition text-sm">Register</a>
            @endif
            @endauth
            @endif
        </div>
    </header>

    <!-- ═══ HERO ═══ -->
    <section class="relative min-h-[40vh] flex items-center justify-center overflow-hidden bg-surface-container border-b-4 border-on-surface">
        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-[0.03]">
            <div class="font-headline-xxl text-[80px] text-on-surface italic whitespace-nowrap mt-20" style="animation: marqueeScroll 30s linear infinite;">
                <span>KEPENGURUSAN · KEPENGURUSAN · KEPENGURUSAN · KEPENGURUSAN · </span>
                <span>KEPENGURUSAN · KEPENGURUSAN · KEPENGURUSAN · KEPENGURUSAN · </span>
            </div>
        </div>
        <div class="relative z-10 text-center px-margin-edge py-20">
            <div class="brush-stroke mb-6 mx-auto">
                <h1 class="font-display-textured text-4xl md:text-5xl text-on-secondary uppercase tracking-tighter leading-none">STRUKTUR KEPENGURUSAN</h1>
            </div>
            <p class="font-label-bold text-sm md:text-base text-on-surface-variant mt-4 tracking-wider uppercase">{{ $periode->nama }}</p>
            <div class="mt-6">
                <select class="bg-surface-container-lowest border-2 border-on-surface px-4 py-2 font-body-md text-on-surface focus:outline-none focus:ring-2 focus:ring-primary"
                    onchange="window.location.href='/struktur-kepengurusan/'+this.value">
                    @foreach($periodes as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $periode->id ? 'selected' : '' }}>{{ $p->nama }} ({{ $p->tahun }})</option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

    <!-- ═══ KETUA & WAKIL ═══ -->
    <section class="py-16 px-margin-edge bg-background">
        <div class="flex flex-wrap justify-center gap-8 max-w-5xl mx-auto">
            @foreach($pengurus[App\Models\Pengurus::DIVISI_KETUA_UMUM] ?? [] as $ketua)
            <div class="flex flex-col items-center" data-aos="fade-up">
                <div class="border-2 border-on-surface bg-surface-container-lowest p-6 w-full max-w-xs text-center hard-shadow card-hover"
                    x-data="{ isHovered: false, rotateX: 0, rotateY: 0,
                        handleMouseMove(e) { const rect = e.currentTarget.getBoundingClientRect(); this.rotateX = (e.clientY - rect.top - rect.height/2) / 20; this.rotateY = (rect.left + rect.width/2 - e.clientX) / 20; },
                        handleMouseEnter() { this.isHovered = true; },
                        handleMouseLeave() { this.isHovered = false; this.rotateX = 0; this.rotateY = 0; }
                    }"
                    @mousemove="handleMouseMove" @mouseenter="handleMouseEnter" @mouseleave="handleMouseLeave"
                    :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                    <div class="mx-auto mb-4 w-36 h-36 bg-surface-container-high flex items-center justify-center overflow-hidden rounded-full border-2 border-on-surface"
                        x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :style="`transform: scale(${isHovered ? 1.05 : 1}); transition: all 0.3s ease;`">
                        @if($ketua->foto)
                        <img src="{{ asset('storage/'.$ketua->foto) }}" alt="{{ $ketua->nama }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-5xl text-on-surface-variant">person</span>
                        @endif
                    </div>
                    <h3 class="font-label-bold text-lg uppercase tracking-wider text-on-surface">{{ $ketua->nama }}</h3>
                    <p class="font-body-md text-sm text-secondary-container font-bold mt-1">{{ $ketua->jabatan }}</p>
                </div>
            </div>
            @endforeach

            @foreach($pengurus[App\Models\Pengurus::DIVISI_WAKIL_KETUA] ?? [] as $wakil)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
                <div class="border-2 border-on-surface bg-surface-container-lowest p-6 w-full max-w-xs text-center hard-shadow card-hover"
                    x-data="{ isHovered: false, rotateX: 0, rotateY: 0,
                        handleMouseMove(e) { const rect = e.currentTarget.getBoundingClientRect(); this.rotateX = (e.clientY - rect.top - rect.height/2) / 20; this.rotateY = (rect.left + rect.width/2 - e.clientX) / 20; },
                        handleMouseEnter() { this.isHovered = true; },
                        handleMouseLeave() { this.isHovered = false; this.rotateX = 0; this.rotateY = 0; }
                    }"
                    @mousemove="handleMouseMove" @mouseenter="handleMouseEnter" @mouseleave="handleMouseLeave"
                    :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                    <div class="mx-auto mb-4 w-36 h-36 bg-surface-container-high flex items-center justify-center overflow-hidden rounded-full border-2 border-on-surface"
                        x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :style="`transform: scale(${isHovered ? 1.05 : 1}); transition: all 0.3s ease;`">
                        @if($wakil->foto)
                        <img src="{{ asset('storage/'.$wakil->foto) }}" alt="{{ $wakil->nama }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-5xl text-on-surface-variant">person</span>
                        @endif
                    </div>
                    <h3 class="font-label-bold text-lg uppercase tracking-wider text-on-surface">{{ $wakil->nama }}</h3>
                    <p class="font-body-md text-sm text-secondary-container font-bold mt-1">{{ $wakil->jabatan }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ═══ SEKRETARIS & BENDAHARA ═══ -->
    <section class="py-16 px-margin-edge bg-surface-container-lowest border-y-4 border-on-surface">
        <div class="flex flex-wrap justify-center gap-8 max-w-5xl mx-auto">
            @foreach($pengurus[App\Models\Pengurus::DIVISI_SEKRETARIS] ?? [] as $sekretaris)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
                <div class="border-2 border-on-surface bg-background p-6 w-full max-w-xs text-center hard-shadow card-hover"
                    x-data="{ isHovered: false, rotateX: 0, rotateY: 0,
                        handleMouseMove(e) { const rect = e.currentTarget.getBoundingClientRect(); this.rotateX = (e.clientY - rect.top - rect.height/2) / 20; this.rotateY = (rect.left + rect.width/2 - e.clientX) / 20; },
                        handleMouseEnter() { this.isHovered = true; },
                        handleMouseLeave() { this.isHovered = false; this.rotateX = 0; this.rotateY = 0; }
                    }"
                    @mousemove="handleMouseMove" @mouseenter="handleMouseEnter" @mouseleave="handleMouseLeave"
                    :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                    <div class="mx-auto mb-4 w-36 h-36 bg-surface-container-high flex items-center justify-center overflow-hidden rounded-full border-2 border-on-surface"
                        x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :style="`transform: scale(${isHovered ? 1.05 : 1}); transition: all 0.3s ease;`">
                        @if($sekretaris->foto)
                        <img src="{{ asset('storage/'.$sekretaris->foto) }}" alt="{{ $sekretaris->nama }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-5xl text-on-surface-variant">person</span>
                        @endif
                    </div>
                    <h3 class="font-label-bold text-lg uppercase tracking-wider text-on-surface">{{ $sekretaris->nama }}</h3>
                    <p class="font-body-md text-sm text-secondary-container font-bold mt-1">{{ $sekretaris->jabatan }}</p>
                </div>
            </div>
            @endforeach

            @foreach($pengurus[App\Models\Pengurus::DIVISI_BENDAHARA] ?? [] as $bendahara)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="300">
                <div class="border-2 border-on-surface bg-background p-6 w-full max-w-xs text-center hard-shadow card-hover"
                    x-data="{ isHovered: false, rotateX: 0, rotateY: 0,
                        handleMouseMove(e) { const rect = e.currentTarget.getBoundingClientRect(); this.rotateX = (e.clientY - rect.top - rect.height/2) / 20; this.rotateY = (rect.left + rect.width/2 - e.clientX) / 20; },
                        handleMouseEnter() { this.isHovered = true; },
                        handleMouseLeave() { this.isHovered = false; this.rotateX = 0; this.rotateY = 0; }
                    }"
                    @mousemove="handleMouseMove" @mouseenter="handleMouseEnter" @mouseleave="handleMouseLeave"
                    :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                    <div class="mx-auto mb-4 w-36 h-36 bg-surface-container-high flex items-center justify-center overflow-hidden rounded-full border-2 border-on-surface"
                        x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :style="`transform: scale(${isHovered ? 1.05 : 1}); transition: all 0.3s ease;`">
                        @if($bendahara->foto)
                        <img src="{{ asset('storage/'.$bendahara->foto) }}" alt="{{ $bendahara->nama }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-5xl text-on-surface-variant">person</span>
                        @endif
                    </div>
                    <h3 class="font-label-bold text-lg uppercase tracking-wider text-on-surface">{{ $bendahara->nama }}</h3>
                    <p class="font-body-md text-sm text-secondary-container font-bold mt-1">{{ $bendahara->jabatan }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ═══ DIVISI-DIVISI ═══ -->
    @foreach(['PSDM', 'Litbang', 'OKK', 'Humas', 'Danus', 'Kominfo', 'Koorprodi'] as $divisi)
    @if(isset($pengurus[$divisi]) && count($pengurus[$divisi]) > 0)
    <section class="py-16 px-margin-edge {{ $loop->even ? 'bg-surface-container-lowest' : 'bg-background' }}">
        <div class="max-w-6xl mx-auto" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-10">
                <span class="w-8 h-1.5 bg-secondary-container"></span>
                <h2 class="font-label-bold text-xl uppercase tracking-wider text-on-surface">{{ $divisi }}</h2>
                <span class="flex-1 h-px bg-outline-variant"></span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($pengurus[$divisi] as $anggota)
                <div class="border-2 border-on-surface bg-surface-container-lowest p-4 text-center hard-shadow-sm card-hover"
                    x-data="{ isHovered: false, rotateX: 0, rotateY: 0,
                        handleMouseMove(e) { const rect = e.currentTarget.getBoundingClientRect(); this.rotateX = (e.clientY - rect.top - rect.height/2) / 25; this.rotateY = (rect.left + rect.width/2 - e.clientX) / 25; },
                        handleMouseEnter() { this.isHovered = true; },
                        handleMouseLeave() { this.isHovered = false; this.rotateX = 0; this.rotateY = 0; }
                    }"
                    @mousemove="handleMouseMove" @mouseenter="handleMouseEnter" @mouseleave="handleMouseLeave"
                    :style="`transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);`">
                    <div class="mx-auto mb-3 w-24 h-24 bg-surface-container-high flex items-center justify-center overflow-hidden rounded-full border-2 border-on-surface"
                        x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false"
                        :style="`transform: scale(${isHovered ? 1.05 : 1}); transition: all 0.3s ease;`">
                        @if($anggota->foto)
                        <img src="{{ asset('storage/'.$anggota->foto) }}" alt="{{ $anggota->nama }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-3xl text-on-surface-variant">person</span>
                        @endif
                    </div>
                    <h4 class="font-label-bold text-xs uppercase tracking-wider text-on-surface leading-tight">{{ $anggota->nama }}</h4>
                    <p class="font-body-md text-xs text-secondary-container font-bold mt-1">{{ $anggota->jabatan }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach

    <!-- ═══ FOOTER ═══ -->
    <footer class="bg-inverse-surface text-primary-fixed-dim w-full relative border-t-8 border-primary flex flex-col justify-between items-start gap-gutter px-margin-edge py-12">
        <div class="flex flex-col md:flex-row justify-between w-full gap-10 md:gap-gutter">
            <div class="max-w-sm">
                <div class="flex items-center gap-4 mb-4">
                    <img src="{{ asset('LogoPolindra.png') }}" alt="POLINDRA" class="h-10 w-auto opacity-80" />
                    <img src="{{ asset('Logo_Formadiksi.png') }}" alt="FORMADIKSI" class="h-10 w-auto opacity-80" />
                </div>
                <div class="font-headline-lg text-headline-lg font-black text-secondary-fixed mb-3 tracking-tight">FORMADIKSI</div>
                <p class="font-body-md text-body-md text-surface-variant/80 leading-relaxed">Gedung Kemahasiswaan Lt. 2, Politeknik Negeri Indramayu. Jl. Lohbener Lama No.08, Indramayu, Jawa Barat.</p>
            </div>
            <div class="flex flex-col gap-2 font-label-bold uppercase text-sm tracking-wider">
                <span class="text-white mb-2 underline decoration-primary decoration-4 underline-offset-4">Navigation</span>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="{{ url('/') }}">Home</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="{{ route('pengurus.public') }}">Kepengurusan</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="{{ url('/#artikel') }}">Artikel</a>
            </div>
            <div class="flex flex-col gap-2 font-label-bold uppercase text-sm tracking-wider">
                <span class="text-white mb-2 underline decoration-primary decoration-4 underline-offset-4">Connect</span>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">Instagram</a>
                <a class="text-surface-variant/70 hover:text-white transition-colors" href="#">YouTube</a>
            </div>
        </div>
        <div class="w-full border-t border-white/10 mt-8 pt-8 flex flex-col md:flex-row justify-between font-label-bold text-xs uppercase tracking-wider text-surface-variant/60">
            <span>© 2024 FORMADIKSI POLINDRA. MEMBIDIK PRESTASI MEMBANGUN NEGERI.</span>
            <span class="mt-3 md:mt-0">BUILT FOR EXCELLENCE</span>
        </div>
    </footer>

    <div class="bg-inverse-surface text-center py-3 px-margin-edge font-body-md text-xs text-white/70 tracking-wider">
        <span>Tim Developer Koorprodi A-10 &mdash; <strong class="text-secondary-fixed-dim/70">duwipangga</strong></span>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
        document.getElementById('mobileNavToggle')?.addEventListener('click', function() {
            document.getElementById('mobileNavPanel').classList.toggle('hidden');
        });
    </script>
    <style>
        @keyframes marqueeScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    </style>
</body>
</html>
