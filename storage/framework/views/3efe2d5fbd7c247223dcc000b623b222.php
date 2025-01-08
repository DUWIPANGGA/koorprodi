<?php $__env->startSection('title', 'Import CSV'); ?>
<?php $__env->startSection('styles'); ?>
    <!-- Add any custom styles if needed -->
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Card for the form -->
    <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
    <div class="card-header" style="background-color: #007bff; color: white; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h5 class="card-title" style="font-weight: bold; font-size: 18px;">Upload Data User</h5>
    </div>
    <div class="card-body" style="padding: 20px;">
        <form action="<?php echo e(route('import.csv')); ?>" method="POST" enctype="multipart/form-data" class="form-group" style="display: flex; flex-direction: column; align-items: center;">
            <?php echo csrf_field(); ?>
            <div class="mb-3" style="width: 100%; margin-bottom: 20px;">
                <label for="csv_file" class="form-label" style="font-weight: bold; font-size: 16px;">Choose CSV File</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv" class="form-control-file" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: bold;">Upload</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!-- Add custom scripts here if necessary -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/admin/import.blade.php ENDPATH**/ ?>