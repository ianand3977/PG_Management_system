<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            color: #333;
        }
       /* Navbar Styles */
.navbar {
    background-color: #343a40;  /* Dark background color */
    padding: 10px 20px;
}

.navbar-brand {
    color: #fff;
    font-weight: bold;
    font-size: 1.5rem;
    text-transform: uppercase;
}

.navbar-nav .nav-item {
    margin-right: 15px;
}

.navbar-nav .nav-link {
    color: #f8f9fa;
    font-size: 1.1rem;
    font-weight: 500;
    transition: color 0.3s ease, transform 0.3s ease;
}

.navbar-nav .nav-link:hover,
.navbar-nav .nav-link:focus {
    color: #007bff;  /* Change text color on hover */
    transform: scale(1.05);  /* Slight scaling effect on hover */
}

.navbar-toggler {
    border-color: #007bff;  /* Toggler color */
}

.navbar-toggler-icon {
    background-color: #007bff;  /* Toggler icon color */
}

.navbar-collapse {
    justify-content: flex-end;  /* Align navbar items to the right */
}

.nav-item .nav-link {
    padding: 10px 15px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.nav-item .nav-link:hover {
    background-color: #0056b3;  /* Darker background on hover */
    color: white;
}

.navbar-light .navbar-toggler-icon {
    background-color: #fff;  /* Light color for the toggler icon */
}

.navbar-light .navbar-toggler {
    border-color: #fff;  /* Light color for the border of toggler */
}

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">pg Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hotels.index') }}">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings.index') }}">Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookings.create') }}">Create Booking</a>
                    </li>
                    
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                       
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="nav-link btn" type="submit">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <div class="container mt-3">
            @yield('content') <!-- Main content will go here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
