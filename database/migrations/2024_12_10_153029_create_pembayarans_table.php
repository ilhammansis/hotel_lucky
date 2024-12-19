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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('kode_pembayaran')->unique();
            $table->decimal('jumlah_pembayaran',10,2);
            $table->date('tanggal_pembayaran');
            $table->enum('metode_pembayaran',['Cash','Transfer','QRIS']);
            $table->enum('status_pembayaran',['Selesai','Pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
