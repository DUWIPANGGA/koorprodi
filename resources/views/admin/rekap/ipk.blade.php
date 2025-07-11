@extends('layouts.dashboard')

@section('title', 'Rekap IPK Mahasiswa')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Rekap IPK Mahasiswa</h4>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.export.ipk') }}" class="btn btn-success">
                            <i class="fas fa-file-export"></i> Export CSV
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Statistik -->
                    <div class="row mb-4">
                        @foreach($statistik as $stat)
                        <div class="col-md-3 mb-3">
                            <div class="card border-left-primary h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $stat->prodi }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <span>Total: {{ $stat->total }}</span>
                                        <span>Rata IPK: {{ number_format($stat->rata_rata, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Form Update Semester Massal -->
                    

                    <!-- Tabel Data -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Semester</th>
                                    <th>IPK</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->nim }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->prodi }}</td>
                                    <td class="text-center">{{ $user->semester }}</td>
                                    <td class="text-center font-weight-bold {{ $user->pelaporan_ipk >= 3.5 ? 'text-success' : ($user->pelaporan_ipk < 2.0 ? 'text-danger' : 'text-primary') }}">
                                        {{ number_format($user->pelaporan_ipk, 2) }}
                                    </td>
                                    <td>{{ $user->kelas }}</td>
                                    <td>{{ $user->angkatan }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" 
                                           class="btn btn-sm btn-info" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection