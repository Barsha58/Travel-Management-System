<?php
// Database configuration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];}
$con = new mysqli("localhost", "root", "", "tour_management_system");
if ($con->connect_error) {
    die('Failed to connect: ' . $con->connect_error);
} else {
    // Check the "customer" table
    $stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data["password"] === $password) {
            // Start a session and set the email
            session_start();
            $_SESSION["email"] = $email;

            header("Location: custhome.php");
            exit();
        } else {
            echo "<h2>Invalid Password</h2>";
        }
    } else {
        // If not found in "customer" table, check "guide" table
        $stmt = $con->prepare("SELECT * FROM guide WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data["password"] === $password) {
                // Start a session and set the email
                session_start();
                $_SESSION["email"] = $email;

                header("Location: guide.php");
                exit();
            } else {
                echo "<h2>Invalid Password</h2>";
            }
        } else {
            // If not found in "guide" table, check "admin" table
            $stmt = $con->prepare("SELECT * FROM admin WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if ($stmt_result->num_rows > 0) {
                $data = $stmt_result->fetch_assoc();
                if ($data["password"] === $password) {
                    // Start a session and set the email
                    session_start();
                    $_SESSION["email"] = $email;

                    header("Location: admin.php");
                    exit();
                } else {
                    echo "<h2>Invalid Password</h2>";
                }
            } //else {
               // echo "<h2>Invalid Email</h2>";
            //}
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login Page</title>
	<style>
	/* Reset some default styles */
body, h1, p, form {
    margin: 0;
    padding: 0;
}

/* Basic styling */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.container {
    background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
    border-radius: 10px;
	margin: 50px auto; 
    padding: 20px;
    margin: 100px auto;
    width: 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    animation: blink 1s infinite alternate;
  }



  .input-field {
    margin-bottom: 10px;
  }

  .input-field label {
    display: block;
    font-weight: bold;
  }

  .input-field input {
    width: 100%;
    padding: 80px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }



.login-container h1 {
    margin-bottom: 60px;
}
.login-container h2 {
    margin-bottom: 20px;
  }

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="email"],
form input[type="password"] {
    width: 80%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

form button:hover {
    background-color: #555;
}

.additional-options {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.additional-options a {
    text-decoration: none;
    color: #333;
    margin-bottom: 10px;
}

.additional-options p {
    margin-top: 10px;
}
/* Inside your login.css */
body {
    background-image: url(image/sea3.jpg);
    background-size: cover; /* Adjusts the image to cover the entire container */
}

/* Inside your login.css */
.login-container {
    background-color: rgba(255, 255, 255, 0.5); /* White with 50% opacity */
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

/* ... your existing CSS code ... */

/* Add a class for the blinking animation */
.blinking-input {
    transition: background-color 0.3s ease-in-out;
}

/* Define the animation when the input is focused */
.blinking-input:focus {
    animation: blink 1s alternate infinite;
    background-color: #ffc107; /* Change to the desired background color */
}

/* Keyframes for the blink animation */
@keyframes blink {
    0% {
        background-color: inherit;
    }
    100% {
        background-color: rgba(255, 255, 0, 0.5); /* Change to the desired highlight color */
    }
	.login-button {
    background-color: #007BFF; /* Set the background color */
    color: #fff; /* Set the text color */
    padding: 10px 20px; /* Set padding to create a clickable area */
    border: none; /* Remove the button border */
    cursor: pointer; /* Change the cursor to a pointer on hover */
    transition: background-color 0.3s ease, color 0.3s ease; /* Add smooth transition effects */
}

/* Styling for the login button on hover */
.login-button:hover {
    background-color: #0056b3; /* Change the background color on hover */
    color: #ff9900; /* Change the text color on hover (you can adjust this if needed) */
}



	</style>
</head>
<body>
    <div class="login-container">
	
	
        <h1>Login to Your Account</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" required class="blinking-input"></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" required class="blinking-input"></td>
                </tr>
            </table>
            <button type="submit">Login</button>
        </form>
        <div class="additional-options">
            
            <p>Don't have an account? <br>
			<a href="custsignup.php">Customer Sign Up</a><br><a href="guidesignin.php">Guide Sign Up</a></p>
        </div>
    </div>
</body>
</html>

