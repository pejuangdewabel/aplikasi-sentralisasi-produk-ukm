<nav class ="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down" data-target="#navbarResponsive" data-aos-easing="linear" data-aos-duration="800">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="/images/icon/marketplace.png" alt="Logo" style="max-height: 70px">
            </a>
            <a href="" class="navbar-brand text-center"><h3>E-Sentralisasi</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories') }}" class="nav-link">Kategori</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="/index.html" class="nav-link">Rewards</a>
                    </li>                     --}}
                </ul>
            </div>
        </div>
</nav>