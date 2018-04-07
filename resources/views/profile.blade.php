@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Profil</h1>
                <p>Profil Lembaga RISTIK Universitas Indonesia Timur</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ url('/home') }}">Beranda</a></li>
                    <li><a href="#">Profile</a></li>
                    <li class="active">Profil RISTIK</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="profile" style="min-height: 500px;">
    <div class="container">
        <h2>Apa itu RISTIK ?</h2>
        {!! $profile->tentang ?? '<i class="text-muted">Data tidak ditemukan.</i>' !!}
    </div>
</section>
@endsection