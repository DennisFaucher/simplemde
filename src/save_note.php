<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name']) || !isset($data['content'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit;
}

// Allow safe characters and slashes for subfolders
$noteName = preg_replace('/[^a-zA-Z0-9_\-\/]/', '_', $data['name']);
// Prevent directory traversal
$noteName = preg_replace('/\.\.+/', '', $noteName);

$filePath = __DIR__ . '/files/' . $noteName . '.md';

// Ensure the directory exists
$dir = dirname($filePath);
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

if (file_put_contents($filePath, $data['content']) !== false) {
    echo json_encode(['success' => true, 'file' => $filePath]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to save file']);
}