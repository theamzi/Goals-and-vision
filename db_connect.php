<?php

/* This is the function for connecting to the db */

function connect_db() {
    
date_default_timezone_set('Europe/Stockholm');

/* The information below is the ip, user, password, db name */
    
$mysqli=new mysqli("localhost", "root", "", "awesomevision");

if (!$mysqli->set_charset("utf8")) {

    echo "Error, wrong setting for utf8: %s\n". $mysqli->error;
} 
    else {
//echo "Current signtable: %s\n". $mysqli->character_set_name();
}
if ($mysqli->connect_errno) {
    echo "Failed to connect: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

return $mysqli;
}

?>
