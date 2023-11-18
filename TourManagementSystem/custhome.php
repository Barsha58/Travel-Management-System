<?php
session_start(); // Start the session
// Check if the email is set in the session
if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

$email = $_SESSION["email"]; // Get the email from the session

// Database configuration
$con = new mysqli("localhost", "root", "", "tour_management_system");
if ($con->connect_error) {
    die('Failed to connect: ' . $con->connect_error);
}

// Retrieve customer information
$stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt_result = $stmt->get_result();

if ($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();
    $customer_name = $data["customer_name"];
    $phone_number = $data["phone_number"];
} else {
    // Handle the case where customer information is not found
    // You can redirect to an error page or take other appropriate actions.
    echo "Customer information not found.";
    exit();
}

// Retrieve customer's booking information
$booking_query = $con->prepare("SELECT * FROM bookings WHERE customer_email = ?");
$booking_query->bind_param("s", $email);
$booking_query->execute();
$booking_result = $booking_query->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        

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

body {
	
  background: var(--white);
  overflow-x: hidden;
  padding-top: 90px; /* Add top padding equal to the height of your navigation bar */
  justify-content: center;
    align-items: center;
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
        /* Style for booking information */
        .booking-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .booking-card h3 {
            font-size: 24px;
            margin-top: 10px;
        }

        .booking-card p {
            font-size: 16px;
            margin-top: 10px;
        }
		
		
/* Center the booking card on the page using Flexbox */
.booking-card {
    background-color: rgba(255, 255, 255, 0.8);
	 border: 2px solid var(--blue);
    border-radius: 10px;
    padding: 20px;
    margin: 20px auto; /* Center the card horizontally */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    max-width: 400px;
	text-align: center;
}


.book-now-button {
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

.book-now-button:hover  {
  background: var(--blue);
  color: var(--black);
}
.centered-text {
    text-align: center;
}	
/* CSS for the home section */
/* Add this CSS to your stylesheet or in a <style> block in your HTML */

/* Add this CSS to your stylesheet or in a <style> block in your HTML */

.home {
    margin: 0 auto;
    margin-top: 0rem;
    width: 90%;
    border-radius: 1rem;
    background: url('poi.jpg') no-repeat;
    background-size: cover;
    background-position: center;
    display: flex;
    flex-direction: column; /* Stack containers vertically */
    min-height: 80vh;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    color: white;
}

/* CSS for the welcome text container */
.home .container:first-child {
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px; /* Add space between containers */
}

/* CSS for the paragraphs (p) within the first container */
.home .container:first-child p {
    font-size: 1.8rem;
    margin: 10px 0;
}

/* CSS for the search form container */
.home .container:last-child {
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 20px;
    border-radius: 5px;
}

/* CSS for the search form elements */
.home .container:last-child .search-form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    background-color: transparent;
    padding: 20px;
}

/* CSS for the form elements within the search form container */
.home .container:last-child select,
.home .container:last-child input[type="month"],
.home .container:last-child button[type="submit"] {
    background-color: rgba(255, 255, 255, 0.7);
    color: black;
    padding: 10px;
    font-size: 1.4rem;
    border-radius: 5px;
    margin-right: 10px;
}

/* Style the search button within the search form container */
.home .container:last-child button[type="submit"] {
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    background-color: #29d9d5;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.home .container:last-child button[type="submit"]:hover {
    background-color: #1e9a96;
}

h1 {
    text-align: center;
    color: #000080;
    font-size: 30px;
}



.form-container {
    background-color:white;
	border: 2px solid var(--blue);
    padding: 20px;
	 margin: 20px auto;
    border-radius: 5px;
    width: 60%; /* Set the form width to 60% */
    text-align: center; /* Center align form content */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
	align:center;/* Add a shadow for a better look */
}

/* Style the form groups (input boxes) */
.form-group {
    margin-bottom: 15px;
}

/* Style the input fields and textareas */
.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease-in-out;
}

/* Style the labels */
.form-group label {
    position: absolute;
    top: 10px;
    left: 10px;
    color: #888;
    font-size: 16px;
    pointer-events: none;
    transition: top 0.3s ease, font-size 0.3s ease;
}

/* Move the label up and reduce its font size when the input is focused */
.form-group input[type="text"]:focus ~ label,
.form-group textarea:focus ~ label {
    top: -10px;
    font-size: 12px;
}

/* Change the border color of the input when focused */
.form-group input[type="text"]:focus,
.form-group textarea:focus {
    border-color: #007BFF;
}

