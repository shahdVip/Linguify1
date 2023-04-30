<?php
// Start the session to store user information


// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Linguify";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the sign-in form is submitted


// Get the email and password entered by the user
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['Password']);
$fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
$degree = mysqli_real_escape_string($conn, $_POST['degree']);
$university = mysqli_real_escape_string($conn, $_POST['university']);
$phone= mysqli_real_escape_string($conn, $_POST['phone']);
$languages = mysqli_real_escape_string($conn, $_POST['languages']);
$repeatPassword = mysqli_real_escape_string($conn, $_POST['repeatPassword']);





if ($password !== $repeatPassword) {
  echo "Passwords do not match.";
  exit;
}

// Check if the email already exists in the database
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  echo "Email already exists.";
  exit;
}

// Greet the response with the variables


// Insert the variables into the "teachers" table
$query = "INSERT INTO teachers (email, password, fullName, phoneNumber, university, degree, languages) VALUES ('$email', '$password', '$fullName','$phone','$university','$degree','$languages')";
$query2 = "INSERT INTO users (email, password, usertype) VALUES ('$email', '$password', true)";


if (mysqli_query($conn, $query) &&mysqli_query($conn, $query2)) {
  echo "success";
} else {
  echo "Error inserting record: " . mysqli_error($conn);
}


// Start the session to store user information
