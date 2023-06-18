<?php
// Assuming you have established a database connection, you can modify the connection details accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Linguify";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Get the teacherEmail and courseName parameters from the POST request
$teacherEmail = $_POST['email'];
$courseName = $_POST['courseName'];

// Start a database transaction

  // Retrieve additional fields from unvalidatedCourses
  $selectSql = "SELECT targetLanguage, courseDuration FROM unvalidatedCourses WHERE teacherEmail = :teacherEmail AND courseName = :courseName";
  $selectStmt = $pdo->prepare($selectSql);
  $selectStmt->bindParam(':teacherEmail', $teacherEmail);
  $selectStmt->bindParam(':courseName', $courseName);
  $selectStmt->execute();
  $row = $selectStmt->fetch(PDO::FETCH_ASSOC);

  // Extract the retrieved values
  $targetLanguage = $row['targetLanguage'];
  $courseDuration = $row['courseDuration'];

  // Delete the course from the unvalidatedCourses table
  $deleteSql = "DELETE FROM unvalidatedCourses WHERE teacherEmail = :teacherEmail AND courseName = :courseName";
  $deleteStmt = $pdo->prepare($deleteSql);
  $deleteStmt->bindParam(':teacherEmail', $teacherEmail);
  $deleteStmt->bindParam(':courseName', $courseName);
  $deleteStmt->execute();


$coursedesc="";
  // Insert the course into the courses table
  $insertSql = "INSERT INTO courses (courseName, teacherEmail, targetLanguage, courseDuration,courseDescription) VALUES (:courseName, :teacherEmail, :targetLanguage, :courseDuration,:coursedesc)";
  $insertStmt = $pdo->prepare($insertSql);
  $insertStmt->bindParam(':courseName', $courseName);
  $insertStmt->bindParam(':teacherEmail', $teacherEmail);
  $insertStmt->bindParam(':targetLanguage', $targetLanguage);
  $insertStmt->bindParam(':courseDuration', $courseDuration);
$insertStmt->bindParam(':coursedesc', $coursedesc);
  $insertStmt->execute();

  // Commit the transaction


  echo "Course added successfully!";

  // Rollback the transaction on error


// Close the database connection
$pdo = null;
?>
