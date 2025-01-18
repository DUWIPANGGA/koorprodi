<?php $__env->startSection('title', 'Update Profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-white">
                        <h3 class="mb-0">Update Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('profile.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="row g-3">
                                <!-- Profile Picture -->
                                
                                <div class="text-center">
                                    <img src="<?php echo e($user->foto_profil ? asset($user->foto_profil) : asset('LogoOrang.jpg')); ?>"
                                        alt="Foto Profil" class="rounded-circle border border-dark mb-3"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                                <div class=""
                                    style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">

                                    <table class="" style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="padding: 5px; font-weight: bold;">NIM</td>
                                            <td>:</td>
                                            <td style="padding: 5px;"><?php echo e($user->nim); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px; font-weight: bold;">Nama Mahasiswa</td>
                                            <td>:</td>
                                            <td style="padding: 5px;"><?php echo e($user->name); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px; font-weight: bold;">Tahun Angkatan</td>
                                            <td>:</td>
                                            <td style="padding: 5px;"><?php echo e($user->angkatan); ?></td>
                                        </tr>
                                    </table>
                                </div>

                                <!-- Foto Profil -->
                                <div class="col-lg-6">
                                    <label for="foto_profil" class="form-label">Foto Profil</label>
                                    <input type="file" id="foto_profil" name="foto_profil" class="form-control"
                                        accept="image/*">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto profil.</small>
                                </div>

                                <!-- Phone -->
                                <div class="col-lg-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        value="<?php echo e(old('phone', $user->phone)); ?>" required>
                                </div>

                                <!-- Phone Wali -->
                                <div class="col-lg-6">
                                    <label for="phone_wali" class="form-label">Phone Wali</label>
                                    <input type="text" id="phone_wali" name="phone_wali" class="form-control"
                                        value="<?php echo e(old('phone_wali', $user->phone_wali)); ?>" required>
                                </div>

                                <!-- Email -->
                                <div class="col-lg-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        value="<?php echo e(old('email', $user->email)); ?>" required>
                                </div>

                                <!-- Alamat -->
                                <div class="col-lg-12">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control" rows="3" required><?php echo e(old('alamat', $user->alamat)); ?></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="admin" <?php echo e(old('role', $user->role) == 'admin' ? 'selected' : ''); ?>>
                                            Admin</option>
                                        <option value="super_admin"
                                            <?php echo e(old('role', $user->role) == 'super_admin' ? 'selected' : ''); ?>>Super Admin
                                        </option>
                                        <option value="KOMINFO"
                                            <?php echo e(old('role', $user->role) == 'KOMINFO' ? 'selected' : ''); ?>>KOMINFO</option>
                                        <option value="user" <?php echo e(old('role', $user->role) == 'user' ? 'selected' : ''); ?>>
                                            User</option>
                                    </select>
                                </div>
                                <!-- Asal Sekolah -->
                                <div class="col-lg-6">
                                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                        value="<?php echo e(old('asal_sekolah', $user->asal_sekolah)); ?>" required>
                                </div>

                                <!-- Hobi -->
                                <div class="col-lg-6">
                                    <label for="hobi" class="form-label">Hobi</label>
                                    <input type="text" id="hobi" name="hobi" class="form-control"
                                        value="<?php echo e(old('hobi', $user->hobi)); ?>" required>
                                </div>

                                <!-- Bakat -->
                                <div class="col-lg-6">
                                    <label for="bakat" class="form-label">Bakat</label>
                                    <input type="text" id="bakat" name="bakat" class="form-control"
                                        value="<?php echo e(old('bakat', $user->bakat)); ?>" required>
                                </div>

                                <!-- Password -->
                                <div class="col-lg-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary px-4 py-2">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/users/user.blade.php ENDPATH**/ ?>