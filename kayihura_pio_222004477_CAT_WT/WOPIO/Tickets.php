<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Ticket Prices</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Set Ticket Prices</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <table class="table">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Regular Ticket Price</th>
                        <th>General Ticket Price</th>
                        <th>VIP Ticket Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Database connection
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

                    // Process form submission
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        foreach ($_POST as $key => $value) {
                            // Check if the input name corresponds to a ticket price
                            if (strpos($key, 'regular_price_') !== false || strpos($key, 'general_price_') !== false || strpos($key, 'vip_price_') !== false) {
                                // Extract event ID from input name
                                $event_id = substr($key, strpos($key, '_') + 1);
                                
                                // Determine ticket type based on input name
                                if (strpos($key, 'regular_price_') !== false) {
                                    $ticket_type = 'Regular';
                                } elseif (strpos($key, 'general_price_') !== false) {
                                    $ticket_type = 'General';
                                } else {
                                    $ticket_type = 'VIP';
                                }
                                
                                // Insert ticket price into tickets table
                                $ticket_price = $value;
                                $sql = "INSERT INTO tickets (event_id, ticket_price, ticket_quantity) VALUES ('$event_id', '$ticket_price', '0')";
                                
                                if ($conn->query($sql) === TRUE) {
                                    echo "Ticket price for event ID $event_id ($ticket_type) saved successfully.<br>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                        }
                    }

                    // Fetch events from database
                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Display events and input fields for ticket prices
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row['event_id'];
                            $event_name = $row['event_name'];

                            echo "<tr>";
                            echo "<td>$event_name</td>";
                            echo "<td><input type='number' name='regular_price_$event_id' min='0' step='0.01'></td>";
                            echo "<td><input type='number' name='general_price_$event_id' min='0' step='0.01'></td>";
                            echo "<td><input type='number' name='vip_price_$event_id' min='0' step='0.01'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No events found.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Set Prices</button>
        </form>
    </div>
</body>
</html>
