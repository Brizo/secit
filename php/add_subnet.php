<?php
//add functions and header; and connect to database 
require '../includes/functions.php';
include '../includes/header.php';
require '../includes/connect.php';

if (!loggedin()){
	header('Location: ../index.php');
}

//Code
$query = "SELECT * FROM subnets";
$result = mysql_query($query)or die ("Error occured");

?>

<table>
<form action="add_subnet_proc.php" method="POST">
	<tr><td>Subnet IP&nbsp</td><td> <input type="text" name='subnet_id' value="<?php echo $subnet_id?>"></td></tr>
	<tr><td>Description</td><td> <textarea cols="40" rows="5" name='subnet_desc' value="<?php echo $subnet_desc?>"></textarea><br><br></td></tr>
	<tr><td><input type="submit" value="Add Subnet"><br><br></td></tr>	
</form>
</table>
<div class="cleaner"></div>

<?php
echo '<a href="all_subnets.php">Back</a>';

include '../includes/footer.php'; ?>
