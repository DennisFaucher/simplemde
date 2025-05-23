<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['name'])) {
    echo json_encode(['success' => false, 'error' => 'Missing note name']);
    exit;
}

// Allow safe characters and slashes for subfolders
$noteName = preg_replace('/[^a-zA-Z0-9_\-\/]/', '_', $data['name']);
// Prevent directory traversal
$noteName = preg_replace('/\.\.+/', '', $noteName);

$filePath = __DIR__ . '/files/' . $noteName . '.md';

if (file_exists($filePath)) {
    if (unlink($filePath)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to delete file']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'File not found']);
}