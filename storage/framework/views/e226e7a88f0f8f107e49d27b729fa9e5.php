<?php $__env->startSection('content'); ?>

    <h1>Daftar Rekap</h1>
    <a class="btn btn-success mb-3" href="<?php echo e(route('Rekap.create')); ?>">Tambah Rekap</a>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="container my-5">
        <h1>Daftar Rekap</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>IPK</th>
                    <th>status</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php if(isset($rekaps) && count($rekaps) > 0): ?>
                    <?php $__currentLoopData = $rekaps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($rekap->NIM); ?></td>
                            <td><?php echo e($rekap->name); ?></td>
                            <td><?php echo e($rekap->IPK); ?></td>
<td>
    <span class="<?php echo e($rekap->validated == 0 ? 'badge bg-danger' : 'badge bg-success'); ?>"><?php echo e($rekap->validated == 0 ? 'belum di validasi' : 'sudah di validasi'); ?></span>
</td>                            <td><?php echo e($rekap->semester); ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?php echo e(route('Rekap.edit', $rekap->id)); ?>">Cek</a>
                                <form action="<?php echo e(route('Rekap.destroy', $rekap->id)); ?>" method="post"
                                    style="display: inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">Tidak ada data rekap.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/ipk/index.blade.php ENDPATH**/ ?>