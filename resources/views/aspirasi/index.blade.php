@extends('layouts.dashboard')

@section('title', 'List Aspirasi')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List Aspirasi</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <div class="flex justify-content-end mb-3">
            <a href="{{ route('aspirasi.export') }}" class="btn btn-success"><i class="fa fa-download"></i> Unduh aspirasi</a>

        </div>

        <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Isi Aspirasi</th>
                            <th>Tanggal</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($aspirasi as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ Str::limit($item->isi, 50) }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <form action="{{ route('aspirasi.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada aspirasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $aspirasi->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Detail Aspirasi Modal -->
    @foreach($aspirasi as $item)
        <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail Aspirasi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <p>{{ $item->nama }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Tanggal:</strong>
                            <p>{{ $item->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Isi Aspirasi:</strong>
                            <p style="word-wrap: break-word; max-height: 300px; overflow-y: auto;">{{ $item->isi }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // modal
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            new bootstrap.Modal(modal);
        });

        // konfir hapus
        const deleteButtons = document.querySelectorAll('.btn-danger');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Yakin ingin menghapus aspirasi ini?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
@endpush
