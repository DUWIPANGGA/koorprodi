<!-- Input Content -->


<?php $__env->startSection('title', 'Create a Post'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid h-100 ">
        <div class="row">
            

            <div class="col" style="overflow-x: auto; height:92vh;padding-bottom: 5rem;">
                <div class="container h-100 w-100" style=" height:100px;padding-bottom: 5rem;">
                        <h1>List of Articles</h1>
                    
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                    
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Picture</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($article->judul); ?></td>
                                        <td><?php echo e(Str::limit(strip_tags($article->content, 50))); ?></td>
                                        <td>
                                            <?php if($article->picture_article): ?>
                                                <img src="<?php echo e(asset('storage/' . $article->picture_article)); ?>" alt="Picture" style="width: 100px;">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('article.update', $article->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="<?php echo e(route('article.destroy', $article->id)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No articles found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\MyBook Hype AMD\Documents\Forma\koorprodi\resources\views/article/index.blade.php ENDPATH**/ ?>