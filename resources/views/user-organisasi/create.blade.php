<!-- resources/views/user-organisasi/create.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 border border-gray-300">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Rekap Keaktifan Organisasi</h1>
            <p class="text-base text-gray-600">Pilih organisasi untuk <span class="font-semibold text-gray-900">{{ $user->name }}</span> pada Semester {{ $currentSemester }}</p>
            <div class="mt-4 flex justify-center">
                <div class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full shadow-sm">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-sm text-gray-700">Pilih organisasi yang anda ikuti dengan sebenar benarnya</span>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('user-organisasi.store', $user->id) }}" method="POST" class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
        @csrf
        <input type="hidden" name="semester" value="{{ $currentSemester }}">

        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Organisasi</h3>
            <p class="text-gray-600 mb-6">Pilih satu atau lebih organisasi yang anda ikuti pada semester ini.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($organisasis as $organisasi)
                <div class="relative">
                    <input class="hidden peer"
                           type="checkbox"
                           name="organisasi_ids[]"
                           value="{{ $organisasi->id }}"
                           id="org_{{ $organisasi->id }}">
                    <label for="org_{{ $organisasi->id }}"
                           class="block p-4 border border-gray-300 rounded-xl bg-gray-50 cursor-pointer transition-all duration-200 
                                  hover:border-gray-500 hover:bg-white peer-checked:border-gray-700 peer-checked:bg-white peer-checked:ring-2 peer-checked:ring-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center mr-3">
                                <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">{{ $organisasi->nama_organisasi }}</h4>
                                <p class="text-sm text-gray-500">Klik untuk memilih</p>
                            </div>
                        </div>
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('users.show', $user->id) }}" class="px-6 py-2 border border-gray-400 rounded-lg text-gray-700 font-medium text-center hover:bg-gray-100 transition-colors shadow-sm">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batalkan
                </span>
            </a>
            <button type="submit" class="px-6 py-2 bg-gray-700 hover:bg-gray-800 rounded-lg text-white font-medium shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-1">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Pilihan
                </span>
            </button>
        </div>
    </form>
</div>
@endsection
