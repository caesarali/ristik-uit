@extends('dashboard.layouts.app')

@section('style')
    <!-- PNotify -->
    <link href="{{ asset('assets/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        {{-- Page Header --}}
        <section class="content-header">
            <h1>
                Jurnal
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Jurnal</a></li>
                <li class="active">List Jurnal</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Jurnal yang terdaftar dalam RISTIK</h3>
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
                                <th>Peneliti</th>
                                <th>Judul Penelitian</th>
                                <th>Vol.</th>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jurnals as $jurnal)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $jurnal->peneliti->name }}</td>
                                    <td style="max-width: 600px">{{ $jurnal->judul }}</td>
                                    <td>{{ $jurnal->volume }}</td>
                                    <td>{{ $jurnal->nomor }}</td>
                                    <td>{{ $jurnal->tahun }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-flat btn-primary btn-sm btn-edit" data-route="{{ route('jurnal.edit', $jurnal->id) }}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-flat btn-danger btn-sm" onclick="confirmAlert('{{ $jurnal->id }}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form id="del-jurnal-{{ $jurnal->id }}" method="POST" action="{{ route('jurnal.destroy', $jurnal->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- Modal Area --}}
        <section>
            <div id="addJurnal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Jurnal Baru</h4>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('jurnal.store') }}">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nama Peneliti</label>
                                    <div class="col-md-8 peneliti">
                                        @if ($penelitis->count() === 0)
                                            <input type="text" name="peneliti_name" class="form-control" required>
                                        @else
                                            <div class="input-group">
                                                <select name="peneliti_id" class="form-control" required>
                                                    @foreach($penelitis as $peneliti)
                                                        @if ($loop->first)
                                                            <option value="">-- Pilih --</option>
                                                        @endif
                                                        <option value="{{ $peneliti->id }}">{{ $peneliti->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary btn-toggle" type="button" onclick="$('select[name=peneliti_id]').attr('disabled', 'disabled'); $('input[name=peneliti_name]').removeAttr('disabled')">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-8 peneliti" style="display: none;">
                                        <div class="input-group">
                                            <input type="text" name="peneliti_name" class="form-control" required disabled>
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger btn-toggle" type="button" onclick="$('input[name=peneliti_name]').attr('disabled', 'disabled'); $('select[name=peneliti_id]').removeAttr('disabled')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Judul Penelitian</label>
                                    <div class="col-md-8">
                                        <textarea name="judul" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Volume</label>
                                    <div class="col-md-5">
                                        <input type="text" name="volume" maxlength="2" class="form-control" required onkeypress="return hanyaAngka(event)" placeholder="Ex: 1-99">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nomor</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nomor" class="form-control" required maxlength="2" onkeypress="return hanyaAngka(event)" placeholder="Ex: 1-99">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tahun Terbit</label>
                                    <div class="col-md-5">
                                        <input type="text" name="tahun" class="form-control" required maxlength="4" minlength="4" onkeypress="return hanyaAngka(event)" placeholder="Ex: 20xx">
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-primary">
                                    <strong>Tambah Jurnal </strong><i class="fa fa-plus fa-fw"></i>
                                </button>
                                <button type="reset" class="btn">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="editJurnal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Jurnal Baru</h4>
                        </div>
                        <form class="form-horizontal">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- PNotify -->
    <script src="{{ asset('assets/pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('assets/pnotify/dist/pnotify.nonblock.js') }}"></script>

    <script type="text/javascript">
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function confirmAlert(formId) {
            var message = confirm("Hapus data jurnal ini ?");
            if (message === true) {
                $('#del-jurnal-'+formId).submit();
            }
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

        @if ($errors->has('judul'))
            $(function () {
                new PNotify({
                    title: 'Tidak dapat diproses.',
                    text: 'Judul penelitian tersebut sudah terdaftar sebagai jurnal sebelumnya.',
                    type: 'error',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });

            $(function () {
                new PNotify({
                    title: 'Info.',
                    text: 'Silahkan input kembali data jurnal yang belum terdaftar sebelumnya.',
                    type: 'info',
                    hide: true,
                    styling: 'bootstrap3',
                });
            });
        @endif

        $('.table').DataTable({
            'lengthChange': false,
            'ordering'    : false,
            'autoWidth'   : false
        });

        $(function () {
            var btnAdd = '<button class="btn btn-primary" data-toggle="modal" data-target="#addJurnal">Tambah Jurnal <i class="fa fa-fw fa-plus"></i></button>';
            $('.dataTables_wrapper div.col-sm-6').first().html(btnAdd);
        });

        $('.btn-edit').click(function(event) {
            var route = $(this).data('route');
            $.get(route, function(data) {
                $('#editJurnal form').remove();
                $('#editJurnal .box-header').after(data);
                $('#editJurnal').modal('show');
            });
        });

        $('.btn-toggle').click(function(event) {
            $('.peneliti').toggle();
        });

        $('button[type=reset]').click(function(event) {
            $('.modal').modal('hide');
        });
    </script>
@endsection