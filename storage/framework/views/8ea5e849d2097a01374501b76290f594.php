<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMADIKSI - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('logopolindra.png ')); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

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

        .sidebar {
            width: 240px;
            background-color: #031927; /* Warna biru gelap */
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            overflow-y: scroll;
        }
        .sidebar::-webkit-scrollbar {
    display: none;
}
        .sidebar img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .sidebar h4 {
            /* color: #fff; */
            margin-bottom: 10px;
        }

        .sidebar p {
            font-size: 14px;
            /* color: #ccc; */
            margin-bottom: 20px;
        }

        .menu a {
            display: block;
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
            background-color: #98aeb0; /* Aksen hijau untuk hover */
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
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            if (sidebar.style.display === "none") {
                sidebar.style.display = "block";
            } else {
                sidebar.style.display = "none";
            }
        }
        document.querySelector('.dropdown-toggle').addEventListener('click', function(e) {
    e.preventDefault();
    const dropdownMenu = this.nextElementSibling;
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});

    </script>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body>
    <div class="dashboard">
        <div class="sidebar col-md-2 bg-white vh-90" id="sidebar" style="width: 200px;">
            <div class="row">
                <img src="<?php echo e(asset('formadiksi.png')); ?>" alt="Foto Profil"
                style="height: 3rem;width:3rem; border-radius: 50%; object-fit:cover; border: #000 1px solid">
            
                <h5 style="text-align: center; font-size: 18px; color: #080907;">FORMADIKSI</h5>
            </div>
            
            <div class="menu">
                <a href="<?php echo e(route('dashboard')); ?>" class="active"><i class="fas fa-home"></i> Home</a>
                <a href="<?php echo e(route('Rekap.index')); ?>"><i class="fas fa-chart-line"></i> Data IPK</a>
                <a href="<?php echo e(route('pengaduan.index')); ?>"><i class="fas fa-bullhorn"></i> Pengaduan</a>
                <a href="<?php echo e(route('article.main')); ?>"><i class="fas fa-newspaper"></i> Artikel</a>
                <a href="<?php echo e(route('rekap')); ?>"><i class="fas fa-sliders-h"></i> Rekap</a>
                <a href="<?php echo e(route('users.index')); ?>"><i class="fas fa-user"></i> User</a>
                <a href="<?php echo e(route('acara.index')); ?>"><i class="fas fa-calendar"></i>Acara</a>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fas fa-graduation-cap"></i> Mahasiswa</a>
                    <div class="dropdown-menu">
                        <a href="">Daftar Mahasiswa</a>
                        <a href=" ">Tambah Mahasiswa</a>
                        <a href=" ">Statistik Mahasiswa</a>
                    </div>
                </div>
                <a href="<?php echo e(route('users.edit',Auth::user()->id)); ?>"><i class="fas fa-cog"></i> Settings</a>
                <a href="<?php echo e(route('logout')); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        <button onclick="toggleSidebar()" class="param-button"
            style="position: absolute; top: 10px; left: 10px; z-index: 100;">
            <i class="fas fa-bars"></i>
        </button>

    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    </div>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <script src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    
<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>