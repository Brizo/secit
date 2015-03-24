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

//Code
$query = "SELECT * FROM computers";
$result = mysql_query($query)or die ("Error occured");

?>

<table>
<form action="add_pc_proc.php" method="POST">
	<tr><td>PC Subnet&nbsp</td><td> <input type="text" name='pc_subnet' value="<?php echo $pc_subnet?>"></td></tr>
	<tr><td>PC User&nbsp</td><td> <input type="text" name='pc_user' value="<?php echo $pc_user?>"></td></tr>
	<tr><td>PC IP&nbsp</td><td> <input type="text" name='pc_ip' value="<?php echo $pc_ip?>"></td></tr>
	<tr><td>PC State&nbsp</td><td> <input type="text" name='pc_state' value="<?php echo $pc_state?>"></td></tr>
	<tr><td>Description</td><td> <textarea cols="40" rows="5" name='pc_desc' value="<?php echo $pc_desc?>"></textarea><br><br></td></tr>
	<tr><td><input type="submit" value="Add PC"><br><br></td></tr>	
</form>
</table>
<div class="cleaner"></div>

<?php include '../includes/footer.php'; ?>
