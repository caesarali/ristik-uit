@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<section id="main-slider" class="no-margin">
    <div class="carousel slide wet-asphalt">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" style="background-image: url({{ asset('img/slider/bg3.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <h2 class="animation animated-item-1">Selamat Datang, Di Web Profil RISTIK</h2>
                                <h3 class="animation animated-item-2">Jurnal Ilmiah <u>Riset Teknologi Ilmu Komputer</u>.</h3>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" style="background-image: url({{ asset('img/slider/bg3.jpg') }})">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="carousel-content centered">
                                <h2 class="animation animated-item-1">RISTIK - FIKOM UIT</h2>
                                <p class="animation animated-item-2">Lantai 4 Kampus 4 Universitas Indonesia Timur.</p>
                                <p class="animation animated-item-3">Jl. Rappocini Raya No. 171 Makassar.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="centered">
                                <div class="embed-container" style="padding-top: 0; box-shadow: 0 4px 0 0;">
                                    <img class="img-responsive img-thumbnail" src="{{ asset('img/slider/item/item4.jpg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="icon-angle-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="icon-angle-right"></i>
    </a>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-twitter icon-md"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">RISTIK on Twitter</h3>
                        <p>Lihat informasi seputar jurnal RISTIK di Official RISTIK di Twitter.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-facebook icon-md"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">RISTIK on Facebook</h3>
                        <p>Official Page RISTIK di facebook, memuat informasi seputar Jurnal Ilmiah Riset Teknologi Ilmu Komputer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="media">
                    <div class="pull-left">
                        <i class="icon-google-plus icon-md"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading">RISTIK on Google Plus</h3>
                        <p>Temukan informasi seputar jurnal RISTIK di Google Plus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
