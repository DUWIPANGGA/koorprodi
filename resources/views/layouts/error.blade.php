<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title') - FORMADIKSI</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        #stars-container {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
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

        @keyframes float {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        @keyframes pulse-float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
@keyframes bounce-char {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

.char {
    display: inline-block;
    animation: bounce-char 1.5s infinite ease-in-out;
}

        .error-container {
            background: rgba(243, 244, 246, 0.9); /* gray-100 */
            backdrop-filter: blur(6px);
        }

        .error-code {
            font-size: 9rem;
            line-height: 1;
            background: linear-gradient(135deg, #4B5563, #111827); /* gray-600 to gray-900 */
            -webkit-background-clip: text;
            background-clip: text;
            /* color: transparent; */
            text-shadow: 0 2px 12px rgba(75, 85, 99, 0.2);
            animation: pulse-float 2.5s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 5.5rem;
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, #4B5563, #1F2937);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(55, 65, 81, 0.3);
        }

        .btn-outline {
            border: 2px solid #4B5563;
            color: #4B5563;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: #4B5563;
            color: white;
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
<body class="bg-gray-50 text-gray-800">
    <div id="stars-container"></div>

    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="error-container max-w-2xl w-full rounded-xl shadow-xl overflow-hidden p-8">
            <div class="text-center">
                <img src="{{ asset('formadiksi.png') }}" alt="Logo FORMADIKSI" class="logo">

                <div class="error-code font-extrabold mb-6 text-gray-600">
    @foreach(str_split(trim($__env->yieldContent('code'))) as $i => $char)
        <span class="char" style="animation-delay: {{ $i * 0.15 }}s">{{ $char }}</span>
    @endforeach
</div>


                <h1 class="text-3xl font-bold text-gray-800 mb-3">
                    @yield('title')
                </h1>
                <p class="text-gray-600 text-lg mb-8">
                    @yield('message')
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('dashboard') }}" class="btn-primary px-6 py-3 rounded-lg flex items-center justify-center">
                        <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                    </a>
                    @if(Route::has('login') && !auth()->check())
                    <a href="{{ route('login') }}" class="btn-outline px-6 py-3 rounded-lg flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const starsContainer = document.getElementById('stars-container');
            const starCount = 80;
            const starColors = ['#ffffff', '#d1d5db', '#e5e7eb', '#9ca3af', '#6b7280'];

            for (let i = 0; i < starCount; i++) {
                const star = document.createElement('div');
                star.className = 'star';

                const size = Math.random() * 2 + 4;
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;

                star.style.left = `${Math.random() * 100}vw`;
                star.style.top = `${Math.random() * 100}vh`;

                star.style.backgroundColor = starColors[Math.floor(Math.random() * starColors.length)];

                const duration = Math.random() * 90 + 50;
                star.style.animationDuration = `${duration}s`;
                star.style.animationDelay = `${Math.random() * 20}s`;

                starsContainer.appendChild(star);
            }
        });
    </script>
</body>
</html>
