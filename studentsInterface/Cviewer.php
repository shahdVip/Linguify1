
      <!DOCTYPE html>
      <html lang="en" xmlns="http://www.w3.org/1999/html">

      <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Course Material</title>
  <link rel="stylesheet" href="cssStudents/CviewerS.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://kit.fontawesome.com/05ac3d6c76.js" crossorigin="anonymous"></script>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link href="../assets/img/loyintlogos/logow.svg" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>
<script>
  $(window).scroll(function() {
    var scrollPercentage = ($(window).scrollTop() / ($(document).height() - $(window).height())) * 100;

    if (scrollPercentage >= 25 && scrollPercentage < 50) {
      $(".nav-item:nth-child(2) .nav-link").addClass("active");
      $(".nav-item:not(:nth-child(2)) .nav-link").removeClass("active");
    } else if (scrollPercentage >= 50 && scrollPercentage < 75) {
      $(".nav-item:nth-child(3) .nav-link").addClass("active");
      $(".nav-item:not(:nth-child(3)) .nav-link").removeClass("active");
    } else if (scrollPercentage >= 75) {
      $(".nav-item:nth-child(4) .nav-link").addClass("active");
      $(".nav-item:not(:nth-child(4)) .nav-link").removeClass("active");
    } else {
      $(".nav-item:first-child .nav-link").addClass("active");
      $(".nav-item:not(:first-child) .nav-link").removeClass("active");
    }
  });

  function scrollToPercentage(percentage, duration) {
    const windowHeight = window.innerHeight;
    const targetPosition = windowHeight * (percentage / 100);
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const startTime = performance.now();

    function easeInOutQuad(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t + b;
      t--;
      return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    function scroll() {
      const currentTime = performance.now();
      const timeElapsed = currentTime - startTime;
      window.scrollTo(0, easeInOutQuad(timeElapsed, startPosition, distance, duration));

      if (timeElapsed < duration) {
        requestAnimationFrame(scroll);
      }
    }

    scroll();
  }


  $(window).scroll(function() {
    var scrollPosition = $(window).scrollTop();
    var windowHeight = $(window).height();

    // Calculate the position at which the switch should occur (50% of the page height)
    var switchPosition = windowHeight * 0.5;

    if (scrollPosition >= switchPosition) {
      $(".nav-item:nth-child(2) .nav-link").removeClass("active");
      $(".nav-item:nth-child(3) .nav-link").addClass("active");
    } else {
      $(".nav-item:nth-child(2) .nav-link").addClass("active");
      $(".nav-item:nth-child(3) .nav-link").removeClass("active");
    }
  });
</script>
<body>
<nav  class="navbar fixed-top navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand " href="#">
      <img src="../imgs/logo.png" alt="">
      <span>Linguify</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main" aria-controls="main" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars" style="color: #373b52;"></i>
    </button>
    <div class="collapse navbar-collapse position-relative justify-content-center align-items-center " id="main">
      <ul class="navbar-nav  mb-2 mb-lg-0">



        <a class="btn  rounded-pill main-btn " id="mymodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.7rem; --bs-btn-font-size: 0.9rem;" href="" onclick=" window.location.href = '../mainPageUsignned.html';">Log out</a>



      </ul>




    </div>
  </div>
</nav>
<section id="about" class="about" style="text-align: center">
  <div class="container " data-aos="fade-up">
    <div class="section-title">

      <?php
      $courseName = $_POST['courseName'];

       echo"<h2>".$courseName."</h2>"
      ?>


    </div>
    <section class="slider">
      <div class="section-title">
        <h2>Video Links</h2>
        <section class="Links" style="height: 400px; display: flex; flex-direction: column; gap:30px;">

<br>

          <?php
          // Assuming you have established a database connection, you can modify the connection details accordingly
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Linguify";

          // Create a new PDO instance
          $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

          // Retrieve the courseName and teacherEmail from the previous question

          $teacherEmail = $_POST['teacherEmail'];

          // Prepare the SQL statement to retrieve videoLink and videoLabel
          $sql = "SELECT videoLink, videoLabel FROM courseVideos WHERE courseName = :courseName AND teacherEmail = :teacherEmail";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':courseName', $courseName);
          $stmt->bindParam(':teacherEmail', $teacherEmail);

          // Execute the SQL statement
          $stmt->execute();

          // Fetch all the video data into an associative array
          $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Loop through the videos and generate the HTML code
          foreach ($videos as $video) {
            $videoLabel = $video['videoLabel'];
            $videoLink = $video['videoLink'];

            // Print the videoLabel and videoLink
            echo "<p>".$videoLabel." :</p>" ;
            echo '<a href="' . $videoLink . '">' . $videoLink . '</a><br><br>';
          }

          // Close the database connection
          $pdo = null;
          ?>




        </section>
      </div>
      <div class="section-title">
        <h2>Documents</h2>
        <section class="docs" style="height: 400px; display: flex; flex-direction: column; gap:30px;">

          <?php

          // Assuming you have established a database connection, you can modify the connection details accordingly
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "Linguify";

          // Create a new PDO instance
          $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

          // Prepare the SQL statement to retrieve the files and file labels
          $sql = "SELECT fileName, fileLabel FROM files WHERE courseName = :courseName AND teacherEmail = :teacherEmail";
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':courseName', $courseName);
          $stmt->bindParam(':teacherEmail', $teacherEmail);

          // Execute the SQL statement
          $stmt->execute();

          // Fetch all the files and file labels into an associative array
          $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Close the database connection
          $pdo = null;

          // Iterate through the files and print the file labels and links
          foreach ($files as $file) {
            $fileName = $file['fileName'];
            $fileLabel = $file['fileLabel'];

            echo "<p>".$fileLabel. "</p>";
            echo '<a href="../teachersInterface/phpTeachers/uploads/' . $fileName . '">' . $fileName . '</a><br><br>';
          }
          ?>




        </section>
      </div>



    </section>
  </div>
</section>

<footer class="footer" style=" width: 100%;">
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
  <p class="copyright"> Powered By <img src="../imgs/logo.png" class="logo" alt=""> </p>

</footer>


<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/typed.js/typed.min.js"></script>
<script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<script src="../assets/js/main.js"></script>
</body>

</html>
