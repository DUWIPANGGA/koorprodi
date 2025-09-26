<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
<meta name="theme-color" content="#031927">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        abu1: '#797979',
                        abu2: '#9C9C9C',
                        biru: '#00AAFF',
                        kuning: '#F8CC09',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-image: url(/img/polindra-bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans">
    <main class="min-h-screen flex overflow-hidden">
        <!-- Left Side - Welcome Section -->
        <div class="hidden md:block md:w-1/2 lg:w-2/3 relative">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/subtle-dots.png')] opacity-10"></div>
            
            <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center">
                <!-- Logo with AOS animation -->
                <div class="mb-8 transition-transform duration-300 hover:scale-105" data-aos="fade-up" data-aos-duration="800">
                    <img src="{{ asset('mascot.png') }}" alt="Formadiksi Logo" class="w-48 h-auto mx-auto drop-shadow-lg">
                </div>
                
                <!-- Text content with AOS animations -->
                <div class="space-y-4 text-white">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 " data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                        Selamat Datang
                    </h2>
                    <p class="text-xl md:text-2xl font-medium opacity-90" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        Mahasiswa FORMADIKSI<br>
                        Politeknik Negeri Indramayu
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="w-full md:w-1/2 lg:w-1/3 flex items-center justify-center p-8">
            <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8" data-aos="fade-left" data-aos-duration="800">
                <div class="flex justify-center mb-6" data-aos="zoom-in" data-aos-duration="600">
                    <a href="logo-polindra">
                        <img src="{{ asset('LogoPolindra.png') }}" alt="Logo" width="50">
                    </a>
                </div>
                
                <h1 class="text-2xl font-bold text-center text-gray-800 mb-8" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                    Masuk
                </h1>
                
                @if ($errors->any())
                <div class="alert alert-danger mb-4" data-aos="fade-up" data-aos-duration="600">
                    <ul class="list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">NIM atau email</label>
                        <input type="text" value="{{ old('email') }}" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-biru focus:border-transparent" 
                               id="email" name="email" required>
                    </div>
                    
                    <div class="mb-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-biru focus:border-transparent" 
                               id="password" name="password" required>
                    </div>
                    
                    <button type="submit" class="w-full bg-biru text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
                        Masuk
                    </button>
                    
                    <div class="mt-4 text-center text-sm text-abu1" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                        Belum punya akun? <a href="http://wa.me/628971444573" class="text-biru hover:underline">Hubungi admin</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- AOS JS and initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true, // Animations only happen once
            easing: 'ease-out-quad',
            duration: 600
        });
    </script>
        <script>
if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker.register("{{ asset('service-worker.js') }}")
      .then(function(reg) {
        console.log("Service Worker registered", reg);
      })
      .catch(function(err) {
        console.log("Service Worker failed", err);
      });
  });
}
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>