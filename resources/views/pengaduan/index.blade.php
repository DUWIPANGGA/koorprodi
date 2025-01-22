@extends('layouts.dashboard')

@section('title', 'Daftar Pengaduan')

@section('content')
<div class="container my-5">
    <!-- Card Wrapper with Background -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-4 text-center" style="font-size: 2rem; font-weight: 600;">Daftar Pengaduan</h1>

    <!-- Button to Create New Pengaduan -->
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat Pengaduan</a>
    </div>
    <div class="card" style="background-color: #fff; border-radius: 10px; padding: 20px;">
        
        <!-- Title Section -->

        <!-- Success or Error Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Section -->
        <table class="table table-striped">
            <thead class="thead-light">
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
                        <td>{{ Str::limit($item->cerita, 50) }}</td>
                        <td>
                            <span class="{{ $item->validasi ? 'badge bg-success' : 'badge bg-danger' }}">
                                {{ $item->validasi ? 'Tervalidasi' : 'Belum Valid' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pengaduan.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
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
</div>
@endsection
