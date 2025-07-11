@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0">Filter Rekap</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('admin.rekap.ipk') }}" class="row g-3">
            <div class="col-md-4">
                <label for="prodi" class="form-label">Program Studi</label>
                <select class="form-select" id="prodi" name="prodi">
                    <option value="all">Semua Prodi</option>
                    @foreach($prodies as $prodi)
                        <option value="{{ $prodi }}" {{ request('prodi') == $prodi ? 'selected' : '' }}>
                            {{ $prodi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select class="form-select" id="angkatan" name="angkatan">
                    <option value="all">Semua Angkatan</option>
                    @foreach($angkatans as $angkatan)
                        <option value="{{ $angkatan }}" {{ request('angkatan') == $angkatan ? 'selected' : '' }}>
                            {{ $angkatan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="{{ route('admin.rekap.ipk') }}" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>
<div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Update Semester Massal</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update.semester') }}" method="POST" class="d-flex gap-3">
                @csrf
                <button type="submit" name="action" value="increment" class="btn btn-primary">
                    <i class="fas fa-arrow-up mr-2"></i> Naikkan Semester
                </button>
                <button type="submit" name="action" value="decrement" class="btn btn-warning">
                    <i class="fas fa-arrow-down mr-2"></i> Turunkan Semester
                </button>
            </form>
        </div>
    </div>
    <div class="container my-1" style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container my-4" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Data Mahasiswa Penerima KIPK</h2>
            <livewire:mahasiswa />
        </div>
    </div>
</div>
@endsection
