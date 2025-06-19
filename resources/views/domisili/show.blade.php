@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Detail Domisili</h6>
            <span class="badge 
                @if($domisili->status == 'approved') bg-success 
                @elseif($domisili->status == 'rejected') bg-danger 
                @else bg-warning text-dark @endif">
                {{ ucfirst($domisili->status) }}
            </span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Data Mahasiswa</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $domisili->mahasiswa->name }}</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>{{ $domisili->mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <th>Program Studi</th>
                            <td>{{ $domisili->mahasiswa->prodi }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h5>Data Domisili</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Alamat</th>
                            <td>{{ $domisili->alamat_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Koordinat</th>
                            <td>{{ $domisili->latitude }}, {{ $domisili->longitude }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <td>{{ $domisili->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5 class="mb-3">Foto Rumah</h5>
            <div class="row">
                @foreach($domisili->fotos as $foto)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $foto->path) }}" class="card-img-top" alt="Foto Domisili">
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Status Validation Section (for admin) -->
            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
            <div class="mt-4 border-top pt-4">
                <h5>Validasi Domisili</h5>
                
                <form action="{{ route('admin.domisili.approve', $domisili->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success" 
                        {{ $domisili->status == 'approved' ? 'disabled' : '' }}>
                        <i class="fas fa-check"></i> Setujui
                    </button>
                </form>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal"
                    {{ $domisili->status == 'rejected' ? 'disabled' : '' }}>
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
                            <form action="{{ route('admin.domisili.reject', $domisili->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                                        <small class="text-muted">Berikan alasan penolakan pengajuan domisili</small>
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

            @if($domisili->keterangan)
            <div class="mt-4">
                <h5>Keterangan</h5>
                <div class="alert 
                    @if($domisili->status == 'approved') alert-success 
                    @elseif($domisili->status == 'rejected') alert-danger 
                    @else alert-warning @endif">
                    {{ $domisili->keterangan }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection