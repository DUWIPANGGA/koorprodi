<!-- resources/views/user-organisasi/form.blade.php -->
@php
    $isEdit = isset($semester);
    $currentSemester = $isEdit ? $semester : $currentSemester;
@endphp

@extends('layouts.dashboard')

@section('title', 'Pilih Organisasi')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Pilih Organisasi untuk {{ $user->name }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('user-organisasi.store', $user->id) }}" method="POST">
            @csrf
            
            <div class="alert alert-info">
                <strong>Semester:</strong> {{ $currentSemester }}
                <input type="hidden" name="semester" value="{{ $currentSemester }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Pilih Organisasi</label>
                <div class="row">
                    @foreach($organisasis as $organisasi)
                    <div class="col-md-4 mb-3">
                        <div class="form-check card p-3">
                            <input class="form-check-input" type="checkbox" 
                                   name="organisasi_ids[]" 
                                   value="{{ $organisasi->id }}"
                                   id="org_{{ $organisasi->id }}"
                                   @if($isEdit && $user->organisasis->where('id', $organisasi->id)->where('pivot.semester', $semester)->count())
                                   checked
                                   @endif>
                            <label class="form-check-label" for="org_{{ $organisasi->id }}">
                                <strong>{{ $organisasi->nama_organisasi }}</strong>
                                <p class="text-muted small mb-0">{{ $organisasi->deskripsi }}</p>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection