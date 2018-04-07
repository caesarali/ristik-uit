<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peneliti extends Model
{
    protected $table = 'peneliti';

    protected $fillable = ['name'];

    public function jurnal() {
    	return $this->hasMany('App\Jurnal');
    }
}
