<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<title>Home</title>
</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>
    
    <div class="text">
     
  <?php
  require_once "include/config.php"; 
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if ($mysqli->errno) {
            print($mysqli->connection_error);
            exit();
        }
  $get_images=$mysqli->query("SELECT p_filepath, p_caption FROM Photos");
  while($all_images=$get_images->fetch_assoc()){
        $image_path=$all_images['p_filepath'];
        $title=$all_images['p_caption'];
        print "<div class='slides'>";
        print "<img class='slideshow' src='$image_path' alt='slide'>";
	      print "</div>";
    }
  
  ?>
  
      <h1>Have fun with Girls' Math Circle</h1>
      <p>The Ithaca Girls' Math Circle is a group of girls in Grades 6-11 who meet every Saturday 5:00-7:15 p.m. in Corson Hall. Dinner is included as part of the meeting. The focus of the group is to stimulate interest in mathematics as well as to prepare the girls for math competitions. If you are a girl in grades 6-11 who loves mathematics, or if you are an undergraduate or graduate student interested in becoming a mentor to this group, please contact Dr. Laura Jones (lej4@cornell.edu).
      </p>
      <br>

<h2>Where to Find Us</h2>

<div align="center">

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:301px;width:374px;'><div id='gmap_canvas' style='height:301px;width:374px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://embedmaps.org/'>maps generator</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=77c3f8a75d28d12239d93054362c81f1f07f0f3c'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(42.4477354,-76.47836810000001),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(42.4477354,-76.47836810000001)});infowindow = new google.maps.InfoWindow({content:'<strong>Corson Hall</strong><br>220 tower rd<br>14850 Ithaca<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
</div>

      
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slideshow");
    for (i = 0; i < x.length; i++) {
     }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000);
}
</script>

    </div>
    <br>
  </br>
  <div class="text">
          	<h2>Our Events</h2>
    <iframe src="https://calendar.google.com/calendar/embed?src=cornell.edu_butgit4541hl8n1hec7m9oda80%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="700" height="600" frameborder="0" scrolling="no"></iframe>
    <a target="_blank" href="https://calendar.google.com/calendar/hosted/cornell.edu/event?action=TEMPLATE&amp;tmeid=aTRkZzNzZXEzNDFuN2g3djZpNDB2dGJrbnMgY29ybmVsbC5lZHVfYnV0Z2l0NDU0MWhsOG4xaGVjN205b2RhODBAZw&amp;tmsrc=cornell.edu_butgit4541hl8n1hec7m9oda80%40group.calendar.google.com"><img border="0" src="https://www.google.com/calendar/images/ext/gc_button1_en.gif"></a>
  </div>
  </div>
  <?php include "include/subscribe_footer.php"; ?>
</body>
</html>
