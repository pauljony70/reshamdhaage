<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wishlist_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$date = $this->date_time = date('Y-m-d H:i:s');
	}

	function getcategor($langauge, $securecode)
	{
		$status = 0;
		if ($langauge === "1") {
			$msg = "No Category found";
			$Information = "No Category found";
		} else {
			$msg = "कोई श्रेणी नहीं मिली";
			$Information = "कोई श्रेणी नहीं मिली";
		}
		$jsonarray =  array();
		$count = 0;

		$parent = 0;
		$this->db->select('cat_id, cat_name, cat_img, parent_id');
		$this->db->where(array('parent_id' => $parent));
		$this->db->order_by('cat_order', 'ASC');
		$query2 = $this->db->get('category');

		$cat_array = $query2->result_object();
		foreach ($cat_array as $cat_details) {

			$catid = $cat_details->cat_id;
			$prodcount = 0;

			$this->db->select('count(prod_id) as count');
			$this->db->where(array('cat_id' => $catid));
			$query3 = $this->db->get('productdetails');

			$prod_array = $query3->result_object();
			foreach ($prod_array as $prod_details) {
				$prodcount = $prod_details->count;
			}

			$status = 1;
			$msg = " category details is here";
			$jsonarray[$count] = array(
				'id' => $cat_details->cat_name,
				'name' => $cat_details->cat_id,
				'img_url' => $cat_details->cat_img,
				'parent' => $cat_details->parent_id,
				'prodcount' =>  $prodcount
			);


			$count = $count + 1;
		}
		$Information = $jsonarray;

		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $Information
		);

		//$post_data= json_encode( $post_data );

		return $post_data;
	}

	function getcategory($langauge, $securecode)
	{
		$status = 0;
		if ($langauge === "1") {
			$msg = "No Category found";
			$Information = "No Category found";
		} else {
			$msg = "कोई श्रेणी नहीं मिली";
			$Information = "कोई श्रेणी नहीं मिली";
		}
		$category_result = array();

		$this->db->select('cat.cat_id,cat.cat_name,cat.cat_img,cat.parent_id');

		$this->db->where(array('cat.parent_id' => 0, 'cat.cat_id !=' => 10));
		$this->db->order_by('cat.cat_order', 'ASC');

		//$this->db->limit(8, 0);
		$query = $this->db->get('category cat');

		if ($query->num_rows() > 0) {
			$category_array = $query->result_object();
			foreach ($category_array as $cat_details) {
				$cat_response = array();
				$cat_response['cat_id'] = $cat_details->cat_id;
				// 1 arabic 2 english

				$cat_response['cat_name'] = $cat_details->cat_name;


				$cat_response['parent_id'] = $cat_details->parent_id;

				$img_decode = $cat_details->cat_img;


				$web_banner = '';


				$cat_response['imgurl'] = $img_decode;

				//get sub category 
				$this->db->select('cat.cat_id,cat.cat_name, cat.cat_img,cat.parent_id');

				$this->db->where(array('cat.parent_id' => $cat_details->cat_id));
				$this->db->order_by('cat.cat_order', 'ASC');

				//$this->db->limit(8, 0);
				$querysubcat = $this->db->get('category cat');
				$cat_response['subcat_1'] = array();
				if ($querysubcat->num_rows() > 0) {
					$category_sub = $querysubcat->result_object();
					foreach ($category_sub as $subcat_details) {
						$scat_response = array();
						$scat_response['cat_id'] = $subcat_details->cat_id;
						// 1 arabic 2 english

						$scat_response['cat_name'] = $subcat_details->cat_name;

						$scat_response['parent_id'] = $subcat_details->parent_id;

						$img_decode = $subcat_details->cat_img;

						$scat_response['imgurl'] = $img_decode;

						//getsub sub category 
						$this->db->select('cat.cat_id,cat.cat_name,cat.cat_img,cat.parent_id');

						$this->db->where(array('cat.parent_id' => $subcat_details->cat_id));
						$this->db->order_by('cat.cat_order', 'ASC');

						//$this->db->limit(8, 0);
						$querysubcat1 = $this->db->get('category cat');
						$scat_response['subsubcat_2'] = array();
						if ($querysubcat1->num_rows() > 0) {
							$category_sub1 = $querysubcat1->result_object();
							foreach ($category_sub1 as $subcat_details1) {
								$scat_response1 = array();
								$scat_response1['cat_id'] = $subcat_details1->cat_id;
								// 1 arabic 2 english

								$scat_response1['cat_name'] = $subcat_details1->cat_name;

								$scat_response1['parent_id'] = $subcat_details1->parent_id;

								$img_decode = $subcat_details1->cat_img;

								
								$scat_response1['imgurl'] = $img_decode;

								$scat_response['subsubcat_2'][] = $scat_response1;
							}
						}
						$cat_response['subcat_1'][] = $scat_response;
					}
				}

				$category_result[] = $cat_response;
			}
		}
		// echo "<pre>";
		// print_r($category_result);
		// exit;
		$post_data = array(
			'status' => 1,
			'msg' => $msg,
			'Information' => $category_result
		);
		return $post_data;
	}

	function deletewishlistitem($langauge, $securecode, $user_id, $prod_id)
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		$status = 0;
		$totalPrice = 0;
		if ($langauge === "1") {
			$msg = "fail to delete product from wishlist";
		} else {
			$msg = "ಇಚ್ಛೆಪಟ್ಟಿಯಿಂದ ಉತ್ಪನ್ನವನ್ನು ಅಳಿಸಲು ವಿಫಲವಾಗಿದೆ";
		}

		$information = array(
			'status' =>  $msg,
			'totalprice' =>   $totalPrice
		);
		$detailsarray =  array();

		$notExist = true;
		$qouteId = 1000;
		$rowUser_id = 0;
		$rowProdJsonArray = array();

		$this->db->select('user_id, prod_id');
		$this->db->where(array('user_id' => $user_id));
		$query2 = $this->db->get('wishlist');

		$order_array = $query2->result_object();
		foreach ($order_array as $order_details) {

			$notExist = false;

			$rowUser_id = $order_details->user_id;
			$rowProdJsonArray = $order_details->prod_id;
		}

		if ($notExist) {
		} else {
			/// yes userid exist

			//echo " hh";		 
			$oldarray = json_decode($rowProdJsonArray, true);

			$prodIDexist = false;
			$i = 0;



			foreach ($oldarray as $arraykey) {
				//  echo "prod id ".$arraykey['prod_id'];

				if ($prod_id === $arraykey['prod_id']) {
					$prodIDexist = true;

					unset($oldarray[$i]);
				}


				$i++;
			}

			if ($prodIDexist) {

				$oldarray =	array_values($oldarray);

				$tempnewarray = 	 json_encode($oldarray);

				$data5['prod_id'] = $tempnewarray;

				$this->db->where('user_id', $user_id);
				$qrysd = $this->db->update('wishlist', $data5);

				if ($qrysd) {
					//echo " row affected is ".;
					$status = 1;
					if ($langauge === "1") {
						$msg = "Successfully Delete product from wishlist";
					} else {
						$msg = "ಬಯಕೆಪಟ್ಟಿಗೆ ಉತ್ಪನ್ನವನ್ನು ಯಶಸ್ವಿಯಾಗಿ ಅಳಿಸಿ";
					}
					$information  = array(
						'status' =>  $msg,
						'totalprice' =>  number_format($totalPrice, 2)
					);
				} else {


					$status = 1;
					if ($langauge === "1") {
						$msg = "fail to delete product from wishlist";
					} else {
						$msg = "ಇಚ್ಛೆಪಟ್ಟಿಯಿಂದ ಉತ್ಪನ್ನವನ್ನು ಅಳಿಸಲು ವಿಫಲವಾಗಿದೆ";
					}
					$information  = array(
						'status' =>  $msg,
						'totalprice' =>  number_format($totalPrice, 2)
					);
				}
			}
		}


		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $information
		);


		//$post_data= json_encode( $post_data );

		return $post_data;
	}

	function add_prod_into_wishlist($langauge, $securecode, $user_id, $prod_id, $prod_price, $qty)
	{
		$size =  '';
		$color = '';

		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		$totalPrice  = 0;
		$jsonarray =  array();
		$status = 0;
		$msg = "failed to add product into wishlist";
		if ($langauge === "1") {
			$msg = "failed to add product into wishlist";
		} else {
			$msg = "प्रोडक्ट विशलिस्ट में जोड़ने में विफल है ";
		}
		$information = array(
			'prod_details' => $jsonarray,
			'totalprice' =>   $totalPrice
		);

		//echo "inside if";
		// check userID exist or not
		$notExist = true;

		$rowUser_id = 0;
		$rowProdJsonArray = array();

		$this->db->select('user_id, prod_id');
		$this->db->where(array('user_id' => $user_id));
		$query2 = $this->db->get('wishlist');

		$order_array = $query2->result_object();
		foreach ($order_array as $order_details) {

			$notExist = false;

			$rowUser_id = $order_details->user_id;
			$rowProdJsonArray = $order_details->prod_id;
		}

		if ($notExist) {

			$prod_json_array[0] =	array(
				'prod_id' => $prod_id,
				'size' => $size,
				'color' => $color,
				'price' => $prod_price,
				'date' => $date
			);

			$prod_jsonarray = json_encode($prod_json_array);

			$data1['user_id'] = $user_id;
			$data1['prod_id'] = $prod_jsonarray;

			$qry1 = $this->db->insert('wishlist', $data1);

			$status = 1;
			//	$msg ="Successfully added product into wishlist.";
			if ($langauge === "1") {
				$msg = "Successfully added product into wishlist.";
			} else {
				$msg = "प्रोडक्ट विशलिस्ट में  जुड़ गया है";
			}
			$information =  array(
				'prod_details' => $jsonarray,
				'totalprice' =>   $totalPrice
			);
		} else {
			$newjsonObject = array(
				'prod_id' => $prod_id,
				'size' => $size,
				'color' => $color,
				'price' => $prod_price,
				'date' => $date
			);

			$oldarray = json_decode($rowProdJsonArray, true);

			$prodIDexist = false;
			$prodattr = false;
			$i = 0;
			foreach ($oldarray as $arraykey) {
				//  echo "prod id ".$arraykey['prod_id'];

				if ($prod_id === $arraykey['prod_id']) {
					$prodIDexist = true;
					//echo " prodId exist in table ";
					if ($size === $arraykey['size'] && $color === $arraykey['color']) {
						$prodattr = true;
					} else {
						$oldarray[$i]['size'] = $size;
						$oldarray[$i]['color'] = $color;
						$oldarray[$i]['price'] = $prod_price;
					}
				}
				$i++;
			}

			if ($prodIDexist) {

				//echo " don't update table";
				if ($prodattr) {
					$status = 1;
					if ($langauge === "1") {
						$msg = "Successfully added product into wishlist.";
					} else {
						$msg = "प्रोडक्ट विशलिस्ट में  जुड़ गया है";
					}
				} else {
					// update color & size
					$oldarray = array_values($oldarray);
					$tempnewarray = 	 json_encode($oldarray);

					$data5['prod_id'] = $tempnewarray;

					$this->db->where('user_id', $user_id);
					$qrysd = $this->db->update('wishlist', $data5);


					if ($qrysd) {
						$status = 1;
						if ($langauge === "1") {
							$msg = "Successfully added product into wishlist.";
						} else {
							$msg = "प्रोडक्ट विशलिस्ट में  जुड़ गया है";
						}
						//$information  = "Successfully Product Added into the wishlist";
					} else {
						$status = 0;
						//	$msg = " Fail to add product into wishlist.";
						if ($langauge === "1") {
							$msg = "Fail to add product into wishlist.";
						} else {
							$msg = "प्रोडक्ट विशलिस्ट में जोड़ने में विफल है ";
						}
						//$information  = "Please try again.";
					}
				}

				// $information  = $qouteId;

			} else {

				array_push($oldarray, $newjsonObject);
				$tempnewarray = 	 json_encode($oldarray);

				$data6['prod_id'] = $tempnewarray;

				$this->db->where('user_id', $user_id);
				$qrysd5 = $this->db->update('wishlist', $data6);

				if ($qrysd5) {
					//echo " row affected is ".;
					$status = 1;
					//	$msg = "Successfully Product Added into the wishlist";
					if ($langauge === "1") {
						$msg = "Successfully added product into wishlist.";
					} else {
						$msg = "प्रोडक्ट विशलिस्ट में  जुड़ गया है";
					}
					//$information  = "Successfully Product Added into the wishlist";
				} else {
					$status = 0;
					//$msg = " Fail to add product into wishlist.";
					if ($langauge === "1") {
						$msg = "Fail to add product into wishlist.";
					} else {
						$msg = "प्रोडक्ट विशलिस्ट में जोड़ने में विफल है ";
					}
					//$information  = "Please try again.";
				}
			}
		}

		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $information
		);


		///$post_data= json_encode( $post_data );

		return $post_data;
	}

	public function getuserwishlist($langauge, $securecode, $user_id)
	{
		$status = 0;

		if ($langauge === "1") {
			$msg = "No Product exist on User wishlist";
			$information = "No Product exist on User wishlist";
		} else {
			$msg = "No Product exist on User wishlist";
			$information = "No Product exist on User wishlist";
		}

		$jsonarray =  array();
		$count = 0;
		$notExist = true;
		$rowProdJsonArray = array();

		$this->db->select('user_id, prod_id');
		$this->db->where(array('user_id' => $user_id));
		$query2 = $this->db->get('wishlist');

		$order_array = $query2->result_object();
		foreach ($order_array as $order_details) {

			$notExist = false;

			$rowUser_id = $order_details->user_id;
			$rowProdJsonArray = $order_details->prod_id;
		}

		if ($notExist) {
			// user didn't add any product till now
			$status = 1;
			if ($langauge === "1") {
				$msg = "No Product exist on User wishlist";
				$information = "No Product exist on User wishlist";
			} else {
				$msg = "No Product exist on User wishlist";
				$information = "No Product exist on User wishlist";
			}	//echo " insdie  if part ";

		} else {
			$oldarray = json_decode($rowProdJsonArray, true);

			$prodIDexist = false;

			foreach ($oldarray as $arraykey) {
				$this->db->select('prod_id, prod_name, prod_mrp, prod_price, prod_rating, prod_rating_count, prod_img_url, pricearray');
				$this->db->where(array('prod_id' => $arraykey['prod_id']));
				$query3 = $this->db->get('productdetails');

				$prod_array = $query3->result_object();
				foreach ($prod_array as $prod_details) {

					$msg = " user wishlist is here";

					$jsonarray[$count] = array(
						'id' => $prod_details->prod_id,
						'name' => $prod_details->prod_name,
						'mrp' => number_format($prod_details->prod_mrp, 2),
						'price' => number_format($prod_details->prod_price, 2),
						'rating' => $prod_details->prod_rating,
						'rating_count' => $prod_details->prod_rating_count,
						'img_url' => $prod_details->prod_img_url,
						'size' => $arraykey['size'],
						'color' => $arraykey['color'],
						'pricearray' => $prod_details->pricearray
					);

					$count = $count + 1;
				}
			}
			$status = 1;
		}

		$information = $jsonarray;

		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $information
		);


		//$post_data= json_encode( $post_data );

		return $post_data;
	}
}
