<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Masuk &bull; FORMADIKSI POLINDRA</title>
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
                        "surface-container": "#eeeeee",
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
                    fontFamily: {
                        "body-md": ["Work Sans"],
                        "headline-xxl": ["Montserrat"],
                        "label-bold": ["Space Grotesk"],
                        "headline-lg": ["Montserrat"],
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
        .grainy-overlay {
            position: relative;
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
        .slant-clip-soft {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 10% 100%);
        }
        @media (max-width: 768px) {
            .slant-clip-soft {
                clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
            }
        }
    </style>
</head>

<body class="bg-background text-on-background grainy-overlay selection:bg-primary-container selection:text-on-primary-container font-body-md antialiased min-h-screen flex">

    <!-- Left — Brand Panel -->
    <div class="hidden md:flex md:w-1/2 lg:w-3/5 relative bg-primary-container overflow-hidden items-center justify-center">
        <div class="absolute inset-0 slant-clip-soft bg-primary z-0"></div>
        <div class="relative z-10 flex flex-col items-center text-center px-12 max-w-lg">
            <div class="mb-8">
                <img src="{{ asset('Logo_Formadiksi.png') }}" alt="FORMADIKSI" class="w-52 h-auto" />
            </div>
            <h1 class="font-headline-xxl text-headline-xxl text-on-primary uppercase leading-[1.05] mb-4">
                MEMBIDIK<br />PRESTASI<br /><span class="text-secondary-fixed italic">MEMBANGUN NEGERI</span>
            </h1>
            <p class="text-on-primary/80 leading-relaxed max-w-sm">
                Wadah silaturahmi dan aspirasi mahasiswa penerima beasiswa Bidikmisi dan KIP Kuliah di Politeknik Negeri Indramayu.
            </p>
        </div>
    </div>

    <!-- Right — Login Form -->
    <div class="w-full md:w-1/2 lg:w-2/5 flex items-center justify-center p-6 md:p-10">
        <div class="w-full max-w-md">

            <!-- Logo mobile -->
            <div class="flex justify-center mb-8 md:hidden">
                <img src="{{ asset('Logo_Formadiksi.png') }}" alt="FORMADIKSI" class="w-24 h-auto" />
            </div>

            <div class="border-2 border-on-surface bg-surface-container-lowest p-8 md:p-10 hard-shadow">
                <div class="flex items-center gap-3 mb-8">
                    <span class="w-8 h-1.5 bg-secondary-container"></span>
                    <h1 class="font-label-bold text-2xl uppercase tracking-wider text-on-surface">Masuk</h1>
                </div>

                @if ($errors->any())
                <div class="mb-6 border-2 border-error bg-error-container px-4 py-3 font-body-md text-sm text-on-error-container">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-5">
                        <label for="email" class="font-label-bold text-xs uppercase tracking-wider text-on-surface block mb-2">NIM atau Email</label>
                        <input type="text" value="{{ old('email') }}" id="email" name="email" required
                            class="w-full border-2 border-on-surface bg-background px-4 py-3 font-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary" />
                    </div>

                    <div class="mb-6">
                        <label for="password" class="font-label-bold text-xs uppercase tracking-wider text-on-surface block mb-2">Password</label>
                        <input type="password" id="password" name="password" required
                            class="w-full border-2 border-on-surface bg-background px-4 py-3 font-body-md text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary" />
                    </div>

                    <button type="submit"
                        class="w-full bg-primary text-on-primary font-label-bold py-4 px-12 hard-shadow border-2 border-on-surface hover:bg-secondary-container hover:text-on-secondary transition-all uppercase tracking-wide btn-press">
                        Masuk
                    </button>

                    <div class="mt-6 text-center font-body-md text-sm text-on-surface-variant">
                        Belum punya akun?
                        <a href="http://wa.me/628971444573" class="font-label-bold uppercase text-primary hover:text-secondary-container transition-colors tracking-wider">
                            Hubungi Admin
                        </a>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ url('/landing') }}" class="font-label-bold text-xs uppercase tracking-wider text-on-surface-variant hover:text-primary transition-colors">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>
