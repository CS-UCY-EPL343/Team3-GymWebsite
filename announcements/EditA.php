<?php
session_start();
include("connect1.php");
include("auth.php");

?> 
<html>
<head>
   <link rel="Stylesheet" href="style.css">
  <title>Edit Announcement</title>
 
</head>
<body>
    <div class="bar">
   <ul> 
   <li><a class="b"  href="logout.php">Exit<br></a></li>
   </ul>
</div>
    
    <?php $id = $_GET['id']; 
    $fetch_ann = mysqli_query($conn,"select * from announcements where id='$id'");
    $fetched_ann=mysqli_fetch_array($fetch_ann); ?>
     <div class="ann-main">
    <div class="title-child">
     <h1 align="center"> Edit the announcement <?php echo $_GET['id'] ?></h1>
         </div>
    </div>
     <div class="container">
     <form class="contact-form" action="EditA.php?id=<?php echo $_GET['id'];?>" method="post"> 

    <label for="name">Date</label>
    <input type="date" id="name" name="date"  value="<?php echo $fetched_ann["date"] ?>">

    <label for="subject"> Subject</label>
    <input type="text" id="subject" name="subject"  value="<?php echo $fetched_ann["subject"] ?>" >

         <br>
    <label for="maintext">Content</label>
        <br>
    <textarea type="text" id="maintext" name="maintext"  > <?php echo $fetched_ann["maintext"] ?> </textarea>
<br>
      
    <input customer_id="submit-button" name="send" type="submit" value="Submit">

  </form>
  
    </div>
    
     <?php 
	 mysqli_select_db($conn,"database");
 if(isset($_POST['send'])) {		
    $date = $_POST['date'] ;
	$subject = $_POST['subject'] ;
	$message = $_POST['maintext'] ;
	
	  $sqledit=mysqli_query($conn,"UPDATE announcements SET date='$date', subject='$subject', maintext='$message' where id='$id'"); 
    echo "<h2>PHP is Fun!</h2>";
?>   <?php header('Location: announcement.php'); } ?>
	
</body>
</html>



 