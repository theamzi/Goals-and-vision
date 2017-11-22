<?php

require('db_connect.php');

/* Script that removes the user from the current team and updates it to the db  */

$team_id = $_GET['team_id']; 
$usr_id = $_GET['usr_id']; 
    
$mysqli=connect_db();      
    
    
$query="UPDATE user SET team_id='0' WHERE user_id='$usr_id'";
    
if($mysqli->query($query) == true){
   

 header("Location: rocket.php");
    
    
}   
      



        ?>
