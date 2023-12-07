<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Address_model extends CI_Model {

   public function __construct() {
        parent::__construct();
		
		$date = $this->date_time = date('Y-m-d H:i:s');
    }
	
	public function get_country_data()  
    {  
	 $query = $this->db->get('country'); 
	 return $query;  
    }
   
   function insert_data($country_code,$phone,$address,$city,$pin,$country)
   {
	$date = $this->date_time = date('Y-m-d H:i:s');
	/*$query=$this->db->query("select * from address where (phone='".$phone."')");
		$row = $query->num_rows();
		if($row)
		{
		$data['message']="<h3 style='color:red'>This Address already registered</h3>";
		}
		else
		{*/		
		$query=$this->db->query("insert into address set country_code='$country_code',phone='$phone',address='$address',city='$city',pin='$pin',country='$country',datetime='$date'");

		$data['message']="<h3 style='color:blue'>You are Add successfully</h3>";
		//}

	//	$this->load->view('address',@$data);
	return $data;  
	}

	public function select()  
    {  
	 //data is retrive from this query  
	 $query = $this->db->get('address');  
	 return $query;  
    }  

	public function get_data($id)  
    {  
	  $this->db->where('sno',$id);
	 $query = $this->db->get('address'); 
	 return $query;  
    }  
	        

	
	public function editdata($country_code,$phone,$address,$city,$pin,$country,$sno)
	{
		$update = array(
            'country_code' => $country_code,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'pin' => $pin,
            'country' => $country
            );
        $this->db->where('sno',$sno);
        $this->db->update('address', $update);
		
	
	}

	public function delete_user($id)
    {
        $this->db->where('sno', $id);
        return $this->db->delete('address');
    }
   
}
