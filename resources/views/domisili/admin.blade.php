@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Admin - Daftar Pengajuan Domisili</h6>
        </div>
        <div class="card-body">
            <livewire:admin-domisili-table />
        </div>
    </div>
</div>
@endsection