<?php
$servername = "localhost";
$username = "gym";
$password = "VzuNPZeNYErTHXGT";
$database="gym";
//$charset='utf8'; // specify the character set
//$collation='utf8_general_ci'; //specify what collation you wish to use

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

<!--printing function-->
<?php function printer($object,$val){

if ($val==1)
echo $object;
}  ?>


<br><br>


<?php 

$errormsg="";

if(isset($_POST['submit'])){ 

//check if form was submitted
$username = $_POST['username']; 

mysqli_select_db($conn,$database);
$sqlquery = "select * from customers where username='$username' ";
$check_user = mysqli_query($conn , $sqlquery) or
die("Database error detected: " . mysql_error());

$number = mysqli_num_rows( $check_user );
if ( $number == 0)	{
echo "Wrong username or password. Please try again!!";
}else  {
$errormsg="User Found!!";
printer($errormsg,1);


//fetch user
$sqlquery = "select * from customers where username='$username' ";
$user = mysqli_query($conn , $sqlquery) or
die("Database error detected: " . mysql_error());

$fetched_user=mysqli_fetch_array($user);
printer($fetched_user["password"],0);

//create new password
$rand1=strval(rand(1000000,9999999));
$rand2=strval(rand(1000000,9999999));

$new_pass= $rand1;
$new_pass.= $fetched_user["username"];
$new_pass.= $rand2;
printer($new_pass,0);

//encypt new pass
$enc_password = hash('sha256', $new_pass);
printer($enc_password,0);

//push new password to DB
$temp_user=$fetched_user["username"];
$push_pass=mysqli_query($conn,"UPDATE customers SET password='$enc_password' where username='$temp_user' "); 

//send email
$email=$fetched_user["email"];
printer($email,0);

$msg="This is MS FiT Care Gym. \n \n Your new password is: ";
$msg.= $new_pass;
$msg.="\n\nThank you!";
$msg=wordwrap($msg,70);

mail($email,"Reset Password",$msg);
echo "Sent successfully!!";

}

}

?>


<html>
<head>

<link rel="stylesheet" type="text/css" href="css/style.css">
    
    <title> Reset Password </title> 
 </head>
<body>
<form class="contact-form" action="http://cproject.in.cs.ucy.ac.cy/gym/registration/resetpass.php" method="post">   
    <div class="container">

    
    <input type="text" id="username" name="username" placeholder="Enter username here..">
   
        <input id="login-button" name="submit" type="submit" value="Login"> 
        </div>
    </form>
</body>
</html>
