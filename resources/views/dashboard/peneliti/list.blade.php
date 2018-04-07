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
                Peneliti
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('jurnal.index') }}"><i class="fa fa-dashboard"></i> Jurnal</a></li>
                <li class="active">Peneliti</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Daftar Nama Peneliti dan Jurnal</h3>
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Total Jurnal</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penelitis as $peneliti)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $peneliti->name }}</td>
                                            <td>{{ $peneliti->jurnal->count() }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-edit btn-primary btn-flat btn-sm" data-route="{{ route('peneliti.edit', $peneliti->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger btn-flat btn-sm" onclick="document.getElementById('delete-peneliti-{{ $peneliti->id }}').submit()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <form id="delete-peneliti-{{ $peneliti->id }}" method="POST" action="{{ route('peneliti.destroy', $peneliti->id) }}">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="5">Belum ada peneliti...</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $penelitis->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Peneliti</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('peneliti.store') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama peneliti..." required value="{{ old('name') }}" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>Nama ini sudah terdaftar sebagai peneliti. <br> Gunakan Nama yang lain.</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">Tambahkan <i class="fa fa-fw fa-plus"></i></button>
                                <button type="reset" class="btn">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        {{-- Modal Area --}}
        <section>
            <div id="editPeneliti" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Peneliti</h4>
                        </div>
                        <form method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama peneliti..." required>
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan <i class="fa fa-fw fa-check"></i></button>
                                <button type="reset" class="btn">Batal</button>
                            </div>
                        </form>
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

        $('.btn-edit').click(function(event) {
            var route = $(this).data('route');
            $.get(route, function(data) {
                $('#editPeneliti form').remove();
                $('#editPeneliti .box-header').after(data);
                $('#editPeneliti').modal('show');
            });
        });
    </script>
@endsection