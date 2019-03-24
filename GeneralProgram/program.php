<?php
session_start();
include("connect1.php");

?>
<html>
<head>
    <style>
    .pdf{
        margin-left: 25%;
    
        }
    </style>
    </head>
<body>
  <?php 
    $id=2;
    $query = mysqli_query($conn,"select pdf from program  where id='$id'"); 
while ($row = mysqli_fetch_assoc($query)) {
$pdf=$row['pdf'];
}
    ?>
    
 <img src="<?php echo $pdf ; ?>"  width="50%" height="900px" />  
    
    </body>
</html>