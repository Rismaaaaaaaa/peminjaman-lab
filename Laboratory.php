<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $fillable = ['name', 'capacity', 'description', 'equipment'];

    // Define the relationship with bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
