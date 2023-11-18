<?php
session_start();
echo("connect");
{$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}}

  if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];

    // Check if the old password matches the one in the database for the current user
    $email = $_SESSION['email']; // You should set this when the user logs in

    $query = "SELECT password FROM customer WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verify the old password
        if (password_verify($oldPassword, $storedPassword)) {
            // Hash and update the new password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateQuery = "UPDATE customer SET password = '$hashedNewPassword' WHERE email = '$email'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Password changed successfully!";
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "Incorrect old password.";
        }
    } else {
        echo "Error fetching user data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
