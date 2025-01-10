<div>
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
        <button wire:click="rekaps" class="btn btn-primary mt-2">
            Cari
        </button>
    </div>

    <!-- Tabel -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>IPK</th>
                <th>Status</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php if(isset($rekaps) && count($rekaps) > 0): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $rekaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($rekap->NIM); ?></td>
                        <td><?php echo e($rekap->name); ?></td>
                        <td><?php echo e($rekap->IPK); ?></td>
                        <td>
                            <span class="<?php echo e($rekap->validated == 0 ? 'badge bg-danger' : 'badge bg-success'); ?>">
                                <?php echo e($rekap->validated == 0 ? 'Belum Di Validasi' : 'Sudah Di Validasi'); ?>

                            </span>
                        </td>
                        <td><?php echo e($rekap->semester); ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('Rekap.edit', $rekap->id)); ?>">Cek</a>
                            <form action="<?php echo e(route('Rekap.destroy', $rekap->id)); ?>" method="post"
                                style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data rekap.</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div>
<?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/livewire/ipk.blade.php ENDPATH**/ ?>