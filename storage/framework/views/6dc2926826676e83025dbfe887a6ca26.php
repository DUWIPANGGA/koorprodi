<?php $__env->startSection('title', 'List Acara'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <!-- Title Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List Acara</h1>
            <a href="<?php echo e(route('acara.create')); ?>" class="btn btn-primary btn-sm">Buat Acara Baru</a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success mb-4"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Table Section -->
        <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
            <table class="table table-striped">
                <thead class="thead-light">
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
                            <td>
                                <span class="<?php echo e($item->start ? 'badge bg-success' : 'badge bg-warning'); ?>">
                                    <?php echo e($item->start ? 'Dimulai' : 'Belum Dimulai'); ?>

                                </span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('acara.edit', $item->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?php echo e(route('acara.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus acara ini?')">Hapus</button>
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/acara/index.blade.php ENDPATH**/ ?>