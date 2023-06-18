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
$email = $_COOKIE['variable'];

// Get the Cname passed from AJAX
$cname = $_POST['Cname'];

// Check if the course already exists
$query = "SELECT * FROM courses WHERE teacherEmail = '$email' AND courseName = '$cname'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  echo "Course already exists.";
} else {
  // Course doesn't exist, insert it into unvalidatedCourses table
  $cDescription = mysqli_real_escape_string($conn, $_POST['cDescription']);
  $Clanguage = mysqli_real_escape_string($conn, $_POST['Clanguage']);
  $duration = mysqli_real_escape_string($conn, $_POST['duration']);
setcookie('courseName',$cname,time()+3600,'/');
  $insertQuery = "INSERT INTO unvalidatedCourses (teacherEmail, courseName, courseDescription, targetLanguage	, courseDuration) VALUES ('$email', '$cname', '$cDescription', '$Clanguage', '$duration')";
  if (mysqli_query($conn, $insertQuery)) {
    echo "success";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
