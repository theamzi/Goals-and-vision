<?php
require('header.php');

$team_id=$_GET['team_id'];
$mysqli=connect_db();


//Reusing script from functions.php, less work to do like this than include page
$gocount=$mysqli->query("SELECT count(completed) FROM activities WHERE team_id='$team_id' ");

$totalgo=$gocount->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototal=implode($totalgo);


//Räknar ut hur många GO's =0 totalt i db
$gocount2=$mysqli->query("SELECT count(completed) FROM activities WHERE completed='1' AND team_id='$team_id'");

$totalgo2=$gocount2->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalyes=implode($totalgo2);

//Räknar ut hur många GO's =0 totalt i db
$gocount3=$mysqli->query("SELECT count(completed) FROM activities WHERE completed='0' AND team_id='$team_id' ");

$totalgo3=$gocount3->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalno=implode($totalgo3);


//Script to calc progress to next planet
$current_progress=(($gototalyes/$gototal)*100);

 



$sql="SELECT * FROM teams WHERE team_id='$team_id'";

$result=$mysqli->query($sql);

while($row=$result->fetch_assoc()){
    
    echo "<div class='awesometext'><p>" . $row['name'] . "</p></div>"
        . "<p><img src='./img/avatar_team/" . $row['avatar'] . "' class='teamavatar_inrocket'></p>";
}

     
  


if(isset($_GET['delete'])){
 
$team_id = $_GET['team_id'];    
 
$mysqli=connect_db();    

// deletes the selected team    
$sqli="DELETE FROM teams WHERE team_id='$team_id'"; 
 
// deletes the activities to the selected team    
$sql="DELETE FROM activities WHERE team_id='$team_id'";


if($mysqli->query($sqli) && $mysqli->query($sql) == TRUE){    
 
 // On delete the user will be redirected to rocket.php 
 
 header("Location: rocket.php");
 
}
 }
 
 
    

?>
<div class="stars"></div>
<div class="space"></div>

    <br>
    
            
            <div id="progresstext"><h4>Progress bar</h4></div> 
<div class="progress" role="progressbar" tabindex="0" aria-valuenow="20" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
  <span class="progress-meter" style="width: <?php echo $current_progress; ?>%">
    <p class="progress-meter-text"><?php echo $current_progress; ?>%</p>
  </span>
</div>
            
<p id="ready">Ready for landing?</p>
<div class="small button-group" id="landing">
<form method="get" action="show_team.php" id="yesno">
<input type="hidden" name="team_id" value="<?php echo $team_id; ?>">
   
<button type="submit" name="yes" id="yes" class="round success button">Yes</button>
<button type="submit" name="no" id="no" class="alert button">No</button>
</form>
</div>

<br>
<br>
                        
<div id="activities"><h4>Activities</h4></div>

         
            <?php



if(isset($_GET['submit_act'])){
$actname=$_GET['act_def']; 

  
    
$sql="INSERT INTO activities (definition,team_id) VALUES ('$actname','$team_id')";
    
if($mysqli->query($sql) == TRUE) {
    
     header("Location: rocket.php");
    
}    
    
}




            
      // query that selects everything from the table planet_awesome
        $sql="SELECT * FROM activities WHERE team_id='$team_id'";
        
         //stores the result of the query and connection to the database in vector $result
        $result=$mysqli->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="awesomecategories" id="activitiesteam">
        
        <?php
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
               echo "<td class='awesomerow' id='core'>"
                
            . "<form method='get' action='activity_remove.php'>"    
            
            // echoes the information from the db    
            . "<p>" . $row['definition'] . "</p> "   

                   . "<p><input type='submit' name='act_remove' id='removeact' class='tiny alert button' value='Remove activity'></p>"
                 
             
                   . "<input type='hidden' name='act_id' value='".$row['act_id']."'/>"
                 . "<input type='hidden' name='team_id' value='".$row['team_id']."'/>"
                  . "</form>";
           
      echo       "<form method='get' action='activity_done.php'>"
                
                    . "<p><input type='submit' name='act_done' id='actdone' class='tiny round success button' value='Done'></p>"
                  . "<input type='hidden' name='act_id' value='".$row['act_id']."'/>"
                 . "<input type='hidden' name='team_id' value='".$row['team_id']."'/>"
                
                    . "</form>";
        
        // Counts the split 
        $split++;
        
        // when the split is equal to 6 (started from 0), then a new row will be created
        if($split%6==0){
            echo "</tr><tr> ";
        }   // finishes the split
    
    }   //end of while-loop
