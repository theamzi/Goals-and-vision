<?php

/* Script that ads a user to a specific team. */

require('db_connect.php');

/* Gets the information from show_team.php  */

$team_id = $_GET['team_id']; 
$usr_id = $_GET['members']; 
    
$mysqli=connect_db();      
    
/* Sql-question. Update the user so that its team_id is set to the one sent from show_team.php. */   

$query="UPDATE user SET team_id='$team_id' WHERE user_id='$usr_id'";
    
if($mysqli->query($query) == true){
   

 header("Location: rocket.php");
    
    
}   
      


        ?>
