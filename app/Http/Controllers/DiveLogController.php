<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DiveLog;
use App\Models\Diver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DiveLogController extends Controller
{
    // Show the dive log form for a specific booking
    public function create($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        $divers = $booking->divers;  // Get all divers for this booking

        return view('dive_log.create', compact('divers', 'booking_id', 'booking'));
    }

    // Store the dive log data
    public function store(Request $request)
    {
        // Log incoming request data for debugging
        Log::info('Dive Log Form Submission:', $request->all());

        // Validate the dive log data
        $validated = $request->validate([
            'visibility' => 'nullable|numeric',
            'weather_conditions' => 'nullable|string',
            'dive_site_conditions' => 'nullable|string',
            'divers.*.diver_id' => 'required|exists:divers,id',  // Ensure diver exists
            'divers.*.depth' => 'required|numeric',
            'divers.*.duration' => 'required|integer',
            'divers.*.dive_type' => 'required|string',
            'divers.*.air_consumption' => 'nullable|numeric',
            'divers.*.notes' => 'nullable|string',
        ]);

        // Log validated data for debugging
        Log::info('Validated Dive Log Data:', $validated);

        // Loop through each diver's data and create a dive log entry
        foreach ($request->divers as $diverData) {
            // Log the diver data before inserting
            Log::info('Creating Dive Log Entry for Diver:', $diverData);

            // Create the dive log entry
            DiveLog::create([
                'diver_id' => $diverData['diver_id'],
                'depth' => $diverData['depth'],
                'duration' => $diverData['duration'],
                'visibility' => $request->visibility,  // Common field
                'weather_conditions' => $request->weather_conditions,  // Common field
                'dive_site_conditions' => $request->dive_site_conditions,  // Common field
                'dive_type' => $diverData['dive_type'],
                'air_consumption' => $diverData['air_consumption'],
                'notes' => $diverData['notes'],
            ]);
        }

        return response()->json(['message' => 'Dive log saved successfully!']);
    }
}
