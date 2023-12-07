<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ProductDetail_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$date = $this->date_time = date('Y-m-d H:i:s');
	}

	function get_review($langauge, $securecode, $prodid)
	{
		$langauge = 'default';
		$status = 0;
		if ($langauge === "default") {
			$msg = "No Product found";
			$Information = "No Product found";
		} else {
			$msg = "No Product found";
			$Information = "No Product found";
		}
		$jsonarray =  array();
		$review = "";
		$reviewid = "";
		$count = 0;

		$related = array();
		$count = 0;
		$active = "active";

		$this->db->select('pd.prod_id, pd.prod_name, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.prod_fulldetail, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.cat_id, pd.unit, ct.cat_name, pd.pricearray');
		$this->db->join('productdetails pd', 'prod.prod_id = pd.prod_id', 'INNER');
		$this->db->join('brand bd', 'prod.prod_brand_id= bd.brand_id', 'INNER');
		$this->db->join('category ct', 'ct.cat_id= pd.cat_id', 'INNER');
		$this->db->where(array('prod.prod_id' => $prodid, 'prod.status' => $active));


		$this->db->order_by("pd.prod_name", 'ASC');

		$this->db->limit(5);

		$query = $this->db->get('product prod');
		$query_result = $query->result_object();

		foreach ($query_result as $product_data) {
			$offpercent =  ($product_data->prod_mrp - $product_data->prod_price) * 100 /  $product_data->prod_mrp;

			//$status =1;
			//$msg =" Product details are here";
			$related[$count] = array(
				'id' => $product_data->prod_id,
				'name' => $product_data->prod_name,
				'short_desc' => $product_data->prod_desc,
				'mrp' => number_format($product_data->prod_mrp, 2),
				'price' => number_format($product_data->prod_price, 2),
				'offpercent' =>  number_format($offpercent, 0),

				'w_price' => number_format($product_data->w_price, 2),
				'w_qty' => $product_data->w_qty
			);


			$count = $count + 1;


			//	$count = $count+1;				
		}
	}

	function add_review($langauge, $securecode, $username, $prod_id, $user_id, $title, $feedback, $rating)
	{

		$langauge = 'default';
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		$status = 0;
		//	echo "inside if ".$user_id." ".$prod_id;
		/*if($langauge == "default"){
            $msg ="fail to submit review. Please Try Again.";
    	    
        }else{
        	$msg ="रिव्यु सबमिट नहीं हुआ है कृपया पुन: प्रयास करें।";
    	}*/
		$Exist = false;
		$prod_rating = 0;
		$prod_rating_count = 0;
		$prod_reviewid = 0;


		$this->db->select('op.order_id, pd.prod_rating, pd.prod_rating_count, pd.review_id');
		$this->db->join('order_product op', 'op.prod_id = pd.prod_id', 'INNER');
		$this->db->where(array('op.user_id' => $user_id, 'op.prod_id' => $prod_id));

		$query3 = $this->db->get('productdetails pd');
		$query3_result = $query3->result_object();

		//	echo 'ddddd';
		//print_r($this->db->last_query());    
		//	die;

		foreach ($query3_result as $product3_data) {

			$Exist = true;
			$prod_rating = $product3_data->prod_rating;
			$prod_rating_count = $product3_data->prod_rating_count;
			$prod_review_id = $product3_data->review_id;
		}

		if ($Exist) {

			//	echo " prod reviewid ".$prod_review_id;
			/// get last qoute id 

			if ($prod_review_id == 0) {

				$ratingdate = date("d/m/Y");

				$prod_review_array[0] = array(
					'title' => $title,
					'feedback' => $feedback,
					'rating' => $rating,
					'username' => $username,
					'userid' => $user_id,
					'date' => $ratingdate
				);


				$prod_reviewarray = json_encode($prod_review_array);
				//echo " prod_id_array ".	$prod_id_array;
				$review_data['review_array'] = $prod_reviewarray;

				$qry = $this->db->insert('review', $review_data);
				print_r($this->db->last_query());
				echo $this->db->insert_id() . 'ids';
				// die;
				if (!empty($this->db->insert_id())) {

					$status = 1;
					if ($langauge === "default") {
						$msg = "Thank You for Submitting Review.";
					} else {
						$msg = "रिव्यु देने के लिए धन्यवाद";
					}
					$id = $this->db->insert_id();
					//	echo " review id ".$id;
					$newcount = $prod_rating_count + 1;
					$newrating = (($prod_rating * $prod_rating_count) + $rating) / $newcount;

					$data['prod_rating'] = $newrating;
					$data['prod_rating_count'] = $newcount;
					$data['review_id'] = $id;


					$this->db->where('prod_id', $prod_id);
					$qrysd = $this->db->update('productdetails', $data);

					// check whether password already exist on same row or not	   	
					//$rows=$stmt32->affected_rows;


				} else {
					$status = 1;
				}
			} else {
				//	echo "update review ";
				$prod_review_array = "[]";

				$this->db->select('review_array');
				$this->db->where(array('review_id' => $prod_review_id));

				$query4 = $this->db->get('review');
				$query4_result = $query4->result_object();

				foreach ($query4_result as $product4_data) {

					$prod_review_array = $product4_data->review_array;
				}


				$oldArray = json_decode($prod_review_array, true);
				$userIDexist = false;

				foreach ($oldArray as $arraykey) {
					// echo "user id ".$user_id." reivewuser ". $arraykey['userid'];
					if ($user_id === $arraykey['userid']) {
						$userIDexist = true;
					}
				}

				if ($userIDexist) {
					$status = 1;
					if ($langauge === "default") {
						$msg = "You have already submitted the review for this product";
					} else {
						$msg = "आप पहले भी इसी प्रोडक्ट के लिए रिव्यु दे चुके है";
					}
				} else {

					$ratingdate = date("d/m/Y");
					$newreview_array = array(
						'title' => $title,
						'feedback' => $feedback,
						'rating' => $rating,
						'username' => $username,
						'userid' => $user_id,
						'date' => $ratingdate
					);


					array_push($oldArray, $newreview_array);

					//echo " old arrays is ".json_encode( $oldArray);
					$newProdArray = json_encode($oldArray);

					$data0['review_array'] = $newProdArray;

					$this->db->where('review_id', $prod_review_id);
					$qrysd0 = $this->db->update('review', $data0);


					// check whether password already exist on same row or not	   	
					// $rows=$stmt32->affected_rows;
					//echo " row ".$rows;
					if ($qrysd0) {
						//echo " row affected is ";
						$status = 1;
						if ($langauge === "default") {
							$msg = "Thank You for Submitting Review.";
						} else {
							$msg = " रिव्यु देने के लिए सुक्रिया";
						}
					} else {

						$status = 1;
						if ($langauge === "default") {
							$msg = "Failed to submit review. Please try again";
						} else {
							$msg = "रिव्यु सबमिट नहीं हुआ है कृपया पुन: प्रयास करें।";
						}
					}
				}
			}
		} else {
			//echo "id exist ".$rowUserId." qoute id ".$rowQouteId. " products  ".	$prod_id_array;
			$status = 1;
			if ($langauge === "default") {
				$msg = "You can't submit the review. Please buy the product then you can submit review";
			} else {
				$msg = "कृपया प्रोडक्ट को खरीदने के बाद रिव्यु सबमिट करे";
			}
		}



		$post_data = array(
			'status' => $status,
			'msg' => $msg
		);


		// $post_data= json_encode( $post_data );

		return $post_data;

		// mysqli_close($conn);
	}

	function get_product_details($langauge, $securecode, $prodid)
	{
		// echo $prodid;
		$status = 0;
		if ($langauge === "default") {
			$msg = "No Product found";
			$Information = "No Product found";
		} else {
			$msg = "No Product found";
			$Information = "No Product found";
		}
		$jsonarray = $jsonarray = array(
			'id' => "",
			'name' => "",
			'short_desc' => "",
			'fulldetail' => "",
			'offpercent' =>  "",
			'mrp' => 0,
			'price' => 0,
			'w_price' => 0,
			'w_qty' => 0,
			'attr' => "",
			'img_url' => "",
			'brand' => "",
			'prod_rating' => 0,
			'prod_rating_count' => 0,
			'prod_review_id' => "",
			'unit' => "",
			'cat_name' => "",
			'pricearray' => "",
			'stock' => "0",
			'remark' => "",
			'eggless' => 0,
			'msgoncake' => ""
		);
		$review = "";
		$reviewid = "";
		$count = 0;

		// ORDER BY id ASC|DESC;
		//	echo "  inside ";

		///  select prod_id from trending where order by priority ASC

		// selectprod_name, prod_mp, prod_price, prod_rating from productdetails WHERE prod_id =  prod_id
		$catid = "";
		$active = "active";
		$this->db->select('pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.prod_fulldetail, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.cat_id, pd.unit, ct.cat_name, pd.pricearray, pd.stock, pd.prod_remark, pd.eggless, pd.msgoncake');
		$this->db->join('product prod', 'prod.prod_id = pd.prod_id', 'INNER');
		$this->db->join('brand bd', 'prod.prod_brand_id= bd.brand_id', 'INNER');
		$this->db->join('category ct', 'ct.cat_id= pd.cat_id', 'INNER');
		$this->db->where(array('prod.prod_id' => $prodid, 'prod.status' => $active));

		$query = $this->db->get('productdetails pd');
		// print_r($query);

		if ($query->num_rows() > 0) {
			$query_result = $query->result_object();
			// print_r($query_result);
			
			foreach ($query_result as $product_data) {
				$catid = $product_data->cat_id;
				$reviewid = $product_data->review_id;
				$offpercent =  ($product_data->prod_mrp - $product_data->prod_price) * 100 /  $product_data->prod_mrp;

				$status = 1;
				$msg = " Product details are here";
				$jsonarray = array(
					'id' => $product_data->prod_id,
					'name' => $product_data->prod_name,
					'short_desc' => $product_data->prod_desc,
					'fulldetail' => $product_data->prod_fulldetail,
					'offpercent' =>  number_format($offpercent, 0),
					'mrp' => number_format($product_data->prod_mrp, 0),
					'price' => number_format($product_data->prod_price, 0),
					'w_price' => number_format($product_data->w_price, 0),
					'w_qty' => $product_data->w_qty,
					'attr' => $product_data->other_attribute,
					'img_url' => $product_data->prod_img_url,
					'brand' => $product_data->brand_name,
					'prod_rating' => $product_data->prod_rating,
					'prod_rating_count' => $product_data->prod_rating_count,
					'prod_review_id' => $product_data->review_id,
					'unit' => $product_data->unit,
					'cat_name' => $product_data->cat_name,
					'pricearray' => $product_data->pricearray,
					'stock' => $product_data->stock,
					'remark' => $product_data->prod_remark,
					'eggless' => $product_data->eggless,
					'msgoncake' => $product_data->msgoncake
				);
			}
		}
		$Information = $jsonarray;
		// echo " cat id ".$jsonarray['brand'];
		//  get related product
		$related = array();
		$count = 0;
		$active = "active";
		$this->db->select('pd.prod_id, pd.prod_name, pd.name_ar, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.prod_rating, pd.pricearray');
		$this->db->join('product prod', 'prod.prod_id = pd.prod_id', 'INNER');
		$this->db->join('brand bd', 'prod.prod_brand_id= bd.brand_id', 'INNER');
		$this->db->where(array('prod.prod_cat_id' => $catid, 'prod.prod_id !=' => $prodid, 'prod.status' => $active));

		$query2 = $this->db->get('productdetails pd');

		if ($query2->num_rows() > 0) {
			$query2_result = $query2->result_object();
			//print_r($query_result);
			foreach ($query2_result as $product2_data) {

				$offpercent =  ($product2_data->prod_mrp - $product2_data->prod_price) * 100 /  $product2_data->prod_mrp;

				$related[$count] = array(
					'id' => $product2_data->prod_id,
					'name' => str_replace('"', '', $product2_data->prod_name),
					'short_desc' => $product2_data->prod_desc,
					'mrp' => number_format($product2_data->prod_mrp, 0),
					'price' => number_format($product2_data->prod_price, 0),
					'offpercent' =>  number_format($offpercent, 0),

					'w_price' => number_format($product2_data->w_price, 0),
					'w_qty' => $product2_data->w_qty,
					'attr' => $product2_data->other_attribute,
					'img_url' => $product2_data->prod_img_url,
					'brand' => $product2_data->brand_name,
					'rating' => $product2_data->prod_rating,
					'pricearray' => $product2_data->pricearray
				);


				$count = $count + 1;
			}
		}

		$this->db->select('review_array');
		$this->db->where(array('review_id' => $reviewid));

		$query3 = $this->db->get('review');
		$query3_result = $query3->result_object();

		foreach ($query3_result as $product3_data) {

			$review = $product3_data->review_array;
		}

		//mysqli_close($conn);

		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $Information,
			'related' => $related,
			'review' => $review
		);

		// $post_data= json_encode( $post_data );

		return $post_data;
	}
}
