<?php
session_start();

include("connect1.php");


?> 
<html>
<head>
   <link rel="Stylesheet" href="style.css">
  <title>Add a New Announcement</title>
 
</head>
<body>  
      <div class="bar">
   <ul> 
  <li><a class="b"  href="logout.php">Exit<br></a></li>
    </ul>
</div>
 <div class="ann-main">
    <div class="title-child">
  <h1 align="center"> Add a New Announcement</h1>
     </div>
    </div>
    
            <div class="container">
     <form class="contact-form" action="createAnn.php" method="post"> 

    <label for="name">Date</label>
    <input type="date" customer_id="name" name="date" placeholder="Select the date of the announcement">

    <label for="subject"> Subject</label>
    <input type="text" customer_id="subject" name="subject" placeholder="What is the subject?">
         <br>
    <label for="main-text">Content</label>
         <br>
    <textarea customer_id="main-text" name="maintext" placeholder="Add the new content"></textarea>
<br>
      
    <input customer_id="submit-button" name="send" type="submit" value="send">

  </form>
  
    </div>
    
     <?php 
	 mysqli_select_db($conn,"database");
 if(isset($_POST['send'])) {		
    $date = $_POST['date'] ;
	$subject = $_POST['subject'] ;
	$message = $_POST['maintext'] ;
	
	$query = "insert into announcements (date,subject,maintext) values('$date','$subject','$message')";
  $sqlcrt=mysqli_query($conn,$query); ?>
  <div align="center"><h2> The announcement was added successfully. </h2></div>  
	
<?php } ?> 
</body>
</html>