@extends('layouts.dashboard')

@section('title', 'Update Profile')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <div class="flex justify-center">
            <div class="w-full lg:w-4/5">
                <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                    <div class="bg-white px-6 py-4 border-b border-gray-200 text-center">
                        <h3 class="text-2xl font-semibold text-gray-800">Update Profile</h3>
                    </div>
                    <div class="p-8">
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">There were some problems with your input.</span>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="space-y-6">
                                <div class="text-center">
                                    <img src="{{ $user->foto_profil ? asset($user->foto_profil) : asset('LogoOrang.jpg') }}"
                                        alt="Foto Profil"
                                        class="w-36 h-36 object-cover rounded-full border-4 border-gray-300 mb-6 mx-auto shadow-md">

                                    <div class="p-5 border border-gray-300 rounded-lg bg-gray-50 text-left">
                                        <table class="w-full border-collapse">
                                            <tr>
                                                <td class="py-2 px-3 font-bold text-gray-700 w-1/3">NIM</td>
                                                <td class="py-2 px-3 text-gray-700 w-1/12">:</td>
                                                <td class="py-2 px-3 text-gray-800">{{ $user->nim }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-3 font-bold text-gray-700">Nama Mahasiswa</td>
                                                <td class="py-2 px-3 text-gray-700">:</td>
                                                <td class="py-2 px-3 text-gray-800">{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="py-2 px-3 font-bold text-gray-700">Tahun Angkatan</td>
                                                <td class="py-2 px-3 text-gray-700">:</td>
                                                <td class="py-2 px-3 text-gray-800">{{ $user->angkatan }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="foto_profil" class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                                        <input type="file" id="foto_profil" name="foto_profil"
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-2.5"
                                            accept="image/*">
                                        <p class="mt-1 text-sm text-gray-500">Leave blank if you don't want to change the profile picture.</p>
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                        <input type="text" id="phone" name="phone"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('phone', $user->phone) }}" required>
                                    </div>

                                    <div>
                                        <label for="phone_wali" class="block text-sm font-medium text-gray-700 mb-1">Phone Wali</label>
                                        <input type="text" id="phone_wali" name="phone_wali"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('phone_wali', $user->phone_wali) }}" required>
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                        <textarea id="alamat" name="alamat" rows="3"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            required>{{ old('alamat', $user->alamat) }}</textarea>
                                    </div>

                                    <div>
                                        <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM</label>
                                        <input type="text" id="nim" name="nim"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('nim', $user->nim) }}" required>
                                    </div>

                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama:</label>
                                        <input type="text" id="name" name="name"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <div>
                                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                        <select id="role" name="role"
                                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="KOMINFO" {{ old('role', $user->role) == 'KOMINFO' ? 'selected' : '' }}>KOMINFO</option>
                                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                                        <input type="text" id="asal_sekolah" name="asal_sekolah"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('asal_sekolah', $user->asal_sekolah) }}" required>
                                    </div>

                                    <div>
                                        <label for="hobi" class="block text-sm font-medium text-gray-700 mb-1">Hobi</label>
                                        <input type="text" id="hobi" name="hobi"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('hobi', $user->hobi) }}" required>
                                    </div>

                                    <div>
                                        <label for="bakat" class="block text-sm font-medium text-gray-700 mb-1">Bakat</label>
                                        <input type="text" id="bakat" name="bakat"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                            value="{{ old('bakat', $user->bakat) }}" required>
                                    </div>

                                    <div>
                                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        <p class="mt-1 text-sm text-gray-500">Leave blank if you don't want to change the password.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <button type="submit"
                                    class="inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection