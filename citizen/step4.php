<?php
// Start session
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

session_start();
require '../dbcon.php'; // Include database connection

// Check if scheme_id is set
if (!isset($_GET['scheme_id'])) {
    die("Scheme ID is missing.");
}

$scheme_id = $_GET['scheme_id'];

// Ensure required session data is available
if (!isset($_SESSION['aadhar_details']) || !isset($_SESSION['banking_details']) || !isset($_SESSION['documents'])) {
    die("Session data missing. Please complete all steps before final submission.");
}

$aadhar_details = $_SESSION['aadhar_details'];
$banking_details = $_SESSION['banking_details'];
$scheme_name = $_SESSION['scheme_name'];
$documents = $_SESSION['documents']; // Get documents from session

// Fetch required documents for this scheme
$query = "SELECT required_documents FROM schemes WHERE id = '$scheme_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$required_documents = explode(',', $row['required_documents']); // Convert CSV to array

// Prepare data for the database
$document_data = [];

// Loop through the documents and prepare for insertion
foreach ($required_documents as $doc_name) {
    $doc_key = strtolower(str_replace([' ', '-'], '_', trim($doc_name))); // Convert name to key format

    // Check if the document is uploaded and exists in the session
    if (isset($documents[$doc_key])) {
        $document_data[$doc_key] = mysqli_real_escape_string($con, $documents[$doc_key]); // Escape the file path for DB
    } else {
        $document_data[$doc_key] = NULL; // If no document uploaded, store NULL
    }
}

// Prepare column names and values for SQL query dynamically
$columns = implode(", ", array_keys($document_data));
$values = "'" . implode("', '", array_values($document_data)) . "'";

// Insert application data along with document filenames
$sql = "INSERT INTO applications (scheme_id,scheme_name, aadhar_number, aadhar_name, aadhar_address, aadhar_dob, aadhar_phone, account_number, ifsc_code, status, $columns) 
        VALUES ('$scheme_id','$scheme_name', '{$aadhar_details['no']}', '{$aadhar_details['name']}', '{$aadhar_details['address']}', '{$aadhar_details['dob']}', '{$aadhar_details['phone']}', '{$banking_details['account_number']}', '{$banking_details['ifsc_code']}', 'pending', $values)";

// Debugging SQL query (Optional)
// echo $sql; // Uncomment to view the query and check for issues

if (mysqli_query($con, $sql)) {
    echo "Application submitted successfully!";

    $account_sid = 'twillio_account_sid';
    $auth_token = 'twilio_auth_token';
    $twilio_number = 'twilio_number';

    // User input
    $phone_number = 'number to send sms';

    if (!preg_match('/^\+91/', $phone_number)) {
        $phone_number = '+91' . $phone_number;
    }

    $otp = random_int(100000, 999999);

    $client = new Client($account_sid, $auth_token);

    try {
        // Send SMS
        $message = $client->messages->create(
            $phone_number, // User's phone number
            [
                'from' => $twilio_number,
                'body' => "Dear user, your application track here: http://localhost/Welfare-scheme/citizen/track-mo.php for the '$scheme_name' scheme has been successfully submitted. We will notify you once it's processed. Thank you!",
            ]
        );
        header('Location: track-mo.php');
        exit();
    } catch (Exception $e) {
        echo "Failed to send sms: " . $e->getMessage();
    }
    header('Location: track-mo.php');
    // Clear session data after submission
    session_unset();
    session_destroy();
} else {
    echo "Error: " . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>