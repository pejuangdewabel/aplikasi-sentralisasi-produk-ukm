<nav class ="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down" data-target="#navbarResponsive" data-aos-easing="linear" data-aos-duration="800">
    <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="/images/icon/marketplace.png" alt="Logo" style="max-height: 70px">
            </a>
            <a href="{{ route('home') }}" class="navbar-brand text-center"><h3>E-Sentralisasi</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories') }}" class="nav-link {{ (request()->is('categories*')) ? 'active' : '' }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pemetaan-maps') }}" class="nav-link {{ (request()->is('pemetaan*')) ? 'active' : '' }}">Pemetaan UKM</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/index.html" class="nav-link">Rewards</a>
                    </li> --}}
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn-success nav-link px-4 text-white">Masuk</a>
                        </li>                        
                    @endguest                    
                </ul>
                @auth
                    <!-- Desktop Menu -->
                    <ul class="navbar-nav d-none d-lg-flex">
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    <img src="{{ Storage::url(Auth::user()->profile) }}" alt="logo-user" class="img-thumbnail mr-2 profile-picture">
                                    Hello, {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">Setting</a>
                                    <div class="dropdown-divider"></div>
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
                            {{-- Keranjang --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                                    @php
                                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                    @endphp
                                    @if ($carts > 0)
                                        <img src="/images/icon/icon-cart-filled.svg" alt="">
                                        <div class="card-badge">{{ $carts }}</div>
                                    @else
                                        <img src="/images/icon/market_blank.svg" alt="">
                                    @endif                                    
                                </a>
                            </li> --}}
                    </ul>
                    <!-- Mobile Menu -->
                    <ul class="navbar-nav d-block d-lg-none">
                        <li class="nav-item dropdown">
                            <a 
                                href="#" 
                                class="nav-link"
                                id="navbarDropdown" 
                                role="button" 
                                data-toggle="dropdown"
                            >
                                Hello, {{ Auth::user()->name }}
                            </a>                            
                        </li>
                        <li class="nav-item">
                            {{-- <a href="#" class="nav-link d-inline-block">
                                        @php
                                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                                        @endphp
                                        @if ($carts > 0)
                                            <img src="/images/icon/icon-cart-filled.svg" alt="">
                                            <div class="card-badge">{{ $carts }}</div>
                                        @else
                                            <img src="/images/icon/market_blank.svg" alt="">
                                        @endif
                            </a> --}}
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item">Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" 
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                @endauth
            </div>
    </div>
</nav>
