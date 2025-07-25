<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Trix Editor -->
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles

    <style>
        :root {
            --primary-color: #031927;
            --secondary-color: #508AA8;
            --accent-color: #C8E0F4;
            --light-color: #F4F4F4;
            --dark-color: #080907;
            --success-color: #849878;
            --danger-color: #BA1200;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            min-height: 100vh;
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .sidebar-brand img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            margin: 0.25rem 0;
            color: var(--dark-color);
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--success-color);
            color: white;
        }

        .nav-link i {
            width: 24px;
            margin-right: 0.75rem;
            text-align: center;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            /* padding: 1.5rem; */
            overflow-x: hidden;
        }

        /* Mobile Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            display: none;
            background-color: var(--primary-color);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        /* Tables */
        .table {
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                left: -250px;
                height: 100vh;
            }

            .sidebar.show {
                left: 0;
            }

            .sidebar-toggle {
                display: flex;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeIn 0.3s ease-out forwards;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <div class="dashboard-container overflow-hidden h-[100vh]">
        <!-- Sidebar Toggle Button (Mobile) -->
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar -->
       <!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="h-full flex flex-col bg-white shadow-md">
        <!-- Brand/Header Section -->
        <div class="sidebar-header p-4 border-b border-gray-100">
            <a href="{{ route('dashboard') }}" class="sidebar-brand flex items-center space-x-3">
                <img src="{{ asset('formadiksi.png') }}" alt="FORMADIKSI Logo" class="h-10 w-auto">
                <span class="text-xl font-semibold text-gray-800">FORMADIKSI</span>
            </a>
        </div>
        
        <!-- Menu Container -->
        <div class="flex-1 overflow-y-auto">
            <nav class="sidebar-menu p-4">
                <ul class="space-y-1">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('profile.show') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('profile.show') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-user mr-3 w-5 text-center"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-home mr-3 w-5 text-center"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- Rekap -->
                    <li>
                        <a href="{{ route('rekap') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('rekap') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-chart-bar mr-3 w-5 text-center"></i>
                            <span>Rekap</span>
                        </a>
                    </li>
                    
                    <!-- Student Services -->
                    @if (Auth::user()->role == 'user')
                    <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Mahasiswa</li>
                    
                    <li>
                        <a href="{{ route('pengaduan.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('pengaduan.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-bullhorn mr-3 w-5 text-center"></i>
                            <span>Pengaduan</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('rumah-aspirasi.create') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('rumah-aspirasi.create') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-comment-dots mr-3 w-5 text-center"></i>
                            <span>Aspirasi</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('domisili.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('domisili.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-home mr-3 w-5 text-center"></i>
                            <span>Domisili</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('sktm.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('sktm.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-file-alt mr-3 w-5 text-center"></i>
                            <span>SKTM</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('user-organisasi.create', ['user_id' => Auth::user()->id]) }}" class="nav-link flex items-center p-3 rounded-lg transition-colors text-gray-500 hover:bg-gray-50 hover:text-black">
                            <i class="fas fa-users mr-3 w-5 text-center"></i>
                            <span>Organisasi</span>
                        </a>
                    </li>
                    
                    {{-- <li>
                        <a href="{{ route('acara.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('acara.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-calendar-alt mr-3 w-5 text-center"></i>
                            <span>Kalender Formadiksi</span>
                        </a>
                    </li> --}}
                    @endif
                    
                    <!-- Admin Services -->
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                    <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan Admin</li>
                    
                    <li>
                        <a href="{{ route('pengaduan') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('pengaduan.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-tasks mr-3 w-5 text-center"></i>
                            <span>Manajemen Pengaduan</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('Rekap.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('Rekap.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-chart-line mr-3 w-5 text-center"></i>
                            <span>Data IPK</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('mahasiswa.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('mahasiswa.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-user-graduate mr-3 w-5 text-center"></i>
                            <span>Manajemen Mahasiswa</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('redirect-links.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('redirect-links.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-link mr-3 w-5 text-center"></i>
                            <span>Manajemen Link</span>
                        </a>
                    </li>
                    
                    @if (Auth::user()->role == 'super_admin')
                    <li>
                        <a href="{{ route('users.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('users.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-users-cog mr-3 w-5 text-center"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    @endif
                    @endif
                    
                    <!-- KOMINFO Services -->
                    @if (Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                    <li class="mt-6 mb-2 px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan KOMINFO</li>
                    
                    <li>
                        <a href="{{ route('aspirasi.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('aspirasi.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-envelope-open-text mr-3 w-5 text-center"></i>
                            <span>Manajemen Aspirasi</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('article.main') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('article.main') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-newspaper mr-3 w-5 text-center"></i>
                            <span>Manajemen Artikel</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('acara.index') }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('acara.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                            <i class="fas fa-calendar-alt mr-3 w-5 text-center"></i>
                            <span>Manajemen Acara</span>
                        </a>
                    </li>
                    @endif
                </ul>

                <!-- Bottom Section -->
                <div class="mt-8 pt-4 border-t border-gray-100">
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('profile.edit', Auth::user()->id) }}" class="nav-link flex items-center p-3 rounded-lg transition-colors {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600' : 'text-gray-500 hover:bg-gray-50 hover:text-black' }}">
                                <i class="fas fa-cog mr-3 w-5 text-center"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link flex items-center p-3 rounded-lg transition-colors text-gray-500 hover:bg-gray-50 hover:text-black">
                                    <i class="fas fa-sign-out-alt mr-3 w-5 text-center"></i>
                                    <span>Keluar</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    @livewireScripts

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (window.innerWidth <= 992 &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target)) {
                sidebar.classList.remove('show');
            }
        });

        // Active link highlighting
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>
