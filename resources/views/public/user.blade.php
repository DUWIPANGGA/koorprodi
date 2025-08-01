@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen bg-gray-50 flex">
    <!-- Konten Utama -->
    <div class="flex-1 p-8">
        <!-- Top Bar -->
        <div class="flex justify-between items-center mb-8">
            <!-- Search Component -->
            <div class="relative w-64" x-data="{ 
    searchQuery: '', 
    searchResults: [], 
    isOpen: false,
    isLoading: false,
    error: null
}" x-on:click.away="isOpen = false">
    <!-- Search Input -->
    <input 
        type="text" 
        x-model="searchQuery" 
        x-on:input.debounce.300ms="
            error = null;
            if(searchQuery.length > 0) {
                isLoading = true;
                fetch(`/api/search-menu?query=${searchQuery}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'include'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    searchResults = data;
                    isOpen = data.length > 0;
                })
                .catch(err => {
                    console.error('Search error:', err);
                    error = 'Failed to load search results';
                    searchResults = [];
                    isOpen = false;
                })
                .finally(() => isLoading = false);
            } else {
                searchResults = [];
                isOpen = false;
            }
        " 
        x-on:focus="if(searchResults.length > 0) isOpen = true" 
        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
        placeholder="Cari menu informasi..."
    >

    <!-- Search Icon -->
    <div class="absolute left-3 top-2.5">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>

    <!-- Loading Indicator -->
    <div x-show="isLoading" class="absolute right-3 top-2.5">
        <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <!-- Search Results Dropdown -->
    <div 
        x-show="isOpen && (searchResults.length > 0 || error)" 
        x-transition:enter="transition ease-out duration-200" 
        x-transition:enter-start="opacity-0 translate-y-1" 
        x-transition:enter-end="opacity-100 translate-y-0" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 translate-y-0" 
        x-transition:leave-end="opacity-0 translate-y-1" 
        class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 max-h-96 overflow-y-auto"
    >
        <!-- Error Message -->
        <div x-show="error" class="px-4 py-2 text-sm text-red-500" x-text="error"></div>

        <!-- Results -->
        <template x-for="result in searchResults" :key="result.id">
            <a 
                :href="result.route" 
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" 
                x-on:click="isOpen = false"
            >
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-2" :class="{
                        'text-blue-500': result.type === 'menu',
                        'text-green-500': result.type === 'page',
                        'text-purple-500': result.type === 'admin',
                        'text-red-500': result.type === 'super_admin',
                        'text-amber-500': result.type === 'kominfo',
                        'text-gray-500': result.type === 'settings'
                    }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="result.icon"></path>
                    </svg>
                    <span x-text="result.name"></span>
                </div>
            </a>
        </template>
        
        <!-- No results message -->
        <div 
            x-show="searchResults.length === 0 && searchQuery.length > 0 && !error" 
            class="px-4 py-2 text-sm text-gray-500"
        >
            Tidak ditemukan hasil untuk "<span x-text="searchQuery"></span>"
        </div>
    </div>
</div>

            <!-- User Profile -->
            <div class="flex items-center">
                <span class="mr-4 font-medium">{{ $user->name }}</span>
                <img class="w-10 h-10 rounded-full object-cover" src="{{ $user->foto_profil ?? asset('LogoOrang.jpg') }}" alt="Foto profil">
            </div>
        </div>

        <!-- Kartu Sambutan -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-8 rounded-xl mb-8 relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white bg-opacity-10 rounded-full"></div>
            <div class="absolute -bottom-16 right-8 w-32 h-32 bg-white bg-opacity-10 rounded-full"></div>
            <h1 class="text-2xl font-bold mb-2">Halo, {{ $user->name }}</h1>
            <p class="opacity-90">Setiap ahli awalnya adalah seorang pemula!</p>
        </div>

        <!-- Grid Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Kartu IPK -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold text-blue-800 mb-4">Perkembangan IPK</h2>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-3xl font-bold">{{ $ipkNew ? number_format($ipkNew->IPK, 2) : '0.00' }}</span>
                        <span class="text-gray-500 ml-1">IPK Saat Ini</span>
                    </div>
                    <div class="text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full">
                        Semester {{ $semester }}
                    </div>
                </div>
                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-blue-600 rounded-full" style="width: {{ $ipkNew ? ($ipkNew->IPK/4)*100 : 0 }}%"></div>
                </div>
                <div class="mt-2 text-sm text-gray-500">
                    Target: {{ $user->pelaporan_ipk ?? '3.50' }}
                </div>
            </div>

            <!-- Progress Semester -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold text-blue-800 mb-4">Progress Semester</h2>
                <div class="grid grid-cols-4 gap-2 mb-4">
                    @for($i = 0; $i < 8; $i++) <div class="flex flex-col items-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center 
                                @if($i < $semester-1) bg-green-500 text-white
                                @elseif($i == $semester-1) bg-blue-500 text-white
                                @else bg-gray-200 text-gray-600 @endif">
                            {{ $i+1 }}
                        </div>
                        <div class="text-xs mt-1 text-center">
                            @if($i < $semester) {{ $ipkArray[$i] ?? '0.00' }} @else Akan Datang @endif </div>
                        </div>
                        @endfor
                </div>
                <div class="text-sm text-gray-500">
                    Telah menyelesaikan {{ $semester-1 }} dari 8 semester
                </div>
            </div>

            <!-- Kartu Status Laporan IPK -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <!-- Bagian Atas - Ikon -->
                <div class="{{ $user->pelaporan_ipk == 1 ? 'bg-teal-50' : 'bg-amber-50' }} p-4 flex justify-center">
                    <div class="{{ $user->pelaporan_ipk == 1 ? 'bg-teal-100' : 'bg-amber-100' }} p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 {{ $user->pelaporan_ipk == 1 ? 'text-teal-600' : 'text-amber-600' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

                <!-- Bagian Bawah - Konten -->
                <div class="p-4">
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Laporan IPK</h3>
                    @if ($user->pelaporan_ipk == 1)
                    <p class="mt-1 text-xl font-bold text-gray-900">Terkirim</p>
                    <p class="mt-1 text-xs text-gray-500">Terima kasih telah memperbarui</p>
                    @else
                    <p class="mt-1 text-xl font-bold text-gray-900">Menunggu</p>
                    <p class="mt-1 text-xs text-gray-500">Silakan kirim laporan IPK Anda</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Detail Mahasiswa dan Artikel -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detail Mahasiswa -->
            <div class="space-y-6">
                <!-- Informasi Pribadi -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Informasi Pribadi</h2>
                    <div class="flex flex-col items-center mb-4">
                        <img class="w-20 h-20 rounded-full mb-4 border-4 border-blue-100 object-cover" src="{{ $user->foto_profil ?? asset('LogoOrang.jpg') }}" alt="Foto mahasiswa">
                        <h3 class="font-bold text-lg">{{ $user->name }}</h3>
                        <div class="text-gray-500 text-sm">{{ $user->nim }}</div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Jenis Kelamin</span>
                            <span class="font-medium">{{ $user->gender ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Email</span>
                            <span class="font-medium">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Telepon</span>
                            <span class="font-medium">{{ $user->phone ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Telepon Wali</span>
                            <span class="font-medium">{{ $user->phone_wali ?? '-' }}</span>
                        </div>
                    </div>
                </div>


                <!-- Informasi Akademik -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Informasi Akademik</h2>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full text-center">
                            Angkatan {{ $user->angkatan }}
                        </div>
                        <div class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full text-center">
                            Semester {{ $semester }}
                        </div>
                        <div class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full text-center">
                            {{ $user->prodi ?? 'Prodi' }}
                        </div>
                        <div class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full text-center">
                            Kelas {{ $user->kelas ?? '-' }}
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between border-b pb-2">
                            <span class="text-gray-600">Asal Sekolah</span>
                            <span class="font-medium text-right">{{ $user->asal_sekolah ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan dan Artikel -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Informasi Organisasi -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Organisasi</h2>

                    @if($user->organisasis->count() > 0)
                    <div class="space-y-4">
                        @foreach($user->organisasis as $organisasi)
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-800">{{ $organisasi->nama_organisasi }}</h3>
                                    <p class="text-sm text-gray-600">{{ $organisasi->pivot->jabatan ?? '-' }}</p>
                                </div>
                                <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                    Semester {{ $organisasi->pivot->semester }}
                                </span>
                            </div>
                            @if($organisasi->deskripsi)
                            <p class="text-sm text-gray-500 mt-1">{{ $organisasi->deskripsi }}</p>
                            @endif
                            @if($organisasi->pembina)
                            <p class="text-xs text-gray-400 mt-1">Pembina: {{ $organisasi->pembina }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <p class="text-gray-500">Belum terdaftar di organisasi</p>
                        <a href="{{ route('user-organisasi.create', ['user_id' => $user->id]) }}" class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            Daftar Organisasi
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Riwayat IPK -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Riwayat IPK</h2>
                    @if($rekaps->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IPK</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($rekaps as $rekap)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Semester {{ $rekap->semester }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ number_format($rekap->IPK, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                @if($rekap->IPK >= 3.5) bg-green-100 text-green-800
                                                @elseif($rekap->IPK >= 3.0) bg-blue-100 text-blue-800
                                                @elseif($rekap->IPK >= 2.0) bg-yellow-100 text-yellow-800
                                                @else bg-red-100 text-red-800 @endif">
                                            @if($rekap->IPK >= 3.5) Sangat Baik
                                            @elseif($rekap->IPK >= 3.0) Baik
                                            @elseif($rekap->IPK >= 2.0) Cukup
                                            @else Perlu Perbaikan @endif
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-gray-500">Belum ada data IPK</p>
                    @endif
                </div>

                <!-- Artikel Rekomendasi -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-lg font-semibold text-blue-800 mb-4">Artikel Rekomendasi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($recommendedArticles as $article)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                            <h3 class="font-medium text-blue-700 mb-2">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $article->excerpt }}</p>
                            <div class="flex justify-between items-center text-xs text-gray-500">
                                <span>{{ $article->created_at->format('d M Y') }}</span>
                                <a href="#" class="text-blue-600 hover:underline">Baca selengkapnya</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-8 py-3">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 px-4">Layanan Mahasiswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                <!-- Pengaduan -->
                <a href="{{ route('pengaduan') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="bg-red-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Pengaduan</h4>
                            <p class="text-gray-500 text-xs">Kirim pengaduan atau keluhan</p>
                        </div>
                    </div>
                </a>

                <!-- Aspirasi -->
                <a href="{{ route('rumah-aspirasi.create') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Aspirasi</h4>
                            <p class="text-gray-500 text-xs">Sampaikan ide atau saran</p>
                        </div>
                    </div>
                </a>

                <!-- Domisili -->
                <a href="{{ route('domisili.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Domisili</h4>
                            <p class="text-gray-500 text-xs">Konfigurasi domisili rumah</p>
                        </div>
                    </div>
                </a>

                <!-- SKTM -->
                <a href="{{ route('sktm.create') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="bg-purple-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">SKTM</h4>
                            <p class="text-gray-500 text-xs">Surat Keterangan Tidak Mampu</p>
                        </div>
                    </div>
                </a>

                <!-- Organisasi -->
                <a href="{{ route('user-organisasi.create', ['user_id' => Auth::user()->id]) }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Organisasi</h4>
                            <p class="text-gray-500 text-xs">Perekapan keaktifan organisasi</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
