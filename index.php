        <?php require 'header.php';
        require 'functions.php';
      
   
//Depending on position in db, different css style for different elements
switch ($poss)
    
    
            {
    case "0": ?>
   <style type="text/css">#rocket {
left:89.5%;
}</style>

<style type="text/css">#rocket2 {
display:none;
}</style>

<style type="text/css">#flag1 {
display:none;
}</style>

    <?php
    break;
            
       case "1":?>
   <style type="text/css">#rocket {
display:none;
}</style>
<style type="text/css">#rocket2 {
display:block;
}</style>

<style type="text/css">#flag1 {
display:none;
}</style>

    <?php
    break;
    
    
   case "2":?>
   <style type="text/css">#rocket {
display:none;
}</style>

<style type="text/css">#rocket2 {
left: 75%;
width:8%;
}</style>

<style type="text/css">#flag1 {
display:none;
}</style>

    <?php
    break;
            
     case "3":?>
   <style type="text/css">#rocket {
display:block;
       left: 67%;
       top: 59%;
}</style>
<style type="text/css">#rocket2 {
display:none;
}</style>

<style type="text/css">#flag1 {
display:block;
}</style>

<style type="text/css">#mars_1 {
opacity:1;
}</style>

    <?php
    break;
   
       case "4": ?>
   <style type="text/css">#rocket {
display:none;
}</style>

<style type="text/css">#rocket2 {
display:block;
    left: 57%;
    top: 68%;
}</style>

<style type="text/css">#mars_1 {
opacity:1;
}</style>

    <?php
    break;
    
    case "5": ?>
   <style type="text/css">#rocket {
left:60%;
}</style>
    <?php
    break;
            
     case "6": ?>
   <style type="text/css">#rocket {
left:55%;
}</style>
    <?php
    break;
   
      case "7": ?>
   <style type="text/css">#rocket {
left:50%;
}</style>
    <?php
    break;

        case "8": ?>
   <style type="text/css">#rocket {
left:45%;
}</style>
    <?php
    break;
            
     case "9": ?>
   <style type="text/css">#rocket {
left:40%;
}</style>
    <?php
    break;
   
      case "10": ?>
   <style type="text/css">#rocket {
left:35%;
}</style>
    <?php
    break;
    
    
            
            
            } 
      
      
        
  
// Check if arrays containing table targets,asis and awesome are empty and displays element for start journey and if rocket position = 0
if(!empty($check_asis && $check_targets && $check_awesome)) 
   { if  ($poss == 0)
{   
    
    ?>
   <style type="text/css">#startjourney {
display:block;
        position: fixed;
    bottom: 50%;
    left: 50%;
    z-index: 10;
}</style>
    <?php
}
else
{   
    
    ?>
  <style type="text/css">#startjourney{
display:none;
</style>
    
    <?php
    } } 
     
      ?>
      
      
       <?php
 
// Check if mars is empty and if rocket pos = 3 then able to continue journey
if(!empty($check_mars)) 
   { if  ($poss == 3)
{   
    
    ?>
   <style type="text/css">#startmars {
display:block;
        position: fixed;
    bottom: 50%;
    left: 50%;
    z-index: 10;
}</style>
    <?php
}
else
{   
    
    ?>
  <style type="text/css">#startmars{
display:none;
</style>
    
    <?php
    } } 
     
      ?>
      
      
      
      
        <?php
    //When pressing startjourney button updates rocket position
if(isset($_POST['startj'])){
    
$startj="UPDATE rocket SET position='1' WHERE rocket_id='1'";
    
if($mysqli->query($startj) == true){
    
}   
}

//When pressing contuine journey to mars button updates rocket position
if(isset($_POST['startm'])){
    
$startm="UPDATE rocket SET position='4' WHERE rocket_id='1'";
    
if($mysqli->query($startm) == true){
    
}   
}



//When pressing moonlandbutton update rockets position
if(isset($_POST['moonlandbutton'])){
    
$moonland="UPDATE rocket SET position='3' WHERE rocket_id='1'";
    
if($mysqli->query($moonland) == true){
    
}   
}


//When pressing moonlandbutton reset all team go to 0
if(isset($_POST['moonlandbutton'])){
    
$moonland2="UPDATE teams SET go='0'";
    
if($mysqli->query($moonland2) == true){
    
}   
}




      ?>
      
      
    <form action="" method="post" id="startjourney">         
    <input type="submit" class="success button round large" name="startj" value="Start journey">
