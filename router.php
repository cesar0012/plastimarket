<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$request_uri = $_SERVER['REQUEST_URI'];

// --- Static File Server (No changes here, it works well) ---
$file_path = __DIR__ . strtok($request_uri, '?');
if (is_file($file_path)) {
    $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $mime_types = [
        'css' => 'text/css', 'js' => 'application/javascript', 'jpg' => 'image/jpeg', 
        'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif', 
        'svg' => 'image/svg+xml', 'woff' => 'font/woff', 'woff2'=> 'font/woff2',
        'ttf' => 'font/ttf', 'eot' => 'application/vnd.ms-fontobject'
    ];
    if (isset($mime_types[$extension])) {
        header('Content-Type: ' . $mime_types[$extension]);
        readfile($file_path);
        exit;
    }
}

// --- NEW Advanced Dynamic Page Routing ---
$route = strtok($request_uri, '?');

// Default route to index.php
if ($route === '/' || $route === '/index') {
    $route = '/index';
}

// Sanitize and validate the path
// 1. Remove leading/trailing slashes
$safe_path = trim($route, '/');

// 2. Normalize slashes
$safe_path = str_replace('\\', '/', $safe_path);

// 3. Prevent directory traversal by splitting the path and removing dangerous parts
$path_parts = explode('/', $safe_path);
$safe_parts = [];
foreach ($path_parts as $part) {
    if ($part !== '.' && $part !== '..') {
        $safe_parts[] = $part;
    }
}

// 4. Rebuild the final path
$final_path = implode('/', $safe_parts);

// Construct the full path to the target PHP file
$target_file = __DIR__ . '/' . $final_path . '.php';

// Check if the file exists and include it
if (file_exists($target_file)) {
    include $target_file;
} else {
    // If not found, check if a file exists at the root with that name (for backwards compatibility)
    $root_file = __DIR__ . '/' . basename($final_path) . '.php';
    if (file_exists($root_file)) {
        include $root_file;
    } else {
        http_response_code(404);
        if (file_exists(__DIR__ . '/404.php')) {
            include '404.php';
        } else {
            die('404 Not Found. The requested page could not be located.');
        }
    }
}
