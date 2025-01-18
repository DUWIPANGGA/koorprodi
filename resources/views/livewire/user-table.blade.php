<div class="container-fluid">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari pengguna berdasarkan nama atau email...">
        <button wire:click="UserTable" class="btn btn-primary mt-2">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nim }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->prodi }}</td>
                        <td class="text-center">
                            <a class="btn btn-success" href="{{ route('users.show', $user) }}">Lihat</a>
                            @if(Auth::user()->role == 'super_admin')
                            <a class="btn btn-warning" href="{{ route('user.edit', $user) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>
