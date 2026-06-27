<div class="container-fluid" id="print-layout">
    <!-- Form Pencarian -->
   <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
        
        <!-- Tombol Filter Baru -->
        <button type="button" wire:click.prevent="applyFilter('all-rekap')"
            class="btn btn-{{ $filter == 'all-rekap' ? 'success' : 'primary' }} mt-2">
            Semua Data Rekap
        </button>
        

        <button type="button" wire:click.prevent="applyFilter('ipkDibawah3')"
            class="btn btn-{{ $filter == 'ipkDibawah3' ? 'success' : 'primary' }} mt-2">
            IPK di bawah 3
        </button>
        @for ($i = 1; $i <= 8; $i++)
            <button type="button" wire:click.prevent="applyFilter('semester-{{ $i }}')"
                class="btn btn-{{ $filter == 'semester-' . $i ? 'success' : 'primary' }} mt-2">
                Semester {{ $i }}
            </button>
        @endfor
        <button type="button" class="btn btn-danger mt-2">
            <a href="{{ route('export.KHS') }}" style="text-decoration:none;color:#fff;">Export</a>
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
                    <th>Prodi</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($rekaps) && $rekaps->count() > 0)
                    @foreach ($rekaps as $rekap)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekap->nim ?? '-' }}</td>
                            <td>{{ $rekap->name ?? '-' }}</td>
                            <td>{{ $rekap->prodi ?? '-' }}</td>
                            <td>{{ $rekap->IPK ?? '-' }}</td>
                            <td>
                                <span class="{{ $rekap->validated == 0 ? 'badge bg-danger' : 'badge bg-success' }}">
                                    {{ $rekap->validated == 0 ? 'Belum Di Validasi' : 'Sudah Di Validasi' }}
                                </span>
                            </td>
                            <td>{{ $rekap->semester ?? '-' }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('Rekap.edit', $rekap->id) }} "> <i
                                        class="fas fa-eye"></i></a>

                                @if($rekap->validated == 0)
                                <form action="{{ route('rekap.tolak', $rekap->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-warning btn-sm" type="submit">Tolak</button>
                                </form>
                                @endif

                                @if (Auth::user()->role == 'super_admin')
                                    <form action="{{ route('Rekap.destroy', $rekap->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data rekap.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <!-- Paginasi -->
        <div class="mt-3">
            {{ $rekaps->links() }}
        </div>
    </div>
</div>
