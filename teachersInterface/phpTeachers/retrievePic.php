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

// Check if the email is submitted
if (isset($_POST['email'])) {
  // Get the email entered by the user
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Check if the email exists in the database
  $stmt = mysqli_prepare($conn, "SELECT * FROM pictures WHERE email=?");
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Display the picture associated with the email
    echo "<img src='data:image/jpeg;base64," . base64_encode($row['picture']) . "' />";
  } else {
    // The email does not exist in the database, show an error message
    echo 'No picture found for this email';
  }
}

mysqli_close($conn);
?>
