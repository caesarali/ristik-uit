<form method="POST" action="{{ route('peneliti.update', $peneliti->id) }}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="box-body">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $peneliti->name }}" placeholder="Masukkan nama peneliti..." required>
        </div>
    </div>
    <div class="box-footer text-right">
        <button type="submit" class="btn btn-primary">Simpan Perubahan <i class="fa fa-fw fa-check"></i></button>
        <button class="btn" data-dismiss="modal">Batal</button>
    </div>
</form>