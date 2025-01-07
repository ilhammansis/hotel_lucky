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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('booking_id')->constrained('bookings')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pembayaran_id')->constrained('pembayarans')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kamar_id')->constrained('kamars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('tipekamar_id')->constrained('tipe_kamars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_transaksi');
            $table->decimal('total_harga',10,2);
            $table->enum('status_transaksi',['Berhasil','Pending','Gagal']);
            $table->enum('metode_transaksi',['Cash','Transfer','QRIS','Kartu Kredit','Debit']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
