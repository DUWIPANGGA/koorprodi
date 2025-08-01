@extends('layouts.dashboard')

@section('title', 'Update Profile')

@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Card -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white p-6 rounded-xl mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold">Update Profile</h1>
                    <p class="opacity-90">Perbarui informasi profil Anda</p>
                </div>
                <button type="button" class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-lg transition-all"
                        data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-6 space-y-6">
                    <!-- Profile Picture Section -->
                    <div class="flex flex-col items-center">
                        <div class="relative mb-4">
                            <img src="{{ $user->foto_profil ? asset($user->foto_profil) : asset('LogoOrang.jpg') }}"
                                alt="Foto Profil"
                                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow-md"
                                id="profileImagePreview">
                            <label for="foto_profil" class="absolute -bottom-2 -right-2 bg-blue-500 rounded-full p-2 shadow cursor-pointer hover:bg-blue-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                            <input type="file" id="foto_profil" name="foto_profil" class="hidden" accept="image/*">
                        </div>
                        <p class="text-sm text-gray-500">Klik ikon kamera untuk mengubah foto profil</p>
                    </div>

                    <!-- Basic Info Card -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-blue-800 mb-4">Informasi Dasar</h3>
                        <div class="w-full border border-gray-300 rounded-lg p-4 mb-6">
                            <table class="w-full text-sm">
                                <!-- Data yang hanya bisa dilihat -->
                                <tr>
                                    <td class="font-medium py-1">NIM</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="nim" value="{{ old('nim', $user->nim) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ $user->nim }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Nama</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ $user->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Kelas</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="kelas" value="{{ old('kelas', $user->kelas) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ $user->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Jenis Kelamin</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <select name="jenis_kelamin" class="border rounded px-2 py-1 w-full">
                                                <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        @else
                                            {{ $user->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Angkatan</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="angkatan" value="{{ old('angkatan', $user->angkatan) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ $user->angkatan }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Editable Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <div>
                                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                                <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', $user->asal_sekolah) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label for="phone_wali" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon Wali</label>
                                <input type="text" id="phone_wali" name="phone_wali" value="{{ old('phone_wali', $user->phone_wali) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            @if($user->role == 'super_admin')
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                <select id="role" name="role"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                </select>
                            </div>
                            @endif

                            <div>
                                <label for="hobi" class="block text-sm font-medium text-gray-700 mb-1">Hobi</label>
                                <input type="text" id="hobi" name="hobi" value="{{ old('hobi', $user->hobi) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Full Width Fields -->
                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', $user->alamat) }}</textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label for="bakat" class="block text-sm font-medium text-gray-700 mb-1">Bakat</label>
                            <input type="text" id="bakat" name="bakat" value="{{ old('bakat', $user->bakat) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="md:col-span-2">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-4 pt-6">
                        <a href="{{ url()->previous() }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Kembali
                        </a>
                        <button type="submit" class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red-600 text-white">
                <h5 class="modal-title" id="deleteAccountModalLabel">Konfirmasi Penghapusan Akun</h5>
                <button type="button" class="text-white" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex items-start">
                    <div class="flex-shrink-0 pt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Apakah Anda yakin?</h3>
                        <div class="mt-2 text-sm text-gray-500">
                            <p>Akun Anda akan dihapus secara permanen. Semua data akan hilang dan tidak dapat dikembalikan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" data-bs-dismiss="modal">
                    Batalkan
                </button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Hapus Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Image preview functionality
    document.getElementById('foto_profil').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('profileImagePreview');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection