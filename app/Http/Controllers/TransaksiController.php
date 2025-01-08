<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\Booking;
use App\Models\TipeKamar;
use App\Models\Transaksi;
use App\Models\Pembayaran;
use App\Models\Tamu;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::orderBy('tanggal_transaksi','asc')->paginate(5);
        $data['judul'] = 'Data Transaksi';
        return view('transaksi.transaksi_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_transaksi'] = [
            'Cash','Transfer','QRIS','Kartu Kredit','Debit'
        ];
        $data['list_status'] = [
            'Berhasil','Pending','Gagal'
        ];
        $data['list_booking'] = Booking::selectRaw("id,kode_booking as tampil")
            ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::whereHas('booking', function($query){
                $query->where('status','Konfirmasi');
            })
            ->selectRaw("id,nama_kamar as tampil")
            ->pluck('tampil','id');
        $data['list_tipekamar'] = TipeKamar::whereHas('kamar', function($query){
                $query->whereHas('booking', function($query){
                    $query->where('status','Konfirmasi');
                });
            })
            ->selectRaw("id,tipekamar as tampil")
            ->pluck('tampil','id');
        $data['list_tamu'] = Tamu::whereHas('booking')
            ->selectRaw("id,nama as tampil")
            ->pluck('tampil','id');
        $data['list_pembayaran'] = Pembayaran::selectRaw("id,kode_pembayaran as tampil")
            ->pluck('tampil','id');
        return view('transaksi.transaksi_create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tamu_id'=>'required|exists:tamus,id',
            'booking_id'=>'required|exists:bookings,id',
            'pembayaran_id'=>'required|exists:pembayarans,id',
            'kamar_id'=>'required|exists:kamars,id',
            'tipekamar_id'=>'required|exists:tipe_kamars,id',
            'tanggal_transaksi'=>'required',
            'total_harga'=>'required',
            'status_transaksi'=>'required',
            'metode_transaksi'=>'required',
        ]);

        $pembayaran = new Transaksi();
        $pembayaran->tamu_id = $request->tamu_id;
        $pembayaran->booking_id = $request->booking_id;
        $pembayaran->pembayaran_id = $request->pembayaran_id;
        $pembayaran->kamar_id = $request->kamar_id;
        $pembayaran->tipekamar_id = $request->tipekamar_id;
        $pembayaran->tanggal_transaksi = $request->tanggal_transaksi;
        $pembayaran->total_harga = $request->total_harga;
        $pembayaran->status_transaksi = $request->status_transaksi;
        $pembayaran->metode_transaksi = $request->metode_transaksi;
        $pembayaran->save();

        return redirect('/transaksi')->with('Pesan','Data Sudah Disimpan');
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
        $data['transaksi'] = Transaksi::findOrFail($id);
        $data['list_transaksi'] = [
            'Cash','Transfer','QRIS','Kartu Kredit','Debit'
        ];
        $data['list_status'] = [
            'Berhasil','Pending','Gagal'
        ];
        $data['list_booking'] = Booking::selectRaw("id,kode_booking as tampil")
            ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::whereHas('booking', function($query){
                $query->where('status','Konfirmasi');
            })
            ->selectRaw("id,nama_kamar as tampil")
            ->pluck('tampil','id');
            $data['list_tipekamar'] = TipeKamar::whereHas('kamar', function($query){
                $query->whereHas('booking', function($query){
                    $query->where('status','Konfirmasi');
                });
            })
            ->selectRaw("id,tipekamar as tampil")
            ->pluck('tampil','id');
        $data['list_tamu'] = Tamu::whereHas('booking')
            ->selectRaw("id,nama as tampil")
            ->pluck('tampil','id');
        $data['list_pembayaran'] = Pembayaran::selectRaw("id,kode_pembayaran as tampil")
            ->pluck('tampil','id');
        return view('transaksi.transaksi_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tamu_id'=>'required|exists:tamus,id',
            'booking_id'=>'required|exists:bookings,id',
            'pembayaran_id'=>'required|exists:pembayarans,id',
            'kamar_id'=>'required|exists:kamars,id',
            'tipekamar_id'=>'required|exists:tipe_kamars,id',
            'tanggal_transaksi'=>'required',
            'total_harga'=>'required',
            'status_transaksi'=>'required',
            'metode_transaksi'=>'required',
        ]);

        $pembayaran = Transaksi::findOrFail($id);
        $pembayaran->tamu_id = $request->tamu_id;
        $pembayaran->booking_id = $request->booking_id;
        $pembayaran->pembayaran_id = $request->pembayaran_id;
        $pembayaran->kamar_id = $request->kamar_id;
        $pembayaran->tipekamar_id = $request->tipekamar_id;
        $pembayaran->tanggal_transaksi = $request->tanggal_transaksi;
        $pembayaran->total_harga = $request->total_harga;
        $pembayaran->status_transaksi = $request->status_transaksi;
        $pembayaran->metode_transaksi = $request->metode_transaksi;
        $pembayaran->save();
        return redirect('/transaksi')->with('Pesan','Data Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran = Transaksi::findOrFail($id);
        $pembayaran->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
        $transaksi = Transaksi::where('status_transaksi', 'Berhasil')->get();
        $judul = "Laporan Transaksi";

        return view('transaksi.transaksi_laporan', compact('transaksi', 'judul'));
    }

    public function home()
{

    $data['total_transaksi'] = Transaksi::count();
    $data['transaksi_berhasil'] = Transaksi::where('status_transaksi', 'Berhasil')->count();
    $data['transaksi_pending'] = Transaksi::where('status_transaksi', 'Pending')->count();
    $data['transaksi_gagal'] = Transaksi::where('status_transaksi', 'Gagal')->count();
    $data['pendapatan_total'] = Transaksi::where('status_transaksi', 'Berhasil')->sum('total_harga');

    return view('dashboard', $data);
}


}
