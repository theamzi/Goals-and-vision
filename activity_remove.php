<?php
/* Script that removes an activity from the database. Information is sent from show_team.php */

require('db_connect.php');

/* Gets the information from show_team.php  */

$team_id = $_GET['team_id']; 
$act_id = $_GET['act_id']; 
    
$mysqli=connect_db();      
    
/* The sql-question. Delete activity where activity_id is the id from show_team.php and where team_id is the id from show_teamp.php */

$query="DELETE FROM activities WHERE act_id='$act_id' AND team_id='$team_id'";
    
if($mysqli->query($query) == true){
   

 header("Location: rocket.php");
    
    
}   
      



        ?>
