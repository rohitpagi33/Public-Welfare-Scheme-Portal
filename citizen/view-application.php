<?php
// Start the session to get the data
session_start();
require '../dbcon.php';

// Get application ID from the URL
$application_id = $_GET['application_id'];

// Fetch the application data from the database based on application_id
$sql = "SELECT * FROM applications WHERE application_id = '$application_id'";
$result = $con->query($sql);

// Check if application exists
if ($result->num_rows > 0) {
    // Fetch the application data
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Application</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            display: block;
            width: fit-content;
            margin: 20px auto 0;
            padding: 12px 20px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #27ae60;
        }
        a {
            color: #2980b9;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
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
            <th>Remarks</th>
            <td><?php echo $application['remark']; ?></td>
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
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</div>
</body>
</html>
<?php
// Close the database connection
$con->close();
?>
