<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the course name from the request body
  $courseName = $_POST['courseName'];

  // Validate and sanitize the course name (you can add more validation if needed)
  $courseName = trim($courseName);

  // Perform database operations to delete the course
  // Replace the following code with your own database connection and deletion logic
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "Linguify";
  $email=$_COOKIE['variable'];

  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

  // Prepare the SQL statement for deletion
  $stmt = $pdo->prepare("DELETE FROM courses WHERE courseName = :courseName AND teacherEmail = :email");
  $stmt2 = $pdo->prepare("DELETE FROM studentCourses WHERE courseName = :courseName AND teacherEmail = :email");
  $stmt->bindParam(':courseName', $courseName);
  $stmt->bindParam(':email', $email);
  $stmt2->bindParam(':courseName', $courseName);
  $stmt2->bindParam(':email', $email);
  $stmt->execute();
  $stmt2->execute();

  // Check if the deletion was successful
  if ($stmt->rowCount() > 0) {
    // Return a success response
    $response = array('status' => 'success', 'message' => 'Course deleted successfully.');
    echo json_encode($response);
    exit;
  } else {
    // Return an error response
    $response = array('status' => 'error', 'message' => 'Failed to delete course.');
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
