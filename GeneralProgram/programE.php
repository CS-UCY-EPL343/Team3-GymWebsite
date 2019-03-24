<?php
session_start();
include("connect1.php");
$message="";
$id=2;
if (isset($_FILES["file"]["name"])) {

    $name = $_FILES["file"]["name"];
    $tmp_name = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];
    $parts = explode(".", $name);
    $one = $parts[0];
    $two = $parts[1];
    if (!empty($name)&&($two=='jpg'||$two=='gif'||$two=='jpeg'||$two=='heic')) {
        $location = 'uploads/';

        if  (move_uploaded_file($tmp_name, $location.$name)){
    $sqledit=mysqli_query($conn,"UPDATE program SET  pdf='$location.$name' where id='$id'");  
            $message ='Uploaded';
        }

    } else {
        $message= 'Please choose a pdf file!';
    }
}
?>
 <?php
            if ($message != "") {
                echo '<div class="alert alert-danger"><strong></strong> ' . $message . '</div>';
            }
            ?>
<form action="programE.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" value="Submit">
</form>
