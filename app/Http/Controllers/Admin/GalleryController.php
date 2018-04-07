<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use File;

class GalleryController extends Controller
{
    public function index()
    {
    	$galleries = Gallery::orderBy('created_at', 'DESC')->paginate(6);
    	return view('dashboard.gallery.index', compact('galleries'));
    }

    public function upload(Request $request, Gallery $gallery)
    {
    	$request->validate([
    		'picture' => 'required',
    		'caption' => 'required|string'
    	]);

    	if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
    		$extension = $request->picture->extension();
    		$slug = str_slug($request->caption);
    		$filename = $slug . '.' . $extension;
    		$path = public_path('img/gallery');
            $store = $request->picture->move($path, $filename);
            Gallery::create([
            	'picture' => $filename,
            	'caption' => $request->caption
            ]);

            return redirect()->route('gallery.index')->withSuccess('Foto berhasil ditambahkan dalam gallery.');
    	}
    }

	public function fullPicture($id)
	{
		$picture = Gallery::find($id);
		return view('dashboard.gallery.picture', compact('picture'));
	}

	public function remove($id)
	{
		$gallery = Gallery::find($id);
		$path = public_path('img/gallery/'.$gallery->picture);
        File::delete($path);
        $gallery->delete();
        return redirect()->route('gallery.index')->withSuccess('Foto tidak lagi tersedia dalam Galeri.');
	}
}
