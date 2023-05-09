<?php
// Start the session to store user information
$randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
setrawcookie('otp', $randomNumber, time() + 3600, '/');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


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
setrawcookie('email', $email, time() + 3600, '/');

$password = mysqli_real_escape_string($conn, $_POST['Password']);
//setrawcookie('password', $password, time() + 3600, '/');

$fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
//setrawcookie('fullName', $fullName, time() + 3600, '/');

$degree = mysqli_real_escape_string($conn, $_POST['degree']);
//setrawcookie('degree', $degree, time() + 3600, '/');

$university = mysqli_real_escape_string($conn, $_POST['university']);
//setrawcookie('university', $university, time() + 3600, '/');

$phone= mysqli_real_escape_string($conn, $_POST['phone']);
//setrawcookie('phone', $phone, time() + 3600, '/');

$languages = mysqli_real_escape_string($conn, $_POST['languages']);
//setrawcookie('languages', $languages, time() + 3600, '/');

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



$mail = new PHPMailer(true);
$mail->SMTPAutoTLS = false;
$mail->SMTPOptions = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  ]
];

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mohammadaker7@gmail.com';
$mail->Password = 'ueluqxhswcsutzjt';
//ueluqxhswcsutzjt
$mail->SMTPSecure = 'tls';
$mail->Port = 587;



// Email content
$mail->setFrom('mohammadaker7@gmail.com', 'mohammad aker');
$mail->addAddress($email, 'new comer');
$mail->Subject = 'Testing PHPMailer';
$mail->Body = 'Thank you for signing up for Linguify as a teacher, here is the required OTP to start your journey: '.$randomNumber.' <br> Welcome aboard! ';
/*
$query = "INSERT INTO teachers (email, password, fullName, phoneNumber, university, degree, languages) VALUES ('$email', '$password', '$fullName','$phone','$university','$degree','$languages')";
$query2 = "INSERT INTO users (email, password, usertype) VALUES ('$email', '$password', true)";


if (mysqli_query($conn, $query) &&mysqli_query($conn, $query2)) {
  echo "success";
}*/

try {
  $mail->send();
  echo 'success';
} catch (Exception $e) {
  echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}


