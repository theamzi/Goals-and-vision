<?php
require('header.php');

/* A site that updates the chosen category. The information is sent from asis_main.php */

$id = $_GET['asisid'];
$def = $_GET['def'];
$cat = $_GET['cat'];
?>
<div class="stars"></div>
<div class="space"></div>

<form method="post" action="asis_update.php">
<h4 class="awesometext_small">Update As-is Category</h4>
<p><input type="text" id="updateasis" placeholder="<?php echo $cat; ?>" name="category"></p>
    
<p id="updatedefinition">Update your As-is definition</p><p><textarea rows="4" id="nextplanetdesc" placeholder="<?php echo $def; ?>" name="definition"></textarea></p>

    <div class="small button-group"><p><button type="submit" name="back" id="back" class="small button">Back</button>
        <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
        <button type="submit" name="update_category" id="update_asis" class="small button">Update</button>
    </p></div>

</form>

<?php

if(isset($_POST['update_category'])){

/* Script that will be executed if the user press update. Updates the chosen category with new information */    
    
$id = $_POST['cat_id'];
$cat = $_POST['category'];    
$def = $_POST['definition'];    
    
$mysqli=connect_db();    
        
$sqli="UPDATE as_is SET category='$cat', definition='$def' WHERE as_is_id='$id'";
        
if($mysqli->query($sqli) == TRUE) {    
    
     header("Location: asis_main.php");
    
}
    }              

if(isset($_POST['back'])){

    // if the user press back, send to asis_main.php
    
   header('Location: asis_main.php');
    
    }
                        
          
