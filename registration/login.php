<?php
session_start();
 
require_once 'logChecker.php';
$app = new logChecker();
 
$login_error_message = '';
 
if (!empty($_POST['btnLogin'])) {
 
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
 
    if ($username == "") {
        $login_error_message = 'Username field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $customer_id = $app->Login($DBcon,$username, $password); 
        if($customer_id > 0)
        {
            $_SESSION['customer_id'] = $customer_id; 
            $user= $app->UserDetails($conn,$customer_id); 
            $_SESSION['role'] = $user->role;
            $_SESSION['surname']=$user->surname;
            $_SESSION['name']= $user->name;
            $_SESSION['email']= $user->email;
            $_SESSION['telephone']= $user->telephone;
            $_SESSION['username']= $user->username;
            
            $_SESSION['sex']= $user->sex;
            header("Location: welcome.php"); 
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}
?>
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
        <a class="nav-link" href="../shop/shop.php"><i class="fas fa-shopping-cart fa-fw"></i>Shop</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../prices.html"><i class="fas fa-dollar-sign fa-fw"></i>Prices</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="../announcements.html"><i class="fas fa-bullhorn fa-fw"></i>Announcements</a>
      </li>
    </ul>
    
  </div>
</nav>
  
   
 <div class="login-cover">
  <div class="container text-center">
     <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
              <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
            <form action="login.php" method="post" class="form-signin">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Email address or Username" />
                <label for="inputEmail"></label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password"/>
                <label for="inputPassword"></label>
              </div>

             
              <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="btnLogin" type="submit" value="Sign in"/>
              <hr class="my-4">
              <a href="register.php" class="btn btn-lg btn-register btn-block text-uppercase"> Register</a>
             
            </form>
               
          </div>
        </div>
      </div>
      
      
      </div>
  </div>
</div>
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
