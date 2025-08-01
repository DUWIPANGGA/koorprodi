@extends('layouts.dashboard')

@section('title', 'Update Profile')

@section('content')
<style>
    .profile-container {
        max-width: 900px;
        margin: 2rem auto;
    }
    
    .profile-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: none;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .profile-header h3 {
        margin: 0;
        font-weight: 600;
    }
    
    .profile-photo-container {
        position: relative;
        margin: -75px auto 1.5rem;
        width: 150px;
        height: 150px;
    }
    
    .profile-photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .photo-upload-btn {
        position: absolute;
        bottom: -10px;
        right: -10px;
        background: #4f46e5;
        color: white;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.2s;
    }
    
    .photo-upload-btn:hover {
        background: #4338ca;
        transform: scale(1.05);
    }
    
    .photo-upload-input {
        display: none;
    }
    
    .info-card {
        background-color: #f9fafb;
        border-radius: 10px;
        border-left: 4px solid #4f46e5;
        margin-bottom: 1.5rem;
    }
    
    .info-table {
        margin-bottom: 0;
    }
    
    .info-table td {
        padding: 0.75rem;
        vertical-align: middle;
    }
    
    .info-table tr:not(:last-child) td {
        border-bottom: 1px solid #e5e7eb;
    }
    
    .info-label {
        color: #4f46e5;
        font-weight: 500;
        width: 35%;
    }
    
    .form-floating>label {
        color: #6b7280;
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        padding: 1rem 1rem;
        border: 1px solid #e5e7eb;
        transition: all 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #a5b4fc;
        box-shadow: 0 0 0 3px rgba(165, 180, 252, 0.3);
    }
    
    .btn-primary {
        background-color: #4f46e5;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-primary:hover {
        background-color: #4338ca;
        transform: translateY(-1px);
    }
    
    .btn-outline-secondary {
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
    }
    
    .btn-danger {
        background-color: #ef4444;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    
    .btn-danger:hover {
        background-color: #dc2626;
        transform: translateY(-1px);
    }
    
    .alert {
        border-radius: 8px;
    }
    
    /* Modal styling */
    .modal-header {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }
    
    .modal-title {
        font-weight: 600;
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .modal-footer {
        border-top: none;
        padding: 1rem 1.5rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }
        
        .profile-photo-container {
            margin-top: -50px;
        }
        
        .info-label {
            width: 40%;
        }
    }
</style>

<div class="profile-container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="profile-card">
                <div class="profile-header">
                    <h3>Update Profile</h3>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                    </button>
                </div>
                
                <div class="card-body p-4">
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

                        <!-- Profile Photo -->
                        <div class="profile-photo-container">
                            <img src="{{ $user->foto_profil ? asset($user->foto_profil) : asset('LogoOrang.jpg') }}"
                                alt="Profile Photo"
                                class="profile-photo rounded-circle">
                            
                            <label for="foto_profil" class="photo-upload-btn">
                                <i class="fas fa-camera"></i>
                                <input type="file" id="foto_profil" name="foto_profil" class="photo-upload-input" accept="image/*">
                            </label>
                        </div>

                        <!-- User Info Card -->
                        <div class="info-card p-3 mb-4">
                            <table class="info-table">
                                <tr>
                                    <td class="info-label">NIM</td>
                                    <td width="5%">:</td>
                                    <td>{{ $user->nim }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Student Name</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="info-label">Batch Year</td>
                                    <td>:</td>
                                    <td>{{ $user->angkatan }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Form Fields -->
                        <div class="row g-3">
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
                                    <label for="phone_wali">Guardian Phone</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            @if(Auth::user()->role == 'super_admin')
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select id="role" name="role" class="form-select">
                                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="super_admin" {{ old('role', $user->role) == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                            </div>
                            @endif

                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea id="alamat" name="alamat" class="form-control" style="height: 100px" required>{{ old('alamat', $user->alamat) }}</textarea>
                                    <label for="alamat">Address</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                        value="{{ old('asal_sekolah', $user->asal_sekolah) }}" required>
                                    <label for="asal_sekolah">Previous School</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="hobi" name="hobi" class="form-control"
                                        value="{{ old('hobi', $user->hobi) }}" required>
                                    <label for="hobi">Hobby</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" id="bakat" name="bakat" class="form-control"
                                        value="{{ old('bakat', $user->bakat) }}" required>
                                    <label for="bakat">Talent</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <label for="password">Password</label>
                                    <small class="text-muted">Leave blank if you don't want to change password</small>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
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
            <div class="modal-header">
                <h5 class="modal-title text-white" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
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
            const preview = document.querySelector('.profile-photo');
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection