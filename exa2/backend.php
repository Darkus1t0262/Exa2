<?php
header('Content-Type: application/json');

// Get the message from the request
$data = json_decode(file_get_contents('php://input'), true);
$message = $data['message'] ?? '';

// Simple response logic
$response = "You said: " . htmlspecialchars($message);

// Return the response
echo json_encode(['reply' => $response]);
?>
