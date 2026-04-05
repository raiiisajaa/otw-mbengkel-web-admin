<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // INI YANG KURANG: Daftar kolom yang boleh diisi manual
    protected $fillable = [
        'nama_layanan',
        'kategori',
        'harga',
        'durasi',
        'status',
    ];
}