<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Set your desired background color */
        }
        .container {
            margin-top: 50px; /* Add margin to the top for better visibility */
        }
    </style>
</head>
<body>

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

// Check if event_id is provided in the URL
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];

    // Delete related records from the transactions table
    $sql_delete_transactions = "DELETE FROM transactions WHERE event_id = $event_id";
    if ($conn->query($sql_delete_transactions) === TRUE) {
        // Once related records are deleted, delete the event
        $sql_delete_event = "DELETE FROM events WHERE event_id = $event_id";
        if ($conn->query($sql_delete_event) === TRUE) {
            echo "<div class='container'>";
            echo "<div class='alert alert-success' role='alert'>Event deleted successfully</div>";
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<div class='alert alert-danger' role='alert'>Error deleting event: " . $conn->error . "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='container'>";
        echo "<div class='alert alert-danger' role='alert'>Error deleting related transactions: " . $conn->error . "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='container'>";
    echo "<div class='alert alert-warning' role='alert'>Event ID not provided</div>";
    echo "</div>";
    exit;
}

// Close database connection
$conn->close();
?>

</body>
</html>
