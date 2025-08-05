@if (Auth::user()->nim === null || Auth::user()->nim === '' || empty(Auth::user()->prodi) || empty(Auth::user()->angkatan)|| !preg_match('/^62\d{9,13}$/', Auth::user()->phone) || !preg_match('/^62\d{9,13}$/', Auth::user()->phone_wali) || empty(Auth::user()->foto_profil || strpos(Auth::user()->email, '@formadiksi.com') === true))
<!-- Tambahkan ini untuk backdrop -->
<div class="modal-backdrop fade show" id="modalBackdrop" style="position: fixed; top: 0; left: 0; z-index: 1040; width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.5);"></div>

<!-- Modal for Incomplete Data -->
<div class="modal fade show d-block" id="incompleteDataModal" tabindex="-1" aria-labelledby="incompleteDataModalLabel" aria-modal="true" role="dialog" style="z-index: 1050;">
    <div class="modal-dialog modal-dialog-centered max-w-md mx-auto p-4">
        <div class="modal-content bg-white rounded-lg shadow-xl">
            <!-- Modal Header -->
            <div class="modal-header border-b-0 p-6 pb-0">
                <div class="flex items-center justify-between w-full">
                    <h5 class="modal-title text-xl font-bold text-gray-800" id="incompleteDataModalLabel">
                        Data Belum Lengkap
                    </h5>
                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="hideModal()" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body p-6">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Perhatian!</h3>
                        <div class="text-sm text-gray-600">
                            <p class="mb-2">Anda belum melengkapi data profil Anda. Untuk dapat mengakses semua fitur, silakan lengkapi data berikut:</p>
                            <ul class="list-disc pl-5 space-y-1">
                                
                                @if(Auth::user()->nim === null || Auth::user()->nim === '')
    <li>Nomor Induk Mahasiswa (NIM)</li>
    @endif

    @if(empty(Auth::user()->prodi))
    <li>Program Studi</li>
    @endif

    @if(empty(Auth::user()->angkatan))
    <li>Tahun Angkatan</li>
    @endif

    @if(!preg_match('/^62\d{9,13}$/', Auth::user()->phone))
    <li>Nomor Telepon (format: 62xxxxxxxxxxx, tanpa spasi/tanda baca)</li>
    @endif

    @if(!preg_match('/^62\d{9,13}$/', Auth::user()->phone_wali))
    <li>Nomor Telepon Wali (format: 62xxxxxxxxxxx, tanpa spasi/tanda baca)</li>
    @endif

    @if(empty(Auth::user()->foto_profil))
    <li>Foto Profil dengan pas foto</li>
    @endif

    @if(strpos(Auth::user()->email, '@formadiksi.com') === true)
    <li>Email harus menggunakan email aktif</li>
    @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer border-t-0 p-6 pt-0 flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors" onclick="hideModal()">
                    Nanti Saja
                </button>
                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors" onclick="hideModal()">
                    Lengkapi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function hideModal() {
        document.getElementById('incompleteDataModal').classList.remove('show');
        document.getElementById('incompleteDataModal').classList.add('hide');
        document.getElementById('modalBackdrop').classList.remove('show');
        document.getElementById('modalBackdrop').classList.add('hide');
        
        // Pulihkan scroll ke halaman
        document.body.style.overflow = 'auto';
        document.body.classList.remove('modal-open');
setTimeout(function() {
        document.getElementById('modalBackdrop').classList.add('d-none');
        document.getElementById('incompleteDataModal').classList.add('d-none');
    }, 300);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Nonaktifkan scroll saat modal aktif
        document.body.style.overflow = 'hidden';
        document.body.classList.add('modal-open');
    });
</script>

<style>
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: none;
    }

    .modal.show {
        display: block;
    }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-dialog {
        position: relative;
        z-index: 1050;
        margin: 1.75rem auto;
    }

    /* Tambahan jika modal-open class digunakan */
    body.modal-open {
        overflow: hidden;
    }
</style>
@endif
