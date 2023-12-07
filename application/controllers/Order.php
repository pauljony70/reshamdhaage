<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('order_model');
		$this->load->model('home_model');
		
    }
    
	public function index()
	{
		$this->load->database();  
        $data['user_data']=$this->home_model->select();  
		$this->load->view('order',$data);
	}
	
	function getorderhistory()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];

	    
	    $response = $this->order_model->getorderhistory($language,$securecode,$user_id);
		// print_r($response);
    	echo json_encode($response);
	}
	
	function getorderhistorydetails()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];
	    $order_id = $_REQUEST['order_id'];

	    
	    $response = $this->order_model->getorderhistorydetails($language,$securecode,$user_id,$order_id);
		// print_r($response);
    	echo json_encode($response);
	}
	
	function order_details($order_id)
	{
	    $this->load->database();  
		$user_id = $this->session->userdata('user_id');

	    $data['order_id'] = $order_id;
        $data['user_data']=$this->home_model->select();
		$data['order_detail'] = $this->order_model->getorderhistorydetails(1,1234567890,$user_id,$order_id);

		$this->load->view('order_details',$data);
	}
}