<!-- resources/views/profile/show.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Kiri: Foto Profil -->
        <div class="bg-white rounded-2xl shadow p-6">
            <div class="flex flex-col items-center">
                <img src="{{ Auth::user()->foto_profil ? asset(Auth::user()->foto_profil) : asset('LogoOrang.jpg') }}"
                     alt="Foto Profil"
                     class="w-48 h-48 rounded-full object-cover border-4 border-gray-300 mb-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-gray-500">{{ Auth::user()->prodi }}</p>
                <hr class="my-4 w-full">
                <div class="text-sm text-gray-700 space-y-1">
                    <p><strong>NIM:</strong> {{ Auth::user()->nim }}</p>
                    <p><strong>Angkatan:</strong> {{ Auth::user()->angkatan }}</p>
                    <p><strong>Gender:</strong> {{ Auth::user()->gender }}</p>
                    <p><strong>Semester:</strong> {{ Auth::user()->semester }}</p>
                </div>
                <a href="{{ route('profile.edit', Auth::id()) }}"
                   class="mt-6 inline-flex items-center px-4 py-2 bg-gray-700 text-white text-sm font-medium rounded hover:bg-gray-800">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
            </div>
        </div>

        <!-- Kolom Kanan: Detail -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Informasi Kontak -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Kontak</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p class="font-medium">Email</p>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <p class="font-medium">No. HP</p>
                        <p>{{ Auth::user()->phone ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="font-medium">No. HP Wali</p>
                        <p>{{ Auth::user()->phone_wali ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="font-medium">Alamat</p>
                        <p>{{ Auth::user()->alamat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Pendidikan -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pendidikan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p class="font-medium">Asal Sekolah</p>
                        <p>{{ Auth::user()->asal_sekolah ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="font-medium">Kelas</p>
                        <p>{{ Auth::user()->kelas ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="font-medium">Hobi</p>
                        <p>{{ Auth::user()->hobi ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="font-medium">Bakat</p>
                        <p>{{ Auth::user()->bakat ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Organisasi -->
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Organisasi Semester Ini</h3>
                    <a href="{{ route('user-organisasi.create', Auth::id()) }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-700 text-white text-sm font-medium rounded hover:bg-gray-800">
                        <i class="fas fa-plus mr-2"></i>Tambah Organisasi
                    </a>
                </div>

                @php
                    $currentSemester = Auth::user()->semester;
                    $currentOrganisasis = Auth::user()->organisasis()->wherePivot('semester', $currentSemester)->get();
                @endphp

                @if($currentOrganisasis->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-700">
                            <thead class="bg-gray-100 text-gray-600">
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Nama Organisasi</th>
                                    <th class="px-4 py-2">Semester</th>
                                    <th class="px-4 py-2">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($currentOrganisasis as $index => $organisasi)
                                <tr>
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $organisasi->nama_organisasi }}</td>
                                    <td class="px-4 py-2">{{ $organisasi->pivot->semester }}</td>
                                    <td class="px-4 py-2">{{ $organisasi->deskripsi ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-sm text-gray-500">Anda belum memilih organisasi untuk semester ini.</p>
                @endif

                <!-- Riwayat Organisasi -->
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-2">Riwayat Organisasi</h4>
                    <div class="space-y-2">
                        @foreach(Auth::user()->organisasis->groupBy('pivot.semester') as $semester => $organisasis)
                            @if($semester != $currentSemester)
                            <div class="border border-gray-200 rounded-lg">
                                <button class="w-full text-left px-4 py-2 bg-gray-100 text-gray-800 font-semibold"
                                        data-collapse-toggle="collapse-{{ $semester }}">
                                    Semester {{ $semester }}
                                </button>
                                <div class="px-4 py-2" id="collapse-{{ $semester }}">
                                    <ul class="list-disc pl-5">
                                        @foreach($organisasis as $org)
                                        <li class="flex justify-between items-center">
                                            <span>{{ $org->nama_organisasi }}</span>
                                            <span class="text-xs text-gray-500">
                                                {{ $org->pivot->created_at->format('d M Y') }}
                                            </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Rekap IPK Tiap Semester -->
<div class="mt-6">
    <div class="bg-white rounded-2xl shadow p-4">
                    <h3 class="text-lg font-semibold text-gray-800">IPK</h3>
    @php
        $rekapIpk = Auth::user()->rekap->sortByDesc('semester');
    @endphp

    @if($rekapIpk->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-4 py-2">Semester</th>
                        <th class="px-4 py-2">IPK</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($rekapIpk as $rekap)
                    <tr>
                        <td class="px-4 py-2">{{ $rekap->semester }}</td>
                        <td class="px-4 py-2">{{ number_format($rekap->IPK, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-sm text-gray-500">Belum ada data rekap IPK yang tersedia.</p>
    @endif
</div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #212529;
    }
    .list-group-item {
        border-left: none;
        border-right: none;
    }
</style>
@endsection