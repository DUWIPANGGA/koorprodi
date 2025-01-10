<div class="container-fluid">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
        <button wire:click="Mahasiswa" class="btn btn-primary mt-2">
            Cari
        </button>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover display" id="library-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
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
        {{ $mahasiswa->links('pagination::bootstrap-5') }}
    </div>
</div>
