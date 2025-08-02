@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">  <!-- Changed to gray header -->
            <h4 class="mb-0">Sistem Broadcast Email</h4>  <!-- Changed to Indonesian -->
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                </div>
            @endif
            
            <form method="POST" action="{{ route('simple.broadcast.send') }}" id="broadcast-form">
                @csrf
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="subject" class="form-label">Subjek Email</label>
                        <input type="text" class="form-control" id="subject" name="subject" required placeholder="Masukkan subjek email">
                    </div>
                    <div class="col-md-6">
                        <label for="content" class="form-label">Isi Pesan</label>
<textarea class="form-control" id="content" name="content" rows="3" required placeholder="Tulis pesan Anda disini"></textarea>
                    </div>
                </div>
                
                <div class="row mb-4 g-3">  <!-- Added g-3 for gutter spacing -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester" name="semester">
                                <option value="">Semua Semester</option>
                                @foreach(range(1, 8) as $semester)
                                    <option value="{{ $semester }}">Semester {{ $semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <select class="form-select" id="prodi" name="prodi">
                                <option value="">Semua Program</option>
                                @foreach(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Mesin'] as $program)
                                    <option value="{{ $program }}">{{ $program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="angkatan" class="form-label">Angkatan</label>
                            <select class="form-select" id="angkatan" name="angkatan">
                                <option value="">Semua Angkatan</option>
                                @foreach(range(date('Y')-5, date('Y')) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Semua Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <button type="button" id="filter-button" class="btn btn-sm btn-primary me-2">
                                <i class="fas fa-filter me-1"></i> Filter
                            </button>
                            <span id="selected-count" class="badge bg-primary">0 terpilih</span>
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary me-2" id="select-visible">
                                <i class="fas fa-check-circle me-1"></i> Pilih yang Tampil
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="deselect-all">
                                <i class="fas fa-times-circle me-1"></i> Batalkan Semua
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="recipients-table">
                            <thead class="table-light">
                                <tr>
                                    <th width="40px">
                                        <input type="checkbox" id="select-all">
                                    </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Program Studi</th>
                                    <th>Semester</th>
                                    <th>Angkatan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr data-semester="{{ $user->semester }}" 
                                    data-prodi="{{ $user->study_program }}" 
                                    data-angkatan="{{ $user->angkatan }}" 
                                    data-status="{{ $user->is_active ? 'active' : 'inactive' }}">
                                    <td>
                                        <input class="form-check-input recipient-checkbox" type="checkbox" name="recipients[]" value="{{ $user->id }}" id="user{{ $user->id }}">
                                    </td>
                                    <td>
                                        <label class="form-check-label" for="user{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->study_program }}</td>
                                    <td>{{ $user->semester }}</td>
                                    <td>{{ $user->angkatan }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->is_active ? 'success' : 'secondary' }}">
                                            {{ $user->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary" id="send-button">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Broadcast
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter function
        const filterTable = () => {
            const semester = document.getElementById('semester').value;
            const prodi = document.getElementById('prodi').value;
            const angkatan = document.getElementById('angkatan').value;
            const status = document.getElementById('status').value;
            
            document.querySelectorAll('#recipients-table tbody tr').forEach(row => {
                const showRow = 
                    (semester === '' || row.dataset.semester === semester) &&
                    (prodi === '' || row.dataset.prodi === prodi) &&
                    (angkatan === '' || row.dataset.angkatan === angkatan) &&
                    (status === '' || row.dataset.status === status);
                
                row.style.display = showRow ? '' : 'none';
            });
            
            updateSelectedCount();
        };
        
        // Attach filter event
        document.getElementById('filter-button').addEventListener('click', filterTable);
        
        // Select/Deselect functionality
        document.getElementById('select-all').addEventListener('change', function() {
            document.querySelectorAll('.recipient-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateSelectedCount();
        });
        
        document.getElementById('select-visible').addEventListener('click', function() {
            document.querySelectorAll('#recipients-table tbody tr').forEach(row => {
                if (row.style.display !== 'none') {
                    row.querySelector('.recipient-checkbox').checked = true;
                }
            });
            updateSelectedCount();
        });
        
        document.getElementById('deselect-all').addEventListener('click', function() {
            document.querySelectorAll('.recipient-checkbox').forEach(checkbox => {
                checkbox.checked = false;
            });
            updateSelectedCount();
        });
        
        // Update selected count
        function updateSelectedCount() {
            const visibleCheckboxes = Array.from(document.querySelectorAll('#recipients-table tbody tr'))
                .filter(row => row.style.display !== 'none')
                .map(row => row.querySelector('.recipient-checkbox'));
            
            const checkedCount = visibleCheckboxes.filter(checkbox => checkbox.checked).length;
            const totalVisible = visibleCheckboxes.length;
            
            document.getElementById('selected-count').textContent = 
                `${checkedCount} dari ${totalVisible} terpilih`;
            
            // Update select-all checkbox state
            const selectAll = document.getElementById('select-all');
            if (checkedCount === 0) {
                selectAll.checked = false;
                selectAll.indeterminate = false;
            } else if (checkedCount === totalVisible) {
                selectAll.checked = true;
                selectAll.indeterminate = false;
            } else {
                selectAll.checked = false;
                selectAll.indeterminate = true;
            }
        }
        
        // Individual checkbox change
        document.querySelector('#recipients-table tbody').addEventListener('change', function(e) {
            if (e.target.classList.contains('recipient-checkbox')) {
                updateSelectedCount();
            }
        });
        
        // Form submission validation
        document.getElementById('broadcast-form').addEventListener('submit', function(e) {
            const checkedCount = document.querySelectorAll('.recipient-checkbox:checked').length;
            if (checkedCount === 0) {
                e.preventDefault();
                alert('Silakan pilih setidaknya satu penerima!');
            }
        });
        
        // Initialize filters
        filterTable();
    });
</script>
<style>
    /* Additional styling */
    #recipients-table th {
        white-space: nowrap;
        vertical-align: middle;
    }
    #recipients-table td {
        vertical-align: middle;
    }
    .table-responsive {
        border-radius: 8px;
        overflow: hidden;
    }
    #filter-button {
        min-width: 100px;
    }
    #selected-count {
        font-size: 0.9rem;
        padding: 0.35em 0.65em;
    }
    .form-select, .form-control {
        border-radius: 6px;
    }
</style>
<!-- Load CKEditor before your script -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
  $(document).ready(function() {
    $('#content').summernote({
      height: 200
    });
  });
</script>


@endsection
@endsection
