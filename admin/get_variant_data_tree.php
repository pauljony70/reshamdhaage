<?php
include('session.php');
$code = $_POST['code'];

$code= "123";// stripslashes($code);
if(!isset($_SESSION['admin'])){
  header("Location: index.php");
 // echo " dashboard redirect to index";
}else
if($code=="123"){
    
 
    try{
    
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
    // echo "inside";
   $return = array();
   $i =0;
      
      
   function variantTree($parent_idv = 0, $sub_mark = ''){
        include('../app/db_connection.php');
        global $conn; global $return; global $i;
        $query2 = $conn->query("SELECT * FROM product_variant_cat WHERE parent_id = $parent_idv ORDER BY variant_name ASC");
        if($query2->num_rows > 0){
            while($row = $query2->fetch_assoc()){
               //echo $row['variant_id']." -- ".$sub_mark.$row['variant_name']."<br>";
                echo '<option value="'.$row['variant_name'].'">'.$sub_mark.$row['variant_name'].'</option>';
                	$return[$i] = 
        					array(	
        					    'id' =>$row['variant_id'],
        						'name' => $sub_mark.$row['variant_name']);
              		   $i = $i+1;  	
                variantTree($row['variant_id'], $sub_mark.'---');
                }
            }
        }
       variantTree();
       //echo " array created".json_encode($return)."<br><br>";
      
        // echo json_encode($return);    
     }
    catch(PDOException $e)
        {
        echo "Error: " . $e->getMessage();
        }

}
?>