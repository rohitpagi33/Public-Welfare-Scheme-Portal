<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheme Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        .tabs {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            flex-wrap: wrap;
            background: #ff5733;
            padding: 10px 0;
            position: relative;
        }
        .tabs::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: #c70039;
        }
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            color: white;
            position: relative;
            transition: color 0.3s;
        }
        .tab:hover {
            color: #fffc33;
        }
        .tab::after {
            content: '';
            position: absolute;
            width: 0;
            height: 4px;
            background: #fffc33;
            bottom: -6px;
            left: 50%;
            transition: width 0.3s, left 0.3s;
        }
        .tab:hover::after {
            width: 100%;
            left: 0;
        }
        .content {
            display: none;
            text-align: left;
            padding: 20px;
            border-bottom: 2px solid #ddd;
        }
        .active {
            display: block;
        }
        @media (max-width: 768px) {
            .tabs {
                flex-direction: column;
                align-items: center;
            }
            .tab {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="tabs">
        <div class="tab" onmouseover="showContent('details')">Scheme Details</div>
        <div class="tab" onmouseover="showContent('benefits')">Benefits</div>
        <div class="tab" onmouseover="showContent('documents')">Required Documents</div>
        <div class="tab" onmouseover="showContent('eligibility')">Eligibility Criteria</div>
        <div class="tab" onmouseover="showContent('application')">Application Process</div>
    </div>
    <div class="container">
        <div id="details" class="content active">
            <h3>Scheme Details</h3>
            <p>This scheme provides financial assistance to eligible citizens. It aims to support low-income families by providing subsidies and financial aid for essential services.</p>
        </div>
        <div id="benefits" class="content">
            <h3>Benefits</h3>
            <p>The scheme offers monetary support, free healthcare benefits, educational scholarships, and low-interest loans to eligible applicants.</p>
        </div>
        <div id="documents" class="content">
            <h3>Required Documents</h3>
            <ul>
                <li>Aadhaar Card</li>
                <li>Income Certificate</li>
                <li>Residence Proof</li>
                <li>Bank Account Details</li>
                <li>Passport-sized Photographs</li>
            </ul>
        </div>
        <div id="eligibility" class="content">
            <h3>Eligibility Criteria</h3>
            <p>Applicants must be residents of the country, have a family income below the prescribed limit, and belong to the targeted beneficiary group.</p>
        </div>
        <div id="application" class="content">
            <h3>Application Process</h3>
            <p>Eligible candidates can apply online through the official portal, submit required documents, and track their application status using their registered credentials.</p>
        </div>
    </div>
    <script>
        function showContent(id) {
            document.querySelectorAll('.content').forEach(section => {
                section.classList.remove('active');
            });
            document.getElementById(id).classList.add('active');
        }
    </script>
</body>
</html>
