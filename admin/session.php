<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter

include('../app/db_connection.php');
$conn;
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['admin'];
    //echo " login sesson fail ";
 
 if(!isset($user_check)){
   //  echo " login sesson not set ";
	header('Location: index.php'); // Redirecting To Home Page
  //	mysql_close($conn); // Closing Connection
     
 }

?>