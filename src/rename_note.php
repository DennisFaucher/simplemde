<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['oldName']) || !isset($data['newName'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit;
}

// Allow safe characters and slashes for subfolders
$oldName = preg_replace('/[^a-zA-Z0-9_\-\/]/', '_', $data['oldName']);
$newName = preg_replace('/[^a-zA-Z0-9_\-\/]/', '_', $data['newName']);
// Prevent directory traversal
$oldName = preg_replace('/\.\.+/', '', $oldName);
$newName = preg_replace('/\.\.+/', '', $newName);

$oldPath = __DIR__ . '/files/' . $oldName . '.md';
$newPath = __DIR__ . '/files/' . $newName . '.md';

if (!file_exists($oldPath)) {
    echo json_encode(['success' => false, 'error' => 'Original file not found']);
    exit;
}

// Ensure the new directory exists
$newDir = dirname($newPath);
if (!is_dir($newDir)) {
    mkdir($newDir, 0777, true);
}

if (rename($oldPath, $newPath)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to rename file']);
}