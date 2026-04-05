<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // TAMBAHKAN INI (Surat Izin)
    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'service_id',
        'booking_date',
        'status',
        'catatan'
    ];
    // Relasi ke Customer
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke Vehicle
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }

    // Relasi ke Service
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
