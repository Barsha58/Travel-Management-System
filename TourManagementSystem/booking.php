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

// Initialize the error message variable
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_id = $_POST['package_id'];
    $customer_email = $_POST['customer_email']; // Get the customer's email from the form

    // Check if the customer's email exists in the customer table
    if (checkCustomerEmailExists($conn, $customer_email)) {
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $total_people = $_POST['total_people'];

        // Calculate total_payment
        $packageDetails = getPackageDetails($conn, $package_id);
        $price_per_person = $packageDetails['price_per_person'];
        $total_payment = $price_per_person * $total_people;

        // Insert booking into the bookings table
        $stmt = $conn->prepare("INSERT INTO bookings (package_id, booking_date, customer_name, customer_email, customer_phone, total_people, total_payment) VALUES (?, NOW(), ?, ?, ?, ?, ?)");

        $stmt->bind_param("isssid", $package_id, $customer_name, $customer_email, $customer_phone, $total_people, $total_payment);

        if ($stmt->execute()) {
            // Insert successful, store booking details in a session
            $bookingDetails = array(
                'package_id' => $package_id,
                'package_name' => $packageDetails['package_name'],
                'description' => $packageDetails['description'],
                'price_per_person' => $packageDetails['price_per_person'],
                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_phone' => $customer_phone,
				'trip_starting_date' => $trip_starting_date,
				'trip_ending_date' => $trip_ending_date,
                'total_people' => $total_people,
                'total_payment' => $total_payment,
            );

            // Store the booking details in a session
            session_start();
            $_SESSION['booking_details'] = $bookingDetails;

            // Redirect to the review page
            header("Location: review_booking.php");
            exit();
        } else {
            // Insert failed, handle the error as needed
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // The customer's email does not exist in the customer table
        $errorMessage = "Error: Customer email not found. Please sign up or use a different email.";
    }
}

// Function to check if the customer's email exists in the customer table
function checkCustomerEmailExists($conn, $customer_email) {
    $stmt = $conn->prepare("SELECT email FROM customer WHERE email = ?");
    $stmt->bind_param("s", $customer_email);
    $stmt->execute();
    $stmt->store_result();
    $count = $stmt->num_rows;
    $stmt->close();
    return $count > 0;
}

// Function to fetch package details by package_id
function getPackageDetails($conn, $package_id) {
    $stmt = $conn->prepare("SELECT package_name, description, price_per_person FROM packages WHERE package_id = ?");
    $stmt->bind_param("i", $package_id);
    $stmt->execute();
    $stmt->bind_result($package_name, $description, $price_per_person);
    $stmt->fetch();
    $stmt->close();

    return array(
        'package_name' => $package_name,
        'description' => $description,
        'price_per_person' => $price_per_person,
    );
}
?>


	<!DOCTYPE html>
<html>
<head>
    <title>Booking Form</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<link rel="stylesheet" href="booking.css">
    <style>
	
	.footer {
  background-color: black;
  padding: 2rem;
  text-align: center;
}


</style>
	
</head>
<body>
<header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
		
		<nav class="navbar">
		<a href="index.php">Home</a>
		
		<a href="#package"class="nav-link">Package</a>
		<a href="#Booking Form ""class="nav-link">Booking Form</a>
		
		
		
		<a href="custsignup.php">Sign Up</a>
		</nav>
		<a href="login.php" class="btn">Log In</a>
    </header>
<section class="package" id="package">
    <?php
    $package_id = $_GET['package_id'];
    $packageDetails = getPackageDetails($conn, $package_id);
    ?>
	

    <div class="package-details">
	 <h1>Package Details</h1>
        <h3><?php echo $packageDetails['package_name']; ?></h3>
        <p><?php echo $packageDetails['description']; ?></p>
        <p>Prices per person: Tk <?php echo $packageDetails['price_per_person']; ?></p>
    </div>
	</section>
<section class="Booking Form" id="Booking Form">
   <form action="" method="post">
   <h1>Fill the Form</h1>
    <input type="hidden" name="package_id" value="<?php echo $package_id; ?>">
    
    
    <input type="text" name="customer_name" placeholder="Enter your name" required>
    
    <input type="email" name="customer_email" placeholder="Enter your email" required>
    
   
    <input type="text" name="customer_phone" placeholder="Enter your phone number" required>
	
    
    <input type="text" name="total_people" placeholder="Enter the total number of people" required>

    <!-- Calculate total_payment using PHP -->

   
    <input type="hidden" name="total_payment" value="<?php echo '$' . number_format($packageDetails['price_per_person'], 2); ?>" readonly>

    <input type="submit" name="submit" value="Next">
    
    <?php
// Display the error message if it exists
if (!empty($errorMessage)) {
    echo '<div style="color: red;">' . $errorMessage . '</div>';
}
?>
</section>
<footer>
<p> B & S</p>
</footer>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
