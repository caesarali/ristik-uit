<form method="POST" action="{{ route('redaksi.update', $redaksi->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="box-body">
        <div class="col-md-8">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $redaksi->name }}" required>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan_id" required>
                    @foreach($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ ($jabatan->id === $redaksi->jabatan_id) ? 'selected' : '' }}>{{ $jabatan->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Pendidikan Terkahir</label>
                <input type="text" name="last_edu" class="form-control" value="{{ $redaksi->last_edu }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="photo" class="col-md-12" style="padding: 0">
                <img class="img-responsive" class="col-md-12" style="height: 160px; padding-top: 10px;" src="{{ isset($redaksi->photo) ? asset('img/redaksi/'.$redaksi->photo) : '' }}">
            </div>
        </div>
    </div>
    <div class="box-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan Perubahan <i class="fa fa-fw fa-check"></i></button>
        <button type="reset" class="btn" data-dismiss="modal">Batal</button>
    </div>
</form>