<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // TAMBAHKAN INI
    protected $fillable = [
        'nama',
        'email',
        'hp',
        'alamat',
        'status', // Active / Blocked
    ];
}