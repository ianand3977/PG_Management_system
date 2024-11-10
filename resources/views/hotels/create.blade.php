@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Hotel</h1>
        <form method="POST" action="{{ route('hotels.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Hotel Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Hotel Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Hotel Location -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <!-- Hotel Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <!-- Hotel Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Hotel Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Number of Rooms -->
            <div class="mb-3">
                <label for="rooms" class="form-label">Number of Rooms</label>
                <input type="number" class="form-control" id="rooms" name="rooms" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
