<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="card mb-4">
    <div class="card-header bg-light">
        <h5 class="mb-0">Filter Rekap</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('admin.rekap.ipk')); ?>" class="row g-3">
            <div class="col-md-4">
                <label for="prodi" class="form-label">Program Studi</label>
                <select class="form-select" id="prodi" name="prodi">
                    <option value="all">Semua Prodi</option>
                    <?php $__currentLoopData = $prodies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($prodi); ?>" <?php echo e(request('prodi') == $prodi ? 'selected' : ''); ?>>
                            <?php echo e($prodi); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="angkatan" class="form-label">Angkatan</label>
                <select class="form-select" id="angkatan" name="angkatan">
                    <option value="all">Semua Angkatan</option>
                    <?php $__currentLoopData = $angkatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $angkatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($angkatan); ?>" <?php echo e(request('angkatan') == $angkatan ? 'selected' : ''); ?>>
                            <?php echo e($angkatan); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-filter"></i> Filter
                </button>
                <a href="<?php echo e(route('admin.rekap.ipk')); ?>" class="btn btn-secondary">
                    <i class="fas fa-sync-alt"></i> Reset
                </a>
            </div>
        </form>
    </div>
</div>
<div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Update Semester Massal</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.update.semester')); ?>" method="POST" class="d-flex gap-3">
                <?php echo csrf_field(); ?>
                <button type="submit" name="action" value="increment" class="btn btn-primary">
                    <i class="fas fa-arrow-up mr-2"></i> Naikkan Semester
                </button>
                <button type="submit" name="action" value="decrement" class="btn btn-warning">
                    <i class="fas fa-arrow-down mr-2"></i> Turunkan Semester
                </button>
                
            </form>
        </div>
    </div>
    <div class="container my-1" style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

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
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Data Mahasiswa Penerima KIPK</h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('mahasiswa', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3556360189-0', $__slots ?? [], get_defined_vars());

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>