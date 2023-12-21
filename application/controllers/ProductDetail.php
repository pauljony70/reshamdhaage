<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductDetail extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('home_model');
		$this->load->model('ProductDetail_model');
		$this->data['header_cat'] = $this->home_model->get_category();
    }
    
	public function index($name,$id)
	{
		$this->load->database();  
		$language = 1;
		$securecode = '1234567890';
		$this->data['prod_id'] = $id;
        $this->data['prod_details_data']=$this->ProductDetail_model->get_product_details($language,$securecode,$id);
        $this->data['review_data']=$this->ProductDetail_model->get_review('default',$securecode,$id);
		$this->load->view('product_details.php',$this->data);  // ye view/website folder hai
	}
	

	function add_review()
	{
	        $language = $_REQUEST['language'];
    	    $securecode = $_REQUEST['securecode'];
    	    $user_name = $_REQUEST['user_name'];
    	    $prod_id = $_REQUEST['prod_id'];
    	    $user_id = $_REQUEST['user_id'];
    	    $title = $_REQUEST['title'];
    	    $feedback = $_REQUEST['feedback'];
    	    $rating = $_REQUEST['rating'];

    	    $response = $this->ProductDetail_model->add_review($language,$securecode,$user_name,$prod_id,$user_id,$title,$feedback,$rating);
    		echo json_encode($response);
	}
	
	function productdetaildata()
	{
	    
	    //print_r($_POST);
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $prod_id = $_REQUEST['prod_id'];
	    
	    $response = $this->ProductDetail_model->get_product_details($language,$securecode,$prod_id);
		echo json_encode($response);
	}
}