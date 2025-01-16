@extends('layouts.dashboard')

@section('content')

    <!-- Header and Action Button -->
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="mb-4">Daftar Rekap</h1>
                
                <a class="btn btn-success mb-3" href="{{ route('Rekap.create') }}">Tambah Rekap</a>
                </div>
                <!-- Success and Error Messages -->
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Rekap Table -->
                <div class="card p-4" style="border-radius: 10px; background-color: #fff;">
                    <livewire:ipk />
                </div>
            </div>
        </div>
    </div>

@endsection
@section('style')
<style>
    @media print {
    body * {
        visibility: hidden; /* Menyembunyikan semua elemen */
    }

    #print-layout, #print-layout * {
        visibility: visible; /* Menampilkan hanya elemen dengan ID print-layout */
    }

    /* Memastikan elemen print-layout tidak terpotong pada halaman berikutnya */
    #print-layout {
        page-break-before: always;
    }

    /* Aturan lain untuk memperbaiki layout pencetakan */
    .page {
        page-break-after: always;
    }
}
</style>
@endsection