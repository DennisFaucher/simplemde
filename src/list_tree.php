<?php
header('Content-Type: application/json');
$baseDir = __DIR__ . '/files';

function listDir($dir, $base) {
    $result = [];
    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = "$dir/$item";
        $relPath = substr($path, strlen($base) + 1);
        if (is_dir($path)) {
            $result[] = [
                'type' => 'folder',
                'name' => $item,
                'children' => listDir($path, $base)
            ];
        } else if (preg_match('/\.md$/', $item)) {
            $result[] = [
                'type' => 'file',
                'name' => $item,
                'path' => $relPath
            ];
        }
    }
    return $result;
}

echo json_encode(listDir($baseDir, $baseDir));