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

    // Retrieve guide information
    $stmt = $con->prepare("SELECT * FROM guide WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $guide_id = $data["guide_id"];
        $guide_name = $data["guide_name"];
        $phone_number = $data["phone_number"];
        
        $bio = $data["bio"];
    } else {
        // Handle the case where guide information is not found
        echo "Guide information not found.";
        exit();
    }

    // Check if the guide is logged in
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Step 1: Fetch guide_id based on the logged-in guide's email
        $sql = "SELECT guide_id FROM guide WHERE email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($guideId);

        // Check if a guide with the provided email exists
        if ($stmt->fetch()) {
            // Step 2: Close the first prepared statement before executing the second one
            $stmt->close();

            // Step 3: Fetch packages associated with the guide
            $packages = [];
            $sql = "SELECT * FROM packages WHERE guide_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $guideId);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $packages[] = $row;
            }
        } else {
            echo "<p>No guide found with the provided email.</p>";
        }

        // Close the second prepared statement
        $stmt->close();
    } else {
        // Redirect to the login page if the guide is not logged in
        header("Location: login.php"); // Replace "login.php" with your login page URL
        exit();
    }
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if a file was uploaded for the pic
    if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {
        // Define allowed file types and maximum file size (max size set to 5MB)
        $allowed_types = array("image/jpeg", "image/png");
        $max_file_size = 5 * 1024 * 1024; // 5MB

        // Check file type and size
        if (in_array($_FILES["pic"]["type"], $allowed_types) && $_FILES["pic"]["size"] <= $max_file_size) {
            // Generate a unique filename
            $upload_dir = "uploads/";
            $file_extension = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
            $unique_filename = uniqid() . "." . $file_extension;

            // Move the uploaded file to the designated folder
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $upload_dir . $unique_filename)) {
                $pic = $upload_dir . $unique_filename; // Set pic to the new file path
            } else {
                echo "Failed to move the uploaded picture.";
                exit();
            }
        } else {
            echo "Invalid file type or file size exceeds the limit (max size: 5MB).";
            exit();
        }
    }

    // Get specialization and bio from the form
    $bio = isset($_POST['bio']) ? $_POST['bio'] : null;

    // Build the SQL query using prepared statements
    $sql = "UPDATE guide SET";

    if (isset($pic)) {
        $sql .= " pic = ?,";
    }

    if (!empty($bio)) {
        $sql .= " bio = ?,";
    }

    $sql = rtrim($sql, ","); // Remove the trailing comma

    if ($guide_id !== null) {
        $sql .= " WHERE guide_id = ?";

        // Prepare and bind the statement
        $stmt = $con->prepare($sql);

        if (isset($pic)) {
            $stmt->bind_param("ss", $pic, $guide_id);
        } else {
            $stmt->bind_param("si", $bio, $guide_id);
        }

        // Execute the query
        if ($stmt->execute()) {
            echo "Guide information updated successfully.";
        } else {
            echo "Error updating guide information: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Guide ID is missing.";
    }

    // Redirect after processing the form data
    header("Location: guide.php"); // Replace "guide.php" with the appropriate page
    exit();
}
    // Close the database connection
    $con->close();
    ?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	
    <title>Guide Page</title>
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

 
	
	h1 {
        font-size: 2.5rem;
        color: var(--black);
        margin-bottom: 1rem;
    }

    h2 {
        font-size: 2rem;
        color: var(--black);
        margin-bottom: 1rem;
    }

    /* Paragraph Styles */
    p {
        font-size: 1.6rem;
        color: var(--black);
        line-height: 1.4;
        margin-bottom: 1.5rem;
    }

    /* Button Styles (for buttons inside containers) */
    .container .btn {
        /* Add styles specific to buttons inside containers here */
    }

    /* Form Container Styles */
