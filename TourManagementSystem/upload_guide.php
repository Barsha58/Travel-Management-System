<?php
// Check if a file was uploaded
if (isset($_FILES["guide_image"]) && $_FILES["guide_image"]["error"] == 0) {
    // Define allowed file types and maximum file size (in bytes)
    $allowed_types = array("image/jpeg", "image/png");
    $max_file_size = 5 * 1024 * 1024; // 5 MB

    // Check file type and size
    if (in_array($_FILES["guide_image"]["type"], $allowed_types) && $_FILES["guide_image"]["size"] <= $max_file_size) {
        // Generate a unique filename
        $upload_dir = "uploads/";
        $file_extension = pathinfo($_FILES["guide_image"]["name"], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . "." . $file_extension;

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($_FILES["guide_image"]["tmp_name"], $upload_dir . $unique_filename)) {
            // Insert the file path into your database (replace with your database code)
            $image_path = $upload_dir . $unique_filename;

            // Your database insertion code here

            // Redirect to a success page or wherever you need
            header("Location: success.php");
            exit();
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {
        echo "Invalid file type or file size exceeds the limit.";
    }
} else {
    echo "No file was uploaded or an error occurred.";
}
?>
