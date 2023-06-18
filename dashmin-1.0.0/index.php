<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
      <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
          <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa me-2"></i>  &nbsp;</h3>
          </a>
          <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
              <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
              <h6 class="mb-0">
                <?php
                $email=$_COOKIE['variable'];
                echo $email;

                ?>
              </h6>
              <span>Admin</span>
            </div>
          </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->

            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Concurrent students</p>
                                <h6 class="mb-0">12</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Concurrent teachers</p>
                                <h6 class="mb-0">5</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Courses active</p>
                                <h6 class="mb-0">4</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Worldwide Sales</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Salse & Revenue</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->


            <!-- Recent Sales Start -->
          <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Teachers</h6>

              </div>

              <div tyle="overflow-y: scroll; max-height: 350px">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                  <thead>
                  <tr class="text-dark">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNumber</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $db_host = "localhost";
                  $db_user = "root";
                  $db_pass = "";
                  $db_name = "Linguify";
                  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                  $stmt = mysqli_prepare($conn, "SELECT email, fullName, phoneNumber FROM teachers");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['fullName'];
                    $email = $row['email'];
                    $phoneNumber = $row['phoneNumber'];
                    ?>
                    <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phoneNumber; ?></td>
                      <td><a class="btn btn-danger m-2" href="#" onclick="deleteTeacher('<?php echo $email; ?>')">Delete</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Students</h6>

              </div>
              <div style="overflow-y: scroll; max-height: 350px">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                  <thead>
                  <tr class="text-dark">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNumber</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $db_host = "localhost";
                  $db_user = "root";
                  $db_pass = "";
                  $db_name = "Linguify";
                  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                  $stmt = mysqli_prepare($conn, "SELECT email, fullName, phoneNumber FROM students");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['fullName'];
                    $email = $row['email'];
                    $phoneNumber = $row['phoneNumber'];
                    ?>
                    <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phoneNumber; ?></td>
                      <td><a class="btn btn-danger m-2" href="#" onclick="deleteStudent('<?php echo $email; ?>')">Delete</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>




          <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Unvalidated teachers</h6>

              </div>
              <div style="overflow-y: scroll; max-height: 350px">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                  <thead>
                  <tr class="text-dark">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNumber</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $db_host = "localhost";
                  $db_user = "root";
                  $db_pass = "";
                  $db_name = "Linguify";
                  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                  $stmt = mysqli_prepare($conn, "SELECT email, fullName, phoneNumber FROM unvalidatedteachers");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['fullName'];
                    $email = $row['email'];
                    $phoneNumber = $row['phoneNumber'];
                    ?>
                    <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $phoneNumber; ?></td>
                      <td><a class="btn btn-success m-2" href="#" onclick="addUnvalidatedTeacher('<?php echo $email; ?>')">Accept</a><a class="btn btn-danger m-2" href="#" onclick="deleteUnvalidatedTeacher('<?php echo $email; ?>')">Delete</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>







          <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Unvalidated courses</h6>

              </div>
              <div style="overflow-y: scroll; max-height: 350px">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                  <thead>
                  <tr class="text-dark">
                    <th scope="col">Course name</th>
                    <th scope="col">Teacher email</th>
                    <th scope="col">course Language</th>
                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $db_host = "localhost";
                  $db_user = "root";
                  $db_pass = "";
                  $db_name = "Linguify";
                  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                  $stmt = mysqli_prepare($conn, "SELECT teacherEmail, courseName, targetLanguage FROM unvalidatedCourses");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $name = $row['courseName'];
                    $email = $row['teacherEmail'];
                    $targetLanguage = $row['targetLanguage'];
                    ?>
                    <tr>
                      <td><?php echo $name; ?></td>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $targetLanguage; ?></td>
                      <td><a class="btn btn-info m-2" href="#" onclick="viewCourse('<?php echo $name; ?>','<?php echo $email; ?>')">View Course</a><a class="btn btn-success m-2" href="#" onclick="addCourse('<?php echo $email; ?>','<?php echo $name; ?>')">Accept</a><a class="btn btn-danger m-2" href="#" onclick="deleteCourse('<?php echo $email; ?>','<?php echo $name; ?>')">Delete</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>











          <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Admins</h6>

              </div>
              <div class="mb-3">
                <label for="searchEmail" class="form-label">Enter the email of the user you want to promote to admin</label>
                <input type="text" id="searchEmail" class="form-control" placeholder="Enter email">
                <button type="button" class="btn btn-outline-primary m-2" onclick="promoteToAdmin()">Promote</button>
              </div>
              <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                  <thead>
                  <tr class="text-dark">
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>

                    <th scope="col">Action</th>
                  </tr>
                  </thead>
                  <tbody id="teacherTableBody">
                  <?php
                  $db_host = "localhost";
                  $db_user = "root";
                  $db_pass = "";
                  $db_name = "Linguify";
                  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                  $stmt = mysqli_prepare($conn, "SELECT email, password FROM users where userType=2");
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $email = $row['email'];
                    $password = $row['password'];
                    ?>
                    <tr>
                      <td><?php echo $email; ?></td>
                      <td><?php echo $password; ?></td>
                      <td><a class="btn btn-danger m-2" href="#" onclick="deleteAdmin('<?php echo $email; ?>')">Delete</a></td>
                    </tr>
                    <?php
                  }
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


            <!-- Widgets Start -->

            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Linguify</a>, All Right Reserved.
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

