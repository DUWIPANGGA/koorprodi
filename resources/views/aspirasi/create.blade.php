@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Aspirasi Baru</h1>
        <a href="{{ route('rumahaspirasi.index') }}" class="btn-secondary px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition duration-300 flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div> --}}

    <div class="bg-white p-8 rounded-lg shadow-md">
        @if (session('status')) 
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('status') }}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 1.697 1.697l-3.746 2.651 3.746 2.651a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                {{ session('error') }}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="this.parentElement.style.display='none';">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 3.746a1.2 1.2 0 0 1-1.697-1.697l3.746-2.651-3.746-2.651a1.2 1.2 0 0 1 1.697-1.697l2.651 3.746 2.651-3.746a1.2 1.2 0 0 1 1.697 1.697l-3.746 2.651 3.746 2.651a1.2 1.2 0 0 1 0 1.697z"/></svg>
                </span>
            </div>
        @endif

        <form method="POST" action="{{ route('rumahaspirasi.store') }}">
            @csrf
            <div class="mb-6">
                <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary-500 @error('nama') border-red-500 @enderror"
                    id="nama" name="nama" placeholder="Nama pengirim" maxlength="100"
                    onkeyup="document.getElementById('charCount1').innerHTML = this.value.length + '/100'"
                    value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
                <div class="text-right text-xs text-gray-500 mt-1"><span id="charCount1">{{ old('nama') ? strlen(old('nama')) : '0' }}/100</span> karakter</div>
            </div>

            <div class="mb-6">
                <label for="isi" class="block text-gray-700 text-sm font-bold mb-2">Isi Aspirasi</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary-500 @error('isi') border-red-500 @enderror" id="isi"
                            name="isi" rows="6" placeholder="Masukan isi aspirasi" maxlength="1000"
                            onkeyup="document.getElementById('charCount2').innerHTML = this.value.length + '/1000'">{{ old('isi') }}</textarea>
                @error('isi')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
                <div class="text-right text-xs text-gray-500 mt-1"><span id="charCount2">{{ old('isi') ? strlen(old('isi')) : '0' }}/1000</span> karakter</div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary px-6 py-2 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition duration-300 flex items-center text-lg">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize character counters
    document.addEventListener('DOMContentLoaded', function() {
        const namaField = document.getElementById('nama');
        const isiField = document.getElementById('isi');
        
        if (namaField && document.getElementById('charCount1')) {
            document.getElementById('charCount1').innerHTML = namaField.value.length + '/100';
        }
        
        if (isiField && document.getElementById('charCount2')) {
            document.getElementById('charCount2').innerHTML = isiField.value.length + '/1000';
        }
    });
</script>
@endpush