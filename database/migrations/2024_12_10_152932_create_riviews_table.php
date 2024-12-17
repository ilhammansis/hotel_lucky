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
        Schema::create('riviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kamar_id')->constrained('kamars')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('rating',['1','2','3','4','5']);
            $table->text('komentar')->nullable();
            $table->date('tanggal_riview');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riviews');
    }
};
