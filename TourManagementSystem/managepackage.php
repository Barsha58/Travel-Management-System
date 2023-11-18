<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	 border: 2px solid var(--blue);
}

h1, h2 {
    color: #333;
    text-align: center;
    margin: 20px 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 60px;
}

th {
    background-color: Navy;
    color: white;
    text-align: left;
    padding: 12px;
    border: 1px solid #ddd;
}

tr {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #e0e0e0;
}

td {
    text-align: left;
    padding: 10px;
    border: 1px solid #ddd;
}

form {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea,
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

section {
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

footer {
    text-align: center;
    padding: 10px;
    background-color: #333;
    color: white;
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
./* CSS for the table container */
.container {
    margin-top: 80px; /* Adjust this value based on the navbar height */
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
.PackageDetails h2 {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}
h2 {
    margin-bottom: 20px; /* Adjust as needed */
}
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
<header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
        <nav class="navbar">
            <a href="admin.php">Admin Dashboard</a>
			<a href="guidemanage.php">Manage Guides</a>
			<a href="gallery.php">Manage Gallery</a>
           
			
        </nav>
        <a href="index.php" class="btn">Log Out</a>
    </header>

<section class="PackageDetails" id="Package Details">
	<div class="container">
	 <h2>Package Details</h2>

<table>

    <thead>
	
        <tr>
            <th>Package ID</th>
            <th>Package Name</th>
            <th>Description</th>
            <th>Image URL</th>
			
            
			<th>Location</th>
            
            <th>Price per Person</th>
			<th>Guide ID</th>
			<th>Starting Date</th>
			<th>Ending Date</th>
           
			<th>Booking Closed Date</th>
			
			
            <th>Status</th>
			<th>Action</th>
        </tr>
    </thead>
    <tbody>
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

        // Fetch all packages from the database
        $sql = "SELECT * FROM packages";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['package_id'] . "</td>";
        echo "<td>" . $row['package_name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['image_url'] . "</td>";
		
        echo "<td>" . $row['location'] . "</td>";
		
       
        echo "<td>" . $row['price_per_person'] . "</td>";
		echo "<td>" . $row['guide_id'] . "</td>";
		echo "<td>" . $row['starting_date'] . "</td>";
		echo "<td>" . $row['ending_date'] . "</td>";
        
		echo "<td>" . $row['booking_closed_date'] . "</td>";
        
        // Set the session status based on booking_enabled
        if ($row['booking_enabled']) {
            $_SESSION['status'][$row['package_id']] = 'Enabled';
            echo "<td>Enabled</td>";
        } else {
            $_SESSION['status'][$row['package_id']] = 'Disabled';
            echo "<td>Disabled</td>";
        }
        
        echo "<td>";
        if ($row['booking_enabled']) {
            echo "<a href='toggle_status.php?id=" . $row['package_id'] . "&status=disable'>Disable</a>";
        } else {
            echo "<a href='toggle_status.php?id=" . $row['package_id'] . "&status=enable'>Enable</a>";
        }
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='11'>No packages found.</td></tr>";
}

// Close the database connection
$conn->close();
?>
		
    </tbody>
</table>
</div>
</section>

    <section class="add_package" id="Insert Package">
    <div class="container">
<h2>Add New Package</h2>
<form action="" method="post">
    
    
    <input type="text" name="package_name" placeholder="Enter Package Name"required><br>
    
    <textarea name="description" placeholder="Enter Package Description"required></textarea><br>
    
    <input type="text" name="image_url" placeholder="Enter Image URL"required><br>
	
   
    <input type="text" name="location"placeholder="Enter Location" required><br>
    
   
    <input type="text" name="price_per_person" placeholder="Enter Price Per Person"required><br>
	 <input type="text" name="guide_id"placeholder="Guide ID"><br>
	<label for="starting_date">Enter Starting Date:</label>
	<input type="date" name="starting_date"required><br>
	<label for="ending_date">Enter Ending Date:</label>
	<input type="date" name="ending_date" required><br>
    
    
	<label for="booking_closed_date">Enter Booking Closed Date:</label>
	<input type="date" name="booking_closed_date" required><br>
    
    <label>Booking Enabled:</label>
    <label for="booking_enabled_yes">Yes</label>
    <input type="radio" name="booking_enabled" value="1" id="booking_enabled_yes" checked>
    <label for="booking_enabled_no">No</label>
    <input type="radio" name="booking_enabled" value="0" id="booking_enabled_no">
    <br>
    
    <input type="submit" value="Add Package">
</form>
</div>
</section>

    <section class="update_package" id="Update Package">
    <div class="container">
<h2>Update Package</h2>
<form action="update_package.php" method="post">
    
    <input type="text" name="package_id" placeholder="Enter Package ID"required><br>
   
    <input type="text" name="new_package_name"placeholder="Enter New Package Name"><br>
    
    <textarea name="new_description"placeholder="Enter New Description"></textarea><br>
    
    <input type="text" name="new_image_url"placeholder="Enter New Image_url"><br>
   
    <input type="text" name="new_location"placeholder="Enter New Location"><br>
    
    
    <input type="text" name="new_price_per_person"placeholder="Enter new Price Per Person"><br>
    
    <input type="text" name="new_guide_id"placeholder="Enter New Guide ID"><br>
	<label for="starting_date">Starting Date:</label>
    <input type="date" name="starting_date"><br> <!-- New input for starting_date -->
    <label for="ending_date">Ending Date:</label>
    <input type="date" name="ending_date"><br> <!-- New input for ending_date -->
    <label for="booking_closed_date">Booking Closed Date:</label>
    <input type="date" name="booking_closed_date"><br> 
    <input type="submit" value="Update Package">
</form>
</div>
</section>
<section class="delete_package" id="Delete Package">
    <div class="container">
<h2>Delete Package</h2>
<form action="delete_package.php" method="post">
   
    <input type="text" name="package_id"  placeholder="Enter Package ID"required><br>
    <input type="submit" value="Delete Package">
</form>
</div>
</section>

<section class="footer">

  
    <div class="box">
      <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
      <p>“We travel not to escape life, but for life not to escape us.”</p>
      <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
      </div>
    </div>
	<p>B&S</p>
  </div>
</section>
</body>
</html>

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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["package_name"]) &&
        isset($_POST["description"]) &&
        isset($_POST["image_url"]) &&
        isset($_POST["location"]) &&
        isset($_POST["price_per_person"]) &&
        isset($_POST["guide_id"])&&
		isset($_POST["starting_date"]) &&
		isset($_POST["ending_date"]) &&
		isset($_POST["booking_closed_date"]) 
    ) {
        // Get form input values
        $package_name = $_POST['package_name'];
        $description = $_POST['description'];
        $image_url = $_POST['image_url'];
        $location = $_POST['location'];
        $price_per_person = $_POST['price_per_person'];
        $guide_id = $_POST['guide_id'];
		$starting_date = $_POST['starting_date'];
		$ending_date = $_POST['ending_date'];
		$booking_closed_date = $_POST['booking_closed_date'];
        
        // Check if booking_enabled checkbox is checked
        $booking_enabled = isset($_POST['booking_enabled']) ? 1 : 0;

        // SQL query to insert a new package using prepared statement
        $sql = "INSERT INTO packages (package_name, description, image_url, location, price_per_person, guide_id,starting_date,ending_date,booking_closed_date, booking_enabled)
                VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?)";

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare($sql);
       $stmt->bind_param("ssssisissi", $package_name, $description, $image_url, $location, $price_per_person, $guide_id, $starting_date, $ending_date, $booking_closed_date, $booking_enabled);



        // Execute the prepared statement
        if ($stmt->execute()) {
            // Insert successful
            echo "New package added successfully.";
        } else {
            // Insert failed, handle the error as needed
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }

}  

// Close the database connection (at the end of the script)
$conn->close();
?>




