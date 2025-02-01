<?php
// Start session to retrieve details from previous step
session_start();

if (!isset($_SESSION['aadhar_details'])) {
    header("Location: step1.php?scheme_id=" . $_GET['scheme_id']);
    exit();
}

$scheme_id = $_SESSION['scheme_id']; // Retrieve scheme ID from session

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture banking details
    $_SESSION['banking_details'] = [
        'account_number' => $_POST['account_number'],
        'ifsc_code' => $_POST['ifsc_code']
    ];

    // Redirect to Step 3
    header("Location: step3.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2: Banking Details</title>
    <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f9f9f9;
    }

    .form-container {
      text-align: center;
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      display: block;
      font-weight: bold;
      margin: 15px 0 8px;
      color: #444;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    button {
      background-color: #000;
      color: #fff;
      padding: 14px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
      width: 100%;
      display: block;
    }

    button:hover {
      background-color: #333;
    }

  </style>

</head>
<body>


    
    <div class="form-container">

    <h2>Enter Banking Details</h2>
    <form method="POST" action="step2.php?scheme_id=<?php echo $scheme_id; ?>">
        <label for="account_number">Account Number:</label><br>
        <input type="text" id="account_number" name="account_number" placeholder="Account Number..." required><br><br>

        <h2>Enter Your IFSC Number</h2>
        <input type="text" id="ifsc_code" placeholder="IFSC Number..." name="ifsc_code" required><br><br>

        <button>Step 3 →</button>
    </form>
    
  </div>
</body>
</html>
