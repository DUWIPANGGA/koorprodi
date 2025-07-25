@extends('layouts.dashboard')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="min-h-screen p-4 md:p-8 bg-gray-50">
    <!-- Welcome Section with Profile -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-6 border border-gray-200">
    <div class="flex flex-col md:flex-row items-center gap-6">
        <!-- Profile Picture -->
        <div class="relative group">
            <img src="{{ Auth::user()->foto_profil ?? asset('LogoOrang.jpg') }}" alt="Foto profil" 
                 class="w-24 h-24 md:w-28 md:h-28 rounded-full object-cover border-4 border-gray-200 shadow-lg group-hover:shadow-md transition-shadow">
            <div class="absolute -bottom-2 -right-2 bg-gray-100 rounded-full p-2 shadow-md group-hover:bg-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Welcome Content -->
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-2xl md:text-3xl font-bold mb-1 text-gray-800">
                Selamat datang, <span class="text-gray-600">{{ Auth::user()->name }}</span>!
            </h1>
            <p class="text-gray-600">NIM: {{ Auth::user()->nim }}</p>
            <p class="text-gray-600">Program Studi: {{ Auth::user()->prodi ?? 'Belum diatur' }}</p>

            <!-- Quick Actions -->
            <div class="flex justify-center md:justify-start gap-4 mt-5">
                <a href="{{ route('profile.edit', Auth::user()->id) }}" 
                   class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 shadow-sm text-gray-700 hover:text-gray-900 transition-all duration-300 group" 
                   data-tippy-content="Edit Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                
                <a href="{{ route('rekap') }}" 
                   class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 shadow-sm text-gray-700 hover:text-gray-900 transition-all duration-300 group" 
                   data-tippy-content="Rekap Akademik">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

    <!-- Academic Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- IPK Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-blue-500">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">IPK Saat Ini</h3>
                        <p class="mt-1 text-2xl font-bold text-gray-900">{{ $ipkNew->IPK ?? '0.00' }}</p>
                        <p class="mt-1 text-xs text-gray-500">
                            @if (($ipkNew->IPK ?? 0) >= 3.5)
                            <span class="text-green-600 font-medium">Performa sangat baik</span>
                            @elseif(($ipkNew->IPK ?? 0) >= 3.0)
                            <span class="text-blue-600 font-medium">Performa baik</span>
                            @else
                            <span class="text-yellow-600 font-medium">Terus tingkatkan</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Semester Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-indigo-500">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Semester Saat Ini</h3>
                        <p class="mt-1 text-2xl font-bold text-gray-900">{{ Auth::user()->semester ?? 1 }}</p>
                        <p class="mt-1 text-xs text-gray-500">Tahun Akademik {{ date('Y') }}/{{ date('Y')+1 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- IPK Report Status -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 {{ Auth::user()->pelaporan_ipk == 1 ? 'border-teal-500' : 'border-amber-500' }}">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="p-3 rounded-full {{ Auth::user()->pelaporan_ipk == 1 ? 'bg-teal-100 text-teal-600' : 'bg-amber-100 text-amber-600' }} mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Status Laporan IPK</h3>
                        @if (Auth::user()->pelaporan_ipk == 1)
                        <p class="mt-1 text-xl font-bold text-gray-900">Sudah Dilaporkan</p>
                        <p class="mt-1 text-xs text-gray-500">Terima kasih telah melaporkan</p>
                        @else
                        <p class="mt-1 text-xl font-bold text-gray-900">Belum Dilaporkan</p>
                        <p class="mt-1 text-xs text-gray-500">Segera laporkan IPK Anda</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- IPK Progress Chart -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Perkembangan IPK</h3>
            <span class="text-sm text-gray-500">Semester {{ $ipkNew->semester ?? 1 }}</span>
        </div>
        <div class="h-64">
            <canvas id="ipkChart"></canvas>
        </div>
    </div>

    <!-- Student Services -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Mahasiswa</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Pengaduan -->
            <a href="{{ route('pengaduan') }}" class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition-shadow flex items-start border border-gray-100 hover:border-blue-200">
                <div class="bg-red-100 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-1">Pengaduan</h4>
                    <p class="text-gray-600 text-sm">Kirim pengaduan atau keluhan Anda</p>
                </div>
            </a>

            <!-- Aspirasi -->
            <a href="{{ route('rumah-aspirasi.create') }}" class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition-shadow flex items-start border border-gray-100 hover:border-blue-200">
                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-1">Aspirasi</h4>
                    <p class="text-gray-600 text-sm">Sampaikan ide atau saran Anda</p>
                </div>
            </a>

            <!-- Domisili -->
            <a href="{{ route('domisili.index') }}" class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition-shadow flex items-start border border-gray-100 hover:border-blue-200">
                <div class="bg-green-100 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-1">Domisili</h4>
                    <p class="text-gray-600 text-sm">Kelola data domisili rumah</p>
                </div>
            </a>

            <!-- SKTM -->
            <a href="{{ route('sktm.create') }}" class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition-shadow flex items-start border border-gray-100 hover:border-blue-200">
                <div class="bg-purple-100 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-1">SKTM</h4>
                    <p class="text-gray-600 text-sm">Surat Keterangan Tidak Mampu</p>
                </div>
            </a>

            <!-- Organisasi -->
            <a href="{{ route('user-organisasi.create', ['user_id' => Auth::user()->id]) }}" class="bg-white rounded-lg shadow-sm p-5 hover:shadow-md transition-shadow flex items-start border border-gray-100 hover:border-blue-200">
                <div class="bg-yellow-100 p-2 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-800 mb-1">Keaktifan Organisasi</h4>
                    <p class="text-gray-600 text-sm">Lapor keaktifan organisasi Anda</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Kontak Penting</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Fakultas -->
            <div class="border border-gray-100 rounded-lg p-4 hover:border-blue-200 transition-colors">
                <div class="flex items-center mb-3">
                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h4 class="font-medium text-gray-800">Fakultas {{ Auth::user()->prodi->fakultas->nama_fakultas ?? 'Anda' }}</h4>
                </div>
                <ul class="space-y-2 pl-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Email: fakultas@univ.ac.id</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Telepon: (021) 12345678</span>
                    </li>
                </ul>
            </div>

            <!-- Program Studi -->
            <div class="border border-gray-100 rounded-lg p-4 hover:border-blue-200 transition-colors">
                <div class="flex items-center mb-3">
                    <div class="bg-green-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="font-medium text-gray-800">Program Studi {{ Auth::user()->prodi->nama_prodi ?? 'Anda' }}</h4>
                </div>
                <ul class="space-y-2 pl-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Email: prodi@univ.ac.id</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Telepon: (021) 87654321</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Lokasi: Gedung A Lantai 2</span>
                    </li>
                </ul>
            </div>

            <!-- BAAK -->
            <div class="border border-gray-100 rounded-lg p-4 hover:border-blue-200 transition-colors">
                <div class="flex items-center mb-3">
                    <div class="bg-purple-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h4 class="font-medium text-gray-800">Biro Administrasi Akademik</h4>
                </div>
                <ul class="space-y-2 pl-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Email: baak@univ.ac.id</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Telepon: (021) 11223344</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Lokasi: Gedung Rektorat Lantai 1</span>
                    </li>
                </ul>
            </div>

            <!-- KOMINFO -->
            <div class="border border-gray-100 rounded-lg p-4 hover:border-blue-200 transition-colors">
                <div class="flex items-center mb-3">
                    <div class="bg-yellow-100 p-2 rounded-full mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h4 class="font-medium text-gray-800">KOMINFO Formadiksi</h4>
                </div>
                <ul class="space-y-2 pl-4">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Email: komformadiksi@univ.ac.id</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Telepon: (021) 55667788</span>
                                        </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mt-1 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-600 text-sm">Lokasi: Gedung B Lantai 3</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Recent Announcements -->
    {{-- <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-800">Pengumuman Terbaru</h3>
            <a href="{{ route('pengumuman') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">Lihat Semua</a>
        </div>
        
        <div class="space-y-4">
            @forelse($pengumumans as $pengumuman)
            <div class="border border-gray-100 rounded-lg p-4 hover:bg-gray-50 transition-colors">
                <div class="flex items-start">
                    <div class="bg-{{ $pengumuman->kategori_color }}-100 p-2 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $pengumuman->kategori_color }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium text-gray-800">{{ $pengumuman->judul }}</h4>
                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $pengumuman->kategori }}</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($pengumuman->isi, 120) }}</p>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-xs text-gray-500">{{ $pengumuman->created_at->diffForHumans() }}</span>
                            <a href="{{ route('pengumuman.show', $pengumuman->id) }}" class="text-xs text-blue-600 hover:text-blue-800 font-medium">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="mt-3 text-gray-600">Tidak ada pengumuman terbaru</p>
            </div>
            @endforelse
        </div>
    </div> --}}
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // IPK Chart
        const ctx = document.getElementById('ipkChart').getContext('2d');
        const ipkChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
                datasets: [{
                    label: 'IPK per Semester',
                    data: {!! json_encode($ipkArray) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.05)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 0,
                        max: 4,
                        ticks: {
                            stepSize: 0.5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'IPK: ' + context.parsed.y.toFixed(2);
                            }
                        }
                    }
                }
            }
        });

        // Initialize tooltips
        tippy('[data-tippy-content]', {
            placement: 'top',
            animation: 'shift-away',
            arrow: true
        });
    });
</script>
@endsection
