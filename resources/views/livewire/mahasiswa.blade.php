<div class="container-fluid">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
        <button wire:click="Mahasiswa" class="btn btn-primary mt-2">
            Cari
        </button>
            <button type="button" wire:click.prevent="applyFilter('all')"
                class="btn btn-{{ $filter == 'all' ? 'success' : 'primary' }} mt-2">
                Semua Data
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
            <button type="button" wire:click.prevent="applyFilter('pelaporan_ipk')"
                class="btn btn-{{ $filter == 'pelaporan_ipk' ? 'success' : 'primary' }} mt-2">
                Belum rekap IPK
            </button>
            <div class="d-flex justify-content-between mb-3">
    <h2>Data Mahasiswa</h2>
    <a href="{{ route('users.export') }}" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Export Excel
    </a>
</div>
            
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover display" id="library-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Semester</th>
                    <th>Alamat</th>
                    <th>Asal sekolah</th>
                    <th>Kelas</th>
                    <th>Angkatan</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $user)
                    <tr>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->prodi }}</td>
                        <td>{{ $user->semester }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->asal_sekolah }}</td>
                        <td>{{ $user->kelas }}</td>
                        <td>{{ $user->angkatan }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="location.href='{{ route('users.show', $user) }}'">Lihat</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $mahasiswa->links() }}
    </div>
</div>
