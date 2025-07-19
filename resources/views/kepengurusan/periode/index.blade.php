@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>Daftar Periode Kepengurusan</h1>
    
    <a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Periode
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nama Periode</th>
                        <th>Tahun</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodes as $periode)
                    <tr>
                        <td>{{ $periode->nama }}</td>
                        <td>{{ $periode->tahun }}</td>
                        <td>
                            @if($periode->aktif)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <form action="{{ route('periode.set-aktif', $periode->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                        Set Aktif
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pengurus.index', ['periode' => $periode->id]) }}" 
                               class="btn btn-sm btn-info">
                                <i class="fas fa-users"></i> Kelola Anggota
                            </a>
                            <form action="{{ route('periode.destroy', $periode->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Hapus periode ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection