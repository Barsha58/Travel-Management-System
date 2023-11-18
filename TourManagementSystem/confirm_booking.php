<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('cd.jpg'); 
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

        /* Container styles */
        .container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 1400px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            margin: 10px 0;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve booking details from the form
            $package_id = $_POST['package_id'];
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_phone = $_POST['customer_phone'];
            $total_people = $_POST['total_people'];
            $total_payment = $_POST['total_payment'];

            // You can perform the final booking confirmation logic here
            // For example, you can insert the booking into a database, send a confirmation email, etc.

            // Display a confirmation message
            echo "<h1>Booking Confirmed</h1>";
            echo "<p>Thank you, $customer_name, for booking the package!</p>";
            echo "<p>Package ID: $package_id</p>";
            echo "<p>Email: $customer_email</p>";
            echo "<p>Phone: $customer_phone</p>";
            echo "<p>Total People: $total_people</p>";
            echo "<p>Total Payment: $total_payment</p>";
			
			echo '<a href="index.php" class="btn">Back to Home</a>';
        } else {
            // Redirect to the booking form page if accessed directly
            header("Location: booking_form.php");
            exit();
        }
        ?>
    </div>
	
</body>
</html>
