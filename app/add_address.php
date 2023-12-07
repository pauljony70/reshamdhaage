<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$user_id =  htmlentities($_POST['user_id'] );
$fullname =  htmlentities($_POST['fullname'] );
$email =  htmlentities($_POST['email'] );
$address1 =  htmlentities($_POST['address1'] );
$address2 =  htmlentities($_POST['address2'] );
$landmark =  htmlentities($_POST['landmark'] );
$city =  htmlentities($_POST['city'] );
$state =  htmlentities($_POST['state'] );
$pincode =  htmlentities($_POST['pincode'] );
$phone =  htmlentities($_POST['phone'] );

// remove back slash from the variable if any...

$langauge =  stripslashes($language); 
$securecode =   stripslashes($securecode);  //   "1234567890";//
$user_id =   stripslashes($user_id);  // "12";//
$fullname =   stripslashes($fullname);
$email =   stripslashes($email);
$address1 =  stripslashes($address1);
$address2 =  stripslashes($address2);
$landmark =  stripslashes($landmark);
$city =   stripslashes($city);
$state =  stripslashes($state);
$pincode = stripslashes($pincode);
$phone =  stripslashes($phone);


//echo "  outside ";

if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($fullname)  && !empty($fullname) && !empty($user_id) ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	date_default_timezone_set("Asia/Kolkata");
	$date = date("Y-m-d");
	
	
	$jsonarray =  array();
	$addressid_count =1;
	
	$status =0;
	if($langauge ==="default"){
    	$msg ="fail to add User Address";
        $information = "fail to add User Address";
	    
    }else{
    	$msg ="यूजर का पता जोड़ने में असफल है|";
        $information ="यूजर का पता जोड़ने में असफल है|"; 

	}
	
	//echo "inside if";
	// check userID exist or not
	$notExist = true;

	$rowUser_id = 0;
	$rowAddressArray = array();
	$org_rowAddressArray = array();
    $pincodeexist = false;

	 $stmt4 = $conn->prepare("SELECT name FROM pincode WHERE pincode=?");
	 $stmt4 ->bind_param(i, $pincode);
	 $stmt4->execute();
	 $stmt4->store_result();
	 $stmt4->bind_result ( $col31);
	 
	 while($stmt4->fetch() ){
	 
	 	$pincodeexist = true;
				
	 }
	 if($pincodeexist){

	 $stmt = $conn->prepare("SELECT user_id, addressarray, org_addressarray FROM address WHERE user_id=?");
	 $stmt ->bind_param(i, $user_id);
	 $stmt->execute();
	 $stmt->store_result();
	 $stmt->bind_result ( $col1, $col2, $col3);
	 
	 while($stmt->fetch() ){
	 
	 		$notExist = false;

	 		$rowUser_id = $col1;
	 		$rowAddressArray = $col2;
	 		$org_rowAddressArray = $col3;
	 		
	 					
	 }
	
	 
	 if( $notExist){
			
		// create product id json array-
		/*$org_oldarray = json_decode( 	$org_rowAddressArray, true) ;
	  	
	  	foreach($org_oldarray as $arraykey) {
			 //  echo "prod id ".$arraykey['prod_id'];
			   
			   $addressid_count = $addressid_count+1;
		}
		*/
		$address_json_array[0] =	array(
		 			 'address_id' => $addressid_count,
		 			 'fullname' => $fullname,
		 			 'email' => $email,
		 			 'address1' => $address1,
		 			 'address2' => $address2,
		 			 'landmark' => $landmark,
		 			 'city' => $city,
		 			 'state' => $state,
		 			 'pincode' =>$pincode,
		 			 'phone' => $phone );
		 			 
		//echo " prod array is ".	json_encode( $prod_json_array );
		 
		 $address_jsonarray = json_encode( $address_json_array );
	    // push into org array
	 //   array_push( $org_oldarray , $newjsonObject   );
	//	$tempnewarray_org = 	 json_encode( $org_oldarray);
	 	 
		// add prod id into cartdetails table
	
	
	 	 $stmt2 = $conn->prepare("INSERT INTO address ( user_id, addressarray, defaultaddress, org_addressarray, pincode  )  VALUES (?,?,?,?,?)");
		 $stmt2->bind_param( isisi, $user_id, $address_jsonarray, $addressid_count, $address_jsonarray,$pincode );
		 $stmt2->execute();
		 
		
		//if(!empty($stmt2->insert_id)){
		
			//echo "  insert sus ";
		
			$status =1;
			if($langauge ==="default"){
            	$msg ="Successfully added user address";
    			$information = "Successfully added user address";
    			    
            }else{
            	$msg ="पता सफलतापूर्वक जुड़ गया है ";
                $information = "पता सफलतापूर्वक जुड़ गया है ";
        
        	}
				
		//}
	
	 
	 
	 }else{
	   /// yes userid exist
	   	
	   			 
	  	$oldarray = json_decode( $rowAddressArray, true) ;
	  	
	  	$org_oldarray = json_decode( 	$org_rowAddressArray, true) ;
	  	
	  	
	  	foreach($org_oldarray as $arraykey) {
			 //  echo "prod id ".$arraykey['prod_id'];
			   
			   $addressid_count = $addressid_count+1;
			   
		  }
		  
		  $newjsonObject = array(
            		 			 'address_id' => $addressid_count,
            		 			 'fullname' => $fullname,
            		 			 'email' => $email,
            		 			 'address1' => $address1,
            		 			 'address2' => $address2,
            		 			 'landmark' => $landmark,
            		 			 'city' => $city,
            		 			 'state' => $state,
            		 			 'pincode' =>$pincode,
            		 			 'phone' => $phone );
            	 	
		  
		 array_push( $oldarray , $newjsonObject   );
		 array_push( $org_oldarray , $newjsonObject   );
		  	 
		 $tempnewarray = 	 json_encode( $oldarray);
		 $tempnewarray_org = 	 json_encode( $org_oldarray);
	 			  
	 	 $stmt2 = $conn->prepare("UPDATE address SET addressarray=?, defaultaddress=?, org_addressarray=?, pincode=? WHERE user_id=?");
		 $stmt2->bind_param( sisii, $tempnewarray, $addressid_count,$tempnewarray_org, $pincode, $user_id );
		 $stmt2->execute();
		
		 
		$rows=$stmt2->affected_rows;
			//echo " row ".$rows;
			
			if($rows>0){	
			   		//echo " row affected is ".;
				   	$status =1;
				 	if($langauge ==="default"){
                        $msg = "Address Added successfully.";
    				 	$information = "Successfully added user address";
    			    	
        				    
                    }else{
                    	$msg = "पता सफलतापूर्वक जुड़ गया है ";
				 	    $information = "पता सफलतापूर्वक जुड़ गया है ";
			    	
                	}	
			
			
			}else{
			
			
				$status =0;
			 	if($langauge ==="default"){
                    $msg = " Fail to add new address.";
    			 	$information = "Fail to add new address.";
    				    
                }else{
                	$msg ="यूजर का पता जोड़ने में असफल है|";
                    $information = "यूजर का पता जोड़ने में असफल है|";
            
            	}
			
			}
	 	
		  
		  
	  
	 } // useer address array else
	 
	 }else{
	     // pincode exist false
	     
	 	        $status =0;
			 	if($langauge ==="default"){
                    $msg = "Product delivery is not available in your area.";
    			 	$information = "Product delivery is not available in your area.";
    				    
                }else{
                	$msg ="आप के एरिया में अभी डिलीवरी उपलब्ध नहीं है कृपया दूसरा पता लिखे";
                    $information = "आप के एरिया में अभी डिलीवरी उपलब्ध नहीं है कृपया दूसरा पता लिखे";
            
            	}
			
	     
	 }
	
	$post_data = array(
	 			 'status' => $status,
	 			 'msg' => $msg,
	 			 'Information' => $information );
	 	
	 	
	 $post_data= json_encode( $post_data );
	 	
	 echo $post_data;
	 	
	 mysqli_close($conn);
	



}

	
?>	
	