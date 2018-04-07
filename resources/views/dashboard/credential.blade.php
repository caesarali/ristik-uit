@extends('dashboard.layouts.app')

@section('style')
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
                Password
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li class="active">Password</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Change Password</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                    <label class="col-sm-4 control-label">Password Lama</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="current_password" class="form-control" placeholder="Masukkan passsword saat ini..">
                                        <span class="help-block">{{ $errors->first('current_password') }}</span>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-sm-4 control-label">Password Baru</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control" placeholder="Masukkan password baru..">
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="col-sm-4 control-label">Konfirmasi Password Baru</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan kembali password baru..">
                                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                                <button type="reset" class="btn btn-default">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Reset Password to Defult</h3>
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
                            <p>Kebalikan Password ke pengaturan awal. Klik tombol Reset Password di bawah ini :</p>
                            <form method="POST" action="{{ route('password.reset') }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <button class="btn btn-warning" type="submit">Reset Password <i class="fa fa-refresh fa-fw"></i></button>
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
    <!-- PNotify -->
    <script src="{{ asset('assets/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.nonblock.js') }}"></script>

    <script type="text/javascript">
        @if (session()->has('success'))
            $(function () {
                new PNotify({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    type: 'success',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        @endif
    </script>
@endsection