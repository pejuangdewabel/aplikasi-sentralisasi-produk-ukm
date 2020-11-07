@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
                    <div class="container-fluid">
                        <div class="dashboard-heading">
                            <h2 class="dashboard-title">Admin Dashboard</h2>
                            <p class="dashboard-subtitle">
                                This is E-Sentral Admin
                            </p>
                        </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Jumlah UKM
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                               {{ $ukm }} UKM
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Jumlah Produk
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                                {{ $produk }} Produk
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="dashboard-card-title">
                                                Jumlah Kategori
                                            </div>
                                            <div class="dashboard-card-subtitle">
                                                {{ $kategori }} Kategori
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row mt-3">
                                <div class="col-12 mt-2">
                                    <h5 class="mb-3">
                                        Recent Transactions
                                    </h5>
                                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <img 
                                                        src="/images/transactions-product/1.png" 
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
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
    </div>
@endsection
