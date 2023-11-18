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

// Check if the form is submitted for deleting a package
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
    $id = $_POST["id"];
    
    // Use a prepared statement to delete the package
    $sql_delete_gallery = "DELETE FROM gallery WHERE id = ?";
    $stmt = $conn->prepare($sql_delete_gallery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Gallery deleted successfully.";
    } else {
        echo "Error deleting gallery: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection (at the end of the script)
$conn->close();
?>