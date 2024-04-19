<?php 
session_start();

// Function to generate a random CSRF token
function generateCSRFToken() {
    return bin2hex(random_bytes(32));
}

// Function to check if CSRF token is valid
function isCSRFTokenValid($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Set CSRF token for the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generateCSRFToken();
}

// Check CSRF token on form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submittedToken = $_POST['csrf_token'];
    if (!isCSRFTokenValid($submittedToken)) {
        // Invalid CSRF token, handle the error or redirect
        die("CSRF token validation failed.");
    }

    // CSRF token is valid, process the form data
    // Your form processing code here
}