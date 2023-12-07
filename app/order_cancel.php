<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$orderid =  htmlentities($_POST['orderid'] );
$userid =  htmlentities($_POST['userid'] );
$prodid =  htmlentities($_POST['prodid'] );

$langauge =  stripslashes($language); 
$securecode =   stripslashes($securecode);  //  "1234567890";//
$orderid =   stripslashes($orderid);
$userid = stripslashes($userid);
$prodid =  stripslashes($prodid);
//echo "  outside ";
if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($orderid)  && !empty($orderid) && !empty($userid) && !empty($prodid) ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	
	$status =0;
	if($langauge ==="default"){
    	$msg ="Unable to do, Please try again.";
    	$Information = "Unable to do, Please try again.";
    	    
    }else{
    	$msg ="Unable to do, Please try again.";
    	$Information = "Unable to do, Please try again.";
    	    
	}
	date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d H:i:s");
   // echo "time ".date('H');
 
    $userphone ="";
   // echo "here ";//
 	$stmt = $conn->prepare("SELECT ord.status, ord.prod_details, up.phone_no, ord.create_date FROM orders ord, user_profile up WHERE ord.user_id= up.user_id AND ord.order_id=? AND ord.user_id=?");
 	$stmt-> bind_param("si", $orderid, $userid);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col1, $col2 , $col3, $col4 );

 	while($stmt->fetch() ){
 	   // echo " order ".$col1;
 	    $createdate = $col4;
        $userphone = $col3;
        
        // if order cancel after 2 days
    $date1=date_create($createdate);
    $date2=date_create($date);
    
    $diff=date_diff($date1,$date2);
    //now convert the $diff object to type integer
    $intDiff = $diff->format("%R%a");
    $intDiff = intval($intDiff);
    //now compare the two dates
   // echo " differer ".$intDiff;
    if ($intDiff >= 2)  {
      //  echo "Sorry order can't be cancel after 2 days";
        $status =0;
        $msg = "Order can't be cancel after two days.";
    }
    else {
        //echo 'cancel order done';
        $prodarray = json_decode( $col2, true) ;
         foreach( $prodarray as $arraykey) {
            			 //  echo "<br>--size ".$arraykey['qty']."--".$arraykey['price'];
            	
	  	  //   echo " prod array  ".$arraykey['prod_id'];
               $sno =$arraykey['prod_id'];
                if($col1 =="Placed"){
                    if($sno ==$prodid){
                       // echo " prod exist ";
                        $prodstatus ="Cancel";
                         $stmt11 = $conn->prepare("UPDATE order_product SET status=?, status_date=? WHERE user_id=? AND order_id=? AND prod_id=?") ;
		            	 $stmt11->bind_param( ssisi, $prodstatus, $date, $userid, $orderid, $sno);
			             $stmt11->execute();
		                 $rows=$stmt11->affected_rows;
			            //echo " row ".$rows;
            			if($rows>0){	
            			   		//echo " row affected is ".;
            				$status =1;
            				$msg = "Order item has canceled.";
                				 
            	        }else{
                            $status =0;
                            $msg = "Unable to Cancel Product this time, Please try again later.";
                        }
                        
                    }
                }else if($col1 =="Dispatch"){
                    if($sno ==$prodid){
                        $msg = "Order has Dispatch. Please Cancel Product After Delivery.";
                    }
                }else if($col1 =="Completed"){
                    if($sno ==$prodid){
                        
                         $prodstatus ="Return_init"; // return initial  /// return suc when successfull
                         $stmt11 = $conn->prepare("UPDATE order_product SET status=?, status_date=? WHERE user_id=? AND order_id=? AND prod_id=?") ;
		            	 $stmt11->bind_param( ssisi, $prodstatus, $date, $userid, $orderid, $sno);
			             $stmt11->execute();
		                 $rows=$stmt11->affected_rows;
			            //echo " row ".$rows;
            			if($rows>0){	
            			   		//echo " row affected is ".;
            				$status =1;
            				$msg = "Your request has received. Soon We will pickup the item from your address";
                				 
            	        }else{
                            $status =0;
                            $msg = "Unable to initiate return request this time, Please try again later.";
                        }
                    }
                }else if($col1 =="Cancelled"){
                      if($sno ==$prodid){
                        $msg = "Order Already Cancelled by Admin.";
                    }
                }               
         }   // foreach close
         
         
      }// if else >= 2          
 	    
 	} // while close
	
	$Information = $jsonarray;

 	
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'Information' => $msg );
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	  include('../admin/send_otp.php');
 	 if($status ==1){
 	 	  //  echo "here";
 	             $phoneExist = false; $adminphone ="";
 	             $stmt17 = $conn->prepare("SELECT phone FROM store_setting");
            	 $stmt17->execute();
            	 $stmt17->store_result();
            	 $stmt17->bind_result ( $col77);
            	 	
            	 while($stmt17->fetch() ){
            		$phoneExist =true;
            			$adminphone = $col77;
            	 }	  	
            	//	echo "herere";
            	if($phoneExist)
            	{
            	        if( $prodstatus ==="Return_init"){
            	            $msg = "User Has Initiate Request to RETURN the product. Order Id is ".$orderid;
                            
            	        }else{
            	            $msg = "User Has Cancelled the Order Number ".$orderid;
                            
            	        }
            	       // $adminphone ="9144040888";
           	          
            	        sendotp( $adminphone, $msg );  
        		
                 }
 	}
 	// send to user
 	 if($status ==1){
 	      if( $prodstatus ==="Return_init"){
          	   $msg = "We have received your request to RETURN the product. Order Id is ".$orderid;
                            
          }else{
                $msg = "Your Order $orderid Has Cancelled Successfully. Thank You.";
          }
            	              
 	      sendotp( $userphone, $msg );  
 	 }

 	mysqli_close($conn);
 	
 }
 
?>