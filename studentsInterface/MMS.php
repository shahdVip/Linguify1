

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Courses</title>
  <link rel="stylesheet" href="cssStudents/MMS.css">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



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


  function goToProfile(teacherEmail) {
    // Set the cookie with the teacher's email
    setCookie("teacherEmailFromStudent", teacherEmail, 7);
    // Redirect to the teacherProfile.php page
    window.location.href = "teacherProfile.php";
  }



  function setCookie(name, value, days) {
    var expires = "";

    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }

    document.cookie = name + "=" + encodeURIComponent(value) + expires + "; path=/";
  }


  function viewCourse(courseName, teacherEmail) {
    // Create a form element
    var form = document.createElement('form');

    // Set the form attributes
    form.method = 'POST';
    form.action = 'Cviewer.php'; // Specify the URL of the PHP file that will process the data

    // Create input elements for the parameters
    var inputCourseName = document.createElement('input');
    inputCourseName.type = 'hidden';
    inputCourseName.name = 'courseName';
    inputCourseName.value = courseName;

    var inputTeacherEmail = document.createElement('input');
    inputTeacherEmail.type = 'hidden';
    inputTeacherEmail.name = 'teacherEmail';
    inputTeacherEmail.value = teacherEmail;

    // Append the input elements to the form
    form.appendChild(inputCourseName);
    form.appendChild(inputTeacherEmail);

    // Append the form to the document body
    document.body.appendChild(form);

    // Submit the form
    form.submit();
  }


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
        <li class="nav-item">
          <a class="nav-link p-4 p-lg-3 active mx-5"   aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link p-4 p-lg-3 mx-5"  href="#" onclick="scrollToPercentage(85,1200)">Courses</a>
        </li>

        <li class="nav-item">
          <a class="nav-link p-4 p-lg-3 mx-5"  href="#" onclick="window.location.href='allCourses.php';">All courses</a>
        </li>

      </ul>

      <a class="btn  rounded-pill main-btn " id="mymodal" data-bs-toggle="modal" data-bs-target="#staticBackdrop"  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.7rem; --bs-btn-font-size: 0.9rem;" href="" onclick=" window.location.href = '../mainPageUsignned.html';">Log out</a>



    </div>
  </div>
</nav>

<div class="landing">
  <div class="container ">
    <div class="wrapper">
      <div class="content">

        <?php
              $email=$_COOKIE['variable'];
              $db_host = "localhost";
              $db_user = "root";
              $db_pass = "";
              $db_name = "Linguify";
              $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

              $stmt = mysqli_prepare($conn, "SELECT fullName FROM students WHERE email = ?");
              mysqli_stmt_bind_param($stmt, "s", $email);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $row = mysqli_fetch_assoc($result);

                $name = $row['fullName'];

                ?>
        <h1 style="z-index: 1">Welcome, <?php echo $name ?></h1>

        <p></p>
        <div class="buttons">
          <!--<a class="btn  rounded-pill main-btn "  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.7rem; --bs-btn-font-size: 0.9rem;" href="">View Courses</a>
          <a class="btn  rounded-pill main-btn "  style="--bs-btn-padding-y: .5rem; --bs-btn-padding-x: 1.7rem; --bs-btn-font-size: 0.9rem;" href="">Open Profile</a>-->
          <button class="Cbutton align-items-center justify-content-center" onclick="scrollToPercentage(85,1200)">
            <span>View Courses</span>
            <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
              <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="white"></path>
            </svg>
          </button>
          <button class="Cbutton2 align-items-center justify-content-center" onclick=" window.location.href = 'allCourses.php';">
            <span>View all available courses</span>
            <svg width="34" height="34" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="37" cy="37" r="35.5" stroke="whitesmoke" stroke-width="3"></circle>
              <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="whitesmoke"></path>
            </svg>
          </button>

        </div>

      </div>
      <iframe src='https://my.spline.design/friendskawaiicopy-0a98524c2c8d9fe42b8f3426bc909f58/' frameborder='0' width='100%' height='100%'></iframe>
    </div>

  </div>
</div>
<section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Courses</h2>
      <p>Your Courses</p>


    </div>
    <section class="slider">






      <?php
// Assuming you have established a database connection, you can modify the connection details accordingly
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Linguify";

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$email=$_COOKIE['variable'];
// Prepare the SQL statement to fetch the course data

      // Prepare the SQL statement to fetch the course data
      $sql = "SELECT sc.courseName, sc.teacherEmail, c.courseDuration, c.targetLanguage
        FROM studentCourses sc
        INNER JOIN courses c ON sc.courseName = c.courseName AND sc.teacherEmail = c.teacherEmail
        WHERE sc.studentEmail = :email";

      // Prepare the SQL statement
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':email', $email);

      // Execute the SQL statement
      $stmt->execute();

      // Fetch all the course data into an associative array
      $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

      // Close the database connection
      $pdo = null;

      $images = ['c1.png', 'c2.png', 'c3.png', 'c4.png', 'c5.png', 'c6.png'];
 foreach ($courses as $course) {
      $courseName = $course['courseName'];
      $courseLanguage = $course['targetLanguage'];
      $courseDuration = $course['courseDuration'];
   $teacherEmail=$course['teacherEmail'];
      $randomImage = $images[array_rand($images)];


      // Generate the HTML code for the card dynamically
      echo '<div class="card" style="border-radius: 2rem;">';
      echo '<div class="card-content">';
        echo '<img src="../imgs/'. $randomImage .'" alt="" class="card-img">';
        echo '<h1 class="card-title">' . $courseName . '</h1>';
   echo '<h1 class="card-inst" style="font-size:1rem;text-transform: capitalize; color: #8bb9fe; transition-delay: .1s;padding:7px;" onclick="goToProfile(\'' . $teacherEmail . '\')">' . $teacherEmail . '</h1>';

   echo '<div class="card-body">';
          echo '<div class="card-star">';
            echo '<p class="card-price">' . $courseLanguage . '</p>';
            echo '</div>';
          echo '<i class="fa-solid fa-stopwatch" style="color: #373b52;"></i>';
          echo '<p class="card-price">' . $courseDuration . '</p>';
          echo '</div>';
        echo '<div class="card-footer p-0 bg-transparent border-0">';
   echo '<button class="button" onclick="viewCourse(\'' . $courseName . '\', \'' . $teacherEmail . '\')">';
   echo '<svg class="svgIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>';
            echo '</button>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
      }
      ?>










    </section>
    <section class="addButton" data-bs-toggle="modal" data-bs-target="#CourseBackdrop">
      <button class="cta" onclick="window.location.href='allCourses.php';">
        <span>Want to add a corse toy your collection? :)</span>
        <svg viewBox="0 0 13 10" height="10px" width="15px">
          <path d="M1,5 L11,5"></path>
          <polyline points="8 1 12 5 8 9"></polyline>
        </svg>

      </button>
    </section>

  </div>


  <!--</div>-->
</section>

    </div>
  </div>
</div>





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


<script>
  function deleteCourse(courseName) {

  });

</script>
</body>


</html>







































































































































