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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            
            // Data Diri Customer
            $table->string('nama');
            $table->string('email')->unique();  // Email tidak boleh kembar
            $table->string('hp');               // Nomor WhatsApp
            $table->string('alamat')->nullable(); // Boleh dikosongkan
            $table->string('status')->default('Active'); // Active / Blocked
            
            $table->timestamps(); // Otomatis mencatat 'created_at' (Tanggal Join)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
