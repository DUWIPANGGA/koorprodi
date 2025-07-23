
<!-- resources/views/users/show.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Profil Anggota')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ $user->foto_profil ? asset('storage/'.$user->foto_profil) : asset('img/default-profile.png') }}" 
                     class="rounded-circle mb-3" width="150" height="150">
                <h4>{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->nim }}</p>
                <p>{{ $user->prodi }} - Semester {{ $user->semester }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Informasi Organisasi</h5>
                <a href="{{ route('user-organisasi.create', $user->id) }}" class="btn btn-sm btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Pilih Organisasi
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Semester</th>
                                <th>Organisasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user->organisasis->groupBy('pivot.semester') as $semester => $orgs)
                            <tr>
                                <td>{{ $semester }}</td>
                                <td>
                                    @foreach($orgs as $org)
                                        <span class="badge bg-primary me-1">{{ $org->nama_organisasi }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('user-organisasi.edit', [$user->id, $semester]) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Belum memilih organisasi</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection