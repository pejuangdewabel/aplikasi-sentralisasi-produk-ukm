@extends('layouts.admin')

@section('title')
    Pemetaan Sentralisasi UKM
@endsection

@push('addon-style')
    <!-- Peta -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endpush

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Peta Pemetaan Sentralisasi UKM</h2>
            <p class="dashboard-subtitle">
                List Of Maps
            </p>
        </div>                            
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="mapid" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                        
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var mymap = L.map('mapid').setView([
            -5.3182008,
            105.1961876
        ], 10);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
        }).addTo(mymap);

        var iconUkm = L.icon({
            iconUrl: '{{ url("icon/maps.png") }}',
            iconSize: [30, 40],
        });

        @foreach ($peta as $p)
            L.marker([
                {{ $p->latitude }},
                {{ $p->longitude }}
            ], {
                icon: iconUkm
            }).addTo(mymap).bindPopup("<p>{{ $p->store_name }}</p><p>{{ $p->address_one }}</p>");
        @endforeach
    </script>
@endpush
