<div>
    <!-- Search and Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <!-- Search Input -->
                <div class="col-md-4">
                    <input 
                        wire:model.live.debounce.500ms="search"
                        type="text" 
                        class="form-control" 
                        placeholder="Cari nama/NIM/prodi/alamat..."
                    >
                </div>
                
                <!-- Status Filter -->
                <div class="col-md-2">
                    <select wire:model.live="filter" class="form-select">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                        <option value="current-semester">Semester Aktif</option>
                    </select>
                </div>
                
                <!-- Semester Filter -->
                <div class="col-md-2">
                    <select wire:model.live="semesterFilter" class="form-select">
                        <option value="">Semua Semester</option>
                        @for($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}">Semester {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                
                <!-- Prodi Filter -->
                <div class="col-md-2">
                    <select wire:model.live="prodiFilter" class="form-select">
                        <option value="">Semua Prodi</option>
                        @foreach($prodiOptions as $prodi)
                            <option value="{{ $prodi }}">{{ $prodi }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Angkatan Filter -->
                <div class="col-md-1">
                    <select wire:model.live="angkatanFilter" class="form-select">
                        <option value="">Semua Angkatan</option>
                        @foreach($angkatanOptions as $angkatan)
                            <option value="{{ $angkatan }}">{{ $angkatan }}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Reset Button -->
                <div class="col-md-1">
                    <button wire:click="resetFilters" class="btn btn-outline-secondary w-100" title="Reset Filter">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('domisili.export.csv') }}" class="btn btn-success">
    <i class="fas fa-file-excel"></i>
 Export excel
</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domisili as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mahasiswa->nim }}</td>
                            <td>{{ $item->mahasiswa->name }}</td>
                            <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <span class="badge bg-{{ 
                                    $item->status == 'approved' ? 'success' : 
                                    ($item->status == 'rejected' ? 'danger' : 'warning') 
                                }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button wire:click="showDomisili({{ $item->id }})" 
                                            class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    @if($item->status == 'pending')
                                    <button wire:click="approve({{ $item->id }})" 
                                            class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button wire:click="confirmRejection({{ $item->id }})" 
                                            class="btn btn-sm btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            {{ $domisili->links() }}
        </div>
    </div>

    <!-- Rejection Modal -->
    @if($confirmingRejection)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Konfirmasi Penolakan</h5>
                    <button wire:click="$set('confirmingRejection', false)" class="btn-close btn-close-white"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Alasan Penolakan:</label>
                        <textarea wire:model="keteranganPenolakan" class="form-control" rows="3"></textarea>
                        @error('keteranganPenolakan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('confirmingRejection', false)" class="btn btn-secondary">Batal</button>
                    <button wire:click="reject" class="btn btn-danger">Konfirmasi Penolakan</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Detail Modal -->
    @if($selectedDomisili)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Detail Pengajuan Domisili</h5>
                    <button wire:click="closeDetail" class="btn-close btn-close-white"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Data Mahasiswa</h6>
                            <table class="table table-sm">
                                <tr>
                                    <th>NIM</th>
                                    <td>{{ $selectedDomisili->mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $selectedDomisili->mahasiswa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Prodi</th>
                                    <td>{{ $selectedDomisili->mahasiswa->prodi }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6>Data Domisili</h6>
                            <table class="table table-sm">
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $selectedDomisili->status == 'approved' ? 'success' : 
                                            ($selectedDomisili->status == 'rejected' ? 'danger' : 'warning') 
                                        }}">
                                            {{ ucfirst($selectedDomisili->status) }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $selectedDomisili->alamat_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $selectedDomisili->keterangan ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <h6 class="mt-4">Dokumen Pendukung</h6>
                    <div class="row">
                        @foreach($selectedDomisili->fotos as $foto)
                        <div class="col-md-4 mb-3">
                            <a href="{{ asset('storage/'.$foto->path) }}" target="_blank">
                                <img src="{{ asset('storage/'.$foto->path) }}" 
                                     class="img-thumbnail" 
                                     style="width: 100%; height: 150px; object-fit: cover;">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="closeDetail" class="btn btn-secondary">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>