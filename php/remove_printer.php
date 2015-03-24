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
$query = "SELECT * FROM prints";
$result = mysql_query($query)or die ("Error occured");

// Display users to delete from
echo"<table>";
echo"<form method='post' action='remove_printer_proc.php'>";
echo"<tr><th><u>Remove Printer</u><br><br></th></tr>";
echo"<tr><td>Printer</td><td>:</td><td> <select name='print_name'>";
while ($row = mysql_fetch_assoc($result)){
  extract($row); 
  echo"<option>$print_name</option>";
}
echo"</select></td></tr>";
echo'<tr><td><input type="submit" name="remove" id="remove" value="remove" /> </td></tr>';
echo" </form>";
echo"</table><br>";
//footer

echo '<a href="all_prints.php">Back</a>';
include '../includes/footer.php';
?>
