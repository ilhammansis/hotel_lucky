<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pembayaran']=Pembayaran::orderBy('kode_pembayaran','asc')->paginate(5);
        $data['judul']='Data Pembayaran';
        return view('pembayaran.pembayaran_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_pembayaran']=[
            'Cash','Transfer','QRIS'];
        $data['list_status']=[
            'Selesai','Pending'];
        $data['list_booking'] = Booking::selectRaw("id,kode_booking as tampil")
            ->pluck('tampil','id');
        return view('pembayaran.pembayaran_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id'=>'required|exists:bookings,id',
            'kode_pembayaran'=>'required|unique:pembayarans,kode_pembayaran',
            'jumlah_pembayaran'=>'required',
            'tanggal_pembayaran'=>'required',
            'metode_pembayaran'=>'required',
            'status_pembayaran'=>'required',
        ]);
        $pembayaran = new Pembayaran();
        $pembayaran->booking_id = $request->booking_id;
        $pembayaran->kode_pembayaran = $request->kode_pembayaran;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->metode_pembayaran = $request->metode_pembayaran;
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

        return redirect('/pembayaran')->with('Pesan','Data Sudah Disimpan');
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
        $data['pembayaran'] = Pembayaran::findOrFail($id);
        $data['list_pembayaran']=[
            'Cash','Transfer','QRIS'];
        $data['list_status']=[
            'Selesai','Pending'];
        $data['list_booking'] = Booking::selectRaw("id,kode_booking as tampil")
            ->pluck('tampil','id');
        return view('pembayaran.pembayaran_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'booking_id'=>'required|exists:bookings,id',
            'kode_pembayaran'=>'required|unique:pembayarans,kode_pembayaran,'.$id,
            'jumlah_pembayaran'=>'required',
            'tanggal_pembayaran'=>'required',
            'metode_pembayaran'=>'required',
            'status_pembayaran'=>'required',
        ]);
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->booking_id = $request->booking_id;
        $pembayaran->kode_pembayaran = $request->kode_pembayaran;
        $pembayaran->jumlah_pembayaran = $request->jumlah_pembayaran;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran;
        $pembayaran->metode_pembayaran = $request->metode_pembayaran;
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

        return redirect('/pembayaran')->with('Pesan','Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran=Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }
}
