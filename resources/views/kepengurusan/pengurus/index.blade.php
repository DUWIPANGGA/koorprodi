@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kepengurusan {{ $periode->nama }}</h1>
        <div>
            <select class="form-select" onchange="window.location.href='{{ route('pengurus.index') }}?periode='+this.value">
                @foreach($periodes as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $periode->id ? 'selected' : '' }}>
                        {{ $p->nama }} ({{ $p->tahun }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <a href="{{ route('pengurus.create', ['periode' => $periode->id]) }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Anggota
    </a>

    @foreach($pengurus as $divisi => $anggota)
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ $divisi }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($anggota as $p)
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <img src="{{ $p->foto ? asset('storage/'.$p->foto) : asset('images/default-user.png') }}" 
                             class="card-img-top" alt="{{ $p->nama }}" style="height: 180px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nama }}</h5>
                            <p class="card-text text-muted">{{ $p->jabatan }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ route('pengurus.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pengurus.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Hapus anggota ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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