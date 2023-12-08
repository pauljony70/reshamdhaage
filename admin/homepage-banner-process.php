<?php
// homepage-banner-process.php

include('session.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    $code = isset($_POST['code']) ? $_POST['code'] : '';

    if ($code !== $_SESSION['_token']) {
        $response = array('status' => 'error', 'message' => 'Invalid CSRF token');
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    $id = $_POST['id'];
    $link = $_POST['uploadLink'];

    // File handling
    $uploadDir = '../media/';  // Set your desired upload directory
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, proceed with the database update

        // Prepare and execute the SQL query
        $sql = "UPDATE homepage_banner SET link = ?, image = ? WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $link, $uploadFile, $id);

        if ($stmt->execute()) {
            $response = array('status' => 'success', 'message' => 'Banner updated successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error updating banner: ' . $stmt->error);
        }

        // Close the statement
        $stmt->close();
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
?>
