<!-- Input Content -->


<?php $__env->startSection('title', 'Create a Post'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid h-100 ">
        <div class="row">
            

            <div class="col" style="overflow-x: auto; height:92vh;padding-bottom: 5rem;">
                <div class="container h-100 w-100" style=" height:100px;padding-bottom: 5rem;">
                    <h1>Create a Post</h1>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('article.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <input type="hidden" name="id" value="<?php echo e($article->id); ?>">
                        <div class="mb-3">
                            <label for="picture_article" class="form-label">Picture</label>
                            <input type="file" id="picture_article" name="picture_article" class="form-control" <?php if(!$article->picture_article): ?> required <?php endif; ?>>
                        </div>
                        <!-- Input Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control"
                                value="<?php echo e($article->judul); ?>" required>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Input Content -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <!-- Hidden input untuk menyimpan data -->
                            <input id="content" type="hidden" name="content" value="<?php echo e($article->content); ?>" required>
                            <!-- Trix Editor -->
                            <div class="more-stuff-inbetween"></div>
                            <trix-toolbar id="my_toolbar"></trix-toolbar>
                            <trix-editor toolbar="my_toolbar" input="content" class=""
                                style="height: 50vh" ></trix-editor>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/article/edit.blade.php ENDPATH**/ ?>