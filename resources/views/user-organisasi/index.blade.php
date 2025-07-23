<!-- resources/views/user-organisasi/index.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Manajemen Anggota Organisasi')

@section('content')
<div class="container-fluid my-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white text-black">
            <h5 class="mb-0">
                <i class="fas fa-users me-2"></i>Daftar Anggota Organisasi
            </h5>
            <div class="d-flex gap-2">
                <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
                <a href="{{ route('user-organisasi.export', request()->query()) }}" class="btn btn-success btn-sm">
                    <i class="fas fa-file-export me-1"></i> Export Excel
                </a>
                
            </div>
        </div>
        
        <div class="card-body">
            <!-- Filter Modal -->
            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterModalLabel">Filter Anggota</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('user-organisasi.index') }}" method="GET">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="organisasi" class="form-label">Organisasi</label>
                                    <select class="form-select" id="organisasi" name="organisasi">
                                        <option value="">Semua Organisasi</option>
                                        @foreach($allOrganisasis as $org)
                                        <option value="{{ $org->id }}" {{ request('organisasi') == $org->id ? 'selected' : '' }}>
                                            {{ $org->nama_organisasi }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <select class="form-select" id="semester" name="semester">
                                        <option value="">Semua Semester</option>
                                        @foreach($uniqueSemesters as $sem)
                                        <option value="{{ $sem }}" {{ request('semester') == $sem ? 'selected' : '' }}>
                                            Semester {{ $sem }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="prodi" class="form-label">Program Studi</label>
                                    <select class="form-select" id="prodi" name="prodi">
                                        <option value="">Semua Prodi</option>
                                        @foreach($uniqueProdis as $prodi)
                                        <option value="{{ $prodi }}" {{ request('prodi') == $prodi ? 'selected' : '' }}>
                                            {{ $prodi }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="belum_mengumpulkan" name="belum_mengumpulkan" 
                                           {{ request('belum_mengumpulkan') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="belum_mengumpulkan">Tampilkan yang belum mengumpulkan laporan (Semester {{ auth()->user()->semester }})</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Semester</th>
                            <th>Organisasi</th>
                            <th>Status Laporan</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $user->foto_profil ?? asset('LogoOrang.jpg') }}" 
                                         class="rounded-circle me-2" width="30" height="30">
                                    <span>{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->nim }}</td>
                            <td>{{ $user->prodi }}</td>
                            <td>{{ $user->semester }}</td>
                            <td>
                                @foreach($user->organisasis->groupBy('pivot.semester') as $semester => $orgs)
                                    <div class="mb-1">
                                        <small class="text-muted">Sem {{ $semester }}:</small>
                                        @foreach($orgs as $org)
                                            <span class="badge bg-primary me-1">{{ $org->nama_organisasi }}</span>
                                        @endforeach
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @php
                                    $currentSemester = $user->semester;
$hasReport = $user->organisasis->where('pivot.semester', $currentSemester)->count() > 0;
                                @endphp
                                <span class="badge bg-{{ $hasReport ? 'success' : 'danger' }}">
                                    {{ $hasReport ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('users.show', $user->id) }}" 
                                       class="btn btn-sm btn-info" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('user-organisasi.create', $user->id) }}" 
                                       class="btn btn-sm btn-warning" title="Edit Organisasi">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')"
                                                title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data anggota</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $users->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .badge {
        font-size: 0.8em;
        font-weight: normal;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endsection