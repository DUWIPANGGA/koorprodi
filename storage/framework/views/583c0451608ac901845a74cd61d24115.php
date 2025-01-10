    

    <?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('Rekap.store')); ?>" method="POST" enctype="multipart/form-data"
    style="max-width: 600px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
    <?php echo csrf_field(); ?>
    <h4 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Form Pelaporan IPK Mahasiswa</h4>

    <div class="" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <table class="" style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 5px; font-weight: bold;">NIM</td>
                <td>:</td>
                <td style="padding: 5px;"><?php echo e(Auth::user()->nim); ?></td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Nama Mahasiswa</td>
                <td>:</td>
                <td style="padding: 5px;"><?php echo e(Auth::user()->name); ?></td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Tahun Angkatan</td>
                <td>:</td>
                <td style="padding: 5px;"><?php echo e(Auth::user()->angkatan); ?></td>
            </tr>
        </table>
    </div>

    <?php if(Auth::user()->pelaporan_ipk == 1): ?>
        
        <div class="alert alert-success text-center" role="alert" style="margin-bottom: 20px;">
            Anda sudah melaporkan IPK semester ini.
        </div>
    <?php else: ?>
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger" style="margin-bottom: 20px;">
                <ul class="list-unstyled mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 20px;">
            <label for="IPK" style="display: block; font-weight: bold; margin-bottom: 5px;">IPK:</label>
            <input type="number" id="IPK" name="IPK" value="<?php echo e(old('IPK')); ?>" step="0.01" min="0" max="4" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="dokumen" style="display: block; font-weight: bold; margin-bottom: 5px;">Dokumen (PDF):</label>
            <input type="file" id="dokumen" name="dokumen" accept=".pdf" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="semester" style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
            <select id="semester" name="semester" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                <?php for($i = 1; $i <= 8; $i++): ?>
                    <option value="<?php echo e($i); ?>" <?php echo e(old('semester') == $i ? 'selected' : ''); ?>>Semester <?php echo e($i); ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit"
            style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
            Simpan Pelaporan
        </button>
    <?php endif; ?>
</form>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/ipk/main.blade.php ENDPATH**/ ?>