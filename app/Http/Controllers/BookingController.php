<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingDetail;


class BookingController extends Controller
{
    public function create()
    {
        return view('booking.create'); // The form view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|max:20',
            'preferred_dive_activity' => 'required|max:255',
            'date' => 'required|date',
            'special_notes' => 'nullable|string',
            'is_adult' => 'required|boolean',
        ]);

        Booking::create($validated);

        // Return back with a success message that will trigger the popup
        return back()->with('success', 'Booking Request Submitted Successfully!');
    }

    public function index()
    {
        $bookings = Booking::all(); // Retrieve all bookings from the database
        return view('booking.index', compact('bookings')); // Pass the bookings to the view
    }

    // Update the status and instructor
    public function update(Request $request, $id)
    {
        // Validate the form data
        $validated = $request->validate([
            'status' => 'required|in:Pending,Accepted',
            'instructor' => 'nullable|string|max:255',
        ]);

        // Find the booking by ID
        $booking = Booking::find($id);
        $booking->status = $request->status;
        $booking->instructor = $request->instructor;
        $booking->save(); // Save the updated booking

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully');
    }
    
    // Show the additional details form (Names of Buddies, Boat Number, Required Equipment)
    public function showDetailsForm($id)
    {
        $booking = Booking::find($id);
        return view('bookings.details', compact('booking'));
    }

    // Save the additional details for the booking
    public function saveDetails(Request $request, $id)
    {
        $validated = $request->validate([
            'names_of_buddies' => 'required|string|max:255',
            'boat_number' => 'nullable|string|max:255',
            'required_equipment' => 'nullable|string|max:255',
        ]);

        $bookingDetail = BookingDetail::create([
            'booking_id' => $id,
            'names_of_buddies' => $request->names_of_buddies,
            'boat_number' => $request->boat_number,
            'required_equipment' => $request->required_equipment,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking details saved successfully');
    }

}

