<?php
header('Content-Type: application/json');
require_once 'db.php';

$sql    = "SELECT customer_name, rating, review, service FROM testimonials WHERE is_active = 1 ORDER BY id DESC LIMIT 6";
$result = $conn->query($sql);

$testimonials = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $testimonials[] = $row;
    }
}

echo json_encode(['success' => true, 'data' => $testimonials]);
$conn->close();
?>
