<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';

    protected $fillable = ['tentang', 'alamat', 'telp', 'email', 'sk_jurnal'];
}
