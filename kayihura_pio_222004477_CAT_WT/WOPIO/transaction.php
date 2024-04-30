<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the latest transaction details
$sql = "SELECT t.transaction_id, t.transaction_date, e.event_name, t.ticket_type, t.quantity, ti.ticket_price, t.payment_method
        FROM transactions t
        JOIN events e ON t.event_id = e.event_id
        JOIN tickets ti ON t.event_id = ti.event_id
        WHERE t.transaction_id = (SELECT MAX(transaction_id) FROM transactions)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Construct email message
        $message = "Hello,\n\n";
        $message .= "Thank you for purchasing tickets!\n\n";
        $message .= "Transaction ID: " . $row["transaction_id"] . "\n";
        $message .= "Transaction Date: " . $row["transaction_date"] . "\n";
        $message .= "Event Name: " . $row["event_name"] . "\n";
        $message .= "Ticket Type: " . $row["ticket_type"] . "\n";
        $message .= "Quantity: " . $row["quantity"] . "\n";
        $message .= "Total Price: $" . ($row["ticket_price"] * $row["quantity"]) . "\n";
        $message .= "Enjoy the event!\n";

        // HTML email template
        $html_message = "<html><body>";
        $html_message .= "<h2>Hello,</h2>";
        $html_message .= "<p>Thank you for purchasing tickets!</p>";
        $html_message .= "<p><strong>Transaction ID:</strong> " . $row["transaction_id"] . "<br>";
        $html_message .= "<strong>Transaction Date:</strong> " . $row["transaction_date"] . "<br>";
        $html_message .= "<strong>Event Name:</strong> " . $row["event_name"] . "<br>";
        $html_message .= "<strong>Ticket Type:</strong> " . $row["ticket_type"] . "<br>";
        $html_message .= "<strong>Quantity:</strong> " . $row["quantity"] . "<br>";
        $html_message .= "<strong>Total Price:</strong> $" . ($row["ticket_price"] * $row["quantity"]) . "<br>";
        $html_message .= "<p>Enjoy the event!</p>";
        $html_message .= "</body></html>";

        // Send email (you need to implement email sending logic here)
        // Example using mail function
        $to = "pio@gmail.com";
        $subject = "Ticket Purchase Confirmation";
        $headers = "From:kayihurapio@gmail.com\r\n";
        $headers .= "Reply-To: pio@gmail.com\r\n";
        $headers .= "Content-type: cashier\r\n";
        
        // Send the email
        mail($to, $subject, $html_message, $headers);
    }
} else {
    echo "0 results";
}

$conn->close();
?>
