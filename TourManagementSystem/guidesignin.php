<?php
// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$guide_name = $_POST["guide_name"];
	$email = $_POST["email"];
	$phone_number = $_POST["phone_number"];
    $password = $_POST["password"];
	
    $gender = $_POST["gender"];
    $status = 0; // Default status

    // Authenticate the user (example purposes only, use secure methods)
    $authenticated = true; // Replace with your authentication logic

    if ($authenticated) {
        // Store user info in the database
        $sql = "INSERT INTO guide (guide_name, email, phone_number, password,  gender, status) VALUES ('$guide_name', '$email', '$phone_number', '$password',  '$gender', $status)";
        if ($conn->query($sql) === TRUE) {
            // Redirect to index page
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="signupstyles.css">
<title>Sign Up Page</title>
</head>
<body>
<div class="container">
  <h2>SIGN UP TO CREATE A ACCOUNT</h2>
  <form action="" method="POST">  
    <input type="text" name="guide_name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="tel" name="phone_number"placeholder="Phone Number" required>
    <input type="password" name="password" placeholder="Password" required>
    
    <label for="gender">Gender:</label>
    <label>
        <input type="radio" name="gender" value="male" required> Male
    </label>
    <label>
        <input type="radio" name="gender" value="female" required> Female
    </label>
    <label>
        <input type="radio" name="gender" value="other" required> Other
    </label>
    <div class="login-link">
        <p>Already have an account? <a href="login.html">Login here</a></p>
    </div>
    <button type="submit">Sign Up</button>
  </form>
</div>
</body>
</html>
