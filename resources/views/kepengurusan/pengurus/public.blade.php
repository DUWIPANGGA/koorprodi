@extends('layouts.dashboard')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Struktur Kepengurusan</h1>
    
    @foreach($pengurus as $divisi => $anggota)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3>{{ $divisi }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($anggota as $p)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100 border-0 shadow-sm">
                                @if($p->foto)
                                    <img src="{{ asset('storage/'.$p->foto) }}" class="card-img-top" alt="{{ $p->nama }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="text-center py-4 bg-light">No Photo</div>
                                @endif
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $p->nama }}</h5>
                                    <p class="card-text text-muted">{{ $p->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection