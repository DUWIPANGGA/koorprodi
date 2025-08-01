@extends('layouts.dashboard')

@section('title', 'Update Profile')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-10">
    <div class="bg-white shadow rounded-2xl">
        <div class="text-center border-b border-gray-200 py-4">
            <h3 class="text-2xl font-semibold text-gray-800">Update Profile</h3>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-6">
                    <!-- Foto Profil & Info Ringkas -->
                    <div class="flex flex-col items-center">
                        <img src="{{ Auth::user()->foto_profil ? asset(Auth::user()->foto_profil) : asset('LogoOrang.jpg') }}"
                            alt="Foto Profil"
                            class="w-36 h-36 rounded-full border-4 border-gray-300 mb-4 object-cover">
                        <div class="w-full border border-gray-300 rounded-lg p-4 mb-6">
                            <table class="w-full text-sm">
                                <!-- Data yang hanya bisa dilihat -->
                                <tr>
                                    <td class="font-medium py-1">NIM</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="nim" value="{{ old('nim', Auth::user()->nim) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ Auth::user()->nim }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Nama</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ Auth::user()->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Kelas</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="kelas" value="{{ old('kelas', Auth::user()->kelas) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ Auth::user()->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Jenis Kelamin</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <select name="jenis_kelamin" class="border rounded px-2 py-1 w-full">
                                                <option value="L" {{ Auth::user()->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                <option value="P" {{ Auth::user()->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        @else
                                            {{ Auth::user()->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-medium py-1">Angkatan</td>
                                    <td class="py-1 px-2">:</td>
                                    <td class="py-1">
                                        @can('updateBasicInfo', $user)
                                            <input type="text" name="angkatan" value="{{ old('angkatan', Auth::user()->angkatan) }}"
                                                class="border rounded px-2 py-1 w-full">
                                        @else
                                            {{ Auth::user()->angkatan }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Foto Profil -->
                        <div>
                            <label for="foto_profil" class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                            <input type="file" id="foto_profil" name="foto_profil" accept="image/*"
                                class="block w-full text-sm text-gray-900 border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah foto profil.</p>
                        </div>

                        @if(Auth::user()->role == 'super_admin')
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select id="role" name="role"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-sm">
                                <option value="user" {{ old('role', Auth::user()->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', Auth::user()->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="super_admin" {{ old('role', Auth::user()->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                        </div>
                        @endif

                        <!-- Data yang bisa diedit semua user -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div>
                            <label for="phone_wali" class="block text-sm font-medium text-gray-700 mb-1">Phone Wali</label>
                            <input type="text" id="phone_wali" name="phone_wali" value="{{ old('phone_wali', Auth::user()->phone_wali) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>{{ old('alamat', Auth::user()->alamat) }}</textarea>
                        </div>

                        <div>
                            <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                            <input type="text" id="asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah', Auth::user()->asal_sekolah) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div>
                            <label for="hobi" class="block text-sm font-medium text-gray-700 mb-1">Hobi</label>
                            <input type="text" id="hobi" name="hobi" value="{{ old('hobi', Auth::user()->hobi) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div>
                            <label for="bakat" class="block text-sm font-medium text-gray-700 mb-1">Bakat</label>
                            <input type="text" id="bakat" name="bakat" value="{{ old('bakat', Auth::user()->bakat) }}"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm" required>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="password" name="password"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 text-sm">
                            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="mt-6 px-6 py-2 bg-gray-700 text-white font-medium rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection