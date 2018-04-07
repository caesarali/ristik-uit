<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function peneliti() {
    	return $this->belongsTo('App\Peneliti');
    }
}
