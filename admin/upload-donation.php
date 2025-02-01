<?php
session_start();
require '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Capture form inputs
  $donation_name = $_POST['donation_name'];
  $donation_details = $_POST['donation_details'];
  


  // Insert data into the database
  $sql = "INSERT INTO donation (donation_name, donation_details) 
            VALUES ('$donation_name', '$donation_details')";

  if ($con->query($sql) === TRUE) {
    echo "New Donation Page added successfully";
    header('Location: dashboard.php');
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }

  $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Upload Donation Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/FwbCBHF/fotor-2023-1-29-10-51-0.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="font-size: 20px;">Ahemedabad Municipal Cor.</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png"
              alt="Profile" class="rounded-circle">

            <?php
            $sqll = "select * from `userdata`";
            $resultt = mysqli_query($con, $sqll);

            if ($resultt) {
              while ($row = mysqli_fetch_assoc($resultt)) {
                $uname = $row['name'];

                echo '<span class="d-none d-md-block dropdown-toggle ps-2">' . $uname . '</span>';
              }
            }
            ?>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php
              $sql = "select * from `userdata`";
              $result = mysqli_query($con, $sql);

              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $uname = $row['name'];


                  echo '<h6>' . $uname . '</h6>';
                }
              }
              ?>
              <span>Clerk</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Schemes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

          <li>
            <a href="upload-notice.php" class="active">
              <i class="bi bi-circle"></i><span>Upload Schemes</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="all-form.php">
              <i class="bi bi-circle"></i><span>All Application</span>
            </a>
          </li>

        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Payout</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="pending-payout.php">
              <i class="bi bi-circle"></i><span>Pending Payout </span>
            </a>
          </li>
          <li>
            <a href="complated-payout.php">
              <i class="bi bi-circle"></i><span>Completed Payout </span>
            </a>
          </li>

        </ul>
      </li>
      
      
      <!-- End Tables Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Donation Schemes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Donation</li>
          <li class="breadcrumb-item active">Donation Schemes</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- <section class="section">

         
        </div> -->

    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Donation</h5>

          <!-- Vertical Form -->
          <!-- Delete this from data to add new working modal -->
          <form method="POST" action="">
            <label for="donation_name">Donation Page Name:</label><br>
            <input type="text" id="scheme_name" name="donation_name" required><br><br>

            <label for="donation_details">Donation Details:</label><br>
            <textarea id="donation_details" name="donation_details" rows="8" cols="100" required></textarea><br><br>

            
            <input type="submit" value="Submit">
          </form>

        </div>
      </div>



    </div>
    </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Ahemedabad Municipal Corporation</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>