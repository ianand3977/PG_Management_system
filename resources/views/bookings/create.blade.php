@extends('layouts.app')

@section('content')

<style>
    /* Container Styling */
.container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin-top: 40px;
}

/* Heading */
h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

/* Form Inputs Styling */
.form-control {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Select Dropdown Styling */
select.form-control {
    cursor: pointer;
    font-size: 1rem;
}

/* Room Details Card */
#roomDetails {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
    display: none;
}

#roomDetails h5 {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

#roomDetails p {
    font-size: 1rem;
    color: #555;
}

/* Buttons */
.btn-primary {
    background-color: #28a745;
    border-color: #28a745;
    font-size: 1.1rem;
    padding: 12px 20px;
    border-radius: 8px;
    width: 100%;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #218838;
    border-color: #1e7e34;
    transform: scale(1.05);
}

/* Form Section Titles */
h4 {
    font-size: 1.3rem;
    color: #555;
    margin-top: 25px;
    margin-bottom: 15px;
}

/* Form Input Margins */
.mb-3 {
    margin-bottom: 20px;
}

/* Guest Details Input Fields */
input[type="text"], input[type="email"], input[type="number"], input[type="date"] {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    width: 100%;
    margin-bottom: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus, input[type="date"]:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Dropdown option styling */
option {
    padding: 8px 10px;
}

/* Datepicker Styling */
input[type="date"]::-webkit-calendar-picker-indicator {
    background-color: #007bff;
    border-radius: 3px;
    color: white;
}

/* Section for Form Alerts (Optional) */
.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 8px;
    font-size: 1rem;
    display: none;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    .btn-primary {
        font-size: 1rem;
        padding: 10px 15px;
    }

    input[type="text"], input[type="email"], input[type="number"], input[type="date"], .form-control {
        font-size: 0.9rem;
        padding: 10px;
    }

    #roomDetails {
        padding: 10px;
    }
}

</style>
    <div class="container">
        <h1>Create Booking</h1>
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf

            <!-- User Details -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Hotel Dropdown -->
            <div class="mb-3">
                <label for="hotel_id" class="form-label">Hotel</label>
                <select class="form-control" id="hotel_id" name="hotel_id" required>
                    <option value="">Select Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Room Dropdown -->
            <div class="mb-3">
                <label for="room_id" class="form-label">Room</label>
                <select class="form-control" id="room_id" name="room_id" required>
                    <option value="">Select Room</option>
                </select>
            </div>

            <!-- Room Details Card -->
            <div id="roomDetails" class="card mt-3 d-none">
                <div class="card-body">
                    <h5 id="hotelName" class="card-title"></h5>
                    <p id="hotelLocation" class="card-text"></p>
                    <p id="selectedRoom" class="card-text"></p>
                    <p id="roomPrice" class="card-text font-weight-bold"></p>
                </div>
            </div>

            <!-- Guest Verification Details -->
            <h4>Guest Details</h4>
            <div class="mb-3">
                <input type="text" class="form-control mb-2" name="guest_name" placeholder="Guest Name" required>
                <input type="text" class="form-control mb-2" name="guest_phone" placeholder="Guest Phone" required>
                <input type="email" class="form-control mb-2" name="guest_email" placeholder="Guest Email" required>
                <input type="text" class="form-control mb-2" name="guest_aadhar_card_number" placeholder="Guest Aadhar Card Number" required>
            </div>

            <!-- Dates and Additional Details -->
            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-in Date</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date" required>
            </div>

            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-out Date</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date" required>
            </div>

            <div class="mb-3">
                <label for="negotiated_rent" class="form-label">Negotiated Rent (₹)</label>
                <input type="number" class="form-control" id="negotiated_rent" name="negotiated_rent" required min="1">
            </div>

            <div class="mb-3">
                <label for="security_deposit" class="form-label">Security Deposit (₹)</label>
                <input type="number" class="form-control" id="security_deposit" name="security_deposit" required min="1">
            </div>

            <div class="mb-3">
                <label for="security_deposit_paid" class="form-label">Is Security Deposit Paid?</label>
                <select class="form-control" id="security_deposit_paid" name="security_deposit_paid" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="number_of_guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const hotels = @json($hotels);

            // Hotel selection change
            $('#hotel_id').on('change', function () {
                const hotelId = $(this).val();
                $('#room_id').html('<option value="">Select Room</option>');
                $('#roomDetails').addClass('d-none');

                if (hotelId) {
                    const selectedHotel = hotels.find(hotel => hotel.id == hotelId);

                    if (selectedHotel && selectedHotel.rooms.length > 0) {
                        selectedHotel.rooms.forEach(room => {
                            $('#room_id').append(
                                `<option value="${room.id}" data-price="${room.price}" data-room="${room.room_number}" data-type="${room.type}">${room.room_number} (${room.type}) - ₹${room.price}</option>`
                            );
                        });
                    } else {
                        alert('No rooms available for the selected hotel.');
                    }
                }
            });

            // Room selection change
            $('#room_id').on('change', function () {
                const selectedOption = $(this).find('option:selected');
                if (selectedOption.val()) {
                    const roomNumber = selectedOption.data('room');
                    const roomType = selectedOption.data('type');
                    const roomPrice = selectedOption.data('price');

                    $('#hotelName').text($('#hotel_id option:selected').text());
                    $('#selectedRoom').text(`Selected Room: ${roomNumber} (${roomType})`);
                    $('#roomPrice').text(`Price: ₹${roomPrice}`);
                    $('#roomDetails').removeClass('d-none');
                } else {
                    $('#roomDetails').addClass('d-none');
                }
            });
        });
    </script>
@endsection
