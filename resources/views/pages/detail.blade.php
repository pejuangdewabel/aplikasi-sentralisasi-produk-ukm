@extends('layouts.app')

@section('title')
    Store Detail Page
@endsection
@push('addon-style')
    <!-- Peta -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="{{ url('leaflet-locatecontrol/dist/L.Control.Locate.min.css') }}">
@endpush
@section('content')
    <div class="page-content page-details">
        <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Product Detail  /  {{ $product->name }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-gallery" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img 
                                :src="photos[activePhoto].url" 
                                alt="" 
                                :key="photos[activePhoto].id" 
                                class="w-100 main-image"
                            />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div 
                                class="col-3 col-lg-12 mt-2 mt-lg-0" 
                                v-for="(photo, index) in photos" 
                                :key="photo.id" 
                                data-aos="zoom-in" 
                                data-aos-delay="100"
                            >
                                <a href="#" @click="changeActive(index)">
                                    <img 
                                        :src="photo.url" 
                                        alt="" 
                                        class="w-100 thumbnail-image" 
                                        :class="{ active: index == activePhoto }"
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="store-details-container mt-3" data-aos="fade-up">
            <section class="store-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">                           
                            <h1>{{ $product->name }}</h1> 
                            <div class="price"><strong><h5 class="text-danger">Rp.{{ number_format($product->price) }}</h5></strong></div>                                                                               
                            <div class="owner">
                                Nama UKM :                                
                                <img 
                                    src="{{ Storage::url($product->user->profile) }}" 
                                    alt=""
                                    class="my-4 text-center"
                                    style="max-height: 40px"
                                />                            
                                <strong class="text-info">{{ $product->user->store_name }}</strong>
                            </div>                            
                            {{-- <div class="owner">
                                Nama Toko 
                                <strong>
                                    <h5 class="text-info">{{ $product->user->store_name }}</h5>
                                </strong>
                            </div>                             --}}                            
                            <div class="alert alert-info" role="alert">
                                {{ $product->user->address_one }}
                            </div>
                            @php
                                $user = DB::table('indoregion_regencies')->where('id', $product->user->regencies_id)->get()  
                            @endphp
                            <p>
                                @foreach ($user as $u)
                                    <span class="badge badge-success">{{ $u->name }}</span>       
                                @endforeach
                            </p>                            
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            <a 
                                href="https://api.whatsapp.com/send?phone={{ $product->user->phone_number }}&text=Halo,%20apakah%20benar%20ini%20toko%20{{ $product->user->store_name }}?"
                                target="_blank"
                                class="btn btn-success px-4 text-white btn-block mb-3"
                            >
                                Hubungi Penjual
                            </a>
                            {{-- Tombol Chart --}}
                            {{-- @auth
                               <form 
                                    action="{{ route('detail-add',$product->id) }}" 
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <button 
                                        type="submit"
                                        class="btn btn-success px-4 text-white btn-block mb-3"
                                    >
                                        Add to Chart
                                    </button>
                               </form>
                            @else
                                <a href="{{ route('login') }}"
                                    class="btn btn-success px-4 text-white btn-block mb-3"
                                >
                                    Silahkan Register Dulu
                                </a>
                            @endauth                             --}}
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8"><h5>Deskripsi Produk :</h5></div>
                        <div class="col-12 col-lg-8">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </section>
            {{-- Customer Review --}}

            <section class="store-review mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5><strong>Peta Lokasi {{ $product->user->store_name }}</strong></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div id="mapid" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data:{
                activePhoto: 0,
                photos:[
                   @foreach($product->galleries as $gallery)
                        {
                            id: {{ $gallery->id }},
                            url: "{{ Storage::url($gallery->photos)}}",
                        },
                   @endforeach
                    // {
                    //     id: 2,
                    //     url: "/images/product-details/product-details-2.jpg"
                    // },
                    // {
                    //     id: 3,
                    //     url: "/images/product-details/product-details-3.jpg"
                    // },
                    // {
                    //     id: 4,
                    //     url: "/images/product-details/product-details-4.jpg"
                    // },
                ],
            },
            methods: {
                changeActive(id){
                    this.activePhoto = id;
                },
            },
        });
    </script>
    <script src="/script/navbar-scroll.js"></script>
    {{-- Peta --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="{{ url('leaflet-locatecontrol/src/L.Control.Locate.js') }}"></script>
    <script>
        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

            //map view
            console.log(location.coords.latitude, location.coords.longitude);
        });
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
            L.marker([
                {{ $product->user->latitude }},
                {{ $product->user->longitude }}
            ], {
                icon: iconUkm
            }).addTo(mymap).bindPopup('<h4><strong>{{ $product->user->store_name }}</strong></h4><p>{{ $product->user->address_one }}</p><a href="https://www.google.com/maps/dir/?api=1&origin=-5.4306814,105.2662511&destination={{ $product->user->latitude }},{{ $product->user->longitude }}" class="btn btn-primary" target="_blank">a</a>');
    </script>
@endpush
