<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        // Get all rooms with the associated hotel
        $rooms = Room::with('hotel')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        // Pass hotels data to the view
        $hotels = Hotel::all();
        return view('rooms.create', compact('hotels'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'hotel_id' => 'required|exists:hotels,id', // Ensure the hotel exists
        'room_number' => 'required|unique:rooms', // Ensure room number is unique
        'type' => 'required|string',
        'capacity' => 'required|integer|min:1', // Validate capacity as an integer and at least 1
        'price' => 'required|numeric|min:0', // Ensure price is a number and non-negative
    ]);

    // Create the room with default values for is_vacant
    Room::create([
        'hotel_id' => $request->hotel_id,
        'room_number' => $request->room_number,
        'type' => $request->type,
        'capacity' => $request->capacity,
        'price' => $request->price,
        'is_vacant' => true, // Default value for vacancy
    ]);

    return redirect()->route('rooms.index')->with('success', 'Room added successfully.');
}

public function getAvailableRooms($hotelId)
{
    // Fetch rooms based on the selected hotel and availability status
    $rooms = Room::where('hotel_id', $hotelId)
                 ->where('status', 'available')
                 ->get(['id', 'room_number', 'type', 'price']);

    if ($rooms->isEmpty()) {
        return response()->json(['success' => false, 'message' => 'No rooms available'], 404);
    }

    return response()->json(['success' => true, 'rooms' => $rooms], 200);
}


}
