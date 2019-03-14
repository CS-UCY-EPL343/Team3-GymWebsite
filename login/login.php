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
        $customer_id = $app->Login($conn,$username, $password); 
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
             $enc_password = hash('sha256', $password);
            $_SESSION['password']=$enc_password;
            
            $_SESSION['sex']= $user->sex;
            
            
            header("Location: profile.php"); 
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    
</head>
<body>
 <a href="register.php">Registration form</a>
    
<div class="container">    
        <div class="col-md-2"></div>
        <div class="col-md-5 well">
            <h4>Login</h4>
            <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="">Username/Email</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
                </div>
            </form>
        </div>
   
</div>
 
</body>
</html>