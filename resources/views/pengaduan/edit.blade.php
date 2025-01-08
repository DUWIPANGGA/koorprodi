@extends('layouts.dashboard')

@section('title', 'Edit Pengaduan')

@section('content')
<div class="container">
    <h1>Edit Pengaduan</h1>

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cerita">Cerita</label>
            <textarea name="cerita" class="form-control" required>{{ old('cerita', $pengaduan->cerita) }}</textarea>
        </div>

        <div class="form-group">
            <label for="validasi">Validasi</label>
            <select name="validasi" class="form-control" required>
                <option value="1" {{ $pengaduan->validasi ? 'selected' : '' }}>Validasi</option>
                <option value="0" {{ !$pengaduan->validasi ? 'selected' : '' }}>Belum Validasi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
