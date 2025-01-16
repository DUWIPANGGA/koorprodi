<div class="container-fluid">
    <!-- Form Pencarian -->
    <div class="mb-3">
        <input type="text" wire:model="search" class="form-control" placeholder="Cari pengguna berdasarkan nama atau email...">
        <button wire:click="UserTable" class="btn btn-primary mt-2">
            Cari
        </button>
    </div>

    <!-- Tabel -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover display" id="library-table">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->nim); ?></td>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->prodi); ?></td>
                        <td class="text-center">
                            <a class="btn btn-success" href="<?php echo e(route('users.show', $user)); ?>">Lihat</a>
                            <!--[if BLOCK]><![endif]--><?php if(Auth::user()->role == 'super_admin'): ?>
                            <a class="btn btn-warning" href="<?php echo e(route('users.edit', $user)); ?>">Edit</a>
                            <form action="<?php echo e(route('users.destroy', $user)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>

        <!-- Pagination -->
        <?php echo e($users->links('pagination::bootstrap-5')); ?>

    </div>
</div>
<?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/livewire/user-table.blade.php ENDPATH**/ ?>