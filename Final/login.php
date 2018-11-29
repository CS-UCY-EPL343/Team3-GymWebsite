<?php

$user =  'root' ;
$pass = '';
$db = 'msfitcaregym';

$conn = new mysqli('localhost', $user, $pass, $db); 

if(mysqli_connect_errno($conn)){
echo 'Failed to connect';
}
echo "connected";
   $user=$_POST['Name'];  
      $pass=$_POST['Password'];   
 
print_r($_POST);    
       if (isset($_POST['Name']) and isset($_POST['Password'])) {
      // username and password sent from form 
      echo "post";
      $user=$_POST['Name'];  
      $pass=$_POST['Password'];   
 
print_r($_POST);      

      $sql = "SELECT * FROM pelatis WHERE USERNAME='".$user."' AND password='".$pass."'";
      $result = mysqli_query($conn,$sql) or die(mysqli_error($connection));
      $count = mysqli_num_rows($result);
     
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['username'] = $user;
         header("location: http://localhost/Final/profile.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?> 