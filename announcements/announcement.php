<?php
session_start();

include("connect1.php");
include("GeneralAuth.php");
?> 
<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom">
 
  <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand ml-auto mx-auto" href="#">
          <img src="../img/logo-test.png" alt="" width="70" height="90">
        </a>
     <ul class="navbar-nav navbar-light bg-light ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html"><i class="fas fa-home fa-fw"> </i>Home </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="../profile.html"> <i class="fas fa-user fa-fw"></i>Profile</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="../programs.html"><i class="fas fa-dumbbell fa-fw"></i>Programs</a>
      </li>
    
          <li class="nav-item">
        <a class="nav-link" href="../extra-facilities.html"><i class="fas fa-calendar-check fa-fw"></i>Extra Facilities</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="shop/shop.php"><i class="fas fa-shopping-cart fa-fw"></i>Shop</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../prices.html"><i class="fas fa-dollar-sign fa-fw"></i>Prices</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../announcements/announcements.php"><i class="fas fa-bullhorn fa-fw"></i>Announcements</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="registration/login.php"><i class="fas fa-key fa-fw"></i>Login</a>
      </li>
    </ul>
    
  </div>
</nav>

     
<div class="jumbotron ann-main jumbotron-fluid" id="top-jumpo">
  <div class="container text-center">
      <h1 class="text-center welcome">Announcements</h1>
      <div class="row main-content">
  
    <div class="col-sm-12 col-md-12 col-lg-9 mx-auto"><p>This is the announcements section for the Gym. Any news regarding the gym as well as other notices such as public holidays closing hours will be available through this section. We recommend you  regularly check this section to stay informed about operation and latest service details !  </p> 
          <div class="button-main">
                <a class="btn btn-primary btn-lg round color" href="#" role="button"> Learn More</a>
        </div>

          </div>
         
      </div>
  </div>
</div>
    
   
   
<div class= "annou-sec py-3"> 
     <?php if ($_SESSION['role']=='Admin') { ?>
    <div class="px-3">
 <a class="btn btn-primary btn-lg round color-ann-btn" href="createAnn.php" role="button"> Add Announcement
    </a>
    </div>
    <?php } ?>
    <br>
<?php $query = mysqli_query($conn,"select * from announcements");
		 while ($table=mysqli_fetch_array($query)) { ?>
    
    
   
    <div class="container ann-bg">
   <div class="row ann-shadow ">
       
        <div class="col-md-3 col-sm-4 ann-sec-bg text-center">
            <div class="py-3">
            <h2 class="ann-id"> Announcement <?php echo $table["id"] ?></h2>
           <i class="fas fa-calendar-alt fa-5x"></i>
            <h2 class="ann-id py-3"> Date: <?php echo $table["date"] ?></h2>
            </div>
          </div>
          <div class="col-md-9 col-sm-8 align-self-center ">
            <div class="ann-primary">
                <?php if ($_SESSION['role']=='Admin') { ?>
                <div class="admin-panel">
                 <a href="EditA.php?id=<?php echo $table["id"];?>"><i class="fas fa-pencil-alt"></i></a>
                <a href="delete.php?id=<?php echo $table["id"];?>"><i class="fas fa-trash"></i></a>
                </div>
                <?php } ?>
              <h4 class="card-title">Subject: <?php echo $table["subject"] ?></h4>
              <p class="card-text"><?php echo $table["maintext"] ?> Lorem Ipsum yadaw yadaw ajghadjfa aldfhajsdfh afd;ah;ds </p>
              </div>
       
          </div>
        </div>

    </div>
   <br>
	
	
		
		
	
	
 
    
  
   
<?php } ?>
       

</div>  

    <footer class="page-footer top-menu color-footer">
  
      
      <div class="container">
				
					
						
							<div class="row">
								<div class="col-md-4">
                                 <div class="top-margin">
									<div class="icon"> <i class="fas fa-mobile-alt"></i></div>
                                    <div class="loc">
										
										<p> Tel. 24726444, 99481883 <br>Email: mspetsioti81@hotmail.com</p>
                                       
									</div>
                                    </div>
								</div>
								<div class="col-md-4 ">
                                     <div class="top-margin">
                                   <div class="icon"> <i class="fas fa-map-marker-alt"></i></div>
                                    <div class="loc">
										
										<p> Nikos Theophanous,<br> Xylophagou 7520, Larnaca</p>
									</div>
                                        </div>
								</div>
								<div class="col-md-4">
                                    <div class="top-margin-cstm text-center">
                                   <p> Socialise with us!</p>
                                       <a href="http://facebook.com">    <i class="fab fa-facebook"></i>        </a>                                
                                    </div>
								</div>
                                
							</div>
						
					
				</div>
			

  </footer>

</body>
</html>