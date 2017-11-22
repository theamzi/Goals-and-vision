<?php

/* This site is a script that updates activities to the database. The information is sent from show_team.php  */

require('db_connect.php');



$team_id = $_GET['team_id']; 
$act_id = $_GET['act_id']; 
    
$mysqli=connect_db();      
    
/* The sql-question. Update activity column to 1 where the activity_id = id from show_team.php and where team_id = id from show_team.php */

$query="UPDATE activities set completed='1' WHERE act_id='$act_id' AND team_id='$team_id'";
    
if($mysqli->query($query) == true){
   

 header("Location: rocket.php");
    
    
}   
      



        ?>
