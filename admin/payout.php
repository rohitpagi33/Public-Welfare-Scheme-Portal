<?php
// Razorpay API Credentials
$api_key = "your_api_key";  // Replace with your Razorpay Key ID
$api_secret = "your_api_key_secret"; // Replace with your Razorpay Key Secret

// Get User Input from GET request (you can replace these with actual values passed through URL parameters)
$user_name = isset($_GET['user_name']) ? $_GET['user_name'] : 'rohit pagi';
$user_email = isset($_GET['user_email']) ? $_GET['user_email'] : 'rohit@gmail.com';
$user_phone = isset($_GET['user_phone']) ? $_GET['user_phone'] : '0000000000';
$bank_account_number = isset($_GET['bank_account_number']) ? $_GET['bank_account_number'] : "if not from get method then default number";
$ifsc_code = isset($_GET['ifsc_code']) ? $_GET['ifsc_code'] : 'default ifsc';

// Step 1: Create Contact
$contact_data = [
    "name" => $user_name,
    "email" => $user_email,
    "contact" => $user_phone,
    "type" => "employee", // Can be "employee", "vendor", or "customer"
    "reference_id" => "user_123",  // You can set this to a dynamic value if needed
    "notes" => ["purpose" => "Scholarship Payment"]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/contacts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contact_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . base64_encode("$api_key:$api_secret"),
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

$contact_result = json_decode($response, true);
if (isset($contact_result['error'])) {
    die("Error Creating Contact: " . $contact_result['error']['description']);
}

$contact_id = $contact_result['id'];
echo "Contact Created Successfully! Contact ID: $contact_id<br>";

curl_close($ch);

// Step 2: Create Fund Account
$fund_account_data = [
    "contact_id" => $contact_id,
    "account_type" => "bank_account",
    "bank_account" => [
        "name" => $user_name,
        "account_number" => $bank_account_number,
        "ifsc" => $ifsc_code
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/fund_accounts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fund_account_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . base64_encode("$api_key:$api_secret"),
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

$fund_account_result = json_decode($response, true);
if (isset($fund_account_result['error'])) {
    die("Error Creating Fund Account: " . $fund_account_result['error']['description']);
}

$fund_account_id = $fund_account_result['id'];
echo "Fund Account Created Successfully! Fund Account ID: $fund_account_id<br>";

curl_close($ch);

// Step 3: Make Payout
$payout_data = [
    "account_number" => "1425565566561321", // Replace with Razorpay virtual account number
    "fund_account_id" => $fund_account_id,
    "amount" => 1000, // Amount in paise (e.g., ₹100 = 10000 paise)
    "currency" => "INR",
    "mode" => "IMPS",
    "purpose" => "payout",
    "queue_if_low_balance" => true
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/payouts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payout_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . base64_encode("$api_key:$api_secret"),
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

$payout_result = json_decode($response, true);
if (isset($payout_result['error'])) {
    die("Error Making Payout: " . $payout_result['error']['description']);
    
}
echo "Payout Successful! Payout ID: " . $payout_result['id'];
// header(Location : 'complated-payout.php');
echo ' <a href="complated-payout.php"> Go to Dashbord </a>';

curl_close($ch);
?>
