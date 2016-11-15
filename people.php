<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
<title>Add member</title>

</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>
    
    <div class="text">
<!--add an event-->
<?php
if(isset($_SESSION['logged_user'])){
?>
	<h1>Manage Members</h1>
<div class="form">
	<h2>Add New Member</h2>
	<form action="people.php" method="post" enctype="multipart/form-data">
<p>Add Member Name:</p>
<input type='text' name='mName' id='mName' placeholder='Enter a name for the member'><br><br>
<p>Add a Description</p>
<textarea cols='80' rows='10' name='mDescription' id='mDescription' placeholder='Enter a description.'></textarea><br><br>
<p>Affiliation:</p>
<input type="radio" name="affiliation" value="Non-senior" checked> Non-senior Student<br>
<input type="radio" name="affiliation" value="Senior"> Senior<br>
  <input type="radio" name="affiliation" value="Guest"> Guest<br>
  <input type="radio" name="affiliation" value="Grad_helper"> Grad Helper<br>
  <input type="radio" name="affiliation" value="Alum"> Alum</p>
 
</select>


<br><br>
<input type="submit" value="Add member" name="member_add" id='member_add'>
</form>
<!--End of Option Table for students-->
</div>

<?php
}
else{
  print "<p>Stop! Please log in first.</p>";
}

include "include/config.php";
if (isset($_POST['member_add'])){
  if (!empty ($_POST['mName'])&& !empty($_POST['mDescription'])){
      $mDescription=filter_input( INPUT_POST, 'mDescription', FILTER_SANITIZE_SPECIAL_CHARS);
      $mName=filter_input( INPUT_POST, 'mName', FILTER_SANITIZE_SPECIAL_CHARS);
      $selected_aff=$_POST['affiliation'];
      
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->errno) {
            print($mysqli->connection_error);
            exit();
        }
      //insert information into appropriate table:
        if($selected_aff=='Grad_helper'){
          $add_helper=$mysqli->query("INSERT INTO Grad_helpers (grad_name, grad_description, event_date) VALUES('$mName', '$mDescription')");
        }
        elseif($selected_aff=='Non-senior'){
            $add_nonsenior=$mysqli->query("INSERT INTO Students (stu_name, stu_description) VALUES('$mName', '$mDescription')");
        }
        elseif($selected_aff=='Senior'){
            
            $add_senior=$mysqli->query("INSERT INTO Students (stu_name, stu_description, senior) VALUES('$mName', '$mDescription', '1')");
        }
        elseif($selected_aff=='Alum'){
            $add_alum=$mysqli->query("INSERT INTO Students (stu_name, stu_description, alum) VALUES('$mName', '$mDescription', '1')");
        }
        elseif($selected_aff=='Guest'){
            $add_guest=$mysqli->query("INSERT INTO Students (stu_name, stu_description, guest) VALUES('$mName', '$mDescription', '1')");
        }
        //get the ID of the member just inserted:
        $ID=$mysqli->insert_id;
        if (!empty($ID)){
          print "Member added!";
        }
        else{
          print 'There was an error adding the member!';
        }
      
    
  
  }
  else{
    print"<p>Please check your input!</p>";
  }
}

?>

</body>
</html>

