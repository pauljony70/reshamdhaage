<?php
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    echo 'Error: File upload failed. Error code: ' . $_FILES['file']['error'] . '<br>';
} else {
    date_default_timezone_set("Asia/Kolkata");
    $time = date("h:i:sa");
    $date = date("Y-m-d");
    mkdir("../media/".$date);

    $filename = str_replace(" ", "-", $_FILES['file']['name']);
    $filename_explode = explode('.', $filename);
    $extension = strtolower(end($filename_explode));

    if (!in_array($extension, array('php', 'js', 'html'))) {
        // Get the original file name without the extension
        $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);

        // Generate the target filename with the .webp extension
        $targetFilename = $filenameWithoutExtension . '.webp';

        $targetPath = '../media/'.$date.'/'. $targetFilename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
            // Check if the file is an image
            $imageInfo = getimagesize($targetPath);
            if ($imageInfo !== false && $imageInfo['mime'] === 'image/jpeg') {
                // Get the original image
                $originalImage = imagecreatefromjpeg($targetPath);

                // Convert the image to WebP format
                if (imagewebp($originalImage, $targetPath, 80)) { // 80 is the quality, adjust as needed
                    // Free up memory
                    imagedestroy($originalImage);

                    echo "Upload successfully--".$date.'/'.$targetFilename;
                } else {
                    echo "Error: Failed to convert image to WebP format.";
                }
            } else {
                echo "Error: Uploaded file is not a valid JPEG image.";
            }
        } else {
            echo "Error: Failed to move the uploaded file.";
        }
    } else {
        echo "Error: Please upload a valid file.";
    }
}
?>
