@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen p-4 md:p-8">
        <!-- Bagian Sambutan -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-6 flex flex-col md:flex-row items-center gap-6">
            <div class="relative">
                <img src="{{ Auth::user()->foto_profil ?? asset('LogoOrang.jpg') }}" alt="Foto profil"
                    class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-white shadow-lg">
                <div class="absolute -bottom-2 -right-2 bg-blue-500 rounded-full p-1.5 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <div class="flex-1">
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">Selamat datang kembali, {{ Auth::user()->name }}!
                </h1>
                <p class="text-gray-600 mt-1">Pantau perkembangan akademik Anda dan tetap terupdate</p>

                <div class="flex gap-4 mt-4">
                    <a href="{{ route('profile.edit', Auth::user()->id) }}"
                        class="text-blue-600 hover:text-blue-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </a>
                    <a href="{{ route('rekap') }}" class="text-gray-600 hover:text-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Kartu Grafik IPK -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Top Section - Icon -->
        <div class="bg-blue-50 p-4 flex justify-center">
            <div class="bg-blue-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>
        
        <!-- Bottom Section - Content -->
        <div class="p-4">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Perkembangan IPK</h3>
            <div class="h-32 mt-2">
                <canvas id="ipkChart"></canvas>
            </div>
            <p class="mt-2 text-xs text-gray-500">Semester {{ $ipkNew->semester ?? 1 }}</p>
        </div>
    </div>

    <!-- Kartu Semester -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Top Section - Icon -->
        <div class="bg-indigo-50 p-4 flex justify-center">
            <div class="bg-indigo-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        
        <!-- Bottom Section - Content -->
        <div class="p-4">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Semester Saat Ini</h3>
            <p class="mt-1 text-2xl font-bold text-gray-900">{{ Auth::user()->semester ?? 1 }}</p>
            <p class="mt-1 text-xs text-gray-500">Anda berada di semester {{ $semester }}</p>
        </div>
    </div>

    <!-- Kartu IPK -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Top Section - Icon -->
        <div class="bg-green-50 p-4 flex justify-center">
            <div class="bg-green-100 p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        
        <!-- Bottom Section - Content -->
        <div class="p-4">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">IPK Saat Ini</h3>
            <p class="mt-1 text-2xl font-bold text-gray-900">{{ $ipkNew->IPK ?? 0 }}</p>
            <p class="mt-1 text-xs text-gray-500">
                @if (($ipkNew->IPK ?? 0) >= 3.5)
                    <span class="text-green-600">Performa sangat baik</span>
                @elseif(($ipkNew->IPK ?? 0) >= 3.0)
                    <span class="text-blue-600">Performa baik</span>
                @else
                    <span class="text-yellow-600">Terus tingkatkan</span>
                @endif
            </p>
        </div>
    </div>

    <!-- Kartu Laporan IPK -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Top Section - Icon -->
        <div class="{{ Auth::user()->pelaporan_ipk == 1 ? 'bg-teal-50' : 'bg-amber-50' }} p-4 flex justify-center">
            <div class="{{ Auth::user()->pelaporan_ipk == 1 ? 'bg-teal-100' : 'bg-amber-100' }} p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 {{ Auth::user()->pelaporan_ipk == 1 ? 'text-teal-600' : 'text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
        
        <!-- Bottom Section - Content -->
        <div class="p-4">
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Laporan IPK</h3>
            @if (Auth::user()->pelaporan_ipk == 1)
                <p class="mt-1 text-xl font-bold text-gray-900">Terkirim</p>
                <p class="mt-1 text-xs text-gray-500">Terima kasih telah memperbarui</p>
            @else
                <p class="mt-1 text-xl font-bold text-gray-900">Menunggu</p>
                <p class="mt-1 text-xs text-gray-500">Silakan kirim laporan IPK Anda</p>
            @endif
        </div>
    </div>
