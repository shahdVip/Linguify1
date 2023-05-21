<?php
// delete_teacher.php

// Retrieve the teacher's email from the POST request
$email = $_POST['email'];


// Perform the insertion in the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Linguify";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Fetch the values from unvalidatedteachers table
$query = "Delete FROM students WHERE email='$email'";
$query2 = "Delete FROM teachers WHERE email='$email'";
 mysqli_query($conn, $query);
mysqli_query($conn, $query2);

$query3 = "UPDATE users SET userType = 2 WHERE email='$email'";
mysqli_query($conn, $query3);

/*

if ($row) {
  $password = $row['password'];

  $fullName = $row['fullName'];
  $degree = $row['degree'];
  $university = $row['university'];
  $phone = $row['phoneNumber'];
  $languages = $row['languages'];


  // Insert into teachers table
  $query2 = "INSERT INTO teachers (email, password, fullName, phoneNumber, university, degree, languages) VALUES ('$email', '$password', '$fullName', '$phone', '$university', '$degree', '$languages')";

  // Insert into users table
  $query3 = "INSERT INTO users (email, password, usertype) VALUES ('$email', '$password', true)";
  $query4 = "DELETE FROM unvalidatedteachers WHERE email='$email'";


  // Perform insertions
  if (mysqli_query($conn, $query2) && mysqli_query($conn, $query3) && mysqli_query($conn, $query4)) {
    echo "success";
  } else {
    echo "Failed to insert teacher: " . mysqli_error($conn);
  }
} else {
  echo "Teacher not found";
}
*/
mysqli_close($conn);
?>
