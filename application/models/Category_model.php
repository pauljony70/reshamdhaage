<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

   public function __construct() {
        parent::__construct();
		
		$date = $this->date_time = date('Y-m-d H:i:s');
    }
    
    function get_name_category($cat_id){
       $prod_result = array();
       $product_array = array();
	   $start = 0;
	   $sortby = 1;
	   $devicetype = 1;
	  			  
			//get products details
			$this->db->select('*');
			$this->db->where(array('cat_id' => $cat_id));
			//$this->db->where_in('parent_id','0');
			$query_prod = $this->db->get('category');
			//print_r($this->db->last_query());    

			if($query_prod->num_rows() >0){
				$prod_result = $query_prod->result_object();
				
				$product_array = array();
				foreach($prod_result as $productdetails){
					$cat_response = array();
					
					$cat_response['id'] = $productdetails->cat_id;
					$cat_response['name'] = $productdetails->cat_name;
					
					
					$cat_response['imgurl'] = $productdetails->cat_img;
					
					$product_array[] = $cat_response;
				}
			}
			
			return $product_array;
    }
    
    function get_sub_category($cat_id){
       $prod_result = array();
       $product_array = array();
	   $start = 0;
	   $sortby = 1;
	   $devicetype = 1;
	  			  
			//get products details
			$this->db->select('*');
			$this->db->where(array('parent_id' => $cat_id));
			//$this->db->where_in('parent_id','0');
			$query_prod = $this->db->get('category');
			//print_r($this->db->last_query());    

			if($query_prod->num_rows() >0){
				$prod_result = $query_prod->result_object();
				
				$product_array = array();
				foreach($prod_result as $productdetails){
					$cat_response = array();
					
					$cat_response['id'] = $productdetails->cat_id;
					$cat_response['name'] = $productdetails->cat_name;
					
					
					$cat_response['imgurl'] = $productdetails->cat_img;
					
					
					$this->db->select('*');
					$this->db->where(array('parent_id' => $productdetails->cat_id));
        			$query_1 = $this->db->get('category');
        			$cat_response['subcat_1'] = array();
        			
        				if($query_1->num_rows() >0){
            				$cat_result = $query_1->result_object();
            				
            				foreach($cat_result as $cat_results){
            				    $scat_response = array();
            				    
            				    $scat_response['id'] = $cat_results->cat_id;
            					$scat_response['name'] = $cat_results->cat_name;
            					
            					$scat_response['imgurl'] = $cat_results->cat_img;
            					
            					
            					$this->db->select('*');
            					$this->db->where(array('parent_id' => $cat_results->cat_id));
                    			$query_2 = $this->db->get('category');
                    			$scat_response['subsubcat_2'] = array();
                    			
                    			if($query_2->num_rows() >0){
            				$cat_result1 = $query_2->result_object();
            				
            				foreach($cat_result1 as $cat_results1){
            				    $scat_response = array();
            				    
            				    $scat_response1['id'] = $cat_results1->cat_id;
            					$scat_response1['name'] = $cat_results1->cat_name;
            					
            					$scat_response1['imgurl'] = $cat_results1->cat_img;
            					
            					
            					$cat_response['subcat_2'][] = $scat_response1;
            				 }
        			
        				 }
            					
            					
            					$cat_response['subcat_1'][] = $scat_response;
            				 }
        			
        				 }
					
					
					$product_array[] = $cat_response;
				}
			}
		
		
		return $product_array;
    }
    
    
    function get_all_category(){
       $prod_result = array();
       $product_array = array();
	   $start = 0;
	   $sortby = 1;
	   $devicetype = 1;
	  			  
			//get products details
			$this->db->select('*');
			$this->db->where_in('parent_id','0');
			$query_prod = $this->db->get('category');
			//print_r($this->db->last_query());    

			if($query_prod->num_rows() >0){
				$prod_result = $query_prod->result_object();
				
				$product_array = array();
				foreach($prod_result as $productdetails){
					$cat_response = array();
					
					$cat_response['id'] = $productdetails->cat_id;
					$cat_response['name'] = $productdetails->cat_name;
					
					
					$cat_response['imgurl'] = $productdetails->cat_img;
					
					
					$this->db->select('*');
					$this->db->where(array('parent_id' => $productdetails->cat_id));
        			$query_1 = $this->db->get('category');
        			$cat_response['subcat_1'] = array();
        			
        				if($query_1->num_rows() >0){
            				$cat_result = $query_1->result_object();
            				
            				foreach($cat_result as $cat_results){
            				    $scat_response = array();
            				    
            				    $scat_response['id'] = $cat_results->cat_id;
            					$scat_response['name'] = $cat_results->cat_name;
            					
            					$scat_response['imgurl'] = $cat_results->cat_img;
            					
            					
            					$this->db->select('*');
            					$this->db->where(array('parent_id' => $cat_results->cat_id));
                    			$query_2 = $this->db->get('category');
                    			$scat_response['subsubcat_2'] = array();
                    			
                    			if($query_2->num_rows() >0){
            				$cat_result1 = $query_2->result_object();
            				
            				foreach($cat_result1 as $cat_results1){
            				    $scat_response = array();
            				    
            				    $scat_response1['id'] = $cat_results1->cat_id;
            					$scat_response1['name'] = $cat_results1->cat_name;
            					
            					$scat_response1['imgurl'] = $cat_results1->cat_img;
            					
            					
            					$cat_response['subcat_2'][] = $scat_response1;
            				 }
        			
        				 }
            					
            					
            					$cat_response['subcat_1'][] = $scat_response;
            				 }
        			
        				 }
					
					
					$product_array[] = $cat_response;
				}
			}
		
		
		return $product_array;
    }
     
    function getcategory_product($langauge,$securecode,$catid)
    {
        $status =0;
    	if($langauge ==="1"){
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
    	$active ="active";
    	
    	$this->db->select('pd.prod_id, pd.prod_name, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.pricearray, pd.stock, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.eggless');
    	$this->db->join('product prod', 'prod.prod_id = pd.prod_id','INNER');
    	$this->db->join('brand bd', 'prod.prod_brand_id= bd.brand_id','INNER');
    	$this->db->join('category ct', 'ct.cat_id= pd.cat_id','INNER');
    	$this->db->where(array('prod.prod_cat_id'=>$catid,'prod.status'=>$active));
    	
    	$query = $this->db->get('productdetails pd');
    	
    	$query_result = $query->result_object();
		//print_r($query_result);
		foreach($query_result as $product_data){
    	       $offpercent =  ($product_data->prod_mrp - $product_data->prod_price)*100/  $product_data->prod_mrp;
 			     //   echo "  stam extecute ".$col1."  prod_name is  ".$col2;
 				$status =1;
				$msg =" Product details are here";
				$jsonarray[$count] = array(
	 					 'id' => $product_data->prod_id,
	 					 'name' => str_replace('"','',$product_data->prod_name),
	 					 'short_desc' => $product_data->prod_desc,
	 					 'mrp' =>number_format($product_data->prod_mrp,0),
	 					 'price' =>number_format($product_data->prod_price,0),
	 					  'offpercent' =>  number_format($offpercent,0),
	 					 'w_price' => number_format($product_data->w_price,0),
	 					 'w_qty' => $product_data->w_qty,
	 					 'attr' => $product_data->other_attribute,
	 					 'img_url' => $product_data->prod_img_url,
	 					 'brand' => $product_data->brand_name,
	 					 'pricearray' => $product_data->pricearray,
	 					 'stock' => $product_data->stock,
						 'rating' => $product_data->prod_rating,
						 'ratingcount' => $product_data->prod_rating_count,
						 'reviewid' => $product_data->review_id,
						 'eggless' => $product_data->eggless);
	 
 		        $count = $count+1;
		}
		
		$Information = $jsonarray;

 	
     	$post_data = array(
     			 'status' => $status,
     			 'msg' => $msg,
     			 'Information' => $Information,
     			 'size' =>$filtersize,
     			 'color' =>$filtercolor,
     			 'brand'=> $filterbrand,
     			 'catid'=> $catid,
     			 'catname' => "");
     	
     	
     	//$post_data= json_encode( $post_data );
     	
     	return $post_data;
    }
} 