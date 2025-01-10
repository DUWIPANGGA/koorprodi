<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-5" style="min-height: 100vh;">
        <!-- Kiri: Detail User -->
        <div class="col-md-6">
            <div class="card shadow" id="printableArea">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Detail User</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            style="text-align: center;">
                            <img src="<?php echo e($user->foto_profil ?? asset($user->foto_profil) | asset('LogoOrang.jpg')); ?>"
                                alt="Logo"
                                style=" height: 100px;aspect-ratio:1/1; border-radius: 50%; object-fit:cover; border: #000 1px solid">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">ID:</strong>
                            <span class="text-dark"><?php echo e($user->id); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">NIM:</strong>
                            <span class="text-dark"><?php echo e($user->nim); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Nama:</strong>
                            <span class="text-dark"><?php echo e($user->name); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Prodi:</strong>
                            <span class="text-dark"><?php echo e($user->prodi); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Alamat:</strong>
                            <span class="text-dark"><?php echo e($user->alamat); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Asal Sekolah:</strong>
                            <span class="text-dark"><?php echo e($user->asal_sekolah); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Hobi:</strong>
                            <span class="text-dark"><?php echo e($user->hobi); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Bakat:</strong>
                            <span class="text-dark"><?php echo e($user->bakat); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Kelas:</strong>
                            <span class="text-dark"><?php echo e($user->kelas); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Angkatan:</strong>
                            <span class="text-dark"><?php echo e($user->angkatan); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Gender:</strong>
                            <span class="text-dark"><?php echo e($user->gender); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Phone:</strong>
                            <span class="text-dark"><?php echo e($user->phone); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Phone Wali:</strong>
                            <span class="text-dark"><?php echo e($user->phone_wali); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Email:</strong>
                            <span class="text-dark"><?php echo e($user->email); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong class="text-secondary">Role:</strong>
                            <span class="text-dark"><?php echo e($user->role); ?></span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-info" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>

        <!-- Kanan: Riwayat IPK -->
        <div class="col-md-6">
            <div class="card shadow">
                
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $user->rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card shadow">
                                <div class="card-header bg-success text-white text-center">
                                    <h3 class="mb-0">Semester <?php echo e($rekap->semester); ?></h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="text-secondary">IPK:</strong>
                                            <span class="text-dark"><?php echo e($rekap->IPK); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="text-secondary">Dokumen:</strong>
                                            <span class="text-dark">
                                                <a href="<?php echo e(asset( $rekap->dokumen)); ?>" target="_blank"
                                                    class="btn btn-info btn-sm">Lihat Dokumen</a>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong class="text-secondary">Keterangan:</strong>
                                            <span class="text-white <?php echo e($rekap->validated == 1 ? 'bg-success' : 'bg-error'); ?> p-1 rounded"><?php echo e($rekap->validated == 1 ? 'Divalidasi' : 'Belum divalidasi'); ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                    </ul>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
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

            /* Sembunyikan tombol Back dan Print saat mencetak */
            .card-footer button {
                display: none;
            }

            /* Mengatur agar hanya card yang tercetak */
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