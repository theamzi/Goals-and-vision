<?php
require('header.php');

/* Site that allows the user to update the chosen core value. Below values are sent from index.php */

$id = $_GET['cv_id'];
$def = $_GET['cv_def'];

?>
<div class="stars"></div>
<div class="space"></div>

<!-- A form with input fields -->

<form method="post" action="core_values_update.php">
<p class="awesometext">Update Core value</p><p>
<input type="text" placeholder="<?php echo $def; ?>" id="updatecoredef" name="definition"></p>
    

<div class="small button-group"><p><button type="submit" name="back" id="backupdatecv" class="small button">Back</button>
<input type="hidden" name="cv_id" value="<?php echo $id; ?>">
<button type="submit" name="update_cv" id="update_cv" class="small button">Update</button>
</p></div>

</form>

<?php
/* Script that updates the chosen core value to the db */

if(isset($_POST['update_cv'])){
    
$id = $_POST['cv_id'];  
$def = $_POST['definition'];    
    
$mysqli=connect_db();    
        
$sqli="UPDATE core_values SET definition='$def' WHERE core_id='$id'";
        
if($mysqli->query($sqli) == TRUE) {    
    
     header("Location: index.php");
    
}
    }              

if(isset($_POST['back'])){
    
   header('Location: index.php');
    
    }
                        
          
