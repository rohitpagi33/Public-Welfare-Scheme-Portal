<?php
// Start the session to get the data
session_start();
require '../dbcon.php';

// Get application ID from the URL
$application_id = $_GET['application_id'];

// Fetch the application data from the database
$sql = "SELECT * FROM applications WHERE application_id = '$application_id'";
$result = $con->query($sql);

// Check if application exists
if ($result->num_rows > 0) {
    $application = $result->fetch_assoc();
} else {
    echo "No application found with ID: $application_id";
    exit();
}

// Fetch required documents for the scheme
$scheme_id = $application['scheme_id'];
$scheme_sql = "SELECT required_documents FROM schemes WHERE id = '$scheme_id'";
$scheme_result = $con->query($scheme_sql);

if ($scheme_result->num_rows > 0) {
    $scheme = $scheme_result->fetch_assoc();
    $required_documents = $scheme['required_documents'];
    $documents_array = explode(",", $required_documents);
} else {
    echo "No scheme found with ID: $scheme_id";
    exit();
}

// Handle form submission
if (isset($_POST['updatebtn'])) {
    $status = mysqli_real_escape_string($con, $_POST['fstatus']);
    $remark = mysqli_real_escape_string($con, $_POST['remark']);

    $update_query = "UPDATE applications SET status='$status', remark='$remark' WHERE application_id='$application_id'";
    if (mysqli_query($con, $update_query)) {
        echo "<script>alert('Application status updated successfully.'); window.location.href='all-form.php';</script>";
        
        exit();
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h2>View Application - ID: <?php echo $application['application_id']; ?></h2>

    <table>
        <tr>
            <th>Scheme Name</th>
            <td><?php echo $application['scheme_name']; ?></td>
        </tr>
        <tr>
            <th>Aadhar Number</th>
            <td><?php echo $application['aadhar_number']; ?></td>
        </tr>
        <tr>
            <th>Aadhar Name</th>
            <td><?php echo $application['aadhar_name']; ?></td>
        </tr>
        <tr>
            <th>Aadhar Address</th>
            <td><?php echo $application['aadhar_address']; ?></td>
        </tr>
        <tr>
            <th>Aadhar DOB</th>
            <td><?php echo $application['aadhar_dob']; ?></td>
        </tr>
        <tr>
            <th>Aadhar Phone</th>
            <td><?php echo $application['aadhar_phone']; ?></td>
        </tr>
        <tr>
            <th>Account Number</th>
            <td><?php echo $application['account_number']; ?></td>
        </tr>
        <tr>
            <th>IFSC Code</th>
            <td><?php echo $application['ifsc_code']; ?></td>
        </tr>
        <tr>
            <th>Required Documents</th>
            <td>
                <?php
                foreach ($documents_array as $doc_name) {
                    $doc_field = strtolower(str_replace(" ", "_", trim($doc_name))); 

                    if (isset($application[$doc_field]) && $application[$doc_field]) {
                        $document_file = $application[$doc_field]; 
                        echo '<strong>' . htmlspecialchars($doc_name) . ':</strong> ';
                        echo '<a href="../uploads/' . $document_file . '" target="_blank">' . basename($document_file) . '</a><br>';
                    } else {
                        echo '<strong>' . htmlspecialchars($doc_name) . ':</strong> Document not uploaded.<br>';
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?php echo $application['status']; ?></td>
        </tr>
        <tr>
            <th>Created At</th>
            <td><?php echo $application['created_at']; ?></td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td><?php echo $application['updated_at']; ?></td>
        </tr>
    </table>

    <!-- Update Status Form -->
    <form action="" method="POST">
        <table class="table table-bordered table-hover data-tables">
            <tr>
                <th>Remark :</th>
                <td>
                    <textarea name="remark" class="form-control wd-450"><?php echo htmlspecialchars($application['remark']); ?></textarea>
                </td>
            </tr>

            <tr>
                <th>Status :</th>
                <td>
                    <select id="fstatus" name="fstatus" class="form-control wd-450">
                        <option value="Pending" <?php if ($application['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                        <option value="Approved" <?php if ($application['status'] == 'Approved') echo 'selected'; ?>>Approved</option>
                        <option value="Cancelled" <?php if ($application['status'] == 'Cancelled') echo 'selected'; ?>>Cancelled</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
    </form>
<br>
    <!-- Back Button -->
    <a href="all-form.php" class="btn">Back to Applications List</a>

</body>

</html>

<?php
// Close the database connection
$con->close();
?>
