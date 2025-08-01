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

    <!-- Ubah bagian form input -->
<form action="{{ route('user-organisasi.store', $user->id) }}" method="POST" id="organisasiForm">
    @csrf
    <input type="hidden" name="semester" value="{{ $currentSemester }}">

    @foreach($organisasis as $organisasi)
    <div class="relative border border-gray-200 rounded-xl p-4 hover:border-gray-300 transition-colors duration-200">
        <div class="flex items-start">
            <div class="flex items-center h-5 mt-1">
                <input class="org-checkbox h-4 w-4 text-gray-700 border-gray-300 rounded focus:ring-gray-500"
                       type="checkbox"
                       name="organisasi_ids[]"
                       value="{{ $organisasi->id }}"
                       id="org_{{ $organisasi->id }}">
            </div>
            <div class="ml-3 flex-1">
                <label for="org_{{ $organisasi->id }}" class="block">
                    <!-- ... bagian lainnya ... -->
                    
                    <div class="mt-3 org-jabatan-field hidden">
                        <label for="jabatan_{{ $organisasi->id }}" class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" 
                               name="jabatan_{{ $organisasi->id }}" 
                               id="jabatan_{{ $organisasi->id }}" 
                               class="jabatan-input block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                               placeholder="Contoh: Ketua, Anggota, Bendahara">
                    </div>
                </label>
            </div>
        </div>
    </div>
    @endforeach
</form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Toggle jabatan field
    document.querySelectorAll('.org-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const jabatanField = this.closest('.relative').querySelector('.org-jabatan-field');
            if (this.checked) {
                jabatanField.classList.remove('hidden');
            } else {
                jabatanField.classList.add('hidden');
            }
        });
    });

    // Form submission handler
    document.getElementById('organisasiForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const selectedOrgs = [];
        const jabatanData = {};
        
        // Collect selected organisasi_ids
        document.querySelectorAll('.org-checkbox:checked').forEach(checkbox => {
            selectedOrgs.push(checkbox.value);
        });
        
        // Validate at least one selected
        if (selectedOrgs.length === 0) {
            alert('Pilih setidaknya satu organisasi');
            return;
        }
        
        // Collect and validate jabatan
        let isValid = true;
        selectedOrgs.forEach(orgId => {
            const jabatanInput = document.getElementById(`jabatan_${orgId}`);
            if (!jabatanInput.value.trim()) {
                isValid = false;
                jabatanInput.focus();
                alert(`Harap isi jabatan untuk organisasi ${orgId}`);
                return;
            }
            jabatanData[orgId] = jabatanInput.value;
        });
        
        if (!isValid) return;
        
        // Prepare final data
        formData.delete('organisasi_ids');
        formData.delete('jabatan');
        
        selectedOrgs.forEach(orgId => {
            formData.append('organisasi_ids[]', orgId);
            formData.append(`jabatan[${orgId}]`, jabatanData[orgId]);
        });
        
        // Submit form programmatically
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = data.redirect;
            } else if (data.errors) {
                // Handle server-side errors
                alert('Terjadi kesalahan: ' + Object.values(data.errors).join('\n'));
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

</script>
@endsection
