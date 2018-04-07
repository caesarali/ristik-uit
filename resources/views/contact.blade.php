@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<section id="title" class="emerald">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Kontak Kami</h1>
                <p>Data Kontak, Alamat dan Persyaratan Penerbitan Jurnal RISTIK</p>
            </div>
            <div class="col-sm-6">
                <ul class="breadcrumb pull-right">
                    <li><a href="{{ url('/home') }}">Beranda</a></li>
                    <li class="active">Kontak</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section style="min-height: 500px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>
                    <b>Telepon : </b> {{ $profile->telp ?? '-' }}
                </h4>
                <h4>
                    <b>Email : </b> {{ $profile->email ?? '-' }}
                </h4>
                <hr>
                <h4><b>Alamat</b></h4>
                <h4>
                    {!! $profile->alamat ?? '-' !!}
                </h4>
                <hr>
                <h3><b>Persyaratan Penerbitan Jurnal</b></h3>
                {!! $profile->sk_jurnal ?? '-' !!}
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.6649782521376!2d119.43016931464106!3d-5.157495996257321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf1d86d1f2eb91%3A0xb8b749c0dd95d0e7!2sUNIVERSITAS+INDONESIA+TIMUR!5e0!3m2!1sid!2sid!4v1507207251869" width="550" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
@endsection