@extends('layouts.dashboard')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $acara->nama_acara }}</h1>
                    <div class="flex items-center mt-2 text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ $acara->getFormattedDate() }}</span>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full text-sm font-medium" 
                      style="background-color: {{ $acara->getColor() }}; color: white;">
                    {{ $acara->start ? 'Akan Datang' : 'Selesai' }}
                </span>
            </div>
            
            <div class="mt-6">
                <div class="flex items-start mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-medium text-gray-700">Lokasi</h3>
                        <p class="text-gray-600">{{ $acara->lokasi ?? '-' }}</p>
                    </div>
                </div>
                
                <div class="flex items-start mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-medium text-gray-700">Durasi</h3>
                        <p class="text-gray-600">{{ $acara->lama_acara }} jam</p>
                    </div>
                </div>
                
                @if($acara->deskripsi)
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="font-medium text-gray-700">Deskripsi</h3>
                        <p class="text-gray-600 whitespace-pre-line">{{ $acara->deskripsi }}</p>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="mt-8 pt-4 border-t border-gray-200 flex justify-end space-x-2">
                <a href="{{ route('acara.edit', $acara->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Edit
                </a>
                <form action="{{ route('acara.destroy', $acara->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md" 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus acara ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection