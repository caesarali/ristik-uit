@extends('dashboard.layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/upload.css') }}">
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
                Gallery
                <small>Dokumentasi kegiatan RISTIK</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Gallery</li>
            </ol>
        </section>

        {{-- Page Content --}}
        <section class="content">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload Foto <i class="fa fa-fw fa-upload" aria-hidden="true"></i></button>
                    </div>
                </div>
                @forelse($galleries as $gallery)
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header with-border" style="padding: 0; background-color: black;">
                                <img class="img-responsive center-block" style="height: 220px" src="{{ asset('img/gallery/'.$gallery->picture) }}">
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-xs btn-primary btn-view" data-route="{{ route('gallery.picture.full', $gallery->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs btn-delete" onclick="$('#del-pict-{{ $gallery->id }}').submit()">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <form id="del-pict-{{ $gallery->id }}" method="POST" action="{{ route('gallery.destroy', $gallery->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </div>
                            </div>
                            <div class="box-body text-center">
                                {{ $gallery->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center text-muted">
                        <h2><i>Belum ada foto dalam galeri.</i></h2>
                        <p>Silahkan klik tombol <b>"Upload Foto"</b> diatas, untuk menambahkan foto ke dalam Galeri.</p>
                    </div>
                @endforelse
                <div class="col-md-12 text-center">
                    {{ $galleries->links() }}
                </div>
            </div>
        </section>

        {{-- Modal Area --}}
        <section>
            <div id="upload" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-fw fa-upload"></i> Upload Foto</h4>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('gallery.upload') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Foto</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    Browse… <input type="file" id="imgInp" name="picture" required>
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-9">
                                        <img id='img-upload'/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Caption</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" name="caption" placeholder="Keterangan mengenai foto yang diupload..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Upload foto ini <i class="fa fa-fw fa-upload"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="view" class="modal fade" role="dialog">
                <div class="modal-dialog">
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

        $('.btn-view').click(function(event) {
            var route = $(this).data('route');
            $.get(route, function(data) {
                $('#view .modal-dialog').html(data);
                $('#view').modal('show');
            });
        });

        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });     
        });
    </script>
@endsection