<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Kita pakai ID 1, 2, 3 karena kita yakin data itu ada (dari seeder sebelumnya)
        DB::table('bookings')->insert([
            [
                'customer_id' => 1, // Dzaky
                'vehicle_id'  => 1, // Toyota Avanza
                'service_id'  => 2, // Ganti Oli Saja
                'booking_date'=> '2025-12-25 10:00:00',
                'status'      => 'Pending',
                'catatan'     => 'Mohon disiapkan oli full sintetik',
                'created_at'  => now(), 'updated_at' => now(),
            ],
            [
                'customer_id' => 2, // Firman
                'vehicle_id'  => 2, // Honda Brio
                'service_id'  => 1, // Servis Rutin
                'booking_date'=> '2025-12-26 13:00:00',
                'status'      => 'Proses',
                'catatan'     => 'Rem agak bunyi cit cit',
                'created_at'  => now(), 'updated_at' => now(),
            ],
            [
                'customer_id' => 3, // Prince Andrew
                'vehicle_id'  => 3, // Pajero
                'service_id'  => 3, // Turun Mesin
                'booking_date'=> '2025-12-27 09:00:00',
                'status'      => 'Selesai',
                'catatan'     => 'Aman terkendali',
                'created_at'  => now(), 'updated_at' => now(),
            ]
        ]);
    }
}