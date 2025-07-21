<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Kepengurusan - FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .nav-link-underline {
            position: relative;
        }

        .nav-link-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #00AAFF;
            transition: width 0.3s ease-in-out;
        }

        .nav-link-underline:hover::after,
        .nav-link-underline.active::after {
            width: 100%;
        }

        .member-card {
            transition: all 0.3s ease;
        }

        .member-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            bottom: 0;
            left: 25%;
            background-color: #00AAFF;
        }

    </style>
</head>
<body class="text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300 ease-in-out" id="navbar">

        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a class="flex-shrink-0" href="#">
                <img src="{{ asset('formadiksi.png') }}" alt="FORMADIKSI" class="h-16 transition-transform duration-300 hover:scale-105">
            </a>
            <button class="lg:hidden text-gray-700 focus:outline-none" id="navbar-toggler">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-4 6h4"></path>
                </svg>
            </button>
            <div class="hidden lg:flex flex-grow items-center justify-end" id="navbarNav">
                <ul class="flex flex-col lg:flex-row items-center space-y-2 lg:space-y-0 lg:space-x-8">
                    <li class="nav-item">
                        <a class="nav-link-underline active text-gray-700 font-medium py-2 px-4" href="/#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="/#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="/#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="/#rumahaspirasi">Rumah Aspirasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="/#artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4 {{ request()->routeIs('pengurus.public') ? 'active' : '' }}" href="{{ route('pengurus.public') }}">Kepengurusan</a>
                    </li>

                    <li class="nav-item lg:ml-3 mt-4 lg:mt-0">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center">
                            <i class="fas fa-home mr-2"></i> Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('registrasi') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </a>
                        @endif
                        @endauth
                        @endif
                    </li>
                </ul>
            </div>
            <div class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" id="mobile-menu-overlay"></div>
            <div class="fixed top-0 right-0 w-64 h-full bg-white z-50 shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden" id="mobile-menu">
                <div class="p-4">
                    <button class="absolute top-4 right-4 text-gray-700 focus:outline-none" id="close-mobile-menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <ul class="flex flex-col space-y-4 mt-8">
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="/#home">Home</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="/#services">Services</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="/#about">About</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="/#rumahaspirasi">Rumah Aspirasi</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="/#artikel">Artikel</a></li>
                        <li>
                            <a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block {{ request()->routeIs('pengurus.public') ? 'active' : '' }}" href="{{ route('pengurus.public') }}">Kepengurusan</a>
                        </li>

                        <li class="mt-4">
                            @if (Route::has('login'))
                            @auth
                            <a href="{{ url('/dashboard') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center"> {{-- Tambahkan ini --}}
                                <i class="fas fa-home mr-2"></i> Dashboard
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center"> {{-- Tambahkan ini --}}
                                <i class="fas fa-sign-in-alt mr-2"></i> Login
                            </a>
                            @if (Route::has('register'))
                            <a href="{{ route('registrasi') }}" class="btn-outline-primary px-6 py-2 rounded-lg bg-primary text-gray-500 border border-primary-500 hover:bg-blue-700 hover:text-white transition duration-300 flex items-center justify-center"> {{-- Tambahkan ini --}}
                                <i class="fas fa-user-plus mr-2"></i> Register
                            </a>
                            @endif
                            @endauth
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<!-- Kepengurusan Section -->
<section id="kepengurusan" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold section-title relative inline-block pb-4 text-gray-900" data-aos="fade-down">
                Struktur Kepengurusan <span class="text-primary-500">{{ $periode->nama }}</span>
            </h2>
            <p class="text-lg text-gray-600 mt-4">Berikut susunan pengurus FORMADIKSI periode {{ $periode->tahun }}</p>
        </div>

        <!-- Period Selector -->
        <div class="flex justify-center mb-8">
            <select class="px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition" onchange="window.location.href='/kepengurusan/'+this.value">
                @foreach($periodes as $p)
                <option value="{{ $p->id }}" {{ $p->id == $periode->id ? 'selected' : '' }}>
                    {{ $p->nama }} ({{ $p->tahun }})
                </option>
                @endforeach
            </select>
        </div>

        <!-- Ketua dan Wakil -->
