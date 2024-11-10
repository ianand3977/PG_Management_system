<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Dashboard Route - Protected by 'auth' and 'verified' middleware
Route::get('/', function () {
    return view('dashboard');  // Ensure 'dashboard.blade.php' exists in the 'resources/views' folder
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes - Accessible only to authenticated users


// Hotel Routes - CRUD operations for hotels
Route::middleware('auth')->group(function () {
    Route::resource('hotels', HotelController::class);
});

// Room Routes - CRUD operations for rooms
Route::middleware('auth')->group(function () {
    Route::resource('rooms', RoomController::class);
});

// Booking Routes - Using resource route for booking management
Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);
});

// Auth Routes - Include Laravel's default authentication routes
require __DIR__.'/auth.php';
