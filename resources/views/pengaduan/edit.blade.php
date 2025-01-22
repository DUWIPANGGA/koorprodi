@extends('layouts.dashboard')

@section('title', 'Edit Pengaduan')

@section('content')
    <div class="container bg-white p-4 border-radius">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h2>Pengaduan</h2>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label text-muted">Nama</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="nama">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nim" class="col-sm-2 col-form-label text-muted">NIM</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="nim">{{ $user->nim }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="semester" class="col-sm-2 col-form-label text-muted">Semester</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="semester">{{ $user->semester }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="angkatan" class="col-sm-2 col-form-label text-muted">Angkatan</label>
                                <div class="col-sm-10">
                                    <p class="form-control-static text-secondary" id="angkatan">{{ $user->angkatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="form-group">
    <label for="cerita">Cerita:</label>
    <textarea name="cerita" class="form-control" readonly style="width: 100%; height: 200px;">{{ old('cerita', $pengaduan->cerita) }}</textarea>
</div>

                    <button type="submit" class="btn btn-success mt-3" name="validasi" value="1">validasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
