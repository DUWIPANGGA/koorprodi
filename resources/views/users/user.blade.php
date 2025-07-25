@extends('layouts.dashboard')

@section('title', 'Update Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Update Profile</h3>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                    </button>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <!-- Profile Picture -->
                            <div class="text-center mb-4">
                                <img src="{{ $user->foto_profil ? asset($user->foto_profil) : asset('LogoOrang.jpg') }}"
                                    alt="Foto Profil"
                                    class="rounded-circle border border-3 border-primary mb-3"
                                    style="width: 150px; height: 150px; object-fit: cover;">
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-sm btn-outline-primary position-relative">
                                        <i class="fas fa-camera me-1"></i> Change Photo
                                        <input type="file" id="foto_profil" name="foto_profil" class="position-absolute top-0 start-0 w-100 h-100 opacity-0" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <!-- User Info Card -->
                            <div class="col-12">
                                <div class="card border-primary mb-4">
                                    <div class="card-body">
                                        <table class="table table-borderless mb-0">
                                            <tr>
                                                <td width="30%" class="fw-bold text-primary">NIM</td>
                                                <td width="5%">:</td>
                                                <td>{{ $user->nim }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">Nama Mahasiswa</td>
                                                <td>:</td>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-primary">Tahun Angkatan</td>
                                                <td>:</td>
                                                <td>{{ $user->angkatan }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Fields -->
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="phone" name="phone" class="form-control" 
                                        value="{{ old('phone', $user->phone) }}" required>
                                    <label for="phone">Phone</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="phone_wali" name="phone_wali" class="form-control"
                                        value="{{ old('phone_wali', $user->phone_wali) }}" required>
                                    <label for="phone_wali">Phone Wali</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
 @if(Auth::user()->role == 'super_admin' )
                            <div class="col-md-6">
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                            <select id="role" name="role"
                                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-500 focus:border-gray-500 text-sm">
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                        </div>
                        @endif
                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea id="alamat" name="alamat" class="form-control" style="height: 100px" required>{{ old('alamat', $user->alamat) }}</textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                        value="{{ old('asal_sekolah', $user->asal_sekolah) }}" required>
                                    <label for="asal_sekolah">Asal Sekolah</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="hobi" name="hobi" class="form-control"
                                        value="{{ old('hobi', $user->hobi) }}" required>
                                    <label for="hobi">Hobi</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="bakat" name="bakat" class="form-control"
                                        value="{{ old('bakat', $user->bakat) }}" required>
                                    <label for="bakat">Bakat</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <label for="password">Password</label>
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-arrow-left me-1"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="lead">Are you sure you want to delete your account?</p>
                <p class="text-danger"><strong>Warning:</strong> This action cannot be undone. All your data will be permanently deleted.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Preview Image Script -->
<script>
    document.getElementById('foto_profil').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.querySelector('.rounded-circle');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection