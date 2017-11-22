<?php
require('header.php');


if(isset($_POST['submit_category'])){
$category=$_POST['category'];    
$definition=$_POST['definition'];    
$mysqli=connect_db();    
    
$sql="INSERT INTO targets (category, definition) VALUES ('$category', '$definition')";
    
if($mysqli->query($sql) == TRUE) {
    // you can echo something here
    
}    
    
}


if(isset($_POST['back'])){
    
$mysqli = connect_db();    
    
$sqli="SELECT * FROM targets";
    
$result = $mysqli->query($sqli);     
    
if($result -> num_rows > 0 ) {    
    
    // if there are categories the back button will redirect to nextplanet_main.php
    
     header("Location: nextplanet_main.php");
    
}
    
    // if there are no categories the back button will redirect to nextplanet_redirect.php
    
    elseif($result -> num_rows <= 0) {
        
        header("Location: nextplanet_redirect.php");
        
    }
    
}

?>
<div class="stars">
    </div>
 
<div class="space"></div>

<div class="nextplanet_admin">
<h2>Create your next Target</h3>
    <a href="nextplanet_main.php">
    <img href="nextplanet_main.php"src="img/Planets_backgrounds/moon.png"> </a>  

<form method="post" action="nextplanet_admin.php">
    
    <center>
    <p>Category</p><p><input type="text" id="planet_admin" name="category"></p>
    <p>Describe your target category</p>
    <p><textarea rows="4"  id="planet_admin" name="definition"></textarea></p>
    <p><button type="submit" name="back" id="backadmin" class="small button">Go Back</button>
    <button type="submit" name="submit_category" id="submitteam" class="small button">Create</button>
    </p>
    </center>
</form>

</div>

  
