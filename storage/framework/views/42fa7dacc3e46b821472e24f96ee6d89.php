<?php $__env->startSection('title', 'Daftar Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <!-- Card Wrapper with Background -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-4 text-center" style="font-size: 2rem; font-weight: 600;">Daftar Pengaduan</h1>

    <!-- Button to Create New Pengaduan -->
    <a href="<?php echo e(route('pengaduan.create')); ?>" class="btn btn-primary mb-3">Buat Pengaduan</a>
    </div>
    <div class="card" style="background-color: #fff; border-radius: 10px; padding: 20px;">
        
        <!-- Title Section -->

        <!-- Success or Error Messages -->
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Table Section -->
        <table class="table table-striped">
            <thead class="thead-light">
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
                        <td><?php echo e(Str::limit($item->cerita, 50)); ?></td>
                        <td>
                            <span class="<?php echo e($item->validasi ? 'badge bg-success' : 'badge bg-danger'); ?>">
                                <?php echo e($item->validasi ? 'Tervalidasi' : 'Belum Valid'); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('pengaduan.edit', $item->id)); ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
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
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/pengaduan/index.blade.php ENDPATH**/ ?>