@extends('layouts.dashboard')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengajuan Domisili Baru</h6>
        </div>
        <div class="card-body">
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
                    <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" step="any" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="col-md-6">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" step="any" class="form-control" id="longitude" name="longitude" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fotos" class="form-label">Foto Rumah (Maksimal 3 foto)</label>
                    <input type="file" class="form-control" id="fotos" name="fotos[]" multiple accept="image/*" required>
                    <small class="text-muted">Format: JPG, PNG (Maks. 2MB per foto)</small>
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

<script>
    // You can add map integration here to get coordinates
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-7.797068, 110.370529], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        let marker;
        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    });
</script>
@endsection