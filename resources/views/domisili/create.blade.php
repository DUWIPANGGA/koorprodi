@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Domisili Baru</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('domisili.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $mahasiswa->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $mahasiswa->nim }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap') }}</textarea>
                    @error('alamat_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" step="any" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude') }}" required>
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" step="any" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude') }}" required>
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fotos" class="form-label">Foto Rumah (Maksimal 3 foto)</label>
                    <input type="file" class="form-control @error('fotos.*') is-invalid @enderror" id="fotos" name="fotos[]" multiple accept="image/*" required>
                    <small class="text-muted">Format: JPG, PNG (Maks. 2MB per foto)</small>
                    @error('fotos.*')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    @error('fotos')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Ajukan Domisili
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Leaflet JS for map integration -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<style>
    #map { height: 300px; margin-bottom: 20px; }
</style>

<div class="container mb-4">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pilih Lokasi di Peta</h6>
        </div>
        <div class="card-body">
            <div id="map"></div>
            <small class="text-muted">Klik pada peta untuk menandai lokasi</small>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-7.797068, 110.370529], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        let marker;
        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
            document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
        });

        // Initialize with old values if validation failed
        @if(old('latitude') && old('longitude'))
            const lat = {{ old('latitude') }};
            const lng = {{ old('longitude') }};
            map.setView([lat, lng], 13);
            marker = L.marker([lat, lng]).addTo(map);
        @endif
    });
</script>
@endsection