/* Style the submit button */
.form-group input[type="submit"] {
    background-color: var(--blue);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

/* Change button color on hover */
.form-group input[type="submit"]:hover {
    background-color: Blue;
}
/* Style the "No bookings found" text */
.no-bookings {
    color: black; /* Set the text color to black */
}


    </style>
</head>
<body>
<header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
		
		<nav class="navbar">
		<a href="#">Home</a>
		
		<a href="#booking" class="nav-link">Booking</a>
		
		<a href="#Cancel Booking"class="nav-link">Cancel Booking</a>
		
		<a href="cuschangepass.php">Change Password</a>
		<a href="#contact" class="nav-link">Contact</a>
		
		
		</nav>
		<a href="index.php" class="btn">Log Out</a>
    </header>
	<?php
// Replace with your actual database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "tour_management_system";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve unique locations from the "packages" table
$query = "SELECT DISTINCT location FROM packages";
$result = $conn->query($query);

// Retrieve and store the location data in an array
$locations = [];
while ($row = $result->fetch_assoc()) {
    $locations[] = $row['location'];
}

// Close the database connection
$conn->close();
?>
<section class="home" id="home">
    <div class="container">
        <h2>Welcome, <?php echo $customer_name; ?>!</h2>
        <p>Email: <?php echo $email; ?></p>
        <p>Phone Number: <?php echo $phone_number; ?></p>
    </div>
    <div class="container">
        <form class="search-form" method="post" action="">
            <select name="location">
                <option value="">Select Location</option>
                <?php foreach ($locations as $location): ?>
                    <option value="<?= $location ?>"><?= $location ?></option>
                <?php endforeach; ?>
            </select>
            <input type="month" name="selected_month">
            <button type="submit">Search</button>
        </form>
    </div>
</section>

		
    <?php
    // Replace with your actual database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "tour_management_system";

    // Create a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize variables for form data
    $selected_location = "";
    $selected_month = "";

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['location']) && isset($_POST['selected_month'])) {
        // Get user inputs
        $selected_location = $_POST['location'];
        $selected_month = $_POST['selected_month'];

        // Construct the SQL query to search for packages based on location and month
        $query = "SELECT * FROM packages WHERE location = '$selected_location' AND DATE_FORMAT(starting_date, '%Y-%m') = '$selected_month'";

        // Execute the query
        $result = $conn->query($query);

        // Process and display the search results
        if ($result->num_rows > 0) {
            echo "<h2>Search Results</h2>";
            while ($row = $result->fetch_assoc()) {
                // Display package details here
                echo "<p>Package Name: " . $row['package_name'] . "</p>";
                echo "<p>Description: " . $row['description'] . "</p>";
                // Add more package details as needed
            }
        } else {
            echo "No packages found for the selected criteria.";
        }
    }

    // Close the database connection
    $conn->close();
    ?>
</div>
</section>

    
	<main>
    <section class="bookings" id="booking">
    <?php
    if ($booking_result->num_rows > 0) {
        echo '<header><h1 class="centered-text">Your Bookings</h1></header>';
        while ($booking_data = $booking_result->fetch_assoc()) {
            if ($booking_data["status"] != "canceled") { // Check if the booking is not canceled
                echo '<div class="booking-card">';
                echo '<h3>Booking ID: ' . $booking_data["booking_id"] . '</h3>';
                echo '<p>Package ID: ' . $booking_data["package_id"] . '</p>';
                echo '<p>Booking Date: ' . $booking_data["booking_date"] . '</p>';
                echo '<p>Total people: ' . $booking_data["total_people"] . '</p>';
                echo '<p>Total payment: Tk ' . $booking_data["total_payment"] . '</p>';
                // Add more booking details as needed
                echo '</div>';
            }
        }
    } else {
        echo '<p class="no-bookings">No bookings found.</p>';
    }

    // Close the booking query
    $booking_query->close();
	$con->close();
            
    ?>
	
</section>

       
        
        
    </main>
</div>
<section class="cancel-booking" id="cancel-booking">
        <div class="form-container">
            <h1>Cancel Booking</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" id="booking_id" name="booking_id" required placeholder="Booking ID">
                </div>
                
                <div class="form-group">
                    <input type="text" id="customer_name" name="customer_name" required placeholder="Customer Name">
                </div>
                
                <div class="form-group">
                    <textarea id="cancellation_reason" name="cancellation_reason" rows="4" required placeholder="Cancellation Reason"></textarea>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Cancel Booking">
                </div>
            </form>
        </div>
    </section>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $booking_id = $_POST["booking_id"];
        $customer_name = $_POST["customer_name"];
        $cancellation_reason = $_POST["cancellation_reason"];
        
        // Perform validation (you can add more validation as needed)
        if (empty($booking_id) || empty($customer_name) || empty($cancellation_reason)) {
            echo "Please fill out all fields.";
        } else {
            // Connect to your database (replace with your database connection code)
            $db = new mysqli("localhost", "root", "", "tour_management_system");
            
            // Check for database connection errors
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            
            // Update the booking status to "canceled" and save the cancellation reason
            $sql = "UPDATE bookings SET status = 'canceled', cancellation_reason = ? WHERE booking_id = ? AND customer_name = ?";
            
            // Prepare the SQL statement
            $stmt = $db->prepare($sql);
            
            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("sss", $cancellation_reason, $booking_id, $customer_name);
                
                // Execute the SQL statement
                if ($stmt->execute()) {
                    echo "Booking #$booking_id has been canceled successfully.";
                } else {
                    echo "Error canceling the booking: " . $stmt->error;
                }
                
                // Close the statement
                $stmt->close();
            } else {
                echo "Error preparing the SQL statement: " . $db->error;
            }
            
            // Close the database connection
            $db->close();
        }
    }
    ?>


<section class = "footer">
   <div class = "box_container">
        
		
        <div class="box" id="contact">
		
             <h3>contact info</h3>	
			 <p> <i class="fas fa-map"></i> Chittagong </p>
             <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
			 <p> <i class="fas fa-envelope"></i> bs2233@gmail.com </p>
			 <p> <i class="fas fa-clock"></i> 7.00am - 10.00pm </p>
		</div>
		<div class = "box">
	         <a href="#" class="logo"> <i class ="fas fa-paper-plane"></i>travel</a>
	         <p>“We travel not to escape life, but for life not to escape us.” </p>
	         <div class="share">
	              <a href="#" class="fab fa-facebook-f"></a>
				  <a href="#" class="fab fa-twitter"></a>
				  <a href="#" class="fab fa-instagram"></a>
				  <a href="#" class="fab fa-linkedin"></a>
			</div>
		
		
    </div>
</section>

</body>
</html>
