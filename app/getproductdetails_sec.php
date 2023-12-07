<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$prodid =  htmlentities($_POST['prodid'] );

$langauge =  stripslashes($language); 
$securecode = stripslashes($securecode);  //  "1234567890";//
$prodid =    stripslashes($prodid);
//echo "  outside ";

if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($prodid)  && !empty($prodid) ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	
	$status =0;
	if($langauge ==="default"){
	    $msg ="No Product found";
    	$Information = "No Product found";
    	    
    }else{
	    $msg ="No Product found";
    	$Information = "No Product found";
    	    
	}
	$jsonarray = $jsonarray = array(
	 					 'id' => "",
	 					 'name' => "",
	 					 'short_desc' => "",
	 					 'fulldetail' => "",
	 					 'offpercent' =>  "",
	 					 'mrp' =>0,
	 					 'price' =>0,
	 					 'w_price' => 0,
	 					 'w_qty' => 0,
	 					 'attr' => "",
	 					 'img_url' => "",
	 					 'brand' =>"",
	 					 'prod_rating' => 0,
	 					 'prod_rating_count' =>0,
	 					 'prod_review_id' => "",
	 					 'unit' => "",
	 					 'cat_name' => "",
	 					 'pricearray' => "",
	 					 'stock' => "0",
	 					 'remark' => "",
	 					 'eggless' => 0,
	 					 'msgoncake' => "");
	$review = "";
	$reviewid ="";
	$count =0;
	
	// ORDER BY id ASC|DESC;
//	echo "  inside ";
	
	///  select prod_id from trending where order by priority ASC
	
	// selectprod_name, prod_mp, prod_price, prod_rating from productdetails WHERE prod_id =  prod_id
	$catid ="";
	$active ="active";	
 	$stmt = $conn->prepare("SELECT pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.prod_fulldetail, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.cat_id, pd.unit, ct.cat_name, pd.pricearray, pd.stock, pd.prod_remark, pd.eggless, pd.msgoncake FROM product prod, productdetails pd, brand bd, category ct WHERE prod.prod_id=? AND prod.prod_id = pd.prod_id AND prod.prod_brand_id= bd.brand_id AND ct.cat_id= pd.cat_id AND prod.status=?");
 	$stmt-> bind_param("is", $prodid, $active);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col1, $col2, $col2ar, $col3, $col4, $col5, $col6,$col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14, $col15 , $col16, $col17, $col18, $col19, $col199, $col41, $col42 );
 
 	
 	while($stmt->fetch() ){
 	    $catid = $col15;
 	    $reviewid = $col14;
 		     $pname =   $col2;
 	          if( $language !="default" ){ $pname =    json_encode( $col2ar,  JSON_UNESCAPED_UNICODE);}
 	         if($pname == "\"\""){ $pname =$col2;}
 	         
 			   //    echo "  stam extecute ".$col1."  prod_name is  ".$col2;
 			   	     $offpercent =  ($col4 - $col5)*100/  $col4;
 		
 				$status =1;
				$msg =" Product details are here";
				$jsonarray = array(
	 					 'id' => $col1,
	 					 'name' => $pname,
	 					 'short_desc' => $col3,
	 					 'fulldetail' => $col11,
	 					 'offpercent' =>  number_format($offpercent,0),
	 					 'mrp' =>number_format($col4,2),
	 					 'price' =>number_format($col5,2),
	 					 'w_price' => number_format($col6,2),
	 					 'w_qty' => $col7,
	 					 'attr' => $col8,
	 					 'img_url' => $col9,
	 					 'brand' => $col10,
	 					 'prod_rating' => $col12,
	 					 'prod_rating_count' =>$col13,
	 					 'prod_review_id' => $col14,
	 					 'unit' => $col16,
	 					 'cat_name' => $col17,
	 					 'pricearray' => $col18,
	 					 'stock' => $col19,
	 					 'remark' => $col199,
	 					 'eggless' => $col41,
	 					 'msgoncake' => $col42);
 			
 		
 	//	$count = $count+1;				
 	}
  	
	$Information = $jsonarray;
//	echo " cat id ".$catid;
	//  get related product
	$related = array();	
	$count = 0;
	$active ="active";	
 	$stmt = $conn->prepare("SELECT pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.prod_rating, pd.pricearray FROM product prod, productdetails pd, brand bd WHERE prod.prod_cat_id=? AND prod.prod_id = pd.prod_id AND prod.prod_brand_id= bd.brand_id AND prod.status=? AND prod.prod_id!=? ORDER BY pd.prod_name ASC LIMIT 15");
 	$stmt-> bind_param("isi", $catid, $active, $prodid);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col21, $col22, $col22ar, $col23, $col24, $col25, $col26,$col27, $col28, $col29, $col30, $col31, $col32  );
 
 	
 	while($stmt->fetch() ){
 	          $pname2 =   $col22;
 	            if( $language !="default" ){ $pname2 =    json_encode( $col22ar,  JSON_UNESCAPED_UNICODE);}
 	         if($pname2 == "\"\""){ $pname2 =$col22;}
 	         
 	
 			     //   echo "  stam extecute ".$col1."  prod_name is  ".$col2;
 			  	     $offpercent =  ($col24 - $col25)*100/  $col24;
 		
 				//$status =1;
				//$msg =" Product details are here";
				$related[$count] = array(
	 					 'id' => $col21,
	 					 'name' => $pname2,
	 					 'short_desc' => $col23,
	 					 'mrp' =>number_format($col24,2),
	 					 'price' =>number_format($col25,2),
	 					 'offpercent' =>  number_format($offpercent,0),
	 					
	 					 'w_price' => number_format($col26,2),
	 					 'w_qty' => $col27,
	 					 'attr' => $col28,
	 					 'img_url' => $col29,
	 					 'brand' => $col30,
	 					 'rating' => $col31,
	 					 'pricearray'=> $col32);
 			
 		
 		$count = $count+1;				
 	}
  	
	$stmt = $conn->prepare("SELECT review_array FROM review WHERE review_id=?");
 	$stmt-> bind_param("i", $reviewid);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col41  );
 
 	
 	while($stmt->fetch() ){
 	        $review = $col41;
 			     //   echo "  stam extecute ".$col1."  prod_name is  ".$col2;
 				//$status =1;
 	}


 	
 	mysqli_close($conn);
 	
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'Information' => $Information,
 			 'related' => $related,
 			 'review' => $review);
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 }
 

?>
