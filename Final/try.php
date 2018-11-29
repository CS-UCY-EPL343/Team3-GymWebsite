
<?php

$user =  'root' ;
$pass = '';
$db = 'msfitcaregym';

$conn = new mysqli('localhost', $user, $pass, $db); 

if(mysqli_connect_errno($conn)){
echo 'Failed to connect';
}

$name =  $_POST['FirstName'];
$lname = $_POST['LastName'];
$phone = $_POST['PhoneNumber'];
$email = $_POST['Email'];
$username = $_POST['UserName'];
$password = $_POST['Password'];
$id=$_POST['Id_num'];
$birthday= $_POST['birthday'];

print_r($_POST);

$sql =mysqli_query($conn, "INSERT INTO pelatis (ID_NUM,ONOMA, EPITHETO, PHONE, EMAIL, USERNAME, PASSWORD,IM_GENNISIS) VALUES ('$id','$name','$lname','$phone','$email','$username','$password','$birthday')");

if(mysqli_affected_rows($conn)>0){
echo "<p> Customer Added </p>";
header("refresh:3; url=http://localhost/EPL343ASS/index.html");
}
else{
echo "Customer NOT Added <br/>";
echo mysqli_error($conn);
}

?>
