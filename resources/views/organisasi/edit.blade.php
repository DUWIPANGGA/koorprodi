<!-- resources/views/organisasi/edit.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Edit Data Organisasi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Data Organisasi
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('organisasi.update', $organisasi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_organisasi" class="form-label">Nama Organisasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror" 
                                   id="nama_organisasi" name="nama_organisasi" 
                                   value="{{ old('nama_organisasi', $organisasi->nama_organisasi) }}" required>
                            @error('nama_organisasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $organisasi->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pembina" class="form-label">Pembina</label>
                                <input type="text" class="form-control @error('pembina') is-invalid @enderror" 
                                       id="pembina" name="pembina" 
                                       value="{{ old('pembina', $organisasi->pembina) }}">
                                @error('pembina')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('organisasi.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning text-white">
                                <i class="fas fa-save me-1"></i> Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0"><i class="fas fa-info-circle me-1"></i> Informasi Organisasi</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="text-muted">Dibuat Pada:</h6>
                        <p>{{ $organisasi->created_at->format('d F Y H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">Terakhir Diupdate:</h6>
                        <p>{{ $organisasi->updated_at->format('d F Y H:i') }}</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted">Jumlah Anggota:</h6>
                        <p>{{ $organisasi->users()->count() }} anggota</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection