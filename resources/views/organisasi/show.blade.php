<!-- resources/views/organisasi/show.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Detail Organisasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Detail Organisasi</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Organisasi</th>
                        <td>{{ $organisasi->nama_organisasi }}</td>
                    </tr>
                    <tr>
                        <th>Pembina</th>
                        <td>{{ $organisasi->pembina ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $organisasi->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Anggota</th>
                        <td>{{ $organisasi->users()->count() }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <h6>Daftar Anggota</h6>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Semester Bergabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($organisasi->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nim }}</td>
                            <td>{{ $user->pivot->semester }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada anggota</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('organisasi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection