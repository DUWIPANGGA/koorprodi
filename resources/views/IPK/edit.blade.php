@extends('layouts.dashboard')

@section('content')
    <div class="container h-100 justify-content-between" id="rekap-edit" style="gap: 40px;">
        <!-- Container untuk dokumen -->
        <div class="col-md-6 ipk-edit"
            style=" padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <div class="card h-100">
                <div class="card-body h-100">
                    <iframe src="{{ asset($rekap->dokumen) }}" style="height: 100%; width: 100%; border: none;"></iframe>
                </div>
            </div>
        </div>

        <!-- Form validasi -->
        <form action="{{ route('rekap.validasi', $rekap->id) }}" method="POST" enctype="multipart/form-data"
            style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);" class="ipk-edit">
            @csrf
            @if ($rekap->id)
                @method('PUT')
            @endif
            <h2 style="text-align: center; margin-bottom: 20px;">Validasi IPK</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p><strong>Nama:</strong> {{ $rekap->name }}</p>
            <p><strong>NIM:</strong> {{ $rekap->nim }}</p>
            <div style="margin-bottom: 20px;">
                <label for="semester" style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
                <select id="semester" name="semester" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                    @for ($i = 1; $i <= 8; $i++)
                        @if ($rekap->semester == $i)
        <option value="{{ $i }}" selected>Semester {{ $i }}</option>
    @else
        <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
    @endif
                    @endfor
                </select>
            </div>
            <p style="color: red; font-size: 12px;">Note: Klik validasi untuk memvalidasi kebenaran IPK</p>
            
            <p><strong>IPK:</strong> </p>
            <input type="number" name="IPK" value="{{ old('IPK', $rekap->IPK) }}" required min="0"
            max="4" step="0.01"
            style="width: 100%; height: 40px; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            
            <p><strong>kesulitan:</strong> {{ $rekap->kesulitan }}</p>
            <button type="submit"
                style="width: 100%; height: 40px; background-color: #4CAF50; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">{{ $rekap->id ? 'validasi' : 'Simpan' }}</button>
        </form>
    </div>
@endsection
