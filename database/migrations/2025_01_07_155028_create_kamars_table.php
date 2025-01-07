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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipekamar_id')->constrained('tipe_kamars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('nomor_kamar')->unique();
            $table->string('nama_kamar');
            $table->decimal('harga_permalam',10,2);
            $table->enum('status',['Tersedia','Dipesan','Dibersihkan'])->default('Tersedia');
            $table->text('deskripsi')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('foto_kamar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
