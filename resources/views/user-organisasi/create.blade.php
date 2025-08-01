@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-700">Terdapat {{ $errors->count() }} kesalahan dalam pengisian form:</h3>
                    <div class="mt-2 text-sm text-red-600">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8 border border-gray-300">
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Rekap Keaktifan Organisasi</h1>
            <p class="text-base text-gray-600">Pilih organisasi untuk <span class="font-semibold text-gray-900">{{ $user->name }}</span> pada Semester {{ $currentSemester }}</p>
            <div class="mt-4 flex justify-center">
                <div class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full shadow-sm">
                    <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm text-gray-700">Pilih organisasi yang anda ikuti dengan sebenar benarnya</span>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('user-organisasi.store', $user->id) }}" method="POST" class="bg-white rounded-xl shadow-md p-6 border border-gray-200">
        @csrf
        <input type="hidden" name="semester" value="{{ $currentSemester }}">

        <div class="mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Organisasi</h3>
            <p class="text-gray-600 mb-6">Pilih satu atau lebih organisasi yang anda ikuti pada semester ini dan isi jabatan anda.</p>

            <div class="grid grid-cols-1 gap-6">
                @foreach($organisasis as $organisasi)
                <div class="relative border border-gray-200 rounded-xl p-4 hover:border-gray-300 transition-colors duration-200">
                    <div class="flex items-start">
                        <div class="flex items-center h-5 mt-1">
                            <input class="h-4 w-4 text-gray-700 border-gray-300 rounded focus:ring-gray-500"
                                   type="checkbox"
                                   name="organisasi_ids[]"
                                   value="{{ $organisasi->id }}"
                                   id="org_{{ $organisasi->id }}">
                        </div>
                        <div class="ml-3 flex-1">
                            <label for="org_{{ $organisasi->id }}" class="block">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $organisasi->nama_organisasi }}</h4>
                                        <p class="text-sm text-gray-500 mt-1">Klik untuk memilih</p>
                                    </div>
                                </div>
                                
                                <div class="mt-3 org-jabatan-field hidden">
                                    <label for="jabatan_{{ $organisasi->id }}" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                    <input type="text" 
                                           name="jabatan[{{ $organisasi->id }}]" 
                                           id="jabatan_{{ $organisasi->id }}" 
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                           placeholder="Contoh: Ketua, Anggota, Bendahara"
                                           required>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('users.show', $user->id) }}" class="px-6 py-2 border border-gray-400 rounded-lg text-gray-700 font-medium text-center hover:bg-gray-100 transition-colors shadow-sm">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batalkan
                </span>
            </a>
            <button type="submit" class="px-6 py-2 bg-gray-700 hover:bg-gray-800 rounded-lg text-white font-medium shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-1">
                <span class="flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Pilihan
                </span>
            </button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"][name="organisasi_ids[]"]');
        
        checkboxes.forEach(checkbox => {
            // Initialize fields based on current state
            const orgId = checkbox.value;
            const jabatanField = checkbox.closest('.relative').querySelector('.org-jabatan-field');
            const jabatanInput = jabatanField.querySelector('input');
            
            if (checkbox.checked) {
                jabatanField.classList.remove('hidden');
                jabatanInput.required = true;
            } else {
                jabatanField.classList.add('hidden');
                jabatanInput.required = false;
            }

            // Add change event listener
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    jabatanField.classList.remove('hidden');
                    jabatanInput.required = true;
                } else {
                    jabatanField.classList.add('hidden');
                    jabatanInput.required = false;
                    jabatanInput.value = '';
                }
            });
        });

        // Form validation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const checkedBoxes = document.querySelectorAll('input[type="checkbox"][name="organisasi_ids[]"]:checked');
            if (checkedBoxes.length === 0) {
                e.preventDefault();
                alert('Anda harus memilih setidaknya satu organisasi');
                return false;
            }
            
            let allValid = true;
            checkedBoxes.forEach(checkbox => {
                const orgId = checkbox.value;
                const jabatanInput = document.querySelector(`input[name="jabatan[${orgId}]"]`);
                if (!jabatanInput.value.trim()) {
                    allValid = false;
                    const jabatanField = checkbox.closest('.relative').querySelector('.org-jabatan-field');
                    jabatanField.classList.remove('hidden');
                    jabatanInput.focus();
                }
            });
            
            if (!allValid) {
                e.preventDefault();
                alert('Harap isi jabatan untuk semua organisasi yang dipilih');
                return false;
            }
        });
    });
</script>
@endsection