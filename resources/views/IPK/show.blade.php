@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card shadow" id="printableArea">
            <div class="card-header bg-primary text-white text-center">
                <h3 class="mb-0">Detail User</h3>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">ID:</strong>
                        <span class="text-dark">{{ $user->id }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">NIM:</strong>
                        <span class="text-dark">{{ $user->nim }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Nama:</strong>
                        <span class="text-dark">{{ $user->name }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Prodi:</strong>
                        <span class="text-dark">{{ $user->prodi }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Alamat:</strong>
                        <span class="text-dark">{{ $user->alamat }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Asal Sekolah:</strong>
                        <span class="text-dark">{{ $user->asal_sekolah }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Hobi:</strong>
                        <span class="text-dark">{{ $user->hobi }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Bakat:</strong>
                        <span class="text-dark">{{ $user->bakat }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Kelas:</strong>
                        <span class="text-dark">{{ $user->kelas }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Angkatan:</strong>
                        <span class="text-dark">{{ $user->angkatan }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Gender:</strong>
                        <span class="text-dark">{{ $user->gender }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Phone:</strong>
                        <span class="text-dark">{{ $user->phone }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Phone Wali:</strong>
                        <span class="text-dark">{{ $user->phone_wali }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Email:</strong>
                        <span class="text-dark">{{ $user->email }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong class="text-secondary">Role:</strong>
                        <span class="text-dark">{{ $user->role }}</span>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
                <button class="btn btn-info" onclick="window.print()">Print</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #printableArea, #printableArea * {
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
@endsection
