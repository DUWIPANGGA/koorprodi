<?php $__env->startSection('title', 'List Acara'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>List Acara</h1>
        
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <a href="<?php echo e(route('acara.create')); ?>" class="btn btn-primary mb-3">Buat Acara Baru</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Acara</th>
                    <th>Tanggal</th>
                    <th>Lama Acara</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($item->nama_acara); ?></td>
                        <td><?php echo e($item->tanggal); ?></td>
                        <td><?php echo e($item->lama_acara); ?> hari</td>
                        <td><?php echo e($item->start ? 'Dimulai' : 'Belum Dimulai'); ?></td>
                        <td>
                            <a href="<?php echo e(route('acara.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?php echo e(route('acara.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus acara ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada acara</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/acara/index.blade.php ENDPATH**/ ?>