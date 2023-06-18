
<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "Linguify";
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


echo'success';
$teacherId = $_COOKIE["teacherEmailFromStudent"];

// Assuming you have established a database connection

// Query to fetch teacher data from the database based on the submitted ID
$query = "SELECT * FROM teachers WHERE email = '$teacherId'";
$result = mysqli_query($conn, $query);

// Fetch the data from the result
if ($result && mysqli_num_rows($result) > 0) {
  $teacher = mysqli_fetch_assoc($result);
  // Use the fetched data as needed
}


// Retrieve the picture from the database

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="../teachersInterface/cssTeachers/profileStyles.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/05ac3d6c76.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>
<div class="container "id="home">

</div>
<nav class="navbar fixed-top navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand " href="#">
      <img src="imgs/logo.png" alt="">
      <span>Linguify</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars" style="color: #373b52;"></i>
    </button>
    <div class="collapse navbar-collapse position-relative justify-content-center align-items-center " id="main">
      <ul class="navbar-nav  mb-2 mb-lg-0">


        <li class="nav-item">
          <a class="nav-link p-4 p-lg-3 mx-5"   aria-current="page" href="#" onclick="window.location.href='MMS.php';">Home</a>
        </li>

      </ul>

      <a class="btn  rounded-pill main-btn " id="mymodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.7rem; --bs-btn-font-size: 0.9rem;" href="" onclick=" window.location.href = '../mainPageUsignned.html';">Log out</a>


    </div>
  </div>
</nav>

<div class="container "id="profileC">
  <div class="box">


  </div>
  <div class="box overlay">
    <section class="avatar">
      <br>
      <br>


      <?php
      $stmt1 = $conn->prepare("SELECT picture FROM pictures WHERE email = ?");
      $stmt1->bind_param("s", $teacherId);
      $stmt1->execute();
      $result1 = $stmt1->get_result();


      if ($result1->num_rows > 0) {
        // Output the picture as a data URL
        $row = $result1->fetch_assoc();
        $picture = $row['picture'];
        echo '<img src="data:image/jpeg;base64,'.base64_encode($picture).'" width="290" height="290">';
      }
      else {
        echo "          <iframe src='https://my.spline.design/avatarcopy-80c4098ab5bd7b65077c7499beea8dd4/' frameborder='0' width='100%' height='100%'></iframe>";
      }
      ?>


    </section>
    <hr>
    <div class="about-list">
      <div>


        <div class="media">
          <label>Name:</label>
          <p>         <?php


            echo $teacher['fullName'];



            ?>
          </p>
        </div>
      </div>
      <div>
        <div class="media">
          <label>University:</label>
          <p><?php


            echo $teacher['university'];



            ?>
          </p>
        </div>
      </div>
      <div>
        <div class="media">
          <label>Degree:</label>
          <p>        <?php


            echo $teacher['degree'];



            ?>
          </p>
        </div>
      </div>
      <div>
        <div class="media">
          <label>Languages:</label>
          <p> <?php


            echo $teacher['languages'];



            ?>
          </p>
        </div>
      </div>
      <div>
        <div class="media">
          <label>Phone no.:</label>
          <p>        <?php


            echo $teacher['phoneNumber'];



            ?>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="counter">
  <div class="row justify-content-center">
    <div class="col text-center">
      <h6 class="count h2" data-to="500" data-speed="500">500</h6>
      <p class="">Thumbs up</p>
    </div>
    <div class="col text-center">
      <h6 class="count h2" data-to="150" data-speed="150">150</h6>
      <p class="">Students enrolled</p>
    </div>
  </div>
</div>
<div class="about">
  <h3 class="dark-color">About Me</h3>
  <p id="aboutMe" contenteditable="false">
    <?php
    $stmt1 = $conn->prepare("SELECT description FROM teacherDescription WHERE email = ?");
    $stmt1->bind_param("s", $teacherId);
    $stmt1->execute();
    $result1 = $stmt1->get_result();


    if ($result1->num_rows > 0) {
      // Output the picture as a data URL
      $row = $result1->fetch_assoc();

      echo $row['description'];
    }
    ?>

  </p>


  <!--<button id="saveContentButton" onclick="saveContent()" style="visibility: hidden">save content</button>-->
</div>
<footer class="footer">
  <div class="container" id="footerContainer">
    <div class="row">
      <div class="col footer-col">
        <h4>company <div class="underline"><span></span></div></h4>
        <ul>
          <li><a href="#">home</a></li>
          <li><a href="#">our services</a></li>
          <li><a href="#">about us</a></li>
          <li><a href="#">privacy policy</a></li>
        </ul>
      </div>
      <div class="col footer-col">
        <h4>get help<div class="underline"><span></span></div></h4>
        <ul>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">blah blah</a></li>
        </ul>
      </div>
      <div class="col footer-col">
        <h4>languages<div class="underline"><span></span></div></h4>
        <ul>
          <li><a href="#">english</a></li>
          <li><a href="#">العربية</a></li>
          <li><a href="#">español</a></li>
          <li><a href="#">Türkçe </a></li>
        </ul>
      </div>
      <div class="col footer-col">
        <h4>follow us<div class="underline"><span></span></div></h4>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <hr >
  <p class="copyright"> Powered By <img src="imgs/logo.png" class="logo" alt=""> </p>

</footer>

</body>

</html>
