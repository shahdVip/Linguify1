<?php
// Assuming you have established a database connection, you can modify the connection details accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Linguify";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Get the email and courseName parameters from the POST request
$email = $_POST['email'];
$courseName = $_POST['courseName'];

// Prepare the SQL statement to delete the course from the table
$sql = "DELETE FROM unvalidatedCourses WHERE teacherEmail = :email AND courseName = :courseName";
$stmt = $pdo->prepare($sql);

// Bind the values to the prepared statement parameters
$stmt->bindParam(':email', $email);
$stmt->bindParam(':courseName', $courseName);

// Execute the prepared statement
if ($stmt->execute()) {
  // Deletion successful
  echo "Course deleted successfully!";
} else {
  // Deletion failed
  echo "Error deleting course!";
}

// Close the database connection
$pdo = null;
?>
