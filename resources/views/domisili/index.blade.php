@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Domisili Saya</h6>
            <a href="{{ route('domisili.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Ajukan Baru
            </a>
        </div>
        <div class="card-body">
            @if($domisili->isEmpty())
                <div class="text-center py-4">
                    <img src="{{ asset('img/empty.svg') }}" alt="Empty" style="height: 150px;" class="mb-3">
                    <h5 class="text-muted">Belum ada pengajuan domisili</h5>
                    <p class="text-muted">Ajukan domisili baru untuk memulai</p>
                    <a href="{{ route('domisili.create') }}" class="btn btn-primary mt-2">
                        <i class="fas fa-plus"></i> Ajukan Domisili
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Tanggal</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domisili as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                <td>{{ Str::limit($item->alamat_lengkap, 40) }}</td>
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'approved') bg-success 
                                        @elseif($item->status == 'rejected') bg-danger 
                                        @else bg-warning text-dark @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('domisili.show', $item->id) }}" 
                                       class="btn btn-sm btn-outline-primary"
                                       title="Lihat detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @if($item->status == 'rejected')
                                    <a href="{{ route('domisili.edit', $item->id) }}" 
                                       class="btn btn-sm btn-outline-warning"
                                       title="Ajukan ulang">
                                        <i class="fas fa-redo"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection