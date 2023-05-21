<?php
// delete_teacher.php

// Retrieve the teacher's email from the POST request
$email = $_POST['email'];

// Perform the deletion in the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Linguify";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$stmt = mysqli_prepare($conn, "DELETE FROM students WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($conn, "DELETE FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);

// Check if the deletion was successful
if (mysqli_stmt_affected_rows($stmt) > 0) {
  // Deletion successful
  echo "Teacher deleted successfully";
} else {
  // No rows affected, deletion failed
  echo "Failed to delete teacher";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<?php
