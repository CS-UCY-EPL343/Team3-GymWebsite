<?php

session_start();
require_once'regChecker.php';

$app = new Checker();
 
$register_error_message = '';
 

if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field is required!';
    } else if ($_POST['surname'] == "") {
        $register_error_message = 'Surname field is required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Username field is required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Invalid email address!';
    } else if ($app->isEmail($conn,$_POST['email'])) {
        $register_error_message = 'Email is already in use!';
    } else if ($app->isUsername($conn,$_POST['username'])) {
        $register_error_message = 'Username is already in use!';
    } else {
        $customer_id = $app->Register($conn,$_POST['name'],$_POST['surname'],$_POST['telephone'],$_POST['email'], $_POST['username'], $_POST['password'], $_POST['sex'] , $_POST['program'] );
        
        $_SESSION['customer_id'] = $customer_id;
        header("Location: register.php");
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

<div class="row">
        <div class="col-md-5 well">
            <h4>Register</h4>
            <?php
            if ($register_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $register_error_message . '</div>';
            }
            ?>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="">*Name</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                 <div class="form-group">
                    <label for="">Surname</label>
                    <input type="surname" name="surname" class="form-control"/>
                </div>
                 <div class="form-group">
                    <label for="">Telephone</label>
                    <input type="number" name="telephone" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">*Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">*Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">*Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Sex</label>
                    <input type="radio" name="sex" value="male"  class="form-control"/> Male<br>
                    <input type="radio" name="sex" value="female"  class="form-control"/> Female<br>
                    <input type="radio" name="sex" value="other" class="form-control"/> Other<br>
                </div>
                <div class="form-group">
                    <label for="">Program</label>
                    <input type="text" name="program" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnRegister" class="btn btn-primary" value="Register"/>
                </div>
            </form>
        </div>
    </div>
    
    </body>
</html>