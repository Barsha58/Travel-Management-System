<?php
// Handle the guide's acceptance of a request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];

    $conn = new mysqli("localhost", "root", "", "tour_management_system");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the request status to 'accepted' in the database
    $sql = "UPDATE package_requests SET status = 'accepted' WHERE request_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);

    if ($stmt->execute()) {
        echo "Request accepted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
