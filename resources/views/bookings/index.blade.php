@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Current Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($bookings->isEmpty())
        <div class="alert alert-info">No current bookings available.</div>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hotel Name</th>
                    <th>Room Number</th>
                    <th>Guest Name</th>
                    <th>Negotiated Rent</th>
                    <th>Security Deposit</th>
                    <th>Number of Guests</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Vacancy Date</th>
                    <th>Booking Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->room->hotel->name ?? 'N/A' }}</td>
                        <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
                        <td>{{ $booking->guest_name ?? $booking->user->name }}</td>
                        <td>{{ $booking->negotiated_rent ? '₹' . number_format($booking->negotiated_rent, 2) : 'Not Negotiated' }}</td>
                        <td>{{ $booking->security_deposit_amount ? '₹' . number_format($booking->security_deposit_amount, 2) : 'Not Paid' }}</td>
                        <td>{{ $booking->number_of_guests }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d-m-Y') }}</td>
                        <td>
                            @if($booking->booking_status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Completed</span>
                            @endif
                        </td>
                        <td>
                            {{-- <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
