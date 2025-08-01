@extends('layouts.dashboard')

@section('title', 'Profil Anggota')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Profile Card -->
        <div class="w-full md:w-1/3">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="p-6 text-center">
                    <div class="flex justify-center">
                        <img src="{{ $user->foto_profil ? asset('storage/'.$user->foto_profil) : asset('LogoOrang.jpg') }}"
                             alt="Foto Profil"
                             class="w-40 h-40 rounded-full object-cover border-4 border-gray-200">
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-gray-800">{{ $user->name }}</h3>
                    <p class="text-gray-600">{{ $user->nim }}</p>
                    <p class="text-gray-700 mt-2">{{ $user->prodi }} - Semester {{ $user->semester }}</p>
                </div>
            </div>
        </div>

        <!-- Organization Information -->
        <div class="w-full md:w-2/3">
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Informasi Organisasi</h3>
                    <a href="{{ route('user-organisasi.create', $user->id) }}" 
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Pilih Organisasi
                    </a>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Organisasi & Jabatan</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($user->organisasis->groupBy('pivot.semester') as $semester => $orgs)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    Semester {{ $semester }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($orgs as $org)
                                            <div class="bg-blue-50 px-3 py-1 rounded-full text-sm text-blue-800 flex items-center">
                                                <span class="font-medium">{{ $org->nama_organisasi }}</span>
                                                <span class="mx-2">•</span>
                                                <span class="text-blue-600">{{ $org->pivot->jabatan }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('user-organisasi.edit', [$user->id, $semester]) }}" 
                                       class="inline-flex items-center px-3 py-1 border border-yellow-500 rounded-md text-yellow-700 bg-yellow-50 hover:bg-yellow-100 focus:outline-none transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Belum memilih organisasi
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection