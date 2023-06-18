<?php
// Assuming you have established a database connection, you can modify the connection details accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Linguify";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Get the JSON data from the AJAX request
$jsonData = file_get_contents('php://input');

// Convert the JSON data to a PHP associative array
$data = json_decode($jsonData, true);

// Extract the parameters from the array
$courseName = $data['courseName'];
$parameter2 = $data['parameter2'];
$parameter3 = $data['parameter3'];

// Check if the data already exists in the table
$sqlCheck = "SELECT COUNT(*) FROM studentCourses WHERE courseName = :courseName AND teacherEmail = :parameter2 AND studentEmail = :parameter3";
$stmtCheck = $pdo->prepare($sqlCheck);
$stmtCheck->bindParam(':courseName', $courseName);
$stmtCheck->bindParam(':parameter2', $parameter2);
$stmtCheck->bindParam(':parameter3', $parameter3);
$stmtCheck->execute();

if ($stmtCheck->fetchColumn() > 0) {
  // Data already exists, do not insert
  echo "You are already enrolled in this course!!";
} else {
  // Prepare the SQL statement to insert the data into the table
  $sqlInsert = "INSERT INTO studentCourses (courseName, teacherEmail, studentEmail) VALUES (:courseName, :parameter2, :parameter3)";
  $stmtInsert = $pdo->prepare($sqlInsert);

  // Bind the values to the prepared statement parameters
  $stmtInsert->bindParam(':courseName', $courseName);
  $stmtInsert->bindParam(':parameter2', $parameter2);
  $stmtInsert->bindParam(':parameter3', $parameter3);

  // Execute the prepared statement
  if ($stmtInsert->execute()) {
    // Insertion successful
    echo "Course added to your list of courses! you can find it in your homepage.";
  } else {
    // Insertion failed
    echo "Enrollment failed!";
  }
}

// Close the database connection
$pdo = null;
?>
