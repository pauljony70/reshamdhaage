<?php


$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$user_id =  htmlentities($_POST['user_id'] );
$default_addressid =  htmlentities($_POST['default_addressid'] );
$pincode =  htmlentities($_POST['pincode'] );

$langauge =  stripslashes($language); 
$securecode = stripslashes($securecode);  //  "1234567890";//
$user_id =   stripslashes($user_id);
$default_addressid =   stripslashes($default_addressid);
$pincode =   stripslashes($pincode);

if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)  && !empty($user_id) && !empty($default_addressid)  ) {
include('db_connection.php');
global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	
	$status =0;

	if($langauge ==="default"){
    	$msg ="Address update failed.";
				    
    }else{
    	$msg ="Address update failed";
    }
    
	
    $stmt2 = $conn->prepare("UPDATE address SET defaultaddress=?, pincode=? WHERE user_id=?");
	$stmt2->bind_param( iii, $default_addressid, $pincode, $user_id );
	$stmt2->execute();
		
	$rows=$stmt2->affected_rows;
		
		if($rows>0){	
			   		//echo " row affected is ".;
				   	$status =1;
				 	if($langauge ==="default"){
                        $msg = "Address Update successfully.";
    				 	$information = "Successfully update user address";
    			    	
        				    
                    }else{
                    	$msg = "पता अपडेट हो गया है";
				 	    $information = "पता अपडेट हो गया है";
			    	
                	}	
			
			
		}else{
			
			
				$status =0;
			 	if($langauge ==="default"){
                    $msg = " Fail to update address.";
    			 	$information = "Fail to update address.";
    				    
                }else{
                	$msg ="पता अपडेट नहीं हुआ है";
                    $information = "पता अपडेट नहीं हुआ है";
            
            	}
			
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