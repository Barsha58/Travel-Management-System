<!DOCTYPE html>
<html>
<head>
    <title>Admin Page - Booking Information</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        margin: 0;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>

</head>
<body>
    <h1>Admin Page - Booking Information</h1>

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
            echo '<td>' . '$' . number_format($row['total_payment'], 2) . '</td>';
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

</body>
</html>
