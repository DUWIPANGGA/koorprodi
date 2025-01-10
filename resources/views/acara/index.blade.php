@extends('layouts.dashboard')

@section('title', 'List Acara')

@section('content')
    <div class="container-fluid">
        <!-- Title Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List Acara</h1>
            <a href="{{ route('acara.create') }}" class="btn btn-primary btn-sm">Buat Acara Baru</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <!-- Table Section -->
        <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Acara</th>
                            <th>Tanggal</th>
                            <th>Lama Acara</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($acara as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_acara }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $item->lama_acara }} hari</td>
                                <td>
                                    <span class="{{ $item->start ? 'badge bg-success' : 'badge bg-warning' }}">
                                        {{ $item->start ? 'Dimulai' : 'Belum Dimulai' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('acara.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('acara.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus acara ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum ada acara</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
