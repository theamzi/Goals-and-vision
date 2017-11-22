<?php
require('header.php');

/* The site allows the user to create a team */ 

?>
<div class="stars"></div>
<div class="space"></div>


<h2 id="createteamh2">Create your Awesome team</h2>

    <!-- Form for creating a team -->

<form method="post" action="create_team.php">
    <div id="teamnamep"><p>Give your team a name</p></div><p><input type="text" name="team_name" id="teamnameinput"></p>
    <div id="teamavatarp"><p>Choose your team avatar</p></div>
    <p> 
    
    <select name="team_avatar" id="avatarselect">
      <option value="" selected="selected" >-----</option>
  <?php 
        /* The user can choose an avatar for their team, from a local folder */
        
       foreach(glob(dirname(__FILE__) . '/img/avatar_team/*') as $filename){
       $filename = basename($filename);
       echo "<option value='" . $filename . "'>".$filename."</option>";
    }
?>

    </select> </p>
    


    <p><button class="button" type="submit" name="back" id="backcreateteam">Go Back</button>
        <button class="button" type="submit" name="submit_team" id="createteam">Create</button>
    </p>

</form>

</div>



<?php
if(isset($_POST['submit_team'])){
$teamname=$_POST['team_name'];    
$avatar=$_POST['team_avatar'];
//$desc=$_POST['desc'];
$mysqli=connect_db();    
    
$sql="INSERT INTO teams (name, avatar) VALUES ('$teamname', '$avatar')";
    
if($mysqli->query($sql) == TRUE) {
    // you can echo something here
    
}    
    
}


if(isset($_POST['back'])){
    
   header('Location: rocket.php');
    
    }
?>
