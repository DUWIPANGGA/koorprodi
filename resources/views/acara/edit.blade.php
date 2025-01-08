@extends('layouts.dashboard')

@section('title', 'Edit Acara')

@section('content')
    <div class="container">
        <h1>Edit Acara</h1>

        <form action="{{ route('acara.update', $acara->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_acara">Nama Acara</label>
                <input type="text" name="nama_acara" class="form-control" value="{{ old('nama_acara', $acara->nama_acara) }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $acara->tanggal) }}" required>
            </div>

            <div class="form-group">
                <label for="lama_acara">Lama Acara (hari)</label>
                <input type="number" name="lama_acara" class="form-control" value="{{ old('lama_acara', $acara->lama_acara) }}" required>
            </div>

            <div class="form-group">
                <label for="start">Status</label>
                <select name="start" class="form-control" required>
                    <option value="1" {{ $acara->start ? 'selected' : '' }}>Dimulai</option>
                    <option value="0" {{ !$acara->start ? 'selected' : '' }}>Belum Dimulai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
