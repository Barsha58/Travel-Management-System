<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$guide_id = isset($_POST['guide_id']) ? $_POST['guide_id'] : '';
$enable = isset($_POST['enable']) ? $_POST['enable'] : '';

// Update the status of the guide in the database
$status = ($enable == 1) ? 1 : 0;
$sql = "UPDATE guide SET status = '$status' WHERE guide_id = '$guide_id'";

if ($conn->query($sql) === TRUE) {
    echo "Guide status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
