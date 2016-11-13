<?php session_start();?>
<!DOCTYPE html>

<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); 
    include ("include/config.php")
    ?>
    
    <div class="text">
     
      <h1>Login</h1>
      
      
      
<html>
  
    <div class="achievements">
        
        <!--login/registration form-->
        <?php 
        if(!isset($_SESSION['logged_user'])){
            include "include/login_form.php";
        }
        ?>
        
        <?php
        if(isset($_POST['submit'])){
            if (!empty($_POST['password']) and !empty ($_POST['username'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if ($mysqli->errno) {
                    print($mysqli->error);
                    exit();
                }
                $check_login = $mysqli->query("SELECT password
                FROM Admins WHERE username='$username'");
                if ($check_login && $check_login->num_rows == 1){
                    $row = $check_login->fetch_assoc(); 
                    $db_hash_password = $row['password']; 
                    if( password_verify($password, $db_hash_password) ) {
                        $_SESSION['logged_user'] = $username; 
                    }
                    else{
                        print ("<p>Unable to login with the given information!</p>");
                    }
                }
                else{
                    print ("<p>Cannot find login information.</p>");
                }
            }
        }
        if (isset($_SESSION['logged_user'])){
            print "<p id='success'>Congratulations, you are logged in.</p><br>";
        }      
        ?>
    </div>

</body>
</html>

