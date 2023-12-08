<?php
// uploadFile.php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    $code = isset($_POST['code']) ? $_POST['code'] : '';

    if ($code !== $_SESSION['_token']) {
        $response = array('status' => 'error', 'message' => 'Invalid CSRF token');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    $allowedTypes = array('image/jpeg', 'image/png', 'video/mp4', 'application/pdf');

    // File handling
    $uploadDir = '../media/';  // Set your desired upload directory
    $dateDirectory = date('Y/m/d/');
    $uploadDir .= $dateDirectory;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $fileName = encryptFileName($_FILES['file']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (in_array($_FILES['file']['type'], $allowedTypes) && move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        $response = array('status' => 'success', 'filePath' => $uploadFile);
    } else {
        $response = array('status' => 'error', 'message' => 'Error uploading file.');
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Invalid request
    header('HTTP/1.1 400 Bad Request');
    exit();
}

function encryptFileName($originalName)
{
    // You should implement your own encryption logic
    // return $originalName;
    return md5($originalName) . '_' . time();
}
