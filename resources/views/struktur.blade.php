@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Struktur Organisasi</h1>
                <p>Daftar dewan redaksi dalam lembaga RISTIK</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ url('/home') }}">Beranda</a></li>
                    <li><a href="#">Profile</a></li>
                    <li class="active">Struktur Organisasi</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="profile" style="min-height: 500px;">
    <div class="container">
        <h1 class="center">Dewan Redaksi</h1>
        <p class="lead center">Jajaran Dewan Redaksi Penerbitan Jurnal RISTIK Universitas Indonesia Timur</p>
        <div class="gap"></div>
        <div class="row">
            @foreach($jabatans as $jabatan)
                @foreach($jabatan->redaksi as $redaksi)
                    <div class="col-md-4 col-xs-6">
                        <div class="center">
                            <p><img class="img-responsive img-thumbnail" style="max-height: 200px" src="{{ $redaksi->photo ? asset('img/redaksi/'.$redaksi->photo) : asset('img/profile.jpg') }}" alt="" ></p>
                            <h4><b>{{ $redaksi->name }}</b></h4>
                            <p><b><u>{{ $redaksi->jabatan->name }}</u></b></p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
        <div class="gap"></div>
    </div>
</section>
@endsection