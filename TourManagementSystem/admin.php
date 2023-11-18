
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Admin Home Page</title>
    <style>
	
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

/* Dashboard Styles */
.dashboard {
	 margin-top: 15rem;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
 
}

.info-box {
  background-color: var(--bg-color);
  border: var(--border);
  border-radius: 1rem;
  padding: 2rem;
  margin: 1rem;
  flex: 1;
  text-align: center;
}

.info-box h2 {
  font-size: 2.5rem;
  color: var(--blue);
}

.info-box p {
  font-size: 2rem;
  color: var(--light-color);
}

/* Table Styles */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 2rem;
}

table, th, td {
  border: 1px solid var(--light-color);
}

th, td {
  padding: 1rem;
  text-align: left;
}

th {
  background-color: var(--bg-color);
  color: var(--blue);
  font-size: 1.8rem;
}

td {
  font-size: 1.6rem;
  color: var(--black);
}
 
h2 {
            text-align: center;
        }
		
		/* CSS for the gallery item cards */
.gallery-item {
    border: 2px solid var(--blue);
    padding: 10px; /* Padding around the card content */
    margin: 10px; /* Margin between cards */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Box shadow for a subtle card effect */
    background-color: #fff; /* Background color for the card */
    text-align: center; /* Center the content within the card */
    display: inline-block; /* Display cards inline */
    width: calc(25% - 20px); /* Set the width of each card (adjust as needed) */
    vertical-align: top; /* Align cards at the top */
    box-sizing: border-box; /* Include padding and border in the card's width */
}

/* CSS for the image inside the card */
.gallery-item img {
    max-width: 100%; /* Ensure the image fits within the card */
    height: auto; /* Maintain the image's aspect ratio */
}

/* Optional: Style for the status and enable/disable button */
.gallery-status {
    font-weight: bold;
}

.gallery-button {
    background-color: #007bff; /* Button background color */
    color: #fff; /* Button text color */
    padding: 5px 10px; /* Padding inside the button */
    border: none; /* Remove button border */
    cursor: pointer; /* Add pointer cursor on hover */
}

table {
    width: 80%;
    margin: 2rem auto; /* Center the table horizontally */
}

/* Increase h2 font size and set the color to var(--blue) */
h2 {
    text-align: center;
    font-size: 2.5rem; /* Adjust the font size as needed */
    color: navy;
}
.table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* This ensures that the container takes up the full viewport height */
}

.center-btn {
    text-align: center;
    margin-top: 20px; /* Adjust the margin as needed */
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


/* Dropdown button */
.dropbtn {
    background-color: transparent;
    color: var(--blue);
    padding: 12px;
    border: none;
    cursor: pointer;
	font-size: 18px; 
}

/* Dropdown container (hidden by default) */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: var(--black);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: var(--blue);
    color: #fff;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Style for the caret icon (downward arrow) */
.dropbtn i {
    margin-left: 5px;
}

    </style>
</head>
<body>
<header class="header">
    <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>

    <nav class="navbar">
        <a href="admin.php">Home</a>
        <a href="#customer" class="nav-link">Customer</a>
        <a href="#guide" class="nav-link">Guide</a>
        <a href="#packages" class="nav-link">Packages</a>
        <a href="#bookings" class="nav-link">Bookings</a>
        <a href="#gallery" class="nav-link">Gallery</a>

        <!-- Settings Dropdown -->
        <div class="dropdown">
            <button class="dropbtn">Settings <i class="fas fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="managepackage.php">Manage Packages</a>
                <a href="gallery.php">Manage Gallery</a>
                <a href="guidemanage.php">Manage Guides</a>
				<a href="contact.php"> Update Contacts</a>
            </div>
        </div>
        
       
    </nav>

    <a href="index.php" class="btn">Log Out </a>
</header>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS total_customers FROM customer";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_customers = $row['total_customers'];

$sql = "SELECT COUNT(*) AS total_guides FROM guide";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_guides = $row['total_guides'];

$sql = "SELECT COUNT(*) AS total_packages FROM packages";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_packages = $row['total_packages'];

$sql = "SELECT COUNT(*) AS total_bookings FROM bookings";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_bookings = $row['total_bookings'];
?>

 <section class="home" id="home">
        
<div class="dashboard">
    <div class="info-box">
        <h2>Total Customers</h2>
        <p><?php echo $total_customers; ?></p>
    </div>
    <div class="info-box">
        <h2>Total Guides</h2>
        <p><?php echo $total_guides; ?></p>
    </div>
    <div class="info-box">
        <h2>Total Packages</h2>
        <p><?php echo $total_packages; ?></p>
    </div>
    <div class="info-box">
        <h2>Total Bookings</h2>
        <p><?php echo $total_bookings; ?></p>
    </div>
</div>
</section>
<div style="margin-bottom: 20px;"></div>

<section class="customer"id="customer">
<div class="container">

<h2>Customer Information</h2>

    <?php
    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server
    $username = "root";
    $password = "";
    $dbname = "tour_management_system";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch all customer data
    $sql = "SELECT * FROM customer";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["cus_id"] . "</td>
                    <td>" . $row["customer_name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone_number"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No customers found.";
    }

    // Close the database connection
    $conn->close();
    ?>

	</div>
	</section>
	<div style="margin-bottom: 20px;"></div>
	<section class="Guide" id="guide">
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
		
		<div class="center-btn">
            <a href="guidemanage.php" class="btn">Manage Guides</a>
        </div>
    </div>
	</section>
	<div style="margin-bottom: 20px;"></div>
	
	<section class="Bookings"id="bookings">
