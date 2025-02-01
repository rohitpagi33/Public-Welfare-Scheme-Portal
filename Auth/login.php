<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Twilio credentials
    $account_sid = 'twillio_account_sid';
    $auth_token = 'twillio_auth_token';
    $twilio_number = 'twillio_number';

    // User input
    $phone_number = $_POST['phone_number'];

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
                'body' => "Your OTP code is: $otp",
            ]
        );
        
        $_SESSION['otp'] = $otp;
        $_SESSION['phone_number'] = $phone_number;

        echo "OTP sent successfully!";
        header('Location: verify.php');

        exit();
    } catch (Exception $e) {
        echo "Failed to send OTP: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send OTP</title>
    <style>
        /* Resetting default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Form styling */
form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

/* Label styling */
label {
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

/* Input field styling */
input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px;
    border: 1px solid #ccc;
    text-align: center;
    border-radius: 4px;
    font-size: 18px;
    outline: none;
    border: 1px solid #2f8f1f;
    &:focus{
      border-width: 2px;
      border-color: darken(#2f8f1f, 5%);
      font-size: 18px;
    }
}

/* Button styling */
button {
    width: 50%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin: 0 auto;  /* Centers the button horizontally */
    display: block;
}

button:hover {
    background-color: #45a049;
}

button:active {
    background-color: #3e8e41;
}

    </style>
</head>
<body>
    <form method="POST">
        <label for="phone_number">Enter Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>

