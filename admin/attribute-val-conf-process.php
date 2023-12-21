<?php
// common-attribute-process.php
include('session.php');

function processAttributeVal($type, $code, $attribute_id, $main_attribute_id, $name, $deletearray)
{
    global $conn;

    $code = stripslashes($code);
    $$attribute_id = stripslashes($$attribute_id);
    $main_attribute_id = stripslashes($main_attribute_id);
    $name = stripslashes($name);


    if (!isset($_SESSION['admin'])) {
        header("Location: index.php");
        exit();
    }

    switch ($type) {
        case 'add':
            // Add attribute logic
            if ($code == $_SESSION['_token'] && isset($name) && !empty($name) && !empty($main_attribute_id)) {
                // Check if the attribute already exists
                $stmt12 = $conn->prepare("SELECT count(id) FROM product_attributes_set where attribute ='" . $name . "'");
                $stmt12->execute();
                $stmt12->store_result();
                $stmt12->bind_result($col55);

                while ($stmt12->fetch()) {
                    $totalrow = $col55;
                }

                if ($totalrow > 0) {
                    echo "Attribute Already Exists.";
                } else {
                    // Insert the attribute if it doesn't exist
                    $stmt11 = $conn->prepare("INSERT INTO product_attributes_set (attribute, attribute_ar) VALUES (?, ?)");
                    $stmt11->bind_param("ss", $name, $name_ar);

                    $stmt11->execute();
                    $stmt11->store_result();

                    $rows = $stmt11->affected_rows;

                    if ($rows > 0) {
                        echo "Attribute Added Successfully.";
                    } else {
                        echo "Failed to add Attribute";
                    }
                }
            } else {
                echo "Invalid values.";
            }
            break;

        case 'edit':
            // Edit attribute logic
            if ($code == $_SESSION['_token'] && !empty($name) && !empty($attribute_id)) {
                // Check if the new attribute name already exists (excluding the current attribute)
                $stmt12 = $conn->prepare("SELECT count(id) FROM product_attributes_set WHERE attribute = ? AND id != ?");
                $stmt12->bind_param("si", $name, $attribute_id);
                $stmt12->execute();
                $stmt12->store_result();
                $stmt12->bind_result($col55);

                while ($stmt12->fetch()) {
                    $totalrow = $col55;
                }

                if ($totalrow == 0) {
                    // Update the attribute if the new name doesn't exist
                    $stmt11 = $conn->prepare("UPDATE product_attributes_set SET attribute = ?, attribute_ar = ? WHERE id = ?");
                    $stmt11->bind_param("ssi", $name, $name_ar, $attribute_id);

                    $stmt11->execute();
                    $stmt11->store_result();

                    echo "Attribute Updated Successfully.";
                } else {
                    echo "Attribute already exists.";
                }
            } else {
                echo "Invalid values.";
            }
            break;

        case 'delete':
            // Delete attribute logic
            if ($code == $_SESSION['_token'] && isset($deletearray) && !empty($deletearray)) {
                $stmt = $conn->prepare("SELECT id FROM product_attribute WHERE prod_attr_id = ?");
                $stmt->bind_param("i",  $deletearray);
                $stmt->execute();
                $return = array();

                $stmt->bind_result($col55);

                $exist = "N";
                while ($stmt->fetch()) {
                    $totalrow = $col55;
                    $exist = "Y";
                }

                if ($exist == "Y") {
                    echo "This Attribute already assign to some products.You can't delete the brand if it is assign to a product. Please delete product first";
                } else {
                    // Existing code for deleting attribute
                    $stmt2 = $conn->prepare("DELETE FROM product_attributes_set WHERE id = ?");
                    $stmt2->bind_param("i", $deletearray);
                    $stmt2->execute();

                    $rows = $stmt2->affected_rows;

                    if ($rows > 0) {
                        echo "Deleted";
                    } else {
                        echo "Failed to Delete.";
                    }
                }

                break;
            } else {
                echo "Invalid values.";
            }
            break;

        default:
            echo "Invalid type.";
            break;
    }
}

// Usage example for add operation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === "add" && isset($_POST['namevalue']) && isset($_POST['code'])) {
    processAttributeVal('add', $_POST['code'], null, $_POST['main_attribute_id'], $_POST['namevalue'], null);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === "edit" && isset($_POST['attribute_id']) && isset($_POST['namevalue']) && isset($_POST['code'])) {
    // processAttributeVal('edit', $_POST['code'], $_POST['namevalue'], $_POST['namevalue_ar'], $_POST['attribute_id'], null);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['type'] === "delete" && isset($_POST['deletearray']) && isset($_POST['code'])) {
    // processAttributeVal('delete', $_POST['code'], null, null, null, $_POST['deletearray']);
}
