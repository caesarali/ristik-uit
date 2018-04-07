<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    public function index()
    {
    	$profile = Profile::find(1);
    	return view('dashboard.profile.index', compact('profile'));
    }

    public function updateAboutUs(Request $request)
    {
        $request->validate([
            'tentang' => 'required'
        ]);

    	$profile = Profile::updateOrCreate(
    		['id' => 1],
    		['tentang' => request('tentang')]
    	);

    	return redirect()->route('profile.index')->with('alert', 'Definisi Lembaga berhasil diperbarui.');
    }

    public function updateRedaksi(Request $request)
    {
        $request->validate([
            'sk_jurnal' => 'required'
        ]);

        $profile = Profile::updateOrCreate(
            ['id' => 1],
            ['sk_jurnal' => request('sk_jurnal')]
        );

        return redirect()->route('profile.index')->with('alert', 'Persayaratan Penerbitan Jurnal berhasil diperbarui.');
    }

    public function updateContact(Request $request)
    {
	    $validator = $request->validate([
    		'alamat' => 'required|string',
    		'telp' => 'required|string',
    		'email' => 'required|string|email',
    	]);

    	$profile = Profile::updateOrCreate(
    		['id' => 1], $validator
    	);

    	return redirect()->route('profile.index')->with('alert', 'Data kontak berhasil diperbarui.');
    }
}
