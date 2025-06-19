@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Domisili</h6>
            <a href="{{ route('domisili.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajukan Domisili Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domisili as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>{{ $item->alamat_lengkap }}</td>
                            <td>
                                <span class="badge 
                                    @if($item->status == 'approved') bg-success 
                                    @elseif($item->status == 'rejected') bg-danger 
                                    @else bg-warning text-dark @endif">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('domisili.show', $item->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection