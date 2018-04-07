<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/home') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/home') }}">Beranda</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profil <i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile') }}">Profil RISTIK</a></li>
                        <li><a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a></li>
                        <li><a href="{{ route('gallery') }}">Galeri Kegiatan</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('jurnal') }}">Data Jurnal</a></li> 
                <li><a href="{{ route('contact') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</header>