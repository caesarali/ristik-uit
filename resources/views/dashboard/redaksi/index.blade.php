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
                Dewan Redaksi
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dewan Redaksi</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Struktur Organisasi</h3>
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
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Error!</h4>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addRedaksi">
                                    Tambah Dewan Redaksi <i class="fa fa-fw fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pendidikan Terkahir</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($jabatans as $jabatan)
                                @forelse ($jabatan->redaksi as $redaksi)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td class="text-center">
                                            @if (!empty($redaksi->photo))
                                            <button class="btn btn-link btn-view" data-route="{{ route('redaksi.show', $redaksi->id) }}"><b>Lihat foto</b></button>
                                            @else
                                            <span class="text-muted"><i>Belum ada foto</i></span>
                                            @endif
                                        </td>
                                        <td>{{ $redaksi->name }}</td>
                                        <td>{{ $redaksi->jabatan->name }}</td>
                                        <td>{!! $redaksi->last_edu or '<span class="text-muted"><i>Kosong</i></span>' !!}</td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-flat btn-sm btn-edit" data-route="{{ route('redaksi.edit', $redaksi->id) }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger btn-flat btn-sm" onclick="confirmAlert({{ $redaksi->id }})">
                                                <i class="fa fa-fw fa-trash"></i>
                                            </button>
                                            <form id="del-redaksi-{{ $redaksi->id }}" method="POST" action="{{ route('redaksi.destroy', $redaksi->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td class="text-center"><span class="text-muted"><i>Kosong</i></span></td>
                                        <td><span class="text-muted"><i>Posisi masih kosong...</i></span></td>
                                        <td>{{ $jabatan->name }}</td>
                                        <td><span class="text-muted"><i>Kosong</i></span></td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-flat btn-sm btn-add" data-jabatan="{{ $jabatan->id }}"><i class="fa fa-fw fa-plus"></i></button>
                                            <button class="btn btn-danger btn-flat btn-sm" disabled><i class="fa fa-fw fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforelse
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- Modal Area --}}
        <section>
            <div id="addRedaksi" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Dewan Redaksi</h4>
                        </div>
                        <form method="POST" action="{{ route('redaksi.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan_id" required>
                                            @foreach($jabatans as $jabatan)
                                                @if ($loop->first)
                                                    <option value="">-- Pilih Jabatan --</option>
                                                @endif
                                                <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan Terkahir</label>
                                        <input type="text" name="last_edu" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="photo" class="col-md-12" style="padding: 0">
                                    </div>
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
            <div id="editRedaksi" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Dewan Redaksi</h4>
                        </div>
                        <form>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div id="viewPhoto" class="modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
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

        function confirmAlert(formId) {
            var message = confirm("Hapus dari susunan Struktur Organisasi ?");
            if (message === true) {
                $('#del-redaksi-'+formId).submit()
            }
        }

        $('.btn-add').click(function(event) {
            $('#addRedaksi select').val($(this).data('jabatan'));
            $('#addRedaksi').modal('show');
        });

        $('.btn-edit').click(function(event) {
            var route = $(this).data('route');
            $.get(route, function(data) {
                $('#editRedaksi form').remove();
                $('#editRedaksi .box-header').after(data);
                $('#editRedaksi').modal('show');
            });
        });

        $('.btn-view').click(function(event) {
            var route = $(this).data('route');
            $.get(route, function(data) {
                // console.log(data);
                $('#viewPhoto .modal-dialog').html(data);
                $('#viewPhoto').modal('show');
            });
        });

        $('button[type=reset]').click(function(event) {
            $('.modal').modal('hide');
        });
    </script>
@endsection