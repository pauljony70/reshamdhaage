<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login_data()
	{
		$language = $_POST['language'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];

		$response = $this->login_model->login_details($language, $phone, $password);
		//print_r($response);
		if ($response['status'] == 1) {
			$newdata = array(
				'user_id'  => $response['Information']['user_id'],
				'fullname'  => $response['Information']['fullname'],
				'displayname'  => $response['Information']['display_name'],
				'phone'  => $response['Information']['phone'],
				'logged_in' => TRUE
			);

			$set_data = $this->session->set_userdata($newdata);
			$post_data = json_encode($response);
			echo $post_data;
		} else {
			$post_data = json_encode($response);
			echo $post_data;
		}
	}

	public function logout()
	{
		//removing session  
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
