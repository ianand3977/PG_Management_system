<?php

namespace App\Http\Controllers; // Make sure this is here

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::withCount(['rooms' => function ($query) {
            $query->where('is_vacant', true);
        }])->get();

        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required',
            'rooms' => 'required|integer|min:1', // Add validation for rooms
        ]);
    
        $imagePath = $request->file('image') ? $request->file('image')->store('hotel_images', 'public') : null;
    
        Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'location' => $request->location,
            'total_rooms' => $request->rooms,  // Save the total rooms to the database
        ]);
    
        return redirect()->route('hotels.index')->with('success', 'Hotel added successfully!');
    }
    

public function destroy($id)
{
    $hotel = Hotel::findOrFail($id);

    // Optionally, delete associated rooms if necessary
    // $hotel->rooms()->delete();

    $hotel->delete();

    return redirect()->route('hotels.index')->with('success', 'Hotel unlisted successfully!');
}


}
