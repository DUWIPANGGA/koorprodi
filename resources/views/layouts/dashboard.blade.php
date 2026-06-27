<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI - @yield('title')</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('mascot.png') }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.0.0/ckeditor5.css">
<!-- PWA Manifest -->
<link rel="manifest" href="https://formadiksi.id/public/manifest.json">
<meta name="theme-color" content="#031927">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Space+Grotesk:wght@700&family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
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
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
                        "on-tertiary-container": "#ebe8e7",
                        "on-tertiary": "#ffffff",
                        "tertiary": "#515050",
                        "surface-variant": "#e2e2e2",
                        "surface-container": "#eeeeee",
                        "inverse-primary": "#aac7ff",
                        "tertiary-container": "#696868",
                        "on-secondary-fixed": "#390c00",
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
                        "surface-container-high": "#e8e8e8",
                        "surface-container-low": "#f3f3f3",
                        "surface-container": "#eeeeee",
                        "secondary-fixed-dim": "#ffb59c",
                        "on-primary-fixed-variant": "#00458e",
                        "error": "#ba1a1a"
                    },
                    fontFamily: {
                        "body-md": ["Work Sans"],
                        "headline-xxl": ["Montserrat"],
                        "label-bold": ["Space Grotesk"],
                        "headline-lg": ["Montserrat"],
                    },
                    fontSize: {
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "label-bold": ["14px", { "lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "700" }],
                    }
                },
            },
        }
    </script>

    @livewireStyles

    <style>
        :root {
            --primary-color: #004e9f;
            --secondary-color: #508AA8;
            --accent-color: #C8E0F4;
            --light-color: #F4F4F4;
            --dark-color: #080907;
            --success-color: #849878;
            --danger-color: #BA1200;
        }

        body {
            font-family: 'Work Sans', sans-serif;
            background-color: var(--light-color);
            color: var(--dark-color);
            min-height: 100vh;
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .hard-shadow {
            box-shadow: 4px 4px 0px 0px #1a1c1c;
        }

        .grainy-overlay {
            position: relative;
        }
        .grainy-overlay::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("https://www.transparenttextures.com/patterns/pinstriped-suit.png");
            opacity: 0.04;
            pointer-events: none;
            mix-blend-mode: multiply;
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
            border-bottom: 2px solid #1a1c1c;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #1a1c1c;
            text-decoration: none;
        }

        .sidebar-brand img {
            width: 36px;
            height: 36px;
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
            overflow-x: hidden;
        }

        /* Mobile Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 1100;
            display: none;
            background-color: #004e9f;
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

    <div class="dashboard-container overflow-hidden h-[100vh] grainy-overlay">
        <!-- Sidebar Toggle Button (Mobile) -->
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="h-full flex flex-col bg-white shadow-md border-r-2 border-on-surface">
                <!-- Brand/Header Section -->
                
                
                <!-- Menu Container -->
                <div class="flex-1 overflow-y-auto">
                    @include('layouts.sidebar')
                </div>

            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content min-w-screen" id="mainContent">
            @if (!request()->routeIs('profile.edit'))
        @include('public.modal-data')
        @endif
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

</body>

</html>
