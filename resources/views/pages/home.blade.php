@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home" data-aos="fade-up">
            <section class="store-carousel">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="carousel slide" id="storeCarousel" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                                    <li class="" data-target="#storeCarousel" data-slide-to="1"></li>
                                    <li class="" data-target="#storeCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/images/bg-3.png" alt="banner-hero" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/images/bg-2.png" alt="banner-hero" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="/images/bg-1.png" alt="banner-hero" class="d-block w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="store-trend-categories mt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <h5>Kategori Produk Terbaru</h5>
                        </div>
                    </div>
                    <div class="row">
                        @php 
                            $noincremen = 0
                        @endphp

                        @forelse ($categories as $category)
                            <div 
                                class="col-6 col-md-4 col-lg-2" 
                                data-aos="fade-up" 
                                data-aos-delay="{{ $noincremen += 100 }}"
                            >
                                <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                    <div class="categories-image">
                                        <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100">
                                    </div>
                                    <p class="categories-text">
                                        {{ $category->name }}
                                    </p>
                                </a>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="200">
                                Tidak Ada Kategori yang ditemukan.
                            </div>
                        @endforelse                        
                    {{-- <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/trend/categories-furniture.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Furniture
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/trend/categories-makeup.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                MakeUp
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/trend/categories-sneaker.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Sneaker
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/trend/categories-tools.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Tools
                            </p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                        <a href="#" class="component-categories d-block">
                            <div class="categories-image">
                                <img src="/images/trend/categories-baby.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Baby
                            </p>
                        </a>
                    </div> --}}
                </div>
                </div>
            </section>
            <section class="store-new-products">
                <div class="container">
                    <div class="row">
                        <div class="col-12" data-aos="fade-up">
                            <h5>Produk Terbaru</h5>
                        </div>
                    </div>
                    <div class="row">
                        @php
                            $no = 0
                        @endphp
                        @forelse ($products as $product)  
                            @if ($product->user->store_status == 1)
                                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $no += 100}}">
                                <a href="{{ route('detail',$product->slug) }}" class="component-products d-block">
                                    <div class="products-thumbnail">
                                        <div 
                                            class="products-image" 
                                            style="
                                                @if($product->galleries->count())
                                                    background-image:url('{{ Storage::url($product->galleries->first()->photos) }}')                                                    
                                                @else
                                                    background-color: #eee
                                                @endif
                                            "                                            
                                        >
                                        
                                        </div>
                                    </div>
                                    <div class="products-text">
                                        {{ $product->name }} <br>
                                        <small class="text-primary"><strong>{{ $product->user->store_name }}</strong></small>
                                    </div>
                                    <div class="products-price">
                                        <strong>Rp. {{ number_format($product->price) }} </strong>                                                                                                                                                        
                                        @php
                                          $user = DB::table('indoregion_regencies')->where('id', $product->user->regencies_id)->get()  
                                        @endphp                                         
                                        <br>                                        
                                            @foreach ($user as $u)
                                                <span class="badge badge-success">{{ $u->name }}</span>       
                                            @endforeach                                                                         
                                    </div>
                                </a>
                            </div>                                                          
                            @endif                                                                                                                                    
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="200">
                                Tidak Ada Product yang ditemukan.
                            </div>
                        @endforelse
                        {{-- <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/Orange.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Orange Shoes
                                </div>
                                <div class="products-price">
                                    Rp. 5.000.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/sofa.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Sofa
                                </div>
                                <div class="products-price">
                                    Rp. 20.000.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/bubuk.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Bubuk Maketti
                                </div>
                                <div class="products-price">
                                    Rp. 100.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/tatakan.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Tatakan Gelas
                                </div>
                                <div class="products-price">
                                    Rp. 200.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/mavic\ kawe.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Mavic Kawe
                                </div>
                                <div class="products-price">
                                    Rp. 500.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/sepatu.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Nike Shoes
                                </div>
                                <div class="products-price">
                                    Rp. 100.000.000
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                            <a href="/details.html" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image:url('/images/new-product/boneka.jpg')">
                                    
                                    </div>
                                </div>
                                <div class="products-text">
                                    Boneka
                                </div>
                                <div class="products-price">
                                    Rp. 200.000
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </section>
    </div>
@endsection