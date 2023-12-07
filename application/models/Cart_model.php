<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$date = $this->date_time = date('Y-m-d H:i:s');
	}

	function get_storedata()
	{
		$minordervalue = 0;
		$this->db->select('name,value');
		$query0 = $this->db->get('store_config');
		$store_array = $query0->result_object();
		foreach ($store_array as $store_data) {

			if ($store_data->name == "minorder") {
				$minordervalue = $store_data->value;
			}
		}
		return $minordervalue;
	}


	function add_to_cart($language, $securecode, $size, $color, $user_id, $prod_price, $qty, $prod_id, $custom_title, $custom_image)
	{
		if (isset($language)  && !empty($language) && isset($securecode)  && !empty($securecode) && isset($prod_id)  && !empty($prod_id) && !empty($user_id) && !empty($qty)) {
			$status = 0;
			date_default_timezone_set("Asia/Kolkata");
			$date = date("Y-m-d");
			$eggless = '';
			$msgoncake = '';
			$referid = '';
			$msg = "failled to add product into cart";
			$information = "failled to add product into cart";

			$alreadypurchase = false;
			$this->db->select('order_id');
			$this->db->where(array('user_id' => $user_id, 'prod_id' => $prod_id));
			$query = $this->db->get('order_product');

			if ($query->num_rows() > 0) {
				$alreadypurchase = true;
			}

			$notExist = true;
			$qouteId = 1000;
			$rowUser_id = 0;
			$rowProdJsonArray = array();
			$cartcount = 0;

			$alreadypurchase = false;
			$this->db->select('user_id,prod_id,qoute_id');
			$this->db->where(array('user_id' => $user_id));
			$query0 = $this->db->get('cartdetails');

			if ($query0->num_rows() > 0) {
				$notExist = false;
				$user_data = $query0->result_object()[0];
				$user_id = $user_data->user_id;
				$rowProdJsonArray = $user_data->prod_id;
				$qouteId = $user_data->qoute_id;
			}

			if ($alreadypurchase == true) {
				$status = 2;
				$msg = "You have already purchased the same product before. Multiple purchase of same product is not allow.";

				$information  =  array(
					'qoute_id' => $qouteId,
					'cart_count' => $cartcount
				);
			} else if ($notExist) {
				$this->db->select('qoute_id');
				$this->db->order_by('user_id', 'DESC');
				$this->db->limit(1);
				$query2 = $this->db->get('cartdetails');

				if ($query2->num_rows() > 0) {
					$user_data0 = $query2->result_object()[0];
					$qouteId = $user_data0->qoute_id;
				}


				$prod_json_array[0] =	array(
					'prod_id' => $prod_id,
					'qty' => $qty,
					'size' => $size,
					'color' => $color,
					'price' => $prod_price,
					'date' => $date,
					'referid' => $referid,
					'custom_title' => $custom_title,
					'custom_image' => $custom_image,
					'msgoncake' => $msgoncake,
					'eggless' => $eggless
				);

				$prod_jsonarray = json_encode($prod_json_array);

				// add prod id into cartdetails table
				$qouteId =  $qouteId + 1;

				$data['user_id'] = $user_id;
				$data['prod_id'] = $prod_jsonarray;
				$data['qoute_id'] = $qouteId;

				$qry = $this->db->insert('cartdetails', $data);
				if ($qry) {
					$cartcount = 1;
					$status = 1;
					$msg = "Successfully added product into cart.";
				}
				$information =  array(
					'qoute_id' => $qouteId,
					'cart_count' =>  $cartcount
				);
			} else {

				$newjsonObject = array(
					'prod_id' => $prod_id,
					'qty' => $qty,
					'size' => $size,
					'color' => $color,
					'price' => $prod_price,
					'date' => $date,
					'referid' => $referid,
					'custom_title' => $custom_title,
					'custom_image' => $custom_image,
					'msgoncake' => $msgoncake,
					'eggless' => $eggless
				);

				$oldarray = json_decode($rowProdJsonArray, true);

				$prodIDexist = false;
				$prodattr = false;
				$i = 0;
				foreach ($oldarray as $arraykey) {

					if ($prod_id === $arraykey['prod_id']) {
						$prodIDexist = true;
						//echo " prodId exist in table ";
						if (
							$size === $arraykey['size'] && $color === $arraykey['color'] && $prod_price === $arraykey['price']
							&& $qty === $arraykey['qty'] && $msgoncake === $arraykey['msgoncake'] && $eggless === $arraykey['eggless']
						) {
							$prodattr = true;
						} else {
							$oldarray[$i]['size'] = $size;
							$oldarray[$i]['color'] = $color;
							$oldarray[$i]['price'] = 	$prod_price;
							$oldarray[$i]['qty'] = 	$qty;
							$oldarray[$i]['msgoncake'] = 	$msgoncake;
							$oldarray[$i]['eggless'] = 	$eggless;
						}
					}
					$i++;
					$cartcount = 	$cartcount + 1;
				}
				if ($prodIDexist) {

					//echo " don't update table";
					if ($prodattr) {

						$status = 1;
						$msg = "Successfully added product into cart.";
						$information  =  array(
							'qoute_id' => $qouteId,
							'cart_count' => $cartcount
						);
					} else {
						// update color & size
						$oldarray = array_values($oldarray);
						$tempnewarray = 	 json_encode($oldarray);

						$data['prod_id'] = $tempnewarray;

						$this->db->where('user_id', $user_id);
						$qrys = $this->db->update('cartdetails', $data);


						if ($qrys) {
							$status = 1;
							$msg = "Successfully added product into cart.";
							$information  =  array(
								'qoute_id' => $qouteId,
								'cart_count' => $cartcount
							);
						} else {
							$status = 0;
							$msg = " Fail to add product into cart.";
							$msg = " Fail to add product into cart.";
							$information  =  array(
								'qoute_id' => $qouteId,
								'cart_count' => $cartcount
							);
						}
					}
				} else {

					array_push($oldarray, $newjsonObject);


					$tempnewarray = 	 json_encode($oldarray);
					$cartcount = 	$cartcount + 1;

					$data['prod_id'] = $tempnewarray;

					$this->db->where('user_id', $user_id);
					$qrysd = $this->db->update('cartdetails', $data);


					if ($qrysd) {
						//echo " row affected is ";
						$status = 1;
						$msg = "Successfully Product Added into the card";
						$information  =  array(
							'qoute_id' => $qouteId,
							'cart_count' => $cartcount
						);
					} else {


						$status = 0;
						$msg = " Fail to add product into cart.";
						$information  =  array(
							'qoute_id' => $qouteId,
							'cart_count' => $cartcount
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

			mysqli_close($conn);
		}
	}

	function get_cart_details($language, $securecode, $user_id)
	{
		$status = 0;
		$jsonarray =  array();
		$rowProdJsonArray = array();
		$totalPrice = 0;
		$msg = "No Product exist on User cart";
		$information = array(
			'prod_details' => $jsonarray,
			'totalprice' =>   $totalPrice
		);

		$count = 0;
		$notExist = true;

		if (isset($language)  && !empty($language) && isset($securecode)  && !empty($securecode)  && !empty($user_id)) {


			$this->db->select('user_id,prod_id,qoute_id');
			$this->db->where(array('user_id' => $user_id));
			$query0 = $this->db->get('cartdetails');

			if ($query0->num_rows() > 0) {
				$notExist = false;
				$user_data = $query0->result_object()[0];
				$rowUser_id = $user_data->user_id;
				$rowProdJsonArray = $user_data->prod_id;
				$qouteId = $user_data->qoute_id;
			}

			//$msg = "No Product exist on User 888 cart ". $notExist ; 
			if ($notExist) {
				// user didn't add any product till now
				$status = 1;
				$msg = "No Product exist on User cart";
				$information = array(
					'prod_details' => $jsonarray,
					'totalprice' =>   $totalPrice
				);
			} else {
				$oldarray = json_decode($rowProdJsonArray, true);

				$i = 0;
				$update_cart = 0;
				foreach ($oldarray as $arraykey) {
					//   echo "prod id ".$arraykey['prod_id'];
					$prodIDexistincart = 0;
					$proprice = str_replace(",", '', $arraykey['price']);
					$prodid = $arraykey['prod_id'];


					$this->db->select('pd.prod_id, pd.prod_name, pd.prod_mrp, pd.prod_price, pd.prod_img_url, ct.cat_name, pd.unit, pd.other_attribute, pd.pricearray, pd.stock, prod.status');
					$this->db->join('product prod', 'prod.prod_id = pd.prod_id', 'INNER');
					$this->db->join('category ct', 'ct.cat_id= pd.cat_id', 'INNER');
					$this->db->where(array('pd.prod_id' => $prodid));
					$query = $this->db->get('productdetails pd');


					$prod_array = $query->result_object();
					foreach ($prod_array as $prod_details) {
						$prodIDexistincart = 1;
						$msg = " user cart details is here";
						$proprice_simple = $prod_details->prod_price;
						$multipricearray = json_decode($prod_details->pricearray, true);
						$ismutliprice = 0;
						$stock = $prod_details->stock;
						foreach ($multipricearray as $mulitarraykey) {
							$ismutliprice = 1;
							if (($mulitarraykey['attrnam'] === $arraykey['size'] || $mulitarraykey['attrnam'] === $arraykey['color'])) {
								//array_push( $filtersize,$mulitarraykey['attrnam']);
								if ($mulitarraykey['attrvalue'] != $arraykey['price']) {
									$proprice = $mulitarraykey['attrvalue'];
									// echo "price has change --".$mulitarraykey['attrnam']."--oldprice--".$arraykey['price']."--new--".$mulitarraykey['attrvalue']."--prodprice-". $proprice;
									$oldarray[$i]['price'] = 	$proprice;
									$update_cart = 1;
								}
								// check available stock
								if ($mulitarraykey['attrstockvalue'] != "") {
									$stock = $mulitarraykey['attrstockvalue'];
									//  echo "Match found--".$mulitarraykey['attrnam']."--stock--".$mulitarraykey['attrstockvalue'];

								}
							}
						}
						if ($ismutliprice == 0 && $proprice_simple != $arraykey['price']) {
							//  echo "--simpleprice--".$proprice_simple."--old---".$arraykey['price']  ;
							$proprice = $proprice_simple;
							$oldarray[$i]['price'] = 	$proprice;
							$update_cart = 1;
						}
						/* 
        		  	 foreach($multipricearray as $mulitarraykey) {
            			 //  echo " attrname-- ".$arraykey['attrnam']."--";
            			  if (  ($mulitarraykey['attrnam']=== $arraykey['size'] || $mulitarraykey['attrnam']=== $arraykey['color'] ))
                          {
                    	   //array_push( $filtersize,$mulitarraykey['attrnam']);
            		       if($mulitarraykey['attrstockvalue'] !=""){
                		        $stock = $mulitarraykey['attrstockvalue']; 
                              //  echo "Match found--".$mulitarraykey['attrnam']."--stock--".$mulitarraykey['attrstockvalue'];
                                    
            		        }
            		      }
                    }*/
						$prod_active = $prod_details->status;
						if ($stock <= 0 || $prod_active == "inactive") {
							// delete item from the cart
							unset($oldarray[$i]);
							$update_cart = 1;
							// echo "unset stock /inactive--".$i."--";
						} else {
							$totalPrice = $totalPrice  + $proprice * $arraykey['qty'];
							$prod_total_price = $proprice * $arraykey['qty'];
							$jsonarray[$count] = array(
								'id' => $prodid,
								'name' => $prod_details->prod_name,
								'mrp' => number_format($prod_details->prod_mrp, 0),
								'price' => $proprice, // $prod_details->prod_price,	 			 
								'qty' => $arraykey['qty'],
								'img_url' => $prod_details->prod_img_url,
								'size' => $arraykey['size'],
								'color' => $arraykey['color'],
								'cat_name' => $prod_details->cat_name,
								'unit' => $prod_details->unit,
								'attr' => $prod_details->other_attribute,
								'pricearray' => $prod_details->other_attribute,
								'stock' => $stock,
								'msgoncake' => $arraykey['msgoncake'],
								'eggless' => $arraykey['eggless'],						 	 					 'prod_total_price' => $prod_total_price
							);
							$count = $count + 1;
						}
					}
					if ($prodIDexistincart == 0) {
						unset($oldarray[$i]);
						$update_cart = 1;
					}
					$i++;
				}
				$status = 1;

				$information =  array(
					'prod_details' => $jsonarray,
					'totalprice' =>  number_format($totalPrice, 0)
				);

				// echo "udate caert".$update_cart;
				if ($update_cart == 1) {
					$oldarray =	array_values($oldarray);
					$tempnewarray = 	 json_encode($oldarray);

					$data['prod_id'] = $tempnewarray;

					$this->db->where('user_id', $user_id);
					$qrys = $this->db->update('cartdetails', $data);
				}
			}
		} else {

			$status = 1;
			$msg = "No Product exist on User cart";
			$information = array(
				'prod_details' => $jsonarray,
				'totalprice' =>   number_format($totalPrice, 0)
			);
		}

		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $information
		);

		//$post_data= json_encode( $post_data );

		return $post_data;
	}
	function update_cart_details($langauge, $securecode, $user_id, $prod_id, $qtyprice, $qty)
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		$status = 0;
		$totalPrice = 0;
		$qtyname = '';
		if ($langauge === "1") {
			$msg = "failed to edit product on cart";
		} else {
			$msg = "कार्ट में प्रोडक्ट को अपडेट करने में विफल रहे";
		}

		$information =   array(
			'status' =>  $msg,
			'totalprice' =>    number_format($totalPrice, 2),
			'updateprice' => 0
		);

		$notExist = true;
		$qouteId = 1000;
		$rowUser_id = 0;
		$rowProdJsonArray = array();

		$this->db->select('user_id,prod_id,qoute_id');
		$this->db->where(array('user_id' => $user_id));
		$query0 = $this->db->get('cartdetails');

		if ($query0->num_rows() > 0) {
			$notExist = false;
			$user_data = $query0->result_object()[0];
			$rowUser_id = $user_data->user_id;
			$rowProdJsonArray = $user_data->prod_id;
			$qouteId = $user_data->qoute_id;
		}

		if ($notExist) {
			/// no  userid doens't exist on table

			$status = 1;
			if ($langauge === "1") {
				$msg = " No product exist on User cart";
			} else {
				$msg = "आप के अकाउंट में कोई प्रोडक्ट नहीं है";
			}
			$information =  array(
				'status' =>  $msg,
				'totalprice' =>    number_format($totalPrice, 2),
				'updateprice' => 0
			);
		} else {
			/// yes userid exist

			$oldarray = json_decode($rowProdJsonArray, true);

			$prodIDexist = false;

			$i = 0;
			foreach ($oldarray as $arraykey) {
				//  echo "prod id ".$arraykey['prod_id'];

				if ($prod_id === $arraykey['prod_id']) {

					$prodIDexist = true;
					$oldarray[$i]['qty'] = $qty;
					//$oldarray [$i] ['size'] = $qtyname;	  

					$oldarray[$i]['price'] = $qtyprice;
					//echo " prodId exist in table ";
				}
				// echo "    new ".$arraykey['price'] ."   qyt ".$oldarray [$i] ['qty'];
				$proprice = str_replace(",", '', 	$oldarray[$i]['price']);

				$totalPrice = $totalPrice  +  $proprice *  	$oldarray[$i]['qty'];

				$i++;
			}

			if ($prodIDexist) {

				//	echo " don't update table";die;
				// rearrange json array then insert into database
				$oldarray = array_values($oldarray);

				// echo " item edit array ". json_encode( $oldarray, true) ;
				$tempnewarray = 	 json_encode($oldarray);

				$data['prod_id'] = $tempnewarray;

				$this->db->where('user_id', $user_id);
				$qrysd = $this->db->update('cartdetails', $data);

				//echo " row ".$rows;

				if ($qrysd) {
					//echo " row affected is ".;
					$status = 1;
					if ($langauge === "1") {
						$msg = "Successfully edit product quantity on cart ";
					} else {
						$msg = "कार्ट में प्रोडक्ट की संख्या अपडेट हो गयी है";
					}
					$information  =  array(
						'status' =>  $msg,
						'totalprice' =>   number_format($totalPrice, 2),
						'updateprice' => 1
					);
				} else {


					$status = 1;
					if ($langauge === "1") {
						$msg = "Fail to edit product quantity on cart.";
					} else {
						$msg = "कार्ट में प्रोडक्ट की संख्या को अपडेट करने में विफल रहे ";
					}
					$information  =  array(
						'status' =>  $msg,
						'totalprice' =>    number_format($totalPrice, 2),
						'updateprice' => 0
					);
				}
			} else {
				$status = 1;
				if ($langauge === "1") {
					$msg = "Fail to edit product quantity on cart.";
				} else {
					$msg = "कार्ट में प्रोडक्ट की संख्या को अपडेट करने में विफल रहे ";
				}
				$information  =  array(
					'status' =>  $msg,
					'totalprice' =>  number_format($totalPrice, 2),
					'updateprice' => 0
				);
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

	function delete_cart_details($langauge, $securecode, $user_id, $prod_id)
	{
		if (isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode) && isset($prod_id)  && !empty($prod_id) && !empty($user_id)) {
			date_default_timezone_set("Asia/Kolkata");
			$date = date("Y-m-d");

			$status = 0;
			$totalPrice = 0;
			$cartcount = 0;
			if ($langauge === "1") {
				$msg = "fail to delete product from cart";
			} else {
				$msg = "fail to delete product from cart";
			}

			$information = array(
				'status' =>  $msg,
				'totalprice' =>   $totalPrice,
				'cart_count' => $cartcount
			);
			$detailsarray =  array();
			$notExist = true;
			$qouteId = 1000;
			$rowUser_id = 0;
			$rowProdJsonArray = array();

			$this->db->select('user_id,prod_id,qoute_id');
			$this->db->where(array('user_id' => $user_id));
			$query0 = $this->db->get('cartdetails');

			if ($query0->num_rows() > 0) {
				$notExist = false;
				$user_data = $query0->result_object()[0];
				$rowUser_id = $user_data->user_id;
				$rowProdJsonArray = $user_data->prod_id;
				$qouteId = $user_data->qoute_id;
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

					$cartcount = 	$cartcount + 1;
					$i++;
				}

				if ($prodIDexist) {
					$oldarray =	array_values($oldarray);
					$tempnewarray = 	 json_encode($oldarray);
					$data['prod_id'] = $tempnewarray;

					$this->db->where('user_id', $user_id);
					$qrysd = $this->db->update('cartdetails', $data);

					if ($qrysd > 0) {
						//echo " row affected is ".;
						$status = 1;
						// one item delete from cart
						$cartcount = 	$cartcount - 1;

						if ($langauge === "1") {
							$msg = "Successfully Delete product from cart";
						} else {
							$msg = "Successfully Delete product from cart";
						}
						$information  = array(
							'status' =>  $msg,
							'totalprice' =>  number_format($totalPrice, 2),
							'cart_count' => $cartcount
						);
					} else {
						$status = 1;
						if ($langauge === "1") {
							$msg = "fail to delete product from cart";
						} else {
							$msg = "fail to delete product from cart";
						}
						$information  = array(
							'status' => $msg,
							'totalprice' =>  number_format($totalPrice, 2),
							'cart_count' => $cartcount
						);
					}
				}
			}

			$post_data = array(
				'status' => $status,
				'msg' => $msg,
				'Information' => $information
			);


			$post_data = json_encode($post_data);

			echo $post_data;
		}
	}
}
