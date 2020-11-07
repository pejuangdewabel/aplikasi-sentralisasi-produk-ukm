<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('style/main.css') }}">    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    @stack('addon-style')

</head>
<body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- SideBar -->
            <div class="border-right" id="sidebar-wrapper">
                <div class="sidebar-heading text-center">
                    <img 
                        {{-- /images/icon/dashboard-logo.svg --}}
                        src="/images/computer.png"
                        alt=""
                        class="my-4"
                        style="max-width: 150px"
                    />
                </div>
                <div class="list-group list-group-flush">
                     <a 
                        href="{{ route('home') }}" 
                        class="list-group-item list-group-item-action"
                        
                    >Halaman Home</a>
                    <a 
                        href="{{ route('admin-dashboard') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}"
                        
                    >Dashboard</a>                   
                    <a 
                        href="{{ route('product.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}"                        
                    >Produk</a>
                    <a 
                        href="{{ route('category.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }}"                        
                    >Kategori Produk</a>
                    <a 
                        href="{{ route('product-gallery.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}"                        
                    >Galeri Foto Produk</a>
                    <a 
                        href="{{ route('pemetaan') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/pemetaan*')) ? 'active' : '' }}"                        
                    >Pemetaan Sentralisasi UKM</a> 
                    {{-- Menu Transaksi --}}
                    {{-- <a 
                        href="" 
                        class="list-group-item list-group-item-action"                        
                    >Transactions</a>     --}}
                    <a 
                        href="{{ route('user.index') }}" 
                        class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }}"                        
                    >Data Users</a>                        
                    <a                         
                        class="list-group-item list-group-item-action"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                    >
                    Keluar
                    </a>
                </div>
            </div>
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class ="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down" data-target="#navbarResponsive" data-aos-easing="linear" data-aos-duration="800">
                    <div class="container-fluid">
                        <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
                            &laquo; Menu
                        </button>       
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">                            
                            <!-- Desktop Menu -->
                            <ul class="navbar-nav d-none d-lg-flex ml-auto">
                                    <li class="nav-item dropdown">
                                        <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                            <img src="{{ Storage::url(Auth::user()->profile) }}" alt="logo-user" class="rounded-circle mr-2 profile-picture">
                                            Hello, {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu">                                            
                                            <a class="dropdown-item" 
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                            </ul>
                            <!-- Mobile Menu -->
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Hello, {{ Auth::user()->name }}
                                    </a>
                                </li>                               
                            </ul>
                        </div>
                    </div>
                </nav>

                {{-- Content --}}
                @yield('content')

            </div>
        </div>
    </div>

    <!-- Boostrap dan Javascript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
        $("#menu-toggle").click(function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    @stack('addon-script')
</body>
</html>