@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="container my-2" style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

        <div class="text-end mb-3">
            <a class="btn btn-success" href="{{ route('users.create') }}">Tambah User</a>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Update Semester Massal</h5>
            </div>
            <div class="card-body">
                <form id="semesterUpdateForm" action="{{ route('admin.update.semester') }}" method="POST" class="d-flex gap-3">
                    @csrf
                    <button type="button" onclick="confirmAction('increment')" class="btn btn-primary">
                        <i class="fas fa-arrow-up mr-2"></i> Naikkan Semester
                    </button>
                    <button type="button" onclick="confirmAction('decrement')" class="btn btn-warning">
                        <i class="fas fa-arrow-down mr-2"></i> Turunkan Semester
                    </button>
                    <input type="hidden" name="action" id="actionInput">
                </form>
            </div>
        </div>

        <div class="container my-4" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Daftar Pengguna</h2>
            <livewire:user-table />
        </div>
    </div>
</div>

<!-- JavaScript for confirmation dialog -->
<script>
    function confirmAction(action) {
        const actionName = action === 'increment' ? 'Naikkan' : 'Turunkan';
        
        Swal.fire({
            title: `Apakah Anda yakin?`,
            text: `Anda akan ${actionName.toLowerCase()} semester untuk semua mahasiswa.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Ya, ${actionName} Semester`,
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('actionInput').value = action;
                document.getElementById('semesterUpdateForm').submit();
            }
        });
    }
</script>

<!-- Include SweetAlert2 for beautiful alerts -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection