@extends('layouts.dashboard')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="container">
    <h1>Buat Pengaduan</h1>

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cerita">Cerita</label>
            <textarea name="cerita" class="form-control" style="height: 40vh;" required>{{ old('cerita') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
