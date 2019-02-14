<?php require_once('connect.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
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
          <img src="img/logo-test.png" alt="" width="70" height="90">
        </a>
    <ul class="navbar-nav navbar-light bg-light ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="profile.html">Profile</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="programs.html">Programs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="physiotherapy.html">Physiotherapy</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="extra-facilities.html">Extra Facilities</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="prices.html">Prices</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="announcements.html">Announcements</a>
      </li>
    </ul>
    
  </div>
</nav>

<div class="jumbotron shop-cover jumbotron-fluid" id="top-jumpo2">
  <div class="container text-center">
      
      <div class="row">
   <div class="col-md-2"></div>
    <div class="col-md-8"><p> </p> 
          <div class="text-center">
        <h1> Shop </h1>
              <p> Have a look at the products that our gym is selling. For more information do not hesitate to contact us.</p>
        </div>

          </div>
          <div class="col-md-2"></div>
      </div>
  </div>
</div>
    
    <div class="products-section">
    <div class="container">
        <br>
      <br>
           <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        $numOfCols = 3;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
            ?>
        <div class="row padding-row">
            <?php 
        while($row = mysqli_fetch_array($result)){ ?>
           
    

                     <div class="col-md-4 col-margin">
            <div class="card card-width">
  <img class="card-img-top" src="img/shop1.jpg" alt="">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["name"] ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
   
  </div>
            
            </div>
            </div>

    <?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row padding-row">';
}

    
?>
            
            </div>
        </div>
        <br>
      <br>
   
<!-- Footer -->
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
  <!-- Footer -->
   
</body>
</html>
