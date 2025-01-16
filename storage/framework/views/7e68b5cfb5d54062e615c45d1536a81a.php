<?php $__env->startSection('title', 'Edit Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Pengaduan</h1>

    <form action="<?php echo e(route('pengaduan.update', $pengaduan->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="cerita">Cerita</label>
            <textarea name="cerita" class="form-control" required><?php echo e(old('cerita', $pengaduan->cerita)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="validasi">Validasi</label>
            <select name="validasi" class="form-control" required>
                <option value="1" <?php echo e($pengaduan->validasi ? 'selected' : ''); ?>>Validasi</option>
                <option value="0" <?php echo e(!$pengaduan->validasi ? 'selected' : ''); ?>>Belum Validasi</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/pengaduan/edit.blade.php ENDPATH**/ ?>