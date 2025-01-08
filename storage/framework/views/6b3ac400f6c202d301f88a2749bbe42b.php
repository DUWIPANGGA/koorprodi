<?php $__env->startSection('title', 'Edit Acara'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Edit Acara</h1>

        <form action="<?php echo e(route('acara.update', $acara->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="nama_acara">Nama Acara</label>
                <input type="text" name="nama_acara" class="form-control" value="<?php echo e(old('nama_acara', $acara->nama_acara)); ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?php echo e(old('tanggal', $acara->tanggal)); ?>" required>
            </div>

            <div class="form-group">
                <label for="lama_acara">Lama Acara (hari)</label>
                <input type="number" name="lama_acara" class="form-control" value="<?php echo e(old('lama_acara', $acara->lama_acara)); ?>" required>
            </div>

            <div class="form-group">
                <label for="start">Status</label>
                <select name="start" class="form-control" required>
                    <option value="1" <?php echo e($acara->start ? 'selected' : ''); ?>>Dimulai</option>
                    <option value="0" <?php echo e(!$acara->start ? 'selected' : ''); ?>>Belum Dimulai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/acara/edit.blade.php ENDPATH**/ ?>