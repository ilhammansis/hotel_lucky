<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Riview;
use App\Models\User;
use Illuminate\Http\Request;

class RiviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['riview']=Riview::all();
        $data['judul']='Data Riview';
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
        $data['list_user'] = User::selectRaw("id,concat(role,'-',name) as tampil")
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
            'user_id'=>'required|exists:users,id',
            'kamar_id'=>'required|exists:kamars,id',
            'rating'=>'required',
            'komentar'=>'nullable',
            'tanggal_riview'=>'required'
        ]);
        $riview = new Riview();
        $riview->user_id = $request->user_id;
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
        $data['list_user'] = User::selectRaw("id,concat(role,'-',name) as tampil")
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
            'user_id'=>'required|exists:users,id',
            'kamar_id'=>'required|exists:kamars,id',
            'rating'=>'required',
            'komentar'=>'nullable',
            'tanggal_riview'=>'required'
        ]);
        $riview = Riview::findOrFail($id);
        $riview->user_id = $request->user_id;
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
