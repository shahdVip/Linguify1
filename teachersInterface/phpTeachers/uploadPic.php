<?php
// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Linguify";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  $email = $_COOKIE["variable"];

  // Check if the file is uploaded without errors
  if ($_FILES['picture']['error'] == UPLOAD_ERR_OK) {

    // Check if the uploaded file is an image
    $file_type = exif_imagetype($_FILES['picture']['tmp_name']);
    $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    if (in_array($file_type, $allowed_types)) {

      // Check if there is already a picture associated with the email
      $stmt = $conn->prepare("SELECT picture FROM pictures WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        // Delete the existing picture
        $row = $result->fetch_assoc();
        $picture_path = trim($row['picture']);
        if (!is_null($picture_path)) {
          if (file_exists($picture_path)) {
            unlink($picture_path);
          }
        }

        // Update the picture in the database
        $stmt = $conn->prepare("UPDATE pictures SET picture = ? WHERE email = ?");
        $stmt->bind_param("ss", $picture, $email);
      } else {
        // Insert the new picture in the database
        $stmt = $conn->prepare("INSERT INTO pictures (email, picture) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $picture);
      }

      // Read the contents of the uploaded file and store it in the database
      $picture = file_get_contents($_FILES['picture']['tmp_name']);
      $stmt->execute();
      header('Location: ' . $_SERVER['HTTP_REFERER']);

      // Display a success message
      echo "Picture uploaded successfully!";
    } else {
      // Display an error message if the uploaded file is not an image
      echo "Error: The uploaded file is not a valid image.";
    }
  } else {
    // Display an error message if there was an error uploading the file
    echo "Error uploading file: " . $_FILES['picture']['error'];
  }
}




?>
