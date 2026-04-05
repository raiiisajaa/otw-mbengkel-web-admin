<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'customer_id', 
        'pemilik',
        'merk',
        'model',
        'plat',
        'tahun',
        'transmisi'
    ];
}
