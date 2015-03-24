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

//Code
$query = "SELECT * FROM prints";
$result = mysql_query($query)or die ("Error occured");

?>
<h3>ADD PRINTER</h3>
<table>
<form action="add_printer_proc.php" method="POST">
	<tr><td>Printer Name&nbsp</td><td> <input type="text" name='print_name' value="<?php echo $print_name?>"></td></tr>
	<tr><td>Printer IP&nbsp</td><td> <input type="text" name='print_ip' value="<?php echo $print_ip?>"></td></tr>
	<tr><td>Description</td><td> <textarea cols="40" rows="5" name='print_desc' value="<?php echo $print_desc?>"></textarea><br><br></td></tr>
	<tr><td><input type="submit" value="Add Printer"><br><br></td></tr>	
</form>
</table>
<div class="cleaner"></div>

<?php
echo '<a href="all_prints.php">Back</a>';

include '../includes/footer.php'; ?>
