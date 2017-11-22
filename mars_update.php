<?php
require('header.php');

/* The users can update the chosen category from Mars. The below information is sent from mars_main.php */

$id = $_GET['tar_id'];
$def = $_GET['def'];
$cat = $_GET['cat'];
?>
<div class="stars"></div>
<div class="space"></div>

<!-- Form that will update the chosen category -->

<form method="post" action="mars_update.php">
<p class="awesometext_small">Update Target category</p><p><input type="text" id="updateasis" placeholder="<?php echo $cat; ?>" name="category"></p>
    
    
<h4 id="updatedefinition">Update your category definition</h4>
<p><textarea rows="4" id="nextplanetdesc" placeholder="<?php echo $def; ?>" name="definition"></textarea></p>

    <div class="small button-group"><p><button type="submit" name="back" id="nextplanetupdateback" class="small button">Back</button>
        <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
        <button type="submit" name="update_category" id="update_awe" class="small button">Update</button>
    </p></div>

</form>

<?php

/* Script that will be executed if the user press update. Will update the category to the db */

if(isset($_POST['update_category'])){
    
$id = $_POST['cat_id'];
$cat = $_POST['category'];      
$def = $_POST['definition'];    
    
$mysqli=connect_db();    
        
$sqli="UPDATE targets SET category='$cat', definition='$def' WHERE target_id='$id'";
        
if($mysqli->query($sqli) == TRUE) {    
    
     header("Location: mars_main.php");
    
}
    }              

if(isset($_POST['back'])){
    
   header('Location: mars_main.php');
    
    }
                        
          
