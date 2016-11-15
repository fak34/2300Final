<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<title>Achievements</title>
</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>


    
     
      

      <div class='text'>
      <h1>Our Achievements</h1>
    
	<?php
	include("include/config.php");
      $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if ($mysqli->errno) {
			print($mysqli->error);
			exit();
		}
    //query that counts the number of students in the database.
    $check_achievements = $mysqli->query('SELECT event_name, event_results, event_description, event_date
    FROM Events');
    while($achievement=$check_achievements->fetch_assoc()){
        $event_name=$achievement['event_name'];
        $event_date=$achievement['event_date'];
        print "<div class= 'form'>";
        $event_description=$achievement['event_description'];
        $event_results=$achievement['event_results'];
        print "<h2>$event_name  $event_date</h2>";
        print "<p>$event_description</p>";
        print "<p>$event_results</p></div><br><br>";
    }

	?>
      
    </div>
  </div>
  <?php include "include/subscribe_footer.php"; ?>
</body>

</html>


