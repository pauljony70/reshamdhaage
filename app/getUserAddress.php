<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$user_id =  htmlentities($_POST['user_id'] );
$subtotal =  htmlentities($_POST['subtotal'] );
// remove back slash from the variable if any...

$langauge = stripslashes($language); 
$securecode =  stripslashes($securecode);  //  "1234567890";//
$user_id =   stripslashes($user_id);
$subtotal =   stripslashes($subtotal);


if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)  && !empty($user_id) && !empty($subtotal)  ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	
	$status =0;
	$rowAddressJsonArray = array();
	$delivery = array();
	$notExist = true;
	$defaultaddress = 0;
	$shippingfees = "0.00";
	
	if($langauge ==="default"){
    	$msg ="No Address exist for User. Please Add New Address.";
				    
    }else{
    	$msg ="यूजर का पता मौजूद नहीं है। कृपया नया पता जोड़ें";
    }
    
	$information = array(  'address_details' => $rowAddressJsonArray,
			                        'defaultaddress' => 0 ,
			                        'deliverytime' => $delivery,
			                        'shippingfees' => $shippingfees	) ;

    // get product count in usercart then multiple it by Rs 20
    $cartProdJsonArray = array();
    $prodcount = 0;
	 $stmt11 = $conn->prepare("SELECT prod_id FROM cartdetails WHERE user_id=?");
	 $stmt11 ->bind_param(i, $user_id);
	 $stmt11->execute();
	 $stmt11->store_result();
	 $stmt11->bind_result ( $col11);
	 
	 while($stmt11->fetch() ){
	 
	 		$cartProdJsonArray = $col11;
	 }
        
     $oldarray = json_decode( $cartProdJsonArray, true) ;
	  	
	 foreach($oldarray as $arraykey) {
	     $prodcount = $prodcount+1;
	     
	 }	

	$userpincode =0;
	 $stmt = $conn->prepare("SELECT user_id, addressarray, defaultaddress, pincode FROM address ad WHERE user_id=?");
	 $stmt ->bind_param(i, $user_id);
	 $stmt->execute();
	 $stmt->store_result();
	 $stmt->bind_result ( $col1, $col2, $col3, $col4);
	 
	 while($stmt->fetch() ){
	 
	 		$notExist = false;

	 		$rowUser_id = $col1;
	 		$rowAddressJsonArray  = $col2;
	 		$defaultaddress = $col3;
	 	    $userpincode = $col4;
	 		
	 }
	 
	  // get shipping fees based on pincode
	 $stmt2 = $conn->prepare("SELECT shippingfee FROM pincode WHERE pincode=?");
	 $stmt2 ->bind_param(i, $userpincode);
	 $stmt2->execute();
	 $stmt2->store_result();
	 $stmt2->bind_result ( $col11);
	 
	 while($stmt2->fetch() ){
	    // echo " fees ".$col11;
	     $shippingfees  ="$col11";
	 }
	 
	 
	 	$minordervalue ="0";  $freeship="0";  $allindiafees = 40; 
     	$stmt3 = $conn->prepare("SELECT name, value FROM store_config");
    	// $stmt3 ->bind_param(s,$minorder);
    	 $stmt3->execute();
    	 $stmt3->store_result(); 
    	 $stmt3->bind_result ( $col31, $col32);
    	 while($stmt3->fetch() ){
    	     if($col31=="minorder"){
    	          $minordervalue = $col32;
    	     }else if($col31=="allindia_ship"){
    	          $allindiafees = $col32;
    	     }else if($col31=="freeship"){
    	          $freeship = $col32;
    	     }
    	   
    	 }

     
	//$msg = "No Product exist on User 888 cart ". $notExist ; 
	 if( $notExist ){
	 		// user didn't add any product till now
	 		$status =0;
			if($langauge ==="default"){
            	$msg ="No Address exist for User. Please Add New Address.";
				    
            }else{
            	$msg ="यूजर का पता मौजूद नहीं है। कृपया नया पता जोड़ें";
        	}
			$information = array(  'address_details' => $rowAddressJsonArray,
			                        'defaultaddress' => 0,
			                        'deliverytime' => $delivery,
			                        'shippingfees' => $shippingfees	) ;
	 
	 
	 }else {
	 
	  	$prodIDexist = false;

        $dCount =0;
    	 $stmt2 = $conn->prepare("SELECT timevalue FROM deliverytime");
    	 $stmt2->execute();
    	 $stmt2->store_result();
    	 $stmt2->bind_result ( $col21);
    	 
    	 while($stmt2->fetch() ){
    	 
    	 	$delivery[$dCount]= $col21;
    	 	$dCount = $dCount +1;				
    	 }

    // 	$delivery[9] = "7 PM to 10 PM"." - Tomorrow ".$next_date ;
     
     
    
    	  if( $subtotal >    $freeship){
		      $shippingfees = "0.00";
		   //   $msg ="Your Order Value is greater than $minordervalue.\n\n You Get Free Shipping. ";
		  }
    
		  $status =1;
		  $msg ="Address details for User";
		 	$information = array(  'address_details' => json_decode($rowAddressJsonArray),
			                        'defaultaddress' =>$defaultaddress,
			                        'deliverytime' => $delivery,
			                        'shippingfees' => $shippingfees) ;
						
						//$jsonarray;
		//  $msg = "No Product exist on ---cart ". $notExist ;
		  
	 
	 }
	 
 	mysqli_close($conn);
 		
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'Information' => $information );
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	

 }
 
 

 	
 		

?>