@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tambah Rekap</h1>
            <p class="mt-2 text-sm text-gray-600">Isi formulir berikut untuk menambahkan data rekap baru</p>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <form action="{{ route('Rekap.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <!-- IPS Field -->
                    <div>
                        <label for="IPS" class="block text-sm font-medium text-gray-700 mb-1">IPS</label>
                        <input type="number" name="IPS" id="IPS" value="{{ old('IPS') }}" step="0.01" min="0" max="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan nilai IPS" required>
                    </div>

                    <!-- Semester Dropdown -->
                    <div>
                        <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
                        <select name="semester" id="semester" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">Pilih Semester</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- User ID Field -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">User ID</label>
                        <input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Masukkan User ID" required>
                    </div>

                    <!-- Document Upload -->
                    <div>
                        <label for="dokumen" class="block text-sm font-medium text-gray-700 mb-1">Dokumen Pendukung</label>
                        <div class="mt-1 flex items-center">
                            <input type="file" name="dokumen" id="dokumen"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                required>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Format: PDF, DOC, DOCX (Maks. 5MB)</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row sm:justify-between gap-4">
                    <a href="{{ route('Rekap.index') }}" 
                       class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                    <button type="submit" 
                            class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                        Simpan Rekap
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection