<?php
// Ruta al archivo que simula la cola
$queueFile = 'message_queue.txt';

// Verifica si el archivo existe y contiene datos
if (file_exists($queueFile)) {
    $messages = file_get_contents($queueFile);
    echo json_encode(['status' => 'success', 'messages' => explode(PHP_EOL, trim($messages))]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No messages found']);
}
?>
