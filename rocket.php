<?php
require('header.php');

echo 
     "<div class='awesometext' id='teams'> <p> Teams </p> </div>"
    . "<p><a href='show_crew.php'<button type='submit' name='check_team' id='crew' class='small button'>Check your awesome crew!</button></p></a>" 
    . "<p><a href='create_team.php'<button type='submit' name='check_team' id='create' class='small button'>Create your own awesome team!</button></p></a>"; 

 //"<div id='user_create'><p><a href='create_user.php'>Create a Awesome user!</a></p></div>";
        
        
$mysqli=connect_db();



//Reusing script from functions.php, less work to do like this than include page
$gocount=$mysqli->query("SELECT count(completed) FROM activities");

$totalgo=$gocount->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototal=implode($totalgo);


//Räknar ut hur många GO's =0 totalt i db
$gocount2=$mysqli->query("SELECT count(completed) FROM activities WHERE completed='1'");

$totalgo2=$gocount2->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalyes=implode($totalgo2);

//Räknar ut hur många GO's =0 totalt i db
$gocount3=$mysqli->query("SELECT count(completed) FROM activities WHERE completed='0'");

$totalgo3=$gocount3->fetch_assoc();

//Bryter array till string som sedan kan användas för kalkylering
$gototalno=implode($totalgo3);


//Script to calc progress to next planet
$current_progress=(($gototalyes/$gototal)*100);

 

  ?>
<div class="stars"></div>
<div class="space"></div>

<div id="progressrocket"><h4>Progress untill landing</h4></div> 
<div class="progress" role="progressbar" tabindex="0" aria-valuenow="20" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
  <span class="progress-meter" style="width: <?php echo $current_progress; ?>%">
    <p class="progress-meter-text"><?php echo $current_progress; ?>%</p>
  </span>
</div>
          
<?php
    
        // query that selects everything from the table teams
        $sql="SELECT * FROM teams ORDER BY name ASC";

        $sqli="SELECT definition FROM activities";
        
        //stores the result of the query and connection to the database in vector $result
        $result=$mysqli->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="rocketcategories">
        
        <?php
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
            echo "<td class='rocketrow'> "
                
            . "<form method='get' action='show_team.php'>"    
            
            // echoes the information from the db    
            . "<p>" . $row['name'] . "</p> "   
            
            . "<p><img src='./img/avatar_team/" . $row['avatar'] . "' class='teamavatar'></p>"
            
            . "<input type='hidden' name='team_id' value='".$row['team_id']."'/>"
                
            . "<p><button type='submit' name='check_team' id='check' class='small button'>Check</button>"
                
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
