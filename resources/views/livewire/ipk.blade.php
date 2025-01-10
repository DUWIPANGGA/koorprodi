<div class="container-fluid">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
        <button wire:click="rekaps" class="btn btn-primary mt-2">
            Cari
        </button>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($rekaps) && count($rekaps) > 0)
                    @foreach ($rekaps as $rekap)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekap->NIM }}</td>
                            <td>{{ $rekap->name }}</td>
                            <td>{{ $rekap->IPK }}</td>
                            <td>
                                <span class="{{ $rekap->validated == 0 ? 'badge bg-danger' : 'badge bg-success' }}">
                                    {{ $rekap->validated == 0 ? 'Belum Di Validasi' : 'Sudah Di Validasi' }}
                                </span>
                            </td>
                            <td>{{ $rekap->semester }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('Rekap.edit', $rekap->id) }}">Cek</a>
                                <form action="{{ route('Rekap.destroy', $rekap->id) }}" method="post"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data rekap.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
