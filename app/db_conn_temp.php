<?php
$OTPauthKey = ""; 
 
$serverkey="AAAAcxFB1SWsdfsdf834hfnNeT"; 
 
define('BASEURL', 'http://localhost/mkkirana/admin/');

$g_mail = "info@mkkirana.com";
$senderid = "mkkirana";
$connection = mysqli_connect("localhost", "root", "", "mkkirana");
    	   

if($connection->connect_errno){
	trigger_error('Database connection has failed '. $conn->connect_errno, E_USER_ERROR);
} else{
    echo"connected";
}


?>
