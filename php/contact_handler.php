<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize inputs
$full_name = trim($conn->real_escape_string($_POST['full_name'] ?? ''));
$email     = trim($conn->real_escape_string($_POST['email'] ?? ''));
$phone     = trim($conn->real_escape_string($_POST['phone'] ?? ''));
$service   = trim($conn->real_escape_string($_POST['service'] ?? ''));
$message   = trim($conn->real_escape_string($_POST['message'] ?? ''));

// Validate
if (empty($full_name) || empty($email) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

// Insert into database
$sql = "INSERT INTO contact_messages (full_name, email, phone, service, message)
        VALUES ('$full_name', '$email', '$phone', '$service', '$message')";

if ($conn->query($sql)) {
    // Send email notification
    $to      = 'smaxtech18@gmail.com';
    $subject = "New Contact Message - McClean Elite";
    
    // Improved headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "From: McClean Elite <noreply@mccleanelite.com>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $body    = "You have received a new message from your website contact form.\n\n";
    $body   .= "--- DETAILS ---\n";
    $body   .= "Name: $full_name\n";
    $body   .= "Email: $email\n";
    $body   .= "Phone: $phone\n";
    $body   .= "Service: $service\n\n";
    $body   .= "--- MESSAGE ---\n";
    $body   .= "$message\n";

    // Attempt to send
    $mail_sent = mail($to, $subject, $body, $headers);

    echo json_encode([
        'success' => true, 
        'message' => 'Thank you! Your message has been sent. We will get back to you shortly.',
        'debug_mail' => $mail_sent ? 'Sent' : 'Failed (Check server mail config)'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}

$conn->close();
?>
