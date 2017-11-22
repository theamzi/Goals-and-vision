<?php

require('header.php');

/* Site that allows the user to enter core values for their company */ 
  
echo "<div class='awesometext'> <p> Core values </p> </div>";   
   ?>


<div class="stars"></div>
<div class="space"></div>

<!-- Form with all the necessary input fields -->

<div>
<form action="core_values.php" method="post" id="coreform">
<label><h3 class="awesometext_small">Insert your core values here:</h2></label>

<input type="text" name="cv1" id="corefields" /><br />
<input type="text" name="cv2" id="corefields" /><br />
<input type="text" name="cv3" id="corefields" /><br/>
<input type="text" name="cv4" id="corefields" /><br/>
<input type="text" name="cv5" id="corefields" /><br/>
<input type="text" name="cv6" id="corefields" /><br/>
    <button type="submit" class="button" name="back">Back</button>
<button type="submit" name="submit" class="button">Set</button>
</form>





</div>



<?php

/* The script that insert the values to the db */

if(isset($_POST["submit"])){
$cv1 = $_POST["cv1"];
$cv2 = $_POST["cv2"];
$cv3 = $_POST["cv3"];
$cv4 = $_POST["cv4"];
$cv5 = $_POST["cv5"];
$cv6 = $_POST["cv6"];
    
$mysqli=connect_db(); 

    $sql1 = "INSERT INTO core_values (definition)
VALUES ('$cv1')";
    
        $sql2 = "INSERT INTO core_values (definition)
VALUES ('$cv2')";
    
         $sql3 = "INSERT INTO core_values (definition)
VALUES ('$cv3')";
    
         $sql4 = "INSERT INTO core_values (definition)
VALUES ('$cv4')";
    
         $sql5 = "INSERT INTO core_values (definition)
VALUES ('$cv5')";
    
         $sql6 = "INSERT INTO core_values (definition)
VALUES ('$cv6')";
    
if (isset($cv1))  {
     
 $mysqli->query($sql1) == TRUE;
    
}
    

    if (!empty($cv2)) {

 $mysqli->query($sql2) == TRUE;
        
}
 
    
        if (!empty($cv3)) {
            
 $mysqli->query($sql3) == TRUE;
}
    
            if (!empty($cv4)) {
 $mysqli->query($sql4) == TRUE;
   }
    
                if (!empty($cv5)) {
 $mysqli->query($sql5) == TRUE;
}
    
                    if (!empty($cv6)) {
 $mysqli->query($sql6) == TRUE;
   }
 }  


if(isset($_POST['back'])){
    
   header('Location: index.php');
    
    }
           
?>




