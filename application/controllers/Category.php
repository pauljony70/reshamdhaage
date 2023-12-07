<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('home_model');
		
    }
    
	public function index($cat_name,$cat_id)
	{
		$this->load->database(); 
		$data['cat_name'] = $cat_name;
		$data['cat_id'] = $cat_id;
        $data['user_data']=$this->home_model->select();
		$data['category_details'] = $this->category_model->getcategory_product(1, 1234567890, $cat_id);
		$this->load->view('category',$data);
	}
	
	public function all_category()
	{
		$this->load->database(); 
		$data['category'] = $this->category_model->get_all_category(); 
		$this->load->view('all_category',$data);
	}
	
	public function sub_category($cat_id)
	{
		$this->load->database(); 
		$data['name_cat'] = $this->category_model->get_name_category($cat_id);
		$data['category'] = $this->category_model->get_sub_category($cat_id);
		$data['cat_id'] = $cat_id;
		$this->load->view('sub_category',$data);
	}
	
	
	
	
	function getcategory_product()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $catid = $_REQUEST['catid'];

	    
	    $response = $this->category_model->getcategory_product($language,$securecode,$catid);
    	echo json_encode($response);
	}
}