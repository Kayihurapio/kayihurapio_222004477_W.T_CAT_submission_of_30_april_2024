<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promoter Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-color: #3cb0a6;"> <!-- Add background color blue-green -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Event Promoter Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tickets.php">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
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
        <h2>Welcome to the Promoter Dashboard!</h2>
        <!-- Add your dashboard content here -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Events Managed by You</h3>
                <ul class="list-group">
                    <!-- List events managed by the promoter dynamically here -->
                    <?php
                        // Connect to database
                        $conn = mysqli_connect("localhost", "root", "", "pio");

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Query events managed by the promoter
                        $sql = "SELECT event_name, event_date FROM events WHERE organizer_id =1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<li class='list-group-item'>" . $row["event_name"] . " - Date: " . $row["event_date"] . "</li>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Tickets Sold for Your Events</h3>
                <ul class="list-group">
                    <!-- List tickets sold for events managed by the promoter dynamically here -->
                    <?php
                        // Connect to database
                        $conn = mysqli_connect("localhost", "root", "", "pio");

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        // Query tickets sold for events managed by the promoter
                        $sql = "SELECT events.event_name, tickets.ticket_quantity FROM tickets JOIN events ON tickets.event_id = events.event_id WHERE events.organizer_id = 1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<li class='list-group-item'>Ticket for " . $row["event_name"] . " - Quantity: " . $row["ticket_quantity"] . "</li>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
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
22222w2w2wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwq