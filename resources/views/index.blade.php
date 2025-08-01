<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Custom underline for nav-link to mimic current effect with Tailwind */
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
            /* primary-color */
            transition: width 0.3s ease-in-out;
        }

        .nav-link-underline:hover::after,
        .nav-link-underline.active::after {
            width: 100%;
        }
#stars-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: -1;
  overflow: hidden;
}

.star {
  position: absolute;
  background-color: white;
  border-radius: 50%;
  animation: float linear infinite;
  opacity: 0;
}

/* Animasi untuk bintang */
@keyframes float {
  0% {
    transform: translateY(0) translateX(0);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(-100vh) translateX(100px);
    opacity: 0;
  }
}
    </style>
</head>

<body class="text-gray-800">
<div id="stars-container"></div>
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
                        <a class="nav-link-underline active text-gray-700 font-medium py-2 px-4" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="#rumahaspirasi">Rumah Aspirasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-underline text-gray-700 font-medium py-2 px-4" href="#artikel">Artikel</a>
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
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="#home">Home</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="#services">Services</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="#about">About</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="#rumahaspirasi">Rumah Aspirasi</a></li>
                        <li><a class="nav-link-underline text-gray-700 font-medium py-2 px-4 block" href="#artikel">Artikel</a></li>
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

    <section id="home" class="py-24 bg-gradient-to-br from-primary-100 to-secondary-50" data-aos="fade-up">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center justify-center text-center lg:text-left">
                <div class="lg:w-1/2 mb-10 lg:mb-0" data-aos="fade-right" data-aos-delay="200">
                    <h1 class="text-5xl font-extrabold leading-tight mb-4 text-gray-900">FORUM MAHASISWA BIDIKMISI</h1>
                    <p class="text-lg text-gray-600 mb-8">Teguhkan tekad, satukan langkah, bersama mencapai kesuksesan dan meraih prestasi yang gemilang</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn-primary px-8 py-3 rounded-lg bg-primary-500 text-white hover:bg-blue-700 transition duration-300 flex items-center justify-center text-lg">
                            <i class="fas fa-home mr-2"></i> Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn-primary px-8 py-3 rounded-lg bg-primary-500 text-white hover:bg-blue-700 transition duration-300 flex items-center justify-center text-lg">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('registrasi') }}" class="btn-outline-primary px-8 py-3 rounded-lg text-primary-500 border border-primary-500 hover:bg-primary-500 hover:text-white transition duration-300 flex items-center justify-center text-lg">
                            <i class="fas fa-user-plus mr-2"></i> Register
                        </a>
                        @endif
                        @endauth
                        @endif
                    </div>
                </div>
                <div class="lg:w-1/2 lg:pl-12" data-aos="fade-left" data-aos-delay="400">
                    <img src="{{ asset('mascot.png') }}" alt="Mascot" class="w-full h-auto max-w-lg mx-auto">
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold section-title relative inline-block pb-4 text-gray-900" data-aos="fade-down">FORUM MAHASISWA <span class="text-primary-500">BIDIKMISI</span></h2>
                <p class="text-lg text-gray-600 mt-6 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">Tempat terbaik untuk berbagi informasi, pengalaman, dan tips sukses dalam menjalani kehidupan sebagai penerima KIP KULIAH. Temukan komunitas yang mendukung perjalanan akademik dan pengembangan diri Anda di sini.</p>
                <p class="text-gray-600 mt-4" data-aos="fade-up" data-aos-delay="200">Jika Anda membutuhkan panduan atau informasi lebih lanjut tentang Bidikmisi, silakan <a href="https://linktr.ee/Koorprodi_Formadiksi_Polindra" target="_blank" class="text-primary-500 hover:underline font-semibold">hubungi kami</a>. Bergabunglah dengan kami untuk memanfaatkan berbagai fitur yang membantu Anda mencapai potensi maksimal!</p>
            </div>
        </div>
    </section>

    <section id="artikel" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-center mb-12 text-4xl font-bold section-title relative inline-block pb-4 text-gray-900" data-aos="fade-down">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($recommendedArticles as $recommendedArticle)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden h-full flex flex-col transition-transform duration-300 hover:scale-105 hover:shadow-xl" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('storage/' . $recommendedArticle->picture_article) }}" class="w-full h-48 object-cover" alt="{{ $recommendedArticle->title }}">
                    <div class="p-6 flex flex-col flex-grow">
                        <h5 class="text-xl font-semibold mb-3 text-gray-900">{{ $recommendedArticle->title }}</h5>
                        <p class="text-gray-600 text-sm flex-grow">{!! Str::limit($recommendedArticle->content, 100) !!}</p>
                    </div>
                    <div class="px-6 pb-6 pt-0 bg-transparent">
                        <a href="{{ route('article.show.detail', $recommendedArticle->id) }}" class="inline-flex items-center text-primary-500 hover:text-blue-700 font-medium">
                            Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="about" class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-12 mb-10 lg:mb-0" data-aos="fade-right">
                    <h2 class="text-4xl font-bold mb-6 section-title relative inline-block pb-4 text-gray-900">About <span class="text-primary-500">FORMADIKSI</span></h2>
                    <p class="text-lg text-gray-600 mb-6">Temukan inspirasi, dukungan, dan informasi seputar perjalanan akademik penerima KIP Kuliah di sini!</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                        <div class="p-6 border rounded-lg h-full bg-white shadow-sm" data-aos="fade-up" data-aos-delay="100">
                            <h5 class="text-primary-500 text-xl font-semibold mb-2"><i class="fas fa-comments mr-3"></i> Diskusi Interaktif</h5>
                            <p class="text-gray-600">Berdiskusi dengan kami seputar KIPK</p>
                        </div>
                        <div class="p-6 border rounded-lg h-full bg-white shadow-sm" data-aos="fade-up" data-aos-delay="200">
                            <h5 class="text-primary-500 text-xl font-semibold mb-2"><i class="fas fa-graduation-cap mr-3"></i> Bimbingan Perkuliahan</h5>
                            <p class="text-gray-600">Berjalan bersama kami dalam perjalanan akademik</p>
                        </div>
                        <div class="p-6 border rounded-lg h-full bg-white shadow-sm" data-aos="fade-up" data-aos-delay="300">
                            <h5 class="text-primary-500 text-xl font-semibold mb-2"><i class="fas fa-hands-helping mr-3"></i> Tepat Bernaung</h5>
                            <p class="text-gray-600">Kami menaungi dan mendampingi kamu dalam perjalanan akademik</p>
                        </div>
                        <div class="p-6 border rounded-lg h-full bg-white shadow-sm" data-aos="fade-up" data-aos-delay="400">
                            <h5 class="text-primary-500 text-xl font-semibold mb-2"><i class="fas fa-calendar-alt mr-3"></i> Event</h5>
                            <p class="text-gray-600">Acara-acara yang menarik dan berguna dalam akademik</p>
                        </div>
                    </div>

                    <div class="mt-8 p-6 bg-primary-100 rounded-lg" data-aos="fade-up" data-aos-delay="500">
                        <p class="mb-2 italic text-gray-700">"Teguhkan tekad, satukan langkah, bersama mencapai kesuksesan dan meraih prestasi yang gemilang"</p>
                        <div class="mt-4">
                            <span class="inline-block bg-primary-500 text-white text-xs px-3 py-1 rounded-full mr-2">#Formadiksipolindra</span>
                            <span class="inline-block bg-primary-500 text-white text-xs px-3 py-1 rounded-full mr-2">#MembidikPrestasi</span>
                            <span class="inline-block bg-primary-500 text-white text-xs px-3 py-1 rounded-full">#MembangunNegeri</span>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/2" data-aos="fade-left">
                    <img src="assets/images/about-right-dec.png" alt="About FORMADIKSI" class="w-full h-auto rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <section id="rumahaspirasi" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                <div class="w-full lg:w-3/4">
                    <div class="bg-white p-8 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="text-center mb-8 text-4xl font-bold section-title relative inline-block pb-4 text-gray-900">Rumah <span class="text-primary-500">Aspirasi</span></h2>

                        @if (session('status'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('status') }}
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 1.697 1.697l-3.746 2.651 3.746 2.651a1.2 1.2 0 0 1 0 1.697z" />
                                </svg>
                            </span>
                        </div>
                        @elseif (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            {{ session('error') }}
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 0 1.697z" />
                                </svg>
                            </span>
                        </div>
                        @endif

                        <p class="text-center text-gray-600 mb-8">Punyai pendapat atau saran tentang formadiksi? Sampaikan saja lewat form dibawah ini!</p>

                        <form method="POST" action="{{ route('rumahaspirasi.kirim') }}">
                            @csrf
                            <div class="mb-6">
                                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary-500 @error('nama') border-red-500 @enderror" id="nama" name="nama" placeholder="Nama kamu" maxlength="100" onkeyup="document.getElementById('charCount1').innerHTML = this.value.length + '/100'">
                                @error('nama')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                                <div class="text-right text-xs text-gray-500 mt-1"><span id="charCount1">0/100</span> karakter</div>
                            </div>

                            <div class="mb-6">
                                <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Aspirasi</label>
                                <textarea class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary-500 @error('isi') border-red-500 @enderror" id="isi" name="isi" rows="6" placeholder="Masukan aspirasi kamu" maxlength="1000" onkeyup="document.getElementById('charCount2').innerHTML = this.value.length + '/1000'"></textarea>
                                @error('isi')
                                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                                @enderror
                                <div class="text-right text-xs text-gray-500 mt-1"><span id="charCount2">0/1000</span> karakter</div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn-primary px-8 py-3 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition duration-300 flex items-center justify-center mx-auto text-lg">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <li class="mb-3"><a href="#home" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li class="mb-3"><a href="https://www.instagram.com/formadiksi_polindra/" class="text-gray-400 hover:text-white transition duration-300">FORMADIKSI</a></li>
                        <li class="mb-3"><a href="#about" class="text-gray-400 hover:text-white transition duration-300">About</a></li>
                        <li><a href="https://linktr.ee/duwipangga" class="text-gray-400 hover:text-white transition duration-300">Developer</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h5 class="text-white text-xl font-bold mb-6">Resources</h5>
                    <ul class="list-none p-0">
                        <li class="mb-3"><a href="#rumahaspirasi" class="text-gray-400 hover:text-white transition duration-300">Rumah Aspirasi</a></li>
                        <li><a href="#artikel" class="text-gray-400 hover:text-white transition duration-300">Artikel</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('formadiksi.png') }}" alt="FORMADIKSI" class="h-16 mr-4">
                        <h5 class="text-white text-2xl font-bold mb-0">FORMADIKSI</h5>
                    </div>
                    <p class="text-gray-400 mb-6">Tempat terbaik untuk berbagi informasi, pengalaman, dan tips sukses dalam menjalani kehidupan sebagai penerima Bidikmisi.</p>
                    <div class="social-icons flex space-x-4">
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary-500 transition duration-300 transform hover:-translate-y-1"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary-500 transition duration-300 transform hover:-translate-y-1"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary-500 transition duration-300 transform hover:-translate-y-1"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary-500 transition duration-300 transform hover:-translate-y-1"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <hr class="my-10 border-gray-700">

            <div class="flex flex-col md:flex-row justify-between items-center text-center md:text-left text-gray-400 text-sm">
                <p class="mb-3 md:mb-0">Copyright &copy; 2024 FORMADIKSI POLINDRA. All Rights Reserved.</p>
                <p>Design: <a href="https://linktr.ee/duwipangga" target="_blank" class="text-white hover:underline">KOORPRODI-Duwipangga</a></p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000
            , once: true
        , });



        // Custom JS for Navbar and Character Counters
        document.addEventListener('DOMContentLoaded', function() {
            const namaField = document.getElementById('nama');
            const isiField = document.getElementById('isi');

            if (namaField) {
                namaField.dispatchEvent(new Event('keyup'));
            }

            if (isiField) {
                isiField.dispatchEvent(new Event('keyup'));
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
                    if (mobileMenu && mobileMenu.classList.contains('translate-x-0')) {
                        mobileMenu.classList.remove('translate-x-0');
                        mobileMenu.classList.add('translate-x-full');
                        mobileMenuOverlay.classList.add('hidden');
                    }
                });
            });

            // Add shadow and padding to navbar on scroll
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-lg');
                    navbar.classList.add('py-2');
                    navbar.classList.remove('py-3');
                } else {
                    navbar.classList.remove('shadow-lg');
                    navbar.classList.remove('py-2');
                    navbar.classList.add('py-3');
                }
            });

            // Mobile menu toggle
            const navbarToggler = document.getElementById('navbar-toggler');
            const mobileMenu = document.getElementById('mobile-menu');
            const closeMobileMenu = document.getElementById('close-mobile-menu');
            const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
            const navLinks = document.querySelectorAll('#navbarNav .nav-link-underline, #mobile-menu .nav-link-underline');


            navbarToggler.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
                mobileMenuOverlay.classList.remove('hidden');
            });

            closeMobileMenu.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
                mobileMenuOverlay.classList.add('hidden');
            });

            mobileMenuOverlay.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');
                mobileMenuOverlay.classList.add('hidden');
            });

            // Active nav link highlighting
            const sections = document.querySelectorAll('section');
            const navItems = document.querySelectorAll('.nav-link-underline');

            function activateNavLink() {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (scrollY >= sectionTop - navbar.offsetHeight && scrollY < sectionTop + sectionHeight - navbar.offsetHeight) {
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
            activateNavLink(); // Call on load to set initial active link

            // Auto scroll ke rumah aspirasi
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                const rumahAspirasiSection = document.getElementById('rumahaspirasi');
                if (rumahAspirasiSection) {
                    setTimeout(function() {
                        rumahAspirasiSection.scrollIntoView({
                            behavior: 'smooth'
                            , block: 'start'
                        });
                    }, 500);
                }
            } else if (urlParams.has('error')) {
                const rumahAspirasiSection = document.getElementById('rumahaspirasi');
                if (rumahAspirasiSection) {
                    setTimeout(function() {
                        rumahAspirasiSection.scrollIntoView({
                            behavior: 'smooth'
                            , block: 'start'
                        });
                    }, 500);
                }
            }
        });
document.addEventListener('DOMContentLoaded', function() {
  const starsContainer = document.getElementById('stars-container');
  const starCount = 1000; // Jumlah bintang
  
  // Warna-warna bintang (bisa disesuaikan)
              const starColors = ['#ffffff', '#d1d5db', '#e5e7eb', '#9ca3af', '#6b7280'];


  // Membuat bintang
  for (let i = 0; i < starCount; i++) {
    const star = document.createElement('div');
    star.classList.add('star');
    
    // Ukuran acak antara 1px sampai 3px
    const size = Math.random() * 2 + 1;
    star.style.width = `${size}px`;
    star.style.height = `${size}px`;
    
    // Posisi acak di layar
    star.style.left = `${Math.random() * 100}vw`;
    star.style.top = `${Math.random() * 100}vh`;
    
    // Warna acak
    star.style.backgroundColor = starColors[Math.floor(Math.random() * starColors.length)];
    
    // Durasi animasi acak antara 50s sampai 150s
    const duration = Math.random() * 100 + 50;
    star.style.animationDuration = `${duration}s`;
    
    // Delay animasi acak
    star.style.animationDelay = `${Math.random() * 20}s`;
    
    starsContainer.appendChild(star);
  }
});
    </script>
</body>
</html>
