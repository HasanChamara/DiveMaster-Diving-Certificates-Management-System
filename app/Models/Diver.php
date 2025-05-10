<?php

// app/Models/Diver.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diver extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'name', 'birthday', 'diving_status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    
}
