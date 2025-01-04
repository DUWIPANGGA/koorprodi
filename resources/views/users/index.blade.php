@extends('layouts.dashboard')

@section('content')

    <h1>Daftar Users</h1>
    <a class="btn btn-success mb-3" href="{{ route('users.create') }}">Tambah User</a>
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
    
<div class="container my-5">
    <h1>Daftar Pengguna</h1>

    <livewire:user-table />
</div>
@endsection
