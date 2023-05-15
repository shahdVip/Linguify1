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

// Get the email entered by the user
$email = $_COOKIE["variable"];
$aboutme = mysqli_real_escape_string($conn, $_POST['content']);

// Check if the record already exists in the database
$stmt = mysqli_prepare($conn, "SELECT * FROM TeacherDescription WHERE email=?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
  // The record already exists, update the aboutme field
  $stmt = mysqli_prepare($conn, "UPDATE TeacherDescription SET description=? WHERE email=?");
  mysqli_stmt_bind_param($stmt, "ss", $aboutme, $email);
  mysqli_stmt_execute($stmt);
} else {
  // The record doesn't exist, insert a new record
  $stmt = mysqli_prepare($conn, "INSERT INTO TeacherDescription (email, description) VALUES (?, ?)");
  mysqli_stmt_bind_param($stmt, "ss", $email, $aboutme);
  mysqli_stmt_execute($stmt);
}

mysqli_close($conn);

