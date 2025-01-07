<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Riview;
use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;

class RiviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['riview']=Riview::orderBy('tanggal_riview','asc')->paginate(5);
        $data['judul']='Data Ulasan Tamu';
        return view('riview.riview_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_rating'] = [
            '1','2','3','4','5'
        ];
        $data['list_tamu'] = Tamu::selectRaw("id,nama as tampil")
        ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',nama_kamar) as tampil")
            ->pluck('tampil','id');
        return view('riview.riview_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tamu_id'=>'required|exists:tamus,id',
            'kamar_id'=>'required|exists:kamars,id',
            'rating'=>'required',
            'komentar'=>'nullable',
            'tanggal_riview'=>'required'
        ]);
        $riview = new Riview();
        $riview->tamu_id = $request->tamu_id;
        $riview->kamar_id = $request->kamar_id;
        $riview->rating = $request->rating;
        $riview->komentar = $request->komentar;
        $riview->tanggal_riview = $request->tanggal_riview;
        $riview->save();

        return redirect('/riview')->with('Pesan','Data Sudah Disimpan');
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
        $data['riview']=Riview::findOrFail($id);
        $data['list_rating'] = [
            '1','2','3','4','5'
        ];
        $data['list_tamu'] = Tamu::selectRaw("id,nama as tampil")
        ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',nama_kamar) as tampil")
            ->pluck('tampil','id');
        return view('riview.riview_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tamu_id'=>'required|exists:tamus,id',
            'kamar_id'=>'required|exists:kamars,id',
            'rating'=>'required',
            'komentar'=>'nullable',
            'tanggal_riview'=>'required'
        ]);
        $riview = Riview::findOrFail($id);
        $riview->tamu_id = $request->tamu_id;
        $riview->kamar_id = $request->kamar_id;
        $riview->rating = $request->rating;
        $riview->komentar = $request->komentar;
        $riview->tanggal_riview = $request->tanggal_riview;
        $riview->save();

        return redirect('/riview')->with('Pesan','Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $riview=Riview::findOrFail($id);
        $riview->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }
}
