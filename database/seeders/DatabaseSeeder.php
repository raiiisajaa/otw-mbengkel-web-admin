<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // 1. WAJIB DULUAN: Bikin Data Pemilik
            CustomerSeeder::class, 
            
            // 2. BARU BIKIN MOBIL: Karena mobil butuh ID Pemilik (customer_id)
            VehicleSeeder::class,
            
            // 3. Service bebas urutannya
            ServiceSeeder::class, 
        ]);
    }
}