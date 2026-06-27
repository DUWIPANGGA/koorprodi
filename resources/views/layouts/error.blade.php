<!DOCTYPE html>
<html class="light" lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') - FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Space+Grotesk:wght@700&family=Work+Sans:wght@400;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script>
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
                        "on-primary-fixed": "#001b3e",
                        "primary-fixed": "#d7e3ff",
                        "on-surface-variant": "#414753",
                        "on-error": "#ffffff",
                        "primary": "#004e9f",
                        "surface": "#f9f9f9",
                        "on-secondary-fixed-variant": "#822700",
                        "on-secondary-container": "#fffbff",
                        "on-error-container": "#93000a",
                        "secondary-container": "#d04400",
                        "on-primary": "#ffffff",
                        "on-secondary": "#ffffff",
                        "outline": "#727784",
                        "surface-dim": "#dadada",
                        "inverse-on-surface": "#f1f1f1",
                        "on-background": "#1a1c1c",
                        "surface-container-high": "#e8e8e8",
                        "surface-container-low": "#f3f3f3",
                        "error": "#ba1a1a"
                    },
                    fontFamily: {
                        "body-md": ["Work Sans"],
                        "headline-xxl": ["Montserrat"],
                        "label-bold": ["Space Grotesk"],
                        "headline-lg": ["Montserrat"],
                        "display-textured": ["Montserrat"],
                    },
                    fontSize: {
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "headline-xxl": ["56px", { "lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "900" }],
                        "label-bold": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "700" }],
                        "headline-lg": ["40px", { "lineHeight": "1.2", "fontWeight": "800" }],
                    }
                },
            },
        }
    </script>
    <style>
        .hard-shadow {
            box-shadow: 6px 6px 0px 0px #1a1c1c;
        }
        .hard-shadow-sm {
            box-shadow: 4px 4px 0px 0px #1a1c1c;
        }
        .btn-press:active {
            transform: translate(3px, 3px);
            box-shadow: none !important;
        }
        .grainy-overlay::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/pinstriped-suit.png");
            opacity: 0.06;
            pointer-events: none;
            mix-blend-mode: multiply;
        }
        .brush-stroke {
            background: #d04400;
            clip-path: polygon(2% 15%, 95% 4%, 100% 45%, 98% 90%, 5% 98%, 0% 50%);
            padding: 0.75rem 3rem;
            display: inline-block;
        }
        @keyframes bounce-char {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        .char {
            display: inline-block;
            animation: bounce-char 1.5s infinite ease-in-out;
        }
        .logo {
            width: 100px;
            margin: 0 auto 1.5rem auto;
            transition: transform 0.4s ease;
        }
        .logo:hover {
            transform: rotate(10deg) scale(1.05);
        }
    </style>
</head>
<body class="bg-background text-on-background grainy-overlay selection:bg-primary-container selection:text-on-primary-container font-body-md min-h-screen flex items-center justify-center p-6 relative">

    <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-[0.03]">
        <div class="font-headline-xxl text-[80px] text-on-surface italic whitespace-nowrap mt-20"
            style="animation: marqueeScroll 30s linear infinite;">
            <span>ERROR · ERROR · ERROR · ERROR · ERROR · ERROR · </span>
            <span>ERROR · ERROR · ERROR · ERROR · ERROR · ERROR · </span>
        </div>
    </div>

    <div class="max-w-lg w-full relative z-10">
        <div class="bg-surface-container-lowest border-2 border-on-surface p-8 md:p-10 hard-shadow text-center">
            <img src="{{ asset('formadiksi.png') }}" alt="Logo FORMADIKSI" class="logo">

            <div class="brush-stroke mb-6 mx-auto">
                <h2 class="font-display-textured text-4xl text-on-secondary uppercase tracking-tighter leading-none">
                    @yield('code')
                </h2>
            </div>

            <h1 class="font-label-bold text-xl uppercase tracking-wider text-on-surface mb-3">
                @yield('title')
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant mb-8 leading-relaxed">
                @yield('message')
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ url('/') }}"
                    class="bg-primary text-on-primary font-label-bold py-3 px-8 hard-shadow-sm border-2 border-on-surface hover:bg-secondary-container hover:text-on-secondary transition-all uppercase tracking-wide btn-press text-sm flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">home</span>
                    Kembali ke Beranda
                </a>
                @if(Route::has('login') && !auth()->check())
                <a href="{{ route('login') }}"
                    class="bg-surface-container-high text-on-surface font-label-bold py-3 px-8 hard-shadow-sm border-2 border-on-surface hover:bg-primary hover:text-on-primary transition-all uppercase tracking-wide btn-press text-sm flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">login</span>
                    Login
                </a>
                @endif
            </div>
        </div>
    </div>

    <style>
        @keyframes marqueeScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</body>
</html>
