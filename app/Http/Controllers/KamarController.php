<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kamar']=Kamar::orderBy('nomor_kamar','asc')->paginate(5);
        $data['judul']='Data Kamar Hotel';

        return view('kamar.kamar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_status']=[
            'Tersedia',
            'Dipesan',
            'Dibersihkan'
        ];

        $data['list_tipekamar'] = TipeKamar::selectRaw("id,concat('- ',tipekamar,' -') as tampil")
            ->pluck('tampil','id');
        return view('kamar.kamar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar'=>'required|unique:kamars,nomor_kamar',
            'nama_kamar'=>'required',
            'tipekamar_id'=>'required|exists:tipe_kamars,id',
            'harga_permalam'=>'required|numeric',
            'status'=>'required',
            'deskripsi'=>'nullable',
            'fasilitas'=>'nullable',
            'foto_kamar'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $kamar = new Kamar();
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->tipekamar_id = $request->tipekamar_id;
        $kamar->harga_permalam = $request->harga_permalam;
        $kamar->status = $request->status;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->foto_kamar = $request->foto_kamar;

        if ($request->hasFile('foto_kamar')) {
            $foto_kamar = $request->file('foto_kamar');
            $foto_path = $foto_kamar->store('foto_kamars', 'public');
            $kamar->foto_kamar = $foto_path;
        }
        $kamar->save();

        return redirect('/kamar')->with('Pesan','Data Sudah Disimpan');
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
        $data['kamar']= Kamar::findOrFail($id);
        $data['list_tipekamar'] = TipeKamar::selectRaw("id,concat('- ',tipekamar,' -') as tampil")
            ->pluck('tampil','id');
        $data['list_status']=[
                'Tersedia',
                'Dipesan',
                'Dibersihkan'
        ];

        return view('kamar.kamar_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomor_kamar'=>'required|unique:kamars,nomor_kamar,'.$id,
            'nama_kamar'=>'required',
            'tipekamar_id'=>'required|exists:tipe_kamars,id',
            'harga_permalam'=>'required|numeric',
            'status'=>'required',
            'deskripsi'=>'nullable',
            'fasilitas'=>'nullable',
            'foto_kamar'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $kamar = Kamar::findOrFail($id);
        $kamar->nomor_kamar = $request->nomor_kamar;
        $kamar->nama_kamar = $request->nama_kamar;
        $kamar->tipekamar_id=$request->tipekamar_id;
        $kamar->harga_permalam = $request->harga_permalam;
        $kamar->status = $request->status;
        $kamar->deskripsi = $request->deskripsi;
        $kamar->fasilitas = $request->fasilitas;
        $kamar->foto_kamar = $request->foto_kamar;

        if ($request->hasFile('foto_kamar')) {
            if ($kamar->foto_kamar) {
                Storage::delete('public/' . $kamar->foto_kamar);
            }
            $foto_kamar = $request->file('foto_kamar');
            $foto_path = $foto_kamar->store('foto_kamars', 'public');
            $kamar->foto_kamar = $foto_path;
        }
        $kamar->save();

        return redirect('/kamar')->with('Pesan','Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }


}
