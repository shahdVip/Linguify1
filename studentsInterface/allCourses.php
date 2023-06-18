

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Courses</title>
    <link rel="stylesheet" href="cssStudents/allCoursesS.css">
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



    function enrollCourse(courseName, teacherEmail, studentEmail) {
      // Create a new XMLHttpRequest object
      var xhr = new XMLHttpRequest();

      // Set up the AJAX request
      var url = 'phpStudents/enroll-course.php'; // Replace with the URL of your PHP script
      xhr.open('POST', url);

      // Set the request header to send JSON data
      xhr.setRequestHeader('Content-Type', 'application/json');

      // Set up the onload function to handle the response
      xhr.onload = function() {
        if (xhr.status === 200) {
          // Request successful, handle the response here if needed
        //  console.log(xhr.responseText);

          alert(xhr.responseText);




        } else {
          // The request was unsuccessful, handle any errors here
          console.error('Request failed. Error code:', xhr.status);

        }
      };

      // Create a data object with the parameters
      var data = {
        courseName: courseName,
        parameter2: teacherEmail,
        parameter3: studentEmail
      };

      // Convert the data object to JSON
      var jsonData = JSON.stringify(data);

      // Send the AJAX request with the JSON data
      xhr.send(jsonData);
    }

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

    function activateSearch() {
      var searchInput = document.getElementById('search');

      searchInput.addEventListener('input', function() {
        var searchQuery = searchInput.value.trim().toLowerCase();
        var courseCards = document.getElementsByClassName('card');

        for (var i = 0; i < courseCards.length; i++) {
          var courseCard = courseCards[i];
          var courseName = courseCard.getElementsByClassName('card-title')[0].textContent.toLowerCase();
          var teacherEmail = courseCard.getElementsByClassName('card-inst')[0].textContent;

          if (searchQuery === '') {
            courseCard.style.display = 'block';
          } else {
            if (courseName.includes(searchQuery)) {
              courseCard.style.display = 'block';
            } else {
              courseCard.style.display = 'none';
            }
          }
        }
      });
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
                    <a class="nav-link p-4 p-lg-3 active mx-5"   aria-current="page" href="#"onclick="window.location.href='MMS.php';">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 p-lg-3 mx-5"  href="#" onclick="window.location.href='MMS.php'">Courses</a>
                </li>



            </ul>

            <form class="form">
                <label for="search">
                    <input required="" autocomplete="off" placeholder="search your chats" id="search" type="text" oninput="activateSearch()">
                    <div class="icon">
                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-on">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                        <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="swap-off">
                            <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <button type="reset" class="close-btn">
                        <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </label>
            </form>



        </div>
    </div>
</nav>

<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>All Courses</h2>

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
          $sql = "SELECT c.courseName, c.targetLanguage, c.courseDuration, c.teacherEmail
FROM courses c
LEFT JOIN studentCourses sc ON c.courseName = sc.courseName AND c.teacherEmail = sc.teacherEmail AND sc.studentEmail = :email
WHERE sc.studentEmail IS NULL ";

          // Execute the SQL statement
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':email', $email);
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
            $teacherEmail = $course['teacherEmail'];
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
            echo '<button class="button3" onclick="enrollCourse(\'' . $courseName . '\', \'' . $teacherEmail . '\', \'' . $email . '\')">';
            echo ' <svg class="empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path fill="none" d="M0 0H24V24H0z"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2zm-3.566 15.604c.881-.556 1.676-1.109 2.42-1.701C18.335 14.533 20 11.943 20 9c0-2.36-1.537-4-3.5-4-1.076 0-2.24.57-3.086 1.414L12 7.828l-1.414-1.414C9.74 5.57 8.576 5 7.5 5 5.56 5 4 6.656 4 9c0 2.944 1.666 5.533 4.645 7.903.745.592 1.54 1.145 2.421 1.7.299.189.595.37.934.572.339-.202.635-.383.934-.571z"></path></svg>';
            echo '<svg class="filled" height="32" width="32" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0H24V24H0z" fill="none"></path><path d="M16.5 3C19.538 3 22 5.5 22 9c0 7-7.5 11-10 12.5C9.5 20 2 16 2 9c0-3.5 2.5-6 5.5-6C9.36 3 11 4 12 5c1-1 2.64-2 4.5-2z"></path></svg>';
            echo 'Enroll';
            echo '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>




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
