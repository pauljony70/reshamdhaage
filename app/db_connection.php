<?php
 // header ('Content-Type: text/html; charset=UTF-8'); 
  
define('HOST', 'localhost');
define('DB1', 'reshamdhaage');
define('USER', 'root');
define('PASS', '');
// define('DB1', 'u467215979_reshamdhaage');
// define('USER', 'u467215979_reshamdhaage');
// define('PASS', '7z;Nx0U9?sK');

$OTPauthKey = ""; 
 
$serverkey="AAAAcxFB1SWsdfsdf834hfnNeT"; 
 
define('BASEURL', 'http://localhost/reshamdhaage/');
// define('BASEURL', 'https://reshamdhaage.com/');

$g_mail = "info@mkkirana.com";
$senderid = "mkkirana";

$conn = new mysqli(HOST, USER, PASS, DB1);


if($conn->connect_errno){
	trigger_error('Database connection has failed '. $conn->connect_errno, E_USER_ERROR);
}


?>
