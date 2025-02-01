<?php
// Start session to retrieve details from previous steps
session_start();
include '../dbcon.php'; // Include database connection

// Your OCR.space API key
$apiKey = "39b262925988957";

// Check if user session has required details
if (!isset($_SESSION['banking_details']) || !isset($_SESSION['aadhar_details'])) {
    header("Location: step2.php?scheme_id=" . $_GET['scheme_id']);
    exit();
}

$scheme_id = $_SESSION['scheme_id']; // Retrieve scheme ID from session

// Fetch required documents from the database
$query = "SELECT required_documents FROM schemes WHERE id = $scheme_id";
$result = mysqli_query($con, $query);
$required_documents = [];

if ($row = mysqli_fetch_assoc($result)) {
    $required_documents = explode(',', $row['required_documents']); // Convert CSV to array
}

// Initialize error and success messages
$error_message = "";
$success_message = "";

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validIncomeCertificate = true;

    // Start processing files and validating
    foreach ($required_documents as $doc_name) {
        $doc_key = strtolower(str_replace([' ', '-'], '_', trim($doc_name))); // Convert name to key format

        // Process income certificate separately for OCR validation
        if (isset($_FILES[$doc_key]) && $_FILES[$doc_key]['error'] == 0) {
            $target_dir = "../uploads/";
            $file_name = basename($_FILES[$doc_key]['name']);
            $target_file = $target_dir . $file_name;

            // Handle the income certificate first
            if ($doc_key == 'income_certificate') {
                // Process OCR for income certificate
                $ocrText = processIncomeCertificateOCR($_FILES[$doc_key]['tmp_name']);
                $isValid = validateIncomeCertificateDate($ocrText);

                if ($isValid) {
                    // If valid, proceed with the upload
                    if (move_uploaded_file($_FILES[$doc_key]['tmp_name'], $target_file)) {
                        $_SESSION['documents'][$doc_key] = $target_file; // Store the file path
                        $success_message = "Income certificate is valid and uploaded.";
                    }
                } else {
                    // If income certificate is invalid, do not upload any document and show error
                    $error_message = "The income certificate is invalid. Please upload a valid document.";
                    $validIncomeCertificate = false;
                    break; // Stop further uploads as we need to re-upload the income certificate
                }
            } else {
                // For other documents, upload them normally only if income certificate is valid
                if ($validIncomeCertificate) {
                    if (move_uploaded_file($_FILES[$doc_key]['tmp_name'], $target_file)) {
                        $_SESSION['documents'][$doc_key] = $target_file;
                    }
                }
            }
        }
    }

    // If income certificate is valid and all other files are uploaded, redirect to Step 4
    if ($validIncomeCertificate && empty($error_message)) {
        header("Location: step4.php?scheme_id=" . $scheme_id);
        exit();
    }
}

// Function to process the income certificate using OCR API (OCR.space)
function processIncomeCertificateOCR($filePath)
{
    // OCR API endpoint
    $url = "https://api.ocr.space/parse/image";

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Prepare the file and API key
    $postData = [
        'apikey' => $GLOBALS['apiKey'],
        'file' => new CURLFile($filePath),
        'language' => 'eng', // English language
        'isOverlayRequired' => 'false',
    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Execute the API call
    $response = curl_exec($ch);

    // Handle errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }

    curl_close($ch);

    // Decode the JSON response
    $result = json_decode($response, true);

    // Extract parsed text from the OCR result
    if (isset($result['ParsedResults'][0]['ParsedText'])) {
        return $result['ParsedResults'][0]['ParsedText'];
    } else {
        return null;
    }
}

// Function to validate the income certificate date
function validateIncomeCertificateDate($ocrText)
{
    // Example: Extract date using regex (dd/mm/yyyy format)
    $datePattern = '/(\d{2})\/(\d{2})\/(\d{4})/'; // Matches dd/mm/yyyy format
    preg_match($datePattern, $ocrText, $matches);

    if ($matches) {
        $extractedDate = $matches[0]; // Extracted date (e.g., "25/12/2024")

        // Perform date validation (you can define your own logic here)
        $currentDate = date('d/m/Y');
        if ($extractedDate <= $currentDate) {
            return true; // Valid date
        }
    }

    return false; // Invalid date
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 3: Upload and Validate Documents</title>
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

        .upload-container {
            text-align: center;
            padding: 20px;
            border: 2px dashed #4bc6ff;
            background-color: #fff;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .upload-container:hover {
            background-color: #fff3e8;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .file-input {
            display: none;
        }

        .custom-button {
            background-color: #4bc6ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .custom-button:hover {
            background-color: #4bc6ff;
        }

        .file-name {
            margin-top: 10px;
            color: #666;
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
    <div class="upload-container">
        <h2>Upload and Validate Documents</h2>

        <!-- Display error or success message -->
        <?php if ($error_message): ?>
            <div style="color: red; font-weight: bold;">
                <?= htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div style="color: green; font-weight: bold;">
                <?= htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>

        <!-- Upload form for multiple documents -->
        <form action="" method="POST" enctype="multipart/form-data">
            <?php foreach ($required_documents as $doc_name): ?>
                <?php
                $input_name = strtolower(str_replace([' ', '-'], '_', trim($doc_name)));
                ?>
                <label for="<?= $input_name; ?>">Upload <?= htmlspecialchars($doc_name); ?>:</label><br>
                <input type="file" id="file-input" class="file-input" name="<?= $input_name; ?>" <?= ($doc_name == 'income certificate') ? 'required' : ''; ?>><br><br>
                <label for="file-input" class="custom-button">Choose File</label>
                <p id="file-name" class="file-name">No file chosen</p>
            <?php endforeach; ?>


            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>

</html>