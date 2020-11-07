@extends('layouts.dashboard')

@section('title')
  Store Settings
@endsection
@push('addon-style')
     <!-- Peta -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endpush
@section('content')
    <!-- Section Content -->
            <div id="page-content-wrapper">               
                <!-- Section Content -->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Lokasi Usaha</h2>
                            <p class="dashboard-subtitle">
                                *Perhatian, silahkan anda menambahkan lokasi usaha anda.
                            </p>
                        </div>
                       <div class="dashboard-content">
                           <div class="row">
                               <div class="col-7">
                                   <div class="card">
                                       <div class="card-body">
                                           <div id="mapid" style="height: 500px;"></div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-5">
                                   <div class="card">
                                       <div class="card-body">
                                            <form 
                                                action="{{ route('dashboard-pemetaan-input') }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                            >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Nama UKM</label>
                                                        <input 
                                                                type="text" 
                                                                class="form-control" 
                                                                id="store_name" 
                                                                name="store_name" 
                                                                value="{{ Auth::user()->store_name }}" 
                                                                readonly
                                                            >
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Nama Pemilik</label>
                                                        <input 
                                                                type="text" 
                                                                class="form-control" 
                                                                id="name" 
                                                                name="name" 
                                                                value="{{ Auth::user()->name }}" 
                                                                readonly
                                                            >
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Latitude</label>
                                                        <input 
                                                                type="text" 
                                                                class="form-control" 
                                                                id="Latitude" 
                                                                name="latitude" 
                                                                value="{{ Auth::user()->latitude }}" 
                                                                readonly
                                                            >
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Longitude</label>
                                                        <input 
                                                                type="text" 
                                                                class="form-control" 
                                                                id="Longitude" 
                                                                name="longitude" 
                                                                value="{{ Auth::user()->longitude }}" 
                                                                readonly
                                                            >
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button 
                                                            type="submit"
                                                            class="btn btn-success px-5 w-100"
                                                        >
                                                            SIMPAN DATA
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                       </div>
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
        var curLocation = [0, 0];
        if (curLocation[0] == 0 && curLocation[1] == 0) {
            curLocation = [
                {{ Auth::user()->latitude }}, 
                {{ Auth::user()->longitude }}
            ];
        }

        var mymap = L.map('mapid').setView([
            {{ Auth::user()->latitude }}, 
            {{ Auth::user()->longitude }}
        ], 15);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(mymap);

        mymap.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
        });

        $("#Latitude, #Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });
        mymap.addLayer(marker);
    </script>
@endpush
