<?php
require('db_connect.php');

// shows error messages i PHP-code on Mac
error_reporting(E_ALL);
ini_set('display_errors','ON');
    
//session_start();

session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: login.php");
}
    

if(isset($_POST['signup'])) {
    
// Compares so that pass & pass2 are indentical. If its true then the script will continue    
    
if($_POST['pass'] === $_POST['pass2']) {    
    
    // Gets the information regarding the user. Also encrypts the password.
    
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass =  md5($_POST['pass']);
    $avatar = $_POST['avatar_user'];
    $mysqli = connect_db();
    
    
$query="SELECT email FROM user WHERE email='" . $email . "'";
    
$result=$mysqli->query($query);
    
if($result->num_rows == 0 ) {    
 
// Inserts the information regarding the user into the database     
    
$sql = "INSERT INTO user(name,email,password,avatar) VALUES('$uname','$email','$pass', '$avatar')";     
    
 if($mysqli->query($sql)== true)
 {      
        // If the registration was a success the below alert will be shown 
  
    echo "<script>alert('You Awesome Account Is Registered');</script>";
        
 }
 else {          // If for some reason the customer could not register, the alert below will be shown
    echo "<script>alert('Could not register');</script>";
 }

}
 else {
     echo "<script>alert('That Email Is Already Registered);</script>";
 }   
}
    else { // If the password 1 & 2 does not match the alert below will be shown
    echo "<script>alert('Your Password Does Not Match');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script src="jquery-2.1.1.js"></script>
<link rel="stylesheet" href="awesomevision.css">
 <!--<link rel="stylesheet" href="foundation.css"> -->
<link rel="icon" type="image/png" href= "img/Planets_backgrounds/favicon-32x32.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Awesome vision</title>    
</head>


    
<body>   
    <div class="stars"></div>
<div class="space"></div>
    
<center> 
    
<!-- http://www.sanwebe.com/2014/08/css-html-forms-designs -->   
<div class="form-style-10">
<h1>Create your Awesome user<span>Time to start a new journey, destination Awesome </span></h1>
<form method="post">
    <div class="section"><span>1</span>Name &amp; Email</div>
    <div class="inner-wrap">
        <label>Your Full Name<input type="text" name="uname"  required /></label>
        <label>Email Address <input type="email" name="email"  required /></label>
    </div>
    
    <div class="section"><span>2</span>Password &amp; Avatar</div>
    <div class="inner-wrap">
        <label>Password <input type="password" name="pass"  required /></label>
        <label>Confirm Password<input type="password" name="pass2"  required /></label>
        <lable> <select name="avatar_user"/>
        <option value="" selected="selected">Choose your avatar</option></lable>
<?php 
        // allows the user to choose an avatar from a local folder
        
       foreach(glob(dirname(__FILE__) . '/img/avatar_user/*') as $filename){
       $filename = basename($filename);
       echo "<option value='" . $filename . "'>".$filename."</option>";
    }
?>
      </select>
    </div>

    <div class="button-section">
     <input type="submit" class="button" name="signup" value="Register"/>
     <span class="privacy-policy">
         <td><a href="login.php">Sign In Here</a></td></span>
    </div>
      
</form>
</div>
</center>
</body>
</html>




