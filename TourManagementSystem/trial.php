<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Guide Information</title>
</head>
<body>
    <h1>Update Guide Information</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="guide_id">Guide ID:</label>
        <input type="text" name="guide_id" id="guide_id" required>
        <br>
        <label for="pic">Guide Picture:</label>
        <input type="file" name="pic" id="pic" accept="image/*">
        <br>
        <label for="specialization">Specialization:</label>
        <input type="text" name="specialization" id="specialization">
        <br>
        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio"></textarea>
        <br>
        <input type="submit" value="Update Guide Information">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$guide_id = isset($_POST['guide_id']) ? $_POST['guide_id'] : null; // Get the guide_id from the form

// Check if a file was uploaded for the pic
if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {
    // Define allowed file types and maximum file size (max size set to 5MB)
    $allowed_types = array("image/jpeg", "image/png");
    $max_file_size = 5 * 1024 * 1024; // 5MB

    // Check file type and size
    if (in_array($_FILES["pic"]["type"], $allowed_types) && $_FILES["pic"]["size"] <= $max_file_size) {
        // Generate a unique filename
        $upload_dir = "uploads/";
        $file_extension = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . "." . $file_extension;

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $upload_dir . $unique_filename)) {
            $pic = $upload_dir . $unique_filename; // Set pic to the new file path
        } else {
            echo "Failed to move the uploaded picture.";
            exit();
        }
    } else {
        echo "Invalid file type or file size exceeds the limit (max size: 5MB).";
        exit();
    }
}

// Get specialization and bio from the form
$specialization = isset($_POST['specialization']) ? $_POST['specialization'] : null;
$bio = isset($_POST['bio']) ? $_POST['bio'] : null;

// Build the SQL query
$sql = "UPDATE guide SET";

if (isset($pic)) {
    $sql .= " pic = '$pic',";
}

if (!empty($specialization)) {
    $sql .= " specialization = '$specialization',";
}

if (!empty($bio)) {
    $sql .= " bio = '$bio',";
}

$sql = rtrim($sql, ","); // Remove the trailing comma

if ($guide_id !== null) {
    $sql .= " WHERE guide_id = $guide_id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Guide information updated successfully.";
    } else {
        echo "Error updating guide information: " . $conn->error;
    }
} else {
    echo "Guide ID is missing.";
}

// Close the database connection
$conn->close();
?>

