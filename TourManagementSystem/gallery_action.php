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
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == 'insert') {
        // Handle image insertion
        $image_url = $_POST['image_url'];
        $location = $_POST['location'];
        // Insert the image into the gallery table and handle any errors
    } elseif ($action == 'update') {
        // Handle image update
        $gallery_id = isset($_POST['gallery_id']) ? $_POST['gallery_id'] : '';
        // Update the image in the gallery table and handle any errors
    } elseif ($action == 'delete') {
        // Handle image deletion
        $gallery_id = isset($_POST['gallery_id']) ? $_POST['gallery_id'] : '';
        // Delete the image from the gallery table and handle any errors
    }
}


?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $galleryId = $_POST["gallery_id"];
    $action = $_POST["action"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tour_management_system"; // Replace with your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($action === "disable") {
        $sql = "UPDATE gallery SET status = 0 WHERE id = ?";
    } elseif ($action === "enable") {
        $sql = "UPDATE gallery SET status = 1 WHERE id = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $galleryId);

    if ($stmt->execute()) {
        // Redirect back to the gallery page after the action is performed
        header("Location: gallery.php");
        exit();
    } else {
        echo "Error performing gallery action: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
