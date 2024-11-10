@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Room</h1>
        <form method="POST" action="{{ route('rooms.store') }}">
            @csrf

            <!-- Hotel Selection -->
            <div class="mb-3">
                <label for="hotel_id" class="form-label">Hotel</label>
                <select class="form-control" id="hotel_id" name="hotel_id" required>
                    <option value="">Select a Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Room Number -->
            <div class="mb-3">
                <label for="room_number" class="form-label">Room Number</label>
                <input type="text" class="form-control" id="room_number" name="room_number" required>
            </div>

            <!-- Room Type -->
            <div class="mb-3">
                <label for="type" class="form-label">Room Type</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="one_seater">One Seater</option>
                    <option value="two_seater">Two Seater</option>
                    <option value="2_bhk">2 BHK</option>
                </select>
            </div>

            <!-- Capacity -->
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacity</label>
                <input type="number" class="form-control" id="capacity" name="capacity" required>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
