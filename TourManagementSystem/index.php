<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	
    <link rel="stylesheet" href="stylic.css">
	<style>
	.dropdown-container {
    position: relative;
    display: inline-block; /* Display the dropdown container inline */
}

/* Dropdown Button Styles */
.dropbtn {
    background-color: transparent;
    color: #29d9d5;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 5px;
	 font-size: 2rem;
}


.dropbtn i {
    font-size: 0.8rem;
}

/* Dropdown Content Styles */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Dropdown Links Styles */
.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.dropdown-content a:hover {
    background-color: var(--blue);
    color: #333;
}

/* Show the dropdown content when hovering over the dropdown container */
.dropdown-container:hover .dropdown-content {
    display: block;
}
	</style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
        <nav class="navbar">
            <a href="#home">Home</a>
           
            <a href="#packages" class="nav-link">Packages</a>
			 <a href="#guides">Guides</a>
            
            <a href="#gallery">Gallery</a>
			<a href="#services">Services</a>
			 <a href="#contact" class="nav-link">Contact</a>
            
			<div class="dropdown-container">
            <button class="dropbtn">Sign Up <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-content">
                <!-- Dropdown links go here -->
                <a href="custsignup.php">Customer Sign Up</a>
                <a href="guidesignin.php">Guide Sign Up</a>
            </div>
        </div>

        
        </nav>
        <a href="login.php" class="btn">Log In</a>
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
    ?>

    <section class="home" id="home">
        <div class="content">
            <span data-text="Explore the World">Explore The World</span>
            <h3>"Adventure Awaits, Discover Your Journey"</h3>
            <p>"Escape the ordinary and embrace the extraordinary. Let your wanderlust guide you to new horizons."</p>
            <br><br><br><br><br><br>
            <form class="search-form" method="post" action="">
                <select name="destination">
                    <option value="">Select Destination</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= $location ?>"><?= $location ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="month" name="selected_month">
                <button type="submit">Search</button>
            </form>
        </div>
    </section>

    <div class="search-results">
        <?php
        // Initialize variables for form data
        $selected_destination = "";
        $selected_month = "";

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['destination']) && isset($_POST['selected_month'])) {
            // Get user inputs
            $selected_destination = $_POST['destination'];
            $selected_month = $_POST['selected_month'];

            // Construct the SQL query to search for packages based on location and month
            $query = "SELECT * FROM packages WHERE location = '$selected_destination' AND DATE_FORMAT(starting_date, '%Y-%m') = '$selected_month'";

            // Execute the query
            $result = $conn->query($query);
echo '<style>.search-results { display: block; }</style>';
            // Process and display the search results
            if ($result->num_rows > 0) {
                echo "<h2>Search Results</h2>";
                while ($row = $result->fetch_assoc()) {
                    // Display package details here
					echo '<img src="' . $row['image_url'] . '" alt="' . $row['package_name'] . '">';
                    echo "<p>Package Name: " . $row['package_name'] . "</p>";
                    echo "<p>Description: " . $row['description'] . "</p>";
                    // Add more package details as needed
                }
            } else {
                echo "No packages found for the selected criteria.";
            }
        }
        ?>
    </div>

    
     <main>
	 <div class="heading">
    <span>Explore Our Packages</span>
    <h1>Unforgettable Journeys Await</h1>
</div>

        <section class="packages"id="packages">
            <?php
// Connect to the database (replace with your database credentials)
$con = new mysqli("localhost", "root", "", "tour_management_system");

// Check for database connection errors
if ($con->connect_error) {
    die('Failed to connect: ' . $con->connect_error);
}

// Fetch package data from the database
$sql = "SELECT * FROM packages";
$result = $con->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookingEnabled = $row['booking_enabled'];
        $bookingClosedDate = strtotime($row['booking_closed_date']); // Convert booking_close_date from database to a timestamp
        $currentDate = strtotime(date('Y-m-d')); // Get the current date as a timestamp

        echo '<div class="package-card">';
        echo '<img src="' . $row['image_url'] . '" alt="' . $row['package_name'] . '">';
        echo '<h2>' . $row['package_name'] . '</h2>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<p>Destination: ' . $row['location'] . '</p>';
		echo '<p>Price Per Person: ' . $row['price_per_person'] . '</p>';
		 echo '<p>Tour Start Date: ' . $row['starting_date'] . '</p>';
		 echo '<p>Tour End Date: ' . $row['ending_date'] . '</p>';
		 

        // Check if booking is enabled and the booking close date is in the future
        if ($bookingEnabled == 1 && $bookingClosedDate > $currentDate) {
            $daysLeft = ceil(($bookingClosedDate - $currentDate) / (60 * 60 * 24)); // Calculate days left
            echo '<p><strong style="color: green;">' . $daysLeft . ' days left for booking</strong></p>';

            echo '<a href="booking.php?package_id=' . $row['package_id'] . '&guide_id=' . $row['guide_id'] . '" class="book-now-button">Book Now</a>';
        } else {
            if ($bookingEnabled != 1) {
                echo '<p>Booking Closed</p>';
            } else {
                echo '<p>Booking Expired</p>';
            }
        }

        echo '</div>';
    }
} else {
    echo 'No packages found.';
}

