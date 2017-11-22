<?php
require('header.php');

/* This page allows the user to add a category and definition to Mars. The scipt below will be executed once the form has been filled and the user has pressed submit */


if(isset($_POST['submit_category'])){    
$category=$_POST['category'];    
$definition=$_POST['definition'];    
$mysqli=connect_db();    
    
$sql="INSERT INTO mars (category, definition) VALUES ('$category', '$definition')";
    
if($mysqli->query($sql) == TRUE) {
    // you can echo something here
    
}    
    
}


if(isset($_POST['back'])){
    
$mysqli = connect_db();    
    
$sqli="SELECT * FROM mars";
    
$result = $mysqli->query($sqli);     
    
if($result -> num_rows > 0 ) {    
    
    // if there are categories the back button will redirect to mars_main.php
    
     header("Location: mars_main.php");
    
}
    
    // if there are no categories the back button will redirect to mars_admin.php
    
    elseif($result -> num_rows <= 0) {
        
        header("Location: mars_admin.php");
        
    }
    
}

?>
<div class="stars">
    </div>
 
<div class="space"></div>

<div class="nextplanet_admin">
<h2>Create your Mars</h3>
    <a href="mars_main.php">
    <img href="mars_main.php"src="img/Planets_backgrounds/mars.png"> </a>  

<!-- Form with input -->    
    
<form method="post" action="mars_admin.php">
    
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

  
