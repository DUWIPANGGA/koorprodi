@extends('layouts.dashboard')

@section('content')
    <h1>Tambah Rekap</h1>
    <form action="{{ route('Rekap.store') }}" method="POST" enctype="multipart/form-data"
        style="width: 50%; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        @csrf
        <label style="display: block; margin-bottom: 10px;">IPS:</label>
        <input type="number" name="IPS" value="{{ old('IPS') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">IPK:</label>
        <input type="number" name="IPK" value="{{ old('IPK') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">Dokumen:</label>
        <input type="file" name="dokumen" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">Semester:</label>
        <input type="number" name="semester" value="{{ old('semester') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="display: block; margin-bottom: 10px;">User ID:</label>
        <input type="number" name="user_id" value="{{ old('user_id') }}" required
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <button type="submit"
            style="width: 100%; height: 40px; background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Simpan</button>
    </form>
    <a href="{{ route('Rekap.index') }}" class="btn btn-primary">Kembali</a>
@endsection