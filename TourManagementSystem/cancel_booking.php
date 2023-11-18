<!DOCTYPE html>
<html>
<head>
    <title>Booking Cancellation</title>
</head>
<body>
    <h2>Cancel Booking</h2>
    <form action="cancel_booking.php" method="POST">
        
		
        <input type="text" id="booking_id" name="booking_id"placeholder="Booking ID" required><br><br>
        
      
        <input type="text" id="customer_name" name="customer_name"placeholder="Customer Name" required><br><br>
        
        
        <textarea id="cancellation_reason" name="cancellation_reason" rows="4" placeholder="cancellation_reason"required></textarea><br><br>
        
        <input type="submit" value="Cancel Booking">
    </form>
</body>
</html>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $booking_id = $_POST["booking_id"];
        $customer_name = $_POST["customer_name"];
        $cancellation_reason = $_POST["cancellation_reason"];
        
        // Perform validation (you can add more validation as needed)
        if (empty($booking_id) || empty($customer_name) || empty($cancellation_reason)) {
            echo "Please fill out all fields.";
        } else {
            // Connect to your database (replace with your database connection code)
            $db = new mysqli("localhost", "root", "", "tour_management_system");
            
            // Check for database connection errors
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            
            // Update the booking status to "canceled" and save the cancellation reason
            $sql = "UPDATE bookings SET status = 'canceled', cancellation_reason = ? WHERE booking_id = ? AND customer_name = ?";
            
            // Prepare the SQL statement
            $stmt = $db->prepare($sql);
            
            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("sss", $cancellation_reason, $booking_id, $customer_name);
                
                // Execute the SQL statement
                if ($stmt->execute()) {
                    echo "Booking #$booking_id has been canceled successfully.";
                } else {
                    echo "Error canceling the booking: " . $stmt->error;
                }
                
                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing the SQL statement: " . $db->error;
            }
            
            // Close the database connection
            $db->close();
        }
    }
    ?>
