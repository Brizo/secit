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

echo '<a href="all_subnets_net.php">Back</a>';
// Get user's information
$query = "SELECT * FROM computers";
$result = mysql_query($query)or die ("Error occured");

// Display users to delete from
echo"<table>";
echo"<form method='post' action='remove_pc_proc.php'>";
echo"<tr><th><u>Remove PC</u></th></tr>";
echo"<tr><td>Computer IP</td><td>:</td><td> <select name='pc_ip'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$pc_ip</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="Remove" /> </td></tr>';
echo" </form>";
echo"</table>";
//footer
include '../includes/footer.php';
?>
