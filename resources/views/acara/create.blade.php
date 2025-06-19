@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold mb-6">{{ isset($acara) ? 'Edit' : 'Tambah' }} Acara</h1>
        
        <form action="{{ isset($acara) ? route('acara.update', $acara->id) : route('acara.store') }}" method="POST">
            @csrf
            @if(isset($acara))
                @method('PUT')
            @endif
            
            <div class="mb-4">
                <label for="nama_acara" class="block text-gray-700 font-medium mb-2">Nama Acara</label>
                <input type="text" name="nama_acara" id="nama_acara" value="{{ old('nama_acara', $acara->nama_acara ?? '') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                @error('nama_acara')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="tanggal" class="block text-gray-700 font-medium mb-2">Tanggal</label>
                    <input type="datetime-local" name="tanggal" id="tanggal" 
                        value="{{ old('tanggal', isset($acara) ? $acara->tanggal->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('tanggal')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="lama_acara" class="block text-gray-700 font-medium mb-2">Durasi (jam)</label>
                    <input type="number" name="lama_acara" id="lama_acara" min="1" 
                        value="{{ old('lama_acara', $acara->lama_acara ?? 1) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('lama_acara')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="warna" class="block text-gray-700 font-medium mb-2">Warna Acara</label>
                    <input type="color" name="warna" id="warna" 
                        value="{{ old('warna', $acara->warna ?? '#3b82f6') }}"
                        class="w-full h-10 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('warna')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <div class="flex items-center space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="start" value="1" 
                                {{ old('start', isset($acara) ? $acara->start : true) ? 'checked' : '' }}
                                class="text-blue-500 focus:ring-blue-500">
                            <span class="ml-2">Akan Datang</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="start" value="0"
                                {{ old('start', isset($acara) && !$acara->start ? 'checked' : '' )}}
                                class="text-blue-500 focus:ring-blue-500">
                            <span class="ml-2">Selesai</span>
                        </label>
                    </div>
                    @error('start')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mb-4">
                <label for="lokasi" class="block text-gray-700 font-medium mb-2">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" 
                    value="{{ old('lokasi', $acara->lokasi ?? '') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Ruang Meeting A, Zoom, dll">
                @error('lokasi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $acara->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <a href="{{ route('acara.index') }}" class="mr-4 px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    {{ isset($acara) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection