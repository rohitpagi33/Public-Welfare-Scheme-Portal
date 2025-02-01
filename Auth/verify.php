<?php
session_start();

if (!isset($_SESSION['otp'])) {
    header('Location: login.php');
}

if (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] > 120) {
    unset($_SESSION['otp']);
    unset($_SESSION['timestamp']);
    header("Location: login.php");
    exit();
}

function maskPhoneNumber($phone)
{
    $phone = str_replace(' ', '', $phone);

    $last4 = substr($phone, -4);
    $maskedLength = strlen($phone) - 4;
    if ($maskedLength < 0) {
        $maskedLength = 0;
    }
    // Mask the number
    $masked = str_repeat('*', $maskedLength);
    return $masked . substr($phone, -4);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_otp = $_POST['otp'];
    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $user_otp) {
        echo "<script>alert('OTP verified successfully!');</script>";
        unset($_SESSION['otp']);
        header("Location: ../citizen/dashboard.php");
        
    } else {
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f3f3;
            font-family: "Poppins", sans-serif;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            text-align: center;
        }

        .title h3 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .title p {
            font-size: 14px;
            color: #118a44;
            margin-bottom: 20px;
        }

        .otp-input-fields {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            border: 1px solid #2f8f1f;
            border-radius: 4px;
            outline: none;

            &::-webkit-outer-spin-button,
            &::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            &:focus {
                border-width: 2px;
                border-color: darken(#2f8f1f, 5%);
                font-size: 20px;
            }
        }

        .contact-info {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        .contact-info span {
            font-weight: bold;
            color: #118a44;
        }

        .result {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }

        .result._ok {
            color: green;
        }

        .result._notok {
            color: red;
        }

        .timer {
            font-size: 14px;
            color: red;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h3>OTP VERIFICATION</h3>
            <p class="msg">An OTP has been sent to: <?php echo maskPhoneNumber($_SESSION['phone_number']); ?></p>
        </div>
        <div class="contact-info">
            <p>Please enter OTP to verify</p>
        </div>

        <form method="POST" id="otp-form">
            <div class="otp-input-fields">
                <input type="number" id="otp1" maxlength="1" class="otp__digit">
                <input type="number" id="otp2" maxlength="1" class="otp__digit">
                <input type="number" id="otp3" maxlength="1" class="otp__digit">
                <input type="number" id="otp4" maxlength="1" class="otp__digit">
                <input type="number" id="otp5" maxlength="1" class="otp__digit">
                <input type="number" id="otp6" maxlength="1" class="otp__digit">
            </div>

            <input type="hidden" name="otp" id="otp-input">
        </form>

        <div class="result" id="otp-result"></div>
        <div class="timer" id="timer"></div>
    </div>

    <script>
        var otpInputs = document.querySelectorAll(".otp__digit");
        var otpField = document.getElementById("otp-input");

        otpInputs.forEach(input => {
            input.addEventListener("keyup", handleNextInput);
        });

        function handleNextInput(event) {
            let current = event.target;
            let value = event.key;

            if (event.keyCode === 8 && current.previousElementSibling) {
                current.previousElementSibling.focus();
            }

            if (!isNaN(value) && value >= 0 && value <= 9) {
                current.value = value;
                if (current.nextElementSibling) {
                    current.nextElementSibling.focus();
                }
            }

            let otp = "";
            otpInputs.forEach(input => {
                otp += input.value;
            });

            otpField.value = otp;

            if (otp.length === 6) {
                submitOTP(otp);
            }
        }

        function submitOTP(otp) {
            document.getElementById("otp-form").submit();
        }

        // Countdown timer logic
        var timeLeft = 120; // 2 minutes in seconds
        var timerElement = document.getElementById("timer");

        function updateTimer() {
            var minutes = Math.floor(timeLeft / 60);
            var seconds = timeLeft % 60;
            timerElement.innerText = `Time left: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerElement.innerText = "OTP Expired!";
                document.getElementById("otp-form").reset();
                alert("OTP has expired, please request a new one.");
                location.reload(); // Reload to request a new OTP
            } else {
                timeLeft--;
            }
        }

        var timerInterval = setInterval(updateTimer, 1000);
    </script>
</body>

</html>
