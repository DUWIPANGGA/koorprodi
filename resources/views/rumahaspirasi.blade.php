@extends('layouts.layout')

@section('title', 'Rumah Aspirasi')

@section('content')
<div class="flex py-16" name="div kosong">
            
</div>
<div class="flex-wrap relative font-poppins px-24 py-4">
    <h1 class="flex text-3xl font-semibold py-4">
        Rumah Aspirasi
    </h1>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <p class="flex text-justify pb-4">
        Punya pendapat atau saran? sampaikan saja lewat form dibawah ini!
    </p>

    <div class="flex row-3 shadow-md rounded-md p-4 bg-white" data-aos="fade-up" data-aos-duration="1100">
        <form method="POST" action="{{ route('rumahaspirasi.kirim') }}" class="w-full">
            @csrf
            <div class="mb-4">
                <p class="flex text-xl font-semibold py-2">Nama</p>
                <input type="text" name="nama" id="nama" placeholder="Nama kamu" 
                    class="w-full p-2 border rounded-md @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <p class="flex text-xl font-semibold py-2">Aspirasi</p>
                <textarea name="isi" id="isi" placeholder="Masukan aspirasi kamu" rows="4"
                    class="w-full p-2 border rounded-md @error('isi') border-red-500 @enderror"></textarea>
                @error('isi')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex py-4">
                <button type="submit" class="rounded-full px-6 py-2 font-semibold bg-yellow-400 text-white hover:bg-yellow-500">
                    Kirim!
                </button>
            </div>
        </form>
    </div>
</div>
<div class="flex py-16" name="div kosong">
            
</div>
@endsection