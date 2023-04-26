<?php
/*
if(isset($_POST['emailLogin']) && isset($_POST['passwordLogin']) ){

  $email=$_POST['emailLogin'];
  $password=$_POST['passwordLogin'];

  try{

    $db = new mysqli('localhost', 'root','','Linguify');
    $querystr="select * from users ";
    $res=$db->query($querystr);
    for($i=0; $i<$res->num_rows;$i++){

      $row=$res->fetch_assoc();
      echo$row['email'].'       '.$row['password'];


    }
    $db->close();


  }catch(Exception $e){}

}
*/
?>


<?php
// Start the session to store user information
session_start();

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
      // The email and password are correct, set session variables and redirect to the dashboard page
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_email'] = $row['email'];
      header("Location: signUp.html");
      exit();
    } else {
      // The password is incorrect, show an error message
      $error_msg = "Incorrect password";
      echo $row['password'].'     '.$password;

    }
  } else {
    // The email does not exist in the database, show an error message
    $error_msg = "Email not found";
  }

mysqli_close($conn);


if (isset($error_msg)) { ?>
<div class="error">
  <?php echo $error_msg; ?>
</div>
<?php
}
?>