// Close the database connection
$con->close();
?>

        </section>
	
    </main>
	
	<main>
	<div class="heading">
    <span>Meet Our Expert Guides</span>
    <h1>Your Journey, Their Expertise</h1>
</div>

	<section class="guides" id="guides">
    <div class="guides-container">
        
        <div class="guide-cards-wrapper">
            <?php
            // Connect to the database (replace with your database credentials)
            $con = new mysqli("localhost", "root", "", "tour_management_system");

            // Check for database connection errors
            if ($con->connect_error) {
                die('Failed to connect: ' . $con->connect_error);
            }

            // Fetch only enabled guides from the database
            $sql = "SELECT * FROM guide WHERE status = '1'";
            $result = $con->query($sql);

            // Check if there are rows in the result
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="guide-card">';
                    echo '<img src="' . $row['pic'] . '" alt="' . $row['guide_name'] . '">';
                    echo '<h3>' . $row['guide_name'] . '</h3>';
                    echo '<p>Email: ' . $row['email'] . '</p>';
                    echo '<p>Phone Number: ' . $row['phone_number'] . '</p>';
                    
                  
                    echo '<p>' . $row['bio'] . '</p>';

                  

                    echo '</div>';
                }
            } else {
                echo 'No enabled guides found.';
            }

            // Close the database connection
            $con->close();
            ?>
        </div>
    </div>
</section>

</main>


	
	<section class="gallery" id="gallery">
    <div class="heading">
        <span>Our Gallery</span>
        <h1>We Record Memories</h1>
    </div>
    <div class="box_container">
        <?php
        // Replace these with your database credentials
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tour_management_system";

        // Create a new database connection for the gallery section
        $conn_gallery = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn_gallery->connect_error) {
            die("Connection failed: " . $conn_gallery->connect_error);
        }

        // Fetch images from the gallery table where status is "enabled"
        $sql_gallery = "SELECT * FROM gallery WHERE status = '1'";
        $result_gallery = $conn_gallery->query($sql_gallery);

        // Display the gallery images
        while ($row_gallery = $result_gallery->fetch_assoc()) {
            $image_url = $row_gallery['image_url'];
            $location = $row_gallery['location'];
        ?>
            <div class="box">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $location; ?>">
                <h3><?php echo $location; ?></h3>
            </div>
        <?php
        }

        // Close the connection for the gallery section
        $conn_gallery->close();
        ?>
    </div>
</section>












    <section class="services" id="services">
  <div class="heading">
    <span>Our Services</span>
    <h1>Countless Experiences</h1>
  </div>
  <div class="box_container">
    <div class="box">
      <i class="fas fa-globe"></i>
      <h3>Worldwide</h3>
      <p>Explore the beauty of our planet with our wide range of travel destinations. Whether you dream of tropical beaches or snowy mountains, we've got you covered.</p>
    </div>
    <div class="box">
      <i class="fas fa-hiking"></i>
      <h3>Adventures</h3>
      <p>Embark on thrilling adventures that will test your limits and create memories that last a lifetime. From hiking to extreme sports, the choice is yours.</p>
    </div>
    <div class="box">
      <i class="fas fa-wallet"></i>
      <h3>Affordable price</h3>
      <p>Enjoy amazing experiences without breaking the bank. We offer competitive prices and exclusive deals to make your dream vacations affordable and accessible.</p>
    </div>
    <div class="box">
      <i class="fas fa-headset"></i>
      <h3>24/7 support</h3>
      <p>Our dedicated support team is available round the clock to assist you with any inquiries or issues. Your satisfaction and peace of mind are our top priorities.</p>
    </div>
  </div>
</section>



<section class="footer">


  <div class="box-container">
        <div class="box" id="contact">
            <h3>Contact Info</h3>
            
            <?php
            // Database connection information
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
            
            // Query to fetch contact information
            $sql = "SELECT name, phone, email, start_time, end_time FROM contacts";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // Output data from the database
                while ($row = $result->fetch_assoc()) {
                    echo "<p><i class='fas fa-map'></i> " . $row["name"] . "</p>";
                    echo "<p><i class='fas fa-phone'></i> " . $row["phone"] . "</p>";
                    echo "<p><i class='fas fa-envelope'></i> " . $row["email"] . "</p>";
                    echo "<p><i class='fas fa-clock'></i> " . $row["start_time"] . " - " . $row["end_time"] . "</p>";
                }
            } else {
                echo "No contact information available.";
            }
            
           
            ?>
        </div>
    
    <div class="box">
    <h3>About Us</h3>
    <p>Discover the world with TravelXplorer. We're passionate about creating unforgettable travel adventures, ensuring quality, safety, and personalized service every step of the way. Join us on a journey of exploration and inspiration!</p>
</div>

    
    <div class="box">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#packages">Packages</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="custsignup.php">Signup</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
    
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




    <?php
    $conn->close();
    ?>

</body>
</html>
