<?php $__env->startSection('content'); ?>
    <h1>Tambah Rekap</h1>
    <form action="<?php echo e(route('Rekap.store')); ?>" method="POST" enctype="multipart/form-data"
        style="width: 50%; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <?php echo csrf_field(); ?>
        <label style="display: block; margin-bottom: 10px;">IPS:</label>
        <input type="number" name="IPS" value="<?php echo e(old('IPS')); ?>" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">IPK:</label>
        
        
        <label style="display: block; margin-bottom: 10px;">Dokumen:</label>
        <input type="file" name="dokumen" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <select name="semester" style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    <option value="">Pilih Semester</option>
    <?php for($i = 1; $i <= 8; $i++): ?>
        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
    <?php endfor; ?>
</select>
        <input type="number" name="semester" value="<?php echo e(old('semester')); ?>" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">User ID:</label>
        <input type="number" name="user_id" value="<?php echo e(old('user_id')); ?>" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <button type="submit"
            style="width: 100%; height: 40px; background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Simpan</button>
    </form>
    <a href="<?php echo e(route('Rekap.index')); ?>" class="btn btn-primary">Kembali</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/ipk/create.blade.php ENDPATH**/ ?>