<?php

//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//Code
$query = "SELECT * FROM remotesites";
$result = mysql_query($query)or die ("Error occured");

?>

<table>
<form action="add_site_proc.php" method="POST">
	<tr><td>Site Subnet&nbsp</td><td> <input type="text" name='site_subnet' value="<?php echo $site_subnet?>"></td></tr>
	<tr><td>Site Name&nbsp</td><td> <input type="text" name='site_name' value="<?php echo $site_name?>"></td></tr>
	<tr><td>Site IP&nbsp</td><td> <input type="text" name='site_ip' value="<?php echo $site_ip?>"></td></tr>
	<tr><td>Description</td><td> <textarea cols="40" rows="5" name='site_desc' value="<?php echo $site_desc?>"></textarea><br><br></td></tr>
	<tr><td><input type="submit" value="Add Site"><br><br></td></tr>	
</form>
</table>
<div class="cleaner"></div>

<?php
echo '<a href="all_subnets.php">Back</a>';

include '../includes/footer.php'; ?>
