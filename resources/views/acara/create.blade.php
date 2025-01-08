@extends('layouts.dashboard')

@section('title', 'Buat Acara')

@section('content')
    <div class="container">
        <h1>Buat Acara Baru</h1>

        <form action="{{ route('acara.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_acara">Nama Acara</label>
                <input type="text" name="nama_acara" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lama_acara">Lama Acara (hari)</label>
                <input type="number" name="lama_acara" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="start">Status</label>
                <select name="start" class="form-control" required>
                    <option value="1">Dimulai</option>
                    <option value="0">Belum Dimulai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
