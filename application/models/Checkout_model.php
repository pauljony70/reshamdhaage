<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Checkout_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$date = $this->date_time = date('Y-m-d H:i:s');
	}

	public function add_address($langauge, $securecode, $fullname, $user_id, $email, $address1, $address2, $city, $state, $pincode, $phone)
	{
		$landmark = '';
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		$jsonarray =  array();
		$addressid_count = 1;

		$status = 0;
		if ($langauge === "1") {
			$msg = "fail to add User Address";
			$information = "fail to add User Address";
		} else {
			$msg = "यूजर का पता जोड़ने में असफल है|";
			$information = "यूजर का पता जोड़ने में असफल है|";
		}

		$notExist = true;

		$rowUser_id = 0;
		$rowAddressArray = array();
		$org_rowAddressArray = array();
		$pincodeexist = false;
		$this->db->select('name');
		$this->db->where(array('pincode' => $pincode));
		$query_pin = $this->db->get('pincode');
		if ($query_pin->num_rows() > 0) {
			$pincodeexist = true;
		}

		if ($pincodeexist) {

			$this->db->select('user_id, addressarray, org_addressarray');
			$this->db->where(array('user_id' => $user_id));
			$query0 = $this->db->get('address');

			if ($query0->num_rows() > 0) {
				$notExist = false;
				$user_data = $query0->result_object()[0];

				$rowUser_id = $user_data->user_id;
				$rowAddressArray = $user_data->addressarray;
				$org_rowAddressArray = $user_data->org_addressarray;
			}


			if ($notExist) {

				$address_json_array[0] =	array(
					'address_id' => $addressid_count,
					'fullname' => $fullname,
					'email' => $email,
					'address1' => $address1,
					'address2' => $address2,
					'landmark' => $landmark,
					'city' => $city,
					'state' => $state,
					'pincode' => $pincode,
					'phone' => $phone
				);

				//echo " prod array is ".	json_encode( $prod_json_array );

				$address_jsonarray = json_encode($address_json_array);
				// push into org array
				//   array_push( $org_oldarray , $newjsonObject   );
				//	$tempnewarray_org = 	 json_encode( $org_oldarray);

				// add prod id into cartdetails table

				$data['user_id'] = $user_id;
				$data['addressarray'] = $address_jsonarray;
				$data['defaultaddress'] = $addressid_count;
				$data['org_addressarray'] = $address_jsonarray;
				$data['pincode'] = $pincode;

				$qry = $this->db->insert('address', $data);


				//if(!empty($stmt2->insert_id)){

				//echo "  insert sus ";

				$status = 1;
				if ($langauge === "1") {
					$msg = "Successfully added user address";
					$information = "Successfully added user address";
				} else {
					$msg = "पता सफलतापूर्वक जुड़ गया है ";
					$information = "पता सफलतापूर्वक जुड़ गया है ";
				}
			} else {
				/// yes userid exist


				$oldarray = json_decode($rowAddressArray, true);

				$org_oldarray = json_decode($org_rowAddressArray, true);


				foreach ($org_oldarray as $arraykey) {
					//  echo "prod id ".$arraykey['prod_id'];

					$addressid_count = $addressid_count + 1;
				}

				$newjsonObject = array(
					'address_id' => $addressid_count,
					'fullname' => $fullname,
					'email' => $email,
					'address1' => $address1,
					'address2' => $address2,
					'landmark' => $landmark,
					'city' => $city,
					'state' => $state,
					'pincode' => $pincode,
					'phone' => $phone
				);


				array_push($oldarray, $newjsonObject);
				array_push($org_oldarray, $newjsonObject);

				$tempnewarray = 	 json_encode($oldarray);
				$tempnewarray_org = 	 json_encode($org_oldarray);

				$data['addressarray'] = $tempnewarray_org;
				$data['defaultaddress'] = $addressid_count;
				$data['org_addressarray'] = $tempnewarray_org;
				$data['pincode'] = $pincode;

				$this->db->where('user_id', $user_id);
				$qrysd = $this->db->update('address', $data);


				if ($qrysd) {
					//echo " row affected is ".;
					$status = 1;
					if ($langauge === "1") {
						$msg = "Address Added successfully.";
						$information = "Successfully added user address";
					} else {
						$msg = "पता सफलतापूर्वक जुड़ गया है ";
						$information = "पता सफलतापूर्वक जुड़ गया है ";
					}
				} else {


					$status = 0;
					if ($langauge === "1") {
						$msg = " Fail to add new address.";
						$information = "Fail to add new address.";
					} else {
						$msg = "यूजर का पता जोड़ने में असफल है|";
						$information = "यूजर का पता जोड़ने में असफल है|";
					}
				}
			}
		} else {
			// pincode exist false
			$status = 0;
			if ($langauge === "1") {
				$msg = "Product delivery is not available in your place.";
				$information = "Product delivery is not available in your place.";
			} else {
				$msg = "आप के एरिया में अभी डिलीवरी उपलब्ध नहीं है कृपया दूसरा पता लिखे";
				$information = "आप के एरिया में अभी डिलीवरी उपलब्ध नहीं है कृपया दूसरा पता लिखे";
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

	function get_address($langauge, $securecode, $user_id)
	{
		$subtotal = '';
		if (isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)  && !empty($user_id)) {
			$status = 0;
			$rowAddressJsonArray = array();
			$delivery = array();
			$notExist = true;
			$defaultaddress = 0;
			$shippingfees = "0.00";
			if ($langauge === "1") {
				$msg = "No Address exist for User. Please Add New Address.";
			} else {
				$msg = "यूजर का पता मौजूद नहीं है। कृपया नया पता जोड़ें";
			}
			$information = array(
				'address_details' => $rowAddressJsonArray,
				'defaultaddress' => 0,
				'deliverytime' => $delivery,
				'shippingfees' => $shippingfees
			);

			// get product count in usercart then multiple it by Rs 20
			$cartProdJsonArray = array();
			$prodcount = 0;
			$prod_shipfees = 0;

			$this->db->select('prod_id');
			$this->db->where(array('user_id' => $user_id));
			$query0 = $this->db->get('cartdetails');

			if ($query0->num_rows() > 0) {
				$notExist = false;
				$user_data = $query0->result_object()[0];

				$cartProdJsonArray = $user_data->prod_id;
			}

			$oldarray = json_decode($cartProdJsonArray, true);

			foreach ($oldarray as $arraykey) {
				$prodcount = $prodcount + 1;

				$this->db->select('shipping');
				$this->db->where(array('prod_id' => $arraykey['prod_id']));
				$query = $this->db->get('productdetails');
				$prod_array = $query->result_object();
				foreach ($prod_array as $prod_details) {
					$prod_shipfees = $prod_shipfees + ($prod_details->shipping * $arraykey['qty']);
				}
			}
			$this->db->select('user_id, addressarray, defaultaddress, pincode');
			$this->db->where(array('user_id' => $user_id));
			$query2 = $this->db->get('address');

			$add_array = $query2->result_object();
			foreach ($add_array as $add_details) {
				$notExist = false;

				$rowUser_id = $add_details->user_id;
				$rowAddressJsonArray  = $add_details->addressarray;
				$defaultaddress = $add_details->defaultaddress;
				$userpincode = $add_details->pincode;
			}

			$minordervalue = "0";
			$freeship = "0";
			$allindiafees = 85;
			$this->db->select('name, value');
			$query3 = $this->db->get('store_config');

			$fee_array = $query3->result_object();
			foreach ($fee_array as $fee_details) {

				if ($fee_details->name == "minorder") {
					$minordervalue = $fee_details->value;
				} else if ($fee_details->name == "allindia_ship") {
					$allindiafees = $fee_details->value;
				} else if ($fee_details->name == "freeship") {
					$freeship = $fee_details->value;
				}
			}
			$shippingfees  =   $prod_shipfees; //$allindiafees *$prodcount;

			if ($notExist) {
				// user didn't add any product till now
				$status = 0;
				if ($langauge === "1") {
					$msg = "No Address exist for User. Please Add New Address.";
				} else {
					$msg = "यूजर का पता मौजूद नहीं है। कृपया नया पता जोड़ें";
				}
				$information = array(
					'address_details' => $rowAddressJsonArray,
					'defaultaddress' => 0,
					'deliverytime' => $delivery,
					'shippingfees' => $shippingfees
				);
			} else {

				$prodIDexist = false;

				$dCount = 0;
				$this->db->select('timevalue');
				$query4 = $this->db->get('deliverytime');

				$time_array = $query4->result_object();
				foreach ($time_array as $time_details) {

					$delivery[$dCount] = $time_details->timevalue;
					$dCount = $dCount + 1;
				}


				if ($subtotal >    $freeship) {
					$shippingfees = "0.00";
					//   $msg ="Your Order Value is greater than $minordervalue.\n\n You Get Free Shipping. ";
				}

				$status = 1;
				$msg = "Address details for User";
				$information = array(
					'address_details' => json_decode($rowAddressJsonArray),
					'defaultaddress' => $defaultaddress,
					'deliverytime' => $delivery,
					'shippingfees' => $shippingfees
				);

				//$jsonarray;
				//  $msg = "No Product exist on ---cart ". $notExist ;


			}

			$post_data = array(
				'status' => $status,
				'msg' => $msg,
				'Information' => $information
			);


			//$post_data= json_encode( $post_data );
			return  $post_data;
		}
	}


	function get_order_data($langauge, $securecode, $user_id)
	{
		$cashondelivery  = "false";
		$minordervalue = "0";
		$freeship = "100";
		$freeshipping = 0;

		$status = 0;
		$jsonarray =  array();
		$rowProdJsonArray = array();
		$subtotal = 0;
		$ordertotal = 0;

		$cgst  = 0;
		$sgst = 0;
		$igst = 0;
		//$shiparray = array();
		$shippingfees = 0;
		$this->db->select('pincode');
		$this->db->where(array('user_id' => $user_id));
		$query_pin = $this->db->get('address');
		$data_array_pin = $query_pin->result_object();
		foreach ($data_array_pin as $data_pin_details) {
			$pincode = $data_pin_details->pincode;
		}
		$this->db->select('shippingfee');
		$this->db->where(array('pincode' => $pincode));
		$query_ship = $this->db->get('pincode');
		$data_array_ship = $query_ship->result_object();
		foreach ($data_array_ship as $data_ship_details) {
			$shippingfees = $data_ship_details->shippingfee;
		}

		if ($langauge === "default") {
			$msg = "No Product exist on User cart";
		} else {
			$msg = "No Product exist on User cart";
		}
		$information = array(
			'prod_details' => $jsonarray,
			'subtotal' =>   $subtotal,
			'shippingfee' =>   '0.00',
			'csgt' =>   '0.00',
			'sgst' =>   '0.00',
			'igst' =>   '0.00',
			'ordertotal' =>   $ordertotal,
			'feeshipping' => $freeshipping,
			'minorder' => $minordervalue,
			'cashondelivery' =>    $cashondelivery
		);


		$count = 0;
		$notExist = true;

		if (isset($langauge)  && !empty($langauge) && isset($securecode)  && !empty($securecode)  && !empty($user_id)) {

			$this->db->select('user_id, prod_id, qoute_id');
			$this->db->where(array('user_id' => $user_id));
			$query = $this->db->get('cartdetails');
			$data_array = $query->result_object();
			foreach ($data_array as $data_details) {

				$notExist = false;

				$rowUser_id = $data_details->user_id;
				$rowProdJsonArray = $data_details->prod_id;
				$qouteId = $data_details->qoute_id;
			}

			if ($notExist) {
				// user didn't add any product till now
				$status = 1;
				if ($langauge === "1") {
					$msg = "No Product exist on User cart";
				} else {
					$msg = "No Product exist on User cart";
				}
			} else {


				$oldarray = json_decode($rowProdJsonArray, true);

				$prodIDexist = false;
				$freeship_essential = 0;   // for essential product give freeshiping if the product is only item in cart.

				foreach ($oldarray as $arraykey) {
					//  echo "prod id ".$arraykey['prod_id'];
					// for each product id get product details from table productdetails  

					$this->db->select('prod_id, prod_name, prod_price, cgst, sgst, igst, shipping, other_attribute, cashon, prod_img_url, freeship');
					$this->db->where(array('prod_id' => $arraykey['prod_id']));
					$query1 = $this->db->get('productdetails');

					$order_array = $query1->result_object();
					foreach ($order_array as $order_details) {

						//$stmt->bind_result ( $col1, $col2, $col3, $col4, $col44, $col444, $col5, $col6, $col7, $col8, $col9);

						//while($stmt->fetch() ){

						$freeship_essential = $order_details->freeship;
						$weight = json_decode($order_details->other_attribute, true);

						$msg = " user cart details is here";

						$subtotal =  $subtotal  + str_replace(',', '', $arraykey['price']) * $arraykey['qty'];
						$cgst = $cgst + ($arraykey['price'] * $arraykey['qty']) - (($arraykey['price'] * $arraykey['qty']) * 100) / (100 + $order_details->cgst);
						$sgst = $sgst + ($arraykey['price'] * $arraykey['qty']) - (($arraykey['price'] * $arraykey['qty']) * 100) / (100 + $order_details->sgst);
						$igst = 0;     //$igst +  ($arraykey['price'] * $arraykey['qty']) - (($arraykey['price'] * $arraykey['qty']) * 100) /(100 + $col444);

						$price = $arraykey['price'] * $arraykey['qty'];
						//  echo " tax --".$tax;
						//  $shiparray[$count] = $col5;
						/* $shippingfees = $shippingfees +($order_details->shipping *$arraykey['qty']);*/
						$jsonarray[$count] = array(
							'id' => $order_details->prod_id,
							'name' => $order_details->prod_name,
							'price' => number_format($price, 0),
							'qty' => $arraykey['qty'],
							'size' => $arraykey['size'],
							'color' => $arraykey['color'],
							'weight' => $weight['weight'],
							'cashon' => $order_details->cashon,
							'image' => $order_details->prod_img_url,
							'msgoncake' => $arraykey['msgoncake'],
							'eggless' => $arraykey['eggless']
						);

						$count = $count + 1;
					}
				} // foreach close


				$this->db->select('name, value');
				$query3 = $this->db->get('store_config');

				$fee_array = $query3->result_object();
				$ship_allindina = 50;
				foreach ($fee_array as $fee_details) {

					if ($fee_details->name == "minorder") {
						$minordervalue = $fee_details->value;
					} else if ($fee_details->name == "cashondelivery") {
						$cashondelivery = $fee_details->value;
					} else if ($fee_details->name == "freeship") {
						$freeship = $fee_details->value;
					} else if ($fee_details->name == "allindia_ship") {
						// $ship_allindina = $fee_details->value;
					}
				}


				//echo "minksksj ".$ship_allindina;
				$status = 1;
				//	  echo "order ". number_format($subtotal , 2)."--". $tax  ."--". max($shiparray);
				$ordertotal = $subtotal;
				/* $shippingfees = $ship_allindina ; */ //max($shiparray); //  $shippingfees ;  
				if ($ordertotal > $freeship) {
					$shippingfees = "0.00";
					$freeshipping = 1;
					$msg = "Your Order Value is greater than $freeship.\n\n You Get Free Shipping. ";
				}

				// for each product id get product details from table productdetails 
				//echo " count ".$count."------".$freeship_essential;
				/*if($count ==1 && $freeship_essential ==1){
	      	 $shippingfees = "0.00";
	      }
	      */
				$ordertotal = $subtotal +  $shippingfees;
				//	  echo "--".	  $ordertotal;
				$information = array(
					'prod_details' => $jsonarray,
					'subtotal' =>   number_format($subtotal, 0),
					'shippingfee' => number_format($shippingfees, 0),
					'cgst' =>   number_format($cgst,  0),
					'sgst' =>   number_format($sgst,  0),
					'igst' =>   number_format($igst,  0),
					'ordertotal' =>  number_format($ordertotal, 0),
					'feeshipping' => $freeshipping,
					'minorder' => $minordervalue,
					'cashondelivery' =>    $cashondelivery
				);

				//$jsonarray;
				//  $msg = "No Product exist on ---cart ". $notExist ;


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

	function update_defaultaddress($language, $securecode, $user_id, $default_addressid)
	{

		$status = 0;
		$pincode = '';
		if ($language === "1") {
			$msg = "Address update failed.";
		} else {
			$msg = "Address update failed";
		}

		$data['defaultaddress'] = $default_addressid;
		$data['pincode'] = $pincode;

		$this->db->where('user_id', $user_id);
		$qrysd = $this->db->update('address', $data);

		if ($qrysd) {
			//echo " row affected is ".;
			$status = 1;
			if ($language === "1") {
				$msg = "Address Update successfully.";
				$information = "Successfully update user address";
			} else {
				$msg = "पता अपडेट हो गया है";
				$information = "पता अपडेट हो गया है";
			}
		} else {


			$status = 0;
			if ($language === "1") {
				$msg = " Fail to update address.";
				$information = "Fail to update address.";
			} else {
				$msg = "पता अपडेट नहीं हुआ है";
				$information = "पता अपडेट नहीं हुआ है";
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

	function delete_address($langauge, $securecode, $user_id, $address_id)
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d");

		if ($langauge === "default") {

			$msg = "fail to delete address.";
		} else {
			$msg = "पता हटाने में विफल।";
		}

		$information = $msg;

		$detailsarray =  array();
		//echo "inside if";
		$status = 0;
		$defaultaddress = 0;
		// check userID exist or not
		$notExist = true;
		$rowProdJsonArray = array();

		$this->db->select('addressarray, defaultaddress');
		$this->db->where(array('user_id' => $user_id));
		$query0 = $this->db->get('address');

		$data_array = $query0->result_object();
		foreach ($data_array as $data_details) {

			$notExist = false;
			$rowProdJsonArray = $data_details->addressarray;
			$defaultaddress = $data_details->defaultaddress;
		}

		if ($notExist) {
			/// no  userid doens't exist on table


		} else {
			/// yes userid exist

			//	echo " hh";		 
			$oldarray = json_decode($rowProdJsonArray, true);

			$addressIDexist = false;
			$i = 0;

			foreach ($oldarray as $arraykey) {
				// echo "prod id ".$arraykey['address_id']."  ".$address_id;

				if ($address_id == $arraykey['address_id']) {
					$addressIDexist = true;

					unset($oldarray[$i]);

					// 	echo " prodId exist in table ";
				}


				$i++;
			}

			if ($addressIDexist) {

				//echo " don't update table";


				$oldarray =	array_values($oldarray);

				$tempnewarray = 	 json_encode($oldarray);

				$data['addressarray'] = $tempnewarray;

				$this->db->where('user_id', $user_id);
				$qrysd = $this->db->update('address', $data);


				if ($qrysd) {
					//	echo " row affected is ";
					$status = 1;

					if ($langauge === "1") {
						$msg = "Address Deleted Successfully";
					} else {
						$msg = "पता सफलतापूर्वक हटा दिया गया";
					}
				} else {


					$status = 0;
					if ($langauge === "1") {
						$msg = "fail to delete address.";
					} else {
						$msg = "पता हटाने में विफल।";
					}
				}
			}
		}


		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $msg
		);


		//$post_data= json_encode( $post_data );

		return $post_data;
	}


	function placeorder($langauge, $securecode, $user_id, $paymentorder_id, $payment_id, $address_id, $customer_name, $customer_email, $customer_phone, $customer_address, $customer_city, $customer_state, $customer_pincode, $total_price, $qoute_id, $deliverymode, $extraship, $deliveryid, $walletcoins, $discountvalue, $discountid, $shipping)
	{
		date_default_timezone_set("Asia/Kolkata");
		$date = date("Y-m-d H:i:s");

		$cust_phone = "";
		$cust_email = "";

		$totalprice = "";
		$totalcgst = "";
		$totalsgst = "";
		$totalship = "";
		$status = 0;

		$Information = array(
			'status' => $msg,
			'orderId' => ""
		);
		$prod_details = "";
		$prodother_attr = "";
		$prod_pricearray = "";

		$orderstatus = "Placed";

		$this->db->select('prod_id');
		$this->db->where(array('user_id' => $user_id));
		$query0 = $this->db->get('cartdetails');

		$prod_array = $query0->result_object();
		foreach ($prod_array as $prod_details) {

			$prod_details = $prod_details->prod_id;
		}

		$orderid = 100000;

		$this->db->select('order_id');
		$this->db->order_by('order_id', 'DESC');
		$this->db->limit(1);
		$query1 = $this->db->get('orders');

		$order_array = $query1->result_object();
		foreach ($order_array as $order_details) {

			$orderid = $order_details->order_id;
		}
		$orderid =  $orderid + 1;
		$total_price =   number_format($total_price,  0, '.', '');


		$data['order_id'] = $orderid;
		$data['user_id'] = $user_id;
		$data['status'] = $orderstatus;
		$data['prod_details'] = $prod_details;
		$data['address_id'] = $address_id;
		$data['customer_name'] = $customer_name;
		$data['customer_email'] = $customer_email;
		$data['customer_phone'] = $customer_phone;
		$data['customer_address'] = $customer_address;
		$data['customer_city'] = $customer_city;
		$data['customer_state'] = $customer_state;
		$data['customer_pincode'] = $customer_pincode;
		$data['total_price'] = $total_price;
		$data['payment_orderid'] = $paymentorder_id;
		$data['payment_id'] = $payment_id;
		$data['delivery_mode'] = $deliverymode;
		$data['qoute_id'] = $qoute_id;
		$data['create_date'] = $date;
		$data['update_date'] = $date;
		$data['deliveryid'] = $deliveryid;
		$data['walletcoins'] = $walletcoins;
		$data['discountid'] = $discountid;
		$data['discountvalue'] = $discountvalue;

		$qry = $this->db->insert('orders', $data);


		if ($qry) {

			$prodarray = json_decode($prod_details, true);
			$i = 0;
			foreach ($prodarray as $arraykey) {

				$subtotal = $arraykey['price'];
				$subtotal = str_replace(",", '',  $subtotal);
				$sno = $arraykey['prod_id'];
				$qty = $arraykey['qty'];
				$price = $arraykey['price'];
				$price  = str_replace(",", '',   $price);
				$size = $arraykey['size'];
				$color = $arraykey['color'];
				$msgoncake = $arraykey['msgoncake'];
				$eggless = $arraykey['eggless'];
				$referid = $arraykey['referid'];

				$this->db->select('prod_name, prod_img_url, cgst, sgst, igst, shipping, coins, pricearray, sellername');
				$this->db->where(array('prod_id' => $sno));
				$query2 = $this->db->get('productdetails');

				$prods_array = $query2->result_object();
				foreach ($prods_array as $prods_details) {

					$refercoins = $prods_details->coins;
					$imgarray = json_decode($prods_details->prod_img_url, true);
					$imageurl = "";
					$count = 1;
					foreach ($imgarray as $arraykeyyy) {
						if ($count === 1) {
							$imageurl = "../media/" . $arraykeyyy['url'];
							$count++;
						}
					}
					$attr = "Size : " . $size . " | Color : " . $color . " | Eggless : " . $eggless . " | MSG : " . $msgoncake;
					$prod_pricearray = $prods_details->pricearray;

					$prod_name = $prods_details->prod_name;
					$cgst = $prods_details->cgst;
					$sgst = $prods_details->sgst;
					$igst = $prods_details->igst;
					$stockistname = $prods_details->sellername;

					$totalprice = (int)$totalprice + ($price * $qty);
					$totalcgst = (int)$totalcgst + ($price * $qty) - (($price * $qty) * 100) / (100 + $cgst);
					$totalsgst = (int)$totalsgst + ($price * $qty) - (($price * $qty) * 100) / (100 + $sgst);
					$totalship =  $shipping;

					$total = ($price * $qty); //+ (($price * $qty) * $cgst )/100 + (($price * $qty) * $sgst )/100+ (($price * $qty) * $igst )/100 ;
					$total =  number_format($total,  0, '.', '');
					$price =  number_format($price,  0, '.', '');
					$shipping =  number_format($shipping,  0, '.', '');

					$data1['order_id'] = $orderid;
					$data1['user_id'] = $user_id;
					$data1['prod_id'] = $sno;
					$data1['prod_name'] = $prod_name;
					$data1['prod_img'] = $imageurl;
					$data1['prod_attr'] = $attr;
					$data1['qty'] = $qty;
					$data1['org_qty'] = $qty;
					$data1['prod_price'] = $price;
					$data1['cgst'] = $cgst;
					$data1['sgst'] = $sgst;
					$data1['igst'] = $igst;
					$data1['shipping'] = $shipping;
					$data1['total'] = $total;
					$data1['create_date'] = $date;
					$data1['update_date'] = $date;
					$data1['sellername'] = $stockistname;


					$qry1 = $this->db->insert('order_product', $data1);

					if ($qry1) {
						$status = 1;
						if ($langauge === "1") {
							$msg = "Order has placed Successful.";
							$txtmsg = "Order has placed Successfully. We will SMS you the order confirmation with details.";
						} else {
							$msg = "Order has placed Successful.";
							$txtmsg = "Order has placed Successfully. We will SMS you the order confirmation with details.";
						}
						$Information =  array(
							'status' => $txtmsg,
							'orderId' => $orderid
						);

						$this->db->where('user_id', $user_id);
						$del3 = $this->db->delete('cartdetails');

						$this->db->select('addressarray');
						$this->db->where(array('user_id' => $user_id));
						$query3 = $this->db->get('address');

						$add_array = $query3->result_object();
						foreach ($add_array as $add_details) {

							$adrarray = json_decode($add_details->addressarray, true);

							foreach ($adrarray as $adrkey) {
								//   echo " col8 - ".$col8. "--".$arraykey['address_id'];
								if ($address_id == $adrkey['address_id']) {

									$cust_phone = $adrkey['phone'];
									$cust_email = $adrkey['email'];


									// echo "phone is ".$cust_phone."---".$action;

									//    echo "--sms send";
								}
							}
						}

						$data5['stock'] = $qty;

						$this->db->where('prod_id', $sno);
						$qrysd = $this->db->update('productdetails', $data5);

						$jsonobj =    json_decode($prod_pricearray, true);

						$x = 0;
						foreach ($jsonobj as $jsonobjkey) {
							//echo " item--".$jsonobjkey['attrnam']."--".$size.'fff'.$sno."--";
							if ($size === $jsonobjkey['attrnam']) {

								$jsonobj[$x]['attrstockvalue'] = $jsonobjkey['attrstockvalue'] - $qty;

								$tempnewarray = 	 json_encode($jsonobj);
								// echo " temparray ".$tempnewarray;
								// update query here
								//print_r($tempnewarray);
								$data00['pricearray'] = $tempnewarray;
								$this->db->where('prod_id', $sno);
								$qrysd = $this->db->update('productdetails', $data00);

								// $stmt18 = $conn->prepare("UPDATE productdetails SET pricearray=? WHERE prod_id=?") ;
								//$stmt18->bind_param( 'si', $tempnewarray, $sno);
								//$stmt18->execute();
								//$rows=$stmt18->affected_rows;

							}

							$x++;
						}
					} else {

						$status = 1;
					}
				}
				$i = $i + 1;
			}

			$post_data = array(
				'status' => $status,
				'msg' => $msg,
				'Information' => $Information
			);

			//$post_data= json_encode( $post_data );
			$this->db->select('email');
			$this->db->where(array('roll' => 'admin'));
			$query0 = $this->db->get('seller_login');

			$data_array = $query0->result_object();
			foreach ($data_array as $data_details) {

				$admin_email = $data_details->email;
			}


			$subjectmsg = "Your Order Has Placed. Order Id is " . $orderid;
			$bodymsg = "We have received order request from You. Your order id is $orderid and Total price is  Rs. $total_price";

			$subject2 = "New Order Received today. Order Id is " . $orderid;
			$bodymsg2 = "New Order has received from customer. Order id is $orderid and Total price is  Rs. $total_price";

			//$post_data= json_encode( $post_data );
			if ($email != '') {
				send_mails($email, $subjectmsg, $status, $bodymsg, $date, $orderid, $totalprice, $cgst, $sgst, $shipping, $total_price);
			}
			send_mails($admin_email, $subject2, $status, $bodymsg2, $date, $orderid, $totalprice, $cgst, $sgst, $shipping, $total_price);


			return $post_data;
		}
	}
}

function send_mails($emailid, $subjectmsg, $status, $bodymsg, $date, $orderid, $price, $cgst, $sgst, $ship, $total)
{

	//  $phone =  stripslashes($phone); 

	if (isset($emailid) && !empty($subjectmsg)) {

		$to      = $emailid;
		$subject = $subjectmsg;
		//  $message = $bodymsg;               
		$headers = 'From: admin@mkkirana.com' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		$variables = array();

		$variables['status'] = $status;
		$variables['bodymsg'] = $bodymsg;
		$variables['date'] = $date;
		$variables['orderid'] = $orderid;
		$variables['price'] = $price;
		$variables['cgst'] = $cgst;
		$variables['sgst'] = $sgst;
		$variables['shipping'] = $ship;
		$variables['total'] = $total;

		$template = '<html>

				<h3 style="text-align: center;">Order Status : {{ status }}</h3>
				<hr>

				<p style="text-align: center;"> <strong>{{ bodymsg }} </strong> </p>
				<br>
				<table width="100%" border="1" style="background-color:#e1e4e9; padding-top:15px; padding-bottom:15px;">
						<tr>
						  <td><b>Date </b></td> <td><b>Order ID</b> </td> <td> <b>Price</b></td><td> <b>Shipping</b></td><td> <b>Total</b></td>
						</tr>
						<tr>
							<td>{{ date }}</td> <td>{{ orderid }}</td><td>{{ price }}</td><td>{{ shipping }}</td><td>{{ total }}</td>
						</tr>
						
						<tr>
							
				</table>
				<br><br>
				<hr>
				<footer style="text-align: center;">
				  <p><strong>Mkkirana</strong></p>
				  <p>Contact us: <a href="mailto:info@mkkirana.com">info@mkkirana.com</a>.</p>
				</footer>
				<hr>
				</html>';

		/* $template = file_get_contents($template_data);*/

		foreach ($variables as $key => $value) {
			$template = str_replace('{{ ' . $key . ' }}', $value, $template);
		}

		$message =  $template;
		// echo " *** main *** ".  $message;
		mail($to, $subject, $message, $headers);
	}
}
