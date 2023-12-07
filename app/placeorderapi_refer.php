<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$user_id =  htmlentities($_POST['user_id'] );
$paymentorder_id =  htmlentities($_POST['paymentorder_id'] );
$payment_id =  htmlentities($_POST['payment_id'] );
$address_id =  htmlentities($_POST['address_id'] );
$total_price =  htmlentities($_POST['total_price'] );
$qoute_id =  htmlentities($_POST['qoute_id'] );
$deliverymode =  htmlentities($_POST['deliverymode'] );
$extraship =  htmlentities($_POST['extraship'] );
$deliveryid =  htmlentities($_POST['deliveryid'] );
$walletcoins =  htmlentities($_POST['walletcoins'] );
$discountvalue =  htmlentities($_POST['discountvalue'] );
$discountid =  htmlentities($_POST['discountid'] );
$shipping =  htmlentities($_POST['shipping'] );
// remove back slash from the variable if any...

$langauge =  stripslashes($language);  
$securecode =   stripslashes($securecode);  //   "12345"; //
$user_id =    stripslashes($user_id);  //"10010"; //
$paymentorder_id =  stripslashes($paymentorder_id); // "orderid124534"; //
$payment_id =  stripslashes($payment_id );  // "pay id 2548" ;  ///
$address_id =  stripslashes($address_id );  //  "1"; //
$total_price =  stripslashes($total_price ); //  "150"; //
$qoute_id =  stripslashes($qoute_id );  // "1001"; //
$deliverymode =   stripslashes($deliverymode );
$extraship =   stripslashes($extraship );
$deliveryid =   stripslashes($deliveryid );
$walletcoins =  stripslashes($walletcoins );
$discountvalue =   stripslashes($discountvalue );
$discountid =   stripslashes($discountid );
$shippingstate =  stripslashes($shipping );

//echo "  outside ";
 $total_price = str_replace(",", '', $total_price);
 $total_price = str_replace("KD ", '', $total_price);
 
 			
		$store_open_status =""; 
		 $stmt11 = $conn->prepare("SELECT name, value FROM store_config");
		 $stmt11->execute();
		 $stmt11->store_result();
		 $stmt11->bind_result (  $col11, $col12); 
		 
		 while($stmt11->fetch() ){
		   //  echo " order id ".$col1;
			if($col11 =="store_open_status"){
				if($col12 == 0)
				{
					$store_open_status  = 'Open';
				}
				else
				{
					$store_open_status  = 'Close';
				}
				
			}
		 }
		 
		if($store_open_status == 'Close')
		{
			$msg ="Store is Closed Now. Please Try After Some Time.";
			$Information = array(  'status' => $msg,
	 			'orderId' => "" );
				
			$status =0;
		    	$post_data = array(
            	 			 'status' => $status,
            	 			 'msg' => $msg,
            	 			 'Information' => $Information );
            	 	
            	 	
            	 $post_data= json_encode( $post_data );
            	 	
            	 echo $post_data;
            	 	
            	 mysqli_close($conn);
			
		}
	