// end of table
echo "</tr></table>";
                 
echo "</div>";      
       



      ?>
           <br> 
            
                      
    <form method="get" action="" id="enteract">
<input type="hidden"  name="team_id" value="<?php echo $team_id; ?>">   
        <input type="text" id="act_inp_text"  name="act_def" placeholder="Enter your activity text here">
<button type="submit" name="submit_act" class="tiny round success button">Add new activity</button>
</form>          
<br>
<br>
<br> 
<br>
<br>        
<?php


           // Gets the function connect_db() and stores it in vector $mysql
        $mysql=connect_db();


    
  // query that selects everything from the table planet_awesome
        $sql="SELECT * FROM user WHERE team_id='$team_id'";
        
         //stores the result of the query and connection to the database in vector $result
        $result=$mysqli->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="users_in_teams">
        
        <?php
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
               echo "<td class='awesomerow' id='core'>"
                
            . "<form method='get' action='remove_user_from_team.php'>"    
            
            // echoes the information from the db    
            . "<p>" . $row['name'] . "</p> "   
            
            . "<p><img src='./img/avatar_user/" . $row['avatar'] . "' class='user_avatar_inrocket'></p>"
                   . "<input type='image' value='delete' name='check_usr' onClick=\"return confirm('Are you sure?')\"                                   src='img/function_navigation/delete.png' alt='Submit'/>"
            
            . "<input type='hidden' name='usr_id' value='".$row['user_id']."'/>"
                 . "<input type='hidden' name='team_id' value='".$row['team_id']."'/>"
                
                
            . "</form>";
        
        // Counts the split 
        $split++;
        
        // when the split is equal to 6 (started from 0), then a new row will be created
        if($split%4==0){
            echo "</tr><tr> ";
        }   // finishes the split
    
    }   //end of while-loop
// end of table
echo "</tr></table>";
            
echo "</div>"; 


echo "<br>";
 
//SQL Select usr that is not in any team yet

$usrname=$mysqli->query("SELECT user_id,name FROM user WHERE team_id='0'");

$username=$usrname->fetch_assoc();

echo "<form action='add_member_to_team.php' id='addmember' method='get'>";

echo "<select name='members'>";

//Loops through users without teams and gives select option
foreach($usrname as $val)
    {
    
    echo "<option name='usr_id' value='$val[user_id]'>$val[name]</option>";
    }

echo "</select>";
echo "<input type='hidden' name='team_id' value='".$team_id."'>"; 
echo "<button type='submit' name='add' class='round success button'>Add member to team</button>";
echo "</form>";


 ?>
<br>








               
            
            
            
            
            
            
            
            
            
            
            


<form method="get" action="">
<input type="hidden" name="team_id" value="<?php echo $team_id; ?>">   
<button type="submit" onClick="return confirm('Are you sure?')" name="delete" class="alert button" id="deleteteam">Delete team</button>
</form>



<?php









 
            

if(isset($_GET['yes'])){

$team_id = $_GET['team_id'];    
    
$mysqli=connect_db();    
    
$query="UPDATE teams SET go='1' WHERE team_id='$team_id'";
    
if($mysqli->query($query) == true){
   
    // Here we can echo something if we want
    
}   
}

if(isset($_GET['no'])){

$team_id = $_GET['team_id'];      
    
$mysqli=connect_db();    
    
$question="UPDATE teams SET go='0' WHERE team_id='$team_id'";    
    
if($mysqli->query($question) == true){
    
    // Here we can echo something if we want
    
}           
}



?>


