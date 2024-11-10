@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rooms</h1>

        <!-- Button to Add New Room -->
        <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Add New Room</a>

        <!-- Check if there are any rooms -->
        @if($rooms->isEmpty())
            <p>No rooms found.</p>
        @else
            <!-- Display list of rooms -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Hotel Name</th>
                        <th>Room Number</th>
                        <th>Room Type</th>
                        <th>Price</th>
                        <th>Vacancy Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                        <tr>
                            <td>{{ $room->hotel->name }}</td>
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->type }}</td>
                            <td>{{ $room->price }}</td>
                            <td>{{ $room->is_vacant ? 'Vacant' : 'Occupied' }}</td>
                            <td>
                                <!-- Add update and delete actions here if needed -->
                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
