@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transactions
@endsection

@section('content')
    <!-- Section Content -->
                <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Transactions</h2>
                            <p class="dashboard-subtitle">
                                Big result start from the small one
                            </p>
                        </div>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-12 mt-2">                                    
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Sell Product</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Buy Product</a>
                                        </li>                                        
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                            @foreach ($sellTransactions as $transaction)
                                                <a href="{{ route('dashboard-transaction-details',$transaction->id) }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <img 
                                                                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" 
                                                                    class="w-50"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col-md-4">
                                                                {{ $transaction->product->name }}
                                                            </div>
                                                            <div class="col-md-3">
                                                                {{ $transaction->product->user->store_name }}
                                                            </div>
                                                            <div class="col-md-3">
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
                                            @endforeach                                            
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
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                            @foreach ($buyTransactions as $transaction)
                                                <a href="{{ route('dashboard-transaction-details',$transaction->id) }}" class="card card-list d-block">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <img 
                                                                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" 
                                                                    class="w-50"
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="col-md-4">
                                                                {{ $transaction->product->name }}
                                                            </div>
                                                            <div class="col-md-3">
                                                                {{ $transaction->product->user->store_name }}
                                                            </div>
                                                            <div class="col-md-3">
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
                                            @endforeach
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
                                            </a> --}}
                                        </div>
                                    </div>                                                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
