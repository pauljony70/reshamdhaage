<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('home_model');
		
    }
    
	public function index()
	{
		$this->load->database();  
        $data['user_data']=$this->home_model->select();  
		$this->load->view('contact-us',$data);
	}
}