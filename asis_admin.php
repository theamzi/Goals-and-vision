<?php
require('header.php');
?>

<div class="stars"></div>
<div class="space"></div>
    




<?php

/* Script that submits the as_is category with its definition to the database */

if(isset($_POST['submit_category'])){
$category=$_POST['category'];    
$definition=$_POST['definition'];    
$mysqli=connect_db();    
    
$sql="INSERT INTO as_is (category, definition) VALUES ('$category', '$definition')";
    
if($mysqli->query($sql) == TRUE) {
    
    // you can echo something here
    
}    
    
}


if(isset($_POST['back'])){
    
/* If the user clicks back the following script will be executed */     
    
$mysqli = connect_db();    
    
$sqli="SELECT * FROM as_is";
    
$result = $mysqli->query($sqli);     
    
if($result -> num_rows > 0 ) {    
    
    // if there are categories, the back button will redirect to asis_main.php
    
     header("Location: asis_main.php");
    
}
    
    // if there are no categories, the back button will redirect to asis_redirect.php
    
    elseif($result -> num_rows <= 0) {
        
        header("Location: asis_redirect.php");
        
    }
    
}
?>



<div class="asis_admin">
    <h2>Define your current state</h2>
    <a href="asis_main.php">
    <img href="asis_main.php"src="img/Planets_backgrounds/earth.png"> </a>     
        
<!-- A form with the Category and the definition -->    
    
<form method="post" action="asis_admin.php">
    <p>Category</p>
    <center>
    <p><input type="text" id="planet_admin" name="category"></p>
    <p>Describe your As-is category</p><p>
    <textarea rows="4" id="planet_admin" name="definition"></textarea></p>
       <p><button type="submit" name="back" id="backadmin" class="small button">Go back</button>
        <button type="submit" name="submit_category" id="submitteam" class="small button">Create</button>
    </p>
    </center>

</form>
</div> 



