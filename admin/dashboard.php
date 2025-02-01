<?php
session_start();
require '../dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Taluka Panchayat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="https://i.ibb.co/FwbCBHF/fotor-2023-1-29-10-51-0.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <style>
    /* Website Scrollerbar */
    body::-webkit-scrollbar {
      width: 5px !important;
      height: 5px !important;
    }

    body::-webkit-scrollbar-track {
      background: #3838387c !important;
    }

    body::-webkit-scrollbar-thumb {
      background-color: #5a76fd !important;
      border: 1px solid #ff020279 !important;
      border-radius: 1px !important;
    }
    .card {
      background-color: #fff;
      border: 1px  #000;
      border-radius: 12px;
      padding: 24px;
      display: inline-block;
      width: 100%;
      box-shadow: 2px 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 1.8rem;
      margin-bottom: 8px;
    }

    p {
      font-size: 1rem;
      color: #666;
      margin-bottom: 16px;
    }

    .document-buttons {
      display: flex;
      gap: 10px;
      margin-top: 12px;
    }

    .document-buttons button {
      background-color: transparent;
      border: 1px solid #000;
      border-radius: 20px;
      padding: 8px 14px;
      cursor: pointer;
      font-size: 1rem;
    }

    .document-buttons button:hover {
      background-color: #f0f0f0;
    }

    .apply-button {
      text-align: right;
      margin-top: 16px;
      float : left;
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 15px;
      padding: 10px 20px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
    }
  </style>
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
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Schemes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="upload-notice.php">
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
              <i class="bi bi-circle"></i><span>All Application </span>
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



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<main class="main" id="main">
<header style="background-color: #4bc6ff; width: 100%; padding: 20px; text-align: center; color: white;">
    <h2>Ahmedabad Municipal Corporation</h2>
  </header>
  <div style="background: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 40px;width: 100%; text-align: center;">
    <h1 style="color: #333;">Create Donation Page</h1>
    <button onclick="handleDonate()" style="background-color: #4bc6ff; color: white; padding: 12px 20px; font-size: 18px; border: none; border-radius: 8px; cursor: pointer; text-transform: uppercase; transition: background 0.3s;"><a href="upload-donation.php">+</a></button>
  </div>
  
<br>
  <h2>List of Schemes</h2>
  <hr>  
    <?php
    // Fetch scheme data
$sql = "SELECT * FROM schemes";
$result = $con->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
        




            echo "<div class='card'>";
            echo "<h1>" . $row['scheme_name'] . "</h1>";
            echo "<p> ". $row['scheme_details'] . "</p>";
            echo "<p>" . $row['eligibility'] . "</p>";
            
           echo "<div class='document-buttons'>";
           echo "<button> ". $row['required_documents'] . "</button>";
           echo "</div>";
        
           echo" </div>";








        }
    } else {
        echo "No schemes found.";
    }

    $con->close();
    ?>








</main>
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