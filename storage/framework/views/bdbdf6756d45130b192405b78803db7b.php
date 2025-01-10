<div>
    <!-- Form Pencarian -->
<div class="mb-3">
    <input type="text" wire:model="search" class="form-control" placeholder="Cari mahasiswa...">
    <button wire:click="Mahasiswa" class="btn btn-primary mt-2">
        Cari
    </button>
</div>

    <!-- Tabel -->
        <table class="table table-striped table-bordered table-hover display" id="library-table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Asal sekolah</th>
                <th>Kelas</th>
                <th>Angkatan</th>
                <th>Email</th>
                <th>Kontak</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $mahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->nim); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->prodi); ?></td>
                    <td><?php echo e($user->alamat); ?></td>
                    <td><?php echo e($user->asal_sekolah); ?></td>
                    <td><?php echo e($user->kelas); ?></td>
                    <td><?php echo e($user->angkatan); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->phone); ?></td>
                    <td><button type="button" class="btn btn-primary" onclick="location.href='<?php echo e(route('users.show', $user)); ?>'">Lihat</button></td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
        <?php echo e($mahasiswa->links('pagination::bootstrap-5')); ?>


    </table>
</div>
<?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/livewire/mahasiswa.blade.php ENDPATH**/ ?>