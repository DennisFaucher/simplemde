<?php
// Simple endpoint for pasted image uploads
header('Content-Type: application/json');
$targetDir = __DIR__ . '/files/images/';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}
if (!isset($_FILES['image'])) {
    echo json_encode(['success' => false, 'error' => 'No file uploaded']);
    exit;
}
$file = $_FILES['image'];
$filename = preg_replace('/[^a-zA-Z0-9_\.\-]/', '_', basename($file['name']));
$targetFile = $targetDir . $filename;

if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    echo json_encode(['success' => true, 'filename' => $filename]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to upload image']);
}