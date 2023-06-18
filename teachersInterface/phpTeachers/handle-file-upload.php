<?php
// Assuming you have established a database connection, you can modify the connection details accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Linguify";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Get the file label from the form data
$fileLabel = $_POST['fileLabel'];
$email = $_COOKIE['variable'];
$courseName = $_COOKIE['courseName'];

// Check if a file was uploaded
if (isset($_FILES['file'])) {
  // Get the uploaded file details
  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileType = $_FILES['file']['type'];

  // Specify the target directory to store the uploaded file
  $targetDirectory = 'uploads/';

  // Generate a unique filename to avoid conflicts
  $uniqueFileName = uniqid() . '_' . $fileName;

  // Build the target path for the uploaded file
  $targetPath = $targetDirectory . $uniqueFileName;

  // Move the uploaded file to the target directory
  if (move_uploaded_file($fileTmpName, $targetPath)) {
    // File upload success, insert the file details into the database
    $stmt = $pdo->prepare("INSERT INTO files (teacherEmail,courseName, fileLabel, fileName, fileSize, fileType) VALUES (:email, :courseName,:fileLabel, :fileName, :fileSize, :fileType)");
    $stmt->bindParam(':fileLabel', $fileLabel);
    $stmt->bindParam(':fileName', $uniqueFileName);
    $stmt->bindParam(':fileSize', $fileSize);
    $stmt->bindParam(':fileType', $fileType);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':courseName', $courseName);
    $stmt->execute();

    // Return a success message
    echo 'File uploaded successfully!';
  } else {
    // File upload failed
    echo 'File upload failed!';
  }
} else {
  // No file was uploaded
  echo 'No file selected for upload!';
}

// Close the database connection
$pdo = null;
?>
