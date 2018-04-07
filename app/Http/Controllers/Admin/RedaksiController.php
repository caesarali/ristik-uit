<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Jabatan;
use App\Redaksi;

class RedaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('dashboard.redaksi.index', compact('jabatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jabatan_id' => 'required',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Uploading
            $extension = $request->photo->extension();
            $filename = md5(time()) . '.' . $extension;
            $path = public_path('img/redaksi');
            $store = $request->photo->move($path, $filename);
            // Saving
            Redaksi::create([
                'name' => $request->name,
                'jabatan_id' => $request->jabatan_id,
                'last_edu' => $request->last_edu,
                'photo' => $filename,
            ]);
        } else {
            // Saving witout photo
            Redaksi::create([
                'name' => $request->name,
                'jabatan_id' => $request->jabatan_id,
                'last_edu' => $request->last_edu,
            ]);  
        }

        return redirect()->route('redaksi.index')->with('alert', 'Dewan Redaksi berhasil ditambahkan ke dalam Struktur Organisasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Redaksi $redaksi)
    {
        return view('dashboard.redaksi.photo', compact('redaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Redaksi $redaksi)
    {
        $jabatans = Jabatan::all();
        return view('dashboard.redaksi.edit', compact('jabatans', 'redaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Redaksi $redaksi)
    {
        $request->validate([
            'name' => 'required',
            'jabatan_id' => 'required',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Deleteing Old File
            if (!empty($redaksi->photo)) {
                $pathOld = public_path('img/redaksi/'.$redaksi->photo);
                File::delete($pathOld);
            }
            // Uploading
            $extension = $request->photo->extension();
            $filename = md5(time()) . '.' . $extension;
            $path = public_path('img/redaksi');
            $store = $request->photo->move($path, $filename);
            // Saving
            $redaksi->update([
                'name' => $request->name,
                'jabatan_id' => $request->jabatan_id,
                'last_edu' => $request->last_edu,
                'photo' => $filename,
            ]);
        } else {
            // Saving witout photo
            $redaksi->update([
                'name' => $request->name,
                'jabatan_id' => $request->jabatan_id,
                'last_edu' => $request->last_edu,
            ]);  
        }

        return redirect()->route('redaksi.index')->with('alert', 'Data Dewan Redaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $redaksi = Redaksi::find($id);
        $path = public_path('img/redaksi/'.$redaksi->photo);
        File::delete($path);
        $redaksi->delete();
        return redirect()->route('redaksi.index')->with('alert', 'Dewan Redaksi berhasil dihapus dari dalam Struktur Organisasi.');
    }
}
