<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Sanitize inputs
$full_name   = trim($conn->real_escape_string($_POST['full_name'] ?? ''));
$email       = trim($conn->real_escape_string($_POST['email'] ?? ''));
$phone       = trim($conn->real_escape_string($_POST['phone'] ?? ''));
$address     = trim($conn->real_escape_string($_POST['address'] ?? ''));
$service     = trim($conn->real_escape_string($_POST['service'] ?? ''));
$pickup_date = trim($conn->real_escape_string($_POST['pickup_date'] ?? ''));
$pickup_time = trim($conn->real_escape_string($_POST['pickup_time'] ?? ''));
$notes       = trim($conn->real_escape_string($_POST['notes'] ?? ''));

// Validate required
if (empty($full_name) || empty($email) || empty($phone) || empty($address) || empty($service) || empty($pickup_date)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

// Validate date is not in the past
$today = date('Y-m-d');
if ($pickup_date < $today) {
    echo json_encode(['success' => false, 'message' => 'Please select a future pickup date.']);
    exit;
}

// Insert booking
$sql = "INSERT INTO bookings (full_name, email, phone, address, service, pickup_date, pickup_time, notes)
        VALUES ('$full_name', '$email', '$phone', '$address', '$service', '$pickup_date', '$pickup_time', '$notes')";

if ($conn->query($sql)) {
    $booking_id = $conn->insert_id;

    // Send notification email
    $to      = 'smaxtech18@gmail.com';
    $subject = "New Pickup Booking #$booking_id - McClean Elite";
    
    // Improved headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/plain;charset=UTF-8" . "\r\n";
    $headers .= "From: McClean Elite <noreply@mccleanelite.com>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    $body    = "A new pickup request has been scheduled.\n\n";
    $body   .= "--- BOOKING INFO ---\n";
    $body   .= "Booking ID: #$booking_id\n";
    $body   .= "Customer: $full_name\n";
    $body   .= "Email: $email\n";
    $body   .= "Phone: $phone\n";
    $body   .= "Address: $address\n";
    $body   .= "Service: $service\n";
    $body   .= "Pickup Date: $pickup_date\n";
    $body   .= "Pickup Time: $pickup_time\n\n";
    $body   .= "--- NOTES ---\n";
    $body   .= !empty($notes) ? $notes : "No special instructions provided.";

    $mail_sent = mail($to, $subject, $body, $headers);

    echo json_encode([
        'success'    => true,
        'message'    => "Booking confirmed! Your pickup has been scheduled for $pickup_date. We will contact you to confirm.",
        'booking_id' => $booking_id,
        'debug_mail' => $mail_sent ? 'Sent' : 'Failed (Check server mail config)'
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Something went wrong. Please try again.']);
}

$conn->close();
?>
