<?php
include('session.php');

$name = $_POST['name'];
$short = $_POST['short'];
$full = $_POST['full'];
$name_ar = $_POST['name_ar'];
$short_ar = $_POST['short_ar'];
$full_ar = $_POST['full_ar'];
$mrp = $_POST['mrp'];
$price = $_POST['price'];
$cgst = $_POST['cgst'];
$sgst = $_POST['sgst'];
$igst = $_POST['igst'];
$shipping = $_POST['shipping'];
$hsn = $_POST['hsn'];
$w_price = $_POST['w_price'];
$w_qty = $_POST['w_qty'];
$color = $_POST['color'];
$size = $_POST['size'];
$weight = $_POST['weight'];
$stockqty = $_POST['stock_qty'];
$unit = $_POST['unit'];
$cat = $_POST['cat'];
$brand = $_POST['brand'];
$imagejson = $_POST['imagejson'];
$videoid = $_POST['videoid'];
$pricearray = $_POST['pricearray'];
$discountcoins = $_POST['discountcoins'];
$refercoins = $_POST['refercoins'];
$displaystock = $_POST['displaystock'];
$sellername = $_POST['sellername'];
$remark = $_POST['remark'];
$freeship = $_POST['freeship'];
$ratingstar = $_POST['ratingstar'];
$ratingcount = $_POST['ratingcount'];


$seller_id_value = $_SESSION['seller_id'];

$name =    stripslashes($name);
$short =    stripslashes($short);
$full =   stripslashes($full);
$name_ar =    stripslashes($name_ar);
$short_ar =   stripslashes($short_ar);
$full_ar =   stripslashes($full_ar);
$mrp =    stripslashes($mrp);
$price =   stripslashes($price);
$cgst =    stripslashes($cgst);
$sgst =    stripslashes($sgst);
$igst =    stripslashes($igst);
$shipping = stripslashes($shipping);
$hsn =  stripslashes($hsn);
$w_price =   stripslashes($w_price);
$w_qty =  stripslashes($w_qty);
$color =    stripslashes($color);
$size =    stripslashes($size);
$weight =    stripslashes($weight);
$stockqty =   stripslashes($stockqty);
$unit =   stripslashes($unit);
$cat =    stripslashes($cat);
$brand =   stripslashes($brand);
$videoid =  stripslashes($videoid);
$pricearray =  stripslashes($pricearray);
$discountcoins =   stripslashes($discountcoins);
$refercoins =   stripslashes($refercoins);
$displaystock =   stripslashes($displaystock);
$sellername =   stripslashes($sellername);
$remark =   stripslashes($remark);
$freeship =   stripslashes($freeship);
$ratingstar =   stripslashes($ratingstar);
$ratingcount =   stripslashes($ratingcount);
$eggless =   "0"; // stripslashes($eggless);
$msgoncake =  "0"; // stripslashes($msgoncake);
// $imagejson = "[sdfas]";

// echo "sdfsa ".$name.$short.$full.$mrp.$price.$qty.$cat.$brand.$imagejson ;

// echo "seler is ".$seller_id;
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    // echo " dashboard redirect to index";
} else
   if (isset($name)  && isset($cat)  && !empty($name)   && !empty($cat)  && !empty($imagejson)) {

    //  echo " inside start ";
    include('../app/db_connection.php');
    global $conn;

    if ($conn->connect_error) {
        die(" connecction has failed " . $conn->connect_error);
    }


    $datetime = date('Y-m-d H:i:s');
    $other_art = array(
        'size' => $size,
        'color' => $color,
        'weight' =>  $weight
    );

    $rating =  $ratingstar; // // rand(3,5); 
    $empty_va = "";
    $ratingcount =  $ratingcount; //rand(124,305) ; 
    $reviewid = "";
    //  $shipping ="35";
    //    $brand ="1";
    $stmt11 = $conn->prepare("INSERT INTO productdetails( prod_name, prod_desc, prod_fulldetail, name_ar, short_ar, desc_ar, prod_mrp, prod_price, cgst, sgst, igst, shipping, hsn_code, w_price, w_qty, other_attribute, stock, unit, prod_rating, prod_rating_count, prod_img_url, cat_id, brand_id, review_id, create_by, update_by, pricearray,  coins, discount_coins, displaystock, sellername, prod_remark,freeship )  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt11->bind_param("ssssssddddddsdisisdisiiisssiiissi", $name, $short, $full, $name_ar, $short_ar, $full_ar, $mrp, $price, $cgst, $sgst, $igst, $shipping, $hsn, $w_price, $w_qty, json_encode($other_art), $stockqty, $unit, $rating, $ratingcount, $imagejson, $cat, $brand, $reviewid, $datetime, $datetime, $pricearray, $refercoins, $discountcoins, $displaystock, $sellername, $remark, $freeship);

    $stmt11->execute();
    $stmt11->store_result();
    print_r($stmt11->error);
    $rows = $stmt11->affected_rows;
    if ($rows > 0) {

        $prod_id = $stmt11->insert_id;
        // echo "prod is ".$prod_id;
        $defaultstatus = "active";
        $stmt12 = $conn->prepare("INSERT INTO product( prod_id, prod_name, prod_stock,  prod_brand_id, prod_cat_id, status)  VALUES (?,?,?,?,?,?)");
        $stmt12->bind_param("isiiis", $prod_id, $name, $stockqty, $brand, $cat, $defaultstatus);
        $stmt12->execute();
        $stmt12->store_result();
        // echo " insert done ";
        $rows2 = $stmt12->affected_rows;
        if ($rows2 > 0) {
            echo "Product Added Sucessfully ";
        } else {
            echo "failed to add. Please try again";
        }
    } else {
        echo "failed to add. Please try again";
    }
} else {
    echo "Invalid Parameters. Please fill all required fields.";
}
die;
