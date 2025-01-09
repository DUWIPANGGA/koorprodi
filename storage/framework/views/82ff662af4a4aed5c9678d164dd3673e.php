<?php $__env->startSection('title', 'Buat Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Buat Pengaduan</h1>

    <form action="<?php echo e(route('pengaduan.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="cerita">Cerita</label>
            <textarea name="cerita" class="form-control" style="height: 40vh;" required><?php echo e(old('cerita')); ?></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/pengaduan/create.blade.php ENDPATH**/ ?>