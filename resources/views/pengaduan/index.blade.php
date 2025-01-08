@extends('layouts.dashboard')

@section('title', 'Daftar Pengaduan')

@section('content')
<div class="container">
    <h1>Daftar Pengaduan</h1>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat Pengaduan</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Cerita</th>
                <th>Validasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengaduan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->cerita }}</td>
                    <td>{{ $item->validasi ? 'Tervalidasi' : 'Belum Valid' }}</td>
                    <td>
                        <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pengaduan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
