<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('logopolindra.png')); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Trix Editor -->
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    
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
            padding: 1.5rem;
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
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
    <div class="dashboard-container">
        <!-- Sidebar Toggle Button (Mobile) -->
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Sidebar -->
        <aside class="sidebar overflow-y " id="sidebar">
            <div class="sidebar-header">
                <a href="<?php echo e(route('dashboard')); ?>" class="sidebar-brand">
                    <img src="<?php echo e(asset('formadiksi.png')); ?>" alt="FORMADIKSI Logo">
                    <span>FORMADIKSI</span>
                </a>
            </div>
            
            <div class="sidebar-menu p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('rekap')); ?>" class="nav-link <?php echo e(request()->routeIs('rekap') ? 'active' : ''); ?>">
                            <i class="fas fa-chart-bar"></i>
                            <span>Rekap</span>
                        </a>
                    </li>
                    
                    <?php if(Auth::user()->role == 'user'): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('pengaduan')); ?>" class="nav-link <?php echo e(request()->routeIs('pengaduan') ? 'active' : ''); ?>">
                            <i class="fas fa-bullhorn"></i>
                            <span>Pengaduan</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin'): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('pengaduan.index')); ?>" class="nav-link <?php echo e(request()->routeIs('pengaduan.index') ? 'active' : ''); ?>">
                            <i class="fas fa-tasks"></i>
                            <span>Pengaduan</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('Rekap.index')); ?>" class="nav-link <?php echo e(request()->routeIs('Rekap.index') ? 'active' : ''); ?>">
                            <i class="fas fa-chart-line"></i>
                            <span>Data IPK</span>
                        </a>
                    </li>
                    
                    <?php if(Auth::user()->role == 'super_admin'): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e(request()->routeIs('users.index') ? 'active' : ''); ?>">
                            <i class="fas fa-users-cog"></i>
                            <span>User Management</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('mahasiswa.index')); ?>" class="nav-link <?php echo e(request()->routeIs('mahasiswa.index') ? 'active' : ''); ?>">
                            <i class="fas fa-user-graduate"></i>
                            <span>Mahasiswa</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if(Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin'): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('aspirasi.index')); ?>" class="nav-link <?php echo e(request()->routeIs('aspirasi.index') ? 'active' : ''); ?>">
                            <i class="fas fa-envelope-open-text"></i>
                            <span>Aspirasi</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('article.main')); ?>" class="nav-link <?php echo e(request()->routeIs('article.main') ? 'active' : ''); ?>">
                            <i class="fas fa-newspaper"></i>
                            <span>Artikel</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('acara.index')); ?>" class="nav-link <?php echo e(request()->routeIs('acara.index') ? 'active' : ''); ?>">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Acara</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>" class="nav-link <?php echo e(request()->routeIs('profile.edit') ? 'active' : ''); ?>">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('logout')); ?>" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    
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
    
    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>