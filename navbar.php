<a href="index.php"><img src= "images/banner.png" alt="banner" class="banner"></a>
<ul class="menu">       
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="achievement.php">Our Achievements</a></li>
      <li><a href="donate.php">Donate</a></li>
      <li><a href="contact.php">Contact Us</a></li>        
      <li><a href="piku.php">Pi-Ku</a></li>
      <li><a href="login.php">Login</a></li>
      <!--Visible to admin only-->
      <?php if(isset($_SESSION['logged_user'])){
      	?>
      <li><a href='photos.php' style="background-color:silver">Add/Edit Photos</a></li>
      <li><a href='events.php' style="background-color:silver">Events</a></li>
      <li><a href='people.php' style="background-color:silver">People</a></li>
      <li><a href='include/logout.php' style="background-color:silver">Log Me Out</a></li>

      <?php }      
      ?>
      

    </ul>
