<?php
/* Script for sending a user to either awesome_undefined or awesome_main, depending if they have filled in categories or not */

require('db_connect.php');



$mysqli=connect_db();



$url1 = "awesome_undefined.php";
$url2 = "awesome_main.php";

if ($result = $mysqli->query("SELECT category FROM planet_awesome")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

   if ($row_cnt > 0){
header('Location: ' . $url2);
    
}
    else {
      header('Location: ' . $url1);
}
    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();

?>