@extends('layouts.dashboard')

@section('title', 'Buat Pengaduan')

@section('content')
<div class="container">
    <h1>Buat Pengaduan</h1>

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="cerita">Cerita</label>
            <textarea name="cerita" class="form-control" required>{{ old('cerita') }}</textarea>
        </div>

        <div class="form-group">
            <label for="validasi">Validasi</label>
            <select name="validasi" class="form-control" required>
                <option value="1">Validasi</option>
                <option value="0" selected>Belum Validasi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
