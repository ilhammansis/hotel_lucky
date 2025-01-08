<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tamu_id')->constrained('tamus')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kamar_id')->constrained('kamars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_booking',15)->unique();
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out');
            $table->integer('jumlah_tamu')->default('1');
            $table->decimal('total_harga',10,2);
            $table->enum('status',['Konfirmasi','Pending','Selesai','Cancel']);
            $table->enum('metode_pembayaran',['Cash','Transfer','QRIS']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
    class BookingController extends Controller
{
    public function create()
    {
        $kamars = Kamar::where('status', 'Tersedia')->get(); // Mengambil kamar yang tersedia
        return view('booking.create', compact('kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_check_in' => 'required|date',
            'tanggal_check_out' => 'required|date',
            'kamar_id' => 'required|exists:kamars,id',
            'jumlah_tamu' => 'required|integer|min:1',
        ]);

        $kamar = Kamar::findOrFail($request->kamar_id);
        $total_harga = $kamar->harga_permalam * (strtotime($request->tanggal_check_out) - strtotime($request->tanggal_check_in)) / 86400;

        Booking::create([
            'tamu_id' => auth()->user()->tamu_id, // Sesuaikan dengan user yang login
            'kamar_id' => $request->kamar_id,
            'kode_booking' => strtoupper(str_random(10)),
            'tanggal_check_in' => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'jumlah_tamu' => $request->jumlah_tamu,
            'total_harga' => $total_harga,
            'status' => 'Pending',
            'metode_pembayaran' => 'Cash', // Bisa ditambahkan opsi pembayaran lain
        ]);

        return redirect()->route('booking.success');
    }
};
