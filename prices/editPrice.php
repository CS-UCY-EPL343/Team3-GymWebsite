<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../connect.php');
$response = array();

 if (!empty($_POST)) {
     
     $id = $_POST["id"];
     $title = $_POST["ptitle"];
     $description = $_POST["description"];
     $price = $_POST["price"];
   
     
		$query = "update prices set title=:title, price=:price, description=:description where id=:id";
	    $stmt = $DBcon->prepare( $query );
		$stmt->bindParam(':id', $id,PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
       
       
     

      
     $stmt->execute();
   
   
    echo $json_encode($response);
  
        
        }
    ?>