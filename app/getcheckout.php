<?php

include('db_connection.php');
$language   = htmlentities($_POST['language']);
$securecode = htmlentities($_POST['securecode']);
$user_id    = htmlentities($_POST['user_id']);
$qoute_id   = htmlentities($_POST['qoute_id']);
// remove back slash from the variable if any...

$langauge   = stripslashes($language);
$securecode = stripslashes($securecode); //  "1234567890";//
$user_id    = stripslashes($user_id);
$qoute_id   = stripslashes($qoute_id);

//echo "  outside ";

$status           = 0;   // 0 means failled , 1 means all good, 2 means  address not found, 3 means cart details not found, 4 select address
$jsonarray        = array();
$rowProdJsonArray = array();
$totalPrice       = 0;
$totalmrp         = 0;
$totalsaving      = 0;
$payableAmount    =  0;
$count    = 0;
$notExist = true;
$cashondelivery  ="disable";
$showcgst       = "false";
$shippingfees   = '0.00';
$freeship         ="1000";
$freeshipping     = 0;
$shipAddress = array(
                    'fullname' => "",
                    'address' => "",
                    'landmark' => "",
                    'city' => "",
                    'state' => "",
                    'pincode' => "",
                    'phone' => "",
                    'email' => ""); 
$delivery = array();
$defaultaddress = 0;

if ($langauge === "default") {
    $msg = "no checkout details found";
    
} else {
    $msg = "कोई चेकआउट विवरण नहीं मिला";
}
$information = array(
    'prod_details' => $jsonarray,
    'totalprice' => $totalPrice,
    'totalmrp' => $totalmrp,
    'totalsaving' => $totalsaving,
    'shippingfee' =>  $shippingfees,
    'payableamount' => $payableAmount,
    'totalitem' => $count,
	'csgt' =>   '0.00' ,
	'sgst' =>   '0.00' ,
	'igst' =>   '0.00' ,
	'cashondelivery'=>    $cashondelivery,
	'showcgst' => $showcgst,
	'address_details' => $shipAddress,
	'defaultaddress' => $defaultaddress,
	'deliverytime' => $delivery
);



