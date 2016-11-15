<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<title>Contact</title>

</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>
    
    <div class="text">
     
      <h1>Contact Us</h1>
      <h2>Subscribe to our mailing list!</h2>
      <div class='form'>
      
      <!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
  /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="//cornell.us12.list-manage.com/subscribe/post?u=672201ec9f99950a458e75927&amp;id=f768381202" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
  <label for="mce-EMAIL">Subscribe to our mailing list</label>
  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_672201ec9f99950a458e75927_f768381202" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>


<!--End mc_embed_signup-->
</div><br><br>
</div>
      <h2>Questions or Comments?</h2>
      <div class="form"> 
      	<p>Want to learn more about our group? Send us a message!</p><br>
      <form action="contact.php" method="post">
    <p>Name:  <select name="title">
    <option value="Mr">Mr.</option>
    <option value="Ms">Ms.</option>
    <option value="Mrs">Mrs.</option></select>
        <input type="text" name="name"> *
        </p><br>
    <p>Contact Information:  
    </p>
    
    <p>email:  <input type="text" name="email"> *</p>
<br>
    <p>Message: (more than 10 characters) *</p> 
    <p><textarea cols='80' rows='10' name="message"></textarea></p>
    <p><input type="submit" name="submit1"></p>
	</form>
    </div>
    <br>
<br>
<h2>Get Involved!</h2>
 <div class="form">
  <form action="contact.php" method="post">
<p>Interested in volunteering as a tutor for our group? Fill out the following for to tell us more about yourself.</p><br>
<p>Name: <input type="text" name="vol_name"></p>
  <br><br>
 <p>E-mail: <input type="text" name="vol_email"></p>
  <br><br>
<p>Which Describes You?<br>

<input type="radio" name="job" value="Undergraduate" checked> Undergraduate Student<br>
  <input type="radio" name="job" value="Graduate"> Graduate Student<br>
  <input type="radio" name="job" value="General"> General Volunteer<br>
  <input type="radio" name="job" value="other"> Other</p>
  <p><input type="submit" name="submit2"></p>


  </div>
    
  
  <br><br>
  
</div>

<?php




if(isset($_POST['submit1'])){
  if (!empty ($_POST['name'])&& filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) && !empty($_POST['message'])){
      $name=filter_input( INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
      $message=filter_input( INPUT_POST, 'message', FILTER_SANITIZE_STRING);
      $email=$_POST['email'];
      $title=$_POST['title'];
      $body1 = "Hello, $title $name. Thank you for submitting your comment and contact information to Qijia Yu! You submitted the following: $message.";
    $body2 = "$title $name with email $email sent you a comment: $message";
    include "include/email_template.php";
    mail($email, "Comments confirmation", $body1, 'From: admin@qijiayu.com');
    mail('qy28@cornell.edu', "Comments received", $body2, 'From: admin@qijiayu.com');
    print "Thank you! Your comments are successfully sent.";
  }
  else{
    Print"<div class='text'><p>Please check your input!</p></div>";
  }
}
if(isset($_POST['submit2'])){
  if (!empty ($_POST['vol_name'])&& filter_input(INPUT_POST, "vol_email", FILTER_VALIDATE_EMAIL)){
      $vol_name=filter_input( INPUT_POST, 'vol_name', FILTER_SANITIZE_SPECIAL_CHARS);
      $vol_email=$_POST['vol_email'];
      $job=$_POST['job'];
      $body1 = "Hello, $vol_name. Thank you for indicating your interest in the Girls' Math Circle! Dr. Laura Jones will be in contact with you soon. Meanwhile, if you have any other questions, you can still email her at lej4@cornell.edu. You are receiving this email because you have indicated your interest at Ithaca Girls' Math Circle's website.";
    $body2 = "$vol_name ($job) with email $vol_email indicated his/her interest in being a volunteer or tutor for the Math Circle.";
    mail($vol_email, "Confirmation of Interest", $body1, 'From: admin@qijiayu.com');
    mail('qy28@cornell.edu', "Email Received", $body2, 'From: admin@qijiayu.com');
    print "<div class='form'>Thank you! Your comments are successfully sent.</div>";
  }
  else{
    Print"<div class='text'><p>Please check your input!</p></div>";
  }
}
   
?>
</div>

</body>
</html>



