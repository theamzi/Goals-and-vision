<?php
  include("db.php");  

	$id =$_REQUEST['awesome_id'];
	
	
	// sending query
	mysql_query("DELETE FROM planet_awesome WHERE awesome_id = '$id'")
	or die(mysql_error());  	
	
	header("Location: index.php");
?>