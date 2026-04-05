<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        // Data Dummy 1
        Vehicle::create([
            'customer_id' => 1, // Milik User ID 1 (Pastikan User ID 1 ada di CustomerSeeder)
            'pemilik' => 'Dzaky Raihan',
            'plat' => 'B 1234 CD',
            'model' => 'Toyota Avanza Veloz', // Gabungan Merk + Model
            'tahun' => '2020',
            'warna' => 'Putih' // Kolom Baru
        ]);

        // Data Dummy 2
        Vehicle::create([
            'customer_id' => 2,
            'pemilik' => 'Firman Ghani',
            'plat' => 'D 5678 XY',
            'model' => 'Honda Brio Satya',
            'tahun' => '2021',
            'warna' => 'Merah'
        ]);

        // Data Dummy 3
        Vehicle::create([
            'customer_id' => 3,
            'pemilik' => 'Prince Andrew',
            'plat' => 'L 9999 JP',
            'model' => 'Mitsubishi Pajero Sport',
            'tahun' => '2023',
            'warna' => 'Hitam'
        ]);
    }
}