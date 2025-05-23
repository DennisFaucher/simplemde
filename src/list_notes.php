<?php
header('Content-Type: application/json');
$filesDir = __DIR__ . '/files/';
$notes = [];

foreach (glob($filesDir . '*.md') as $file) {
    $notes[] = basename($file, '.md');
}

echo json_encode(['success' => true, 'notes' => $notes]);