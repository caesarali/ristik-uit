<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redaksi extends Model
{
    protected $table = 'redaksi';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function jabatan() {
    	return $this->belongsTo(Jabatan::class);
    }
}
