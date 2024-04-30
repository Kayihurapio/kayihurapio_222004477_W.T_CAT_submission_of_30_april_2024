<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        @keyframes moveHeading {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(0); }
        }

        .moving-heading {
            animation: moveHeading 1.5s ease-out forwards;
        }
    </style>
</head>
<body style="background-color: greenyellow;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Customer Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="available_tickets.php">Available_Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer_profile.php">Customer_Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
        <h2 id="welcome-heading" class="moving-heading">Welcome to the Customer Dashboard!</h2>
        <!-- Add your dashboard content here -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Your Events</h3>
                <ul class="list-group">
                    <!-- List events booked by the customer dynamically here -->
                    <!-- Example list item: -->
                    <!-- <li class='list-group-item'>Event Name - Date: Event Date</li> -->
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Your Tickets</h3>
                <ul class="list-group">
                    <!-- List tickets booked by the customer dynamically here -->
                    <!-- Example list item: -->
                    <!-- <li class='list-group-item'>Ticket for Event Name - Quantity: Ticket Quantity</li> -->
                </ul>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (Optional, if needed for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
