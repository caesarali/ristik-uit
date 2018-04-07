<form class="form-horizontal" method="POST" action="{{ route('jurnal.update', $jurnal->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="box-body">
        <div class="form-group">
            <label class="col-md-3 control-label">Nama Peneliti</label>
            <div class="col-md-8">
                @if ($penelitis->count() === 0)
                    <input type="text" name="peneliti_name" class="form-control" required>
                @else
                    <select name="peneliti_id" class="form-control" required>
                        @forelse($penelitis as $peneliti)
                            <option value="{{ $peneliti->id }}" {{ ($peneliti->id === $jurnal->peneliti_id) ? 'selected' : '' }}>{{ $peneliti->name }}</option>
                        @empty
                            <option>Belum ada peneliti....</option>
                        @endforelse
                    </select>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Judul Penelitian</label>
            <div class="col-md-8">
                <textarea name="judul" class="form-control" rows="3" required>{{ $jurnal->judul }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Volume</label>
            <div class="col-md-5">
                <input type="text" name="volume" class="form-control" value="{{ $jurnal->volume }}" required maxlength="2" onkeypress="return hanyaAngka(event)" placeholder="Ex: 1-99">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Nomor</label>
            <div class="col-md-5">
                <input type="text" name="nomor" class="form-control" value="{{ $jurnal->nomor }}" required maxlength="2" onkeypress="return hanyaAngka(event)" placeholder="Ex: 1-99">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Tahun Terbit</label>
            <div class="col-md-5">
                <input type="text" name="tahun" class="form-control" value="{{ $jurnal->tahun }}" required maxlength="4" onkeypress="return hanyaAngka(event)" placeholder="Ex: 20xx">
            </div>
        </div>
    </div>
    <div class="box-footer text-right">
        <button type="submit" class="btn btn-primary">
            <strong>Simpan Perubahan </strong><i class="fa fa-pencil fa-fw"></i>
        </button>
        <button type="reset" class="btn" data-dismiss="modal">
            Batal
        </button>
    </div>
</form>