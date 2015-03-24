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
$query = "SELECT * FROM remotesites";
$result = mysql_query($query)or die ("Error occured");

// Display users to delete from
echo"<table>";
echo"<form method='post' action='remove_sites_proc.php'>";
echo"<tr><th><u>Remove Remote-Site</u></th></tr>";
echo"<tr><td>Site Name</td><td>:</td><td> <select name='site_name'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$site_name</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="Remove" /> </td></tr>';
echo" </form>";
echo"</table>";
//footer

echo '<a href="main_admin.php">Home</a>';
include '../includes/footer.php';
?>
