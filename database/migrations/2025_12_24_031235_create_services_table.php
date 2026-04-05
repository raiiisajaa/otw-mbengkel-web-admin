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
Schema::create('services', function (Blueprint $table) {
            $table->id(); // ID Unik (1, 2, 3...)
            
            // Kolom Data Kita
            $table->string('nama_layanan');       // Contoh: Ganti Oli
            $table->string('kategori');           // Contoh: Perawatan Ringan
            $table->integer('harga');             // Contoh: 150000 (Pakai angka saja)
            $table->string('durasi');             // Contoh: 30 Menit
            $table->string('status')->default('Aktif'); // Aktif/Non-Aktif
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
