<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Peneliti;

class PenelitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penelitis = Peneliti::paginate(8);
        // dd($penelitis);
        return view('dashboard.peneliti.list', compact('penelitis'));
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
            'name' => 'required|unique:peneliti'
        ]);

        Peneliti::create(['name' => request('name')]);

        return redirect()->route('peneliti.index')->with('alert', 'Data peneliti berhasil ditambahkan...');
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
    public function edit($id)
    {
        $peneliti = Peneliti::find($id);

        return view('dashboard.peneliti.edit', compact('peneliti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peneliti $peneliti)
    {
        $peneliti->update(['name' => request('name')]);

        return redirect()->route('peneliti.index')->with('alert', 'Perubahan berhasil disimpan...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peneliti::destroy($id);
        return redirect()->route('peneliti.index')->with('alert', 'Data peneliti berhasil dihapus...');
    }
}
