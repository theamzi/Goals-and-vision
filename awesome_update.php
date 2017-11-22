<?php
require('header.php');

/* A site that updates the chosen cateogry from planet awesome. Gets the below info from awesome_main.php */

$id = $_GET['aw_id'];
$def = $_GET['def'];
$cat = $_GET['cat'];
?>
<div class="stars"></div>
<div class="space"></div>

<!-- Form that updates information -->

<form method="post" action="awesome_update.php">
<div id="awesomep"><p>Update Awesome category</p></div><p><input type="text" placeholder="<?php echo $cat; ?>" id="inputupdate" name="category"></p>
    
    <div id="awesomep"><p>Update your category symbol</p></div> <p> 
    
<select name="img" id="awesomeoption">
<option value="" selected="selected">-----</option>
    
<?php 
       foreach(glob(dirname(__FILE__) . '/img/awesome_symbol/*') as $filename){
       $filename = basename($filename);
       echo "<option value='" . $filename . "'>".$filename."</option>";
    }
?>
</select> </p>
    
<div id="awesomep"><p>Update your category definition</p></div><p><textarea rows="4" id="team_desc" placeholder="<?php echo $def; ?>" name="definition"></textarea></p>

    <div class="small button-group"><p><button type="submit" name="back" id="backawesome" class="small button">Back</button>
        <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
        <button type="submit" name="update_category" id="createawesome" class="small button">Update</button>
    </p></div>

</form>

<?php

if(isset($_POST['update_category'])){
    
/* Script that updates the category to the db */    
    
$id = $_POST['cat_id'];
$cat = $_POST['category'];    
$avatar = $_POST['img'];   
$def = $_POST['definition'];    
    
$mysqli=connect_db();    
        
$sqli="UPDATE planet_awesome SET category='$cat', img='$avatar', definition='$def' WHERE awesome_id='$id'";
        
if($mysqli->query($sqli) == TRUE) {    
    
    /* Sends the user back to awesome_main */ 
    
     header("Location: awesome_main.php");
    
}
    }              

if(isset($_POST['back'])){
    
   header('Location: awesome_main.php');
    
    }
                        
          
