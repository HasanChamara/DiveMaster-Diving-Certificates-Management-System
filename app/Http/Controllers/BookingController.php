<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Diver;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Log the incoming request data for debugging
        Log::info('Booking request:', $request->all());
    
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'contact_number' => 'required|string',
            'nic' => 'required|string',
            'activity' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'number_of_divers' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'age_verification' => 'required|in:yes,no',
            'divers' => 'required|array|min:1',
            'divers.*.name' => 'required|string',
            'divers.*.birthday' => 'required|date',
            'divers.*.diving_status' => 'required|in:Beginner,Intermediate,Expert'
        ]);
    
        // If validation fails, Laravel will automatically return a response
        // with validation errors
    
        // Begin transaction
        DB::beginTransaction();
    
        try {
            // Insert booking data
            $booking = Booking::create([
                'name' => $request->name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'nic' => $request->nic,
                'activity' => $request->activity,
                'date' => $request->date,
                'location' => $request->location,
                'number_of_divers' => $request->number_of_divers,
                'message' => $request->message,
                'age_verification' => $request->age_verification
            ]);
    
            // Insert divers data
            foreach ($request->divers as $diverData) {
                $booking->divers()->create($diverData);
            }
    
            // Commit transaction
            DB::commit();
    
            return response()->json(['message' => 'Booking and divers saved successfully!'], 200);
        } catch (\Exception $e) {
            // Rollback in case of error
            DB::rollBack();
            Log::error('Error saving booking and divers:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'There was an error saving the booking and divers.'], 500);
        }
    }

    public function index()
    {
        $bookings = Booking::all(); // Retrieve all bookings
        $instructors = User::where('role', 'Instructor')->get(); // Retrieve users with the role of "Instructor"
        return view('booking.index', compact('bookings', 'instructors'));
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

    public function saveBookingDetails(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'status' => 'required|in:Accepted',
            'instructor' => 'required|exists:users,id',
            'number_of_buddies' => 'required|integer|min:1',
            'boat_number' => 'nullable|string|max:255',
            'required_equipment' => 'nullable|string|max:255',
        ]);

        // Update the booking status
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        // Save additional booking details
        BookingDetail::create([
            'booking_id' => $request->booking_id,
            'instructor_id' => $request->instructor,
            'number_of_buddies' => $request->number_of_buddies,
            'boat_number' => $request->boat_number,
            'required_equipment' => $request->required_equipment,
        ]);

        return response()->json(['success' => true, 'message' => 'Booking details saved successfully!']);
    }

    public function instructor_index()
    {
        // Get the instructor's ID from the authenticated user
        $instructorId = Auth::user()->id;

        // Retrieve the bookings that belong to the current instructor
        $bookings = DB::table('bookings')
            ->join('booking_details', 'bookings.id', '=', 'booking_details.booking_id')
            ->where('booking_details.instructor_id', '=', $instructorId)
            ->select('bookings.*', 'booking_details.*') // Select relevant columns
            ->get();

        // Pass the bookings data to the view
        return view('instructor-dashboard', compact('bookings'));
    }

    // Method to update booking status
    public function updateBookingStatus(Request $request, $id)
    {
        $request->validate([
            'instructor_status' => 'required|in:Pending,Accepted,Rejected',
        ]);

        // Find the booking detail by ID
        $bookingDetail = BookingDetail::find($id);

        if ($bookingDetail) {
            $bookingDetail->instructor_status = $request->instructor_status;
            $bookingDetail->save();

            return redirect()->back()->with('success', 'Status updated successfully');
        }

        return redirect()->back()->with('error', 'Booking not found');
    }

}

