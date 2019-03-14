
<?php 
require_once('../connect.php');
$response = array();

 if (!empty($_POST)) {
     $response = array();
     $id = $_POST["id"];
     $title = $_POST["ptitle"];
     $description = $_POST["description"];
     $price = $_POST["price"];
     $picture = $_POST["picture"];
     
		$query = "update products set name=:title, description=:description, img_file=:picture, price=:price where id=:id";
	    $stmt = $DBcon->prepare( $query );
		$stmt->bindParam(':id', $id,PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':price', $price);
     

      
     $stmt->execute();
   
    if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete product ...';
		}
     
    echo $json_encode($response);
  
        
        }
     