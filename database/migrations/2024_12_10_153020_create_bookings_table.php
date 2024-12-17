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
            $table->foreignId('user_id')->constrained('users')
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
};
