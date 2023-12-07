<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$user_id =  htmlentities($_POST['user_id'] );
$order_id = htmlentities($_POST['order_id'] );

// remove back slash from the variable if any...
$langauge =  stripslashes($language); 
$securecode =  stripslashes($securecode);  //  "1234567890";//
$user_id =    stripslashes($user_id);
$order_id =  stripslashes($order_id);

	$orderid ="";
	$address = "";
	$price ="";
	$date ="";
	$orderstatus ="";  $paymentmode = "";
	$curriername       = "";
    $trackid           = "";
	$status =0;
	if($langauge ==="default"){
    	$msg ="invalid order id";
    	    
    }else{
    	$msg ="invalid order id";
	}
	$information = array();
	$prodJsonarray_new = array();
	$i =0;
    $subtotal = 0.00;
    $shiparray = array();
    $prod_array = array();
    $nettotal = 0.00;
    $cgst =0.00; $sgst =0.00; $igst =0.00;
	
	$count =0;
	$emptyorderhistory = true;
	
if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)  && !empty($user_id) && !empty($order_id)  ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}

	 $stmt = $conn->prepare("SELECT sno, prod_details, address_id, total_price, create_date, status, delivery_mode, curriername, trackid FROM orders WHERE user_id=? AND order_id=?");
	 $stmt ->bind_param(is, $user_id, $order_id);
	 $stmt->execute();
	 $stmt->store_result();
	 $stmt->bind_result ($col00, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8);
	 
	 while($stmt->fetch() ){
	 
	 	//	echo " sno-- ".$col00;
	 		$emptyorderhistory = false;
			$prod_array  = $col1;
	 		$address  = $col2;
	 	//	$price  = number_format(  $col3, 2) ;
	 	
            $timestamp = strtotime($col4);
            $new_date  = date('d-m-Y', $timestamp);
	 		$date   = $new_date;
	 		$orderstatus = $col5;
	 		$paymentmode = $col6;
	 		$curriername = $col7;
            $trackid     = $col8;
	 
	 }	
	
	  // get prod name from table product details using prod id
		  
		$prodJsonarray = json_decode( $prod_array , true) ;
	  	
	  	$prodIDexist = false;
	  	$countobj =0;
	  	//echo " prodjsonarray ". $prodJsonarray;
	  
	  	
	  	 foreach($prodJsonarray as $arraykey) {
			 
			 $prod_id = $arraykey['prod_id'];
			 $msgoncake = $arraykey['msgoncake'];
	 		 $eggless = $arraykey['eggless'];
			// echo " prod id is ". $prod_id;
			
		//	$subtotal =  $subtotal  + $arraykey['price'] * $arraykey['qty'];
			
			 $stmt = $conn->prepare("SELECT prod_img, prod_name, qty, prod_price, cgst, sgst, igst, shipping, total, status, status_date, refund_amt, refund_txnno, refund_date, pickup_date, return_status, return_reason FROM order_product WHERE order_id=? AND prod_id=?");
			 $stmt ->bind_param(si, $order_id, $prod_id);
			 $stmt->execute();
			 $stmt->store_result();
			 $stmt->bind_result ( $col20, $col21, $col22, $col23, $col24, $col244, $col2444, $col25, $col26, $col27, $col28, $col29, $col30, $col31, $col32, $col33, $col34);
			 
			 while($stmt->fetch() ){
			 			
			 		//array_push($prodJsonarray[$countobj]['image'],  $col5);
		         $prodJsonarray[$countobj]['prod_img'] =  $col20;
				 $prodJsonarray[$countobj]['prod_name'] =  $col21;
				 $prodJsonarray[$countobj]['qty'] =  $col22;
				 $prodJsonarray[$countobj]['total'] =  $col26;
				 $prodJsonarray[$countobj]['prodstatus'] =  $col27;
			     $prodJsonarray[$countobj]['status_date'] = date('d-m-Y', strtotime($col28));
			     $prodJsonarray[$countobj]['refundamt'] = $col29;
			     $prodJsonarray[$countobj]['refundtxnno'] = $col30;
			     $prodJsonarray[$countobj]['refunddate'] = date('d-m-Y', strtotime($col31));
			     $prodJsonarray[$countobj]['pickupdate'] = date('d-m-Y', strtotime($col32));
			     $prodJsonarray[$countobj]['returnstatus'] = $col33;
			     $prodJsonarray[$countobj]['returnreason'] = $col34;
			     $prodJsonarray[$countobj]['msgoncake'] =  $msgoncake;
			     $prodJsonarray[$countobj]['eggless'] =  $eggless;
			     
				 $shiparray[$i] = $col25;
                 $subtotal =  $subtotal + ($col23 * $col22);
                 $cgst = $cgst + (($col23 * $col22) * $col24)/100;
                 $sgst = $sgst + (($col23 * $col22) * $col244)/100;
                 $igst = 0 ; //$igst + (($col23 * $col22) * $col2444)/100;
                
                $i = $i+1;
				
			}
			 $status = 1;
			 $msg =" order product details is here";
			
			$countobj = $countobj+1;
			   
		  } // foreach close
	
	if($emptyorderhistory == true){
	    $prodJsonarray_new =array();
	}else{	 
	 $prodJsonarray_new =  $prodJsonarray ;
    }// echo "new array ".  $prodJsonarray_new;
 	
 	  $tempaddress       = "";
        $finaladddress     = "";
        // get user address using address id
        $stmt2             = $conn->prepare("SELECT org_addressarray FROM address WHERE user_id=?");
        $stmt2->bind_param(i, $user_id);
        $stmt2->execute();
        $stmt2->store_result();
        $stmt2->bind_result($col5);
        while ($stmt2->fetch()) {
            $tempaddress = $col5;
        }
        $oldarray    = json_decode($tempaddress, true);
        $prodIDexist = false;
        foreach ($oldarray as $arraykey) {
            if ($arraykey['address_id'] === $address) {
                //$finaladddress = $arraykey['address1'] . " " . $arraykey['address2'] . " " . $arraykey['city'] . " " . $arraykey['state'] . " " . $arraykey['pincode'] . "\nPhone- " . $arraykey['phone'];
           
                 $finaladddress = array(
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
        // store complete address in address variable
        $address             = $finaladddress;
        
 
 	

// echo " ship ".max($shiparray). "-- subtatal ".$subtotal. " tax --".$tax; 
  $ordertotal = $subtotal  + max($shiparray);
// echo "grand total ".$grandtotal;
 	  
 	$post_data = array(
         			'status' => $status,
         			'msg' => $msg,
         			'orderid' => $order_id,
         			'orderstatus' => $orderstatus, 
         			'orderdate' => $date,
         			'paymentmode' =>$paymentmode ,
         			'curriername' => $curriername,
                    'trackid' => $trackid,
         			'shippingaddress' => $address,
         		    'Information' => $prodJsonarray_new,
         			'subtotal' =>   number_format( $subtotal, 2) ,
        			'shippingfee' =>     number_format( max($shiparray), 2), 
        			'discountvalue' => "0.00",
        			'cgst' =>   number_format(  $cgst,  2) ,
        			'sgst' =>   number_format(  $sgst,  2) ,
        			'igst' =>   number_format(  $igst,  2) ,
        			'grandtotal' =>  number_format(  $ordertotal, 2),
        			'totalitem' => $countobj);
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 		mysqli_close($conn);
 }

 	
 		

?>