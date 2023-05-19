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

// Check if the sign-in form is submitted


// Get the email and password entered by the user
$input1 = $_POST['num1'];
$input2 = $_POST['num2'];
$input3 = $_POST['num3'];
$input4 = $_POST['num4'];


$concatenated = $input1 . $input2 . $input3 . $input4;


if (isset($_COOKIE['otp'])) {
  $otp = $_COOKIE['otp'];
  if($otp==$concatenated){



    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];
    $fullName = $_COOKIE['fullName'];
    $phone = $_COOKIE['phone'];
    $age = $_COOKIE['age'];

    setcookie('email', '', time() - 3600, '/');
    setcookie('password', '', time() - 3600, '/');
    setcookie('fullName', '', time() - 3600, '/');
    setcookie('phone', '', time() - 3600, '/');
    setcookie('age', '', time() - 3600, '/');

    $query = "INSERT INTO students (email, password, fullName, phoneNumber, age) VALUES ('$email', '$password', '$fullName','$phone','$age')";
    $query2 = "INSERT INTO users (email, password, usertype) VALUES ('$email', '$password', false)";
    if (mysqli_query($conn, $query) &&mysqli_query($conn, $query2)) {
      echo "success";
    }

  }
  else{
    echo'otp failed';
  }
} else {
  echo "Cookie 'otp' is not set.";
}

/*
if($concatenated==$otp){
  echo'success';
}
else{
  echo'u have failed, your account credentials have been deleted, please create another account and try later';
}

echo $concatenated;

// Check if the email already exists in the database



/*
$query = "INSERT INTO teachers (email, password, fullName, phoneNumber, university, degree, languages) VALUES ('$email', '$password', '$fullName','$phone','$university','$degree','$languages')";
$query2 = "INSERT INTO users (email, password, usertype) VALUES ('$email', '$password', true)";


if (mysqli_query($conn, $query) &&mysqli_query($conn, $query2)) {
  echo "success";
}*/




