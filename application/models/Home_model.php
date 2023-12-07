<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$date = $this->date_time = date('Y-m-d H:i:s');
	}

	public function select()
	{
		//data is retrive from this query  
		$query = $this->db->get('user_profile');
		return $query;
	}

	function get_search_product_request($langauge, $search)
	{
		$status = 0;
		if ($langauge === "1") {
			$msg = "No Product found";
			$Information = "No Product found";
		} else {
			$msg = "कोई प्रोडक्ट नहीं  मिला है";
			$Information = "कोई प्रोडक्ट नहीं  मिला है";
		}
		$jsonarray =  array();
		$filtersize = array();
		$filtercolor = array();
		$filterbrand = array();
		$count = 0;
		$active = "active";

		$this->db->select('pd.prod_id, pd.prod_name, pd.prod_desc, pd.prod_mrp, pd.prod_price, pd.w_price, pd.w_qty, pd.other_attribute,  pd.prod_img_url, bd.brand_name, pd.pricearray, pd.stock, pd.prod_rating, pd.prod_rating_count, pd.review_id, pd.eggless');
		$this->db->join('product prod', 'prod.prod_id = pd.prod_id', 'INNER');
		$this->db->join('brand bd', 'prod.prod_brand_id= bd.brand_id', 'INNER');
		$this->db->join('category ct', 'ct.cat_id= pd.cat_id', 'INNER');
		$this->db->where('prod.status', $active);
		$this->db->like('pd.prod_name', $search);

		$query = $this->db->get('productdetails pd');

		$query_result = $query->result_object();
		//print_r($query_result);
		foreach ($query_result as $product_data) {
			$offpercent =  ($product_data->prod_mrp - $product_data->prod_price) * 100 /  $product_data->prod_mrp;
			//   echo "  stam extecute ".$col1."  prod_name is  ".$col2

			$temp = json_decode($product_data->pricearray);
			$mrp = number_format($product_data->prod_mrp, 0);
			$price = number_format($product_data->prod_price, 0);

			$temp_price = array();
			$temp_mrp = array();
			//print_r($temp);
			if (sizeof($temp, 1) > 0) {
				foreach ($temp as $temp_data) {
					$temp_price[] = $temp_data->attrvalue;
					$temp_mrp[] = $temp_data->attrmrpvalue;
				}
				$mrp = $temp_mrp[0];
				$price = $temp_price[0];
			}


			$status = 1;
			$msg = " Product details are here";
			$jsonarray[$count] = array(
				'id' => $product_data->prod_id,
				'name' => $product_data->prod_name,
				'short_desc' => $product_data->prod_desc,
				'mrp' => $mrp,
				'price' => $price,
				'offpercent' =>  number_format($offpercent, 0),
				'w_price' => number_format($product_data->w_price, 0),
				'w_qty' => $product_data->w_qty,
				'attr' => $product_data->other_attribute,
				'img_url' => $product_data->prod_img_url,
				'brand' => $product_data->brand_name,
				'pricearray' => $product_data->pricearray,
				'stock' => $product_data->stock,
				'rating' => $product_data->prod_rating,
				'ratingcount' => $product_data->prod_rating_count,
				'reviewid' => $product_data->review_id,
				'eggless' => $product_data->eggless
			);

			$count = $count + 1;
		}

		$Information = $jsonarray;


		$post_data = array(
			'status' => $status,
			'msg' => $msg,
			'Information' => $Information,
			'size' => $filtersize,
			'color' => $filtercolor,
			'brand' => $filterbrand,
			'catname' => ""
		);


		//$post_data= json_encode( $post_data );

		return $post_data;
	}

	function get_header_banner_request($section, $dimension)
	{
		$this->db->select('*');
		$this->db->where(array('name' => $section));
		$query = $this->db->get('layoutsection');

		$banner_result = array();

		if ($query->num_rows() > 0) {
			$home_result = $query->result_object();
			foreach ($home_result as $banners) {
				$this->db->select('*');
				$this->db->where(array('layoutsection_id' => $banners->sno));
				$query2 = $this->db->get('sectionvalue');

				$banners_data = array();
				$home_result = $query2->result_object();

				foreach ($home_result as $banners) {

					$banners_data['image'] = 'media/' . $banners->image;
					$banners_data['url'] = $banners->onclick_url;
					$banners_data['title'] = $banners->title;
					$banners_data['des'] = $banners->description;
					$banners_data['btn'] = $banners->button;

					$banner_result[] = $banners_data;
				}
			}
		}

		return $banner_result;
	}

	function get_category()
	{
		$category_result = array();

		$this->db->select('cat.cat_id,cat.cat_name,cat.cat_name_ar,cat.cat_img,cat.parent_id');

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
				$cat_response['cat_slug'] = $cat_details->cat_slug;

				$img = $cat_details->cat_img;


				$cat_response['imgurl'] = $img;

				//get sub category 
				$this->db->select('cat.cat_id,cat.cat_name, cat.cat_name_ar,cat.cat_img,cat.parent_id');

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
						$scat_response['cat_slug'] = $subcat_details->cat_slug;

						$img = json_decode($subcat_details->cat_img);

						$scat_response['imgurl'] = $img;

						//getsub sub category 
						$this->db->select('cat.cat_id,cat.cat_name, cat.cat_name_ar,cat.cat_img,cat.parent_id');

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
								$scat_response1['cat_slug'] = $subcat_details1->cat_slug;

								$img1 = json_decode($subcat_details1->cat_img);


								$scat_response1['imgurl'] = $img1;

								$scat_response['subsubcat_2'][] = $scat_response1;
							}
						}
						$cat_response['subcat_1'][] = $scat_response;
					}
				}

				$category_result[] = $cat_response;
			}
		}

		return $category_result;
	}

	function get_home_products($type)
	{
		$prod_result = array();
		$product_array = array();
		$start = 0;
		$sortby = 1;
		$devicetype = 1;

		$this->db->select('popular_product.product_id');
		$this->db->join('productdetails', 'productdetails.prod_id = popular_product.product_id', 'INNER');
		//$this->db->join('vendor_product vp', 'productdetails.prod_id = vp.product_id','INNER');
		//$this->db->join('sellerlogin seller', 'vp.vendor_id = seller.seller_unique_id','INNER');
		$this->db->where(array('popular_product.type' => $type));
		//$this->db->group_by("popular_product.prod_id"); 
		$this->db->order_by("popular_product.id", 'ASC');

		$this->db->limit(15, $start);

		$query = $this->db->get('popular_product');


		if ($query->num_rows() > 0) {
			$category_result = $query->result_object();
			$product_id = array();
			foreach ($category_result as $cat_product) {
				$product_id[] = $cat_product->product_id;
			}


			//get products details
			$this->db->select('pd.prod_id as id , pd.prod_name as name, pd.prod_img_url as img , "active" as active, pd.prod_mrp as mrp, pd.prod_price price, pd.stock as stock, pd.prod_remark as remark');


			$this->db->where_in('pd.prod_id', $product_id);
			$this->db->group_by("pd.prod_id");

			/*if($sortby==1){
				$this->db->order_by("vp2.mrp_min",'ASC'); 
			}else if($sortby==2){
				$this->db->order_by("vp2.mrp_min",'DESC'); 
			}else if($sortby==3){
				$this->db->order_by("pd.created_at",'DESC'); 
			}else if($sortby==4){
				$this->db->order_by("pd.prod_rating_count",'DESC'); 
			}*/

			$query_prod = $this->db->get('productdetails as pd');

			if ($query_prod->num_rows() > 0) {
				$prod_result = $query_prod->result_object();

				$product_array = array();
				foreach ($prod_result as $productdetails) {
					$product_response = array();
					$product_response['id'] = $productdetails->id;
					$product_response['name'] = str_replace('"', '', $productdetails->name);
					$product_response['active'] = $productdetails->active;
					$product_response['mrp'] =  $productdetails->mrp;
					$product_response['price'] = $productdetails->price;
					$product_response['stock'] = $productdetails->stock;
					$product_response['remark'] = $productdetails->remark;
					$product_response['rating'] = 0;

					$discount_per = 0;
					$discount_price = 0;
					if ($productdetails->price > 0) {
						$discount_price = ($productdetails->mrp - $productdetails->price);

						$discount_per = ($discount_price / $productdetails->mrp) * 100;
					}
					$product_response['totaloff'] = $discount_price;
					$product_response['offpercent'] = round($discount_per) . '% off';

					$img_decode = json_decode($productdetails->img);


					$product_response['imgurl'] = $img_decode[0]->url;
					$product_array[] = $product_response;
				}
			}
		}

		return $product_array;
	}
}
