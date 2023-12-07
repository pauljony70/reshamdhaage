<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('register_model');
	}


	public function index()
	{
		$this->load->view('register.php');
	}

	function register_data()
	{
		$language = $_POST['language'];
		$fullname = $_POST['fullname'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$response = $this->register_model->register_details($language, $fullname, $phone, $password);
		// print_r($response);
		// die;
		if ($response['status'] == 1) {
			$newdata = array(
				'user_id'  => $response['Information']['user_id'],
				'fullname'  => $response['Information']['fullname'],
				'phone'  => $response['Information']['phone'],
				'logged_in' => TRUE
			);

			$set_data = $this->session->set_userdata($newdata);
			$post_data = json_encode($response);
			echo $post_data;
		} else{
			$post_data = json_encode($response);
			echo $post_data;
		}
	}
}