else if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($address_id)   && !empty($user_id) && !empty($payment_id) && !empty($paymentorder_id)) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	date_default_timezone_set("Asia/Kuwait");
    $date = date("Y-m-d H:i:s");

    $cust_phone ="";
    $cust_email ="";
    
    $totalprice ="";
    $totalcgst = "";
    $totalsgst = "";
    $totalship = "";
	$status =0;
	if($langauge ==="default"){
        $msg ="Transaction has failed. Please try again";
		    
    }else{
    	$msg ="ट्रांसक्शन विफल हो गया है। कृपया पुन: प्रयास करें";
	}
	$Information = array(  'status' => $msg,
	 			'orderId' => "" );
	 $prod_details = "";   $prodother_attr =""; $prod_pricearray="";
	 			
	$orderstatus ="Placed"; 			
	
	 $stmt = $conn->prepare("SELECT prod_id FROM cartdetails WHERE user_id=?");
	 $stmt ->bind_param(i, $user_id);
	 $stmt->execute();
	 $stmt->store_result();
	 $stmt->bind_result ( $col1);
	 
	 while($stmt->fetch() ){
	 
	 		$prod_details = $col1;	
	 					
	 }
	 	
	  $orderid= 100000;
	 $stmt5 = $conn->prepare("SELECT order_id FROM orders ORDER BY order_id DESC Limit 1");
	// $stmt5 ->bind_param(i, $user_id);
	 $stmt5->execute();
	 $stmt5->store_result();
	 $stmt5->bind_result ( $col51);
	 
	 while($stmt5->fetch() ){
	 
	 		 $orderid = $col51;	
	 					
	 }
	  $orderid =  $orderid + 1;
	 $total_price =   number_format(  $total_price,  2,'.', '');
	// add  into orders table
	 	 $stmt2 = $conn->prepare("INSERT INTO orders (order_id, user_id, status, prod_details, address_id, total_price, payment_orderid, payment_id, delivery_mode, qoute_id, create_date, update_date, deliveryid, walletcoins , discountid, discountvalue)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		 $stmt2->bind_param( sissidsssisssiii, $orderid, $user_id,  $orderstatus, $prod_details, $address_id, $total_price, $paymentorder_id, $payment_id, $deliverymode, $qoute_id, $date, $date, $deliveryid, $walletcoins, $discountid, $discountvalue);
		 $stmt2->execute();
		 $stmt2->store_result();
		 
		// echo " insert row ".$stmt2->insert_id;
		
		if(!empty($stmt2->insert_id)){
		        // $prod_details
		        // if payment done by wallet tthen first make entry
		         
		            $prodarray = json_decode( $prod_details, true) ;
                	$i =0;
            	  	 foreach( $prodarray as $arraykey) {
            			 //  echo "<br>--size ".$arraykey['qty']."--".$arraykey['price'];
            	
	  	                // echo " prod array  ".$arraykey['prod_id'];
                               $subtotal = $arraykey['price'];
                               $subtotal = str_replace(",", '',  $subtotal ); 
                               $sno =$arraykey['prod_id'];
                               $qty = $arraykey['qty'];
                               $price = $arraykey['price'];
                               $price  = str_replace(",", '',   $price );
                               $size = $arraykey['size'];
                               $color = $arraykey['color'];
                               $msgoncake = $arraykey['msgoncake'];
	 					       $eggless = $arraykey['eggless'];
                               $referid = $arraykey['referid']; 
                              // $price =  number_format(  $price ,  2) ;
                               
                        		$stmt2 = $conn->prepare("SELECT prod_name, prod_img_url, cgst, sgst, igst, shipping, coins, pricearray, sellername FROM productdetails WHERE prod_id =?");
                             	$stmt2-> bind_param(i,  $sno);
                             	$stmt2->execute();
                             	$stmt2->store_result();
                             	$stmt2->bind_result ( $col21,$col22, $col23,$col233, $col2333, $col24, $col25, $col26, $col27);
                          
                             	while($stmt2->fetch() ){
                             	 //  echo " ---".$col23;
                             	   //   echo "--inside ".$arraykey['size']."--".$arraykey['color'];
                             	      $refercoins = $col25;
                             	     	$imgarray = json_decode( $col22, true) ;
                            	       	$imageurl =""; $count =1;
                                	  	 foreach($imgarray as $arraykeyyy) {
                                			   if( $count === 1 ){
                                			   	$imageurl = "../media/".$arraykeyyy['url'];
                                			   	 $count++;
                                			   }
                                		  }
                                
                             	    $attr ="Size : ".$size." | Color : ".$color." | Eggless : ".$eggless." | MSG : ".$msgoncake;
                             	     // for stock qty decrease after order placed
                             	     $prod_pricearray =$col26; 
                             	   
                             	    //--------
		                                $prod_name = $col21;
		                                $cgst = $col23;  $sgst = $col233;  $igst = $col2333; 
		                                $stockistname = $col27;
		                              
		                                
		                               /* if($shippingstate==="0.00"){    /// getuseraddress se shipping fees decide hogi.
		                                     $shipping = $shippingstate;
		                                     $extraship ="0.00";
		                                }else{
		                                    $shipping = $col24;     
		                                }
		                                */
		                               
		                              
		                              $totalprice = $totalprice+ ($price * $qty);
		                              $totalcgst = $totalcgst + ($price * $qty) - (($price * $qty) * 100) / (100+ $cgst) ; 
    			                      $totalsgst = $totalsgst + ($price * $qty) - (($price * $qty) * 100) /(100 + $sgst);
    			                      $totalship =  $shipping ;
	                         	//	  $ordertotal = $subtotal  + $cgst + $sgst+ $igst  + max($shiparray);

		                             $total = ($price * $qty) ; //+ (($price * $qty) * $cgst )/100 + (($price * $qty) * $sgst )/100+ (($price * $qty) * $igst )/100 ;
		                              $total =  number_format(  $total,  2,'.', ''); 
		                              $price =  number_format(  $price,  2,'.', ''); 
		                              $shipping =  number_format( $shipping,  2,'.', '');
		                              
                    		    	 $stmt3 = $conn->prepare("INSERT INTO order_product (order_id, user_id, prod_id, prod_name, prod_img, prod_attr, qty, org_qty, prod_price, cgst, sgst, igst,  shipping, total, create_date, update_date, sellername )  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                            		 $stmt3->bind_param( siisssiiddddddsss, $orderid, $user_id, $sno, $prod_name, 	$imageurl, $attr, $qty, $qty, $price, $cgst, $sgst, $igst, $shipping, $total, $date, $date, $stockistname);
                            		 $stmt3->execute();
                            		 $stmt3->store_result();
                            		 
                            		 if(!empty($stmt3->insert_id)){
                            		 
                            		    
                                			$status =1;
                                			if($langauge ==="default"){
                                                $msg ="Order has placed Successfully.";
                                		    	$txtmsg = "We will send you an email and SMS about your order confirmation with details.";
                                				    
                                            }else{
                                                $msg ="Order has placed Successful.";
                                		    	$txtmsg = "We will send you an email and SMS about your order confirmation with details.";
                                		
                                                
                                            }
                                			$Information =  array(  'status' => $txtmsg,
                                	 					'orderId' => $orderid );
                                	 					
                                	 		/// delete user cart details from cartdetails table	
                                	 		 $stmt7 = $conn->prepare("DELETE FROM cartdetails WHERE user_id=?");
                                			 $stmt7 ->bind_param(i, $user_id);
                                			 $stmt7->execute();
                                			 
                                			 // get user email and phone
                                			 
                                			    $stmt4 = $conn->prepare("SELECT addressarray FROM address WHERE user_id=?");
                                            	 $stmt4 ->bind_param(i, $user_id);
                                            	 $stmt4->execute();
                                            	 $stmt4->store_result();
                                            	 $stmt4->bind_result ( $col41);
                                            	 
                                            	 while($stmt4->fetch() ){
                                            	 
                                            	 		 $adrarray = json_decode(  $col41, true) ;
	  	                 
                                                           foreach($adrarray as $adrkey) {
                                                            //   echo " col8 - ".$col8. "--".$arraykey['address_id'];
                                                        		 if( $address_id == $adrkey['address_id']){
                                                        		     
                                                        		     $cust_phone =$adrkey['phone'];
                                                        		     $cust_email = $adrkey['email'];
                                                        		   
                                                        		     
                                                                   // echo "phone is ".$cust_phone."---".$action;
                                                                      
                                                                     //    echo "--sms send";
                                                        		 }   
                                                           }	
                                            	 					
                                            	 }
                                            
                                              // decrese stock---
                                             $stmt65 = $conn->prepare("UPDATE productdetails SET stock= stock-? WHERE prod_id =?");
                                        	 $stmt65->bind_param( ii, $qty, $sno );
                                             $stmt65->execute();  
                                             
                                             
                            		 ///------------    
                            	  // descrease stock qty
                                    $jsonobj=    json_decode($prod_pricearray, true);
                                        
                                      //  $color = str_replace(' ','',$color);
                                     //   for($xi =0; $xi<  count($prodcolor); $xi++ ){
                                     	$x =0; 
                                	  	 foreach($jsonobj as $jsonobjkey) {                                            
                                            //echo " item--".$prodcolor[$xi]."--".$color."--";
                                           if( $size === $jsonobjkey['attrnam'] ){
			 
			                                    	$jsonobj [$x] ['attrstockvalue'] = $jsonobjkey['attrstockvalue'] - $qty;
			                                    
			                                    	 $tempnewarray = 	 json_encode( $jsonobj);
                                              	   // echo " temparray ".$tempnewarray;
                            		                // update query here
                            		                $stmt18 = $conn->prepare("UPDATE productdetails SET pricearray=? WHERE prod_id=?") ;
                                            		$stmt18->bind_param( si, $tempnewarray, $sno);
                                            	    $stmt18->execute();
                                        		    $rows=$stmt18->affected_rows;
                                        		   
                                            }
                                        
                                	  	     $x ++; 
                                	  	 }// for each close
                                	  // decrease stock close here
                                				    
                            		 }else{  // insert into order product sql if else part
                            		     	$status =1;
                                		
                            		 }
                            		 ///------------    
                            		 
                             	  
                             	} // get productdetails sql close
                             $i= $i+1;
            	  	 }// foreach close 
            	  	 
            $post_data = array(
            	 			 'status' => $status,
            	 			 'msg' => $msg,
            	 			 'Information' => $Information );
            	 	
            	 	
            	 $post_data= json_encode( $post_data );
            	 	
            	 echo $post_data;
            	 	
            //	 mysqli_close($conn);
            	 
            // SMS order status
              $action = "Your Order has been Placed Successfully. Order Id is ".$orderid. " and Total price is Rs. ".$total_price;           		     
            	    
          // 	echo " order is ".$action.$cust_phone;
		    include('../admin/send_otp.php');
            sendotp( $cust_phone, $action);  
            
          $totalcgst =  number_format(  $totalcgst,  2,'.', ''); 
		  $totalsgst =  number_format(  $totalsgst,  2,'.', ''); 
		 // $price =  number_format(  $price,  2,'.', ''); 
		                            
         // send email    
            include('../admin/send_mail.php');
            $subject ="Your Order Has Placed. Order Id is ".$orderid;
            $bodymsg = "We have received order request from You. Your order id is $orderid and Total price is  Rs. $total_price";
           // echo " emaildata -".$cust_email."---". $subject."---". $orderstatus."---".$bodymsg."---". $date."---".  $orderid."---". $totalprice."---". $totalcgst."---". $totalsgst."---". max($totalship)."---".$total_price ;
         //   send_mail( $cust_email, $subject, $orderstatus, $bodymsg, $date,  $orderid, $totalprice, $totalcgst, $totalsgst, $totalship, $total_price  );  
          //  send_mail( "kamal.bunkar07@gmail.com", "test email ", "Placed" , $bodymsg, "16-11-2018",  123456789, "200", "4", "4", "10", "218 " );  
       
       // send mail to admin
           $subject2 ="New Order Received today. Order Id is ".$orderid;
           $bodymsg2 = "New Order has received from customer. Order id is $orderid and Total price is  Rs. $total_price";
         
        //  send_mail( $g_mail, $subject2, $orderstatus, $bodymsg2, $date,  $orderid, $totalprice, $totalcgst, $totalsgst, $totalship, $total_price  );  
       
            // send sms to admin
            	$phoneExist = false;
            	$adminphone ="";
            	$stmt17 = $conn->prepare("SELECT phone FROM store_setting");
            	 $stmt17->execute();
            	 $stmt17->store_result();
            	 $stmt17->bind_result ( $col77);
            	 	
            	 while($stmt17->fetch() ){
            		$phoneExist =true;
            			$adminphone = $col77;
            	 }	  	
            		
            	if($phoneExist)
            	{
            	        $msg = "New Order Received. Order Id is ".$orderid. " and Total price is  Rs. ".$total_price;
                       sendotp( $adminphone, $msg );  
        		
                 }
                 
               
         
		    
		}else{
		    	$status =1;
		    	$post_data = array(
            	 			 'status' => $status,
            	 			 'msg' => $msg,
            	 			 'Information' => $Information );
            	 	
            	 	
            	 $post_data= json_encode( $post_data );
            	 	
            	 echo $post_data;
            	 	
            	 mysqli_close($conn);
		}
		//	echo " end of file ";

	



}


	
?>
