<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {
	
	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('address_model');
		
    }

	public function index()
	{
		 $this->load->database();  
         $data['user_data']=$this->address_model->select(); 
		 $data['country_data']=$this->address_model->get_country_data();
		 $this->load->view('address', $data);
		//$this->load->view('admin_user');
	}
	public function add_address()
	{
			$country_code = $_POST['country_code'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$pin = $_POST['pin'];
			$country = $_POST['country'];
			
			$this->address_model->insert_data($country_code,$phone,$address,$city,$pin,$country);

			redirect('address');
	}
	
	public function edit($id)
	{
		$data['id'] = $id;
		$data['user_data']=$this->address_model->get_data($id);
		$data['country_data']=$this->address_model->get_country_data();
		$this->load->view('edit_address',$data);
		
	}
	
	public function edit_data()
	{
		$country_code = $_POST['country_code'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$pin = $_POST['pin'];
		$country = $_POST['country'];
		$sno = $_POST['sno'];
		
		$this->address_model->editdata($country_code,$phone,$address,$city,$pin,$country,$sno);
		redirect('address');

	}

	public function delete($id)
    {
        $id = $this->uri->segment(3);
        
        if($this->address_model->delete_user($id)){
			$this->session->set_flashdata('message', 'Deleted Sucessfully');
			redirect('address');  
		}		
    }
	
}
