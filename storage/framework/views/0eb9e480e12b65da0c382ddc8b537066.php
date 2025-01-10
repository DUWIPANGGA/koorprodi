<?php $__env->startSection('title', 'List Aspirasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>List Aspirasi</h1>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success mb-4"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Isi Aspirasi</th>
                        <th>Tanggal</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $aspirasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->nama); ?></td>
                            <td><?php echo e(Str::limit($item->isi, 50)); ?></td>
                            <td><?php echo e($item->created_at->format('d M Y H:i')); ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal<?php echo e($item->id); ?>">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form action="<?php echo e(route('aspirasi.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada aspirasi</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <?php echo e($aspirasi->links('pagination::bootstrap-4')); ?>

            </div>
        </div>
    </div>

    <!-- Detail Aspirasi -->
    <?php $__currentLoopData = $aspirasi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="detailModal<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="detailModalLabel<?php echo e($item->id); ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel<?php echo e($item->id); ?>">Detail Aspirasi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <p><?php echo e($item->nama); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Tanggal:</strong>
                            <p><?php echo e($item->created_at->format('d M Y H:i')); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Isi Aspirasi:</strong>
                            <p style="word-wrap: break-word; max-height: 300px; overflow-y: auto;"><?php echo e($item->isi); ?></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // DOM
    document.addEventListener('DOMContentLoaded', () => {
        // modal
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            new bootstrap.Modal(modal);
        });

        // konfir hapus
        const deleteButtons = document.querySelectorAll('.btn-danger');
        deleteButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                if (!confirm('Yakin ingin menghapus aspirasi ini?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/aspirasi/index.blade.php ENDPATH**/ ?>