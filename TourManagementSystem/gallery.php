<!DOCTYPE html>
<html lang="en">
<head>
    
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Gallery</title>
  <style>
  /* CSS for the gallery item cards */
.gallery-item {
    border: 1px solid #ddd; /* Border for the card */
    padding: 10px; /* Padding around the card content */
    margin: 10px; /* Margin between cards */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Box shadow for a subtle card effect */
    background-color: #fff; /* Background color for the card */
    text-align: center; /* Center the content within the card */
    display: inline-block; /* Display cards inline */
    width: calc(33.33% - 20px); /* Set the width of each card (adjust as needed) */
    vertical-align: top; /* Align cards at the top */
    box-sizing: border-box; /* Include padding and border in the card's width */
	 border: 2px solid var(--blue);
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

/* Style the footer section (you can adjust as needed) */
.footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}
.form-container {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    max-width: 400px;
    margin: 0 auto;
	 border: 2px solid var(--blue);
}
form button {
    display: block;
    margin: 0 auto;
    background-color: var(--blue); /* Change the background color to blue */
    color: var(--white); /* Change the text color to white */
    padding: 10px 20px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    font-size: 1.5rem; /* Adjust as needed */
}

form button:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


/* CSS for form elements */
label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
	font:15px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
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
h2 {
    text-align: center;
	font-size:3rem;
	color: var(--blue);
}

/* Add padding to the top of the .gallery section to avoid items being hidden behind the navbar */
.gallery {
    padding-top: 100px; /* Adjust the value as needed to match your navbar height */
}
/* Increase the width of the form container */
.form-container {
    max-width: 600px; /* Adjust as needed */
    margin: 0 auto;
}

/* Center-align the form submit button */
.button-container {
    text-align: center;
}
input[type="text"],
select {
    font-size: 1.5rem; /* Adjust as needed */
}

/* Add spacing between h2 and form rows */
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
			<a href="managepackage.php">Manage Packages</a>
           
			
        </nav>
        <a href="index.php" class="btn">Log Out</a>
    </header>
    <section class="gallery">
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
</section>
	 <section class="form-container">
    <div class="container">
        <h2>Add New Gallery Item</h2>
        <form action="" method="post">
            
            

          
            <input type="text" id="new_image_url" name="image_url" placeholder="Enter Image URL" required>

            <input type="text" id="new_location" name="location" placeholder="Enter Location" required>

            
            <select id="new_status" name="status">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>
            
            <button type="submit">Add Item</button>
        </form>
    </div>
</section>


<section class="form-container">
    <div class="container">
        <h2>Update Gallery Item</h2>
        <form action="" method="post">
            
            <!-- Change "id" to "update_gallery_id" to avoid conflicts -->
            <input type="text" id="update_gallery_id" name="id" placeholder="Enter Gallery Item ID" required>

          
            <input type="text" id="update_image_url" name="image_url" placeholder="Enter New Image URL">

            <input type="text" id="update_location" name="location" placeholder="Enter New Location">

            
            <select id="update_status" name="status">
                <option value="1">Enabled</option>
                <option value="0">Disabled</option>
            </select>

            <button type="submit">Update Item</button>
        </form>
    </div>
</section>
<?php
// Database connection setup (same as in your previous code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour_management_system"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['image_url'], $_POST['location'], $_POST['status'])) {
        // Check if "id" is set for an update operation
       if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Initialize an array to store update values
    $update_values = array();
    
    // Use prepared statements to safely update the values
    $sql = "UPDATE gallery SET ";
    
    if (!empty($_POST["image_url"])) {
        $sql .= "image_url = ? ";
        $update_values[] = $_POST["image_url"];
    }
    
    if (!empty($_POST["location"])) {
        if (!empty($_POST["image_url"])) {
            $sql .= ",";
        }
        $sql .= "location = ? ";
        $update_values[] = $_POST["location"];
    }
    
    if (isset($_POST["status"])) {
        if (!empty($_POST["image_url"]) || !empty($_POST["location"])) {
            $sql .= ",";
        }
        $sql .= "status = ? ";
        $update_values[] = $_POST["status"];
    }
    
    $sql .= "WHERE id = ?";
    $update_values[] = $id;

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute the statement
    $types = str_repeat('s', count($update_values)); // 's' represents a string, adjust as needed
    $stmt->bind_param($types, ...$update_values);

    if ($stmt->execute()) {
        echo "Gallery item with ID $id updated successfully";
    } else {
        echo "Error updating gallery item: " . $stmt->error;
    }
} else {
    echo "Please fill out all form fields.";
}
}}

// Close the database connection
$conn->close();
?>



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
