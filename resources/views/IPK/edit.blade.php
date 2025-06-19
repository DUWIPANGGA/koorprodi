@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Document Viewer -->
            <div class="w-full lg:w-1/2">
                <div class="bg-white rounded-xl shadow-md overflow-hidden h-full">
                    <div class="p-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="text-lg font-medium text-gray-900">Dokumen IPK Mahasiswa</h3>
                    </div>
                    <div class="p-4 h-[calc(100%-56px)]">
                        @if($rekap->dokumen)
                            <iframe src="{{ asset($rekap->dokumen) }}" class="w-full h-full min-h-[500px] border rounded-lg"></iframe>
                        @else
                            <div class="flex items-center justify-center h-full bg-gray-100 rounded-lg">
                                <p class="text-gray-500">Dokumen tidak tersedia</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Validation Form -->
            <div class="w-full lg:w-1/2">
                <form action="{{ route('rekap.validasi', $rekap->id) }}" method="POST" class="bg-white rounded-xl shadow-md overflow-hidden">
                    @csrf
                    @if($rekap->id)
                        @method('PUT')
                    @endif
                    
                    <div class="p-4 border-b border-gray-200 bg-gray-50">
                        <h3 class="text-lg font-medium text-gray-900">Validasi IPK</h3>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        @if($errors->any())
                            <div class="rounded-md bg-red-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan dalam pengisian</h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 gap-4">
                            <div class="border-b pb-4">
                                <h4 class="text-sm font-medium text-gray-500">Informasi Mahasiswa</h4>
                                <div class="mt-2 grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Nama</p>
                                        <p class="text-sm font-medium text-gray-900">{{ $rekap->name }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">NIM</p>
                                        <p class="text-sm font-medium text-gray-900">{{ $rekap->nim }}</p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                                <select id="semester" name="semester" required class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    @for($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}" {{ $rekap->semester == $i ? 'selected' : (old('semester') == $i ? 'selected' : '') }}>
                                            Semester {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            <div>
                                <label for="IPK" class="block text-sm font-medium text-gray-700 mb-1">IPK</label>
                                <input type="number" name="IPK" id="IPK" value="{{ old('IPK', $rekap->IPK) }}" 
                                    min="0" max="4" step="0.01" required
                                    class="mt-1 block w-full shadow-sm sm:text-sm rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">Kesulitan</p>
                                <p class="text-sm font-medium text-gray-900">{{ $rekap->kesulitan ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <p class="text-xs text-red-500">* Klik validasi untuk memverifikasi kebenaran IPK</p>
                        </div>
                    </div>

                    <div class="px-6 py-4 bg-gray-50 text-right">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            {{ $rekap->id ? 'Validasi IPK' : 'Simpan' }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection