<?php
require('header.php');

/* This site inserts information regarding the awesome_planet to the database */

if(isset($_POST['submit_category'])){
$category=$_POST['category'];    
$definition=$_POST['definition'];
$img=$_POST['img'];    
$mysqli=connect_db();    
    
$sql="INSERT INTO planet_awesome (category, definition, img) VALUES ('$category', '$definition', '$img')";
    
if($mysqli->query($sql) == TRUE) {
    // you can echo something here
    
}    
    
}

/* if the user press the back button */

if(isset($_POST['back'])){
    
$mysqli = connect_db();    
    
$sqli="SELECT * FROM planet_awesome";
    
$result = $mysqli->query($sqli);     
    
if($result -> num_rows > 0 ) {    
    
    // if there are categories the back button will redirect to awesome_main.php
    
     header("Location: awesome_main.php");
    
}
    
    // if there are no categories the back button will redirect to awesome_redirect.php
    
    elseif($result -> num_rows <= 0) {
        
        header("Location: awesome_redirect.php");
        
    }
    
}

?>

<div class="stars"></div>
<div class="space"></div>

<div class="asis_admin">
<h2>Define your Awesome vision</h3>

    <img src="img/Planets_backgrounds/uranus.png"> </a>  

<!-- A simple form with the information that will be sent to the db -->

<form method="post" id="coreform" action="awesome_admin.php">
   
    <p>Category</p><p>
    <input type="text" id="corefields" name="category"></p>

    <p>Choose your category symbol</p><p> 
    
    <select name="img" id="awesomesymbol">
      <option value=""  selected="selected">-----</option>
    
  <?php 
        /* Script that lets the user choose an avatar for the category. The images are in a local folder */
            
       foreach(glob(dirname(__FILE__) . '/img/awesome_symbol/*') as $filename){
       $filename = basename($filename);
       echo "<option value='" . $filename . "'>".$filename."</option>";
    }
?>

    </select> </p>
    
    <p>Describe your category</p>
    
        <p><textarea rows="4" id="category_center" name="definition"></textarea></p>

    <p><button class="small button" type="submit" name="back" id="backadmin">Go Back</button>
        <button class="small button" type="submit" name="submit_category" id="submitteam">Create</button>
    </p>

</form>

</div>





