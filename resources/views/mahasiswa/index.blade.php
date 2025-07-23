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
