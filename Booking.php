<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'labs_id', 'start_time', 'end_time', 'status'];

    // Define the relationship with users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the relationship with laboratories
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'labs_id');
    }
}