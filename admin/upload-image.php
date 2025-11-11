<?php
session_start();

if (!isset($_SESSION['admin_authenticated'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit;
}

header('Content-Type: application/json');

function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

function validateImageFile($file) {
    // Verificar que se subió un archivo
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Error al subir el archivo'];
    }
    
    // Verificar tamaño del archivo (máximo 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        return ['success' => false, 'message' => 'El archivo es demasiado grande (máximo 5MB)'];
    }
    
    // Verificar tipo MIME
    $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowedMimes)) {
        return ['success' => false, 'message' => 'Tipo de archivo no permitido. Solo se permiten: JPG, PNG, GIF, WebP'];
    }
    
    // Verificar extensión
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        return ['success' => false, 'message' => 'Extensión de archivo no permitida'];
    }
    
    // Verificar que sea realmente una imagen
    $imageInfo = getimagesize($file['tmp_name']);
    if ($imageInfo === false) {
        return ['success' => false, 'message' => 'El archivo no es una imagen válida'];
    }
    
    return ['success' => true, 'extension' => $fileExtension];
}

try {
    // Verificar que se envió un archivo
    if (!isset($_FILES['image'])) {
        throw new Exception('No se recibió ningún archivo');
    }
    
    $file = $_FILES['image'];
    $category = $_POST['category'] ?? 'general';
    
    // Validar archivo
    $validation = validateImageFile($file);
    if (!$validation['success']) {
        throw new Exception($validation['message']);
    }
    
    // Crear directorio si no existe
    $uploadDir = '../uploads/' . $category . '/';
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0755, true)) {
            throw new Exception('Error al crear el directorio de subida');
        }
    }
    
    // Generar nombre único para el archivo
    $uuid = generateUUID();
    $fileName = $uuid . '.' . $validation['extension'];
    $filePath = $uploadDir . $fileName;
    
    // Mover archivo al directorio final
    if (!move_uploaded_file($file['tmp_name'], $filePath)) {
        throw new Exception('Error al mover el archivo subido');
    }
    
    // Generar URL relativa para la base de datos
    $relativeUrl = 'uploads/' . $category . '/' . $fileName;
    
    // Respuesta exitosa
    echo json_encode([
        'success' => true,
        'message' => 'Imagen subida correctamente',
        'url' => $relativeUrl,
        'filename' => $fileName
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>