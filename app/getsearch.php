<?php

include('db_connection.php');
$language =  htmlentities($_POST['language'] );
$securecode =  htmlentities($_POST['securecode'] );
$search =  htmlentities($_POST['search'] );
// remove back slash from the variable if any...

$langauge =  stripslashes($language); 
$securecode =    stripslashes($securecode);  //  "1234567890";//
$search = stripslashes($search);
//echo "  outside "; 

if(isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)&& !empty($search) ) {

global $conn;
	
	if($conn-> connect_error){
		die(" connecction has failed ". $conn-> connect_error)	;
	}
	// get current date
	
	$status =0;
	if($langauge ==="default"){
    	$msg ="No product found";
    	$Information = "No product found";
    	    
    }else{
    	$msg ="No product found";
    	$Information = "No product found";
  
	}
	$jsonarray =  array();
	$count =0;
	
	// ORDER BY id ASC|DESC;
	//echo "  inside ";
	
	///  select prod_id from trending where order by priority ASC
	
	// selectprod_name, prod_mp, prod_price, prod_rating from productdetails WHERE prod_id =  prod_id
	
	  $search = "%".$search."%";
	  $inactive ="active";
	  $count =0;
 	$stmt = $conn->prepare("SELECT proddetail.prod_id,  proddetail.prod_name, proddetail.prod_desc,proddetail.prod_mrp, proddetail.prod_price, proddetail.prod_rating, proddetail.prod_rating_count, proddetail.prod_img_url, proddetail.other_attribute, proddetail.pricearray , proddetail.stock, proddetail.eggless FROM productdetails proddetail, product pd  WHERE pd.prod_id = proddetail.prod_id AND pd.status=? AND proddetail.prod_name LIKE ? GROUP BY proddetail.prod_id");
 	
 	$stmt-> bind_param("ss", $inactive, $search);
 	$stmt->execute();
 	$stmt->store_result();
 	$stmt->bind_result ( $col1, $col2, $col33, $col3, $col4,  $col5, $col55, $col6, $col7, $col8, $col9, $col10  );
 
 	
 	while($stmt->fetch() ){
 	
 	        
 			 	    //    echo "  stam extecute ".$col1."  prod_name is  ".$col6;
 				$status =1;
				$msg =" Search product here";
		     $offpercent =  ($col3 - $col4)*100/  $col3;
 		
				$jsonarray[$count] = array(
	 					 'id' => $col1,
	 					 'name' => $col2,	 
	 					 'short_desc' => $col33,
	 					 'mrp' => number_format($col3, 3),
	 					 'price' => number_format($col4, 3),
	 					 'offpercent' =>  number_format($offpercent,0),
	 					 'rating' => number_format($col5, 0),
	 					 'ratingcount' => number_format($col55, 0),
	 					 'img_url' => $col6,
	 					  'attr' => $col7,
	 					  'pricearray' => $col8,
	 					  'stock' => $col9,
	 					  'eggless' => $col10);
 		
 			$count = $count +1;	
 					
 	}
  	
	$Information = $jsonarray;

 	
 	mysqli_close($conn);
 		
 	$post_data = array(
 			 'status' => $status,
 			 'msg' => $msg,
 			 'count' => $count,
 			 'Information' => $Information );
 	
 	
 	$post_data= json_encode( $post_data );
 	
 	echo $post_data;

 }
 
 
 
 	
 		

?>