<?php $__env->startSection('title', 'Edit Pengaduan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container bg-white p-4 border-radius">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="<?php echo e(route('pengaduan.update', $pengaduan->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <h2>Pengaduan</h2>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label text-muted">Nama</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="nama"><?php echo e($user->name); ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nim" class="col-sm-2 col-form-label text-muted">NIM</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="nim"><?php echo e($user->nim); ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-sm-2 col-form-label text-muted">Semester</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="semester"><?php echo e($user->semester); ?></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="angkatan" class="col-sm-2 col-form-label text-muted">Angkatan</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="angkatan"><?php echo e($user->angkatan); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
    <label for="cerita">Cerita:</label>
    <textarea name="cerita" class="form-control" readonly style="width: 100%; height: 200px;"><?php echo e(old('cerita', $pengaduan->cerita)); ?></textarea>
</div>
                    <div class="form-group">
                        <label for="validasi">Validasi</label>
                        <select name="validasi" class="form-control" required>
                            <option value="1" <?php echo e($pengaduan->validasi ? 'selected' : ''); ?>>Validasi</option>
                            <option value="0" <?php echo e(!$pengaduan->validasi ? 'selected' : ''); ?>>Belum Validasi</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/pengaduan/edit.blade.php ENDPATH**/ ?>