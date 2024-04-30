<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "pio";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Event (C)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_event'])) {
    // Retrieve event details from form
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];

    // Insert event details into the database
    $sql = "INSERT INTO events (event_name, event_description, event_date, event_time) VALUES ('$event_name', '$event_description', '$event_date', '$event_time')";
    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read Event (R)
// Query the database to retrieve existing events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Display the list of events on the webpage
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Event</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description:</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>
            <div class="form-group">
                <label for="event_time">Event Time:</label>
                <input type="time" class="form-control" id="event_time" name="event_time">
            </div>
            <button type="submit" class="btn btn-primary" name="create_event">Add Event</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2>Event List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Event Description</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["event_name"] . "</td>";
                        echo "<td>" . $row["event_description"] . "</td>";
                        echo "<td>" . $row["event_date"] . "</td>";
                        echo "<td>" . $row["event_time"] . "</td>";
                        echo "<td><a href='edit_event.php?event_id=" . $row["event_id"] . "'>Edit</a> | <a href='delete_event.php?event_id=" . $row["event_id"] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No events found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
