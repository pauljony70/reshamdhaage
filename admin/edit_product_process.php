<?php
include('session.php');
$code = "123"; //$_POST['code'];

  $error='';  // Variable To Store Error Message
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
    $prod_id =$_POST['prod_id']; 
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
     
    $seller_id_value =$_SESSION['seller_id'];
  
    $name =    stripslashes($name);
    $short=    stripslashes($short);
    $full =   stripslashes($full);
    $name_ar =    stripslashes($name_ar);
    $short_ar =   stripslashes($short_ar);
    $full_ar =   stripslashes($full_ar);
    $mrp=    stripslashes($mrp);
    $price =   stripslashes($price);
    $cgst =    stripslashes($cgst);
    $sgst =    stripslashes($sgst);
    $igst =    stripslashes($igst); 
    $shipping = stripslashes($shipping);
    $hsn=  stripslashes($hsn);
    $w_price =   stripslashes($w_price);
    $w_qty=  stripslashes($w_qty);
    $color =    stripslashes($color);
    $size=    stripslashes($size);
    $weight =    stripslashes($weight);
    $stockqty =   stripslashes(  $stockqty);
    $unit =   stripslashes(  $unit);
    $cat=    stripslashes($cat);
    $brand=   stripslashes($brand);
    $prod_id=   stripslashes($prod_id);
    $videoid=   stripslashes($videoid);
    $pricearray=  stripslashes($pricearray);
    $discountcoins=   stripslashes(  $discountcoins);
    $refercoins=   stripslashes($refercoins);
    $displaystock=   stripslashes($displaystock);
    $sellername=   stripslashes($sellername);
    $remark=   stripslashes($remark);
    $freeship=   stripslashes($freeship);
    $ratingstar=   stripslashes($ratingstar);
    $ratingcount=   stripslashes($ratingcount);
    $eggless=  "0"; // stripslashes($eggless);
    $msgoncake=  "0"; // stripslashes($msgoncake);
   
    $seller_id =$_SESSION['seller_id'];
  
    $code=   stripslashes($code);
$name =   stripslashes($name);

//echo "prod is ". $prod_id."--".$name."--".$short."--".$full."--".$mrp."--".$price."--".$stockqty."--".$cat."--".$brand."<br>";
//echo " sd "."--".$tax."--".$shipping."--".$hsn."--".$w_price."--".$w_qty."--".$color."-*-".$size."-*-".$weight."---".$imagejson;
//echo "unit is ".$unit;
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
 // echo " dashboard redirect to index";
}else if(isset($name)  && isset($cat)  && !empty($name)   && !empty($cat)   && !empty($imagejson)  ) {

 //echo "inside ";
 
    include('../app/db_connection.php');
    global $conn;
    try{
      
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       	date_default_timezone_set("Asia/Kuwait");
       	$datetime = date('Y-m-d H:i:s');
      $editdone = false;
        $rowProdJsonArray = "";
       
           	$other_art =array( 'size' => $size,
       	                    'color' => $color,
       	                    'weight' =>  $weight);
       //	echo " json " .json_encode($other_art);  
        //   $shipping ="35";
           
        $stmt11 = $conn->prepare("UPDATE productdetails SET prod_name =?, prod_desc=?, prod_fulldetail=?, name_ar=?, short_ar=?, desc_ar=?, prod_mrp=?, prod_price=?, cgst=?, sgst=?, igst=?, shipping=?, hsn_code=?, w_price=?, w_qty=?, other_attribute=?, stock=?, unit=?, prod_img_url=?, cat_id=?, brand_id=?, update_by=?,  pricearray=?,  coins=?, discount_coins=?, displaystock=?, sellername=?, prod_remark=?, freeship =?, prod_rating=?, prod_rating_count=?, eggless=?, msgoncake=? WHERE prod_id=?");
    	$stmt11->bind_param( ssssssddddddsdisissiissiisssidiiii, $name, $short, $full, $name_ar, $short_ar, $full_ar, $mrp, $price, $cgst, $sgst, $igst, $shipping, $hsn, $w_price, $w_qty, json_encode($other_art), $stockqty, $unit, $imagejson, $cat, $brand, $datetime,  $pricearray,$refercoins, $discountcoins, $displaystock, $sellername, $remark, $freeship, $ratingstar, $ratingcount, $eggless, $msgoncake, $prod_id );
		$stmt11->execute();
	    $stmt11->store_result();
    
        // echo " insert done ";
        $rows=$stmt11->affected_rows;
        if($rows>0){
           //  echo " Edit Successful";
              $editdone  = true;
                $stmt12 = $conn->prepare("UPDATE product SET prod_name =?, prod_stock =?, prod_cat_id=?, prod_brand_id=? WHERE prod_id=?");
            	$stmt12->bind_param( siiii, $name ,$stockqty,$cat, $brand, $prod_id );
        		$stmt12->execute();
        	    $stmt12->store_result();
            
                // echo " insert done ";
                $rowss=$stmt12->affected_rows;
                if($rowss>0){
                       $editdone = true;
                     //echo " Edit Successful";
                 }else{
                     //echo "failed to Edit";
                 }	
               
             
             
             
         }else{
          //   echo "failed to Edit";
         }
         if($editdone){
           echo " Edit Successful";  
         } else{
            echo "failed to Edit";
        }	
        
    }//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

    
}   


?>