@if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
<div class="mb-8 py-3">
    <h3 class="text-xl font-semibold text-gray-800 mb-6 px-4">Layanan Admin</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 px-4">
        <!-- Manajemen Pengaduan -->
        <a href="{{ route('pengaduan.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-orange-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Pengaduan</h4>
                    <p class="text-gray-500 text-xs">Kelola pengaduan mahasiswa</p>
                </div>
            </div>
        </a>

        <!-- Data IPK -->
        <a href="{{ route('Rekap.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-indigo-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Data IPK</h4>
                    <p class="text-gray-500 text-xs">Rekap IPK mahasiswa</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Mahasiswa -->
        <a href="{{ route('mahasiswa.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-teal-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Mahasiswa</h4>
                    <p class="text-gray-500 text-xs">Data mahasiswa</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Link -->
        <a href="{{ route('redirect-links.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Link</h4>
                    <p class="text-gray-500 text-xs">Short URL & Redirect</p>
                </div>
            </div>
        </a>

        @if (Auth::user()->role == 'super_admin')
        <!-- User Management -->
        <a href="{{ route('users.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">User Management</h4>
                    <p class="text-gray-500 text-xs">Kelola pengguna sistem</p>
                </div>
            </div>
        </a>
        @endif

        <!-- SKTM -->
        <a href="{{ route('admin.sktm.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">SKTM</h4>
                    <p class="text-gray-500 text-xs">Manage Surat Keterangan</p>
                </div>
            </div>
        </a>

        <!-- Domisili -->
        <a href="{{ route('admin.domisili.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Domisili</h4>
                    <p class="text-gray-500 text-xs">Manage Domisili Rumah</p>
                </div>
            </div>
        </a>

        <!-- Organisasi -->
        <a href="{{ route('organisasi.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Organisasi</h4>
                    <p class="text-gray-500 text-xs">Kelola data organisasi</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Rekap Organisasi -->
        <a href="{{ route('user-organisasi.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-gray-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Rekap Organisasi</h4>
                    <p class="text-gray-500 text-xs">Kelola data organisasi</p>
                </div>
            </div>
        </a>

        @if (Auth::user()->role == 'super_admin')
        <!-- Pelaporan IPK -->
        <a href="#" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100" data-bs-toggle="modal" data-bs-target="#formModal">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Pelaporan IPK</h4>
                    <p class="text-gray-500 text-xs">Buka/tutup pelaporan IPK</p>
                </div>
            </div>
        </a>
        @endif
    </div>
</div>
@endif

<!-- Fitur Layanan KOMINFO -->
@if (Auth::user()->role == 'KOMINFO' || Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
<div class="mb-8 py-3">
    <h3 class="text-xl font-semibold text-gray-800 mb-6 px-4">Layanan KOMINFO</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 px-4">
        <!-- Manajemen Aspirasi -->
        <a href="{{ route('aspirasi.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Aspirasi</h4>
                    <p class="text-gray-500 text-xs">Kelola aspirasi mahasiswa</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Artikel -->
        <a href="{{ route('article.main') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Artikel</h4>
                    <p class="text-gray-500 text-xs">Kelola konten artikel</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Acara -->
        <a href="{{ route('acara.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Acara</h4>
                    <p class="text-gray-500 text-xs">Kelola agenda kegiatan</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Kepengurusan -->
        <a href="{{ route('pengurus.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-yellow-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Kepengurusan</h4>
                    <p class="text-gray-500 text-xs">Kelura struktur organisasi</p>
                </div>
            </div>
        </a>

        <!-- Manajemen Periode -->
        <a href="{{ route('periode.index') }}" class="bg-white rounded-lg shadow p-4 hover:shadow-md transition-shadow border border-gray-100">
            <div class="flex items-center space-x-4">
                <div class="bg-indigo-100 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Manajemen Periode</h4>
                    <p class="text-gray-500 text-xs">Kelola periode kepengurusan</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endif