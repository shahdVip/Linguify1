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
  $email = mysqli_real_escape_string($conn, $_POST['emailLogin']);
  $password = mysqli_real_escape_string($conn, $_POST['passwordLogin']);

  // Check if the email and password exist in the database
  $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    if ($password==$row['password']) {
      setcookie("variable", $email, time() + 3600);
      if($row['usertype']==1){

        echo 'success teacher';
      }
      else if($row['usertype']==0){

        echo 'success student';
      }

     // echo'success';

   //   header("Location: template.html");
      exit();
    } else {
      // The password is incorrect, show an error message
      echo "Incorrect password";


    }
  } else {
    // The email does not exist in the database, show an error message
    echo 'incorrect email';
  }

mysqli_close($conn);



