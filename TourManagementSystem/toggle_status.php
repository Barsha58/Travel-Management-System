

<?php
// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'tour_management_system';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the required parameters are set in the URL
if (isset($_GET['id']) && isset($_GET['status'])) {
    $package_id = $_GET['id'];
    
    // Retrieve the current status from the database
    $sql = "SELECT booking_enabled FROM packages WHERE package_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $package_id);
    
    if ($stmt->execute()) {
        $stmt->bind_result($current_status);
        $stmt->fetch();
        $stmt->close();
        
        // Toggle the status between enabled and disabled
        $new_status = ($current_status == 1) ? 0 : 1;

        // Update the booking_enabled status in the database
        $update_sql = "UPDATE packages SET booking_enabled = ? WHERE package_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_status, $package_id);
        
        if ($update_stmt->execute()) {
            echo "Status updated successfully.";
        } else {
            echo "Error updating status: " . $update_stmt->error;
        }

        $update_stmt->close();
    } else {
        echo "Error retrieving current status: " . $stmt->error;
    }
}

// Close the database connection
$conn->close();
?>
