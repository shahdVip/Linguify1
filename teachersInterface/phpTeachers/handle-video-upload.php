<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the video label and video link from the form
  $videoLabel = $_POST['fileLabel'];
  $videoLink = $_POST['videoLink'];
  $email = $_COOKIE['variable'];
  $courseName = $_COOKIE['courseName'];

  // Validate and sanitize the inputs (you can add more validation if needed)
  $videoLabel = trim($videoLabel);
  $videoLink = trim($videoLink);
  $email = trim($email);
  $courseName = trim($courseName);

  // Perform database operations to insert the video data
  // Replace the following code with your own database connection and insertion logic
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "Linguify";

  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

  // Prepare the SQL statement for insertion
  $stmt = $pdo->prepare("INSERT INTO courseVideos (videoLabel, videoLink, teacherEmail, courseName) VALUES (:label, :link, :email, :courseName)");

  // Bind the parameters and execute the statement
  $stmt->bindParam(':label', $videoLabel);
  $stmt->bindParam(':link', $videoLink);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':courseName', $courseName);
  $stmt->execute();

  // Check if the insertion was successful
  if ($stmt->rowCount() > 0) {
    // Return a success response
    $response = array('status' => 'success', 'message' => 'Video uploaded successfully.');
    echo json_encode($response);
    exit;
  } else {
    // Return an error response
    $response = array('status' => 'error', 'message' => 'Failed to upload video.');
    echo json_encode($response);
    exit;
  }
} else {
  // Invalid request method
  $response = array('status' => 'error', 'message' => 'Invalid request method.');
  echo json_encode($response);
  exit;
}
?>
