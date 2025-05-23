<?php
header('Content-Type: application/json');
if (!isset($_GET['name'])) {
    echo json_encode(['success' => false, 'error' => 'Missing name']);
    exit;
}

// Only allow safe characters and slashes for subfolders
$noteName = preg_replace('/[^a-zA-Z0-9_\-\/]/', '_', $_GET['name']);
// Prevent directory traversal
$noteName = preg_replace('/\.\.+/', '', $noteName);

$filePath = __DIR__ . '/files/' . $noteName . '.md';

if (file_exists($filePath)) {
    echo json_encode(['success' => true, 'content' => file_get_contents($filePath)]);
} else {
    echo json_encode(['success' => false, 'error' => 'File not found']);
}