@extends('layouts.app')

@section('title')
    Halaman Kategori Produk
@endsection

@section('content')
    <div class="page-content page-home" data-aos="fade-up">
        <section class="store-trend-categories mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Halaman Kategori Produk</h5>
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
                                <img src="/images/trend/categories-gadgets.svg" alt="" class="w-100">
                            </div>
                            <p class="categories-text">
                                Gadget
                            </p>
                        </a>
                     </div> --}}
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
                        <h5>All Product</h5>
                    </div>
                </div>
                <div class="row">
                        @php
                            $no = 0
                        @endphp
                        @forelse ($products as $product)                                                    
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
                                        Rp. {{ number_format($product->price) }}                                                                                 
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="200">
                                <hr>
                                <strong><h4>Product tidak ditemukan !</h4></strong> <br>
                                <img src="/images/404.svg" alt="" srcset="" width="50%">                                                                                               
                            </div>
                        @endforelse

                    {{-- <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image" style="background-image:url('/images/new-product/Apple.jpg')">
                                
                                </div>
                            </div>
                            <div class="products-text">
                                Apple Watch 4
                            </div>
                            <div class="products-price">
                                Rp. 10.000.000
                            </div>
                        </a>
                    </div> --}}
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
                <div class="row">
                    <div class="col-12 mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection