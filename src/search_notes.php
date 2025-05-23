<?php
// filepath: /Users/faucherd/Documents/Personal/MBP-Personal/Programming/VibeCoding/CoPilot/Docker/simplemde/src/search_notes.php
header('Content-Type: application/json');

$baseDir = __DIR__ . '/files';
$search = isset($_GET['q']) ? $_GET['q'] : '';

function searchDir($dir, $base, $search) {
    $result = [];
    foreach (scandir($dir) as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = "$dir/$item";
        $relPath = substr($path, strlen($base) + 1);
        if (is_dir($path)) {
            $children = searchDir($path, $base, $search);
            if (!empty($children)) {
                $result[] = [
                    'type' => 'folder',
                    'name' => $item,
                    'children' => $children
                ];
            }
        } else if (preg_match('/\.md$/', $item)) {
            $content = file_get_contents($path);
            if ($search === '' || stripos($content, $search) !== false) {
                $result[] = [
                    'type' => 'file',
                    'name' => $item,
                    'path' => $relPath
                ];
            }
        }
    }
    return $result;
}

echo json_encode(searchDir($baseDir, $baseDir, $search));