<?php
session_start();
require('db_connect.php');

$mysqli = connect_db();
$sql = "SELECT * FROM user WHERE user_id='$_SESSION[user]'";
$result = $mysqli -> query($sql);
$row = $result -> fetch_assoc();

// redirects the user to the login page if they are not logged in. 

if(!isset($_SESSION['user'])) {
 header("Location: login.php");
}






?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="jquery-2.1.1.js"></script>
<link rel="stylesheet" href="awesomevision.css">
 <link rel="stylesheet" href="foundation.css">
<link rel="icon" type="image/png" href= "img/Planets_backgrounds/favicon-32x32.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Awesome vision</title>    
</head>

<body>
<?php 
// shows error messages i PHP-code on Mac
error_reporting(E_ALL);
ini_set('display_errors','OFF');
    

?>

 
<!-- the navigation -->
    
<nav>

    <div class="usr_name">
    <?php echo $row['name']; ?></li>
    </div>

<a href="index.php">
    <div class="menu">
<img src="img/icons/rocket78.png">    
<span>Home</span>
    </div>
</a>

<a href="help.php">    
    <div class="menu">
<img src="img/icons/question58.png">
<span>Help</span>
    </div>
</a>

<a href="core_values.php">    
<div class="menu">
    <img src="img/icons/finance.png">
<span>Core Values</span>
    </div>     
</a>

<a href="logout.php?logout">    
  <div class="menu">  
<img src="img/icons/logout13.png">
<span>Logout</span>
    </div>        
</a>    

</nav>    

    <script>
/* starts Foundation */
$(document).foundation();
    
    

</script>

</body>
</html>

