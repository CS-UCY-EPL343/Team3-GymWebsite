<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../connect.php');
$response = array();

 if (!empty($_POST)) {
     
  
     $filename = $_FILES['file']['name'];


$location = '../uploads/'.$filename;


$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);


$image_ext = array("jpg","png","jpeg","gif");

$response['img_status'] = 0;
if(in_array($file_extension,$image_ext)){
  
  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
   $response['img_status'] = $location;
  }
}
     $id = $_POST["id"];
     $title = $_POST["title"];
     $description = $_POST["description"];
     $capacity = $_POST["capacity"];
    // $image = $_POST["image"];
     
		$query = "update services set title=:title, description=:description, image=:image, capacity=:capacity where service_id=:id";
	    $stmt = $DBcon->prepare( $query );
		$stmt->bindParam(':id', $id,PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $filename);
        $stmt->bindParam(':capacity', $capacity);
     

      
     $stmt->execute();
   
    if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Service Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete Service ...';
		}
     
    echo $json_encode($response);
  
        
        }
    ?>