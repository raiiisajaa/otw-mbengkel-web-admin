<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // ID 1 (Pasangan Dzaky)
        Customer::create([
            'id' => 1, 
            'nama' => 'Dzaky Raihan',
            'email' => 'dzaky@gmail.com',
            'hp' => '081299887766',
            'alamat' => 'Surabaya',
            'status' => 'Active'
        ]);

        // ID 2 (Pasangan Firman)
        Customer::create([
            'id' => 2,
            'nama' => 'Firman Ghani',
            'email' => 'firman@gmail.com',
            'hp' => '085712345678',
            'alamat' => 'Jakarta',
            'status' => 'Active'
        ]);

        // ID 3 (Pasangan Prince)
        Customer::create([
            'id' => 3,
            'nama' => 'Prince Andrew',
            'email' => 'prince@gmail.com',
            'hp' => '081122334455',
            'alamat' => 'Bandung',
            'status' => 'Blocked'
        ]);
    }
}