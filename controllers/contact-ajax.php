<?php
// controllers/contact-ajax.php
require_once __DIR__ . '/../models/Contact.php';

// Suppress all output except JSON
ob_start();
header('Content-Type: application/json');

// Disable error display to prevent HTML output
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL); // Still log errors to file

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    ob_end_flush();
    exit;
}

// Honeypot check (anti-spam)
if (!empty($_POST['website'])) {
    echo json_encode(['success' => false, 'message' => 'Spam detected']);
    ob_end_flush();
    exit;
}

// Backend validation
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    ob_end_flush();
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format']);
    ob_end_flush();
    exit;
}

if (strlen($name) > 100 || strlen($email) > 100) {
    echo json_encode(['success' => false, 'message' => 'Name or email exceeds maximum length']);
    ob_end_flush();
    exit;
}

$contactModel = new Contact();
try {
    $contactModel->saveContact($name, $email, $message);
;
$to = $email; // Send confirmation to the user
$subject = "Thank You For Contacting Us";
$body = "Dear $name,\n\nWe've received your message and will get back to you shortly.\n\nYour Message:\n$message";
$headers = "From: no-reply@susilbhatta00@gmail.com" . "\r\n"; // Replace with your domain email
$headers .= "Reply-To: susilbhatta00@gmail.com" . "\r\n"; // Replace with your support email
$headers .= "Content-Type: text/plain; charset=UTF-8";

$mailSent = mail($to, $subject, $body, $headers);
        echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been sent.']);
} catch (Exception $e) {
    error_log("Contact form error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Server error: ' . $e->getMessage()]);
}

ob_end_flush();
exit;