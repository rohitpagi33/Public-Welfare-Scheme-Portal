<?php
// Start session to store details across steps
session_start();
require '../dbcon.php';

$aadhar_details = [];
$scheme_id = $_GET['scheme_id']; // Get scheme ID from URL

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

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch Aadhar number from form
    $aadhar_number = $_POST['aadhar_number'];

    // Query to find user by Aadhar number
    $user_query = "SELECT * FROM aadhar WHERE aadhar_no = '$aadhar_number'";
    $user_result = $con->query($user_query);

    if ($user_result->num_rows > 0) {
        // Fetch details from database
        $user = $user_result->fetch_assoc();
        $aadhar_details = [
            'no' => $user['aadhar_no'],
            'name' => $user['aadhar_name'],
            'address' => $user['aadhar_address'],
            'dob' => $user['aadhar_dob'],
            'phone' => $user['aadhar_phone']
        ];

        // Store Aadhar details in session
        $_SESSION['aadhar_details'] = $aadhar_details;
        $_SESSION['scheme_id'] = $scheme_id; // Store scheme_id in session

        // Redirect to Step 2
        header("Location: step2.php");
        exit();
    } else {
        // If Aadhar not found
        $aadhar_details['error'] = "No user found with this Aadhar number.";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1: Aadhar Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f9f9f9;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .input-field {
            width: 280px;
            padding: 10px 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #333;
        }

        .btn {
            background-color: #000;
            color: #fff;
            padding: 12px 18px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Enter Your Aadhar Number</h1>
        <form method="POST" action="step1.php?scheme_id=<?php echo $scheme_id; ?>">
            <input type="text" id="aadhar_number" placeholder="Aadhar Number..." maxlength="12" pattern="[0-9]{12}" name="aadhar_number" class="input-field" required><br><br>

            <?php if (isset($aadhar_details['error'])): ?>
                <p style="color: red;"><?php echo $aadhar_details['error']; ?></p>
            <?php endif; ?>

            <button type="submit" class="btn">Step 2 →</button>
        </form>
    </div>
</body>

</html>