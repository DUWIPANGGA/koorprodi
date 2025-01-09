<?php $__env->startSection('title', 'Dashboard PKM'); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        .vertical-hr {
            border-left: 2px solid #ccc;
            height: 100%;
            position: absolute;
            left: 50%;
            top: 0;
        }

        .container-card {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .container-card i {
            font-size: 100px;
<<<<<<< HEAD:storage/framework/views/0e02c4bbb06c46b6e5afd54dabd8b497.php
            color: #4CAF50;
=======
            color: #849878;
            /* Aksen hijau untuk ikon */
>>>>>>> 6253f4470bd06e21b67d3528d09a659b51aa3cfc:storage/framework/views/205584f33941697319a091a8d4aacdd9.php
        }

        .container-card .fw-bold {
            color: #333;
        }

        .container-card .fs-5 {
            color: #555;
        }

        .icon-list ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        .icon-list ul li a {
            color: #080907;
            /* Warna biru gelap */
            font-size: 20px;
            text-decoration: none;
        }

<<<<<<< HEAD:storage/framework/views/0e02c4bbb06c46b6e5afd54dabd8b497.php
        /* .icon-list ul li:hover {
            color: #98aeb0;
        } */
=======
        .icon-list ul li a:hover {
            color: #849878;
            /* Aksen hijau pada hover */
        }
>>>>>>> 6253f4470bd06e21b67d3528d09a659b51aa3cfc:storage/framework/views/205584f33941697319a091a8d4aacdd9.php

        /* Warna dan desain untuk grafik */
        #ipkChart {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content d-flex gap-3 flex-wrap">
        
        <div class="container-card card d-flex flex-row" style="width:100%; height:22vh;overflow:hidden">
            <img src="<?php echo e(asset('formadiksi.png')); ?>" alt="Foto Profil"
                style="height: 90%;aspect-ratio:1/1; border-radius: 50%; object-fit:cover; border: #000 1px solid">
            <div class="container" style="text-align: left;">
                <h5 class="fw-bold fs-5 text-center">Selamat Datang Kembali! <?php echo e(Auth::user()->name); ?></h5>
                <p class="text-center">Silakan jelajahi fitur-fitur yang tersedia untuk memantau kemajuan Anda.</p>
                <div class="icon-list">
                    <ul class="list-group justify-content-center d-flex flex-row border-0">
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i
                                    class="fas fa-user-edit"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i
                                    class="fas fa-sync"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i
                                    class="fas fa-chart-line"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i
                                    class="fas fa-book"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i class="fas fa-cog"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="text-align: center;">
                <img src="<?php echo e(Auth::user()->foto_profil ?? asset(Auth::user()->foto_profil) | asset('LogoOrang.jpg')); ?>"
                    alt="Logo"
                    style=" height: 90%;aspect-ratio:1/1; border-radius: 50%; object-fit:cover; border: #000 1px solid">
            </div>
        </div>
        <!-- IPK Input -->
        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
    style="width:30%; height:40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <div class="container" style="height: 100%; width: 100%; display: flex; justify-content: center; align-items: center;">
        <canvas id="ipkChart" style="width: 100%; height: 100%;"></canvas> <!-- Canvas menyesuaikan penuh -->
    </div>
</div>


        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
            style="width:30%; height:40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="container" style="text-align: left;">
                <h2 class="h5">SEMESTER</h2>
                <p class="fs-3 fw-bold"><?php echo e($ipkNew->semester); ?></p>
                <h2 class="h5">IPK</h2>
                <p class="fs-3 fw-bold"><?php echo e($ipkNew->IPK); ?></p>
            </div>
        </div>

        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
            style="width:30%; height:40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div
                style="background-color: #28a745; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-book" style="font-size: 50px; color: white;"></i>
            </div>
            <div class="container ms-3" style="text-align: left;">
                <h5 class="fw-bold fs-5" style="color: #28a745;">Rekap IPK</h5>
                <p class="fs-6" style="color: #333;">Anda belum melakukan pelaporan IPK di semester ini!</p>
                <p class="fs-7" style="color: #555;">Segera laporkan IPK Anda untuk memperbarui data semester ini.</p>
            </div>
        </div>

        <!-- Informasi Semester -->
        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
            style="width:30%; height:40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div
                style="background-color: #007bff; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-calendar-alt" style="font-size: 50px; color: white;"></i>
            </div>
            <div class="container ms-3" style="text-align: left;">
                <h5 class="fw-bold fs-5" style="color: #007bff;">Informasi Semester</h5>
                <p class="fs-6" style="color: #333;">Anda sedang berada di <strong>semester 
                        <?php echo e($semester); ?></strong>.</p>
                <p class="fs-7" style="color: #555;">Pastikan Anda mengikuti setiap pengumuman semester ini.</p>
            </div>
        </div>

        <!-- Informasi KIPK -->
        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
            style="width:30%; height:40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div
                style="background-color: #ff5733; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-hand-holding-heart" style="font-size: 50px; color: white;"></i>
            </div>
            <div class="container ms-3" style="text-align: left;">
                <h5 class="fw-bold fs-5" style="color: #ff5733;">Informasi KIPK</h5>
                <p class="fs-6" style="color: #333;">Anda terdaftar sebagai penerima KIPK semester ini!</p>
                <p class="fs-7" style="color: #555;">Pastikan Anda memenuhi semua persyaratan dan mengikuti prosedur untuk
                    bantuan ini.</p>
            </div>
        </div>
        <div class="row">
            <h3>Baca Juga</h3>
            <?php $__currentLoopData = $recommendedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendedArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-img-top"
                            style="background-image: url('<?php echo e(asset('storage/' . $recommendedArticle->picture_article)); ?>'); background-size: cover; background-position: center; height: 200px; filter: brightness(50%);">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;"><?php echo e($recommendedArticle->title); ?></h5>
                            <p class="card-text" style="color: #333;"><?php echo Str::limit($recommendedArticle->content, 100); ?></p>
                            <a href="<?php echo e(route('article.show.detail', $recommendedArticle->id)); ?>" class="btn btn-primary">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Data IPK Mahasiswa
        var ipkArray = <?php echo json_encode($ipkArray, 15, 512) ?>;
        console.log(ipkArray);
        const dataMahasiswa = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8'], // Label semester (harus sesuai panjang dengan data)
            datasets: [{
                label: 'IPK',
                data: ipkArray,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna fill area
                borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                borderWidth: 1.5,
                tension: 0.4, // Kurva garis
                fill: true, // Isi area di bawah garis
                pointRadius: 5, // Ukuran titik
                pointBackgroundColor: 'rgba(75, 192, 192, 1)' // Warna titik
            }]
        };

        // Konfigurasi Grafik
        const config = {
            type: 'line', // Jenis grafik
            data: dataMahasiswa,
            options: {
                responsive: true,
                
                plugins: {
                    datalabels: {
                        align: 'top',
                        color: 'grey',
                        font: {
                            weight: 'bold',
                            size: 10 // Ukuran font
                        },
                        formatter: (value) => {
                            return value.toFixed(2); // Menampilkan nilai data (2 angka desimal)
                        }
                    },
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5, // Skala maksimal (IPK maksimal)
                        grid: {
                            display: false // Menampilkan grid pada sumbu Y
                        },
                        ticks: {
                            display: false
                        }
                    },
                    x: {
                        grid: {
                            display: false // Menghilangkan grid pada sumbu X
                        },
                        ticks: {
                            stepSize: 1 // Jarak antar nilai label
                        }
                    }
                }
            },
            plugins: [ChartDataLabels] // Tambahkan datalabels ke array plugin
        };

        // Inisialisasi Chart
        const ctx = document.getElementById('ipkChart').getContext('2d');
        const ipkChart = new Chart(ctx, config);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/public/dashboard.blade.php ENDPATH**/ ?>