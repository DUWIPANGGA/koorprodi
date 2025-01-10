<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logopolindra.png ') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">

    @livewireStyles
    <style>
        body {
            margin: 0;
            background-color: #F4F4F4;
            font-family: sans-serif;
            height: 100vh;
        }

        .navbar {
            background-color: #031927; /* Warna biru gelap */
            color: #fff;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .dashboard {
            display: flex;
            height: 100vh;
            flex-direction: row;
        }

        /* Sidebar Styling */
.sidebar {
    display: flex;
    flex-direction: column;
    width: 200px;
    padding: 20px;
    background-color: #adc0bb; /* Secondary color */
    color: #080907; /* Text color */
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
}

.sidebar img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 2px solid #849878; /* Accent color */
    object-fit: cover;
}

.sidebar h5 {
    font-size: 18px;
    color: #080907; /* Text color */
}

.sidebar a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    color: #080907;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.sidebar a:hover,
.sidebar a.active {
    background-color: #849878; /* Primary color */
    color: #f8f9f8; /* Background color */
}

.sidebar a i {
    margin-right: 10px;
    /* color: #080907; Accent color */
}

.dropdown-menu {
    background-color: #adc0bb; /* Secondary color */
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    color: #080907;
}

.dropdown-item:hover {
    background-color: #849878; /* Primary color */
    color: #f8f9f8;
}

/* Scrollbar Styling */
.sidebar::-webkit-scrollbar {
    display: none;
}


        .menu a {
            display: block;
            color: #080907;
            color: #080907;
            padding: 10px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            color: #fff;
            background-color: #849878b1; /* Aksen hijau untuk hover */
        }   
.active{
    background-color: #849878;
    color: #fff;
}
        .menu a i {
            margin-right: 10px;
        }

        .content-wrapper {
            /* min-height: 100vh    ; */
            overflow-x: hidden;
            flex: 1;
            padding: 20px;
            background-color: #F4F4F4; /* Warna abu-abu lembut */
            overflow-y: auto;
        }
.hidden{
    display: none;
}
        .container-card {
            background: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .container-card h4 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .container-card i {
            font-size: 24px;
            color: #333;
        }

        .charts {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            flex: 1;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 10px;
        }

        .param-button {
            background: linear-gradient(to right, #849878, #adc0bb);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 2s, background-color 2s;
            display: none;
        }

        .param-button:hover {
            background: linear-gradient(to right, #adc0bb, #98aeb0); /* Aksen hijau pada hover */
        }
        .menu {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.menu a {
    text-decoration: none;
    padding: 10px;
    color: #080907;
    display: flex;
    align-items: center;
}

.dropdown {
    position: relative;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #f9f9f9;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}

.dropdown-menu a {
    padding: 10px 20px;
    display: block;
    color: #080907;
}
.dropdown-menu a:hover {
    color: #black;
    background-color: #98aeb0;
}
body {
        font-family: 'Poppins', sans-serif;
    }
.dropdown:hover .dropdown-menu {
    display: block;
}

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .param-button {
                display: block;
            }
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                box-shadow: none;
                position: absolute;
                z-index: 99;
                width: 50%;
            }

            .menu a {
                font-size: 14px;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    @livewireStyles
</head>

<body>
    <div class="dashboard">
        <div class="sidebar col-md-2 bg-white vh-100 align-items-start p-3" id="sidebar_">

            <!-- Header Logo dan Nama -->
            <div class="d-flex align-items-center justify-content-center text-center mb-4">
                <div class="me-2">
                    <img src="{{ asset('formadiksi.png') }}" alt="Foto Profil" class="rounded-circle border"
                        style="height: 3rem; width: 3rem; object-fit: cover;">
                </div>
                <div>
                    <h5 class="mb-0" style="font-size: 18px; color: #080907;">FORMADIKSI</h5>
                </div>
            </div>
        
            <!-- Menu Items -->
            <div class="menu w-100">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home me-2"></i> Home
                </a>
                <a href="{{ route('rekap') }}" class="nav-link {{ request()->routeIs('rekap') ? 'active' : '' }}">
                    <i class="fas fa-sliders-h me-2"></i> Rekap
                </a>
                @if (Auth::user()->role == 'user')
                <a href="{{ route('pengaduan') }}" class="nav-link {{ request()->routeIs('pengaduan') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn me-2"></i> Pengaduan
                </a>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                <a href="{{ route('pengaduan.index') }}" class="nav-link {{ request()->routeIs('pengaduan.index') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn me-2"></i> Pengaduan
                </a>
                <a href="{{ route('Rekap.index') }}" class="nav-link {{ request()->routeIs('Rekap.index') ? 'active' : '' }}">
                    <i class="fas fa-chart-line me-2"></i> Data IPK
                </a>
                <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="fas fa-user me-2"></i> User
                </a>
                <div class="dropdown">
                    <a class="nav-link" href="{{ route('mahasiswa.index')}}" aria-expanded="false">
                        <i class="fas fa-graduation-cap me-2"></i> Mahasiswa
                    </a>
                </div>
                @endif
                @if(Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                <a href="{{ route('aspirasi.index') }}" class="nav-link {{ request()->routeIs('aspirasi.index') ? 'active' : '' }}">
                    <i class="fa fa-envelope"></i> Aspirasi
                </a>
                <a href="{{ route('article.main') }}" class="nav-link {{ request()->routeIs('article.main') ? 'active' : '' }}">
                    <i class="fas fa-newspaper me-2"></i> Artikel
                </a>
                <a href="{{ route('acara.index') }}" class="nav-link {{ request()->routeIs('acara.index') ? 'active' : '' }}">
                    <i class="fas fa-calendar me-2"></i> Acara
                </a>
                @endif
                {{-- @endif --}}
                {{--  --}}
                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </div>
        </div>
        
        <button onclick="toggleSidebar()" class="param-button"
            style="position: absolute; top: 10px; left: 10px; z-index: 100;">
            <i class="fas fa-bars"></i>
        </button>

    <div class="content-wrapper">
        @yield('content')
    </div>

    </div>
    @livewireScripts
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar_");
            
            console.log(sidebar);
            if (sidebar.style.display == "none") {
                console.log('on');
                
                sidebar.style.display = "block";
            } else {
                console.log('off');
                sidebar.style.display = "none";
            }
        }

    </script>
@yield('scripts')
@stack('scripts')
</body>

</html>