</form>
      

        <form action="" method="post" id="moonlandform">         
    <input type="submit" class="success button round large" name="moonlandbutton" value="Land on the moon">
</form>
      
       <form action="" method="post" id="startmars">         
    <input type="submit" class="success button round" name="startm" value="Countinue journey to mars">
</form>      

   
      
      
      
<div class="stars">
    </div>
 
<div class="space"></div>
     
<div id="container">
  
 
</div>

  
    <div class="moon pulse2"><a href="nextplanet_redirect.php">
          <img src="img/Planets_backgrounds/moon.png"></a>   
    </div>
      
    <div class="asis"><a href="asis_redirect.php">
    <img src="img/Planets_backgrounds/earth.png"> </a>      
    </div>
      
    <div class="mars fade-in" id="mars_1"> <a href="mars_main.php">
    <img src="img/Planets_backgrounds/mars.png"></a>                       
    </div>
      
    <div id="rocket" class="rocket">
        <a href="rocket.php" ><img src="img/Rocket_possition/newrocket_landed.png" /></a>
    </div>  
    
     <div id="rocket2" class="rocket2">
        <a href="rocket.php" ><img src="img/Rocket_possition/newrocket2.png" /></a>
    </div>  
     
      
      <div id="flag1" class="flag1">
        <img src="img/Rocket_possition/flag1.png" />
    </div> 
 
    <div class="saturn fade-in">
     <img src="img/Planets_backgrounds/jupiter.png">    
    </div>
      
    <div class="neptunus fade-in">
     <img src="img/Planets_backgrounds/neptunus.png">    
    </div>
      
    <div class="mercury fade-in">
     <img src="img/Planets_backgrounds/mercury.png">    
    </div>
      
    <div class="venus fade-in">
     <img src="img/Planets_backgrounds/venus.png">    
    </div>
      
    <div class="awesome"><a href="awesome_redirect.php">
          <img src="img/Planets_backgrounds/uranus.png">    </a>
    </div>
      

      
      <!--
      <div class="alien2">
          <img src="img/avatar_user/alien/alien3.png"></div>
    -->
       
              
       
    <!-- 
      <div class="flag1">

        <a href="" target="_blank"><img src="http://content.screencast.com/users/fg-a/folders/american-flags/media/41b679d9-4c35-4259-80bf-b1d743252a36/usa_sm40fa.gif" width="54" height="40" border="0" alt="Flags" /></a></div>
-->
<!--
        <a href="http://www.fg-a.com/american-1.shtml" target="_blank"><img src="http://content.screencast.com/users/fg-a/folders/american-flags/media/41b679d9-4c35-4259-80bf-b1d743252a36/usa_sm40fa.gif" width="54" height="40" border="0" alt="Flags" /></a></div>
<img src="img/Rocket_possition/flag1.png"></div> -->
    
    
    
    
                                                 
                                                
    
   
                       
   
                  


    <footer>

    
    <footer>

        
        <?php

         
           // Gets the function connect_db() and stores it in vector $mysql
        $mysql=connect_db();
        
        // query that selects everything from the table planet_awesome
        $sql="SELECT * FROM core_values";
        
        // ORDER BY core_id ASC LIMIT 6
        
        //stores the result of the query and connection to the database in vector $result
        $result=$mysql->query($sql);
        
        // creates a split vector for looping trough the categories
        $split=0;
        
        ?>
        
        <!-- create a table -->
        <table class="awesomecat">
        
        <?php
        
        while ($row=$result->fetch_assoc()){
            // creates a row for the table
            echo "<td class='awesomerow' id='core'>"
            // echoes the information from the db    
           
                         
            . "<form method='get' action='core_values_update.php'>"    
            
            // echoes the information from the db    
            . "<p>" . $row['definition'] . "</p> "   
            
      
            
            . "<input type='hidden' name='cv_id' value='".$row['core_id']."'/>"
                  . "<input type='hidden' name='cv_def' value='".$row['definition']."'/>"
                
            . "<input type='image' class='update' name='update_cv' src='img/function_navigation/pen1.png' alt='Submit'/>"
                
            . "</form>"; 
                
                
        
        // Counts the split 
        $split++;
        
        // when the split is equal to 6 (started from 0), then a new row will be created
        if($split%6==0){
            echo "</tr><tr>";
        }   // finishes the split
    
    }   //end of while-loop

// end of table
echo "</tr></table>";
                
        ?>
        
    
    </footer>
