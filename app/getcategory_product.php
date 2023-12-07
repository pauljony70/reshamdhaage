<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$catid =  htmlentities($_POST['catid'] );

$langauge =  stripslashes($language); 
$securecode =  stripslashes($securecode);  //  "1234567890";//
$catid =   stripslashes($catid);
//echo "  outside ";

if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($catid)  && !empty($catid) ) {

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
    	$msg ="कोई प्रोडक्ट नहीं  मिला है";
    	$Information = "कोई प्रोडक्ट नहीं  मिला है";
    	    
	}
	$jsonarray =  array();
	$filtersize = array();
	$filtercolor = array();
	$filterbrand = array();
	$count =0;
	
	// ORDER BY id ASC|DESC;
	//echo "  inside ";
	
	///  select prod_id from trending where order by priority ASC
	
	// selectprod_name, prod_mp, prod_price, prod_rating from productdetails WHERE prod_id =  prod_id
	
	$active ="active";	
 	$stmt = $conn->prepare("SELECT pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.pricearray, pd.stock, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.eggless FROM product prod, productdetails pd, brand bd WHERE prod.prod_cat_id=? AND prod.prod_id = pd.prod_id AND prod.prod_brand_id= bd.brand_id AND prod.status=? ORDER BY pd.prod_name ASC");
 	$stmt-> bind_param("is", $catid, $active);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col1, $col2, $col2ar, $col3, $col4, $col5, $col6,$col7, $col8, $col9, $col10, $col11 , $col12, $col13, $col14, $col15, $col16 );
 
 	
 	while($stmt->fetch() ){
 	
 			      $pname =   $col2;
 	            if( $language !="default" ){ $pname =    json_encode( $col2ar,  JSON_UNESCAPED_UNICODE);}
 	         if($pname == "\"\""){ $pname =$col2;}
 	         
 			   $offpercent =  ($col4 - $col5)*100/  $col4;
 			     //   echo "  stam extecute ".$col1."  prod_name is  ".$col2;
 				$status =1;
				$msg =" Product details are here";
				$jsonarray[$count] = array(
	 					 'id' => $col1,
	 					 'name' => $pname,
	 					 'short_desc' => $col3,
	 					 'mrp' =>number_format($col4,2),
	 					 'price' =>number_format($col5,2),
	 					 'offpercent' =>  number_format($offpercent,0),
	 					 'w_price' => number_format($col6,2),
	 					 'w_qty' => $col7,
	 					 'attr' => $col8,
	 					 'img_url' => $col9,
	 					 'brand' => $col10,
	 					 'pricearray' => $col11,
	 					 'stock' => $col12,
						 'rating' => $col13,
						 'ratingcount' => $col14,
						 'reviewid' => $col15,
						 'eggless' => $col16);
	 	
     			
 		
 		$count = $count+1;				
 	}
 	
   // print_r($filtersize);
//    print_r($filtercolor);
  //  print_r($filterbrand);
  	
	$Information = $jsonarray;

 	
 	mysqli_close($conn);
 	
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'Information' => $Information,
 			 'size' =>$filtersize,
 			 'color' =>$filtercolor,
 			 'brand'=> $filterbrand,
 			 'catid'=> $catid,
 			 'catname' => "");
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;
 	
 }


 	

 	
 		

?>