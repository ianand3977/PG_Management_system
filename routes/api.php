
<?php
use App\Http\Controllers\RoomController;

Route::get('/hotels/{hotelId}/rooms', [RoomController::class, 'getAvailableRooms']);
