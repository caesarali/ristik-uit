@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Galeri</h1>
                <p>Dokumentasi Kegiatan RISTIK Universitas Indonesia Timur</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ url('/home') }}">Beranda</a></li>
                    <li><a href="#">Profile</a></li>
                    <li class="active">Galeri</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="profile">
    <div class="container">
        <ul class="portfolio-items col-3">
            @forelse ($galleries as $gallery)
                <li class="portfolio-item apps">
                    <div class="item-inner">
                        <img src="{{ asset('img/gallery/'.$gallery->picture) }}" style="height: 200px;" alt="{{ $gallery->caption }}">
                        <h5 class="center">{{ $gallery->created_at->diffForHumans() }}</h5>
                        <div class="overlay">
                            <a class="preview btn btn-danger" href="{{ asset('img/gallery/'.$gallery->picture) }}" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                            <br>
                            <div class="gap preview"></div>
                            <h4 class="preview">{{ $gallery->caption }}</h4>
                        </div>
                    </div>
                </li>
            @empty
                <h2 class="center text-muted"><i>Belum ada foto dalam galeri.</i></h2>
            @endforelse
        </ul>
    </div>
</section>

<section style="min-height: 300px;">
    <div class="container text-center">
        {{ $galleries->links() }}
    </div>
</section>
@endsection