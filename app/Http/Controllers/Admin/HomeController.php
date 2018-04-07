<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jurnal;
use App\Peneliti;
use App\Redaksi;
use App\Gallery;

class HomeController extends Controller
{
    public function index()
    {
    	$jurnal = Jurnal::count();
    	$peneliti = Peneliti::count();
    	$redaksi = Redaksi::count();
    	$gallery = Gallery::count();
    	return view('dashboard.home', compact('jurnal', 'peneliti', 'redaksi', 'gallery'));
    }
}
