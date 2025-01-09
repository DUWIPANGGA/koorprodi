<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')

    {{-- GOOGLE FONTS --}}
    {{-- POPPINS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    {{-- AOS CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- LOTTIE FILES --}}
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

    {{-- ALPINE JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.7/dist/cdn.min.js"></script>

     {{-- FAVICON --}}
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-poppins">
    <!-- Navbar -->
    @unless (Route::currentRouteName() == '#' || Route::currentRouteName() == '#')
        @include('layouts.navbar')
    @endunless

    <!-- Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Scripts -->

    @yield('mid-scripts')


    <!-- Import AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
