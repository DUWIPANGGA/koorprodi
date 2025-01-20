<div class="container-fluid" id="print-layout">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
<button type="button" wire:click.prevent="applyFilter('all')" class="btn btn-<?php echo e($filter == 'all' ? 'success' : 'primary'); ?> mt-2">
    Semua Data
</button>
<button type="button" wire:click.prevent="applyFilter('ipkDibawah3')" class="btn btn-<?php echo e($filter == 'ipkDibawah3' ? 'success' : 'primary'); ?> mt-2">
    IPK di bawah 3
</button>
<!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 8; $i++): ?>
    <button type="button" wire:click.prevent="applyFilter('semester-<?php echo e($i); ?>')" class="btn btn-<?php echo e($filter == 'semester-' . $i ? 'success' : 'primary'); ?> mt-2">
        Semester <?php echo e($i); ?>

    </button>
<?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>IPK</th>
                    <th>Status</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php if(isset($rekaps) && $rekaps->count() > 0): ?>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $rekaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($rekap->nim ?? '-'); ?></td>
                            <td><?php echo e($rekap->name ?? '-'); ?></td>
                            <td><?php echo e($rekap->prodi ?? '-'); ?></td>
                            <td><?php echo e($rekap->IPK ?? '-'); ?></td>
                            <td>
                                <span class="<?php echo e($rekap->validated == 0 ? 'badge bg-danger' : 'badge bg-success'); ?>">
                                    <?php echo e($rekap->validated == 0 ? 'Belum Di Validasi' : 'Sudah Di Validasi'); ?>

                                </span>
                            </td>
                            <td><?php echo e($rekap->semester ?? '-'); ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('Rekap.edit', $rekap->id)); ?> "> <i class="fas fa-eye"></i></a>

                                <!--[if BLOCK]><![endif]--><?php if(Auth::user()->role == 'super_admin'): ?>
                                <form action="<?php echo e(route('Rekap.destroy', $rekap->id)); ?>" method="POST"
                                    style="display: inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
        <!-- Paginasi -->
        <div class="mt-3">
            <?php echo e($rekaps->links()); ?>

        </div>
    </div>
</div>
<?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/livewire/ipk.blade.php ENDPATH**/ ?>