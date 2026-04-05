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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            
            // Penghubung ke Data Customer (Pemilik)
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            
            // Nama Pemilik (Kita simpan juga biar mudah menampilkannya)
            $table->string('pemilik'); 
            
            // --- Sesuai Inputan APK ---
            $table->string('plat');          // Nomor Polisi
            $table->string('model');         // Model/Tipe Mobil (Gabungan Merk & Tipe)
            $table->string('tahun')->nullable(); // Opsional
            $table->string('warna')->nullable(); // Opsional (Kolom Baru)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};