<div class="container">

<h2>Booking Information</h2>
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

    // Query to select all booking information
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Booking ID</th>';
        echo '<th>Package ID</th>';
        echo '<th>Booking Date</th>';
        echo '<th>Customer Name</th>';
        echo '<th>Customer Email</th>';
        echo '<th>Customer Phone</th>';
        echo '<th>Total People</th>';
        echo '<th>Total Payment</th>';
		echo '<th>status</th>';
		echo '<th>cancellation_reason</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['booking_id'] . '</td>';
            echo '<td>' . $row['package_id'] . '</td>';
            echo '<td>' . $row['booking_date'] . '</td>';
            echo '<td>' . $row['customer_name'] . '</td>';
            echo '<td>' . $row['customer_email'] . '</td>';
            echo '<td>' . $row['customer_phone'] . '</td>';
            echo '<td>' . $row['total_people'] . '</td>';
            echo '<td>' . 'Tk' . number_format($row['total_payment'], 2) . '</td>';
			 echo '<td>' . $row['status'] . '</td>';
			   echo '<td>' . $row['cancellation_reason'] . '</td>';
			 
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No booking information available.';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
	</section>
	<div style="margin-bottom: 20px;"></div>
	<section class="packages" id="packages">
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
<div class="center-btn">
            <a href="managepackage.php" class="btn">Manage Packages</a>
        </div>
</div>
</section>
<div style="margin-bottom: 20px;"></div>
<section class="gallery"id="gallery">
    <div class="container">
        <h2>Gallery</h2>
        <?php
        // PHP code to fetch and display gallery items
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tour_management_system"; // Replace with your actual database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM gallery";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<div class='gallery-items'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='gallery-item'>";
                echo "<p>Gallery ID: " . $row["id"] . "</p>"; // Display Gallery ID
                echo "<img src='" . $row["image_url"] . "' alt='" . $row["location"] . "'>";
                echo "<p>Location: " . $row["location"] . "</p>";
                
                // Display the status and enable/disable button
                if ($row["status"] == 1) {
                    echo "<p>Status: Enabled</p>";
                    echo "<form action='gallery_action.php' method='post'>";
                    echo "<input type='hidden' name='gallery_id' value='" . $row["id"] . "'>";
                    echo "<input type='hidden' name='action' value='disable'>";
                    echo "<input type='submit' value='Disable'>";
                    echo "</form>";
                } else {
                    echo "<p>Status: Disabled</p>";
                    echo "<form action='gallery_action.php' method='post'>";
                    echo "<input type='hidden' name='gallery_id' value='" . $row["id"] . "'>";
                    echo "<input type='hidden' name='action' value='enable'>";
                    echo "<input type='submit' value='Enable'>";
                    echo "</form>";
                }

                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "No gallery items available.";
        }

        $conn->close();
        ?>
    </div>
	<div class="center-btn">
            <a href="gallery.php" class="btn">Manage Gallery</a>
        </div>
</section>
<div style="margin-bottom: 20px;"></div>
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
