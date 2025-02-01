# Public Welfare Scheme Portal - Indus Hackathon 2025

## Overview
The **Public Welfare Scheme Portal** is designed to streamline and enhance the distribution of government benefits to citizens. This platform ensures secure authentication, seamless document verification, and real-time updates, making welfare distribution more transparent, efficient, and user-friendly. By leveraging automation and secure transactions, the system minimizes fraud and ensures that assistance reaches the right beneficiaries.

## Key Features

### 1. **Direct Benefit Transfer (DBT)**
   - Approved applications trigger direct fund transfers to citizens' bank accounts, ensuring fast and hassle-free disbursement.

### 2. **Automated Document Verification Using OCR**
   - Citizens upload necessary documents, which are processed using Optical Character Recognition (OCR) to extract and validate key details automatically.

### 3. **Aadhar-Based Authentication with OTP Verification**
   - Users authenticate via their Aadhar number.
   - Secure OTP verification ensures safe access to the portal.

### 4. **SMS & Real-Time Notifications**
   - Citizens receive SMS updates about their application status using Twilio.
   - Admins can send alerts about new schemes and important announcements.
   - Real-time notifications within the platform keep users informed of their application progress.

### 5. **Dynamic Welfare Scheme Management**
   - Admins can create, manage, and modify welfare schemes dynamically.
   - Eligibility criteria are automatically determined based on uploaded documents.

### 6. **Secure & Controlled Document Upload**
   - Citizens upload only the required documents as specified by the admin.
   - Strong security measures ensure privacy and protect sensitive user information.

## Technology Stack
- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP, MySQL
- **Authentication:** Aadhar-based OTP Verification
- **OCR Processing:** Tesseract OCR (or similar technology)
- **Notifications:** Twilio API (SMS), Web Push Notifications
- **Payment Gateway:** Razorpay (or equivalent secure payment system)

## Installation & Setup Guide

### 1. Clone the Repository:
```bash
   git clone https://github.com/Prince61141/Public-Welfare-Scheme-Portal
   cd Public-Welfare-Scheme-Portal
```

### 2. Configure Environment Variables:
   - Create a `.env` file in the backend directory.
   - Set up credentials for the database, Twilio API, and payment gateway.

### 3. Set Up the Database:
   - Import the provided SQL file into MySQL to initialize the system.

### 4. Run the Application:
   - Start a local PHP server:
```bash
   php -S localhost:8000
```
   - Open `index.html` in a browser to access the frontend.

## Future Enhancements
- **AI-Based Eligibility Checking** – Automate scheme eligibility verification using AI.
- **Multi-Language Support** – Expand accessibility with multiple language options.
- **Blockchain Integration** – Ensure tamper-proof document storage and verification.

## Contributors
- **Rohit Pagi**
- **Prince Ghoda**
- **Harshil Solanki**
- **Javal Patel**
- **Nisrag Modi**

---
This project was developed as part of **Indus Hackathon 2025**, with the goal of leveraging technology to make public welfare distribution more transparent, efficient, and secure.

