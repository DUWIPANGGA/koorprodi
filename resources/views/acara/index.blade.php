@extends('layouts.dashboard')

@section('title', 'List Acara')

@section('content')
    <div class="container">
        <h1>List Acara</h1>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('acara.create') }}" class="btn btn-primary mb-3">Buat Acara Baru</a>

        <table class="table table-striped">
            <thead>
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
                        <td>{{ $item->start ? 'Dimulai' : 'Belum Dimulai' }}</td>
                        <td>
                            <a href="{{ route('acara.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('acara.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus acara ini?')">Delete</button>
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
@endsection
