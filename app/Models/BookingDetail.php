<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 
        'names_of_buddies', 
        'boat_number', 
        'required_equipment'
    ];

    public $timestamps = true; // Optionally enable timestamps for this table
}
