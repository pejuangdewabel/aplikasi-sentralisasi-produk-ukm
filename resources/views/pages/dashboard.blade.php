@extends('layouts.dashboard')

@section('title')
    Store Dashboard UKM
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Dashboard UKM</h2>
                            <p class="dashboard-subtitle">
                                Selamat Datang, <strong class="text-dan     ger">{{ Auth::user()->name }}</strong> di Aplikasi<br><strong class="text-primary">E-SENTRALISASI</strong>                                                                
                            </p>
                        </div>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Jumlah Produk
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                                {{ $produk }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Status Toko
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                              {{ Auth::user()->store_status ? 'BUKA' : 'TUTUP' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Transactiton
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                                {{ number_format($transaction_count) }}
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>                            
                            <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <h5 class="mb-3">
                                        Recent Transactions
                                    </h5>     
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                aaa
                                            </div>
                                        </div>
                                    </div>                                                                
                                   {{-- @foreach ($transaction_data as $transaction)                                        
                                        <a href="{{ route('dashboard-transaction-details', $transaction->id) }}" class="card card-list d-block">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <img 
                                                            src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" 
                                                            alt="" class="w-75"
                                                        />
                                                    </div>
                                                    <div class="col-md-4">  
                                                        <small class="text-info">Nama Produk</small>
                                                        <br>                                                      
                                                        {{ $transaction->product->name ?? '' }}
                                                    </div>
                                                    <div class="col-md-3">
                                                         <small class="text-info">Nama Pembeli</small>
                                                        <br>
                                                        {{ $transaction->transaction->user->name ?? '' }}
                                                    </div>
                                                    <div class="col-md-3">
                                                        <small class="text-info">Tanggal Pemesanan</small>
                                                        <br>
                                                        {{ date('d F Y',strtotime($transaction->created_at)) ?? '' }}
                                                        <br>
                                                        @php
                                                            if(date('l',strtotime($transaction->created_at)) == "Sunday"){
                                                                echo "Minggu";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Monday"){
                                                                echo "Senin";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Tuesday"){
                                                                echo "Selasa";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Wednesday"){
                                                                echo "Rabu";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Thursday"){
                                                                echo "Kamis";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Friday"){
                                                                echo "Jumat";
                                                            }elseif (date('l',strtotime($transaction->created_at)) == "Saturday"){
                                                                echo "Sabtu";
                                                            }
                                                        @endphp
                                                        , {{ date('H:i:s',strtotime($transaction->created_at)) }}
                                                    </div>
                                                    <div class="col-md-1 d-none d-md-block">
                                                        <img src="/images/transactions-product/expand_more_24px.svg" alt="">
                                                    </div>
                                                </div>                                            
                                            </div>
                                        </a>
                                   @endforeach --}}
                                    {{-- <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img 
                                                        src="/images/transactions-product/2.png" 
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="col-md-4">
                                                    Shirup Marjan
                                                </div>
                                                 <div class="col-md-3">
                                                    Bella
                                                </div>
                                                <div class="col-md-3">
                                                    22 Januari 2020
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="/images/transactions-product/expand_more_24px.svg" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </a>
                                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img 
                                                        src="/images/transactions-product/3.png" 
                                                        alt=""
                                                    />
                                                </div>
                                                <div class="col-md-4">
                                                    Shirup Marjan
                                                </div>
                                                 <div class="col-md-3">
                                                    Bella
                                                </div>
                                                <div class="col-md-3">
                                                    22 Januari 2020
                                                </div>
                                                <div class="col-md-1 d-none d-md-block">
                                                    <img src="/images/transactions-product/expand_more_24px.svg" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
@endsection