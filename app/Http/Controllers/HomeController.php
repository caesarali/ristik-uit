<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurnal;
use App\Profile;
use App\Jabatan;
use App\Gallery;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function jurnal()
    {
        $jurnals = Jurnal::all();
        return view('jurnal', compact('jurnals'));
    }

    public function profile()
    {
        $profile = Profile::find(1);
        return view('profile', compact('profile'));
    }

    public function strukturOrganisasi()
    {
        $jabatans = Jabatan::all();
        return view('struktur', compact('jabatans'));
    }

    public function contact() {
        $profile = Profile::find(1);
        return view('contact', compact('profile'));
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->paginate(9);
        return view('galeri', compact('galleries'));
    }
}
