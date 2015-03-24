<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

$user_name=$_SESSION['user_name'];
$user_access_level = $_SESSION['user_access_level'];

// Get user's information
$query = "SELECT * FROM subnets";
$result = mysql_query($query)or die ("Error occured");

// Display users to delete from
echo"<table>";
echo"<form method='post' action='remove_subnet_proc.php'>";
echo"<tr><th><u>Delete Subnet</u></th></tr>";
echo"<td>Subnet</td><td>:</td><td> <select name='subnet_id'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$subnet_id</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="remove" /> </td></tr>';
echo" </form>";
echo"</table>";
//footer

echo '<a href="all_subnets.php">Back</a>';
include '../includes/footer.php';
?>
