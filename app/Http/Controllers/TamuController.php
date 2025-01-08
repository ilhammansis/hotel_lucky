<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tamu']=Tamu::orderBy('nama','asc')->paginate(5);
        $data['judul']='Data Tamu Hotel';
        return view('tamu.tamu_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tamu.tamu_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:tamus,email',
            'no_hp'=>'required',
            'alamat'=>'required',
            'catatan'=>'nullable'
        ]);

        $tamu = new Tamu();
        $tamu->nama = $request->nama;
        $tamu->email = $request->email;
        $tamu->no_hp = $request->no_hp;
        $tamu->alamat = $request->alamat;
        $tamu->catatan = $request->catatan;
        $tamu->save();

        return redirect('/tamu')->with('Pesan','Data Sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['tamu'] = Tamu::find($id);
        return view('tamu.tamu_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:tamus,email,'.$id,
            'no_hp'=>'required',
            'alamat'=>'required',
            'catatan'=>'nullable'
        ]);

        $tamu = Tamu::find($id);
        $tamu->nama = $request->nama;
        $tamu->email = $request->email;
        $tamu->no_hp = $request->no_hp;
        $tamu->alamat = $request->alamat;
        $tamu->catatan = $request->catatan;
        $tamu->save();

        return redirect('/tamu')->with('Pesan','Data Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tamu = Tamu::find($id);
        $tamu->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }
    
}
