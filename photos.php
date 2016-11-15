<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/styles.css">
<title>Photo Manager</title>

</head>
<body class="body">
  <div class="content">
    <br>
    <?php include("navbar.php"); ?>
    
    <div class="text">
<?php
if(isset($_SESSION['logged_user'])){

?>    
<h1>Manage Photos</h1>
<div class="form">
<h2>Upload a photo</h2>
<form action="photos.php" method="post" enctype="multipart/form-data">
<input type="file" name="newphoto" id="newPhoto"/><br/>
<p>Add a Name</p>
<input type='text' name='pName' id='pName' placeholder='Enter a name'><br><br>
<p>Add a Caption</p>
<input type='text' name='pDesc' id='pDesc' placeholder='Enter a caption'><br><br>
<input type='submit' value='Upload Image' name='adder'>
</form>
<?php
if(isset($_POST['adder'])){
  $caption = $_POST['pDesc'];
  $aTitle = $_POST['pName'];
  $date = date('Y-m-d');
  if(!empty($_FILES['newphoto'])&&isset($caption)&&isset($aTitle)){
    if (!preg_match('/^[a-zA-Z0-9]+/',$aTitle)){
      echo 'Invalid name. Only numbers and letters. Try again.';
    }
    if (!preg_match('/^[a-zA-Z0-9]+/',$caption)){
      echo 'Invalid Description. Only numbers and letters. Try again.';
    }
    $newphoto = $_FILES['newphoto'];
    $originalName = $newphoto['name'];
    if($newphoto['error'] == 0){
                $tempname = $newphoto['tmp_name'];
                move_uploaded_file($tempname,"images/$originalName");
                $_SESSION['photos'][]= $originalName;
                print("<p>$originalName uploaded</p>");
                require_once 'include/config.php'; 
                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
                $sql = "INSERT INTO Photos (p_name,p_caption,p_filepath)
                        VALUES ('$aTitle','$caption','images/$originalName','$date')";
		$result = $mysqli->query($sql);
    }
  }
  else{
    echo "All of the fields have to be completed";
  }
}

?>
</div><br><br>
<div class='form'>
<h2>Edit a caption to a photo</h2>
		<form method='POST' enctype="multipart/form-data" action="photos.php">
		<p>Select Image:</p>
<?php
    require_once 'include/config.php'; 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
    $picSql = $mysqli->query("SELECT * FROM Photos ORDER BY p_name");
    print("<p>Select an Photo to Change</p>");
    print("<select name =\"photo_list\">");
    while($row = $picSql->fetch_assoc()){
        print("<option value=\"{$row['p_name']}\">
              {$row['p_name']}</option>");
    }
    print("</select>");
?>
		<p>New Caption</p>
		<input type='text' name='pDesc' id='pDesc' placeholder='Enter a caption'><br><br>
		<input type="submit" value="Add caption" name="caption_add" id='caption_add'>
		<br><br>
		</form>
<?php
if(isset($_POST['caption_add'])){
  $list = $_POST['photo_list'];
        $newCap = $_POST['pDesc'];
        require_once 'include/config.php'; 
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        if(isset($list)){
            if(isset($newCap)&&strlen($newCap)>0){
                if (!preg_match('/^[a-zA-Z0-9]+/',$newCap)){
                    echo 'Invalid title. Only numbers and letters. Try again.';
                }
                else{
                    $picsql = "UPDATE Photos SET p_caption = '$newCap', WHERE p_name = '$list'";
                    $result = $mysqli->query($picsql);
                    print("<p>Photo caption has been Edited.</p>");
                }
            }
        }
}
}else{
  echo "You have to be an admin in order to upload a photo";
}
?>
</div>
</div>


</body>

</html>




