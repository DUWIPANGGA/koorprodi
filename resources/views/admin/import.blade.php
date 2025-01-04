@extends('layouts.dashboard')

@section('title', 'import')
@section('styles')

@endsection
@section('content')
  
    <h1>Upload File CSV</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" accept=".csv">
        <button type="submit">Upload</button>
    </form>

@endsection

@section('scripts')
    
@endsection
