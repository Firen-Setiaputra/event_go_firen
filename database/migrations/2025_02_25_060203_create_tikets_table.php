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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('nama_tiket',['vip','regular','early_bird']);
            $table->integer('harga_tiket');
            $table->integer('kuota_maksimum');
            $table->enum('status',['tersedia','habis']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
