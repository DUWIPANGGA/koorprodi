@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
<div class="card">
        <div class="card-header bg-light">
            <h5 class="mb-0">Update Semester Massal</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update.semester') }}" method="POST" class="d-flex gap-3">
                @csrf
                <button type="submit" name="action" value="increment" class="btn btn-primary">
                    <i class="fas fa-arrow-up mr-2"></i> Naikkan Semester
                </button>
                <button type="submit" name="action" value="decrement" class="btn btn-warning">
                    <i class="fas fa-arrow-down mr-2"></i> Turunkan Semester
                </button>
                {{-- <button type="submit" name="action" value="reset" class="btn btn-danger">
                    <i class="fas fa-undo mr-2"></i> Reset ke Semester 1
                </button> --}}
            </form>
        </div>
    </div>
    <div class="container my-1" style="max-width: 100%; background-color: #fff; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">

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
            <h2 class="text-center mb-3" style="font-weight: bold; font-size: 1.5rem; color: #555;">Data Mahasiswa Penerima KIPK</h2>
            <livewire:mahasiswa />
        </div>
    </div>
</div>
@endsection
