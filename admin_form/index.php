<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Books</title>
</head>

<body>
<form method="post">
<table>

	<tr>
		<td>Category:</td>
		<td><input type="text" name="cat" /></td>
	</tr>
	<tr>
		<td>Definition</td>
		<td><input type="text" name="def" /></td>
	</tr>
	<tr>
		<td>Avatar</td>
		<td><input type="text" name="avatar" /></td>
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="submit" value="Add" /></td>
	</tr>
</table>
<?php
if (isset($_POST['submit']))
	{	   
	include 'db.php';
	
			 		$cat=$_POST['cat'] ;
					$def= $_POST['def'] ;					
					$avatar=$_POST['avatar'] ;
					
												
		 mysql_query("INSERT INTO `planet_awesome`(category,definition,avatar) 
		 VALUES ('$cat','$def','$avatar')"); 
				
				
	        }
?>
</form>
<table border="1">
	
			<?php
			include("db.php");
			
				
			$result=mysql_query("SELECT * FROM planet_awesome");
			
			while($test = mysql_fetch_array($result))
			{
				$id = $test['awesome_id'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['category']."</font></td>";
				echo"<td><font color='black'>". $test['definition']. "</font></td>";
				echo"<td><font color='black'>". $test['avatar']. "</font></td>";	
				echo"<td> <a href ='view.php?awesome_id=$id'>Edit</a>";
				echo"<td> <a href ='del.php?awesome_id=$id'><center>Delete</center></a>";
									
				echo "</tr>";
			}
			mysql_close($conn);
			?>
</table>

</body>
</html>
