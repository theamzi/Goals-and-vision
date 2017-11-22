<?php
require('header.php');

$id = $_GET['tar_id'];
$def = $_GET['def'];
$cat = $_GET['cat'];
?>
<div class="stars"></div>
<div class="space"></div>

<form method="post" action="nextplanet_update.php">
<p class="awesometext_small">Update Target category</p><p><input type="text" id="updateasis" placeholder="<?php echo $cat; ?>" name="category"></p>
    
    
<h4 id="updatedefinition">Update your category definition</h4>
<p><textarea rows="4" id="nextplanetdesc" placeholder="<?php echo $def; ?>" name="definition"></textarea></p>

    <div class="small button-group"><p><button type="submit" name="back" id="nextplanetupdateback" class="small button">Back</button>
        <input type="hidden" name="cat_id" value="<?php echo $id; ?>">
        <button type="submit" name="update_category" id="update_awe" class="small button">Update</button>
    </p></div>

</form>

<?php

if(isset($_POST['update_category'])){
    
$id = $_POST['cat_id'];
$cat = $_POST['category'];    
$avatar = $_POST['img'];   
$def = $_POST['definition'];    
    
$mysqli=connect_db();    
        
$sqli="UPDATE targets SET category='$cat', img='$avatar', definition='$def' WHERE target_id='$id'";
        
if($mysqli->query($sqli) == TRUE) {    
    
     header("Location: nextplanet_main.php");
    
}
    }              

if(isset($_POST['back'])){
    
   header('Location: nextplanet_main.php');
    
    }
                        
          
