@extends('layouts.dashboard')

@section('content')
@php
    $pendingRekap = $ipks->where('validated', 0)->first();
    $approvedRekap = $ipks->where('validated', 1)->first();
@endphp

<form action="{{ $pendingRekap ? route('user.Rekap.update', $pendingRekap->id) : route('user.Rekap.store') }}" method="POST" enctype="multipart/form-data"
    style="max-width: 600px; margin: 40px auto; padding: 30px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
    @csrf
    @if($pendingRekap)
        @method('PUT')
    @endif

    <h4 style="text-align: center; font-weight: bold; margin-bottom: 20px;">Form Pelaporan IPK Mahasiswa</h4>

    @if(session('success'))
    <div class="alert alert-success text-center" style="margin-bottom: 20px;">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger text-center" style="margin-bottom: 20px;">{{ session('error') }}</div>
    @endif

    <div style="padding: 20px; border: 1px solid #ccc; border-radius: 10px; margin-bottom: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
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

    @if($approvedRekap)
        {{-- Sudah divalidasi --}}
        <div class="alert alert-success text-center" role="alert" style="margin-bottom: 20px;">
            IPK Anda sudah divalidasi. Tidak dapat melakukan perubahan.
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">IPK:</label>
            <p style="padding: 10px; background: #f5f5f5; border-radius: 5px;">{{ $approvedRekap->IPK }}</p>
        </div>
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Semester:</label>
            <p style="padding: 10px; background: #f5f5f5; border-radius: 5px;">{{ $approvedRekap->semester }}</p>
        </div>

    @elseif($pendingRekap)
        {{-- Menunggu validasi --}}
        <div class="alert alert-info text-center" role="alert" style="margin-bottom: 20px;">
            Pengajuan IPK Anda sedang menunggu validasi. Anda masih dapat mengedit data.
        </div>
        @include('ipk._form', ['rekap' => $pendingRekap, 'isEdit' => true])

    @else
        {{-- Form baru --}}
        @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 20px;">
            <ul class="list-unstyled mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @include('ipk._form', ['rekap' => null, 'isEdit' => false])
    @endif
</form>
@endsection
