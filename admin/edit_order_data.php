<?php
include('session.php');
$code = $_POST['code'];
$ordersno =  $_POST['orderid'];    

$code=  stripslashes($code);
$orderid=  stripslashes($ordersno);


if(!isset($_SESSION['admin'])){
  header("Location: index.php");
 // echo " dashboard redirect to index";
}else if(isset($code) && isset($orderid)  ) {

    include('../app/db_connection.php');
    global $conn;
    try{
    
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
           $customername =""; $email =""; $shipping_ads=""; $order_id =""; $status =""; $orderdate=""; $order_update=""; $proddetails =""; 
           $customerid ="";   $delivery_mode ="";   $payment_id =""; $cust_phone=""; $cust_email="";  $deliveryid ="";
                 $subtotal=""; $ship="";  $couriername=""; $trackid=""; $wallets=""; $ord_totalprice=""; $coupancode="";
          
    	$resstatus =0;
    	$prodjsonarray = array();
       	$Information = array(  'status' => $resstatus,
	 			                'orderId' => $order_id,
	 			                'username' =>  $customername,
	 			                'custid' =>  $customerid,
	 			                'address' => $shipping_ads,
	 			                'phone' => $cust_phone,
	 			                'email' => $cust_email,
	 			                'orderstatus' => $status,
	 			                'orderdate' =>$orderdate,
	 			                'proddetails' => 	json_encode($prodjsonarray),
	 			                'deliverymode' =>$delivery_mode,
	 			                'paymentid' =>$payment_id,
	 			                'subtotal' => $subtotal,
	 			                'ship' => $ship,
	 			                'grandtotal' => $ord_totalprice,
	 			                'deliveryid' => $deliveryid,
	 			                'courier' =>$couriername,
	 			                'trackid' => $trackid,
	 			                 'wallets'=> $wallets,
	 			                 'coupancode' =>$coupancode);
	 			                
                     $seller_id =  $_SESSION['seller_id'];
                     $Exist = false;
                     $stmt11 = $conn->prepare("SELECT  odr.order_id, odr.status, odr.create_date, odr.update_date, up.full_name, up.email, adr.org_addressarray, odr.address_id, odr.prod_details, odr.delivery_mode, odr.payment_id, up.user_id, odr.curriername, odr.trackid, odr.walletcoins, odr.total_price, odr.deliveryid, odr.discountid, odr.discountvalue FROM orders odr, user_profile up, address adr WHERE odr.sno=? AND odr.user_id = up.user_id AND up.user_id = adr.user_id ORDER BY odr.order_id DESC");
                	 $stmt11 ->bind_param("i",  $orderid);
                	 $stmt11->execute();
                	 $stmt11->store_result();
                	 $stmt11->bind_result ( $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14, $col15, $col16, $col17, $col18, $col19);
                	 
                	 while($stmt11->fetch() ){
                	 //  echo " order -".$col1."--".$col2."--".$col3."--".$col4."--".$col5."--".$col6."--".$col9."***";
                	   $proddetails = $col9;
                	 
                	   $resstatus =1;
                	    $orderdate = date('d-m-y h:i A', strtotime($col3));
                	    $order_update = date('d-m-y h:i A', strtotime($col4));
                	 
                	     $deliveryid = $col17;
                             	       
                	    $order_id =$col1; $status =$col2;  $customername =$col5; $email = $col6; $shipping_ads = $col7;
                	     $delivery_mode = $col10;  $payment_id = $col11; $customerid = $col12;  $couriername = $col13;
                	     $trackid= $col14; $wallets = $col15; $ord_totalprice= $col16;
                	      $oldarray = json_decode(  $col7, true) ; $coupancode = $col19." (ID-".$col18.")";
	  	                 
                           foreach($oldarray as $arraykey) {
                              // echo " col8 - ".$col8. "--".$arraykey['address_id'];
                        		 if( $col8 == $arraykey['address_id']){
                        		     $shipping_ads = $arraykey['fullname']."<br> ".$arraykey['address1'].", ".$arraykey['address2']."<br> ".$arraykey['landmark']."<br>".$arraykey['city']
                        		     ."<br> ".$arraykey['state']."<br> ".$arraykey['pincode']."<br> Phone:  ".$arraykey['phone']."<br> email :  ".$arraykey['email'];
                        		     
                        		     $cust_phone =$arraykey['phone'];
                        		     $cust_email = $arraykey['email'];
                        		 }   
                           }
                        // echo " prod ".$proddetails;  
                	 }
                     //------------------ prod details 
                    //  echo $order_id." prod details ".$proddetails;
                    $prodarray = json_decode( $proddetails, true) ;
                	$i =0;
                	$subtotal = 0.00;  $cancelamount= 0.00;
                    $shiparray = array();
                    $nettotal = 0.00;
                    $idarray = array();       
            	  	 foreach( $prodarray as $arraykey) {
            			 //  echo "<br>--size ".$arraykey['qty']."--".$arraykey['price'];
            	
	  	                // echo " prod array  ".$arraykey['prod_id'];
                               $sno =$arraykey['prod_id'];
                          if (!in_array($sno, $idarray))
                              {
                             // echo "Match not found";
                              array_push($idarray, $sno);
                              
                               $size = $arraykey['size'];
                               $color = $arraykey['color'];
                               $custome_title = '';
                               $custom_image = '';
                               if($arraykey['custom_title'] != '')
                               {
                                   $custome_title = $arraykey['custom_title'];
                               }
                               if($arraykey['custom_image'] != '')
                               {
                                   $custom_image = "../".$arraykey['custom_image'];
                               }
                               
	 					       
                               
                               $msgoncake = $arraykey['msgoncake'];
	 					       $eggless = $arraykey['eggless'];
	 					       
	 					       
                        		$stmt2 = $conn->prepare("SELECT id, prod_id, prod_name, prod_img, prod_attr, qty, org_qty, prod_price, cgst, sgst, igst, shipping, total, status, sellername FROM order_product WHERE prod_id =? AND order_id=?");
                             	$stmt2-> bind_param("is",  $sno, $order_id);
                             	$stmt2->execute();
                             	$stmt2->store_result();
                             	$stmt2->bind_result ( $col2000, $col20, $col21, $col23, $col233, $colqty, $colorgqty, $col24, $col25, $col255, $col2555, $col26, $col27, $col29, $col299);
                          
                             	while($stmt2->fetch() ){
                             	  // echo $col27." ---".$col28."--".$col29;z
                             	   //   echo "--inside ".$arraykey['size']."--".$arraykey['color'];
                             	 
                             	    
                             	     	$imgarray = json_decode( $col23, true) ;
                            	       	$imageurl =""; $count =1;
                                	  	 foreach($imgarray as $arraykey) {
                                			   if( $count === 1 ){
                                			   	$imageurl = "../media/".$arraykey['url'];
                                			   	 $count++;
                                			   }
                                		  }
                                		 
                             	     	$attriarray = json_decode( $col233, true) ;
                            	       	$weight =      $attriarray['weight'];
                             	    $otherart ="";
                             	    if($size==="" && $color ===""){
                             	      $otherart = " ";
                             	      
                             	    }else if($size==="" && $color !=""){
                             	      $otherart = " Color : ".$color;
                             	      
                             	    }else if($size!="" && $color ===""){
                             	      $otherart =  " Size : ".$size;
                             	      
                             	    }else{
                             	      $otherart = " Size : ".$size." | Color : ".$color;
                             	      
                             	    }
                             	    // msg on cake and eggless
                             	    if($eggless==="" && $msgoncake ===""){
                             	      
                             	    }else if($eggless==="" && $msgoncake !=""){
                             	      $otherart = $otherart."<br> MSG-on-Cake : ".$msgoncake;
                             	      
                             	    }else if($eggless!="" && $msgoncake ===""){
                             	      $otherart = $otherart." : ".$eggless;
                             	      
                             	    }else{
                             	      $otherart = $otherart." : ".$eggless." <br> MSG-on-Cake : ".$msgoncake;
                             	      
                             	    }
                             	    
                             	    
                             	    $shipqty = $col26;
                             	    if($colqty==0){
                             	         $shipqty  =0;
                             	    }
                             	   // $shiparray = $shiparray+ $shipqty ;
									$shiparray[$i] = $shipqty;
									if($col29==""){
									    $subtotal =  $subtotal +$col27;
									}else{
									    $cancelamount = $cancelamount +$col27;
									}
                             	    
                             	    $prodjsonarray[$i] = array( 'img' => $imageurl,
                             	                                'prodid' => $col20,
                             	                                'prodname'=> $col21,
                             	                                'otherart' =>  $otherart,
                             	                                'price' => $col24, 
                             	                                'qty' => $colqty,
                             	                                'orgqty' => $colorgqty,
                             	                                'cgst' => $col25,
                             	                                'sgst' => $col255,
                             	                                'igst' => $col2555,
                             	                                'ship' =>  $shipqty ,
                             	                                'custom_title' => $custome_title,
                             	                                'custom_image' => $custom_image,
                             	                                'total' => number_format($col27)." /-",
                             	                                'prodstatus' => $col29,
                             	                                 'sellername'=> $col299,);
                             	 
                             	   $i= $i+1;   
                             	}
            	  	    }// if previous prod id is same   
            	  	 }// foreach close 
            	 // echo " prod ".json_encode($prodjsonarray);
            	 if($wallets!=0){
            	        $ord_totalprice = $ord_totalprice -$wallets;
            	    }
            	 //   $ord_totalprice = $ord_totalprice-  $cancelamount;
            	 $ord_totalprice = $subtotal -  $cancelamount + max($shiparray);
                 
                 	$Information = array(  'status' => $resstatus,
	 			                'orderId' => $order_id,
	 			                'username' =>  $customername,
	 			                'custid' =>  $customerid,
	 			                'address' => $shipping_ads,
	 			                'phone' => $cust_phone,
	 			                'email' => $cust_email,
	 			                'orderstatus' => $status,
	 			                'orderdate' =>$orderdate,
	 			                'proddetails' => $prodjsonarray,
	 			                 'deliverymode' =>$delivery_mode,
	 			                'paymentid' =>$payment_id,
	 			                'subtotal' => number_format($subtotal) ,
	 			                'ship' => number_format(max($shiparray)),
	 			                'grandtotal' => number_format($ord_totalprice),
	 			                 'deliveryid' => $deliveryid,
	 			                'courier' =>$couriername,
	 			                'trackid' => $trackid,
	 			                 'wallets'=> $wallets."( RS ".$wallets.")",
	 			                 'coupancode' =>$coupancode);  	
            	 	
            	 $post_data= json_encode(  $Information  );
            	 	
            	 echo $post_data;
        
    }
    catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
        }        	  	 
    }                  
                
?>
              
