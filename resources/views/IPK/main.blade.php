@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('user.Rekap.store') }}" method="POST" enctype="multipart/form-data"
        style="max-width: 600px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
        @csrf
        <h4 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Form Pelaporan IPK Mahasiswa</h4>

        <div class="" style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
            <table class="" style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 5px; font-weight: bold;">NIM</td>
                    <td>:</td>
                    <td style="padding: 5px;">{{ Auth::user()->nim }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px; font-weight: bold;">Nama Mahasiswa</td>
                    <td>:</td>
                    <td style="padding: 5px;">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td style="padding: 5px; font-weight: bold;">Tahun Angkatan</td>
                    <td>:</td>
                    <td style="padding: 5px;">{{ Auth::user()->angkatan }}</td>
                </tr>
            </table>
        </div>

        @if (Auth::user()->pelaporan_ipk == 1)
            {{-- Jika sudah melaporkan --}}
            <div class="alert alert-success text-center" role="alert" style="margin-bottom: 20px;">
                Anda sudah melaporkan IPK semester ini.
            </div>
        @else
            {{-- Jika belum melaporkan --}}
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px;">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div style="margin-bottom: 20px;">
                <label for="semester" style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
                <select id="semester" name="semester" required disabled
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
                    @for ($i = 1; $i <= 8; $i++)
            <option value="{{ $i }}"
                    @if(old('semester', Auth::user()->semester) == $i) selected @endif>
                Semester {{ $i }}
            </option>
        @endfor
                </select>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="IPK" style="display: block; font-weight: bold; margin-bottom: 5px;">IPK:</label>
                <input type="number" id="IPK" name="IPK" value="{{ old('IPK') }}" step="0.01"
                    min="0" max="4" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="dokumen" style="display: block; font-weight: bold; margin-bottom: 5px;">KHS(PDF):</label>
                <input type="file" id="dokumen" name="dokumen" accept=".pdf" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">
            </div>

            <!-- Tambahkan input textarea untuk kesulitan -->
            <div style="margin-bottom: 20px;">
                <label for="kesulitan" style="display: block; font-weight: bold; margin-bottom: 5px;">Kesulitan:</label>
                <textarea id="kesulitan" name="kesulitan" rows="4" required
                    style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box;">{{ old('kesulitan') }}</textarea>
            </div>
            <div style="margin-bottom: 20px; font-size: 12px; color: #666;">* Anda hanya dapat mengisi form ini satu kali.
            </div>
            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
                Simpan Pelaporan
            </button>
        @endif
    </form>
@endsection
