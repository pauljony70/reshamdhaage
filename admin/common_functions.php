<?php

// Ensure that the script is accessed through a valid session or authentication mechanism
function authenticateUser()
{
    // Implement your own authentication logic here
    // Example: Check if the user is logged in or has the necessary permissions
    if (!isset($_SESSION['admin'])) {
        header('HTTP/1.1 401 Unauthorized');
        exit();
    }
}

function secureEncryptFileName($originalName)
{
    // Implement your own secure encryption logic
    return md5($originalName . uniqid()) . '_' . time();
}

function secureImageUpload($file, $uploadDir)
{
    // Ensure that the user is authenticated before allowing the upload
    authenticateUser();

    $uploadPath = $uploadDir;

    $allowedTypes = array('image/jpg', 'image/jpeg', 'image/png', 'video/mp4', 'application/pdf');

    // File handling
    $dateDirectory = date('Y/m/d/');
    $uploadDir .= $dateDirectory;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Check if the file type is allowed
    if (in_array($file['type'], $allowedTypes)) {
        $fileName = secureEncryptFileName($file['name']);
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . $fileName;

        // Check if the file is an image
        if (in_array($file['type'], array('image/jpeg', 'image/png'))) {
            // Change the extension to WebP
            $uploadFile .= '.webp';
            move_uploaded_file($file['tmp_name'], $uploadFile);
            // Convert image to WebP format
            // $image = imagecreatefromstring(file_get_contents($file['tmp_name']));
            // imagewebp($image, $uploadFile, 80); // 80 is the quality, you can adjust it
            // imagedestroy($image);
        } else {
            // For non-image files, move the file as usual
            $uploadFile .= '.' . $fileExtension;
            move_uploaded_file($file['tmp_name'], $uploadFile);
        }

        $uploadFile = str_replace($uploadPath, '', $uploadFile);

        return array('status' => 'success', 'filePath' => $uploadFile);
    } else {
        // Invalid file type
        return array('status' => 'error', 'message' => 'Invalid file type');
    }
}
