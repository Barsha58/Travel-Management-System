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

// Check if the form is submitted for updating a package
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["package_id"])) {
    $package_id = $_POST["package_id"];

    // Initialize an array to store update values and parameters
    $update_values = array();
    $update_params = array();

    // Check and add non-empty values to the update array
    if (!empty($_POST["new_package_name"])) {
        $new_package_name = $_POST["new_package_name"];
        $update_values[] = "package_name = ?";
        $update_params[] = $new_package_name;
    }

    if (!empty($_POST["new_description"])) {
        $new_description = $_POST["new_description"];
        $update_values[] = "description = ?";
        $update_params[] = $new_description;
    }

    if (!empty($_POST["new_image_url"])) {
        $new_image_url = $_POST["new_image_url"];
        $update_values[] = "image_url = ?";
        $update_params[] = $new_image_url;
    }

    if (!empty($_POST["new_location"])) {
        $new_location = $_POST["new_location"];
        $update_values[] = "location = ?";
        $update_params[] = $new_location;
    }

    if (!empty($_POST["new_price_per_person"])) {
        $new_price_per_person = $_POST["new_price_per_person"];
        $update_values[] = "price_per_person = ?";
        $update_params[] = $new_price_per_person;
    }

    if (!empty($_POST["new_guide_id"])) {
        $new_guide_id = $_POST["new_guide_id"];
        $update_values[] = "guide_id = ?";
        $update_params[] = $new_guide_id;
    }

    if (!empty($_POST["starting_date"])) {
        $new_starting_date = $_POST["starting_date"];
        $update_values[] = "starting_date = ?";
        $update_params[] = $new_starting_date;
    }

    if (!empty($_POST["ending_date"])) {
        $new_ending_date = $_POST["ending_date"];
        $update_values[] = "ending_date = ?";
        $update_params[] = $new_ending_date;
    }

    if (!empty($_POST["booking_closed_date"])) {
        $new_booking_closed_date = $_POST["booking_closed_date"];
        $update_values[] = "booking_closed_date = ?";
        $update_params[] = $new_booking_closed_date;
    }

    if (!empty($_POST["booking_enabled"])) {
        $new_booking_enabled = $_POST["booking_enabled"];
        $update_values[] = "booking_enabled = ?";
        $update_params[] = $new_booking_enabled;
    }

    if (!empty($update_values)) {
        // Construct the update SQL query with placeholders
        $update_sql = "UPDATE packages SET " . implode(", ", $update_values) . " WHERE package_id = ?";

        // Add package_id to the parameters
        $update_params[] = $package_id;

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($update_sql);
        $update_types = str_repeat("s", count($update_params)); // Assuming all parameters are strings
        $stmt->bind_param($update_types, ...$update_params);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Package updated successfully.";
        } else {
            echo "Error updating package: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "No fields to update.";
    }
}

// Close the database connection (at the end of the script)
$conn->close();
?>