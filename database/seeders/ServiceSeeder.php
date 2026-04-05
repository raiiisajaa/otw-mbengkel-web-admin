<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'nama_layanan' => 'Servis Rutin (Berkala)',
                'kategori' => 'Servis Berkala',
                'harga' => 150000, // Harga default, nanti bisa diedit admin
                'durasi' => '60 Menit',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Ganti Oli Saja',
                'kategori' => 'Perawatan Ringan',
                'harga' => 60000, // Harga jasa ganti oli
                'durasi' => '30 Menit',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Servis Besar / Turun Mesin',
                'kategori' => 'Perawatan Berat',
                'harga' => 1500000, // Estimasi biaya servis berat
                'durasi' => '3 Hari',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_layanan' => 'Perbaikan Lain-lain',
                'kategori' => 'Umum',
                'harga' => 50000, // Biaya cek kerusakan (diagnosa)
                'durasi' => 'Menyesuaikan',
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}