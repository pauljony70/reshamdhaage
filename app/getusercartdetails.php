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

$status           = 0;
$jsonarray        = array();
$rowProdJsonArray = array();
$totalPrice       = 0;
$totalmrp         = 0;
$totalsaving      = 0;
$count    = 0;
$notExist = true;
$cashondelivery  ="disable";
$showcgst       = false;
$minordervalue ="0";
$shippingfees   = '0.00';
$freeship         ="100";
$freeshipping     = 0;
$cgst  =0; $sgst = 0; $igst =0;

if ($langauge === "default") {
    $msg = "No Product exist on User cart";
    
} else {
    $msg = "आप के अकाउंट में कोई प्रोडक्ट नहीं  मिला है ";
}
$information = array(
    'prod_details' => $jsonarray,
    'totalprice' => $totalPrice,
    'totalmrp' => $totalmrp,
    'totalsaving' => $totalsaving,
    'shippingfee' =>   $shippingfees, 
	'csgt' =>   '0.00' ,
	'sgst' =>   '0.00' ,
	'igst' =>   '0.00' ,
	'feeshipping' => $freeshipping,
	'minorder' => $minordervalue,
	'cashondelivery'=>    $cashondelivery,
	'showcgst' => $showcgst
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
        $rowUser_id       = $col1;
        $rowProdJsonArray = $col2;
        $qouteId          = $col3;
        
    }
    
    //$msg = "No Product exist on User 888 cart ". $notExist ;
    if ($notExist) {
        // user didn't add any product till now
        $status = 0;
        if ($langauge === "default") {
            $msg = "No Product exist on User cart";
            
        } else {
            $msg = "आप के अकाउंट में कोई प्रोडक्ट नहीं  मिला है ";
        }
        $information = array(
            'prod_details' => $jsonarray,
            'totalprice' => $totalPrice,
            'totalmrp' => $totalmrp,
            'totalsaving' => $totalsaving,
            'shippingfee' =>   '0.00', 
        	'csgt' =>   '0.00' ,
        	'sgst' =>   '0.00' ,
        	'igst' =>   '0.00' ,
        	'feeshipping' => $freeshipping,
        	'minorder' => $minordervalue,
	        'cashondelivery'=>    $cashondelivery,
	        'showcgst' => $showcgst
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
            
            $stmt = $conn->prepare("SELECT pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_mrp, pd.prod_price, pd.prod_img_url, ct.cat_name, pd.unit, pd.other_attribute, pd.pricearray, pd.stock, pd.cashon, pd.freeship, pd.cgst, pd.sgst  FROM productdetails pd, category ct WHERE pd.cat_id= ct.cat_id AND pd.prod_id=?");
            $stmt->bind_param(i, $arraykey['prod_id']);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($col1, $col2, $col2ar, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14);
            while ($stmt->fetch()) {
               
                $pname =   $col2;
 	            if( $language !="default" ){ $pname =    json_encode( $col2ar,  JSON_UNESCAPED_UNICODE);}
 	            if($pname == "\"\""){ $pname =$col2;}
 	          
                $msg             = " user cart details is here";
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
                   //echo " attrname--".$arraykey['size']."--".$mulitarraykey['attrnam']."--".$arraykey['color'];
                       $ismutliprice = 1;
                  //  $promrp_simple = $mulitarraykey['attrmrpvalue'];
                //    echo " promrp ".$mulitarraykey['attrmrpvalue'];
                    if (($mulitarraykey['attrnam'] === $arraykey['size'] || $mulitarraykey['attrnam'] === $arraykey['color'])) {
                        //array_push( $filtersize,$mulitarraykey['attrnam']);
                           $promrp_simple  = $mulitarraykey['attrmrpvalue'];
                      
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
                    // echo "--simpleprice--".$proprice_simple."--old---".$arraykey['price']  ;
                    $proprice              = $proprice_simple;
                    $oldarray[$i]['price'] = $proprice;
                    $update_cart           = true;
                }
             //echo " --stock --". $stock ." --multiprice ".$ismutliprice ."<br>";
              /*  if ($stock <= 0) {
                    // delete item from the cart
                   unset($oldarray[$i]);
                    $update_cart_delete = true;
                    
                } else {*/
                    
                    $cgst = $cgst + ($proprice * $arraykey['qty']) - (($proprice * $arraykey['qty']) * 100) / (100+ $col13) ; 
    			    $sgst = $sgst + ($proprice * $arraykey['qty']) - (($proprice * $arraykey['qty']) * 100) /(100 + $col14);
    			    $igst = 0;    
    			 // $shiparray[$count] = $col5;
    			 //echo " hehe ". $totalmrp ."---". $promrp_simple ."--". $arraykey['qty'];
                    $totalPrice  = $totalPrice + $proprice * $arraykey['qty'];
                    $totalmrp    = $totalmrp + $promrp_simple * $arraykey['qty'];
                    $totalsaving = $totalmrp - $totalprice;
                    
                    $jsonarray[$count] = array(
                        'index' => $arraykey['index'],
                        'id' => $col1,
                        'name' => $pname,
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
                    );
                    
                    
                    $count = $count + 1;
               // }
                
            } /// while close
            $i++;
        } // foreach close
        
        $status = 1;
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
    	  
		 // $shippingfees = max($shiparray); //  $shippingfees ;  
		  if( $totalPrice > $freeship){
		      $shippingfees = "0.00";
		      $freeshipping = 1;
		      $msg ="Your Order Value is greater than $freeship.\n\n You Get Free Shipping. ";
		  }
        // for each product id get product details from table productdetails 
    	//echo " count ".$count."------".$freeship_essential;
    	if($count ==1 && $freeship_essential ==1){
	      	$shippingfees = "0.00";
	    }
        $information = array(
            'prod_details' => $jsonarray,
            'totalprice' => number_format($totalPrice, 2),
            'totalmrp' =>  number_format($totalmrp,2),
            'totalsaving' =>  number_format($totalmrp - $totalPrice, 2),
            'shippingfee' => number_format(  $shippingfees, 0)   , 
			'cgst' =>   number_format(  $cgst,  0) ,
			'sgst' =>   number_format(  $sgst,  0) ,
		    'igst' =>   number_format(  $igst,  0) ,
        	'feeshipping' => $freeshipping,
        	'minorder' => $minordervalue,
        	'cashondelivery'=>    $cashondelivery,
        	'showcgst' => $showcgst
        );
        // update product price
        if ($update_cart) {
            $oldarray     = array_values($oldarray);
            $tempnewarray = json_encode($oldarray);
            $stmt2        = $conn->prepare("UPDATE cartdetails SET prod_id=? WHERE user_id=?");
            $stmt2->bind_param(si, $tempnewarray, $user_id);
            $stmt2->execute();
            
            $rows = $stmt2->affected_rows;
            
        }
        // update cart once delete the item
        if ($update_cart_delete) {
            $oldarray     = array_values($oldarray);
            $tempnewarray = json_encode($oldarray);
            $stmt2        = $conn->prepare("UPDATE cartdetails SET prod_id=? WHERE user_id=?");
            $stmt2->bind_param(si, $tempnewarray, $user_id);
            $stmt2->execute();
            
            $rows = $stmt2->affected_rows;
            
        }
    
    }
    mysqli_close($conn);
    
    
} else {
    
    $status = 1;
    if ($langauge === "default") {
        $msg = "No Product exist on User cart";
        
    } else {
        $msg = "आप के अकाउंट में कोई प्रोडक्ट नहीं  मिला है ";
    }
    $information = array(
        'prod_details' => $jsonarray,
        'totalprice' => number_format($totalPrice, 2),
        'totalmrp' =>  number_format($totalmrp,2),
        'totalsaving' =>  number_format($totalmrp - $totalPrice, 2),
        'shippingfee' =>   '0.00', 
    	'csgt' =>   '0.00' ,
    	'sgst' =>   '0.00' ,
    	'igst' =>   '0.00' ,
    	'feeshipping' => $freeshipping,
    	'minorder' => $minordervalue,
    	'cashondelivery'=>    $cashondelivery,
    	'showcgst' => $showcgst
    );
    
    
}



$post_data = array(
    'status' => $status,
    'msg' => $msg,
    'Information' => $information
);


$post_data = json_encode($post_data);

echo $post_data;



?>
