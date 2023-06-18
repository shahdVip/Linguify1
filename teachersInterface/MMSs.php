

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <link rel="stylesheet" href="cssTeachers/MMSs.css">
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
<script>
  $(document).ready(function() {
    // Handle file input change event
    $(".file-input").on("change", function() {
      var fileInput = $(this);
      var fileName = fileInput.val().split("\\").pop(); // Get the file name

      // Display the file name
      fileInput.siblings("p").text(fileName);
    });

    // Handle form submission
    $("form").on("submit", function(e) {
      e.preventDefault(); // Prevent form submission

      var formData = new FormData(this); // Create FormData object to store form data

      $.ajax({
        type: "POST",
        url: "upload.php", // Replace with the URL to handle file uploads
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the response
          console.log(response);
        },
        error: function(xhr, status, error) {
          // Handle error
          console.log(error);
        }
      });
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Initially hide the video link input and file input
    $(".video-link").hide();
    $("#videoLinkLabel").hide();
    $("#fileUploadField").hide();
    // Handle radio button change event
    $("input[name='uploadType']").on("change", function() {
      var selectedValue = $(this).val();

      if (selectedValue === "video") {
        $(".video-link").show();
        $("#videoLinkLabel").show();
        $("#fileUploadField").hide();
      } else if (selectedValue === "file") {
        $(".video-link").hide();
        $("#videoLinkLabel").hide();
        $("#fileUploadField").show();
      }
    });
  });
</script>


<script>


  $(document).ready(function() {
    $('#courseInfo').on('submit', function(e) {
      e.preventDefault(); // Prevent form submission

      // Get form data
      var cDescription = $('#courseInfo [name="cDescription"]').val();
      var Clanguage = $('#courseInfo [name="Clanguage"]').val();
      var Cname = $('#courseInfo [name="Cname"]').val();
      var duration = $('#courseInfo [name="duration"]').val();

      // Perform AJAX request
      $.ajax({
        type: 'POST',
        url: 'phpTeachers/addCourse.php',
        data: {
          cDescription: cDescription,
          Clanguage: Clanguage,
          Cname: Cname,
          duration: duration
        },
        success: function(response) {
          // Handle the response
          if (response.trim() === 'success') {
            // Successful submission, show success message or perform desired action
            $('#ModalToggle2').modal('show');
          } else {
            // Show error message to the user
            $('#error-msg').text(response).show();
          }
        },
        error: function(xhr, status, error) {
          // Handle AJAX request error
          console.log(error); // Log the error for debugging purposes
          $('#error-msg').text('An error occurred. Please try again.').show();
        }
      });
    });
  });

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
                <li class="nav-item">
                    <a class="nav-link p-4 p-lg-3 active mx-5"   aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 p-lg-3 mx-5"  href="#" onclick="scrollToPercentage(85,1200)">Courses</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link p-4 p-lg-3 mx-5"  href="#" onclick="window.location.href='profile.php';">Profile</a>
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

              $stmt = mysqli_prepare($conn, "SELECT fullName FROM teachers WHERE email = ?");
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
                    <button class="Cbutton2 align-items-center justify-content-center" onclick=" window.location.href = 'profile.php';">
                        <span>Go to Profile</span>
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
$sql = "SELECT  courseName, targetLanguage, courseDuration FROM courses where teacherEmail='$email'";

// Execute the SQL statement
$stmt = $pdo->query($sql);

// Fetch all the course data into an associative array
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;
          $images = ['c1.png', 'c2.png', 'c3.png', 'c4.png', 'c5.png', 'c6.png'];
          foreach ($courses as $course) {
            $courseName = $course['courseName'];
            $courseLanguage = $course['targetLanguage'];
            $courseDuration = $course['courseDuration'];
            $randomImage = $images[array_rand($images)];


            // Generate the HTML code for the card dynamically
            echo '<div class="card" style="border-radius: 2rem;">';
            echo '<div class="card-content">';
            echo '<img src="../imgs/'. $randomImage .'" alt="" class="card-img">';
            echo '<h1 class="card-title">' . $courseName . '</h1>';
            echo '<div class="card-body">';
            echo '<div class="card-star">';
            echo '<p class="card-price">' . $courseLanguage . '</p>';
            echo '</div>';
            echo '<i class="fa-solid fa-stopwatch" style="color: #373b52;"></i>';
            echo '<p class="card-price">' . $courseDuration . '</p>';
            echo '</div>';
            echo '<div class="card-footer p-0 bg-transparent border-0">';
            echo '<button class="button" onclick="deleteCourse(\'' . $courseName . '\')">';
            echo '<svg class="svgIcon" viewBox="0 0 448 512" ><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path></svg>';
            echo '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>










        </section>
        <section class="addButton" data-bs-toggle="modal" data-bs-target="#CourseBackdrop">
            <button class="cta">
                <span>Add a Course</span>
                <svg viewBox="0 0 13 10" height="10px" width="15px">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>

            </button>
        </section>

    </div>


    <!--</div>-->
</section>
<div class="modal fade" id="CourseBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CourseBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="CourseBackdropLabel">New Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <form id="courseInfo" class="form" method="post" action="phpTeachers/addCourse.php">

                    <label>
                        <input required placeholder="" name="Cname" class="input" maxlength="20">
                        <span>Course name </span>
                    </label>

                    <label>
                        <input required="" placeholder="" name="Clanguage" class="input" maxlength="14">
                        <span>Targeted language (2 words)</span>
                    </label>

                    <label>
                        <input required name="duration" placeholder="" class="input" oninput="validateInput(this)">
                        <span>Course duration(2 numbers)</span>
                    </label>
                    <label>
                        <textarea required rows="3" placeholder="" class="input01" name="cDescription" maxlength="350"></textarea>
                        <span> Course Description (70 words)</span>
                    </label>
                  <p id="error-msg" class="error-message" style="display: none;"></p>


                  <div class="modal-footer justify-content-center">
                    <button type="submit" class="fancy" href="#"      >
                      <span class="top-key"></span>
                      <span class="text">submit</span>
                      <span class="bottom-key-1"></span>
                      <span class="bottom-key-2"></span>
                    </button>
                  </div>



                </form>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="ModalToggle2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered w-75 align-items-center justify-content-center">
    <div class="modal-content w-75">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Material upload</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body1">
        <label>
          <input required placeholder="" type="text" class="input" name="fileLabel">
          <span>File label</span>
        </label>
        <div class="radio-inputs">
          <form action="#">

          <label>
            <input class="radio-input" type="radio" name="uploadType" value="video">
            <span class="radio-tile">
                            <span class="radio-icon">
                                <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                <lord-icon
                                  src="https://cdn.lordicon.com/xhitaejr.json"
                                  trigger="hover"
                                  colors="outline:#131432,primary:#3a3347,secondary:#4fbaf4,secondary 2:#ebe6ef"
                                  style="width:150px;height:150px">
                                </lord-icon>
                            </span>
                            <span class="radio-label">Video</span>
                        </span>
          </label>
          <label>
            <input class="radio-input" type="radio" name="uploadType" value="file" checked>
            <span class="radio-tile">
                            <span class="radio-icon">
                                <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                                <lord-icon
                                  src="https://cdn.lordicon.com/nocovwne.json"
                                  trigger="hover"
                                  colors="primary:#121331,secondary:#4fbaf4"
                                  state="hover-2"
                                  style="width:150px;height:150px">
                                </lord-icon>
                            </span>
                            <span class="radio-label">Documents</span>
                        </span>
          </label>
        </div>
        <label>
          <input required="" placeholder="" type="text" name="videoLink" class="input video-link">
          <span id="videoLinkLabel">Video link</span>
        </label>
        <div class="wrapper1" id="fileUploadField">
          <header>Upload Course Files Here!</header>




            <label for="fileInput" class="file-label">
              <input id="fileInput" class="file-input" type="file" name="file" hidden>
              <i class="fas fa-cloud-upload-alt"></i>
              <p class="file-text">Browse File to Upload</p>
            </label>
          </form>
          <section class="progress-area"></section>
          <section class="uploaded-area"></section>
        </div>

      </div>
      <div class="modal-footer justify-content-center align-items-center">
        <button id="submitMaterial" class="fancy1" href="#">
          <span class="top-key1"></span>
          <span class="text1">Upload</span>
          <span class="bottom-key-11"></span>
          <span class="bottom-key-21"></span>
        </button>
      </div>
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
    // Assuming you have a server-side script that handles the deletion, such as delete-course.php

    // Send an AJAX request to the server-side script
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'phpTeachers/delete-course.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the data to be sent in the request body
    var data = 'courseName=' + encodeURIComponent(courseName);

    // Set up the onload function to handle the response
    xhr.onload = function() {
      if (xhr.status === 200) {
        // The request was successful
        console.log(xhr.responseText);
        location.reload(true);

      } else {
        // The request was unsuccessful, handle any errors here
        console.error('Request failed. Error code:', xhr.status);
      }
    };

    // Send the request
    xhr.send(data);
  }
  // Get a reference to the upload button
  // Get a reference to the upload button
  var uploadButton = document.getElementById('submitMaterial');

  // Add an event listener to the upload button
  uploadButton.addEventListener('click', function() {
    // Get the selected radio button value
    var uploadType = document.querySelector('input[name="uploadType"]:checked').value;

    // Create a new FormData object to store the form data
    var formData = new FormData();

    // Add the common form fields to the FormData object
    var fileLabel = document.querySelector('input[name="fileLabel"]').value;
    formData.append('fileLabel', fileLabel);

    // Add the form data based on the selected radio button
    if (uploadType === 'video') {
      var videoLink = document.querySelector('.video-link').value;
      formData.append('videoLink', videoLink);
    } else if (uploadType === 'file') {
      var fileInput = document.getElementById('fileInput').files[0];
      formData.append('file', fileInput);
    }

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Set up the Ajax request
    var url;
    if (uploadType === 'video') {
      url = 'phpTeachers/handle-video-upload.php'; // URL for handling video upload
    } else if (uploadType === 'file') {
      url = 'phpTeachers/handle-file-upload.php'; // URL for handling file upload
    }
    xhr.open('POST', url);

    // Set up the onload function to handle the response
    xhr.onload = function() {
      if (xhr.status === 200) {
        // window.location.href = '../dashmin-1.0.0/index.php';
        console.log(xhr.responseText);
      } else {
        // The request was unsuccessful, handle any errors here
        console.error('Request failed. Error code:', xhr.status);
      }
    };

    // Send the Ajax request with the form data
    xhr.send(formData);
  });

</script>
</body>
<script>
  function validateInput(input) {
    // Remove any non-digit characters from the input value
    var cleanedValue = input.value.replace(/\D/g, '');

    // Limit the input value to two digits
    cleanedValue = cleanedValue.slice(0, 2);

    // Update the input value with the cleaned value
    input.value = cleanedValue;
  }
</script>

</html>