.container {
    max-width: 800px; /* Adjust the maximum width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding as desired */
    background-color: #f0f0f0; /* Example background color */
    border: 1px solid #ccc; /* Example border */
    border-radius: 5px; /* Example border radius */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Example box shadow */
    text-align: center; /* Center text horizontally within the container */
}

/* Form Heading Styles */
.container h1 {
    font-size: 24px; /* Example font size */
    color: #333; /* Example text color */
    margin-bottom: 20px; /* Add margin as needed */
}

/* Label Styles */
label {
    display: block; /* Display labels as blocks for better spacing */
    font-size: 18px; /* Example font size */
    color: #333; /* Example text color */
    margin-bottom: 10px; /* Add margin as needed */
}

/* Textarea Styles */
textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 2px solid var(--blue);
    border-radius: 5px;
    margin-bottom: 20px;
}

/* File Input Styles */
input[type="file"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 2px solid var(--blue);
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Submit Button Styles */
input[type="submit"] {
    background: var(--blue);
    color: var(--white);
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Submit Button Hover Styles */
input[type="submit"]:hover {
    background: var(--black);
    color: var(--white);
}


    /* Package Container Styles */
    .package-container {
        border: 2px solid var(--blue);
        padding: 1rem;
        margin: 1rem;
        text-align: center;
        background-color: var(--white);
    }

    /* Grid Layout for Package Cards */
    .package-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
        gap: 20px;
    }
	/* Add padding to the top of the body to create space for the fixed navbar */

/* Add this CSS to your stylesheet or in a <style> tag within your HTML file */

/* Center the section horizontally and vertically */
/* Center the section vertically */
section {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
padding:10px;  /* Adjust as needed */
}

/* Style the centered container */
.container.centered-container {
  text-align: center; /* Center text horizontally within the container */
  background-color: #f0f0f0; /* Example background color */
  padding: 20px; /* Add padding as needed */
  border: 1px solid #ccc; /* Example border */
  border-radius: 5px; /* Example border radius */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Example box shadow */
  margin: 0 auto; /* Center the container horizontally */
}

/* Style the container's content (optional) */
.container.centered-container h2 {
  font-size: 24px; /* Example font size */
  color: #333; /* Example text color */
}

.container.centered-container p {
  font-size: 18px; /* Example font size */
  color: #666; /* Example text color */
}


    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fas fa-paper-plane"></i>TravelXplorer</a>
		
		<nav class="navbar">
		<a href="#">Home</a>
		
		
		
		<a href="guidechangepass.php">Change Password</a>
		
		
		
		</nav>
		<a href="index.php" class="btn">Log Out</a>
    </header>
 
    <section style="display: flex; justify-content: center; align-items: center; height: 50vh;">
    <div class="container centered-container">
        <h2>Welcome, <?php echo $guide_name; ?>!</h2>
        <p>Your Email: <?php echo $email; ?></p>
        <p>Your Phone Number: <?php echo $phone_number; ?></p>
    </div>
</section>


    <div class="container package-grid">
    <?php if (!empty($packages)): ?>
        <?php foreach ($packages as $package) : ?>
            <!-- Create a package card -->
            <div class="package-container">
                <h2><?php echo $package['package_name']; ?></h2>
                <img src="<?php echo $package['image_url']; ?>" alt="Package Image" width="100%">
                <p><?php echo $package['description']; ?></p>
                <p>Price: <?php echo $package['price_per_person']; ?></p>
                <p>Start Date: <?php echo $package['starting_date']; ?></p>
                <p>End Date: <?php echo $package['ending_date']; ?></p>
                <!-- Add more package details as needed -->
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

    <div class="container">
            <h1>Update Guide Information</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                
                
                <label for="bio">Bio:</label>
                <textarea name="bio" id="bio"></textarea>
                <br>
				<label for="pic">Guide Picture:</label>
                <input type="file" name="pic" id="pic" accept="image/*">
                <br>
                <input type="submit" value="Update Guide Information">
            </form>
        </div>
    </div>

   
</body>
</html>
