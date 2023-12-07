<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('wishlist_model');
		$this->load->model('home_model');
		
    }
    
	public function index()
	{
		if(!empty($this->session->userdata('user_id'))) {
			$this->load->database();  
			$data['user_data']=$this->home_model->select();     
			
			$language = $_REQUEST['language'];
			$securecode = $_REQUEST['securecode'];
			$user_id = $this->session->userdata('user_id');
			
			$data['wishlist_data'] = $this->wishlist_model->getuserwishlist($language,$securecode,$user_id);

			$this->load->view('wishlist',$data);
		} else{
			redirect(base_url);
		}
	}
	
	function getuserwishlist()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];

	    
	    $response = $this->wishlist_model->getuserwishlist($language,$securecode,$user_id);
    	echo json_encode($response);
	}
	
	function getcategory()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    
	    
	    $response = $this->wishlist_model->getcategory($language,$securecode);
		// echo "<pre>";
		// print_r($response);
		// exit;
	    echo json_encode($response);
	}
	
	function deletewishlistitem()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];
	    $prod_id = $_REQUEST['prod_id'];

	    
	    $response = $this->wishlist_model->deletewishlistitem($language,$securecode,$user_id,$prod_id);
    	echo json_encode($response);
	}
	
	function add_prod_into_wishlist()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];
	    $prod_id = $_REQUEST['prod_id'];
        $prod_price = $_REQUEST['prod_price'];
        $qty = $_REQUEST['qty'];
	    
	    $response = $this->wishlist_model->add_prod_into_wishlist($language,$securecode,$user_id,$prod_id,$prod_price,$qty);
    	echo json_encode($response);
	}
}