</div>
        <!-- Fitur Layanan Mahasiswa -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Mahasiswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Pengaduan -->
                <a href="{{ route('pengaduan.index') }}"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-red-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Pengaduan</h4>
                        <p class="text-gray-600 text-sm">Kirim pengaduan atau keluhan</p>
                    </div>
                </a>

                <!-- Aspirasi -->
                <a href="{{ route('rumahaspirasi.create') }}"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Aspirasi</h4>
                        <p class="text-gray-600 text-sm">Sampaikan ide atau saran</p>
                    </div>
                </a>

                <!-- Domisili -->
                <a href="{{ route('domisili.index') }}"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Domisili</h4>
                        <p class="text-gray-600 text-sm">Konfigurasi Domisili Rumah</p>
                    </div>
                </a>

                <!-- SKTM -->
                <a href="{{ route('sktm.create') }}"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">SKTM</h4>
                        <p class="text-gray-600 text-sm">Surat Keterangan Tidak Mampu</p>
                    </div>
                </a>

                <!-- Organisasi -->
                {{-- <a href="#"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Organisasi</h4>
                        <p class="text-gray-600 text-sm">Daftar organisasi yang diikuti</p>
                    </div>
                </a> --}}

                <!-- Kalender Akademik -->
                {{-- <a href="{{ route('acara.index') }}"
                    class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                    <div class="bg-pink-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Kalender Formadiksi</h4>
                        <p class="text-gray-600 text-sm">Jadwal kegiatan formadiksi</p>
                    </div>
                </a> --}}
            </div>
        </div>
        <!-- Fitur Layanan Admin -->
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan Admin</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Manajemen Pengaduan -->
                    <a href="{{ route('pengaduan.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-orange-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Pengaduan</h4>
                            <p class="text-gray-600 text-sm">Kelola pengaduan mahasiswa</p>
                        </div>
                    </a>

                    <!-- Data IPK -->
                    <a href="{{ route('Rekap.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Data IPK</h4>
                            <p class="text-gray-600 text-sm">Rekap IPK mahasiswa</p>
                        </div>
                    </a>

                    <!-- Manajemen Mahasiswa -->
                    <a href="{{ route('mahasiswa.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-teal-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Mahasiswa</h4>
                            <p class="text-gray-600 text-sm">Data mahasiswa</p>
                        </div>
                    </a>
                    <a href="{{ route('redirect-links.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Link</h4>
                            <p class="text-gray-600 text-sm">Short URL & Redirect</p>
                        </div>
                    </a>
                    @if (Auth::user()->role == 'super_admin')
                        <!-- User Management -->
                        <a href="{{ route('users.index') }}"
                            class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                            <div class="bg-red-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">User Management</h4>
                                <p class="text-gray-600 text-sm">Kelola pengguna sistem</p>
                            </div>
                        </a>
                    @endif
                    <a href="{{ route('admin.sktm.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">SKTM</h4>
                            <p class="text-gray-600 text-sm">Manage Surat Keterangan Tidak Mampu</p>
                        </div>
                    </a>
                    <a href="{{ route('admin.domisili.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Domisili</h4>
                            <p class="text-gray-600 text-sm">Manage Domisili Rumah</p>
                        </div>
                    </a>
                </div>

            </div>
        @endif

        <!-- Fitur Layanan KOMINFO -->
        @if (Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Layanan KOMINFO</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Manajemen Aspirasi -->
                    <a href="{{ route('aspirasi.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Aspirasi</h4>
                            <p class="text-gray-600 text-sm">Kelola aspirasi mahasiswa</p>
                        </div>
                    </a>

                    <a href="{{ route('article.main') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-purple-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Artikel</h4>
                            <p class="text-gray-600 text-sm">Kelola konten artikel</p>
                        </div>
                    </a>

                    <!-- Manajemen Acara -->
                    <a href="{{ route('acara.index') }}"
                        class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow flex items-center space-x-4">
                        <div class="bg-green-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Manajemen Acara</h4>
                            <p class="text-gray-600 text-sm">Kelola agenda kegiatan</p>
                        </div>
                    </a>
                </div>
            </div>
        @endif
        <!-- Bagian Admin (Kondisional) -->
        @if (Auth::user()->role == 'super_admin')
            <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Kontrol Admin</h3>
                    <span class="text-sm text-gray-500">Kelola pelaporan IPK</span>
                </div>

                <div class="bg-blue-50 rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800">Periode Pelaporan IPK</h4>
                            <p class="text-sm text-gray-600">Buka atau tutup pelaporan IPK untuk mahasiswa</p>
                        </div>
                        <button type="button"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                            data-bs-toggle="modal" data-bs-target="#formModal">
                            Kelola Pelaporan
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Artikel Rekomendasi -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Artikel Rekomendasi</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($recommendedArticles as $recommendedArticle)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <div class="h-48 bg-cover bg-center"
                            style="background-image: url('{{ asset('storage/' . $recommendedArticle->picture_article) }}')">
                        </div>
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">{{ $recommendedArticle->title }}</h4>
                            <p class="text-gray-600 text-sm mb-4">{!! Str::limit($recommendedArticle->content, 100) !!}</p>
                            <a href="{{ route('article.show.detail', $recommendedArticle->id) }}"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium inline-flex items-center">
                                Baca selengkapnya
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal Admin -->
        @if (Auth::user()->role == 'super_admin')
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-b-0 pb-0">
                            <h5 class="modal-title text-lg font-semibold text-gray-800" id="formModalLabel">Kontrol
                                Pelaporan IPK</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <form id="statusForm" method="POST" action="{{ route('rekap.event') }}">
                                @csrf
                                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-yellow-700">
                                                Peringatan: Tindakan ini akan mempengaruhi kemampuan semua mahasiswa untuk
                                                mengirim laporan IPK.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between space-x-4">
                                    <button type="submit" name="status" value="0"
                                        class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        Buka Pelaporan
                                    </button>
                                    <button type="submit" name="status" value="1"
                                        class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                        Tutup Pelaporan
                                    </button>
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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <script>
        // Data IPK Mahasiswa
        var ipkArray = @json($ipkArray);

        const dataMahasiswa = {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8'],
            datasets: [{
                label: 'IPK',
                data: ipkArray,
                backgroundColor: 'rgba(79, 70, 229, 0.05)',
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        };

        // Konfigurasi Grafik
        const config = {
            type: 'line',
            data: dataMahasiswa,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 12
                        },
                        callbacks: {
                            label: function(context) {
                                return `IPK: ${context.parsed.y.toFixed(2)}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 4,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            stepSize: 1,
                            color: 'rgba(107, 114, 128, 0.7)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: 'rgba(107, 114, 128, 0.7)'
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.4
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        // Inisialisasi Chart
        const ctx = document.getElementById('ipkChart').getContext('2d');
        const ipkChart = new Chart(ctx, config);
    </script>
@endsection
