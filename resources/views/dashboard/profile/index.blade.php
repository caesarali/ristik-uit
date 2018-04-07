@extends('dashboard.layouts.app')

@section('style')
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- PNotify -->
    <link href="{{ asset('assets/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Page Header --}}
        <section class="content-header">
            <h1>
                Profile Lembaga
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li class="active">Profile Lembaga</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary box-redaksi">
                        <div class="box-header with-border">
                            <h3 class="box-title">Persyaratan Penerbitan Jurnal</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" onclick="$('.box-redaksi .box-collapse').slideToggle(400)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button> --}}
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body box-collapse">
                            {!! $profile->sk_jurnal or '<p class="text-muted"><i><b>Belum ada data mengenai persyaratan penerbitan jurnal RISTIK...</b></i></p>' !!}
                        </div>
                        <div class="box-footer box-collapse" style="display: none;">
                            <form method="POST" action="{{ route('profile.update.redaksi') }}">
                                {{ csrf_field() }}
                                <div>
                                    <textarea name="sk_jurnal" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {!! $profile->sk_jurnal or '' !!}
                                    </textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-fw fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box box-primary box-tentang">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sejarah & Definisi Lembaga</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" onclick="$('.box-tentang .box-collapse').slideToggle(400)">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button> --}}
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body box-collapse">
                            {!! $profile->tentang or '<p class="text-muted"><i><b>Belum ada data mengenai sejarah dan definisi lembaga...</b></i></p>' !!}
                        </div>
                        <div class="box-footer box-collapse" style="display: none;">
                            <form method="POST" action="{{ route('profile.update.about') }}">
                                {{ csrf_field() }}
                                <div>
                                    <textarea name="tentang" class="textarea" placeholder="Message" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {!! $profile->tentang or '' !!}
                                    </textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-fw fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kontak</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('profile.update.contact') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" value="{{ $profile->telp or '' }}" maxlength="12" minlength="11" name="telp" class="form-control" placeholder="Nomor telepon..." required onkeypress="return hanyaAngka(event)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" value="{{ $profile->email or '' }}" name="email" class="form-control" placeholder="Email..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                        <textarea class="form-control" rows="3" placeholder="Alamat lengkap..." name="alamat" required>{{ $profile->alamat or '' }}</textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan <i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ asset('assets/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.nonblock.js') }}"></script>

    <script type="text/javascript">
        $('.textarea').wysihtml5({
            "image": false
        });

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        @if (session('alert'))
            $(function () {
                new PNotify({
                    title: 'Success',
                    text: '{{ session('alert') }}',
                    type: 'success',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        @endif

        @if ($errors->any())
            $(function () {
                @if ($errors->has('tentang'))
                    var msg = "Sejarang dan Definisi Lembaga tidak boleh dikosongkan.";
                @elseif ($errors->has('sk_jurnal'))
                    var msg = "Persyaratan Penerbitan Jurnal tidak boleh dikosongkan.";
                @endif

                new PNotify({
                    title: 'Tidak dapat diproses.',
                    text: msg,
                    type: 'error',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        @endif
    </script>
@endsection