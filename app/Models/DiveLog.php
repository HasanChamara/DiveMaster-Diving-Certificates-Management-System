<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiveLog extends Model
{
    use HasFactory;

    protected $table = 'dive_logs';  // Ensure we are using the plural form 'dive_logs'

    protected $fillable = [
        'diver_id',
        'depth',
        'duration',
        'visibility',
        'weather_conditions',
        'dive_site_conditions',
        'dive_type',
        'air_consumption',
        'notes',
    ];

    // Relationship: A DiveLog belongs to a Diver
    public function diver()
    {
        return $this->belongsTo(Diver::class);  // Make sure this relationship is correct
    }
}
