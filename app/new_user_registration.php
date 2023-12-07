<?php

include('db_connection.php');

//echo "php ser".phpversion();
// fullname, phone, username, password;
$language =  htmlentities($_POST['language'] );
$fullname =  htmlentities($_POST['fullname'] );
$email =  htmlentities($_POST['email'] );
$phone =  htmlentities($_POST['phone'] );
$username =  htmlentities($_POST['username'] );
$password =  htmlentities($_POST['password'] );
$interestid =  htmlentities($_POST['interestid'] );
// remove back slash from the variable if any...

$langauge =  stripslashes($language);
$fullname =  stripslashes($fullname);  //  "kamal B"; //
$email =  stripslashes($email); 
$phone =   stripslashes($phone);  //  
$username =  stripslashes($username);  // " kamalbunkar123"; //
$password =  "Isc@gala@324mart@df";// stripslashes($password);  //  "test123";  //
$interestid =   stripslashes($interestid);

//echo " hehei-".$langauge."--".$fullname."--".  $email."--".  $phone."--".  $username ."--". $password."--".  $interestid;
if(isset($langauge)  && !empty($langauge) && isset($phone) && isset($password)  && !empty($phone) && !empty($password)  ) {
//echo "  inside" ;
global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	date_default_timezone_set("Asia/Kuwait");
	$date = date("Y-m-d");
	$status =0;
	$msg ="";
	$wallet =0;
	// check whether user phone number already exist or not?
	$notExist = true;
	
	$stmt11 = $conn->prepare("SELECT user_id FROM user_profile WHERE phone_no =?");
	$stmt11->bind_param( s, $phone);
	 $stmt11->execute();
	 $stmt11->store_result();
	 $stmt11->bind_result ( $col1);
	 	
	 while($stmt11->fetch() ){
	 	
	 	$notExist = false;			
	 }
	  	
	// echo "  not exist value is ".$notExist;	
	
	
	if($notExist)
	{
	
		
		/// get last user id 
	
	 	$stmt = $conn->prepare("SELECT user_id FROM user_profile ORDER BY sno DESC LIMIT 1");
	 	$stmt->execute();
	 	$stmt->store_result();
	 	$stmt->bind_result ( $col1);
	 	$rowsno = 10000;
	 	
	 	while($stmt->fetch() ){
	 	
	 			$rowsno = $col1;			
	 	}
	  	
	 	$rowsno = $rowsno +1;
	 	$address ="";
	 	$email = "";
	 	//echo "row id is ".$rowsno."  fullname ". $fullname."  addrs ".$address." phone --". $phone."  date ". $date  ;
	 	
	 	$stmt2 = $conn->prepare("INSERT INTO user_profile( full_name, address, email, phone_no, password, user_id, date, interestid )  VALUES (?,?,?,?,?,?,?,?)");
	 	$stmt2->bind_param( sssssisi, $fullname,  $address, $email, $phone, $password, $rowsno, $date, $interestid );
	 //	$stmt2->execute();
	 	
	 	// echo " insert row id is  ".$stmt2->insert_id;
	 	
	 	
	 	if($stmt2->execute()){
	 	 	$status =1;
		 //	$msg = "New User registered Successfully";
		 	if($langauge ==="default"){
            	$msg ="New User registered Successfully";
        	    
        	}else{
            	$msg ="New User registered Successfully";
        	    
        	}
		 	$userid = $rowsno;
	 	
	 		// echo " insert username password row id is  ".$stmt3->insert_id;
	 	}else {
	    	if($langauge ==="default"){
            	$msg ="Failed to register new user";
        	    
        	}else{
            	$msg ="Failed to register new user";
        	    
        	}
	 	//	$msg = "Failled to register new user";
	 		$userid = "";
	 	}
	 	
	 	
	 	$post_data = array(
	 			 'status' => $status,
	 			 'msg' => $msg,
	 			 'Information' => array( 'user_id' => $userid,
	 			 			  'fullname' => $fullname,
	 			 			   'email' => $email,
	 			 			   'phone' =>$phone,
	 			 			   'wallet' => $wallet,
	 			 			   'interestid' => $interestid)
	 			 
	 			                                                 );
	 	
	 	
	 	$post_data= json_encode( $post_data );
	 	
	 	echo $post_data;
	 	
	 	mysqli_close($conn);
 	
 	}else{
 	
 		if($langauge ==="default"){
            	$msg ="user already exist. Please try to signin";
        	    
        }else{
            	$msg ="user already exist. Please try to signin";
        	    
        }
 		$post_data = array(
	 			 'status' => 0,
	 			 'msg' => 	$msg,
	 			 
	 			 'Information' => array( 'user_id' => "",
	 			 			  'fullname' => "",
	 			 			   'email' => "",
	 			 			   'phone' =>"" ,
	 			 			   'wallet' => $wallet,
	 			                'interestid' => $interestid)
	 			                                                 );
	 	
	 	
	 	$post_data= json_encode( $post_data );
	 	
	 	echo $post_data;
 	
 	}

 }	else {
	echo "missing";
 }

?>