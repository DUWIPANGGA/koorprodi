<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-5" style="min-height: 100vh;">
        <!-- Kiri: Detail User -->
        <div class="col-md-6">
            <div class="card shadow" id="printableArea">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="mb-0">Detail User</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-center align-items-center">
                            <img src="<?php echo e($user->foto_profil ?? asset($user->foto_profil) | asset('LogoOrang.jpg')); ?>" alt="Logo"
                                 style="height: 150px; aspect-ratio:1/1; border-radius: 50%; object-fit:cover; border: #000 1px solid">
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">ID:</strong>
                            <span class="text-dark"><?php echo e($user->id); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">NIM:</strong>
                            <span class="text-dark"><?php echo e($user->nim); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Nama:</strong>
                            <span class="text-dark"><?php echo e($user->name); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Prodi:</strong>
                            <span class="text-dark"><?php echo e($user->prodi); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Alamat:</strong>
                            <span class="text-dark"><?php echo e($user->alamat); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Asal Sekolah:</strong>
                            <span class="text-dark"><?php echo e($user->asal_sekolah); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Hobi:</strong>
                            <span class="text-dark"><?php echo e($user->hobi); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Bakat:</strong>
                            <span class="text-dark"><?php echo e($user->bakat); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Kelas:</strong>
                            <span class="text-dark"><?php echo e($user->kelas); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Angkatan:</strong>
                            <span class="text-dark"><?php echo e($user->angkatan); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Gender:</strong>
                            <span class="text-dark"><?php echo e($user->gender); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Phone:</strong>
                            <span class="text-dark"><?php echo e($user->phone); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Phone Wali:</strong>
                            <span class="text-dark"><?php echo e($user->phone_wali); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Email:</strong>
                            <span class="text-dark"><?php echo e($user->email); ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong class="text-secondary">Role:</strong>
                            <span class="text-dark"><?php echo e($user->role); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <form id="statusForm" method="POST" action="<?php echo e(route('rekap.user', $user->id)); ?>">
                       <button class="btn btn-info" onclick="window.print()">Print</button>
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    
        <button type="submit" class="btn btn-danger w-48 send-status" data-status="0" name="status" value="0">Buka rekap</button>
        <button type="submit" class="btn btn-success w-48 send-status" data-status="1" name="status" value="1">Tutup rekap</button>
</form>
                </div>
            </div>
        </div>

        <!-- Kanan: Riwayat IPK -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $__currentLoopData = $user->rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-3">
                            <div class="card-header bg-success text-white text-center py-2">
                                <h5 class="mb-0">Semester <?php echo e($rekap->semester); ?></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong class="text-secondary">IPK:</strong>
                                        <span class="text-dark"><?php echo e($rekap->IPK); ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong class="text-secondary">Dokumen:</strong>
                                        <span class="text-dark">
                                            <a href="<?php echo e(asset($rekap->dokumen)); ?>" target="_blank" class="btn btn-sm text-white" style="background-color: #007bff;">Lihat Dokumen</a>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong class="text-secondary">Keterangan:</strong>
                                        <span class="badge <?php echo e($rekap->validated == 1 ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($rekap->validated == 1 ? 'Divalidasi' : 'Belum divalidasi'); ?>

                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printableArea,
            #printableArea * {
                visibility: visible;
            }

            .card-footer button {
                display: none;
            }

            #printableArea {
                position: absolute;
                top: 0;
                width: 100vw;
                height: 100vh;
                left: 0;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/users/show.blade.php ENDPATH**/ ?>