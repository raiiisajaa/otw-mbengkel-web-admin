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
            
            // RELASI (Menghubungkan ke tabel lain)
            // Ini akan otomatis mencari id di tabel customers, vehicles, services
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            
            // DATA TRANSAKSI
            $table->dateTime('booking_date'); // Tanggal & Jam Booking
            $table->string('status')->default('Pending'); // Pending, Proses, Selesai, Batal
            $table->text('catatan')->nullable(); // Catatan tambahan dari user
            
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
