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

// Initialize variables
$event_id = $event_name = $event_description = $event_date = $event_time = "";

// Fetch event details if event_id is provided
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    // Fetch event details from the database based on event_id
    $sql = "SELECT * FROM events WHERE event_id = $event_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $event_name = $row['event_name'];
        $event_description = $row['event_description'];
        $event_date = $row['event_date'];
        $event_time = $row['event_time'];
    } else {
        echo "Event not found";
    }
}

// Update Event (U)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_event'])) {
    // Retrieve updated event details from form
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];

    // Update event details in the database
    $sql = "UPDATE events SET event_name='$event_name', event_description='$event_description', event_date='$event_date', event_time='$event_time' WHERE event_id=$event_id";
    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-5">
        <h2>Edit Event</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="event_id">Select Event ID:</label>
                <input type="number" class="form-control" id="event_id" name="event_id" value="<?php echo $event_id; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">View Details</button>
        </form>
        <br>
        <?php if ($event_id) { ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" value="<?php echo $event_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="event_description">Event Description:</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3"><?php echo $event_description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo $event_date; ?>" required>
            </div>
            <div class="form-group">
                <label for="event_time">Event Time:</label>
                <input type="time" class="form-control" id="event_time" name="event_time" value="<?php echo $event_time; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update_event">Update Event</button>
        </form>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
