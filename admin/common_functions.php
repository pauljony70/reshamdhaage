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

function pagination($targetpage, $page, $limit, $total_pages)
{
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages / $limit);
    $lpm1 = $lastpage - 1;
    $pagination = "";
    $adjacents = 3;

    if ($lastpage >= 1) {
        $pagination .= '<ul class="pagination pagination-sm" style="margin-top:0px;">';
        if ($page > 1)
            $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $prev . ")'> <b>Previous</b></a></li>";
        else
            $pagination .= "<li><span class=\"disabled\" > <b>Previous</b></span></li>";

        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li class='active'><span class=\"current\">$counter</span></li>";
                else
                    $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $counter . ")'>$counter</a></li>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) {

            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href='javascript:void(0)' onclick='" . $targetpage . "(" . $counter . ")'>$counter</a></li>";
                }
                $pagination .= "<li><a>...</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $lpm1 . ")'>$lpm1</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $lastpage . ")'>$lastpage</a></li>";
            } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(1)'>1</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(2)'>2</a></li>";
                $pagination .= "<li><a>...</a></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a href='javascript:void(0)' onclick='" . $targetpage . "(" . $counter . ")'>$counter</a></li>";
                }
                $pagination .= "<li><a>...</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $lpm1 . ")'>$lpm1</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $lastpage . ")'>$lastpage</a></li>";
            } else {
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "1)'>1</a></li>";
                $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(2)'>2</a></li>";
                $pagination .= "<li><a>...</a></li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><span class=\"current\">$counter</span></li>";
                    else
                        $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $counter . ")'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1)
            $pagination .= "<li><a style='color:inherit' href='javascript:void(0)' onclick='" . $targetpage . "(" . $next . ")'><b>Next</b> </a></li>";
        else
            $pagination .= "<li><span class=\"disabled\"><b>Next</b> </span></li>";
        $pagination .= "</ul>\n";
    }
    return $pagination;
}