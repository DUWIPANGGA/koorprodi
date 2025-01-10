@extends('layouts.dashboard')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
    <h4 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Formulir Pengaduan</h4>

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="cerita" style="display: block; font-weight: bold; margin-bottom: 5px;">Cerita:</label>
            <textarea name="cerita" id="cerita" class="form-control" style="width: 100%; height: 200px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;" required>{{ old('cerita') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; font-weight: bold; border-radius: 5px;">Simpan Pengaduan</button>
    </form>
</div>
@endsection
