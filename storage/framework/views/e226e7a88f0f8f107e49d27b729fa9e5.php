<?php $__env->startSection('content'); ?>

    <!-- Header and Action Button -->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-4">Daftar Rekap</h1>
                
                <a class="btn btn-success mb-3" href="<?php echo e(route('Rekap.create')); ?>">Tambah Rekap</a>
                </div>
                <!-- Success and Error Messages -->
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

                <!-- Rekap Table -->
                <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('ipk', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-4023065407-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/ipk/index.blade.php ENDPATH**/ ?>