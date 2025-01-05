<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['booking']=Booking::orderBy('kode_booking','asc')->paginate(5);
        $data['judul']='Booking';
        return view ('booking.booking_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_user'] = User::selectRaw("id,concat(role,'-',name) as tampil")
            ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',nama_kamar) as tampil")
            ->pluck('tampil','id');
        $data['list_status']=[
            'Konfirmasi','Pending','Selesai','Cancel'
        ];
        $data['list_pembayaran']=[
            'Cash','Transfer','QRIS'
        ];
        return view('booking.booking_create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'kamar_id'=>'required|exists:kamars,id',
            'kode_booking'=>'required|unique:bookings,kode_booking',
            'tanggal_check_in'=>'required',
            'tanggal_check_out'=>'required',
            'jumlah_tamu'=>'required',
            'total_harga'=>'required',
            'status'=>'required',
            'metode_pembayaran'=>'required'
        ]);
        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->kode_booking = $request->kode_booking;
        $booking->tanggal_check_in = $request->tanggal_check_in;
        $booking->tanggal_check_out = $request->tanggal_check_out;
        $booking->jumlah_tamu = $request->jumlah_tamu;
        $booking->total_harga = $request->total_harga;
        $booking->status = $request->status;
        $booking->metode_pembayaran = $request->metode_pembayaran;
        $booking->save();

        return redirect('/booking')->with('Pesan','Data Sudah Disimpan');
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
        $data['booking']=Booking::findOrFail($id);
        $data['list_user'] = User::selectRaw("id,concat(role,'-',name) as tampil")
            ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',nama_kamar) as tampil")
            ->pluck('tampil','id');
        $data['list_status']=[
            'Konfirmasi','Pending','Selesai','Cancel'
        ];
        $data['list_pembayaran']=[
            'Cash','Transfer','QRIS'
        ];
        return view('booking.booking_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'kamar_id'=>'required|exists:kamars,id',
            'kode_booking'=>'required|unique:bookings,kode_booking,' .$id,
            'tanggal_check_in'=>'required',
            'tanggal_check_out'=>'required',
            'jumlah_tamu'=>'required',
            'total_harga'=>'required',
            'status'=>'required',
            'metode_pembayaran'=>'required'
        ]);
        $booking = Booking::findOrFail($id);
        $booking->user_id = $request->user_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->kode_booking = $request->kode_booking;
        $booking->tanggal_check_in = $request->tanggal_check_in;
        $booking->tanggal_check_out = $request->tanggal_check_out;
        $booking->jumlah_tamu = $request->jumlah_tamu;
        $booking->total_harga = $request->total_harga;
        $booking->status = $request->status;
        $booking->metode_pembayaran = $request->metode_pembayaran;
        $booking->save();

        return redirect('/booking')->with('Pesan','Data Sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking=Booking::findOrFail($id);
        $booking->delete();
        return back()->with('Pesan','Data Sudah Dihapus');
    }
}
