<?php


           include_once 'db_connect.php';

 
$mysqli=connect_db();
 
 
 //Checking current_rockpos, will use later for script for startjourney and journey
$rocketp=$mysqli->query("SELECT position FROM rocket WHERE rocket_id='1'");

$current_rockpo=$rocketp->fetch_assoc();
$poss=implode($current_rockpo);






//Making array of table, will use later for script to check if table is empty
$asis=$mysqli->query("SELECT * FROM as_is");

$check_asis=$asis->fetch_assoc();


//Making array of table, will use later for script to check if table is empty
$target=$mysqli->query("SELECT * FROM targets");

$check_targets=$target->fetch_assoc();


//Making array of table, will use later for script to check if table is empty
$awesome=$mysqli->query("SELECT * FROM planet_awesome");

$check_awesome=$awesome->fetch_assoc();


//Making array of table, will use later for script to check if table is empty
$mars=$mysqli->query("SELECT * FROM mars");

$check_mars=$mars->fetch_assoc();


//Nedan ett script för kalkylering av go/nogo
//Räknar ut hur många GO's totalt i db
$gocount=$mysqli->query("SELECT count(go) FROM teams");

$totalgo=$gocount->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototal=implode($totalgo);



//Räknar ut hur många GO's =0 totalt i db
$gocount2=$mysqli->query("SELECT count(go) FROM teams WHERE go=1");

$totalgo2=$gocount2->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalyes=implode($totalgo2);

//Räknar ut hur många GO's =0 totalt i db
$gocount3=$mysqli->query("SELECT count(go) FROM teams WHERE go=0");

$totalgo3=$gocount3->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalno=implode($totalgo3);


//Script to calc progress to next planet
$current_progress=($gototalyes/$gototal);




//Script to count, calculate and progress and update position on rocket
//Also shows landbutton when progress = 100%
if ($current_progress > 0.01 && $current_progress < 0.4999) {
    
if($mysqli->query("UPDATE rocket SET position='1' WHERE rocket_id='1'") == true){
    
} 
    
}  
else if ($current_progress > 0.5  && $current_progress < 0.9999){
  
    if($mysqli->query("UPDATE rocket SET position='2' WHERE rocket_id='1'") == true){
    
}
}

if($current_progress == 1) 
{   
    
    ?>
   <style type="text/css">#moonlandform {
display:block;
 position: fixed;
    bottom: 50%;
    left: 50%;
}</style>
    <?php
}
else
{   
    
    ?>
  <style type="text/css">#moonlandform{
display:none;
}</style>
      
    <?php
    }
      

    
  


?>