<div class="flex justify-center gap-8">
            @foreach($pengurus[App\Models\Pengurus::DIVISI_KETUA_UMUM] ?? [] as $ketua)
            <div class="flex flex-col items-center" data-aos="fade-up">
                <div 
                    class="rounded-xl p-6 w-full max-w-xs text-center"
                    x-data="{
                        isHovered: false,
                        rotateX: 0,
                        rotateY: 0,
                        handleMouseMove(e) {
                            const rect = e.currentTarget.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            const centerX = rect.width / 2;
                            const centerY = rect.height / 2;
                            this.rotateX = (y - centerY) / 20;
                            this.rotateY = (centerX - x) / 20;
                        },
                        handleMouseEnter() {
                            this.isHovered = true;
                        },
                        handleMouseLeave() {
                            this.isHovered = false;
                            this.rotateX = 0;
                            this.rotateY = 0;
                        }
                    }"
                    @mousemove="handleMouseMove"
                    @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave"
                    :style="`
                        background: rgba(255, 255, 255, ${isHovered ? 0.9 : 0.8});
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        box-shadow: ${isHovered ? '0 15px 35px rgba(0, 0, 0, 0.2)' : '0 8px 25px rgba(0, 0, 0, 0.1)'};
                        transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);
                        transition: all 0.3s ease;
                    `"
                >
                    <div 
    x-data="{ isHovered: false }"
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    class="mx-auto mb-4 w-40 h-40 bg-transparent flex items-center justify-center overflow-hidden rounded-full"
    :style="`
        transform: scale(${isHovered ? 1.05 : 1});
        transition: all 0.3s ease;
    `"
>
    @if($ketua->foto)
        <img 
            src="{{ asset('storage/'.$ketua->foto) }}" 
            alt="{{ $ketua->nama }}" 
            class="w-full h-full object-cover"
            :class="isHovered ? 'drop-shadow-lg' : 'drop-shadow-sm'"
            style="filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));"
            :style="`filter: drop-shadow(${isHovered ? '0 8px 25px rgba(0, 0, 0, 0.15)' : '0 4px 15px rgba(0, 0, 0, 0.1)'})`"
        >
    @else
        <div class="text-gray-400 text-5xl">
            <i class="fas fa-user-circle"></i>
        </div>
    @endif
</div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $ketua->nama }}</h3>
                    <p class="text-primary-500 font-medium">{{ $ketua->jabatan }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $ketua->divisi }}</p>
                    <div 
                        class="absolute inset-0 rounded-xl overflow-hidden pointer-events-none"
                        :style="`
                            background: linear-gradient(135deg, rgba(255,255,255,${isHovered ? 0.3 : 0}) 0%, rgba(255,255,255,0) 50%);
                            transition: opacity 0.3s ease;
                        `"
                    ></div>
                </div>
            </div>
            @endforeach

            @foreach($pengurus[App\Models\Pengurus::DIVISI_WAKIL_KETUA] ?? [] as $wakil)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="100">
                <div 
                    class="rounded-xl p-6 w-full max-w-xs text-center"
                    x-data="{
                        isHovered: false,
                        rotateX: 0,
                        rotateY: 0,
                        handleMouseMove(e) {
                            const rect = e.currentTarget.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            const centerX = rect.width / 2;
                            const centerY = rect.height / 2;
                            this.rotateX = (y - centerY) / 20;
                            this.rotateY = (centerX - x) / 20;
                        },
                        handleMouseEnter() {
                            this.isHovered = true;
                        },
                        handleMouseLeave() {
                            this.isHovered = false;
                            this.rotateX = 0;
                            this.rotateY = 0;
                        }
                    }"
                    @mousemove="handleMouseMove"
                    @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave"
                    :style="`
                        background: rgba(255, 255, 255, ${isHovered ? 0.9 : 0.8});
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        box-shadow: ${isHovered ? '0 15px 35px rgba(0, 0, 0, 0.2)' : '0 8px 25px rgba(0, 0, 0, 0.1)'};
                        transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);
                        transition: all 0.3s ease;
                    `"
                >
                    <div 
    x-data="{ isHovered: false }"
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    class="mx-auto mb-4 w-40 h-40 bg-transparent flex items-center justify-center overflow-hidden rounded-full"
    :style="`
        transform: scale(${isHovered ? 1.05 : 1});
        transition: all 0.3s ease;
    `"
>
    @if($wakil->foto)
        <img 
            src="{{ asset('storage/'.$wakil->foto) }}" 
            alt="{{ $wakil->nama }}" 
            class="w-full h-full object-cover"
            :class="isHovered ? 'drop-shadow-lg' : 'drop-shadow-sm'"
            style="filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));"
            :style="`filter: drop-shadow(${isHovered ? '0 8px 25px rgba(0, 0, 0, 0.15)' : '0 4px 15px rgba(0, 0, 0, 0.1)'})`"
        >
    @else
        <div class="text-gray-400 text-5xl">
            <i class="fas fa-user-circle"></i>
        </div>
    @endif
</div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ $wakil->nama }}</h3>
                    <p class="text-primary-500 font-medium">{{ $wakil->jabatan }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $wakil->divisi }}</p>
                    <div 
                        class="absolute inset-0 rounded-xl overflow-hidden pointer-events-none"
                        :style="`
                            background: linear-gradient(135deg, rgba(255,255,255,${isHovered ? 0.3 : 0}) 0%, rgba(255,255,255,0) 50%);
                            transition: opacity 0.3s ease;
                        `"
                    ></div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Sekretaris dan Bendahara -->
<div class="flex justify-center gap-8 my-8">
            @foreach($pengurus[App\Models\Pengurus::DIVISI_SEKRETARIS] ?? [] as $sekretaris)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
                <div 
                    class="rounded-xl p-6 w-full max-w-xs text-center"
                    x-data="{
                        isHovered: false,
                        rotateX: 0,
                        rotateY: 0,
                        handleMouseMove(e) {
                            const rect = e.currentTarget.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            const centerX = rect.width / 2;
                            const centerY = rect.height / 2;
                            this.rotateX = (y - centerY) / 20;
                            this.rotateY = (centerX - x) / 20;
                        },
                        handleMouseEnter() {
                            this.isHovered = true;
                        },
                        handleMouseLeave() {
                            this.isHovered = false;
                            this.rotateX = 0;
                            this.rotateY = 0;
                        }
                    }"
                    @mousemove="handleMouseMove"
                    @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave"
                    :style="`
                        background: rgba(255, 255, 255, ${isHovered ? 0.9 : 0.8});
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        box-shadow: ${isHovered ? '0 15px 35px rgba(0, 0, 0, 0.2)' : '0 8px 25px rgba(0, 0, 0, 0.1)'};
                        transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);
                        transition: all 0.3s ease;
                    `"
                >
                    <div 
    x-data="{ isHovered: false }"
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    class="mx-auto mb-4 w-40 h-40 bg-transparent flex items-center justify-center overflow-hidden rounded-full"
    :style="`
        transform: scale(${isHovered ? 1.05 : 1});
        transition: all 0.3s ease;
    `"
>
    @if($sekretaris->foto)
        <img 
            src="{{ asset('storage/'.$sekretaris->foto) }}" 
            alt="{{ $sekretaris->nama }}" 
            class="w-full h-full object-cover"
            :class="isHovered ? 'drop-shadow-lg' : 'drop-shadow-sm'"
            style="filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));"
            :style="`filter: drop-shadow(${isHovered ? '0 8px 25px rgba(0, 0, 0, 0.15)' : '0 4px 15px rgba(0, 0, 0, 0.1)'})`"
        >
    @else
        <div class="text-gray-400 text-5xl">
            <i class="fas fa-user-circle"></i>
        </div>
    @endif
</div>

                    <h3 class="text-xl font-semibold text-gray-800">{{ $sekretaris->nama }}</h3>
                    <p class="text-primary-500 font-medium">{{ $sekretaris->jabatan }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $sekretaris->divisi }}</p>
                    <div 
                        class="absolute inset-0 rounded-xl overflow-hidden pointer-events-none"
                        :style="`
                            background: linear-gradient(135deg, rgba(255,255,255,${isHovered ? 0.3 : 0}) 0%, rgba(255,255,255,0) 50%);
                            transition: opacity 0.3s ease;
                        `"
                    ></div>
                </div>
            </div>
            @endforeach

            @foreach($pengurus[App\Models\Pengurus::DIVISI_BENDAHARA] ?? [] as $bendahara)
            <div class="flex flex-col items-center" data-aos="fade-up" data-aos-delay="300">
                <div 
                    class="rounded-xl p-6 w-full max-w-xs text-center"
                    x-data="{
                        isHovered: false,
                        rotateX: 0,
                        rotateY: 0,
                        handleMouseMove(e) {
                            const rect = e.currentTarget.getBoundingClientRect();
                            const x = e.clientX - rect.left;
                            const y = e.clientY - rect.top;
                            const centerX = rect.width / 2;
                            const centerY = rect.height / 2;
                            this.rotateX = (y - centerY) / 20;
                            this.rotateY = (centerX - x) / 20;
                        },
                        handleMouseEnter() {
                            this.isHovered = true;
                        },
                        handleMouseLeave() {
                            this.isHovered = false;
                            this.rotateX = 0;
                            this.rotateY = 0;
                        }
                    }"
                    @mousemove="handleMouseMove"
                    @mouseenter="handleMouseEnter"
                    @mouseleave="handleMouseLeave"
                    :style="`
                        background: rgba(255, 255, 255, ${isHovered ? 0.9 : 0.8});
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255, 255, 255, 0.2);
                        box-shadow: ${isHovered ? '0 15px 35px rgba(0, 0, 0, 0.2)' : '0 8px 25px rgba(0, 0, 0, 0.1)'};
                        transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);
                        transition: all 0.3s ease;
                    `"
                >
                    <div 
    x-data="{ isHovered: false }"
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    class="mx-auto mb-4 w-40 h-40 bg-transparent flex items-center justify-center overflow-hidden rounded-full"
    :style="`
        transform: scale(${isHovered ? 1.05 : 1});
        transition: all 0.3s ease;
    `"
>
    @if($bendahara->foto)
        <img 
            src="{{ asset('storage/'.$bendahara->foto) }}" 
            alt="{{ $bendahara->nama }}" 
            class="w-full h-full object-cover"
            :class="isHovered ? 'drop-shadow-lg' : 'drop-shadow-sm'"
            style="filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));"
            :style="`filter: drop-shadow(${isHovered ? '0 8px 25px rgba(0, 0, 0, 0.15)' : '0 4px 15px rgba(0, 0, 0, 0.1)'})`"
        >
    @else
        <div class="text-gray-400 text-5xl">
            <i class="fas fa-user-circle"></i>
        </div>
    @endif
</div>

                    <h3 class="text-xl font-semibold text-gray-800">{{ $bendahara->nama }}</h3>
                    <p class="text-primary-500 font-medium">{{ $bendahara->jabatan }}</p>
                    <p class="text-gray-600 text-sm mt-1">{{ $bendahara->divisi }}</p>
                    <div 
                        class="absolute inset-0 rounded-xl overflow-hidden pointer-events-none"
                        :style="`
                            background: linear-gradient(135deg, rgba(255,255,255,${isHovered ? 0.3 : 0}) 0%, rgba(255,255,255,0) 50%);
                            transition: opacity 0.3s ease;
                        `"
                    ></div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Divisi-divisi lainnya -->
        @foreach(['PSDM', 'Litbang', 'OKK', 'Humas', 'Danus', 'Kominfo', 'Koorprodi'] as $divisi)
        @if(isset($pengurus[$divisi]) && count($pengurus[$divisi]) > 0)
        <div class="mb-12" data-aos="fade-up">
            <h3 class="text-2xl font-bold mb-6 text-center text-gray-800 border-b-2 border-primary-500 pb-2 inline-block">{{ $divisi }}</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($pengurus[$divisi] as $anggota)
                <div class="flex flex-col items-center">
                    <div 
                        class="rounded-xl p-4 w-full text-center"
                        x-data="{
                            isHovered: false,
                            rotateX: 0,
                            rotateY: 0,
                            handleMouseMove(e) {
                                const rect = e.currentTarget.getBoundingClientRect();
                                const x = e.clientX - rect.left;
                                const y = e.clientY - rect.top;
                                const centerX = rect.width / 2;
                                const centerY = rect.height / 2;
                                this.rotateX = (y - centerY) / 20;
                                this.rotateY = (centerX - x) / 20;
                            },
                            handleMouseEnter() {
                                this.isHovered = true;
                            },
                            handleMouseLeave() {
                                this.isHovered = false;
                                this.rotateX = 0;
                                this.rotateY = 0;
                            }
                        }"
                        @mousemove="handleMouseMove"
                        @mouseenter="handleMouseEnter"
                        @mouseleave="handleMouseLeave"
                        :style="`
                            background: rgba(255, 255, 255, ${isHovered ? 0.9 : 0.8});
                            backdrop-filter: blur(10px);
                            border: 1px solid rgba(255, 255, 255, 0.2);
                            box-shadow: ${isHovered ? '0 12px 30px rgba(0, 0, 0, 0.15)' : '0 6px 20px rgba(0, 0, 0, 0.1)'};
                            transform: perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg);
                            transition: all 0.3s ease;
                        `"
                    >
                        <div 
    x-data="{ isHovered: false }"
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    class="mx-auto mb-4 w-40 h-40 bg-transparent flex items-center justify-center overflow-hidden rounded-full"
    :style="`
        transform: scale(${isHovered ? 1.05 : 1});
        transition: all 0.3s ease;
    `"
>
    @if($anggota->foto)
        <img 
            src="{{ asset('storage/'.$anggota->foto) }}" 
            alt="{{ $anggota->nama }}" 
            class="w-full h-full object-cover"
            :class="isHovered ? 'drop-shadow-lg' : 'drop-shadow-sm'"
            style="filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.1));"
            :style="`filter: drop-shadow(${isHovered ? '0 8px 25px rgba(0, 0, 0, 0.15)' : '0 4px 15px rgba(0, 0, 0, 0.1)'})`"
        >
    @else
        <div class="text-gray-400 text-5xl">
            <i class="fas fa-user-circle"></i>
        </div>
    @endif
</div>

                        <h4 class="text-lg font-semibold text-gray-800">{{ $anggota->nama }}</h4>
                        <p class="text-primary-500 text-sm font-medium">{{ $anggota->jabatan }}</p>
                        <div 
                            class="absolute inset-0 rounded-xl overflow-hidden pointer-events-none"
                            :style="`
                                background: linear-gradient(135deg, rgba(255,255,255,${isHovered ? 0.2 : 0}) 0%, rgba(255,255,255,0) 50%);
                                transition: opacity 0.3s ease;
                            `"
                        ></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div data-aos="fade-up">
                    <h5 class="text-white text-xl font-bold mb-6">Contact Us</h5>
                    <p class="text-gray-400 mb-3">Jl. Lohbener, Indramayu, Jawa Barat</p>
                    <p><a href="https://api.whatsapp.com/send?phone=6285956404789" class="text-gray-400 hover:text-white transition duration-300 flex items-center"><i class="fab fa-whatsapp mr-3"></i>+6285956404789</a></p>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <h5 class="text-white text-xl font-bold mb-6">Quick Links</h5>
                    <ul class="list-none p-0">
                        <li class="mb-3"><a href="/" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li class="mb-3"><a href="#kepengurusan" class="text-gray-400 hover:text-white transition duration-300">Kepengurusan</a></li>
                        <li class="mb-3"><a href="#artikel" class="text-gray-400 hover:text-white transition duration-300">Artikel</a></li>
                        <li><a href="#rumahaspirasi" class="text-gray-400 hover:text-white transition duration-300">Rumah Aspirasi</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h5 class="text-white text-xl font-bold mb-6">Resources</h5>
                    <ul class="list-none p-0">
                        <li class="mb-3"><a href="#" class="text-gray-400 hover:text-white transition duration-300">Guidebook</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">FAQ</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('formadiksi.png') }}" alt="FORMADIKSI" class="h-16 mr-4">
                        <h5 class="text-white text-2xl font-bold mb-0">FORMADIKSI</h5>
                    </div>
                    <p class="text-gray-400 mb-6">Forum Mahasiswa Bidikmisi Politeknik Negeri Indramayu</p>
                    <div class="social-icons flex space-x-4">
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition duration-300"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>

            <hr class="my-10 border-gray-700">

            <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left text-gray-400 text-sm">
                <p class="mb-3 md:mb-0">Copyright &copy; 2024 FORMADIKSI POLINDRA. All Rights Reserved.</p>
                <p>Developed by <a href="https://linktr.ee/duwipangga" target="_blank" class="text-white hover:underline">KOORPRODI</a></p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
            , once: true
        , });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg', 'py-2');
                navbar.classList.remove('py-3');
            } else {
                navbar.classList.remove('shadow-lg', 'py-2');
                navbar.classList.add('py-3');
            }
        });

        // Active nav link highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const navItems = document.querySelectorAll('.nav-link-underline');

            function activateNavLink() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (window.scrollY >= sectionTop - 100 && window.scrollY < sectionTop + sectionHeight - 100) {
                        current = section.getAttribute('id');
                    }
                });

                navItems.forEach(item => {
                    item.classList.remove('active');
                    if (item.getAttribute('href').includes(current)) {
                        item.classList.add('active');
                    }
                });
            }

            window.addEventListener('scroll', activateNavLink);
            activateNavLink();
        });

    </script>
</body>
</html>
