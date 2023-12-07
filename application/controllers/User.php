<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller{

    function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_model');
	}

    function getUserDetails()
    {
        if($this->session->userdata('user_id') != "")
        {
            $user_id = $this->session->userdata('user_id');

            $user_details = $this->user_model->getUserFullDetails($user_id);

            if($user_details['status'] == 1){
                // print_r($user_details);
                $this->load->view("dashboard.php", $this->user_details);
            }

        } else {
            return redirect(base_url);
        }
    }

    // function get User account details
    function getAccountDetail()
    {
        if($this->session->userdata('user_id') != "")
        {
            $user_id = $this->session->userdata('user_id');

            $data = $this->user_model->getUserFullDetails($user_id);

            if($data['status'] == 1){
                if($data['user_details']->display_name == ""){
                    $data['user_details'][0]->display_name = $data['user_details'][0]->full_name;
                }
                $user_data['profile_info'] = $data['user_details'];
                $this->load->view("accountdetails.php", $user_data);
            }

        } else {
            return redirect(base_url);
        }
    }

    // function to update User Details
    function updateUserDetails()
    {
        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
        $displayname = $_POST['displayname'];
        $email = $_POST['email'];
        $phone_no = $_POST['phone_num'];

        $response = $this->user_model->updateUserDetails($user_id, $fullname, $displayname, $email, $phone_no);

        echo json_encode($response);
    }

}