if (isset($langauge) && !empty($langauge) && isset($securecode) && !empty($securecode) && !empty($user_id)) {
    
    global $conn;
    
    if ($conn->connect_error) {
        die(" connecction has failed " . $conn->connect_error);
    }
    
    $stmt = $conn->prepare("SELECT user_id, prod_id, qoute_id FROM cartdetails WHERE user_id=?");
    $stmt->bind_param(i, $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($col1, $col2, $col3);
    
    while ($stmt->fetch()) {
        $notExist = false;
        $rowProdJsonArray = $col2;
        
    }
    
    //$msg = "No Product exist on User 888 cart ". $notExist ;
    if ($notExist) {
        // user didn't add any product till now
        $status = 3;
       if ($langauge === "default") {
            $msg = "no checkout details found";
            
        } else {
            $msg = "कोई चेकआउट विवरण नहीं मिला";
        }
        $information = array(
            'prod_details' => $jsonarray,
            'totalprice' => $totalPrice,
            'totalmrp' => $totalmrp,
            'totalsaving' => $totalsaving,
            'shippingfee' =>   '0.00', 
            'payableamount' => $payableAmount,
            'totalitem' => $count,
        	'csgt' =>   '0.00' ,
        	'sgst' =>   '0.00' ,
        	'igst' =>   '0.00' ,
        	'cashondelivery'=>    $cashondelivery,
        	'showcgst' => $showcgst,
        	'address_details' => $shipAddress,
	        'defaultaddress' => $defaultaddress,
	        'deliverytime' => $delivery
        );
        
    } else {
        
        $oldarray           = json_decode($rowProdJsonArray, true);
        $prodIDexist        = false;
        $i                  = 0;
        $update_cart        = false;
        $update_cart_delete = false;
        $freeship_essential =0;   // for essential product give freeshiping if the product is only item in cart.
        foreach ($oldarray as $arraykey) {
            //  echo "prod id ".$arraykey['prod_id'];
            $proprice = str_replace(",", '', $arraykey['price']);
            
            $stmt2 = $conn->prepare("SELECT pd.prod_id, pd.prod_name, pd.prod_mrp, pd.prod_price, pd.prod_img_url, ct.cat_name, pd.unit, pd.other_attribute, pd.pricearray, pd.stock, pd.cashon, pd.freeship, pd.cgst, pd.sgst, pd.hsn_code  FROM productdetails pd, category ct WHERE pd.cat_id= ct.cat_id AND pd.prod_id=?");
            $stmt2->bind_param(i, $arraykey['prod_id']);
            $stmt2->execute();
            $stmt2->store_result();
            $stmt2->bind_result($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14, $col15);
            while ($stmt2->fetch()) {
                
                $msg             = " checkout details";
                $proprice_simple = $col4;
                $promrp_simple   = $col3;
                $freeship_essential = $col12;
                /// check multi pricing stock and simple stock
                $stock           = $col10;
                //$proprice = substr($proprice, 0, strpos($proprice, "."));
                //    echo " prodprice--".$proprice;
                $multipricearray = json_decode($col9, true);
                $ismutliprice    = 0;
                foreach ($multipricearray as $mulitarraykey) {
                      //echo " attrname-- ".$arraykey['attrnam']."--";
                    $ismutliprice = 1;
                    if (($mulitarraykey['attrnam'] === $arraykey['size'] || $mulitarraykey['attrnam'] === $arraykey['color'])) {
                        //array_push( $filtersize,$mulitarraykey['attrnam']);
                    $promrp_simple = $mulitarraykey['attrmrpvalue'];
                    
                        if ($mulitarraykey['attrvalue'] != $arraykey['price']) {
                            $proprice              = $mulitarraykey['attrvalue'];
                            // echo "price has change --".$mulitarraykey['attrnam']."--oldprice--".$arraykey['price']."--new--".$mulitarraykey['attrvalue']."--prodprice-". $proprice;
                            $oldarray[$i]['price'] = $proprice;
                            $update_cart           = true;
                        }
                       // echo " stcok check ";
                        if ($mulitarraykey['attrstockvalue'] != "") {
                            $stock = $mulitarraykey['attrstockvalue'];
                            // echo "Match found--".$mulitarraykey['attrnam']."--stock--".$mulitarraykey['attrstockvalue'];
                            
                        }
                    }
                } // foreach multipricearray close
                if ($ismutliprice == 0 && $proprice_simple != $arraykey['price']) {
                    //  echo "--simpleprice--".$proprice_simple."--old---".$arraykey['price']  ;
                    $proprice              = $proprice_simple;
                    $oldarray[$i]['price'] = $proprice;
                    $update_cart           = true;
                }
             //echo " --stock --". $stock ." --multiprice ".$ismutliprice ."<br>";
               /* if ($stock <= 0) {
                    // delete item from the cart
                    unset($oldarray[$i]);
                    $update_cart_delete = true;
                    
                } else {*/
                    
                    $cgst = $cgst + ($proprice * $arraykey['qty']) - (($proprice * $arraykey['qty']) * 100) / (100+ $col13) ; 
    			    $sgst = $sgst + ($proprice * $arraykey['qty']) - (($proprice * $arraykey['qty']) * 100) /(100 + $col14);
    			    $igst = 0;    
    			 // $shiparray[$count] = $col5;
                    $totalPrice  = $totalPrice + $proprice * $arraykey['qty'];
                    $totalmrp    = $totalmrp + $promrp_simple * $arraykey['qty'];
                    $totalsaving = $totalmrp - $totalprice;
                    
                 //}
             
                
                   $jsonarray[$count] = array(
                        'index' => $arraykey['index'],
                        'id' => $col1,
                        'name' => $col2,
                        'mrp' => number_format($promrp_simple , 2),
                        'price' => number_format($proprice, 2),
                        'qty' => $arraykey['qty'],
                        'img_url' => $col5,
                        'size' => $arraykey['size'],
                        'color' => $arraykey['color'],
                        'cat_name' => $col6,
                        'unit' => $col7,
                        'attr' => $col8,
                        'pricearray' => $col9,
                        'stock' => $col10,
                        'msgoncake' => $arraykey['msgoncake'],
                        'eggless' => $arraykey['eggless'],
                        'cashon' => $col11,
                        'hsncode' => $col15,
                    );
                    
                    
                    $count = $count + 1;
            } /// while close
            $i++;
        } // foreach close
        
        $status = 1;
        $minordervalue ="0";  $freeship="0";  $allindiafees = 40; 
        $stmt3 = $conn->prepare("SELECT name, value FROM store_config");
    	// $stmt3 ->bind_param(s,$minorder);
    	 $stmt3->execute();
    	 $stmt3->store_result();
    	 $stmt3->bind_result ( $col31, $col32);
    	 while($stmt3->fetch() ){
    	     if($col31=="minorder"){
    	          $minordervalue = $col32;
    	     }else if($col31=="freeship"){
    	          $freeship = $col32;
    	     }else if($col31=="cashondelivery"){
    	          $cashondelivery = $col32;
    	     }else if($col31 == "showcgst"){
    	         $showcgst = $col32;
    	     } 
    	   
    	 }
    	 // get shipping based on pincode
    	 $userpincode =0;
    	 $addressnotExist = true; $rowAddressJsonArray = array();
    	 $stmt6 = $conn->prepare("SELECT user_id, addressarray, defaultaddress, pincode FROM address ad WHERE user_id=?");
    	 $stmt6 ->bind_param(i, $user_id);
    	 $stmt6->execute();
    	 $stmt6->store_result();
    	 $stmt6->bind_result ( $col1, $col2, $col3, $col4);
    	 
    	 while($stmt6->fetch() ){
    	 
    	 		$addressnotExist = false;
    	 		$rowAddressJsonArray  = $col2;
    	 		$defaultaddress = $col3;
    	 	    $userpincode = $col4;
    	 	//	echo " address found ";
    	 }
    	 //$useraddress = "";
    	 if($addressnotExist == true){
    	    //$useraddress =  ""; 
    	    $status = 2;
    	    $msg =" Please add shipping address!!!";
    	 }else{
    	     $oldarray = json_decode(  $rowAddressJsonArray, true) ;
    	     $iscorrectdefaultaddress = false;
    	     foreach($oldarray as $arraykey) {
                    // echo " col8 - ".$col8. "--".$arraykey['address_id'];
                if( $defaultaddress == $arraykey['address_id']){
                   // $shipAddress = $arraykey['fullname']."\n ".$arraykey['address1'].", ".$arraykey['address2']." ".$arraykey['landmark']."\n".$arraykey['city']
                    //." ( ".$arraykey['state']." )\n Pincode : ".$arraykey['pincode']."\n Phone:  ".$arraykey['phone']."\n Email :  ".$arraykey['email'];
                    $iscorrectdefaultaddress = true;
                    $shipAddress = array(
                                        'fullname' => $arraykey['fullname'],
                                        'address' => $arraykey['address1'].", ".$arraykey['address2'],
                                        'landmark' => $arraykey['landmark'],
                                        'city' => $arraykey['city'],
                                        'state' => $arraykey['state'],
                                        'pincode' => $arraykey['pincode'],
                                        'phone' => $arraykey['phone'],
                                        'email' => $arraykey['email']);   		     
                   
                    }   
                }
                // if address exist but default address id is incorrect 
                if($iscorrectdefaultaddress == false){
                     $status = 4;
    	             $msg =" Please select shipping address "; 
                }
               
    	   //$useraddress =  $shipAddress ;//  json_decode($rowAddressJsonArray);
    	 }
    	  // get shipping fees based on pincode
    	 $stmt7 = $conn->prepare("SELECT shippingfee FROM pincode WHERE pincode=?");
    	 $stmt7 ->bind_param(i, $userpincode);
    	 $stmt7->execute();
    	 $stmt7->store_result();
    	 $stmt7->bind_result ( $col11);
    	 
    	 while($stmt7->fetch() ){
    	    // echo " fees ".$col11;
    	     $shippingfees  ="$col11";
    	 }
    	  
		 // $shippingfees = max($shiparray); //  $shippingfees ;  
		  if( $totalPrice > $freeship){
		      $shippingfees = "0.00";
		      $freeshipping = 1;
		      //$msg ="checkout Your Order Value is greater than $freeship.\n\n You Get Free Shipping. ";
		  }
        // for each product id get product details from table productdetails 
    	//echo " count ".$count."------".$freeship_essential;
    	if($count ==1 && $freeship_essential ==1){
	      	$shippingfees = "0.00";
	    }
	    // get delivery time 
	     $dCount =0;
    	 $stmt8 = $conn->prepare("SELECT timevalue FROM deliverytime");
    	 $stmt8->execute();
    	 $stmt8->store_result();
    	 $stmt8->bind_result ( $col21);
    	 
    	 while($stmt8->fetch() ){
    	 
    	 	$delivery[$dCount]= $col21;
    	 	$dCount = $dCount +1;				
    	 }
    	 
    	 $payableAmount = $totalPrice + $shippingfees;
        $information = array(
             'prod_details' => $jsonarray,
            'totalprice' => number_format($totalPrice, 2),
            'totalmrp' =>  number_format($totalmrp,2),
            'totalsaving' =>   "-".number_format($totalmrp - $totalPrice, 2),
            'shippingfee' => number_format(  $shippingfees, 2)   ,
            'payableamount' => number_format( $payableAmount,2),
            'totalitem' => $count,
			'cgst' =>   number_format(  $cgst + $sgst,  2) ,
			'sgst' =>   number_format(  $sgst,  0) ,
		    'igst' =>   number_format(  $igst,  0) ,
        	'cashondelivery'=>    $cashondelivery,
        	'showcgst' => $showcgst,
        	'address_details' =>  $shipAddress,
	        'defaultaddress' => $defaultaddress,
	        'deliverytime' => $delivery
        );
        // update product price
        if ($update_cart) {
            $oldarray     = array_values($oldarray);
            $tempnewarray = json_encode($oldarray);
            $stmt4        = $conn->prepare("UPDATE cartdetails SET prod_id=? WHERE user_id=?");
            //$stmt4->bind_param(si, $tempnewarray, $user_id);
        //    $stmt4->execute();
            
            $rows = $stmt4->affected_rows;
            
        }
        // update cart once delete the item
        if ($update_cart_delete) {
            $oldarray     = array_values($oldarray);
            $tempnewarray = json_encode($oldarray);
            $stmt5        = $conn->prepare("UPDATE cartdetails SET prod_id=? WHERE user_id=?");
           $stmt5->bind_param(si, $tempnewarray, $user_id);
            $stmt5->execute();
            
            $rows = $stmt5->affected_rows;
            
        }
    
    }
    mysqli_close($conn);
    
    $post_data = array(
    'status' => $status,
    'msg' => $msg,
    'Information' => $information
);


$post_data = json_encode($post_data);

echo $post_data;
    
} 






?>
