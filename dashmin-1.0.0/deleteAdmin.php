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
$query = "Delete FROM users WHERE email='$email'";

mysqli_query($conn, $query);
