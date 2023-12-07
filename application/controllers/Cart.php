<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Cart extends CI_Controller {

	function __construct() {
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('cart_model');
		$this->load->model('home_model');
		$this->load->model('checkout_model');
		
    }
    
	public function index()
	{
		$this->load->database();  
        $data['user_data']=$this->home_model->select();
		$data['minordervalue']= $this->cart_model->get_storedata();
		$user_id = $this->session->userdata('user_id');
		$data['cartdetails']= $this->cart_model->get_cart_details(1, 1234567890, $user_id);
		$this->load->view('cart',$data);
	}
	
	function custom_image()
	{
	    if (is_array($_FILES)) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $sourcePath = $_FILES['userImage']['tmp_name'];
                
                 $ext = explode('.', $_FILES['userImage']['name']);
                $file_name = $ext[0];
                $file_ext = $ext[1];
                $new_file = $file_name . '_' . time() . '.' . $file_ext; 
                
                $date = date("Y-m-d");
  	            mkdir("media/".$date);
                
                
                $targetPath = "media/".$date.'/'. $new_file;
                
                if (move_uploaded_file($sourcePath, $targetPath)) {
                    ?>
        <div id="img_div"style="display:none;"><?php echo $targetPath; ?></div>
        <img style="height:200px;height:200px;" class="image-preview" src="<?php echo base_url.$targetPath; ?>"
        	class="upload-preview" />
        <?php
                }
            }
        }
	}
	
	function add_to_cart()
	{
		// echo "controller";
		// die;
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $size = $_REQUEST['size'];
	    $color = $_REQUEST['color'];
	    $user_id = $_REQUEST['user_id'];
	    $prod_price = $_REQUEST['prod_price'];
	    $qty = $_REQUEST['qty'];
	    $prod_id = $_REQUEST['prod_id'];
	    $custom_title = $_REQUEST['custom_title'];
	    $custom_image = $_REQUEST['custom_image'];
	    
	    $response = $this->cart_model->add_to_cart($language,$securecode,$size,$color,$user_id,$prod_price,$qty,$prod_id,$custom_title,$custom_image);
		echo json_encode($response);
	}
	
	function getusercartdetails()
	{
	    $language = $_REQUEST['language'];
	    $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];

	    $response = $this->cart_model->get_cart_details($language,$securecode,$user_id);
		echo json_encode($response);   
	}
	
	function editcartitem()
	{
	    $language = $_REQUEST['language'];
        $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];
	    $prod_id = $_REQUEST['prod_id'];
	    $prod_qtyprice = $_REQUEST['prod_qtyprice'];
	    $prod_qty = $_REQUEST['prod_qty'];

	    $response = $this->cart_model->update_cart_details($language,$securecode,$user_id,$prod_id,$prod_qtyprice,$prod_qty);
		echo json_encode($response);   
	}
	
	function deletecartitem()
	{
	    $language = $_REQUEST['language'];
        $securecode = $_REQUEST['securecode'];
	    $user_id = $_REQUEST['user_id'];
	    $prod_id = $_REQUEST['prod_id'];
	    
	    $response = $this->cart_model->delete_cart_details($language,$securecode,$user_id,$prod_id);
		echo json_encode($response); 

	}
	
}
