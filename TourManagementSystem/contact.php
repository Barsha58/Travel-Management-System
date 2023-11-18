<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the contact information from the form
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    
    // Validate and sanitize the input data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $start_time = filter_var($start_time, FILTER_SANITIZE_STRING);
    $end_time = filter_var($end_time, FILTER_SANITIZE_STRING);
    
    // Perform database insertion, but we will DELETE any existing data in the table first
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tour_management_system";
    
    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Delete any existing data from the table
    $deleteSql = "DELETE FROM contacts";
    $conn->query($deleteSql);
    
    // Insert the contact information into the database
    $insertSql = "INSERT INTO contacts (name, phone, email, start_time, end_time) VALUES ('$name', '$phone', '$email', '$start_time', '$end_time')";
    
    if ($conn->query($insertSql) === TRUE) {
        // Redirect back to the admin panel with a success message
        header("Location: admin.php?contact_inserted=1");
        exit(); // Make sure to exit after the header() to prevent further execution
    } else {
        echo "Error inserting contact information: " . $conn->error;
    }
    
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Your CSS styles -->
    <style>
        /* Apply some basic styles to the body */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

/* Style the header */
h1 {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

/* Style the form container */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    margin: 0 auto;
}

/* Style form headings */
h2 {
    color: #333;
    font-size: 20px;
    margin-bottom: 10px;
}

/* Style labels and input fields */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="time"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #555;
}

/* Style error messages (if any) */
.error {
    color: red;
    margin-top: 5px;
}
/* Global Styles */
:root {
  --blue: #29d9d5;
  --black: #111;
  --white: #fff;
  --light-color: #aaa;
  --bg-color: #222;
  --black-bg: rgba(17, 17, 17, 0.7);
  --border: 2px solid var(--blue);
}

/* Global Styles */
* {
  font-family: 'Poppins', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  border: none;
  text-decoration: none;
  text-transform: none;
  transition: all 0.2s linear;
}

/* HTML Styles */
html {
  font-size: 62.5%;
  overflow-x: hidden;
  scroll-behavior: smooth;
  scroll-padding-top: 9rem;
}

/* Body Styles */
body {
  background: var(--white);
  overflow-x: hidden;
}

/* Button Styles */
.btn {
  margin-top: 1rem;
  display: inline-block;
  padding: 1rem 3rem;
  font-size: 1.7rem;
  color: var(--blue);
  border: var(--border);
  border-radius: 5rem;
  cursor: pointer;
  background: none;
}

.btn:hover {
  background: var(--blue);
  color: var(--black);
}

/* Header Styles */
.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  background: var(--bg-color);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem;
}

/* Navbar Styles */
.navbar a {
  font-size: 2rem;
  color: var(--light-color);
  display: inline-block;
  margin: 0 1rem;
}

.navbar a:hover {
  color: var(--blue);
}

/* Logo Styles */
.logo {
  font-size: 2.5rem;
  color: var(--white);
  font-weight: bolder;
}

.logo i {
  color: var(--blue);
  padding-right: 0.5rem;
}
form {
    z-index: 1000; /* Adjust the value as needed */
}

    </style>
</head>
<body>
    <h1>Contact Information</h1>
    
<header class="header">
    <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>

    <nav class="navbar">
        <a href="admin.php">Admin Dashboard</a>
        </nav>

    <a href="index.php" class="btn">Log Out</a>
</header>

    <!-- Form for inserting contact information -->
    <form action="" method="post">
        <h2>Insert Contact Information</h2>

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required>

        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" required>

        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" required>

        <input type="submit" value="Insert Contact">
    </form>
</body>
</html>
