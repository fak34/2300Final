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
<title>Event Manager</title>

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
	<h1>Events</h1>
<div class="form">
	<h2>Add New Event</h2>
	<form action="events.php" method="post" enctype="multipart/form-data">
<p>Add Event Name:</p>
<input type='text' name='eName' id='eName' placeholder='Enter a name for the event'><br><br>
<p>Add a Date</p>
<input type='text' name='eDate' id='eDate' placeholder='Enter yyyy-mm-dd'><br><br>
<p>Add a Description</p>
<textarea cols='80' rows='10' name='eDescription' id='eDescription' placeholder='Enter a description. Did we win any prizes?'></textarea><br><br>
<p>Who participated?</p>
<select multiple='multiple' name='select_name[]'>
<!--Option Table for students-->
  <option value=""></option>
  <?php
  		include("include/config.php");
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($mysqli->errno) {
			print($mysqli->error);
			exit();
		}
    //query that counts the number of students in the database.
    $check_people = $mysqli->query('SELECT stuID, stu_name
    FROM Students');
    while($all_students=$check_people->fetch_assoc()){
        $stuID=$all_students['stuID'];
        $stu_name=$all_students['stu_name'];
        print "<option value=$stuID>$stu_name</option>";
    }
 ?> 
</select>


<br><br>
<input type="submit" value="Add event" name="event_add" id='event_add'>
</form>
<!--End of Option Table for students-->
</div>

<?php
}
else{
  print "<p>Stop! Please log in first.</p>";
}
function check_date_format($date){
  $date = DateTime::createFromFormat("Y-m-d", $date);
return $date !== false;
}

if (isset($_POST['event_add'])){
  if (!empty ($_POST['select_name'])&& !empty($_POST['eDescription'])&& check_date_format($_POST['eDate'])==true && !empty($_POST['eName'])){
      $eDescription=filter_input( INPUT_POST, 'eDescription', FILTER_SANITIZE_SPECIAL_CHARS);
      $eName=filter_input( INPUT_POST, 'eName', FILTER_SANITIZE_SPECIAL_CHARS);
      $eDate=$_POST['eDate'];
      $select_names=$_POST['select_name'];
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->errno) {
            print($mysqli->connection_error);
            exit();
        }
      //insert event information into Events table:
        $add_event=$mysqli->query("INSERT INTO Events(event_name, event_description, event_date) VALUES('$eName', '$eDescription', '$eDate')");
        //get the eventID of the event just inserted:
        $ID=$mysqli->insert_id;
        if (!empty($ID)){
          print "Event added! Participants are:  ";
        }
      //start looping through each name selected:
      foreach($select_names as $individual){

        $get_name=$mysqli->query("SELECT stu_name FROM Students WHERE stuID='$individual'");
        
  
        //insert each record into table ParticipatesIn
        $add_participation=$mysqli->query("INSERT INTO ParticipatesIn(stuID, eventID) 
            VALUES ('$individual','$ID')");  
        print "Student # $individual<br>";
    }
    
  
  }
  else{
    print"<p>Please check your input!</p>";
  }
}

?>

</body>
<?php include "include/subscribe_footer.php"; ?>
</html>

