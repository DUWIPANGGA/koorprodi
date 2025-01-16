<?php $__env->startSection('content'); ?>

    <div class="container my-5" style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

        <div class="text-end mb-3">
            <a class="btn btn-success" href="<?php echo e(route('users.create')); ?>">Tambah User</a>
        </div>

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

        <div class="container my-4" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Daftar Pengguna</h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('user-table', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1197552448-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/users/index.blade.php ENDPATH**/ ?>