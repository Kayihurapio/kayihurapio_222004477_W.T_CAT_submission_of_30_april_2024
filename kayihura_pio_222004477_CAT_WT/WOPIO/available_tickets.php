<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Tickets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #00bfbf;"> <!-- Updated background color -->
    <div class="container mt-5">
        <h2>Event Tickets</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <table class="table">
                <thead>
                    
                    <tr>
                        <th>Event Name</th>
                        <th>Description</th>
                        <th>Regular Price</th>
                        <th>General Price</th>
                        <th>VIP Price</th>
                        <th>Choose Ticket</th>
                        <th>Quantity</th> <!-- New column for quantity -->
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

                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $confirmation_message = ""; // Initialize confirmation message

                        // Loop through POST data to get selected tickets and insert into transactions table
                        foreach ($_POST as $key => $value) {
                            if (strpos($key, 'tickets_') === 0) {
                                $event_id = substr($key, strlen('tickets_'));
                                $ticket_type = $conn->real_escape_string($value); // Sanitize input to prevent SQL injection
                                $quantity = $_POST["quantity_$event_id"]; // Get quantity for this ticket type

                                // Insert the ticket data into transactions table
                                $sql = "INSERT INTO transactions (event_id, ticket_type, quantity) VALUES ('$event_id', '$ticket_type', $quantity)";
                                if ($conn->query($sql) !== TRUE) {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                // Prepare confirmation message
                                $event_name = $conn->query("SELECT event_name FROM events WHERE event_id = $event_id")->fetch_assoc()['event_name'];
                                $confirmation_message .= "Event: $event_name, Ticket Type: $ticket_type, Quantity: $quantity<br>";
                            }
                        }

                        // Display confirmation message and payment options
                        echo "<div class='alert alert-success'>$confirmation_message</div>";
                        echo "<h3>Select Payment Method:</h3>";
                        echo "<ul>";
                        echo "<li><a href='#' onclick='showMobileMoneyDetails()'>Mobile Money</a></li>";
                        echo "<li><a href='#' onclick='showBankDetails()'>Bank Transfer</a></li>";
                        echo "</ul>";
                    }

                    // Fetch events from database
                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Display events and input fields for ticket prices
                        while ($row = $result->fetch_assoc()) {
                            $event_id = $row['event_id'];
                            $event_name = $row['event_name'];
                            $event_description = $row['event_description'];

                            // Fetch ticket prices for the event from the database
                            $price_sql = "SELECT * FROM tickets WHERE event_id = $event_id";
                            $price_result = $conn->query($price_sql);
                            $regular_price = 0;
                            $general_price = 0;
                            $vip_price = 0;

                            if ($price_result->num_rows > 0) {
                                while ($price_row = $price_result->fetch_assoc()) {
                                    if ($price_row['ticket_type'] == 'Regular') {
                                        $regular_price = $price_row['ticket_price'];
                                    } elseif ($price_row['ticket_type'] == 'General') {
                                        $general_price = $price_row['ticket_price'];
                                    } elseif ($price_row['ticket_type'] == 'VIP') {
                                        $vip_price = $price_row['ticket_price'];
                                    }
                                }
                            }

                            echo "<tr>";
                            echo "<td>$event_name</td>";
                            echo "<td>$event_description</td>";
                            echo "<td>$regular_price</td>";
                            echo "<td>$general_price</td>";
                            echo "<td>$vip_price</td>";
                            echo "<td>";
                            echo "<select name='tickets_$event_id'>";
                            echo "<option value='Regular'>Regular</option>";
                            echo "<option value='General'>General</option>";
                            echo "<option value='VIP'>VIP</option>";
                            echo "</select>";
                            echo "</td>";
                            echo "<td>"; // New column for quantity
                            echo "<input type='number' name='quantity_$event_id' value='1' min='1'>"; // Quantity input
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No events found.</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
            <p class="text-muted">Note: Please keep the payment message from mobile money or bank transfer as proof of payment.</p>
            <button type="submit" class="btn btn-primary">Purchase Tickets</button>
        </form>
    </div>

    <!-- Mobile Money Details -->
    <div id="mobileMoneyDetails" style="display: none;">
        <h4>Mobile Money Details</h4>
        <p>Full Name: [kayihura pio]</p>
        <p>Code: [241769]</p>
    </div>

    <!-- Bank Transfer Details -->
    <div id="bankDetails" style="display: none;">
        <h4>Bank Transfer Details</h4>
        <p>Bank Account: 400033545654</p>
        <p>Full Name: [kayihura pio]</p>
        <p>name: [eqity]</p>
    </div>

    <script>
        // JavaScript to disable select elements
        function disableEventSelect(eventId) {
            var selects = document.querySelectorAll('select[name^="tickets_"]');
            for (var i = 0; i < selects.length; i++) {
                if (selects[i].getAttribute('name') !== 'tickets_' + eventId) {
                    selects[i].disabled = true;
                }
            }
        }

        function enableAllEventSelects() {
            var selects = document.querySelectorAll('select[name^="tickets_"]');
            for (var i = 0; i < selects.length; i++) {
                selects[i].disabled = false;
            }
        }

        // JavaScript to handle event selection
        document.addEventListener('DOMContentLoaded', function() {
            var selects = document.querySelectorAll('select[name^="tickets_"]');
            for (var i = 0; i < selects.length; i++) {
                selects[i].addEventListener('change', function() {
                    enableAllEventSelects();
                    var eventId = this.getAttribute('name').replace('tickets_', '');
                    disableEventSelect(eventId);
                });
            }
        });
        
        function showMobileMoneyDetails() {
            var mobileMoneyDetails = document.getElementById('mobileMoneyDetails');
            var bankDetails = document.getElementById('bankDetails');
            if (mobileMoneyDetails.style.display === 'none') {
                mobileMoneyDetails.style.display = 'block';
                bankDetails.style.display = 'none';
            } else {
                mobileMoneyDetails.style.display = 'none';
            }
        }

        function showBankDetails() {
            var mobileMoneyDetails = document.getElementById('mobileMoneyDetails');
            var bankDetails = document.getElementById('bankDetails');
            if (bankDetails.style.display === 'none') {
                bankDetails.style.display = 'block';
                mobileMoneyDetails.style.display = 'none';
            } else {
                bankDetails.style.display = 'none';
            }
        }
    </script>
</body>
</html>
