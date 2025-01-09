    @extends('layouts.dashboard')

    @section('content')
    <form action="{{ route('Rekap.store') }}" method="POST" enctype="multipart/form-data"
    style="max-width: 600px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
    @csrf
    <h4 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Form Pelaporan IPK Mahasiswa</h4>

    <div class="" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <table class="" style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 5px; font-weight: bold;">NIM</td>
                <td style="padding: 5px;">{{ Auth::user()->nim }}</td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Nama Mahasiswa</td>
                <td style="padding: 5px;">{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Tahun Angkatan</td>
                <td style="padding: 5px;">{{ Auth::user()->angkatan }}</td>
            </tr>
            <tr>
                <td style="padding: 5px; font-weight: bold;">Semester</td>
                <td style="padding: 5px;">{{ old('semester') ?? 1 }}</td>
            </tr>
        </table>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 20px;">
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            {{-- <div style="margin-bottom: 20px;">
                <label for="IPS" style="display: block; font-weight: bold; margin-bottom: 5px;">IPS:</label>
                <input type="number" id="IPS" name="IPS" value="{{ old('IPS') }}" step="0.01" min="0" max="4" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div> --}}
            
            <div style="margin-bottom: 20px;">
                <label for="IPK" style="display: block; font-weight: bold; margin-bottom: 5px;">IPK:</label>
                <input type="number" id="IPK" name="IPK" value="{{ old('IPK') }}" step="0.01" min="0" max="4" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>
            
            <div style="margin-bottom: 20px;">
                <label for="dokumen" style="display: block; font-weight: bold; margin-bottom: 5px;">Dokumen (PDF):</label>
                <input type="file" id="dokumen" name="dokumen" accept=".pdf" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>
            
            <div style="margin-bottom: 20px;">
        <label for="semester" style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
        <select id="semester" name="semester" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            @for ($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
            @endfor
        </select>
    </div>
            
            {{-- <div style="margin-bottom: 20px;">
                <label for="user_id" style="display: block; font-weight: bold; margin-bottom: 5px;">User ID:</label>
                <input type="number" id="user_id" name="user_id" value="{{ old('user_id') }}" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div> --}}
            
            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
                Simpan Pelaporan
            </button>
        </form>
    @endsection