<script>
  function deleteTeacher(email) {
    var confirmation = confirm("Are you sure you want to delete this teacher?");

    if (confirmation) {
      location.reload(true);
      // Make an AJAX request to delete the teacher from the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Teacher deleted successfully
            // Remove the corresponding table row
            var row = document.querySelector("td:contains('" + email + "')").parentNode;
            row.parentNode.removeChild(row);
          } else {
            // An error occurred during deletion
            console.error("Error deleting teacher:", xhr.responseText);
          }
        }
      };

      xhr.open("POST", "delete_teacher.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email));
    }
  }
</script>

<script>
  function deleteStudent(email) {
    var confirmation = confirm("Are you sure you want to delete this student?");

    if (confirmation) {
      // Make an AJAX request to delete the teacher from the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Teacher deleted successfully
            // Remove the corresponding table row
            var row = document.querySelector("td:contains('" + email + "')").parentNode;
            row.parentNode.removeChild(row);

          } else {
            // An error occurred during deletion
            console.error("Error deleting student:", xhr.responseText);
          }
        }
      };

      xhr.open("POST", "delete_student.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email));



    }
  }


  function deleteUnvalidatedTeacher(email) {
    var confirmation = confirm("Are you sure you want to delete this unvalidated teacher?");

    if (confirmation) {
      location.reload(true);
      // Make an AJAX request to delete the from the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Teacher deleted successfully
            // Remove the corresponding table row
            var row = document.querySelector("td:contains('" + email + "')").parentNode;
            row.parentNode.removeChild(row);

          } else {
            // An error occurred during deletion
            console.error("Error deleting unvalidated teacher:", xhr.responseText);
          }
        }
      };

      xhr.open("POST", "delete_UnvalidatedTeacher.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email));


    }
  }

  function addUnvalidatedTeacher(email) {
    var confirmation = confirm("Are you sure you want to approve this teacher?");

    if (confirmation) {
      location.reload(true);
      // Make an AJAX request to add the teacher to the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          // Add a delay of 2 seconds before processing the response

            if (xhr.status === 200) {
              // Teacher added successfully
              // Remove the corresponding table row
              var row = document.querySelector("td:contains('" + email + "')").parentNode;
              row.parentNode.removeChild(row);
            } else {
              // An error occurred during teacher addition
              console.error("Error adding unvalidated teacher:", xhr.responseText);
            }
        // Delay of 2 seconds (2000 milliseconds)
        }
      };

      xhr.open("POST", "addUnvalidatedTeacher.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email));
    }
  }

  function promoteToAdmin() {
    var confirmation = confirm("Are you sure you want to promote this user to admin?");

    if (confirmation) {
      location.reload(true);
      // Make an AJAX request to add the teacher to the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          // Add a delay of 2 seconds before processing the response

          if (xhr.status === 200) {
            // Teacher added successfully
            // Remove the corresponding table row

          } else {
            // An error occurred during teacher addition
            console.error("Error adding unvalidated teacher:", xhr.responseText);
          }
          // Delay of 2 seconds (2000 milliseconds)
        }
      };

      xhr.open("POST", "addAdmin.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      var emailInput = document.getElementById("searchEmail");
      var email = emailInput.value.trim();

      if (email !== "") {
        xhr.send("email=" + encodeURIComponent(email));
      } else {
        // Handle the case when the email input is empty
        confirm("You have not typed an email.")
      }
    }
  }


  function deleteAdmin(email) {
    var confirmation = confirm("Are you sure you want to delete this admin?");

    if (confirmation) {
      location.reload(true);
      // Make an AJAX request to add the teacher to the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          // Add a delay of 2 seconds before processing the response

          if (xhr.status === 200) {
            // Teacher added successfully
            // Remove the corresponding table row
            var row = document.querySelector("td:contains('" + email + "')").parentNode;
            row.parentNode.removeChild(row);
          } else {
            // An error occurred during teacher addition
            console.error("Error adding unvalidated teacher:", xhr.responseText);
          }
          // Delay of 2 seconds (2000 milliseconds)
        }
      };

      xhr.open("POST", "deleteAdmin.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email));
    }
  }



  function viewCourse(courseName, teacherEmail) {
    // Create a form element
    var form = document.createElement('form');

    // Set the form attributes
    form.method = 'POST';
    form.action = '../studentsInterface/Cviewer.php'; // Specify the URL of the PHP file that will process the data

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



  function deleteCourse(email, courseName) {
    var confirmation = confirm("Are you sure you want to delete this course");

    if (confirmation) {
      // Make an AJAX request to delete the student from the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Student deleted successfully
            // Remove the corresponding table row
            location.reload(true);


          } else {
            // An error occurred during deletion
            console.error("Error deleting student:", xhr.responseText);
          }
        }
      };

      xhr.open("POST", "deleteCourse.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email) + "&courseName=" + encodeURIComponent(courseName));
    }
  }

  function addCourse(email, courseName) {
    var confirmation = confirm("Are you sure you want to add this course");

    if (confirmation) {
      // Make an AJAX request to delete the student from the database
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {

           location.reload(true);

          } else {
            // An error occurred during deletion
            console.error("Error deleting student:", xhr.responseText);
          }
        }
      };

      xhr.open("POST", "addCourse.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("email=" + encodeURIComponent(email) + "&courseName=" + encodeURIComponent(courseName));
    }
  }


</script>

</html>
