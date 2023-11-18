<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve email from the submitted form
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Prepare SQL statement to fetch guide_id based on email
    $sql = "SELECT guide_id FROM guide WHERE email = ?";

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($guide_id);

    // Check if a guide with the provided email exists
    if ($stmt->fetch()) {
        // Close the first prepared statement before executing the second one
        $stmt->close();

        // Fetch packages associated with the guide
        $packages = [];
        $sql = "SELECT * FROM packages WHERE guide_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $guide_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $packages[] = $row;
        }

        // Display the packages
        echo "<h2>Packages for Guide ID: $guide_id</h2>";
        echo "<ul>";
        foreach ($packages as $package) {
            echo "<li>{$package['package_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No guide found with the provided email.</p>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
