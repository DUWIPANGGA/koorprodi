@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    
    <div class="container my-2"
        style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

        <div class="text-end mb-3">
            <a class="btn btn-success" href="{{ route('users.create') }}">Tambah User</a>
        </div>

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

        <div class="container my-4" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Daftar Pengguna</h2>
            <livewire:user-table />
        </div>
    </div>
</div>
<!-- In your layout file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
