@extends('layouts.dashboard')

@section('title', 'Tambah Periode Kepengurusan')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom">
            <h5 class="mb-0">Tambah Periode Baru</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('periode.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Periode</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama') }}" 
                                   placeholder="Contoh: Formadiksi 10" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Periode</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" 
                                   id="tahun" name="tahun" value="{{ old('tahun') }}" 
                                   placeholder="Contoh: 2023-2024" required>
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="aktif" name="aktif" 
                           {{ old('aktif') ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">Jadikan periode aktif</label>
                    <small class="d-block text-muted">* Periode aktif akan ditampilkan di halaman publik</small>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('periode.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection