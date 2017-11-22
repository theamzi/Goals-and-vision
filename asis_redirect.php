<?php
/* Script that checks if there are are categories defined in the database */

require('db_connect.php');


$mysqli=connect_db();



$url1 = "asis_undefined.php";
$url2 = "asis_main.php";

if ($result = $mysqli->query("SELECT category FROM as_is")) {

    /* determine number of rows result set */
    $row_cnt = $result->num_rows;

    /* if there are already defined categories, send to $url2 */
    
   if ($row_cnt > 0){
header('Location: ' . $url2);
    
}
    /* else if there is no defined categories, send to $url1 */
    
    else {
      header('Location: ' . $url1);
}
    /* close result set */
    $result->close();
}

/* close connection */
$mysqli->close();

?>