<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'room_number',
        'type',
        'capacity',
        'price',
        'is_vacant'
    ];

    /**
     * Defines a relationship with the Hotel model.
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Defines a relationship with the Booking model.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
