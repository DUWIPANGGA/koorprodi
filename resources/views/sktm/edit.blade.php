@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Pengajuan SKTM</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('sktm.update', $sktm->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $mahasiswa->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $mahasiswa->nim }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan Pengajuan</label>
                    <textarea class="form-control" id="alasan" name="alasan" rows="3" required>{{ old('alasan', $sktm->alasan) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Dokumen</label>
                    
                    @foreach($sktm->dokumen as $dokumen)
                    <div class="mb-3">
                        <label class="form-label">{{ $dokumen->jenis }}</label>
                        <div class="d-flex align-items-center">
                            @if(in_array(pathinfo($dokumen->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $dokumen->path) }}" class="img-thumbnail mr-3" style="max-height: 100px;">
                            @else
                                <i class="fas fa-file-pdf fa-2x text-danger mr-3"></i>
                            @endif
                            <div>
                                <a href="{{ asset('storage/' . $dokumen->path) }}" target="_blank" class="btn btn-sm btn-primary mb-1">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <p class="small text-muted mb-0">Upload baru untuk mengganti</p>
                            </div>
                        </div>
                        <input type="file" class="form-control mt-2" 
                               name="{{ strtolower(str_replace(' ', '_', $dokumen->jenis)) }}" 
                               accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                    @endforeach
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('sktm.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection