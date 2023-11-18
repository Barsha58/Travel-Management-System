<?php
// Start or resume a session
session_start();

// Check if the user is logged in (you should implement your authentication logic here)
if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Get the email from the session
$email = $_SESSION["email"];

// Include your database connection code here (e.g., database.php).

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];

    // Connect to the database (replace these with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tour_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a SQL query to check if the old password matches
    $sql = "SELECT * FROM customer WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $old_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // The old password matches, so update the password
        $update_sql = "UPDATE customer SET password = ? WHERE email = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ss", $new_password, $email);
        if ($update_stmt->execute()) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Invalid old password.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('art.jpeg'); /* Replace with your image file */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

       .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 300px; /* Adjust the max-width to make the container smaller */
            margin: 0 auto; /* Center the container horizontally */
        }

        h2 {
            color: #ff9900; /* Blue font color */
            text-align: center;
        }

        p {
            color: #007BFF; /* Blue font color */
            text-align: center;
        }

form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to the form */
            backdrop-filter: blur(10px); /* Apply a blur effect to the background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover  {
    background-color: #ff9900;
    color: white;
}

        /* Error message style */
        .error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Change Password</h2>
        <p>Logged in as: <?php echo $email; ?></p>
    </div>
    
    <form method="POST" action="">
    <label>Old Password:</label>
    <input type="password" name="old_password" required><br><br>
    <label>New Password:</label>
    <input type="password" name="new_password" required><br><br> <!-- Corrected name attribute -->
    <label>Confirm Password:</label>
    <input type="password" name="retype_password" required><br><br>
    <input type="submit" value="Change Password"> 
</form>

</body>
</html>


