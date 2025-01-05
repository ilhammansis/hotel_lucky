<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['tipe_kamar'] = TipeKamar::orderBy('id', 'asc')->paginate(10);
        $data['judul'] = 'Data Tipe Kamar Hotel Lucky';
        return view('tipekamar.tipe_kamar_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_tipe_kamar'] = [
            'Single Room',
            'Double Room',
            'Twin Room',
            'Triple Room',
            'Suite Room',
            'Deluxe Room',
            'Family Room',
            'Connecting Room',
            'Presidential Suite'
        ];
        return view('tipekamar.tipe_kamar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipekamar'=>'required',
            'harga_dasar'=>'required',
            'kapasitas'=>'required'
        ],
        [
            'tipekamar.required'=>'*Tipe Kamar Belum Anda Pilih!',
            'harga_dasar.required'=>'*Harga Tipe Kamar Belum Anda Inputkan!',
            'kapasitas.required'=>'*Kapasitas Kamar Belum Anda Inputkan!'
        ]
    );
        $tipe_kamar = new TipeKamar();
        $tipe_kamar->tipekamar = $request->tipekamar;
        $tipe_kamar->deskripsi = $request->deskripsi;
        $tipe_kamar->harga_dasar = $request->harga_dasar;
        $tipe_kamar->kapasitas = $request->kapasitas;
        $tipe_kamar->save();

        return redirect('/tipekamar')->with('Pesan', 'Data Sudah Disimpan');
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
        $data['tipe_kamar']=TipeKamar::findOrFail($id);
        $data['list_tipe_kamar']=[
            'Single Room',
            'Double Room',
            'Twin Room',
            'Triple Room',
            'Suite Room',
            'Deluxe Room',
            'Family Room',
            'Connecting Room',
            'Presidential Suite'
        ];
        return view('tipekamar.tipe_kamar_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipekamar'=>'required',
            'harga_dasar'=>'required',
            'kapasitas'=>'required'
        ]);

        $tipe_kamar = TipeKamar::findOrFail($id);
        $tipe_kamar->tipekamar = $request->tipekamar;
        $tipe_kamar->deskripsi = $request->deskripsi;
        $tipe_kamar->harga_dasar = $request->harga_dasar;
        $tipe_kamar->kapasitas = $request->kapasitas;
        $tipe_kamar->save();

        return redirect('/tipekamar')->with('Pesan', 'Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipe_kamar = TipeKamar::findOrFail($id);
        $tipe_kamar->delete();
        return back()->with('Pesan', 'Data Sudah Dihapus');
    }
}
