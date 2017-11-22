
<?php
/* The site allows the user to login. This is the first page the user will see if they have not logged in. From here they can also navigate to create an Awesome Account!  */

// starts the session
session_start();
include_once 'db_connect.php';


// redirects the user
if(isset($_SESSION['user'])!="")
{
 header("Location: login.php");
}


/* The below script will be executed if the user enter his/hers credentials */ 

if(isset($_POST['login']))
{
    $mysql=connect_db();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql="SELECT * FROM user WHERE email='$email'";   
    
    $result=($mysql->query($sql));
    $row = ($result->fetch_assoc());
      
    if($row['password']=== md5($pass))
 {
        // if the user are able to sign in, the id of the user is stored in a session and is sent to index.php
        
  $_SESSION['user'] = $row['user_id'];
  header("Location: index.php");
 }
 else
 { // if the user was not able to login
  ?>
        <script>alert('Sorry You Entered Wrong Credentials');</script>
        <?php
 }

    
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
    <h4 class="awesometext">Welcome  to your Awesome journey</h4>
    <br>

<body>
<div class="stars"></div>
<div class="space"></div>

<!--http://www.sanwebe.com/2014/08/css-html-forms-designs -->      
    <div class="form-style-10">
<h1>Log in<span></span></h1>
<form method="post">
    
    <div class="section"><span>1</span>Email &amp; Password</div>
    <div class="inner-wrap">
        <label>Email <input type="text" name="email" placeholder="Your Email" required /></label>
        <label>Password <input type="password"name="pass" placeholder="Your Password" required/></label>
    </div>

    
    <div class="button-section">
     <input type="submit" class="button" name="login" value="Login" />
     <span class="privacy-policy">
         <td><a href="register.php">Sign Up Here</a></td>
     </span>
    </div>
</form>
</div>


</body>
</html>
