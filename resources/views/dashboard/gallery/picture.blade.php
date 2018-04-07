<div class="box box-primary">
    <div class="box-header" style="padding: 0; background-color: black">
        <img class="img-responsive center-block" src="{{ asset('img/gallery/'.$picture->picture) }}">
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-danger btn-xs btn-delete" data-dismiss="modal">
                <i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="box-body text-center">
        <h4><b><i>{{ $picture->caption }}</i></b></h4>
    </div>
</div>