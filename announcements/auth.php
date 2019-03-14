<?php
$check=0;
//$role_check=0;
//$_SESSION['role_check']=0; 


if(isset($_SESSION['customer_id'])){
$check=1;
    
if(($_SESSION['role'])!='Admin')
    header("Location:announcement.php");

}

if($check==0){
header("Location:login.php");    
}
?>