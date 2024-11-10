@extends('layouts.app')

@section('content')

<style>
    /* Container Styling */
.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

/* Heading */
h1 {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table th, .table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 1rem;
}

.table th {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

.table td {
    background-color: #f8f9fa;
}

.table tr:nth-child(even) {
    background-color: #f1f1f1;
}

.table .btn {
    margin: 5px;
}

/* Add New Room Button */
.btn-primary {
    background-color: #28a745;
    border-color: #28a745;
    font-size: 1rem;
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-primary:hover {
    background-color: #218838;
    border-color: #1e7e34;
    transform: scale(1.05);
}

/* Update and Delete Buttons */
.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    font-size: 0.9rem;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    font-size: 0.9rem;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
    transform: scale(1.05);
}

/* Empty Rooms Message */
p {
    font-size: 1.2rem;
    color: #777;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 0.9rem;
        padding: 8px;
    }

    .btn-primary,
    .btn-warning,
    .btn-danger {
        font-size: 0.85rem;
        padding: 6px 10px;
    }
}

</style>
    <div class="container">
        <h1>Hotels</h1>

        <!-- Button to Add New Hotel -->
        <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">Add New Hotel</a>

        <!-- Check if there are any hotels -->
        @if($hotels->isEmpty())
            <p>No hotels found.</p>
        @else
            <!-- Display list of hotels -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Total Rooms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $hotel)
                        <tr>
                            <!-- Display hotel image (if available) -->
                            <td>
                                @if($hotel->image)
                                    <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" width="100">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->location }}</td>
                            <td>{{ $hotel->total_rooms }}</td> <!-- Display total rooms -->
                            <td>
                                <!-- Update and Unlist Actions -->
                                <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Unlist</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
