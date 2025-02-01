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
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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

        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        body::-webkit-scrollbar-track {
            background: #3838387c !important;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #5a76fd !important;
            border: 1px solid #ff020279 !important;
            border-radius: 1px !important;
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
                        <a href="schemes.php">
                            <i class="bi bi-circle"></i><span>All Schemes</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Track Application</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="track-id.php">
                            <i class="bi bi-circle"></i><span>Track By Id</span>
                        </a>
                    </li>
                    <li>
                        <a href="all-form.php">
                            <i class="bi bi-circle"></i><span>Track By Phone number</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

	<div class="container ">
		<?php
		$mobile = $_POST['mobile'];

		if (empty($mobile)) {
			$make = '<div class="alert alert-warning">You must type a word to search!</div>';
		} else {
			$make = '<div class="alert alert-warning">No match found!</div>';
			// Using prepared statement to prevent SQL injection
			$sele = "SELECT * FROM applications WHERE aadhar_phone = ?";

			// Initialize a prepared statement
			$stmt = mysqli_stmt_init($con);

			// Prepare the SQL statement
			if (mysqli_stmt_prepare($stmt, $sele)) {
				// Bind the parameter to the prepared statement as a string
				mysqli_stmt_bind_param($stmt, "s", $mobile);

				// Execute the prepared statement
				mysqli_stmt_execute($stmt);

				// Get the result set from the prepared statement
				$result = mysqli_stmt_get_result($stmt);

				echo '<h2>Track Your Application - Ahemedabad Municipal Cor.</h2>';

				if (mysqli_num_rows($result) > 0) {
					echo '<div class="table-responsive">';
					echo '<table class="table table-bordered">';
					echo '<thead class="thead-dark">';
					echo '<tr>';
					echo '<th>ID</th>';
					echo '<th>Full Name</th>';
					echo '<th>Mobile</th>';
					echo '<th>Remark</th>';
					echo '<th>Status</th>';
                    echo '<th>Check Application</th>';
					echo '</tr>';
					echo '</thead>';
					echo '<tbody>';

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr>';
						echo '<td>' . $row['application_id'] . '</td>';
						echo '<td>' . $row['aadhar_name'] . '</td>';
						echo '<td>' . $row['aadhar_phone'] . '</td>';
						echo '<td>' . $row['remark'] . '</td>';
						echo '<td>' . $row['status'] . '</td>';
                        echo  '<td><a href="view-application.php?application_id=' . $row['application_id'] . '" class="btn" >View Details</a></td>';
                        
						echo '</tr>';
					}

					echo '</tbody>';
					echo '</table>';
					echo '</div>';
				} else {
					echo $make;
				}

				// Close the prepared statement
				mysqli_stmt_close($stmt);
			} else {
				echo "Error in preparing the statement.";
			}

			mysqli_close($con);
		}
		?>

	</div>
	</main>
	<!-- Include Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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