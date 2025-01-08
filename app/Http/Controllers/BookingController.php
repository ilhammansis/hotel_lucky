<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Booking;
use App\Models\TipeKamar;
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
        $data['list_tamu'] = Tamu::selectRaw("id,nama as tampil")
            ->pluck('tampil','id');
        $data['list_harga'] = Kamar::where('status', 'Tersedia')
            ->get()
            ->mapWithKeys(function($item) {
                $formattedHarga = number_format($item->harga_permalam, 0, ',', '.');
                return [
                            $item->id => $item->nama_kamar . ' - ' . $formattedHarga
                        ];
        });
        $data['list_kamar'] = Kamar::join('tipe_kamars', 'kamars.tipekamar_id', '=', 'tipe_kamars.id')
            ->selectRaw("kamars.id, concat(kamars.nomor_kamar, ' - ', tipe_kamars.tipekamar, ' - ', kamars.nama_kamar) as tampil")
            ->where('kamars.status', 'Tersedia')
            ->pluck('tampil', 'kamars.id');

        $data['list_status']=[
            'Konfirmasi','Pending','Selesai','Cancel'];
        $data['list_pembayaran']=[
            'Cash','Transfer','QRIS'];
        return view('booking.booking_create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tamu_id'=>'required|exists:tamus,id',
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
        $booking->tamu_id = $request->tamu_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->kode_booking = $request->kode_booking;
        $booking->tanggal_check_in = $request->tanggal_check_in;
        $booking->tanggal_check_out = $request->tanggal_check_out;
        $booking->jumlah_tamu = $request->jumlah_tamu;
        $booking->total_harga = $request->total_harga;
        $booking->status = $request->status;
        $booking->metode_pembayaran = $request->metode_pembayaran;
        $booking->save();

        $kamar = Kamar::findOrFail($request->kamar_id);
        $tipeKamar = TipeKamar::findOrFail($kamar->tipekamar_id);
        if ($request->status == 'Konfirmasi' || $request->status == 'Pending') {
            if ($tipeKamar->stok_kamar > 0) {
                $tipeKamar->stok_kamar -= 1;
                $tipeKamar->save();
            }
        }

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
        $data['list_tamu'] = Tamu::selectRaw("id,nama as tampil")
            ->pluck('tampil','id');
        $data['list_harga'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',harga_permalam) as tampil")
            ->where('status', 'Tersedia')
            ->pluck('tampil','id');
        $data['list_kamar'] = Kamar::selectRaw("id,concat(nomor_kamar,'-',nama_kamar) as tampil")
            ->where('status', 'Tersedia')
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
            'tamu_id'=>'required|exists:tamus,id',
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
        $previousStatus = $booking->status;
        $booking->tamu_id = $request->tamu_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->kode_booking = $request->kode_booking;
        $booking->tanggal_check_in = $request->tanggal_check_in;
        $booking->tanggal_check_out = $request->tanggal_check_out;
        $booking->jumlah_tamu = $request->jumlah_tamu;
        $booking->total_harga = $request->total_harga;
        $booking->status = $request->status;
        $booking->metode_pembayaran = $request->metode_pembayaran;
        $booking->save();

        $kamar = Kamar::findOrFail($request->kamar_id);
        $tipeKamar = TipeKamar::findOrFail($kamar->tipekamar_id);
        if (($previousStatus == 'Selesai' || $previousStatus == 'Cancel') && ($request->status != 'Selesai' && $request->status != 'Cancel')) {
            return redirect('/booking')->with('Pesan', 'Status sudah diubah, stok kamar tidak akan ditambah lagi.');
        }
        if ($request->status == 'Selesai' || $request->status == 'Cancel') {
            $tipeKamar->stok_kamar += 1;
            $tipeKamar->save();
        }
        if ($request->status == 'Konfirmasi' || $request->status == 'Pending') {
            if ($tipeKamar->stok_kamar > 0) {
                $tipeKamar->stok_kamar -= 1;
                $tipeKamar->save();
            }
        }
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

    public function updateStokKamarTerlampaui()
    {
        $today = now();
        $bookings = Booking::where('tanggal_check_out', '<', $today)
                ->whereIn('status', ['Pending', 'Konfirmasi'])
                ->get();

        foreach ($bookings as $booking) {
            $kamar = Kamar::findOrFail($booking->kamar_id);
            $tipeKamar = TipeKamar::findOrFail($kamar->tipekamar_id);
            $tipeKamar->stok_kamar += 1;
            $tipeKamar->save();

            $booking->status = 'Expired';
            $booking->save();
        }

        return redirect('/booking')->with('Pesan', 'Stok kamar berhasil diperbarui.');
    }


}
