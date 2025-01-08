<?php $__env->startSection('content'); ?>

    <h1>Daftar Users</h1>
    <a class="btn btn-success mb-3" href="<?php echo e(route('users.create')); ?>">Tambah User</a>
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
    <h1>Daftar Pengguna</h1>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/users/index.blade.php ENDPATH**/ ?>