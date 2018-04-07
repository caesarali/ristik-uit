<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jurnal;
use App\Peneliti;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnals = Jurnal::orderBy('created_at', 'DESC')->get();
        $penelitis = Peneliti::all();
        // dd($jurnals);
        return view('dashboard.jurnal.list', compact('jurnals', 'penelitis'));
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
            'judul' => 'required|unique:jurnal',
            'volume' => 'required|integer',
            'nomor' => 'required|integer',
            'tahun' => 'required|min:4|max:4'
        ]);

        $peneliti_id = $request->peneliti_id;
        if (isset($request->peneliti_name)) {
            $peneliti = $this->addPeneliti($request->peneliti_name);
            $peneliti_id = $peneliti->id;
        }

        Jurnal::create([
            'peneliti_id' => $peneliti_id,
            'judul' => $request->judul,
            'volume' => $request->volume,
            'nomor' => $request->nomor,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('jurnal.index')->with('alert', 'Jurnal berhasil ditambahkan ke dalam daftar Jurnal.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurnal $jurnal)
    {
        $penelitis = Peneliti::all();

        return view('dashboard.jurnal.edit', compact('jurnal', 'penelitis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        $request->validate([
            'peneliti_id' => 'required',
            'judul' => 'required',
            'volume' => 'required|integer',
            'nomor' => 'required|integer',
            'tahun' => 'required'
        ]);

        $jurnal->peneliti_id = $request->peneliti_id;
        $jurnal->judul = $request->get('judul', $jurnal->judul);
        $jurnal->volume = $request->volume;
        $jurnal->nomor = $request->nomor;
        $jurnal->tahun = $request->tahun;
        $jurnal->save();

        return redirect()->route('jurnal.index')->with('alert', 'Perubahan disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurnal::destroy($id);

        return redirect()->route('jurnal.index')->with('alert', 'Jurnal berhasil dihapus.');
    }

    private function addPeneliti($name)
    {
        $peneliti = Peneliti::create(['name' => $name]);

        return $peneliti;
    }
}
