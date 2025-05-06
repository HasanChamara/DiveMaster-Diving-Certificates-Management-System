<?php

// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'contact_number', 'activity', 'date', 'location', 'number_of_divers', 'message', 'age_verification'
    ];

    public function divers()
    {
        return $this->hasMany(Diver::class);
    }
}

