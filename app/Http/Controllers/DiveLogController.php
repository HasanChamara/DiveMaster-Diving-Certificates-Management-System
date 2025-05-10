<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DiveLog;
use App\Models\Diver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'visibility' => 'nullable|string',
            'weather_conditions' => 'nullable|string',
            'dive_site_conditions' => 'nullable|string',
            'divers.*.diver_id' => 'required|exists:divers,id',  // Ensure diver exists
            'divers.*.depth' => 'required|numeric',
            'divers.*.duration' => 'required|integer',
            'divers.*.dive_type' => 'required|string',
            'divers.*.air_consumption' => 'nullable|numeric',
            'divers.*.notes' => 'nullable|string',
        ]);

        // Use transaction to ensure all divers are saved successfully
        DB::beginTransaction();

        try {
            // Loop through each diver's data and create a dive log entry
            foreach ($request->divers as $diverData) {
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

            // Commit transaction if everything is fine
            DB::commit();

            // Redirect to the manage dive logs page with a success message
            return redirect()->route('manageDiveLogs')
                             ->with('success', 'Dive logs saved successfully!');
        } catch (\Exception $e) {
            // Rollback transaction if an error occurs
            DB::rollback();

            // Log the error for debugging
            Log::error('Error while saving dive log:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error occurred while saving dive logs'], 500);
        }
    }

    // Show the manage dive logs page
    public function manage()
    {
        $diveLogs = DiveLog::all(); // Fetch all dive logs
        return view('dive_log.manage', compact('diveLogs'));
    }

    // Show the edit form for a specific dive log
    public function edit($id,$diver_id)
    {
        // Retrieve the dive log by ID along with its associated divers
        $diveLog = DiveLog::where('id', $id)->where('diver_id', $diver_id)->firstOrFail();

        // Return the edit view with the dive log data
        return view('dive_log.edit', compact('diveLog'));
    }


    public function update(Request $request, $id, $diver_id)
    {
        // Validate the form data
        $validated = $request->validate([
            'visibility' => 'nullable|string',
            'weather_conditions' => 'nullable|string',
            'dive_site_conditions' => 'nullable|string',
            'divers.*.diver_id' => 'required|exists:divers,id',  // Ensure diver exists
            'divers.*.depth' => 'required|numeric',  // Ensure depth is passed correctly
            'divers.*.duration' => 'required|integer',
            'divers.*.dive_type' => 'required|string',
            'divers.*.air_consumption' => 'nullable|numeric',
            'divers.*.notes' => 'nullable|string',
        ]);

        Log::info("Form data validated for dive log ID: $id and diver ID: $diver_id", $request->all());

        // Log the request data for debugging
        Log::info("Request data: ", $request->all());

        // Retrieve the existing dive log entry
        $diveLog = DiveLog::find($id);

        // Check if the DiveLog exists
        if (!$diveLog) {
            Log::error("Dive log with ID $id not found");
            return redirect()->route('editDiveLog', ['id' => $id, 'diver_id' => $diver_id])
                            ->with('error', 'Dive log not found.');
        }

        // Ensure the diver_id in the URL matches the diver_id in the dive log
        if ($diveLog->diver_id != $diver_id) {
            Log::warning("Diver mismatch: Requested diver ID $diver_id does not match dive log diver ID {$diveLog->diver_id}");
            return redirect()->route('editDiveLog', ['id' => $id, 'diver_id' => $diver_id])
                            ->with('error', 'Diver mismatch. The requested dive log does not belong to this diver.');
        }

        // Log the current DiveLog data before update
        Log::info("Current DiveLog data before update", $diveLog->toArray());

        // Update the dive log's details
        $diveLog->visibility = $request->input('visibility');
        $diveLog->weather_conditions = $request->input('weather_conditions');
        $diveLog->dive_site_conditions = $request->input('dive_site_conditions');
        $diveLog->depth = $request->input('divers.0.depth');  // Ensure proper depth mapping
        $diveLog->duration = $request->input('divers.0.duration');
        $diveLog->dive_type = $request->input('divers.0.dive_type');
        $diveLog->air_consumption = $request->input('divers.0.air_consumption');
        $diveLog->notes = $request->input('divers.0.notes');

        // Save the updated dive log entry
        if ($diveLog->save()) {
            Log::info("DiveLog updated successfully with ID: $id");
        } else {
            Log::error("Failed to update DiveLog with ID: $id");
        }

        // Log the DiveLog data after save
        Log::info("DiveLog data after update", $diveLog->toArray());

        // Redirect back with success message
        return redirect()->route('manageDiveLogs', ['id' => $id, 'diver_id' => $diver_id])
                        ->with('success', 'Dive log updated successfully!');
    }





}
