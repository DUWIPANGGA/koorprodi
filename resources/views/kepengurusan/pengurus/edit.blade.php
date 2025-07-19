@extends('layouts.dashboard')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom">
            <h4 class="mb-0">{{ isset($penguru) ? 'Edit' : 'Tambah' }} Anggota Kepengurusan</h4>
        </div>
        <div class="card-body">
            <!-- Display general errors -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Terjadi kesalahan!</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Display specific error messages from controller -->
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ isset($penguru) ? route('pengurus.update', $penguru->id) : route('pengurus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    @method('PUT')
                
                <input type="hidden" name="periode_id" value="{{ $periode->id }}">
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" 
                                   value="{{ old('nama', $penguru->nama ?? '') }}"
                                   placeholder="Masukkan nama lengkap" required>
                            @error('nama')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                                   id="jabatan" name="jabatan" 
                                   value="{{ old('jabatan', $penguru->jabatan ?? '') }}"
                                   placeholder="Masukkan jabatan" required>
                            @error('jabatan')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="divisi" class="form-label">Divisi <span class="text-danger">*</span></label>
                            <select class="form-select @error('divisi') is-invalid @enderror" 
                                    id="divisi" name="divisi" required>
                                <option value="">Pilih Divisi</option>
                                @foreach($divisiList as $key => $value)
                                    <option value="{{ $key }}" 
                                        {{ (old('divisi', $penguru->divisi ?? '') == $key) ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('divisi')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="urutan" class="form-label">Urutan Tampil</label>
                            <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                                   id="urutan" name="urutan" 
                                   value="{{ old('urutan', $penguru->urutan ?? 0) }}"
                                   placeholder="Masukkan urutan tampil">
                            <small class="text-muted">Angka kecil akan ditampilkan lebih dulu</small>
                            @error('urutan')
                                <div class="invalid-feedback d-block">
                                    <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                           id="foto" name="foto" accept="image/jpeg,image/png">
                    <small class="text-muted">Format: JPEG/PNG (Maks. 2MB)</small>
                    @error('foto')
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                    
                    @if(isset($penguru) && $penguru->foto)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$penguru->foto) }}" 
                                 class="img-thumbnail" 
                                 alt="Foto saat ini" 
                                 style="max-height: 150px;">
                            <p class="text-muted mt-2">Foto saat ini</p>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" id="hapus_foto" name="hapus_foto">
                                <label class="form-check-label text-danger" for="hapus_foto">
                                    Hapus foto ini
                                </label>
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('pengurus.index', ['periode' => $periode->id]) }}" 
                       class="btn btn-outline-secondary">
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

<style>
    .card {
        border-radius: 0.75rem;
    }
    .form-control, .form-select {
        border-radius: 0.5rem;
    }
    .img-thumbnail {
        border-radius: 0.5rem;
        border: 1px solid #dee2e6;
    }
    .alert {
        border-radius: 0.5rem;
    }
    .invalid-feedback {
        font-size: 0.85rem;
    }
    .invalid-feedback.d-block {
        display: block !important;
        margin-top: 0.25rem;
    }
    .text-danger {
        color: #dc3545;
    }
</style>

<script>
    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    });
</script>
@endsection