<?php $__env->startSection('content'); ?>
<div class="min-h-screen p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">User Profile</h1>
            <p class="text-gray-600 mt-2">Detailed information about <?php echo e($user->name); ?></p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- User Profile Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col items-center mb-6">
                        <div class="relative mb-4">
                            <img src="<?php echo e($user->foto_profil ?? asset('LogoOrang.jpg')); ?>" 
                                 alt="Profile picture"
                                 class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">
                            <div class="absolute -bottom-2 -right-2 bg-blue-500 rounded-full p-2 shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800"><?php echo e($user->name); ?></h2>
                        <p class="text-gray-500"><?php echo e($user->prodi); ?></p>
                    </div>

                    <div class="space-y-4">
                        <!-- Personal Info Section -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Personal Information</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-xs text-gray-500">NIM</p>
                                    <p class="font-medium"><?php echo e($user->nim); ?></p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Class</p>
                                    <p class="font-medium"><?php echo e($user->kelas); ?></p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Year</p>
                                    <p class="font-medium"><?php echo e($user->angkatan); ?></p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Gender</p>
                                    <p class="font-medium"><?php echo e($user->gender); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info Section -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Contact</h3>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                    </svg>
                                    <span><?php echo e($user->email); ?></span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                    </svg>
                                    <span><?php echo e($user->phone); ?></span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                    </svg>
                                    <span><?php echo e($user->alamat); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- Background Section -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Background</h3>
                            <div class="space-y-2">
                                <div>
                                    <p class="text-xs text-gray-500">Previous School</p>
                                    <p class="font-medium"><?php echo e($user->asal_sekolah); ?></p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500">Hobbies</p>
                                        <p class="font-medium"><?php echo e($user->hobi); ?></p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Talents</p>
                                        <p class="font-medium"><?php echo e($user->bakat); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-200">
                    <span class="text-sm text-gray-500">
                        Member since <?php echo e($user->created_at->format('M Y')); ?>

                    </span>
                    <div class="flex space-x-3">
                        <button onclick="window.print()" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Print
                        </button>
                        <form id="statusForm" method="POST" action="<?php echo e(route('rekap.user', $user->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" name="status" value="0" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Open Recap
                            </button>
                            <button type="submit" name="status" value="1" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Close Recap
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Academic Records -->
            <div>
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Academic Records</h3>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $user->rekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium text-gray-900">Semester <?php echo e($rekap->semester); ?></h4>
                                    <div class="mt-2 flex items-center">
                                        <span class="text-2xl font-bold text-gray-900 mr-2"><?php echo e($rekap->IPK); ?></span>
                                        <span class="px-2 py-1 text-xs rounded-full 
                                            <?php echo e($rekap->IPK >= 3.5 ? 'bg-green-100 text-green-800' : 
                                               ($rekap->IPK >= 3.0 ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800')); ?>">
                                            <?php echo e($rekap->IPK >= 3.5 ? 'Excellent' : 
                                               ($rekap->IPK >= 3.0 ? 'Good' : 'Average')); ?>

                                        </span>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <a href="<?php echo e(asset($rekap->dokumen)); ?>" target="_blank" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        View
                                    </a>
                                    <span class="inline-flex items-center px-3 py-1 rounded-md text-sm font-medium 
                                        <?php echo e($rekap->validated == 1 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                                        <?php echo e($rekap->validated == 1 ? 'Verified' : 'Pending'); ?>

                                    </span>
                                </div>
                            </div>
                            <?php if($rekap->catatan): ?>
                            <div class="mt-4 p-3 bg-blue-50 rounded-md">
                                <p class="text-sm text-blue-700"><?php echo e($rekap->catatan); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="p-6 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No academic records</h3>
                            <p class="mt-1 text-sm text-gray-500">This student hasn't submitted any records yet.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
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
        #printableArea {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: white;
        }
        .no-print {
            display: none !important;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\UKM\formadiksi\koorprodi-web\koorprodi\resources\views/users/show.blade.php ENDPATH**/ ?>