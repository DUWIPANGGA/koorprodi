@extends('layouts.dashboard')

@section('content')
<style>
    .report-container {
        max-width: 700px;
        margin: 2rem auto;
    }
    
    .report-card {
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: none;
        padding: 2rem;
    }
    
    .report-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .report-header h4 {
        font-weight: 600;
        color: #4f46e5;
        margin-bottom: 1.5rem;
    }
    
    .info-card {
        background-color: #f9fafb;
        border-radius: 10px;
        border-left: 4px solid #4f46e5;
        margin-bottom: 2rem;
        padding: 1.5rem;
    }
    
    .info-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .info-table td {
        padding: 0.75rem;
        vertical-align: middle;
    }
    
    .info-table tr:not(:last-child) td {
        border-bottom: 1px solid #e5e7eb;
    }
    
    .info-label {
        color: #4f46e5;
        font-weight: 500;
        width: 40%;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }
    
    .form-control, .form-select {
        width: 100%;
        padding: 0.875rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        transition: all 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #a5b4fc;
        box-shadow: 0 0 0 3px rgba(165, 180, 252, 0.3);
        outline: none;
    }
    
    textarea.form-control {
        min-height: 120px;
    }
    
    .btn-submit {
        width: 100%;
        padding: 1rem;
        background-color: #4f46e5;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .btn-submit:hover {
        background-color: #4338ca;
        transform: translateY(-1px);
    }
    
    .alert {
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }
    
    .note-text {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 1.5rem;
    }
</style>

<div class="report-container">
    <div class="report-card">
        <div class="report-header">
            <h4>Form Pelaporan IPK Mahasiswa</h4>
        </div>

        <!-- Student Info Card -->
        <div class="info-card">
            <table class="info-table">
                <tr>
                    <td class="info-label">NIM</td>
                    <td width="5%">:</td>
                    <td>{{ Auth::user()->nim }}</td>
                </tr>
                <tr>
                    <td class="info-label">Nama Mahasiswa</td>
                    <td>:</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td class="info-label">Tahun Angkatan</td>
                    <td>:</td>
                    <td>{{ Auth::user()->angkatan }}</td>
                </tr>
            </table>
        </div>

        @if (Auth::user()->pelaporan_ipk == 1)
            <!-- Already Reported -->
            <div class="alert alert-success text-center" role="alert">
                Anda sudah melaporkan IPK semester ini.
            </div>
        @else
            <!-- Report Form -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.Rekap.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="semester" class="form-label">Semester:</label>
                    <select id="semester" name="semester" class="form-select" required disabled>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" @if(old('semester', Auth::user()->semester) == $i) selected @endif>
                                Semester {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label for="IPK" class="form-label">IPK:</label>
                    <input type="number" id="IPK" name="IPK" class="form-control" 
                        value="{{ old('IPK') }}" step="0.01" min="0" max="4" required>
                </div>

                <div class="form-group">
                    <label for="dokumen" class="form-label">KHS (PDF):</label>
                    <input type="file" id="dokumen" name="dokumen" class="form-control" 
                        accept=".pdf" required>
                </div>

                <div class="form-group">
                    <label for="kesulitan" class="form-label">Kesulitan:</label>
                    <textarea id="kesulitan" name="kesulitan" class="form-control" required>{{ old('kesulitan') }}</textarea>
                </div>

                <p class="note-text">* Anda hanya dapat mengisi form ini satu kali.</p>

                <button type="submit" class="btn-submit">
                    Simpan Pelaporan
                </button>
            </form>
        @endif
    </div>
</div>
@endsection