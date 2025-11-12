<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$request_uri = $_SERVER['REQUEST_URI'];

// --- Definitive Static File Server ---
// This is a robust method to serve static files like CSS, JS, and images.
// It avoids relying on potentially disabled PHP extensions like fileinfo.

$file_path = __DIR__ . strtok($request_uri, '?');

if (is_file($file_path)) {
    $extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $mime_types = [
        'css'  => 'text/css',
        'js'   => 'application/javascript',
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'svg'  => 'image/svg+xml',
        'woff' => 'font/woff',
        'woff2'=> 'font/woff2',
        'ttf'  => 'font/ttf',
        'eot'  => 'application/vnd.ms-fontobject'
    ];

    if (isset($mime_types[$extension])) {
        header('Content-Type: ' . $mime_types[$extension]);
        readfile($file_path);
        exit; // Important: Stop script execution after serving the file.
    }
}

// --- Dynamic Page Routing --- //

// Remove query string for routing
$route = strtok($request_uri, '?');

// Default page is 'index'
if ($route === '/' || $route === '/index.php') {
    $page = 'index';
} else {
    // Get the page name from the URL, removing the leading slash
    $page = ltrim($route, '/');
    // Remove .php extension if present
    if (substr($page, -4) === '.php') {
        $page = substr($page, 0, -4);
    }
}

// Sanitize to prevent directory traversal attacks
$page = basename($page);

$filePath = __DIR__ . '/' . $page . '.php';

if (file_exists($filePath)) {
    include $filePath;
} else {
    http_response_code(404);
    if (file_exists(__DIR__ . '/404.php')) {
        include '404.php';
    } else {
        die('404 Not Found');
    }
}
