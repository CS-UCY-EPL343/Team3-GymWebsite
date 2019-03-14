<?php
session_start();

include("connect1.php");
include("GeneralAuth.php");
?> 
<html>
<head>
 
 <link rel="Stylesheet" href="style.css">
<title>Announcement</title>
</head>

<body>


<div class="bar">
  <ul> 
   <li><a class="b" href="logout.php">Exit<br></a></li>
    </ul>
</div>

<div class="ann-main">
    <div class="title-child">
<h1 align="center">Announcments</h1>
<p align="center">You can see below the announcments!</p>
    </div>
    </div> 
    
<div class= "annou-sec">    
 <?php if ($_SESSION['role']=='Admin') { ?>
   
 <h2 class="press"> <div class="btn-ann"> <a href="createAnn.php">Add Announcement</a></div> </h2>
  <?php } ?>

<?php $query = mysqli_query($conn,"select * from announcements");
		 while ($table=mysqli_fetch_array($query)) { ?>
    
    <div class="wrapper">
    <div class="ann">

	<?php if ($_SESSION['role']=='Admin') { ?>
	
		 <a href="EditA.php?id=<?php echo $table["id"];?>">Edit</a>
                <a href="delete.php?id=<?php echo $table["id"];?>">Delete</a>
		
	<?php } ?> 
	
<h2>Announcement <?php echo $table["id"] ?> <br><br>Date:<?php echo $table["date"] ?> <br><br> Subject: <?php echo $table["subject"] ?> <br><br>
    <?php echo $table["maintext"] ?> <br></h2>
    </div>
    </div>
  <?php } ?>
       
<div class="greycolor">
    <button type="button" class= "press" name="button" style="float: right;"><a href="#top">Top</a></button>
    </div> 
</div>  


</body>
</html>