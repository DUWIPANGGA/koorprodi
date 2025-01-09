<?php $__env->startSection('title', 'Daftar Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Pengaduan</h1>
    <a href="<?php echo e(route('pengaduan.create')); ?>" class="btn btn-primary mb-3">Buat Pengaduan</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Cerita</th>
                <th>Validasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $pengaduan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($item->cerita); ?></td>
                    <td><?php echo e($item->validasi ? 'Tervalidasi' : 'Belum Valid'); ?></td>
                    <td>
                        <a href="<?php echo e(route('pengaduan.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('pengaduan.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada pengaduan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/pengaduan/index.blade.php ENDPATH**/ ?>