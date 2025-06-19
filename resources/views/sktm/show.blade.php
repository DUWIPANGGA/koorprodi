@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail SKTM</h6>
            <span class="badge bg-{{ $sktm->status_color }}">
                {{ ucfirst($sktm->status) }}
            </span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Data Mahasiswa</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $sktm->mahasiswa->name }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>{{ $sktm->mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $sktm->mahasiswa->prodi }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Data SKTM</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">No Surat</th>
                            <td>{{ $sktm->no_surat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>{{ $sktm->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Alasan</th>
                            <td>{{ $sktm->alasan }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5 class="mb-3">Dokumen Pendukung</h5>
            <div class="row">
                @foreach($sktm->dokumen as $dokumen)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header">
                            {{ $dokumen->jenis }}
                        </div>
                        <div class="card-body text-center">
                            @if(in_array(pathinfo($dokumen->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ asset('storage/' . $dokumen->path) }}" class="img-fluid" alt="{{ $dokumen->jenis }}">
                            @else
                                <i class="fas fa-file-pdf fa-4x text-danger mb-3"></i>
                                <p>Dokumen PDF</p>
                            @endif
                            <a href="{{ asset('storage/' . $dokumen->path) }}" target="_blank" class="btn btn-sm btn-primary mt-2">
                                <i class="fas fa-download"></i> Unduh
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
            <div class="mt-4 border-top pt-4">
                <h5>Validasi SKTM</h5>
                
                <form action="{{ route('admin.sktm.approve', $sktm->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success" 
                        {{ $sktm->status == 'approved' ? 'disabled' : '' }}>
                        <i class="fas fa-check"></i> Setujui
                    </button>
                </form>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal"
                    {{ $sktm->status == 'rejected' ? 'disabled' : '' }}>
                    <i class="fas fa-times"></i> Tolak
                </button>

                <!-- Reject Modal -->
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel">Alasan Penolakan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.sktm.reject', $sktm->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                                        <small class="text-muted">Berikan alasan penolakan pengajuan SKTM</small>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger">Konfirmasi Penolakan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($sktm->keterangan)
            <div class="mt-4">
                <h5>Keterangan</h5>
                <div class="alert alert-{{ $sktm->status_color }}">
                    {{ $sktm->keterangan }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection