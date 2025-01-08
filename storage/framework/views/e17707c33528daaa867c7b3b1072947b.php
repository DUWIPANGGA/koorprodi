<?php $__env->startSection('title', 'Update Profile'); ?>
<?php $__env->startSection('styles'); ?>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8A92FF, #C7D2FE);
        }

        .form-card {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 16px;
            color: #555;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #4A56E2;
            box-shadow: 0 0 5px rgba(74, 86, 226, 0.5);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            background: linear-gradient(to right, #4A56E2, #6A75F0);
            color: white;
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            width: 100%;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, #6A75F0, #4A56E2);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="form-card w-full lg:w-2/3">
                <h2 class="form-title">Update Profile</h2>

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Profile Picture -->
                        <div>
                            <div class="form-card">
                                <div class="d-flex items-center mb-6 flex-row">
                                    <img src="<?php echo e(Auth::user()->foto_profil ?? asset(Auth::user()->foto_profil) | asset('LogoOrang.jpg')); ?>"
                                        alt="Foto Profil"
                                        style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid black;margin-right:5%">

                                    <div class="ml-4">
                                        <p class="text-lg font-semibold">Nama: <?php echo e($user->name); ?></p>
                                        <p class="text-sm">Prodi: <?php echo e($user->prodi); ?></p>
                                        <p class="text-sm">Kelas: <?php echo e($user->kelas); ?></p>
                                        <p class="text-sm">Gender: <?php echo e($user->gender); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="foto_profil" class="form-label">Foto Profil</label>
                                <input type="file" id="foto_profil" name="foto_profil" class="form-control"
                                    accept="image/*">
                                <small class="text-gray-500">Leave blank to keep current foto profil.</small>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="<?php echo e(old('phone', $user->phone)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_wali" class="form-label">Phone Wali</label>
                                <input type="text" id="phone_wali" name="phone_wali" class="form-control"
                                    value="<?php echo e(old('phone_wali', $user->phone_wali)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="<?php echo e(old('email', $user->email)); ?>" required>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div>
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" required><?php echo e(old('alamat', $user->alamat)); ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control"
                                    value="<?php echo e(old('asal_sekolah', $user->asal_sekolah)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="hobi" class="form-label">Hobi</label>
                                <input type="text" id="hobi" name="hobi" class="form-control"
                                    value="<?php echo e(old('hobi', $user->hobi)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="bakat" class="form-label">Bakat</label>
                                <input type="text" id="bakat" name="bakat" class="form-control"
                                    value="<?php echo e(old('bakat', $user->bakat)); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <small class="text-gray-500">Leave blank to keep current password.</small>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
<button type="submit" class="btn-submit py-3 px-6 rounded-lg bg-blue-500 hover:bg-blue-700 text-white font-bold transition duration-200">Update Profile</button>
</div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/users/edit.blade.php ENDPATH**/ ?>