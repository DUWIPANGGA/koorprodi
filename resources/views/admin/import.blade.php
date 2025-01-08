@extends('layouts.dashboard')

@section('title', 'Import CSV')
@section('styles')
    <!-- Add any custom styles if needed -->
    <style>
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card for the form -->
    <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
    <div class="card-header" style="background-color: #007bff; color: white; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
        <h5 class="card-title" style="font-weight: bold; font-size: 18px;">Upload Data User</h5>
    </div>
    <div class="card-body" style="padding: 20px;">
        <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data" class="form-group" style="display: flex; flex-direction: column; align-items: center;">
            @csrf
            <div class="mb-3" style="width: 100%; margin-bottom: 20px;">
                <label for="csv_file" class="form-label" style="font-weight: bold; font-size: 16px;">Choose CSV File</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv" class="form-control-file" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: bold;">Upload</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Add custom scripts here if necessary -->
@endsection
