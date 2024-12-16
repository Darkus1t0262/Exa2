<?php
// Simula una cola de mensajes en un archivo de texto
$queueFile = 'message_queue.txt';

// Maneja la solicitud entrante
$requestPayload = file_get_contents('php://input');
$data = json_decode($requestPayload, true);

// Verifica que el mensaje sea válido
if (isset($data['message'])) {
    $message = $data['message'];
    // Guarda el mensaje en la cola
    file_put_contents($queueFile, $message . PHP_EOL, FILE_APPEND);
    echo json_encode(['status' => 'success', 'message' => 'Message queued']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
