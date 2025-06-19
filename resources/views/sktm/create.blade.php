@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan SKTM Baru</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('sktm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <textarea class="form-control" id="alasan" name="alasan" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Dokumen</label>
                    
                    <div class="mb-3">
                        <label for="ktm" class="form-label">KTM (PDF/JPG/PNG, maks 2MB)</label>
                        <input type="file" class="form-control" id="ktp" name="ktp" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="kk" class="form-label">Kartu Keluarga (PDF/JPG/PNG, maks 2MB)</label>
                        <input type="file" class="form-control" id="kk" name="kk" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="surat_rt" class="form-label">Surat Keterangan RT/RW (PDF/JPG/PNG, maks 2MB)</label>
                        <input type="file" class="form-control" id="surat_rt" name="surat_rt" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Ajukan SKTM
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection