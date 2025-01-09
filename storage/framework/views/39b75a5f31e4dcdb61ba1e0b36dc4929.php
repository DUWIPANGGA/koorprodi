<?php $__env->startSection('content'); ?>
    <div class="container d-flex flex-row h-100">
        <div class="col-md-6"
            style="width: 50%; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div class="card h-100">
                <div class="card-body h-100">
                    <iframe src="<?php echo e(asset($rekap->dokumen)); ?>" style="height: 100%; width: 100%; border: none;"></iframe>
                </div>
            </div>
        </div>

        <form action="<?php echo e(route('rekap.validasi', $rekap->id)); ?>" method="POST" enctype="multipart/form-data"
            style="width: 50%; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <?php echo csrf_field(); ?>
            <?php if($rekap->id): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <h2 style="text-align: center; margin-bottom: 20px;">Validasi IPK</h2>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <p><strong>Nama:</strong> <?php echo e($rekap->name); ?></p>
            <p><strong>NIM:</strong> <?php echo e($rekap->nim); ?></p>
            <p><strong>Semester:</strong> <?php echo e($rekap->semester); ?></p>
            <p style="color: red; font-size: 12px;">Note: Klik validasi untuk memvalidasi kebenaran IPK</p>

            <p><strong>IPK:</strong> </p>
            <input type="number" name="IPK" value="<?php echo e(old('IPK', $rekap->IPK)); ?>" required min="0"
                max="4" step="0.1"
                style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">

            <button type="submit"
                style="width: 100%; height: 40px; background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;"><?php echo e($rekap->id ? 'validasi' : 'Simpan'); ?></button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/ipk/edit.blade.php ENDPATH**/ ?>