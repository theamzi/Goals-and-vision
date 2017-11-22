<?php
require("db.php");
$id =$_REQUEST['awesome_id'];

$result = mysql_query("SELECT * FROM planet_awesome WHERE awesome_id  = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$cat=$test['category'] ;
				$def= $test['definition'] ;					
				$avatar=$test['avatar'] ;

if(isset($_POST['save']))
{	
	$cat_save = $_POST['cat'];
	$def_save = $_POST['def'];
	$avatar_save = $_POST['avatar'];

	mysql_query("UPDATE planet_awesome SET category ='$cat_save', definition ='$def_save',avatar ='$avatar_save' WHERE awesome_id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: index.php");			
}
mysql_close($conn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<table>
	<tr>
		<td>Category:</td>
		<td><input type="text" name="cat" value="<?php echo $Title ?>"/></td>
	</tr>
	<tr>
		<td>Definition:</td>
		<td><input type="text" name="def" value="<?php echo $Author ?>"/></td>
	</tr>
	<tr>
		<td>Avatar:</td>
		<td><input type="text" name="avatar" value="<?php echo $PublisherName ?>"/></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>

</body>
</html>
