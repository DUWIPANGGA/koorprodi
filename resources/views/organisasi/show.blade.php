@extends('layouts.dashboard')

@section('title', 'Detail Organisasi')

@section('content')
<div class="container-fluid my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-users-cog me-2"></i>Detail Organisasi
                    </h5>
                    <div>
                        <a href="{{ route('organisasi.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <div class="card border-0 shadow-none">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 text-center mb-3 mb-md-0">
                                            <div class="bg-light p-4 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                                <i class="fas fa-users fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 class="text-primary mb-3">{{ $organisasi->nama_organisasi }}</h4>
                                            <div class="d-flex flex-wrap gap-2 mb-3">
                                                <span class="badge bg-primary">
                                                    <i class="fas fa-user-tie me-1"></i> {{ $organisasi->pembina ?? 'Belum ada pembina' }}
                                                </span>
                                                <span class="badge bg-success">
                                                    <i class="fas fa-users me-1"></i> {{ $organisasi->users()->count() }} Anggota
                                                </span>
                                            </div>
                                            <p class="text-muted">
                                                {{ $organisasi->deskripsi ?? 'Belum ada deskripsi organisasi' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0">
                                <i class="fas fa-list-ul me-2"></i>Daftar Anggota
                            </h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Semester Bergabung</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($organisasi->users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $user->foto_profil ?? asset('LogoOrang.jpg') }}" 
                                                         class="rounded-circle me-2" width="32" height="32">
                                                    <span>{{ $user->name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $user->nim }}</td>
                                            <td>{{ $user->prodi ?? '-' }}</td>
                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    {{ $user->pivot->semester }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">
                                                    {{ $user->pivot->jabatan ?? 'Anggota' }}
                                                </span>
                                            </td>
                                            <td>
                                                @php
                                                    $hasReport = $user->laporanOrganisasi->where('semester', $user->semester)->count() > 0;
                                                @endphp
                                                <span class="badge bg-{{ $hasReport ? 'success' : 'warning' }}">
                                                    {{ $hasReport ? 'Aktif' : 'Tidak Aktif' }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="fas fa-users-slash fa-2x mb-2"></i>
                                                    <p class="mb-0">Belum ada anggota</p>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($organisasi->users()->count() > 5)
                        <div class="card-footer bg-white">
                            <nav aria-label="Page navigation">
                                {{ $organisasi->users()->paginate(10)->links() }}
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
    }
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }
    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
@endsection