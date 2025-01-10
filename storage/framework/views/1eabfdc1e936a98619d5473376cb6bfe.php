<?php $__env->startSection('title', 'Rumah Aspirasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex py-16" name="div kosong">
            
</div>
<div class="flex-wrap relative font-poppins px-24 py-4">
    <h1 class="flex text-3xl font-semibold py-4">
        Rumah Aspirasi
    </h1>

    <?php if(session('status')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <p class="flex text-justify pb-4">
        Punya pendapat atau saran? sampaikan saja lewat form dibawah ini!
    </p>

    <div class="flex row-3 shadow-md rounded-md p-4 bg-white" data-aos="fade-up" data-aos-duration="1100">
        <form method="POST" action="<?php echo e(route('rumahaspirasi.kirim')); ?>" class="w-full">
            <?php echo csrf_field(); ?>
            <div class="mb-4">
                <p class="flex text-xl font-semibold py-2">Nama</p>
                <input type="text" name="nama" id="nama" placeholder="Nama kamu" 
                    class="w-full p-2 border rounded-md <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <p class="flex text-xl font-semibold py-2">Aspirasi</p>
                <textarea name="isi" id="isi" placeholder="Masukan aspirasi kamu" rows="4"
                    class="w-full p-2 border rounded-md <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                <?php $__errorArgs = ['isi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex py-4">
                <button type="submit" class="rounded-full px-6 py-2 font-semibold bg-yellow-400 text-white hover:bg-yellow-500">
                    Kirim!
                </button>
            </div>
        </form>
    </div>
</div>
<div class="flex py-16" name="div kosong">
            
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/rumahaspirasi.blade.php ENDPATH**/ ?>