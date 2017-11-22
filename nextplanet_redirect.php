<?php
//Funktion för att antingen skicka användare till webbsida beroende på ifall kategorier för asis är inlagda eller ej

require('db_connect.php');



$mysqli=connect_db();



$url1 = "nextplanet_undefined.php";
$url2 = "nextplanet_main.php";

if ($result = $mysqli->query("SELECT category FROM targets")) {

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