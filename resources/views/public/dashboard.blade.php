@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('styles')
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
            color: #4CAF50;
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

        /* .icon-list ul li:hover {
                                color: #98aeb0;
                            } */

        /* Warna dan desain untuk grafik */
        #ipkChart {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="main-content d-flex gap-3 flex-wrap">
        {{-- <div class="container-card card d-flex flex-row" style="width:100%; height:10vh;overflow:hidden">
        </div> --}}
        <div class="container-card card d-flex flex-column flex-md-row" style="width: 100vw; height: auto; overflow: hidden;">
            <!-- Bagian Foto Profil -->
            <div class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;max-width: 400px; ">
                <div class="d-flex justify-content-center align-items-center" style="width: 100%; text-align: center;">
                    <img src="{{ Auth::user()->foto_profil ?? asset(Auth::user()->foto_profil) | asset('LogoOrang.jpg') }}" alt="Logo"
                         style="height: 90%; max-width: 100px; aspect-ratio: 1/1; border-radius: 50%; object-fit: cover; border: #000 1px solid;">
                </div>
            </div>
        
            <!-- Bagian Teks dan Ikon -->
            <div class="container d-flex flex-column justify-content-center" style="text-align: left; width: 100%; padding-left: 15px;">
                <h5 class="fw-bold fs-5">Selamat Datang Kembali! {{ Auth::user()->name }}</h5>
                <p class="text-left">Silakan jelajahi fitur-fitur yang tersedia untuk memantau kemajuan Anda.</p>
                <div class="icon-list">
                    <ul class="list-group justify-content-start d-flex flex-row flex-wrap border-0">
                        <li class="list-group-item border-0 bg-transparent"><a href="{{ route('profile.edit', Auth::user()->id) }}"><i class="fas fa-user-edit"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i class="fas fa-sync"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i class="fas fa-chart-line"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="{{ route('rekap') }}"><i class="fas fa-book"></i></a></li>
                        <li class="list-group-item border-0 bg-transparent"><a href="#"><i class="fas fa-cog"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        
        <!-- IPK Input -->
        <div class="container-card card d-flex flex-row align-items-center justify-content-between"
            style="width: 100%; max-width: 350px; height: auto; padding: 15px; background-color: #ffffff; 
            border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <div class="container-fluid d-flex justify-content-center align-items-center"
                style="height: 100%; width: 100%;">
                <canvas id="ipkChart" style="width: 100%; height: 100%;"></canvas> <!-- Canvas menyesuaikan penuh -->
            </div>
        </div>



        <div class="container-card card d-flex flex-row align-items-start justify-content-between"
            style="width: 100%; max-width: 350px; height: auto; padding: 20px; background-color: #ffffff; 
            border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1);">
            <div class="container" style="text-align: left;">
                <!-- SEMESTER -->
                <div class="d-flex align-items-center mb-4">
                    <div
                        style="background-color: #007bff; width: 50px; height: 50px; border-radius: 50%; display: flex; 
                        justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-calendar-alt" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div>
                        <h2 class="h5" style="color: #007bff; margin-bottom: 5px;">SEMESTER</h2>
                        <p class="fs-3 fw-bold" style="color: #333; margin: 0;">{{ $ipkNew->semester ?? 1 }}</p>
                    </div>
                </div>

                <!-- IPK -->
                <div class="d-flex align-items-center">
                    <div
                        style="background-color: #28a745; width: 50px; height: 50px; border-radius: 50%; display: flex; 
                        justify-content: center; align-items: center; margin-right: 15px;">
                        <i class="fas fa-graduation-cap" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div>
                        <h2 class="h5" style="color: #28a745; margin-bottom: 5px;">IPK</h2>
                        <p class="fs-3 fw-bold" style="color: #333; margin: 0;">{{ $ipkNew->IPK ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>



        <div class="container-card card d-flex flex-row align-items-start justify-content-between"
            style="width: 100%; max-width: 350px; height: auto; padding: 20px; background-color: #ffffff; 
            border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1);">
            <div
                style="background-color: #28a745; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-book" style="font-size: 50px; color: white;"></i>
            </div>
            <div class="container ms-3" style="text-align: left;">
                @if (Auth::user()->pelaporan_ipk == 1)
                    <h5 class="fw-bold fs-5" style="color: #28a745;">Rekap IPK</h5>
                    <p class="fs-6" style="color: #333;">Anda sudah melakukan pelaporan IPK di semester ini!</p>
                    <p class="fs-7" style="color: #555;">Terima kasih telah memperbarui data semester ini.</p>
                @elseif (Auth::user()->pelaporan_ipk == 0)
                    <h5 class="fw-bold fs-5" style="color: #28a745;">Rekap IPK</h5>
                    <p class="fs-6" style="color: #333;">Anda belum melakukan pelaporan IPK di semester ini!</p>
                    <p class="fs-7" style="color: #555;">Segera laporkan IPK Anda untuk memperbarui data semester ini.</p>
                @endif
            </div>
        </div>

        <!-- Informasi Semester -->
        <div class="container-card card d-flex flex-row align-items-start justify-content-between"
            style="width: 100%; max-width: 350px; height: auto; padding: 20px; background-color: #ffffff; 
            border-radius: 12px; box-shadow: 0 6px 12px rgba(0,0,0,0.1);">
            <div
                style="background-color: #007bff; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-calendar-alt" style="font-size: 50px; color: white;"></i>
            </div>
            <div class="container ms-3" style="text-align: left;">
                <h5 class="fw-bold fs-5" style="color: #007bff;">Informasi Semester</h5>
                <p class="fs-6" style="color: #333;">Anda sedang berada di <strong>semester
                        {{ $semester }}</strong>.</p>
                <p class="fs-7" style="color: #555;">Pastikan Anda mengikuti setiap pengumuman semester ini.</p>
            </div>
        </div>
        @if (Auth::user()->role == 'super_admin')
            <!-- Container Card -->
            <div class="container-card card d-flex flex-column align-items-center justify-content-between"
                style="width: 30%; height: 40vh; padding: 15px; background-color: #ffffff; border-radius: 10px; 
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); text-align: center;">
                <!-- Description -->
                <div
                    style="background-color: #4CAF50; padding: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;">
                    <i class="fas fa-file-alt" style="font-size: 50px; color: white;"></i>
                </div>
                <div>
                    <h5 style="color: #333;">Event Rekap</h5>
                    <p style="color: #555; font-size: 14px; margin: 10px 0;">Klik tombol di bawah untuk membuka form rekap
                        event.</p>
                </div>

                <!-- Button -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                    Click for option
                </button>
            </div>
        @endif
        <div class="row g-4" style="width: 100vw;">
            {{-- <h3 class="mb-4">Baca Juga</h3> --}}
            @foreach ($recommendedArticles as $recommendedArticle)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-img-top"
                            style="background-image: url('{{ asset('storage/' . $recommendedArticle->picture_article) }}'); 
                                    background-size: cover; 
                                    background-position: center; 
                                    height: 200px; 
                                    filter: brightness(50%);
                                    border-radius: 0.375rem 0.375rem 0 0;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-dark">{{ $recommendedArticle->title }}</h5>
                            <p class="card-text text-muted">{!! Str::limit($recommendedArticle->content, 100) !!}</p>
                            <a href="{{ route('article.show.detail', $recommendedArticle->id) }}"
                                class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if (Auth::user()->role == 'super_admin')
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">EVENT REKAP IPK</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="statusForm" method="POST" action="{{ route('rekap.event') }}">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="alert alert-warning" role="alert">
                                    <i class="fas fa-exclamation-triangle"></i> Peringatan: Mohon berhati-hati, karena
                                    dapat
                                    berpengaruh besar terhadap data perekapan.
                                </div>
                                <!-- Buttons for Status -->
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-danger w-48 send-status" data-status="0"
                                        name="status" value="0">Buka rekap</button>
                                    <button type="submit" class="btn btn-success w-48 send-status" data-status="1"
                                        name="status" value="1">Tutup rekap</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        // Data IPK Mahasiswa
        var ipkArray = @json($ipkArray);
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

        const modal = document.getElementById('modal');
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');

        // Open modal
        openModal.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside the modal content
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
@endsection
