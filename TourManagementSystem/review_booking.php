<?php
session_start();

// Check if the booking details are stored in the session
if (isset($_SESSION['booking_details'])) {
    $bookingDetails = $_SESSION['booking_details'];
} else {
    // If the details are not found, redirect to the booking form page
    header("Location: booking_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Booking</title>
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

        body {
            font-family: Arial, sans-serif;
            background-image: url('conbok.webp'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        /* Header and Navbar styles */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1; /* Ensure the header is above other content */
            background-color: rgba(0, 0, 0, 0.7); /* Add background color to the header */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .navbar a {
            font-size: 1.6rem;
            color: #fff;
            display: inline-block;
            margin: 0 1rem;
            text-decoration: none;
        }

        .navbar a:hover {
            color: var(--blue);
        }

        .logo {
            font-size: 2.5rem;
            color: #fff;
            font-weight: bolder;
            text-decoration: none;
        }

        .logo i {
            color: var(--blue);
            padding-right: 0.5rem;
        }

        /* Container styles */
        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            max-width: 1400px;
			 color: #fff; 
            text-align: center;
            margin: 70px auto 10px; /* Adjust the top margin to create space below the navbar */
        }

        h1 {
            background-color: var(--black);
            color:var(--blue)
            padding: 20px;
            text-align: center;
            font-size: 40px;
        }
		h1, h2{
    color: var(--blue);
}


        h2 {
            margin-top: 20px;
			font-size: 30px;
        }

        p {
            margin: 10px 0;
			font-size: 25px;
        }

        .button-container {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color:  var(--blue);
 

            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: Goldenrod;
        }
    </style>
</head>
<body>
<header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
		
		<nav class="navbar">
		<a href="index.php">Home</a>
		
		<a href="booking.php">Booking</a>
		<a href="custhome.php">Customer Dashboard</a>
		
		
		<a href="custsignup.php">Signup</a>
		</nav>
		<a href="login.php" class="btn">login now</a>
    </header>
	
	<div class="container">
    <h1>Review Your Booking</h1>

    <div class="container">
        <h2>Package Details:</h2>
        <p><?php echo $bookingDetails['package_name']; ?></p>
        <p><?php echo $bookingDetails['description']; ?></p>
        <p>Prices per person: Tk <?php echo $bookingDetails['price_per_person']; ?></p>
    </div>

    <div class="container">
        <h2>Customer Details:</h2>
        <p>Name: <?php echo $bookingDetails['customer_name']; ?></p>
        <p>Email: <?php echo $bookingDetails['customer_email']; ?></p>
        <p>Phone: <?php echo $bookingDetails['customer_phone']; ?></p>
        <p>Total People: <?php echo $bookingDetails['total_people']; ?></p>
    </div>

    <div class="container">
        <h2>Total Payment:</h2>
        <p>Total Payment: <?php echo 'Tk ' . number_format($bookingDetails['total_payment'], 2); ?></p>
    </div>

    <div class="button-container">
        <form action="confirm_booking.php" method="post">
            <!-- Hidden fields to pass booking data to the confirmation page -->
            <input type="hidden" name="package_id" value="<?php echo $bookingDetails['package_id']; ?>">
            <input type="hidden" name="customer_name" value="<?php echo $bookingDetails['customer_name']; ?>">
            <input type="hidden" name="customer_email" value="<?php echo $bookingDetails['customer_email']; ?>">
            <input type="hidden" name="customer_phone" value="<?php echo $bookingDetails['customer_phone']; ?>">
            <input type="hidden" name="total_people" value="<?php echo $bookingDetails['total_people']; ?>">
            <input type="hidden" name="total_payment" value="<?php echo $bookingDetails['total_payment']; ?>">

            <input type="submit" name="submit" value="Confirm Booking">
        </form>
    </div>
	</div>
</body>
</html>
