@extends('layouts.dashboard')

@section('content')

    <h1>Daftar Rekap</h1>
    <a class="btn btn-success mb-3" href="{{ route('Rekap.create') }}">Tambah Rekap</a>
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
        <h1>Daftar Rekap</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User ID</th>
                    <th>IPS</th>
                    <th>IPK</th>
                    <th>Dokumen</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @if (isset($rekaps) && count($rekaps) > 0)
                    @foreach ($rekaps as $rekap)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekap->user_id }}</td>
                            <td>{{ $rekap->ips }}</td>
                            <td>{{ $rekap->ipk }}</td>
                            <td>{{ $rekap->dokumen }}</td>
                            <td>{{ $rekap->semester }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('rekaps.edit', $rekap->id) }}">Edit</a>
                                <form action="{{ route('Rekap.destroy', $rekap->id) }}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Tidak ada data rekap.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
