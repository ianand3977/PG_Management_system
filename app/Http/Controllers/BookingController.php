<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Display the list of bookings
    public function index()
    {
        // Eager load the room and user relations
        $bookings = Booking::with(['room', 'user'])->get();
        return view('bookings.index', compact('bookings'));
    }

    // Show the form to create a new booking
    public function create()
    {
        $hotels = Hotel::with('rooms')->get(); // Fetch hotels along with their rooms
        $users = User::all();
        return view('bookings.create', compact('hotels', 'users'));
    }

    // Store a new booking
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|before:check_out_date',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'negotiated_rent' => 'nullable|numeric|min:0',
            'security_deposit_amount' => 'nullable|numeric|min:0',
            'guest_name' => 'nullable|string',
            'guest_phone' => 'nullable|string',
            'guest_email' => 'nullable|email',
            'guest_aadhar_card_number' => 'nullable|string',
        ]);

        // Fetch the selected room to check capacity
        $room = Room::find($request->room_id);

        // Validate that the number of guests does not exceed room capacity
        if ($request->number_of_guests > $room->capacity) {
            return back()->with('error', 'Number of guests exceeds room capacity.');
        }

        // Create the booking with the validated data
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'number_of_guests' => $request->number_of_guests,
            'negotiated_rent' => $request->negotiated_rent,
            'security_deposit_amount' => $request->security_deposit_amount,
            'guest_name' => $request->guest_name,
            'guest_phone' => $request->guest_phone,
            'guest_email' => $request->guest_email,
            'guest_aadhar_card_number' => $request->guest_aadhar_card_number,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    // Show a specific booking
    public function show($id)
    {
        $booking = Booking::with(['room', 'user'])->findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    // // Edit a specific booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $hotels = Hotel::with('rooms')->get();
        $users = User::all();
        return view('bookings.edit', compact('booking', 'hotels', 'users'));
    }

    // Update a specific booking
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|before:check_out_date',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'negotiated_rent' => 'nullable|numeric|min:0',
            'security_deposit_amount' => 'nullable|numeric|min:0',
            'guest_name' => 'nullable|string',
            'guest_phone' => 'nullable|string',
            'guest_email' => 'nullable|email',
            'guest_aadhar_card_number' => 'nullable|string',
        ]);

        // Find the booking and update it
        $booking = Booking::findOrFail($id);

        // Validate number of guests does not exceed room capacity
        $room = Room::find($request->room_id);
        if ($request->number_of_guests > $room->capacity) {
            return back()->with('error', 'Number of guests exceeds room capacity.');
        }

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Delete a specific booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
