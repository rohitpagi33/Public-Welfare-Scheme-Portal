<?php
// Start the session
session_start();
require '../dbcon.php';


    $sql = "SELECT * FROM applications WHERE transaction_status = 'completed'";


$result = $con->query($sql);
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

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Filter dropdown styling */
        .filter-container {
            margin-bottom: 20px;
            text-align: center;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .applications-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .application-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        .application-card h3 {
            margin: 10px 0;
            font-size: 18px;
        }

        .application-card p {
            margin: 10px 0;
            font-size: 14px;
            color: #555;
        }

        .application-card .btn {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .application-card .btn:hover {
            background-color: #45a049;
        }

        .application-card .status {
            font-weight: bold;
            color: #fff;
            padding: 5px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .status.pending {
            background-color: #ff9800;
        }

        .status.approved {
            background-color: #4CAF50;
        }

        .status.rejected {
            background-color: #f44336;
        }
        .main{
            background-color: white;
        }
        /* table styling alternate rows color */
        tr{
            margin: auto;
            height: 50px;
            text-align: center;
        }
       
        .rows:nth-child(even){
            background-color:rgba(220, 220, 220, 0.49);
        }
        .btn{
            border-color: #5a76fd;
        }
        .btn:hover{
            background-color: #389bd9;
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


                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">

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

    <main class="main" id="main">
        <h2>Applications List</h2>


        <!-- Display Applications in Grid -->
        <div class="applications-container">
        <?php
    if ($result==true) {
        echo '<table class="table" >
                <thead>
                    <tr>
                        <th>Application ID</th>
                        <th>Scheme Name</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody >';
        while ($application = $result->fetch_assoc()) {
            echo '<tr class="rows">';
            echo    '<td>' . $application['application_id'] . '</td>';
            echo    '<td>' . $application['scheme_id'] . '</td>';
            echo    '<td>' . ucfirst($application['status']) . '</td>';
            echo    '<td><a href="view-application.php?application_id=' . $application['application_id'] . '" class="btn" >View Details</a></td>';
            echo '</tr>';
        }
        
        echo   '</tbody>
              </table>';
    } else {
        echo '<p>No applications found.</p>';
    }
    ?>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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