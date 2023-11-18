<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin - Manage Guide Information</title>
    <style>
       /* Reset some default styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
body {
    background-image: url('your-image-url.jpg'); /* Replace 'your-image-url.jpg' with the path or URL to your image */
    background-size: cover; /* This property ensures the image covers the entire background */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    background-attachment: fixed; /* Fixes the background image while scrolling */
}
/* Header styles */
header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    margin: 0;
}

/* Container styles */
.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
	 border: 2px solid var(--blue);
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: black;
    color: white;
}

/* Form styles */
form {
    margin-top: 20px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form input[type="password"],
form select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

/* Center-align the form button */
form {
    text-align: center;
	 border: 2px solid var(--blue);
}

form button {
    background-color: var(--blue);
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block; /* Ensure the button doesn't take up the full width */
}

form button:hover {
    background-color: #98FB98;
}

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
.heading {
    text-align: center;
    margin-bottom: 20px;
}

/* Style for the subheading (span) */
.heading span {
    display: block; /* Display on a new line */
    font-size: 3rem; /* Adjust the font size */
    color: #29d9d5; /* Your desired color */
    margin-bottom: 10px; /* Add some spacing below the subheading */
}

/* Style for the main heading (h1) */
. h1 {
    font-size: 3.5rem; /* Adjust the font size */
    color: #000080; /* Your desired color */
}
h2 {
    text-align: center; /* Center-align the h2 element */
    font-size: 22px; /* Set the font size to 18px */
    color: var(--blue); /* Make the text white for visibility */
}
/* Assuming your existing CSS for .footer */
.footer {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  background-color: #333; /* Add your background color here */
  color: #fff; /* Add your text color here */
  padding: 20px;
}

/* Add these styles for .box to adjust spacing */
.box {
  margin-bottom: 20px;
}

/* Add these styles for the share icons */
.share {
  margin-top: 10px;
}

/* Add these styles for the "B&S" text */
p {
  margin-top: 20px;
}

    </style>
</head>
<body>
    <header>
        <h1>Admin - Manage Guide Information</h1>
    </header>
	<header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
        <nav class="navbar">
            <a href="admin.php">Admin Dashboard</a>
			<a href="managepackage.php">Manage Packages</a>
			<a href="gallery.php">Manage Gallery</a>
           
			
        </nav>
        <a href="index.php" class="btn">Log Out </a>
    </header>
    <section class="AvailableGuide" id="Available Guide">
	<div class="container">
        <h2>List of Available Guides</h2>
        <?php
        // PHP code to fetch and display guide information
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tour_management_system";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM guide";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Guide ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Gender</th>
			
			<th>Bio</th>
			<th>Pic</th>
			<th>Status</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["guide_id"] . "</td>";
                echo "<td>" . $row["guide_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone_number"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
				
				echo "<td>" . $row["bio"] . "</td>";
				echo "<td>" . $row["pic"] . "</td>";
				
                echo "<td>";
    echo "<form action='admin_action.php' method='post'>";
    echo "<input type='hidden' name='guide_id' value='" . $row["guide_id"] . "'>";
    
    // Check if the guide is enabled or disabled and display the appropriate option
    if ($row["status"] == 1) {
        echo "<input type='checkbox' name='enable' value='1' checked> Enable";
    } else {
        echo "<input type='checkbox' name='enable' value='1'> Enable";
    }
    
    echo "<input type='submit' value='Update'>";
    echo "</form>";
    echo "</td>";
    
    echo "</tr>";
}
		echo "</table>";}
		else {
            echo "No guides available.";
        }

        $conn->close();
        ?>
    </div>
	</section>
	
    <section class="add_guide" id="add">
    <div class="container">
        <h2>Add New Guide</h2>
        <form action="" method="post">
            <input type="hidden" name="action" value="add_guide">
            
            <input type="text" id="name" name="guide_name" placeholder="Guide Name" required>
            
            <input type="email" id="email" name="email" placeholder="Guide Email" required>
            
            <input type="text" id="phone_number" name="phone_number" placeholder="Guide Phone Number" required>
			
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
           
            <input type="password" id="password" name="password" placeholder="Guide Password" required>
            <button type="submit">Add Guide</button>
        </form>
		
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == 'add_guide') {
        // Get guide information from the form
        $guide_name = $_POST['guide_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
		
        $status = 0; // Set the default status to 0 for a new guide

        // SQL query to insert a new guide
        $sql = "INSERT INTO guide (guide_name, email, phone_number, gender, password, status)
                VALUES ('$guide_name', '$email', '$phone_number', '$gender', '$password', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Guide added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


?>

    </div>
</section>

<section>
<div class="container">
    <h2>Update Guide Information</h2>
    <form action="" method="post">
        <input type="hidden" name="action" value="update_guide">
        
        <input type="text" id="guide_id" name="guide_id" placeholder="Guide ID" required>
       
        <input type="text" id="new_guide_name" name="new_guide_name" placeholder="New Guide Name">
      
        <input type="email" id="new_email" name="new_email" placeholder="New Guide Email">
        
        <input type="text" id="new_phone_number" name="new_phone_number" placeholder="New Guide Phone Number">
        
        <select id="new_gender" name="new_gender" placeholder="New Guide Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        
        <input type="password" id="new_password" name="new_password" placeholder="New Guide Password">
        <button type="submit">Update Guide</button>
    </form>
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == 'update_guide') {
        // Get guide information from the form
        $guide_id = isset($_POST['guide_id']) ? $_POST['guide_id'] : '';
        $new_guide_name = $_POST['new_guide_name'];
        $new_email = $_POST['new_email'];
        $new_phone_number = $_POST['new_phone_number'];
        $new_gender = $_POST['new_gender'];
        $new_password = $_POST['new_password'];

        // Initialize an array to store update values
        $update_values = array();

        // Check and add non-empty values to the update array
        if (!empty($new_guide_name)) {
            $update_values[] = "guide_name = '$new_guide_name'";
        }

        if (!empty($new_email)) {
            $update_values[] = "email = '$new_email'";
        }

        if (!empty($new_phone_number)) {
            $update_values[] = "phone_number = '$new_phone_number'";
        }

        if (!empty($new_gender)) {
            $update_values[] = "gender = '$new_gender'";
        }

        if (!empty($new_password)) {
            $update_values[] = "password = '$new_password'";
        }

        if (!empty($update_values)) {
            $update_sql = implode(", ", $update_values);
            $sql = "UPDATE guide
                    SET $update_sql
                    WHERE guide_id = '$guide_id'";

            if ($conn->query($sql) === TRUE) {
                echo "Guide updated successfully";
            } else {
                echo "Error updating guide: " . $conn->error;
            }
        } else {
            echo "No fields to update.";
        }
    }
}


?>

</div>

</section>
   <div class="container">
    <h2>Remove Guide</h2>
    <form action="" method="post">
        <input type="hidden" name="action" value="remove_guide">
        
        <input type="text" id="guide_id" name="guide_id" placeholder="Guide ID" required>
        <button type="submit">Remove Guide</button>
    </form>
</div>

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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == 'remove_guide') {
        // Get the guide ID to be removed
        $guide_id = isset($_POST['guide_id']) ? $_POST['guide_id'] : '';

        // Execute the DELETE query for removing the guide
        $sql = "DELETE FROM guide WHERE guide_id = '$guide_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Guide removed successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
 
</section>

    
</body>
</html>



