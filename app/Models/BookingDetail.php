<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $table = 'booking_details';  // Optional if table name is the plural form of model

    protected $fillable = [
        'booking_id',
        'instructor_id',
        'number_of_buddies',
        'boat_number',
        'required_equipment',
        'instructor_status',
    ];
    
}

