<?php
// Database conection
session_start();
require '../dbcon.php';

// Get scheme ID from the URL
$scheme_id = $_GET['scheme_id'];

// Fetch scheme data based on the scheme ID
$sql = "SELECT * FROM schemes WHERE id = '$scheme_id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $scheme = $result->fetch_assoc();
    
    // Store scheme name in session
    $_SESSION['scheme_name'] = $scheme['scheme_name'];
} else {
    echo "Invalid Scheme ID.";
    exit();
}

// Initialize phone number variable
$phone_number = "";

// If Aadhar number is provided via the form, search for it
if (isset($_POST['aadhar_number'])) {
    $aadhar_number = $_POST['aadhar_number'];
    
    // Query to find user by Aadhar number
    $user_query = "SELECT aadhar_phone FROM aadhar WHERE aadhar_no = '$aadhar_number'";
    $user_result = $con->query($user_query);

    if ($user_result->num_rows > 0) {
        // Aadhar number found, fetch the phone number
        $user = $user_result->fetch_assoc();
        $phone_number = $user['aadhar_phone'];
    } else {
        // If Aadhar number not found
        $phone_number = "No user found with this Aadhar number.";
    }
}

// Close the conection
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Scheme</title>
</head>
<body>
    <h2>Apply for Scheme: <?php echo $scheme['scheme_name']; ?></h2>
    
    <p><strong>Scheme Details:</strong> <?php echo $scheme['scheme_details']; ?></p>
    <p><strong>Eligibility:</strong> <?php echo $scheme['eligibility']; ?></p>
    <p><strong>Required Documents:</strong> <?php echo $scheme['required_documents']; ?></p>
    
    <h3>Application Form</h3>
    <form method="POST" action="step1.php?scheme_id=<?php echo $scheme['id']; ?>">
        <input type="hidden" name="scheme_id" value="<?php echo $scheme['id']; ?>">
        
        <!-- Aadhar Number Field -->
        <label for="aadhar_number">Enter Aadhar Number:</label><br>
        <textarea id="aadhar_number" name="aadhar_number" rows="4" cols="50" required><?php echo isset($_POST['aadhar_number']) ? $_POST['aadhar_number'] : ''; ?></textarea><br><br>

        <!-- Display phone number if found -->
        <?php if ($phone_number != ""): ?>
            <p><strong>Phone Number:</strong> <?php echo $phone_number; ?></p>
        <?php endif; ?>

        <!-- Submit Button -->
        <input type="submit" value="Submit Application">
    </form>
</body>
</html>
