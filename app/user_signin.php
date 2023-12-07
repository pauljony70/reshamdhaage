<?php

include('db_connection.php');

$language =  htmlentities($_POST['language'] );
$phone =  htmlentities($_POST['phone'] );
$password =  htmlentities($_POST['password'] );
// remove back slash from the variable if any...

$langauge =  stripslashes($language); 
$phone =  stripslashes($phone);  //  "1234567890";//
$password = "Isc@gala@324mart@df";// stripslashes($password);  //  "pass1234";  //



if(isset($langauge)  && !empty($langauge) && isset($phone) && isset($password)  && !empty($phone) && !empty($password)  ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	date_default_timezone_set("Asia/Kuwait");
	$date = date("Y-m-d");
	$status =0;
    $userid =""; $wallet ="0";
	//$msg ="Invalid login";
	if($langauge ==="default"){
        	$msg ="Invalid login";
    	    
    }else{
        	$msg ="Invalid login";
    	    
	}	
	$Information =  array( 'user_id' => "",
	 			'fullname' => "",
	 			 'email' => "",
	 			 'phone' => "",
	 			 'wallet' => $wallet) ;
	
	// ORDER BY id ASC|DESC;
   
 	$stmt = $conn->prepare("SELECT user_id, full_name, phone_no, email, interestid FROM user_profile WHERE phone_no =? AND password=?");
 	$stmt-> bind_param("ss", $phone, $password);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col1, $col2, $col3, $col4, $col5);
 
 	while($stmt->fetch() ){
 	
 			//echo "  stam extecute ".$col1."  user password is ".$password;
 				$status =1;
 				$userid = $col1;
 				
					
			//	$msg ="successful login";
				if($langauge ==="default"){
                    	$msg ="successful login";
                	    
                }else{
                	   	$msg ="ಯಶಸ್ವಿ ಲಾಗಿನ್";
                	    
            	}	
				$Information =   array( 'user_id' => $col1,
	 			 			  'fullname' => $col2,
	 			 			   'email' => $col4,
	 			 			   'phone' => $col3,
	 			 			   'wallet' => $wallet,
	 			 			   'interestid' => $col5) ;
 			
 	}
  	
 
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'Information' => $Information );
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 	mysqli_close($conn);

 }	

?>