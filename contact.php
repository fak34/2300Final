<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>
    
    <div class="text">
     
      <h1>Contact Us</h1>
      
      
      <div class="form"> 

      <form action="contact.php" method="post">
    <p>Name: 
        <input type="text" name="name"> *
        </p><br>
    <p>Contact Information:  
    </p>
    <p>Phone:  <input type="text" name="phone"></p>
    <p>email:  <input type="text" name="email"> *</p>
<br>
    <p>Message: (more than 10 characters) *</p> 
    <p><textarea name="message"></textarea></p>
    <p><input type="submit" name="submitButton"></p>
	</form>
    </div>
  </div>
</body>
</html>



