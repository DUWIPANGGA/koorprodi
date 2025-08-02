@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white"> <!-- Changed to bg-secondary -->
            <h4 class="mb-0">Sistem Broadcast Email</h4> <!-- Changed to Indonesian -->
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button> <!-- Changed to Indonesian -->
                </div>
            @endif
            
            <form method="POST" action="{{ route('simple.broadcast.send') }}" id="broadcast-form">
                @csrf
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="subject" class="form-label">Subjek Email</label> <!-- Changed to Indonesian -->
                        <input type="text" class="form-control" id="subject" name="subject" required placeholder="Masukkan subjek email">
                    </div>
                    <div class="col-md-6">
                        <label for="content" class="form-label">Isi Pesan</label> <!-- Changed to Indonesian -->
                        <textarea class="form-control" id="content" name="content" rows="3" required placeholder="Tulis pesan Anda disini"></textarea>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="angkatan" class="form-label">Angkatan</label> <!-- Changed to Indonesian -->
                            <select class="form-select" id="angkatan" name="angkatan">
                                <option value="">Semua Angkatan</option> <!-- Changed to Indonesian -->
                                @foreach(range(date('Y')-5, date('Y')) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="prodi" class="form-label">Program Studi</label> <!-- Changed to Indonesian -->
                            <select class="form-select" id="prodi" name="prodi">
                                <option value="">Semua Program</option> <!-- Changed to Indonesian -->
                                @foreach(['Teknik Informatika', 'Sistem Informasi', 'Teknik Elektro', 'Teknik Mesin'] as $program)
                                    <option value="{{ $program }}">{{ $program }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester" name="semester">
                                <option value="">Semua Semester</option> <!-- Changed to Indonesian -->
                                @foreach(range(1, 8) as $semester)
                                    <option value="{{ $semester }}">Semester {{ $semester }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ipk" class="form-label">Laporan IPK</label> <!-- Changed to Indonesian -->
                            <select class="form-select" id="ipk" name="ipk">
                                <option value="">Semua IPK</option> <!-- Changed to Indonesian -->
                                <option value="3.5-4.0">3.5 - 4.0</option>
                                <option value="3.0-3.49">3.0 - 3.49</option>
                                <option value="2.5-2.99">2.5 - 2.99</option>
                                <option value="2.0-2.49">2.0 - 2.49</option>
                                <option value="0-1.99">0 - 1.99</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-primary me-2" id="search-users">
                                <i class="fas fa-search me-1"></i> Cari Pengguna
                            </button> <!-- Changed to Indonesian -->
                            <span id="user-count" class="badge bg-secondary">0 pengguna terpilih</span> <!-- Changed to Indonesian -->
                        </div>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary me-2" id="select-visible">Pilih yang Tampil</button> <!-- Changed to Indonesian -->
                            <button type="button" class="btn btn-sm btn-outline-secondary" id="deselect-all">Batalkan Pilihan</button> <!-- Changed to Indonesian -->
                        </div>
                    </div>
                    
                    <div class="table-responsive overflow-x-scroll">
                        <table class="table table-hover table-bordered" id="recipients-table">
                            <thead class="table-light">
                                <tr>
                                    <th width="40px">
                                        <input type="checkbox" id="select-all">
                                    </th>
                                    <th>NIM</th>
                                    <th>Nama</th> <!-- Changed to Indonesian -->
                                    <th>Program Studi</th> <!-- Changed to Indonesian -->
                                    <th>Angkatan</th> <!-- Changed to Indonesian -->
                                    <th>Semester</th>
                                    <th>IPK</th>
                                    <th>Kelas</th> <!-- Changed to Indonesian -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Will be populated via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">Reset</button>
                    <button type="submit" class="btn btn-primary" id="send-button">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Broadcast
                    </button> <!-- Changed to Indonesian -->
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = $('#recipients-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('users.datatable') }}',
                data: function (d) {
                    d.angkatan = $('#angkatan').val();
                    d.prodi = $('#prodi').val();
                    d.semester = $('#semester').val();
                    d.ipk = $('#ipk').val();
                }
            },
            columns: [
                { 
                    data: 'id',
                    render: function(data, type, row) {
                        return `<input type="checkbox" class="recipient-checkbox" name="recipients[]" value="${data}">`;
                    },
                    orderable: false
                },
                { data: 'nim' },
                { data: 'name' },
                { data: 'prodi' },
                { data: 'angkatan' },
                { data: 'semester' },
                { 
                    data: 'pelaporan_ipk',
                    render: function(data) {
                        return data ? parseFloat(data).toFixed(2) : '-';
                    }
                },
                { data: 'kelas' }
            ],
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            responsive: true,
            language: { // Added Indonesian language for DataTables
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(disaring dari _MAX_ total data)",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });

        // Search users with selected filters
        $('#search-users').click(function() {
            table.ajax.reload();
        });

        // Update user count
        $('#recipients-table').on('change', '.recipient-checkbox', function() {
            updateSelectedCount();
        });

        // Select all checkboxes
        $('#select-all').click(function() {
            $('.recipient-checkbox').prop('checked', this.checked);
            updateSelectedCount();
        });

        // Select only visible users
        $('#select-visible').click(function() {
            $('.recipient-checkbox').prop('checked', true);
            updateSelectedCount();
        });

        // Deselect all
        $('#deselect-all').click(function() {
            $('.recipient-checkbox').prop('checked', false);
            updateSelectedCount();
        });

        // Update selected user count
        function updateSelectedCount() {
            const count = $('.recipient-checkbox:checked').length;
            $('#user-count').text(count + (count === 1 ? ' pengguna terpilih' : ' pengguna terpilih')).toggleClass('bg-secondary bg-primary', count === 0 || count > 0);
        }

        // Form submission handler
        $('#broadcast-form').submit(function(e) {
            if ($('.recipient-checkbox:checked').length === 0) {
                e.preventDefault();
                alert('Silakan pilih setidaknya satu penerima!'); // Changed to Indonesian
            }
        });
    });
</script>
@endsection