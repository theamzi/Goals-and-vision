<?php
require('header.php');

/* Get all registered members from the db and displays them on this site */

echo "<div class='stars'><div class='space'></div>";

echo "<div class='awesometext'> <a href='crew.php'> <p> Crew </p> </a></div>";   

// gets the function connect_db()
$mysqli=connect_db();
    
// query that selects everything from the table user
        $sql="SELECT * FROM user ORDER BY name ASC";
        
        //stores the result of the query and connection to the database in vector $result
        $result=$mysqli->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="crew">
        
        <?php
        
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
            echo "<td class='rocketrow'> "
            // echoes the information from the db    
            . "<div id='cat_txt'<p>" . $row['name'] . "</p></div>" 
            
            . "<p>  <img src='./img/avatar_user/"  . $row['avatar'] . "' class='teamavatar'></p> ";
        
        
        // Counts the split 
        $split++;
        
        // when the split is equal to 6 (started from 0), then a new row will be created
        if($split%4==0){
            echo "</tr><tr>";
        }   // finishes the split
    
    }   //end of while-loop

// end of table
echo "</tr></table>";

echo "</div>";            
            
?>

  
